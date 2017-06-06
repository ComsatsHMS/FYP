<?php
include("../connection.php");
session_start();
//error_reporting(0);

if(isset($_POST['update'])) {
    print_r($_POST);
    $User = $_SESSION['UserId'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $role = $_POST['role'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $ProfilePic=$_FILES["pic"]["name"];
    move_uploaded_file($_FILES["pic"]["tmp_name"],"../../IMAGES/".$ProfilePic);
    if ($address != ' ' || $phone != ' ' || $name != ' ' || $role != '' || $address != ' ') {
        $query = mysqli_query($connection, "UPDATE  adminprofile SET address='$address', phone_no='$phone', name='$name', email='$email', role='$role', address='$address', picture='$ProfilePic' WHERE userid='$User'");
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