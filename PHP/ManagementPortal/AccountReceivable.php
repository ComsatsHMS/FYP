<?php
session_start();
error_reporting(0);
include "../connection.php";
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
        $('#sidebar').height(800);
    });
</script>

<script>
    $(document).ready(function(){
        $('#rightside').height(800);
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
                <li><a id="fee" class="nav-top-item" href="#">Fee/Fine</a>
                    <ul>
                        <li ><a id="mess_fee" href="MessFeeChallan.php">Mess Fee Challan</a></li>
                        <li ><a id="fine" href="Fine.php">Fine</a></li>
                        <li ><a id="mess_paid" href="MessFeePaidList.php">Mess Fee Paid Student's List</a></li>
                        <li ><a id="mess_unpaid" href="MessFeeUnPaidList.php">Mess Fee unPaid Student's List</a></li>
                    </ul>

                </li>
                <li><a id="inventory" class="nav-top-item" href="ViewInventory.php">View Inventory</a></li>
                <li><a id="logout" class="nav-top-item" href="OfficeLogin.php">Logout</a></li>
            </ul>
        </div>


        <!--    Start of the other column of size 10  -->
        <div class="col-md-10 col-xs-6" id="rightside" >
            <!--profile Pic of logged in user-->
            <div class="row" style="padding-bottom: 8pt">
                <div class="col-md-6 col-xs-6">
                    <li><a href="#" style="padding-bottom: 20%">
                            <img id="profile_pic" src="../../IMAGES/profile_pic.jpg" alt="profilepic" style="width: 100px; height: 100px"; /></a></li>
                </div>
                <!--Page header-->

                <div class="col-md-6 col-xs-6" id="profile" style="text-align: center;">
                    <span id="ciit_Label" style="font-size:10pt;">Welcome,</span>
                    <a href="#" title="Your profile">
                        <span id="ciit_office" style="font-size:14pt; ">abcd</span></a><br>
                    <a id="ciit_Signout" href="OfficeLogin.php" style="font-size: 12pt;font-style: italic">Log
                        Out</a>
                </div>
            </div>
            <ol class="breadcrumb">
                <li><a href="MainApplicationOffice.php">Home</a></li>
                <li><a href="OfficeLogin.php">Login</a></li>
                <li class="active">Inventory</li>

            </ol>

            <div class="panel-group" id="profile_box" style="padding-top: 3pt">
                <div class="row">

                    <div class="col-md-offset-1 col-md-10 col-md-offset-1">
                        <div class="panel panel-primary">
                            <div class="panel-heading" > Inventory System </div>
                            <div class="panel-body">
                                <div class="btn-group btn-group-lg">
                                    <a href="ViewInventory.php" class="btn btn-primary">Return To Inventory</a>
                                </div><br><br>


                                <div class="col-md-6">
                                    <div class="col-md-offset-2">
                                        <h2> Used Items </h2>
                                    </div>


                                        <form class="form-horizontal" method="post" action="InventoryProcessing.php">
                                            <div class="form-group">
                                                <label class="control-label col-md-4" for="ItemNo">Item No: </label>

                                                <input type="number" name="ItemNo_" id="ItemNo_">
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-4" for="ItemName">Item Name: </label>
                                                <input type="text" name="ItemName_" id="ItemName_">
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-4" for="UnitsUsed">Units Used: </label>
                                                <input type="number" name="UnitsUsed_" id="UnitsUsed_">
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-4" for="UnitCost">Per Unit Cost: </label>
                                                <input type="number" name="UnitCost_" id="UnitCost_">
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-4" for="TotalCost">Total Cost: </label>
                                                <input type="number" name="TotalCost_" id="TotalCost_">
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-4" for="TotalCost">Used for: </label>
                                            <textarea name="UsedFor_" class="col-md-4"
                                                      id="UsedFor_">
                                            </textarea>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-offset-4">
                                                    <input  type="submit" value="Update" name="Update_">
                                                </div>
                                            </div>
                                        </form>

                                        <?php
                                        if($_SESSION['BalanceUpdate']=="Ok"){
                                            echo "<script>
                                    alert(\"Success! Records are Updated!\");
                                    </script>";
                                        }
                                        else if($_SESSION['BalanceUpdate']=="error"){
                                            echo "<script>
                                    alert(\"Error! Records Not Updated\");
                                    </script>";
                                        }
                                        else if($_SESSION['BalanceUpdate']=="cost"){
                                            echo "<script>
                                    alert(\"Error! Totoal Cost Not correct!\");
                                    </script>";
                                        }
                                        else if($_SESSION['BalanceUpdate']=="mismatch"){
                                            echo "<script>
                                    alert(\"Error! Item No or Name Not Correct!\");
                                    </script>";
                                        }
                                        unset($_SESSION['BalanceUpdate']);
                                        ?>
                                </div>


                                <div class="col-md-6">
                                    <div class="col-md-offset-2">
                                    <h2> Purchased Items </h2>
                                        </div>


                                        <form class="form-horizontal" method="post" action="InventoryProcessing.php">
                                            <div class="form-group">
                                                <label class="control-label col-md-4" for="ItemNo">Item No: </label>

                                                <input type="number" name="ItemNo" id="ItemNo">
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-4" for="ItemName">Item Name: </label>
                                                <input type="text" name="ItemName" id="ItemName">
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-4" for="UnitsPurchased">Units Purchased: </label>
                                                <input type="number" name="UnitsPurchased" id="UnitsPurchased">
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-4" for="UnitCost">Per Unit Cost: </label>
                                                <input type="number" name="UnitCost" id="UnitCost">
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-4" for="TotalCost">Total Cost: </label>
                                                <input type="number" name="TotalCost" id="TotalCost">
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-offset-4">
                                                    <input  type="submit" value="Update" name="Update">
                                                </div>
                                            </div>
                                        </form>
                                    <?php
                                    if($_SESSION['BalanceUpdate']=="Ok"){
                                        echo "<script>
                                    alert(\"Success! Records are Updated!\");
                                    </script>";
                                    }
                                    else if($_SESSION['BalanceUpdate']=="error"){
                                     echo "<script>
                                    alert(\"Error! Records Not Updated\");
                                    </script>";
                                    }
                                    else if($_SESSION['BalanceUpdate']=="cost"){
                                        echo "<script>
                                    alert(\"Error! Totoal Cost Not correct!\");
                                    </script>";
                                    }
                                    else if($_SESSION['BalanceUpdate']=="mismatch"){
                                        echo "<script>
                                    alert(\"Error! Item No or Name Not Correct!\");
                                    </script>";
                                    }
                                    unset($_SESSION['BalanceUpdate']);
                                    ?>

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