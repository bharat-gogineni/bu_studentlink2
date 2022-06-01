<?php 
    require('../includes/config.php');
    require('../includes/login_db.php');

    if(!($obj->check_login())) {
        $obj->redirect_login('pages/blank.php');
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
                    <h1 class="page-header">Courses</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <?php include("./template/javascript.php") ?>
    <script>
        $(document).ready( function () {
            $('#table_id').DataTable();
            $(document).delegate('.btn-danger', 'click', function() { 
                if (confirm("Do you really want to delete User's record?"))
                {
                    var id = $(this).attr('id');
                    var data = 'recordToDelete='+ id;
                    var parent = $(this).parent().parent();
                    $.ajax({
                        type: "POST",
                        url: "deletecourse.php",
                        data: data,
                        cache: false,
                        success: function()
                        {
                            parent.fadeOut('slow', function() {$(this).remove();});
                        }
                    });                
                }
            });
            $('table#userTabla tr:odd').css('background',' #FFFFFF');
});
    </script>    
</body>

</html>
