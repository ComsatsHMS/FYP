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
                <a href="#" id="sidebar-title">Student Hostel Portal</a></h4>
            <a href="StudentPortal.php">
                <img id="ciit_logo" src="../../IMAGES/CIITLogo_Plain.png" alt="COMSATS" />
            </a>
            <ul id="main-nav">
                <!--  Menu -->
                <li>
                    <a id="ciit_lnk_Profile" class="nav-top-item" href="StudentPortal.php">Profile</a>
                </li>
                <li>
                    <a id="ciit_lnk_Notifications" class="nav-top-item" href="Notifications.php">Notifications</a>
                </li>
                <li>
                    <a id="ciit_lnk_Complaints" class="nav-top-item" href="Complaints.php">Complaints</a>
                </li>
                <li>
                    <a id="ciit_lnk_Vote" class="nav-top-item" href="Voting.php">Vote</a>
                </li>
                <li>
                    <a id="ciit_lnk_Applications" class="nav-top-item" href="Applications.php">Applications</a>
                </li>
                <?php
                $fetch= "select studentID from wingproctorslist where studentID='{$_SESSION["id"]}'";
                $studentID;
                $transport = mysqli_query($connection,$fetch);
                while ($each_record = mysqli_fetch_array($transport)){
                    $studentID = $each_record['studentID'];
                }
                if($studentID == $_SESSION['id']){

                    echo '<li>
                            <a id="ciit_lnk_Applications" class="nav-top-item" href="ViewComplains.php?id=' . $studentID . '">Wing Complaints</a>
                        </li>';
                }


                ?>
                <li>
                    <a id="ciit_lnk_Statistics" class="nav-top-item" href="Statistics.php">Statistics</a>
                </li>

                <li><a href="#" id="ciit_lnk_FeeChallan" class="nav-top-item">Fee </a>
                    <ul>
                        <li><a href="#" id="ciit_lnkFee">Challan</a></li>
                        <li><a href="FeeHistory.php" id="ciit_lnkFeeHistory">History</a></li>
                    </ul>
                </li>
                <li>
                    <a id="ciit_lnk_logout" class="nav-top-item" href="MyLog.php">My Log</a>
                </li>
                <li>
                    <a id="ciit_lnk_logout" class="nav-top-item" href="Login.php">Logout</a>
                </li>
            </ul>
        </div>


        <!--    Start of the other column of size 10  -->
        <div class="col-md-10 col-xs-6" id="rightside" >
            <!--profile Pic of logged in user-->
            <div class="row">
                <div class="col-md-6 col-xs-6">
                    <li class="col-md-3"><a href="#">
                            <img id="profile_pic" src="../../IMAGES/profile_pic.jpg" alt="profilepic" style="width: 100px; height: 100px"; /></a></li>
                    <br><br>
                    <h1 class="col-md-9"> <?PHP echo "{$_SESSION['hostel']}";?>  </h1>
                </div>
                <!--Page header-->

                <div class="col-md-6 col-xs-6" id="profile" style="text-align: right;">
                    <span id="ciit_Label" >Welcome,</span>

                    <span id="ciit_StudentName"><?php echo "{$_SESSION['name']}"; ?></span><br>
                    <br><br><h3> Room No:<?php echo "{$_SESSION['room']}"; ?> </h3>
                </div>
            </div>
            <!--Breadcrumb Start-->
            <ol class="breadcrumb">
                <li><a href="../index.php">Home</a></li>
                <li><a href="Login.php">Login</a></li>
                <li><a href="StudentPortal.php">Student Portal</a></li>
                <li class="active">Statistics</li>
            </ol>


            <!--        Content Box Header-->
        <div class="panel-group" id="profile_box">
            <div class="row">

          <div class="col-md-12">
        <div class="panel panel-primary">
            <div class="panel-heading" > Voting </div>
<!--            Content Box Contents-->
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

                elseif($dateM < $endM){

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

                    elseif($val < $val1){
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
        </div>
</div>
</div>


    </div>
    </div>



</body>
</html>