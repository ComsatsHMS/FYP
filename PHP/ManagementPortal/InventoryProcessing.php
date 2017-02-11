<?php
session_start();
include("../connection.php");
error_reporting(0);
if(isset($_POST['AddItem'])) {
    print_r($_POST);

    $NewItem = $_POST['NewItem'];
    $query = mysqli_query($connection, "insert into messitems VALUES ('' ,'$NewItem')");
    if ($query) {
        $run = mysqli_query($connection, "select ItemNo from messitems where ItemName='$NewItem'");
        while ($each_record = mysqli_fetch_array($run)) {

            $ItemNo = $each_record['ItemNo'];

            $query = mysqli_query($connection, "insert into balance VALUES ('$ItemNo' ,'0','0','0',CURRENT_DATE )");

        }
        echo "Inserted";
    }
}
else if(isset($_POST['Update'])) {
    print_r($_POST);

    $ItemNo = $_POST['ItemNo'];
    $ItemName = $_POST['ItemName'];
    $UnitsPurchased = $_POST['UnitsPurchased'];
    $UnitCost = $_POST['UnitCost'];
    $TotalCost = $_POST['TotalCost'];

    $CalculatedCost = $UnitsPurchased * $UnitCost;

    echo "$CalculatedCost";
    $query = mysqli_query($connection, " select ItemName from messitems where ItemNo = '$ItemNo'");
    $each_record = mysqli_fetch_array($query);
    $FetchedItemName = $each_record['ItemName'];
    echo "$FetchedItemName";
    if ($FetchedItemName == $ItemName) {

        if ($TotalCost == $CalculatedCost) {
            $query = mysqli_query($connection, "insert into purchase VALUES ('$ItemNo','$UnitsPurchased','$UnitCost','$TotalCost',CURRENT_DATE )");

            if ($query) {
                $run = mysqli_query($connection, "select Units,UnitCost,TotalCost from balance where ItemNo='$ItemNo' ORDER BY ItemNo DESC limit 1");
                $each_record = mysqli_fetch_array($run);

                $Units_ = $each_record['Units'];
                $UnitCost_ = $each_record['UnitCost'];
                $TotalCost_ = $each_record['TotalCost'];
                $Units_ = $Units_ + $UnitsPurchased;
                $UnitsCost_ = $UnitCost;
                $TotalCost_ = $TotalCost_ + $TotalCost;
                $query = mysqli_query($connection, "insert into balance VALUES ('$ItemNo' ,'$Units_','$UnitCost_','$TotalCost_',CURRENT_DATE )");


                echo "Inserted";


            } else {
                echo "Cost Not matched";
            }
        }

    }
    else{
        echo "Item No or Item Name Mismatched";
    }
}

