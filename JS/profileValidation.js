
function validateCgpa() {
    var cgpa = document.forms["studentForm"]["cgpa"].value;
    var regexp1 = new RegExp("[0-4]+[^.]+[^0-9]");
    if (regexp1.test(document.forms["studentForm"]["cgpa"].value) || cgpa.length == 0) {
        if (cgpa.length == 0) {
            document.getElementById("cgpa_error").innerHTML = "Please fill out this field";
            document.getElementById("cgpa").style.borderColor = "red";
            return false;
        }
        if (regexp1.test(document.forms["studentForm"]["cgpa"].value)) {
            document.getElementById("cgpa_error").innerHTML = "Not correct format";
            document.getElementById("cgpa").style.borderColor = "red";
            return false;
        }
    }
    else{
        document.getElementById("cgpa").style.borderColor = "green";
        document.getElementById("cgpa_error").innerHTML = "";
    }
}
function validateEcontact() {

    var Econtact = document.forms["studentForm"]["Econtact"].value;
    var regexp2 = new RegExp("[^0-9]");
    if (regexp2.test(document.forms["studentForm"]["Econtact"].value) || Econtact.length == 0 || Econtact.length != 11) {
        if (Econtact.length == 0) {
            document.getElementById("contact_error").innerHTML = "Please fill out this field";
            document.getElementById("Econtact").style.borderColor = "red";
            return false;
        }
        if (regexp2.test(document.forms["studentForm"]["Econtact"].value)) {
            document.getElementById("contact_error").innerHTML = "Only Integers are Allowed";
            document.getElementById("Econtact").style.borderColor = "red";
            return false;
        }
        if (Econtact.length != 11) {
            document.getElementById("contact_error").innerHTML = "Length is not correct";
            document.getElementById("Econtact").style.borderColor = "red";
            return false;
        }
    }
    else{
        document.getElementById("Econtact").style.borderColor = "green";
        document.getElementById("contact_error").innerHTML = "";
    }
}
function validatePcontact() {

    var phoneno = document.forms["studentForm"]["phoneno"].value;
    var regexp3 = new RegExp("[^0-9]");
    if (regexp3.test(document.forms["studentForm"]["phoneno"].value) || phoneno.length == 0 || phoneno.length != 11) {
        if (phoneno.length == 0) {
            document.getElementById("phone_error").innerHTML = "Please fill out this field";
            document.getElementById("phoneno").style.borderColor = "red";
            return false;
        }
        if (regexp3.test(document.forms["studentForm"]["phoneno"].value)) {
            document.getElementById("phone_error").innerHTML = "Only Integers are Allowed";
            document.getElementById("phoneno").style.borderColor = "red";
            return false;
        }
        if (phoneno.length != 11) {
            document.getElementById("phone_error").innerHTML = "Length is not correct";
            document.getElementById("phoneno").style.borderColor = "red";
            return false;
        }
    }
    else{
        document.getElementById("phoneno").style.borderColor = "green";
        document.getElementById("phone_error").innerHTML = "";
    }
}
function validateAddress() {

    var address = document.forms["studentForm"]["address"].value;
    if (address.length == 0) {
        if (address.length == 0) {
            document.getElementById("address_error").innerHTML = "Please fill out this field";
            document.getElementById("address").style.borderColor = "red";
            return false;
        }
    }
    else{
        document.getElementById("address").style.borderColor = "green";
        document.getElementById("address_error").innerHTML = "";
    }
}