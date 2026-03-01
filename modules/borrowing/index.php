<?php
require_once __DIR__ . '/../../config/authentication.php';
require_once __DIR__ . '/../../includes/navbar.php';
/*session_start();
if (!isset($_SESSION['employee_id'])) {
    header("Location: login.php");
    exit();
}*/
?>
<!DOCTYPE html>
<html>
<head>
    <title>IT Equipment Borrow / Return</title>

    <style>
        body {
            margin: 0;
            font-family: Georgia, serif;
            background-image: url('viber_image_2026-02-24_11-08-29-685.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }

        
        .form-container {
            max-width: 700px;
            margin: 60px auto;
            padding: 40px;
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255,255,255,0.3);
            border-radius: 15px;
            box-shadow: 0 8px 25px rgba(0,0,0,0.3);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            color: white;
        }

        h2 {
            text-align: center;
            margin-bottom: 30px;
        }

        label {
            display: block;
            margin-top: 15px;
            margin-bottom: 5px;
        }

        input, select {
            width: 100%;
            padding: 10px;
            border-radius: 8px;
            border: none;
            margin-bottom: 10px;
        }

        input[type="checkbox"] {
            width: auto;
            margin-right: 8px;
        }

        .checkbox-group {
            margin-bottom: 15px;
        }

        button {
            width: 100%;
            padding: 12px;
            background-color: #324a63;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            cursor: pointer;
            transition: 0.3s;
        }

        button:hover {
            background-color: #fd9002;
            transform: translateY(-3px);
        }
    </style>
</head>

<body>

<div class="form-container">
    <h2>IT Equipment Borrow / Return</h2>

    <form action="submit.php" method="POST">

        <label>Email</label>
        <input type="email" name="email" required>

        <label>Borrower Name</label>
        <input type="text" name="borrower_name" required>

        <label>Business Unit</label>
        <select name="business_unit" required>
            <option value="">-- Select Business Unit --</option>
            <option>TOPLIS Solutions</option>
            <option>TOPLIS Logistics</option>
            <option>KABRASO</option>
            <option>TOTC</option>
            <option>Greatways Manpower International</option>
            <option>Shared Solutions</option>
            <option>VelcoAsia</option>
            <option>UPark</option>
            <option>Logicore Express</option>
            <option>Newtec Certified Inc</option>
            <option>Shared Services</option>
        </select>

        <label>Item ID</label>
        <input type="text" name="item_id" required>

        <label>Action</label>
        <select name="action">
            <option value="borrow">Borrow</option>
            <option value="return">Return</option>
        </select>

        <label>Items</label>
        <div class="checkbox-group">
            <input type="checkbox" name="items[]" value="Laptop"> Laptop<br>
            <input type="checkbox" name="items[]" value="Mouse"> Mouse<br>
            <input type="checkbox" name="items[]" value="Keyboard"> Keyboard
        </div>

        <label>Borrow Date</label>
        <input type="date" name="borrow_date">

        <label>Return Date</label>
        <input type="date" name="return_date">

        <button type="submit">Submit Request</button>

    </form>
</div>

</body>
</html>
