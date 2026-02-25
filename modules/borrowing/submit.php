<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once __DIR__ . '/../../config/db.php';
require_once __DIR__ . '/../../PHPMailer/Exception.php';
require_once __DIR__ . '/../../PHPMailer/PHPMailer.php';
require_once __DIR__ . '/../../PHPMailer/SMTP.php';

/* GET FORM DATA*/
$email = $_POST['email'];
$borrower_name = $_POST['borrower_name'];
$business_unit = $_POST['business_unit'];
$item_id = $_POST['item_id'];
$action = $_POST['action'];
$items = isset($_POST['items']) ? implode(", ", $_POST['items']) : "";
$borrow_date = $_POST['borrow_date'];
$return_date = $_POST['return_date'];

/* DATABASE LOGIC */
if ($action == "return") {

    $stmt = $conn->prepare("
        UPDATE it_equipment_logs
        SET action = 'return', return_date = ?, created_at = NOW()
        WHERE email = ? AND item_id = ? AND items = ? AND action = 'borrow'
    ");
    $stmt->bind_param("ssss", $return_date, $email, $item_id, $items);
    $stmt->execute();

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

    $stmt = $conn->prepare("
        INSERT INTO it_equipment_logs
        (email, borrower_name, business_unit, item_id, action, items, borrow_date, return_date)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?)
    ");
    $stmt->bind_param("ssssssss", $email, $borrower_name, $business_unit, $item_id, $action, $items, $borrow_date, $return_date);
    $stmt->execute();
}

/* EMAIL FUNCTION */
$mail = new PHPMailer(true);

try {
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'hopperjane.tsi123@gmail.com';
    $mail->Password = 'cvowqjfuhevodgeu';

    //USE TLS 
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    //FIX for XAMPP localhost SSL issue
    $mail->SMTPOptions = [
        'ssl' => [
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
        ],
    ];

    $mail->setFrom('hopperjane.tsi123@gmail.com', 'IT Support');
    $mail->addAddress($email, $borrower_name);

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

    $mail->SMTPDebug = 0; 
    $mail->send();

   echo "
<!DOCTYPE html>
<html>
<head>
<title>Submission Successful</title>

<style>
body {
    margin: 0;
    font-family: Georgia, serif;
    background-image: url('viber_image_2026-02-24_11-08-29-685.jpg');
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

/* Glass Container */
.success-box {
    width: 500px;
    padding: 40px;
    text-align: center;
    background: rgba(255, 255, 255, 0.1);
    border: 1px solid rgba(255,255,255,0.3);
    border-radius: 20px;
    backdrop-filter: blur(12px);
    -webkit-backdrop-filter: blur(12px);
    box-shadow: 0 10px 30px rgba(0,0,0,0.4);
    color: white;
    animation: fadeIn 0.8s ease-in-out;
}

.success-box h2 {
    margin-bottom: 15px;
    font-size: 24px;
}

.success-box p {
    font-size: 15px;
    margin-bottom: 25px;
    line-height: 1.6;
}

/* Button */
.success-box button {
    padding: 12px 30px;
    font-size: 15px;
    border: none;
    border-radius: 8px;
    background-color: #324a63;
    color: white;
    cursor: pointer;
    transition: 0.3s;
}

.success-box button:hover {
    background-color: #fd9002;
    transform: scale(1.05);
}

/* Animation */
@keyframes fadeIn {
    from { opacity: 0; transform: translateY(20px); }
    to { opacity: 1; transform: translateY(0); }
}
</style>
</head>

<body>

<div class='success-box'>
    <h2>✅ Request Submitted Successfully</h2>
    <p>
        Your IT Equipment request has been recorded successfully.<br>
        A confirmation email has been sent to your account.
    </p>

    <button onclick=\"window.location.href='index.html'\">Back to Form</button>
</div>

</body>
</html>
";

} catch (Exception $e) {
    echo "Email could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>