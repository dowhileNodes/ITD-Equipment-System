<?php
require_once __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . '/../../config/db.php';

use Dompdf\Dompdf;
use Dompdf\Options;

$id = $_GET['id'];

// Fetch form data from the equipment_forms table (business_unit is a column in this table)
$form = $conn->query("SELECT * FROM equipment_forms WHERE id=$id")->fetch_assoc();
$items = $conn->query("SELECT * FROM equipment_items WHERE form_id=$id")->fetch_all(MYSQLI_ASSOC);
$signatures = $conn->query("SELECT * FROM signatures WHERE form_id=$id")->fetch_all(MYSQLI_ASSOC);

// Generate HTML content (assuming pdf_template.php generates HTML)
$html = include 'pdf_template.php';

// Set Dompdf options
$options = new Options();
$options->set('isRemoteEnabled', true);

// Instantiate Dompdf with options
$pdf = new Dompdf($options);

// Load HTML content into Dompdf
$pdf->loadHtml($html);

// Set paper size
$pdf->setPaper('A4', 'portrait');

// Render PDF (first pass)
$pdf->render();

// Stream the generated PDF to the browser
$pdf->stream("Equipment_Form_$id.pdf");
?>