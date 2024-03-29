<?php
require('../includes/config.php');
require('../includes/login_db.php');

if(isset($_GET['action']) && ($_GET['action']=='logout' || $_GET['action']=='change_password')) {
	$loggedout = $obj->logout();
}

if($obj->check_login()) {
	$url = "http" . ((!empty($_SERVER['HTTPS'])) ? "s" : "") . "://".$_SERVER['SERVER_NAME'].$_SERVER['PHP_SELF'];
	$redirect = str_replace('pages/login.php', 'index.php', $url);
	header("Location: $redirect");
	exit;
}
$logged = $obj->login('index.php'); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">

<link rel="shortcut icon" href="../images/favicon.ico" />
<title>Admin Login Portal</title>

<?php include("./template/styles.php") ?>
<style>
body {
	background: url("../images/photo_bg.jpg") no-repeat center center fixed;
	background-size: cover;
}
</style>

</head>

<body>

<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
	<div class="navbar-header">
		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>
		<a class="navbar-brand" href="" >Student Link Admin Panel</a>
	</div>
</nav>
<div class="container">
	<div class="row">
		<div class="col-md-4 col-md-offset-4">
			<div class="login-panel panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Please Sign In</h3>
				</div>
				<div class="panel-body">
					<?php if($logged=='invalid') : ?>
					<p class="text-danger">Invalid username or password</p>
					<?php endif;?>
					<?php if(isset($_GET['action']) && $_GET['action']=='logout') :?>
					    <?php if($loggedout==true) : ?>
					    <p class="text-success">You have been successfully logged out.</p>
					    <?php else : ?>
					    <p class="text-danger">There was a problem logging you out.</p>
				        <?php endif;?>
					<?php endif;?>
                    <?php if(isset($_GET['action']) && $_GET['action']=='change_password') :?>
                        <?php if($loggedout==true) : ?>
                        <p class="text-success">Your password was successfully changed. Please log in below.</p>
                        <?php endif;?>
                    <?php endif;?>
                    <?php if(isset($_GET['register']) && $_GET['register']=='success') : ?>
					<p class="text-success">Registration was successful. Please log in below.</p>
					<?php endif;?>
					<?php if(isset($_GET['msg']) && $_GET['msg']=='login') : ?>
					<p class="text-primary">You must log in to view this content. Please log in below.</p>
					<?php endif;?>

					<form id="loginForm" role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
						<fieldset>
							<h4>Username</h4>
							<div class="form-group">
								<input class="form-control" placeholder="Roll no." name="username" type="text" minlength="3" autofocus required>
							</div>
							<h4>Password</h4>
							<div class="form-group">
								<input class="form-control" placeholder="Password" name="password" type="password" value="" required>
							</div>
							<div class="checkbox">
								<label>
									<input name="remember" type="checkbox" value="Remember Me">Remember Me
								</label>
							</div>
							<!-- Change this to a button or input when using this as a form -->
							<input type="submit" value="Sign In" class="btn btn-lg btn-success btn-block" />
						</fieldset>
					</form>
				</div>
			</div>
		</div>

	</div>
</div>
<!-- jQuery -->
<script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>

<!-- Bootstrap Core JavaScript -->
<script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>

<!-- Custom Theme JavaScript -->
<script src="../dist/js/sb-admin-2.js"></script>

</body>

</html>
