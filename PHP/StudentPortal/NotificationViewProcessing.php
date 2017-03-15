
<?php
session_start();
include "../connection.php";
error_reporting(0);
$id;
$file;
$hostelName=$_GET['selected_'];
$notificationType= $_GET['select'];
if(isset($hostelName)){
    $_SESSION['hostel']=$hostelName;
    header("Location:http://localhost/fyp/php/StudentPortal/Notifications.php");
}
if(isset($notificationType)){
    $_SESSION['type']=$notificationType;
    header("Location:http://localhost/fyp/php/StudentPortal/Notifications.php");
}
echo $_POST['date'];
if(isset($_POST['date'])){
    $hostelName=$_GET['selected_'];
    $notificationType= $_GET['select'];
    echo $_SESSION['hostel'];
    echo $_SESSION['type'];

}
echo "$hostelName";
echo "$notificationType";
function viewnotification(){
    global $connection;
    $column= array();
}



    /*
$column = array()
$query = mysql_query("SELECT * FROM table ORDER BY id ASC");
while($row = mysql_fetch_array($query)){
    $column[] = $row[$key]
}
Then pass $column to your view(HTML)

*/
