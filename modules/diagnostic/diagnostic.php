<?php
require_once __DIR__ . '/../../config/app.php';
require_once __DIR__ . '/../../config/authentication.php';
require_once __DIR__ . '/../../config/db.php';
requireLogin(); // make sure user is logged in
requireAdmin();
require_once __DIR__ . '/../../includes/navbar.php';
?>

<!DOCTYPE html>
<html>
<head>
<title>EQUIPMENT DIAGNOSTIC REPORT</title>

<style>

/* ===== GLOBAL ===== */
body {
    font-family: 'Segoe UI', sans-serif;
    background: url('viber_image_2026-02-24_11-08-29-685.jpg');
    background-size: cover;
    background-position: center;
    color: white;
    margin: 0;
}

body.modal-open {
    overflow: hidden;
}

body.modal-open::before {
    content: "";
    position: fixed;
    top:0; left:0;
    width:100%; height:100%;
    backdrop-filter: blur(8px);
    background: rgba(0,0,0,0.5);
    z-index: 998;
}

/* ===== FORM BOX ===== */
.form-box {
    max-width: 1000px;
    margin: 100px auto 60px auto;
    padding: 30px;
    background: rgba(255,255,255,0.08);
    border: 1px solid rgba(255,255,255,0.2);
    border-radius: 20px;
    backdrop-filter: blur(15px);
    box-shadow: 0 15px 40px rgba(0,0,0,0.5);
}

/* ===== HEADER ===== */
.header {
    display: flex;
    align-items: center;
    justify-content: center;
    position: relative;
    padding-bottom: 10px;
    margin-bottom: 25px;
    border-bottom: 1px solid rgba(255,255,255,0.2);
}

.header-title {
    text-align: center;
}

.header-title h2 {
    margin: 0;
    color: #fd9002;
    font-size: 22px;
}

.header-title p {
    margin: 0;
    font-size: 15px;
}

/* ===== INPUTS ===== */
input, textarea, select {
    width: 100%;
    padding: 10px 14px;
    font-size: 13px;
    border-radius: 8px;
    border: none;
    outline: none;
    margin-top: 5px;
    margin-bottom: 10px;
}

input:focus, textarea:focus {
    border: 1px solid #fd9002;
    box-shadow: 0 0 6px rgba(253,144,2,0.5);
}

textarea {
    resize: vertical;
    min-height: 80px;
}

/* ===== HEADER FLEX ===== */
.form-header {
    width: 80%;
    margin: auto;
    display: flex;
    gap: 20px;
}

.form-header div {
    width: 50%;
}

/* ===== LABEL ===== */
label {
    font-size: 13px;
    font-weight: 600;
}

/* ===== SECTION ===== */
h3 {
    width: 80%;
    margin: 25px auto 10px auto;
    border-left: 4px solid #fd9002;
    padding-left: 10px;
    font-size: 15px;
}

/* ===== TABLE ===== */
table.equipment,
table.signatures {
    width: 100%;
    margin: 15px auto;
    border-collapse: collapse;
    border-radius: 10px;
    overflow: hidden;
}

th {
    background: #324a63;
    color: white;
}

td {
    background: rgba(255,255,255,0.95);
    color: black;
}

th, td {
    padding: 14px 12px;
    border: 1px solid rgba(0,0,0,0.15);
}

/* ===== BUTTONS ===== */
.form-actions {
    width: 80%;
    margin: auto;
    text-align: center;
}

.form-actions button {
    padding: 10px 20px;
    border-radius: 8px;
    border: none;
    cursor: pointer;
    font-size: 13px;
    background: #324a63;
    color: white;
    transition: 0.3s;
}

.form-actions button:hover {
    background: #fd9002;
}

/* ===== MODAL ===== */
#clearModal {
    display:none;
    position:fixed;
    top:0; left:0;
    width:100%; height:100%;
    z-index: 999;
    align-items:center;
    justify-content:center;
}

#clearModal .modal-content {
    background: rgba(255,255,255,0.1);
    color: white;
    border: 1px solid rgba(255,255,255,0.3);
    backdrop-filter: blur(15px);
    border-radius: 15px;
    padding: 25px;
    min-width: 300px;
    text-align: center;
    box-shadow: 0 10px 30px rgba(0,0,0,0.5);
}

/* 🔥 FIXED BUTTON STYLE */
#modalButtons button {
    margin: 5px;
    padding: 8px 15px;
    border-radius: 6px;
    border: none;
    cursor: pointer;
    background: #324a63; /* default blue */
    color: white;
    transition: 0.3s;
}

/* 🔥 hover orange */
#modalButtons button:hover {
    background: #fd9002;
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(0,0,0,0.4);
}

</style>
</head>

<body>

<div class="form-box">

<div class="header">
    <div class="header-title">
        <h2>Toplis Solutions Incorporation</h2>
        <p>EQUIPMENT DIAGNOSTIC REPORT</p>
    </div>
</div>

<form method="POST" action="save_diagnostic.php">

<div class="form-header">
    <div>
        <label>Issued to:</label>
<input type="text" name="issued_to" required 
placeholder="Juan dela Cruz"
pattern="[A-Za-zñÑ\s.\-']+"
oninput="this.value = this.value.replace(/[^A-Za-zñÑ\s.,\-']/g, '')">
    </div>

    <div>
        <label>Date:</label>
        <input type="date" name="issue_date" required>
    </div>
</div>

<h3>Equipment Details</h3>

<table class="equipment">
<tr>
    <th>DATE OF PURCHASE</th>
    <th>SUPPLIER</th>
    <th>ITEM DESCRIPTION</th>
</tr>

<tr>
    <td>
         <input type="date" name="date_of_purchase" required>
    </td>

    <td>
        <input type="text" name="supplier" required placeholder="Supplier Name">
    </td>

    <td>
     <textarea name="item_description" required placeholder="Describe the item"></textarea>
</td>
</tr>

<tr>
    <th>SERIAL NUMBER</th>
    <th>PROBLEM</th>
    <th>RECOMMENDATION</th>
</tr>

<tr>
    <td>
         <input type="text" name="serial_number" required placeholder="Serial Number">
    </td>

    <td>
   <textarea name="problem" required placeholder="Describe the problem"></textarea>
</td>

<td>
    <textarea name="recommendation" required placeholder="Recommended solution"></textarea>
</td>
</tr>
</table>

<h3>Signatures</h3>

<table class="signatures">
<tr>
    <th>RECOMMENDED BY</th>
    <th>NOTED BY</th>
    <th>APPROVED BY</th>
</tr>

<tr>
    <td>
        <input type="text" name="recommended_by" required placeholder="Juan dela Cruz"
        pattern="[A-Za-zñÑ\s.,\-']+"
        oninput="this.value = this.value.replace(/[^A-Za-zñÑ\s.,\-']/g, '')">
    </td>

    <td>
        <input type="text" name="noted_by" required placeholder="Juan dela Cruz"
        pattern="[A-Za-zñÑ\s.,\-']+"
        oninput="this.value = this.value.replace(/[^A-Za-zñÑ\s.,\-']/g, '')">
    </td>

    <td>
        <input type="text" name="approved_by" required placeholder="Juan dela Cruz"
        pattern="[A-Za-zñÑ\s.,\-']+"
        oninput="this.value = this.value.replace(/[^A-Za-zñÑ\s.,\-']/g, '')">
    </td>
</tr>
</table>

<div class="form-actions">
    
    <button type="submit" >Save Form</button>
    <button type="button" id="clearFormBtn">Clear Form</button>
</div>

</form>

</div>

<!-- MODAL -->
<div id="clearModal">
    <div class="modal-content">
        <p id="modalText"></p>
        <div id="modalButtons"></div>
    </div>
</div>

<script>

const clearBtn = document.getElementById("clearFormBtn");
const modal = document.getElementById("clearModal");
const modalText = document.getElementById("modalText");
const modalButtons = document.getElementById("modalButtons");

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
    document.body.classList.add("modal-open");
}

function closeModal(){
    modal.style.display = "none";
    document.body.classList.remove("modal-open");
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
    document.querySelector("form").reset();
    closeModal();
}

function isEmpty(){
    let inputs = document.querySelectorAll("input, textarea");
    let hasData = false;

    inputs.forEach(i=>{
        if(i.value.trim() !== ""){
            hasData = true;
        }
    });

    return !hasData;
}

</script>

</body>
</html>