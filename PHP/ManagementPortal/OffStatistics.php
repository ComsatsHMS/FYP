<?php
session_start();
error_reporting(0);
include("../connection.php");
//lunch arrays
$Rice = array();
$Mutton = array();
$Chicken = array();
$Biryani = array();
$Karahi = array();
$Korma = array();
//breakfast arrays
$halwaPuri = array();
$nanChana = array();
$andaParatha = array();
$haleem = array();
$eggBread = array();
$alooParatha = array();
//fetch lunch voted data
$fetch1 = "select * from messmenu";
$run1 = mysqli_query($connection, $fetch1);
while ($each = mysqli_fetch_array($run1)) {
    $Rice[] = $each['Rice'];
    $Mutton[] = $each['Mutton'];
    $Chicken[] = $each['Chicken'];
    $Biryani[] = $each['Biryani'];
    $Karahi[] = $each['Karahi'];
    $Korma[] = $each['Korma'];

}
//fetch breakfast voted data
$fetch2 = "select * from messmenub";
$run2 = mysqli_query($connection, $fetch2);
while ($each = mysqli_fetch_array($run2)) {
    $halwaPuri[] = $each['halwaPuri'];
    $nanChana[] = $each['nanChana'];
    $andaParatha[] = $each['andaParatha'];
    $haleem[] = $each['haleem'];
    $eggBread[] = $each['eggBread'];
    $alooParatha[] = $each['alooParatha'];

}
$fetch = "select * from voting";
$run = mysqli_query($connection, $fetch);
while ($each = mysqli_fetch_array($run)) {
    $val = $each['Lunch'];
    $val1 = $each['Breakfast'];
    $val2 = $each['LunchBreakfast'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Student Portal</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js">
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery.matchHeight/0.7.0/jquery.matchHeight-min.js"></script>

    <link rel="stylesheet" href='../../CSS/StudentPortal.css' type="text/css" media="screen" />
</head>
<script type="text/javascript">
    function lunchBreakfast(){
        var chart = new CanvasJS.Chart("chartContainer",
            {
                animationEnabled: true,
                title:{
                    text: "Survey Chart"
                },
                data: [
                    {
                        type: "column", //change type to bar, line, area, pie, etc
                        dataPoints:[
                            { label: "Breakfast", y: <?php echo "$val1"; ?> },
                            { label: "Lunch", y:  <?php echo "$val"; ?> },
                            { label: "Both", y:  <?php echo "$val2"; ?> }
                        ]

                    }
                ]
            });

        chart.render();
    }

    function messMenu(){
        var lvalue = <?php echo $val ?>;
        var bvalue = <?php echo $val1 ?>;
        var both = <?php echo $val2 ?>;
        //lunch have more votes
        if(lvalue > bvalue && lvalue > both){
            var chart = new CanvasJS.Chart("chartContainer",
                {
                    animationEnabled: true,
                    title:{
                        text: "Lunch Mess Menu Statistics"
                    },
                    data: [
                        {
                            type: "column", //change type to bar, line, area, pie, etc
                            legendText: "Rice",
                            showInLegend: true,
                            dataPoints:[
                                { label: "Monday",  y: <?php echo $Rice[0] ?> },
                                { label: "Tuesday",  y: <?php echo $Rice[1] ?> },
                                { label: "Wednesday",  y: <?php echo $Rice[2] ?> },
                                { label: "Thursday",  y: <?php echo $Rice[3] ?> },
                                { label: "Friday",  y: <?php echo $Rice[4] ?> },
                                { label: "Saturday",  y: <?php echo $Rice[5] ?> },
                                { label: "Sunday",  y: <?php echo $Rice[6] ?> }
                            ]
                        },
                        {
                            type: "column", //change type to bar, line, area, pie, etc
                            legendText: "Mutton",
                            showInLegend: true,
                            dataPoints:[
                                { label: "Monday",  y: <?php echo $Mutton[0] ?> },
                                { label: "Tuesday",  y: <?php echo $Mutton[1] ?> },
                                { label: "Wednesday",  y: <?php echo $Mutton[2] ?> },
                                { label: "Thursday",  y: <?php echo $Mutton[3] ?> },
                                { label: "Friday",  y: <?php echo $Mutton[4] ?> },
                                { label: "Saturday",  y: <?php echo $Mutton[5] ?> },
                                { label: "Sunday",  y: <?php echo $Mutton[6] ?> }
                            ]
                        },
                        {
                            type: "column", //change type to bar, line, area, pie, etc
                            legendText: "Chicken",
                            showInLegend: true,
                            dataPoints:[
                                { label: "Monday",  y: <?php echo $Chicken[0] ?> },
                                { label: "Tuesday",  y: <?php echo $Chicken[1] ?> },
                                { label: "Wednesday",  y: <?php echo $Chicken[2] ?> },
                                { label: "Thursday",  y: <?php echo $Chicken[3] ?> },
                                { label: "Friday",  y: <?php echo $Chicken[4] ?> },
                                { label: "Saturday",  y: <?php echo $Chicken[5] ?> },
                                { label: "Sunday",  y: <?php echo $Chicken[6] ?> }
                            ]
                        },
                        {
                            type: "column", //change type to bar, line, area, pie, etc
                            legendText: "Briyani",
                            showInLegend: true,
                            dataPoints:[
                                { label: "Monday",  y: <?php echo $Biryani[0] ?> },
                                { label: "Tuesday",  y: <?php echo $Biryani[1] ?> },
                                { label: "Wednesday",  y: <?php echo $Biryani[2] ?> },
                                { label: "Thursday",  y: <?php echo $Biryani[3] ?> },
                                { label: "Friday",  y: <?php echo $Biryani[4] ?> },
                                { label: "Saturday",  y: <?php echo $Biryani[5] ?> },
                                { label: "Sunday",  y: <?php echo $Biryani[6] ?> }
                            ]
                        },
                        {
                            type: "column", //change type to bar, line, area, pie, etc
                            legendText: "Korma",
                            showInLegend: true,
                            dataPoints:[
                                { label: "Monday",  y: <?php echo $Korma[0] ?> },
                                { label: "Tuesday",  y: <?php echo $Korma[1] ?> },
                                { label: "Wednesday",  y: <?php echo $Korma[2] ?> },
                                { label: "Thursday",  y: <?php echo $Korma[3] ?> },
                                { label: "Friday",  y: <?php echo $Korma[4] ?> },
                                { label: "Saturday",  y: <?php echo $Korma[5] ?> },
                                { label: "Sunday",  y: <?php echo $Korma[6] ?> }
                            ]
                        },
                        {
                            type: "column", //change type to bar, line, area, pie, etc
                            legendText: "Karahi",
                            showInLegend: true,
                            dataPoints:[
                                { label: "Monday",  y: <?php echo $Karahi[0] ?> },
                                { label: "Tuesday",  y: <?php echo $Karahi[1] ?> },
                                { label: "Wednesday",  y: <?php echo $Karahi[2] ?> },
                                { label: "Thursday",  y: <?php echo $Karahi[3] ?> },
                                { label: "Friday",  y: <?php echo $Karahi[4] ?> },
                                { label: "Saturday",  y: <?php echo $Karahi[5] ?> },
                                { label: "Sunday",  y: <?php echo $Karahi[6] ?> }
                            ]
                        }
                    ]
                });

            chart.render();

        }
        // breakfast have more votes
        else if(bvalue > lvalue && bvalue > both){
            var chart = new CanvasJS.Chart("chartContainer",
                {
                    animationEnabled: true,
                    title:{
                        text: "Breakfast Mess Menu Statistics"
                    },
                    data: [
                        {
                            type: "column", //change type to bar, line, area, pie, etc
                            legendText: "Halwa Puri",
                            showInLegend: true,
                            dataPoints:[
                                { label: "Monday",  y: <?php echo $halwaPuri[0] ?> },
                                { label: "Tuesday",  y: <?php echo $halwaPuri[1] ?> },
                                { label: "Wednesday",  y: <?php echo $halwaPuri[2] ?> },
                                { label: "Thursday",  y: <?php echo $halwaPuri[3] ?> },
                                { label: "Friday",  y: <?php echo $halwaPuri[4] ?> },
                                { label: "Saturday",  y: <?php echo $halwaPuri[5] ?> },
                                { label: "Sunday",  y: <?php echo $halwaPuri[6] ?> }
                            ]
                        },
                        {
                            type: "column", //change type to bar, line, area, pie, etc
                            legendText: "naan Chana",
                            showInLegend: true,
                            dataPoints:[
                                { label: "Monday",  y: <?php echo $nanChana[0] ?> },
                                { label: "Tuesday",  y: <?php echo $nanChana[1] ?> },
                                { label: "Wednesday",  y: <?php echo $nanChana[2] ?> },
                                { label: "Thursday",  y: <?php echo $nanChana[3] ?> },
                                { label: "Friday",  y: <?php echo $nanChana[4] ?> },
                                { label: "Saturday",  y: <?php echo $nanChana[5] ?> },
                                { label: "Sunday",  y: <?php echo $nanChana[6] ?> }
                            ]
                        },
                        {
                            type: "column", //change type to bar, line, area, pie, etc
                            legendText: "Ommlete Paratha",
                            showInLegend: true,
                            dataPoints:[
                                { label: "Monday",  y: <?php echo $andaParatha[0] ?> },
                                { label: "Tuesday",  y: <?php echo $andaParatha[1] ?> },
                                { label: "Wednesday",  y: <?php echo $andaParatha[2] ?> },
                                { label: "Thursday",  y: <?php echo $andaParatha[3] ?> },
                                { label: "Friday",  y: <?php echo $andaParatha[4] ?> },
                                { label: "Saturday",  y: <?php echo $andaParatha[5] ?> },
                                { label: "Sunday",  y: <?php echo $andaParatha[6] ?> }
                            ]
                        },
                        {
                            type: "column", //change type to bar, line, area, pie, etc
                            legendText: "Naan Haleem",
                            showInLegend: true,
                            dataPoints:[
                                { label: "Monday",  y: <?php echo $haleem[0] ?> },
                                { label: "Tuesday",  y: <?php echo $haleem[1] ?> },
                                { label: "Wednesday",  y: <?php echo $haleem[2] ?> },
                                { label: "Thursday",  y: <?php echo $haleem[3] ?> },
                                { label: "Friday",  y: <?php echo $haleem[4] ?> },
                                { label: "Saturday",  y: <?php echo $haleem[5] ?> },
                                { label: "Sunday",  y: <?php echo $haleem[6] ?> }
                            ]
                        },
                        {
                            type: "column", //change type to bar, line, area, pie, etc
                            legendText: "Egg Slice",
                            showInLegend: true,
                            dataPoints:[
                                { label: "Monday",  y: <?php echo $eggBread[0] ?> },
                                { label: "Tuesday",  y: <?php echo $eggBread[1] ?> },
                                { label: "Wednesday",  y: <?php echo $eggBread[2] ?> },
                                { label: "Thursday",  y: <?php echo $eggBread[3] ?> },
                                { label: "Friday",  y: <?php echo $eggBread[4] ?> },
                                { label: "Saturday",  y: <?php echo $eggBread[5] ?> },
                                { label: "Sunday",  y: <?php echo $eggBread[6] ?> }
                            ]
                        },
                        {
                            type: "column", //change type to bar, line, area, pie, etc
                            legendText: "aloo wala paratha",
                            showInLegend: true,
                            dataPoints:[
                                { label: "Monday",  y: <?php echo $alooParatha[0] ?> },
                                { label: "Tuesday",  y: <?php echo $alooParatha[1] ?> },
                                { label: "Wednesday",  y: <?php echo $alooParatha[2] ?> },
                                { label: "Thursday",  y: <?php echo $alooParatha[3] ?> },
                                { label: "Friday",  y: <?php echo $alooParatha[4] ?> },
                                { label: "Saturday",  y: <?php echo $alooParatha[5] ?> },
                                { label: "Sunday",  y: <?php echo $alooParatha[6] ?> }
                            ]
                        }
                    ]
                });

            chart.render();
        }
    }
</script>
<script type="text/javascript" src="../../JS Functions/canvasjs.min.js"></script>

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
            <!--Breadcrumb Start-->
            <ol class="breadcrumb">
                <li><a href="index.php">Home</a></li>
                <li><a href="Login.php">Login</a></li>
                <li><a href="StudentPortal.php">Office Portal</a></li>
                <li class="active">Statistics</li>
            </ol>
            <!--        Content Box Header-->
            <div class="panel-group" id="profile_box">
                <div class="row">

                    <div class="col-md-12">
                        <div class="panel panel-primary">
                            <div class="panel-heading" > Statistics </div>

                            <div class="panel-body">
                                <button onclick="lunchBreakfast();">lunch/Breakfast</button>
                                <button onclick="messMenu();">Mess Menu</button>
                                <button  id="my_button" >one day Trip</button>
                                <div id="chartContainer" style="height: 300px; width: 90%;"></div>

                            </div>
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