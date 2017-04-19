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
<html lang="en">
<head>
    <title>Management Login</title>
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../../CSS/style.css?<?php echo time(); ?>">
</head>
<body>

<div class="container-fluid">
    <div class="row background">
        <div class="comsats col-md-12 col-xs-12">
            <img src="../../IMAGES/CIITLogo_Plain.png">
            <strong class="textcolor"><h1>Welcome To Management Login Portals</h1></strong>
        </div>
    </div>
</div>

<!--<div class="row">-->
<!--    <ul class="nav nav-tabs navbar-inverse">-->
<!--        <li class="col-md-12"><a data-toggle="tab" href="#login1"><strong></strong></a></li>-->
<!--    </ul>-->
<!--</div> -->

        <div class="background1 row">
            <div class="comsats col-md-6">
                <br>
                <br>
                <h2 class="textcolor"> Login </h2>
                <form class="form-horizontal" action="LoginProcessing.php" method="post" >
                    <div class="form-group">
                        <label class="control-label col-sm-2 textcolor" for="email">Email:</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="email" placeholder="Enter email" name="email">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2 textcolor" for="pwd">Password:</label>
                        <div class="col-md-6">
                            <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="password" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-6">
                            <input type="submit" value="Submit" name="submit">
                        </div>
                    </div>
                </form>
            </div>
            <div class="comsats col-md-6">
                <br>
                <h2 class="textcolor"> SignUp </h2>
                <form class="form-horizontal" action="LoginProcessing.php" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label class="control-label textcolor col-sm-2" for="email">First Name:</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control"  placeholder="First Name" name="FName" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label textcolor col-sm-2" for="pwd">Last Name:</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control"  placeholder="Last Name" name="LName" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label textcolor col-sm-2" for="email">Email:</label>
                        <div class="col-md-6">
                            <input type="email" class="form-control"  placeholder="Enter email" name="Email" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label textcolor col-sm-2" for="profilepic">Picture:</label>
                        <div class="col-md-6">
                            <input type="file" class="form-control" id="ProfilePic" name="ProfilePic" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label textcolor col-sm-2" for="pwd">Employment Rank:</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control"  placeholder="Your Position" name="Rank" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label textcolor col-sm-2" for="hostel">Hostel:</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control"  placeholder="Hostel" name="hostel" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label textcolor col-sm-2" for="email">Address:</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control"  placeholder="Enter Address" name="Address" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label textcolor col-sm-2" for="email">Phone No:</label>
                        <div class="col-md-6">
                            <input type="NUMBER" class="form-control"  placeholder="Enter Phone No" name="PhoneNo" required >
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-6">
                            <input type="submit" value="Sign Up" name="SignUp">
                        </div>
                    </div>
                </form>
            </div>
        </div>

</body>
</html>