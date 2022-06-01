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
    if(isset($_GET['id'])){
        $id = isset($_GET['id'])?$_GET['id']:null;
        $currentVal = $obj->get_row($id,'course_id','course');
    }
	$obj->update_course('pages/courses.php');
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
    <title>Courses</title>
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
                    <h1 class="page-header">Edit Course</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
            <form role="form" class="form-horizontal" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
							<fieldset>
								<legend>Course Information</legend>
                                <div class="form-group">
									<div class="col-sm-8">
										<input class="form-control"  value="<?php echo $currentVal['course_id']; ?>" placeholder="eg. iit2014001" type="hidden" name="course_id" autofocus required/>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-4 control-label">Course Name: </label>
									<div class="col-sm-8">
										<input class="form-control" value="<?php echo $currentVal['course_name']; ?>" placeholder="Biology" type="text" name="course_name" autofocus required/>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-4 control-label">Course Details: </label>
									<div class="col-sm-8">
										<input class="form-control" value="<?php echo $currentVal['course_details']; ?>" placeholder="eg. John" type="textarea" name="course_details" value="" required/>
									</div>
								</div>
                                <div class="form-group">
									<label class="col-sm-4 control-label">Department: </label>
									<div class="col-sm-8">
                                    <select class="form-control" name="department_id">
                                    <?php
                                        foreach($departments as $dept){
                                            echo "<option ".(($dept['id']==$currentVal['department_id'])? 'selected':'')." value='".$dept['id']."'> ".$dept['name']." </option>";
                                        }
                                    ?>
                                    </select>
                                    </div>
                                </div>
                                <div class="form-group">
									<label class="col-sm-4 control-label">Instructor: </label>
									<div class="col-sm-8">
                                    <select class="form-control" name="instructor_id">
                                    <?php
                                        foreach($instructors as $inst){
                                            echo "<option ".(($inst['instructor_id']==$currentVal['instructor_id'])? 'selected':'')." value='".$inst['instructor_id']."'> ".$inst['instructor_name']." </option>";
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
                                            echo "<option ".(($college['id']==$currentVal['college_id'])? 'selected':'')." value='".$college['id']."'> ".$college['name']." </option>";
                                        }
                                    ?>
                                    </select>
                                    </div>
                                </div>
							</fieldset>
                            <div class="form-group">
									<div class="col-sm-offset-3 col-sm-7">
										<input type="submit" value="Edit Course" class="btn btn-lg btn-success btn-block"/>
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
