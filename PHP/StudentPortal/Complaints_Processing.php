<?php
session_start();
include("../connection.php");
error_reporting(0);
if(isset($_POST['Submit'])) {
    $ComplainType = $_POST['ComplainType'];
    $ComplainText = $_POST['ComplainText'];
    $StudentID    =    $_SESSION['id'];
    if(!empty($ComplainType) && !empty($ComplainText)){
        $query = mysqli_query($connection, "insert into complaints VALUES ('','$ComplainType','$ComplainText',now(),'$StudentID','Pending','')");
        if($query){
            $_SESSION['Complain']="inserted";
        }
        else {
            $_SESSION['Complain']="error";
        }
    }
    else{
        $_SESSION['Complain']="error";
    }
    header("location:http://localhost/FYP/PHP/StudentPortal/Complaints.php");
}

//for view complains on admin panel page
if(isset($_GET['type'])){
    $_SESSION['type'] = $_GET['type'];
   header("location:http://localhost/FYP/PHP/StudentPortal/ViewComplains.php");
}
else if(isset($_POST['date'])){
    $_SESSION['date'] = $_POST['date'];
    header("location:http://localhost/FYP/PHP/StudentPortal/ViewComplains.php");
}
function getComplainDetails(){
    $type = $_SESSION['type'];
    $date = $_SESSION['date'];
    global $start;global $end,$query;
    $check =  $_SESSION['id'];

global $connection;
    if(isset($_SESSION['type'])){
        $query = mysqli_query($connection,"select c.*,s.studentName,s.room,s.studentHostel from complaints c,insertstudentprofile s where c.studentid=s.studentid AND c.ComplainType='$type' ORDER BY  ComplainID desc limit 5");
        unset($_SESSION['type']);
    }

  else if(isset($_SESSION['date'])){
      $query = mysqli_query($connection,"select c.*,s.studentName,s.room,s.studentHostel from complaints c,insertstudentprofile s where c.studentid=s.studentid AND c.Date like '$date%' ORDER BY  ComplainID desc limit 5");
      unset($_SESSION['date']);
    }
    else{
        $query = mysqli_query($connection,"select c.*,s.studentName,s.room,s.studentHostel from complaints c,insertstudentprofile s where c.studentid=s.studentid ORDER BY  ComplainID desc limit 5");
    }
    while ($each_record = mysqli_fetch_array($query)){
            $Student_ID    = $each_record['studentid'];
            $Complain_ID   = $each_record['ComplainID'];
            $Complain_Type = $each_record['ComplainType'];
            $Complain_Text = $each_record['ComplainText'];
            $Complain_Date = $each_record['Date'];
            $Student_Name  = $each_record['studentName'];
            $Room_No       = $each_record['room'];
            $Hostel= $each_record['studentHostel'];
            $fetch = mysqli_query($connection, "select w.*,c.ComplainID from wingproctorslist w,complaints c where w.studentID=$check ORDER BY  ComplainID desc limit 5");
            while ($each = mysqli_fetch_array($fetch)) {
                $start = $each['start'];
                $end = $each['end'];}

            if($Room_No >= $start && $Room_No <= $end ) {
                echo "
                                                                <tr><td> $Complain_ID </td>
                                                                <td> $Student_Name </td>
                                                                <td> $Room_No </td>
                                                                <td> $Complain_Type </td>
                                                                <td> $Complain_Date </td>
                                                                  <td> $Hostel </td>
                                                                <td> <button type='button'  class='btn btn-success'><a href='ComplainsDisplay.php?id=$Student_ID & room=$Room_No & name=$Student_Name & text=$Complain_Text'>View</a> </button> </td>
                                                                </tr>
                                                            ";
            }
        }
}




