<?php
session_start();
include "koneksi.php";

if(isset($_GET['id'])){
    $_SESSION['cart'][] = $_GET['id'];
}

$total = 0;
?>

<!DOCTYPE html>
<html>
<head>
<title>Keranjang</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
body{
    background:#f4f6f9;
}
.container-box{
    background:white;
    padding:25px;
    border-radius:12px;
    box-shadow:0 4px 15px rgba(0,0,0,0.08);
}
</style>

</head>
<body>

<div class="container mt-4">
<div class="container-box">

<h3 class="mb-3">🛒 Keranjang Pesanan</h3>

<?php if(!empty($_SESSION['cart'])){ ?>

<table class="table table-bordered table-striped">
    <thead class="table-success">
        <tr>
            <th>Menu</th>
            <th width="150">Harga</th>
        </tr>
    </thead>
    <tbody>

<?php
foreach($_SESSION['cart'] as $id){

    $m=mysqli_fetch_assoc(mysqli_query($koneksi,"SELECT * FROM menu WHERE id_menu='$id'"));

    echo "<tr>
            <td>{$m['nama_menu']}</td>
            <td>Rp".number_format($m['harga'])."</td>
          </tr>";

    $total += $m['harga'];
}
?>

    </tbody>
</table>

<h4 class="text-end text-success">
    Total: Rp<?= number_format($total) ?>
</h4>

<div class="mt-3 text-end">
    <a href="checkout.php" class="btn btn-success">Checkout</a>
</div>

<?php } else { ?>

<div class="alert alert-warning text-center">
    Keranjang masih kosong 😢
</div>

<?php } ?>

<hr>

<a href="menu.php" class="btn btn-secondary">← Kembali ke Menu</a>

</div>
</div>

</body>
</html>
