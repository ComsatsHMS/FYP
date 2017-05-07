<?php
session_start();
error_reporting(0);
include "../connection.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Student Portal</title>
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
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <!--            <a class="navbar-brand" href="index.html"><strong><i class="icon fa fa-plane"></i> BRILLIANT</strong></a>-->
            <a  class="navbar-brand" href="StudentPortal.php" id="sidebar-title">Student Portal</a>

<!--            <div id="sideNav" href="">-->
<!--                <i class="fa fa-bars icon"></i>-->
<!--            </div>-->
        </div>

        <ul class="nav navbar-top-links navbar-right">
            <!-- /.dropdown -->
            <li class="dropdown">
                <?php
                $query=mysqli_query($connection,"select notice from notification where view=0");
                while ($each_record = mysqli_fetch_array($query)) {
                    $count++;
                }
                ?>
                <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                    <span class="badge badge-notify"><?php echo $count ?></span>   <i class="fa fa-bell fa-fw"></i> <i class="fa fa-caret-down"></i>
                </a>
                <ul class="dropdown-menu dropdown-alerts">
                    <?php
                    $query=mysqli_query($connection,"select notificationType,date,number from notification where view=0 order by number desc limit 5");
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
                    <li><a href="StudentPortal.php"><i class="fa fa-user fa-fw"></i> User Profile</a>
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
                    <a href="StudentPortal.php"><i class="fa fa-"></i> Profile</a>
                </li>
                <li>
                    <a href="Notifications.php"><i class="fa fa-"></i> Notifications</a>
                </li>

                <li>
                    <a href="Complaints.php"><i class="fa fa-"></i> Complains</a>
                </li>

                <li>
                    <a href="Voting.php"><i class="fa fa-"></i> Votes</a>
                </li>
                <li>
                    <a class="active-menu" href="Applications.php"><i class="fa fa-"></i> Applications </a>
                </li>
                <?php
                $fetch= "select studentID from wingproctorslist where studentID='{$_SESSION["id"]}'";
                $studentID;
                $transport = mysqli_query($connection,$fetch);
                while ($each_record = mysqli_fetch_array($transport)){
                    $studentID = $each_record['studentID'];
                }
                if($studentID == $_SESSION['id']){
                    echo '
                <li>
                    <a href="ViewComplains.php"><i class="fa fa-"></i> Wing Complaints </a>
                </li>';
                }
                ?>
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
                        <img id="profile_pic" src="../IMAGES/<?php echo"{$_SESSION['pic']}";?>" alt="profilepic" style="width: 100px; height: 100px";>
                    </a>
                </div>
                <div class="col-md-6 col-xs-8 col-sm-8">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover">
                            <tr>
                                <td><strong>Welcome</strong></td>
                                <td><?php echo "{$_SESSION['name'] }"; ?></td>
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
                <li><a href="../index.php">Home</a></li>
                <li><a href="Login.php">Login</a></li>
                <li><a href="StudentPortal.php">Student Portal</a></li>
                <li class="active">Applications</li>
            </ol>
        </div>
        <div id="page-inner">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="board">
                        <div class="panel panel-primary">
                            <div class="panel-heading" > Applications </div>
                            <!--            Content Box Contents-->
                            <div class="panel-body">
                                <!--                Available Applications      -->
                                <div class="btn-group-vertical">

                                        <button id="button" class="btn btn-primary col-sm-offset-2 col-sm-4 col-xs-10" formaction="MessCloseApplication.php">Mess Close Application</button><br><br>

                                        <button id="button" class="btn btn-primary btn btn-primary col-sm-offset-2 col-sm-4 col-xs-10" formaction="TransportCommitteeApplication.php">Transport Committee</button><br><br>

                                        <button id="button" class="btn btn-primary btn btn-primary col-sm-offset-2 col-sm-4 col-xs-10" formaction="BSCommitteeApplication.php">Blood Society Committee</button><br><br>

                                        <button id="button" class="btn btn-primary btn btn-primary col-sm-offset-2 col-sm-4 col-xs-10" formaction="NetworkAnalystApplication.php">Network Analyst</button><br><br>

                                        <button id="button" class="btn btn-primary btn btn-primary col-sm-offset-2 col-sm-4 col-xs-10" formaction="SportsCommitteeApplication.php">Sports Comitee</button><br><br>

                                        <button id="button" class="btn btn-primary btn btn-primary col-sm-offset-2 col-sm-4 col-xs-10" formaction="MessCommitteeApplication.php">Mess Committee</button><br><br>

                                        <button id="button" class="btn btn-primary btn btn-primary col-sm-offset-2 col-sm-4 col-xs-10" formaction="WingProctorApplication.php">Wing Proctor</button><br><br>
                                </div>
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
