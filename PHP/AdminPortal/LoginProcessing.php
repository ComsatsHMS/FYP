<?php
include "../connection.php";
session_start();
print_r($_POST);
if(isset($_POST['submit'])) {
    global $connection;
    $email = $_POST['email'];
    $password = $_POST['password'];
    $query = mysqli_query($connection,"select * from adminlogin");
    $numResults = mysqli_num_rows($query);
    $counter = 0;
    while ($db_data = mysqli_fetch_array($query)) {
        $db_email          = $db_data['email'];
        $db_password       = $db_data['password'];
        $db_userid         = $db_data['userid'];
        if ($email == $db_email && $db_password == $password) {
            $query1 = mysqli_query($connection,"select * from adminprofile");
            while ($data = mysqli_fetch_array($query1)) {
                $usrid = $data['userid'];
                if ($db_userid == $usrid) {
                    $_SESSION['UserId'] = $usrid;
                    $_SESSION['name']=$data['name'];
                    $_SESSION['email']=$data['email'];
                    $_SESSION['role']=$data['role'];
                    $_SESSION['UserPic'] = $data['picture'];
                    $_SESSION['address']=$data['address'];
                    $_SESSION['phone']=$data['phone_no'];
                    header('Location:Profile.php');
                    $_SESSION['Login'] = "OK";
                }
            }
        }
        else if(++$counter == $numResults){
            $_SESSION['LoginError'] = "Error";
            header('Location:AdminLogin.php');
        }
    }

}
?>