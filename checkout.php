<?php
session_start();
include "koneksi.php";

// Cegah akses jika keranjang kosong
if(empty($_SESSION['cart'])){
    echo "<script>
            alert('Keranjang masih kosong!');
            window.location='menu.php';
          </script>";
    exit;
}

$id_user = $_SESSION['user']['id_user'];

mysqli_query($koneksi,"INSERT INTO pesanan(id_user,status) VALUES('$id_user','Menunggu')");
$id_pesanan = mysqli_insert_id($koneksi);

$total = 0;

foreach($_SESSION['cart'] as $id){
    $m = mysqli_fetch_assoc(mysqli_query($koneksi,"SELECT * FROM menu WHERE id_menu='$id'"));
    $harga = $m['harga'];
    $total += $harga;

    mysqli_query($koneksi,"INSERT INTO detail_pesanan VALUES(NULL,'$id_pesanan','$id',1,'$harga')");
}

// kosongkan keranjang setelah checkout
unset($_SESSION['cart']);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Pesanan Berhasil</title>
    <style>
        body{
            font-family: Arial;
            background:#f4f6f9;
            display:flex;
            justify-content:center;
            align-items:center;
            height:100vh;
        }
        .card{
            background:white;
            padding:40px;
            border-radius:15px;
            text-align:center;
            width:350px;
            box-shadow:0 8px 25px rgba(0,0,0,0.15);
        }
        .check{
            font-size:60px;
            color:#28a745;
        }
        h2{
            margin-top:10px;
        }
        .total{
            font-size:28px;
            color:#28a745;
            margin:15px 0;
            font-weight:bold;
        }
        .btn{
            display:block;
            margin-top:20px;
            padding:12px;
            background:#28a745;
            color:white;
            text-decoration:none;
            border-radius:8px;
            font-weight:bold;
        }
        .btn:hover{
            background:#218838;
        }
    </style>
</head>
<body>

<div class="card">
    <div class="check">✔</div>
    <h2>Pesanan Berhasil!</h2>
    <p>Pesanan sedang diproses oleh kantin</p>

    <hr>

    <p>ID Pesanan</p>
    <h3>#<?= $id_pesanan ?></h3>

    <p>Total Pembayaran</p>
    <div class="total">Rp<?= number_format($total) ?></div>

    <a class="btn" href="menu.php">Kembali ke Menu</a>
</div>

</body>
</html>
