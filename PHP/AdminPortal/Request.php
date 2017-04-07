<?php
error_reporting(0);
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
                <a href="mainApplicationOffice.php" id="sidebar-title">Admin Portal</a></h4>
            <a href="#">
                <img id="ciit_logo" src="../../IMAGES/CIITLogo_Plain.png" alt="COMSATS" />
            </a>
            <ul id="main-nav">
                <!--  Menu -->
                <li><a id="studentList" class="nav-top-item" href="List_Emoloyees.php" class="nav-top-item">Employees List</a></li>
                <li><a id="studentList" class="nav-top-item" href="#" class="nav-top-item">Account Request</a></li>

            </ul>
        </div>


        <!--    Start of the other column of size 10  -->
        <div class="col-md-10 col-xs-6" id="rightside" >
            <!--profile Pic of logged in user-->
            <div class="row">
                <div class="col-md-6 col-xs-6">



                </div>
                <br>
                <ol class="breadcrumb">
                    <li><a href="">Home</a></li>
                    <li><a href="">Login</a></li>
                    <li><a href="">Admin Portal</a></li>
                    <li class="active">Requests</li>

                </ol>
                <div class="col-md-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading" > Account Requests </div>
                        <!--            Content Box Contents-->
                        <div class="panel-body">
                            <div class="form-group ">


                            </div>



                            <!--                Complaints-->
                            <table class="table">
                                <tr>
                                    <th>First Name</th>
                                    <th>last Name</th>
                                    <th>Hostel</th>
                                    <th>Role</th>
                                    <th>Email</th>
                                    <th>Address</th>
                                    <th>Phone</th>
                                    <th>Action</th>
                                </tr>
                                <?php


                                $start; $end;


                                $get_record = "select u.* from users u";
                                $run = mysqli_query($connection, $get_record);
                                while ($each_record = mysqli_fetch_array($run)){
                                    $id=$each_record['userid'];
                                    $first   = $each_record['first_name'];
                                    $last=$each_record['last_name'];
                                    $email=$each_record['email'];
                                    $role=$each_record['role'];
                                    $address=$each_record['address'];
                                    $phone=$each_record['phone_no'];
                                    $hostel=$each_record['Hostel'];
                                    $status=$each_record['status'];


                                    if($status==0){
                                        echo "
            <tr><td> $first </td>
            <td> $last </td>
            <td> $hostel </td>
            <td> $role </td>
            <td> $email </td>
              <td> $address </td>
              <td> $phone </td>
              <td><a href='Admin_processing.php?id1=$id'>
          <span class=\"glyphicon glyphicon-remove\"></span>
        </a> <a href='Admin_processing.php?id2=$id'>
          <span class=\"glyphicon glyphicon-ok\"></span>
        </a></td>

            </tr>
        ";
                                    }




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





</body>
</html>