<?php
include "../connection.php";
session_start();
print_r($_POST);
if(isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $query = mysqli_query($connection,"select * from user_login");
    $numResults = mysqli_num_rows($query);
    $counter = 0;
    while ($db_data = mysqli_fetch_array($query)) {
        $db_email          = $db_data['email'];
        $db_password       = $db_data['password'];
        $db_userid = $db_data['userid'];
        if ($email == $db_email && $db_password == $password) {

            $query1 = mysqli_query($connection,"select * from users");
            while ($data = mysqli_fetch_array($query1)) {
                $usrid = $data['userid'];

                if ($db_userid == $usrid) {
                    $_SESSION['UserId'] = $usrid;
                    $_SESSION['UserFirstName'] = $data['first_name'];
                    $_SESSION['UserLastName'] = $data['last_name'];
                    $_SESSION['UserPic'] = $data['picture'];
                    $_SESSION['UserRank'] = $data['role'];
                    $_SESSION['UserHostel'] = $data['hostel'];
                }
            }
            $query2 = mysqli_query($connection,"select * from emp_rights");
            while ($row = mysqli_fetch_array($query2)) {
                $urid = $row['userid'];
                if ($db_userid == $urid) {
                    $_SESSION['HostelApplications'] = $row['hostel_app'];
                    $_SESSION['Allotment'] = $row['allotment'];
                    $_SESSION['StudentsList'] = $row['student_list'];
                    $_SESSION['Complains'] = $row['view_com'];
                    $_SESSION['Applications'] = $row['view_app'];
                    $_SESSION['Voting'] = $row['voting'];
                    $_SESSION['Statistics'] = $row['statics'];
                    $_SESSION['Fine'] = $row['fee'];
                    $_SESSION['Inventory'] = $row['inventry'];
                    $_SESSION['Parents'] = $row['parents'];
                    header('Location:MainApplicationOffice.php');
                }
            }
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
    $hostel = $_POST['hostel'];
    $Address = $_POST['Address'];
    $ProfilePic=$_FILES["ProfilePic"]["name"];
    move_uploaded_file($_FILES["ProfilePic"]["tmp_name"],"../../IMAGES/".$ProfilePic);
    $PhoneNo = $_POST['PhoneNo'];
    $query = mysqli_query($connection, "insert into users VALUES ('','$FName' ,'$LName','$Email','$Rank','$hostel','$Address','$ProfilePic','$PhoneNo','')");
    if($query){
        $_SESSION['SignUp'] = "OK";
        header('Location:OfficeLogin.php');
    }else{
        $_SESSION['SignUp'] = "Error";
        header('Location:OfficeLogin.php');
    }
}
?>