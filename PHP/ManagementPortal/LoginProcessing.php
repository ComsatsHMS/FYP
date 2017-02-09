<?php
include "../connection.php";
session_start();
print_r($_POST);
if(isset($_POST['submit2'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $query = "select Password from officelogin where  Email='$email'";
    $result = mysqli_query($connection, $query);
    $db_password;
    while ($db_data = mysqli_fetch_array($result)) {
        $db_password = $db_data['Password'];
        echo "$db_password";
    }
    if ($db_password == $password) {
        $query = mysqli_query($connection, "select Name from officelogin where  Email='$email'");
        while ($db_data = mysqli_fetch_array($query)) {
            $_SESSION['PName'] = $db_data['Name'];
            header('Location:MainApplicationOffice.php');
        }


    } else {
        echo "not login";
    }
}
?>