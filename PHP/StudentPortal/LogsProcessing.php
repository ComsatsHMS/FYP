<?php
session_start();
include "../connection.php";
error_reporting(0);
if(isset($_POST['progress'])) {
    $id = $_GET['id'];

    $query = mysqli_query($connection, "update complaints set Status='Done' where ComplainID='$id'");
    header("location:http://localhost/FYP/PHP/StudentPortal/MyLog.php");
}

if(isset($_GET['SelectedLog'])){
    $_SESSION['SelectedLog'] = $_GET['SelectedLog'];
    echo "{$_SESSION['SelectedLog']}";
    header("location:http://localhost/FYP/PHP/StudentPortal/MyLog.php");
}
function getLogs()
{
    $selected = $_SESSION['SelectedLog'];
    $id       = $_SESSION['id'];
    global $connection;
if($selected=='Complains') {
    $get_record = "select ComplainID,ComplainType,ComplainText,Status,ViewBy from complaints where studentid='$id'";
    $run = mysqli_query($connection, $get_record);
    echo "<tr>
                                        <th>Complain ID</th>
                                        <th>Complain Type</th>
                                        <th>Complain Text</th>
                                        <th>Status</th>
                                        <th>View By</th>
                                        <th>Progress</th>
                                    </tr>";
    while ($each_record = mysqli_fetch_array($run)) {

        $Complain_ID = $each_record['ComplainID'];
        $Complain_Type = $each_record['ComplainType'];
        $Complain_Text = $each_record['ComplainText'];
        $Complain_Status = $each_record['Status'];
        $ViewBy = $each_record['ViewBy'];
        echo "
            <tr>
            <td> $Complain_ID </td>
            <td> $Complain_Type </td>
            <td> $Complain_Text </td>
            <td> $Complain_Status </td>
            <td> $ViewBy </td>
            <td><form action='LogsProcessing.php?id=$Complain_ID' method='POST' ><input type='submit' value='Mark Done' name='progress' "; if($Complain_Status=='Done'){echo "disabled";} echo"></form>
          </td>
            </tr>
        ";
    }
}
else{
    $get_record = "select * from applications where studentid='$id'";
    $run = mysqli_query($connection, $get_record);
    echo "<tr>
                                        <th>Application No.</th>
                                        <th>Application Type</th>
                                        <th>Application Text</th>
                                    </tr>";
    while ($each_record = mysqli_fetch_array($run)) {

        $Application_ID = $each_record['applicationNumber'];
        $Application_Type = $each_record['applicationtype'];
        $Application_Text = $each_record['details'];
        echo "
            <tr>
            <td> $Application_ID </td>
            <td> $Application_Type </td>
            <td> $Application_Text </td>
            </tr>
        ";
    }
}
}


?>