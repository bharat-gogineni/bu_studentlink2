<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0; background-color: #d0e1e1">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="../index.php"><strong>StudentLink</strong></a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="profile.php"><i class="fa fa-user fa-fw"></i> <?php echo "$row[fname] $row[lname]"?></a>
                        </li>
                        <li><a href="settings.php"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="login.php?action=logout"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
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
                            <a href="../index.php"><i class="glyphicon glyphicon-home"></i> &nbsp&nbspHome</a>
                        </li>
                        <li>
                            <a href="courses.php"><i class="glyphicon glyphicon-book"></i> &nbsp&nbspCourses</a>
                        </li>
                        <li>
                            <a href="instructors.php"><i class="glyphicon glyphicon-user"></i> &nbsp&nbspInstructors</a>
                        </li>
                        <li>
                            <a href="departments.php"><i class="glyphicon glyphicon-folder-open"></i> &nbsp&nbspDepartments</a>
                        </li>
                        <li>
                            <a href="users.php"><i class="glyphicon glyphicon-user"></i> &nbsp&nbspUsers</a>
                        </li>
                        <li>
                            <a href="announcements.php"><i class="glyphicon glyphicon-film"></i> &nbsp&nbspAnnouncement</a>
                        </li>
                        <li>
                            <a href="colleges.php"><i class="glyphicon glyphicon-picture"></i> &nbsp&nbspColleges</a>
                        </li>
                        <li>
                            <a href="settings.php"><i class="glyphicon glyphicon-wrench"></i> &nbsp&nbspSettings</a>
                        </li>
                        <li>
                        	<div>
                        		<br />
                        		<br />
                        	</div>
                        </li>
                        <li>
                            <a href="login.php?action=logout"><i class="glyphicon glyphicon-off"></i> &nbsp&nbspLog-out</a>
                        </li>
                        
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>