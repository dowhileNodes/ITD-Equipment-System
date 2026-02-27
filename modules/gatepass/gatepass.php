<!DOCTYPE html>
<html>
<head>
  <title>Equipment Issuance Form</title>

  <style>

    input[type="text"], input[type="date"], input[type="number"], select, textarea {
        width: 70%;
        padding: 8px 10px;
        font-size: 13px;
        margin-bottom: 10px;
        box-sizing: border-box;
        border-radius: 6px;
        border: none;
    }

    textarea {
        resize: vertical;
        height: 80px;
    }

    body {
        font-family: Georgia, serif;
        background-image: url('viber_image_2026-02-24_11-08-29-685.jpg');
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center;
        color: white;
        margin: 0;
    }

    .form-box {
        max-width: 820px;
        margin: 30px auto;
        padding: 25px;
        background: rgba(255, 255, 255, 0.08);
        border: 1px solid rgba(255,255,255,0.25);
        border-radius: 18px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.35);
        backdrop-filter: blur(14px);
    }

    h3 {
        width: 80%;
        margin: 20px auto 10px auto;
        font-weight: normal;
        letter-spacing: 1px;
        border-left: 4px solid #fd9002;
        padding-left: 10px;
    }

    /* Equipment table */
    table.equipment {
        width: 80%;
        border-collapse: collapse;
        margin: 15px auto;
        font-size: 14px;
        background: rgba(255, 255, 255, 0.08);
        border: 1px solid rgba(255,255,255,0.2);
        color: black;
        border-radius: 10px;
        overflow: hidden;
    }

    /* Signatures table */
    table.signatures {
        width: 100%;
        border-collapse: collapse;
        margin: 20px auto;
        font-size: 14px;
        background: rgba(255, 255, 255, 0.08);
        border: 1px solid rgba(255,255,255,0.2);
        color: black;
        border-radius: 10px;
        overflow: hidden;
    }

    th, td {
        border: 1px solid rgba(0,0,0,0.3);
        padding: 12px;
        text-align: center;
        background-color: rgba(255,255,255,0.85);
        vertical-align: top; 
    }

    button[type="submit"] {
        background-color: #324a63;
        color: white;
        padding: 10px 22px;
        font-size: 15px;
        border: none;
        border-radius: 8px;
        cursor: pointer;
    }

    #addItemBtn {
        padding: 8px 15px;
        background-color: #324a63;
        color: white;
        font-size: 14px;
        cursor: pointer;
        border: none;
        border-radius: 6px;
    }

  </style>
</head>

<body>

<div class="form-box">
<h2 style="text-align:center; color:#fd9002;">Toplis Solutions Incorporation</h2>
<h2 style="text-align:center; color:white;">GATE PASS</h2>

<form method="POST" action="save_form.php" enctype="multipart/form-data">

<!-- HEADER FLEX -->
<div style="width: 80%; color: white; margin: 0 auto; display:flex; justify-content:space-between;">

  <div style="width:48%;">
    <label>Recipient:</label><br>
    <input type="text" placeholder="NAME" name="recipient" required style="width:100%;"><br>

    <label>From:</label><br>
    <input type="text" placeholder="NAME" name="issued_from" required style="width:100%;"><br>
  </div>

  <div style="width:48%;">
    <label>Business Unit:</label><br>
    <select name="business_unit" required style="width:100%;">
        <option value="">--Select Business Unit--</option>
        <option value="IT Department">IT Department</option>
        <option value="KMC">KMC</option>
        <option value="Toplis Solutions">Toplis Solutions</option>
        <option value="Toplis Logistics">Toplis Logistics</option>
    </select><br>

    <label>Date:</label><br>
    <input type="date" name="issue_date" required style="width:100%;"><br>
  </div>

</div>

<h3>Equipment Details</h3>

<table class="equipment" id="equipmentTable">
<tr>
  <th>QUANTITY</th>
  <th>DESCRIPTION</th>
</tr>

<tr>
  <td><input type="number" placeholder="0" name="qty[]" required></td>
  <td><textarea name="description_items[]" required placeholder="Laptop, Serial No, etc..."></textarea></td>
</tr>

</table>

<div style="width:80%; margin: 10px auto; text-align:right;">
  <button type="button" id="addItemBtn">Add Item</button>
</div>

<script>
document.getElementById('addItemBtn').addEventListener('click', function() {
    const table = document.getElementById('equipmentTable');
    const newRow = table.insertRow(-1);

    const cell1 = newRow.insertCell(0);
    const cell2 = newRow.insertCell(1);

    cell1.innerHTML = '<input type="number" placeholder="0" name="qty[]">';
    cell2.innerHTML = '<textarea name="description_items[]" placeholder="Item description..."></textarea>';
});
</script>


<h3>Signatures</h3>

<table class="signatures">
<tr>
  <td style="width:25%;">
    <span>Prepared By:</span><br>
    <input type="text" placeholder="NAME" name="name_prepared" required>
    <input type="hidden" name="sig_prepared">
  </td>

  <td style="width:25%;">
    <span>Checked By:</span><br>
    <input type="text" placeholder="NAME" name="name_checked" required>
    <input type="hidden" name="sig_checked">
  </td>

  <td style="width:25%;">
    <span>Approved By:</span><br>
    <input type="text" placeholder="NAME" name="name_approved" required>
    <input type="hidden" name="sig_approved">
  </td>

  <td style="width:25%;">
    <span>Received By:</span><br>
    <input type="text" placeholder="NAME" name="name_received" required>
    <input type="hidden" name="sig_received">
  </td>
</tr>
</table>

<br>
<div style="text-align:center;">
<button type="submit">Save Form</button>
</div>

</form>
</div>
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