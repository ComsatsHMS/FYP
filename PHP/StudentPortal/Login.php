<?php
session_start();
error_reporting(0);
?>
<?php
if($_SESSION['LoginError']=="Error"){
    echo "<script>
     alert(\"Email or Password Incorrect!\");
    </script>";
}
else if($_SESSION['SignUp']=="OK"){
    echo "<script>
     alert(\"Submitted! Temporary Password Will be sent to You on Email after Approval\");
    </script>";
}
else if($_SESSION['SignUp']=="Error"){
    echo "<script>
     alert(\"Oops! Something Went Wrong\");
    </script>";
}
unset($_SESSION['LoginError']);
unset($_SESSION['SignUp']);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Login Page</title>
    <link rel="stylesheet" href="../../CSS/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Cookie">
    <link rel="stylesheet" href="../../fonts/font-awesome.min.css">
    <link rel="stylesheet" href="../../CSS/Pretty-Footer.css">
    <link rel="stylesheet" href="../../CSS/Pretty-Registration-Form.css">
    <link rel="stylesheet" href="../../CSS/Google-Style-Login.css">
</head>

<body>
<nav class="navbar navbar-default " style="height: 90px;padding-left: 85px;padding-right: 85px">
    <div class="container-fluid">
        <div class="navbar-header"><a class="navbar-brand navbar-link" href="../../index.html"><img src="../../IMAGES/comsatslogo.png" height="70" width="200" alt="Comsats logo"></a></h6>
            <button class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
        </div>
        <div class="collapse navbar-collapse" id="navbar-collapse" style="float: right;padding-top: 15px">
            <ul class="nav navbar-nav">
                <li role="presentation" style="font-size: 25px"><a href="../../index.html">Home </a></li>
                <li role="presentation" style="font-size: 25px"><a href="#">Hostel Form </a></li>
                <li class="dropdown" style="font-size: 25px">
                    <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false" href="#"> Downloads<span class="caret"></span></a>
                    <ul class="dropdown-menu dropdown-menu-right" role="menu" style="border: 1px solid">
                        <li role="presentation" style="font-size: 16px"><a href="#">item 1 </a></li>
                        <li role="presentation" style="font-size: 16px"><a href="#">item 2 </a></li>
                        <li role="presentation" style="font-size: 16px"><a href="#">item 3 </a></li>
                    </ul>
                </li>
                <li class="dropdown" style="font-size: 25px">
                    <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false" href="#"> Login<span class="caret"></span></a>
                    <ul class="dropdown-menu dropdown-menu-right" role="menu" style="border: 1px solid">
                        <li role="presentation" style="font-size: 16px"><a href="../StudentPortal/Login.php">Student Portal </a></li>
                        <li role="presentation" style="font-size: 16px"><a href="OfficeLogin.php">Management Portal </a></li>
                        <li role="presentation" style="font-size: 16px"><a href="../ParentPortal/ParentLogin.php">Parent Portal </a></li>
                    </ul>
                </li>
            </ul>

        </div>
    </div>
</nav>
<h2 style="text-align: center">Student Portal Login</h2>
<hr width="370px">
<div class="login-card">
    <p class="profile-name-card"></p>
            <form action="LoginProcessing.php" method="post" enctype="multipart/form-data">
                <p style="vertical-align: bottom; width: 100%;">

                        <select name="degree" class="degree form-control" style="width: 30%">
                            <option>DDP</option>
                            <option>SDP</option>
                        </select>
                    <span class="textcolor">-</span>

                    <select name="fall" id="year" class="form-control" style="width: 30%">
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
                <span class="textcolor">-</span>
                    <select id="program" class="form-control" name="degreeProgram" style="width: 30%">
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
                <span class="textcolor">-</span>
                   <div class="field-wrap">
                    <label>
                        ID<span class="req">*</span>
                    </label>
                  <input name="rollNumber" class="form-control" type="text"required autocomplete="off"/>
                </div>
                </p>
                <div class="clear">
                </div>

                <div class="field-wrap">
                    <label>
                        Password<span class="req">*</span>
                    </label>
                    <input name="check" type="password"required autocomplete="off"/>
                </div>
                <input class="btn btn-primary btn-block btn-lg btn-signin" type="submit" value="Sign in" name="submit" id="submit">
            </form>
                <p class="forgot"><a href="#">Forgot Password?</a></p>
        </div>
<footer>
    <div class="row">
        <div class="col-md-4 col-sm-6 footer-navigation">
            <h3><a href="#"><img src="../../IMAGES/comsatslogo.png" height="70" width="200" alt="Comsats logo"></a></h3>
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
<?php
if($_SESSION['LoginError']=="Error"){
    echo "<script>
     alert(\"Email or Password Incorrect!\");
    </script>";
}
else if($_SESSION['SignUp']=="OK"){
    echo "<script>
     alert(\"Submitted! Temporary Password Will be sent to You on Email after Approval\");
    </script>";
}
else if($_SESSION['SignUp']=="Error"){
    echo "<script>
     alert(\"Oops! Something Went Wrong\");
    </script>";
}
unset($_SESSION['LoginError']);
unset($_SESSION['SignUp']);
?>