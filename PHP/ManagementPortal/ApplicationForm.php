<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Hostel Application Form</title>

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
<script>
    function Validate(){
        var name=document.forms["application"]["name"].value;

        var regexp1=new RegExp("[^a-zA-Z][^a-zA-Z\s]+");


        if(regexp1.test(document.forms["application"]["name"].value) || name.length==0 || name.length>20 ) {
            if (name.length==0) {

              //  document.getElementById("name_error").innerHTML = "Please fill out this field";

                document.getElementById("name").style.borderColor = "red";
                return false;
            }
            if (regexp1.test(document.forms["application"]["name"].value)) {



                document.getElementById("name").style.borderColor = "red";
                return false;
            }

            if (name.length > 20) {

                document.getElementById("name").style.borderColor = "red";
                return false;
            }
        }

        else{

            document.getElementById("name_error").style.display = "none";

            document.getElementById("name").style.borderColor = "green";
            return true;
        }
    }
    function Validate1(){

        var fname=document.forms["application"]["fname"].value;

        var regexp1=new RegExp("[^a-zA-Z][^a-zA-Z\s]+");


        if(regexp1.test(document.forms["application"]["fname"].value) || fname.length==0 || fname.length>20 ) {
            if (fname.length==0) {

              //  document.getElementById("fname_error").innerHTML = "Please fill out this field";

                document.getElementById("fname").style.borderColor = "red";
                return false;
            }
            if (regexp1.test(document.forms["application"]["fname"].value)) {



                document.getElementById("fname").style.borderColor = "red";
                return false;
            }

            if (name.length > 20) {

                document.getElementById("fname").style.borderColor = "red";
                return false;
            }
        }

        else{

            document.getElementById("fname_error").style.display = "none";

            document.getElementById("fname").style.borderColor = "green";
            return true;
        }
    }
    function Validate2() {
        var id=document.forms["application"]["id"].value;


        var regexp2=new RegExp("[^0-9]");

       // if(regexp2.test(document.forms["application"]["cnic"].value)  ){
        if(id.length==0 || regexp2.test(document.forms["application"]["id"].value) || id.length>3 ){


            document.getElementById("id").style.borderColor="red";



            return false;
          }else {

            document.getElementById("id").style.borderColor = "green";
            return true;
        }
    }
   function Validate3() {

      var mail=document.forms["application"]["mail"].value;
      // var regexp3=new RegExp("([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$");
        var regexp3=new RegExp("[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$")
        //if(regexp3.test(document.forms["application"]["mail"].value)){
       if(mail.length==0 || !regexp3.test(document.forms["application"]["mail"].value) ){

            document.getElementById("mail").style.borderColor="red";
        }
       else {

            document.getElementById("mail").style.borderColor="green";
        }

   }
    function Validate4() {

        var tele=document.forms["application"]["tele"].value;
        var regexp2=new RegExp("[^0-9]");

        if(tele.length==0 ||regexp2.test(document.forms["application"]["tele"].value)){

            document.getElementById("tele").style.borderColor="red";
        }
        else {

            document.getElementById("tele").style.borderColor="green";
        }

    }
    function Validate5() {

        var phone=document.forms["application"]["phone"].value;
        var regexp2=new RegExp("[^0-9]");

        if(phone.length==0 ||regexp2.test(document.forms["application"]["phone"].value)){

            document.getElementById("phone").style.borderColor="red";
        }
        else {

            document.getElementById("phone").style.borderColor="green";
        }

    }
    function Validate6() {

        var dom=document.forms["application"]["dom"].value;
        var regexp2=new RegExp("[^A-Z|a-z]");

        if(dom.length==0 ||regexp2.test(document.forms["application"]["dom"].value)){

            document.getElementById("dom").style.borderColor="red";
        }
        else {

            document.getElementById("dom").style.borderColor="green";
        }

    }
    function Validate7() {

        var dom=document.forms["application"]["reg"].value;
        var regexp2=new RegExp("[^A-Z|a-z]");

        if(dom.length==0 ||regexp2.test(document.forms["application"]["reg"].value)){

            document.getElementById("reg").style.borderColor="red";
        }
        else {

            document.getElementById("reg").style.borderColor="green";
        }

    }
    function Validate8() {

        var blood=document.forms["application"]["blood"].value;
        var regexp2=new RegExp("[^A-Z|a-z|+|-]");

        if(blood.length==0 ||regexp2.test(document.forms["application"]["blood"].value)){

            document.getElementById("blood").style.borderColor="red";
        }
        else {

            document.getElementById("blood").style.borderColor="green";
        }

    }
    function Validate9() {

        var occ=document.forms["application"]["occ"].value;
        var regexp2=new RegExp("[^A-Z|a-z]");

        if(occ.length==0 ||regexp2.test(document.forms["application"]["occ"].value)){

            document.getElementById("occ").style.borderColor="red";
        }
        else {

            document.getElementById("occ").style.borderColor="green";
        }

    }
    function Validate10() {

        var inc=document.forms["application"]["inc"].value;
        var regexp2=new RegExp("[^0-9]");

        if(inc.length==0 ||regexp2.test(document.forms["application"]["inc"].value)){

            document.getElementById("inc").style.borderColor="red";
        }
        else {

            document.getElementById("inc").style.borderColor="green";
        }

    }
    function Validate11() {

        var emg=document.forms["application"]["emg"].value;
        var regexp2=new RegExp("[^a-zA-Z][^a-zA-Z\s]+");

        if(emg.length==0 ||regexp2.test(document.forms["application"]["emg"].value)){

            document.getElementById("emg").style.borderColor="red";
        }
        else {

            document.getElementById("emg").style.borderColor="green";
        }

    }
    function Validate12() {

        var rel=document.forms["application"]["rel"].value;
        var regexp2=new RegExp("[^a-zA-Z][^a-zA-Z\s]+");

        if(rel.length==0 ||regexp2.test(document.forms["application"]["rel"].value)){

            document.getElementById("rel").style.borderColor="red";
        }
        else {

            document.getElementById("rel").style.borderColor="green";
        }

    }
    function Validate13() {

        var cell=document.forms["application"]["cell"].value;
        var regexp2=new RegExp("[^0-9]");

        if(cell.length==0 ||regexp2.test(document.forms["application"]["cell"].value)){

            document.getElementById("cell").style.borderColor="red";
        }
        else {

            document.getElementById("cell").style.borderColor="green";
        }

    }
    function Validate14() {

        var add=document.forms["application"]["add"].value;


        if(add.length==0){

            document.getElementById("add").style.borderColor="red";
        }
        else {

            document.getElementById("add").style.borderColor="green";
        }

    }
    function Validate15() {

        var cn=document.forms["application"]["cn"].value;


        if(cn.length==0){

            document.getElementById("cn").style.borderColor="red";
        }
        else {

            document.getElementById("cn").style.borderColor="green";
        }

    }


</script>


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
                <form action="ApplicationProcessing.php" role="form" method="post" enctype="multipart/form-data" name="application" id="application" onsubmit="return Validate()">
                    <div class="form-horizontal">
                        <label style="padding-right: 95pt;padding-left: 5px">Name</label>

                        <input class="form-control inline" type="text" name="name" style="width: 250px" id="name" placeholder="Enter only 20 Alphabets" onmousemove=" return  Validate()">
                        <p id="name_error"  style="color: red "></p>



                    </div>

                    <br>
                    <div class="form-inline">
                        <label style="padding-left: 5px">Father/Guardian's Name</label>
                        <input class="form-control" type="text" name="fname" style="width: 250px" id="fname" placeholder="Enter only 20 Alphabets" onmousemove=" return  Validate1()">
                        <p id="fname_error"  style="color: red "></p>
                        <label style="padding-left: 5px">Father CNIC</label>
                        <input  class="form-control" type="text" id="cn" onmousemove="return Validate15()">


                    </div>
                    <div class="for">

                    </div>
                    <br>
                    <div class="form-inline">
                        <div class="form-group">
                            <label>Registration ID</label>
                            <select name="degree" class="degree form-control">
                                <option>DDP</option>
                                <option>SDP</option>
                            </select>
                        </div>
                        <span class="textcolor">-</span>
                        <div class="form-group">
                            <select name="year" id="year" class="form-control">
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
                        </div>
                        <span class="textcolor">-</span>
                        <div class="form-group">
                            <select id="program" class="form-control" name="program">
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
                        </div>
                        <input class="form-control" type="text" name="studentid" id="id" style="width: 100px" onmousemove="Validate2()">

                    </div>
                    <br>
                    <div class="form-inline">
                        <label style="padding-left: 5px">Postal Address</label>
                        <input class="form-control" type="text" name="address" id="add" style="width: 550px" onmousemove="Validate14()">
                    </div>
                    <br>
                    <div class="form-inline">
                        <label style="padding-left: 5px">Tel No.</label>
                        <input class="form-control" type="text" name="telephoneNumber" style="width: 200px" id="tele" onmousemove="return Validate4()">
                        <label >Mobile No.</label>
                        <input class="form-control" type="text" name="mobileNumber" id="phone" style="width: 200px" onmousemove="return Validate5()">
                    </div>
                    <br>
                    <div class="form-inline">
                        <label style="padding-left: 5px">Email</label>
                        <input class="form-control" type="text"  style="width: 200px" id="mail" onmousemove="return Validate3()">
                    </div>
                    <br>
                    <div class="form-inline">
                        <label style="padding-left: 5px">Domicile</label>
                        <input class="form-control" type="text" name="domicile" id="dom" style="width: 150px" onmousemove="return Validate6()">
                        <label >Blood Group</label>
                        <input class="form-control" type="text" id="blood" name="bloodGroup" style="width: 100px" onmousemove="return Validate8()">
                        <label >Religion</label>
                        <input class="form-control" type="text" id="reg" name="religion" style="width: 100px" onmousemove="return Validate7()">
                    </div>
                    <br>
                    <div class="form-inline">
                        <label style="padding-left: 5px">Parent/Guardian's Occupation</label>
                        <input class="form-control" type="text" name="occupation" style="width: 200px" id="occ" onmousemove="return Validate9();" >
                        <label >Monthly income (Rs.)</label>
                        <input class="form-control" type="text" name="income" id="inc" style="width: 150px" onmousemove="return Validate10();">
                    </div>
                    <br>
                    <div class="form-inline">
                        <label style="padding-left: 5px">Name of person to be entaded on care of Emergency</label>
                        <input class="form-control" type="text" name="emergency" id="emg" style="width: 250px" onmousemove="return Validate11();">
                    </div>
                    <br>
                    <div class="form-inline">
                        <label style="padding-left: 5px">Relationship</label>
                        <input class="form-control" type="text" name="relation" style="width: 150px" id="rel" onmousemove="return Validate12();">
                        <label >Cell No.</label>
                        <input class="form-control" type="text" name="cell" id="cell" style="width: 150px" onmousemove="return Validate13();">
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
                    <input type="submit" class="btn btn-success" value="submit" name="submit1">
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