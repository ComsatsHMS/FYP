<?php
include("../connection.php");
error_reporting(0);
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

if(isset($_POST['submit1'])) {

    $student_Fname = $_POST['fname'];
    $student_Name = $_POST['name'];
    $student_cnic = $_POST['cnic'];
    $studentF_cnic = $_POST['fcnic'];
    $degree = $_POST['degree'];
    $year = $_POST['year'];
    $student_program = $_POST['program'];
    $student_Id = $degree.'-'.$year.'-'.$student_program.'-'.$_POST['studentid'];
    echo "$student_Id";
    $student_Address = $_POST['address'];
    $telephoneNumber = $_POST['telephoneNumber'];
    $mobileNumber = $_POST['mobileNumber'];
    $email = $_POST['email'];
    $domicile = $_POST['domicile'];
    $bloodGroup = $_POST['bloodGroup'];
    $religion= $_POST['religion'];
    $occupation = $_POST['occupation'];
    $income = $_POST['income'];
    $emergency = $_POST['emergency'];
    $relation = $_POST['relation'];
    $cell = $_POST['cell'];
    $student_hostel = $_POST['hostel'];
    $student_old_hostel = $_POST['old'];
    $student_newstudent = $_POST['new_student'];
    $student_image=$_FILES["image"]["name"];
    move_uploaded_file($_FILES["image"]["tmp_name"],"../IMAGES/".$student_image);
    $student_image1=$_FILES["image1"]["name"];
    move_uploaded_file($_FILES["image1"]["tmp_name"],"../IMAGES/".$student_image1);
    $student_image3=$_FILES["imageCNIC"]["name"];
    move_uploaded_file($_FILES["imageCNIC"]["tmp_name"],"../IMAGES/".$student_image3);
    $student_image4=$_FILES["imageDomicile"]["name"];
    move_uploaded_file($_FILES["imageDomicile"]["tmp_name"],"../IMAGES/".$student_image4);
    $student_image5=$_FILES["imageFG"]["name"];
    move_uploaded_file($_FILES["imageFG"]["tmp_name"],"../IMAGES/".$student_image5);


    $insert = "insert into oldstudentform values ('','$student_Name','$student_Fname','$student_Id','$student_program','$student_Address',
    '$student_cnic','$studentF_cnic','$telephoneNumber','$mobileNumber','$email','$domicile','$bloodGroup','$religion','$occupation',
    '$income','$emergency','$relation','$cell','$student_hostel','$student_image','$student_image1','$student_image3','$student_image4','$student_image5','$student_old_hostel','$student_newstudent','','','')";

    $transport = mysqli_query($connection,$insert);
    if ($transport) {
        echo "send";
    } else
        echo "not send";

}
?>





