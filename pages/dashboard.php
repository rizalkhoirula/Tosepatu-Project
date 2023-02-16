<?php
include "../connection/koneksi.php";
session_start();

if (isset($_SESSION["ses_username"]) == "") {
  header("location: ../login.php");
} elseif ($_SESSION["ses_role"] == '2') {
  header("location: orders.php");
} else {
  $data_id = $_SESSION["ses_id"];
  $data_nama = $_SESSION["ses_nama"];
  $data_username = $_SESSION["ses_username"];
  $data_password = $_SESSION["ses_password"];
  $data_role = $_SESSION["ses_role"];
}

$data_penjualan = mysqli_query($koneksi, "SELECT tb_transaksi.tanggal, sum(tb_layanan.harga*tb_transaksi.jumlah+tb_penjemputan.harga+tb_pengiriman.harga) as total FROM tb_transaksi INNER JOIN tb_layanan ON tb_layanan.id=tb_transaksi.layanan INNER JOIN tb_penjemputan ON tb_penjemputan.id=tb_transaksi.penjemputan INNER JOIN tb_pengiriman ON tb_pengiriman.id=tb_transaksi.pengiriman INNER JOIN tb_status ON tb_status.id=tb_transaksi.status WHERE tb_status.nama = 'selesai' AND MONTH(tb_transaksi.tanggal)=MONTH(curdate()) AND YEAR(tb_transaksi.tanggal)=YEAR(curdate()) GROUP BY tb_transaksi.tanggal");

$data_tanggal = array();
$data_total = array();

while ($data = mysqli_fetch_array($data_penjualan)) {
  $data_tanggal[] = date('d-m-Y', strtotime($data['tanggal']));
  $data_total[] = $data['total'];
}

$data_order = mysqli_query($koneksi, "SELECT date_format(tb_transaksi.tanggal, '%M') AS bulan, COUNT(tb_transaksi.id) as jml_order FROM tb_transaksi GROUP BY MONTH(tb_transaksi.tanggal)");

$order_bulan = array();
$order_total = array();

while ($row = mysqli_fetch_array($data_order)) {
  $order_bulan[] = $row['bulan'];
  $order_total[] = $row['jml_order'];
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png" />
  <link rel="icon" type="image/png" href="../assets/img/favicon.png" />
  <title>Dashboard Suki</title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="../assets/css/argon-dashboard.css" rel="stylesheet" />
</head>

<body class="g-sidenav-show bg-gray-100">
  <div class="position-absolute w-100 min-height-300 top-0" style="
        background-image: url('../assets/img/nv-bg.jpg');
        background-position-y: 50%;
      ">
    <span class="mask bg-primary opacity-6"></span>
  </div>
  <div class="min-height-300 position-absolute w-100"></div>
  <aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4" id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href="dashboard.php">
        <img src="../assets/images/icon.png" class="navbar-brand-img h-100" alt="main_logo" />
        <span class="ms-1 font-weight-bold">Tosepatu Dashboard</span>
      </a>
    </div>
    <hr class="horizontal dark mt-0" />
    <div class="collapse navbar-collapse w-auto" id="sidenav-collapse-main">
      <ul class="navbar-nav">


        <li class='nav-item'>
          <a class='nav-link active' href='dashboard.php'>
            <div class='icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center'>
              <i class='ni ni-tv-2 text-warning text-sm opacity-10'></i>
            </div>
            <span class='nav-link-text ms-1'>Dashboard</span>
          </a>
        </li>

        <?php

        if ($data_role == '1') {

          echo "


        <li class='nav-item'>
        <a class='nav-link' href='transaksi.php'>
          <div class='icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center'>
            <i class='ni ni-tag text-warning text-sm opacity-10'></i>
          </div>
          <span class='nav-link-text ms-1'>Transaksi</span>
        </a>
      </li>

      <li class='nav-item'>
      <a class='nav-link' href='services.php'>
        <div class='icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center'>
          <i class='ni ni-bulb-61 text-warning text-sm opacity-10'></i>
        </div>
        <span class='nav-link-text ms-1'>Services</span>
      </a>
    </li>

    <li class='nav-item'>
    <a class='nav-link' href='users.php'>
      <div class='icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center'>
        <i class='ni ni-single-02 text-warning text-sm opacity-10'></i>
      </div>
      <span class='nav-link-text ms-1'>Users</span>
    </a>
  </li>

  
  <li class='nav-item'>
  <a class='nav-link' href='messages.php'>
    <div class='icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center'>
      <i class='ni ni-send text-warning text-sm opacity-10'></i>
    </div>
    <span class='nav-link-text ms-1'>Messages</span>
  </a>
</li>

  <li class='nav-item'>
  <a class='nav-link' href='report.php'>
    <div class='icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center'>
      <i class='ni ni-chart-bar-32 text-warning text-sm opacity-10'></i>
    </div>
    <span class='nav-link-text ms-1'>Report</span>
  </a>
</li>

  <li class='nav-item'>
  <a class='nav-link' href='profile.php'>
    <div class='icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center'>
      <i class='ni ni-circle-08 text-warning text-sm opacity-10'></i>
    </div>
    <span class='nav-link-text ms-1'>Profile</span>
  </a>
</li>

  
          
          
          ";
        } else {
          echo "

          
        <li class='nav-item'>
        <a class='nav-link' href='orders.php'>
          <div class='icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center'>
            <i class='ni ni-chart-bar-32 text-warning text-sm opacity-10'></i>
          </div>
          <span class='nav-link-text ms-1'>Order</span>
        </a>
      </li>

      <li class='nav-item'>
      <a class='nav-link' href='messages-users.php'>
        <div class='icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center'>
          <i class='ni ni-send text-warning text-sm opacity-10'></i>
        </div>
        <span class='nav-link-text ms-1'>Messages</span>
      </a>
    </li>

      <li class='nav-item'>
      <a class='nav-link' href='profile.php'>
        <div class='icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center'>
          <i class='ni ni-circle-08 text-warning text-sm opacity-10'></i>
        </div>
        <span class='nav-link-text ms-1'>Profile</span>
      </a>
    </li>
    

";
        }


        ?>


      </ul>
    </div>



  </aside>
  <main class="main-content position-relative border-radius-lg">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" data-scroll="false">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm">
              <a class="opacity-5 text-white" href="javascript:;">Pages</a>
            </li>
            <li class="breadcrumb-item text-sm text-white active" aria-current="page">
              Dashboard
            </li>
          </ol>
          <h6 class="font-weight-bolder text-white mb-0">Dashboard</h6>
        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
          <!-- <div class="ms-md-auto pe-md-3 d-flex align-items-center"> -->
          <!-- <div class="input-group">
              <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
              <input type="text" class="form-control" placeholder="Type here..." />
            </div> -->
          <!-- </div> -->
          <ul class="ms-md-auto pe-md-3 d-flex align-items-center navbar-nav justify-content-end">
            <!-- <li class="nav-item d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-white font-weight-bold px-0">
                <i class="fa fa-user me-sm-1"></i>
                <span class="d-sm-inline d-none">Sign In</span>
              </a>
            </li> -->
            <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-white p-0" id="iconNavbarSidenav">
                <div class="sidenav-toggler-inner">
                  <i class="sidenav-toggler-line bg-white"></i>
                  <i class="sidenav-toggler-line bg-white"></i>
                  <i class="sidenav-toggler-line bg-white"></i>
                </div>
              </a>
            </li>


            <?php
            error_reporting(0);


            $tampilprofil = ("SELECT id, nama, username, password  FROM tb_user WHERE id = '$data_id'");
            $result   = mysqli_query($koneksi, $tampilprofil);

            while ($row = mysqli_fetch_array($result)) {

              $profilName   = $row['nama'];

            ?>

              <li class="nav-item px-3 d-flex align-items-center">
                <a href="javascript:;" class="nav-link text-white font-weight-bold px-0">
                  <span class="d-sm-inline d-none">Halo, <?php echo $profilName ?></span>
                </a>
              </li>

            <?php

            }
            ?>


            <li class="nav-item dropdown pe-2 d-flex align-items-center">
              <a href="#" class="nav-link text-white p-0" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fa fa-chevron-circle-down cursor-pointer"></i>
              </a>

              <ul class="dropdown-menu dropdown-menu-end px-2 py-3 me-sm-n4" aria-labelledby="dropdownMenuButton">

                <li class="dropdown-item d-flex align-items-center">
                  <a href="profile.php" class="dropdown-item">
                    <i class="fa fa-user fixed-plugin-button-nav cursor-pointer"></i> Profile
                  </a>

                </li>
                <li class="dropdown-item d-flex align-items-center">
                  <a href="logout.php" class="dropdown-item">
                    <i class="fa fa-sign-out cursor-pointer"></i> Logout
                  </a>
                </li>
              </ul>
            </li>

          </ul>
        </div>
      </div>
    </nav>
    <!-- End Navbar -->
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-uppercase font-weight-bold">
                      Month Money
                    </p>

                    <?php
                    error_reporting(0);


                    $sql = ("SELECT format(sum(tb_layanan.harga*tb_transaksi.jumlah+tb_penjemputan.harga+tb_pengiriman.harga),0) as total FROM tb_transaksi INNER JOIN tb_layanan ON tb_layanan.id=tb_transaksi.layanan INNER JOIN tb_penjemputan ON tb_penjemputan.id=tb_transaksi.penjemputan INNER JOIN tb_pengiriman ON tb_pengiriman.id=tb_transaksi.pengiriman INNER JOIN tb_status ON tb_status.id=tb_transaksi.status WHERE tb_status.nama = 'selesai' AND MONTH(tb_transaksi.tanggal)=MONTH(curdate()) AND YEAR(tb_transaksi.tanggal)=YEAR(curdate())");
                    $result   = mysqli_query($koneksi, $sql);

                    while ($row = mysqli_fetch_array($result)) {

                      $total   = $row['total'];

                    ?>



                      <?php

                      if ($total == '') {
                        echo "
                        <h5 class='font-weight-bolder'> Rp. 0</h5>
                        ";
                      } else {

                        echo "

                        <h5 class='font-weight-bolder'>Rp. $total</h5>
                        
                        ";
                      }

                      ?>




                    <?php

                    }
                    ?>

                    <!-- <p class="mb-0">
                      <span class="text-success text-sm font-weight-bolder">+55%</span>
                      since yesterday
                    </p> -->
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                    <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-uppercase font-weight-bold">
                      Month Transaction
                    </p>


                    <?php
                    error_reporting(0);


                    // $sql = ("SELECT COUNT(*) as jml_transaksi FROM tb_transaksi WHERE tb_transaksi.tanggal = curdate()");

                    $sql = ("SELECT COUNT(*) as jml_transaksi FROM tb_transaksi WHERE MONTH(tb_transaksi.tanggal)=MONTH(curdate()) AND YEAR(tb_transaksi.tanggal)=YEAR(curdate())");
                    $result   = mysqli_query($koneksi, $sql);

                    while ($row = mysqli_fetch_array($result)) {

                      $jml_transaksi   = $row['jml_transaksi'];

                    ?>



                      <?php

                      if ($jml_transaksi == '') {
                        echo "
                        <h5 class='font-weight-bolder'>0</h5>
                        ";
                      } else {

                        echo "

                        <h5 class='font-weight-bolder'>$jml_transaksi</h5>
                        
                        ";
                      }

                      ?>




                    <?php

                    }
                    ?>

                    <!-- <p class="mb-0">
                      <span class="text-success text-sm font-weight-bolder">+3%</span>
                      since last week
                    </p> -->
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-danger shadow-danger text-center rounded-circle">
                    <i class="ni ni-cart text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-uppercase font-weight-bold">
                      Total Users
                    </p>
                    <?php
                    error_reporting(0);


                    $sql = ("SELECT COUNT(*) as user FROM tb_user WHERE tb_user.role = '2'");
                    $result   = mysqli_query($koneksi, $sql);

                    while ($row = mysqli_fetch_array($result)) {

                      $jml_user   = $row['user'];

                    ?>



                      <?php

                      if ($jml_user == '') {
                        echo "
                        <h5 class='font-weight-bolder'>0</h5>
                        ";
                      } else {

                        echo "

                        <h5 class='font-weight-bolder'>$jml_user</h5>
                        
                        ";
                      }

                      ?>




                    <?php

                    }
                    ?>
                    <!-- <p class="mb-0">
                      <span class="text-danger text-sm font-weight-bolder">-2%</span>
                      since last quarter
                    </p> -->
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-success shadow-success text-center rounded-circle">
                    <i class="ni ni-single-02 text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-uppercase font-weight-bold">
                      Total Services
                    </p>
                    <?php
                    error_reporting(0);


                    $sql = ("SELECT COUNT(*) AS layanan FROM tb_layanan ");
                    $result   = mysqli_query($koneksi, $sql);

                    while ($row = mysqli_fetch_array($result)) {

                      $layanan   = $row['layanan'];

                    ?>



                      <?php

                      if ($layanan == '') {
                        echo "
                        <h5 class='font-weight-bolder'>0</h5>
                        ";
                      } else {

                        echo "

                        <h5 class='font-weight-bolder'>$layanan</h5>
                        
                        ";
                      }

                      ?>




                    <?php

                    }
                    ?>
                    <!-- <p class="mb-0">
                      <span class="text-success text-sm font-weight-bolder">+5%</span>
                      than last month
                    </p> -->
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-warning shadow-warning text-center rounded-circle">
                    <i class="ni ni-bag-17 text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row mt-4">
        <div class="col-lg-7 mb-lg-0 mb-4">
          <div class="card z-index-2 h-100">
            <div class="card-header pb-0 pt-3 bg-transparent">
              <h6 class="text-capitalize">Chart Today's Money</h6>
              <!-- <p class="text-sm mb-0">
                <i class="fa fa-arrow-up text-success"></i>
                <span class="font-weight-bold">4% more</span> in 2021
              </p> -->
            </div>
            <div class="card mb-3">
              <div class="card-body p-3">
                <div class="chart">
                  <canvas id="line-chart-gradient" class="chart-canvas" height="300"></canvas>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-5">
          <div class="card card-carousel overflow-hidden h-100 p-0">

            <div class="card z-index-2 h-100">
              <div class="card-header pb-0 pt-3 bg-transparent">
                <h6 class="text-capitalize">Chart Month's Order</h6>
                <!-- <p class="text-sm mb-0">
                <i class="fa fa-arrow-up text-success"></i>
                <span class="font-weight-bold">4% more</span> in 2021
              </p> -->
              </div>
              <div class="card mb-3">
                <div class="card-body p-3">
                  <div class="chart">
                    <canvas id="line-chart-gradient2" class="chart-canvas" height="300"></canvas>
                  </div>
                </div>
              </div>
            </div>



            <!-- <div id="carouselExampleCaptions" class="carousel slide h-100" data-bs-ride="carousel">
              <div class="carousel-inner border-radius-lg h-100">
                <div class="carousel-item h-100 active" style="
                      background-image: url('../assets/img/carousel-1.jpg');
                      background-size: cover;
                    ">
                  <div class="carousel-caption d-none d-md-block bottom-0 text-start start-0 ms-5">
                    <div class="icon icon-shape icon-sm bg-white text-center border-radius-md mb-3">
                      <i class="ni ni-camera-compact text-dark opacity-10"></i>
                    </div>
                    <h5 class="text-white mb-1">Get started with Argon</h5>
                    <p>
                      There’s nothing I really wanted to do in life that I
                      wasn’t able to get good at.
                    </p>
                  </div>
                </div>
                <div class="carousel-item h-100" style="
                      background-image: url('../assets/img/carousel-2.jpg');
                      background-size: cover;
                    ">
                  <div class="carousel-caption d-none d-md-block bottom-0 text-start start-0 ms-5">
                    <div class="icon icon-shape icon-sm bg-white text-center border-radius-md mb-3">
                      <i class="ni ni-bulb-61 text-dark opacity-10"></i>
                    </div>
                    <h5 class="text-white mb-1">
                      Faster way to create web pages
                    </h5>
                    <p>
                      That’s my skill. I’m not really specifically talented at
                      anything except for the ability to learn.
                    </p>
                  </div>
                </div>
                <div class="carousel-item h-100" style="
                      background-image: url('../assets/img/carousel-3.jpg');
                      background-size: cover;
                    ">
                  <div class="carousel-caption d-none d-md-block bottom-0 text-start start-0 ms-5">
                    <div class="icon icon-shape icon-sm bg-white text-center border-radius-md mb-3">
                      <i class="ni ni-trophy text-dark opacity-10"></i>
                    </div>
                    <h5 class="text-white mb-1">
                      Share with us your design tips!
                    </h5>
                    <p>
                      Don’t be afraid to be wrong because you can’t learn
                      anything from a compliment.
                    </p>
                  </div>
                </div>
              </div>
              <button class="carousel-control-prev w-5 me-3" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
              </button>
              <button class="carousel-control-next w-5 me-3" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
              </button>
            </div> -->
          </div>
        </div>
      </div>
      <div class="row mt-4">
        <div class="col-lg-7 mb-lg-0 mb-4">
          <div class="card">
            <div class="card-header pb-0 p-3">
              <div class="d-flex justify-content-between">
                <h6 class="mb-2">Top Products</h6>
              </div>
            </div>
            <div class="table-responsive">
              <table class="table align-items-center">

                <thead>
                  <tr>
                    <th>
                      <div class="text-center">
                        <p class="text-xs font-weight-bold mb-0">No.</p>

                      </div>
                    </th>
                    <th>
                      <div class="text-center">
                        <p class="text-xs font-weight-bold mb-0">Nama</p>

                      </div>
                    </th>
                    <th>
                      <div class="text-center">
                        <p class="text-xs font-weight-bold mb-0">harga</p>

                      </div>
                    </th>
                    <th>
                      <div class="text-center">
                        <p class="text-xs font-weight-bold mb-0">Jumlah Customer</p>

                      </div>
                    </th>
                    <th>
                      <div class="text-center">
                        <p class="text-xs font-weight-bold mb-0">Jumlah Sepatu</p>

                      </div>
                    </th>
                  </tr>
                </thead>

                <tbody>


                  <?php

                  $query  = "SELECT tb_layanan.nama, tb_layanan.harga, COUNT(tb_transaksi.layanan) as jml_dipilih, SUM(tb_transaksi.jumlah) as jml_sepatu FROM tb_transaksi INNER JOIN tb_layanan ON tb_transaksi.layanan=tb_layanan.id GROUP BY tb_layanan.nama ORDER BY jml_sepatu desc;";
                  $result = mysqli_query($koneksi, $query);


                  $no     = 1;
                  while ($row = mysqli_fetch_array($result)) {
                    $namalayanan = $row['nama'];
                    $hargalayanan = $row['harga'];
                    $jumlahdipilih = $row['jml_dipilih'];
                    $jumlahsepatu = $row['jml_sepatu']


                  ?>

                    <tr>
                      <td>
                        <div class="text-center">
                          <h6 class="text-xs font-weight-bold mb-0"> <?php echo $no ?> </h6>
                        </div>
                      </td>


                      <td>
                        <div class="text-center">
                          <h6 class="text-xs font-weight-bold mb-0"> <?php echo $namalayanan ?> </h6>
                        </div>
                      </td>
                      <td>
                        <div class="text-center">
                          <h6 class="text-xs font-weight-bold mb-0">Rp. <?php echo $hargalayanan ?></h6>
                        </div>
                      </td>
                      <td class="align-middle text-sm">
                        <div class="col text-center">
                          <h6 class="text-xs font-weight-bold mb-0"><?php echo $jumlahdipilih ?></h6>
                        </div>
                      </td>
                      <td class="align-middle text-sm">
                        <div class="col text-center">
                          <h6 class="text-xs font-weight-bold mb-0"><?php echo $jumlahsepatu ?></h6>
                        </div>
                      </td>
                    </tr>
                  <?php

                    $no++;
                  }

                  ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <div class="col-lg-5">
          <div class="card">
            <div class="card-header pb-0 p-3">
              <h6 class="mb-0">Top Users</h6>
            </div>
            <div class="card-body p-3">



              <?php

              $query  = "SELECT tb_user.nama, COUNT(tb_transaksi.id_user) as jml_order, SUM(tb_transaksi.jumlah) as jml_sepatu FROM tb_transaksi INNER JOIN tb_user ON tb_user.id=tb_transaksi.id_user GROUP BY tb_user.nama ORDER BY jml_order desc LIMIT 5";
              $result = mysqli_query($koneksi, $query);

              while ($row = mysqli_fetch_array($result)) {
                $namatopuser = $row['nama'];
                $topjumlahorder = $row['jml_order'];
                $topjumlahsepatu = $row['jml_sepatu'];


              ?>
                <ul class="list-group">
                  <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                    <div class="d-flex align-items-center">
                      <div class="icon icon-shape icon-sm me-3 bg-gradient-dark shadow text-center">
                        <i class="ni ni-single-02 text-white opacity-10"></i>
                      </div>
                      <div class="d-flex flex-column">
                        <h6 class="mb-1 text-dark text-sm"> <?php echo $namatopuser ?></h6>
                        <span class="text-xs">
                          <span class="font-weight-bold"> <?php echo $topjumlahorder ?> Order</span>
                          <span class="font-weight-bold"> <?php echo $topjumlahsepatu ?> Sepatu</span>
                        </span>
                      </div>
                    </div>
                    <div class="d-flex">
                      <button class="btn btn-link btn-icon-only btn-rounded btn-sm text-dark icon-move-right my-auto">
                        <i class="ni ni-bold-right" aria-hidden="true"></i>
                      </button>
                    </div>
                  </li>
                </ul>

              <?php

              }

              ?>


            </div>
          </div>
        </div>
      </div>
      <footer class="footer pt-3">
        <div class="container-fluid">
          <div class="row align-items-center justify-content-lg-between">
            <div class="col-lg-6 mb-lg-0 mb-4">
              <div class="copyright text-center text-sm text-muted text-lg-start">
                ©
                <script>
                  document.write(new Date().getFullYear());
                </script>
                , made with <i class="fa fa-heart"></i> by
                <a href="#" class="font-weight-bold">Tosepatu Team</a>
                for a better web.
              </div>
            </div>
            <!-- <div class="col-lg-6">
              <ul class="nav nav-footer justify-content-center justify-content-lg-end">
                <li class="nav-item">
                  <a href="https://www.creative-tim.com" class="nav-link text-muted" target="_blank">Creative Tim</a>
                </li>
                <li class="nav-item">
                  <a href="https://www.creative-tim.com/presentation" class="nav-link text-muted" target="_blank">About Us</a>
                </li>
                <li class="nav-item">
                  <a href="https://www.creative-tim.com/blog" class="nav-link text-muted" target="_blank">Blog</a>
                </li>
                <li class="nav-item">
                  <a href="https://www.creative-tim.com/license" class="nav-link pe-0 text-muted" target="_blank">License</a>
                </li>
              </ul>
            </div> -->
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
  <script src="../assets/js/plugins/chartjs.min.js"></script>
  <script>
    var ctx1 = document.getElementById("line-chart-gradient").getContext("2d");

    var gradientStroke1 = ctx1.createLinearGradient(0, 230, 0, 50);

    gradientStroke1.addColorStop(1, 'rgba(94, 114, 228, 0.2)');
    gradientStroke1.addColorStop(0.2, 'rgba(94, 114, 228, 0.0)');
    gradientStroke1.addColorStop(0, 'rgba(94, 114, 228, 0)');
    new Chart(ctx1, {
      type: "line",
      data: {
        labels: <?php echo json_encode($data_tanggal) ?>,
        datasets: [{
          label: "Penghasilan",
          tension: 0.4,
          borderWidth: 0,
          pointRadius: 0,
          borderColor: "#5e72e4",
          backgroundColor: gradientStroke1,
          borderWidth: 3,
          fill: true,
          data: <?php echo json_encode($data_total) ?>,
          maxBarThickness: 6

        }],
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: false,
          },
        },
        interaction: {
          intersect: false,
          mode: "index",
        },
        scales: {
          y: {
            grid: {
              drawBorder: false,
              display: true,
              drawOnChartArea: true,
              drawTicks: false,
              borderDash: [5, 5],
            },
            ticks: {
              display: true,
              padding: 10,
              color: "#fbfbfb",
              font: {
                size: 11,
                family: "Open Sans",
                style: "normal",
                lineHeight: 2,
              },
            },
          },
          x: {
            grid: {
              drawBorder: false,
              display: false,
              drawOnChartArea: false,
              drawTicks: false,
              borderDash: [5, 5],
            },
            ticks: {
              display: true,
              color: "#ccc",
              padding: 20,
              font: {
                size: 11,
                family: "Open Sans",
                style: "normal",
                lineHeight: 2,
              },
            },
          },
        },
      },
    });
  </script>
  <script>
    var ctx1 = document.getElementById("line-chart-gradient2").getContext("2d");

    var gradientStroke1 = ctx1.createLinearGradient(0, 230, 0, 50);

    gradientStroke1.addColorStop(1, 'rgba(94, 114, 228, 0.2)');
    gradientStroke1.addColorStop(0.2, 'rgba(94, 114, 228, 0.0)');
    gradientStroke1.addColorStop(0, 'rgba(94, 114, 228, 0)');
    new Chart(ctx1, {
      type: "line",
      data: {
        labels: <?php echo json_encode($order_bulan) ?>,
        datasets: [{
          label: "Penghasilan",
          tension: 0.4,
          borderWidth: 0,
          pointRadius: 0,
          borderColor: "#5e72e4",
          backgroundColor: gradientStroke1,
          borderWidth: 3,
          fill: true,
          data: <?php echo json_encode($order_total) ?>,
          maxBarThickness: 6

        }],
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: false,
          },
        },
        interaction: {
          intersect: false,
          mode: "index",
        },
        scales: {
          y: {
            grid: {
              drawBorder: false,
              display: true,
              drawOnChartArea: true,
              drawTicks: false,
              borderDash: [5, 5],
            },
            ticks: {
              display: true,
              padding: 10,
              color: "#fbfbfb",
              font: {
                size: 11,
                family: "Open Sans",
                style: "normal",
                lineHeight: 2,
              },
            },
          },
          x: {
            grid: {
              drawBorder: false,
              display: false,
              drawOnChartArea: false,
              drawTicks: false,
              borderDash: [5, 5],
            },
            ticks: {
              display: true,
              color: "#ccc",
              padding: 20,
              font: {
                size: 11,
                family: "Open Sans",
                style: "normal",
                lineHeight: 2,
              },
            },
          },
        },
      },
    });
  </script>
  <script>
    var win = navigator.platform.indexOf("Win") > -1;
    if (win && document.querySelector("#sidenav-scrollbar")) {
      var options = {
        damping: "0.5",
      };
      Scrollbar.init(document.querySelector("#sidenav-scrollbar"), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/argon-dashboard.min.js"></script>
</body>

</html>