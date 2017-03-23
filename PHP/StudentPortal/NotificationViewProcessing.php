
<?php
session_start();
include "../connection.php";
error_reporting(0);
if(isset($_GET['hostelname'])){
    $_SESSION['hostel'] = $_GET['hostelname'];
    echo "{$_SESSION['hostel']}";
    header("Location:http://localhost/fyp/php/StudentPortal/Notifications.php");
}
else if(isset($_GET['type'])){
    $_SESSION['type'] = $_GET['type'];
    header("Location:http://localhost/fyp/php/StudentPortal/Notifications.php");
}
else if(isset($_POST['date'])){
    $_SESSION['date'] = $_POST['date'];
    header("Location:http://localhost/fyp/php/StudentPortal/Notifications.php");
}
function getNotifications(){
    global $connection;
    if(isset($_SESSION['hostel'])){
        $hostel = $_SESSION['hostel'];
        $query=mysqli_query($connection,"select * from notification where hostelName='$hostel' ORDER  BY  number ASC");
        unset($_SESSION['hostel']);
    }
    else if(isset($_SESSION['type'])){
        $type = $_SESSION['type'];
        $query=mysqli_query($connection,"select * from notification where notificationType='$type' ORDER  BY  number ASC");
        unset($_SESSION['type']);
    }
    else if(isset($_SESSION['date'])){
        $date = $_SESSION['date'];
        $query=mysqli_query($connection,"select * from notification where date='$date' ORDER  BY  number ASC");
        unset($_SESSION['date']);
    }
    else{
        $query=mysqli_query($connection,"select * from notification ORDER  BY  number ASC ");
    }
    while($row=mysqli_fetch_array($query)){
        $id=$row['number'];
        $type=$row['notificationType'];
        $nameHostel=$row['hostelName'];
        $date=$row['date'];
        echo "
                                                    <tr>
                                                         <td ><a href='DisplayNotification.php?id=$id'>$id</a> </td>
                                                         <td>$type</td>
                                                         <td> $nameHostel</td>
                                                         <td>$date</td>
                                                         <td><a href='DisplayNotification.php?id=$id'>view</a></td>
                                                    </tr> ";
    }
}

?>