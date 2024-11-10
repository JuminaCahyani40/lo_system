<?php
include 'koneksi.php';

if (isset($_POST['submit'])) {
    $id = mysqli_real_escape_string($koneksi, $_POST['id']);
    $oilId = mysqli_real_escape_string($koneksi, $_POST['oilId']);
    $select_car = mysqli_real_escape_string($koneksi, $_POST['select_car']);
    $oilName = mysqli_real_escape_string($koneksi, $_POST['oilName']);

    $query = "UPDATE data_lube_oil2 SET id_mobil='$select_car', id_lube_oil='$oilId', nama_lube_oil='$oilName' WHERE id='$id'";
    if (mysqli_query($koneksi, $query)) {
        header("Location: lube_oil_table.php");
        exit();
    } else {
        echo "Edit Data Lube Oil Gagal. Error: " . mysqli_error($koneksi);
    }
} else if (isset($_GET['action']) && $_GET['action'] === 'delete' && isset($_GET['id'])) {
    $oilId = mysqli_real_escape_string($koneksi, $_GET['id']);

    $query = "DELETE FROM data_alatsensor WHERE id='$oilId'";
    $result = mysqli_query($koneksi, $query);
    if (!$result) {
        echo "Hapus Data Alat Sensor Gagal pada data_lube_oil2. Error: " . mysqli_error($koneksi);
        exit();
    }

    $query1 = "DELETE FROM data_lube_oil2 WHERE id='$oilId'";
    $result1 = mysqli_query($koneksi, $query1);
    if (!$result1) {
        echo "Hapus Data Lube Oil Gagal pada data_lube_oil2. Error: " . mysqli_error($koneksi);
        exit();
    }
    header("Location: lube_oil_table.php");
    exit();
} else {
    echo "Invalid request.";
}

mysqli_close($koneksi);
?>
