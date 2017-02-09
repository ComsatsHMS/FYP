<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <title>office Portal</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>


    <link rel="stylesheet" href='../../CSS/OfficePortal.css' type="text/css" media="screen" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery.matchHeight/0.7.0/jquery.matchHeight-min.js"></script>
    <link href="https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
    <script src="https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
    <script src = jquery.js></script>
    <script src = jqueryui/js/jquery-ui-1.8.16.custom.min.js></script>

    <link rel=stylesheet type=text/css
          href=jqueryui/css/smoothness/jquery-ui-1.8.16.custom.css />
    <script>
        $(document).ready(function(){
            $('#sidebar').height($(window).height());
        });
    </script>
    <script>
        $(document).ready(function(){
            $('#rightside').height($(window).height());
        });
    </script>


    <script>
        $(function() {
            $( "#dialog-2" ).dialog({
                autoOpen: false,
                maxWidth:410,
                maxHeight: 300,
                width: 500,
                height: 300,
                buttons: {
                    Submit: function() {$(this).dialog("close");}
                },
                title: "Notification",
                position: {
                    my: " center",
                    at: " center"
                }

            });
            $( "#opener-2" ).click(function() {
                $( "#dialog-2" ).dialog( "open" );
            });
        });
    </script>

</head>




<body>
<div class="container-fluid" >
    <div class="row" >
        <!--    Column of size 2 for sidebar Menu -->
        <div  class= "col-md-2 col-xs-6" id="sidebar">
            <!-- Sidebar with logo and menu -->
            <h4 >
                <a href="mainApplicationOffice.php" id="sidebar-title">Office Hostel Portal</a></h4>
            <a href="#">
                <img id="ciit_logo" src="../IMAGES/CIITLogo_Plain.png" alt="COMSATS" />
            </a>
            <ul id="main-nav">
                <!--  Menu -->
                <li><a id="applications" class="nav-top-item" href="applicationsDisplay.php">Applications</a></li>
                <li><a id="complain" class="nav-top-item" href="ViewComplains.php">View Complains</a></li>
                <li><a id="complain" class="nav-top-item" href="UploadNotifications.php">Upload Notifications</a></li>
            </ul>
        </div>


        <!--    Start of the other column of size 10  -->
        <div class="col-md-10 col-xs-6" id="rightside" >
            <!--profile Pic of logged in user-->
            <div class="row">
                <div class="col-md-6 col-xs-6">
                    <li><a href="#" style="padding-bottom: 20%">
                            <img id="profile_pic" src="../IMAGES/profile_pic.jpg" alt="profilepic" style="width: 100px; height: 100px"; /></a></li>
                </div>
                <!--Page header-->

                <div class="col-md-6 col-xs-6" id="profile" style="text-align: center;">
                    <span id="ciit_Label" style="font-size:10pt;">Welcome,</span>
                    <a href="#" title="Your profile">
                        <span id="ciit_office" style="font-size:14pt; ">abcd</span></a><br>
                    <a id="ciit_Signout" href=" Login.php" style="font-size: 12pt;font-style: italic">Log
                        Out</a>
                </div>
            </div>
            <div class="panel-group" id="profile_box">
                <div class="row">

                    <div class="col-md-12">
                        <div class="panel panel-primary">
                            <div class="panel-heading" > Previous Uploaded </div>
                            <!--            Content Box Contents-->
                            <div class="panel-body">
                                <!--                Latest News Area      -->
                                <h3><i class="fa fa-newspaper-o"></i>Upload  Notifications</h3>

                                <div class="row">

                                    <div class="col-md-4">
                                        <label >Hostel Name</label>
                                        <select class="form-control" id="hostel" name="hostel">
                                            <option>
                                                <?php
                                                if(isset($_SESSION['hostel1'])){
                                                    echo $_SESSION['hostel1'];
                                                }
                                                ?>
                                            </option>
                                        <option>M.A Jinnah</option>
                                        <option>Liaqat Hall</option>
                                        <option>Johar Hall</option>
                                        </select>


                                    </div>
                                    <div class="col-md-4">
                                        <label >Notification Type</label>
                                        <select class="form-control" id="type" name="type">
                                            <option>
                                                <?php
                                                if(isset($_SESSION['type1'])){
                                                    echo $_SESSION['type1'];
                                                }
                                                ?>
                                            </option>
                                            <option>Mess Notification</option>
                                            <option>Hostel Timing</option>
                                            <option>Trip Notification</option>
                                            <option>Guest Notification</option>
                                        </select>
                                    </div>



                                    <script>
                                        $("#hostel").on("change", function(){
                                            var name = $(this).val();
                                            window.location = "upload.php?naam="+name;
                                        })
                                    </script>
                                    <script>
                                        $("#type").on("change", function(){
                                            var cause= $(this).val();
                                            window.location = "upload.php?cause="+cause;
                                        })
                                    </script>

                                    <div class="col-md-4  " >

                                        <label for="date">Date: </label>
                                        <form method="POST" action="upload.php" enctype="multipart/form-data">

                                            <input class="form-control" type="date" name="date" id="date">

                                            <div class="form-group ">
                                         <input type="file"  name="fileToUpload" id="fileToUpload" >
                                                <input type="submit" value="upload" name="upload" id="upload">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>


                                   <div class="col-md-12">
                                       <div id="dialog-2" title="Dialog Title goes here...">Please write Notification
                                           <textarea rows="5" cols="54" id="text" class="text">

                                               </textarea>

                                       </div>
                                       <button id="opener-2">Click here to write Notification</button>
                                   </div>









                            </div>

                        </div>

                    </div>

                </div>
            </div>

        </div>
    </div>
</div>

</body>
</html>