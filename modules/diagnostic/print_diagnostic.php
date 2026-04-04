<?php
require_once __DIR__ . '/../../config/db.php';
require_once __DIR__ . '/../../vendor/autoload.php';

use Dompdf\Dompdf;

$id = $_GET['id'] ?? null;
if (!$id) die("Invalid report");

$result = $conn->query("SELECT * FROM diagnostic_reports WHERE id = " . intval($id));
$report = $result->fetch_assoc();

//for logo
$logoPath = __DIR__ . '/../../includes/toplis.png';

$type = pathinfo($logoPath, PATHINFO_EXTENSION);
$data = file_get_contents($logoPath);

$base64Logo = 'data:image/' . $type . ';base64,' . base64_encode($data);

$html = '
<style>
    body {
        font-family: Arial, sans-serif;
        font-size: 12px;
    }
    .logo {
        text-align: right;
        margin-bottom: 10px;
    }
    .logo img {
        width: 150px; /* adjust size */
    }
    .header {
        text-align: center;
        font-weight: bold;
        font-size: 16px;
    }
    .header {
        text-align: center;
        margin-bottom: 10px;
    }
    .company {
        text-align: right;
        font-weight: bold;
        text-decoration: underline;
    }
    .title {
        font-weight: bold;
        font-size: 16px;
        margin-top: 10px;
    }
    .top-info {
        width: 100%;
        margin-top: 10px;
    }
    .top-info td {
        padding: 5px;
    }
    .line {
        border-bottom: 1px solid black;
        display: inline-block;
        width: 150px;
    }
    table.report {
        width: 100%;
        border-collapse: collapse;
        margin-top: 15px;
    }
    table.report th, table.report td {
        border: 1px solid black;
        padding: 5px;
        text-align: left;
        height: 80px;
        vertical-align: top;
    }
    table.report th {
        text-align: center;
        font-weight: bold;
    }
    .signatures {
        width: 100%;
        margin-top: 40px;
        text-align: center;
    }
    .signatures td {
        width: 33%;
    }
    .sign-line {
        margin-top: 40px;
        border-top: 1px solid black;
        width: 70%;
        margin-left: auto;
        margin-right: auto;
    }
</style>

<div style="text-align:right;">
    <img src="' . $base64Logo . '" style="width:150px;">
</div>

<div class="header">
    <div class="title">EQUIPMENT DIAGNOSTIC REPORT</div>
</div>

<table class="top-info">
    <tr>
        <td>Issued to: <span class="line">'.$report['issued_to'].'</span></td>
        <td style="text-align:right;">Date: <span class="line">'.$report['issue_date'].'</span></td>
    </tr>
    <tr>
        <td></td>
        <td style="text-align:right;">Ref No.: <span class="line">'.$report['id'].'</span></td>
    </tr>
</table>

<table class="report">
    <tr>
        <th>Date of Purchase</th>
        <th>Supplier</th>
        <th>Item Description</th>
        <th>Serial Number</th>
        <th>Problem</th>
        <th>Recommendation</th>
    </tr>
    <tr>
        <td>'.$report['date_of_purchase'].'</td>
        <td>'.$report['supplier'].'</td>
        <td>'.$report['item_description'].'</td>
        <td>'.$report['serial_number'].'</td>
        <td>'.$report['problem'].'</td>
        <td>'.$report['recommendation'].'</td>
    </tr>
</table>

<table class="signatures">
   <table style="width:100%; margin-top:40px; text-align:center;">
    <tr>
        <td>
            Recommended by:<br><br>
            '.$report['recommended_by'].'
            <div style="border-bottom:1px solid black; width:70%; margin:5px auto;"></div>
            IT Senior Associate
        </td>
        <td>
            Noted by:<br><br>
            '.$report['noted_by'].'
            <div style="border-bottom:1px solid black; width:70%; margin:5px auto;"></div>
            IT Assistant Manager
        </td>
        <td>
            Approved by:<br><br>
            '.$report['approved_by'].'
            <div style="border-bottom:1px solid black; width:70%; margin:5px auto;"></div>
            General Manager
        </td>
    </tr>
</table>
';

$dompdf = new Dompdf();
$dompdf->set_option('isRemoteEnabled', true);
$dompdf->set_option('chroot', realpath(__DIR__ . '/../../'));
$dompdf->loadHtml($html);
$dompdf->setPaper('A4', 'portrait');
$dompdf->render();
$dompdf->stream("Diagnostic_Report_{$report['id']}.pdf", ["Attachment" => false]);