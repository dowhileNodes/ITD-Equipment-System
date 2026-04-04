<?php
require_once __DIR__ . '/../../config/authentication.php';
require_once __DIR__ . '/../../includes/navbar.php';
?>
<!DOCTYPE html>
<html>
<head>
<title>Equipment Issuance Form</title>

<style>

/* ===== GLOBAL ===== */
body{
    margin:0;
    font-family:'Segoe UI', sans-serif;
    background:url('viber_image_2026-02-24_11-08-29-685.jpg');
    background-size:cover;
    background-position:center;
    color:white;
}

/* ===== FORM BOX ===== */
.form-box{
    max-width:850px;
    margin:60px auto 60px auto;
    padding:30px;
    background:rgba(255,255,255,0.08);
    border:1px solid rgba(255,255,255,0.2);
    border-radius:20px;
    backdrop-filter:blur(15px);
    box-shadow:0 15px 40px rgba(0,0,0,0.5);
}

/* ===== HEADER ===== */
.header{
    position:relative;
    display:flex;
    align-items:center;
    margin-bottom:25px;
    border-bottom:1px solid rgba(255,255,255,0.2);
    padding-bottom:15px;
}


.header-text{
    width:100%;
    text-align:center;
}

.header-text h2{
    margin:0;
    font-size:24px;
    color:#fd9002;
}

.header-text p{
    margin:0;
    font-size:13px;
    color:#e0e0e0;
}

/* ===== INPUTS ===== */
input, select, textarea{
    width:100%;
    padding:10px 14px;
    font-size:13px;
    border-radius:8px;
    border:none;
    outline:none;
    margin-top:5px;
    margin-bottom:12px;
}

input:focus, select:focus, textarea:focus{
    border:1px solid #fd9002;
    box-shadow:0 0 6px rgba(253,144,2,0.5);
}

/* ===== FLEX ===== */
.form-row{
    width:80%;
    margin:0 auto;
    display:flex;
    gap:20px;
}

/* ===== SECTION ===== */
h3{
    width:80%;
    margin:25px auto 10px auto;
    border-left:4px solid #fd9002;
    padding-left:10px;
}

/* ===== TABLE ===== */

#equipmentTable th:last-child,
#equipmentTable td:last-child{
    width:60px;
    padding:6px;
}

table{
    width:80%;
    margin:5px auto;
    border-collapse:collapse;
    border-radius:10px;
    overflow:hidden;
}

th{
    background:#324a63;
    color:white;
}

td{
    background:rgba(255,255,255,0.9);
    color:black;
}

th, td{
    padding:10px;
    border:1px solid rgba(0,0,0,0.2);
    text-align:center;
}

/* ===== TRASH BUTTON ===== */
.remove-btn{
    background:#e74c3c;
    border:1px solid #ff6b5a;
    padding:6px;
    border-radius:6px;
    cursor:pointer;
    display:inline-flex;
    align-items:center;
    justify-content:center;
}

.remove-btn svg{
    width:16px;
    height:16px;
}

.remove-btn:hover{
    background:#fd9002;
}

/* ===== BUTTONS ===== */
button{
    background:#324a63;
    color:white;
    padding:10px 20px;
    border:none;
    border-radius:8px;
    cursor:pointer;
}

button:hover{
    background:#fd9002;
}

.clear-btn{
    background:#324a63;
}

.submit-box{
    display:flex;
    justify-content:center;
    gap:10px;
}

.add-btn{
    width:80%;
    margin:auto;
    text-align:right;
}

/* ===== MODAL ===== */
#clearModal{
display:none;
opacity:0;
transition:0.3s ease;
position:fixed;
top:0;left:0;
width:100%;height:100%;
background:rgba(0,0,0,0.6);
justify-content:center;
align-items:center;
z-index:999;
}

#clearModal.show{
display:flex;
opacity:1;
}

#clearModal > div{
transform:scale(0.8);
transition:0.3s ease;
}

#clearModal.show > div{
transform:scale(1);
}

/* SAME STYLE AS EQUIPMENT TABLE */
.signature-table{
    width:80%;
    margin:15px auto;
    border-collapse:collapse;
    border-radius:10px;
    overflow:hidden;
}

/* HEADER SAME */
.signature-table th{
    background:#324a63;
    color:white;
    font-size:13px;
}

/* BODY SAME */
.signature-table td{
    background:rgba(255,255,255,0.9);
    color:black;
}

/* CELL STYLE SAME */
.signature-table th,
.signature-table td{
    padding:12px;
    text-align:center;
    border:1px solid rgba(0,0,0,0.2);
}

</style>
</head>

<body>

<div class="form-box">

<div class="header">
<div class="header-text">
<h2>Toplis Solutions Incorporation</h2>
<p>GATE PASS</p>
</div>
</div>

<form method="POST" action="save_form.php">

<div class="form-row">

<div style="width:48%;">
<label>Recipient:</label>
<input type="text" name="recipient" placeholder="NAME" required
pattern="[A-Za-zñÑ\s.\-']+"
oninput="this.value = this.value.replace(/[^A-Za-zñÑ\s.,\-']/g, '')">

<label>From:</label>
<input type="text" name="issued_from" placeholder="NAME" required
pattern="[A-Za-zñÑ\s.\-']+"
oninput="this.value = this.value.replace(/[^A-Za-zñÑ\s.,\-']/g, '')">
</div>

<div style="width:48%;">
<label>Business Unit:</label>
<select name="business_unit" required>
<option value="">--Select Business Unit--</option>
<option>TOTCI</option>
<option>IT Department</option>
<option>KMC</option>
<option>Toplis Solutions</option>
<option>Toplis Logistics</option>
</select>

<label>Date:</label>
<input type="date" name="issue_date" required>
</div>

</div>

<h3>Equipment Details</h3>

<table id="equipmentTable">
<tr>
<th>QUANTITY</th>
<th>DESCRIPTION</th>
<th>ACTION</th>
</tr>

<tr>
<td><input type="number" min="1" placeholder="0" name="qty[]" required
oninput="this.value = this.value.replace(/[^0-9]/g, '')"
onkeydown="if(['e','E','+','-','.'].includes(event.key)) event.preventDefault();"></td>
<td><textarea name="description_items[]" required placeholder="Laptop, Serial No, etc..."></textarea></td>
<td></td>
</tr>
</table>

<div class="add-btn">
<button type="button" id="addItemBtn">+ Add Item</button>
</div>

<h3>Signatures</h3>
<table class="signature-table">
<tr>
<th>PREPARED BY</th>
<th>CHECKED BY</th>
<th>APPROVED BY</th>
<th>RECEIVED BY</th>
</tr>

<tr>
<td>
<input type="text" name="name_prepared" placeholder="Juan dela Cruz" required
pattern="[A-Za-zñÑ\s.\-']+"
oninput="this.value = this.value.replace(/[^A-Za-zñÑ\s.,\-']/g, '')">
</td>

<td>
<input type="text" name="name_checked" placeholder="Juan dela Cruz" required
pattern="[A-Za-zñÑ\s.\-']+"
oninput="this.value = this.value.replace(/[^A-Za-zñÑ\s.,\-']/g, '')">
</td>

<td>
<input type="text" name="name_approved" placeholder="Juan dela Cruz" required
pattern="[A-Za-zñÑ\s.\-']+"
oninput="this.value = this.value.replace(/[^A-Za-zñ\s.,\-']/g, '')">
</td>

<td>
<input type="text" name="name_received" placeholder="Juan dela Cruz" required
pattern="[A-Za-zñÑ\s.\-']+"
oninput="this.value = this.value.replace(/[^A-Za-zñÑ\s.,\-']/g, '')">
</td>

</tr>
</table>

<div class="submit-box">
<button type="submit">Save Form</button>
<button type="button" id="clearFormBtn" class="clear-btn">Clear Form</button>
</div>

</form>
</div>

<!-- MODAL -->
<div id="clearModal">
<div style="
background:rgba(255,255,255,0.08);
border:1px solid rgba(255,255,255,0.2);
border-radius:15px;
backdrop-filter:blur(15px);
padding:25px;
text-align:center;
color:white;
min-width:300px;
">

<p id="modalText"></p>
<div id="modalButtons"></div>

</div>
</div>

<script>

// ADD ROW
document.getElementById("addItemBtn").onclick=function(){
let table=document.getElementById("equipmentTable");
let row=table.insertRow(-1);

row.innerHTML=`
<td><input type="number" min="1" placeholder="0" name="qty[]"></td>
<td><textarea name="description_items[]" placeholder="Laptop, Serial No, etc..."></textarea></td>
<td>
<span class="remove-btn" onclick="removeRow(this)">
<svg viewBox="0 0 24 24" fill="none">
<path d="M3 6h18" stroke="white" stroke-width="2"/>
<path d="M8 6v14h8V6" stroke="white" stroke-width="2"/>
<path d="M10 6V4h4v2" stroke="white" stroke-width="2"/>
</svg>
</span>
</td>`;
};

// REMOVE ROW
function removeRow(el){
let table=document.getElementById("equipmentTable");
if(table.rows.length>2){
el.closest("tr").remove();
}
}

// ELEMENTS
const clearBtn=document.getElementById("clearFormBtn");
const modal=document.getElementById("clearModal");
const modalText=document.getElementById("modalText");
const modalButtons=document.getElementById("modalButtons");

// CLICK CLEAR
clearBtn.onclick=function(){
if(isEmpty()){
showModal("Fill out form first","empty");
}else{
showModal("Are you sure you want to clear the form?","filled");
}
};

// SHOW MODAL
function showModal(text,type){

modalText.innerText = text;
modalButtons.innerHTML = "";

// EMPTY
if(type === "empty"){
modalButtons.innerHTML = `<button onclick="closeModal()">Continue</button>`;
}

// FILLED
if(type === "filled"){
modalButtons.innerHTML = `
<button onclick="confirmClear()">Yes</button>
<button onclick="closeModal()">Cancel</button>
`;
}

modal.style.display="flex";

setTimeout(()=>{
modal.classList.add("show");
},10);
}

// CLOSE
function closeModal(){
modal.classList.remove("show");

setTimeout(()=>{
modal.style.display="none";
},300);
}

// CLICK OUTSIDE
modal.addEventListener("click", function(e){
if(e.target === modal){
closeModal();
}
});

// ESC
document.addEventListener("keydown", function(e){
if(e.key === "Escape"){
closeModal();
}
});

// CLEAR FORM
function confirmClear(){

document.querySelector("form").reset();

let table=document.getElementById("equipmentTable");
while(table.rows.length>2){
table.deleteRow(2);
}

closeModal();
}

// EMPTY CHECK
function isEmpty(){

// BASIC FIELDS
let recipient = document.querySelector('[name="recipient"]').value.trim();
let from = document.querySelector('[name="issued_from"]').value.trim();
let business = document.querySelector('[name="business_unit"]').value;
let date = document.querySelector('[name="issue_date"]').value;

// EQUIPMENT
let qtys = document.querySelectorAll('[name="qty[]"]');
let descriptions = document.querySelectorAll('[name="description_items[]"]');

// SIGNATURES
let signatures = document.querySelectorAll('input[name^="name_"]');

// CHECK FLAGS
let hasQty = false;
let hasDescription = false;
let hasSignature = false;

// CHECK QTY
qtys.forEach(q=>{
if(q.value.trim() !== "" && q.value !== "0"){
hasQty = true;
}
});

// CHECK DESCRIPTION
descriptions.forEach(d=>{
if(d.value.trim() !== ""){
hasDescription = true;
}
});

// CHECK SIGNATURES
signatures.forEach(s=>{
if(s.value.trim() !== ""){
hasSignature = true;
}
});

// FINAL CHECK
return (
recipient === "" &&
from === "" &&
business === "" &&
date === "" &&
!hasQty &&
!hasDescription &&
!hasSignature
);
}

</script>
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