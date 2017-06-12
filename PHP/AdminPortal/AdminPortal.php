<?php
error_reporting(0);
session_start();
if(!isset($_SESSION['Login'])){
    header('Location:AdminLogin.php');
}
include "../connection.php";
include "Admin_processing.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Admin Portal</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"
          integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css"
          integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"
            integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS"
            crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js">
        <
        script
        src = "//cdnjs.cloudflare.com/ajax/libs/jquery.matchHeight/0.7.0/jquery.matchHeight-min.js" ></script>
    <!-- Bootstrap Styles-->
    <link href="../../CSS/bootstrap.css" rel="stylesheet"/>
    <!-- FontAwesome Styles-->
    <link href="../../CSS/font-awesome.css" rel="stylesheet"/>
    <!-- Morris Chart Styles-->
    <!-- Custom Styles-->
    <link href="../../CSS/custom-styles.css" rel="stylesheet"/>
    <!-- Google Fonts-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'/>
</head>

<body>
<div id="wrapper">
    <nav class="navbar navbar-default top-navbar" role="navigation">
        <div class="navbar-header">
            <a class="navbar-brand" href="Profile.php" id="sidebar-title">Admin Portal</a>
        </div>
        <ul class="nav navbar-top-links navbar-right">
            <!-- /.dropdown -->
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                    <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                </a>
                <ul class="dropdown-menu dropdown-user">
                    <li><a href="Profile.php"><i class="fa fa-user fa-fw"></i>Profile</a>
                    </li>
                    <li><a href="ChangePassword.php"><i class="fa fa-lock fa-fw"></i> Change Password</a>
                    </li>
                    <li class="divider"></li>
                    <li><a href="Logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                    </li>
                </ul>
                <!-- /.dropdown-user -->
            </li>
            <!-- /.dropdown -->
        </ul>
    </nav>
    <!--/. NAV TOP  -->
    <nav class="navbar-default navbar-side" role="navigation">

        <div class="sidebar-collapse">
            <ul class="nav" id="main-menu">
                <li>
                    <a href="Profile.php"><i class="fa fa-"></i>Profile</a>
                </li>
                <li>
                    <a class="active-menu" href="AdminPortal.php"><i class="fa fa-"></i>Home</a>
                </li>
                <li>
                    <a href="List_Employees.php"><i class="fa fa-"></i> Employee's List</a>
                </li>
                <li>
                    <a href="AddEmployeeAccount.php"><i class="fa fa-"></i> Add Employee Account</a>
                </li>
                <li>
                    <a href="Logout.php"><i class="fa fa-"></i> Logout</a>
                </li>
            </ul>

        </div>

    </nav>
    <!-- /. NAV SIDE  -->

    <div id="page-wrapper">
        <div class="header row">
            <div class="page-header row">
                <div class="col-md-3 col-xs-4 col-sm-4">
                    <a href="#">
                        <img id="profile_pic" src="../../IMAGES/<?php echo "{$_SESSION['UserPic']}";?>" alt="profilepic"
                             style="width: 120px; height: 120px" ;>
                    </a>
                </div>
                <div class="col-md-6 col-xs-8 col-sm-8">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover">
                            <tr>
                                <td>Name</td>
                                <td><?php echo "{$_SESSION['name'] }"; ?></td>
                            </tr>
                            <tr style="background-color: #f36a5a">
                                <td>Rank</td>
                                <td><?php echo "{$_SESSION['role'] }";?></td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td><?php echo "{$_SESSION['email'] }";?></td>
                            </tr>
                        </table>
                    </div>
                </div>

            </div>
            <ol class="breadcrumb">
                <li><a href="../../index.html">Home</a></li>
                <li><a href="AdminLogin.php">Login</a></li>
                <li class="active"> Admin Home</li>
            </ol>
        </div>
        <div id="page-inner">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="board">
                        <div class="panel panel-primary">
                            <?php
                            if ($_SESSION['InsertHostel'] == "inserted") {
                                echo "<div class=\"alert alert-success\">
                                        <strong>Success!</strong> Hostel Added Successfully!!!
                                        </div>";
                            } else if ($_SESSION['InsertHostel'] == "error") {
                                echo "<div class=\"alert alert-danger\">
                                    <strong>Not Inserted!</strong> error!!
                                     </div>";
                            }
                            unset($_SESSION['InsertHostel']);
                            ?>
                            <div class="form-group">
                                <form action="Admin_processing.php" method="post">
                                    <label for="NewHostel">Enter Hostel Name: </label>
                                    <input type="text" name="NewHostel" id="NewHostel">
                                    <label for="NewHostel">Total Rooms: </label>
                                    <input type="text" name="TotalRooms" id="TotalRooms">
                                    <label for="NewHostel">Persons Space: </label>
                                    <input type="text" name="TotalPersons" id="TotalPersons">
                                    <input type="submit" value="Add Hostel" id="view" name="AddHostel">
                                </form>
                            </div>
                            <table class="table table-striped table-bordered table-hover" id="hostels">
                                <tr>
                                    <th>Hostel Name</th>
                                    <th>Total Rooms</th>
                                    <th>Persons Space</th>
                                    <th>Delete</th>
                                </tr>
                                <?php
                                getHostels();
                                ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <footer><p>All copy rights reserved By: <a href="http://lahore.comsats.edu.pk/">COMSATS LAHORE</a></p>
            </footer>
        </div>

        <!-- /. PAGE INNER  -->
    </div>

    <!-- /. PAGE WRAPPER  -->
</div>

<!-- /. WRAPPER  -->
<!-- JS Scripts-->
<!-- jQuery Js -->
<script src="../../JS/jquery-1.10.2.js"></script>
<!-- Bootstrap Js -->
<script src="../../JS/bootstrap.min.js"></script>

<!-- Metis Menu Js -->
<script src="../../JS/jquery.metisMenu.js"></script>


<!-- Custom Js -->
<script src="../../JS/custom-scripts.js"></script>


<!-- Chart Js -->

</body>
</html>
