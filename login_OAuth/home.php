<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Dashboard">
  <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
  <title>G+ Login</title>
  <link rel="icon" href="img/core-img/favicon.ico">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">
  <link href="http://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="css/splus_plugin_one.css">
  <link rel="stylesheet" type="text/css" href="lib/gritter/css/jquery.gritter.css" />
  <link href="css/style.css" rel="stylesheet">
  <link rel="stylesheet" href="css/to-do.css">
  <link href="css/style-responsive.css" rel="stylesheet">
  <script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/jquery/topup.js"></script>
</head>

<body>
<?php
/*
 * @author Shan Peiris
*/
require_once './config.php';
if (!isset($_SESSION["user_id"]) && $_SESSION["user_id"] == "") {
  header("location:" . SITE_URL);
}
?>
    <section id="container">
    <header class="header black-bg">
      <div class="sidebar-toggle-box">
        <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
      </div>
      <a href="index.html" class="logo"><b>G+<span> Login</span></b></a>
      <div class="nav notify-row" id="top_menu">
<?php
	$sql = "SELECT COUNT(*) AS count from google_users";
    $stmt = $DB->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll();
?>
        <ul class="nav top-menu">
          <li class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
              <i class="fa fa-google-plus"></i>
              <span class="badge bg-theme"><?php echo $result[0]["count"]?></span>
              </a>
            <ul class="dropdown-menu extended tasks-bar">
              <div class="notify-arrow notify-arrow-green"></div>
              <li>
                <p class="green">System have <?php echo $result[0]["count"]?> Google users</p>
              </li>
              <li class="external">
                <a href="#">See All Tasks</a>
              </li>
            </ul>
          </li>
        </ul>
      </div>
      <div class="top-menu">
        <ul class="nav pull-right top-menu">
          <li><a class="logout" href="<?php echo LOGOUT_URL; ?>">Logout</a></li>
        </ul>
      </div>
    </header>
    <aside>
      <div id="sidebar" class="nav-collapse ">
        <ul class="sidebar-menu" id="nav-accordion">

          <p class="centered"><a href="#" id="imgload"><img data-src="<?php echo $_SESSION['image'] ?>" class="img-circle" width="80" src="images/loading.svg"></a></p>
          <h5 class="centered"><?php echo ucwords($_SESSION["name"])?></h5>
        </ul>
      </div>
    </aside>
    </section>
 <section id="main-content">
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-9 main-chart">
            <div class="border-head">
              <h3>YOUR ACCOUNT DASHBOARD</h3>
            </div>
            <?php if ($_SESSION["new_user"] == "yes") { ?>
    <h4>Thank you <?php echo $_SESSION["name"] ?>, for registering with us!!!</h4>
    <?php } else { ?>
    <h4>Welcome back <?php echo $_SESSION["name"] ?>!!!</h4>
    <?php }?>
            <div class="custom-bar-chart">
              <div class="col-md-12">
            <div class="row content-panel">
              <div class="col-md-4 profile-text mt mb centered">
                <div class="right-divider hidden-sm hidden-xs">
                  <h4><?php echo $_SESSION["email"]; ?></h4>
                  <h6>Email Address</h6>
                  <h4><?php echo $_SESSION["user_id"];?></h4>
                  <h6>Google ID</h6>
                  <h4><?php echo $_SESSION['gender'];?></h4>
                  <h6>Gender</h6>
                </div>
              </div>
              <div class="col-md-4 profile-text">
                <h3><?php echo ucwords($_SESSION["name"]) ?></h3>
                <h6>Google Plus User</h6>
                <p>G+ was the safest method to Acsess Systems.</p>
                <br>
              </div>
              <div class="col-md-4 centered">
                <div class="profile-pic">
                  <p><img src="<?php echo $_SESSION['image'] ?>" class="img-circle"></p>
                  <p>
                    <button class="btn btn-theme"><i class="fa fa-check"></i> Follow</button>
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
		<div class="row mt">  
 		</div>
          <div class="row mt">
          <div class="col-md-12">
            <section class="task-panel tasks-widget">
              <div class="panel-heading">
                <div class="pull-left">
                  <h5><i class="fa fa-users"></i> Other Users - GOOGLE +</h5>
                </div>
                <br>
              </div>
              <div class="panel-body">
                <div class="task-content">
                  <ul class="task-list">
                  <?php
				  $stmt = $DB->query("SELECT * FROM google_users");
				  while ($row = $stmt->fetch()) {
				  ?>
                    <li>
                      <div class="task-checkbox">
                        <input type="checkbox" class="list-child" value="" />
                      </div>
                      <div class="task-title">
                        <span class="task-title-sp">Name: <?php echo $row['name']?> - </span>
                        <span class="badge bg-success"><?php echo $row["email"]?></span>
                        <div class="pull-right hidden-phone">
                          <button class="btn btn-success btn-xs"><i class=" fa fa-eye"></i></button>
                        </div>
                      </div>
                    </li>
                    <?php 
					}
					?>
                  </ul>
                </div>
                <div class=" add-task-row">
                </div>
              </div>
            </section>
          </div>
        </div>
		</div>
        </div>
      </section>
    </section>
    <?php
//echo $data->GetData();
?>
  </section> 
  <script src="lib/jquery/imglazyload.js"></script>
  <script src="lib/jquery/imgload.js"></script>
  <script src="lib/bootstrap/js/bootstrap.min.js"></script>
  <script class="include" type="text/javascript" src="lib/jquery.dcjqaccordion.2.7.js"></script>
  <script src="lib/jquery.scrollTo.min.js"></script>
  <script src="lib/jquery.nicescroll.js" type="text/javascript"></script>
  <script src="lib/jquery.sparkline.js"></script>
  <script src="lib/common-scripts.js"></script>
  <script type="text/javascript" src="lib/gritter/js/jquery.gritter.js"></script>
  <script type="text/javascript" src="lib/gritter-conf.js"></script>
</body>
</html>
