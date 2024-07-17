<?php
require_once('function/helper.php');

include 'function/koneksi.php';


$page = isset($_GET['page']) ? ($_GET['page']) : false;
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
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>

</head>

<body>
    <?php
    $topbar = "template/topbar.php";
    $sidebar = "template/sidebar.php";
    if (file_exists($sidebar) && file_exists($topbar)) {
        include 'template/sidebar.php';
        include 'template/topbar.php';
    } else {
        echo "404";
    }
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
    <div id="content-wrapper" class="d-flex flex-column">
        <div class="container-fluid">
            <h1 class="h3 mb-4 text-gray-800">Data Pegawai</h1>
            <div class="card">
                <div class="card-body">
                    <!-- <hr>
                    <a href="<?php BASE_URL ?>addpegawai.php"><button class="btn btn-success">Tambah Pegawai</button></a> -->
                    <!-- <a href="print/printPegawai.php"><button class="btn btn-info">Print</button></a> -->
                    <form action="print/filterPegawai.php" method="post">

                        <div class="row">
                            <label for="" class="form-label col-md-3">Devisi</label>
                            <label for="" class="form-label col-md-3">Jabatan</label>
                            <label class="col-md-3 control-label" for="">Role</label>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <select name="devisi" id="devisi" class="form-control col-md-12" required>
                                    <option value="semua">semua</option>
                                    <?php
                                    $sql_devisi = mysqli_query($koneksi, "SELECT * FROM devisi") or die(mysqli_error($koneksi));
                                    while ($data_devisi = mysqli_fetch_array($sql_devisi)) {
                                        echo '<option value="' . $data_devisi['id_devisi'] . '">' . $data_devisi['devisi'] . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <select name="Jabatan" id="Jabatan" class="form-control" required>
                                    <option value="semua">semua</option>
                                    <option value="Staff">Staff</option>
                                    <option value="SPV">SPV</option>
                                    <option value="Admin">Admin</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <select name="role" id="role" class="form-control" required>
                                    <option value="semua">semua</option>
                                    <?php
                                    include 'function/koneksi.php';
                                    $sql_role = mysqli_query($koneksi, "SELECT * FROM role") or die(mysqli_error($koneksi));
                                    while ($data_role = mysqli_fetch_array($sql_role)) {
                                        echo '<option value="' . $data_role['id_role'] . '">' . $data_role['role'] . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <input class="btn btn-success mt-3" type="submit" value="print">
                    </form>
                    <hr>
                </div>
            </div>
        </div>
    </div>
    </div>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="js/sb-admin-2.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.print.min.js"></script>
</body>

</html>

</body>

</html>