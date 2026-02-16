<?php
include "../koneksi.php";
$data = mysqli_query($koneksi,"SELECT * FROM menu ORDER BY id_menu DESC");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Kelola Menu</title>
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
            padding:30px;
        }

        .top-bar{
            display:flex;
            justify-content:space-between;
            align-items:center;
            margin-bottom:20px;
        }

        .btn{
            padding:8px 14px;
            border-radius:6px;
            text-decoration:none;
            color:white;
            font-size:14px;
        }

        .tambah{ background:#28a745; }
        .hapus{ background:#dc3545; }
        .kembali{ background:#6c757d; }

        table{
            width:100%;
            border-collapse:collapse;
            background:white;
            border-radius:10px;
            overflow:hidden;
            box-shadow:0 5px 15px rgba(0,0,0,0.1);
        }

        th{
            background:#007bff;
            color:white;
            padding:12px;
            text-align:center;
        }

        td{
            padding:12px;
            text-align:center;
            border-bottom:1px solid #ddd;
        }

        tr:hover{
            background:#f1f1f1;
        }

        .harga{
            color:#28a745;
            font-weight:bold;
        }
    </style>
</head>
<body>

<div class="header">
    Kelola Menu Kantin
</div>

<div class="container">

<div class="top-bar">
    <a class="btn tambah" href="menu_tambah.php">+ Tambah Menu</a>
    <a class="btn kembali" href="index.php">← Kembali</a>
</div>

<table>
    <tr>
        <th>ID</th>
        <th>Nama Menu</th>
        <th>Harga</th>
        <th>Aksi</th>
    </tr>

<?php while($d=mysqli_fetch_array($data)){ ?>

<tr>
    <td><?= $d['id_menu']; ?></td>
    <td><?= $d['nama_menu']; ?></td>
    <td class="harga">Rp<?= number_format($d['harga']); ?></td>
    <td>
        <a class="btn hapus" 
           href="menu_hapus.php?id=<?= $d['id_menu']; ?>"
           onclick="return confirm('Yakin hapus menu ini?')">
           Hapus
        </a>
    </td>
</tr>

<?php } ?>

</table>

</div>
</body>
</html>
