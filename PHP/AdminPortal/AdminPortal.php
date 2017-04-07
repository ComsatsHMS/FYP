<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Portal</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js">
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery.matchHeight/0.7.0/jquery.matchHeight-min.js"></script>
    <link rel="stylesheet" href='../../CSS/OfficePortal.css' type="text/css" media="screen" />
</head>

<script>
    $(document).ready(function(){
        $('#sidebar').height(800);
    });
</script>

<script>
    $(document).ready(function(){
        $('#rightside').height(800);
    });
</script>


<body>
<div class="container-fluid" >
    <div class="row" >
        <!--    Column of size 2 for sidebar Menu -->
        <div  class= "col-md-2 col-xs-6" id="sidebar">
            <!-- Sidebar with logo and menu -->
            <h4 >
                <a href="MainApplicationOffice.php" id="sidebar-title">Admin Portal</a></h4>
            <a href="#">
                <img id="ciit_logo" src="../../IMAGES/CIITLogo_Plain.png" alt="COMSATS" />
            </a>
            <ul id="main-nav">
                <!--  Menu -->

                <li><a id="studentList" class="nav-top-item" href="List_Emoloyees.php" class="nav-top-item">Employees List</a></li>
                <li><a id="studentList" class="nav-top-item" href="Request.php" class="nav-top-item">Account Request</a></li>
                <li><a id="rights" class="nav-top-item" href="Rights.php" class="nav-top-item">Rights</a></li>


            </ul>
        </div>


        <!--    Start of the other column of size 10  -->
        <div class="col-md-10 col-xs-6" id="rightside" >
            <!--profile Pic of logged in user-->
            <div class="row" style="padding-bottom: 8pt">
                <div class="col-md-6 col-xs-6">
                    <li><a href="#" style="padding-bottom: 20%">
                            <img id="profile_pic" src="../../IMAGES/profile_pic.jpg" alt="profilepic" style="width: 100px; height: 100px"; /></a></li>
                </div>
                <!--Page header-->

                <div class="col-md-6 col-xs-6" id="profile" style="text-align: center;">
                    <span id="ciit_Label" style="font-size:10pt;">Welcome,</span>
                    <a href="#" title="Your profile">
                        <span id="ciit_office" style="font-size:14pt; ">abcd</span></a><br>
                    <a id="ciit_Signout" href="OfficeLogin.php" style="font-size: 12pt;font-style: italic">Log
                        Out</a>
                </div>
            </div>
            <ol class="breadcrumb">
                <li><a href="MainApplicationOffice.php">Home</a></li>
                <li><a href="OfficeLogin.php">Login</a></li>
                <li class="active">Admin Portal</li>

            </ol>


            </div>

        </div>
    </div>

</body>
</html>