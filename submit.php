<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

//db connect
$conn = new mysqli("localhost", "root", "", "it_equipment_db");
if ($conn->connect_error) die("Database connection failed");

//forms
$email = $_POST['email'];
$borrower_name = $_POST['borrower_name'];
$business_unit = $_POST['business_unit'];
$item_id = $_POST['item_id'];
$action = $_POST['action'];
$items = isset($_POST['items']) ? implode(", ", $_POST['items']) : "";
$borrow_date = $_POST['borrow_date'];
$return_date = $_POST['return_date'];

// validation to check if new borrow record has been recorded
if ($action == "return") {
    // Update the existing borrowed row
    $stmt = $conn->prepare("
        UPDATE it_equipment_logs 
        SET action = 'return', return_date = ?, created_at = NOW() 
        WHERE email = ? AND item_id = ? AND items = ? AND action = 'borrow'
    ");
    $stmt->bind_param("ssss", $return_date, $email, $item_id, $items);
    $stmt->execute();

    // If no row was updated, it means no borrow exists, insert new row
    if ($stmt->affected_rows == 0) {
        $stmt = $conn->prepare("
            INSERT INTO it_equipment_logs
            (email, borrower_name, business_unit, item_id, action, items, borrow_date, return_date)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)
        ");
        $stmt->bind_param("ssssssss", $email, $borrower_name, $business_unit, $item_id, $action, $items, $borrow_date, $return_date);
        $stmt->execute();
    }
} else {
    // Borrow action - insert new row 
    $stmt = $conn->prepare("
        INSERT INTO it_equipment_logs
        (email, borrower_name, business_unit, item_id, action, items, borrow_date, return_date)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?)
    ");
    $stmt->bind_param("ssssssss", $email, $borrower_name, $business_unit, $item_id, $action, $items, $borrow_date, $return_date);
    $stmt->execute();
}

//email function - GMAIL
$mail = new PHPMailer(true);
try {
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'hopperjane.tsi123@gmail.com';
    $mail->Password = 'cvowqjfuhevodgeu';
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

    $mail->setFrom('hopperjane.tsi123@gmail.com', 'IT Support');
    $mail->addAddress($email, $borrower_name);
/*email function - OUTLOOK
try{
$mail = new PHPMailer(true);

$mail->isSMTP();
$mail->Host       = 'smtp.office365.com';
$mail->SMTPAuth   = true;

$mail->Username   = 'your_email@outlook.com';
$mail->Password   = 'YOUR_APP_PASSWORD'; 

$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
$mail->Port       = 587;*/

$mail->SMTPDebug  = 2; // enable while testing
    $mail->Subject = 'IT Equipment Form Submission';
    $mail->Body = "
Hello $borrower_name,

Your IT equipment request has been recorded.

Action: $action
Item ID: $item_id
Items: $items
Borrow Date: $borrow_date
Return Date: $return_date

Thank you.
";

    $mail->send();

} catch (Exception $e) {
    echo "Email could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

echo "Form submitted successfully!";
?>
