<?php
    include ("../connection.php");

    $check=$_GET['id'];

    $query=("select notice from notification where number=$check");
    $transpot=mysqli_query($connection,$query);
while($db=mysqli_fetch_array($transpot)){
        $file=$db['notice'];


    }


    echo file_get_contents("mydocs/"."$file ");

?>