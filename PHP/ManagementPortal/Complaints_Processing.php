<?php
session_start();

include("../connection.php");
error_reporting(0);
if(isset($_POST['Submit'])) {
print_r($_POST);

    $ComplainType = $_POST['ComplainType'];
    $ComplainText = $_POST['ComplainText'];
    $StudentID =    $_SESSION['id'];
    $query = mysqli_query($connection, "insert into complaints VALUES ('0','$ComplainType','$ComplainText',now(),$StudentID)");

    if($query){
        $_SESSION['insert']="inserted";
        header("location:Complaints.php");
    }
    else {

        echo "Unable To Insert";
    }
}


//for view complains on admin panel page
if(isset($_GET['comphostel'])){
    $_SESSION['comphostel'] = $_GET['comphostel'];
   header("location:ViewComplains.php");
}

if(isset($_GET['comptype'])){
    $_SESSION['comptype'] = $_GET['comptype'];
    echo "{$_SESSION['selected_']}";
   header("location:ViewComplains.php");
}

if(isset($_POST['date'])){
    $_SESSION['FetchDate'] = $_POST['date'];
    echo "{$_SESSION['FetchDate']}";
    header("location:ViewComplains.php");
}


function getComplainDetails(){
    $type = $_SESSION['comptype'];
    $hostel = $_SESSION['comphostel'];
    $date = $_SESSION['FetchDate'];
global $connection;
    if(isset($_SESSION['comptype'])) {
        $get_record = "select c.*,s.studentName,s.room,s.studentHostel from complaints c,insertstudentprofile s where c.studentid=s.studentid and c.ComplainType='$type' ORDER BY  ComplainID desc limit 10";
        $run = mysqli_query($connection, $get_record);
        unset($_SESSION['comptype']);
    }
    else if(isset($_SESSION['comphostel'])) {
        $get_record = "select c.*,s.studentName,s.room,s.studentHostel from complaints c,insertstudentprofile s where c.studentid=s.studentid and s.studentHostel='$hostel' ORDER BY  ComplainID desc limit 10";
        $run = mysqli_query($connection, $get_record);
        unset($_SESSION['comphostel']);
    }

    else if(isset($_SESSION['FetchDate'])){
        $get_record = "select c.*,s.studentName,s.room,s.studentHostel from complaints c,insertstudentprofile s where c.studentid=s.studentid and c.Date like '$date%' ORDER BY  ComplainID desc limit 10";
        $run = mysqli_query($connection, $get_record);
        unset($_SESSION['FetchDate']);
    }
    else{
        $get_record = "select c.*,s.studentName,s.room,s.studentHostel from complaints c,insertstudentprofile s where c.studentid=s.studentid ORDER BY  ComplainID desc limit 10";
        $run = mysqli_query($connection, $get_record);
    }
        while ($each_record = mysqli_fetch_array($run)){
            $Student_ID = $each_record['studentid'];
            $Complain_ID = $each_record['ComplainID'];
            $Complain_Type = $each_record['ComplainType'];
            $Complain_Text = $each_record['ComplainText'];
            $Complain_Date = $each_record['Date'];
            $Student_Name  = $each_record['studentName'];
            $Room_No  = $each_record['room'];
            $Hostel= $each_record['studentHostel'];
            $status = mysqli_query($connection, "select ViewBy,Status,ComplainID from complaints where ComplainID=$Complain_ID");
            while ($each_record = mysqli_fetch_array($status)){
                $status_ = $each_record['Status'];
                $ViewBy  = $each_record['ViewBy'];

                }

            echo "
            <tr><td> $Complain_ID </td>
            <td> $Student_Name </td>
            <td> $Room_No </td>
            <td> $Complain_Type </td>
            <td> $Complain_Date </td>
            <td> $Hostel </td>
            <td><a id='view' href='ComplainsDisplay.php?id=$Complain_ID & room=$Room_No & name=$Student_Name & text=$Complain_Text'>$status_</a></td>
            <td> $ViewBy </td>
            </tr>
        ";
        }



}




