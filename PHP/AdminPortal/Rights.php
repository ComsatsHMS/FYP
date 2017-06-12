<?php
session_start();
error_reporting(0);
if(!isset($_SESSION['Login'])){
    header('Location:AdminLogin.php');
}
include "../connection.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Admin Portal</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"
          integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css"
          integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"
            integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS"
            crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js">
        <
        script
        src = "//cdnjs.cloudflare.com/ajax/libs/jquery.matchHeight/0.7.0/jquery.matchHeight-min.js" ></script>
    <!-- Bootstrap Styles-->
    <link href="../../CSS/bootstrap.css" rel="stylesheet"/>
    <!-- FontAwesome Styles-->
    <link href="../../CSS/font-awesome.css" rel="stylesheet"/>
    <!-- Morris Chart Styles-->
    <!-- Custom Styles-->
    <link href="../../CSS/custom-styles.css" rel="stylesheet"/>
    <!-- Google Fonts-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'/>
</head>

<body>
<div id="wrapper">
    <nav class="navbar navbar-default top-navbar" role="navigation">
        <div class="navbar-header">
            <a class="navbar-brand" href="Profile.php" id="sidebar-title">Admin Portal</a>
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
            </li>
        </ul>
    </nav>
    <!--/. NAV TOP  -->
    <nav class="navbar-default navbar-side" role="navigation">

        <div class="sidebar-collapse">
            <ul class="nav" id="main-menu">
                <li>
                    <a href="Profile.php"><i class="fa fa-"></i>Profile</a>
                </li>
                <li>
                    <a href="AdminPortal.php"><i class="fa fa-"></i>Home</a>
                </li>
                <li>
                    <a href="List_Employees.php"><i class="fa fa-"></i>Employee's List</a>
                </li>
                <li>
                    <a href="AddEmployeeAccount.php"><i class="fa fa-"></i>Add Employee Account</a>
                </li>
                <li>
                    <a href="Logout.php"><i class="fa fa-"></i>Logout</a>
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
                        <img id="profile_pic" src="../../IMAGES/<?php echo "{$_SESSION['UserPic']}";?>" alt="profilepic"
                             style="width: 120px; height: 120px" ;>
                    </a>
                </div>
                <div class="col-md-6 col-xs-8 col-sm-8">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover">
                            <tr>
                                <td>Name</td>
                                <td><?php echo "{$_SESSION['name'] }"; ?></td>
                            </tr>
                            <tr style="background-color: #f36a5a">
                                <td>Rank</td>
                                <td><?php echo "{$_SESSION['role'] }";?></td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td><?php echo "{$_SESSION['email'] }";?></td>
                            </tr>
                        </table>
                    </div>
                </div>

            </div>
            <ol class="breadcrumb">
                <li><a href="../../index.html">Home</a></li>
                <li><a href="../ManagementPortal/OfficeLogin.php">Login</a></li>
                <li><a href="AdminPortal.php">Admin Portal</a></li>
                <li><a href="List_Emoloyees.php">List of Employees</a></li>
                <li class="active">Rigths Assign</li>
            </ol>
        </div>
        <div id="page-inner">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="board">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <!--            Content Box Contents-->
                                <div class="panel-body">

                                    <form class="form-group form-horizontal" role="form" method="post"
                                          action="update.php">
                                        <input type="hidden" name="h" value="<?php echo $_GET['id3'];?>">
                                        <?php
                                        $get_record = "select * from emp_rights  ";
                                        $run = mysqli_query($connection, $get_record);
                                        $value = $_GET["name"];
                                        $value1 = $_GET["id3"];
                                        echo "<h3>Check Tabs Will only visible to Employee $value </h3>" . "<br>";
                                        $get_record = "select * from emp_rights where userid=$value1";
                                        $run = mysqli_query($connection, $get_record);
                                        while ($each_record = mysqli_fetch_array($run)) {
                                            $app = $each_record['hostel_app'];
                                            $all = $each_record['allotment'];
                                            $list = $each_record['student_list'];
                                            $com = $each_record['view_com'];
                                            $view = $each_record['view_app'];
                                            $sat = $each_record['statics'];
                                            $voting = $each_record['voting'];
                                            $fee = $each_record['fee'];
                                            $inv = $each_record['inventry'];
                                            $par = $each_record['parents'];

                                            if ($app == 1) {
                                                echo "<div><input type=\"checkbox\" name=\"1\"  value='1' checked > <button class=\"btn-justified btn btn-default\" disabled  style=\"background-color: #3E3E3E;color: white\"  >Hostel Application</button></div>";

                                            } else {
                                                echo "   <div><input type=\"checkbox\" name=\"1\" value='0' > <button class=\"btn-justified btn btn-default\" disabled  style=\"background-color: #3E3E3E;color: white\"  >Hostel Application</button></div>";
                                            }
                                            if ($all == 1) {
                                                echo "<div><input type=\"checkbox\" name=\"2\" checked> <button class=\"btn-justified btn btn-default\" disabled style=\"background-color: #3E3E3E;color: white\" >Allotment</button></div>";
                                            } else {
                                                echo "<div><input type=\"checkbox\" name=\"2\" > <button class=\"btn btn-justified btn-default\" disabled  style=\"background-color: #3E3E3E;color: white\" >Allotment</button></div>";
                                            }
                                            if ($list == 1) {
                                                echo " <div><input type=\"checkbox\" name=\"3\" checked> <button class=\"btn btn-default\" disabled style=\"background-color: #3E3E3E;color: white\" >Student List</button></div>";
                                            } else {
                                                echo " <div><input type=\"checkbox\" name=\"3\"> <button class=\"btn btn-default\" disabled style=\"background-color: #3E3E3E;color: white\" >Student List</button></div>";
                                            }
                                            if ($com == 1) {
                                                echo "<div><input type=\"checkbox\" name=\"4\" checked> <button class=\"btn btn-default\" disabled style=\"background-color: #3E3E3E;color: white\" >View Complain</button></div>";
                                            } else {
                                                echo "<div><input type=\"checkbox\" name=\"4\" > <button class=\"btn btn-default\" disabled style=\"background-color: #3E3E3E;color: white\" >View Complain</button></div>";
                                            }
                                            if ($view == 1) {
                                                echo " <div><input type=\"checkbox\" name=\"5\" checked> <button class=\"btn btn-default\" disabled style=\"background-color: #3E3E3E;color: white\" >View Application</button></div>";
                                            } else {
                                                echo " <div><input type=\"checkbox\" name=\"5\" > <button class=\"btn btn-default\" disabled style=\"background-color: #3E3E3E;color: white\" >View Application</button></div>";
                                            }
                                            if ($sat == 1) {
                                                echo "<div><input type=\"checkbox\" name=\"6\" checked> <button class=\"btn btn-default\" disabled style=\"background-color: #3E3E3E;color: white\" >Statics</button></div>";
                                            } else {
                                                echo "<div><input type=\"checkbox\" name=\"6\" > <button class=\"btn btn-default\" disabled style=\"background-color: #3E3E3E;color: white\" >Statics</button></div>";
                                            }
                                            if ($voting == 1) {
                                                echo " <div><input type=\"checkbox\"name=\"7\" checked> <button class=\"btn btn-default\" disabled style=\"background-color: #3E3E3E;color: white\" >Voting</button></div>";

                                            } else {
                                                echo " <div><input type=\"checkbox\"name=\"7\"> <button class=\"btn btn-default\" disabled style=\"background-color: #3E3E3E;color: white\" >Voting</button></div>";
                                            }
                                            if ($fee == 1) {
                                                echo "<div><input type=\"checkbox\" name=\"8\" checked > <button class=\"btn btn-default\" disabled style=\"background-color: #3E3E3E;color: white\" >Fee/Fine</button></div>";
                                            } else {
                                                echo "<div><input type=\"checkbox\" name=\"8\" > <button class=\"btn btn-default\" disabled style=\"background-color: #3E3E3E;color: white\" >Fee/Fine</button></div>";
                                            }
                                            if ($inv == 1) {
                                                echo " <div><input type=\"checkbox\" name=\"9\" checked > <button class=\"btn btn-default\" disabled style=\"background-color: #3E3E3E;color: white\" >View Inventory</button></div>";
                                            } else {
                                                echo "<div><input type=\"checkbox\" name=\"9\"> <button class=\"btn btn-default\" disabled style=\"background-color: #3E3E3E;color: white\" >View Inventory</button></div>";
                                            }
                                            if ($par == 1) {
                                                echo "<div><input type=\"checkbox\" name=\"10\" checked> <button class=\"btn btn-default\" disabled style=\"background-color: #3E3E3E;color: white\" >Parents</button></div>";
                                            } else {
                                                echo "<div><input type=\"checkbox\" name=\"10\"> <button class=\"btn btn-default\" disabled style=\"background-color: #3E3E3E;color: white\" >Parents</button></div>";
                                            }
                                        }

                                        echo '<br>' . '
                            <input type="submit" name="submit" value="Update" id="button">
                            ';?>

                                    </form>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <footer><p>All copy rights reserved By: <a href="http://lahore.comsats.edu.pk/">COMSATS LAHORE</a></p>
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

</body>
</html>