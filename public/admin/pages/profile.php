<?php 
require('../includes/config.php');
require('../includes/login_db.php');

if(!($obj->check_login())) {
	$obj->redirect_login('pages/profile.php');
};

$row = $obj->give_row();
$departments = $obj->getDepartments();
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
    <title>Profile</title>

    
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
		    	<h1 class="page-header">Profile</h1>
			</div>
			<!-- /.col-lg-12 -->
	    </div>
	    <!-- /.row -->
	    <div class="row">
			<div class="col-md-7">
				<div class="panel panel-green">
					<div class="panel-heading">
						View your profile here
					</div>
					<div class="panel-body">
						<form role="form" class="form-horizontal" action="" method="post" id="myForm">
							<?php if(isset($_GET['update']) && $_GET['update']=="success") : ?>
								<fieldset>
									<br />
									<p class="text-success">Your profile was updated successfully.</p>
									<br />
								</fieldset>
							<?php endif;?>
							<fieldset>
								<legend>Login Information</legend>
								<div class="form-group">
									<label class="col-sm-4 control-label">Username: </label>
									<div class="col-sm-8">
										<input class="form-control" type="text" name="username" value ="<?= $row['username']?>" readonly autofocus/>
									</div>
								</div>
							</fieldset>
							<br />
							<fieldset>
								<legend>Personal Information</legend>
								<div class="form-group">
									<label class="col-sm-4 control-label">First Name: </label>
									<div class="col-sm-8">
										<input class="form-control" type="text" name="fname" value="<?= $row['fname']?>" readonly/>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-4 control-label">Last Name: </label>
									<div class="col-sm-8">
										<input class="form-control" type="text" name="lname" value="<?= $row['lname']?>" readonly/>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-4 control-label">Sex: </label>
									<div class="col-sm-8">
									    <label class="radio-inline">
	                                        <input type="radio" name="sex" value="Male" <?php if($row['sex']=="Male") echo 'checked';?> disabled>Male
	                                    </label>
	                                    <label class="radio-inline">
	                                        <input type="radio" name="sex" value="Female" <?php if($row['sex']=="Female") echo 'checked';?> disabled>Female
	                                    </label>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-4 control-label">Date of Birth:</label>
									<div class="col-sm-8">
										<div class="col-xs-4">
											<select class="form-control" name="date_dob">
												<option value="<?php echo "$row[date_dob]" ?>"><?php echo "$row[date_dob]" ?></option>
											</select>
										</div>
										<div class="col-xs-4">
											<select class="form-control" name="month_dob">
												<option value="<?php echo "$row[month_dob]" ?>"><?php echo "$row[month_dob]" ?></option>
											</select>
										</div>
										<div class="col-xs-4">
											<select class="form-control" name="year_dob">
												<option value="<?php echo "$row[year_dob]" ?>"><?php echo "$row[year_dob]" ?></option>				
											</select>
										</div>
									</div>
								</div>
							</fieldset>
							<br />
							<fieldset>
								<legend>Parents'/Guardian's Information</legend>
								<div class="form-group">
									<label class="col-sm-4 control-label">Father's Name: </label>
									<div class="col-sm-8">
										<input class="form-control" type="text" name="father_name" value="<?= $row['father_name']?>" readonly/>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-4 control-label">Mother's Name: </label>
									<div class="col-sm-8">
										<input class="form-control" type="text" name="mother_name" value="<?= $row['mother_name']?>" readonly/>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-4 control-label">Contact Number: </label>
									<div class="col-sm-8">
										<input class="form-control" type="text" name="contact_number" value="<?= $row['contact_number']?>" readonly/>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-4 control-label">Address: </label>
									<div class="col-sm-8">
										<input class="form-control" type="text" name="address_1" value="<?= $row['address_1']?>" readonly/>
										<input class="form-control" type="text" name="address_2" value="<?= $row['address_2']?>" readonly/>
									</div>
								</div>
							</fieldset>
							<br />
							<fieldset>
								<legend>Academic Information</legend>
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
									<label class="col-sm-4 control-label">Programme: </label>
									<div class="col-sm-5">
										<select class="form-control" name="programme">
											<option value="<?= $row['programme']?>"><?= $row['programme']?></option>
										</select>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-4 control-label">Batch: </label>
									<div class="col-sm-3">
										<select class="form-control" name="batch">
											<option value=<?= $row['batch']?>><?= $row['batch']?></option>
										</select>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-4 control-label">Semester: </label>
									<div class="col-sm-3">
										<select class="form-control" name="semester">
											<option value=<?= $row['semester']?>><?= $row['semester']?></option>
										</select>
									</div>
								</div>
							</fieldset>
						</form>
						<!--row(nested)-->
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

    
<?php include("./template/javascript.php") ?>

</body>

</html>
