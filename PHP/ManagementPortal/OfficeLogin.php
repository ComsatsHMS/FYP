<?php
session_start();
?>
<html lang="en">
<head>
    <title>Management Login</title>
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
        <li class="col-md-6 active"><a data-toggle="tab" href="#login1"><strong>Superident Login</strong></a></li>
        <li class="col-md-6"><a data-toggle="tab" href="#login2"><strong>office Login</strong></a></li>
    </ul>
</div>

<div class="tab-content">


    <div id="login1" class="tab-pane fade in active">
        <div class="background1 row" >
            <br>
            <br>
            <br>
            <br>
            <br>


            <div  class="comsats col-md-12 col-xs-12">
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
                    <a href="SuperidentPortal.php"><input type="submit" value="login" name="submit1"> </a>
                </div>


            </div>
        </div>
    </div>


    <div id="login2" class="tab-pane fade">
        <div class="background1 row" >
            <br>
            <br>
            <br>
            <br>
            <br>


            <div  class="comsats col-md-12 col-xs-12">
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
                    <a href="MainApplicationOffice.php"><input type="submit" value="login" name="submit2"> </a>
                </div>


            </div>
        </div>
    </div>
</div>


</body>
</html>