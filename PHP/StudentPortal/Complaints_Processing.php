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
        header("location:http://localhost/FYP/PHP/StudentPortal/Complaints.php");
    }
    else {

        echo "Unable To Insert";
    }
}


//for view complains on admin panel page
if(isset($_GET['selected'])){
    $_SESSION['selected'] = $_GET['selected'];
   header("location:http://localhost/FYP/PHP/StudentPortal/ViewComplains.php");
}

if(isset($_GET['selected_'])){
    $_SESSION['selected_'] = $_GET['selected_'];
    echo "{$_SESSION['selected_']}";
   header("location:http://localhost/FYP/PHP/StudentPortal/ViewComplains.php");
}

if(isset($_POST['date'])){
    $_SESSION['FetchDate'] = $_POST['date'];
    echo "{$_SESSION['FetchDate']}";
    header("location:http://localhost/FYP/PHP/StudentPortal/ViewComplains.php");
}


function getComplainDetails(){
$selected_ = $_SESSION['selected_'];

    $selected = $_SESSION['selected'];

global $connection;
    if(isset($_SESSION['selected_'])){
        echo "Below are the results for Choosen Type: "."$selected_";
        $get_record = "select c.*,s.studentName,s.room,s.studentHostel from complaints c,insertstudentprofile s where c.studentid=s.studentid and c.ComplainType='$selected_' ORDER BY  ComplainID desc limit 5";
        $run = mysqli_query($connection, $get_record);
        while ($each_record = mysqli_fetch_array($run)){

            $Complain_ID = $each_record['ComplainID'];
            $Complain_Type = $each_record['ComplainType'];
            $Complain_Text = $each_record['ComplainText'];
            $Complain_Date = $each_record['Date'];
            $Student_Name  = $each_record['studentName'];
            $Room_No  = $each_record['room'];
            $Hostel= $each_record['studentHostel'];
            echo "
            <tr><td> $Complain_ID </td>
            <td> $Student_Name </td>
            <td> $Room_No </td>
            <td> $Complain_Type </td>
            <td> $Complain_Date </td>
            <td> $Hostel </td>
            <td> <button type='button'  class='btn btn-success'><a href='ComplainsDisplay.php?id=$Complain_ID & room=$Room_No & name=$Student_Name & text=$Complain_Text'>View</a> </button> </td>
            </tr>
        ";
        }
    }

  else if(isset($_SESSION['selected'])){
        echo "Below are the results for Choosen Type: "."$selected";
        $get_record = "select c.*,s.studentName,s.room,s.studentHostel from complaints c,insertstudentprofile s where c.studentid=s.studentid and s.studentHostel='$selected' ORDER BY  ComplainID desc limit 5";
        $run = mysqli_query($connection, $get_record);
        while ($each_record = mysqli_fetch_array($run)){

            $Complain_ID = $each_record['ComplainID'];
            $Complain_Type = $each_record['ComplainType'];
            $Complain_Text = $each_record['ComplainText'];
            $Complain_Date = $each_record['Date'];
            $Student_Name  = $each_record['studentName'];
            $Room_No  = $each_record['room'];
            $Hostel= $each_record['studentHostel'];
            echo "
            <tr><td> $Complain_ID </td>
            <td> $Student_Name </td>
            <td> $Room_No </td>
            <td> $Complain_Type </td>
            <td> $Complain_Date </td>
            <td> $Hostel </td>
            <td> <button type='button'  class='btn btn-success'><a href='ComplainsDisplay.php?id=$Complain_ID & room=$Room_No & name=$Student_Name & text=$Complain_Text'>View</a> </button> </td>
            </tr>
        ";
        }
    }

    else if(isset($_SESSION['FetchDate'])){
        $date = $_SESSION['FetchDate'];
        echo "Below are the results for Date: "."$date";
        $get_record = "select c.*,s.studentName,s.room,s.studentHostel from complaints c,insertstudentprofile s where c.studentid=s.studentid and c.Date like '$date%' ORDER BY  ComplainID desc limit 5";
        $run = mysqli_query($connection, $get_record);
        while ($each_record = mysqli_fetch_array($run)){
``
            $Complain_ID = $each_record['ComplainID'];
            $Complain_Type = $each_record['ComplainType'];
            $Complain_Text = $each_record['ComplainText'];
            $Complain_Date = $each_record['Date'];
            $Student_Name  = $each_record['studentName'];
            $Room_No  = $each_record['room'];
            $Hostel= $each_record['studentHostel'];
            echo "
            <tr><td> $Complain_ID </td>
            <td> $Student_Name </td>
            <td> $Room_No </td>
            <td> $Complain_Type </td>
            <td> $Complain_Date </td>
              <td> $Hostel </td>
            <td> <button type='button'  class='btn btn-success'><a href='ComplainsDisplay.php?id=$Complain_ID & room=$Room_No & name=$Student_Name & text=$Complain_Text'>View</a> </button> </td>
            </tr>
        ";
        }

    }
    else{
        $get_record = "select c.*,s.studentName,s.room,s.studentHostel from complaints c,insertstudentprofile s where c.studentid=s.studentid ORDER BY  ComplainID desc limit 5";
        $run = mysqli_query($connection, $get_record);
        while ($each_record = mysqli_fetch_array($run)){

            $Complain_ID = $each_record['ComplainID'];
            $Complain_Type = $each_record['ComplainType'];
            $Complain_Text = $each_record['ComplainText'];
            $Complain_Date = $each_record['Date'];
            $Student_Name  = $each_record['studentName'];
            $Room_No  = $each_record['room'];
            $Hostel= $each_record['studentHostel'];
            echo "
            <tr><td> $Complain_ID </td>
            <td> $Student_Name </td>
            <td> $Room_No </td>
            <td> $Complain_Type </td>
            <td> $Complain_Date </td>
              <td> $Hostel </td>
            <td> <button type='button'  class='btn btn-success'><a href='ComplainsDisplay.php?id=$Complain_ID & room=$Room_No & name=$Student_Name & text=$Complain_Text'>View</a> </button> </td>
            </tr>
        ";
        }
    }


}




