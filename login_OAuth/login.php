<?php
/*
 * @author Shan Peiris
*/
require('http.php');
require('oauth_client.php');
require('config.php');
$client = new oauth_client_class;
$client->offline = FALSE;
$client->debug = false;
$client->debug_http = true;
$client->redirect_uri = REDIRECT_URL;
$client->client_id = CLIENT_ID;
$application_line = __LINE__;
$client->client_secret = CLIENT_SECRET;
if (strlen($client->client_id) == 0 || strlen($client->client_secret) == 0)
  die('Please go to Google APIs console page ' .
          'http://code.google.com/apis/console in the API access tab, ' .
          'create a new client ID, and in the line ' . $application_line .
          ' set the client_id to Client ID and client_secret with Client Secret. ' .
          'The callback URL must be ' . $client->redirect_uri . ' but make sure ' .
          'the domain is valid and can be resolved by a public DNS.');
$client->scope = SCOPE;
if (($success = $client->Initialize())) {
  if (($success = $client->Process())) {
    if (strlen($client->authorization_error)) {
      $client->error = $client->authorization_error;
      $success = false;
    } elseif (strlen($client->access_token)) {
      $success = $client->CallAPI(
              'https://www.googleapis.com/oauth2/v1/userinfo', 'GET', array(), array('FailOnAccessError' => true), $user);
    }
  }
  $success = $client->Finalize($success);
}
if ($client->exit)
  exit;
if ($success) {
  $sql = "SELECT COUNT(*) AS count from google_users where email = :email_id";
  try {
    $stmt = $DB->prepare($sql);
    $stmt->bindValue(":email_id", $user->email);
    $stmt->execute();
    $result = $stmt->fetchAll();

    if ($result[0]["count"] > 0) {
      $_SESSION["name"] = $user->name;
      $_SESSION["email"] = $user->email;
	  $_SESSION["image"] = $user->picture;
	  $_SESSION['gender'] = $user->gender;
      $_SESSION["new_user"] = "no";
    } else {
      $sql = "INSERT INTO `google_users` (`name`, `email`) VALUES " . "( :name, :email)";
      $stmt = $DB->prepare($sql);
      $stmt->bindValue(":name", $user->name);
      $stmt->bindValue(":email", $user->email);
      $stmt->execute();
      $result = $stmt->rowCount();
      if ($result > 0) {
        $_SESSION["name"] = $user->name;
        $_SESSION["email"] = $user->email;
		$_SESSION["image"] = $user->picture;
	  	$_SESSION['gender'] = $user->gender;
        $_SESSION["new_user"] = "yes";
        $_SESSION["e_msg"] = "";
      }
    }
  } catch (Exception $ex) {
    $_SESSION["e_msg"] = $ex->getMessage();
  }
  $_SESSION["user_id"] = $user->id;
} else {
  $_SESSION["e_msg"] = $client->error;
}
header("location:home.php");
exit;
?>