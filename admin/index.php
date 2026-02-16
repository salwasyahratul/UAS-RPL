<?php
session_start();
if(!isset($_SESSION['user'])){
    header("Location: ../login.php");
    exit;
}
?>

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
            padding:18px 30px;
            font-size:22px;
            font-weight:bold;
        }

        .container{
            padding:40px;
            text-align:center;
        }

        .card{
            display:inline-block;
            width:220px;
            margin:15px;
            padding:25px;
            background:white;
            border-radius:12px;
            box-shadow:0 8px 20px rgba(0,0,0,0.1);
            text-decoration:none;
            color:#333;
            transition:0.3s;
        }

        .card:hover{
            transform:translateY(-5px);
            box-shadow:0 12px 25px rgba(0,0,0,0.15);
        }

        .icon{
            font-size:40px;
            margin-bottom:10px;
        }

        .menu{ color:#007bff; }
        .pesanan{ color:#28a745; }
        .logout{ color:#dc3545; }
    </style>
</head>
<body>

<div class="header">
    Dashboard Admin Kantin
</div>

<div class="container">

    <a class="card" href="menu.php">
        <div class="icon menu">🍛</div>
        <h3>Kelola Menu</h3>
        <p>Tambah & edit makanan</p>
    </a>

    <a class="card" href="pesanan.php">
        <div class="icon pesanan">📦</div>
        <h3>Pesanan Masuk</h3>
        <p>Lihat & proses pesanan</p>
    </a>

    <a class="card" href="../logout.php">
        <div class="icon logout">🚪</div>
        <h3>Logout</h3>
        <p>Keluar dari sistem</p>
    </a>

</div>

</body>
</html>
