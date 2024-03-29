<?php 
    require('includes/config.php');
    require('includes/login_db.php');

    if(!($obj->check_login())) {
        $obj->redirect_login('index.php');
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

    <link rel="shortcut icon" href="images/favicon.ico" />
    <title>Home</title>

    <!-- Bootstrap Core CSS -->
    <link href="bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
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
                <a class="navbar-brand" href=""><strong>StudentLink</strong></a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="pages/profile.php"><i class="fa fa-user fa-fw"></i> <?php echo "$row[fname] $row[lname]"?></a>
                        </li>
                        <li>
                            <a href="pages/departments.php"><i class="glyphicon glyphicon-wrench"></i> &nbsp&nbspDepartments</a>
                        </li>
                        <li>
                            <a href="pages/users.php"><i class="glyphicon glyphicon-wrench"></i> &nbsp&nbspUsers</a>
                        </li>
                        <li>
                            <a href="pages/colleges.php"><i class="glyphicon glyphicon-wrench"></i> &nbsp&nbspColleges</a>
                        </li>
                        <li><a href="pages/settings.php"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="pages/login.php?action=logout"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
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
                            <div>
                                <br />
                                <br />
                            </div>
                        </li>                       
                        <li>
                            <a href=""><i class="glyphicon glyphicon-home"></i> &nbsp&nbspHome</a>
                        </li>
                        <li>
                            <a href="pages/courses.php"><i class="glyphicon glyphicon-book"></i> &nbsp&nbspCourses</a>
                        </li>
                        <li>
                            <a href="pages/instructors.php"><i class="glyphicon glyphicon-user"></i> &nbsp&nbspInstructors</a>
                        </li>
                        <li>
                            <a href="pages/departments.php"><i class="glyphicon glyphicon-folder-open"></i> &nbsp&nbspDepartments</a>
                        </li>
                        <li>
                            <a href="pages/users.php"><i class="glyphicon glyphicon-user"></i> &nbsp&nbspUsers</a>
                        </li>
                        <li>
                            <a href="pages/colleges.php"><i class="glyphicon glyphicon-picture"></i> &nbsp&nbspColleges</a>
                        </li>
                        <li>
                            <a href="pages/settings.php"><i class="glyphicon glyphicon-wrench"></i> &nbsp&nbspSettings</a>
                        </li>
                        <li>
                        	<div>
                        		<br />
                        		<br />
                        	</div>
                        </li>
                        <li>
                            <a href="pages/login.php?action=logout"><i class="glyphicon glyphicon-off"></i> &nbsp&nbspLog-out</a>
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
                    <h1 class="page-header">Dashboard</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
            	<div class="col-lg-12">
            		<div class="panel panel-primary">
            			<div class="panel-heading">
            				Welcome <?php echo "$row[fname]"?>, Here you can...
            			</div>
            			<div class="panel-body">
            				<div class="row">
            					<div class="col-lg-4">
            						<div class="panel panel-info">
            							<div class="panel-heading">View your profile</div>
            							<div class="panel-body">
            								<p> You can view and edit your profile by clicking the links below:</p>
            								<p><a href="pages/profile.php" class="btn btn-default"> View profile </a></p>
            								<p><a href="pages/edit_profile.php" class="btn btn-default">Edit profile</a></p>
            							</div>
            						</div>
						</div>
						<div class="col-lg-4">
            						<div class="panel panel-yellow">
            							<div class="panel-heading">View your Instructors</div>
            							<div class="panel-body">
            								<p> You can view your Instructors here:</p>
            								<p><a href="pages/instructors.php" class="btn btn-default"> Instructor Details </a></p>
            							</div>
            						</div>
            					</div>
            				</div>
            				<!--./row-->
            				<div class="row">
            					<div class="col-lg-4">
            						<div class="panel panel-success">
            							<div class="panel-heading">View your Courses</div>
            							<div class="panel-body">
            								<p> You can view your courses here:</p>
            								<p><a href="pages/courses.php" class="btn btn-default"> Course Details </a></p>
            							</div>
            						</div>
            					</div>
            				</div>
            					
            			</div>
            		</div>
            	</div>
            </div>
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="dist/js/sb-admin-2.js"></script>

</body>

</html>
