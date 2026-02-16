<?php
include "../koneksi.php";

if(isset($_POST['simpan'])){
    $nama   = $_POST['nama'];
    $harga  = $_POST['harga'];
    $gambar = $_FILES['gambar']['name'];

    move_uploaded_file($_FILES['gambar']['tmp_name'], "../assets/gambar/".$gambar);

    mysqli_query($koneksi,"INSERT INTO menu VALUES(NULL,'$nama','$harga','$gambar')");
    header("location:menu.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Menu</title>
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
            display:flex;
            justify-content:center;
            align-items:center;
            height:90vh;
        }

        .card{
            background:white;
            padding:30px;
            width:350px;
            border-radius:10px;
            box-shadow:0 5px 15px rgba(0,0,0,0.1);
        }

        .card h3{
            margin-top:0;
            text-align:center;
        }

        input{
            width:100%;
            padding:10px;
            margin-top:5px;
            margin-bottom:15px;
            border-radius:6px;
            border:1px solid #ccc;
        }

        input[type=file]{
            padding:6px;
        }

        .btn{
            width:100%;
            padding:10px;
            border:none;
            border-radius:6px;
            color:white;
            font-size:15px;
            cursor:pointer;
        }

        .simpan{ background:#28a745; }
        .kembali{
            background:#6c757d;
            display:block;
            text-align:center;
            margin-top:10px;
            text-decoration:none;
            padding:10px;
            border-radius:6px;
            color:white;
        }
    </style>
</head>
<body>

<div class="header">
    Tambah Menu Kantin
</div>

<div class="container">
    <div class="card">
        <h3>Tambah Menu Baru</h3>

        <form method="post" enctype="multipart/form-data">
            Nama Menu
            <input name="nama" required>

            Harga
            <input type="number" name="harga" required>

            Gambar
            <input type="file" name="gambar" required>

            <button class="btn simpan" name="simpan">Simpan</button>
        </form>

        <a class="kembali" href="menu.php">← Kembali</a>
    </div>
</div>

</body>
</html>
