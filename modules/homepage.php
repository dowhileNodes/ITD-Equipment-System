<!DOCTYPE html>
<html>
<head>
    <title>Dashboard - Gate Pass System</title>

    <style>
      body {
        margin: 0;
        font-family:sans-serif;
        background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)),
                    url('viber_image_2026-02-24_11-08-29-685.jpg');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
      }

        /* TOP NAVBAR */
        .navbar {
            background-color: #324a63;
            color: orange;
            padding: 13px 20px;
            font-size: 25px;
            font-weight: bold;
            font-family: Georgia, serif;
        }

        /* MAIN CONTAINER */
        .container {
            padding: 60px 40px;
        }

        h2 {
            margin-bottom: 30px;
            color: white;
        }

        /* CARD STYLE */
        .card-container {
            display: flex;
            gap: 30px;
            flex-wrap: wrap;
        }

        .card {
            background: rgba(255, 255, 255, 0.1);
            width: 280px;
            padding: 40px 30px;
            border-radius: 15px;
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border: 1px solid rgba(255,255,255,0.3);
            box-shadow: 0 8px 20px rgba(0,0,0,0.3);
            text-align: center;
            transition: 0.3s;
        }

        .card:hover {
            transform: translateY(-5px);
        }

        .card h3 {
            margin-bottom: 20px;
            color: #ffffff;
            font-size: 22px;
        }

        .card p {
            margin-bottom: 20px;
            color: #f1f1f1;
        }

        .card a {
            text-decoration: none;
            display: inline-block;
            padding: 12px 25px;
            background-color: #fd9002;
            color: white;
            border-radius: 5px;
            font-size: 14px;
        }

        .card a:hover {
            background-color: #ffad33;
        }
    </style>
</head>

<body>

<div class="navbar">
    Toplis Solutions Incorporation - Dashboard
</div>

<div class="container">
    <h2>System Modules</h2>

    <div class="card-container">

        <div class="card">
            <h3>Gate Pass</h3>
            <p>Create and manage equipment gate pass.</p>
            <a href="gatepass/gatepass.php">Open</a>
        </div>

        <div class="card">
            <h3>Borrow</h3>
            <p>Borrow equipment request form.</p>
            <a href="borrowing/index.html">Open</a>
        </div>

    </div>
</div>

</body>
</html>