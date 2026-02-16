<?php
session_start();
include "koneksi.php";

$error="";

if(isset($_POST['login'])){
    $u = $_POST['username'];
    $p = md5($_POST['password']);

    $q = mysqli_query($koneksi,"SELECT * FROM users WHERE username='$u' AND password='$p'");
    if(mysqli_num_rows($q)>0){
        $_SESSION['user']=mysqli_fetch_assoc($q);
        header("location:index.php");
    }else{
        $error = "Username atau Password salah!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Login Kantin</title>

<!-- Bootstrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
body{
    background: linear-gradient(135deg,#28a745,#20c997);
    height:100vh;
}

.login-card{
    border:none;
    border-radius:15px;
    box-shadow:0 10px 25px rgba(0,0,0,0.2);
}

.title{
    font-weight:bold;
}
</style>

</head>
<body class="d-flex justify-content-center align-items-center">

<div class="col-md-4">
    <div class="card login-card p-4">

        <div class="text-center mb-3">
            <h3 class="title">🍽 Kantin Sekolah</h3>
            <small class="text-muted">Silakan login untuk memesan makanan</small>
        </div>

        <?php if($error!=""){ ?>
            <div class="alert alert-danger text-center">
                <?= $error ?>
            </div>
        <?php } ?>

        <form method="post">
            <input type="text" name="username" class="form-control mb-3" placeholder="Username" required>

            <input type="password" name="password" class="form-control mb-3" placeholder="Password" required>

            <button name="login" class="btn btn-success w-100">
                Login
            </button>
        </form>

        <div class="text-center mt-3">
            <small class="text-muted">© Sistem Kantin Sekolah</small>
        </div>

    </div>
</div>

</body>
</html>
