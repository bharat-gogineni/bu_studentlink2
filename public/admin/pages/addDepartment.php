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
	$obj->insert_department('pages/departments.php');
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
    <title>Departments</title>
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
                    <h1 class="page-header">Add Department</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
            <form role="form" class="form-horizontal" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
							<fieldset>
								<legend>Department Information</legend>
								<div class="form-group">
									<label class="col-sm-4 control-label">Department Name: </label>
									<div class="col-sm-8">
										<input class="form-control" placeholder="Biology" type="text" name="course_name" autofocus required/>
									</div>
								</div>
                                <div class="form-group">
									<label class="col-sm-4 control-label">Manager: </label>
									<div class="col-sm-8">
                                    <select class="form-control" name="manager_id">
                                    <?php
                                        foreach($users as $user){
                                            echo "<option value='".$user['id']."'> ".$user['name']." </option>";
                                        }
                                    ?>
                                    </select>
                                    </div>
                                </div>
                                <div class="form-group">
									<label class="col-sm-4 control-label">College: </label>
									<div class="col-sm-8">
                                    <select class="form-control" name="college_id">
                                    <?php
                                        foreach($colleges as $college){
                                            echo "<option value='".$college['id']."'> ".$college['name']." </option>";
                                        }
                                    ?>
                                    </select>
                                    </div>
                                </div>
							</fieldset>
                            <div class="form-group">
									<div class="col-sm-offset-3 col-sm-7">
										<input type="submit" value="Add Department" class="btn btn-lg btn-success btn-block"/>
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
