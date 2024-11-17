<?php
include('koneksi.php');

$id          	= $_POST['id'];
$nama 		   	= $_POST['oilName'];
$bulan		  	= $_POST['bulan'];
$liter_awal		= $_POST['liter_awal'];
// $liter_akhir 	= $_POST['liter_akhir'];
$total_liter	= $_POST['total_liter'];
// $liter        = $_POST['liter'];


$liter = $total_liter-$liter_awal;


$input = mysqli_query($koneksi, "INSERT INTO data_pemakaian (id_lube_oil, nama_oli, bulan, liter_awal, liter_akhir, liter) VALUES ('$id', '$nama', '$bulan','$liter_awal','$total_liter','$liter')");

if ($input == TRUE) {
    header("location: pemakaian_table.php");
} else {
    echo "Input Gagal";
}