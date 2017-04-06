<?php

include "../connection.php";
if(!isset($_POST['1'])){
    $value1=$_POST['h'];


    $insert1 = "UPDATE   emp_rights SET hostel_app=0 WHERE userid='$value1' ";

    mysqli_query($connection, $insert1);

}
if(!isset($_POST['2'])){
    $value1=$_POST['h'];

    $insert1 = "UPDATE   emp_rights SET allotment=0 WHERE userid='$value1' ";

    mysqli_query($connection, $insert1);

}
if(!isset($_POST['3'])){
    $value1=$_POST['h'];

    $insert1 = "UPDATE   emp_rights SET student_list=0 WHERE userid='$value1' ";

    mysqli_query($connection, $insert1);

}
if(!isset($_POST['4'])){
    $value1=$_POST['h'];

    $insert1 = "UPDATE   emp_rights SET  view_com=0 WHERE userid='$value1' ";

    mysqli_query($connection, $insert1);

}
if(!isset($_POST['5'])){
    $value1=$_POST['h'];

    $insert1 = "UPDATE   emp_rights SET  view_app=0 WHERE userid='$value1' ";

    mysqli_query($connection, $insert1);

}
if(!isset($_POST['6'])){
    $value1=$_POST['h'];

    $insert1 = "UPDATE   emp_rights SET  statics=0 WHERE userid='$value1' ";

    mysqli_query($connection, $insert1);

}
if(!isset($_POST['7'])){
    $value1=$_POST['h'];

    $insert1 = "UPDATE   emp_rights SET  voting=0 WHERE userid='$value1' ";

    mysqli_query($connection, $insert1);

}
if(!isset($_POST['8'])){
    $value1=$_POST['h'];

    $insert1 = "UPDATE   emp_rights SET   fee=0 WHERE userid='$value1' ";

    mysqli_query($connection, $insert1);

}
if(!isset($_POST['9'])){
    $value1=$_POST['h'];

    $insert1 = "UPDATE   emp_rights SET inventry=0 WHERE userid='$value1' ";

    mysqli_query($connection, $insert1);

}
if(!isset($_POST['10'])){
    $value1=$_POST['h'];

    $insert1 = "UPDATE   emp_rights SET  parents=0 WHERE userid='$value1' ";

    mysqli_query($connection, $insert1);

}

?>