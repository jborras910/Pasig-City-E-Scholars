<?php

include('dbconfig.php');
include('includes/security.php');
include('SimpleXLSXGen.php');


$scholars = [
    ['Number','Full Name','Email','Contact','Complete Address','Date Submited','Date Approved']
];

$id = 0;
$sql = "SELECT * FROM applicants_table WHERE isApproved='true'";
$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result) > 0)
{
foreach($result as $row){
$id++;
$scholars = array_merge($scholars, array(array(
$id,
$row['full_name'],
$row['email'],
$row['Contact_number'], 
$row['house_number']." ".$row['Street']." ".$row['barangay']." Pasig City", 
date("F j, Y, g:i a", strtotime($row['Date_submitted'])),
date("F j, Y, g:i a", strtotime($row['date_approved'])))));
}
}


$current_year = date('Y');

$file_name = 'Scholars_'.$current_year;



$xlsx = Shuchkin\SimpleXLSXGen::fromArray( $scholars );
$xlsx->downloadAs($file_name.'.xlsx');



echo "<pre>";
print_r($scholars);






?>
