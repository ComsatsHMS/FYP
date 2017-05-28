
<?php
    session_start();
   include "../connection.php";

     if(isset($_GET['id'])){
        $value= $_GET['id'];
        $sql="delete from user_login WHERE userid=$value";
        $run = mysqli_query($connection, $sql);
        $sql="delete from users WHERE userid=$value";
        $run = mysqli_query($connection, $sql);
        header("location:List_Emoloyees.php");
      }
      else if(isset($_GET['id1'])){
          echo "pakistan";
         $value= $_GET['id1'];
         $sql="delete from users WHERE userid=$value";
         $run = mysqli_query($connection, $sql);
         header("location:Request.php");
      }
      else if(isset($_GET['id2'])){
         $value= $_GET['id2'];
         $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
         $charArray= str_split($chars);
         $size = strlen( $chars );
         for( $i = 0; $i < 10; $i++ ) {
            $str =array_rand($charArray);
            $result=$charArray[$str];
         }
          $result = "1234";
          $sel = "select * from users where userid ='$value'";
          $run =mysqli_query($connection,$sel);
          while($rec = mysqli_fetch_array($run)){
              $email = $rec['email'];
          }
         $insert = "insert into user_login VALUES ('$value','$email','$result')";
         mysqli_query($connection, $insert);
          $insert1 = "UPDATE   users SET status = TRUE WHERE userid='$value' ";

          mysqli_query($connection, $insert1);
          $insert2 = "insert into emp_rights VALUES ('$value','1','1','1','1','1','1','1','1','1','1')";
          mysqli_query($connection, $insert2);
          header("location:Request.php");
      }
     else if(isset($_POST['AddHostel'])){

         $HostelName = $_POST['NewHostel'];
         $HostelRooms = $_POST['TotalRooms'];
         $PersonsSpace = $_POST['TotalPersons'];

        $insert = mysqli_query($connection,"insert into hostelslist VALUES ('$HostelName','$HostelRooms','$PersonsSpace')");
         if($insert){
             $_SESSION['InsertHostel'] = "inserted";
         }
         else{
             $_SESSION['InsertHostel'] = "error";
         }
         header("location:AdminPortal.php");
     }
     else if(isset($_GET['delete'])){
         $HostelName = $_GET['delete'];
         $delete = mysqli_query($connection,"delete from hostelslist where HostelName='$HostelName'");
         header("location:AdminPortal.php");
     }
function getHostels(){
    global $connection;
        $run = mysqli_query($connection, "select * from HostelsList");
    while ($each_record = mysqli_fetch_array($run)) {
        $HostelName = $each_record['HostelName'];
        $TotalRooms = $each_record['TotalRooms'];
        $TotalPersons = $each_record['TotalSpace'];
        echo "
            <tr>
            <td> $HostelName </td>
            <td> $TotalRooms </td>
            <td> $TotalPersons </td>
            <td><a class='btn btn-danger' href='Admin_processing.php?delete=$HostelName'>Delete</a></td>
            </tr>
        ";
    }
}
?>





