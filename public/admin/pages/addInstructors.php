<?php 
    require('../includes/config.php');
    require('../includes/login_db.php');

    if(!($obj->check_login())) {
        $obj->redirect_login('pages/blank.php');
    };
    
    $row = $obj->give_row();
    $departments = $obj->getDepartments();
    $instructors = $obj->getInstructors();
    $colleges = $obj->getColleges();
	$obj->insert_course('pages/courses.php');
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
    <title>Instructors</title>
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
                    <h1 class="page-header">Add Instructor</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                    <?php if(isset($_GET['insert']) && $_GET['insert']=='success') : ?>
					<p class="text-success">Instructor creation was successful.</p>
					<?php endif;?>
                            <button class="btn"><a href="addcourse.php">Add a new Instructor</a></button>
            <form role="form" class="form-horizontal" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
							<fieldset>
								<legend>Instructor Information</legend>
								<div class="form-group">
									<label class="col-sm-4 control-label">Instructor Name: </label>
									<div class="col-sm-8">
										<input class="form-control" placeholder="John Doe" type="text" name="instructor_name" autofocus required/>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-4 control-label">Contact Email Details: </label>
									<div class="col-sm-8">
										<input class="form-control" placeholder="eg. abc@gmail.com" type="email" name="contact_email" value="" required/>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-4 control-label">Profile Link: </label>
									<div class="col-sm-8">
										<input class="form-control" placeholder="eg. google.com" type="text" name="profile_link" value="" required/>
									</div>
								</div>
							</fieldset>
                            <div class="form-group">
									<div class="col-sm-offset-3 col-sm-7">
										<input type="submit" value="Add Instructor" class="btn btn-lg btn-success btn-block"/>
									</div>
								</div>
							<br />
						</form>
            </div>
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    
    <?php include("./template/javascript.php") ?>

</body>

</html>
