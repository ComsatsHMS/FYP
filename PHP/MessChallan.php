<?php
session_start();
include ("connection.php");
$student_id = $_GET['id'];
$challan_no = 0;
$student_name;
$room_no;
$issue_date;
$due_date;
$mess_bill = 0;
$service_charges = 0;
$gas_electric = 0;
$internet_charges = 0;
$water_bill = 0;
$semester_dinner = 0;
$month;
$application_no;
$fine = 0;

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
$query2 = "select * from messchallandetails where studentid = '$student_id' AND status = FALSE ";
$run2 = mysqli_query($connection,$query2);
if(mysqli_num_rows($run2) == 1 ){
    while($each_record = mysqli_fetch_array($run2)){
        $challan_no = $each_record['challanNo'];
        $issue_date =$each_record['issueDate'];
        $due_date =$each_record['dueDate'];
        $mess_bill =$each_record['messBill'];
        $service_charges =$each_record['serviceCharges'];
        $gas_electric =$each_record['suiElectric'];
        $internet_charges =$each_record['internetBill'];
        $water_bill =$each_record['waterBill'];
        $t_issue_date = strtotime("$issue_date");
        $month = date('M,y',$t_issue_date);
        $semester_dinner =$each_record['semesterDinner'];
    }
}
elseif (mysqli_num_rows($run2) > 1){
    while($each_record = mysqli_fetch_array($run2)){
        $challan_no = $each_record['challanNo'];
        $issue_date =$each_record['issueDate'];
        $due_date =$each_record['dueDate'];
        $t_mess_bill =$each_record['messBill'];
        $t_service_charges =$each_record['serviceCharges'];
        $t_gas_electric =$each_record['suiElectric'];
        $t_internet_charges =$each_record['internetBill'];
        $t_water_bill =$each_record['waterBill'];
        $t_semester_dinner =$each_record['semesterDinner'];

        $mess_bill = $mess_bill + $t_mess_bill ;
        $service_charges = $service_charges + $t_service_charges;
        $gas_electric =$gas_electric + $t_gas_electric;
        $internet_charges =$internet_charges + $t_internet_charges;
        $water_bill =$water_bill + $t_water_bill;
        $t_issue_date = strtotime("$issue_date");
        $month = date('M,y',$t_issue_date);
        $semester_dinner =$semester_dinner + $t_semester_dinner;
    }
}


$query5 = "select fineAmount from fine where studentid = '$student_id' AND status = FALSE ";
$run5 = mysqli_query($connection,$query5);
while($each_record = mysqli_fetch_array($run5)){
    $t_fine = $each_record['fineAmount'];
    $fine =$fine + $t_fine;
}

$total = $mess_bill + $water_bill + $gas_electric + $internet_charges + $service_charges + $semester_dinner + $fine;

function convert_digit_to_words($no)
{

    //creating array  of word for each digit
    $words = array('0'=> 'Zero' ,'1'=> 'One' ,'2'=> 'Two' ,'3' => 'Three','4' => 'Four','5' => 'Five','6' => 'Six','7' => 'Seven','8' => 'Eight','9' => 'Nine','10' => 'Ten','11' => 'Eleven','12' => 'Twelve','13' => 'Thirteen','14' => 'Fourteen','15' => 'Fifteen','16' => 'Sixteen','17' => 'Seventeen','18' => 'Eighteen','19' => 'Nineteen','20' => 'Twenty','30' => 'Thirty','40' => 'Forty','50' => 'Fifty','60' => 'Sixty','70' => 'Seventy','80' => 'Eighty','90' => 'Ninty','100' => 'Hundred','1000' => 'Thousand','100000' => 'Lac','10000000' => 'Crore');
    //$words = array('0'=> '0' ,'1'=> '1' ,'2'=> '2' ,'3' => '3','4' => '4','5' => '5','6' => '6','7' => '7','8' => '8','9' => '9','10' => '10','11' => '11','12' => '12','13' => '13','14' => '14','15' => '15','16' => '16','17' => '17','18' => '18','19' => '19','20' => '20','30' => '30','40' => '40','50' => '50','60' => '60','70' => '70','80' => '80','90' => '90','100' => '100','1000' => '1000','100000' => '100000','10000000' => '10000000');


    //for decimal number taking decimal part

    $cash=(int)$no;  //take number wihout decimal
    $decpart = $no - $cash; //get decimal part of number

    $decpart=sprintf("%01.2f",$decpart); //take only two digit after decimal

    $decpart1=substr($decpart,2,1); //take first digit after decimal
    $decpart2=substr($decpart,3,1);   //take second digit after decimal

    $decimalstr='';

    //if given no. is decimal than  preparing string for decimal digit's word

    if($decpart>0)
    {
        $decimalstr.="point ".$numbers[$decpart1]." ".$numbers[$decpart2];
    }

    if($no == 0)
        return ' ';
    else {
        $novalue='';
        $highno=$no;
        $remainno=0;
        $value=100;
        $value1=1000;
        while($no>=100)    {
            if(($value <= $no) &&($no  < $value1))    {
                $novalue=$words["$value"];
                $highno = (int)($no/$value);
                $remainno = $no % $value;
                break;
            }
            $value= $value1;
            $value1 = $value * 100;
        }
        if(array_key_exists("$highno",$words))  //check if $high value is in $words array
            return $words["$highno"]." ".$novalue." ".convert_digit_to_words($remainno).$decimalstr;  //recursion
        else {
            $unit=$highno%10;
            $ten =(int)($highno/10)*10;
            return $words["$ten"]." ".$words["$unit"]." ".$novalue." ".convert_digit_to_words($remainno
            ).$decimalstr; //recursion
        }
    }
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
                            <td>Fine</td>
                            <td>Rs:</td>
                            <td><?php {echo $fine;}?></td>
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
                        <p><?php {echo convert_digit_to_words($total); echo "Rupees";}?></p>
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
                            <td>Fine</td>
                            <td>Rs:</td>
                            <td><?php {echo $fine;}?></td>
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
                        <p><?php {echo convert_digit_to_words($total); echo "Rupees";}?></p>
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
                            <td>Fine</td>
                            <td>Rs:</td>
                            <td><?php {echo $fine;}?></td>
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
                        <p><?php {echo convert_digit_to_words($total); echo "Rupees";}?></p>

                        <br><br><br>
                        <p>Issuing Authority</p>
                    </div>

                </td>
            </tr>
        </table>
    </div>


</body>
</html>