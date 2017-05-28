<?php
session_start();
include "../connection.php";
if(isset($_POST['submit'])) {

    $selected = $_POST['optradio'];

    if ($selected == "Breakfast") {
        $update = "update voting set Breakfast =  Breakfast+1";
        $query = mysqli_query($connection, $update);
    } else if ($selected == "Lunch") {
        $update1 = "update voting set Lunch =  Lunch+1";
        $query1 = mysqli_query($connection, $update1);
    }else if ($selected == "both") {
        $update2 = "update voting set LunchBreakfast =  LunchBreakfast+1";
        $query2 = mysqli_query($connection, $update2);
    }
    $flag = "true";
    $update1 = "update insertstudentprofile set flag =  'true'";
    $query1 = mysqli_query($connection, $update1);
    header("location:Voting.php");

}
if(isset($_POST['submit_1'])){

    $Monday      = $_POST['Monday'];
    $Tuesday     = $_POST['Tuesday'];
    $Wednesday   = $_POST['Wednesday'];
    $Thrusday    = $_POST['Thrusday'];
    $Friday      = $_POST['Friday'];
    $Saturday    = $_POST['Saturday'];
    $Sunday      = $_POST['Sunday'];

if($Monday){
    echo "Enter";

    $update = "update messmenu set $Monday =  $Monday+1 where Day='Monday'";
    $query = mysqli_query($connection, $update);

    if($query){
        echo "OK";
    }


}

    if($Tuesday){
        echo "Enter";

        $update = "update messmenu set $Tuesday =  $Tuesday+1 where Day='Tuesday'";
        $query = mysqli_query($connection, $update);

        if($query){
            echo "OK";
        }


    }

    if($Wednesday){
        echo "Enter";

        $update = "update messmenu set $Wednesday =  $Wednesday+1 where Day='Wednesday'";
        $query = mysqli_query($connection, $update);

        if($query){
            echo "OK";
        }


    }

    if($Thrusday){
        echo "Enter";

        $update = "update messmenu set $Thrusday =  $Thrusday+1 where Day='Thrusday'";
        $query = mysqli_query($connection, $update);

        if($query){
            echo "OK";
        }


    }

    if($Friday){
        echo "Enter";

        $update = "update messmenu set $Friday =  $Friday+1 where Day='Friday'";
        $query = mysqli_query($connection, $update);

        if($query){
            echo "OK";
        }


    }

    if($Saturday){
        echo "Enter";

        $update = "update messmenu set $Saturday =  $Saturday+1 where Day='Saturday'";
        $query = mysqli_query($connection, $update);

        if($query){
            echo "OK";
        }


    }

    if($Sunday){
        echo "Enter";

        $update = "update messmenu set $Sunday =  $Sunday+1 where Day='Sunday'";
        $query = mysqli_query($connection, $update);

        if($query){
            echo "OK";
        }


    }
    header("location:Voting.php");
}
if(isset($_POST['submit_2'])){

    $Monday      = $_POST['Monday'];
    $Tuesday     = $_POST['Tuesday'];
    $Wednesday   = $_POST['Wednesday'];
    $Thrusday    = $_POST['Thursday'];
    $Friday      = $_POST['Friday'];
    $Saturday    = $_POST['Saturday'];
    $Sunday      = $_POST['Sunday'];

    if($Monday){
        echo "Enter";

        $update = "update messmenub set $Monday =  $Monday+1 where Day='Monday'";
        $query = mysqli_query($connection, $update);

        if($query){
            echo "OK";
        }


    }

    if($Tuesday){
        echo "Enter";

        $update = "update messmenub set $Tuesday =  $Tuesday+1 where Day='Tuesday'";
        $query = mysqli_query($connection, $update);

        if($query){
            echo "OK";
        }


    }

    if($Wednesday){
        echo "Enter";

        $update = "update messmenub set $Wednesday =  $Wednesday+1 where Day='Wednesday'";
        $query = mysqli_query($connection, $update);

        if($query){
            echo "OK";
        }


    }

    if($Thrusday){
        echo "Enter";

        $update = "update messmenub set $Thrusday =  $Thrusday+1 where Day='Thrusday'";
        $query = mysqli_query($connection, $update);

        if($query){
            echo "OK";
        }


    }

    if($Friday){
        echo "Enter";

        $update = "update messmenub set $Friday =  $Friday+1 where Day='Friday'";
        $query = mysqli_query($connection, $update);

        if($query){
            echo "OK";
        }


    }

    if($Saturday){
        echo "Enter";

        $update = "update messmenub set $Saturday =  $Saturday+1 where Day='Saturday'";
        $query = mysqli_query($connection, $update);

        if($query){
            echo "OK";
        }


    }

    if($Sunday){
        echo "Enter";

        $update = "update messmenub set $Sunday =  $Sunday+1 where Day='Sunday'";
        $query = mysqli_query($connection, $update);

        if($query){
            echo "OK";
        }


    }
    header("location:Voting.php");
}
?>