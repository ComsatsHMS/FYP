<?php
include "../connection.php";
error_reporting(0);
session_start();
if(isset($_POST['submit'])) {
    $degreeProgram = $_POST['degree'];
    $year       = $_POST['fall'];
    $program    = $_POST['degreeProgram'];
    $rollNumber = $_POST['rollNumber'];
    $studentID  = $_POST['degree'].'-'.$_POST['fall'].'-'.$_POST['degreeProgram'].'-'.$_POST['rollNumber'];
    $password=$_POST['check'];
    echo "$studentID";

    $query  = "select password from loginoldstudent where studentid = '$studentID' ";
    $result = mysqli_query($connection, $query);

    while ($db_data = mysqli_fetch_array($result)) {
        $db_password = $db_data['password'];
    }
    if($db_password==$password){
        $query = mysqli_query($connection,"select * from insertstudentprofile where  studentid='$studentID'");
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
            $_SESSION['pic']=$db_data['Pic'];
        }
        header('Location:StudentPortal.php');
    }
    else{
        echo "Username or Password Mismatch";
    }
}
?>
