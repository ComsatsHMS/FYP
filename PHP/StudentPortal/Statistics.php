<?php
error_reporting(0);
session_start();
if(!isset($_SESSION['name'])){
    header('Location:Login.php');
}
include "../connection.php";
include "../fusioncharts.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Student Portal</title>
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
    <!-- Custom Styles-->
    <link href="../../CSS/custom-styles.css" rel="stylesheet"/>
    <!-- Google Fonts-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'/>
    <script type="text/javascript" src="http://static.fusioncharts.com/code/latest/fusioncharts.js"></script>
    <script type="text/javascript" src="../../JS/fusioncharts.theme.ocean.js"></script>
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
            <a class="navbar-brand" href="StudentPortal.php" id="sidebar-title">Student Portal</a>

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
                        echo " <li><a href='../StudentPortal/DisplayNotification.php?id=$number'>
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
                    <a href="#"><i class="fa fa-"></i> Applications<span class="fa arrow"></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="MessCloseApplication.php">Mess Close</a>
                        </li>
                        <li>
                            <a href="TransportCommitteeApplication.php">Trnasport Committee</a>
                        </li>
                        <li>
                            <a href="BSCommitteeApplication.php">Blood Society Committee</a>
                        </li>
                        <li>
                            <a href="NetworkAnalystApplication.php">Network Analyst</a>
                        </li>
                        <li>
                            <a href="SportsCommitteeApplication.php">Sports Comitee</a>
                        </li>
                        <li>
                            <a href="MessCommitteeApplication.php">Mess Committee</a>
                        </li>
                        <li>
                            <a href="WingProctorApplication.php">Wing Proctor</a>
                        </li>
                    </ul>
                </li>
                <?php
                $fetch = "select studentID from wingproctorslist where studentID='{$_SESSION["id"]}'";
                $studentID;
                $transport = mysqli_query($connection, $fetch);
                while ($each_record = mysqli_fetch_array($transport)) {
                    $studentID = $each_record['studentID'];
                }
                if ($studentID == $_SESSION['id']) {
                    echo '
                <li>
                    <a href="ViewComplains.php"><i class="fa fa-"></i> Wing Complaints </a>
                </li>';
                }
                ?>
                <li>
                    <a class="active-menu" href="Statistics.php"><i class="fa fa-"></i> Statistics </a>
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
                <li><a href="../../index.html">Home</a></li>
                <li><a href="Login.php">Login</a></li>
                <li><a href="StudentPortal.php">Student Portal</a></li>
                <li class="active">Statistics</li>
            </ol>
        </div>
        <div id="page-inner">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="board">
                        <div class="panel panel-primary">

                            <div class="panel-heading">Statistics</div>
                            <div class="panel-body">
                                <form action="Statistics.php" method="post" enctype="multipart/form-data">

                                    <input type="submit" id="view" name="LBvoting" VALUE="Lunch Or Breakfast">
                                    <input type="submit" id="view" name="DinnerMess" VALUE="Dinner Mess Menu">
                                    <input type="submit" id="view" name="trip" VALUE="Trip Votings">
                                    <?php
                                    $fetch = "select * from voting";
                                    $run = mysqli_query($connection, $fetch);
                                    while ($each = mysqli_fetch_array($run)) {
                                        $lunch = $each['Lunch'];
                                        $breakfast = $each['Breakfast'];
                                        $both = $each['LunchBreakfast'];
                                    }
                                    if(($lunch > $breakfast) && ($lunch > $both)){
                                        echo "<input type=\"submit\" id=\"view\" name=\"Lmessmenu\" VALUE=\"Lunch Mess Menu\" >";
                                    }
                                    elseif(($breakfast > $lunch) && ($breakfast > $both)){
                                        echo "<input type=\"submit\" id=\"view\" name=\"Bmessmenu\" VALUE=\"Breakfast Mess Menu\" >";
                                    }
                                    elseif(($both >$lunch) && ($both > $breakfast) || ($lunch == $breakfast) ){
                                        echo "<input type=\"submit\" id=\"view\" name=\"Lmessmenu\" VALUE=\"Lunch Mess Menu\" >";
                                        echo "<input type=\"submit\" id=\"view\" name=\"Bmessmenu\" VALUE=\"Breakfast Mess Menu\" >";
                                    }
                                    ?>

                                </form>
                                <br>
                                <div class="row">
                                    <div class="col-md-6" id="monday">

                                    </div>
                                    <div class="col-md-6" id="tuesday">

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6" id="wednesday">

                                    </div>
                                    <div class="col-md-6" id="thursday">

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6" id="friday">

                                    </div>
                                    <div class="col-md-6" id="saturday">

                                    </div>
                                </div>
                                <div id="votingresults"></div>
                                <?php
                                if(isset($_POST['LBvoting'])){
                                    $fetch = "select * from voting";
                                    $run = mysqli_query($connection, $fetch);
                                    while ($each = mysqli_fetch_array($run)) {
                                        $lunch = $each['Lunch'];
                                        $breakfast = $each['Breakfast'];
                                        $both = $each['LunchBreakfast'];
                                    }
                                    $columnChart = new FusionCharts(
                                        "column2d",
                                        "ex1" ,
                                        "600",
                                        "400",
                                        "votingresults",
                                        "json",
                                        '{
			                                        "chart":
			                                                {
				                                                "caption":"Lunch or breakfast Selection votes",
				                                                "theme":"ocean"

			                                                },
			                                        "data":
			                                        [
				                                        {
					                                        "label":"Lunch",
					                                        "value":'.$lunch.'
				                                        },
				                                         {
					                                        "label":"BreakFast",
					                                        "value":'.$breakfast.'
				                                        },
				                                         {
					                                        "label":"Both",
					                                        "value":'.$breakfast.'
				                                        }

			                                         ]
		                                        }');
                                    $columnChart->render();
                                }

                                if(isset($_POST['trip'])){
                                    $tripoptions = array();
                                    $sql = "SHOW COLUMNS FROM tripvotes";
                                    $result = mysqli_query($connection,$sql);
                                    while($row = mysqli_fetch_array($result)){
                                        $tripoptions[] = $row['Field'];
                                    }
                                    $fetch = "select * from tripvotes";
                                    $run = mysqli_query($connection, $fetch);
                                    while ($each = mysqli_fetch_array($run)) {
                                        $option1 = $each[$tripoptions[0]];
                                        $option2 = $each[$tripoptions[1]];
                                        $option3 = $each[$tripoptions[2]];
                                        $option4 = $each[$tripoptions[3]];
                                        $option5 = $each[$tripoptions[4]];
                                    }
                                    $columnChart = new FusionCharts(
                                        "column2d",
                                        "ex" ,
                                        "600",
                                        "400",
                                        "votingresults",
                                        "json",
                                        '{
			                                        "chart":
			                                                {
				                                                "caption":" Votes For Trip Places",
				                                                "theme":"ocean"

			                                                },
			                                        "data":
			                                        [
				                                        {
					                                        "label":"'.$tripoptions[0].'",
					                                        "value":'.$option1.'
				                                        },
				                                         {
					                                        "label":"'.$tripoptions[1].'",
					                                        "value":'.$option2.'
				                                        },
				                                         {
					                                        "label":"'.$tripoptions[2].'",
					                                        "value":'.$option3.'
				                                        }
				                                        ,
				                                         {
					                                        "label":"'.$tripoptions[3].'",
					                                        "value":'.$option4.'
				                                        }
				                                        ,
				                                         {
					                                        "label":"'.$tripoptions[4].'",
					                                        "value":'.$option5.'
				                                        }

			                                         ]
		                                        }');
                                    $columnChart->render();
                                }

                                if(isset($_POST['DinnerMess'])){
                                    $dinneroptions = array();
                                    $option1 = array();
                                    $option2 = array();
                                    $option3 = array();
                                    $option4 = array();
                                    $option5 = array();
                                    $option6 = array();
                                    $option7 = array();
                                    $sql = "SHOW COLUMNS FROM messmenud";
                                    $result = mysqli_query($connection,$sql);
                                    while($row = mysqli_fetch_array($result)){
                                        $dinneroptions[] = $row['Field'];
                                    }
                                    $fetch = "select * from messmenud";
                                    $run = mysqli_query($connection, $fetch);
                                    while ($each = mysqli_fetch_array($run)) {
                                        $option1[] = $each[$dinneroptions[1]];
                                        $option2[] = $each[$dinneroptions[2]];
                                        $option3[] = $each[$dinneroptions[3]];
                                        $option4[] = $each[$dinneroptions[4]];
                                        $option5[] = $each[$dinneroptions[5]];
                                        $option6[] = $each[$dinneroptions[6]];
                                        $option7[] = $each[$dinneroptions[7]];
                                    }
                                    $columnChart = new FusionCharts(
                                        "column2d",
                                        "dm" ,
                                        "500",
                                        "400",
                                        "monday",
                                        "json",
                                        '{
			                                        "chart":
			                                                {
				                                                "caption":" Dinner Mess menu Votes For Monday",
				                                                "theme":"ocean"

			                                                },
			                                        "data":
			                                        [
				                                        {
					                                        "label":"'.$dinneroptions[1].'",
					                                        "value":'.$option1[0].'
				                                        },

				                                         {
					                                        "label":"'.$dinneroptions[2].'",
					                                        "value":'.$option2[0].'
				                                        }
				                                        ,
				                                         {
					                                        "label":"'.$dinneroptions[3].'",
					                                        "value":'.$option3[0].'
				                                        }
				                                        ,
				                                         {
					                                        "label":"'.$dinneroptions[4].'",
					                                        "value":'.$option4[0].'
				                                        }
				                                        ,
				                                         {
					                                        "label":"'.$dinneroptions[5].'",
					                                        "value":'.$option5[0].'
				                                        }
				                                        ,
				                                         {
					                                        "label":"'.$dinneroptions[6].'",
					                                        "value":'.$option6[0].'
				                                        }
				                                        ,
				                                         {
					                                        "label":"'.$dinneroptions[7].'",
					                                        "value":'.$option7[0].'
				                                        }

			                                         ]
		                                        }');
                                    $columnChart->render();

                                    $columnChart = new FusionCharts(
                                        "column2d",
                                        "dt" ,
                                        "500",
                                        "400",
                                        "tuesday",
                                        "json",
                                        '{
			                                        "chart":
			                                                {
				                                                "caption":" Dinner Mess menu Votes For Tuesday",
				                                                "theme":"ocean"

			                                                },
			                                        "data":
			                                        [
				                                        {
					                                        "label":"'.$dinneroptions[1].'",
					                                        "value":'.$option1[1].'
				                                        },

				                                         {
					                                        "label":"'.$dinneroptions[2].'",
					                                        "value":'.$option2[1].'
				                                        }
				                                        ,
				                                         {
					                                        "label":"'.$dinneroptions[3].'",
					                                        "value":'.$option3[1].'
				                                        }
				                                        ,
				                                         {
					                                        "label":"'.$dinneroptions[4].'",
					                                        "value":'.$option4[1].'
				                                        }
				                                        ,
				                                         {
					                                        "label":"'.$dinneroptions[5].'",
					                                        "value":'.$option5[1].'
				                                        }
				                                        ,
				                                         {
					                                        "label":"'.$dinneroptions[6].'",
					                                        "value":'.$option6[1].'
				                                        }
				                                        ,
				                                         {
					                                        "label":"'.$dinneroptions[7].'",
					                                        "value":'.$option7[1].'
				                                        }

			                                         ]
		                                        }');
                                    $columnChart->render();

                                    $columnChart = new FusionCharts(
                                        "column2d",
                                        "dw" ,
                                        "500",
                                        "400",
                                        "wednesday",
                                        "json",
                                        '{
			                                        "chart":
			                                                {
				                                                "caption":" Dinner Mess menu Votes For Wednesday",
				                                                "theme":"ocean"

			                                                },
			                                        "data":
			                                        [
				                                        {
					                                        "label":"'.$dinneroptions[1].'",
					                                        "value":'.$option1[2].'
				                                        },

				                                         {
					                                        "label":"'.$dinneroptions[2].'",
					                                        "value":'.$option2[2].'
				                                        }
				                                        ,
				                                         {
					                                        "label":"'.$dinneroptions[3].'",
					                                        "value":'.$option3[2].'
				                                        }
				                                        ,
				                                         {
					                                        "label":"'.$dinneroptions[4].'",
					                                        "value":'.$option4[2].'
				                                        }
				                                        ,
				                                         {
					                                        "label":"'.$dinneroptions[5].'",
					                                        "value":'.$option5[2].'
				                                        }
				                                        ,
				                                         {
					                                        "label":"'.$dinneroptions[6].'",
					                                        "value":'.$option6[2].'
				                                        }
				                                        ,
				                                         {
					                                        "label":"'.$dinneroptions[7].'",
					                                        "value":'.$option7[2].'
				                                        }

			                                         ]
		                                        }');
                                    $columnChart->render();
                                    $columnChart = new FusionCharts(
                                        "column2d",
                                        "dth" ,
                                        "500",
                                        "400",
                                        "thursday",
                                        "json",
                                        '{
			                                        "chart":
			                                                {
				                                                "caption":" Dinner Mess menu Votes For Thursday",
				                                                "theme":"ocean"

			                                                },
			                                        "data":
			                                        [
				                                        {
					                                        "label":"'.$dinneroptions[1].'",
					                                        "value":'.$option1[3].'
				                                        },

				                                         {
					                                        "label":"'.$dinneroptions[2].'",
					                                        "value":'.$option2[3].'
				                                        }
				                                        ,
				                                         {
					                                        "label":"'.$dinneroptions[3].'",
					                                        "value":'.$option3[3].'
				                                        }
				                                        ,
				                                         {
					                                        "label":"'.$dinneroptions[4].'",
					                                        "value":'.$option4[3].'
				                                        }
				                                        ,
				                                         {
					                                        "label":"'.$dinneroptions[5].'",
					                                        "value":'.$option5[3].'
				                                        }
				                                        ,
				                                         {
					                                        "label":"'.$dinneroptions[6].'",
					                                        "value":'.$option6[3].'
				                                        }
				                                        ,
				                                         {
					                                        "label":"'.$dinneroptions[7].'",
					                                        "value":'.$option7[3].'
				                                        }

			                                         ]
		                                        }');
                                    $columnChart->render();
                                    $columnChart = new FusionCharts(
                                        "column2d",
                                        "df" ,
                                        "500",
                                        "400",
                                        "friday",
                                        "json",
                                        '{
			                                        "chart":
			                                                {
				                                                "caption":" Dinner Mess menu Votes For Friday",
				                                                "theme":"ocean"

			                                                },
			                                        "data":
			                                        [
				                                        {
					                                        "label":"'.$dinneroptions[1].'",
					                                        "value":'.$option1[4].'
				                                        },

				                                         {
					                                        "label":"'.$dinneroptions[2].'",
					                                        "value":'.$option2[4].'
				                                        }
				                                        ,
				                                         {
					                                        "label":"'.$dinneroptions[3].'",
					                                        "value":'.$option3[4].'
				                                        }
				                                        ,
				                                         {
					                                        "label":"'.$dinneroptions[4].'",
					                                        "value":'.$option4[4].'
				                                        }
				                                        ,
				                                         {
					                                        "label":"'.$dinneroptions[5].'",
					                                        "value":'.$option5[4].'
				                                        }
				                                        ,
				                                         {
					                                        "label":"'.$dinneroptions[6].'",
					                                        "value":'.$option6[4].'
				                                        }
				                                        ,
				                                         {
					                                        "label":"'.$dinneroptions[7].'",
					                                        "value":'.$option7[4].'
				                                        }

			                                         ]
		                                        }');
                                    $columnChart->render();
                                    $columnChart = new FusionCharts(
                                        "column2d",
                                        "ds" ,
                                        "500",
                                        "400",
                                        "saturday",
                                        "json",
                                        '{
			                                        "chart":
			                                                {
				                                                "caption":" Dinner Mess menu Votes For Saturday",
				                                                "theme":"ocean"

			                                                },
			                                        "data":
			                                        [
				                                        {
					                                        "label":"'.$dinneroptions[1].'",
					                                        "value":'.$option1[5].'
				                                        },

				                                         {
					                                        "label":"'.$dinneroptions[2].'",
					                                        "value":'.$option2[5].'
				                                        }
				                                        ,
				                                         {
					                                        "label":"'.$dinneroptions[3].'",
					                                        "value":'.$option3[5].'
				                                        }
				                                        ,
				                                         {
					                                        "label":"'.$dinneroptions[4].'",
					                                        "value":'.$option4[5].'
				                                        }
				                                        ,
				                                         {
					                                        "label":"'.$dinneroptions[5].'",
					                                        "value":'.$option5[5].'
				                                        }
				                                        ,
				                                         {
					                                        "label":"'.$dinneroptions[6].'",
					                                        "value":'.$option6[5].'
				                                        }
				                                        ,
				                                         {
					                                        "label":"'.$dinneroptions[7].'",
					                                        "value":'.$option7[5].'
				                                        }

			                                         ]
		                                        }');
                                    $columnChart->render();
                                    $columnChart = new FusionCharts(
                                        "column2d",
                                        "dwdu" ,
                                        "500",
                                        "400",
                                        "votingresults",
                                        "json",
                                        '{
			                                        "chart":
			                                                {
				                                                "caption":" Dinner Mess menu Votes For Sunday",
				                                                "theme":"ocean"

			                                                },
			                                        "data":
			                                        [
				                                        {
					                                        "label":"'.$dinneroptions[1].'",
					                                        "value":'.$option1[6].'
				                                        },

				                                         {
					                                        "label":"'.$dinneroptions[2].'",
					                                        "value":'.$option2[6].'
				                                        }
				                                        ,
				                                         {
					                                        "label":"'.$dinneroptions[3].'",
					                                        "value":'.$option3[6].'
				                                        }
				                                        ,
				                                         {
					                                        "label":"'.$dinneroptions[4].'",
					                                        "value":'.$option4[6].'
				                                        }
				                                        ,
				                                         {
					                                        "label":"'.$dinneroptions[5].'",
					                                        "value":'.$option5[6].'
				                                        }
				                                        ,
				                                         {
					                                        "label":"'.$dinneroptions[6].'",
					                                        "value":'.$option6[6].'
				                                        }
				                                        ,
				                                         {
					                                        "label":"'.$dinneroptions[7].'",
					                                        "value":'.$option7[6].'
				                                        }

			                                         ]
		                                        }');
                                    $columnChart->render();

                                }
                                if(isset($_POST['Lmessmenu'])){
                                    $dinneroptions = array();
                                    $option1 = array();
                                    $option2 = array();
                                    $option3 = array();
                                    $option4 = array();
                                    $option5 = array();
                                    $option6 = array();
                                    $option7 = array();
                                    $sql = "SHOW COLUMNS FROM messmenu";
                                    $result = mysqli_query($connection,$sql);
                                    while($row = mysqli_fetch_array($result)){
                                        $dinneroptions[] = $row['Field'];
                                    }
                                    $fetch = "select * from messmenu";
                                    $run = mysqli_query($connection, $fetch);
                                    while ($each = mysqli_fetch_array($run)) {
                                        $option1[] = $each[$dinneroptions[1]];
                                        $option2[] = $each[$dinneroptions[2]];
                                        $option3[] = $each[$dinneroptions[3]];
                                        $option4[] = $each[$dinneroptions[4]];
                                        $option5[] = $each[$dinneroptions[5]];
                                        $option6[] = $each[$dinneroptions[6]];
                                        $option7[] = $each[$dinneroptions[7]];
                                    }
                                    $columnChart = new FusionCharts(
                                        "column2d",
                                        "dm" ,
                                        "500",
                                        "400",
                                        "monday",
                                        "json",
                                        '{
			                                        "chart":
			                                                {
				                                                "caption":" Lunch Mess menu Votes For Monday",
				                                                "theme":"ocean"

			                                                },
			                                        "data":
			                                        [
				                                        {
					                                        "label":"'.$dinneroptions[1].'",
					                                        "value":'.$option1[0].'
				                                        },

				                                         {
					                                        "label":"'.$dinneroptions[2].'",
					                                        "value":'.$option2[0].'
				                                        }
				                                        ,
				                                         {
					                                        "label":"'.$dinneroptions[3].'",
					                                        "value":'.$option3[0].'
				                                        }
				                                        ,
				                                         {
					                                        "label":"'.$dinneroptions[4].'",
					                                        "value":'.$option4[0].'
				                                        }
				                                        ,
				                                         {
					                                        "label":"'.$dinneroptions[5].'",
					                                        "value":'.$option5[0].'
				                                        }
				                                        ,
				                                         {
					                                        "label":"'.$dinneroptions[6].'",
					                                        "value":'.$option6[0].'
				                                        }
				                                        ,
				                                         {
					                                        "label":"'.$dinneroptions[7].'",
					                                        "value":'.$option7[0].'
				                                        }

			                                         ]
		                                        }');
                                    $columnChart->render();

                                    $columnChart = new FusionCharts(
                                        "column2d",
                                        "dt" ,
                                        "500",
                                        "400",
                                        "tuesday",
                                        "json",
                                        '{
			                                        "chart":
			                                                {
				                                                "caption":" Lunch Mess menu Votes For Tuesday",
				                                                "theme":"ocean"

			                                                },
			                                        "data":
			                                        [
				                                        {
					                                        "label":"'.$dinneroptions[1].'",
					                                        "value":'.$option1[1].'
				                                        },

				                                         {
					                                        "label":"'.$dinneroptions[2].'",
					                                        "value":'.$option2[1].'
				                                        }
				                                        ,
				                                         {
					                                        "label":"'.$dinneroptions[3].'",
					                                        "value":'.$option3[1].'
				                                        }
				                                        ,
				                                         {
					                                        "label":"'.$dinneroptions[4].'",
					                                        "value":'.$option4[1].'
				                                        }
				                                        ,
				                                         {
					                                        "label":"'.$dinneroptions[5].'",
					                                        "value":'.$option5[1].'
				                                        }
				                                        ,
				                                         {
					                                        "label":"'.$dinneroptions[6].'",
					                                        "value":'.$option6[1].'
				                                        }
				                                        ,
				                                         {
					                                        "label":"'.$dinneroptions[7].'",
					                                        "value":'.$option7[1].'
				                                        }

			                                         ]
		                                        }');
                                    $columnChart->render();

                                    $columnChart = new FusionCharts(
                                        "column2d",
                                        "dw" ,
                                        "500",
                                        "400",
                                        "wednesday",
                                        "json",
                                        '{
			                                        "chart":
			                                                {
				                                                "caption":" Lunch Mess menu Votes For Wednesday",
				                                                "theme":"ocean"

			                                                },
			                                        "data":
			                                        [
				                                        {
					                                        "label":"'.$dinneroptions[1].'",
					                                        "value":'.$option1[2].'
				                                        },

				                                         {
					                                        "label":"'.$dinneroptions[2].'",
					                                        "value":'.$option2[2].'
				                                        }
				                                        ,
				                                         {
					                                        "label":"'.$dinneroptions[3].'",
					                                        "value":'.$option3[2].'
				                                        }
				                                        ,
				                                         {
					                                        "label":"'.$dinneroptions[4].'",
					                                        "value":'.$option4[2].'
				                                        }
				                                        ,
				                                         {
					                                        "label":"'.$dinneroptions[5].'",
					                                        "value":'.$option5[2].'
				                                        }
				                                        ,
				                                         {
					                                        "label":"'.$dinneroptions[6].'",
					                                        "value":'.$option6[2].'
				                                        }
				                                        ,
				                                         {
					                                        "label":"'.$dinneroptions[7].'",
					                                        "value":'.$option7[2].'
				                                        }

			                                         ]
		                                        }');
                                    $columnChart->render();
                                    $columnChart = new FusionCharts(
                                        "column2d",
                                        "dth" ,
                                        "500",
                                        "400",
                                        "thursday",
                                        "json",
                                        '{
			                                        "chart":
			                                                {
				                                                "caption":" Lunch Mess menu Votes For Thursday",
				                                                "theme":"ocean"

			                                                },
			                                        "data":
			                                        [
				                                        {
					                                        "label":"'.$dinneroptions[1].'",
					                                        "value":'.$option1[3].'
				                                        },

				                                         {
					                                        "label":"'.$dinneroptions[2].'",
					                                        "value":'.$option2[3].'
				                                        }
				                                        ,
				                                         {
					                                        "label":"'.$dinneroptions[3].'",
					                                        "value":'.$option3[3].'
				                                        }
				                                        ,
				                                         {
					                                        "label":"'.$dinneroptions[4].'",
					                                        "value":'.$option4[3].'
				                                        }
				                                        ,
				                                         {
					                                        "label":"'.$dinneroptions[5].'",
					                                        "value":'.$option5[3].'
				                                        }
				                                        ,
				                                         {
					                                        "label":"'.$dinneroptions[6].'",
					                                        "value":'.$option6[3].'
				                                        }
				                                        ,
				                                         {
					                                        "label":"'.$dinneroptions[7].'",
					                                        "value":'.$option7[3].'
				                                        }

			                                         ]
		                                        }');
                                    $columnChart->render();
                                    $columnChart = new FusionCharts(
                                        "column2d",
                                        "df" ,
                                        "500",
                                        "400",
                                        "friday",
                                        "json",
                                        '{
			                                        "chart":
			                                                {
				                                                "caption":" Lunch Mess menu Votes For Friday",
				                                                "theme":"ocean"

			                                                },
			                                        "data":
			                                        [
				                                        {
					                                        "label":"'.$dinneroptions[1].'",
					                                        "value":'.$option1[4].'
				                                        },

				                                         {
					                                        "label":"'.$dinneroptions[2].'",
					                                        "value":'.$option2[4].'
				                                        }
				                                        ,
				                                         {
					                                        "label":"'.$dinneroptions[3].'",
					                                        "value":'.$option3[4].'
				                                        }
				                                        ,
				                                         {
					                                        "label":"'.$dinneroptions[4].'",
					                                        "value":'.$option4[4].'
				                                        }
				                                        ,
				                                         {
					                                        "label":"'.$dinneroptions[5].'",
					                                        "value":'.$option5[4].'
				                                        }
				                                        ,
				                                         {
					                                        "label":"'.$dinneroptions[6].'",
					                                        "value":'.$option6[4].'
				                                        }
				                                        ,
				                                         {
					                                        "label":"'.$dinneroptions[7].'",
					                                        "value":'.$option7[4].'
				                                        }

			                                         ]
		                                        }');
                                    $columnChart->render();
                                    $columnChart = new FusionCharts(
                                        "column2d",
                                        "ds" ,
                                        "500",
                                        "400",
                                        "saturday",
                                        "json",
                                        '{
			                                        "chart":
			                                                {
				                                                "caption":" Lunch Mess menu Votes For Saturday",
				                                                "theme":"ocean"

			                                                },
			                                        "data":
			                                        [
				                                        {
					                                        "label":"'.$dinneroptions[1].'",
					                                        "value":'.$option1[5].'
				                                        },

				                                         {
					                                        "label":"'.$dinneroptions[2].'",
					                                        "value":'.$option2[5].'
				                                        }
				                                        ,
				                                         {
					                                        "label":"'.$dinneroptions[3].'",
					                                        "value":'.$option3[5].'
				                                        }
				                                        ,
				                                         {
					                                        "label":"'.$dinneroptions[4].'",
					                                        "value":'.$option4[5].'
				                                        }
				                                        ,
				                                         {
					                                        "label":"'.$dinneroptions[5].'",
					                                        "value":'.$option5[5].'
				                                        }
				                                        ,
				                                         {
					                                        "label":"'.$dinneroptions[6].'",
					                                        "value":'.$option6[5].'
				                                        }
				                                        ,
				                                         {
					                                        "label":"'.$dinneroptions[7].'",
					                                        "value":'.$option7[5].'
				                                        }

			                                         ]
		                                        }');
                                    $columnChart->render();
                                    $columnChart = new FusionCharts(
                                        "column2d",
                                        "dwdu" ,
                                        "500",
                                        "400",
                                        "votingresults",
                                        "json",
                                        '{
			                                        "chart":
			                                                {
				                                                "caption":" Lunch Mess menu Votes For Sunday",
				                                                "theme":"ocean"

			                                                },
			                                        "data":
			                                        [
				                                        {
					                                        "label":"'.$dinneroptions[1].'",
					                                        "value":'.$option1[6].'
				                                        },

				                                         {
					                                        "label":"'.$dinneroptions[2].'",
					                                        "value":'.$option2[6].'
				                                        }
				                                        ,
				                                         {
					                                        "label":"'.$dinneroptions[3].'",
					                                        "value":'.$option3[6].'
				                                        }
				                                        ,
				                                         {
					                                        "label":"'.$dinneroptions[4].'",
					                                        "value":'.$option4[6].'
				                                        }
				                                        ,
				                                         {
					                                        "label":"'.$dinneroptions[5].'",
					                                        "value":'.$option5[6].'
				                                        }
				                                        ,
				                                         {
					                                        "label":"'.$dinneroptions[6].'",
					                                        "value":'.$option6[6].'
				                                        }
				                                        ,
				                                         {
					                                        "label":"'.$dinneroptions[7].'",
					                                        "value":'.$option7[6].'
				                                        }

			                                         ]
		                                        }');
                                    $columnChart->render();
                                }
                                if(isset($_POST['Bmessmenu'])){
                                    $dinneroptions = array();
                                    $option1 = array();
                                    $option2 = array();
                                    $option3 = array();
                                    $option4 = array();
                                    $option5 = array();
                                    $option6 = array();
                                    $option7 = array();
                                    $sql = "SHOW COLUMNS FROM messmenub";
                                    $result = mysqli_query($connection,$sql);
                                    while($row = mysqli_fetch_array($result)){
                                        $dinneroptions[] = $row['Field'];
                                    }
                                    $fetch = "select * from messmenub";
                                    $run = mysqli_query($connection, $fetch);
                                    while ($each = mysqli_fetch_array($run)) {
                                        $option1[] = $each[$dinneroptions[1]];
                                        $option2[] = $each[$dinneroptions[2]];
                                        $option3[] = $each[$dinneroptions[3]];
                                        $option4[] = $each[$dinneroptions[4]];
                                        $option5[] = $each[$dinneroptions[5]];
                                        $option6[] = $each[$dinneroptions[6]];
                                        $option7[] = $each[$dinneroptions[7]];
                                    }
                                    $columnChart = new FusionCharts(
                                        "column2d",
                                        "dm" ,
                                        "500",
                                        "400",
                                        "monday",
                                        "json",
                                        '{
			                                        "chart":
			                                                {
				                                                "caption":" Breakfast Mess menu Votes For Monday",
				                                                "theme":"ocean"

			                                                },
			                                        "data":
			                                        [
				                                        {
					                                        "label":"'.$dinneroptions[1].'",
					                                        "value":'.$option1[0].'
				                                        },

				                                         {
					                                        "label":"'.$dinneroptions[2].'",
					                                        "value":'.$option2[0].'
				                                        }
				                                        ,
				                                         {
					                                        "label":"'.$dinneroptions[3].'",
					                                        "value":'.$option3[0].'
				                                        }
				                                        ,
				                                         {
					                                        "label":"'.$dinneroptions[4].'",
					                                        "value":'.$option4[0].'
				                                        }
				                                        ,
				                                         {
					                                        "label":"'.$dinneroptions[5].'",
					                                        "value":'.$option5[0].'
				                                        }
				                                        ,
				                                         {
					                                        "label":"'.$dinneroptions[6].'",
					                                        "value":'.$option6[0].'
				                                        }
				                                        ,
				                                         {
					                                        "label":"'.$dinneroptions[7].'",
					                                        "value":'.$option7[0].'
				                                        }

			                                         ]
		                                        }');
                                    $columnChart->render();

                                    $columnChart = new FusionCharts(
                                        "column2d",
                                        "dt" ,
                                        "500",
                                        "400",
                                        "tuesday",
                                        "json",
                                        '{
			                                        "chart":
			                                                {
				                                                "caption":" Breakfast Mess menu Votes For Tuesday",
				                                                "theme":"ocean"

			                                                },
			                                        "data":
			                                        [
				                                        {
					                                        "label":"'.$dinneroptions[1].'",
					                                        "value":'.$option1[1].'
				                                        },

				                                         {
					                                        "label":"'.$dinneroptions[2].'",
					                                        "value":'.$option2[1].'
				                                        }
				                                        ,
				                                         {
					                                        "label":"'.$dinneroptions[3].'",
					                                        "value":'.$option3[1].'
				                                        }
				                                        ,
				                                         {
					                                        "label":"'.$dinneroptions[4].'",
					                                        "value":'.$option4[1].'
				                                        }
				                                        ,
				                                         {
					                                        "label":"'.$dinneroptions[5].'",
					                                        "value":'.$option5[1].'
				                                        }
				                                        ,
				                                         {
					                                        "label":"'.$dinneroptions[6].'",
					                                        "value":'.$option6[1].'
				                                        }
				                                        ,
				                                         {
					                                        "label":"'.$dinneroptions[7].'",
					                                        "value":'.$option7[1].'
				                                        }

			                                         ]
		                                        }');
                                    $columnChart->render();

                                    $columnChart = new FusionCharts(
                                        "column2d",
                                        "dw" ,
                                        "500",
                                        "400",
                                        "wednesday",
                                        "json",
                                        '{
			                                        "chart":
			                                                {
				                                                "caption":" Breakfast Mess menu Votes For Wednesday",
				                                                "theme":"ocean"

			                                                },
			                                        "data":
			                                        [
				                                        {
					                                        "label":"'.$dinneroptions[1].'",
					                                        "value":'.$option1[2].'
				                                        },

				                                         {
					                                        "label":"'.$dinneroptions[2].'",
					                                        "value":'.$option2[2].'
				                                        }
				                                        ,
				                                         {
					                                        "label":"'.$dinneroptions[3].'",
					                                        "value":'.$option3[2].'
				                                        }
				                                        ,
				                                         {
					                                        "label":"'.$dinneroptions[4].'",
					                                        "value":'.$option4[2].'
				                                        }
				                                        ,
				                                         {
					                                        "label":"'.$dinneroptions[5].'",
					                                        "value":'.$option5[2].'
				                                        }
				                                        ,
				                                         {
					                                        "label":"'.$dinneroptions[6].'",
					                                        "value":'.$option6[2].'
				                                        }
				                                        ,
				                                         {
					                                        "label":"'.$dinneroptions[7].'",
					                                        "value":'.$option7[2].'
				                                        }

			                                         ]
		                                        }');
                                    $columnChart->render();
                                    $columnChart = new FusionCharts(
                                        "column2d",
                                        "dth" ,
                                        "500",
                                        "400",
                                        "thursday",
                                        "json",
                                        '{
			                                        "chart":
			                                                {
				                                                "caption":" Breakfast Mess menu Votes For Thursday",
				                                                "theme":"ocean"

			                                                },
			                                        "data":
			                                        [
				                                        {
					                                        "label":"'.$dinneroptions[1].'",
					                                        "value":'.$option1[3].'
				                                        },

				                                         {
					                                        "label":"'.$dinneroptions[2].'",
					                                        "value":'.$option2[3].'
				                                        }
				                                        ,
				                                         {
					                                        "label":"'.$dinneroptions[3].'",
					                                        "value":'.$option3[3].'
				                                        }
				                                        ,
				                                         {
					                                        "label":"'.$dinneroptions[4].'",
					                                        "value":'.$option4[3].'
				                                        }
				                                        ,
				                                         {
					                                        "label":"'.$dinneroptions[5].'",
					                                        "value":'.$option5[3].'
				                                        }
				                                        ,
				                                         {
					                                        "label":"'.$dinneroptions[6].'",
					                                        "value":'.$option6[3].'
				                                        }
				                                        ,
				                                         {
					                                        "label":"'.$dinneroptions[7].'",
					                                        "value":'.$option7[3].'
				                                        }

			                                         ]
		                                        }');
                                    $columnChart->render();
                                    $columnChart = new FusionCharts(
                                        "column2d",
                                        "df" ,
                                        "500",
                                        "400",
                                        "friday",
                                        "json",
                                        '{
			                                        "chart":
			                                                {
				                                                "caption":" Breakfast Mess menu Votes For Friday",
				                                                "theme":"ocean"

			                                                },
			                                        "data":
			                                        [
				                                        {
					                                        "label":"'.$dinneroptions[1].'",
					                                        "value":'.$option1[4].'
				                                        },

				                                         {
					                                        "label":"'.$dinneroptions[2].'",
					                                        "value":'.$option2[4].'
				                                        }
				                                        ,
				                                         {
					                                        "label":"'.$dinneroptions[3].'",
					                                        "value":'.$option3[4].'
				                                        }
				                                        ,
				                                         {
					                                        "label":"'.$dinneroptions[4].'",
					                                        "value":'.$option4[4].'
				                                        }
				                                        ,
				                                         {
					                                        "label":"'.$dinneroptions[5].'",
					                                        "value":'.$option5[4].'
				                                        }
				                                        ,
				                                         {
					                                        "label":"'.$dinneroptions[6].'",
					                                        "value":'.$option6[4].'
				                                        }
				                                        ,
				                                         {
					                                        "label":"'.$dinneroptions[7].'",
					                                        "value":'.$option7[4].'
				                                        }

			                                         ]
		                                        }');
                                    $columnChart->render();
                                    $columnChart = new FusionCharts(
                                        "column2d",
                                        "ds" ,
                                        "500",
                                        "400",
                                        "saturday",
                                        "json",
                                        '{
			                                        "chart":
			                                                {
				                                                "caption":" Breakfast Mess menu Votes For Saturday",
				                                                "theme":"ocean"

			                                                },
			                                        "data":
			                                        [
				                                        {
					                                        "label":"'.$dinneroptions[1].'",
					                                        "value":'.$option1[5].'
				                                        },

				                                         {
					                                        "label":"'.$dinneroptions[2].'",
					                                        "value":'.$option2[5].'
				                                        }
				                                        ,
				                                         {
					                                        "label":"'.$dinneroptions[3].'",
					                                        "value":'.$option3[5].'
				                                        }
				                                        ,
				                                         {
					                                        "label":"'.$dinneroptions[4].'",
					                                        "value":'.$option4[5].'
				                                        }
				                                        ,
				                                         {
					                                        "label":"'.$dinneroptions[5].'",
					                                        "value":'.$option5[5].'
				                                        }
				                                        ,
				                                         {
					                                        "label":"'.$dinneroptions[6].'",
					                                        "value":'.$option6[5].'
				                                        }
				                                        ,
				                                         {
					                                        "label":"'.$dinneroptions[7].'",
					                                        "value":'.$option7[5].'
				                                        }

			                                         ]
		                                        }');
                                    $columnChart->render();
                                    $columnChart = new FusionCharts(
                                        "column2d",
                                        "dwdu" ,
                                        "500",
                                        "400",
                                        "votingresults",
                                        "json",
                                        '{
			                                        "chart":
			                                                {
				                                                "caption":" Breakfast Mess menu Votes For Sunday",
				                                                "theme":"ocean"

			                                                },
			                                        "data":
			                                        [
				                                        {
					                                        "label":"'.$dinneroptions[1].'",
					                                        "value":'.$option1[6].'
				                                        },

				                                         {
					                                        "label":"'.$dinneroptions[2].'",
					                                        "value":'.$option2[6].'
				                                        }
				                                        ,
				                                         {
					                                        "label":"'.$dinneroptions[3].'",
					                                        "value":'.$option3[6].'
				                                        }
				                                        ,
				                                         {
					                                        "label":"'.$dinneroptions[4].'",
					                                        "value":'.$option4[6].'
				                                        }
				                                        ,
				                                         {
					                                        "label":"'.$dinneroptions[5].'",
					                                        "value":'.$option5[6].'
				                                        }
				                                        ,
				                                         {
					                                        "label":"'.$dinneroptions[6].'",
					                                        "value":'.$option6[6].'
				                                        }
				                                        ,
				                                         {
					                                        "label":"'.$dinneroptions[7].'",
					                                        "value":'.$option7[6].'
				                                        }

			                                         ]
		                                        }');
                                    $columnChart->render();
                                }
                                ?>

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

<!-- Custom Js -->
<script src="../../JS/custom-scripts.js"></script>




</body>
</html>
