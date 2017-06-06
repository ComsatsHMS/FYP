<?php
session_start();
include "../connection.php";
error_reporting(0);
if(isset($_POST['SignUp'])) {
    global $connection,$userid;
    print_r($_POST);
    $FName = $_POST['FName'];
    $LName = $_POST['LName'];
    $Email = $_POST['Email'];
    $Rank = $_POST['Rank'];
    $Hostel = $_POST['hostel'];
    $Address = $_POST['Address'];
    $ProfilePic=$_FILES["ProfilePic"]["name"];
    move_uploaded_file($_FILES["ProfilePic"]["tmp_name"],"../../IMAGES/".$ProfilePic);
    $PhoneNo = $_POST['PhoneNo'];
    $query = mysqli_query($connection,"insert into users VALUES ('','$FName' ,'$LName','$Email','$Rank','$Hostel','$Address','$ProfilePic','$PhoneNo','1')");
    if($query) {
        $select = "select userid from users where email='$Email'";
        $run = mysqli_query($connection, $select);
        while($get = mysqli_fetch_array($run)){
            $userid = $get['userid'];
        }
        $result = randomPassword();
        $insert = mysqli_query($connection, "insert into user_login VALUES ('$userid','$Email','$result')");
        if ($insert) {
            $insert2 = "insert into emp_rights VALUES ('$userid','1','1','1','1','1','1','1','1','1','1')";
            $final = mysqli_query($connection, $insert2);
            if ($final) {
                //send mail
                $regards = "{$_SESSION['name']}";
                $to = $Email;
                $subject = 'Account Update, Account created Sucessfully.';
                $message = '
        <html>
        <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
            <title></title>
        </head>
        <body>
            <div id="email-wrap">
            <p>Hy, <strong> ' . $FName . ' ' . $LName . '</strong></p>
            <p>This email is to inform you that, your account have been created.</p>
            <p>Below are your login details, Use these Login details to get access to Portal.</p>
            <p>Username:' . $Email . '</p>
             <p>Password:' . $result . '</p>
             <p>Thannks!!</p>
             <p>Best Regards,</p>
             <p>' . $regards . '</p>
            </div>
        </body>
        </html>';

                $from = "ahmadmukhtar@CHMS.gwiddle.co.uk";
                //$Bcc = "example@example.com";

                // To send HTML mail, the Content-type header must be set
                $headers = 'MIME-Version: 1.0' . "\r\n";
                $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

                // Additional headers
                $headers .= 'To: ' . $to . "\r\n";
                $headers .= 'From: ' . $from . "\r\n";
                //  $headers .= 'Bcc: '.$Bcc. "\r\n";

                // Send the email
                mail($to, $subject, $message, $headers);
            } else {
                $_SESSION['SignUp'] = "Error";
                header('Location:AddEmployeeAccount.php');
            }
        } else {
            $_SESSION['SignUp'] = "Error";
            header('Location:AddEmployeeAccount.php');
        }
        $_SESSION['SignUp'] = "OK";
        header('Location:AddEmployeeAccount.php');
    }else{
        $_SESSION['SignUp'] = "Error";
        header('Location:AddEmployeeAccount.php');
    }
}
function randomPassword() {
    $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
    $pass = array(); //remember to declare $pass as an array
    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
    for ($i = 0; $i < 8; $i++) {
        $n = rand(0, $alphaLength);
        $pass[] = $alphabet[$n];
    }
    return implode($pass); //turn the array into a string
}
?>