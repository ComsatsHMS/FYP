<?php
include("../connection.php");

if(isset($_POST['submit'])){
echo "inside isset";
    $room_num = $_POST['num'];
    $hostel_Name = NULL;
    $application_no =$_POST['id'] ;

    if(isset($_POST['hostels'])){
        switch ($_POST['hostels']){
            case 'M.A Jinnah':
                $hostel_Name=$_POST['hostels'];
                break;
            case 'Liaquat Hall':
                $hostel_Name=$_POST['hostels'];
                break;
            case 'Jupitar Hall':
                $hostel_Name=$_POST['hostels'];
                break;
            case 'Johar Hall':
                $hostel_Name=$_POST['hostels'];
                break;
        }
    }
    $insert="insert into hostel VALUES ('','$hostel_Name','$application_no','$room_num')";
    $transport = mysqli_query($connection,$insert);
    header('Location: Allotment.php');
}

function getStudentApplications(){
    global $connection;
    $get_record = "select * from oldstudentform";
    $run = mysqli_query($connection, $get_record);

    while ($each_record = mysqli_fetch_array($run)) {
        $application_no = $each_record['applicationNumber'];
        $student_name = $each_record['name'];
        $student_f_name = $each_record['fathername'];
        $student_preffered_hostel = $each_record['hostel'];
        $status = $each_record['status'];

        echo "<tr><td><a href='StudentDetails.php?id=$application_no'>$application_no</a></td>
                  <td><a href='StudentDetails.php?id=$application_no'>$student_name</a></td>
                  <td>$student_f_name</td>
                  <td>$student_preffered_hostel</td>

             ";
        if($status == 1){
            echo "<td><button type='button'  class='btn btn-default'   disabled>check</button></td></tr>";
        }
        else{
            echo "<td><button type='button' class='btn btn-default' ><a href='Check.php?id=$application_no'>check</a></button></td></tr>";
        }
    }
}

function getStudentDetails($applicationNo){
    global $connection;
    $get_record = "select * from oldstudentform WHERE applicationNumber = '$applicationNo'";
    $run = mysqli_query($connection, $get_record);
    while ($each_record = mysqli_fetch_array($run)){
        $application_no = $each_record['applicationNumber'];
        $student_name = $each_record['name'];
        $student_f_name = $each_record['fathername'];
        $student_id = $each_record['studentid'];
        $address = $each_record['address'];
        $cnic = $each_record['cnic'];
        $student_preffered_hostel = $each_record['hostel'];
        $photo = $each_record['photo'];
        $status= $each_record['status'];
        $student_mob = $each_record['mobileNo'];
        $student_preffered_hostel = $each_record['hostel'];
        $qaurdian = $each_record['emergencyName'];
        $gaurdian_No =$each_record['cellNo'];
        $guardian_relation = $each_record['relation'];
        echo "
            <tr><td><img src='../IMAGES/$photo' height='150px' width='100px' ></td><td></td></tr>
            <tr><td>Student Name</td><td>$student_name</td></tr>
            <tr><td>Father Name</td><td>$student_f_name</td></tr>
            <tr><td>Student Id</td><td>$student_id</td></tr>
            <tr><td>Address</td><td>$address</td></tr>
            <tr><td>CNIC</td><td>$cnic</td></tr>
            <tr><td>Mobile No.</td><td>$student_mob</td></tr>
            <tr><td>Preffered Hostel</td><td>$student_preffered_hostel</td></tr>
            <tr><td>Guardian in case of Emergency</td><td>$qaurdian</td></tr>
            <tr><td>Relation</td><td>$guardian_relation</td></tr>
            <tr><td>Contact No.</td><td>$gaurdian_No</td></tr>
            <tr>
        ";
        if($status != 1)
            echo "<td></td><td><button type='button' class='btn btn-default' ><a href='Check.php?id=$application_no'>check</a></button></td></tr>";
        else{
            echo "<td></td><td><button type='button' class='btn btn-default' disabled>check</button></td></tr>";
        }
    }

}
function getSelectedStudents(){
    global $connection;
    $get_record = "select * from oldstudentform";
    $run = mysqli_query($connection, $get_record);

    while ($each_record = mysqli_fetch_array($run)) {
        if($each_record['selected'] == true){
            $application_no = $each_record['applicationNumber'];
            $student_name = $each_record['name'];
            $student_f_name = $each_record['fathername'];
            $student_id = $each_record['studentid'];
            $student_preffered_hostel = $each_record['hostel'];

            echo "<tr><td>$application_no</td>
                  <td>$student_name</td>
                  <td>$student_f_name</td>
                  <td>$student_id</td>
                  <td>$student_preffered_hostel</td>
                  <td><button type='button' class='btn btn-default' ><a href='Allocate.php?id=$application_no'>Allot</a></button> </td>
                  </tr>";
        }
    }

}
function checkRecord($applicationNo){
    global $connection;
    $get_record = "select * from oldstudentform WHERE applicationNumber = '$applicationNo'";
    $run = mysqli_query($connection, $get_record);
    while ($each_record = mysqli_fetch_array($run)){
        $application_no = $each_record['applicationNumber'];
        $student_name = $each_record['name'];
        $father_name = $each_record['fathername'];
        $student_id = $each_record['studentid'];
        $semester_Fee_Slip = $each_record['feephoto'];
        $student_cell = $each_record['mobileNo'];
        $affidivat = $each_record['affidivat'];
        if($each_record['newstudent'] == true ){
            echo"
            <tr><td>Student Name</td><td>$student_name</td></tr>
            <tr><td>Father Name</td><td>$father_name</td></tr>
            <tr><td>Student Mobile No.</td><td>$student_cell</td></tr>
            <tr><td>First semester fee slip</td><td><img src='../IMAGES/$semester_Fee_Slip' width='100' height='150'></td></tr>
            <tr><td>Affidivat</td><td><img src='../IMAGES/$affidivat' width='100' height='150'></td></tr>
             ";
            echo "<tr><td><button type='button'  class=\"btn btn-default\" ><a href='ApplicationProcessing.php?id=$application_no&state=1'>Select</a></button>
              <button type='button'  class=\"btn btn-danger\" ><a href='ApplicationProcessing.php?id=$application_no&state=0'>Not Select</a></button></td></tr>";

        }
        elseif($each_record['oldstudent'] == false){
            echo"
            <tr><td>Student Name</td><td>$student_name</td></tr>
            <tr><td>Father Name</td><td>$father_name</td></tr>
            <tr><td>Student Id</td><td>$student_id</td></tr>
            <tr><td>Student Mobile No.</td><td>$student_cell</td></tr>
            <tr><td>Semester fee slip</td><td><img src='../IMAGES/$semester_Fee_Slip' width='100' height='150'></td></tr>
            ";
            echo "<tr><td><button type='button'  class=\"btn btn-default\" ><a href='ApplicationProcessing.php?id=$application_no&state=1'>Select</a></button>
              <button type='button'  class=\"btn btn-danger\" ><a href='ApplicationProcessing.php?id=$application_no&state=0'>Not Select</a></button></td></tr>";


        }
        elseif($each_record['oldstudent'] == 1){
            global $connection;
            $get_record = "select * from studentrecord WHERE studentId = '$student_id'";
            $run = mysqli_query($connection, $get_record);
            while ($each_record = mysqli_fetch_array($run)){
                $mess_bill = $each_record['messbill'];
                $defaulter = $each_record['defaulter'];
                $remarks = $each_record['remarks'];
                echo"
                    <tr><td>Student Name</td><td>$student_name</td></tr>
                    <tr><td>Father Name</td><td>$father_name</td></tr>
                    <tr><td>Student Id</td><td>$student_id</td></tr>
                    <tr><td>Student Mobile No.</td><td>$student_cell</td></tr>
                    <tr><td>Remaining Mess Bill</td><td>$mess_bill</td></tr>
                    <tr><td>Defaulter</td><td>$defaulter</td></tr>
                    <tr><td>Remarks</td><td>$remarks</td></tr>
                    <tr><td>Semester fee slip</td><td><img src='../IMAGES/$semester_Fee_Slip' width='100' height='150'></td></tr>
            ";
                echo "<tr><td><button type='button' class=\"btn btn-default\" ><a href='ApplicationProcessing.php?id=$application_no&state=1'>Select</a></button>
              <button type='button'  class=\"btn btn-danger\" ><a href='ApplicationProcessing.php?id=$application_no&state=0'>Not Select</a></button></td></tr>";

            }

        }
    }
}

function getSelectedStudentsList(){
    global $connection;
    $get_record = "select * from oldstudentform";
    $run = mysqli_query($connection, $get_record);

    while ($each_record = mysqli_fetch_array($run)) {
        $rec = "select * from hostel";
        $exec = mysqli_query($connection, $rec);
        while ($each_rec = mysqli_fetch_array($exec)) {
            if($each_record['applicationNumber'] == $each_rec['applicationNumber']){
                $application_no = $each_record['applicationNumber'];
                $student_name = $each_record['name'];
                $student_f_name = $each_record['fathername'];
                $student_id = $each_record['studentid'];
                $student_hostel = $each_rec['HostelName'];
                $student_room = $each_rec['roomNumber'];

                echo "<tr>
                  <td>$student_name</td>
                  <td>$student_f_name</td>
                  <td>$student_id</td>
                  <td>$student_hostel</td>
                  <td>$student_room</td>
                  <td><button type='button' class='btn btn-default' ><a href='StudentCompleteDetails.php?id=$student_id'>Details</a></button> </td>
                  </tr>";
            }

        }
    }

}
function getNotSelectedStudentsList(){
    global $connection;
    $get_record = "select * from oldstudentform where selected = 0";
    $run = mysqli_query($connection, $get_record);

    while ($each_record = mysqli_fetch_array($run)) {
                $application_no = $each_record['applicationNumber'];
                $student_name = $each_record['name'];
                $student_f_name = $each_record['fathername'];
                $student_id = $each_record['studentid'];
                echo "<tr>
                  <td>$student_name</td>
                  <td>$student_f_name</td>
                  <td>$student_id</td>
                  <td><button type='button' class='btn btn-default' ><a href='StudentCompleteDetails.php?id=$student_id'>Details</a></button> </td>
                  </tr>";
            }

}
function studentSearchByName($temp){
    global $connection;
    $get_record = "select * from oldstudentform WHERE name = '$temp'";
    $run = mysqli_query($connection, $get_record);

    while ($each_record = mysqli_fetch_array($run)) {
        $t_no =$each_record['applicationNumber'];
        $rec = "select * from hostel where applicationNumber = '$t_no'";
        $exec = mysqli_query($connection, $rec);
        while ($each_rec = mysqli_fetch_array($exec)) {
            if($each_record['applicationNumber'] == $each_rec['applicationNumber']){
                $student_name = $each_record['name'];
                $student_f_name = $each_record['fathername'];
                $student_id = $each_record['studentid'];
                $student_hostel = $each_rec['HostelName'];
                $student_room = $each_rec['roomNumber'];

                echo "<tr>
                  <td>$student_name</td>
                  <td>$student_f_name</td>
                  <td>$student_id</td>
                  <td>$student_hostel</td>
                  <td>$student_room</td>
                  <td><button type='button' class='btn btn-default' ><a href='StudentCompleteDetails.php?id=$student_id'>Details</a></button> </td>
                  </tr>";
            }

        }
    }
}

function studentSearchByHostel($temp){
    global $connection;
    $get_record = "select * from oldstudentform f,hostel h where f.applicationNumber = h.applicationNumber AND h.HostelName = '$temp'" ;
    $run = mysqli_query($connection, $get_record);

    while ($each_record = mysqli_fetch_array($run)) {
                $student_name = $each_record['name'];
                $student_f_name = $each_record['fathername'];
                $student_id = $each_record['studentid'];
                $student_hostel = $each_record['HostelName'];
                $student_room = $each_record['roomNumber'];

                echo "<tr>
                  <td>$student_name</td>
                  <td>$student_f_name</td>
                  <td>$student_id</td>
                  <td>$student_hostel</td>
                  <td>$student_room</td>
                  <td><button type='button' class='btn btn-default' ><a href='StudentCompleteDetails.php?id=$student_id'>Details</a></button> </td>
                  </tr>";
    }

}
function getStudentCompleteDetails($applicationNo){
    global $connection;
    $get_record = "select * from oldstudentform WHERE studentid = '$applicationNo'";
    $run = mysqli_query($connection, $get_record);
    while ($each_record = mysqli_fetch_array($run)){
        $student_name = $each_record['name'];
        $student_f_name = $each_record['fathername'];
        $student_id = $each_record['studentid'];
        $address = $each_record['address'];
        $cnic = $each_record['cnic'];
        $f_cnic = $each_record['fcnic'];
        $program =$each_record['program'];
        $photo = $each_record['photo'];
        $student_home_no =$each_record['telephoneNumber'];
        $student_mob = $each_record['mobileNo'];
        $student_email = $each_record['email'];
        $student_domicile = $each_record['domicile'];
        $student_bloodgroup =$each_record['bloodgroup'];
        $religion =$each_record['religion'];
        $father_occupation=$each_record['occupation'];
        $father_income =$each_record['income'];
        $qaurdian = $each_record['emergencyName'];
        $gaurdian_No =$each_record['cellNo'];
        $guardian_relation = $each_record['relation'];
        $appNo = $each_record['applicationNumber'];
        $hostel_name = NULL ;
        $room_no = NULL;
        $challan_copy =array();

        $query ="select * from hostel WHERE applicationNumber = '$appNo'";
        $exec = mysqli_query($connection, $query);
        while ($record = mysqli_fetch_array($exec)){
            $hostel_name = $record['HostelName'];
            $room_no = $record['roomNumber'];
        }

        $query1 ="select * from studentmesschallanrecord WHERE student_id = '$student_id' AND status=true";
        $exec1 = mysqli_query($connection, $query1);
        while ($record = mysqli_fetch_array($exec1)){
            $challan_copy[] = $record['challan_copy'];
        }


        echo "
            <tr><td><img src='../IMAGES/$photo' height='150px' width='100px' ></td><td></td></tr>
            <tr><td>Student Name</td><td>$student_name</td></tr>
            <tr><td>Father Name</td><td>$student_f_name</td></tr>
            <tr><td>Student Id</td><td>$student_id</td></tr>
            <tr><td>Hostel Name</td><td>$hostel_name</td></tr>
            <tr><td>Room No.</td><td>$room_no</td></tr>
            <tr><td>Address</td><td>$address</td></tr>
            <tr><td>CNIC</td><td>$cnic</td></tr>
            <tr><td>Father CNIC</td><td>$f_cnic</td></tr>
            <tr><td>Program</td><td>$program</td></tr>
            <tr><td>Telephone No.</td><td>$student_home_no</td></tr>
            <tr><td>Mobile No.</td><td>$student_mob</td></tr>
            <tr><td>Email</td><td>$student_email</td></tr>
            <tr><td>Blood Group</td><td>$student_bloodgroup</td></tr>
            <tr><td>Domicile</td><td>$student_domicile</td></tr>
            <tr><td>Religion</td><td>$religion</td></tr>
            <tr><td>Father Occupation</td><td>$father_occupation</td></tr>
            <tr><td>Father Income</td><td>$father_income</td></tr>
            <tr><td>Guardian in case of Emergency</td><td>$qaurdian</td></tr>
            <tr><td>Relation</td><td>$guardian_relation</td></tr>
            <tr><td>Contact No.</td><td>$gaurdian_No</td></tr>
  
        ";
        foreach ($challan_copy as $challan){
            echo "<tr><td>Mess Fee Slip</td><td><img src='../IMAGES/$challan' height='150px' width='100px' ></td></tr>";
        }
    }
}

//mess fee and fines
function getFeePaidStudentsList(){
    global $connection;
    $get_record = "select m.challanNo,m.student_id,m.submit_date,s.name,s.fathername from studentmesschallanrecord m,oldstudentform s where m.status =true AND m.student_id =s.studentid" ;
    $run = mysqli_query($connection, $get_record);

    while ($each_record = mysqli_fetch_array($run)) {
        $challan_no = $each_record['challanNo'];
        $student_name = $each_record['name'];
        $student_f_name = $each_record['fathername'];
        $student_id = $each_record['studentid'];
        $submit_date = $each_record['submit_date'];

        echo "<tr>
                  <td>$challan_no</td>
                  <td>$student_name</td>
                  <td>$student_f_name</td>
                  <td>$student_id</td>
                  <td>$submit_date</td>
                  <td><button type='button' class='btn btn-default' ><a href='StudentCompleteDetails.php?id=$student_id'>Details</a></button> </td>
                  </tr>";
    }

}

function getFeeUnPaidStudentsList(){
    global $connection;
    $get_record = "select m.challanNo,m.student_id,s.name,s.fathername from studentmesschallanrecord m,oldstudentform s where m.status =false AND m.student_id =s.studentid" ;
    $run = mysqli_query($connection, $get_record);

    while ($each_record = mysqli_fetch_array($run)) {
        $challan_no = $each_record['challanNo'];
        $student_name = $each_record['name'];
        $student_f_name = $each_record['fathername'];
        $student_id = $each_record['student_id'];

        echo "<tr>
                  <td>$challan_no</td>
                  <td>$student_name</td>
                  <td>$student_f_name</td>
                  <td>$student_id</td>
                  <td><button type='button' class='btn btn-default' ><a href='../MessChallan.php?id=$student_id'>Mess Challan</a></button> </td>
                  <td><button type='button' class='btn btn-default' ><a href='StudentCompleteDetails.php?id=$student_id'>Details</a></button> </td>
                  </tr>";
    }

}
?>