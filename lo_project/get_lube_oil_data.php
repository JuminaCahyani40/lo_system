<?php
include 'koneksi.php';

if (isset($_GET['id_lube_oil'])) {
    $id_lube_oil = mysqli_real_escape_string($koneksi, $_GET['id_lube_oil']);

    $query = "SELECT total_liter, created_at FROM data_alatsensor WHERE id='$id_lube_oil' ORDER BY created_at ASC";
    $result = mysqli_query($koneksi, $query);

    $data = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = [
            'total_liter' => (float)$row['total_liter'],
            'created_at' => $row['created_at']
        ];
    }

    echo json_encode($data);
}
?>
