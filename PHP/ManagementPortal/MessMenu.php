<?php
session_start();
if(!isset($_SESSION['UserId'])){
    header('Location:OfficeLogin.php');
}
error_reporting(0);
include("../connection.php");
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
<?php
if(isset($_POST['messmenuL'])){
    $op1 = $_POST['Option1'];
    $op2 = $_POST['Option2'];
    $op3 = $_POST['Option3'];
    $op4 = $_POST['Option4'];
    $op5 = $_POST['Option5'];
    $op6 = $_POST['Option6'];
    $op7 = $_POST['Option7'];
    $query = "SHOW TABLES IN  fyp WHERE Tables_in_fyp = 'messmenu'";
    $result = mysqli_query($connection, $query);
    if(mysqli_num_rows($result) == 1){
        $query = "drop table messmenu";
        $result = mysqli_query($connection, $query);
        if($result){
            $query = "create table messmenu(days VARCHAR (15),`.$op1.` VARCHAR(80), `.$op2.` VARCHAR(80),`.$op3.` VARCHAR(80),`.$op4.` VARCHAR(80),`.$op5.` VARCHAR(80),`.$op6.` VARCHAR(80),`.$op7.` VARCHAR(80))";
            $result = mysqli_query($connection, $query);
        }

    }
    else{
        $query = "create table messmenu(days VARCHAR (15),`.$op1.` VARCHAR(80), `.$op2.` VARCHAR(80),`.$op3.` VARCHAR(80),`.$op4.` VARCHAR(80),`.$op5.` VARCHAR(80),`.$op6.` VARCHAR(80),`.$op7.` VARCHAR(80))";
        $result = mysqli_query($connection, $query);
    }
}
if(isset($_POST['messmenuB'])){
    $op1 = $_POST['Option1'];
    $op2 = $_POST['Option2'];
    $op3 = $_POST['Option3'];
    $op4 = $_POST['Option4'];
    $op5 = $_POST['Option5'];
    $op6 = $_POST['Option6'];
    $op7 = $_POST['Option7'];
    $query = "SHOW TABLES IN  fyp WHERE Tables_in_fyp = 'messmenub'";
    $result = mysqli_query($connection, $query);
    if(mysqli_num_rows($result) == 1){
        $query = "drop table messmenub";
        $result = mysqli_query($connection, $query);
        if($result){
            $query = "create table messmenub(days VARCHAR (15),`.$op1.` VARCHAR(80), `.$op2.` VARCHAR(80),`.$op3.` VARCHAR(80),`.$op4.` VARCHAR(80),`.$op5.` VARCHAR(80),`.$op6.` VARCHAR(80),`.$op7.` VARCHAR(80))";
            $result = mysqli_query($connection, $query);
        }

    }
    else{
        $query = "create table messmenub(days VARCHAR (15),`.$op1.` VARCHAR(80), `.$op2.` VARCHAR(80),`.$op3.` VARCHAR(80),`.$op4.` VARCHAR(80),`.$op5.` VARCHAR(80),`.$op6.` VARCHAR(80),`.$op7.` VARCHAR(80))";
        $result = mysqli_query($connection, $query);
    }
}
if(isset($_POST['messmenuboth'])){
    $op1 = $_POST['Option1'];
    $op2 = $_POST['Option2'];
    $op3 = $_POST['Option3'];
    $op4 = $_POST['Option4'];
    $op5 = $_POST['Option5'];
    $op6 = $_POST['Option6'];
    $op7 = $_POST['Option7'];
    $op8 = $_POST['Option8'];
    $op9 = $_POST['Option9'];
    $op10 = $_POST['Option10'];
    $op11 = $_POST['Option11'];
    $op12 = $_POST['Option12'];
    $op13 = $_POST['Option13'];
    $op14 = $_POST['Option14'];
    if(mysqli_num_rows($result) == 1){
        $query = "drop table messmenu";
        $result = mysqli_query($connection, $query);
        if($result){
            $query = "create table messmenu(days VARCHAR (15),`.$op1.` VARCHAR(80), `.$op2.` VARCHAR(80),`.$op3.` VARCHAR(80),`.$op4.` VARCHAR(80),`.$op5.` VARCHAR(80),`.$op6.` VARCHAR(80),`.$op7.` VARCHAR(80))";
            $result = mysqli_query($connection, $query);
        }

    }
    else{
        $query = "create table messmenu(days VARCHAR (15),`.$op1.` VARCHAR(80), `.$op2.` VARCHAR(80),`.$op3.` VARCHAR(80),`.$op4.` VARCHAR(80),`.$op5.` VARCHAR(80),`.$op6.` VARCHAR(80),`.$op7.` VARCHAR(80))";
        $result = mysqli_query($connection, $query);
    }

    $query = "SHOW TABLES IN  fyp WHERE Tables_in_fyp = 'messmenub'";
    $result = mysqli_query($connection, $query);
    if(mysqli_num_rows($result) == 1){
        $query = "drop table messmenub";
        $result = mysqli_query($connection, $query);
        if($result){
            $query = "create table messmenub(days VARCHAR (15),`.$op8.` VARCHAR(80), `.$op9.` VARCHAR(80),`.$op10.` VARCHAR(80),`.$op11.` VARCHAR(80),`.$op12.` VARCHAR(80),`.$op13.` VARCHAR(80),`.$op14.` VARCHAR(80))";
            $result = mysqli_query($connection, $query);
        }

    }
    else{
        $query = "create table messmenub(days VARCHAR (15),`.$op8.` VARCHAR(80), `.$op9.` VARCHAR(80),`.$op10.` VARCHAR(80),`.$op11.` VARCHAR(80),`.$op12.` VARCHAR(80),`.$op13.` VARCHAR(80),`.$op14.` VARCHAR(80))";
        $result = mysqli_query($connection, $query);
    }
}


?>
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
                    <a href=\"ViewInventory.php\"><i class=\"fa fa-\"></i> View Inventory</a>
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
                    <a class=\"active-menu\" href=\"StartVoting.php\"><i class=\"fa fa-\"></i> Voting </a>
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
                            <tr style="background-color: #f36a5a">
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
                <li class="active">Start Voting</li>
            </ol>
        </div>
        <div id="page-inner">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="board">
                        <div class="panel panel-primary">
                            <?php
                            $lunchvotes = 0;
                            $breakfastvotes = 0;
                            $bothvotes = 0;
                            $query = "select * from voting ";
                            $result = mysqli_query($connection, $query);
                            while ($db_data = mysqli_fetch_array($result)) {
                                $lunchvotes = $db_data['Lunch'];
                                $breakfastvotes = $db_data['Breakfast'];
                                $bothvotes = $db_data['LunchBreakfast'];
                            }
                            if(($lunchvotes > $breakfastvotes) && ($lunchvotes > $bothvotes)){
                                echo "
                                <div class=\"panel-heading\">Possible Options Of Mess Menu For Lunch</div>
                            <div class=\"panel-body\">
                                <form action=\"MessMenu.php\" method=\"post\" enctype=\"multipart/form-data\">

                                    <div class=\"form-group\">
                                        <label>
                                            Option 1:
                                        </label>
                                        <input type=\"text\" name=\"Option1\" id=\"Option1\" style=\"width: 300px\"  required>
                                    </div>
                                    <div class=\"form-group\">
                                        <label>
                                            Option 2:
                                        </label>
                                        <input type=\"text\" name=\"Option2\" id=\"Option2\" style=\"width: 300px\"  required>
                                    </div>
                                    <div class=\"form-group\">
                                        <label>
                                            Option 3:
                                        </label>
                                        <input type=\"text\" name=\"Option3\" id=\"Option3\" style=\"width: 300px\"  required>
                                    </div>
                                    <div class=\"form-group\">
                                        <label>
                                            Option 4:
                                        </label>
                                        <input type=\"text\" name=\"Option4\" id=\"Option4\" style=\"width: 300px\"  required>
                                    </div>
                                    <div class=\"form-group\">
                                        <label>
                                            Option 5:
                                        </label>
                                        <input type=\"text\" name=\"Option5\" id=\"Option5\" style=\"width: 300px\"  required>
                                    </div>
                                    <div class=\"form-group\">
                                        <label>
                                            Option 6:
                                        </label>
                                        <input type=\"text\" name=\"Option6\" id=\"Option6\" style=\"width: 300px\"  required>
                                    </div>
                                    <div class=\"form-group\">
                                        <label>
                                            Option 7:
                                        </label>
                                        <input type=\"text\" name=\"Option7\" id=\"Option7\" style=\"width: 300px\"  required>
                                    </div>

                                    <input class=\"btn btn-primary\" id=\"button\" type=\"submit\" value=\"save\" name=\"messmenuL\">
                                </form>
                            </div>
                                ";
                            }
                            elseif(($breakfastvotes > $lunchvotes) && ($breakfastvotes > $bothvotes)){
                                echo "
                                    <div class=\"panel-heading\">Possible Options Of Mess Menu For BreakFast</div>
                            <div class=\"panel-body\">
                                <form action=\"MessMenu.php\" method=\"post\" enctype=\"multipart/form-data\">

                                    <div class=\"form-group\">
                                        <label>
                                            Option 1:
                                        </label>
                                        <input type=\"text\" name=\"Option1\" id=\"Option1\" style=\"width: 300px\"  required>
                                    </div>
                                    <div class=\"form-group\">
                                        <label>
                                            Option 2:
                                        </label>
                                        <input type=\"text\" name=\"Option2\" id=\"Option2\" style=\"width: 300px\"  required>
                                    </div>
                                    <div class=\"form-group\">
                                        <label>
                                            Option 3:
                                        </label>
                                        <input type=\"text\" name=\"Option3\" id=\"Option3\" style=\"width: 300px\"  required>
                                    </div>
                                    <div class=\"form-group\">
                                        <label>
                                            Option 4:
                                        </label>
                                        <input type=\"text\" name=\"Option4\" id=\"Option4\" style=\"width: 300px\"  required>
                                    </div>
                                    <div class=\"form-group\">
                                        <label>
                                            Option 5:
                                        </label>
                                        <input type=\"text\" name=\"Option5\" id=\"Option5\" style=\"width: 300px\"  required>
                                    </div>
                                    <div class=\"form-group\">
                                        <label>
                                            Option 6:
                                        </label>
                                        <input type=\"text\" name=\"Option6\" id=\"Option6\" style=\"width: 300px\"  required>
                                    </div>
                                    <div class=\"form-group\">
                                        <label>
                                            Option 7:
                                        </label>
                                        <input type=\"text\" name=\"Option7\" id=\"Option7\" style=\"width: 300px\"  required>
                                    </div>

                                    <input class=\"btn btn-primary\" id=\"button\" type=\"submit\" value=\"save\" name=\"messmenuB\">
                                </form>
                            </div>
                                ";
                            }
                            elseif(($bothvotes >$lunchvotes) && ($bothvotes > $breakfastvotes) || ($lunchvotes == $breakfastvotes) ){
                                echo "
                                <div class=\"panel-heading\">Possible Options Of Mess Menu For Lunch and BreakFast</div>
                            <div class=\"panel-body\">
                                <form action=\"MessMenu.php\" method=\"post\" enctype=\"multipart/form-data\">

                                    <div class=\"row\">
                                        <div class=\"col-md-6\">
                                            <h5>Possible Options Of Mess Menu For Lunch</h5>
                                            <div class=\"form-group\">
                                                <label>
                                                    Option 1:
                                                </label>
                                                <input type=\"text\" name=\"Option1\" id=\"Option1\" style=\"width: 300px\"  required>
                                            </div>
                                            <div class=\"form-group\">
                                                <label>
                                                    Option 2:
                                                </label>
                                                <input type=\"text\" name=\"Option2\" id=\"Option2\" style=\"width: 300px\"  required>
                                            </div>
                                            <div class=\"form-group\">
                                                <label>
                                                    Option 3:
                                                </label>
                                                <input type=\"text\" name=\"Option3\" id=\"Option3\" style=\"width: 300px\"  required>
                                            </div>
                                            <div class=\"form-group\">
                                                <label>
                                                    Option 4:
                                                </label>
                                                <input type=\"text\" name=\"Option4\" id=\"Option4\" style=\"width: 300px\"  required>
                                            </div>
                                            <div class=\"form-group\">
                                                <label>
                                                    Option 5:
                                                </label>
                                                <input type=\"text\" name=\"Option5\" id=\"Option5\" style=\"width: 300px\"  required>
                                            </div>
                                            <div class=\"form-group\">
                                                <label>
                                                    Option 6:
                                                </label>
                                                <input type=\"text\" name=\"Option6\" id=\"Option6\" style=\"width: 300px\"  required>
                                            </div>
                                            <div class=\"form-group\">
                                                <label>
                                                    Option 7:
                                                </label>
                                                <input type=\"text\" name=\"Option7\" id=\"Option7\" style=\"width: 300px\"  required>
                                            </div>

                                        </div>
                                        <div class=\"col-md-6\">
                                            <h5>Possible Options Of Mess Menu For BreakFast</h5>
                                            <div class=\"form-group\">
                                                <label>
                                                    Option 1:
                                                </label>
                                                <input type=\"text\" name=\"Option8\" id=\"Option8\" style=\"width: 300px\"  required>
                                            </div>
                                            <div class=\"form-group\">
                                                <label>
                                                    Option 2:
                                                </label>
                                                <input type=\"text\" name=\"Option9\" id=\"Option9\" style=\"width: 300px\"  required>
                                            </div>
                                            <div class=\"form-group\">
                                                <label>
                                                    Option 3:
                                                </label>
                                                <input type=\"text\" name=\"Option10\" id=\"Option10\" style=\"width: 300px\"  required>
                                            </div>
                                            <div class=\"form-group\">
                                                <label>
                                                    Option 4:
                                                </label>
                                                <input type=\"text\" name=\"Option11\" id=\"Option11\" style=\"width: 300px\"  required>
                                            </div>
                                            <div class=\"form-group\">
                                                <label>
                                                    Option 5:
                                                </label>
                                                <input type=\"text\" name=\"Option12\" id=\"Option12\" style=\"width: 300px\"  required>
                                            </div>
                                            <div class=\"form-group\">
                                                <label>
                                                    Option 6:
                                                </label>
                                                <input type=\"text\" name=\"Option13\" id=\"Option13\" style=\"width: 300px\"  required>
                                            </div>
                                            <div class=\"form-group\">
                                                <label>
                                                    Option 7:
                                                </label>
                                                <input type=\"text\" name=\"Option14\" id=\"Option14\" style=\"width: 300px\"  required>
                                            </div>

                                            <input class=\"btn btn-primary\" id=\"button\" type=\"submit\" value=\"save\" name=\"messmenuboth\">

                                        </div>
                                    </div>
                                </form>
                            </div>
                                ";
                            }



                            ?>



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