<?php
session_start();
include "../connection.php";
if(isset($_POST['submit'])){
print_r($_POST);
$studentName=$_POST['studentName'];
$studentFatherName=$_POST['fatherName'];
$studentId=$_POST['Regid'];
$studentroom=$_POST['room'];
$studentprogram=$_POST['program'];
$studentcgpa=$_POST['cgpa'];
$studentEContact=$_POST['econtact'];
$studentphone=$_POST['phone'];
$studentaddres=$_POST['address'];
    $insert="insert into insertstudentprofile VALUES ('$studentName','$studentFatherName','$studentId','$studentroom',
'$studentprogram','$studentcgpa','$studentEContact','$studentphone','$studentaddres')";
    $query=mysqli_query($connection,$insert);
    if($query){
        echo "true";
    }
}
if(isset($_POST['update'])) {
    print_r($_POST);
    $studentName = $_POST['studentName'];
    $studentFatherName = $_POST['fatherName'];
    $studentId = $_POST['Regid'];
    $studentroom = $_POST['room'];
    $studentprogram = $_POST['program'];
    $studentcgpa = $_POST['cgpa'];
    $studentEContact = $_POST['econtact'];
    $studentphone = $_POST['phone'];
    $studentaddres = $_POST['address'];
    echo "$studentcgpa";
    if ($studentcgpa !='' && $studentEContact !='' && $studentphone!='' && $studentaddres !=''){
        $sql = "UPDATE  insertstudentprofile SET studentName='$studentName', fathername='$studentFatherName',
        room='$studentroom', program='$studentprogram', cgpa='$studentcgpa',  contact='$studentEContact',  phone='$studentphone',
          adress='$studentaddres' WHERE studentid='$studentId'";
    $sql1 = "UPDATE  oldstudentform SET cellNo='$studentEContact', mobileNo='$studentphone',
          address='$studentaddres' WHERE studentid='$studentId'";
    $query = mysqli_query($connection, $sql);
    $query = mysqli_query($connection, $sql1);
    if ($query) {
        $query_1 = mysqli_query($connection, "select studentName, fathername, studentid, room, program, cgpa, contact, phone, adress from insertstudentprofile where  studentid='$studentId'");
        while ($db_data = mysqli_fetch_array($query_1)) {
            $_SESSION['name'] = $db_data['studentName'];
            $_SESSION['fname'] = $db_data['fathername'];
            $_SESSION['id'] = $db_data['studentid'];
            $_SESSION['room'] = $db_data['room'];
            $_SESSION['program'] = $db_data['program'];
            $_SESSION['cgpa'] = $db_data['cgpa'];
            $_SESSION['contact'] = $db_data['contact'];
            $_SESSION['phone'] = $db_data['phone'];
            $_SESSION['address'] = $db_data['adress'];
            $_SESSION['update'] = 'OK';
            header('Location:StudentPortal.php');
        }
    }else{
        $_SESSION['update'] = 'error';
        header('Location:ParentPortal.php');
    }
}
    else{
        $_SESSION['update'] = 'empty';
        header('Location:ParentPortal.php');
    }
}
?>


