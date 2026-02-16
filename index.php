<?php
session_start();

if(isset($_SESSION['user'])){
    if($_SESSION['user']['role']=="admin"){
        header("location:admin/dashboard.php");
    }else{
        header("location:menu.php");
    }
}else{
    header("location:login.php");
}
?>
