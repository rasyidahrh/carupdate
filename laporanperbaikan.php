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

    <title>APS RESERVASI </title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css"></script>
    <script scr="https://cdn.datatables.net/2.0.0/css/dataTables.jqueryui.css"></script>

</head>

<body>
    <?php
    //bikin alert
    // $_SESSION['status'] = "berhasil";
    if (isset($_SESSION['status'])) {
        echo '<div class="alert alert-primary alert-dismissible fade show" style="z-index: 1;position:absolute;transform: translate(-50%, -50%);  top: 10%;
        left: 50%;" role="alert">
              <span>' . $_SESSION['status'] . '</span>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>';
    }
    unset($_SESSION['status']);
    $topbar = "template/topbar.php";
    $sidebar = "template/sidebar.php";
    if (file_exists($sidebar) && file_exists($topbar)) {
        include 'template/sidebar.php';
        include 'template/topbar.php';
    } else {
        echo "404";
    }
    ?>

    <!-- <select name="filter" id="">
        <option value=""></option>
    </select> -->
    <div id="content-wrapper" class="d-flex flex-column">
        <div class="container-fluid">
            <h1 class="h3 mb-4 text-gray-800">LAPORAN PERBAIKAN FILTER</h1>
            <div class="card">
                <div class="card-body">

                    <?php
                    if ($_SESSION['fk_role'] == 'admin') {
                        echo '
                  <form action="print/perbaikanByDate.php" method="post">
                    <div class="row">
                        <label for="" class="col-sm-3">Status Perbaikan</label>
                        <label class="col-sm-2 control-label" for="">Dari</label>
                        <label class="col-sm-2 control-label" for="">Sampai</label>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <select name="status" class="form-control col" id="">
                                <option value="semua">semua</option>
                                <option value="pending">Pending</option>
                                <option value="sudah diperbaiki">Sudah diperbaiki</option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <input type="date" value="' . date('Y-m-d') . '" name="tgl1" class="form-control col">
                        </div>
                        <div class="col-md-2">
                            <input type="date" value="' . date('Y-m-d') . '" name="tgl2" class="form-control col">
                        </div>
                    </div>
                    <input class="btn btn-success" type="submit" value="print">
         </form>';
                    } else {
                        echo '';
                    }
                    ?>
                    </script>
                    <center><a href="updateReserv.php;"></a></center>
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
<style>
    .table-container {
        max-height: 800px;
        /* Adjust the maximum height as needed */
        overflow-y: auto;
    }
</style>