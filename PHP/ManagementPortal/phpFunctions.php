<?php
include("../connection.php");
session_start();
error_reporting(0);

if(isset($_POST['submit'])){
    $room_num = $_POST['num'];
    $hostel_Name = NULL;
    $application_no =$_POST['id'] ;
    $hostel_Name=$_POST['hostels'];
    $insert="insert into hostel VALUES ('','$hostel_Name','$application_no','$room_num')";
    $transport = mysqli_query($connection,$insert);
    if($transport){
        $_SESSION['Allocation'] = 'OK';
        $select = "select o.*,h.HostelName from oldstudentform o,hostel h where o.applicationNumber='$application_no' AND h.applicationNumber='$application_no'";
        $run = mysqli_query($connection,$select);
        while ($each_record = mysqli_fetch_array($run)) {
            $student_name = $each_record['name'];
            $student_f_name = $each_record['fathername'];
            $hostel_Name = $each_record['HostelName'];
            $student_contact = $each_record['mobileNo'];
            $student_contact_e = $each_record['cellNo'];
            $student_id = $each_record['studentid'];
            $student_email = $each_record['email'];
            $student_program = $each_record['program'];
            $address = $each_record['address'];
            $pic = $each_record['photo'];
            $insert = "insert into insertstudentprofile VALUES ('$student_name','$student_f_name','$student_id','$student_program','$room_num','','$student_contact',' $student_contact_e','$address','','$hostel_Name','$pic')";
            $exec = mysqli_query($connection,$insert);
            if($exec){
                $password = randomPassword();
                $acc = "insert into loginoldstudent VALUES ('$student_id','$password')";
                $exec = mysqli_query($connection,$acc);
                if($exec){
                    //send mail
                    $regards = "{$_SESSION['UserFirstName']}"." "."{$_SESSION['UserLastName']}";
                    $to = $student_email;
                    $subject = 'Congragulations!! You have been selected.';
                    $message = '
        <html>
        <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
            <title></title>
        </head>
        <body>
            <div id="email-wrap">
            <p>Hy, <strong> '.$student_name.'</strong></p>
            <p>This email is to inform you that, you have been selected for comsats hostels.</p>
            <p>Below are your login details, Use these details to login and check your allocated room and Hostel.</p>
            <p>Username:'.$student_id.'</p>
             <p>Password:'.$password.'</p>
             <p>Thannks!!</p>
             <p>Best Regards,</p>
             <p>'.$regards.'</p>
            </div>
        </body>
        </html>';

                    $from ="ahmadmukhtar@CHMS.gwiddle.co.uk";
                    //$Bcc = "example@example.com";

                    // To send HTML mail, the Content-type header must be set
                    $headers  = 'MIME-Version: 1.0' . "\r\n";
                    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

                    // Additional headers
                    $headers .= 'To: ' .$to. "\r\n";
                    $headers .= 'From: ' .$from. "\r\n";
                    //  $headers .= 'Bcc: '.$Bcc. "\r\n";

                    // Send the email
                    mail($to,$subject,$message,$headers);

                }
            }
        }
    }else{
        $_SESSION['Allocation'] = 'error';
    }
    header('Location: Allotment.php');
}

function getStudentApplications(){
    global $connection;
    $get_record = "select * from oldstudentform where status=0";
    $run = mysqli_query($connection, $get_record);
    if(mysqli_num_rows($run) == 0){
        echo "No student Application Found";
    }
    else{
        echo "<tr>
                                        <th>Sr. No</th>
                                        <th>Name</th>
                                        <th>Father Name</th>
                                        <th>preffered hostel</th>
                                        <th></th>
                                    </tr>";
    }
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
            echo "<td><button id='view' type='button'     disabled>check</button></td></tr>";
        }
        else{
            echo "<td><a class='btn btn-default' id='view' href='Check.php?id=$application_no'>check</a></td></tr>";
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
        $f_cnic = $each_record['fcnic'];
        $program =$each_record['program'];
        $photo = $each_record['photo'];
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

        echo "
            <tr><td>Student Picture</td><td><img src='../IMAGES/$photo' height='150px' width='130px' ></td></tr>
            <tr><td>Student Name</td><td>$student_name</td></tr>
            <tr><td>Father Name</td><td>$student_f_name</td></tr>
            <tr><td>Student Id</td><td>$student_id</td></tr>
            <tr><td>Address</td><td>$address</td></tr>
            <tr><td>CNIC</td><td>$cnic</td></tr>
            <tr><td>Father CNIC</td><td>$f_cnic</td></tr>
            <tr><td>Program</td><td>$program</td></tr>
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
    }

}
function getSelectedStudents(){
    global $connection;
    $get_record = "select * from oldstudentform WHERE selected = 1";
    $run = mysqli_query($connection, $get_record);
    if(mysqli_num_rows($run) > 0) {
        echo "<tr>
                                        <th>Sr. No</th>
                                        <th>Name</th>
                                        <th>Father Name</th>
                                        <th>Student id</th>
                                        <th>preffered hostel</th>
                                        <th></th>
                                    </tr>";
        while ($each_record = mysqli_fetch_array($run)) {
            $application_no = $each_record['applicationNumber'];
            $new_student = $each_record['newstudent'];
            $get_rec = "select * from hostel WHERE applicationNumber = '$application_no'";
            $run1 = mysqli_query($connection, $get_rec);

            if (mysqli_num_rows($run1) == 0) {

                $student_name = $each_record['name'];
                $student_f_name = $each_record['fathername'];
                $student_id = $each_record['studentid'];
                $student_preffered_hostel = $each_record['hostel'];

                echo "<tr><td>$application_no</td>
                  <td>$student_name</td>
                  <td>$student_f_name</td>
                  <td>$student_id</td>
                  <td>$student_preffered_hostel</td>
                  <td><a id='view'href='Allocate.php?id=$application_no&newStd=$new_student'>Allot Room</a></td>
                  </tr>";
            }
        }
    }
    else{
        echo "No Student Record Found";
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
            echo "<tr><td style='float: right'><a class=\"btn btn-default\" id='view'  data-toggle=\"modal\" data-target=\"#yesdialog\">Select</a>
              </td><td><a class=\"btn btn-danger\" data-toggle=\"modal\" data-target=\"#nodialog\">Not Select</a></td></tr>";
//yes confirmation echo
            echo" <div class=\"modal fade\" id=\"yesdialog\" role=\"dialog\">
    <div class=\"modal-dialog\">

      <!-- Modal content-->
      <div class=\"modal-content\">
        <div class=\"modal-header\" style='background-color: #f36a5a'>
          <button type=\"button\" class=\"close\" data-dismiss=\"modal\">&times;</button>
          <h4 class=\"modal-title\">Confirmation</h4>
        </div>
        <div class=\"modal-body\" >
          <p>Are you sure you want to Select this student for hostel allotment?</p>
        </div>
        <div class=\"modal-footer\">
          <button type=\"button\" id='view' class=\"btn btn-success\"><a href='ApplicationProcessing.php?id=$application_no&state=1' >Yes</a></button>
          <button type=\"button\" class=\"btn btn-default\" data-dismiss=\"modal\">Close</button>
        </div>
      </div>

    </div>
  </div>";
            //no confirmation echo
            echo" <div class=\"modal fade\" id=\"nodialog\" role=\"dialog\">
    <div class=\"modal-dialog\">

      <!-- Modal content-->
      <div class=\"modal-content\">
        <div class=\"modal-header\" style='background-color: #f36a5a'>
          <button type=\"button\" class=\"close\" data-dismiss=\"modal\">&times;</button>
          <h4 class=\"modal-title\">Confirmation</h4>
        </div>
        <div class=\"modal-body\" >
          <p>Are you sure you want to Not Select this student for hostel allotment?</p>
        </div>
        <div class=\"modal-footer\">
          <button type=\"button\" class=\"btn btn-danger\"><a href='ApplicationProcessing.php?id=$application_no&state=0'>Yes! sure</a> </button>
          <button type=\"button\" class=\"btn btn-default\" data-dismiss=\"modal\">Close</button>
        </div>
      </div>

    </div>
  </div>";
        }
        elseif($each_record['oldstudent'] == false){
            echo"
            <tr><td>Student Name</td><td>$student_name</td></tr>
            <tr><td>Father Name</td><td>$father_name</td></tr>
            <tr><td>Student Id</td><td>$student_id</td></tr>
            <tr><td>Student Mobile No.</td><td>$student_cell</td></tr>
            <tr><td>Semester fee slip</td><td><img src='../IMAGES/$semester_Fee_Slip' width='100' height='150'></td></tr>
            ";
            echo "<tr><td style='float: right'><a class=\"btn btn-default\" id='view'  data-toggle=\"modal\" data-target=\"#yesdialog\">Select</a>
              </td><td><a class=\"btn btn-danger\" data-toggle=\"modal\" data-target=\"#nodialog\">Not Select</a></td></tr>";
//yes confirmation echo
            echo" <div class=\"modal fade\" id=\"yesdialog\" role=\"dialog\">
    <div class=\"modal-dialog\">

      <!-- Modal content-->
      <div class=\"modal-content\">
        <div class=\"modal-header\" style='background-color: #f36a5a'>
          <button type=\"button\" class=\"close\" data-dismiss=\"modal\">&times;</button>
          <h4 class=\"modal-title\">Confirmation</h4>
        </div>
        <div class=\"modal-body\" >
          <p>Are you sure you want to Select this student for hostel allotment?</p>
        </div>
        <div class=\"modal-footer\">
          <button type=\"button\" id='view' class=\"btn btn-success\"><a href='ApplicationProcessing.php?id=$application_no&state=1' >Yes</a></button>
          <button type=\"button\" class=\"btn btn-default\" data-dismiss=\"modal\">Close</button>
        </div>
      </div>

    </div>
  </div>";
            //no confirmation echo
            echo" <div class=\"modal fade\" id=\"nodialog\" role=\"dialog\">
    <div class=\"modal-dialog\">

      <!-- Modal content-->
      <div class=\"modal-content\">
        <div class=\"modal-header\" style='background-color: #f36a5a'>
          <button type=\"button\" class=\"close\" data-dismiss=\"modal\">&times;</button>
          <h4 class=\"modal-title\">Confirmation</h4>
        </div>
        <div class=\"modal-body\" >
          <p>Are you sure you want to Not Select this student for hostel allotment?</p>
        </div>
        <div class=\"modal-footer\">
          <button type=\"button\" class=\"btn btn-danger\"><a href='ApplicationProcessing.php?id=$application_no&state=0'>Yes! sure</a> </button>
          <button type=\"button\" class=\"btn btn-default\" data-dismiss=\"modal\">Close</button>
        </div>
      </div>

    </div>
  </div>";
        }
        elseif($each_record['oldstudent'] == 1){
            global $connection;

            echo"
                    <tr><td>Student Name</td><td>$student_name</td></tr>
                    <tr><td>Father Name</td><td>$father_name</td></tr>
                    <tr><td>Student Id</td><td>$student_id</td></tr>
                    <tr><td>Student Mobile No.</td><td>$student_cell</td></tr>

                    <tr><td>Semester fee slip</td><td><img src='../IMAGES/$semester_Fee_Slip' width='100' height='150'></td></tr>
            ";
            echo "<tr><td style='float: right'><a class=\"btn btn-default\" id='view'  data-toggle=\"modal\" data-target=\"#yesdialog\">Select</a>
              </td><td><a class=\"btn btn-danger\" data-toggle=\"modal\" data-target=\"#nodialog\">Not Select</a></td></tr>";
//yes confirmation echo
            echo" <div class=\"modal fade\" id=\"yesdialog\" role=\"dialog\">
    <div class=\"modal-dialog\">

      <!-- Modal content-->
      <div class=\"modal-content\">
        <div class=\"modal-header\" style='background-color: #f36a5a'>
          <button type=\"button\" class=\"close\" data-dismiss=\"modal\">&times;</button>
          <h4 class=\"modal-title\">Confirmation</h4>
        </div>
        <div class=\"modal-body\" >
          <p>Are you sure you want to Select this student for hostel allotment?</p>
        </div>
        <div class=\"modal-footer\">
          <button type=\"button\" id='view' class=\"btn btn-success\"><a href='ApplicationProcessing.php?id=$application_no&state=1' >Yes</a></button>
          <button type=\"button\" class=\"btn btn-default\" data-dismiss=\"modal\">Close</button>
        </div>
      </div>

    </div>
  </div>";
            //no confirmation echo
            echo" <div class=\"modal fade\" id=\"nodialog\" role=\"dialog\">
    <div class=\"modal-dialog\">

      <!-- Modal content-->
      <div class=\"modal-content\">
        <div class=\"modal-header\" style='background-color: #f36a5a'>
          <button type=\"button\" class=\"close\" data-dismiss=\"modal\">&times;</button>
          <h4 class=\"modal-title\">Confirmation</h4>
        </div>
        <div class=\"modal-body\" >
          <p>Are you sure you want to Not Select this student for hostel allotment?</p>
        </div>
        <div class=\"modal-footer\">
          <button type=\"button\" class=\"btn btn-danger\"><a href='ApplicationProcessing.php?id=$application_no&state=0'>Yes! sure</a> </button>
          <button type=\"button\" class=\"btn btn-default\" data-dismiss=\"modal\">Close</button>
        </div>
      </div>

    </div>
  </div>";


        }
    }
}

function getSelectedStudentsList(){
    global $connection;
    $get_record = "select * from oldstudentform";
    $run = mysqli_query($connection, $get_record);
    if(mysqli_num_rows($run)>0) {
        echo "<tr>
                                        <th>Student Name</th>
                                        <th>Father Name</th>
                                        <th>Student id</th>
                                        <th>Student Hostel</th>
                                        <th>Room No</th>
                                        <th>Actions</th>
                                    </tr>";
        while ($each_record = mysqli_fetch_array($run)) {
            $rec = "select * from hostel";
            $exec = mysqli_query($connection, $rec);
            while ($each_rec = mysqli_fetch_array($exec)) {
                if ($each_record['applicationNumber'] == $each_rec['applicationNumber']) {
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
                  <td><a id='view' href='StudentCompleteDetails.php?id=$student_id'>Details</a></td>
                  </tr>";
                }

            }
        }
    }
    else{
        echo"No Student Record Found";
    }
}
function getNotSelectedStudentsList(){
    global $connection;
    $get_record = "select * from oldstudentform where selected = 0";
    $run = mysqli_query($connection, $get_record);
    if(mysqli_num_rows($run)>0){
        echo"<tr>
                                        <th>Student Name</th>
                                        <th>Father Name</th>
                                        <th>Student id</th>
                                        <th>Student Details</th>
                                    </tr>";
        while ($each_record = mysqli_fetch_array($run)) {
            $application_no = $each_record['applicationNumber'];
            $student_name = $each_record['name'];
            $student_f_name = $each_record['fathername'];
            $student_id = $each_record['studentid'];
            echo "<tr>
                  <td>$student_name</td>
                  <td>$student_f_name</td>
                  <td>$student_id</td>
                  <td><button type='button' id='view' class='btn btn-default' ><a href='StudentDetails.php?id=$application_no&chec=1'>Details</a></button> </td>
                  </tr>";
        }
    }
    else{
        echo"No Student Record Found";
    }

}
function studentSearchByName($temp){
    global $connection;
    $get_record = "select * from oldstudentform WHERE name like '%$temp%'";
    $run = mysqli_query($connection, $get_record);
    if(mysqli_num_rows($run)>0){
        echo "<tr>
                                        <th>Student Name</th>
                                        <th>Father Name</th>
                                        <th>Student id</th>
                                        <th>Student Hostel</th>
                                        <th>Room No</th>
                                        <th>Actions</th>
                                    </tr>";
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
                  <td><button type='button' id='view' class='btn btn-default' ><a href='StudentCompleteDetails.php?id=$student_id'>Details</a></button> </td>
                  </tr>";
                }

            }
        }
    }
    else{
        echo"No Student Record Found";
    }

}

function studentSearchByHostel($temp){
    global $connection;
    $get_record = "select * from oldstudentform f,hostel h where f.applicationNumber = h.applicationNumber AND h.HostelName = '$temp'" ;
    $run = mysqli_query($connection, $get_record);
    if(mysqli_num_rows($run)>0) {
        echo "<tr>
                                        <th>Student Name</th>
                                        <th>Father Name</th>
                                        <th>Student id</th>
                                        <th>Student Hostel</th>
                                        <th>Room No</th>
                                        <th>Actions</th>
                                    </tr>";
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
    else{
        echo"No Student Record Found";
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
        echo "<td><button id=\"view\" style=\"float: right\" data-toggle=\"modal\" data-target=\"#update\">Update Hostel data</button></td>";
        echo" <div class=\"modal fade\" id=\"update\" role=\"dialog\">
    <div class=\"modal-dialog\">

      <!-- Modal content-->
      <div class=\"modal-content\">
        <div class=\"modal-header\" style='background-color: #f36a5a'>
          <button type=\"button\" class=\"close\" data-dismiss=\"modal\">&times;</button>
          <h4 class=\"modal-title\">Hostel Record Update</h4>
        </div>
        <div class=\"modal-body\" >
        <form method=\"post\" action=\"StudentCompleteDetails.php?id=$applicationNo\">
            <label for=\"oldhostel\">Current Hostel: </label>
            <input type='text' id='oldhostel' value='$hostel_name' readonly>
             <label for=\"oldroom\">Current Room No: </label>
            <input type='text' id='oldroom' value='$room_no' readonly>
            <br>
            <label for=\"newhostel\">Changed Hostel: </label>
            <select  id=\"newhostel\" name=\"newhostel\">
                                            <option><----Choose----></option>
                                            <option>M.A Jinnah</option>
                                            <option>Liaquat Hall</option>
                                            <option>Johar Hall</option>
                                            <option>Jupitar Hall</option>
                                        </select>
             <label for=\"newroom\">New Room No: </label>
            <input type='text' id='newroom' name='newroom' value='$room_no'>



        </div>
        <div class=\"modal-footer\">
          <input type=\"submit\" id='view' name='updaterecord' class=\"btn btn-success\" value='Update'>
          <button type=\"button\" class=\"btn btn-default\" data-dismiss=\"modal\">Cancel</button>
        </div>
        </form>
      </div>

    </div>
  </div>";

    }
}

//mess fee and fines
function getFeePaidStudentsList(){
    global $connection;
    $get_record = "select m.challanNo,m.studentid,m.submitdate,s.name,s.fathername from messchallandetails m,oldstudentform s where m.status =true AND m.studentid =s.studentid" ;
    $run = mysqli_query($connection, $get_record);

    while ($each_record = mysqli_fetch_array($run)) {
        $challan_no = $each_record['challanNo'];
        $student_name = $each_record['name'];
        $student_f_name = $each_record['fathername'];
        $student_id = $each_record['studentid'];
        $submit_date = $each_record['submitdate'];

        echo "<tr>
                  <td>$challan_no</td>
                  <td>$student_name</td>
                  <td>$student_f_name</td>
                  <td>$student_id</td>
                  <td>$submit_date</td>
                  <td><button type='button' id='view' class='btn btn-default' ><a href='StudentCompleteDetails.php?id=$student_id'>Details</a></button> </td>
                  </tr>";
    }

}

function getFeeUnPaidStudentsList(){

    global $connection;
    $get_record = "select DISTINCT m.challanNo,m.studentid,s.name,s.fathername from messchallandetails m,oldstudentform s where m.status =false AND m.studentid =s.studentid" ;
    $run = mysqli_query($connection, $get_record);
    while ($each_record = mysqli_fetch_array($run)) {
        $challan_no = $each_record['challanNo'];
        $student_name = $each_record['name'];
        $student_f_name = $each_record['fathername'];
        $student_id = $each_record['studentid'];

        echo "<tr>
                  <td>$challan_no</td>
                  <td>$student_name</td>
                  <td>$student_f_name</td>
                  <td>$student_id</td>
                  <td><button type='button' id='view' class='btn btn-default' ><a href='../MessChallan.php?id=$student_id'>Mess Challan</a></button> </td>
                  <td><button type='button' id='view' class='btn btn-default' ><a href='StudentCompleteDetails.php?id=$student_id'>Details</a></button> </td>
                  </tr>";
    }

}
function getHostels(){
    global $connection;
    $Hostel = array();
    $run = mysqli_query($connection,  "select * from hostelslist");
    while ($each_record = mysqli_fetch_array($run)) {
        $Hostel[] = $each_record['HostelName'];
    }
    $_SESSION['list'] = $Hostel;
}

function randomPassword() {
    $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
    $pass = array(); //remember to declare $pass as an array
    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
    for ($i = 0; $i < 8; $i++) {
        $n = rand(0, $alphaLength);
        $pass[] = $alphabet[$n];
    }
    return implode($pass); //turn the array into a string
}
?>
