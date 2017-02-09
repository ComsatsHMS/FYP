<?php
include("../connection.php");
if(isset($_GET['state'])){
    print_r($_GET);
    $application_no = $_GET['id'];
    $state = $_GET['state'];
    if($state == 1){
        global $connection;
        $update_record = "UPDATE oldstudentform SET selected = 1, status=1 WHERE applicationNumber = '$application_no'";
        $abc =mysqli_query($connection, $update_record);
        header('Location: ApplicationsDisplay.php');
    }
    elseif($state == 0){
        global $connection;
        $update_record = "UPDATE oldstudentform SET selected = 0 , status=1 WHERE applicationNumber = '$application_no'";
        $abc=mysqli_query($connection, $update_record);
        header('Location: ApplicationsDisplay.php');
    }
}

if(isset($_POST['wingProctor'])){
    $application_type = "Wing Proctor";
    $application_details = $_POST['text'];
    $insert = "insert into applications VALUES ('','1','$application_type','$application_details','','','','')";
    mysqli_query($connect, $insert);
    header('Location: StudentPortal.php');
}
if(isset($_POST['mess'])){
    $application_type = "Mess Committee";
    $application_details = $_POST['text'];
    $insert = "insert into applications VALUES ('','1','$application_type','$application_details','','','','')";
    mysqli_query($connect, $insert);
    header('Location: StudentPortal.php');
}
if(isset($_POST['messclose'])){
    $application_type = "Mess Close";
    $application_details = $_POST['text'];
    $firstdate = $_POST['startdate'];
    $lastdate = $_POST['lastdate'];
    $insert = "insert into applications VALUES ('','1','$application_type','$application_details','$firstdate',' $lastdate','','')";
    mysqli_query($connect, $insert);
    header('Location: StudentPortal.php');
}
if(isset($_POST['fee'])){
    $application_type = "Security Fee";
    $application_details = $_POST['text'];
    $student_card=$_FILES["StudentCard"]["name"];
    move_uploaded_file($_FILES["StudentCard"]["tmp_name"],"IMAGES/".$student_card);
    $student_idcard=$_FILES["idcard"]["name"];
    move_uploaded_file($_FILES["idcard"]["tmp_name"],"IMAGES/".$student_idcard);
    $insert = "insert into applications VALUES ('','1','$application_type','$application_details','','','$student_card','$student_idcard')";
    mysqli_query($connect, $insert);
    header('Location: StudentPortal.php');
}


if(isset($_POST['submit1'])) {

    $student_Fname = $_POST['fname'];
    $student_Name = $_POST['name'];
    $student_Id = $_POST['studentId'];
    $student_Address = $_POST['address'];
    $student_cnic = $_POST['cnic'];
    $student_hostel = $_POST['hostel'];
    $student_image=$_FILES["image"]["name"];
    move_uploaded_file($_FILES["image"]["tmp_name"],"../IMAGES/".$student_image);
    $student_image1=$_FILES["image1"]["name"];
    move_uploaded_file($_FILES["image1"]["tmp_name"],"../IMAGES/".$student_image1);
    $student_image2=$_FILES["image2"]["name"];
    move_uploaded_file($_FILES["image2"]["tmp_name"],"../IMAGES/".$student_image2);

    $student_old_hostel = $_POST['old'];
    $student_newstudent = $_POST['new_student'];





    $insert = "insert into oldstudentform values ('','$student_Name','$student_Fname','$student_Id','$student_Address',
    '$student_cnic','$student_hostel','$student_image','$student_image1','$student_image2','$student_old_hostel','$student_newstudent','','','')";

    $transport = mysqli_query($connection,$insert);
    if ($transport) {
        echo "send";
    } else
        echo "not send";

}

/*








*/
