<?php

$server = "localhost";
$username = "root";
$password = "";
$database = "lubecar_system";

$koneksi = mysqli_connect($server, $username, $password, $database);


if($koneksi == TRUE){
    // echo "Koneksi Berhasil.";
} else{
    echo "Koneksi Gagal.";
}

?>