<?php
include("../connection.php");
session_start();
//error_reporting(0);

function getProfile(){
   global $connection;
$User = $_SESSION['UserId'];
$query = mysqli_query($connection, "select * from users where userid='$User'");
    while ($db_data = mysqli_fetch_array($query)) {
        $_SESSION['fname']=$db_data['first_name'];
        $_SESSION['lname']=$db_data['last_name'];
        $_SESSION['email']=$db_data['email'];
        $_SESSION['role']=$db_data['role'];
        $_SESSION['hostel']=$db_data['hostel'];
        $_SESSION['address']=$db_data['address'];
        $_SESSION['phone']=$db_data['phone_no'];

    }
}

if(isset($_POST['update'])) {
    $User = $_SESSION['UserId'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    if ($address != '' && $phone != '') {
        $query = mysqli_query($connection, "UPDATE  users SET address='$address', phone_no='$phone' WHERE userid='$User'");
        if ($query) {
            $_SESSION['update'] = 'OK';
            header('Location:Profile.php');
        } else {
            $_SESSION['update'] = 'error';
            header('Location:Profile.php');
        }
    }
    else{
            $_SESSION['update'] = 'empty';
            header('Location:Profile.php');
        }
}
?>