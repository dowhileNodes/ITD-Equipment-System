<?php
require_once __DIR__ . '/../../config/authentication.php';
require_once __DIR__ . '/../../includes/navbar.php';
require_once __DIR__ . '/../../config/db.php';
//for checking
//var_dump($_POST);
//die();
/*session checker
session_start();
if (!isset($_SESSION['employee_id'])) {
    header("Location: login.php");
    exit();
}*/

// Start transaction
$conn->begin_transaction();

try {
    //for equipment_form
    $stmt = $conn->prepare(
        "INSERT INTO equipment_forms
        (recipient, business_unit, issued_from, issue_date,
         name_prepared, name_checked, name_approved, name_received)
         VALUES (?, ?, ?, ?, ?, ?, ?, ?)"
    );

    $stmt->bind_param(
        "ssssssss",
        $_POST['recipient'],
        $_POST['business_unit'],     
        $_POST['issued_from'],
        $_POST['issue_date'],
        $_POST['name_prepared'],      
        $_POST['name_checked'],
        $_POST['name_approved'],
        $_POST['name_received']
    );
    $stmt->execute();

    // Get the new form ID for linking items
    $form_id = $conn->insert_id;

  //for items row
    if (!empty($_POST['qty']) && is_array($_POST['qty'])) {
        foreach ($_POST['qty'] as $i => $qty) {
            $desc = $_POST['description_items'][$i] ?? '';

            // Skip empty rows
            if (trim($qty) === '' && trim($desc) === '') continue;

            $stmt = $conn->prepare(
                "INSERT INTO equipment_items (form_id, quantity, description) VALUES (?, ?, ?)"
            );
            $stmt->bind_param("iss", $form_id, $qty, $desc);
            $stmt->execute();
        }
    }

    // Commit transaction
    $conn->commit();
    //for fixing, navbar overlaps the content of this
 $message = "Form has been successfully saved";
    $isSuccess = true;

} catch (Exception $e) {
    $conn->rollback();
    echo "Error saving form: " . $e->getMessage();
}

// Close connection
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
<title>Form Status</title>

<style>
body{
    margin:0;
    font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background: linear-gradient(rgba(0,0,0,0.75), rgba(0,0,0,0.75)),
                url('viber_image_2026-02-24_11-08-29-685.jpg');
    background-size:cover;
    background-position:center;
    color:white;
}

/* WRAPPER */
.content{
    width:95%;
    margin:120px auto;
}

/* GLASS BOX */
.result-box{
    max-width:520px;
    margin:auto;
    background:rgba(255,255,255,0.08);
    backdrop-filter:blur(20px);
    padding:45px 35px;
    border-radius:20px;
    box-shadow:0 25px 50px rgba(0,0,0,0.6);
    text-align:center;
}

/* ICON */
.icon{
    font-size:50px;
    margin-bottom:15px;
}

/* TITLE */
.title{
    font-size:20px;
    font-weight:600;
    margin-bottom:10px;
    letter-spacing:0.5px;
}

/* MESSAGE */
.message{
    font-size:14px;
    opacity:0.8;
    margin-bottom:25px;
}

/* SUCCESS / ERROR */
.success .icon{ color:#4CAF50; }
.error .icon{ color:#ff4d4d; }

/* BUTTONS */
.btn-group{
    display:flex;
    justify-content:center;
    gap:12px;
    flex-wrap:wrap;
}

.btn{
    padding:10px 20px;
    border-radius:30px;
    text-decoration:none;
    font-size:13px;
    font-weight:500;
    letter-spacing:0.4px;
    transition:all 0.25s ease;
    border:1px solid rgba(255,255,255,0.2);
    background:rgba(255,255,255,0.12);
    color:white;
}

/* PRIMARY BUTTON */
.btn.primary{
    background:#fd9002;
    border-color:#fd9002;
}

/* HOVER EFFECT */
.btn:hover{
    transform:translateY(-2px);
    box-shadow:0 8px 20px rgba(0,0,0,0.4);
}
</style>
</head>

<body>

<div class="content">
    <div class="result-box <?php echo $isSuccess ? 'success' : 'error'; ?>">

        <div class="icon">
            <?php echo $isSuccess ? '✔' : '✖'; ?>
        </div>

        <div class="title">
            <?php echo $isSuccess ? 'Success' : 'Error'; ?>
        </div>

        <div class="message">
            <?php echo $message; ?>
        </div>

        <?php if($isSuccess): ?>
            <div class="btn-group">
                <a href="generate_pdf.php?id=<?php echo $form_id; ?>" class="btn primary">
                    Generate PDF
                </a>
                <a href="upload_form.php" class="btn">
                    Upload Form
                </a>
            </div>
        <?php else: ?>
            <div class="btn-group">
                <a href="upload_form.php" class="btn primary">
                    Go Back
                </a>
            </div>
        <?php endif; ?>

    </div>
</div>

</body>
</html>