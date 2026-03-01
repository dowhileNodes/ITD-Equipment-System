<?php
require_once __DIR__ . '/../../config/db.php';
require_once '../../vendor/autoload.php';

use Dompdf\Dompdf;
use Dompdf\Options;
//session checker
session_start();
if (!isset($_SESSION['employee_id'])) {
    header("Location: login.php");
    exit();
}
if (!isset($_GET['id'])) {
    die("Form ID not specified.");
}

$form_id = intval($_GET['id']);

// Fetch main form data
$stmt = $conn->prepare("SELECT * FROM equipment_forms WHERE id = ?");
$stmt->bind_param("i", $form_id);
$stmt->execute();
$result = $stmt->get_result();
$form = $result->fetch_assoc();

if (!$form) die("Form not found.");

// Fetch items
$stmt = $conn->prepare("SELECT * FROM equipment_items WHERE form_id = ?");
$stmt->bind_param("i", $form_id);
$stmt->execute();
$result = $stmt->get_result();
$items = [];
while ($row = $result->fetch_assoc()) {
    $items[] = $row;
}

// Setup Dompdf
$options = new Options();
$options->set('defaultFont', 'Arial');
$dompdf = new Dompdf($options);

// Build HTML
$html = '
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Gate Pass PDF</title>
<style>
body { font-family: Arial, sans-serif; padding: 20px; }
.container { width: 100%; margin: auto; background: #fff; padding: 15px; border: 2px solid #000; box-sizing: border-box; }
.header { display: flex; align-items: center; margin-bottom: 10px; position: relative; }
.logo { width: 100px; }
.logo img { width: 100%; height: auto; }
.title { flex: 1; text-align: center; }
.title h2 { margin: 0; font-size: 20px; }
.title h3 { margin: 0; font-size: 18px; letter-spacing: 2px; }
.form-id { position: absolute; right: 0; top: 0; font-weight: bold; font-size: 14px; }
.top-fields { margin: 15px 0; }
.row { display: flex; justify-content: space-between; margin-bottom: 10px; }
.field { width: 48%; }
.field label { font-weight: bold; font-size: 14px; }
input { width: 100%; border: none; border-bottom: 1px solid #000; padding: 5px; outline: none; font-size: 12px; box-sizing: border-box; }
table { width: 100%; border-collapse: collapse; margin-top: 10px; table-layout: fixed; word-wrap: break-word; font-size: 12px; }
table, th, td { border: 1px solid #000; }
th { padding: 5px; font-size: 12px; text-align: center; }
td { padding: 5px; height: 25px; }
.sign-section { margin-top: 20px; display: flex; justify-content: space-between; }
.sign-box { width: 48%; }
.sign-field { border: 1px solid #000; padding: 8px; margin-bottom: 10px; font-size: 12px; }
</style>
</head>
<body>
<div class="container">
    <div class="header">
        <div class="logo">
            <img src="../../TSI (png) 2022 500 pixel.png" alt="Company Logo">
        </div>
        <div class="title">
            <h2>TSI GROUP</h2>
            <h3>GATE PASS</h3>
        </div>
        <div class="form-id">Form ID: '.$form_id.'</div>
    </div>

    <div class="top-fields">
        <div class="row">
            <div class="field"><label>TO:</label><input type="text" value="'.htmlspecialchars($form['recipient']).'"></div>
            <div class="field"><label>FROM:</label><input type="text" value="'.htmlspecialchars($form['issued_from']).'"></div>
        </div>
        <div class="row">
            <div class="field"><label>DATE:</label><input type="text" value="'.htmlspecialchars($form['issue_date']).'"></div>
        </div>
        <div class="row">
            <div class="field"><label>Business Units:</label><input type="text" value="'.htmlspecialchars($form['business_unit']).'"></div>
        </div>
    </div>

    <table>
        <thead>
            <tr><th style="width:15%">QTY</th><th style="width:85%">DESCRIPTION</th></tr>
        </thead>
        <tbody>';

foreach ($items as $item) {
    $html .= '<tr><td>'.htmlspecialchars($item['quantity']).'</td><td>'.htmlspecialchars($item['description']).'</td></tr>';
}

$html .= '
        </tbody>
    </table>

    <div class="sign-section">
        <div class="sign-box">
            <div class="sign-field">PREPARED BY:<br>'.htmlspecialchars($form['name_prepared']).'</div>
            <div class="sign-field">CHECKED BY:<br>'.htmlspecialchars($form['name_checked']).'</div>
        </div>
        <div class="sign-box">
            <div class="sign-field">APPROVED BY:<br>'.htmlspecialchars($form['name_approved']).'</div>
            <div class="sign-field">RECEIVED BY:<br>'.htmlspecialchars($form['name_received']).'</div>
        </div>
    </div>
</div>
</body>
</html>
';

// Render PDF
$dompdf->loadHtml($html);
$dompdf->setPaper('A4', 'portrait');
$dompdf->render();
$dompdf->stream("Equipment_Form_{$form_id}.pdf", ["Attachment" => true]);