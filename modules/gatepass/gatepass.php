<!DOCTYPE html>
<html>
<head>
  <title>Equipment Issuance Form</title>
  <!--
  0216 - Javascript library will not be used. User must manually signed the gatepass
  Signature pad Javascript Library
  <script src="https://cdn.jsdelivr.net/npm/signature_pad@4.0.0/dist/signature_pad.umd.min.js"></script>
 CSS FOR GATEPASS FORM
  Canvas - for area where captured the signature
  sig-box - the box for signature-->
  <style>
    body { font-family: Arial; }
    table { width: 100%; border-collapse: collapse; margin-top: 10px; }
    th, td { border: 1px solid #000; padding: 5px; }
    /*canvas { border: 1px solid #000; width: 250px; height: 80px; }*/
    .sig-box { display: inline-block; margin-right: 20px; }
  </style>
</head>

<body>

<h2>TSI GROUP</h2>
<h2>GATE PASS</h2>

<!--<form method="POST" action="save_form.php"> save all data to save_form-->
<form method="POST" action="save_form.php" enctype="multipart/form-data">


Recipient: <input type="text" name="recipient" required><br><br>
From: <input type="text" name="issued_from" required><br><br>
Date: <input type="date" name="issue_date" required><br><br>

<h3>Equipment Details</h3>
<table>
<tr>
  <th>Qty</th>
  <th>Description</th>
</tr>
<tr>
  <td><input type="number" name="qty[]" required></td>
  <td><input type="text" name="description[]" required></td>
</tr>
</table>

<!-- SIGNATURE SECTION-->
<h3>Signatures</h3>

<div class="sig-box">
  Prepared By<br>
  <canvas id="sig_prepared"></canvas>
  <input type="hidden" name="sig_prepared">
</div>

<div class="sig-box">
  Checked By<br>
  <canvas id="sig_checked"></canvas>
  <input type="hidden" name="sig_checked">
</div>

<div class="sig-box">
  Approved By<br>
  <canvas id="sig_approved"></canvas>
  <input type="hidden" name="sig_approved">
</div>

<div class="sig-box">
  Received By<br>
  <canvas id="sig_received"></canvas>
  <input type="hidden" name="sig_received">
</div>

<br><br>
<button type="submit">Save Form</button>

</form>
<!--
<script>
    //4 PARAMETERS FOR PREPARED BY, CHECKED BY, APPROVED AND RECEIVED SIGNATURE
const preparedPad = new SignaturePad(document.getElementById('sig_prepared'));
const checkedPad  = new SignaturePad(document.getElementById('sig_checked'));
const approvedPad = new SignaturePad(document.getElementById('sig_approved'));
const receivedPad = new SignaturePad(document.getElementById('sig_received'));

// THE SIGNATURE WILL BE CONVERTED AS BASE-64 ONCE IT IS SAVE IN THE DATABASE
document.querySelector("form").addEventListener("submit", function () {
  document.querySelector("[name=sig_prepared]").value = preparedPad.toDataURL();
  document.querySelector("[name=sig_checked]").value  = checkedPad.toDataURL();
  document.querySelector("[name=sig_approved]").value = approvedPad.toDataURL();
  document.querySelector("[name=sig_received]").value = receivedPad.toDataURL();
});
</script>-->

</body>
</html>
