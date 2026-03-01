<?php
require_once __DIR__ . '/../../config/authentication.php';
require_once __DIR__ . '/../../includes/navbar.php';
/*session checker
session_start();
if (!isset($_SESSION['employee_id'])) {
    header("Location: login.php");
    exit();
}*/
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>TSI Group - Gate Pass</title>
<style>
body { font-family: Arial, sans-serif; background: #f4f4f4; padding: 20px; }
.container { width: 800px; margin: auto; background: #fff; padding: 20px; border: 2px solid #000; }
.header { display: flex; align-items: center; margin-bottom: 10px; }
.logo { width: 100px; }
.logo img { width: 100%; height: auto; }
.title { flex: 1; text-align: center; }
.title h2 { margin: 0; font-size: 20px; }
.title h3 { margin: 0; font-size: 18px; letter-spacing: 2px; }
.top-fields { margin-top: 15px; margin-bottom: 15px; }
.row { display: flex; justify-content: space-between; margin-bottom: 10px; }
.field { width: 48%; }
.field label { font-weight: bold; font-size: 14px; }
input, select { width: 100%; border: none; border-bottom: 1px solid #000; padding: 5px; outline: none; }
table { width: 100%; border-collapse: collapse; margin-top: 10px; table-layout: fixed; }
table, th, td { border: 1px solid #000; }
th, td { padding: 5px; font-size: 12px; }
.sign-section { margin-top: 20px; display: flex; justify-content: space-between; }
.sign-box { width: 48%; }
.sign-field { border: 1px solid #000; padding: 8px; margin-bottom: 10px; font-size: 12px; }
.buttons { margin-top: 15px; text-align: center; }
button { padding: 8px 15px; margin: 5px; cursor: pointer; }
</style>
</head>
<body>
<form method="POST" action="save_form.php" enctype="multipart/form-data">
<div class="container">

    <div class="header">
        <div class="logo">
            <img src="TSI (png) 2022 500 pixel.png" alt="Company Logo">
        </div>
        <div class="title">
            <h2>TSI GROUP</h2>
            <h3>GATE PASS</h3>
        </div>
    </div>

    <div class="top-fields">
        <div class="row">
            <div class="field">
                <label>TO:</label>
                <input type="text" name="recipient" required>
            </div>
            <div class="field">
                <label>FROM:</label>
                <input type="text" name="issued_from" required>
            </div>
        </div>

        <div class="row">
            <div class="field">
                <label>DATE:</label>
                <input type="date" name="issue_date" required>
            </div>
            <div class="field">
                <label>Business Unit:</label>
                <select name="business_unit" required>
                    <option value="itd">IT Department</option>
                    <option value="tli">Toplis Logistics</option>
                    <option value="tsi">Toplis Solutions</option>
                    <option value="kmc">Kabraso</option>
                </select>
            </div>
        </div>
    </div>

    <table id="itemTable">
        <thead>
            <tr>
                <th style="width:15%">QTY</th>
                <th style="width:85%">DESCRIPTION</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><input type="number" name="qty[]" required></td>
                <td><input type="text" name="description_items[]" required></td>
            </tr>
        </tbody>
    </table>

    <div class="sign-section">
        <div class="sign-box">
            <div class="sign-field">
                PREPARED BY: <input type="text" name="name_prepared">
            </div>
            <div class="sign-field">
                CHECKED BY: <input type="text" name="name_checked">
            </div>
        </div>
        <div class="sign-box">
            <div class="sign-field">
                APPROVED BY: <input type="text" name="name_approved">
            </div>
            <div class="sign-field">
                RECEIVED BY: <input type="text" name="name_received">
            </div>
        </div>
    </div>

    <div class="buttons">
        <button type="submit">Save Form</button>
       <!-- <button type="button" onclick="window.print()">Print</button>-->
    </div>

</div>
</form>
</body>
</html>