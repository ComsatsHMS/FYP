<?php
include "../connection.php";
session_start();
print_r($_POST);
if(isset($_POST['submit'])) {
    $degreeProgram = $_POST['degree'];
    $year = $_POST['fall'];
    $program = $_POST['degreeProgram'];
    $rollNumber = $_POST['rollNumber'];
    $password=$_POST['check'];

    $query = "select password from loginoldstudent where  rollNumber='$rollNumber' AND degree='$degreeProgram' AND year='$year' AND
course='$program' ";
    $result = mysqli_query($connection, $query);
    while ($db_data = mysqli_fetch_array($result)) {
        $db_password = $db_data['password'];
    }
    if($db_password==$password){
        $query = mysqli_query($connection,"select studentName, fathername, studentid, room, program, cgpa, contact, phone, adress, studentHostel from insertstudentprofile where  studentid='$rollNumber'");
        while ($db_data = mysqli_fetch_array($query)) {
            $_SESSION['name']=$db_data['studentName'];
            $_SESSION['fname']=$db_data['fathername'];
            $_SESSION['id']=$db_data['studentid'];
            $_SESSION['room']=$db_data['room'];
            $_SESSION['program']=$db_data['program'];
            $_SESSION['cgpa']=$db_data['cgpa'];
            $_SESSION['contact']=$db_data['contact'];
            $_SESSION['phone']=$db_data['phone'];
            $_SESSION['address']=$db_data['adress'];
            $_SESSION['hostel']=$db_data['studentHostel'];
        }
        header('Location:StudentPortal.php');
    }
    else{
        echo "not login";
    }
}
?>