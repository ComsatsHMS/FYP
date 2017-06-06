
<?php
session_start();
include "../connection.php";
error_reporting(0);
if(isset($_GET['type'])){
    $_SESSION['type'] = $_GET['type'];
    header("Location:Notifications.php");
}
else if(isset($_POST['date'])){
    $_SESSION['date'] = $_POST['date'];
    header("Location:Notifications.php");
}
function getNotifications(){
    global $connection;
    $hostel = $_SESSION['hostelname'];
    if(isset($_SESSION['type'])){
        $type = $_SESSION['type'];
        $query=mysqli_query($connection,"select * from notification where notificationType='$type' AND hostelName='$hostel' ORDER  BY  number ASC");
        unset($_SESSION['type']);
    }
    else if(isset($_SESSION['date'])){
        $date = $_SESSION['date'];
        $query=mysqli_query($connection,"select * from notification where date='$date' and hostelName='$hostel' ORDER  BY  number ASC");
        unset($_SESSION['date']);
    }
    else{
        $query=mysqli_query($connection,"select * from notification hostelName='$hostel' ORDER  BY  number ASC ");
    }
    while($row=mysqli_fetch_array($query)){
        $id=$row['number'];
        $type=$row['notificationType'];
        $nameHostel=$row['hostelName'];
        $date=$row['date'];
        echo "
                                                    <tr>
                                                         <td ><a href='../StudentPortal/DisplayNotification.php?id=$id'>$id</a> </td>
                                                         <td>$type</td>
                                                         <td> $nameHostel</td>
                                                         <td>$date</td>
                                                         <td><a href='../StudentPortal/DisplayNotification.php?id=$id' id='view'>view</a></td>
                                                    </tr> ";
    }
}

?>