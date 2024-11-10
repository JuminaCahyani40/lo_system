<?php
include 'koneksi.php';

if (isset($_GET['id'])) {
    $id = mysqli_real_escape_string($koneksi, $_GET['id']);

    $query1 = "DELETE data_alatsensor FROM data_alatsensor 
               JOIN data_lube_oil2 ON data_alatsensor.id = data_lube_oil2.id 
               WHERE data_lube_oil2.id_mobil = '$id'";
    $result1 = mysqli_query($koneksi, $query1);

    $query2 = "DELETE FROM data_lube_oil2 WHERE id_mobil='$id'";
    $result2 = mysqli_query($koneksi, $query2);

    if (!$result2) {
        echo "Hapus Data Mobil Gagal pada data_lube_oil2. Error: " . mysqli_error($koneksi);
        exit();
    }

    $query3 = "DELETE FROM data_mobil2 WHERE id='$id'";
    $result3 = mysqli_query($koneksi, $query3);

    if (!$result3) {
        echo "Hapus Data Mobil Gagal pada data_mobil2. Error: " . mysqli_error($koneksi);
        exit();
    }

    header("Location: car_table.php");
    exit();
} else {
    echo "ID Mobil tidak ditemukan.";
}

mysqli_close($koneksi);
?>
