<?php
session_start();
error_reporting(0);
include "../connection.php";
$fetch = "select * from voting";
$run = mysqli_query($connection, $fetch);
while ($each = mysqli_fetch_array($run)){
    $val = $each['Lunch'];
    $val1 = $each['Breakfast'];
    $val3 = $each['LunchBreakfast'];
}
$flag = 'false';
$fetch= " select flag from insertstudentprofile where studentid = {$_SESSION['id']}";
$exec = mysqli_query($connection,$fetch);
while($record = mysqli_fetch_array($exec)){
    $flag = $record['flag'];
}
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

            <div id="sideNav" href="">
                <i class="fa fa-bars icon"></i>
            </div>
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
                    <a href="StudentPortal.php"><i class="fa fa-user"></i> Profile</a>
                </li>
                <li>
                    <a href="Notifications.php"><i class="fa fa-bell"></i> Notifications</a>
                </li>

                <li>
                    <a href="Complaints.php"><i class="fa fa-"></i> Complains</a>
                </li>

                <li>
                    <a class="active-menu" href="Voting.php"><i class="fa fa-"></i> Votes</a>
                </li>
                <li>
                    <a href="Applications.php"><i class="fa fa-"></i> Applications </a>
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
                        <img id="profile_pic" src="../../IMAGES/<?php echo"{$_SESSION['pic']}";?>" alt="profilepic" style="width: 100px; height: 100px";>
                    </a>
                </div>

                <h1 class="col-md-3 col-xs-5 col-sm-5" style="padding-top:15px;">
                    Welcome <small> <?php echo "{$_SESSION['name']}"; ?></small>
                </h1>
                <h1 class="col-md-3 col-xs-3 col-sm-3"  style="padding-top:15px;">
                    <?PHP echo "{$_SESSION['hostel']}";?>
                </h1>
                <h1 class="col-md-3 col-xs-12 col-sm-12" style="padding-top:15px;">
                    Room No:<?php echo "{$_SESSION['room']}"; ?>
                </h1>
            </div>
            <ol class="breadcrumb">
                <li><a href="../index.php">Home</a></li>
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
                            <div class="panel-heading" > Voting </div>
                                <div class="panel-body">
                                    <?php
                                        $LBdate;
                                        $messdate;
                                        $tripdate;
                                        $query = "select endTime from votingtime where votingFor ='lunchBreakfast'";
                                        $run = mysqli_query($connection, $query);
                                        while ($each = mysqli_fetch_array($run)){
                                            $LBdate = $each['endTime'];
                                        }

                                        $query2 = "select endTime from votingtime where votingFor ='messMenu'";
                                        $run = mysqli_query($connection, $query2);
                                        while ($each = mysqli_fetch_array($run)){
                                            $messdate = $each['endTime'];
                                        }

                                        $query3 = "select endTime from votingtime where votingFor = 'forTrip'";
                                        $run = mysqli_query($connection, $query3);
                                        while ($each = mysqli_fetch_array($run)){
                                            $tripdate = $each['endTime'];
                                        }


                                        date_default_timezone_set("Asia/Karachi");
                                        //$startdate  = strtotime("05:15pm August 19 2016");
                                        //for lunch/breakfast
                                        $enddateL    = strtotime("$LBdate");
                                        $dateL = date('M d Y', time());
                                        $endL = date('M d Y', $enddateL);
                                        //for mess menu
                                        $enddateM    = strtotime("$messdate");
                                        $dateM = date('M d Y', time());
                                        $endM = date('M d Y', $enddateM);
                                        //for trip
                                        $enddateT    = strtotime("$tripdate");
                                        $dateT = date('M d Y', time());
                                        $endT = date('M d Y', $enddateT);

                                        if ($dateL < $endL) {
                                            echo "Voting Last Date is  ". date("d M Y", $enddateL) . "<br><br>";
                                            echo " <strong> What do you prefer?</strong>
                        <form role=\"form\" method=\"post\" action=\"VotingProcessing.php\">
                            <label class=\"radio-inline\">
                                <input type=\"radio\" name=\"optradio\" value=\"Breakfast\">Breakfast
                            </label>
                            <label class=\"radio-inline\">
                                <input type=\"radio\" name=\"optradio\" value=\"Lunch\">Lunch
                            </label>
                            <label class=\"radio-inline disabled\">
                                <input type=\"radio\" name=\"optradio\" value='both'>Both
                            </label>";

                                            if($flag == true){
                                                echo "
                                    <input type=\"submit\" name=\"submit\" disabled>";
                                            }
                                            else{
                                                echo "
                                    <input type=\"submit\" name=\"submit\">";
                                            }
                                            echo" </form>";

                                        }

                                        else if($dateM < $endM){

                                            if($val > $val1){ // If true then Lunch Menu
                                                echo "Voting Last Date is  ". date("d M Y", $enddateM) . "<br><br>";
                                                $flag= $_GET['flag'];
                                                echo'   <strong> Please! Choose Lunch Menu which suits you the most?</strong>
                                <form role="form" method="post" action="VotingProcessing.php">
                                    <fieldset id="Monday">
                                    <strong> Monday?</strong>  <br>
                                    <label class="radio-inline">
                                        <input type="radio" name="Monday" value="Rice">Rice
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="Monday" value="Mutton">Mutton
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="Monday" value="Chicken">Chicken
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="Monday" value="Biryani">Biryani
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="Monday" value="Korma">Korma
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="Monday" value="Karahi">Karahi
                                    </label> <br> </fieldset>

                                    <fieldset id="Tuesday">
                                    <strong> Tuesday?</strong>  <br>
                                    <label class="radio-inline">
                                        <input type="radio" name="Tuesday" value="Rice">Rice
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="Tuesday" value="Mutton">Mutton
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="Tuesday" value="Chicken">Chicken
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="Tuesday" value="Biryani">Biryani
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="Tuesday" value="Korma">Korma
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="Tuesday" value="Karahi">Karahi
                                    </label> <br></fieldset>


                                    <fieldset id="Wednesday">
                                    <strong> Wednesday?</strong>  <br>
                                    <label class="radio-inline">
                                        <input type="radio" name="Wednesday" value="Rice">Rice
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="Wednesday" value="Mutton">Mutton
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="Wednesday" value="Chicken">Chicken
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="Wednesday" value="Biryani">Biryani
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="Wednesday" value="Korma">Korma
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="Wednesday" value="Karahi">Karahi
                                    </label> <br></fieldset>

                                    <fieldset id="Thrusday">
                                    <strong> Thrusdsy?</strong>  <br>
                                    <label class="radio-inline">
                                        <input type="radio" name="Thrusday" value="Rice">Rice
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="Thrusday" value="Mutton">Mutton
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="Thrusday" value="Chicken">Chicken
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="Thrusday" value="Biryani">Biryani
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="Thrusday" value="Korma">Korma
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="Thrusday" value="Karahi">Karahi
                                    </label> <br></fieldset>

                                    <fieldset id="Friday">
                                    <strong> Friday?</strong>  <br>
                                    <label class="radio-inline">
                                        <input type="radio" name="Friday" value="Rice">Rice
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="Friday" value="Mutton">Mutton
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="Friday" value="Chicken">Chicken
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="Friday" value="Biryani">Biryani
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="Friday" value="Korma">Korma
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="Friday" value="Karahi">Karahi
                                    </label> <br></fieldset>

                                    <fieldset id="Saturday">
                                    <strong> Saturday?</strong>  <br>
                                    <label class="radio-inline">
                                        <input type="radio" name="Saturday" value="Rice">Rice
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="Saturday" value="Mutton">Mutton
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="Saturday" value="Chicken">Chicken
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="Saturday" value="Biryani">Biryani
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="Saturday" value="Korma">Korma
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="Saturday" value="Karahi">Karahi
                                    </label> <br></fieldset>

                                    <fieldset id="Sunday">
                                    <strong> Sunday?</strong>  <br>
                                    <label class="radio-inline">
                                        <input type="radio" name="Sunday" value="Rice">Rice
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="Sunday" value="Mutton">Mutton
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="Sunday" value="Chicken">Chicken
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="Sunday" value="Biryani">Biryani
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="Sunday" value="Korma">Korma
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="Sunday" value="Karahi">Karahi
                                    </label> <br></fieldset>

                                             <!--if($flag == true){-->
                                            <!---->
                                        <!--       <input type=\"submit\" name=\"submit\" disabled>-->
                                        <!--                    else{-->
                                    <input type="submit" name="submit_1">
                                </form>';
                                            }
                                            //Breakfast Menu

                                            else if($val < $val1){
                                                echo "Voting Last Date is  ". date("d M Y", $enddateM) . "<br><br>";
                                                $flag= $_GET['flag'];
                                                echo'   <strong> Please! Choose Breakfast Menu which suits you the most?</strong>
                                <form role="form" method="post" action="VotingProcessing.php">
                                    <fieldset id="Monday">
                                    <strong> Monday?</strong>  <br>
                                    <label class="radio-inline">
                                        <input type="radio" name="Monday" value="halwaPuri">Halwa Puri
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="Monday" value="nanChana">Naan Channa
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="Monday" value="andaParatha">Ommlete Paratha
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="Monday" value="haleem">Naan Haleem
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="Monday" value="eggBread">Egg Slice
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="Monday" value="alooParatha">aloo wala paratha
                                    </label> <br> </fieldset>

                                    <fieldset id="Tuesday">
                                    <strong> Tuesday?</strong>  <br>
                                    <label class="radio-inline">
                                        <input type="radio" name="Tuesday" value="halwaPuri">Halwa Puri
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="Tuesday" value="nanChana">Naan Channa
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="Tuesday" value="andaParatha">Ommlete Paratha
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="Tuesday" value="haleem">Naan Haleem
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="Tuesday" value="eggBread">Egg Slice
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="Tuesday" value="alooParatha">aloo wala paratha
                                    </label> <br> </fieldset>

                                    <fieldset id="Wednesday">
                                    <strong> Wednesday?</strong>  <br>
                                    <label class="radio-inline">
                                        <input type="radio" name="Wednesday" value="halwaPuri">Halwa Puri
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="Wednesday" value="nanChana">Naan Channa
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="Wednesday" value="andaParatha">Ommlete Paratha
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="Wednesday" value="haleem">Naan Haleem
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="Wednesday" value="eggBread">Egg Slice
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="Wednesday" value="alooParatha">aloo wala paratha
                                    </label> <br> </fieldset>

                                    <fieldset id="Thursday">
                                    <strong> Thursday?</strong>  <br>
                                    <label class="radio-inline">
                                        <input type="radio" name="Thursday" value="halwaPuri">Halwa Puri
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="Thursday" value="nanChana">Naan Channa
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="Thursday" value="andaParatha">Ommlete Paratha
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="Thursday" value="haleem">Naan Haleem
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="Thursday" value="eggBread">Egg Slice
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="Thursday" value="alooParatha">aloo wala paratha
                                    </label> <br> </fieldset>

                                    <fieldset id="Friday">
                                    <strong> Friday?</strong>  <br>
                                    <label class="radio-inline">
                                        <input type="radio" name="Friday" value="halwaPuri">Halwa Puri
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="Friday" value="nanChana">Naan Channa
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="Friday" value="andaParatha">Ommlete Paratha
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="Friday" value="haleem">Naan Haleem
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="Friday" value="eggBread">Egg Slice
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="Friday" value="alooParatha">aloo wala paratha
                                    </label> <br> </fieldset>

                                    <fieldset id="Saturday">
                                    <strong> Saturday?</strong>  <br>
                                    <label class="radio-inline">
                                        <input type="radio" name="Saturday" value="halwaPuri">Halwa Puri
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="Saturday" value="nanChana">Naan Channa
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="Saturday" value="andaParatha">Ommlete Paratha
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="Saturday" value="haleem">Naan Haleem
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="Saturday" value="eggBread">Egg Slice
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="Saturday" value="alooParatha">aloo wala paratha
                                    </label> <br> </fieldset>

                                    <fieldset id="Sunday">
                                    <strong> Sunday?</strong>  <br>
                                    <label class="radio-inline">
                                        <input type="radio" name="Sunday" value="halwaPuri">Halwa Puri
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="Sunday" value="nanChana">Naan Channa
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="Sunday" value="andaParatha">Ommlete Paratha
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="Sunday" value="haleem">Naan Haleem
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="Sunday" value="eggBread">Egg Slice
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="Sunday" value="alooParatha">aloo wala paratha
                                    </label> <br> </fieldset>



                                            <!--   if($flag == true){-->
                                            <!-- <input type=\"submit\" name=\"submit\" disabled>-->
                                            <!--  else{-->
                                    <input type="submit" name="submit_2">
                                </form>';
                                            }
                                            elseif($val == $val1 || ($val3>$val1 AND $val3>$val)){

                                            }
                                        }?>
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
