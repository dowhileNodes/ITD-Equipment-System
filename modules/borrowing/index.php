<?php
require_once __DIR__ . '/../../config/authentication.php';
require_once __DIR__ . '/../../includes/navbar.php';
?>
<!DOCTYPE html>
<html>
<head>
<title>IT Equipment Borrow / Return</title>

<style>

/* ===== GLOBAL ===== */
body {
    margin: 0;
    font-family: 'Segoe UI', sans-serif;
    background: url('viber_image_2026-02-24_11-08-29-685.jpg');
    background-size: cover;
    background-position: center;
}

/* BLUR */
body::before {
    content: "";
    position: fixed;
    top:0; left:0;
    width:100%; height:100%;
    backdrop-filter: blur(6px);
    z-index:-1;
}

/* CONTAINER */
.form-container {
    max-width: 650px;
    width: 90%;
     margin: 80px auto 50px auto;
    padding: 30px;
    background: rgba(255,255,255,0.08);
    border: 1px solid rgba(255,255,255,0.25);
    border-radius: 20px;
    backdrop-filter: blur(15px);
    box-shadow: 0 15px 40px rgba(0,0,0,0.5);
    color: white;
}

/* HEADER */
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
    font-size: 20px;
}

.header-title p {
    margin: 0;
    font-size: 14px;
}

/* INPUT */
label {
    font-size: 13px;
    font-weight: 600;
    display: block;
    margin-top: 15px;
}

input, select {
    width: 100%;
    padding: 10px 14px;
    border-radius: 8px;
    border: none;
    margin-top: 5px;
    margin-bottom: 10px;
}

input:focus, select:focus {
    outline: none;
    border: 1px solid #fd9002;
    box-shadow: 0 0 6px rgba(253,144,2,0.5);
}

/* ITEMS */
.checkbox-group {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 10px;
}

.item-box {
    justify-content: flex-start;
    grid-template-columns: 30px 1fr 70px;
    display: grid;
    margin: 0;
    align-items: center;
    gap: 6px 10px;
    padding: 12px 12px;
    background: rgba(255,255,255,0.12);
    border-radius: 10px;
    border: 1px solid rgba(255,255,255,0.25);
    cursor: pointer;
    transition: 0.2s;
}

.item-name {
    text-align: left;
    font-weight: 600;
    font-size: 14px;
}


/* ❌ removed orange hover */
.item-box:hover {
    background: rgba(255,255,255,0.18);
}

.item-box input[type="checkbox"] {
    justify-self: end;
    transform: scale(1.2);
    margin: 0;
    accent-color: #324a63;
}

/* remove orange focus */
.item-box input[type="checkbox"]:focus {
    outline: none;
    box-shadow: none;
}

.item-box span {
    text-align: center;
    font-weight: 500;
    font-size: 14px;
}

.qty-input {
    width: 60px;
    justify-self: end;
    text-align: center;
    margin-left: auto;
    display: none;
    padding: 3px;
    font-size: 12px;
    border-radius: 4px;
    border: 1px solid rgba(255,255,255,0.2);
    background: rgba(255,255,255,0.1);
    color: white;
}

#otherInputBox {
    display: none;
}

/* BUTTON */
.form-actions {
    display: flex;
    gap: 10px;
    margin-top: 20px;
}

button {
    flex: 1;
    padding: 12px;
    border: none;
    border-radius: 8px;
    background: #324a63;
    color: white;
    cursor: pointer;
    transition: 0.3s ease;
}

button:hover {
    background: #fd9002;
    transform: translateY(-2px);
}

/* MODAL */
.modal {
    position: fixed;
    top:0; left:0;
    width:100%;
    height:100%;
    background: rgba(0,0,0,0.6);
    backdrop-filter: blur(6px);
    display: none;
    justify-content: center;
    align-items: center;
    z-index: 9999;
}

.modal-content {
    background: rgba(255,255,255,0.1);
    padding: 30px 40px;
    border-radius: 15px;
    border: 1px solid rgba(255,255,255,0.3);
    text-align: center;
    color: white;
}

.modal-content button {
    margin: 10px 5px 0 5px;
}

</style>
</head>

<body>

<div class="form-container">

<div class="header">
    <div class="header-title">
        <h2>Toplis Solutions Incorporation</h2>
        <p>IT Equipment Borrow / Return</p>
    </div>
</div>

<!-- 🔥 CONNECTED FORM -->
<form method="POST" action="submit.php">

<label>Email</label>
<input type="email" name="email" required placeholder="Enter your email">

<label>Borrower Name</label>
<input type="text" name="borrower_name" required placeholder="Juan dela Cruz"
oninput="this.value = this.value.replace(/[^A-Za-zñÑ\s.,\-']/g, '')">

<label>Business Unit</label>
<select name="business_unit" required>
<option value="">-- Select --</option>
<option value="TOPLIS Solutions">TOPLIS Solutions</option>
<option value="TOPLIS Logistics">TOPLIS Logistics</option>
</select>

<label>Item ID</label>
<input type="text" name="item_id" required placeholder="ITD-001">

<label>Action</label>
<select name="action" required>
<option value="">-- Select --</option>
<option value="borrow">Borrow</option>
<option value="return">Return</option>
</select>

<label>Items</label>

<div class="checkbox-group">

<label class="item-box">
    <input type="checkbox" name="items[]" value="Laptop" class="item-check">
    <span class="item-name">💻 Laptop</span>
    <input type="number" class="qty-input" name="qty[]" min="1" disabled>
</label>

<label class="item-box">
    <input type="checkbox" name="items[]" value="Mouse" class="item-check">
    <span class="item-name">🖱️ Mouse</span>
    <input type="number" class="qty-input" name="qty[]" min="1" disabled>
</label>

<label class="item-box">
    <input type="checkbox" name="items[]" value="Keyboard" class="item-check">
    <span class="item-name">⌨️ Keyboard</span>
    <input type="number" class="qty-input" name="qty[]" min="1">
</label>

<label class="item-box">
    <input type="checkbox" name="items[]" value="Charger" class="item-check">
    <span class="item-name">🔌 Charger</span>
    <input type="number" class="qty-input" name="qty[]" min="1" disabled>
</label>

<label class="item-box">
    <input type="checkbox" name="items[]" value="Headset" class="item-check">
    <span class="item-name">🎧 Headset</span>
    <input type="number" class="qty-input" name="qty[]" min="1" disabled>
</label>

<label class="item-box">
    <input type="checkbox" id="otherCheck" name="items[]" value="Others">
    <span class="item-name">➕ Others</span>
    <input type="number" class="qty-input" name="qty[]" min="1" disabled>
</label>

</div>
<br>
<div id="otherInputBox">
    <input type="text" name="other_item" placeholder="Specify other item...">
</div>

<label>Borrow Date</label>
<input type="date" name="borrow_date" required>

<label>Return Date</label>
<input type="date" name="return_date" required>

<div class="form-actions">
<button type="submit">Submit</button>
<button type="button" id="clearFormBtn">Clear</button>
</div>
<?php if ($_SESSION['role'] === 'admin'): ?>
<div class="form-actions" style="margin-top: 10px;">
    <a href="/ITD-Equipment-System/modules/borrowing/admin_borrow.php" 
       style="color: #fd9002; text-decoration: underline;">Admin Borrow List</a>
</div>
<?php endif; ?>
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

// (UNCHANGED JS – working na)
document.querySelectorAll(".item-check").forEach(check => {
    check.addEventListener("change", function(){
        const qty = this.parentElement.querySelector(".qty-input");

        if(this.checked){
            qty.style.display = "block";
            qty.disabled = false;
            qty.value = 1;
        } else {
            qty.style.display = "none";
            qty.disabled = true;
            qty.value = "";
        }
    });
});

const otherCheck = document.getElementById("otherCheck");
const otherInputBox = document.getElementById("otherInputBox");

otherCheck.addEventListener("change", function(){
    const qty = this.parentElement.querySelector(".qty-input");

    if(this.checked){
        otherInputBox.style.display = "block";
        qty.style.display = "block";
        qty.disabled = false;
        qty.value = 1;
    } else {
        otherInputBox.style.display = "none";
        qty.style.display = "none";
        qty.disabled = true;
        qty.value = "";
    }
});

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
    document.querySelector("form").reset();
    document.querySelectorAll(".qty-input").forEach(q=>{
        q.style.display = "none";
        q.value = "";
    });
    otherInputBox.style.display = "none";
    closeModal();
}

function isEmpty(){
    let hasData = false;

    document.querySelectorAll("input, textarea").forEach(i => {

        if(i.classList.contains("qty-input") && i.style.display === "none"){
            return;
        }

        if(i.type === "checkbox"){
            if(i.checked) hasData = true;
        } else if(i.type === "date"){
            if(i.value !== "") hasData = true;
        } else {
            if(i.value.trim() !== "") hasData = true;
        }
    });

    document.querySelectorAll("select").forEach(s=>{
        if(s.value !== "") hasData = true;
    });

    return !hasData;
}

</script>

</body>
</html>