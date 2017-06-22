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
        header('Location:StudentPortal.php');
    }
    else{
        $_SESSION['error'] = "error";
        header('Location:Login.php');
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
        $tempPW = randomPassword();
        $comment = "New Password is: ".$tempPW;
        $to = $email;
        $subject = "Password Reset Request.";
        $message = '
        <html>
        <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
            <title></title>
        </head>
        <body>
            <div id="email-wrap">
            <p>Hy, <strong> '.$studentID.'</strong></p>
            <p>Your Login password has been changed to:
            New password :'.$tempPW.'</p>
            <p>For your convenience your account information is below:
            ________________________________________________
            Username:   '.$studentID.'
            Password:   '.$tempPW.'</p>
             <p>Thannks!!</p>
             <p>Please Contact Web Admin if you are having troubles.
             Best regards,
             Web Admin</p>
             <p>' . $regards . '</p>
            </div>
        </body>
        </html>';
        $from = "ahmadmukhtar@CHMS.gwiddle.co.uk";
        $headers = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        $headers .= 'To: ' . $to . "\r\n";
        $headers .= 'From: ' . $from . "\r\n";
        mail($to, $subject, $message, $headers);
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
    header('Location:Login.php');
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
