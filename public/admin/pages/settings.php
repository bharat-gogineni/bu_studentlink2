<?php 
require('../includes/config.php');
require('../includes/login_db.php');

if(!($obj->check_login())) {
	$obj->redirect_login('pages/settings.php');
};

$row = $obj->give_row();
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
    <title>Settings</title>

    
    <?php include("./template/styles.php") ?>
</head>

<body>

    <div id="wrapper">

	<!-- Navigation -->
	<?php include("./template/menu.php") ?>

	<!-- Page Content -->
	<div id="page-wrapper">
	    <div class="row">
		<div class="col-lg-12">
		    <h1 class="page-header">Settings</h1>
		</div>
		<!-- /.col-lg-12 -->
	    </div>
	    <!-- /.row -->
	    <div class="row">
			<div class="col-md-4">
				<div class="panel panel-success">
					<div class="panel-heading">Edit your profile</div>
					<div class="panel-body">
						<p>You can edit your profile here:</p>
						<a href="edit_profile.php" class="btn btn-primary">Edit Profile</a>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-4">
				<div class="panel panel-info">
					<div class="panel-heading">Change your Password</div>
					<div class="panel-body">
						<p>You can change your password by clicking the link below:</p>
						<a href="change_password.php" class="btn btn-warning">Change Password</a>
					</div>
				</div>
			</div>
		</div>	
	</div>
	<!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->

   
    <?php include("./template/javascript.php") ?>

</body>

</html>
