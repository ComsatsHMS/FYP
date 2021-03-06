<?php
session_start();
if(!isset($_SESSION['name'])) {
    header('Location:ParentLogin.php');
}
include "../connection.php";
error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Parent Portal</title>
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
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.3/jquery.min.js"></script>
    <!--    <script type="text/javascript" src="../../JS/Validation.js"> </script>-->
    <!-- Bootstrap Styles-->
    <link href="../../CSS/bootstrap.css" rel="stylesheet"/>
    <!-- FontAwesome Styles-->
    <link href="../../CSS/font-awesome.css" rel="stylesheet"/>
    <!-- Morris Chart Styles-->
    <!-- Custom Styles-->
    <link href="../../CSS/custom-styles.css" rel="stylesheet"/>
    <!-- Google Fonts-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'/>
    <script type="text/javascript" src="../../JS/profileValidation.js"></script>
</head>
<body>
<div id="wrapper">
    <nav class="navbar navbar-default top-navbar" role="navigation">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <!--            <a class="navbar-brand" href="index.html"><strong><i class="icon fa fa-plane"></i> BRILLIANT</strong></a>-->
            <a class="navbar-brand" href="ParentPortal.php" id="sidebar-title">Parent Portal</a>

        </div>

        <ul class="nav navbar-top-links navbar-right">
            <!-- /.dropdown -->
            <li class="dropdown">
                <?php
                $query = mysqli_query($connection, "select notice from notification where view=0");
                while ($each_record = mysqli_fetch_array($query)) {
                    $count++;
                }
                ?>
                <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                    <span class="badge badge-notify"><?php echo $count ?></span> <i class="fa fa-bell fa-fw"></i> <i
                        class="fa fa-caret-down"></i>
                </a>
                <ul class="dropdown-menu dropdown-alerts">
                    <?php
                    $query = mysqli_query($connection, "select notificationType,date,number from notification where view=0 order by number desc limit 5");
                    while ($each_record = mysqli_fetch_array($query)) {
                        $content = $each_record ['notificationType'];
                        $date = $each_record ['date'];
                        $number = $each_record ['number'];
                        $date = date("d", strtotime("$date"));
                        $count++;
                        echo " <li><a href='DisplayNotification.php?id=$number'>
                            <div>
                                <i class='fa fa-bell'></i> $content
                                <span class='pull-right text-muted small'>$date Date</span>
                            </div>
                        </a>
                    </li>
                    <li class='divider'></li>";
                    }
                    ?>

                    <li>
                        <a class="text-center" href="Notifications.php">
                            <strong>View All New Notifications</strong>
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </li>
                </ul>
                <!-- /.dropdown-alerts -->
            </li>
            <!-- /.dropdown -->
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                    <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                </a>
                <ul class="dropdown-menu dropdown-user">
                    <li><a href="ParentPortal.php"><i class="fa fa-user fa-fw"></i> User Profile</a>
                    </li>
                    <li><a href="Settings.php"><i class="fa fa-gear fa-fw"></i> Settings</a>
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
        <!--        <a href="StudentPortal.php">-->
        <!--            <img id="ciit_logo" src="../../IMAGES/CIITLogo_Plain.png" alt="COMSATS" />-->
        <!--        </a>-->
        <div class="sidebar-collapse">
            <ul class="nav" id="main-menu">

                <li>
                    <a class="active-menu" href="ParentPortal.php"><i class="fa fa-"></i> Profile</a>
                </li>
                <li>
                    <a href="Notifications.php"><i class="fa fa-"></i> Notifications</a>
                </li>
                <li>
                    <a href="Statistics.php"><i class="fa fa-"></i> Statistics </a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-"></i> Fee <span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="Challan.php">Challan</a>
                        </li>
                        <li>
                            <a href="FeeHistory.php">Fee History</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="MyLog.php"><i class="fa fa-"></i> My Logs</a>
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
                        <img id="profile_pic" src="../IMAGES/<?php echo "{$_SESSION['pic']}";?>" alt="profilepic"
                             style="width: 100px; height: 100px" ;>
                    </a>
                </div>
                <div class="col-md-6 col-xs-8 col-sm-8">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover">
                            <tr>
                                <td><strong>Welcome</strong></td>
                                <td><?php echo "{$_SESSION['name'] }";?></td>
                            </tr>
                            <tr style="background-color: #f36a5a">
                                <td><strong>Hostel</strong></td>
                                <td><?php echo "{$_SESSION['hostelname'] }";?></td>
                            </tr>
                            <tr>
                                <td><strong>Room</strong></td>
                                <td><?php echo "{$_SESSION['room'] }";?></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <ol class="breadcrumb">
                <li><a href="../../index.html">Home</a></li>
                <li><a href="Logout.php">Login</a></li>
                <li class="active">Studet Profile</li>
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
                                      action="ProfileProcessing.php">
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
                                        <label class="control-label col-sm-2 col-xs-2" for="name">Name:</label>
                                        <div class="col-md-4 col-xs-4">
                                            <input type="text" class="form-control"
                                                   value="<?PHP echo "{$_SESSION['name']}";?>" <?php if ($_SESSION['name'] != '') echo "readonly"; ?>
                                                   id="name" name="studentName">
                                            <div id="name_error" class="val_error" style="color: red ">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-sm-2 col-xs-2" for="father_name">Father
                                            Name:</label>
                                        <div class="col-md-4 col-xs-4">
                                            <input type="text" class="form-control" id="father_name"
                                                   value="<?PHP echo "{$_SESSION['fname']}";?>" <?php if ($_SESSION['fname'] != '') echo "readonly"; ?>
                                                   name="fatherName">
                                            <div id="f_error" class="val_error" style="color: red "></div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-sm-2 col-xs-2" for="RegistrationID">Regestration
                                            ID:</label>
                                        <div class="col-md-4 col-xs-4">
                                            <input type="text" class="form-control"
                                                   value="<?PHP echo "{$_SESSION['id']}";?>"
                                                   id="RegistrationID" <?php if ($_SESSION['id'] != '') echo "readonly"; ?>
                                                   name="Regid">
                                            <div id="reg_error" class="val_error" style="color: red "></div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-sm-2 col-xs-2" for="Room_No">Room No:</label>
                                        <div class="col-md-4 col-xs-4">
                                            <input type="text" class="form-control"
                                                   value="<?PHP echo "{$_SESSION['room']}";?>" <?php if ($_SESSION['name'] != '') echo "readonly"; ?>
                                                   id="Room_No" name="room">
                                            <div id="room_error" class="val_error" style="color: red "></div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-sm-2 col-xs-2" for="Program">Program:</label>
                                        <div class="col-md-4 col-xs-4">
                                            <input type="text" class="form-control"
                                                   value="<?PHP echo "{$_SESSION['program']}";?>" <?php if ($_SESSION['program'] != '') echo "readonly"; ?>
                                                   id="program" name="program">
                                            <div id="program_error" class="val_error" style="color: red "></div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-sm-2 col-xs-2" for="CGPA">CGPA:</label>
                                        <div class="col-md-4 col-xs-4">
                                            <input type="text" class="form-control"
                                                   value="<?PHP echo "{$_SESSION['cgpa']}";?>" id="cgpa" name="cgpa"
                                                   onchange="validateCgpa()">
                                            <div id="cgpa_error" class="val_error" style="color: red "></div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-sm-2 col-xs-2" for="Econtact">Emergency Contact
                                            No.:</label>
                                        <div class="col-md-4 col-xs-4">
                                            <input type="text" class="form-control"
                                                   value="<?PHP echo "{$_SESSION['contact']}";?>" id="Econtact"
                                                   name="econtact" onchange="validateEcontact()">
                                            <div id="contact_error" class="val_error" style="color: red "></div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-sm-2 col-xs-2" for="phone">Personal NO.:</label>
                                        <div class="col-md-4 col-xs-4">
                                            <input type="text" class="form-control"
                                                   value="<?PHP echo "{$_SESSION['phone']}";?>" id="phoneno"
                                                   name="phone" onchange="validatePcontact()">
                                            <div id="phone_error" class="val_error" style="color: red "></div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-sm-2 col-xs-2" for="Address">Address:</label>
                                        <div class="col-md-4 col-xs-4">
                                            <input type="text" class="form-control"
                                                   value="<?PHP echo "{$_SESSION['address']}";?>" id="address"
                                                   name="address" onchange="validateAddress()">
                                            <div id="address_error" class="val_error" style="color: red "></div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-sm-2 col-xs-2" for="hostel">Your
                                            Hostel: </label>
                                        <div class="col-md-4 col-xs-4">
                                            <select id="select" name="hostel"
                                                    class="form-control" <?php if ($_SESSION['hostelname'] != '') echo "readonly"; ?>>
                                                <option><?PHP echo "{$_SESSION['hostelname']}";?></option>
                                                <option>Liaqat Hall</option>
                                                <option>M.A Jinnah</option>
                                                <option>Johar Hall</option>
                                            </select>
                                            <div id="hostel_error" class="val_error" style="color: red "></div>
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
            <footer><p>All right reserved. By: <a href="http://lahore.comsats.edu.pk/">COMSATS LAHORE</a></p>
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
