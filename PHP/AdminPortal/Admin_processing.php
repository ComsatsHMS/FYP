
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
          echo "pakistan";
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
          header("location:http://localhost/FYP/PHP/AdminPortal/Request.php");




      }
?>





