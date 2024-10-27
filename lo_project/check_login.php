<?php
session_start();

include 'koneksi.php';

$username = $_POST['username'];
$password = $_POST['password'];

$data = mysqli_query($koneksi, "SELECT * FROM admin_lo WHERE username='$username' AND password='$password'");
$cek = mysqli_num_rows($data);

if ($cek > 0) {
    $_SESSION['username'] = $username;
    $_SESSION['status'] = "login";
    header("Location: home.php");
    exit();
} else {
    header("Location: index.php?pesan=gagal");
    exit();
}
?>
