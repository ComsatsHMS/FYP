
<?php
include "../connection.php";

print_r($_POST);


if(isset($_POST['submit'])){
    $file=$_FILES["upload"]["name"];




    move_uploaded_file( $_FILES['upload']['tmp_name'],"". $file);
    $insert="insert into notification VALUES ('','$file')";
    $transport=mysqli_query($conn,$insert);
    if($insert){

        echo "ture";
    }
    echo "pakistan";

}
