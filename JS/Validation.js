 function validateForm() {
        var name_error = document.getElementById("name_error");
        var studentName = document.forms["studentForm"]["studentName"].value;

        var fatherName = document.forms["studentForm"]["fatherName"].value;
        var f_error = document.getElementById("f_error");

        var Reg = document.forms["studentForm"]["Regid"].value;
        var reg_error = document.getElementById("reg_error");

        var room = document.forms["studentForm"]["room"].value;
        var room_error = document.getElementById("room_error");

        var program = document.forms["studentForm"]["program"].value;
        var program_error = document.getElementById("program_error");

        var cgpa = document.forms["studentForm"]["cgpa"].value;
        var cgpa_error = document.getElementById("cgpa_error");

        var contact = document.forms["studentForm"]["contact"].value;
        var contact_error = document.getElementById("contact_error");

        var phone = document.forms["studentForm"]["phone"].value;
        var phone_error = document.getElementById("phone_error");

        var address = document.forms["studentForm"]["address"].value;
        var address_error = document.getElementById("address_error");

        var hostel = document.forms["studentForm"]["hostel"].value;
        var hostel_error = document.getElementById("hostel_error");

        if(studentName == "" || fatherName=="" || Reg=="" || room=="" || program==""|| cgpa=="" ||contact=="" || phone=="" || address=="" || hostel==""){
            if(fatherName== ""){
                f_error.textContent = "Father Name is required ";
            }
            if(studentName == "") {
                name_error.textContent = "Username is required ";
            }
            if(Reg==""){
                reg_error.textContent = "Registration is required ";
            }
            if(room==""){
                room_error.textContent = "Room Number is required ";
            }
            if (program==""){
                program_error.textContent="Program is required"
            }
            if (cgpa==""){
                cgpa_error.textContent="CGPA is required"
            }
            if (contact==""){
                contact_error.textContent="Contact is required"
            }
            if (phone==""){
                phone_error.textContent="Phone is required"
            }
            if (address==""){
                address_error.textContent="Address is required"
            }
            if (hostel==""){
                hostel_error.textContent="Select hostel name"
            }
            return false;
        }
        return true;
    }
