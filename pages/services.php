<?php
include "../connection/koneksi.php";
session_start();

if (isset($_SESSION["ses_username"]) == "") {
  header("location: ../login.php");
} elseif ($_SESSION["ses_role"] == '2') {
  header("location: logout.php");
} else {
  $data_id = $_SESSION["ses_id"];
  $data_nama = $_SESSION["ses_nama"];
  $data_username = $_SESSION["ses_username"];
  $data_password = $_SESSION["ses_password"];
  $data_role = $_SESSION["ses_role"];
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png" />
  <link rel="icon" type="image/png" href="../assets/img/favicon.png" />
  <title>Services - Suki Dashboard</title>
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
      <a class="navbar-brand m-0" href="./dashboard.php">
        <img src="../assets/images/icon.png" class="navbar-brand-img h-100" alt="main_logo" />
        <span class="ms-1 font-weight-bold">Tosepatu Dashboard</span>
      </a>
    </div>
    <hr class="horizontal dark mt-0" />
    <div class="collapse navbar-collapse w-auto" id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="./dashboard.php">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-tv-2 text-warning text-sm opacity-10"></i>
              <!-- <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i> -->
            </div>
            <span class="nav-link-text ms-1">Dashboard</span>
          </a>
        </li>
        <!-- <li class="nav-item">
          <a class="nav-link" href="./orders.view.php">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-cart text-warning text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Oders</span>
          </a>
        </li> -->

        <li class='nav-item'>
          <a class='nav-link ' href='transaksi.php'>
            <div class='icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center'>
              <i class='ni ni-tag text-warning text-sm opacity-10'></i>
            </div>
            <span class='nav-link-text ms-1'>Transaksi</span>
          </a>
        </li>

        <li class='nav-item'>
          <a class='nav-link active' href='services.php'>
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
              Services
            </li>
          </ol>
          <h6 class="font-weight-bolder text-white mb-0">Services</h6>
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


            $tampilprofil = ("SELECT * FROM tb_user WHERE id = '$data_id'");
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

    <div class="card shadow-lg mx-4 mt-3">
      <div class="card-body">
        <div class="row gx-4">

          <div class="dropdown col-auto">
            <form class="" action="" method="post">
              <button class="btn btn-sm bg-gradient-dark dropdown-toggle mb-1 px-3" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                Sort By
              </button>
              <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <button class="dropdown-item" name="namaasc" type="submit"> Nama Asc (A-Z)</button>
                <button class="dropdown-item" name="namadesc" type="submit"> Nama Desc (Z-A)</button>
                <button class="dropdown-item" name="hargaasc" type="submit">Harg Daesc (A-Z)</button>
                <button class="dropdown-item" name="hargadesc" type="submit">Harga Asc (Z-A)</button>
              </ul>
            </form>

          </div>

          <!-- <div class="dropdown col-auto">
            <form class="" action="" method="post">
              <button class="btn btn-sm bg-gradient-dark dropdown-toggle mb-1 px-3" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                Status
              </button>
              <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <button class="dropdown-item" name="belum-bayar" type="submit">Belum Bayar</button>
                <button class="dropdown-item" name="pengerjaan" type="submit">Pengerjaan</button>
                <button class="dropdown-item" name="selesai" type="submit">Selesai</button>
                <button class="dropdown-item" name="gagal" type="submit">Gagal</button>
              </ul>
            </form>

          </div> -->







          <div class="col-lg-4 col-md-6 my-sm-auto ms-sm-auto me-sm-0 mx-auto mt-3">
            <div class="nav-wrapper position-relative end-0">
              <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                <form class="input-group" action="" method="post">
                  <div class="input-group">
                    <input type="text" class="form-control ms-4" name="data" placeholder="Type here..." aria-label="Type here..." aria-describedby="button-addon2">
                    <button class="btn bg-gradient-dark  mb-0" name="caridata" type="submit" id="button-addon2">
                      <i class="fas fa-search" aria-hidden="true"></i>
                    </button>
                  </div>
                </form>
              </div>
            </div>
          </div>


        </div>
      </div>
    </div>




    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">

              <div class="d-flex align-items-center">
                <h6>Services table</h6>
                <button class="btn btn-success btn-sm ms-auto" data-bs-toggle="modal" data-bs-target="#modal-tambah">Tambah</button>

              </div>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                        No
                      </th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                        Nama
                      </th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                        Harga
                      </th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                        Actions
                      </th>
                    </tr>
                  </thead>
                  <tbody>

                    <?php

                    $batas = 20;
                    $halaman = @$_GET['halaman'];
                    if (empty($halaman)) {
                      $posisi = 0;
                      $halaman = 1;
                    } else {
                      $posisi = ($halaman - 1) * $batas;
                    }

                    $no = 1 + $posisi;



                    $data = $_POST['data'];

                    if (isset($_POST['caridata'])) {
                      $caringab = ("SELECT id, nama, format(harga,0)  as harga FROM tb_layanan WHERE tb_layanan.nama LIKE '" . $data . "%' LIMIT $posisi, $batas");
                      $result   = mysqli_query($koneksi, $caringab);
                    } elseif (isset($_POST['namaasc'])) {
                      $namaasc = ("SELECT id, nama, format(harga,0) as harga FROM tb_layanan ORDER BY nama asc LIMIT $posisi, $batas");
                      $result   = mysqli_query($koneksi, $namaasc);
                    } elseif (isset($_POST['namadesc'])) {
                      $namadesc = ("SELECT id, nama, format(harga,0) as harga FROM tb_layanan ORDER BY nama desc LIMIT $posisi, $batas");
                      $result   = mysqli_query($koneksi, $namadesc);
                    } elseif (isset($_POST['hargaasc'])) {
                      $totalasc = ("SELECT id, nama, format(harga,0) as harga FROM tb_layanan ORDER BY harga asc LIMIT $posisi, $batas");
                      $result   = mysqli_query($koneksi, $totalasc);
                    } elseif (isset($_POST['hargadesc'])) {
                      $totaldesc = ("SELECT id, nama, format(harga,0) as harga FROM tb_layanan ORDER BY harga desc LIMIT $posisi, $batas");
                      $result   = mysqli_query($koneksi, $totaldesc);
                    } else {
                      $query  = ("SELECT id, nama, format(harga,0) as harga  FROM tb_layanan ORDER BY nama asc LIMIT $posisi, $batas");
                      $result = mysqli_query($koneksi, $query);
                    }


                    $no     = 1;


                    while ($row = mysqli_fetch_array($result)) {

                      $LayananId = $row['id'];
                      $LayananNama = $row['nama'];
                      $LayananHarga = $row['harga'];


                    ?>


                      <tr>

                        <td class="align-middle text-center">
                          <span class="text-secondary text-xs font-weight-bold"><?php echo $no++; ?></span>
                        </td>


                        <td class="align-middle text-center">
                          <span class="text-secondary text-xs font-weight-bold"><?php echo $LayananNama; ?></span>
                        </td>


                        <td class="align-middle text-center">
                          <span class="text-secondary text-xs font-weight-bold"> <?php echo $LayananHarga; ?></span>
                        </td>


                        <td class="align-middle text-center">



                          <button class="btn btn-dark btn-sm px-3 py-1 me-1 mt-3" data-bs-toggle="modal" data-bs-target="#modal-edit<?php echo $row['id']; ?>">Edit</button>
                          <button class="btn btn-dark btn-sm px-3 py-1 me-1 mt-3" data-bs-toggle="modal" data-bs-target="#modal-delete<?php echo $row['id']; ?>">Delete</button>
                        </td>



                      <tr></tr>
                      </tr>


                      <!-- Modal Detail Delete -->
                      <div class="modal fade" id="modal-delete<?= $row['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <!-- <h5 class="modal-title" id="exampleModalLabel">Detail Bukti</h5> -->
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <div class="align-middle text-center">
                                <h4>Anda Yakin Akan Menghapus Data Layanan <?php echo $LayananNama ?> ?</h4>
                              </div>
                              <form class="yayyay" action="services.php?id=<?= $row['id'] ?>" method="post">
                                <div class="modal-footer">
                                  <div class="align-middle text-center">
                                    <button class="btn btn-danger btn-sm ms-auto" type="submit" name="delete-layanan">Delete</button>
                                    <button type="button" class="btn btn-success btn-sm ms-auto" data-bs-dismiss="modal">Close</button>
                                  </div>
                                </div>
                              </form>
                            </div>
                          </div>
                        </div>
                      </div>


                      <!-- End Detail Delete -->


                      <!-- Modal Detail Edit -->
                      <div class="modal fade" id="modal-edit<?= $row['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Edit Form Layanan</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <form action="services.php?id=<?= $row['id'] ?>" method="post">

                                <div class="form-group">
                                  <label for="example-text-input" class="form-control-label">Name</label>
                                  <input class="form-control" name="edit-nama" type="text" value="<?= $LayananNama ?>" maxlength="30" placeholder="Enter Nama Layanan" required />
                                </div>



                                <div class="form-group">
                                  <label for="example-text-input" class="form-control-label">Harga</label>
                                  <input class="form-control" name="edit-harga" type="text" value="<?= $LayananHarga ?>" maxlength="30" placeholder="Enter Harga" required />
                                </div>

                                <div class="modal-footer">
                                  <div class="align-middle text-center">
                                    <button type="submit" name="edit-layanan" class="btn btn-success btn-sm ms-auto">Edit</button>
                                    <button type="button" class="btn btn-danger btn-sm ms-auto" data-bs-dismiss="modal">Close</button>
                                  </div>
                                </div>
                              </form>
                            </div>
                          </div>
                        </div>
                      </div>

                      <!-- End Detail Edit -->





                    <?php
                      // $no++;
                    }


                    ?>
                  </tbody>
                </table>
              </div>

              <?php
              $ngab = mysqli_query($koneksi, "SELECT * FROM tb_layanan ORDER BY nama asc");
              $hitung = $ngab->fetch_all(MYSQLI_ASSOC);
              $jmldata = $hitung[0]['id'];
              $jmlhalaman = ceil($jmldata / $batas);

              $Previous = $halaman - 1;
              $Next = $halaman + 1;

              ?>

              <div class="my-4 ms-2 me-2">
                <nav aria-label="Page navigation example">
                  <ul class="pagination justify-content-end">
                    <li class="page-item">
                      <a class="page-link" href="orders.php?halaman=<?= $Previous; ?>" aria-label="Previous">
                        <i class="fa fa-angle-left"></i>
                        <span class="sr-only">Previous</span>
                      </a>
                    </li>

                    <?php
                    for ($i = 1; $i <= $jmlhalaman; $i++)
                      if ($i != $halaman) {
                        echo "
                       <li class='page-item'><a href=\"orders.php?halaman=$i \" class='page-link'>$i</a></li>
                       ";
                      } else {
                        echo "
                           <li class='page-item'><a class='page-link'>$i</a></li>
                           ";
                      }

                    ?>
                    <li class="page-item">
                      <a class="page-link" href="orders.php?halaman=<?= $Next; ?>" aria-label="Next">
                        <i class="fa fa-angle-right"></i>
                        <span class="sr-only">Next</span>
                      </a>
                    </li>
                  </ul>
                </nav>
              </div>


            </div>
          </div>
        </div>
      </div>


      <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">

              <div class="d-flex align-items-center">
                <h6>Services Delivery table</h6>
                <button class="btn btn-success btn-sm ms-auto" data-bs-toggle="modal" data-bs-target="#modal-tambah-pengiriman">Tambah</button>

              </div>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                        No
                      </th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                        Nama
                      </th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                        Harga
                      </th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                        Actions
                      </th>
                    </tr>
                  </thead>
                  <tbody>

                    <?php

                    $batas = 20;
                    $halaman = @$_GET['halaman'];
                    if (empty($halaman)) {
                      $posisi = 0;
                      $halaman = 1;
                    } else {
                      $posisi = ($halaman - 1) * $batas;
                    }

                    $no = 1 + $posisi;



                    $data = $_POST['data'];

                    if (isset($_POST['caridata'])) {
                      $caringab = ("SELECT id, nama, format(harga,0)  as harga FROM tb_pengiriman WHERE tb_pengiriman.nama LIKE '" . $data . "%' LIMIT $posisi, $batas");
                      $result   = mysqli_query($koneksi, $caringab);
                    } elseif (isset($_POST['namaasc'])) {
                      $namaasc = ("SELECT id, nama, format(harga,0) as harga FROM tb_pengiriman ORDER BY nama asc LIMIT $posisi, $batas");
                      $result   = mysqli_query($koneksi, $namaasc);
                    } elseif (isset($_POST['namadesc'])) {
                      $namadesc = ("SELECT id, nama, format(harga,0) as harga FROM tb_pengiriman ORDER BY nama desc LIMIT $posisi, $batas");
                      $result   = mysqli_query($koneksi, $namadesc);
                    } elseif (isset($_POST['hargaasc'])) {
                      $totalasc = ("SELECT id, nama, format(harga,0) as harga FROM tb_pengiriman ORDER BY harga asc LIMIT $posisi, $batas");
                      $result   = mysqli_query($koneksi, $totalasc);
                    } elseif (isset($_POST['hargadesc'])) {
                      $totaldesc = ("SELECT id, nama, format(harga,0) as harga FROM tb_pengiriman ORDER BY harga desc LIMIT $posisi, $batas");
                      $result   = mysqli_query($koneksi, $totaldesc);
                    } else {
                      $query  = ("SELECT id, nama, format(harga,0) as harga  FROM tb_pengiriman ORDER BY nama asc LIMIT $posisi, $batas");
                      $result = mysqli_query($koneksi, $query);
                    }


                    $no     = 1;


                    while ($row = mysqli_fetch_array($result)) {

                      $PengirimanId = $row['id'];
                      $PengirimanNama = $row['nama'];
                      $PengirimanHarga = $row['harga'];


                    ?>


                      <tr>

                        <td class="align-middle text-center">
                          <span class="text-secondary text-xs font-weight-bold"><?php echo $no++; ?></span>
                        </td>


                        <td class="align-middle text-center">
                          <span class="text-secondary text-xs font-weight-bold"><?php echo $PengirimanNama; ?></span>
                        </td>


                        <td class="align-middle text-center">
                          <span class="text-secondary text-xs font-weight-bold"> <?php echo $PengirimanHarga; ?></span>
                        </td>


                        <td class="align-middle text-center">



                          <button class="btn btn-dark btn-sm px-3 py-1 me-1 mt-3" data-bs-toggle="modal" data-bs-target="#modal-edit-pengiriman<?php echo $row['id']; ?>">Edit</button>
                          <button class="btn btn-dark btn-sm px-3 py-1 me-1 mt-3" data-bs-toggle="modal" data-bs-target="#modal-delete-pengiriman<?php echo $row['id']; ?>">Delete</button>
                        </td>



                      <tr></tr>
                      </tr>


                      <!-- Modal Detail Delete Pengiriman -->
                      <div class="modal fade" id="modal-delete-pengiriman<?= $row['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <!-- <h5 class="modal-title" id="exampleModalLabel">Detail Bukti</h5> -->
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <div class="align-middle text-center">
                                <h4>Anda Yakin Akan Menghapus Data Pengiriman <?php echo $PengirimanNama ?> ?</h4>
                              </div>
                              <form class="yayyay" action="services.php?id=<?= $row['id'] ?>" method="post">
                                <div class="modal-footer">
                                  <div class="align-middle text-center">
                                    <button class="btn btn-danger btn-sm ms-auto" type="submit" name="delete-pengiriman">Delete</button>
                                    <button type="button" class="btn btn-success btn-sm ms-auto" data-bs-dismiss="modal">Close</button>
                                  </div>
                                </div>
                              </form>
                            </div>
                          </div>
                        </div>
                      </div>


                      <!-- End Detail Delete -->


                      <!-- Modal Detail Edit Pengiriman -->
                      <div class="modal fade" id="modal-edit-pengiriman<?= $row['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Edit Form Pengiriman</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <form action="services.php?id=<?= $row['id'] ?>" method="post">

                                <div class="form-group">
                                  <label for="example-text-input" class="form-control-label">Name</label>
                                  <input class="form-control" name="edit-pengiriman-nama" type="text" value="<?= $PengirimanNama ?>" maxlength="30" placeholder="Enter Pengiriman" required />
                                </div>



                                <div class="form-group">
                                  <label for="example-text-input" class="form-control-label">Harga</label>
                                  <input class="form-control" name="edit-pengiriman-harga" type="text" value="<?= $PengirimanHarga ?>" maxlength="30" placeholder="Enter Harga" required />
                                </div>

                                <div class="modal-footer">
                                  <div class="align-middle text-center">
                                    <button type="submit" name="edit-pengiriman" class="btn btn-success btn-sm ms-auto">Edit</button>
                                    <button type="button" class="btn btn-danger btn-sm ms-auto" data-bs-dismiss="modal">Close</button>
                                  </div>
                                </div>
                              </form>
                            </div>
                          </div>
                        </div>
                      </div>

                      <!-- End Detail Edit -->





                    <?php
                      // $no++;
                    }


                    ?>
                  </tbody>
                </table>
              </div>

              <?php
              $ngab = mysqli_query($koneksi, "SELECT * FROM tb_pengiriman ORDER BY nama asc");
              $hitung = $ngab->fetch_all(MYSQLI_ASSOC);
              $jmldata = $hitung[0]['id'];
              $jmlhalaman = ceil($jmldata / $batas);

              $Previous = $halaman - 1;
              $Next = $halaman + 1;

              ?>

              <div class="my-4 ms-2 me-2">
                <nav aria-label="Page navigation example">
                  <ul class="pagination justify-content-end">
                    <li class="page-item">
                      <a class="page-link" href="orders.php?halaman=<?= $Previous; ?>" aria-label="Previous">
                        <i class="fa fa-angle-left"></i>
                        <span class="sr-only">Previous</span>
                      </a>
                    </li>

                    <?php
                    for ($i = 1; $i <= $jmlhalaman; $i++)
                      if ($i != $halaman) {
                        echo "
                       <li class='page-item'><a href=\"orders.php?halaman=$i \" class='page-link'>$i</a></li>
                       ";
                      } else {
                        echo "
                           <li class='page-item'><a class='page-link'>$i</a></li>
                           ";
                      }

                    ?>
                    <li class="page-item">
                      <a class="page-link" href="orders.php?halaman=<?= $Next; ?>" aria-label="Next">
                        <i class="fa fa-angle-right"></i>
                        <span class="sr-only">Next</span>
                      </a>
                    </li>
                  </ul>
                </nav>
              </div>


            </div>
          </div>
        </div>
      </div>




      <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">

              <div class="d-flex align-items-center">
                <h6>Services Pickup table</h6>
                <button class="btn btn-success btn-sm ms-auto" data-bs-toggle="modal" data-bs-target="#modal-tambah-penjemputan">Tambah</button>

              </div>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                        No
                      </th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                        Nama
                      </th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                        Harga
                      </th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                        Actions
                      </th>
                    </tr>
                  </thead>
                  <tbody>

                    <?php

                    $batas = 20;
                    $halaman = @$_GET['halaman'];
                    if (empty($halaman)) {
                      $posisi = 0;
                      $halaman = 1;
                    } else {
                      $posisi = ($halaman - 1) * $batas;
                    }

                    $no = 1 + $posisi;



                    $data = $_POST['data'];

                    if (isset($_POST['caridata'])) {
                      $caringab = ("SELECT id, nama, format(harga,0)  as harga FROM tb_penjemputan WHERE tb_penjemputan.nama LIKE '" . $data . "%' LIMIT $posisi, $batas");
                      $result   = mysqli_query($koneksi, $caringab);
                    } elseif (isset($_POST['namaasc'])) {
                      $namaasc = ("SELECT id, nama, format(harga,0) as harga FROM tb_penjemputan ORDER BY nama asc LIMIT $posisi, $batas");
                      $result   = mysqli_query($koneksi, $namaasc);
                    } elseif (isset($_POST['namadesc'])) {
                      $namadesc = ("SELECT id, nama, format(harga,0) as harga FROM tb_penjemputan ORDER BY nama desc LIMIT $posisi, $batas");
                      $result   = mysqli_query($koneksi, $namadesc);
                    } elseif (isset($_POST['hargaasc'])) {
                      $totalasc = ("SELECT id, nama, format(harga,0) as harga FROM tb_penjemputan ORDER BY harga asc LIMIT $posisi, $batas");
                      $result   = mysqli_query($koneksi, $totalasc);
                    } elseif (isset($_POST['hargadesc'])) {
                      $totaldesc = ("SELECT id, nama, format(harga,0) as harga FROM tb_penjemputan ORDER BY harga desc LIMIT $posisi, $batas");
                      $result   = mysqli_query($koneksi, $totaldesc);
                    } else {
                      $query  = ("SELECT id, nama, format(harga,0) as harga  FROM tb_penjemputan ORDER BY nama asc LIMIT $posisi, $batas");
                      $result = mysqli_query($koneksi, $query);
                    }


                    $no     = 1;


                    while ($row = mysqli_fetch_array($result)) {

                      $PenjemputanId = $row['id'];
                      $PenjemputanNama = $row['nama'];
                      $PenjemputanHarga = $row['harga'];


                    ?>


                      <tr>

                        <td class="align-middle text-center">
                          <span class="text-secondary text-xs font-weight-bold"><?php echo $no++; ?></span>
                        </td>


                        <td class="align-middle text-center">
                          <span class="text-secondary text-xs font-weight-bold"><?php echo $PenjemputanNama; ?></span>
                        </td>


                        <td class="align-middle text-center">
                          <span class="text-secondary text-xs font-weight-bold"> <?php echo $PenjemputanHarga; ?></span>
                        </td>


                        <td class="align-middle text-center">



                          <button class="btn btn-dark btn-sm px-3 py-1 me-1 mt-3" data-bs-toggle="modal" data-bs-target="#modal-edit-penjemputan<?php echo $row['id']; ?>">Edit</button>
                          <button class="btn btn-dark btn-sm px-3 py-1 me-1 mt-3" data-bs-toggle="modal" data-bs-target="#modal-delete-penjemputan<?php echo $row['id']; ?>">Delete</button>
                        </td>



                      <tr></tr>
                      </tr>


                      <!-- Modal Detail Delete -->
                      <div class="modal fade" id="modal-delete-penjemputan<?= $row['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <!-- <h5 class="modal-title" id="exampleModalLabel">Detail Bukti</h5> -->
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <div class="align-middle text-center">
                                <h4>Anda Yakin Akan Menghapus Data Layanan <?php echo $PenjemputanNama ?> ?</h4>
                              </div>
                              <form class="yayyay" action="services.php?id=<?= $row['id'] ?>" method="post">
                                <div class="modal-footer">
                                  <div class="align-middle text-center">
                                    <button class="btn btn-danger btn-sm ms-auto" type="submit" name="delete-penjemputan">Delete</button>
                                    <button type="button" class="btn btn-success btn-sm ms-auto" data-bs-dismiss="modal">Close</button>
                                  </div>
                                </div>
                              </form>
                            </div>
                          </div>
                        </div>
                      </div>


                      <!-- End Detail Delete -->


                      <!-- Modal Detail Edit -->
                      <div class="modal fade" id="modal-edit-penjemputan<?= $row['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Edit Form Penjemputan</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <form action="services.php?id=<?= $row['id'] ?>" method="post">

                                <div class="form-group">
                                  <label for="example-text-input" class="form-control-label">Name</label>
                                  <input class="form-control" name="edit-penjemputan-nama" type="text" value="<?= $PenjemputanNama ?>" maxlength="30" placeholder="Enter Penjemputan" required />
                                </div>



                                <div class="form-group">
                                  <label for="example-text-input" class="form-control-label">Harga</label>
                                  <input class="form-control" name="edit-penjemputan-harga" type="text" value="<?= $PenjemputanHarga ?>" maxlength="30" placeholder="Enter Harga" required />
                                </div>

                                <div class="modal-footer">
                                  <div class="align-middle text-center">
                                    <button type="submit" name="edit-penjemputan" class="btn btn-success btn-sm ms-auto">Edit</button>
                                    <button type="button" class="btn btn-danger btn-sm ms-auto" data-bs-dismiss="modal">Close</button>
                                  </div>
                                </div>
                              </form>
                            </div>
                          </div>
                        </div>
                      </div>

                      <!-- End Detail Edit -->





                    <?php
                      // $no++;
                    }


                    ?>
                  </tbody>
                </table>
              </div>

              <?php
              $ngab = mysqli_query($koneksi, "SELECT * FROM tb_penjemputan ORDER BY nama asc");
              $hitung = $ngab->fetch_all(MYSQLI_ASSOC);
              $jmldata = $hitung[0]['id'];
              $jmlhalaman = ceil($jmldata / $batas);

              $Previous = $halaman - 1;
              $Next = $halaman + 1;

              ?>

              <div class="my-4 ms-2 me-2">
                <nav aria-label="Page navigation example">
                  <ul class="pagination justify-content-end">
                    <li class="page-item">
                      <a class="page-link" href="orders.php?halaman=<?= $Previous; ?>" aria-label="Previous">
                        <i class="fa fa-angle-left"></i>
                        <span class="sr-only">Previous</span>
                      </a>
                    </li>

                    <?php
                    for ($i = 1; $i <= $jmlhalaman; $i++)
                      if ($i != $halaman) {
                        echo "
                       <li class='page-item'><a href=\"orders.php?halaman=$i \" class='page-link'>$i</a></li>
                       ";
                      } else {
                        echo "
                           <li class='page-item'><a class='page-link'>$i</a></li>
                           ";
                      }

                    ?>
                    <li class="page-item">
                      <a class="page-link" href="orders.php?halaman=<?= $Next; ?>" aria-label="Next">
                        <i class="fa fa-angle-right"></i>
                        <span class="sr-only">Next</span>
                      </a>
                    </li>
                  </ul>
                </nav>
              </div>


            </div>
          </div>
        </div>
      </div>





      <!-- Modal Tambah Layanan -->
      <div class="modal fade" id="modal-tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Add Form Layanan</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form action="services.php?id=<?= $row['id'] ?>" method="post">

                <div class="form-group">
                  <label for="example-text-input" class="form-control-label">Name</label>
                  <input class="form-control" name="nama" type="text" value="" maxlength="30" placeholder="Enter Layanan" required />
                </div>



                <div class="form-group">
                  <label for="example-text-input" class="form-control-label">Harga</label>
                  <input class="form-control" name="harga" type="text" value="" maxlength="30" placeholder="Enter Harga" required />
                </div>

                <div class="modal-footer">
                  <div class="align-middle text-center">
                    <button type="submit" name="tambah-layanan" class="btn btn-success btn-sm ms-auto">Tambah</button>
                    <button type="button" class="btn btn-danger btn-sm ms-auto" data-bs-dismiss="modal">Close</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>

      <!-- End Tambah Layanan -->

      <!-- Modal Tambah Pengiriman -->
      <div class="modal fade" id="modal-tambah-pengiriman" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Add Form Pengiriman</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form action="services.php?id=<?= $row['id'] ?>" method="post">

                <div class="form-group">
                  <label for="example-text-input" class="form-control-label">Name</label>
                  <input class="form-control" name="nama-pengiriman" type="text" value="" maxlength="30" placeholder="Enter Pengiriman" required />
                </div>



                <div class="form-group">
                  <label for="example-text-input" class="form-control-label">Harga</label>
                  <input class="form-control" name="harga-pengiriman" type="text" value="" maxlength="30" placeholder="Enter Harga" required />
                </div>

                <div class="modal-footer">
                  <div class="align-middle text-center">
                    <button type="submit" name="tambah-pengiriman" class="btn btn-success btn-sm ms-auto">Tambah</button>
                    <button type="button" class="btn btn-danger btn-sm ms-auto" data-bs-dismiss="modal">Close</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>

      <!-- End Tambah Pengiriman -->

      <!-- Modal Tambah Penjemputan -->
      <div class="modal fade" id="modal-tambah-penjemputan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Add Form Penjemputan</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form action="services.php?id=<?= $row['id'] ?>" method="post">

                <div class="form-group">
                  <label for="example-text-input" class="form-control-label">Name</label>
                  <input class="form-control" name="nama-penjemputan" type="text" value="" maxlength="30" placeholder="Enter Penjemputan" required />
                </div>



                <div class="form-group">
                  <label for="example-text-input" class="form-control-label">Harga</label>
                  <input class="form-control" name="harga-penjemputan" type="text" value="" maxlength="30" placeholder="Enter Harga" required />
                </div>

                <div class="modal-footer">
                  <div class="align-middle text-center">
                    <button type="submit" name="tambah-penjemputan" class="btn btn-success btn-sm ms-auto">Tambah</button>
                    <button type="button" class="btn btn-danger btn-sm ms-auto" data-bs-dismiss="modal">Close</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>

      <!-- End Tambah Penjemputan -->








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
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
</body>

</html>

<!--query layanan -->


<?php

include "../connection/koneksi.php";
error_reporting(0);
$id = $_GET['id'];
$NamaLayananEdit = $_POST['edit-nama'];
$HargaLayananEdit = $_POST['edit-harga'];

if (isset($_POST['edit-layanan'])) {
  $sql = mysqli_query($koneksi, "UPDATE tb_layanan SET nama='$NamaLayananEdit', harga = '$HargaLayananEdit' WHERE id='$id'");

  if ($sql) {
    echo "<script>
            Swal.fire({title: 'Data Berhasil Diubah',text: '',icon: 'success',confirmButtonText: 'OK'
            }).then((result) => {if (result.value)
                {window.location = 'services.php';}
            })</script>";
  } else {
    echo "<script>
          Swal.fire({title: 'Data Gagal Disimpan',text: '',icon: 'error',confirmButtonText: 'OK'
          }).then((result) => {if (result.value)
              {window.location = 'services.php';}
          })</script>";
  }
}

?>


<?php

include "../connection/koneksi.php";
session_start();
error_reporting(0);
if (isset($_POST['tambah-layanan'])) {
  // $orderNama = $_POST['nama'];
  $NamaLayanan = $_POST['nama'];
  $HargaLayanan = $_POST['harga'];

  $query    = "INSERT INTO tb_layanan SET id = '', nama = '$NamaLayanan', harga = '$HargaLayanan'";
  $result   = mysqli_query($koneksi, $query);


  if ($result) {
    echo "<script>
		Swal.fire({title: 'Data Berhasil Disimpan',text: '',icon: 'success',confirmButtonText: 'OK'
		}).then((result) => {if (result.value)
			{window.location = 'services.php';}
		})</script>";
  } else {

    echo "<script>
			Swal.fire({title: 'Data Gagal Disimpan',text: '',icon: 'error',confirmButtonText: 'OK'
			}).then((result) => {if (result.value)
				{window.location = 'services.php';}
			})</script>";
  }
}

?>


<?php
include "../connection/koneksi.php";
error_reporting(0);

if (isset($_POST['delete-layanan'])) {

  if (isset($_POST['delete-layanan'])) {
    $querydel = "DELETE FROM tb_layanan WHERE id = '$_GET[id]' ";
    $result = mysqli_query($koneksi, $querydel);

    echo "<script>
    Swal.fire({title: 'Data Berhasil Dihapus',text: '',icon: 'success',confirmButtonText: 'OK'
    }).then((result) => {if (result.value)
        {window.location = 'services.php';}
    })</script>";
  } else {
    echo "<script>
    Swal.fire({title: 'Data Gagal Dihapus',text: '',icon: 'error',confirmButtonText: 'OK'
    }).then((result) => {if (result.value)
        {window.location = 'services.php';}
    })</script>";
  }
} else {
}


?>

<!-- end query layanan -->


<!--query pengiriman -->

<?php

include "../connection/koneksi.php";
session_start();
error_reporting(0);
if (isset($_POST['tambah-pengiriman'])) {
  // $orderNama = $_POST['nama'];
  $NamaPengiriman = $_POST['nama-pengiriman'];
  $HargaPengiriman = $_POST['harga-pengiriman'];

  $query    = "INSERT INTO tb_pengiriman SET id = '', nama = '$NamaPengiriman', harga = '$HargaPengiriman'";
  $result   = mysqli_query($koneksi, $query);


  if ($result) {
    echo "<script>
		Swal.fire({title: 'Data Berhasil Disimpan',text: '',icon: 'success',confirmButtonText: 'OK'
		}).then((result) => {if (result.value)
			{window.location = 'services.php';}
		})</script>";
  } else {

    echo "<script>
			Swal.fire({title: 'Data Gagal Disimpan',text: '',icon: 'error',confirmButtonText: 'OK'
			}).then((result) => {if (result.value)
				{window.location = 'services.php';}
			})</script>";
  }
}

?>


<?php

include "../connection/koneksi.php";
error_reporting(0);
$id = $_GET['id'];
$NamaPengirimanEdit = $_POST['edit-pengiriman-nama'];
$HargaPengirimanEdit = $_POST['edit-pengiriman-harga'];

if (isset($_POST['edit-pengiriman'])) {
  $sql = mysqli_query($koneksi, "UPDATE tb_pengiriman SET nama='$NamaPengirimanEdit', harga = '$HargaPengirimanEdit' WHERE id='$id'");

  if ($sql) {
    echo "<script>
            Swal.fire({title: 'Data Berhasil Diubah',text: '',icon: 'success',confirmButtonText: 'OK'
            }).then((result) => {if (result.value)
                {window.location = 'services.php';}
            })</script>";
  } else {
    echo "<script>
          Swal.fire({title: 'Data Gagal Disimpan',text: '',icon: 'error',confirmButtonText: 'OK'
          }).then((result) => {if (result.value)
              {window.location = 'services.php';}
          })</script>";
  }
}

?>


<?php
include "../connection/koneksi.php";
error_reporting(0);

if (isset($_POST['delete-pengiriman'])) {

  if (isset($_POST['delete-pengiriman'])) {
    $querydel = "DELETE FROM tb_pengiriman WHERE id = '$_GET[id]' ";
    $result = mysqli_query($koneksi, $querydel);

    echo "<script>
    Swal.fire({title: 'Data Berhasil Dihapus',text: '',icon: 'success',confirmButtonText: 'OK'
    }).then((result) => {if (result.value)
        {window.location = 'services.php';}
    })</script>";
  } else {
    echo "<script>
    Swal.fire({title: 'Data Gagal Dihapus',text: '',icon: 'error',confirmButtonText: 'OK'
    }).then((result) => {if (result.value)
        {window.location = 'services.php';}
    })</script>";
  }
} else {
}


?>

<!-- end query pengiriman -->


<!--query penjemputan -->

<?php

include "../connection/koneksi.php";
session_start();
error_reporting(0);
if (isset($_POST['tambah-penjemputan'])) {
  // $orderNama = $_POST['nama'];
  $NamaPenjemputan = $_POST['nama-penjemputan'];
  $HargaPenjemputan = $_POST['harga-penjemputan'];

  $query    = "INSERT INTO tb_penjemputan SET id = '', nama = '$NamaPenjemputan', harga = '$HargaPenjemputan'";
  $result   = mysqli_query($koneksi, $query);


  if ($result) {
    echo "<script>
		Swal.fire({title: 'Data Berhasil Disimpan',text: '',icon: 'success',confirmButtonText: 'OK'
		}).then((result) => {if (result.value)
			{window.location = 'services.php';}
		})</script>";
  } else {

    echo "<script>
			Swal.fire({title: 'Data Gagal Disimpan',text: '',icon: 'error',confirmButtonText: 'OK'
			}).then((result) => {if (result.value)
				{window.location = 'services.php';}
			})</script>";
  }
}

?>

<?php

include "../connection/koneksi.php";
error_reporting(0);
$id = $_GET['id'];
$NamaPenjemputanEdit = $_POST['edit-penjemputan-nama'];
$HargaPenjemputanEdit = $_POST['edit-penjemputan-harga'];

if (isset($_POST['edit-penjemputan'])) {
  $sql = mysqli_query($koneksi, "UPDATE tb_penjemputan SET nama='$NamaPenjemputanEdit', harga = '$HargaPenjemputanEdit' WHERE id='$id'");

  if ($sql) {
    echo "<script>
            Swal.fire({title: 'Data Berhasil Diubah',text: '',icon: 'success',confirmButtonText: 'OK'
            }).then((result) => {if (result.value)
                {window.location = 'services.php';}
            })</script>";
  } else {
    echo "<script>
          Swal.fire({title: 'Data Gagal Disimpan',text: '',icon: 'error',confirmButtonText: 'OK'
          }).then((result) => {if (result.value)
              {window.location = 'services.php';}
          })</script>";
  }
}

?>


<?php
include "../connection/koneksi.php";
error_reporting(0);

if (isset($_POST['delete-penjemputan'])) {

  if (isset($_POST['delete-penjemputan'])) {
    $querydel = "DELETE FROM tb_penjemputan WHERE id = '$_GET[id]' ";
    $result = mysqli_query($koneksi, $querydel);

    echo "<script>
    Swal.fire({title: 'Data Berhasil Dihapus',text: '',icon: 'success',confirmButtonText: 'OK'
    }).then((result) => {if (result.value)
        {window.location = 'services.php';}
    })</script>";
  } else {
    echo "<script>
    Swal.fire({title: 'Data Gagal Dihapus',text: '',icon: 'error',confirmButtonText: 'OK'
    }).then((result) => {if (result.value)
        {window.location = 'services.php';}
    })</script>";
  }
} else {
}


?>

<!-- end query penjemputan -->