<?php

include('dbconfig.php');
include('includes/security.php');
include('SimpleXLSXGen.php');


$faculties = [
    ['Number', 'First Name', 'Last Name','Middle Name','Suffix','Contact Number','Email','Role' ]
];

$id = 0;
$sql = "SELECT * FROM users_table WHERE verify_status = '1' AND user_type !='scholar' AND user_type !='Main_Admin'";
$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result) > 0)
{
foreach($result as $row){
$id++;
$faculties = array_merge($faculties, array(array($id,$row['first_name'], $row['last_name'],$row['Middle_Name'],$row['Suffix'], $row['Contact_number'], $row['Email'],$row['user_type'])));
}
}
$xlsx = Shuchkin\SimpleXLSXGen::fromArray( $faculties );
$xlsx->downloadAs('Faculty_Members.xlsx');



echo "<pre>";
print_r($faculties);














?>
