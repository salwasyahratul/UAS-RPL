<?php
include "../koneksi.php";
$id=$_GET['id'];
$s=$_GET['s'];

mysqli_query($koneksi,"UPDATE pesanan SET status='$s' WHERE id_pesanan='$id'");
header("location:pesanan.php");
?>
