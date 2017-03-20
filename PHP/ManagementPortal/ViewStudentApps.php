<script>
    $(document).ready(function(){
        $('[data-toggle="popover"]').popover();
    });
</script>
<?php
error_reporting(0);
session_start();
include("../connection.php");
//for view Applications on admin panel page
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
        $get_record = "select a.*,s.studentName,s.room,s.studentHostel from applications a,insertstudentprofile s where a.studentid = s.studentid and a.applicationType='$selectedType' ORDER BY  applicationNumber desc limit 15";
        $run = mysqli_query($connection, $get_record);
    }
    else if(isset($_SESSION['selectedHostel'])){
        echo "Below are the results for Choosen Hostel: "."$selectedHostel";
        $get_record = "select a.*,s.studentName,s.room,s.studentHostel from applications a,insertstudentprofile s where a.studentid = s.studentid and s.studentHostel='$selectedHostel' ORDER BY  applicationNumber desc limit 15";
        $run = mysqli_query($connection, $get_record);
    }
    else{
        $get_record = "select a.*,s.studentName,s.room,s.studentHostel from applications a,insertstudentprofile s where a.studentid = s.studentid and a.Status !=1  ORDER BY  applicationNumber desc limit 15";
        $run = mysqli_query($connection, $get_record);
    }
    while ($each_record = mysqli_fetch_array($run)){
        $Student_ID = $each_record['studentid'];
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
            <td> <button type='button'  class='btn btn-success'><a href='AppDisplaytemp.php?id=$Student_ID & room=$Room_No & name=$Student_Name & text=$app_Text &type=$app_Type'>View</a></button> </td>
            </tr>
        ";
    }
    unset($_SESSION['selectedType']);
    unset($_SESSION['selectedHostel']);
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
                <li class="active">View Applications</li>
            </ol>
        </div>
        <div id="page-inner">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="board">
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
                                <div >
                                    <a href="SelectedCommitteeMembers.php"><button class="btn-primary"> View Selected Applicants </button></a>
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
<?php
$var = 'http://localhost/FYP/PHP/ManagementPortal/ViewStudentApps.php?status=OK';
$Message = $_GET['status'];
$parsed = parse_url($var);
$query = $parsed['query'];
parse_str($query, $params);

if($Message=='OK'){
    echo "<script type='text/javascript'>alert('Success! Person is Selected.');</script>";
    unset($params['status']);
    $string = http_build_query($params);
    var_dump($string);

}
?>