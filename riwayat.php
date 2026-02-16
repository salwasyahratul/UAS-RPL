<?php
session_start();
include "koneksi.php";

$id = $_SESSION['user']['id_user'];
$data = mysqli_query($koneksi,"SELECT * FROM pesanan WHERE id_user='$id'");
?>

<!DOCTYPE html>
<html>
<head>
<title>Riwayat Pesanan</title>

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

<h3 class="mb-3">📋 Riwayat Pesanan</h3>

<?php if(mysqli_num_rows($data) > 0){ ?>

<table class="table table-bordered table-striped">
    <thead class="table-success">
        <tr>
            <th>ID Pesanan</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>

<?php while($d=mysqli_fetch_array($data)){ ?>

<tr>
    <td>#<?= $d['id_pesanan']; ?></td>
    <td>
        <?php
        if($d['status']=="Menunggu"){
            echo "<span class='badge bg-warning text-dark'>Menunggu</span>";
        }elseif($d['status']=="Diproses"){
            echo "<span class='badge bg-primary'>Diproses</span>";
        }elseif($d['status']=="Selesai"){
            echo "<span class='badge bg-success'>Selesai</span>";
        }else{
            echo $d['status'];
        }
        ?>
    </td>
</tr>

<?php } ?>

    </tbody>
</table>

<?php } else { ?>

<div class="alert alert-info text-center">
    Belum ada pesanan.
</div>

<?php } ?>

<a href="menu.php" class="btn btn-secondary mt-3">← Kembali ke Menu</a>

</div>
</div>

</body>
</html>
