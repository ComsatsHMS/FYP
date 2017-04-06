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

                        <form class="form-group form-horizontal" role="form" method="post" action="update.php">
                            <input type="hidden" name="h" value="<?php echo $_GET['id3'];?>">
<?php
                        $get_record = "select * from emp_rights  ";
                        $run = mysqli_query($connection, $get_record);
                        $value= $_GET["name"];
                        $value1= $_GET["id3"];
                        echo "<h3>Check Tab Will only visible to Employee $value </h3>";
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
                                echo "<div><input type=\"checkbox\" name=\"1\"  value='1' checked > <button class=\"btn btn-primary\"  >Hostel Application</button></div>";

                            } else {
                                echo "   <div><input type=\"checkbox\" name=\"1\"value='0' > <button class=\"btn btn-primary\"  >Hostel Application</button></div>";
                            }
                            if ($all == 1) {
                                echo "<div><input type=\"checkbox\" name=\"2\" checked> <button class=\"btn btn-primary\" >Allotment</button></div>";
                            } else {
                                echo "<div><input type=\"checkbox\" name=\"2\" > <button class=\"btn btn-primary\" >Allotment</button></div>";
                            }
                            if ($list == 1) {
                                echo " <div><input type=\"checkbox\" name=\"3\" checked> <button class=\"btn btn-primary\" >Student List</button></div>";
                            } else {
                                echo " <div><input type=\"checkbox\" name=\"3\"> <button class=\"btn btn-primary\" >Student List</button></div>";
                            }
                            if ($com == 1) {
                                echo "<div><input type=\"checkbox\" name=\"4\" checked> <button class=\"btn btn-primary\" >View Complain</button></div>";
                            }
                            else{
                                echo "<div><input type=\"checkbox\" name=\"4\" > <button class=\"btn btn-primary\" >View Complain</button></div>";
                            }
                            if ($view == 1) {
                                echo " <div><input type=\"checkbox\" name=\"5\" checked> <button class=\"btn btn-primary\" >View Application</button></div>";
                            } else {
                                echo " <div><input type=\"checkbox\" name=\"5\" > <button class=\"btn btn-primary\" >View Application</button></div>";
                            }
                            if ($sat == 1) {
                                echo "<div><input type=\"checkbox\" name=\"6\" checked> <button class=\"btn btn-primary\" >Statics</button></div>";
                            } else {
                                echo "<div><input type=\"checkbox\" name=\"6\" > <button class=\"btn btn-primary\" >Statics</button></div>";
                            }
                            if ($voting == 1) {
                                echo " <div><input type=\"checkbox\"name=\"7\" checked> <button class=\"btn btn-primary\" >Voting</button></div>";

                            } else {
                                echo " <div><input type=\"checkbox\"name=\"7\"> <button class=\"btn btn-primary\" >Voting</button></div>";
                            }
                            if ($fee == 1) {
                                echo "<div><input type=\"checkbox\" name=\"8\" checked > <button class=\"btn btn-primary\" >Fee/Fine</button></div>";
                            } else {
                                echo "<div><input type=\"checkbox\" name=\"8\" > <button class=\"btn btn-primary\" >Fee/Fine</button></div>";
                            }
                            if ($inv == 1) {
                                echo " <div><input type=\"checkbox\" name=\"9\" checked > <button class=\"btn btn-primary\" >View Inventory</button></div>";
                            } else {
                                echo "<div><input type=\"checkbox\" name=\"9\"> <button class=\"btn btn-primary\" >View Inventory</button></div>";
                            }
                            if ($par == 1) {
                                echo "<div><input type=\"checkbox\" name=\"10\" checked> <button class=\"btn btn-primary\" >Parents</button></div>";
                            }
                            else{
                                echo "<div><input type=\"checkbox\" name=\"10\"> <button class=\"btn btn-primary\" >Parents</button></div>";
                            }
                        }

echo '



                            <input type="submit" name="submit" value="Update" class="submi">

                            ';?>

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