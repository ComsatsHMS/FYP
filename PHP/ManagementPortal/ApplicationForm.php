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
        <div class="panel-heading"><h2 class="panelheading">Boys Hostel Admission Form</h2></div>
        <div class="panel-body " >
            <div class="row">
                <form action="ApplicationProcessing.php" method="post" enctype="multipart/form-data">
                    <div class="form-inline">
                        <label style="padding-right: 95pt;padding-left: 5px">Name</label>
                        <input class="form-control" type="text" name="name" style="width: 250px" required>

                        <label>CNIC No.</label>
                        <input class="form-control" type="number" name="cnic" required>
                    </div>
                    <br>
                    <div class="form-inline">
                        <label style="padding-left: 5px">Father/Guardian's Name</label>
                        <input class="form-control" type="text" name="fname" style="width: 250px" required>
                        <label>CNIC No.</label>
                        <input class="form-control" type="number" name="fcnic" required>
                    </div>
                    <br>
                    <div class="form-inline">
                        <label style="padding-left: 5px">Program</label>
                        <input class="form-control" type="text" name="studentProgram" style="width: 100px">
                        <label>Registration ID</label>
                        <input class="form-control" type="number" name="studentId" style="width: 200px">
                    </div>
                    <br>
                    <div class="form-inline">
                        <label style="padding-left: 5px">Postal Address</label>
                        <input class="form-control" type="text" name="address" style="width: 550px">
                    </div>
                    <br>
                    <div class="form-inline">
                        <label style="padding-left: 5px">Tel No.</label>
                        <input class="form-control" type="number" name="telephoneNumber" style="width: 200px">
                        <label >Mobile No.</label>
                        <input class="form-control" type="number" name="mobileNumber" style="width: 200px">
                    </div>
                    <br>
                    <div class="form-inline">
                        <label style="padding-left: 5px">Email</label>
                        <input class="form-control" type="text" name="email" style="width: 200px" required>
                    </div>
                    <br>
                    <div class="form-inline">
                        <label style="padding-left: 5px">Domicile</label>
                        <input class="form-control" type="text" name="domicile" style="width: 150px">
                        <label >Blood Group</label>
                        <input class="form-control" type="text" name="bloodGroup" style="width: 100px">
                        <label >Religion</label>
                        <input class="form-control" type="text" name="religion" style="width: 100px">
                    </div>
                    <br>
                    <div class="form-inline">
                        <label style="padding-left: 5px">Parent/Guardian's Occupation</label>
                        <input class="form-control" type="text" name="occupation" style="width: 200px">
                        <label >Monthly income (Rs.)</label>
                        <input class="form-control" type="number" name="income" style="width: 150px">
                    </div>
                    <br>
                    <div class="form-inline">
                        <label style="padding-left: 5px">Name of person to be entaded on care of Emergency</label>
                        <input class="form-control" type="text" name="emergency" style="width: 250px">
                    </div>
                    <br>
                    <div class="form-inline">
                        <label style="padding-left: 5px">Relationship</label>
                        <input class="form-control" type="text" name="relation" style="width: 150px">
                        <label >Cell No.</label>
                        <input class="form-control" type="number" name="cell" style="width: 150px">
                    </div>
                    <br>
                    <div class="form-inline ">
                        <div class="form-group">
                            <label style="padding-left: 5px;padding-right: 10px">Preferred Hostel </label>
                            <label><input type="radio" name="hostel" value="M.A JINNAH"> M.A JINNAH</label>
                            <label><input type="radio" name="hostel" value="Liquat Hall"> Liquat Hall</label>
                            <label><input type="radio" name="hostel" value="Johar Hall"> Johar Hall</label>
                            <label><input type="radio" name="hostel" value="Jupitar Hall"> Jupitar Hall</label>
                        </div>
                    </div>
                    <br>
                    <div class="form-inline ">
                        <div class="form-group">
                            <label style="padding-left: 5px;padding-right: 20pt">Old Resident  </label>
                            <label><input type="radio" name="old" value="1"> yes</label>
                            <label><input type="radio" name="old" value="0"> No</label>
                        </div>
                    </div>
                    <div class="form-inline ">
                        <div class="form-group">
                            <label style="padding-left: 5px;padding-right: 20pt">New Student </label>
                            <label><input type="radio" name="new_student" value="1"> yes </label>
                            <label><input type="radio" name="new_student" value="0"> No</label>
                        </div>
                    </div>
                    <br>
                    <label>
                        <h3>Required Documents</h3>
                    </label>
                    <div class="form-inline ">
                        <div class="form-group">
                            <label>Picture</label>
                            <input  type="file" name="image">
                        </div>
                        <div class="form-group">
                            <label>Semester fee slip</label>
                            <input  type="file" name="image1">
                        </div>
                        <div class="form-group">
                            <label>CNIC</label>
                            <input  type="file" name="imageCNIC">
                        </div>
                        <div class="form-group">
                            <label>Domicile Certificate</label>
                            <input  type="file" name="imageDomicile">
                        </div>
                        <div class="form-group">
                            <label>Father/Guardian's CNIC </label>
                            <input  type="file" name="imageFG">
                        </div>
                    </div>
                    <br>
                    <div class="checkbox">
                        <label><input type="checkbox" required>I certify that the aforementioned information given by me is correct. I understand that if any part of this information is found false/incorrect,my allotment will stand cancelled. I also undertake to strictly observe all rules & regulations of the hostel. I shall also comply with the direction and orders issued by the hostel authorities from time to time during the period of my stay in the hostel. I undertake further to pay all dues in time.</label>
                    </div>
                    <button type="submit" class="btn btn-success" name="submit1">Apply</button>
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