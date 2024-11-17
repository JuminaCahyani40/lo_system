<?php

include "koneksi.php";

$id = $_POST['carId'];
$nama = $_POST['carName'];

$input = mysqli_query($koneksi, "INSERT INTO data_mobil (id_mobil, nama_mobil) VALUES ('$id', '$nama')");

if ($input == true) {
    header("location: car_table.php");
} else {
    echo"Input gagal";
}

?>