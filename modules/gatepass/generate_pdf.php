<?php
require_once __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . '/../../config/db.php';
//include 'db.php';

use Dompdf\Dompdf;

$id = $_GET['id'];

$form = $conn->query("SELECT * FROM equipment_forms WHERE id=$id")->fetch_assoc();
$items = $conn->query("SELECT * FROM equipment_items WHERE form_id=$id")->fetch_all(MYSQLI_ASSOC);
$signatures = $conn->query("SELECT * FROM signatures WHERE form_id=$id")->fetch_all(MYSQLI_ASSOC);

$html = include 'pdf_template.php';

$pdf = new Dompdf();
$pdf->loadHtml($html);
$pdf->setPaper('A4', 'portrait');
$pdf->render();
$pdf->stream("Equipment_Form_$id.pdf");
