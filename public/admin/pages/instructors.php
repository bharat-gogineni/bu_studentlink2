<?php 
    require('../includes/config.php');
    require('../includes/login_db.php');

    if(!($obj->check_login())) {
        $obj->redirect_login('pages/instructors.php');
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
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">Instructors
                        </div>
                        <div class="panel-body">
                            <br />
                            <?php
                                $results = $obj->give_instructors();
                                if($results) {
                                    $num_results = $results->num_rows;
                                }
                                else {
                                    die("cannot execute queries");
                                }
                                if($num_results == 0) {
                                    echo "<h4>No instructors found</h4>";
                                }
                                else {
                                    echo "<div class=\"table-responsive\">
                                            <table id=\"table_id\" class=\"table table-bordered table-striped\">
                                                <thead>
                                                    <tr>
                                                        <th> Instructor Name </th>
                                                        <th> Contact e-mail </th>
                                                        <th> Profile link </th>
                                                    </tr>
                                                </thead>
                                                <tbody>";

                                    for($i = 1; $i<=$num_results; $i++) {
                                        $row = $results->fetch_row();
                                        echo "<tr>
                                            <td>$row[0]</td>
                                            <td>$row[1]</td>
                                            <td><a href =\"$row[2]\">Link</a></td>
                                        </tr>";
                                    }
                                    echo "</tbody>
                                        </table>
                                        </div>";
                                }
                            ?>
                        </div>
                    </div>
                </div>
                <!--/.col-lg-12-->
            </div>
            <!--./row-->           
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
