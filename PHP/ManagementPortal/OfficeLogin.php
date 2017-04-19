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
    <html xmlns="http://www.w3.org/1999/html">
    <head>
        <title>Management Login</title>
        <meta charset="utf-8">
        <link href="../../CSS/LoginStyle.css" rel='stylesheet' type='text/css' />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
        <!--webfonts-->
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text.css'/>
        <!--//webfonts-->
        <link rel="stylesheet" href="../../CSS/style.css?<?php echo time(); ?>">
    </head>
    <body>
    <div class="main">
        <div class="header" >
            <h1>Login or Create  Account!</h1>
        </div>
        <form class="form-horizontal" action="LoginProcessing.php" method="post" enctype="multipart/form-data">
            <ul class="left-form">
                <h2>Request For a Account:</h2>
                <li>
                    <input type="text"   placeholder="First Name" name="FName" required/>

                    <div class="clear"> </div>
                </li>
                <li>
                    <input type="text"   placeholder="Last Name" name="LName" required/>

                    <div class="clear"> </div>
                </li>
                <li>
                    <input type="text"   placeholder="Employement Rank"  name="Rank"  required/>

                    <div class="clear"> </div>
                </li>
                <li>
                    <input type="text"   placeholder="Email" name="Email" required/>

                    <div class="clear"> </div>
                </li>
                <li>
                    <input type="text"   placeholder="Hostel" name="hostel" required/>

                    <div class="clear"> </div>
                </li>
                <li>
                    <input type="text"   placeholder="Address" name="Address" required/>

                    <div class="clear"> </div>
                </li>
                <li>
                    <input type="text"   placeholder="Contact No." name="PhoneNo" required/>

                    <div class="clear"> </div>
                </li>
                <li>
                    <label>Picture</label>
                    <input type="file" name="ProfilePic" required/>

                    <div class="clear"> </div>
                </li>
                <input type="submit" value="Sign Up" name="SignUp">
                <div class="clear"> </div>
            </ul>
        </form>

        <form class="form-horizontal" action="LoginProcessing.php" method="post">
            <ul class="right-form">
                <h3>Login:</h3>
                <div>
                    <li><input type="text"  placeholder="E-mail" name="email" required/></li>
                    <li> <input type="password"  placeholder="Password" name="password" required/></li>
                    <h4>I forgot my Password!</h4>
                    <input type="submit" value="Submit" name="submit">
                </div>

                <div class="clear"> </div>
            </ul>
        </form>
        <div class="clear"> </div>



    </div>
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