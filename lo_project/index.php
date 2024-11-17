<?php
include 'koneksi.php';

?>

<!DOCTYPE html>
<html lang="en" itemscope itemtype="http://schema.org/WebPage">

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
</head>

<body class="landing-page bg-gray-200">
      <!-- Navbar -->
    <div class="container position-sticky z-index-sticky top-0">
        <div class="row">
            <div class="col-12">
                <nav class="navbar navbar-expand-lg blur border-radius-xl top-0 z-index-fixed shadow position-absolute my-3 py-2 start-0 end-0 mx-4">
                    <div class="container-fluid px-0">
                        <a class="navbar-brand font-weight-bolder ms-sm-3 d-none d-md-block" href="" rel="tooltip" title="" data-placement="bottom" target="_blank">
                        Lube Oil System
                        </a>
                        <a class="navbar-brand font-weight-bolder ms-sm-3 d-block d-md-none" href="" rel="tooltip" title="" data-placement="bottom" target="_blank">
                        Lube Oil System
                        </a>
                        <button class="navbar-toggler shadow-none ms-2 ms-md-0" type="button" data-bs-toggle="collapse" data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon mt-2">
                                <span class="navbar-toggler-bar bar1"></span>
                                <span class="navbar-toggler-bar bar2"></span>
                                <span class="navbar-toggler-bar bar3"></span>
                            </span>
                        </button>
                        <div class="collapse navbar-collapse w-100 pt-3 pb-2 py-lg-0" id="navigation">
                            <ul class="navbar-nav navbar-nav-hover ms-auto">
                                <li class="nav-item d-flex align-items-center mx-2">
                                <a href="#header" role="button" class="nav-link ps-2 d-flex cursor-pointer align-items-center">
                                    Home
                                </a>
                                </li>
                                <li class="nav-item d-flex align-items-center mx-2">
                                <a href="#list_lo" role="button" class="nav-link ps-2 d-flex cursor-pointer align-items-center">
                                    Daftar Lube Oil
                                </a>
                                </li>
                                <li class="nav-item d-flex align-items-center mx-2">
                                <a href="#check_lo" role="button" class="nav-link ps-2 d-flex cursor-pointer align-items-center">
                                    Check Volume Oil
                                </a>
                                </li>
                                <li class="nav-item d-flex align-items-center mx-2">
                                <a href="login.php" role="button" class="nav-link ps-2 d-flex cursor-pointer align-items-center">
                                    Login
                                </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
                <!-- End Navbar -->
            </div>
        </div>
    </div>

    <header id="header" style="background-image: url('excavator.jpeg'); background-size: cover; background-position: center; background-repeat:no-repeat; filter: opacity(0.7);">
        <div class="page-header min-vh-75">
            <div class="container">
                <div class="row">
                <div class="col-lg-6 mt-8 position-relative z-index-1">
                    <div class="d-flex align-items-center">
                    </div>
                    <h1 class="text-white">Sistem Monitoring Oli</h1>
                    <p class="text-lg mt-3 text-white">
                    Website ini menyediakan sistem monitoring online yang memungkinkan pengawasan penggunaan dan pengeluaran oli pada Lubecar secara real-time.
                    </p>
                    
                    </div>
                </div>
                <!-- <svg class="position-absolute top-0" width="1231" height="1421" viewBox="0 0 1231 1421" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g opacity="0.12786" filter="url(#filter0_f_31_15)">
                    <ellipse cx="811.5" cy="602.5" rx="675.5" ry="682.5" fill="url(#paint0_linear_31_15)" />
                    </g>
                    <defs>
                    <filter id="filter0_f_31_15" x="0.085907" y="-215.914" width="1622.83" height="1636.83" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                        <feFlood flood-opacity="0" result="BackgroundImageFix" />
                        <feBlend mode="normal" in="SourceGraphic" in2="BackgroundImageFix" result="shape" />
                        <feGaussianBlur stdDeviation="67.957" result="effect1_foregroundBlur_31_15" />
                    </filter>
                    <linearGradient id="paint0_linear_31_15" x1="804.405" y1="-136.203" x2="160.281" y2="643.776" gradientUnits="userSpaceOnUse">
                        <stop stop-color="#FFC700" />
                        <stop offset="0.469471" stop-color="#005EB8" />
                        <stop offset="1" stop-color="white" />
                    </linearGradient>
                    </defs>
                </svg> -->
                <!-- <img class="position-absolute top-0 mt-n7 me-n12 end-0 w-70 z-index-3" src="../assets/img/perspective.png" alt="header-image"> -->
                </div>
            </div>
        </div>
    </header>

    <section id="list_lo" class="main-content position-relative max-height-vh-100 border-radius-lg mt-5">
        <div class="container-fluid py-2">
            <div class="row">
                <div class="col-12">
                <div class="card my-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-dark shadow-dark border-radius-lg pt-4 pb-3">
                        <h6 class="text-white text-capitalize ps-3 text-center">Daftar Lube Car</h6>
                    </div>
                    </div>
                    <div class="card-body px-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                        <thead>
                            <tr>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Id Mobil</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama Mobil</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $ambildata = mysqli_query($koneksi, "SELECT * FROM data_mobil order by data_mobil.id_mobil asc");
                            while($row=mysqli_fetch_array($ambildata)){
                            ?>
                            <tr>
                                <td class="align-middle text-center">
                                    <span class="text-secondary text-xs font-weight-bold"><?php echo $row['id_mobil'] ?></span>
                                </td>
                                <td class="align-middle text-center">
                                    <span class="text-secondary text-xs font-weight-bold"><?php echo $row['nama_mobil'] ?></span>
                                </td>
                                <td class="align-middle text-center">
                                <a href="data_penggunaan_lo.php?id_mobil=<?php echo $row['id_mobil']; ?>" class="d-none d-sm-inline-block btn btn-sm btn-warning shadow-sm">
                                    <i class="fas fa-eye fa-sm text-white"></i> Lihat Volume Lube Oli
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
        </div>
    </section>

    <!-- <section id="check_lo">
      <div class="container mt-sm-5">
        <div class="page-header py-6 py-md-6 my-sm-3 mb-3 border-radius-xl" style="background-image: url('../assets/img/docs-section.png');" loading="lazy">
          <span class="mask bg-gradient-dark"></span>
          <div class="container">
            <div class="row justify-content-center">
              <div class="col-lg-6 ms-lg-5">
                <h2 class="text-white text-center">Check Lube Oil Volume</h2>
                <p class="text-white text-center">Masukkan ID Lube Oil</p>
                <div class="col-12">
                    <form class="row g-3 justify-content-center" action="cari_data.php" method="GET">
                        <div class="col-8">
                            <label for="inputId" class="visually-hidden">Input ID Lube Oil</label>
                            <input type="text" name="search" class="form-control" id="inputId" placeholder="Input Id Lube Oil" style="border: 2px solid #005EB8; padding: 10px; border: radius 5px;outline:none; background-color:white;">
                        </div>
                        <div class="col-auto">
                            <button type="submit" class="btn btn-info">Cari</button>
                        </div>
                        <div class="hasil_seacrh"></div>
                    </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section> -->

    <footer class="footer pt-3 mt-3">
        <div class="col-12">
            <div class="text-center">
                <p class="text-dark my-4 text-sm font-weight-normal">
                All rights reserved. Copyright © <script>
                    document.write(new Date().getFullYear())
                </script> Your Tim</a>.
                </p>
            </div>
        </div>
    </footer>
</body>
</html>