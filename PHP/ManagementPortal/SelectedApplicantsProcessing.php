<?php
//error_reporting(0);
include("../connection.php");
session_start();
if($_POST['submit']) {
    $WingName = $_POST['wingname'];
    $Start = $_POST['start'];
    $End = $_POST['end'];
    $SelectedApplicant = $_SESSION['SelectedApplicant'];

    $run = mysqli_query($connection, "select studentName,room,studentHostel from insertstudentprofile where studentid=$SelectedApplicant");
    while ($each_record = mysqli_fetch_array($run)) {

        $StudentName = $each_record['studentName'];
        $StudentRoom = $each_record['room'];
        $StudentHostel = $each_record['studentHostel'];

    }
    $run = mysqli_query($connection, "insert into wingproctorslist values('$StudentName','$SelectedApplicant','$StudentRoom','$StudentHostel','$WingName','$Start','$End')");
    header("location:http://localhost/FYP/PHP/ManagementPortal/AppDisplaytemp.php");
}