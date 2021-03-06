<?php
session_start();
error_reporting(0);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Parent Login Page</title>
    <link rel="stylesheet" href="../../CSS/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Cookie">
    <link rel="stylesheet" href="../../fonts/font-awesome.min.css">
    <link rel="stylesheet" href="../../CSS/Pretty-Footer.css">
    <link rel="stylesheet" href="../../CSS/Pretty-Registration-Form.css">
    <link rel="stylesheet" href="../../CSS/Google-Style-Login.css">
</head>
<script>
    function showhide(id,id1,id2) {
        var e = document.getElementById(id);
        var e1 = document.getElementById(id1);
        if(id2 == 'forget'){
            e.style.display = 'block';
            e1.style.display = 'none';
        }
        else{
            e.style.display = 'none';
            e1.style.display = 'block';
        }
    }
</script>
<body>
<nav class="navbar navbar-default " style="height: 100px;padding-left: 85px;padding-right: 85px;font-family: 'Times New Roman'">
    <div class="container-fluid">
        <div class="navbar-header"><a class="navbar-brand navbar-link" href="../../index.html"><img src="../../IMAGES/comsatslogo.png" height="80" width="400" alt="Comsats logo"></a></h6>
            <button class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
        </div>
        <div class="collapse navbar-collapse" id="navbar-collapse" style="float: right;padding-top: 15px">
            <ul class="nav navbar-nav">
                <li role="presentation" style="font-size: 25px"><a href="../../index.html">Home </a></li>
                <li role="presentation" style="font-size: 25px"><a href="#">Hostel Form </a></li>
                <li class="dropdown" style="font-size: 25px">
                    <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false" href="#"> Downloads</a>
                </li>
                <li class="dropdown" style="font-size: 25px">
                    <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false" href="#"> Login<span class="caret"></span></a>
                    <ul class="dropdown-menu dropdown-menu-right" role="menu" style="border: 1px solid">
                        <li role="presentation" style="font-size: 16px"><a href="../StudentPortal/Login.php">Student Portal </a></li>
                        <li role="presentation" style="font-size: 16px"><a href="../ManagementPortal/OfficeLogin.php">Management Portal </a></li>
                        <li role="presentation" style="font-size: 16px"><a href="../ParentPortal/ParentLogin.php">Parent Portal </a></li>
                        <li role="presentation" style="font-size: 16px"><a href="../AdminPortal/AdminLogin.php">Admin
                                Portal </a></li>
                    </ul>
                </li>
            </ul>

        </div>
    </div>
</nav>


<h2 style="text-align: center">Parent Portal Login</h2>
<hr width="330px">
<div class="login-card">
    <p class="profile-name-card"></p>
    <?php
    if($_SESSION['error'] == 'error'){
        echo  '<div>
    <p id="error" style="color: red;text-align: center " >Sign in failure: Invalid Login or bad password</p>
</div>';
        unset($_SESSION['error']);
    }
    elseif($_SESSION['resetPW']=='Ok'){
        echo  '<div>
    <p id="error" style="color: green;text-align: center " >Please! Check your email for temporary password.</p>
</div>';
    }
    elseif($_SESSION['resetPW']=='error'){
        echo  '<div>
    <p id="error" style="color: red;text-align: center " >OOPss! Something went wrong, Try after sometime</p>
</div>';
    }
    elseif($_SESSION['resetPW']=='empty'){
        echo  '<div>
    <p id="error" style="color: red;text-align: center " >Provided Email is not linked to any account.</p>
</div>';
    }
    unset($_SESSION['resetPW']);
    ?>
    <form class="form-signin" action="LoginProcessing.php" method="post" enctype="multipart/form-data" id="signin">
        <select name="degree" class="degree form-control col-sm-4" style="width: 33%">
            <option>DDP</option>
            <option>SDP</option>
        </select>
        <select name="fall" id="year" class="form-control col-sm-4" style="width: 33%">
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
        <select id="program" class="form-control col-sm-4" name="degreeProgram" style="width: 34%">
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
        <input name="rollNumber" placeholder="Student ID" class="form-control col-sm-4 control-label" type="text"required autocomplete="off">
        <input class="form-control" type="password" placeholder="Password" id="pw" name="check">
        <input class="btn btn-primary btn-block btn-lg btn-signin" type="submit" value="Sign in" name="submit" id="submit">
<!--        <p class="forgot"><a href="javascript:showhide('pwreset','signin','forget')">Forgot Password?</a></p>-->
    </form>

    <form id="pwreset"  method="post" action="LoginProcessing.php" enctype="multipart/form-data" style="display: none">
        <input name="email" placeholder="Provide Email for Password Reset" class="form-control col-sm-4 control-label" type="text"required autocomplete="off">
        <input class="btn btn-primary btn-block btn-lg btn-signin" type="submit" value="Send" name="forget" id="submit">
        <p class="forgot"><a href="javascript:showhide('pwreset','signin','')">Return to login</a></p>
    </form>

</div>
<footer>
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

