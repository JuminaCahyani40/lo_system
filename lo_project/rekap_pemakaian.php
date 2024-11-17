<?php
session_start();

include "koneksi.php";

if (isset($_GET['id'])) {
    $id = mysqli_real_escape_string($koneksi, $_GET['id']);

    // Fetch data from data_lube_oil2 for the given oilId
    $query = "SELECT * FROM data_alatsensor INNER JOIN data_lube_oil ON data_alatsensor.id = data_lube_oil.id_lube_oil where data_lube_oil.id_lube_oil like '%". $id."%'";
    $result = mysqli_query($koneksi, $query);
    $oilData = mysqli_fetch_assoc($result);

    // Check if data exists
    if (!$oilData) {
        echo "Data Lube Oil tidak ditemukan.";
        exit();
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.png">
    <title>Lube Oil System</title>
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700,900" />
    <!-- Nucleo Icons -->
    <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <!-- Material Icons -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@24,400,0,0" />
    <!-- CSS Files -->
    <link id="pagestyle" href="../assets/css/material-dashboard.css?v=3.2.0" rel="stylesheet" />
    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body class="g-sidenav-show  bg-gray-100">
    <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-radius-lg fixed-start ms-2  bg-white my-2" id="sidenav-main">
        <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-dark opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand px-4 py-3 m-0" href=" " target="_blank">
            <img src="../assets/img/logo-ct-dark.png" class="navbar-brand-img" width="26" height="26" alt="main_logo">
            <span class="ms-1 text-sm text-dark">Your Tim</span>
        </a>
        </div>
        <hr class="horizontal dark mt-0 mb-2">
        <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <li class="nav-item">
            <a class="nav-link text-dark" href="home.php">
                <i class="material-symbols-rounded opacity-5">dashboard</i>
                <span class="nav-link-text ms-1">Dashboard</span>
            </a>
            </li>
            <li class="nav-item">
            <a class="nav-link text-dark" href="car_table.php">
                <i class="material-symbols-rounded opacity-5">table_view</i>
                <span class="nav-link-text ms-1">Kelola Data Mobil</span>
            </a>
            </li>
            <li class="nav-item">
            <a class="nav-link text-dark" href="lube_oil_table.php">
                <i class="material-symbols-rounded opacity-5">receipt_long</i>
                <span class="nav-link-text ms-1">Kelola Data Lube Oil</span>
            </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-dark" href="pemakaian_table.php">
                    <i class="material-symbols-rounded opacity-5">receipt_long</i>
                    <span class="nav-link-text ms-1">Data Pemakaian</span>
                </a>
            </li>
            <li class="nav-item">
            <a class="nav-link text-dark" href="logout.php">
                <i class="material-symbols-rounded opacity-5">view_in_ar</i>
                <span class="nav-link-text ms-1">Logout</span>
            </a>
            </li>
            
        </ul>
        </div>
  </aside>
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-3 shadow-none border-radius-xl" id="navbarBlur" data-scroll="true">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="home.php">Admin</a></li>
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Rekap Data Pemakaian</li>
          </ol>
        </nav>
      </div>
    </nav>
    <!-- End Navbar -->
    <div class="container-fluid py-2">
      <!-- write content here -->
        <div class="form-input">
            <form action="proses_rekap.php" method="post">
            <input type="hidden" name="id" value="<?php echo htmlspecialchars($oilData['id']); ?>">
                <div class="form-group">
                    <label for="id" class="font-weight-bold text-uppercase">Id</label>
                    <input type="text" name="id" class="form-control" id="id" readonly="" value="<?php echo htmlspecialchars($oilData['id']); ?>" placeholder="Masukkan ID">
                </div>
                <div class="form-group">
                    <label for="oilId" class="font-weight-bold text-uppercase">Id Oil</label>
                    <input type="text" name="oilId" class="form-control" id="oilId" readonly="" placeholder="Masukkan ID Oil" value="<?php echo htmlspecialchars($oilData['id_lube_oil']); ?>">
                </div>
                <div class="mb-2">
                    <label for="select_car" class="font-weight-bold">Pilih Mobil</label>
                    
                    <select class="form-select bg-white" name="select_car" id="select_car" disabled>
                        <option disabled>Silahkan Pilih Mobil</option>
                        <?php
                        $dataMobil = mysqli_query($koneksi, "SELECT * FROM data_mobil ");
                        while ($row = mysqli_fetch_assoc($dataMobil)) {
                            $selected = ($row['id_mobil'] == $oilData['id_mobil']) ? 'selected' : '';
                            echo "<option value='{$row['id_mobil']}' $selected>{$row['nama_mobil']}</option>";
                        }
                        ?>
                    </select>
                    
                </div>
                <div class="form-group">
                    <label for="oilName" class="font-weight-bold">Nama Lube Oil</label>
                    <input type="text" name="oilName" class="form-control" id="oilName" placeholder="Masukkan Nama Lube Oil"  readonly="" value="<?php echo htmlspecialchars($oilData['nama_lube_oil']); ?>">
                </div>
                <div class="form-group">
                    <label>Bulan </label>
                    <select name="bulan" class="form-control">
                    <option selected="selected" disabled>---Pilih Bulan---</option>
                    <?php
                    $bulan=array("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
                    $jml_bln=count($bulan);
                    for($a=0; $a<$jml_bln; $a+=1){
                        echo"<option value=$bulan[$a]> $bulan[$a] </option>";
                    }
                    ?>
                    </select>
                </div>
                <div class=""></div>
                <?php
                $id = $_GET['id'];
                $ambildata=mysqli_query($koneksi, "SELECT * FROM data_pemakaian WHERE data_pemakaian.id_lube_oil LIKE '%". $id."%' UNION SELECT * FROM data_pemakaian WHERE data_pemakaian.id_lube_oil LIKE '%". $id."%' ORDER BY liter_akhir DESC LIMIT 1" );
                while($row1=mysqli_fetch_array($ambildata)){
                
                ?>
                    <div class="form-group">
                        <label>Meteran Bulan Lalu :</label>
                        <input type="text" name="liter_awal" class="form-control" value="<?php echo $row1['liter_akhir'];?>" placeholder="0" required="" />
                    </div>
                    <div class="form-group">
                        <label>Meteran Saat Ini :</label>
                        <input type="text" name="total_liter" class="form-control"  value="<?php echo $oilData['total_liter']; ?>" placeholder="Liter" required="" />
                    </div>
                    <input type="hidden" name="id" value="<?php echo $oilData['id']; ?>">
                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
            </form>
                    <?php

                }
                ?>
            
        </div>
    </div>
    <footer class="footer py-4  ">
        <div class="container-fluid">
          <div class="row align-items-center justify-content-center">
            <div class="col-lg-6 mb-lg-0 mb-4">
              <div class="copyright text-center text-sm text-muted text-lg-start">
                © <script>
                  document.write(new Date().getFullYear())
                </script>,
                made with <i class="fa fa-heart"></i> by Your Tim.
              </div>
            </div>
          </div>
        </div>
      </footer>
  </main>
  <!--   Core JS Files   -->
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
  <!-- BOOTSTRAP -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/material-dashboard.min.js?v=3.2.0"></script>
</body>
</html>