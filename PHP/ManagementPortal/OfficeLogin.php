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
        <title>home</title>
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
                            <li role="presentation" style="font-size: 22px"><a href="#">item 1 </a></li>
                            <li role="presentation" style="font-size: 22px"><a href="#">item 2 </a></li>
                            <li role="presentation" style="font-size: 22px"><a href="#">item 3 </a></li>
                        </ul>
                    </li>
                    <li class="dropdown" style="font-size: 25px">
                        <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false" href="#"> Login<span class="caret"></span></a>
                        <ul class="dropdown-menu dropdown-menu-right" role="menu" style="border: 1px solid">
                            <li role="presentation" style="font-size: 22px"><a href="../StudentPortal/Login.php">Student Portal </a></li>
                            <li role="presentation" style="font-size: 22px"><a href="OfficeLogin.php">Management Portal </a></li>
                            <li role="presentation" style="font-size: 22px"><a href="../ParentPortal/ParentLogin.php">Parent Portal </a></li>
                        </ul>
                    </li>
                </ul>

            </div>
        </div>
    </nav>
    <h2 style="text-align: center">Management Portal Login</h2>
    <hr width="370px">
    <div class="login-card">
        <p class="profile-name-card"></p>
        <form class="form-signin" action="LoginProcessing.php" method="post" enctype="multipart/form-data">
            <input class="form-control" type="text"  placeholder="Email address" name="email">
            <input class="form-control" type="password" placeholder="Password"  name="password">
            <!--
            <button class="btn btn-primary btn-block btn-lg btn-signin" type="submit" name="submit">Sign in</button>-->
            <?php ?>
            <input class="btn btn-primary btn-block btn-lg btn-signin" type="submit" value="Sign in" name="submit" id="submit">
        </form>
        <p><a href="RecoverPassword.php">Forget Password?</a></p>
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