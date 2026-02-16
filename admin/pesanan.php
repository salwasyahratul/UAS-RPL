<?php
include "../koneksi.php";
$data = mysqli_query($koneksi,"SELECT * FROM pesanan ORDER BY id_pesanan DESC");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Pesanan Masuk</title>
    <style>
        body{
            font-family: Arial, Helvetica, sans-serif;
            background:#f4f6f9;
            margin:0;
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

        .btn{
            padding:6px 12px;
            text-decoration:none;
            border-radius:5px;
            color:white;
            font-size:13px;
        }

        .proses{
            background:#ffc107;
            color:black;
        }

        .selesai{
            background:#28a745;
        }

        .kembali{
            display:inline-block;
            margin-top:20px;
            background:#6c757d;
            padding:10px 18px;
            color:white;
            text-decoration:none;
            border-radius:6px;
        }

        .status-menunggu{
            color:#dc3545;
            font-weight:bold;
        }

        .status-diproses{
            color:#ffc107;
            font-weight:bold;
        }

        .status-selesai{
            color:#28a745;
            font-weight:bold;
        }
    </style>
</head>
<body>

<div class="header">
    Pesanan Masuk
</div>

<div class="container">

<table>
    <tr>
        <th>ID Pesanan</th>
        <th>Status</th>
        <th>Aksi</th>
    </tr>

<?php while($d=mysqli_fetch_array($data)){ ?>

<tr>
    <td>#<?= $d['id_pesanan']; ?></td>

    <td class="status-<?= strtolower($d['status']); ?>">
        <?= $d['status']; ?>
    </td>

    <td>
        <a class="btn proses" href="status.php?id=<?= $d['id_pesanan']; ?>&s=Diproses">Proses</a>
        <a class="btn selesai" href="status.php?id=<?= $d['id_pesanan']; ?>&s=Selesai">Selesai</a>
    </td>
</tr>

<?php } ?>

</table>

<a class="kembali" href="index.php">← Kembali ke Dashboard</a>

</div>
</body>
</html>
