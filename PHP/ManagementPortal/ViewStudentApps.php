<script>
    $(document).ready(function(){
        $('[data-toggle="popover"]').popover();
    });
</script>
<?php
error_reporting(0);
session_start();
include("../connection.php");
//for view complains on admin panel page
if(isset($_GET['selectedHostel'])){
    $_SESSION['selectedHostel'] = $_GET['selectedHostel'];
}

if(isset($_GET['selectedType'])){
    $_SESSION['selectedType'] = $_GET['selectedType'];
}

function getApps(){

    $selectedType = $_SESSION['selectedType'];
    $selectedHostel = $_SESSION['selectedHostel'];
    global $connection;

    if(isset($_SESSION['selectedType'])){
        echo "Below are the results for Choosen Application Type: "."$selectedType";
        $get_record = "select a.*,s.studentName,s.room,s.studentHostel from applications a,insertstudentprofile s where a.studentid = s.studentid and a.applicationType='$selectedType' ORDER BY  applicationNumber desc limit 5";
        $run = mysqli_query($connection, $get_record);
        while ($each_record = mysqli_fetch_array($run)){

            $app_ID = $each_record['applicationNumber'];
            $app_Type = $each_record['applicationtype'];
            $app_Text = $each_record['details'];
            $app_Date = $each_record['date'];
            $Student_Name  = $each_record['studentName'];
            $Room_No  = $each_record['room'];
            $Hostel= $each_record['studentHostel'];
            echo "
            <tr><td> $app_ID </td>
            <td> $Student_Name </td>
            <td> $Room_No </td>
            <td> $app_Type </td>
            <td> $Hostel </td>
            <td> <button type='button'  class='btn btn-success'><a href='AppDisplaytemp.php?id=$app_ID & room=$Room_No & name=$Student_Name & text=$app_Text'>View</a></button> </td>
            </tr>
        ";
        }
    }

    else if(isset($_SESSION['selectedHostel'])){
        echo "Below are the results for Choosen Hostel: "."$selectedHostel";
        $get_record = "select a.*,s.studentName,s.room,s.studentHostel from applications a,insertstudentprofile s where a.studentid = s.studentid and s.studentHostel='$selectedHostel' ORDER BY  applicationNumber desc limit 5";
        $run = mysqli_query($connection, $get_record);
        while ($each_record = mysqli_fetch_array($run)){

            $app_ID = $each_record['applicationNumber'];
            $app_Type = $each_record['applicationtype'];
            $app_Text = $each_record['details'];
            $app_Date = $each_record['date'];
            $Student_Name  = $each_record['studentName'];
            $Room_No  = $each_record['room'];
            $Hostel= $each_record['studentHostel'];
            echo "
            <tr><td> $app_ID </td>
            <td> $Student_Name </td>
            <td> $Room_No </td>
            <td> $app_Type </td>
            <td> $Hostel </td>
            <td> <button type='button'  class='btn btn-success'><a href='AppDisplaytemp.php?id=$app_ID & room=$Room_No & name=$Student_Name & text=$app_Text'>View</a> </button> </td>
            </tr>
        ";
        }
    }

    else{
        $get_record = "select a.*,s.studentName,s.room,s.studentHostel from applications a,insertstudentprofile s where a.studentid = s.studentid ORDER BY  applicationNumber desc limit 5";
        $run = mysqli_query($connection, $get_record);
        while ($each_record = mysqli_fetch_array($run)){

            $app_ID = $each_record['applicationNumber'];
            $app_Type = $each_record['applicationtype'];
            $app_Text = $each_record['details'];
            $app_Date = $each_record['date'];
            $Student_Name  = $each_record['studentName'];
            $Room_No  = $each_record['room'];
            $Hostel= $each_record['studentHostel'];
            echo "
            <tr><td> $app_ID </td>
            <td> $Student_Name </td>
            <td> $Room_No </td>
            <td> $app_Type </td>
            <td> $Hostel </td>
            <td><button type='button'  class='btn btn-success'><a href='AppDisplaytemp.php?id=$app_ID & room=$Room_No & name=$Student_Name & text=$app_Text'>View</a> </button>
            </td>
            </tr>
        ";
        }
    }


}

?>
<!DOCTYPE html>
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
                <li><a id="applications" class="nav-top-item" href="ViewStudentApps.php">View Applications</a></li>
                <li><a id="statistics" class="nav-top-item" href="OffStatistics.php">Statistics</a></li>
                <li><a id="vote" class="nav-top-item" href="StartVoting.php">Voting</a></li>
                <li><a id="logout" class="nav-top-item" href="OfficeLogin.php">Logout</a></li>
            </ul>
        </div>


        <!--    Start of the other column of size 10  -->
        <div class="col-md-10 col-xs-6" id="rightside" >
            <!--profile Pic of logged in user-->
            <div class="row">
                <div class="col-md-6 col-xs-6">
                    <li><a href="#" style="padding-bottom: 20%">
                            <img id="profile_pic" src="../../IMAGES/profile_pic.jpg" alt="profilepic" style="width: 100px; height: 100px"; /></a></li>
                </div>
                <!--Page header-->

                <div class="col-md-6 col-xs-6" id="profile" style="text-align: center;">
                    <span id="ciit_Label" style="font-size:10pt;">Welcome,</span>
                    <a href="#" title="Your profile">
                        <span id="ciit_office" style="font-size:14pt; "><?php echo "{$_SESSION['name']};" ?></span></a><br>
                    <a id="ciit_Signout" href="OfficeLogin.php" style="font-size: 12pt;font-style: italic">Log
                        Out</a>
                </div>
            </div>
            <br>
            <ol class="breadcrumb">
                <li><a href="../index.php">Home</a></li>
                <li><a href="OfficeLogin.php">Login</a></li>
                <li class="active">Students Applications</li>

            </ol>
            <div class="col-md-12">
                <div class="panel panel-primary">
                    <div class="panel-heading" > View Applications </div>
                    <!--            Content Box Contents-->
                    <div class="panel-body">
                        <div class="form-group ">
                            <?php
                            $check =  $_GET['id'];
                            if(!$check){
                                echo '  <label for="appType">Application Type: </label>
                                        <select  id="appType" name="appType">
                                            <option><----Choose-----></option>
                                            <option>Mess Close</option>
                                            <option>Mess Committee</option>
                                            <option>Sports Committee</option>
                                            <option>Wing Proctor</option>
                                            <option>Transport Committe</option>
                                            <option>Network Analyst</option>
                                            <option>Blood Society</option>
                                        </select>

                                        <label>Specify Hostel: </label>
                                        <select  id="hostel" name="hostel">
                                            <option><----Choose-----></option>
                                            <option>M.A Jinnah</option>
                                            <option>Liaqat Hall</option>
                                            <option>Johar Hall</option>
                                        </select>


                                ';
                            }
                            ?>

                        </div>

                        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
                        <script>
                            $("#hostel").on("change", function(){
                                var selected = $(this).val();
                                window.location = "ViewStudentApps.php?selectedHostel="+selected;
                            })
                        </script>
                        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
                        <script>
                            $("#appType").on("change", function(){
                                var selected = $(this).val();
                                window.location = "ViewStudentApps.php?selectedType="+selected;
                            })
                        </script>

                        <!-- Student Applications-->
                        <table class="table">
                            <tr>
                                <th>Application Id</th>
                                <th>Student Name</th>
                                <th>Room No</th>
                                <th>Application Type</th>
                                <th>Hostel</th>
                                <th>View</th>
                            </tr>
                            <?php
                                getApps();
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