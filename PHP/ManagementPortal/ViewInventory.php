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
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
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

    <div id="page-wrapper" style="margin-right: -10px">
        <div class="header row" style="margin-right: -10px">
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
                <li><a href="../../index.html">Home</a></li>
                <li><a href="OfficeLogin.php">Login</a></li>
                <li class="active">Inventory</li>
            </ol>
        </div>
        <div id="page-inner">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="board">
                        <div class="panel panel-primary">

                            <div class="panel-heading nav navbar-inverse" style="max-height: 70px; padding-left: 0px;padding-right: 0px">
                                <div class="col-md-5">
                                    <h3 class="panel-title" style="padding-top: 15px">Inventory System</h3>
                                </div>
                                <div class="col-md-7">
                                    <ul class="nav navbar-nav">
                                        <li class="active"><a href="ViewInventory.php">Update Inventory <span class="sr-only">(current)</span></a>
                                        </li>
                                        <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Inventory Items <span class="caret"></span></a>

                                            <ul class="dropdown-menu">
                                                <li><a href="InventoryItems.php">View All Items</a>
                                                </li>
                                                <li role="separator" class="divider"></li>
                                                <li><a href="RemainingInventory.php">Remaining Inventory Items</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">History <span class="caret"></span></a>
                                            <ul class="dropdown-menu">
                                                <li><a href="PurchasedHistory.php">Purchased History</a>
                                                </li>
                                                <li role="separator" class="divider"></li>
                                                <li><a href="UsedItemsHistory.php">Used Items History</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Accounts <span class="caret"></span></a>
                                            <ul class="dropdown-menu">
                                                <li> <a href="AccountPayable.php">Account Payable</a>
                                                </li>
                                                <li role="separator" class="divider"></li>
                                                <li><a href="AccountReceivable.php">Account Receivable/Received</a>
                                                </li>
                                                <li role="separator" class="divider"></li>
                                                <li><a href="BankAmount.php">Bank Amount</a>
                                                </li>
                                                <li role="separator" class="divider"></li>
                                                <li><a href="PayableHistory.php">Payable/Paid History</a>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>


                            </div>
                            <div class="panel-body">

                                <div class="col-md-6">
                                    <div class="col-md-offset-2">
                                        <h2> Used Items </h2>
                                    </div>

                                    <br>
                                    <form class="form-horizontal" method="post" action="InventoryProcessing.php">
                                        <div class="form-group">
                                            <label class="control-label col-md-4" for="ItemNo">Item No: </label>

                                            <input type="text" name="ItemNo_" id="ItemNo_">
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-4" for="ItemName">Item Name: </label>
                                            <input type="text" name="ItemName_" id="ItemName_">
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-4" for="UnitsUsed">Units Used: </label>
                                            <input type="text" name="UnitsUsed_" id="UnitsUsed_">
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-4" for="UnitCost">Per Unit Cost: </label>
                                            <input type="text" name="UnitCost_" id="UnitCost_">
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-4" for="TotalCost">Total Cost: </label>
                                            <input type="text" name="TotalCost_" id="TotalCost_">
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-4" for="TotalCost">Used for: </label>
                                            <textarea name="UsedFor_" class="col-md-4"
                                                      id="UsedFor_">
                                            </textarea>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-offset-4">
                                                <input id="button" type="submit" value="Update" name="Update_">
                                            </div>
                                        </div>
                                    </form>


                                </div>


                                <div class="col-md-6">
                                    <div class="col-md-offset-2">
                                        <h2> Purchased Items </h2>
                                    </div>
                                    <br>

                                    <form class="form-horizontal" method="post" action="InventoryProcessing.php">
                                        <div class="form-group">
                                            <label class="control-label col-md-4" for="ItemNo">Item No: </label>

                                            <input type="text" name="ItemNo" id="ItemNo">
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-4" for="ItemName">Item Name: </label>
                                            <input type="text" name="ItemName" id="ItemName">
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-4" for="UnitsPurchased">Units
                                                Purchased: </label>
                                            <input type="text" name="UnitsPurchased" id="UnitsPurchased">
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-4" for="UnitCost">Per Unit Cost: </label>
                                            <input type="text" name="UnitCost" id="UnitCost">
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-4" for="TotalCost">Total Cost: </label>
                                            <input type="text" name="TotalCost" id="TotalCost">
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-offset-4">
                                                <input  id="button" type="submit" value="Update" name="Update">
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
        <!-- /. PAGE INNER  -->
    </div>
    <!-- /. PAGE WRAPPER  -->
    <footer><p>All right reserved. By: <a href="http://lahore.comsats.edu.pk/">COMSATS LAHORE</a></p>
    </footer>
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
