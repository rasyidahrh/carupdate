<?php
require_once('../function/helper.php');
require_once('../function/koneksi.php');

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>APS RESERVASI</title>

    <!-- Custom fonts for this template-->
    <?php include "../template/header.php"; ?>

</head>

<body>
    <?php
    include '../template/sidebar.php';
    include '../template/topbar.php';
    // $sidebar = '../template/sidebar.p7hp';
    // $topbar = '../template/topbar.php';
    // if ($_SESSION['fk_role'] !== 'admin') {
    //     // header("location: " . BASE_URL . '/view/dashboard.php?page=user');
    //     // exit();
    // }
    // if (file_exists($sidebar) && file_exists($topbar)) {
    // } else {
    //     echo "404";
    // }
    $mobil = mysqli_query($koneksi, "select count(plat_nomer) from mobil");
    $jumlahMobil = mysqli_fetch_array($mobil)[0];

    $reserv = mysqli_query($koneksi, "select count(id_reserv) from reserv");
    $jumlahreserv = mysqli_fetch_array($reserv)[0];

    $pegawai = mysqli_query($koneksi, "select count(id_nik) from pegawai");
    $jumlahpegawai = mysqli_fetch_array($pegawai)[0];

    $status = mysqli_query($koneksi, "select count(status) from reserv");
    $jumlahstatus = mysqli_fetch_array($status)[0];

    if (isset($_SESSION['status'])) {
        echo '<div class="alert alert-danger alert-dismissible fade show" style="z-index: 1;position:absolute;transform: translate(-50%, -50%);  top: 10%;
         left: 50%;" role="alert">
               <span>' . $_SESSION['status'] . '</span>
               <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                 <span aria-hidden="true">&times;</span>
               </button>
             </div>';
    }
    unset($_SESSION['status']);

    ?>
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        </div>
        <!-- Content Row -->
        <div class="row">
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Jumlah mobil
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jumlahMobil; ?></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-fw fa-car fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    Reservasi</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jumlahreserv; ?></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Pegawai
                                </div>
                                <div class="row no-gutters align-items-center">
                                    <div class="col-auto">
                                        <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?= $jumlahpegawai; ?></div>
                                    </div>

                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-fw fa-user fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                    Status</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jumlahstatus; ?></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-comments fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="../js/sb-admin-2.min.js"></script>
</body>

</html>