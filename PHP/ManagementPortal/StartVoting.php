<?php
session_start();
error_reporting(0);
include("../connection.php");
if(isset($_POST['submit'])){
    $Sr;
    $votingtype = $_POST['voting'];
    $date = $_POST['date'];
    $query = "select Sr from votingtime where votingFor = '$votingtype' ";
    $result = mysqli_query($connection, $query);
    while ($db_data = mysqli_fetch_array($result)) {
        $Sr = $db_data['Sr'];
    }
    $query2 = "UPDATE votingtime SET endtime='$date' WHERE Sr='$Sr'";
    $result = mysqli_query($connection, $query2);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Management Portal</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js">
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery.matchHeight/0.7.0/jquery.matchHeight-min.js"></script>
    <!-- Bootstrap Styles-->
    <link href="../../CSS/bootstrap.css" rel="stylesheet" />
    <!-- FontAwesome Styles-->
    <link href="../../CSS/font-awesome.css" rel="stylesheet" />
    <!-- Morris Chart Styles-->
    <link href="../../JS/morris/morris-0.4.3.min.css" rel="stylesheet" />
    <!-- Custom Styles-->
    <link href="../../CSS/custom-styles.css" rel="stylesheet" />
    <!-- Google Fonts-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <link rel="stylesheet" href="../../JS/Lightweight-Chart/cssCharts.css">
</head>
<body>
<div id="wrapper">
    <nav class="navbar navbar-default top-navbar" role="navigation">
        <div class="navbar-header">
            <!--
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>-->
            <!--            <a class="navbar-brand" href="index.html"><strong><i class="icon fa fa-plane"></i> BRILLIANT</strong></a>-->
            <a  class="navbar-brand" href="MainApplicationOffice.php" id="sidebar-title">Management Portal</a>

            <div id="sideNav" href="">
                <i class="fa fa-bars icon"></i>
            </div>
        </div>

    </nav>
    <!--/. NAV TOP  -->
    <nav class="navbar-default navbar-side" role="navigation">
        <!--        <a href="StudentPortal.php">-->
        <!--            <img id="ciit_logo" src="../../IMAGES/CIITLogo_Plain.png" alt="COMSATS" />-->
        <!--        </a>-->
        <div class="sidebar-collapse">
            <ul class="nav" id="main-menu">
                <li>
                    <a class="active-menu" href="MainApplicationOffice.php"><i class="fa fa-user"></i> Profile</a>
                </li>

                <li>
                    <a href="ApplicationsDisplay.php"><i class="fa fa-user"></i> Hostel Applications</a>
                </li>
                <li>
                    <a href="Allotment.php"><i class="fa fa-bell"></i> Allotment</a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-"></i> Student's List<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="SelectedStudents.php">Selected</a>
                        </li>
                        <li>
                            <a href="NotSelectedStudents.php">Not Selected</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="ViewComplains.php"><i class="fa fa-"></i> View Complains</a>
                </li>

                <li>
                    <a href="ViewStudentApps.php"><i class="fa fa-"></i> View Applications</a>
                </li>
                <li>
                    <a href="StartVoting.php"><i class="fa fa-"></i> Voting </a>
                </li>

                <li>
                    <a href="OffStatistics.php"><i class="fa fa-"></i> Statistics </a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-"></i> Fee/Fine <span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="MessFeeChallan.php">Mess Fee Challan</a>
                        </li>
                        <li>
                            <a href="Fine.php">Fine</a>
                        </li>
                        <li>
                            <a href="MessFeePaidList.php">Mess Fee Paid Student's List</a>
                        </li>
                        <li>
                            <a href="MessFeeUnPaidList.php">Mess Fee unPaid Student's List</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="ViewInventory.php"><i class="fa fa-"></i> View Inventory</a>
                </li>
                <li>
                    <a href="Logout.php.php"><i class="fa fa-"></i> Logout</a>
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
                        <img id="profile_pic" src="../../IMAGES/<?php echo"{$_SESSION['pic']}";?>" alt="profilepic" style="width: 100px; height: 100px";>
                    </a>
                </div>

                <h1 class="col-md-3 col-xs-5 col-sm-5" style="padding-top:15px;">
                    Welcome <small> <?php echo "{$_SESSION['LoggedUser']}"; ?></small>
                </h1>

            </div>
            <ol class="breadcrumb">
                <li><a href="../index.php">Home</a></li>
                <li><a href="OfficeLogin.php">Login</a></li>
                <li class="active">Start Voting</li>
            </ol>
        </div>
        <div id="page-inner">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="board">
                        <div class="panel panel-primary">
                            <div class="panel-heading" > Start Voting </div>
                            <div class="panel-body">

                                <form  action="StartVoting.php" method="post" enctype="multipart/form-data">
                                    <div class="align col-md-12 col-xs-12">
                                        <div class="form-Horizontal">
                                            <div class="form-group">
                                                <label class="control-label textcolor">Voting For</label>
                                            </div>
                                            <div class="form-group">
                                                <select name="voting" class="voitng form-control" style="width: 200px;">
                                                    <option value="lunchBreakfast">Lunch/breakfast</option>
                                                    <option value="messMenu">Mess Menu</option>
                                                    <option value="forTrip">For a Trip</option>
                                                </select  >
                                            </div>
                                            <div class="form-group">
                                                <label class="textcolor"> Voting Last date</label>
                                            </div>
                                            <div class="form-group">
                                                <input type="date" name="date"   class="form-control"   style="width: 200px"">
                                            </div>
                                            <div class="form-group">
                                                <input type="submit" name="submit" value="Start">
                                            </div>

                                        </div>

                                    </div>
                                </form>
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
<!-- Morris Chart Js -->
<script src="../../JS/morris/raphael-2.1.0.min.js"></script>
<script src="../../JS/morris/morris.js"></script>


<script src="../../JS/easypiechart.js"></script>
<script src="../../JS/easypiechart-data.js"></script>

<script src="../../JS/Lightweight-Chart/jquery.chart.js"></script>

<!-- Custom Js -->
<script src="../../JS/custom-scripts.js"></script>


<!-- Chart Js -->
<script type="text/javascript" src="../../JS/chart.min.js"></script>
<script type="text/javascript" src="../../JS/chartjs.js"></script>


</body>
</html>
