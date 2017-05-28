<?php
session_start();
include("../connection.php");
error_reporting(0);
if(isset($_POST['Submit'])) {
    $ComplainType = $_POST['ComplainType'];
    $ComplainText = $_POST['ComplainText'];
    $StudentID    =    $_SESSION['id'];
    $StudentRoom  =    $_SESSION['room'];
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
    header("location:Complaints.php");
}

//for view complains on admin panel page
if(isset($_GET['type'])){
    $_SESSION['type'] = $_GET['type'];
   header("location:ViewComplains.php");
}
else if(isset($_POST['date'])){
    $_SESSION['date'] = $_POST['date'];
    header("location:ViewComplains.php");
}
function getComplainDetails(){
    $type = $_SESSION['type'];
    $date = $_SESSION['date'];
    global $start;global $end,$query;
    $check =  $_SESSION['id'];
    global $connection;


    $query = mysqli_query($connection, "select * from wingproctorslist where studentID='$check'");
    while ($each_record = mysqli_fetch_array($query)) {
        $start = $each_record['start'];
        $end = $each_record['end'];
    }
    $query = mysqli_query($connection, "select hex('$start')");
    $row   = mysqli_fetch_row($query);
    $start = $row[0];
    $query = mysqli_query($connection, "select hex('$end')");
    $row   = mysqli_fetch_row($query);
    $end   = $row[0];

    if(isset($_SESSION['type'])){
        $run= mysqli_query($connection,"select c.*,s.studentName,s.room,s.studentHostel from complaints c,insertstudentprofile s where c.studentid=s.studentid AND hex(s.room)>=$start AND hex(s.room) <=$end AND c.ComplainType='$type' ORDER BY  ComplainID desc limit 5");
        unset($_SESSION['type']);
    }

  else if(isset($_SESSION['date'])){
      $run = mysqli_query($connection,"select c.*,s.studentName,s.room,s.studentHostel from complaints c,insertstudentprofile s where c.studentid=s.studentid AND hex(s.room)>=$start AND hex(s.room) <=$end AND c.Date like '$date%' ORDER BY  ComplainID desc limit 5");
      unset($_SESSION['date']);
    }
    else{
        $run = mysqli_query($connection, "select c.*,s.studentName,s.room,s.studentHostel from complaints c,insertstudentprofile s where c.studentid=s.studentid AND hex(s.room)>=$start AND hex(s.room) <=$end ORDER BY  ComplainID desc limit 5");
    }

         while ($each_record = mysqli_fetch_array($run)) {
            $Student_ID = $each_record['studentid'];
            $Complain_ID = $each_record['ComplainID'];
            $Complain_Type = $each_record['ComplainType'];
            $Complain_Text = $each_record['ComplainText'];
            $Complain_Date = $each_record['Date'];
            $Student_Name = $each_record['studentName'];
            $Room_No = $each_record['room'];
            $Hostel = $each_record['studentHostel'];
            echo "
                                                                <tr><td> $Complain_ID </td>
                                                                <td> $Student_Name </td>
                                                                <td> $Room_No </td>
                                                                <td> $Complain_Type </td>
                                                                <td> $Complain_Date </td>
                                                                  <td> $Hostel </td>
                                                                <td> <a  id='view' href='ComplainsDisplay.php?id=$Student_ID & room=$Room_No & name=$Student_Name & text=$Complain_Text'>View </a> </td>
                                                                </tr>
                                                            ";
        }
    }




