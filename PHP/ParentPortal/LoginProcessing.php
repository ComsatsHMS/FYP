<?php
include "../connection.php";
//error_reporting(0);
session_start();
if(isset($_POST['submit'])) {
    $db_password;
    $degreeProgram = $_POST['degree'];
    $year       = $_POST['fall'];
    $program    = $_POST['degreeProgram'];
    $rollNumber = $_POST['rollNumber'];
    $studentID  = $_POST['degree'].'-'.$_POST['fall'].'-'.$_POST['degreeProgram'].'-'.$_POST['rollNumber'];
    $password=$_POST['check'];

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
            $_SESSION['hostelname']=$db_data['studentHostel'];
            $_SESSION['pic']=$db_data['Pic'];
        }
        header('Location:ParentPortal.php');
    }
    else{
        $_SESSION['error'] = "error";
        header('Location:ParentLogin.php');
    }
}
elseif(isset($_POST['forget'])){
    $email    = $_POST['email'];
    echo "$email";
    $query = mysqli_query($connection,"select studentid from oldstudentform where  email='$email'");
    while ($db_data = mysqli_fetch_array($query)) {
        $studentID = $db_data['studentid'];
    }
    if(!empty($studentID)){
        $admin_email = "ahmadmukhtar@CHMS.gwiddle.co.uk";
        $email_ = $email;
        $subject = "Password Reset";
        $tempPW = randomPassword();
        $comment = "New Password is: ".$tempPW;
        mail($email_, "$subject", $comment, "From:" . $admin_email);

        $query = mysqli_query($connection,"update loginoldstudent set password='$tempPW' where  studentid='$studentID'");
        if($query){
            $_SESSION['resetPW'] = "Ok";
        }
        else{
            $_SESSION['resetPW'] = "error";
        }

    }else{
        $_SESSION['resetPW'] = "empty";
    }
    header('Location:ParentLogin.php');

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
