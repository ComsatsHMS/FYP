
<?php

   include "../connection.php";

     if(isset($_GET['id'])){
        $value= $_GET['id'];
        $sql="delete from user_login WHERE userid=$value";
        $run = mysqli_query($connection, $sql);
        $sql="delete from users WHERE userid=$value";
        $run = mysqli_query($connection, $sql);
        header("location:http://localhost/FYP/PHP/AdminPortal/List_Emoloyees.php");
      }
      else if(isset($_GET['id1'])){
         $value= $_GET['id1'];
         $sql="delete from users WHERE userid=$value";
         $run = mysqli_query($connection, $sql);
         header("location:http://localhost/FYP/PHP/AdminPortal/Request.php");
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
         $insert = "insert into user_login VALUES ('$value','$email','$result')";
         mysqli_query($connection, $insert);
          $insert1 = "UPDATE   users SET status = TRUE WHERE userid='$value' ";

          mysqli_query($connection, $insert1);
          header("location:http://localhost/FYP/PHP/AdminPortal/Request.php");




      }
?>





