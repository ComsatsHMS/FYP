<?php
session_start();
include "../connection.php";
//error_reporting(0);
$Hostel = array();global $connection;
                         $count=0;
$run = mysqli_query($connection,  "select * from hostelslist");
while ($each_record = mysqli_fetch_array($run)) {
   $Hostel[] = $each_record['HostelName'];
}
$_SESSION['list'] = $Hostel;
while($_SESSION['list'][$count]){
   echo "{$_SESSION['list'][$count]}";$count++;
}


