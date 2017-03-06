<?php
session_start();
include ("connection.php");
error_reporting(0);
$student_id = $_SESSION['studentid'];
$challan_no;
$student_name;
$room_no;
$issue_date;
$due_date;
$mess_bill;
$service_charges;
$gas_electric;
$internet_charges;
$water_bill;
$semester_dinner;
$month;
$application_no;

$query = "select applicationNumber,name from oldstudentform where studentid = '$student_id'";
$run = mysqli_query($connection,$query);
while($each_record = mysqli_fetch_array($run)){
    $application_no = $each_record['applicationNumber'];
    $student_name = $each_record['name'];
}
$query1 = "select roomNumber from hostel where applicationNumber = '$application_no'";
$run1 = mysqli_query($connection,$query1);
while($each_record = mysqli_fetch_array($run1)){
    $room_no = $each_record['roomNumber'];
}
$query2 = "select challanNo from studentmesschallanrecord where student_id = '$student_id'";
$run2 = mysqli_query($connection,$query2);
while($each_record = mysqli_fetch_array($run2)){
    $challan_no = $each_record['challanNo'];
}

$query3 = "select * from messchallan";
$run3 = mysqli_query($connection,$query3);
while($each_record = mysqli_fetch_array($run3)){
    $messdate = $each_record['issueDate'];
    $tmp= strtotime("$messdate");
    $current_month = date('M', time());
    $issuing_month = date('M', $tmp);
    if($current_month == $issuing_month){
        $issue_date =$each_record['issueDate'];
        $due_date =$each_record['dueDate'];
        $t_mess_bill =$each_record['messBill'];
        $t_service_charges =$each_record['serviceCharges'];
        $t_gas_electric =$each_record['suiElectric'];
        $t_internet_charges =$each_record['internetBill'];
        $t_water_bill =$each_record['waterBill'];
        $totalStudents = $each_record['totalStudents'];

        $mess_bill = $t_mess_bill / $totalStudents;
        $service_charges = $t_service_charges / $totalStudents;
        $gas_electric = $t_gas_electric / $totalStudents;
        $internet_charges = $t_internet_charges / $totalStudents;
        $water_bill = $t_water_bill / $totalStudents;
        $t_issue_date = strtotime("$issue_date");
        $month = date('M,y',$t_issue_date);
        $semester_dinner =$each_record['semesterDinner'];
    }
    $total = $mess_bill + $water_bill + $gas_electric + $internet_charges + $service_charges + $semester_dinner;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Mess Challan</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
       #wrapper{
           margin-left: 20pt;
           margin-right: 5pt;
           margin-bottom: 10pt;
           margin-top: 5pt;
       }
       #copy{
           text-align: center;
           font-weight: bold;
           font-size: 15pt;
           padding-bottom: 10pt;
           padding-top: 5pt;
       }
       #bank_name{
           text-align: center;
           font-weight: bold;
           font-size: 17pt;
       }
       #bank_branch{
           text-align: center;
           font-weight: bold;
           font-size: 13pt;
       }
       #account_no{
           text-align: center;
       }
    </style>

</head>
<body>
    <div id="wrapper">
        <table style="padding-left: 40pt">
            <tr style="min-width: 33%;">

                <td style="padding-right: 10pt ;border-right: 1pt dotted">
                    <table style="padding-left: 22.5pt;padding-right: 20pt ;border-bottom: 1pt solid; border-right: 1pt solid;">
                        <tr>
                            <td id="copy">
                                <h5>Bank Copy</h5>

                            </td>
                        </tr>
                        <tr>
                            <td id="bank_name">
                                <h5 >Habib Bank LTD</h5>
                            </td>
                        </tr>
                        <tr>
                            <td id="bank_branch">
                                <h5 >CIIT Campus Branch,Lahore.</h5>
                            </td>
                        </tr>
                        <tr>
                            <td id="account_no">
                                <h5 >Account No. 2305-70000667-03</h5>
                            </td>
                        </tr>
                        <br>
                        <tr>
                            <td>
                                <table style="min-height: 100pt">
                                    <tr>
                                        <td>
                                            <p>Issue Date</p><br>
                                            <p><?php {echo $issue_date;}?></p>
                                        </td>
                                        <td style="border: 1pt solid black">
                                            <h5 id="challan_no">Challan No</h5>
                                            <br>
                                            <h5 id="challan_no"><?php {echo $challan_no;}?></h5>
                                        </td>
                                        <td>
                                            <p>Due Date</p><br>
                                            <p><?php {echo $due_date;}?></p>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                    <table style="padding-right: 10pt ;border-bottom: 1pt solid; border-right: 1pt solid;">
                        <tr>
                            <td>

                                <img src="../IMAGES/CIITLogo_Plain.png" height="30pt" width="37pt">
                            </td>
                            <td style="padding-left: 5pt;padding-top: 30pt; text-align: center">
                                <h5 >Boys Hostel Mess
                                <br>COMSATS Institute of information<br>Technology Lahore</h5>
                            </td>
                        </tr>
                    </table>
                    <br>
                    <table style="border-bottom: 1pt solid">
                        <tr>
                            <td><b>Name:</b></td>
                            <td><?php {echo $student_name;}?></td>
                        </tr>
                        <tr>
                            <td><b>Reg. No</b></td>
                            <td><?php {echo $student_id;}?></td>
                        </tr>
                        <tr>
                            <td><b>Room No:</b></td>
                            <td><?php {echo $room_no;}?></td>
                        </tr>
                    </table>
                    <br>

                    <table style="align-content: center;">
                        <tr>
                            <td>Mess Bill(For the m/o <?php {echo $month;}?>)</td>
                            <td>Rs:</td>
                            <td><?php {echo $mess_bill;}?></td>
                        </tr>
                        <tr>
                            <td>Service Charges</td>
                            <td>Rs:</td>
                            <td><?php {echo $service_charges;}?></td>
                        </tr>
                        <tr>
                            <td>Internet Charges</td>
                            <td>Rs:</td>
                            <td><?php {echo $internet_charges;}?></td>
                        </tr>
                        <tr>
                            <td>Sui Gas & Electric Charges</td>
                            <td>Rs:</td>
                            <td><?php {echo $gas_electric;}?></td>
                        </tr>
                        <tr>
                            <td>Water Bill</td>
                            <td>Rs:</td>
                            <td><?php {echo $water_bill;}?></td>
                        </tr>
                        <tr>
                            <td>Semester Dinner</td>
                            <td>Rs:</td>
                            <td><?php {echo $semester_dinner;}?></td>
                        </tr>
                        <tr>
                            <td>Total</td>
                            <td>Rs:</td>
                            <td><?php {echo $total;}?></td>
                        </tr>
                    </table>
                    <br>
                    <div class="container">
                        <p>Amount in Words:</p><br>
                        <p>Ten Thousands Rupees only</p>
                        <br><br><br>
                        <p>Issuing Authority</p>
                    </div>

                </td>


                <td style="padding-left: 20pt;padding-right: 9.5pt ;border-right: 1pt dotted;border-left: 1pt dotted">
                    <table style="padding-left: 22pt;padding-right: 20.5pt ;border-left: 1pt solid;border-bottom: 1pt solid; border-right: 1pt solid;">
                        <tr>
                            <td id="copy">
                                <h5>Hostel Copy</h5>

                            </td>
                        </tr>
                        <tr>
                            <td id="bank_name">
                                <h5 >Habib Bank LTD</h5>
                            </td>
                        </tr>
                        <tr>
                            <td id="bank_branch">
                                <h5 >CIIT Campus Branch,Lahore.</h5>
                            </td>
                        </tr>
                        <tr>
                            <td id="account_no">
                                <h5 >Account No. 2305-70000667-03</h5>
                            </td>
                        </tr>
                        <br>
                        <tr>
                            <td>
                                <table style="min-height: 100pt">
                                    <tr>
                                        <td>
                                            <p>Issue Date</p><br>
                                            <p><?php {echo $issue_date;}?></p>
                                        </td>
                                        <td style="border: 1pt solid black">
                                            <h5 id="challan_no">Challan No</h5>
                                            <br>
                                            <h5 id="challan_no"><?php {echo $challan_no;}?></h5>
                                        </td>
                                        <td>
                                            <p>Due Date</p><br>
                                            <p><?php {echo $due_date;}?></p>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                    <table style="padding-right: 10pt ;border-left: 1pt solid;border-bottom: 1pt solid; border-right: 1pt solid;">
                        <tr>
                            <td>

                                <img src="../IMAGES/CIITLogo_Plain.png" height="30pt" width="37pt">
                            </td>
                            <td style="padding-left: 5pt;padding-top: 30pt; text-align: center">
                                <h5 >Boys Hostel Mess
                                    <br>COMSATS Institute of information<br>Technology Lahore</h5>
                            </td>
                        </tr>
                    </table>
                    <br>
                    <table style="border-bottom: 1pt solid">
                        <tr>
                            <td><b>Name:</b></td>
                            <td><?php {echo $student_name;}?></td>
                        </tr>
                        <tr>
                            <td><b>Reg. No</b></td>
                            <td><?php {echo $student_id;}?></td>
                        </tr>
                        <tr>
                            <td><b>Room No:</b></td>
                            <td><?php {echo $room_no;}?></td>
                        </tr>
                    </table>
                    <br>

                    <table style="align-content: center;">
                        <tr>
                            <td>Mess Bill(For the m/o <?php {echo $month;}?>)</td>
                            <td>Rs:</td>
                            <td><?php {echo $mess_bill;}?></td>
                        </tr>
                        <tr>
                            <td>Service Charges</td>
                            <td>Rs:</td>
                            <td><?php {echo $service_charges;}?></td>
                        </tr>
                        <tr>
                            <td>Internet Charges</td>
                            <td>Rs:</td>
                            <td><?php {echo $internet_charges;}?></td>
                        </tr>
                        <tr>
                            <td>Sui Gas & Electric Charges</td>
                            <td>Rs:</td>
                            <td><?php {echo $gas_electric;}?></td>
                        </tr>
                        <tr>
                            <td>Water Bill</td>
                            <td>Rs:</td>
                            <td><?php {echo $water_bill;}?></td>
                        </tr>
                        <tr>
                            <td>Semester Dinner</td>
                            <td>Rs:</td>
                            <td><?php {echo $semester_dinner;}?></td>
                        </tr>
                        <tr>
                            <td>Total</td>
                            <td>Rs:</td>
                            <td><?php {echo $total;}?></td>
                        </tr>
                    </table>
                    <br>
                    <div class="container">
                        <p>Amount in Words:</p><br>
                        <p>Ten Thousands Rupees only</p>
                        <br><br><br>
                        <p>Issuing Authority</p>
                    </div>

                </td>


                <td style="padding-left: 20pt;padding-right: 9.5pt;border-left: 1pt dotted">
                    <table style="padding-left: 22pt;padding-right: 20.5pt ;border-left: 1pt solid;border-bottom: 1pt solid;">
                        <tr>
                            <td id="copy">
                                <h5>Student Copy</h5>
                            </td>
                        </tr>
                        <tr>
                            <td id="bank_name">
                                <h5 >Habib Bank LTD</h5>
                            </td>
                        </tr>
                        <tr>
                            <td id="bank_branch">
                                <h5 >CIIT Campus Branch,Lahore.</h5>
                            </td>
                        </tr>
                        <tr>
                            <td id="account_no">
                                <h5 >Account No. 2305-70000667-03</h5>
                            </td>
                        </tr>
                        <br>
                        <tr>
                            <td>
                                <table style="min-height: 100pt">
                                    <tr>
                                        <td>
                                            <p>Issue Date</p><br>
                                            <p><?php {echo $issue_date;}?></p>
                                        </td>
                                        <td style="border: 1pt solid black">
                                            <h5 id="challan_no">Challan No</h5>
                                            <br>
                                            <h5 id="challan_no"><?php {echo $challan_no;}?></h5>
                                        </td>
                                        <td>
                                            <p>Due Date</p><br>
                                            <p><?php {echo $due_date;}?></p>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                    <table style="padding-right: 10pt ;border-left: 1pt solid;border-bottom: 1pt solid;">
                        <tr>
                            <td>

                                <img src="../IMAGES/CIITLogo_Plain.png" height="30pt" width="37pt">
                            </td>
                            <td style="padding-left: 5pt;padding-top: 30pt; text-align: center">
                                <h5 >Boys Hostel Mess
                                    <br>COMSATS Institute of information<br>Technology Lahore</h5>
                            </td>
                        </tr>
                    </table>
                    <br>
                    <table style="border-bottom: 1pt solid">
                        <tr>
                            <td><b>Name:</b></td>
                            <td><?php {echo $student_name;}?></td>
                        </tr>
                        <tr>
                            <td><b>Reg. No</b></td>
                            <td><?php {echo $student_id;}?></td>
                        </tr>
                        <tr>
                            <td><b>Room No:</b></td>
                            <td><?php {echo $room_no;}?></td>
                        </tr>
                    </table>
                    <br>

                    <table style="align-content: center;">
                        <tr>
                            <td>Mess Bill(For the m/o <?php {echo $month;}?>)</td>
                            <td>Rs:</td>
                            <td><?php {echo $mess_bill;}?></td>
                        </tr>
                        <tr>
                            <td>Service Charges</td>
                            <td>Rs:</td>
                            <td><?php {echo $service_charges;}?></td>
                        </tr>
                        <tr>
                            <td>Internet Charges</td>
                            <td>Rs:</td>
                            <td><?php {echo $internet_charges;}?></td>
                        </tr>
                        <tr>
                            <td>Sui Gas & Electric Charges</td>
                            <td>Rs:</td>
                            <td><?php {echo $gas_electric;}?></td>
                        </tr>
                        <tr>
                            <td>Water Bill</td>
                            <td>Rs:</td>
                            <td><?php {echo $water_bill;}?></td>
                        </tr>
                        <tr>
                            <td>Semester Dinner</td>
                            <td>Rs:</td>
                            <td><?php {echo $semester_dinner;}?></td>
                        </tr>
                        <tr>
                            <td>Total</td>
                            <td>Rs:</td>
                            <td><?php {echo $total;}?></td>
                        </tr>
                    </table>
                    <br>
                    <div class="container">
                        <p>Amount in Words:</p><br>
                        <p>Ten Thousands Rupees only</p>
                        <br><br><br>
                        <p>Issuing Authority</p>
                    </div>

                </td>
            </tr>
        </table>
    </div>


</body>
</html>