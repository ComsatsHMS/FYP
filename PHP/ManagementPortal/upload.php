<?php
session_start();
include "connection.php";
error_reporting(0);
$_hostel=$_GET['naam'];
$_type=$_GET['cause'];



if(isset($_GET['naam'])){
    $_SESSION['hostel1']=$_hostel;

    header("Location:http://localhost/FYP/PHP/UploadNotifications.php");
    die();



}
if(isset($_GET['cause'])){
    $_SESSION['type1']=$_type;



    header("Location:http://localhost/FYP/PHP/UploadNotifications.php");
    die();

}


if(isset($_POST['upload'])) {

    echo $_hostel = $_SESSION['hostel1'];
    echo $_type = $_SESSION['type1'];
    echo $date = $_POST['date'];


    $file = $_FILES["fileToUpload"]["name"];
    move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], "mydocs/" . $file);

    $insert = "insert into notification VALUES ('','$_type','$_hostel','$date','$file')";
    $transport = mysqli_query($connection, $insert);
    if ($transport) {
        echo "true";
    } else {
        echo "false";
    }
}
?>