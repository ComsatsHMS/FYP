<?php
session_start();
?>
<html lang="en">
<head>
    <title>Student Login</title>
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../../CSS/style.css">
</head>
<body>

<div class="container-fluid">
    <div class="row background">
        <div class="comsats col-md-12 col-xs-12">
            <img src="../../IMAGES/CIITLogo_Plain.png">
            <strong class="textcolor"><h1>Welcome to Comsats Hostel Login</h1></strong>
        </div>
    </div>
</div>

<div class="row">
    <ul class="nav nav-tabs navbar-inverse">
        <li class="col-md-4 active"><a data-toggle="tab" href="#OldLogin"><strong>Old Student Login</strong></a></li>
        <li class="col-md-4"><a data-toggle="tab" href="#NewStudentLogin"><strong>New Student Login</strong></a></li>
        <li class="col-md-4"><a data-toggle="tab" href="#NewStudentSignup"><strong>New Student Signup</strong></a></li>
    </ul>
</div>

<div class="tab-content">
    <div id="OldLogin" class="tab-pane fade in active">
        <div class="row background1" id="background">
            <br>
            <br>
            <br>
            <form action="LoginProcessing.php" method="post" enctype="multipart/form-data">
                <div class="align col-md-12 col-xs-12">
                    <div class="form-inline" role="form">
                        <div class="form-group">
                            <label class="control-label textcolor">Email</label>
                        </div>
                        <div class="form-group">
                            <select name="degree" class="degree form-control">
                                <option>DDP</option>
                                <option>SDP</option>
                            </select>
                        </div>
                        <span class="textcolor">-</span>
                        <div class="form-group">
                            <select name="fall" id="year" class="form-control">
                                <option value="FA10">FA10</option>
                                <option value="FA11">FA11</option>
                                <option value="FA12">FA12</option>
                                <option value="FA13">FA13</option>
                                <option value="FA14">FA14</option>
                                <option value="FA15">FA15</option>
                                <option value="FA16">FA16</option>
                                <option value="SP11">SP11</option>
                                <option value="SP12">SP12</option>
                                <option value="SP13">SP13</option>
                                <option value="SP14">SP14</option>
                                <option value="SP15">SP15</option>
                                <option value="SP16">SP16</option>
                                <option value="SP17">SP17</option>
                                <option value="SU11">SU11</option>
                                <option value="SU12">SU12</option>
                                <option value="SU13">SU13</option>
                                <option value="SU14">SU14</option>
                                <option value="SU15">SU15</option>
                                <option value="SU16">SU16</option>
                                <option value="SU17">SU17</option>
                            </select>
                        </div>
                        <span class="textcolor">-</span>
                        <div class="form-group">
                            <select id="program" class="form-control" name="degreeProgram">
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
                        <span class="textcolor">-</span>
                        <div class="form-group">
                            <input type="text" name="rollNumber" class="form-control" style="width:100px;">

                        </div>


                        <br>
                        <br>
                        <br>


                        <label class="textcolor"> Enter Password</label>
                        <input type="password" name="check" class="form-control" style="width: 350px"">

                        <br>
                        <br>

                        <input type="submit" value="Log in" name="submit">


                    </div>

                </div>
            </form>
        </div>
    </div>


    <div id="NewStudentLogin" class="tab-pane fade">
        <div class="background1 row">
            <br>
            <br>
            <br>
            <br>
            <br>


            <div class="comsats col-md-12 col-xs-12">
                <div class="form-inline" role="form">
                    <div class="form-group">
                        <div class="col-md-2 col-xs-2">
                            <label class="textcolor">Email</label>
                        </div>
                        <div class="col-md-offset-1 col-md-9">
                            <input type="text" class="form-control">
                        </div>


                    </div>
                </div>
                <br>

                <div class="form-inline" role="form">
                    <div class="form-group">
                        <div class="col-md-2 col-xs-2">
                            <label class="textcolor">Password</label>
                        </div>
                        <div class="col-md-offset-1 col-md-9">
                            <input type="text" class="form-control">
                        </div>


                    </div>
                </div>
                <br>
                <div>
                    <a href="StudentPortal.php"><input type="submit" value="login" name="submit"> </a>
                </div>


            </div>
        </div>
    </div>


    <div id="NewStudentSignup" class="tab-pane fade ">
        <div class="background1 row">
            <br>
            <br>


            <div class=" comsats align  col-md-12 col-xs-8">


                <div class="padding form-horizontal">
                    <div class="form-group insideaddon">
                        <span class="glyphicon glyphicon-user"></span>
                        <input type="text" class="form-control" placeholder="Enter Your Name">

                    </div>
                    <br>
                    <div class="form-group insideaddon">
                        <span class="glyphicon glyphicon-user"></span>
                        <input type="text" class="form-control" placeholder="Enter Your Father Name">

                    </div>
                    <br>
                    <div class="form-group insideaddon">
                        <span class="glyphicon glyphicon-envelope"></span>
                        <input type="text" class="form-control" placeholder="Email">

                    </div>
                    <br>
                    <div class="form-group insideaddon">
                        <span class="glyphicon glyphicon-lock"></span>
                        <input type="text" class="form-control" placeholder="Password">

                    </div>
                    <br>
                    <div class="form-group insideaddon">
                        <span class="glyphicon glyphicon-repeat"></span>
                        <input type="text" class="form-control" placeholder="Re-Enter Password">

                    </div>
                    <div class="adjust">
                        <input type="submit" value="Submit">
                    </div>
                </div>


            </div>
            <br>


        </div>
    </div>
</div>


</body>
</html>