<?php
error_reporting(0);
session_start();
if(!isset($_SESSION['Login'])){
    header('Location:AdminLogin.php');
}
include "../connection.php";
?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Admin Portal</title>
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
        <!-- Custom Styles-->
        <link href="../../CSS/custom-styles.css" rel="stylesheet" />
        <!-- Google Fonts-->
        <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
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
                        <a href="Profile.php"><i class="fa fa-"></i>Profile</a>
                    </li>
                    <li>
                        <a href="AdminPortal.php"><i class="fa fa-"></i>Home</a>
                    </li>
                    <li>
                        <a href="List_Employees.php"><i class="fa fa-"></i> Employee's List</a>
                    </li>
                    <li>
                        <a class="active-menu" href="AddEmployeeAccount.php"><i class="fa fa-"></i> Add Employee Account</a>
                    </li>
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
                            <img id="profile_pic" src="../../IMAGES/<?php echo $_SESSION['UserPic'];?>" alt="profilepic"
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
                    <li><a href="AdminLogin.php">Login</a></li>
                    <li class="active"> Profile</li>
                </ol>
            </div>
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="board">
                            <div class="panel panel-primary">

                                <div class="panel-heading">Employee's Signup Data</div>
                                <div class="panel-body">
                                    <?php
                                    if ($_SESSION['SignUp'] == 'OK') {
                                        echo "<div class=\"alert alert-success alert-dismissable\"><a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>
                                                 <strong>Success!</strong> User Profile Created, Login details sent to Employee!!
                                                </div>";
                                    } elseif ($_SESSION['SignUp'] == 'Error') {
                                        echo "<div class=\"alert alert-danger alert-dismissable\"><a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>
                                                 <strong>Error!</strong> Something went wrong!!
                                                </div>";
                                    }
                                    unset($_SESSION['SignUp']);
                                    ?>
                                    <form class="form-horizontal" action="AddEmployeeProcessing.php" method="post"
                                          enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label class="control-label textcolor col-sm-2" for="email">First
                                                Name:</label>
                                            <div class="col-md-6">
                                                <input type="text" class="form-control" placeholder="First Name"
                                                       name="FName" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label textcolor col-sm-2" for="pwd">Last Name:</label>
                                            <div class="col-md-6">
                                                <input type="text" class="form-control" placeholder="Last Name"
                                                       name="LName" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label textcolor col-sm-2" for="email">Email:</label>
                                            <div class="col-md-6">
                                                <input type="email" class="form-control" placeholder="Employee email"
                                                       name="Email" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label textcolor col-sm-2" for="pwd">Employment
                                                Rank:</label>
                                            <div class="col-md-6">
                                                <input type="text" class="form-control" placeholder="Employee Position"
                                                       name="Rank" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label textcolor col-sm-2" for="hostel">Hostel:</label>
                                            <div class="col-md-6">
                                                <input type="text" class="form-control" placeholder="Hostel Incharge of"
                                                       name="hostel" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label textcolor col-sm-2"
                                                   for="address">Address:</label>
                                            <div class="col-md-6">
                                                <input type="text" class="form-control" placeholder="Employee Address"
                                                       name="Address" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label textcolor col-sm-2" for="pwd">Picture:</label>
                                            <div class="col-md-6">
                                                <input type="file" class="form-control" id="ProfilePic"
                                                       name="ProfilePic" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label textcolor col-sm-2" for="email">Phone
                                                No:</label>
                                            <div class="col-md-6">
                                                <input type="NUMBER" class="form-control"
                                                       placeholder="Employee Phone No" name="PhoneNo" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-offset-6 col-md-6">
                                                <input type="submit" value="Add Employee" name="SignUp" id="button">
                                            </div>
                                        </div>
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