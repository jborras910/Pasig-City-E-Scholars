<?php
session_start();
require_once('TCPDF-main/tcpdf.php');
include('dbconfig.php');


// Retrieve data from the database
$sql = "SELECT * FROM applicants_table WHERE isApproved='true'";
$result = $conn->query($sql);

$data = array();
if ($result->num_rows > 0) {
    $counter = 1;

    while($row = $result->fetch_assoc()) {
   

        $data[] = array(
        $counter, 
        date("F j, Y, g:i a", strtotime($row['Date_submitted'])),
        date("F j, Y, g:i a", strtotime($row['date_approved'])),
        ucwords($row["full_name"]), 
        ucwords($row["house_number"]." ".$row["Street"]." ".$row["barangay"]), 
        $row["email"]

    );
        $counter++;
    }
}



$conn->close();
// Add header title

$file_name = 'Approved Scholars ' . (date('Y') - 1) . '-' . date('Y') . '.pdf';


$pdf = new TCPDF('L', 'mm', 'A4', true, 'UTF-8', false);
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Your Name');
$pdf->SetTitle($file_name);
$pdf->SetSubject('Table Data to PDF using TCPDF');
$pdf->SetKeywords('TCPDF, PDF, table, data');
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);
$pdf->SetMargins(20, 20, 20);

$pdf->AddPage();


// Set image file path


$image_file = '../Assets/PST_LOGO.jpg';
// Add image to PDF document and center it
$pdf->Image($image_file, $x = '138', $y = '15', $w = 20, $h = 20, $type = '', $link = '', $align = 'C', $resize = false, $dpi = 300);
$pdf->Cell(0, 19, '', 0, 1, 'C');





$pdf->SetFont('helvetica', 'B', 15);
$pdf->SetTextColor(0, 48, 103);
$pdf->Cell(0, 10, 'PASIG CITY SCHOLARSHIP PROGRAM '.'APPROVED SCHOLARS ' . (date('Y') - 1) . '-' . date('Y'), 0, 1, 'C');
$pdf->SetTextColor(0, 0, 0);
$pdf->Cell(0, 15, ' ', 0, 1, 'C');



// Define the column names
$pdf->SetFont('helvetica', '', 11.4);
$columnNames = array('No', 'Date Submitted', 'Date Approved', 'Name','Location','Email');

// Define the table structure
$columns = count($columnNames);
// Set column width for each column
$number_column_width = 11;
$other_column_width = (180 - $number_column_width) / ($columns - 1);
// Calculate the maximum width of each column
$columnWidths = array();
foreach ($data as $row) {
    for ($i = 0; $i < $columns; $i++) {
        $cellWidth = $pdf->GetStringWidth($row[$i]) + 2; // add some padding
        if (!isset($columnWidths[$i]) || $cellWidth > $columnWidths[$i]) {
            $columnWidths[$i] = $cellWidth;
        }
    }
}

// Add the column names to the table with the calculated widths
$pdf->SetFont('helvetica', '', 9);
$pdf->SetFillColor(255, 255, 255);
$pdf->Cell($number_column_width, 7, $columnNames[0], 1, 0, 'L', 1);
if(empty($data)){
    $_SESSION['status'] =  'No Consultation Found';
    $_SESSION['status_code'] = 'error';
    header('Location: ' . $_SERVER['HTTP_REFERER']);


}else{

    for($i = 1; $i < $columns; $i++) {
   
        $pdf->Cell($columnWidths[$i], 7, $columnNames[$i], 1, 0, 'L', 1);
    }

    $pdf->Ln();

// Add the rows to the table with the calculated widths
$pdf->SetFont('helvetica', '', 8);
foreach($data as $row) {
    $pdf->Cell($number_column_width, 6, $row[0], 1, 0, 'L', 1);
    for ($i = 1; $i < $columns; $i++) {
        $pdf->Cell($columnWidths[$i], 6, $row[$i], 1, 0, 'L', 1);
    }
    $pdf->Ln();
    
}



$pdf->Output($file_name, 'D');

}
