<?php 
    require('../includes/config.php');
    require('../includes/login_db.php');

    if(!($obj->check_login())) {
        $obj->redirect_login('pages/courses.php');
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
    <title>Announcements</title>
    <?php include("./template/styles.php") ?>
</head>
<body>

    <div id="wrapper">

        
        <?php include("./template/menu.php") ?>

        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Announcements</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Announcement Catalog:
                        </div>
                        <div class="panel-body">
                            
                    <?php if(isset($_GET['insert']) && $_GET['insert']=='success') : ?>
					<p class="text-success">Announcement creation was successful.</p>
					<?php endif;?>
                            <button class="btn"><a href="addcourse.php">Add a new Announcement</a></button>
                            <br />
                            <?php
                                $results = $obj->give_all_courses();
                                if($results) {
                                    $num_results = $results->num_rows;
                                }
                                else {
                                    die("cannot execute queries");
                                }
                                if($num_results == 0) {
                                    echo "<h4>No courses found</h4>";
                                }
                                else {
                                    echo "<div class=\"table-responsive\">
                                            <table id=\"table_id\">
                                                <thead>
                                                    <tr>
                                                        <th> Announcement ID </th>
                                                        <th> Announcement Name </th>
                                                        <th> Announcement Details </th>
                                                        <th> Active </th>
                                                        <th> Actions </th>
                                                    </tr>
                                                </thead>
                                                <tbody>";

                                    for($i = 1; $i<=$num_results; $i++) {
                                        $row = $results->fetch_row();
                                        echo "<tr>
                                            <td>$row[0]</td>
                                            <td>$row[1]</td>
                                            <td>$row[4]</td>
                                            <td>$row[2]</td>
                                            <td>$row[3]</td>
                                            <td><a href=\"announcement_profile.php?id_user='".$row[0]."'\" class=\"btn btn-success\"><i class=\"icon-user icon-white\"></i> View</a> <a href=\"announcement_edit.php?id_user='".$row[0]."'\" class=\"btn btn-info\"><i class=\"icon-edit icon-white\"></i> Edit</a> <a id=\"'".$row[0]."'\" \" class=\"btn btn-danger\" href=\"#\"><i class=\"icon-trash icon-white\"></i> Delete</a>
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
                        url: "deleteannouncement.php",
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
