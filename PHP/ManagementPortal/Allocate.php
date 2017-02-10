<!DOCTYPE html>
<?php
//include("phpFunctions.php");
include ("../connection.php");
$studentsCount = 0;
$applicationNumber = array();
if (isset($_GET['selected'])){
    $temp = $_GET['selected'];
    $tmp = $_GET['sh'];
    $rec = "select * from hostel WHERE roomNumber = '$temp' AND HostelName = '$tmp'";
    $exec = mysqli_query($connection, $rec);
    while ($each_rec = mysqli_fetch_array($exec)) {
        $applicationNumber[] = $each_rec['applicationNumber'];
        $studentsCount = $studentsCount + 1;
    }
}
?>
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

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script><script src="//cdnjs.cloudflare.com/ajax/libs/jquery.matchHeight/0.7.0/jquery.matchHeight-min.js"></script>
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
                <li><a id="applications" class="nav-top-item" href="ViewApplications.php">View Applications</a></li>
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
                <li><a href="mainApplicationOffice.php">Office Main</a></li>
                <li><a href="applicationsDisplay.php">Applications</a></li>
                <li><a href="allotment.php">Selected Students</a></li>
                <li class="active">Allotment</li>
            </ol>
            <div class="panel-group" id="profile_box">
                <div class="row">
                    <div class="col-md-offset-3 col-md-7 col-md-offset-2">
                        <div class="panel panel-primary">
                            <div class="panel-heading" > Allocate Room And Hostel </div>
                            <div class="panel-body">
                                <form role="form" action="phpFunctions.php" method="post" enctype="multipart/form-data">
                                    <div class="form-group ">
                                        <label>Student Application no.</label>
                                        <input type="number" class="form-control" style="width: 80px" id="id" name="id" value="<?php echo $_GET['id'];?>" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label>choose Hostel: </label>
                                        <?php

                                            if(isset($_GET['sh'])){
                                                $temp = $_GET['sh'];
                                                if ($temp == 'M.A Jinnah'){
                                                    echo "
                                                  <select name=\"hostels\" id=\"hostels\">
                                                        <option ><----Choose-----></option>
                                                        <option value=\"M.A Jinnah\" selected>M.A Jinnah</option>
                                                        <option value=\"Liaquat Hall\">Liaquat Hall</option>
                                                        <option value=\"Jupitar Hall\" >Jupitar Hall</option>
                                                        <option value=\"Johar Hall\" >Johar Hall</option>
                                                  </select>
                                                ";
                                                }
                                                elseif ($temp == 'Liaquat Hall'){
                                                    echo "
                                                  <select name=\"hostels\" id=\"hostels\">
                                                        <option ><----Choose-----></option>
                                                        <option value=\"M.A Jinnah\" >M.A Jinnah</option>
                                                        <option value=\"Liaquat Hall\" selected>Liaquat Hall</option>
                                                        <option value=\"Jupitar Hall\" >Jupitar Hall</option>
                                                        <option value=\"Johar Hall\" >Johar Hall</option>
                                                  </select>
                                                ";
                                                }
                                                elseif ($temp == 'Jupitar Hall'){
                                                    echo "
                                                  <select name=\"hostels\" id=\"hostels\">
                                                        <option ><----Choose-----></option>
                                                        <option value=\"M.A Jinnah\" >M.A Jinnah</option>
                                                        <option value=\"Liaquat Hall\">Liaquat Hall</option>
                                                        <option value=\"Jupitar Hall\" selected>Jupitar Hall</option>
                                                        <option value=\"Johar Hall\" >Johar Hall</option>
                                                  </select>
                                                ";
                                                }
                                                elseif ($temp == 'Johar Hall'){
                                                    echo "
                                                  <select name=\"hostels\" id=\"hostels\">
                                                        <option ><----Choose-----></option>
                                                        <option value=\"M.A Jinnah\" >M.A Jinnah</option>
                                                        <option value=\"Liaquat Hall\">Liaquat Hall</option>
                                                        <option value=\"Jupitar Hall\" >Jupitar Hall</option>
                                                        <option value=\"Johar Hall\" selected>Johar Hall</option>
                                                  </select>
                                                ";
                                                }
                                                else{
                                                    echo "
                                                  <select name=\"hostels\" id=\"hostels\">
                                                        <option ><----Choose-----></option>
                                                        <option value=\"M.A Jinnah\" >M.A Jinnah</option>
                                                        <option value=\"Liaquat Hall\">Liaquat Hall</option>
                                                        <option value=\"Jupitar Hall\" >Jupitar Hall</option>
                                                        <option value=\"Johar Hall\" >Johar Hall</option>
                                                  </select>
                                                ";
                                                }

                                            }else{
                                                echo "
                                                  <select name=\"hostels\" id=\"hostels\">
                                                        <option ><----Choose-----></option>
                                                        <option value=\"M.A Jinnah\" >M.A Jinnah</option>
                                                        <option value=\"Liaquat Hall\">Liaquat Hall</option>
                                                        <option value=\"Jupitar Hall\" >Jupitar Hall</option>
                                                        <option value=\"Johar Hall\" >Johar Hall</option>
                                                  </select>
                                                ";
                                            }
                                        ?>
                                    </div>
                                    <div class="form-group ">
                                        <label >Room No.</label>
                                        <input type="number" value="<?php {echo $_GET['selected'];}?>" style="width: 150px" class="form-control" name="num" id="roomNo">
                                    </div>

                                    <script>
                                        $("#roomNo").on("change", function(){
                                            var roomNum = $(this).val();
                                            var sh = $("#hostels").val();
                                            var sid = $("#id").val();
                                            self.location = "Allocate.php?selected="+roomNum+"&id="+sid+"&sh="+sh;
                                        })
                                    </script
                                    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

                                    <div class="form-group ">
                                        <label >Students Allocated to selected Room</label>
                                        <input type="number" class="form-control" style="width: 80px" value="<?php {echo $studentsCount;}?>" readonly>
                                    </div>
                                    <div class="form-group">
                                    <table class="table table-striped" style="max-width: 200pt;border: 0.5pt solid">
                                        <?php
                                            if($studentsCount != 0){
                                                echo "<thead>
                                                        <tr>
                                                            <th>Name</th>
                                                            <th>Father Name</th>
                                                            <th>Student Id</th>
                                                        </tr>
                                                      </thead><tbody>";
                                                $iteration=0;
                                                while ($iteration < $studentsCount){
                                                    $get_record = "select name,fathername,studentid from oldstudentform WHERE applicationNumber = '$applicationNumber[$iteration]'";
                                                    $run = mysqli_query($connection, $get_record);
                                                    while ($each_record = mysqli_fetch_array($run)){
                                                        $studentName = $each_record['name'];
                                                        $studentFName = $each_record['fathername'];
                                                        $studentId = $each_record['studentid'];
                                                        echo "<tr>
                                                                    <td>$studentName</td>
                                                                    <td>$studentFName</td>
                                                                    <td>$studentId</td>
                                                              </tr>
                                                        ";
                                                    }
                                                    $iteration = $iteration+1;
                                                }
                                                echo "</tbody>";
                                            }
                                        ?>

                                    </table>
                                    </div>
                                    <div class="form-group ">

                                        <button type='submit' name="submit" class="btn btn-success">allot</button>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



</body>
</html>