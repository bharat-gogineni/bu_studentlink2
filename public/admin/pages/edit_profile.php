<?php 
require('../includes/config.php');
require('../includes/login_db.php');

if(!($obj->check_login())) {
	$obj->redirect_login('pages/edit_profile.php');
};

$row = $obj->give_row();

//call function here
$obj->update_personal($row['username']);

$departments = $obj->getDepartments();
if($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST)) {
	$row = $_POST;
}

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
    <title>Edit Profile</title>

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
		    	<h1 class="page-header">Edit Profile</h1>
			</div>
			<!-- /.col-lg-12 -->
	    </div>
	    <!-- /.row -->
	    <div class="row">
			<div class="col-md-7 col-md-offset-1">
            	<div class="panel panel-default">
                	<div class="panel-heading">
                    	<h3 class="panel-title">Update your info</h3>
                	</div>
					<div class="panel-body">
						<form role="form" class="form-horizontal" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" >
							<fieldset>
								<legend>Login Information</legend>
								<div class="form-group">
									<label class="col-sm-4 control-label">Username: </label>
									<div class="col-sm-8">
										<input class="form-control" type="text" name="username" value="<?= $row['username']?>" autofocus readonly/>
									</div>
							</fieldset>
							<br />
							<fieldset>
								<legend>Personal Information</legend>

								<div class="form-group">
									<label class="col-sm-4 control-label">First Name: </label>
									<div class="col-sm-8">
										<input class="form-control" type="text" name="fname" value="<?= $row['fname']?>" required/>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-4 control-label">Last Name: </label>
									<div class="col-sm-8">
										<input class="form-control" type="text" name="lname" value="<?= $row['lname']?>" />
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-4 control-label">Sex: </label>
									<div class="col-sm-8">
									    <label class="radio-inline">
                                            <input type="radio" name="sex" value="Male" <?php if($row['sex']=="Male") echo 'checked';?>>Male
                                        </label>
                                        <label class="radio-inline">
                                            <input type="radio" name="sex" value="Female" <?php if($row['sex']=="Female") echo 'checked';?>>Female
                                        </label>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-4 control-label">Date of birth: </label>
									<div class="col-sm-8">
										<div class="col-xs-4">
											<select class="form-control" name="date_dob">
												<option value="null">DD</option>
												<?php
													for($i=1; $i<=31; $i++) {
														if($i==$row['date_dob'])
															printf("<option value=\"%02u\" selected> %02u </option>",$i, $i);
														else
															printf("<option value=\"%02u\"> %02u </option>",$i, $i);
													}
												?>
											}
											</select>
										</div>
										<div class="col-xs-4">
											<select class="form-control" name="month_dob">
												<option value="null">MM</option>
												<?php
													for($i=1; $i<=12; $i++) {
														if($i==$row['month_dob'])
															printf("<option value=\"%02u\" selected> %02u </option>",$i, $i);
														else
															printf("<option value=\"%02u\" > %02u </option>",$i, $i);
													}
												?>
											</select>
										</div>
										<div class="col-xs-4">
											<select class="form-control" name="year_dob">
												<option value="null">YYYY</option>
												<?php
													for($i=2006; $i>=1985; $i--) {
														if($i==$row['year_dob'])
															echo "<option value=\"$i\" selected> $i </option>";
														else
															echo "<option value=\"$i\" > $i </option>";
													}
												?>
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
										<input class="form-control" type="text" name="father_name" value="<?= $row['father_name']?>" required/>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-4 control-label">Mother's Name: </label>
									<div class="col-sm-8">
										<input class="form-control" type="text" name="mother_name" value="<?= $row['mother_name']?>" required/>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-4 control-label">Contact Number: </label>
									<div class="col-sm-8">
										<input class="form-control" type="text" name="contact_number" value="<?= $row['contact_number']?>" required	/>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-4 control-label">Address: </label>
									<div class="col-sm-8">
										<input class="form-control" type="text" name="address_1" value="<?= $row['address_1']?>"/>
										<input class="form-control" type="text" name="address_2" value="<?= $row['address_2']?>"/>
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
											<option value="B.Tech" <?php if($row['programme']=="B.Tech") echo 'selected';?>>B.Tech</option>
											<option value="M.tech" <?php if($row['programme']=="M.Tech") echo 'selected';?>>M.Tech</option>
											<option value="B.Tech-M.Tech Dual" <?php if($row['programme']=="B.Tech-M.Tech Dual") echo 'selected';?>>B.Tech-M.Tech Dual</option>
											<option value="P.h.d" <?php if($row['programme']=="P.h.d") echo 'selected';?>>P.h.d</option>
										</select>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-4 control-label">Batch: </label>
									<div class="col-sm-3">
										<select class="form-control" name="batch">
											<?php
												for($i=2016; $i>=2000; $i--) {
													if($row['batch']==$i)
														echo "<option value=\"$i\" selected> $i </option>";
													else
														echo "<option value=\"$i\" > $i </option>";
												}
											?>
										</select>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-4 control-label">Semester: </label>
									<div class="col-sm-3">
										<select class="form-control" name="semester"><?php 
											for($i=1; $i<=8; $i++) {
												if($row['semester']==$i)
													echo "<option value=\"$i\" selected> $i </option>";
												else
													echo "<option value=\"$i\" > $i </option>";
											}
										?>
										</select>
									</div>
								</div>
								<input type="hidden" name="date" value="<?php echo time(); ?>" />
								<div class="form-group"></div>
								<div class="form-group">
									<div class="col-sm-offset-3 col-sm-7">
										<input type="submit" value="Update" class="btn btn-lg btn-success btn-block"/>
									</div>
								</div>
								<div class="form-group">
									<div class="col-sm-offset-4 col-sm-5">
										<p><a href="profile.php" class="btn btn-lg btn-warning btn-block">Cancel</a></p>
									</div>
								</div>
							</fieldset>
						</form>
					</div>
				</div>
		</div>
		<!--row-->
	</div>
	<!--page wrapper-->
</div>
<!--wrapper -->

    
<?php include("./template/javascript.php") ?>

</body>

</html>
