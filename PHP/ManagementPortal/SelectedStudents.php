<?php
include ("phpFunctions.php");
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
                <li><a id="studentList" class="nav-top-item" href="#" class="nav-top-item">Student's List</a>
                    <ul>
                        <li ><a id="selected" href="SelectedStudents.php">Selected</a></li>
                        <li ><a id="notSelected" href="NotSelectedStudents.php">Not Selected</a></li>
                    </ul>
                </li>
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
                <li><a href="login.php">Login</a></li>
                <li class="active">Office Main</li>

            </ol>
            <div class="panel-group" id="profile_box" style="padding-top: 3pt">
                <div class="row">

                    <div class="col-md-offset-1 col-md-10 col-md-offset-1">
                        <div class="panel panel-primary">
                            <div class="panel-heading" > Students List </div>
                            <div class="panel-body">
                                <div class="form-group ">
                                    <?php

                                        echo ' 
                                        <label>Search by Hostel: </label>
                                        <select  id="hostel" name="hostel">
                                            <option><----Choose-----></option>
                                            <option>M.A Jinnah</option>
                                            <option>Liaquat Hall</option>
                                            <option>Johar Hall</option>
                                            <option>Jupitar Hall</option>
                                        </select>

                                        <form method="post" action="SelectedStudents.php">
                                            <label for="name">Serach Student By Name: </label>
                                            <input type="text" name="studentName">
                                            <input type="submit" name="search" value="search">
                                        </form>';
                                    ?>

                                </div>
                                <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
                                <script>
                                    $("#hostel").on("change", function(){
                                        var selected = $(this).val();
                                        window.location = "SelectedStudents.php?selected="+selected;
                                    })
                                </script>
                                <table class="table">
                                    <tr>
                                        <th>Student Name</th>
                                        <th>Father Name</th>
                                        <th>Student id</th>
                                        <th>Student Hostel</th>
                                        <th>Room No</th>
                                    </tr>
                                    <?php
                                        if(isset($_POST['search'])){
                                            $temp = $_POST['studentName'];
                                            studentSearchByName($temp);
                                        }elseif(isset($_GET['selected'])){
                                            $temp1 = $_GET['selected'];
                                            studentSearchByHostel($temp1);
                                        }
                                        else{
                                            getSelectedStudentsList();
                                        }
                                    ?>

                                </table>

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