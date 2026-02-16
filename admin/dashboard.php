<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <title>Dashboard Admin</title>
    <style>
        body{
            margin:0;
            font-family: Arial, Helvetica, sans-serif;
            background:#f4f6f9;
        }

        .header{
            background:#343a40;
            color:white;
            padding:15px 30px;
            font-size:20px;
            font-weight:bold;
        }

        .container{
            padding:40px;
            text-align:center;
        }

        .card{
            display:inline-block;
            background:white;
            padding:30px;
            margin:15px;
            border-radius:12px;
            width:220px;
            box-shadow:0 6px 15px rgba(0,0,0,0.1);
            text-decoration:none;
            color:#333;
            transition:0.2s;
        }

        .card:hover{
            transform:translateY(-5px);
            box-shadow:0 10px 25px rgba(0,0,0,0.15);
        }

        .icon{
            font-size:40px;
            margin-bottom:10px;
        }
    </style>
</head>
<body>

<div class="header">
    Dashboard Admin Kantin
</div>

<div class="container">

<a class="card" href="menu.php">
    <div class="icon">🍔</div>
    <h3>Kelola Menu</h3>
</a>

<a class="card" href="pesanan.php">
    <div class="icon">📋</div>
    <h3>Pesanan Masuk</h3>
</a>

<a class="card" href="../logout.php">
    <div class="icon">🚪</div>
    <h3>Logout</h3>
</a>

</div>

</body>
</html>
