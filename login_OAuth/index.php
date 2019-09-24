<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Dashboard">
  <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
  <title>G+ Login</title>
  <link href="img/favicon.png" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <link href="css/style.css" rel="stylesheet">
  <link href="css/style-responsive.css" rel="stylesheet">
</head>

<body>
<?php
/*
 * @author Shan Peiris
*/
require_once './config.php';
if (isset($_SESSION["user_id"]) && $_SESSION["user_id"] != "") {
  header("location:".SITE_URL . "home.php");
}
?>
  <div id="login-page">
    <div class="container">
      <form class="form-login" action="index.php">
        <h2 class="form-login-heading">sign in now</h2>
        <div class="login-wrap">
          <div class="login-social-link centered">
            <p>you can sign in via your social network</p>
            <a class="btn btn-facebook" href="login.php">
            <i class="fa fa-google-plus"></i> Login with Google
          </a>
          </div>
          <div class="registration">
            Don't have an account yet?<br/>
            <a class="" href="dashboard.php">
              Create an account
              </a>
          </div>
        </div>
      </form>
    </div>
  </div>
  <script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="lib/jquery.backstretch.min.js"></script>
  <script>
    $.backstretch("img/login-bg.jpg", {
      speed: 500
    });
  </script>
</body>
</html>
