<?php
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


<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.2.23/angular.min.js"></script>





<script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
<script>
    angular.module('app', []).controller('appc', ['$scope',
        function($scope) {
            $scope.selected = 'Choose one';
        }
    ]);
</script>

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



<body ng-app="app" ng-controller="appc">
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
                <li><a id="studentList" class="nav-top-item" href="Request.php" class="nav-top-item">Account Request</a></li>

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
                    <li ><a href="">List of Employees</a></li>
                    <li ><a href=""class="active">Rigths Assign</a></li>

                </ol>
                <div class="col-md-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading" > Rights Assign to Employees </div>
                        <!--            Content Box Contents-->
                        <div class="panel-body">
                            <h3>Check Tab Will only visible to Employee</h3>
                        <form class="form-group form-horizontal" role="form" method="post" action="">

                            <div><input type="checkbox" name="1"> <button class="btn btn-primary" >Hostel Application</button></div>
                            <div><input type="checkbox" name="2"> <button class="btn btn-primary" >Allotment</button></div>
                            <div><input type="checkbox" name="2"> <button class="btn btn-primary" >Student List</button></div>
                            <div> <input type="checkbox" name3> <button class="btn btn-primary" >View Complain</button></div>
                            <div> <input type="checkbox" name="4"> <button class="btn btn-primary" >View Application</button></div>
                            <div>  <input type="checkbox" name="5"> <button class="btn btn-primary" >Statics</button></div>
                            <div>  <input type="checkbox"name="6" > <button class="btn btn-primary" >Voting</button></div>
                            <div>    <input type="checkbox" name="7" > <button class="btn btn-primary" >Fee/Fine</button></div>
                            <div>    <input type="checkbox" name="8" > <button class="btn btn-primary" >View Inventory</button></div>
                            <br>
                            <br>
                            <input type="submit" name="submit" value="Save" class="submit">

                        </form>

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