<?php
require_once('function/helper.php');
include 'function/koneksi.php';


$page = isset($_GET['page']) ? ($_GET['page']) : false;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>DATA MOBIL</title>

    <!-- css -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
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
    ?>

    <div id="content-wrapper" class="d-flex flex-column mb-3">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <hr>
                    <a href="<?php BASE_URL ?>mobil.php"><button class="btn btn-danger">Kembali</button></a>
                    <hr>
                    <form action="process/process_tambahmobil.php" method="post" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="" class="form-label">Plat Nomer</label>
                            <input type="text" class="form-control" id="" aria-describedby="" name="plat_nomer" required>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Merek</label>
                            <input type="text" class="form-control" id="" aria-describedby="" name="merek" required>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Tipe Mobil</label>
                            <select name="tipe_mobil" id="tipe_mobil" class="form-control" required>
                                <option value="">--pilih--</option>
                                <option value="MINI BUS">MiniBus</option>
                                <option value="SEDAN">Sedan</option>
                                <option value="BUS">Bus</option>
                                <option value="BOX">Box</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Warna</label>
                            <input type="text" class="form-control" id="" aria-describedby="" name="warna" required>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Konsumsi BBM Perminggu</label>
                            <input type="text" class="form-control" id="" aria-describedby="" name="BBM" required>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Foto</label>
                            <input type="file" class="form-control" id="" aria-describedby="" name="foto" required>
                        </div>
                </div>
            </div>
            <input type="submit" value="Simpan" class="btn btn-success">
            </form>
        </div>
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
        <script src="js/sb-admin-2.min.js"></script>
    </div>
    </div>




</body>

</html>