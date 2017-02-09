<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Title</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../../CSS/style.css">
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <div class="paddingimg col-md-12">
            <img src="../../IMAGES\CIITLogo_Plain.png" >


        </div>

    </div>
</div>
<div class="container">

    <div class="panel panel-primary">
        <div class="panel-heading"><h2 class="panelheading">Application For Hostel</h2></div>
        <div class="panelheight panel-body " >
            <div class="row">
                <form action="applicationProcessing.php" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Name</label>
                        <input class="form-control" type="text" name="name">
                    </div>
                    <div class="form-group">
                        <label>Father Name</label>
                        <input class="form-control" type="text" name="fname">
                    </div>
                    <div class="form-group">
                        <label>Student ID</label>
                        <input class="form-control" type="number" name="studentId">
                    </div>
                    <div class="form-group">
                        <label>Address</label>
                        <input class="form-control" type="text" name="address">
                    </div>
                    <div class="form-group">
                        <label>CNIC Number</label>
                        <input class="form-control" type="number" name="cnic">
                    </div>

                    <label><h3>Preferred Hostel</h3></label>
                    <div class="form-inline ">
                        <div class="col-md-3 col-xs-0">
                            <label>M.A JINNAH</label>
                            <input type="radio" name="hostel">
                        </div>
                        <div class="col-md-3 col-xs-0">
                            <label>Liquat Hall</label>
                            <input type="radio" name="hostel">
                        </div>
                        <div class="col-md-3 col-xs-0">
                            <label>Johar Hall</label>
                            <input type="radio" name="hostel">
                        </div>
                        <div class="col-md-3 col-xs-0">
                            <label>Jupitar Hall Hall</label>
                            <input type="radio" name="hostel">
                        </div>
                    </div>
                    <label>
                        <h3>Require Document</h3>
                    </label>
                    <div class="form-inline ">
                        <div class="col-md-3 col-xs-0">
                            <label>One Picture</label>
                            <input type="file" name="image">
                        </div>
                        <div class="col-md-3 col-xs-0">
                            <label>Semester fee slip</label>
                            <input type="file" name="image1">
                        </div>
                        <div class="col-md-3 col-xs-0">
                            <label>Student Id Card </label>
                            <input type="file" name="image2">
                        </div>


                    </div>
                    <br>
                    <br>
                    <br>
                    <br>
                    <label><h3>Old Hostalide</h3></label>
                    <div class="form-inline ">

                        <div class="col-md-3 col-xs-0">
                            <label>yes </label>
                            <input type="radio" name="old">
                        </div>
                        <div class="col-md-3 col-xs-0">
                            <label>No</label>
                            <input type="radio" name="old">
                        </div>

                    </div>

                    <br>
                    <br>
                    <br>
                    <label><h3>New Student</h3></label>
                    <div class="form-inline ">

                        <div class="col-md-3 col-xs-0">
                            <label>yes </label>
                            <input type="radio" name="new_student">
                        </div>
                        <div class="col-md-3 col-xs-0">
                            <label>No</label>
                            <input type="radio" name="new_student">
                        </div>

                    </div>

                    <label><input type="submit" value="submit" name="submit1"></label>
                </form>
            </div>







    </div>



</div>
</div>

</div>
</div>
</div>

</body>
</html>