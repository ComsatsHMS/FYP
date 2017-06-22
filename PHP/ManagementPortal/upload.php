<?php
session_start();
include "../connection.php";
error_reporting(0);
$_hostel=$_GET['naam'];
$_type=$_GET['cause'];



if(isset($_GET['naam'])){
    $_SESSION['hostel1']=$_hostel;

    header("Location:http:MainApplicationOffice.php");
    die();



}
if(isset($_GET['cause'])){
    $_SESSION['type1']=$_type;
    header("Location:http:MainApplicationOffice.php");
    die();
}


if(isset($_POST['upload'])) {

    $_hostel = $_SESSION['hostel1'];
    $_type = $_SESSION['type1'];
    $date = $_POST['date'];
    $file = $_FILES["fileToUpload"]["name"];
if(!empty($_hostel) && !empty($_type) && !empty($file) && !empty($date)){

    move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], "../mydocs/" . $file);

    $insert = "insert into notification VALUES ('','$_type','$_hostel','$date','$file',0)";
    $transport = mysqli_query($connection, $insert);
    if ($transport) {
        $_SESSION['Notification']="inserted";
    } else {
        $_SESSION['Notification']="error";
    }
    unset($_SESSION['hostel1']);
    unset($_SESSION['type1']);
    header("Location:http:MainApplicationOffice.php");
}
    else{
        $_SESSION['Notification']="empty";
        header("Location:http:MainApplicationOffice.php");
    }
}
?>