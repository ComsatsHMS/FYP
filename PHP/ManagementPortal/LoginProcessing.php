<?php
include "../connection.php";
session_start();
if(isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $query = mysqli_query($connection,"select * from officelogin");
    $numResults = mysqli_num_rows($query);
    $counter = 0;
    while ($db_data = mysqli_fetch_array($query)) {
        $_SESSION['PName'] = $db_data['Name'];
        $db_email          = $db_data['Email'];
        $db_password       = $db_data['Password'];
        echo "$db_email"."$db_password";
        if ($email == $db_email && $db_password == $password) {
                            header('Location:MainApplicationOffice.php');
                        }
        else if(++$counter == $numResults){
            $_SESSION['LoginError'] = "Error";
            header('Location:OfficeLogin.php');
        }
                }
}
else if(isset($_POST['SignUp'])) {
    print_r($_POST);
    $FName = $_POST['FName'];
    $LName = $_POST['LName'];
    $Email = $_POST['Email'];
    $Rank = $_POST['Rank'];
    $Address = $_POST['Address'];
    $ProfilePic=$_FILES["ProfilePic"]["name"];
    move_uploaded_file($_FILES["ProfilePic"]["tmp_name"],"../../IMAGES/".$ProfilePic);
    $PhoneNo = $_POST['PhoneNo'];
    $query = mysqli_query($connection, "insert into users VALUES ('','$FName' ,'$LName','$Email','$Rank','$Address','$ProfilePic','$PhoneNo')");
    if($query){
        $_SESSION['SignUp'] = "OK";
        header('Location:OfficeLogin.php');
    }else{
        $_SESSION['SignUp'] = "Error";
        header('Location:OfficeLogin.php');
    }
}
?>