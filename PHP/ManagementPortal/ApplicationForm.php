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

        var regexp1=new RegExp("[^|^a-z|^A-Z\w+( +\w+)*$]");


        if(regexp1.test(document.forms["application"]["name"].value) || name.length==0 || name.length>20 ) {
            if (name.length==0) {

               document.getElementById("name_error").innerHTML = "Please fill out this field";

                document.getElementById("name").style.borderColor = "red";
                return false;
            }
            if (regexp1.test(document.forms["application"]["name"].value)) {


                document.getElementById("name_error").innerHTML = "Only Alphabats are allowed";
                document.getElementById("name").style.borderColor = "red";
                return false;
            }

//            if (name.length > 20) {
//
//                document.getElementById("name").style.borderColor = "red";
//                return false;
//            }
        }

        else{
            document.getElementById("name_error").innerHTML= '<span style="color:green;font-size:20px;" class="glyphicon glyphicon-ok-sign "></span>';



            document.getElementById("name").style.borderColor = "green";
            return true;
        }
    }
    function Validate1(){

        var fname=document.forms["application"]["fname"].value;

        var regexp1=new RegExp("[^|^a-z|^A-Z\w+( +\w+)*$]");


        if(regexp1.test(document.forms["application"]["fname"].value) || fname.length==0 || fname.length>20 ) {
            if (fname.length==0) {

                document.getElementById("fname_error").innerHTML = "Please fill out this field";

                document.getElementById("fname").style.borderColor = "red";
                return false;
            }
            if (regexp1.test(document.forms["application"]["fname"].value)) {


                document.getElementById("fname_error").innerHTML = "Only Alphabats are allowed";
                document.getElementById("fname").style.borderColor = "red";
                return false;
            }


        }

        else{

            document.getElementById("fname_error").innerHTML= '<span style="color:green;font-size:20px;" class="glyphicon glyphicon-ok-sign "></span>';

            document.getElementById("fname").style.borderColor = "green";
            return true;
        }
    }
    function Validate2() {
        var id=document.forms["application"]["id"].value;


        var regexp2=new RegExp("[^0-9]");

       // if(regexp2.test(document.forms["application"]["cnic"].value)  ){
        if(id.length==0 || regexp2.test(document.forms["application"]["id"].value) || id.length>3 ){
            document.getElementById("id_error").innerHTML = "Please fill out this field";

            document.getElementById("id").style.borderColor="red";



            return false;
          }


        else {

            document.getElementById("id_error").innerHTML= '<span style="color:green;font-size:20px;" class="glyphicon glyphicon-ok-sign "></span>';
            document.getElementById("id").style.borderColor = "green";
            return true;
        }
    }
   function Validate3() {

      var mail=document.forms["application"]["mail"].value;

       var regexp3=new RegExp("[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$")

       if(mail.length==0 || (!regexp3.test(document.forms["application"]["mail"].value)) ){
           if(mail.length==0){
               document.getElementById("mail_error").innerHTML = "Please fill out this field";
            document.getElementById("mail").style.borderColor="red";
           }
           if(!regexp3.test(document.forms["application"]["mail"].value)){

               document.getElementById("mail_error").innerHTML = "Invlaid Email";
               document.getElementById("mail").style.borderColor="red";
           }
        }
       else {
           document.getElementById("mail_error").innerHTML= '<span style="color:green;font-size:20px;" class="glyphicon glyphicon-ok-sign "></span>';
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
            if(phone.length==0){
                document.getElementById("m_error").innerHTML = "Please fill out this field";
                document.getElementById("phone").style.borderColor="red";
            }
            if(regexp2.test(document.forms["application"]["phone"].value)){
                document.getElementById("m_error").innerHTML = "Alphabats are not allowed";
                document.getElementById("phone").style.borderColor="red";
            }
        }
        else if(phone.length==11) {
            document.getElementById("m_error").innerHTML= '<span style="color:green;font-size:20px;" class="glyphicon glyphicon-ok-sign "></span>';
            document.getElementById("phone").style.borderColor="green";
        }
        else{
            document.getElementById("m_error").innerHTML = "length is not correct";
            document.getElementById("phone").style.borderColor="red";
        }

    }
    function Validate6() {

        var dom=document.forms["application"]["dom"].value;
        var regexp2=new RegExp("[^A-Z|a-z]");

        if(dom.length==0 ||regexp2.test(document.forms["application"]["dom"].value)){
            if(dom.length==0){
                document.getElementById("dom_e").innerHTML = "Please fill out this field";
                document.getElementById("dom").style.borderColor="red";
            }
            if(regexp2.test(document.forms["application"]["dom"].value)){
                document.getElementById("dom_e").innerHTML = "Numerics are not allowed";
                document.getElementById("dom").style.borderColor="red";
            }
        }

        else{
            document.getElementById("dom_e").innerHTML= '<span style="color:green;font-size:20px;" class="glyphicon glyphicon-ok-sign "></span>';
            document.getElementById("dom").style.borderColor="green";
        }

    }
    function Validate7() {

        var regi=document.forms["application"]["regi"].value;
        var regexp2=new RegExp("[^A-Z|a-z]");

        if(regi.length==0 || regexp2.test(document.forms["application"]["regi"].value)){
            if(regi.length==0 ){
                document.getElementById("regi_e").innerHTML = "Please fill out this field";
                document.getElementById("regi").style.borderColor="red";
            }
            if(regexp2.test(document.forms["application"]["regi"].value) ){
                document.getElementById("regi_e").innerHTML = "Numerics are not allowed";
                document.getElementById("regi").style.borderColor="red";
            }
        }
        else {
            document.getElementById("regi_e").innerHTML= '<span style="color:green;font-size:20px;" class="glyphicon glyphicon-ok-sign "></span>';
            document.getElementById("regi").style.borderColor="green";
        }

    }
    function Validate8() {

        var blood=document.forms["application"]["blood"].value;
        var regexp2=new RegExp("[^A-Z|a-z|+|-]");

        if(blood.length==0 ||regexp2.test(document.forms["application"]["blood"].value)){
            if(blood.length==0){
                document.getElementById("blood_e").innerHTML = "Please fill out this field";
                document.getElementById("blood").style.borderColor="red";
            }
            if(regexp2.test(document.forms["application"]["blood"].value)){
                document.getElementById("blood_e").innerHTML = "Numerics are not allowed";
                document.getElementById("blood").style.borderColor="red";
            }
        }

        else{
            document.getElementById("blood_e").innerHTML= '<span style="color:green;font-size:20px;" class="glyphicon glyphicon-ok-sign "></span>';
            document.getElementById("blood").style.borderColor="green";
        }

    }
    function Validate9() {

        var occ=document.forms["application"]["occ"].value;
        var regexp2=new RegExp("[^A-Z|a-z]");

        if(occ.length==0 ||regexp2.test(document.forms["application"]["occ"].value)){

            if(occ.length==0){
                document.getElementById("occ_e").innerHTML = "Please fill out this field";
                document.getElementById("occ").style.borderColor="red";
            }
            if(regexp2.test(document.forms["application"]["occ"].value)){
                document.getElementById("occ_e").innerHTML = "Numeric are not allowed";
                document.getElementById("occ").style.borderColor="red";
            }
        }
        else {
            document.getElementById("occ_e").innerHTML= '<span style="color:green;font-size:20px;" class="glyphicon glyphicon-ok-sign "></span>';
            document.getElementById("occ").style.borderColor="green";
        }

    }
    function Validate10() {

        var inc=document.forms["application"]["inc"].value;
        var regexp2=new RegExp("[^0-9]");

        if(inc.length==0 ||regexp2.test(document.forms["application"]["inc"].value)){
            if(inc.length==0){
                document.getElementById("inc_e").innerHTML = "Please fill out this field";
                document.getElementById("inc").style.borderColor="red";
            }

            if(regexp2.test(document.forms["application"]["inc"].value)){
                document.getElementById("inc_e").innerHTML = "Alphabets are not allowed";
                document.getElementById("inc").style.borderColor="red";
            }

            document.getElementById("inc").style.borderColor="red";
        }

        else {
            document.getElementById("inc_e").innerHTML= '<span style="color:green;font-size:20px;" class="glyphicon glyphicon-ok-sign "></span>';
            document.getElementById("inc").style.borderColor="green";
        }

    }
    function Validate11() {

        var emg=document.forms["application"]["emg"].value;
        var regexp2=new RegExp("[^a-zA-Z][^a-zA-Z\s]+");

            if(emg.length==0 ||regexp2.test(document.forms["application"]["emg"].value)){
                if(emg.length==0){
                    document.getElementById("emg_e").innerHTML = "Please fill out this field";
                document.getElementById("emg").style.borderColor="red";
                }
                if(regexp2.test(document.forms["application"]["emg"].value)){
                    document.getElementById("emg_e").innerHTML = "Invalid Name";
                    document.getElementById("emg").style.borderColor="red";
                }
            }
        else {

            document.getElementById("emg").style.borderColor="green";
                document.getElementById("emg_e").innerHTML= '<span style="color:green;font-size:20px;" class="glyphicon glyphicon-ok-sign "></span>';
        }

    }
    function Validate12() {

        var rel=document.forms["application"]["rel"].value;
        var regexp2=new RegExp("[^a-zA-Z][^a-zA-Z\s]+");

        if(rel.length==0 ||regexp2.test(document.forms["application"]["rel"].value)){

            if(rel.length==0){
                document.getElementById("rel_e").innerHTML = "Please fill out this field";
                document.getElementById("rel").style.borderColor="red";
            }
            if(regexp2.test(document.forms["application"]["rel"].value)){
                document.getElementById("rel_e").innerHTML = "Invalid Data";
                document.getElementById("rel").style.borderColor="red";
            }
        }
        else {

            document.getElementById("rel").style.borderColor="green";
        }

    }
    function Validate13() {

        var cell=document.forms["application"]["cell"].value;
        var regexp2=new RegExp("[^0-9]");

        if(cell.length==0 ||regexp2.test(document.forms["application"]["cell"].value)){
            if(cell.length==0){
                document.getElementById("cell_error").innerHTML = "Please fill out this field";
                document.getElementById("cell").style.borderColor="red";
            }
            if(regexp2.test(document.forms["application"]["cell"].value)){
                document.getElementById("cell_error").innerHTML = "Alphabats are not allowed";
                document.getElementById("cell").style.borderColor="red";
            }
        }
        else if(cell.length==11) {
            document.getElementById("cell_error").innerHTML= '<span style="color:green;font-size:20px;" class="glyphicon glyphicon-ok-sign "></span>';
            document.getElementById("cell").style.borderColor="green";
        }
        else{
            document.getElementById("cell_error").innerHTML = "length is not correct";
            document.getElementById("cell").style.borderColor="red";
        }

    }
    function Validate14() {

        var add=document.forms["application"]["add"].value;


        if(add.length==0){
            document.getElementById("add_e").innerHTML = "Please fill out this field";
            document.getElementById("add").style.borderColor="red";
        }
        else {
            document.getElementById("add_e").innerHTML= '<span style="color:green;font-size:20px;" class="glyphicon glyphicon-ok-sign "></span>';
            document.getElementById("add").style.borderColor="green";
        }

    }
    function Validate15() {

        var cn=document.forms["application"]["cn"].value;
        var regexp2=new RegExp("^[0-9+]{5}-[0-9+]{7}-[0-9]{1}$");


        if(cn.length==0 || !regexp2.test(document.forms["application"]["cn"].value)  ){
            if(cn.length==0){
            document.getElementById("cn_error").innerHTML = "Please fill out this field";
            document.getElementById("cn").style.borderColor="red";
            return false;
            }
            if(!regexp2.test(document.forms["application"]["cn"].value)){
                document.getElementById("cn_error").innerHTML = "Length is not Correct ";
                document.getElementById("cn").style.borderColor="red";
                return false;
            }
        }
        else {
            document.getElementById("cn_error").innerHTML= '<span style="color:green;font-size:20px;" class="glyphicon glyphicon-ok-sign "></span>';

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


                    <div class="row">
                        <div class="col-md-3">
                            <div class="col-md-offset-8">
                                    <h5><label>Name</label></h5>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="input-group">

                                <input class="form-control inline" type="text" name="name"  id="name" placeholder="Enter only 20 Alphabets" onmousemove=" return  Validate()">
                                <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                            </div>

                        </div>
                        <div class="col-md-4">
                            <span class="addon"><span id="name_error"  style="color: red "></span></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="col-md-offset-8">
                                <h5><label>Father Name</label></h5>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="input-group">

                                <input class="form-control" type="text" name="fname"  id="fname" placeholder="Enter only 20 Alphabets" onmousemove=" return  Validate1()">
                                <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                            </div>

                        </div>
                        <div class="col-md-4">
                            <p id="fname_error"  style="color: red "></p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-3">
                            <div class="col-md-offset-8">
                                <h5><label>Father CNIC</label></h5>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="input-group">

                                <input  class="form-control" type="text" id="cn" onmousemove="return Validate15()">
                                <span class="input-group-addon"><span class="glyphicon glyphicon-align-justify"></span></span>
                            </div>

                        </div>
                        <div class="col-md-4">
                            <p id="cn_error"  style="color: red "></p>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-md-3">
                            <div class="col-md-offset-8">
                                <h5><label>Email</label></h5>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="input-group">
                                <input class="form-control" type="text"   id="mail" onmousemove="return Validate3()">
                                <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></span>

                            </div>

                        </div>
                        <div class="col-md-4">
                            <p id="mail_error"  style="color: red "></p>
                        </div>

                    </div>


                    <div class="row">
                        <div class="col-md-3">
                            <div class="col-md-offset-8">
                                <h5><label>Mobile No.</label></h5>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="input-group">
                                <input class="form-control" type="text" name="mobileNumber" id="phone"  onmousemove="return Validate5()">
                                <span class="input-group-addon"><span class="glyphicon glyphicon-earphone"></span></span>

                            </div>

                        </div>
                        <div class="col-md-4">
                            <p id="m_error"  style="color: red "></p>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-md-3">
                            <div class="col-md-offset-8">
                                <h5><label>Student ID</label></h5>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-inline">
                                <div class="form-group">

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
                                    <select id="program" class="form-control" name="program" style="width: 80px">
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
                                <div class="form-group">
                                    <input class="form-control" type="text" name="studentid" id="id" style="width: 94px" onmousemove="Validate2()">


                                    </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <p id="id_error"  style="color: red "></p>

                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-3">
                            <div class="col-md-offset-7">
                                <h5><label>Postal Address</label></h5>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="input-group">

                                <input class="form-control" type="text" name="address" id="add"  onmousemove="Validate14()">
                                <span class="input-group-addon"><span class="glyphicon glyphicon-road"></span></span>

                            </div>

                        </div>
                        <div class="col-md-4">
                            <p id="add_e"  style="color: red "></p>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-md-3">
                            <div class="col-md-offset-8">
                                <h5><label>Domicile</label></h5>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="input-group">

                                <input class="form-control" type="text" name="domicile" id="dom"  onmousemove="return Validate6()">
                                <span class="input-group-addon"><span class="glyphicon glyphicon-globe"></span></span>
                            </div>

                        </div>
                        <div class="col-md-2">
                            <p id="dom_e"  style="color: red "></p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-3">
                            <div class="col-md-offset-7">
                                <h5><label>Blood Group</label></h5>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="input-group">

                                <input class="form-control" type="text" id="blood" name="bloodGroup"  onmousemove="return Validate8()">
                                <span class="input-group-addon"><span class="glyphicon glyphicon-tint"></span></span>
                            </div>

                        </div>
                        <div class="col-md-2">
                            <p id="blood_e" style="color: red " ></p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-3">
                            <div class="col-md-offset-8">
                                <h5><label>Regilion</label></h5>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="input-group">

                                <input class="form-control" type="text" id="regi" name="religion"  onmousemove="return Validate7()">
                                <span class="input-group-addon"><span class="glyphicon glyphicon-align-justify"></span></span>
                            </div>

                        </div>
                        <div class="col-md-2">
                            <p id="regi_e" style="color: red " ></p>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-3">
                            <div class="col-md-offset-5">
                                <h5><label>Parent Occupation</label></h5>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="input-group">

                                <input class="form-control" type="text" name="occupation"  id="occ" onmousemove="return Validate9();" >
                                <span class="input-group-addon"><span class="glyphicon glyphicon-align-justify"></span></span>
                            </div>

                        </div>
                        <div class="col-md-2">
                            <p id="occ_e" style="color: red " ></p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-3">
                            <div class="col-md-offset-5">
                                <h5><label>Monthly income(Rs.)</label></h5>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="input-group">

                                <input class="form-control" type="text" name="income" id="inc"  onmousemove="return Validate10();">
                                <span class="input-group-addon"><span class="glyphicon glyphicon-align-justify"></span></span>
                            </div>

                        </div>
                        <div class="col-md-2">
                            <p id="inc_e" style="color: red " ></p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-5">
                            <div class="col-md-offset-2">
                                <h5><label>Name of person to be contacted on case of Emergency</label></h5>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="input-group">

                                <input class="form-control" type="text" name="emergency" id="emg"  onmousemove="return Validate11();">
                                <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                            </div>

                        </div>
                        <div class="col-md-2">
                            <p id="emg_e" style="color: red " ></p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-2">
                            <div class="col-md-offset-6">
                                <h4><label>Relation</label></h4>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="input-group">
                                <input class="form-control" type="text" name="relation" style="width: 150px" id="rel" onmousemove="return Validate12();">
                                <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                            </div>

                        </div>
                        <div class="col-md-2">
                            <p id="rel_e" style="color: red " ></p>
                        </div>



                        <div class="col-md-1">
                            <div class="col-md-offset-1">
                                <h4><label>Mobile#</label></h4>
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="input-group">


                                <input class="form-control" type="text" name="cell" id="cell"  onmousemove="return Validate13();">
                                <span class="input-group-addon"><span class="glyphicon glyphicon-phone"></span></span>
                            </div>

                        </div>
                        <div class="col-md-2">
                            <p id="cell_error" style="color: red " ></p>
                        </div>
                    </div>

                    <br>

                    <div class="row">
                        <div class="col-md-3">
                            <div class="col-md-offset-2">
                                <h4><label>Preferred Hostel: </label></h4>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <br>
                            <br>
                            <label><input type="radio" name="hostel" value="M.A JINNAH"> M.A JINNAH</label>

                        </div>


                        <div class="col-md-2">
                            <br>
                            <br>
                            <label><input type="radio" name="hostel" value="Liquat Hall"> Liquat Hall</label>
                        </div>
                        <div class="col-md-2">
                            <br>
                            <br>
                            <label><input type="radio" name="hostel" value="Johar Hall"> Johar Hall</label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-3">
                            <div class="col-md-offset-2">
                                <h4><label> Old Resident</label></h4>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <br>
                            <br>
                            <label><input type="radio" name="old" value="1"> yes</label>


                        </div>
                        <div class="col-md-2">
                            <br>
                            <br>

                            <label><input type="radio" name="old" value="0"> No</label>

                        </div>



                    </div>

                    <div class="row">
                        <div class="col-md-3">
                            <div class="col-md-offset-2">
                                <h4><label>New Student </label></h4>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <br>
                            <br>
                            <label><input type="radio" name="new_student" value="1"> yes </label>


                        </div>
                        <div class="col-md-2">
                            <br>
                            <br>
                            <label><input type="radio" name="new_student" value="0"> No</label>

                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-3">
                            <div class="col-md-offset-2">
                                <h4><label>Required Documents </label></h4>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <br>
                            <br>
                            <div class="form-group">
                                <label>Picture</label>
                                <input  type="file" name="image">
                            </div>


                        </div>
                        <div class="col-md-2">
                            <br>
                            <br>
                            <div class="form-group">
                                <label>Semester fee slip</label>
                                <input  type="file" name="image1">
                            </div>

                        </div>

                        <div class="col-md-2">
                            <br>
                            <br>
                            <div class="form-group">
                                <label>CNIC</label>
                                <input  type="file" name="imageCNIC">
                            </div>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">

                        </div>
                        <div class="col-md-2">
                            <br>
                            <div class="form-group">
                                <label>Domicile Certificate</label>
                                <input  type="file" name="imageDomicile">
                            </div>



                        </div>
                        <div class="col-md-2">
                            <br>
                            <div class="form-group">
                                <label>Father/Guardian's CNIC </label>
                                <input  type="file" name="imageFG">
                            </div>


                        </div>


                    </div>

                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="col-md-offset-0">
                                <label><input type="checkbox" required>I certify that the aforementioned information given by me is correct. I understand that if any part of this information is found false/incorrect,my allotment will stand cancelled. I also undertake to strictly observe all rules & regulations of the hostel. I shall also comply with the direction and orders issued by the hostel authorities from time to time during the period of my stay in the hostel. I undertake further to pay all dues in time.</label>


                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="col-md-offset-11">
                                <input type="submit" class="btn btn-success" value="submit" name="submit1">

                            </div>
                        </div>
                    </div>

            </div>

        </div>




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