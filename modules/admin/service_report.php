<?php
require_once '../../config/authentication.php';
requireAdmin(); // only admins can access

require_once '../../config/db.php';
require_once __DIR__ . '/../../includes/navbar.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>IT Service Report</title>

<style>

body {
    margin: 0;
    font-family: Arial, sans-serif;
    background: url('viber_image_2026-02-24_11-08-29-685.jpg');
    background-size: cover;
    background-position: center;
}

body::before {
    content: "";
    position: fixed;
    top:0; left:0;
    width:100%; height:100%;
    backdrop-filter: blur(6px);
    z-index:-1;
}

/* CONTAINER */
.container {
    width: 85%;
    max-width: 900px;
    margin: 100px auto;
    background: rgba(255,255,255,0.08);
    border: 1px solid rgba(255,255,255,0.25);
    backdrop-filter: blur(15px);
    padding: 20px;
    border-radius: 15px;
    box-shadow: 0 10px 40px rgba(0,0,0,0.4);
}

/* FORM */
.table-wrapper {
    width: 80%;
    margin: auto;
    background: #fff;
    padding: 15px;
    border-radius: 8px;
}

/* TABLE */
table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 15px;
}

td, th {
    border: 1px solid #999;
    padding: 5px;
    font-size: 12px;
    vertical-align: top;
}

.section-title {
    text-align: center;
    font-weight: bold;
    background: #f2f2f2;
}

input, textarea {
    width: 100%;
    border: none;
    outline: none;
    font-size: 12px;
}

textarea {
    resize: none;
}

/* RADIO */
.radio-group,
.status-group {
    display: flex;
    gap: 20px;
    align-items: center;
}

.radio-group label,
.status-group label {
    display: flex;
    align-items: center;
    gap: 5px;
}

/* HEADER */
.header {
    display: flex;
    justify-content: center;
    margin-bottom: 15px;
    color: orange;
}

/* BUTTON */
.form-actions {
    display: flex;
    gap: 10px;
    margin-top: 15px;
}

button {
    flex: 1;
    padding: 8px;
    border: none;
    background: #324a63;
    color: white;
    border-radius: 6px;
    cursor: pointer;
}

button:hover {
    background: #fd9002;
}

/* ===== 🔥 SCROLL FIX (FINAL) ===== */
.scroll-section {
    width: 100%;
    overflow-x: auto;
}

.scroll-section table {
    min-width: 700px; /* prevents overlap */
}

.scroll-section textarea {
    min-height: 80px;
}

/* MODAL */
.modal {
    position: fixed;
    top:0; left:0;
    width:100%;
    height:100%;
    background: rgba(0,0,0,0.6);
    display: none;
    justify-content: center;
    align-items: center;
    z-index: 9999;
}

.modal-content {
    background: rgba(255,255,255,0.1);
    backdrop-filter: blur(10px);
    padding: 25px 30px;
    border-radius: 12px;
    text-align: center;
    color: white;
    border: 1px solid rgba(255,255,255,0.3);
}

.modal-content button {
    margin: 5px;
    padding: 8px 15px;
    border: none;
    border-radius: 6px;
    background: #324a63;
    color: white;
    cursor: pointer;
}

.modal-content button:hover {
    background: #fd9002;
}

</style>
</head>

<body>

<div class="container">

<div class="header">
    <h2>IT Service Report</h2>
</div>

<form id="serviceForm">

<div class="table-wrapper">

<!-- HEADER -->
<table>
<tr>
    <td>Reported Date<br><input type="date" required></td>
    <td>Activity Date<br><input type="date" required></td>
    <td>Initial Status<br><input type="text" placeholder="e.g., Open, In Progress" required></td>
    <td>Service No.<br><input type="text" placeholder="Auto-generated" readonly></td>
    <td>Ticket No.<br><input type="text" placeholder="e.g., SVC-001" required></td>
</tr>
</table>

<!-- SITE -->
<table>
<tr><td colspan="3" class="section-title">SITE'S INFORMATION</td></tr>
<tr>
    <td>Site Location<br><input type="text" placeholder="e.g., Main Office, Branch A" required></td>
    <td>Contact No.<br><input type="text" placeholder="e.g., +63 912 345 6789" required></td>
    <td>Contact Person<br><input type="text" placeholder="e.g., John Doe" required></td>
</tr>
</table>

<!-- 🔥 ASSESSMENT -->
<div class="scroll-section">
<table>
<tr><td class="section-title">ASSESSMENT / TROUBLESHOOT</td></tr>
<tr>
    <td><textarea rows="3" required placeholder="Describe the issue..."></textarea></td>
</tr>
</table>
</div>

<!-- 🔥 RECOMMENDATIONS -->
<div class="scroll-section">
<table>
<tr><td colspan="2" class="section-title">RECOMMENDATIONS / FURTHER ACTIONS</td></tr>

<tr>
    <td>Remarks<br><textarea rows="2" required placeholder="Add any additional remarks..."></textarea></td>
    <td>Parts Needed<br><textarea rows="2" required placeholder="List any parts needed..."></textarea></td>
</tr>

<tr>
    <td>
        For Replace?
        <div class="radio-group">
            <label><input type="radio" name="replace" required> Yes</label>
            <label><input type="radio" name="replace"> No</label>
        </div>
    </td>

    <td>
        For Disposal?
        <div class="radio-group">
            <label><input type="radio" name="disposal" required> Yes</label>
            <label><input type="radio" name="disposal"> No</label>
        </div>
    </td>
</tr>

</table>
</div>

<!-- EQUIPMENT -->
<table>
<tr><td colspan="5" class="section-title">EQUIPMENT DETAILS</td></tr>

<tr>
    <th>Product Name</th>
    <th>Model No.</th>
    <th>Serial No.</th>
    <th>Date of Purchase</th>
    <th>Problem</th>
</tr>

<tr>
    <td><input type="text" required placeholder="e.g., Laptop, Desktop"></td>
    <td><input type="text" required placeholder="e.g., XYZ-123"></td>
    <td><input type="text" required placeholder="e.g., SN-456"></td>
    <td><input type="date" required></td>
    <td><input type="text" required placeholder="e.g., Not booting"></td>
</tr>

</table>

<!-- STATUS -->
<table>
<tr><td colspan="2" class="section-title">STATUS</td></tr>

<tr>
    <td>
        Status:
        <div class="status-group">
            <label><input type="radio" name="status" required> Resolved</label>
            <label><input type="radio" name="status"> Onhold</label>
            <label><input type="radio" name="status"> Cancel</label>
        </div>
    </td>

    <td>
        Resolved On<br>
        <input type="date" required>
    </td>
</tr>

</table>

<!-- SIGNATURE -->
<table>
<tr><td colspan="2" class="section-title">SIGNATURE</td></tr>

<tr>
<td style="text-align:center; padding-top:20px;">
<b>Prepared By:</b><br><br>
<input type="text" required placeholder="e.g., Jane Doe" style="width:80%; border:none; border-bottom:1px solid #000; text-align:center;">
<br><br>
<small>Field IT Support<br>Signature Over Printed Name</small>
</td>

<td style="text-align:center; padding-top:20px;">
<b>Acknowledged By:</b><br><br>
<input type="text" required placeholder="e.g., John Doe" style="width:80%; border:none; border-bottom:1px solid #000; text-align:center;">
<br><br>
<small>Client's Signature Over Printed Name</small>
</td>
</tr>

</table>

<!-- BUTTON -->
<div class="form-actions">
    <button type="submit">Submit</button>
    <button type="button" id="clearFormBtn">Clear Form</button>
</div>

</div>
</form>

</div>

<!-- MODAL -->
<div id="clearModal" class="modal">
<div class="modal-content">
<p id="modalText"></p>
<div id="modalButtons"></div>
</div>
</div>

<script>

const form = document.getElementById("serviceForm");
const clearBtn = document.getElementById("clearFormBtn");
const modal = document.getElementById("clearModal");
const modalText = document.getElementById("modalText");
const modalButtons = document.getElementById("modalButtons");

form.addEventListener("submit", function(e){
    if(isEmpty()){
        e.preventDefault();
        showModal("Fill out form first", "empty");
    }
});

clearBtn.onclick = function(){
    if(isEmpty()){
        showModal("Fill out form first", "empty");
    } else {
        showModal("Are you sure you want to clear the form?", "filled");
    }
};

function showModal(text, type){
    modalText.innerText = text;
    modalButtons.innerHTML = "";

    if(type === "empty"){
        modalButtons.innerHTML = `<button onclick="closeModal()">OK</button>`;
    }

    if(type === "filled"){
        modalButtons.innerHTML = `
            <button onclick="confirmClear()">Yes</button>
            <button onclick="closeModal()">Cancel</button>
        `;
    }

    modal.style.display = "flex";
}

function closeModal(){
    modal.style.display = "none";
}

modal.addEventListener("click", function(e){
    if(e.target === modal){
        closeModal();
    }
});

document.addEventListener("keydown", function(e){
    if(e.key === "Escape"){
        closeModal();
    }
});

function confirmClear(){
    form.reset();
    closeModal();
}

function isEmpty(){
    let hasData = false;

    const inputs = form.querySelectorAll("input, textarea");

    inputs.forEach(i => {
        if(i.type === "radio"){
            if(i.checked) hasData = true;
        }
        else if(i.type === "date"){
            if(i.value !== "") hasData = true;
        }
        else if(i.type === "text"){
            if(i.value.trim() !== "" && i.value !== "Auto-generated") hasData = true;
        }
    });

    return !hasData;
}

</script>

</body>
</html>