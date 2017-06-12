<?php
error_reporting(0);
session_start();
if(!isset($_SESSION['UserId'])){
    header('Location:OfficeLogin.php');
}
include "../connection.php";
include ("Profile_Processing.php");
getProfile();
?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <title>Management Portal</title>
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
                <a class="navbar-brand" href="MainApplicationOffice.php" id="sidebar-title">Management Portal</a>
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
                        <a class="active-menu" href="MainApplicationOffice.php"><i class="fa fa-"></i>Home</a>
                    </li>
                    <?php
                    if ($_SESSION['HostelApplications'] == 1) {
                        echo "<li>
                    <a href=\"ApplicationsDisplay.php\"><i class=\"fa fa-\"></i> Hostel Applications</a>
                </li>";
                    }
                    if ($_SESSION['Allotment'] == 1) {
                        echo " <li>
                    <a href=\"Allotment.php\"><i class=\"fa fa-\"></i> Allotment</a>
                </li>";
                    }
                    if ($_SESSION['StudentsList'] == 1) {
                        echo " <li>
                    <a href=\"#\"><i class=\"fa fa-\"></i> Student's List<span class=\"fa arrow\"></span></a>
                    <ul class=\"nav nav-second-level\">
                        <li>
                            <a href=\"SelectedStudents.php\">Selected</a>
                        </li>
                        <li>
                            <a href=\"NotSelectedStudents.php\">Not Selected</a>
                        </li>
                    </ul>
                </li>";
                    }
                    if ($_SESSION['Complains'] == 1) {
                        echo "<li>
                    <a href=\"ViewComplains.php\"><i class=\"fa fa-\"></i> View Complains</a>
                </li>";
                    }
                    if ($_SESSION['Applications'] == 1) {
                        echo "<li>
                    <a href=\"ViewStudentApps.php\"><i class=\"fa fa-\"></i> View Applications</a>
                </li>";
                    }
                    if ($_SESSION['Fine'] == 1) {
                        echo "<li>
                    <a href=\"#\"><i class=\"fa fa-\"></i> Fee/Fine <span class=\"fa arrow\"></span></a>
                    <ul class=\"nav nav-second-level\">
                        <li>
                            <a href=\"MessFeeChallan.php\">Mess Fee Challan</a>
                        </li>
                        <li>
                            <a href=\"Fine.php\">Fine</a>
                        </li>
                        <li>
                            <a href=\"MessFeePaidList.php\">Mess Fee Paid Student's List</a>
                        </li>
                        <li>
                            <a href=\"MessFeeUnPaidList.php\">Mess Fee unPaid Student's List</a>
                        </li>
                    </ul>
                </li>";
                    }
                    if ($_SESSION['Inventory'] == 1) {
                        echo "<li>
                    <a href=\"ViewInventory.php\"><i class=\"fa fa-\"></i> View Inventory</a>
                </li>";
                    }
                    if ($_SESSION['Parents'] == 1) {
                        echo "<li>
                    <a href=\"#\"><i class=\"fa fa-\"></i> Parents Data<span class=\"fa arrow\"></span></a>
                    <ul class=\"nav nav-second-level\">
                        <li>
                            <a href=\"ParentRequests.php\">Account Requests</a>
                        </li>
                        <li>
                            <a href=\"ListOfParents.php\">List of Parent Accounts</a>
                        </li>
                    </ul>
                </li>";
                    }
                    if ($_SESSION['Voting'] == 1) {
                        echo " <li>
                    <a href=\"StartVoting.php\"><i class=\"fa fa-vote\"></i> Voting </a>
                </li>";
                    }
                    if ($_SESSION['Statistics'] == 1) {
                        echo "<li>
                    <a href=\"OffStatistics.php\"><i class=\"fa fa-\"></i> Statistics </a>
                </li>";
                    }

                    ?>
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
                            <img id="profile_pic" src="../../IMAGES/<?php echo $_SESSION['UserPic'];?>" alt="profilepic"
                                 style="width: 120px; height: 120px" ;>
                        </a>
                    </div>
                    <div class="col-md-6 col-xs-8 col-sm-8">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover">
                                <tr>
                                    <td>Name</td>
                                    <td><?php echo "{$_SESSION['UserFirstName'] }"; echo "  ";echo "{$_SESSION['UserLastName']}"; ?></td>
                                </tr>
                                <tr style="background-color: #f36a5a">
                                    <td>Rank</td>
                                    <td><?php echo "{$_SESSION['UserRank'] }";?></td>
                                </tr>
                                <tr>
                                    <td>Hostel</td>
                                    <td><?php echo "{$_SESSION['UserHostel'] }";?></td>
                                </tr>
                            </table>
                        </div>
                    </div>

                </div>
                <ol class="breadcrumb">
                    <li><a href="../../index.html">Home</a></li>
                    <li><a href="OfficeLogin.php">Login</a></li>
                    <li class="active"> Profile</li>
                </ol>
            </div>
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="board">
                            <div class="panel panel-primary">

                                <div class="panel-heading">Profile</div>
                                <div class="panel-body">
                                    <form class="form-horizontal" role="form" name="studentForm" method="post"
                                          action="Profile_Processing.php">
                                        <?php
                                        if ($_SESSION['update'] == 'OK') {
                                            echo "<div class=\"alert alert-success alert-dismissable\"><a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>
                                                 <strong>Success!</strong> Profile Updated!!
                                                </div>";
                                        } elseif ($_SESSION['update'] == 'empty') {
                                            echo "<div class=\"alert alert-danger alert-dismissable\"><a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>
                                                 <strong>Error!</strong> Something went wrong!!
                                                </div>";
                                        } elseif ($_SESSION['update'] == 'error') {
                                            echo "<div class=\"alert alert-danger alert-dismissable\"><a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>
                                                 <strong>Error!</strong> Something went wrong!!
                                                </div>";
                                        }
                                        unset($_SESSION['update']);
                                        ?>
                                        <div class="form-group">
                                            <label class="control-label col-sm-2 col-xs-2" for="fname">First
                                                Name:</label>
                                            <div class="col-md-4 col-xs-4">
                                                <input type="text" class="form-control"
                                                       value="<?PHP echo "{$_SESSION['fname']}";?>" <?php if ($_SESSION['fname'] != '') echo "readonly"; ?>
                                                       id="name" name="fName">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-2 col-xs-2" for="lname">Last
                                                Name:</label>
                                            <div class="col-md-4 col-xs-4">
                                                <input type="text" class="form-control" id="father_name"
                                                       value="<?PHP echo "{$_SESSION['lname']}";?>" <?php if ($_SESSION['lname'] != '') echo "readonly"; ?>
                                                       name="lName">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-2 col-xs-2" for="Email">Email:</label>
                                            <div class="col-md-4 col-xs-4">
                                                <input type="text" class="form-control"
                                                       value="<?PHP echo "{$_SESSION['email']}";?>"
                                                       id="email" <?php if ($_SESSION['email'] != '') echo "readonly"; ?>
                                                       name="email">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-2 col-xs-2" for="Rank">Rank:</label>
                                            <div class="col-md-4 col-xs-4">
                                                <input type="text" class="form-control"
                                                       value="<?PHP echo "{$_SESSION['role']}";?>" <?php if ($_SESSION['role'] != '') echo "readonly"; ?>
                                                       id="role" name="role">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-2 col-xs-2" for="hostel">Hostel:</label>
                                            <div class="col-md-4 col-xs-4">
                                                <input type="text" class="form-control"
                                                       value="<?PHP echo "{$_SESSION['hostel']}";?>" <?php if ($_SESSION['hostel'] != '') echo "readonly"; ?>
                                                       id="hostel" name="hostel">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-2 col-xs-2"
                                                   for="Address">Address:</label>
                                            <div class="col-md-4 col-xs-4">
                                                <input type="text" class="form-control"
                                                       value="<?PHP echo "{$_SESSION['address']}";?>" id="address"
                                                       name="address">
                                                <div id="address_error" class="val_error" style="color: red "></div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-2 col-xs-2" for="phone">Phone
                                                No.:</label>
                                            <div class="col-md-4 col-xs-4">
                                                <input type="text" class="form-control"
                                                       value="<?PHP echo "{$_SESSION['phone']}";?>" id="phone"
                                                       name="phone">
                                                <div id="contact_error" class="val_error" style="color: red "></div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-offset-2 col-sm-10 col-xs-10">
                                                <input id="button" type="submit" value="Update Profile" name="update">
                                            </div>
                                        </div>
                                    </form
                                </div>
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
    <!-- Morris Chart Js -->
    <script src="../../JS/morris/raphael-2.1.0.min.js"></script>
    <script src="../../JS/morris/morris.js"></script>


    <script src="../../JS/easypiechart.js"></script>
    <script src="../../JS/easypiechart-data.js"></script>

    <script src="../../JS/Lightweight-Chart/jquery.chart.js"></script>

    <!-- Custom Js -->
    <script src="../../JS/custom-scripts.js"></script>


    <!-- Chart Js -->


    </body>
    </html>