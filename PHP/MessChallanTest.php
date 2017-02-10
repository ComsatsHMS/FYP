<?php
session_start();
//error_reporting(0);

include("mpdf/mpdf.php");

$student_id = $_GET['id'];
$_SESSION['studentid'] = $student_id;
ob_start();
include "MessChallan.php";
$template = ob_get_contents();
ob_end_clean();

$mpdf=new mPDF('c','A4-L','','' , 0 , 0 , 0 , 0 , 0 , 0);

$mpdf->SetDisplayMode('fullpage');

$mpdf->list_indent_first_level = 0;  // 1 or 0 - whether to indent the first level of a list

$mpdf->WriteHTML($template);

$mpdf->Output();

?>