
<?php
session_start();
error_reporting(0);
include("../connection.php");

?>
<html lang="en">
<head>
    <title>Parent Login</title>
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
        <div class="comsats col-md-12 col-xs-12" >
            <img src="../../IMAGES/CIITLogo_Plain.png">
            <strong class="textcolor"><h1>Welcome to Comsats Hostel Login</h1></strong>
        </div>
    </div>
</div>

<div class="row">
    <ul class="nav nav-tabs navbar-inverse">
        <li class="col-md-6 active"><a data-toggle="tab" href="#login"><strong>Parents Login</strong></a></li>
        <li class="col-md-6"><a data-toggle="tab" href="#signup"><strong>Parents Signup</strong></a></li>
    </ul>
</div>

<div class="tab-content">


    <div id="login" class="tab-pane fade in active">
        <div class="background1 row" >
            <br>
            <br>
            <br>
            <br>
            <br>


            <form  class="comsats col-md-12 col-xs-12">
                <?php
                $studentid == 0000;
                if(isset($_GET['submit'])){

                    $email = $_GET['email'];
                    $password = $_GET['password'];
                    $query = "select * from parents WHERE email = '$email' AND password = '$password'";
                    $result = mysqli_query($connection, $query);
                    while($db_data = mysqli_fetch_array($result)){
                        $studentid =$db_data['studentid'];
                    }
                    if($studentid == 0000){
                        echo "<h5 style='text-align: center; font-size: 16px; color: red'>Invalid E-mail/Password</h5>";
                    }
                    else{
                        header('Location:ParentPortal.php?id='.$studentid);
                    }
                }

                ?>
                <div class="form-inline" role="form">
                    <div class="form-group">
                        <div class="col-md-2 col-xs-2">
                            <label class="textcolor">Email</label>
                        </div>
                        <div class=" col-md-10">
                            <input type="text" class="form-control" name="email">
                        </div>


                    </div>
                </div>
                <br>

                <div class="form-inline" role="form">
                    <div class="form-group">
                        <div class="col-md-2 col-xs-2">
                            <label class="textcolor">Password</label>
                        </div>
                        <div class=" col-md-10">
                            <input type="password" class="form-control" name="password">
                        </div>


                    </div>
                </div>
                <br>
                <div>
                    <a href="ParentLogin.php"><input type="submit" value="login" name="submit"> </a>
                </div>


            </form>
        </div>
    </div>


    <div id="signup" class="tab-pane fade ">
        <div class="background1 row" >
            <br>
            <br>



            <div  class=" comsats align  col-md-12 col-xs-8">




                <form class="padding form-horizontal">
                    <?php
                    if(isset($_GET['create'])){

                        $temp_email;
                        $temp_id;
                        $name = $_GET['parentName'];
                        $id = $_GET['stdId'];
                        $email = $_GET['pemail'];
                        $password = $_GET['pass'];
                        $query = "select * from parents WHERE email = '$email'";
                        $result = mysqli_query($connection, $query);
                        while($db_data = mysqli_fetch_array($result)){
                            $temp_id =$db_data['studentid'];
                            $temp_email =$db_data['email'];
                        }
                        if($temp_email == $email || $temp_id == $id ){
                            echo "this email is already used";
                        }
                        else{
                            $insert="insert into parents VALUES ('$id','$name','$email','$password')";
                            $run = mysqli_query($connection,$insert);
                            header('Location: ParentPortal.php??id='.$studentid);

                        }
                    }

                    ?>

                    <div class="form-group insideaddon">
                        <span class="glyphicon glyphicon-user"></span>
                        <input type="text" class="form-control" placeholder="Enter Your Name" name="parentName" required>

                    </div>
                    <br>
                    <div class="form-group insideaddon">
                        <span class="glyphicon glyphicon-user"></span>
                        <input type="text" class="form-control" placeholder="Enter Your child Student Id" name="stdId" required>

                    </div>
                    <br>
                    <div class="form-group insideaddon">
                        <span class="glyphicon glyphicon-envelope"></span>
                        <input type="text" class="form-control" placeholder="Email" name="pemail" required>

                    </div>
                    <br>
                    <div class="form-group insideaddon">
                        <span class="glyphicon glyphicon-lock"></span>
                        <input type="password" class="form-control" placeholder="Password" name="pass" required>

                    </div>
                    <br>
                    <div class="form-group insideaddon">
                        <span class="glyphicon glyphicon-repeat"></span>
                        <input type="password" class="form-control" placeholder="Re-Enter Password" name="repass" required>

                    </div>
                    <div class="adjust">
                        <a href="ParentLogin.php"><input type="submit" value="Submit" name="create"></a>
                    </div>
                </form>



            </div>
            <br>



        </div>
    </div>
</div>


</body>
</html>