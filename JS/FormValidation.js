
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
            document.getElementById("name_error").innerHTML = "Only Alphabats are Allowed";
            document.getElementById("name").style.borderColor = "red";
            return false;
        }
        if (name.length > 20) {
            document.getElementById("name").style.borderColor = "red";
            document.getElementById("name_error").innerHTML = "20 Alphabets are Allowed";
            return false;
        }
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
            document.getElementById("fname_error").innerHTML = "Only Alphabats are Allowed";
            document.getElementById("fname").style.borderColor = "red";
            return false;
        }
        if (name.length > 20) {
            document.getElementById("name").style.borderColor = "red";
            document.getElementById("name_error").innerHTML = "20 Alphabets are Allowed";
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
    if(id.length==0){
        document.getElementById("id_error").innerHTML = "Please fill out this field";
        document.getElementById("id").style.borderColor="red";
        return false;
    }
    if(regexp2.test(document.forms["application"]["id"].value) ){
        document.getElementById("id_error").innerHTML = "Student ID is only integer";
        document.getElementById("id").style.borderColor="red";
        return false;
    }
    if(id.length>3){
        document.getElementById("id_error").innerHTML = "Student ID cannot be greater than 3";
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
            document.getElementById("mail_error").innerHTML = "Invalid Email";
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
    var regexp2=new RegExp("[^A-B|O+]{+|-}$");

    if(blood.length==0){
        document.getElementById("blood_e").innerHTML = "Please fill out this field";
        document.getElementById("blood").style.borderColor="red";
        return flase;
    }
    if(regexp2.test(document.forms["application"]["blood"].value)){
        document.getElementById("blood_e").innerHTML = "Numerics are not allowed";
        document.getElementById("blood").style.borderColor="red";
        return false;
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
    var regexp2=new RegExp("^[0-9+]{13}$");
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
