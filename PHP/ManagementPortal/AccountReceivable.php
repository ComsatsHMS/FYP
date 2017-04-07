<?php
session_start();
if(!isset($_SESSION['UserId'])){
    header('Location:OfficeLogin.php');
}
error_reporting(0);
include "../connection.php";
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
                    <a class=\"active-menu\" href=\"ViewInventory.php\"><i class=\"fa fa-\"></i> View Inventory</a>
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
                    <a href=\"StartVoting.php\"><i class=\"fa fa-\"></i> Voting </a>
                </li>";
                }
                if($_SESSION['Statistics'] == 1){
                    echo "<li>
                    <a href=\"OffStatistics.php\"><i class=\"fa fa-\"></i> Statistics </a>
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
                        <img id="profile_pic" src="../../IMAGES/<?php echo"{$_SESSION['UserPic']}";?>" alt="profilepic" style="width: 120px; height: 120px";>
                    </a>
                </div>
                <div class="col-md-6 col-xs-8 col-sm-8">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover">
                            <tr>
                                <td>Name</td>
                                <td><?php echo "{$_SESSION['UserFirstName'] }"; echo"  ";echo "{$_SESSION['UserLastName']}"; ?></td>
                            </tr>
                            <tr>
                                <td>Rank</td>
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
                <li><a href="../index.php">Home</a></li>
                <li><a href="OfficeLogin.php">Login</a></li>
                <li class="active">Inventory</li>
            </ol>
        </div>
        <div id="page-inner">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="board">
                        <div class="panel panel-default">

                            <div class="panel-heading" style="background-color: #999999"> Inventory System </div>
                            <div class="panel-body">
                                <div class="col-md-3">
                                    <div class="btn-group btn-group-sm btn-group-vertical" style="padding-top: 40pt">
                                        <a href="InventoryItems.php" class="btn btn-default" style="background-color: #999999;color: white">View All Items</a>
                                        <a href="RemainingInventory.php" class="btn btn-default" style="background-color: #999999;color: white">Remaining Inventory</a>
                                        <a href="PurchasedHistory.php" class="btn btn-default" style="background-color: #999999;color: white">Purchased History</a>
                                        <a href="UsedItemsHistory.php" class="btn btn-default" style="background-color: #999999;color: white">Used Items History</a>
                                        <a href="AccountPayable.php" class="btn btn-default" style="background-color: #999999;color: white">Account Payable</a>
                                        <a href="AccountReceivable.php" class="btn btn-default" style="background-color: #999999;color: white">Account Receivable/Received</a>
                                        <a href="BankAmount.php" class="btn btn-default" style="background-color: #999999;color: white">Bank Amount</a>
                                        <a href="PayableHistory.php" class="btn btn-default" style="background-color: #999999;color: white">Payable/Paid History</a>
                                    </div>
                                </div>
                                <div class="col-md-5">
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


                                <div class="col-md-4">
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
