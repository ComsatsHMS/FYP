<?php
error_reporting(0);
session_start();
include("Complaints_Processing.php");
include "../connection.php";
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
                        <li><a href="Challan.php" id="ciit_lnkFee">Challan</a></li>
                        <li><a href="FeeHistory.php" id="ciit_lnkFeeHistory">History</a></li>
                    </ul>
                </li>
                <li>
                    <a id="ciit_lnk_logout" class="nav-top-item" href="MyLog.php">My Log</a>
                </li>
                <li>
                    <a id="ciit_lnk_logout" class="nav-top-item" href="Logout.php">Logout</a>
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
                <li><a href="Logout.php">Login</a></li>
                <li><a href="StudentPortal.php">Student Portal</a></li>
                <li class="active">View Complains</a></li>
            </ol>


            <div class="col-md-12">
                <div class="panel panel-primary">
                    <div class="panel-heading" > View Complains </div>
                    <!--            Content Box Contents-->
                    <div class="panel-body">
                        <div class="form-group ">
                            <?php
                            $check =  $_GET['id'];
                            if(!$check){
                         echo '  <label for="complain">Complain Type: </label>
                            <select  id="complainType" name="ComplainType">
                                <option><----Choose-----></option>
                                <option>Mess Complain</option>
                                <option>Water Complain</option>
                                <option>Sweeper Complain</option>
                                <option>Other Complain</option>
                            </select>

                            <label>Specify Hostel: </label>
                            <select  id="hostel" name="hostel">
                                <option><----Choose-----></option>
                                <option>M.A Jinnah</option>
                                <option>Liaqat Hall</option>
                                <option>Johar Hall</option>
                            </select>

                            <form method="post" action="Complaints_Processing.php">
                                <label for="date">Date: </label>
                                <input type="date" name="date">
                                <input type="submit" value="Go">
                            </form>';} ?>

                        </div>

                        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
                        <script>
                            $("#hostel").on("change", function(){
                                var selected = $(this).val();
                                window.location = "Complaints_Processing.php?selected="+selected;
                            })
                        </script>
                        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
                        <script>
                            $("#complainType").on("change", function(){
                                var selected = $(this).val();
                                window.location = "Complaints_Processing.php?selected_="+selected;
                            })
                        </script>

                        <!--                Complaints-->
                        <table class="table">
                            <tr>
                                <th>Complain ID</th>
                                <th>Student Name</th>
                                <th>Room No</th>
                                <th>Complain Type</th>
                                <th>Date & Time</th>
                                <th>Hostel</th>
                                <th>Status</th>
                            </tr>
                            <?php
                            $check =  $_GET['id'];

                            $start; $end;

                            if($check){
                            $get_record = "select c.*,s.studentName,s.room,s.studentHostel from complaints c,insertstudentprofile s where c.studentid=s.studentid ORDER BY  ComplainID desc limit 5";
                            $run = mysqli_query($connection, $get_record);
                            while ($each_record = mysqli_fetch_array($run)){
                                $Student_ID   = $each_record['studentid'];
                                $Complain_ID   = $each_record['ComplainID'];
                                $Complain_Type = $each_record['ComplainType'];
                                $Complain_Text = $each_record['ComplainText'];
                                $Complain_Date = $each_record['Date'];
                                $Student_Name  = $each_record['studentName'];
                                $Room_No       = $each_record['room'];
                                $Hostel= $each_record['studentHostel'];
                                $query = mysqli_query($connection, "select w.*,c.ComplainID from wingproctorslist w,complaints c where w.studentID=$check ORDER BY  ComplainID desc limit 5");
                                    while ($each = mysqli_fetch_array($query)) {
                                        $start = $each['start'];
                                        $end = $each['end'];}

                                        if($Room_No >= $start && $Room_No <= $end ) {
                                            echo "
            <tr><td> $Complain_ID </td>
            <td> $Student_Name </td>
            <td> $Room_No </td>
            <td> $Complain_Type </td>
            <td> $Complain_Date </td>
              <td> $Hostel </td>
            <td> <button type='button'  class='btn btn-success'><a href='ComplainsDisplay.php?id=$Student_ID & room=$Room_No & name=$Student_Name & text=$Complain_Text'>View</a> </button> </td>
            </tr>
        ";
                                        }
                            }
                            }
                            else{
                                getComplainDetails();
                            }
                            ?>

                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
</body>
</html>