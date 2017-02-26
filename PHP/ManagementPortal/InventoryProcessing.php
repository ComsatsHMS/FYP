<?php
error_reporting(0);
session_start();
include("../connection.php");

function getItems(){
    global $connection;
    if(isset($_POST['ItemName'])) {

        $search = $_POST['ItemName'];
        $run = mysqli_query($connection, "select * from messitems where ItemName like '%$search%'");
    }
    else{
        $run = mysqli_query($connection, "select ItemNo,ItemName from messitems");
    }
        while ($each_record = mysqli_fetch_array($run)) {

            $ItemNo = $each_record['ItemNo'];
            $ItemName = $each_record['ItemName'];

        }
        echo "
            <tr><td> $ItemNo </td>
            <td> $ItemName </td>
            </tr>
        ";
}
function getBalance(){
    global $connection;

    if(isset($_POST['Search'])) {
        $StartDate = $_POST['StartDate'];
        $EndDate = $_POST['EndDate'];
        $run = mysqli_query($connection, "select m.ItemNo,m.ItemName,b.* from messitems m,balance b where m.ItemNo=b.ItemNo and b.Date>='$StartDate' and b.Date<= '$EndDate'");
    }
    else if(isset($_POST['SearchByItemNo'])){
        $ItemNo = $_POST['SearchItemNo'];
        $run = mysqli_query($connection, "select m.ItemNo,m.ItemName,b.* from messitems m,balance b where m.ItemNo=b.ItemNo and b.ItemNo='$ItemNo'");
    }
      else{
            $run = mysqli_query($connection, "select m.ItemNo,m.ItemName,b.* from messitems m,balance b where m.ItemNo=b.ItemNo ORDER BY  b.ItemNo desc limit 15");
        }
        while ($each_record = mysqli_fetch_array($run)){
            $ItemNo = $each_record['ItemNo'];
            $ItemName = $each_record['ItemName'];
            $Units=  $each_record['Units'];
            $UnitCost=  $each_record['UnitCost'];
            $TotalCost=  $each_record['TotalCost'];
            $Date=  $each_record['Date'];
            echo"
                                        <tr>
                                        <td>  $ItemNo  </td>
                                        <td>  $ItemName   </td>
                                        <td>  $Units   </td>
                                        <td>  $UnitCost   </td>
                                        <td>  $TotalCost   </td>
                                        <td>  $Date  </td>
                                        </tr>";

    }
}
function getPurchasedHistory(){
    global $connection;


    if(isset($_POST['search'])) {
        $StartDate = $_POST['StartDate'];
        $EndDate = $_POST['EndDate'];
        $run = mysqli_query($connection, "select m.ItemNo,m.ItemName,p.* from messitems m,purchase p where m.ItemNo=p.ItemNo and p.Date>='$StartDate' and p.Date<='$EndDate'");
    }
    else if(isset($_POST['SearchByItemNo'])){

        $ItemNo = $_POST['SearchItemNo'];
        $run = mysqli_query($connection, "select m.ItemNo,m.ItemName,p.* from messitems m,purchase p where m.ItemNo=p.ItemNo and p.ItemNo='$ItemNo'");
    }
    else{
        $run = mysqli_query($connection, "select m.ItemNo,m.ItemName,p.* from messitems m,purchase p where m.ItemNo=p.ItemNo ORDER BY  p.ItemNo desc limit 15");
    }
        while ($each_record = mysqli_fetch_array($run)){
            $ItemNo = $each_record['ItemNo'];
            $ItemName = $each_record['ItemName'];
            $Units=  $each_record['Units'];
            $UnitCost=  $each_record['UnitsCost'];
            $TotalCost=  $each_record['TotalCost'];
            $Date=  $each_record['Date'];
            echo"
                                        <tr>
                                        <td>  $ItemNo  </td>
                                        <td>  $ItemName   </td>
                                        <td>  $Units   </td>
                                        <td>  $UnitCost   </td>
                                        <td>  $TotalCost   </td>
                                        <td>  $Date  </td>
                                        </tr>";
        }
}
function getUsedHistory(){
    global $connection;


    if(isset($_POST['search'])) {
        $StartDate = $_POST['StartDate'];
        $EndDate = $_POST['EndDate'];
        $run = mysqli_query($connection, "select m.ItemNo,m.ItemName,c.* from messitems m,cgs c where m.ItemNo=c.ItemNo and c.Date>='$StartDate' and c.Date<='$EndDate'");
    }
    else if(isset($_POST['SearchByItemNo'])){
        $ItemNo = $_POST['SearchItemNo'];
        $run = mysqli_query($connection, "select m.ItemNo,m.ItemName,c.* from messitems m,cgs c where m.ItemNo=c.ItemNo and c.ItemNo='$ItemNo'");
    }
    else{
        $run = mysqli_query($connection, "select m.ItemNo,m.ItemName,c.* from messitems m,cgs c where m.ItemNo=c.ItemNo ORDER BY  c.ItemNo desc limit 15");
    }


    while ($each_record = mysqli_fetch_array($run)){
        $ItemNo = $each_record['ItemNo'];
        $ItemName = $each_record['ItemName'];
        $Units=  $each_record['Units'];
        $UnitCost=  $each_record['UnitCost'];
        $TotalCost=  $each_record['TotalCost'];
        $Date=  $each_record['Date'];
        $UsedFor=  $each_record['UsedFor'];
        echo"
                                        <tr>
                                        <td>  $ItemNo  </td>
                                        <td>  $ItemName   </td>
                                        <td>  $Units   </td>
                                        <td>  $UnitCost   </td>
                                        <td>  $TotalCost   </td>
                                        <td>  $Date  </td>
                                        <td>  $UsedFor </td>
                                        </tr>";
    }

}
if(isset($_POST['AddItem'])) {
    $NewItem = $_POST['NewItem'];
    if ($_POST['NewItem'] != NULL) {
        $query = mysqli_query($connection, "insert into messitems VALUES ('' ,'$NewItem')");
        if ($query) {
            $run = mysqli_query($connection, "select ItemNo from messitems where ItemName='$NewItem'");
            while ($each_record = mysqli_fetch_array($run)) {

                $ItemNo = $each_record['ItemNo'];

                $query = mysqli_query($connection, "insert into balance VALUES ('$ItemNo' ,'0','0','0',CURRENT_DATE )");

            }
            $_SESSION['InsertItem'] = "inserted";
        } else {
            $_SESSION['InsertItem'] = "error";
        }
    }else {
        $_SESSION['InsertItem'] = "error";
    }
    header("location:http://localhost/FYP/PHP/ManagementPortal/InventoryItems.php");
}
else if(isset($_POST['Update'])) {
    print_r($_POST);

    $ItemNo = $_POST['ItemNo'];
    $ItemName = $_POST['ItemName'];
    $UnitsPurchased = $_POST['UnitsPurchased'];
    $UnitCost = $_POST['UnitCost'];
    $TotalCost = $_POST['TotalCost'];
    $CalculatedCost = $UnitsPurchased * $UnitCost;
    $query = mysqli_query($connection, " select ItemName from messitems where ItemNo = '$ItemNo'");
    $each_record = mysqli_fetch_array($query);
    $FetchedItemName = $each_record['ItemName'];
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
                $UnitCost_ = $UnitCost;
                $TotalCost_ = $TotalCost_ + $TotalCost;
                $query = mysqli_query($connection, "insert into balance VALUES ('$ItemNo' ,'$Units_','$UnitCost_','$TotalCost_',CURRENT_DATE )");
                $_SESSION['BalanceUpdate']="Ok";
            } else{
                $_SESSION['BalanceUpdate']="error";
            }
        }else {
            $_SESSION['BalanceUpdate']="cost";
        }

    }
    else{
        $_SESSION['BalanceUpdate']="mismatch";
    }
    header("location:http://localhost/FYP/PHP/ManagementPortal/ViewInventory.php");
}
//Balance subtracting ... for used items
else if(isset($_POST['Update_'])) {
    $ItemNo = $_POST['ItemNo_'];
    $ItemName = $_POST['ItemName_'];
    $UnitsUsed = $_POST['UnitsUsed_'];
    $UnitCost = $_POST['UnitCost_'];
    $TotalCost = $_POST['TotalCost_'];
    $UsedFor = $_POST['UsedFor_'];
    $CalculatedCost = $UnitsUsed * $UnitCost;
    $query = mysqli_query($connection, " select ItemName from messitems where ItemNo = '$ItemNo'");
    $each_record = mysqli_fetch_array($query);
    $FetchedItemName = $each_record['ItemName'];
    if ($FetchedItemName == $ItemName) {

        if ($TotalCost == $CalculatedCost) {
            $query = mysqli_query($connection, "insert into cgs VALUES ('$ItemNo','$UnitsUsed','$UnitCost','$TotalCost',CURRENT_DATE,'$UsedFor' )");

            if ($query) {
                $run = mysqli_query($connection, "select Units,UnitCost,TotalCost from balance where ItemNo='$ItemNo' ORDER BY ItemNo DESC limit 1");
                $each_record = mysqli_fetch_array($run);

                $Units_ = $each_record['Units'];
                $UnitCost_ = $each_record['UnitCost'];
                $TotalCost_ = $each_record['TotalCost'];
                $Units_ = $Units_ - $UnitsUsed;
                $UnitCost_ = $UnitCost;
                $TotalCost_ = $TotalCost_ - $TotalCost;
                $query = mysqli_query($connection, "insert into balance VALUES ('$ItemNo' ,'$Units_','$UnitCost_','$TotalCost_',CURRENT_DATE )");


                $_SESSION['BalanceUpdate']="Ok";



            } else{
                $_SESSION['BalanceUpdate']="error";
            }
        }else {
            $_SESSION['BalanceUpdate']="cost";
        }

    }
    else{
        $_SESSION['BalanceUpdate']="mismatch";
    }
    header("location:http://localhost/FYP/PHP/ManagementPortal/ViewInventory.php");
}

/*
 *
 *
 *
 */