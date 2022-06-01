<?php 
    require('../includes/config.php');
    require('../includes/login_db.php');

    if(!($obj->check_login())) {
        $obj->redirect_login('pages/blank.php');
    };
    
    if(isset($_GET['id'])){
        $id = isset($_GET['id'])?$_GET['id']:null;
        $currentVal = $obj->get_row($id,'course_id','course');
    }
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
                    <h1 class="page-header"><?php echo $currentVal['course_id']." - ".$currentVal['course_name']; ?></h1>
                    <p><?php echo $currentVal['course_details']; ?></p>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <?php include("./template/javascript.php") ?>
</body>

</html>
