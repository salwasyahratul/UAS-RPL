<?php
session_start();
include "koneksi.php";
$data = mysqli_query($koneksi,"SELECT * FROM menu");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Menu Kantin</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body{
            background:#f4f6f9;
        }
        .card img{
            height:150px;
            object-fit:cover;
        }
    </style>
</head>
<body>

<div class="container mt-4">

    <h2 class="mb-3">🍽 Menu Kantin</h2>

    <a href="keranjang.php" class="btn btn-warning btn-sm">Keranjang</a>
    <a href="riwayat.php" class="btn btn-info btn-sm">Riwayat</a>
    <a href="logout.php" class="btn btn-danger btn-sm">Logout</a>

    <hr>

    <div class="row">
        <?php while($d=mysqli_fetch_array($data)){ ?>
        <div class="col-md-3 mb-4">
            <div class="card shadow-sm">
                <img src="assets/gambar/<?= $d['gambar']; ?>" class="card-img-top">
                <div class="card-body text-center">
                    <h5><?= $d['nama_menu']; ?></h5>
                    <p class="text-success fw-bold">Rp<?= number_format($d['harga']); ?></p>
                    <a href="keranjang.php?id=<?= $d['id_menu']; ?>" class="btn btn-success w-100">
                        Tambah
                    </a>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>

</div>

</body>
</html>
