<!DOCTYPE html>
<?php
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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>office Portal</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script><script src="//cdnjs.cloudflare.com/ajax/libs/jquery.matchHeight/0.7.0/jquery.matchHeight-min.js"></script>
    <link rel="stylesheet" href='../../CSS/OfficePortal.css' type="text/css" media="screen" />


</head>

<script>
    $(document).ready(function(){
        $('#sidebar').height($(window).height());
    });
</script>
<script>
    $(document).ready(function(){
        $('#rightside').height($(window).height());
    });
</script>

<body>
<div class="container-fluid" >
    <div class="row" >
        <!--    Column of size 2 for sidebar Menu -->
        <div  class= "col-md-2 col-xs-6" id="sidebar">
            <!-- Sidebar with logo and menu -->
            <h4 >
                <a href="MainApplicationOffice.php" id="sidebar-title">Office Hostel Portal</a></h4>
            <a href="#">
                <img id="ciit_logo" src="../../IMAGES/CIITLogo_Plain.png" alt="COMSATS" />
            </a>
            <ul id="main-nav">
                <!--  Menu -->
                <li><a id="applications" class="nav-top-item" href="ApplicationsDisplay.php">Hostel Applications</a></li>
                <li><a id="allotment" class="nav-top-item" href="Allotment.php">Allotment</a></li>
                <li><a id="complains" class="nav-top-item" href="ViewComplains.php">View Complains</a></li>
                <li><a id="applications" class="nav-top-item" href="ViewApplications.php">View Applications</a></li>
                <li><a id="statistics" class="nav-top-item" href="OffStatistics.php">Statistics</a></li>
                <li><a id="vote" class="nav-top-item" href="StartVoting.php">Voting</a></li>
                <li><a id="logout" class="nav-top-item" href="OfficeLogin.php">Logout</a></li>
            </ul>
        </div>


        <!--    Start of the other column of size 10  -->
        <div class="col-md-10 col-xs-6" id="rightside" >
            <!--profile Pic of logged in user-->
            <div class="row" style="padding-bottom: 8pt">
                <div class="col-md-6 col-xs-6">
                    <li><a href="#" style="padding-bottom: 20%">
                            <img id="profile_pic" src="../../IMAGES/profilepic.jpg" alt="profilepic" style="width: 100px; height: 100px"; /></a></li>
                </div>
                <!--Page header-->

                <div class="col-md-6 col-xs-6" id="profile" style="text-align: center;">
                    <span id="ciit_Label" style="font-size:10pt;">Welcome,</span>
                    <a href="#" title="Your profile">
                        <span id="ciit_office" style="font-size:14pt; ">abcd</span></a><br>
                    <a id="ciit_Signout" href="login.php" style="font-size: 12pt;font-style: italic">Log
                        Out</a>
                </div>
            </div>
            <ol class="breadcrumb">
                <li><a href="index.php">Home</a></li>
                <li><a href="#">Login</a></li>
                <li><a href="mainApplicationOffice.php">Office Main</a></li>
                <li class="active">Start Voting</li>
            </ol>
            <div class="panel-group" id="profile_box" style="padding-top: 3pt">
                <div class="row">

                    <div class="col-md-offset-1 col-md-10 col-md-offset-1">
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
        </div>
    </div>
</div>
</body>
</html>