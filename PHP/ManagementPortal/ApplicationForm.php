<?php
session_start();
error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Hostel Application Form</title>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Title</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../../CSS/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Cookie">
    <link rel="stylesheet" href="../../fonts/font-awesome.min.css">
    <link rel="stylesheet" href="../../CSS/Pretty-Footer.css">
    <link rel="stylesheet" href="../../CSS/Pretty-Registration-Form.css">
    <link rel="stylesheet" href="../../CSS/Google-Style-Login.css">
    <link href="../../CSS/style.css" rel="stylesheet" />
    <script type="text/javascript" src="../../JS/FormValidation.js"> </script>
</head>
<body>
<nav class="navbar navbar-default " style="height: 100px;padding-left: 85px;padding-right: 85px;background: #e95420;margin-bottom: 0px;">
    <div class="container-fluid">
        <div class="navbar-header"><a class="navbar-brand navbar-link" href="../../index.html"><img src="../../IMAGES/comsatslogo.png" height="80" width="400" alt="Comsats logo"></a></h6>
            <button class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
        </div>
        <div class="collapse navbar-collapse" id="navbar-collapse" style="float: right;padding-top: 15px">
            <ul class="nav navbar-nav">
                <li role="presentation" style="font-size: 25px;font-family: 'Times New Roman'"><a href="../../index.html">Home </a></li>
                <li role="presentation" style="font-size: 25px;font-family: 'Times New Roman'"><a href="#">Hostel Form </a></li>
                <li class="dropdown" style="font-size: 25px;font-family: 'Times New Roman'">
                    <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false" href="#"> Downloads</a>
                </li>
                <li class="dropdown" style="font-size: 25px;font-family: 'Times New Roman'">
                    <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false" href="#"> Login<span class="caret"></span></a>
                    <ul class="dropdown-menu dropdown-menu-right" role="menu" style="border: 1px solid">
                        <li role="presentation" style="font-size: 16px"><a href="../StudentPortal/Login.php">Student Portal </a></li>
                        <li role="presentation" style="font-size: 16px"><a href="OfficeLogin.php">Management Portal </a></li>
                        <li role="presentation" style="font-size: 16px"><a href="../ParentPortal/ParentLogin.php">Parent Portal </a></li>
                        <li role="presentation" style="font-size: 16px"><a href="../AdminPortal/AdminLogin.php">Admin
                                Portal </a></li>
                    </ul>
                </li>
            </ul>

        </div>
    </div>
</nav>

<!--<div class="container" >-->
    <div class="panel panel-primary" style="background-color: #F7F7F7;">
        <div class="panel-heading" style="background-image: linear-gradient(to bottom,#292c2f 0,#292c2f 100%) "><h2 class="panelheading" style="text-align: center">Boys Hostel Admission Form</h2></div>
        <div class="panel-body" >
            <div class="row">
                <?php
                if ($_SESSION['send'] == 'success') {
                    echo "<div class=\"alert alert-success alert-dismissable\"><a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>
                                                 <strong>Success!</strong>  Application Successfully Submitted!!
                                                </div>";
                }
                else if ($_SESSION['send'] == 'error') {
                    echo "<div class=\"alert alert-danger alert-dismissable\"><a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>
                                                 <strong>Error!</strong> Something went wrong!!
                                                </div>";
                }
                unset($_SESSION['send']);
                ?>
                <form action="ApplicationProcessing.php" role="form" method="post" enctype="multipart/form-data" name="application" id="application" onsubmit="return Validate()  && Validate1() && Validate2() && Validate3() && Validate4() && Validate5() && Validate6() && Validate7() &&Validate8() &&Validate9() &&Validate10() &&Validate11() &&Validate12() &&Validate13() &&Validate14() &&Validate15() &&Validate16()">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="col-md-offset-8">
                                    <h5><label>Name</label></h5>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="input-group">

                                <input class="form-control inline" type="text" name="name"  id="name" placeholder="20 Alphabets are Allowed" onchange=" return  Validate()">
                                <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                            </div>

                        </div>
                        <div class="col-md-4">
                            <span class="addon"><span id="name_error"  style="color: red "></span></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="col-md-offset-8">
                                <h5><label>Father Name</label></h5>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="input-group">

                                <input class="form-control" type="text" name="fname"  id="fname" placeholder="20 Alphabets are Allowed" onchange=" return  Validate1()">
                                <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                            </div>

                        </div>
                        <div class="col-md-4">
                            <p id="fname_error"  style="color: red "></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="col-md-offset-8">
                                <h5><label>Student CNIC</label></h5>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="input-group">
                                <input  class="form-control" name="cnic" type="text" placeholder="Enter without Dashes" id="cnic" onchange="return Validate16()">
                                <span class="input-group-addon"><span class="glyphicon glyphicon-align-justify"></span></span>
                            </div>

                        </div>
                        <div class="col-md-4">
                            <p id="cnic_error"  style="color: red "></p>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="col-md-offset-8">
                                <h5><label>Father CNIC</label></h5>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="input-group">

                                <input  class="form-control" name="fcnic" type="text" placeholder="Enter without Dashes" id="cn" onchange="return Validate15()">
                                <span class="input-group-addon"><span class="glyphicon glyphicon-align-justify"></span></span>
                            </div>

                        </div>
                        <div class="col-md-4">
                            <p id="cn_error"  style="color: red "></p>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="col-md-offset-8">
                                <h5><label>Email</label></h5>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="input-group">
                                <input class="form-control" type="text" name="email"  id="mail" onchange="return Validate3()">
                                <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></span>

                            </div>

                        </div>
                        <div class="col-md-4">
                            <p id="mail_error"  style="color: red "></p>
                        </div>

                    </div>


                    <div class="row">
                        <div class="col-md-4">
                            <div class="col-md-offset-8">
                                <h5><label>Mobile No.</label></h5>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="input-group">
                                <input class="form-control" type="text" name="mobileNumber" id="phone"  onchange="return Validate5()">
                                <span class="input-group-addon"><span class="glyphicon glyphicon-earphone"></span></span>

                            </div>

                        </div>
                        <div class="col-md-4">
                            <p id="m_error"  style="color: red "></p>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="col-md-offset-8">
                                <h5><label>Student ID</label></h5>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-inline">
                                <div class="form-group">

                                    <select name="degree" class="degree form-control">
                                        <option>DDP</option>
                                        <option>SDP</option>
                                    </select>
                                </div>
                                <span class="textcolor">-</span>
                                <div class="form-group">
                                    <select name="year" id="year" class="form-control">
                                        <?php
                                        $year = date("Y");
                                        $year = ($year - 6)%2000;;
                                        $i=0;
                                        while($i <=6 ){
                                            echo '<option value="FA'.$year.'">FA'.$year.'</option>';
                                            echo '<option value="SP'.$year.'">SP'.$year.'</option>';
                                            $year++;$i++;
                                        }
                                        ?>
                                    </select>
                                </div>
                                <span class="textcolor">-</span>
                                <div class="form-group">
                                    <select id="program" class="form-control" name="program" style="width: 80px">
                                        <option value="BAR">BAR</option>
                                        <option value="BBA">BBA</option>
                                        <option value="BBS">BBS</option>
                                        <option value="BCE">BCE</option>
                                        <option value="BCS">BCS</option>
                                        <option value="BDE">BDE</option>
                                        <option value="BEC">BEC</option>
                                        <option value="BECO">BECO</option>
                                        <option value="BEE">BEE</option>
                                        <option value="BFA">BFA</option>
                                        <option value="BIT">BIT</option>
                                        <option value="BPH">BPH</option>
                                        <option value="BPSY">BPSY</option>
                                        <option value="BS(ECE)">BS(ECE)</option>
                                        <option value="BS(EEE)">BS(EEE)</option>
                                        <option value="BSAF">BSAF</option>
                                        <option value="BSE">BSE</option>
                                        <option value="BSM">BSM</option>
                                        <option value="BTE">BTE</option>
                                        <option value="MBA">MBA</option>
                                        <option value="MBA1">MBA1</option>
                                        <option value="MBE">MBE</option>
                                        <option value="MBM">MBM</option>
                                        <option value="MBO">MBO</option>
                                        <option value="MBT">MBT</option>
                                        <option value="MBX">MBX</option>
                                        <option value="MCS">MCS</option>
                                        <option value="MSCHEM">MSCHEM</option>
                                        <option value="MSCS">MSCS</option>
                                        <option value="MSECO">MSECO</option>
                                        <option value="MSEE">MSEE</option>
                                        <option value="MSENG">MSENG</option>
                                        <option value="MSMATH">MSMATH</option>
                                        <option value="MSMS">MSMS</option>
                                        <option value="MSPHY">MSPHY</option>
                                        <option value="MSPM">MSPM</option>
                                        <option value="MSSM">MSSM</option>
                                        <option value="MSSTAT">MSSTAT</option>
                                        <option value="MSTE">MSTE</option>
                                        <option value="PChem">PChem</option>
                                        <option value="PCS">PCS</option>
                                        <option value="PEE">PEE</option>
                                        <option value="PMATH">PMATH</option>
                                        <option value="PMS">PMS</option>
                                        <option value="PPHY">PPHY</option>
                                        <option value="PSTAT">PSTAT</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" type="text" name="studentid" id="id" style="width: 170px" onchange="Validate2()">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <p id="id_error"  style="color: red "></p>

                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="col-md-offset-8">
                                <h5><label>Postal Address</label></h5>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="input-group">

                                <input class="form-control" type="text" name="address" id="add"  onchange="Validate14()">
                                <span class="input-group-addon"><span class="glyphicon glyphicon-road"></span></span>

                            </div>

                        </div>
                        <div class="col-md-4">
                            <p id="add_e"  style="color: red "></p>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="col-md-offset-8">
                                <h5><label>Domicile</label></h5>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="input-group">

                                <input class="form-control" type="text" name="domicile" id="dom"  onchange="return Validate6()">
                                <span class="input-group-addon"><span class="glyphicon glyphicon-globe"></span></span>
                            </div>

                        </div>
                        <div class="col-md-2">
                            <p id="dom_e"  style="color: red "></p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="col-md-offset-8">
                                <h5><label>Blood Group</label></h5>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="input-group">

                                <input class="form-control" type="text" id="blood" name="bloodGroup"  onchange="return Validate8()">
                                <span class="input-group-addon"><span class="glyphicon glyphicon-tint"></span></span>
                            </div>

                        </div>
                        <div class="col-md-2">
                            <p id="blood_e" style="color: red " ></p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="col-md-offset-8">
                                <h5><label>Religion</label></h5>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="input-group">

                                <input class="form-control" type="text" id="regi" name="religion"  onchange="return Validate7()">
                                <span class="input-group-addon"><span class="glyphicon glyphicon-align-justify"></span></span>
                            </div>

                        </div>
                        <div class="col-md-2">
                            <p id="regi_e" style="color: red " ></p>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-4">
                            <div class="col-md-offset-8">
                                <h5><label>Parent Occupation</label></h5>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="input-group">

                                <input class="form-control" type="text" name="occupation"  id="occ" onchange="return Validate9();" >
                                <span class="input-group-addon"><span class="glyphicon glyphicon-align-justify"></span></span>
                            </div>

                        </div>
                        <div class="col-md-2">
                            <p id="occ_e" style="color: red " ></p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="col-md-offset-8">
                                <h5><label>Monthly income(Rs.)</label></h5>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="input-group">

                                <input class="form-control" type="text" name="income" id="inc"  onchange="return Validate10();">
                                <span class="input-group-addon"><span class="glyphicon glyphicon-align-justify"></span></span>
                            </div>

                        </div>
                        <div class="col-md-2">
                            <p id="inc_e" style="color: red " ></p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="col-md-offset-8">
                                <h5><label>Name of person to be contacted in case of Emergency</label></h5>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="input-group">

                                <input class="form-control" type="text" name="emergency" id="emg"  onchange="return Validate11();">
                                <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                            </div>

                        </div>
                        <div class="col-md-2">
                            <p id="emg_e" style="color: red " ></p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="col-md-offset-8">
                                <h4><label>Relation</label></h4>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="input-group">
                                <input class="form-control" type="text" name="relation"id="rel" onchange="return Validate12();">
                                <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <p id="rel_e" style="color: red " ></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="col-md-offset-8">
                                <h4><label>Mobile#</label></h4>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="input-group">
                                <input class="form-control" type="text" name="cell" id="cell"  onchange="return Validate13();">
                                <span class="input-group-addon"><span class="glyphicon glyphicon-phone"></span></span>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <p id="cell_error" style="color: red " ></p>
                        </div>
                    </div>

                    <br>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="col-md-offset-8">
                                <h4><label>Preferred Hostel: </label></h4>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <br>
                            <br>
                            <label><input type="radio" name="hostel" value="M.A JINNAH"> M.A JINNAH</label>

                        </div>


                        <div class="col-md-2">
                            <br>
                            <br>
                            <label><input type="radio" name="hostel" value="Liquat Hall"> Liquat Hall</label>
                        </div>
                        <div class="col-md-2">
                            <br>
                            <br>
                            <label><input type="radio" name="hostel" value="Johar Hall"> Johar Hall</label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="col-md-offset-8">
                                <h4><label> Old Resident</label></h4>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <br>
                            <br>
                            <label><input type="radio" name="old" value="1"> yes</label>


                        </div>
                        <div class="col-md-2">
                            <br>
                            <br>

                            <label><input type="radio" name="old" value="0"> No</label>

                        </div>



                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="col-md-offset-8">
                                <h4><label>New Student </label></h4>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <br>
                            <br>
                            <label><input type="radio" name="new_student" value="1"> yes </label>


                        </div>
                        <div class="col-md-2">
                            <br>
                            <br>
                            <label><input type="radio" name="new_student" value="0"> No</label>

                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="col-md-offset-8">
                                <h4><label>Required Documents </label></h4>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <br>
                            <br>
                            <div class="form-group">
                                <label>Picture</label>
                                <input  type="file" name="image" required>
                            </div>


                        </div>
                        <div class="col-md-2">
                            <br>
                            <br>
                            <div class="form-group">
                                <label>Semester fee slip</label>
                                <input  type="file" name="image1" required>
                            </div>

                        </div>

                        <div class="col-md-2">
                            <br>
                            <br>
                            <div class="form-group">
                                <label>CNIC</label>
                                <input  type="file" name="imageCNIC" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">

                        </div>
                        <div class="col-md-2 col-md-offset-1">
                            <br>
                            <div class="form-group">
                                <label>Domicile Certificate</label>
                                <input  type="file" name="imageDomicile" required>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <br>
                            <div class="form-group">
                                <label>Father/Guardian's CNIC </label>
                                <input  type="file" name="imageFG" required>
                            </div>
                        </div>
                    </div>

                    <br>
                    <div class="row">
                        <div class="col-md-offset-2 col-md-8 col-md-offset-2">
                            <div class="col-md-offset-0" style="padding-left: 10px">
                                <label><input type="checkbox" required>I certify that the aforementioned information given by me is correct. I understand that if any part of this information is found false/incorrect,my allotment will stand cancelled. I also undertake to strictly observe all rules & regulations of the hostel. I shall also comply with the direction and orders issued by the hostel authorities from time to time during the period of my stay in the hostel. I undertake further to pay all dues in time.</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-offset-9 col-md-1" >
                            <input type="submit" class="btn btn-success" value="submit" name="submit1" id="button">
                            </div>
                        <div class="col-md-1" >
                            <input class="btn btn-success" type="reset" value="Reset" name="reset" id="button">
                            </div>
                    </div>
            </form>
        </div>
    </div>
        </div>
<footer style="margin-top: 0px;">
    <div class="row">
        <div class="col-md-4 col-sm-6 footer-navigation">
            <h3><a href="#"><img src="../../IMAGES/comsatslogo.png" height="80" width="400" alt="Comsats logo"></a></h3>
            <p class="links"><a href="#">Home</a><strong> · </strong><a href="#">Hostel Form</a><strong> · </strong><a href="#">Student Login</a><strong> · </strong><a href="#">Management Login</a><strong> · </strong><a href="#">Parent Login</a><strong></p>
            <p class="company-name">&copy; COMSATS lahore. All right reserved. </p>
        </div>
        <div class="col-md-4 col-sm-6 footer-contacts">
            <div><span class="fa fa-map-marker footer-contacts-icon"> </span>
                <p><span class="new-line-span">1.5 KM Defence Road,Off Raiwind Road</span> Lahore, Pakistan</p>
            </div>
            <div><i class="fa fa-phone footer-contacts-icon"></i>
                <p class="footer-center-info email text-left"> +92 (42) 111-001-007</p>
            </div>
            <div><i class="fa fa-envelope footer-contacts-icon"></i>
                <p> <a href="#" target="_blank">info@ciitlahore.edu.pk</a></p>
            </div>
        </div>
        <div class="clearfix visible-sm-block"></div>
        <div class="col-md-4 footer-about">
            <h4>Social Links</h4>
            <div class="social-links social-icons"><a href="#"><i class="fa fa-facebook"></i></a><a href="#"><i class="fa fa-twitter"></i></a><a href="#"><i class="fa fa-linkedin"></i></a><a href="#"><i class="fa fa-github"></i></a></div>
        </div>
    </div>
</footer>
<script src="../../JS/jquery.min.js"></script>
<script src="../../JS/bootstrap.min.js"></script>
</body>
</html>