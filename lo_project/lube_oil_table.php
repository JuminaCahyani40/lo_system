<?php
include "koneksi.php";

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <title>
    Lube Oil System
  </title>
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
            <!-- <li class="nav-item">
            <a class="nav-link text-dark" href="">
                <i class="material-symbols-rounded opacity-5">notifications</i>
                <span class="nav-link-text ms-1">Notifications</span>
            </a>
            </li> -->
            
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
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Daftar Lube Oil</li>
          </ol>
        </nav>
      </div>
    </nav>
    <!-- End Navbar -->
    <div class="container-fluid py-2">
      <div class="row">
        <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-dark shadow-dark border-radius-lg pt-4 pb-3">
                <div>
                    <h6 class="text-white text-capitalize ps-3">Daftar Lube Oil</h6>
                </div>
                <div class="d-grid d-md-flex justify-content-end pe-3" style="margin-top:-35px">
                    <a href="input_data_lo.php" class="btn btn-info" >Tambah Data Lube Oil</a>
                </div>
              </div>
            </div>
            <div class="card-body px-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center justify-content-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder text-dark">Id</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder text-dark ps-2">Nama Mobil</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder text-dark ps-2">Nama Lube Oil</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder text-dark ps-2">Kec Oli</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder text-dark ps-2">Total Liter</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder text-dark ps-2">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $ambildata = mysqli_query($koneksi, "
                      SELECT data_lube_oil.*, data_mobil.nama_mobil, data_alatsensor.kec_oli, data_alatsensor.total_liter
                      FROM data_lube_oil
                      JOIN data_mobil ON data_lube_oil.id_mobil = data_mobil.id_mobil
                      JOIN data_alatsensor ON data_lube_oil.id_lube_oil = data_alatsensor.id
                      ORDER BY data_mobil.nama_mobil ASC
                  ");
                    while($row=mysqli_fetch_array($ambildata)){
                    ?>
                    <tr>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-xs"><?php echo $row['id_lube_oil'] ?></h6>
                          </div>
                        </div>
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0 px-2"><?php echo $row['nama_mobil'] ?></p>
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0 px-2"><?php echo $row['nama_lube_oil'] ?></p>
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0 px-2"> <?php echo !empty($row['kec_oli']) ? $row['kec_oli'] . " mL/Sec" : "-"; ?></p>
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0 px-2"><?php echo !empty($row['total_liter']) ? $row['total_liter'] . " Liter" : "-"; ?></p>
                      </td>
                      <td>
                        <a href="rekap_pemakaian.php?id=<?php echo $row['id_lube_oil']?>" class="d-none d-sm-inline-block btn btn-sm btn-info shadow-sm"><i class="fas fa-eye fa-sm text-white"></i> Rekap Pemakaian</a>
                        <a href="edit_lube_oil.php?id=<?php echo $row['id_lube_oil']?>" class="d-none d-sm-inline-block btn btn-sm btn-secondary shadow-sm"><i class="fas fa-edit fa-sm text-white"></i> Edit</a>
                        
                        <a href="proses_edit_data_lo.php?action=delete&id=<?php echo htmlspecialchars($row['id_lube_oil']); ?>" 
                          class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                            <i class="fas fa-trash fa-sm text-white"></i> Hapus
                        </a>
                      </td>
                    </tr>

                    <?php
                    }
                    ?>
                
                    
                  </tbody>
                </table>
              </div>
            </div>
          </div>
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
    </div>
  </main>

  <!--   Core JS Files   -->
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
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