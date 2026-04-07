<?php
require_once __DIR__ . '/../config/authentication.php';

$employee_id = isset($_SESSION['employee_id']) ? $_SESSION['employee_id'] : '';
?>

<style>

/* RESET */
html, body {
    margin: 0;
    padding: 0;
    overflow-x: hidden; /* prevent left-right scroll */
}

/* MAIN NAVBAR */
.navbar {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 75px;

    display: flex;
    justify-content: center;
    align-items: center;

   background: #696969; /*darker color bg */

    /*border: 3px solid darkgray;*/

    box-shadow: 0 10px 25px rgba(0,0,0,0.35);

    z-index: 1000;
    box-sizing: border-box;
}

/* INNER WRAPPER */
.navbar-inner {
    width: 95%;
    max-width: 1300px;

    display: flex;
    align-items: center;
    justify-content: space-between;

    padding: 0 50px;
    box-sizing: border-box;
}

/* LEFT & RIGHT */
.navbar-left,
.navbar-right {
    display: flex;
    align-items: center;
    gap: 15px;
}

/* LOGO */
.navbar-logo {
    height: 50px;
    width: auto;
}

/* HOME BUTTON */
.navbar-left a {
    padding: 6px 16px;
    border-radius: 8px;
    background: linear-gradient(135deg, #1e90ff, #007bff);
    color: white;
    font-weight: 600;
    font-size: 14px;
    text-decoration: none;
    transition: 0.3s;
    box-shadow: 0 4px 12px rgba(0,0,0,0.25);

    display: flex;
    align-items: center;
    gap: 6px;
}

.navbar-left a:hover {
    transform: translateY(-2px);
}

/* RIGHT SIDE */
.navbar-right {
    font-weight: 600;
    color: #fff;
}

/* LOGOUT BUTTON */
.logout-btn {
    padding: 8px 22px;
    border-radius: 50px;
    background: linear-gradient(135deg, #dc3545, #ff4d4d);
    color: white !important;
    font-weight: 600;
    font-size: 14px;
    text-decoration: none;
    transition: 0.3s;
    box-shadow: 0 4px 12px rgba(0,0,0,0.25);

    display: flex;
    align-items: center;
    gap: 6px;
}

.logout-btn:hover {
    transform: translateY(-2px);
}

/* TIME GLASS BOX */
.time-box{

    padding:6px 12px;
    border-radius:10px;

    text-align:right;
    color:white;
}

/* GREETING */
#greeting{
    font-size:15px;
    color:white;
}

/* CLOCK */
#clock{
    font-size:14px;
    font-weight:bold;
    letter-spacing:1px;
    font-family:'Courier New', monospace;
}

/* DATE */
#date{
    font-size:10px;
    opacity:0.8;
}

/* VERY IMPORTANT: EXACT SPACING */
body {
    padding-top: 75px; /* same as navbar height */
    min-height: 100vh;
    display: flex;
    flex-direction: column;
}

</style>

<div class="navbar">
    <div class="navbar-inner">

        <div class="navbar-left">
            <img src="/ITD-Equipment-System/includes/toplis.png" class="navbar-logo" alt="Logo">
            <!--C:\xampp\htdocs\ITD-Equipment-System\includes\toplis.png-->

            <?php if(basename($_SERVER['PHP_SELF']) != 'homepage.php'): ?>
                <a href="/ITD-Equipment-System/modules/homepage/homepage.php">
                    🏠 Home 
                </a>
<?php endif; ?>
        </div>

        <div class="navbar-right">

                <div class="time-box">
                <div id="greeting"></div>
                <div id="clock"></div>
                <div id="date"></div>
            </div>

            <?php if ($employee_id): ?>
                Hi, <?php echo htmlspecialchars($employee_id); ?> |
            <?php endif; ?>

            <a class="logout-btn" href="/ITD-Equipment-System/Login/logout.php">
                ⎋ Logout
            </a>
        </div>

    </div>
</div>
<script>
function updateClock(){

    const now = new Date();

    let hours = now.getHours();
    let minutes = now.getMinutes();
    let seconds = now.getSeconds();

    // FORMAT TIME
    let ampm = hours >= 12 ? "PM" : "AM";
    let displayHour = hours % 12;
    displayHour = displayHour ? displayHour : 12;

    minutes = minutes.toString().padStart(2,'0');
    seconds = seconds.toString().padStart(2,'0');

    // DATE (Mon, Mar 30)
    const options = { weekday: 'short', month: 'short', day: 'numeric' };
    const date = now.toLocaleDateString('en-US', options);

    // GREETING
    let greeting = "";
    if(hours < 12){
        greeting = "🌞 Good Morning";
    }else if(hours < 18){
        greeting = "🌝 Good Afternoon";
    }else{
        greeting = "🌚 Good Evening";
    }

    document.getElementById("greeting").innerText = greeting;
    document.getElementById("clock").innerText =
        displayHour + ":" + minutes + ":" + seconds + " " + ampm;
    document.getElementById("date").innerText = date;
}

setInterval(updateClock, 1000);
updateClock();
</script>