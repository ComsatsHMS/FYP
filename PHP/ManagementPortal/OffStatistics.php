<?php
error_reporting(0);
session_start();
if(!isset($_SESSION['UserId'])){
    header('Location:OfficeLogin.php');
}
include "../connection.php";
include "../fusioncharts.php";
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
        <!-- Custom Styles-->
        <link href="../../CSS/custom-styles.css" rel="stylesheet" />
        <!-- Google Fonts-->
        <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
        <script type="text/javascript" src="http://static.fusioncharts.com/code/latest/fusioncharts.js"></script>
        <script type="text/javascript" src="../../JS/fusioncharts.theme.ocean.js"></script>
    </head>
    <body>
    <div id="wrapper">
        <nav class="navbar navbar-default top-navbar" role="navigation">
            <div class="navbar-header">
                <a  class="navbar-brand" href="MainApplicationOffice.php" id="sidebar-title">Management Portal</a>
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
                        <a  href="MainApplicationOffice.php"><i class="fa fa-"></i>Home</a>
                    </li>
                    <?php
                    if($_SESSION['HostelApplications'] == 1){
                        echo "<li>
                    <a href=\"ApplicationsDisplay.php\"><i class=\"fa fa-\"></i> Hostel Applications</a>
                </li>";
                    }
                    if($_SESSION['Allotment'] == 1){
                        echo " <li>
                    <a href=\"Allotment.php\"><i class=\"fa fa-\"></i> Allotment</a>
                </li>";
                    }
                    if($_SESSION['StudentsList'] == 1){
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
                    if($_SESSION['Complains'] == 1){
                        echo "<li>
                    <a href=\"ViewComplains.php\"><i class=\"fa fa-\"></i> View Complains</a>
                </li>";
                    }
                    if($_SESSION['Applications'] == 1){
                        echo "<li>
                    <a href=\"ViewStudentApps.php\"><i class=\"fa fa-\"></i> View Applications</a>
                </li>";
                    }
                    if($_SESSION['Fine'] == 1){
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
                    if($_SESSION['Inventory'] == 1){
                        echo "<li>
                    <a href=\"ViewInventory.php\"><i class=\"fa fa-\"></i> View Inventory</a>
                </li>";
                    }
                    if($_SESSION['Parents'] == 1){
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
                    if($_SESSION['Voting'] == 1){
                        echo " <li>
                    <a href=\"StartVoting.php\"><i class=\"fa fa-vote\"></i> Voting </a>
                </li>";
                    }
                    if($_SESSION['Statistics'] == 1){
                        echo "<li>
                    <a class=\"active-menu\" href=\"OffStatistics.php\"><i class=\"fa fa-\"></i> Statistics </a>
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
                            <img id="profile_pic" src="../../IMAGES/<?php echo $_SESSION['UserPic'];?>" alt="profilepic" style="width: 120px; height: 120px";>
                        </a>
                    </div>
                    <div class="col-md-6 col-xs-8 col-sm-8">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover">
                                <tr>
                                    <td>Name</td>
                                    <td><?php echo "{$_SESSION['UserFirstName'] }"; echo"  ";echo "{$_SESSION['UserLastName']}"; ?></td>
                                </tr>
                                <tr style="background-color: #f36a5a">
                                    <td >Rank</td>
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
                    <li class="active"> Statistics</li>
                </ol>
            </div>
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="board">
                            <div class="panel panel-primary">

                                <div class="panel-heading">Statistics</div>
                                <div class="panel-body">
                                    <form action="OffStatistics.php" method="post" enctype="multipart/form-data">

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
