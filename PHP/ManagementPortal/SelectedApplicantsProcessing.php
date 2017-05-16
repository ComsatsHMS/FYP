<?php
error_reporting(0);
include("../connection.php");
session_start();
if($_POST['submit']) {
    $WingName = $_POST['wingname'];
    $Start = $_POST['start'];
    $End   = $_POST['end'];
    $ApplicationType = $_GET['type'];
    $StudentID = $_GET['id'];
    $run = mysqli_query($connection, "select studentName,room,studentHostel from insertstudentprofile where studentid='$StudentID'");
    while ($each_record = mysqli_fetch_array($run)) {
        echo "while";
        $StudentName = $each_record['studentName'];
        $StudentRoom = $each_record['room'];
        $StudentHostel = $each_record['studentHostel'];
        if($ApplicationType=='Wing Proctor'){
            echo "in";
            $update = mysqli_query($connection, "update applications set Status=1 where applicationtype='$ApplicationType' and studentid='$StudentID'");
            $run = mysqli_query($connection, "insert into wingproctorslist values('$StudentName','$StudentID','$StudentRoom','$StudentHostel','$WingName','$Start','$End')");
            $query= mysqli_query($connection, "insert into selectedmembers values('$StudentID','$StudentName','$StudentRoom','$StudentHostel','$WingName','$ApplicationType',CURRENT_DATE)");

            if($run && $query){
           header("location:http://localhost/FYP/PHP/ManagementPortal/ViewStudentApps.php?status=OK");
       }
        }
        else{
            echo "i'm in";
            $update = mysqli_query($connection, "update applications set Status=1 where applicationtype='$ApplicationType' and studentid='$StudentID'");
            $run = mysqli_query($connection, "insert into selectedmembers values('$StudentID','$StudentName','$StudentRoom','$StudentHostel','$WingName','$ApplicationType',CURRENT_DATE)");
            if($run){
                header("location:http://localhost/FYP/PHP/ManagementPortal/ViewStudentApps.php?status=OK");
            }
        }
    }

}