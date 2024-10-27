<?php

$server = "localhost";
$username = "root";
$password = "";
$database = "lo_project";

$koneksi = mysqli_connect($server, $username, $password, $database);


if($koneksi == TRUE){
    // echo "Koneksi Berhasil.";
} else{
    echo "Koneksi Gagal.";
}

?>