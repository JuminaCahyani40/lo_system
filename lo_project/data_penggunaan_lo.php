<?php
include 'koneksi.php';

// if (isset($_GET['id_mobil'])) {
//     $id_mobil = mysqli_real_escape_string($koneksi, $_GET['id_mobil']);

//     // Fetch data_lube_oil records associated with the given id_mobil
//     $queryLubeOil = "SELECT * FROM data_lube_oil2 WHERE id_mobil='$id_mobil'";
//     $resultLubeOil = mysqli_query($koneksi, $queryLubeOil);

//     if (mysqli_num_rows($resultLubeOil) > 0) {
//         echo "<table border='1'>";
//         echo "<tr><th>Nama Lube Oil</th><th>Total Liter</th></tr>";

//         while ($lubeOil = mysqli_fetch_assoc($resultLubeOil)) {
//             $id_lube_oil = $lubeOil['id'];

//             // Fetch total_liter from data_alatsensor using id_lube_oil
//             $queryAlatSensor = "SELECT total_liter FROM data_alatsensor WHERE id='$id_lube_oil'";
//             $resultAlatSensor = mysqli_query($koneksi, $queryAlatSensor);

//             $total_liter = 0;
//             while ($alatSensor = mysqli_fetch_assoc($resultAlatSensor)) {
//                 $total_liter += $alatSensor['total_liter']; // Sum total_liter for each lube oil
//             }

//             echo "<tr>";
//             echo "<td>" . htmlspecialchars($lubeOil['nama_lube_oil']) . "</td>";
//             echo "<td>" . htmlspecialchars($total_liter) . " L</td>";
//             echo "</tr>";
//         }

//         echo "</table>";
//     } else {
//         echo "No Lube Oil data found for the selected car.";
//     }
// } else {
//     echo "Invalid request.";
// }

$dataLubeOils = [];

if (isset($_GET['id_mobil'])) {
    $id_mobil = mysqli_real_escape_string($koneksi, $_GET['id_mobil']);

    // Fetch data_lube_oil records associated with the given id_mobil
    $queryLubeOil = "SELECT * FROM data_lube_oil WHERE id_mobil='$id_mobil'";
    $resultLubeOil = mysqli_query($koneksi, $queryLubeOil);

    while ($lubeOil = mysqli_fetch_assoc($resultLubeOil)) {
        $id_lube_oil = $lubeOil['id_lube_oil'];

        // Fetch total_liter from data_alatsensor using id_lube_oil
        $queryAlatSensor = "SELECT total_liter FROM data_alatsensor WHERE id='$id_lube_oil'";
        $resultAlatSensor = mysqli_query($koneksi, $queryAlatSensor);

        $total_liter = 0;
        while ($alatSensor = mysqli_fetch_assoc($resultAlatSensor)) {
            $total_liter = $alatSensor['total_liter'];
        }

        // Add the data to the array
        $dataLubeOils[] = [
            'id_lube_oil' => $id_lube_oil,
            'nama_lube_oil' => $lubeOil['nama_lube_oil'],
            'total_liter' => $total_liter
        ];
    }
}

mysqli_close($koneksi);
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
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
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

    <div class="main-content position-relative max-height-vh-75 border-radius-lg" style="margin-top:7rem; margin-left:5rem">
    <div class="container-fluid py-2">
      <div class="row d-flex">
      <?php if (!empty($dataLubeOils)): ?>
          <?php foreach ($dataLubeOils as $index => $lubeOil): ?>
              <div class="col-xl-6 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                  <div class="card-header p-2 ps-3">
                    <div class="d-flex justify-content-between">
                      <div>
                        <p class="text-sm mb-0 text-capitalize text-center">Pemakaian Terakhir <span class="text-success font-weight-bolder"><?php echo htmlspecialchars($lubeOil['nama_lube_oil']); ?></span> </p>
                        <h4 class="mb-0"><?php echo htmlspecialchars($lubeOil['total_liter']); ?> L</h4>
                      </div>
                      <!-- <div class="icon icon-md icon-shape bg-gradient-dark shadow-dark shadow text-center border-radius-lg">
                        <i class="material-symbols-rounded opacity-10">weekend</i>
                      </div> -->
                    </div>
                  </div>
                  <hr class="dark horizontal my-0">
                  <div class="card-footer p-2 ps-3">
                    <div class="d-flex justify-content-between align-items-center">
                      <p class="mb-0 text-sm">Lihat Grafik Pemakaian</p>
                      <i class="material-symbols-rounded arrow-icon" data-index="<?php echo $index; ?>" style="cursor:pointer;" onclick="toggleChart(<?php echo $index; ?>);">expand_more</i>
                    </div>
                  </div>
                  <!-- Grafik -->
                  <div class="grafik-container" id="grafik-<?php echo $index; ?>" data-id-lube-oil="<?php echo $lubeOil['id_lube_oil']; ?>" style="display:none;">
                    <canvas id="chart-<?php echo $index ?>" width="400" height="200"></canvas>
                  </div>
                </div>
              </div>
              <script>
                    const ctx<?php echo $index; ?> = document.getElementById('chart-<?php echo $index; ?>').getContext('2d');
                    let chart<?php echo $index; ?> = new Chart(ctx<?php echo $index; ?>, {
                        type: 'line',
                        data: {
                            labels: [], // Timestamps
                            datasets: [{
                                label: 'Total Liter',
                                data: [], // Total liter values
                                borderColor: 'rgba(75, 192, 192, 1)',
                                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                                fill: true,
                                tension: 0.4
                            }]
                        },
                        options: {
                            responsive: true,
                            scales: {
                                x: { title: { display: true, text: 'Tanggal' } },
                                y: { title: { display: true, text: 'Total Liter' } }
                            }
                        }
                    });

                    function fetchData(index) {
                      const idLubeOil = document.getElementById(`grafik-${index}`).getAttribute('data-id-lube-oil');

                      $.ajax({
                          url: 'get_lube_oil_data.php',
                          method: 'GET',
                          data: { id_lube_oil: idLubeOil },
                          dataType: 'json',
                          success: function(data) {
                              const labels = data.map(entry => entry.created_at);
                              const totalLiters = data.map(entry => entry.total_liter);

                              // Periksa apakah chart sudah diinisialisasi
                              if (window[`chart${index}`]) {
                                  window[`chart${index}`].data.labels = labels;
                                  window[`chart${index}`].data.datasets[0].data = totalLiters;
                                  window[`chart${index}`].update(); // Perbarui grafik
                              } else {
                                  // Inisialisasi chart jika belum ada
                                  const ctx = document.getElementById(`chart-${index}`).getContext('2d');
                                  window[`chart${index}`] = new Chart(ctx, {
                                      type: 'line',
                                      data: {
                                          labels: labels,  // Timestamps
                                          datasets: [{
                                              label: 'Total Liter',
                                              data: totalLiters,  // Total liter values
                                              borderColor: 'rgba(75, 192, 192, 1)',
                                              backgroundColor: 'rgba(75, 192, 192, 0.2)',
                                              fill: true,
                                              tension: 0.4
                                          }]
                                      },
                                      options: {
                                          responsive: true,
                                          scales: {
                                              x: { title: { display: true, text: 'Time' } },
                                              y: { title: { display: true, text: 'Total Liter' } }
                                          }
                                      }
                                  });
                              }
                          }
                      });
                  }


                    function toggleChart(index) {
                        const chartContainer = document.getElementById(`grafik-${index}`);
                        const chartCanvas = document.getElementById(`chart-${index}`);

                        if (chartContainer.style.display === 'none') {
                            chartContainer.style.display = 'block';
                            fetchData(index);  // Panggil fungsi untuk mendapatkan data
                            setInterval(() => fetchData(index), 5000); // Refresh setiap 5 detik
                        } else {
                            chartContainer.style.display = 'none';
                        }
                    }

                </script>


            <?php endforeach; ?>
        <?php else: ?>
            <div class="col-12">
                <p class="text-center">No Lube Oil data found for the selected car.</p>
            </div>
        <?php endif; ?>
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
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</body>

</html>