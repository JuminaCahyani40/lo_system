<?php

include "koneksi.php";

$id = $_POST['oilId'];
$nama = $_POST['oilName'];
$car = $_POST["select_car"];

$input = mysqli_query($koneksi, "INSERT INTO data_lube_oil (id_mobil, id_lube_oil, nama_lube_oil) VALUES ('$car', '$id', '$nama')");

if ($input == true) {
    header("location: lube_oil_table.php");
} else {
    echo"Input gagal" .mysqli_error($koneksi);
}

?>