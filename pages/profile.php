<?php
include "../connection/koneksi.php";
session_start();

if (isset($_SESSION["ses_username"]) == "") {
  header("location: ../login.php");
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
  <title>Profile - Suki Dashboard</title>
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

        <?php

        if ($data_role == '2') {

          echo "

          <li class='nav-item'>
          <a class='nav-link' href='orders.php'>
            <div class='icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center'>
              <i class='ni ni-cart text-warning text-sm opacity-10'></i>
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
          <a class='nav-link active' href='profile.php'>
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
          <a class='nav-link' href='dashboard.php'>
            <div class='icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center'>
              <i class='ni ni-tv-2 text-warning text-sm opacity-10'></i>

            </div>
            <span class='nav-link-text ms-1'>Dashboard</span>
          </a>
        </li>
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
          <a class='nav-link active' href='profile.php'>
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
  <div class="main-content position-relative max-height-vh-100 h-100">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg bg-transparent shadow-none position-absolute px-4 w-100 z-index-2 mt-n11">
      <div class="container-fluid py-1">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 ps-2 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm">
              <a class="text-white opacity-5" href="javascript:;">Pages</a>
            </li>
            <li class="breadcrumb-item text-sm text-white active" aria-current="page">
              Profile
            </li>
          </ol>
          <h6 class="text-white font-weight-bolder ms-2">Profile</h6>
        </nav>
        <div class="collapse navbar-collapse me-md-0 me-sm-4 mt-sm-0 mt-2" id="navbar">
          <div class="ms-md-auto pe-md-3 d-flex align-items-center">
            <div class="input-group">
              <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
              <input type="text" class="form-control" placeholder="Type here..." />
            </div>
          </div>
          <ul class="navbar-nav justify-content-end">
            <li class="nav-item d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-white font-weight-bold px-0">
                <i class="fa fa-user me-sm-1"></i>
                <span class="d-sm-inline d-none">Sign In</span>
              </a>
            </li>
            <li class="nav-item d-xl-none ps-3 pe-0 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-white p-0">
                <a href="javascript:;" class="nav-link text-white p-0" id="iconNavbarSidenav">
                  <div class="sidenav-toggler-inner">
                    <i class="sidenav-toggler-line bg-white"></i>
                    <i class="sidenav-toggler-line bg-white"></i>
                    <i class="sidenav-toggler-line bg-white"></i>
                  </div>
                </a>
              </a>
            </li>
            <li class="nav-item px-3 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-white p-0">
                <i class="fa fa-cog fixed-plugin-button-nav cursor-pointer"></i>
              </a>
            </li>
            <li class="nav-item dropdown pe-2 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-white p-0" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fa fa-bell cursor-pointer"></i>
              </a>
              <ul class="dropdown-menu dropdown-menu-end px-2 py-3 ms-n4" aria-labelledby="dropdownMenuButton">
                <li class="mb-2">
                  <a class="dropdown-item border-radius-md" href="javascript:;">
                    <div class="d-flex py-1">
                      <div class="my-auto">
                        <img src="../assets/img/team-2.jpg" class="avatar avatar-sm me-3" />
                      </div>
                      <div class="d-flex flex-column justify-content-center">
                        <h6 class="text-sm font-weight-normal mb-1">
                          <span class="font-weight-bold">New message</span>
                          from Laur
                        </h6>
                        <p class="text-xs text-secondary mb-0">
                          <i class="fa fa-clock me-1"></i>
                          13 minutes ago
                        </p>
                      </div>
                    </div>
                  </a>
                </li>
                <li class="mb-2">
                  <a class="dropdown-item border-radius-md" href="javascript:;">
                    <div class="d-flex py-1">
                      <div class="my-auto">
                        <img src="../assets/img/small-logos/logo-spotify.svg" class="avatar avatar-sm bg-gradient-dark me-3" />
                      </div>
                      <div class="d-flex flex-column justify-content-center">
                        <h6 class="text-sm font-weight-normal mb-1">
                          <span class="font-weight-bold">New album</span> by
                          Travis Scott
                        </h6>
                        <p class="text-xs text-secondary mb-0">
                          <i class="fa fa-clock me-1"></i>
                          1 day
                        </p>
                      </div>
                    </div>
                  </a>
                </li>
                <li>
                  <a class="dropdown-item border-radius-md" href="javascript:;">
                    <div class="d-flex py-1">
                      <div class="avatar avatar-sm bg-gradient-secondary me-3 my-auto">
                        <svg width="12px" height="12px" viewBox="0 0 43 36" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                          <title>credit-card</title>
                          <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <g transform="translate(-2169.000000, -745.000000)" fill="#FFFFFF" fill-rule="nonzero">
                              <g transform="translate(1716.000000, 291.000000)">
                                <g transform="translate(453.000000, 454.000000)">
                                  <path class="color-background" d="M43,10.7482083 L43,3.58333333 C43,1.60354167 41.3964583,0 39.4166667,0 L3.58333333,0 C1.60354167,0 0,1.60354167 0,3.58333333 L0,10.7482083 L43,10.7482083 Z" opacity="0.593633743"></path>
                                  <path class="color-background" d="M0,16.125 L0,32.25 C0,34.2297917 1.60354167,35.8333333 3.58333333,35.8333333 L39.4166667,35.8333333 C41.3964583,35.8333333 43,34.2297917 43,32.25 L43,16.125 L0,16.125 Z M19.7083333,26.875 L7.16666667,26.875 L7.16666667,23.2916667 L19.7083333,23.2916667 L19.7083333,26.875 Z M35.8333333,26.875 L28.6666667,26.875 L28.6666667,23.2916667 L35.8333333,23.2916667 L35.8333333,26.875 Z"></path>
                                </g>
                              </g>
                            </g>
                          </g>
                        </svg>
                      </div>
                      <div class="d-flex flex-column justify-content-center">
                        <h6 class="text-sm font-weight-normal mb-1">
                          Payment successfully completed
                        </h6>
                        <p class="text-xs text-secondary mb-0">
                          <i class="fa fa-clock me-1"></i>
                          2 days
                        </p>
                      </div>
                    </div>
                  </a>
                </li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- End Navbar -->

    <?php
    error_reporting(1);


    $tampilngab = ("SELECT * FROM tb_user WHERE id = '$data_id' AND role = '$data_role'");
    $result   = mysqli_query($koneksi, $tampilngab);

    while ($row = mysqli_fetch_array($result)) {
      $userUserId   = $row['id'];
      $userName   = $row['nama'];
      $userUserName  = $row['username'];
      $userPassword  = $row['password'];

    ?>


      <div class="card shadow-lg mx-4 card-profile-bottom">
        <div class="card-body p-3">
          <div class="row gx-4">
            <div class="col-auto">
              <!-- <div class="avatar avatar-xl position-relative">
                <img src="../foto/user/<?php echo $userFoto ?>" alt="profile_image" class="w-100 border-radius-lg shadow-sm" />
              </div> -->
            </div>
            <div class="col-auto my-auto">
              <div class="h-100">
                <h5 class="mb-1"> <?php echo $userName ?></h5>

                <?php

                if ($data_role == '1') {

                  echo "
                  <p class='mb-0 font-weight-bold text-sm'>Admin</p>
                  ";
                } else {

                  echo "
                  <p class='mb-0 font-weight-bold text-sm'>User</p>
                  ";
                }

                ?>


              </div>
            </div>
            <div class="col-lg-4 col-md-6 my-sm-auto ms-sm-auto me-sm-0 mx-auto mt-3">
              <div class="nav-wrapper position-relative end-0">

              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="container-fluid py-4">
        <div class="row">
          <div class="col-md-8">
            <div class="card">
              <div class="card-header pb-0">
                <div class="d-flex align-items-center">
                  <p class="mb-0">Edit Profile</p>
                  <button class="btn btn-primary btn-sm ms-auto" data-bs-toggle="modal" data-bs-target="#modal-edit<?php echo $data_id ?>">
                    Change
                  </button>
                </div>
              </div>
              <div class="card-body">
                <!-- <p class="text-uppercase text-sm">User Information</p> -->

                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="example-text-input" class="form-control-label">Nama</label>
                      <input class="form-control" type="text" value="<?php echo $userName ?>" disabled />
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="example-text-input" class="form-control-label">Username</label>
                      <input class="form-control" type="text" value="<?php echo $userUserName ?>" disabled />
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="example-text-input" class="form-control-label">Password</label>
                      <input class="form-control" type="password" value="<?php echo $userPassword ?>" disabled />
                    </div>
                  </div>
                </div>


                <!-- Modal Detail Edit -->
                <div class="modal fade" id="modal-edit<?php echo $data_id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Detail Profile</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <form action="profile.php" method="post">

                          <div class="form-group">
                            <label for="example-text-input" class="form-control-label">Nama</label>
                            <input class="form-control" name="edit-nama" type="text" value="<?= $userName ?>" maxlength="30" placeholder="Enter Nama" required />
                          </div>

                          <div class="form-group">
                            <label for="example-text-input" class="form-control-label">Username</label>
                            <input class="form-control" name="edit-username" type="text" value="<?= $userUserName ?>" maxlength="30" placeholder="Enter Username" required />
                          </div>

                          <div class="form-group">
                            <label for="example-text-input" class="form-control-label">Password</label>
                            <input class="form-control" id="pass" name="edit-password" type="password" value="<?= $userPassword ?>" maxlength="30" placeholder="Enter Username" required />
                          </div>

                          <div class="form-check">
                            <input class="form-check-input" onclick="change()" type="checkbox" value="" id="mybutton">
                            <label class="custom-control-label" for="customCheck1">Show Password</label>
                          </div>


                          <div class="modal-footer">
                            <div class="align-middle text-center">
                              <button type="submit" name="edit-profile" class="btn btn-success btn-sm ms-auto">Edit</button>
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

            }
              ?>



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
          </div>
          <!--   Core JS Files   -->
          <script src="../assets/js/core/popper.min.js"></script>
          <script src="../assets/js/core/bootstrap.min.js"></script>
          <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
          <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
          <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
          <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
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


<?php
include "../connection/koneksi.php";
error_reporting(1);

$editnama = $_POST['edit-nama'];
$editusername = $_POST['edit-username'];
$editpassword = $_POST['edit-password'];



if (isset($_POST['edit-profile'])) {

  $sql = mysqli_query($koneksi, "UPDATE tb_user SET nama='$editnama',username='$editusername',password='$editpassword' WHERE id='$data_id'");
  if ($sql) {

    echo "<script>
    Swal.fire({title: 'Data Berhasil Diubah',text: '',icon: 'success',confirmButtonText: 'OK'
    }).then((result) => {if (result.value)
        {window.location = 'profile.php';}
    })</script>";
  } else {
    echo "<script>
            Swal.fire({title: 'Data Berhasil Diubah',text: '',icon: 'success',confirmButtonText: 'OK'
            }).then((result) => {if (result.value)
                {window.location = 'profile.php';}
            })</script>";
  }
}


?>

<script type="text/javascript">
  function change() {
    var x = document.getElementById('pass').type;

    if (x == 'password') {
      document.getElementById('pass').type = 'text';
      document.getElementById('mybutton').innerHTML;
    } else {
      document.getElementById('pass').type = 'password';
      document.getElementById('mybutton').innerHTML;
    }
  }
</script>