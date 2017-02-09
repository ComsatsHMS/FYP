<?php
include 'connection.php';

if(isset($_POST['submit'])){

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
    header('Location: allotment.php');
}

function getStudentApplications(){
    global $connection;
    $get_record = "select * from oldstudentform";
    $run = mysqli_query($connection, $get_record);

    while ($each_record = mysqli_fetch_array($run)) {
        $application_no = $each_record['applicationNumber'];
        $student_name = $each_record['name'];
        $student_f_name = $each_record['fathername'];
        $student_id = $each_record['studentid'];
        $student_preffered_hostel = $each_record['hostel'];
        $status = $each_record['status'];

        echo "<tr><td><a href='studentDetails.php?id=$application_no'>$application_no</a></td>
                  <td><a href='studentDetails.php?id=$application_no'>$student_name</a></td>
                  <td>$student_f_name</td>
                  <td><a href='studentDetails.php?id=$application_no'>$student_id</a></td>
                  <td>$student_preffered_hostel</td>

             ";
        if($status == 1){
            echo "<td><button type='button'  class='btn btn-default'   disabled>check</button></td></tr>";
        }
        else{
            echo "<td><button type='button' class='btn btn-default' ><a href='check.php?id=$application_no'>check</a></button></td></tr>";
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
        echo "
            <tr><td><img src='IMAGES/$photo' height='150px' width='100px' ></td><td></td></tr>
            <tr><td>Student Name</td><td>$student_name</td></tr>
            <tr><td>Father Name</td><td>$student_f_name</td></tr>
            <tr><td>Student Id</td><td>$student_id</td></tr>
            <tr><td>Address</td><td>$address</td></tr>
            <tr><td>CNIC</td><td>$cnic</td></tr>
            <tr><td>Preffered Hostel</td><td>$student_preffered_hostel</td></tr>
            <tr>
        ";
        if($status == 1){
            echo "<td></td><td><button type='button'  class='btn btn-default'   disabled>check</button></td></tr>";
        }
        else{
            echo "<td></td><td><button type='button' class='btn btn-default' ><a href='check.php?id=$application_no'>check</a></button></td></tr>";
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
                  <td><button type='button' class='btn btn-default' ><a href='allocate.php?id=$application_no'>Allot</a></button> </td>
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
        $student_id_Copy = $each_record['idcardphoto'];
        $semester_Fee_Slip = $each_record['feephoto'];
        $affidivat = $each_record['affidivat'];
        if($each_record['newstudent'] == true ){
            echo"
            <tr><td>Student Name</td><td>$student_name</td></tr>
            <tr><td>Father Name</td><td>$father_name</td></tr>
            <tr><td>First semester fee slip</td><td><img src='IMAGES/$semester_Fee_Slip' width='100' height='150'></td></tr>
            <tr><td>Affidivat</td><td><img src='IMAGES/$affidivat' width='100' height='150'></td></tr>
             ";
            echo "<tr><td><button type='button'  class=\"btn btn-default\" ><a href='applicationProcessing.php?id=$application_no&state=1'>Select</a></button>
              <button type='button'  class=\"btn btn-danger\" ><a href='applicationProcessing.php?id=$application_no&state=0'>Not Select</a></button></td></tr>";

        }
        elseif($each_record['oldstudent'] == false){
            echo"
            <tr><td>Student Name</td><td>$student_name</td></tr>
            <tr><td>Father Name</td><td>$father_name</td></tr>
            <tr><td>Student Id</td><td>$student_id</td></tr>
            <tr><td>Student Id card copy</td><td><img src='IMAGES/$student_id_Copy' width='100' height='150'></td></tr>
            <tr><td>Semester fee slip</td><td><img src='IMAGES/$semester_Fee_Slip' width='100' height='150'></td></tr>
            ";
            echo "<tr><td><button type='button'  class=\"btn btn-default\" ><a href='applicationProcessing.php?id=$application_no&state=1'>Select</a></button>
              <button type='button'  class=\"btn btn-danger\" ><a href='applicationProcessing.php?id=$application_no&state=0'>Not Select</a></button></td></tr>";


        }
        elseif($each_record['oldstudent'] == true){
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
                    <tr><td>Remaining Mess Bill</td><td>$mess_bill</td></tr>
                    <tr><td>Defaulter</td><td>$defaulter</td></tr>
                    <tr><td>Remarks</td><td>$remarks</td></tr>
                    <tr><td>Student Id card copy</td><td><img src='IMAGES/$student_id_Copy' width='100' height='150'></td></tr>
                    <tr><td>Semester fee slip</td><td><img src='IMAGES/$semester_Fee_Slip' width='100' height='150'></td></tr>
            ";
                echo "<tr><td><button type='button' class=\"btn btn-default\" ><a href='applicationProcessing.php?id=$application_no&state=1'>Select</a></button>
              <button type='button'  class=\"btn btn-danger\" ><a href='applicationProcessing.php?id=$application_no&state=0'>Not Select</a></button></td></tr>";

            }

        }
    }
}

function getAvaiableHostle($application_no){


}


?>