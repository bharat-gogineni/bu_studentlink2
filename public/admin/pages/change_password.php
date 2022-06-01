<?php 
require('../includes/config.php');
require('../includes/login_db.php');

if(!($obj->check_login())) {
	$obj->redirect_login('pages/change_password.php');
};

$change = $obj->change_password();

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
    <title>Password Change</title>

   
    <?php include("./template/styles.php") ?>
</head>

<body>

    <div id="wrapper">

	<!-- Navigation -->
	<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0; background-color: #d0e1e1">
	    <div class="navbar-header">
		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
		    <span class="sr-only">Toggle navigation</span>
		    <span class="icon-bar"></span>
		    <span class="icon-bar"></span>
		    <span class="icon-bar"></span>
		</button>
		<a class="navbar-brand" href="../index.php"><strong>StudentLink</strong></a>
	    </div>
	    <!-- /.navbar-header -->

	    <ul class="nav navbar-top-links navbar-right">
		<li class="dropdown">
		    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
			<i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
		    </a>
		    <ul class="dropdown-menu dropdown-user">
			<li><a href="profile.php"><i class="fa fa-user fa-fw"></i> <?php echo "$row[fname] $row[lname]"?></a>
			</li>
			<li><a href="settings.php"><i class="fa fa-gear fa-fw"></i> Settings</a>
			</li>
			<li class="divider"></li>
			<li><a href="login.php?action=logout"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
			</li>
		    </ul>
		    <!-- /.dropdown-user -->
		</li>
		<!-- /.dropdown -->
	    </ul>
	    <!-- /.navbar-top-links -->

	    <div class="navbar-default sidebar" role="navigation">
		<div class="sidebar-nav navbar-collapse">
		    <ul class="nav" id="side-menu">
			<li>
				<a href="http://iiita.ac.in"><img src="../images/iiita.png" height="70px" width="66.1px"/></a>
			</li>
			<li>
			    <div>
				<br />
				<br />
			    </div>
			</li>                       
			<li>
			    <a href="../index.php"><i class="glyphicon glyphicon-home"></i> &nbsp&nbspHome</a>
			</li>
			<li>
			    <a href="courses.php"><i class="glyphicon glyphicon-book"></i> &nbsp&nbspCourses</a>
			</li>
			<li>
			    <a href="instructors.php"><i class="glyphicon glyphicon-user"></i> &nbsp&nbspInstructors</a>
			</li>
			<li>
				<a href="#"><i class="glyphicon glyphicon-download-alt"></i> &nbsp&nbspDownloads<span class="fa arrow"></span></a>
				<ul class="nav nav-second-level">
					<li>
						<a href="../files/time_table.pdf"><i class="glyphicon glyphicon-calendar"></i> &nbsp&nbspTime Table</a>
					</li>
					<li>
						<a href="../files/academic_calender.pdf"><i class="glyphicon glyphicon-list-alt"></i> &nbsp&nbspAcademic Calender</a>
					</li>
					<li>
						<a href="../files/fee_structure.pdf"><i class="glyphicon glyphicon-usd"></i> &nbsp&nbspFee Structure</a>
					</li>
					<li>
						<a href="../files/ug_manual.pdf"><i class="glyphicon glyphicon-file"></i> &nbsp&nbspUG manual</a>
					</li>
					<li>
						<a href="../files/pg_manual.pdf"><i class="glyphicon glyphicon-education"></i> &nbsp&nbspPG manual</a>
					</li>
					<li>
						<a href="../files/transport_schedule.pdf"><i class="glyphicon glyphicon-bed"></i> &nbsp&nbspTransport Schedule</a>
					</li>
					<li>
						<a href="../files/telephone_directory.pdf"><i class="glyphicon glyphicon-phone-alt"></i> &nbsp&nbspTelephone Directory</a>
					</li>
				</ul>
			</li>
			<li>
			    <a href="settings.php"><i class="glyphicon glyphicon-wrench"></i> &nbsp&nbspSettings</a>
			</li>
			<li>
				<div>
					<br />
					<br />
				</div>
			</li>
			<li>
			    <a href="login.php?action=logout"><i class="glyphicon glyphicon-off"></i> &nbsp&nbspLog-out</a>
			</li>

		    </ul>
		</div>
		<!-- /.sidebar-collapse -->
	    </div>
	    <!-- /.navbar-static-side -->
	</nav>

	<!-- Page Content -->
	<div id="page-wrapper">
	    <div class="row">
			<div class="col-lg-12">
		    	<h1 class="page-header">Security and Passwords</h1>
			</div>
			<!-- /.col-lg-12 -->
	    </div>
	    <!-- /.row -->
	    <div class="row">
			<div class="col-md-4 col-md-offset-2">
				<div class="panel panel-default">
					<div class="panel-heading">
						Change your password here
					</div>
					<div class="panel-body">
						<form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
							<fieldset>
								<?php if($change == 'invalid') echo "<p class=\"text-danger\">Password incorrect</p>";
										else if($change == 'match_error') echo "<p class=\"text-danger\">Passwords don't match</p>"	
								?>
								<label class="control-label">Current Password</label>
								<div class="form-group">
									<input class="form-control" placeholder="Current Password" name="current_password" type="password" value="" required>
								</div>
								<label class="control-label">New Password</label>
								<div class="form-group">
									<input class="form-control" placeholder="New Password" name="new_password" type="password" value="" required>
								</div>
								<label class="control-label">Confirm Password</label>
								<div class="form-group">
									<input class="form-control" placeholder="Confirm Password" name="confirm_password" type="password" value="" required>
								</div>
								<input type="hidden" name="date" value="<?php echo time(); ?>" />
								<!-- Change this to a button or input when using this as a form -->
								<br />
								<div class="row">	
									<div class="col-sm-offset-2 col-sm-8">
										<input type="submit" value="Update" class="btn btn-lg btn-success btn-block" />
									</div>
								</div>
								<br />
								<div class="row">	
									<div class="col-sm-offset-3 col-sm-6">
										<p><a href="../index.php" class="btn btn-warning btn-block" >Cancel</a></p>
									</div>						
								</div>
							</fieldset>
						</form>
					</div>
					<!--panel-body-->
				</div>
				<!--panel panel-default-->
			</div>
			<!--col-md-7-->
		</div>
		<!--row-->
	</div>
	<!--page wrapper-->
</div>
<!--wrapper -->

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