<?php
require_once('../../function/helper.php');
include '../../function/koneksi.php';


$page = isset($_GET['page']) ? ($_GET['page']) : false;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>DATA MOBIL</title>

    <?php include "../../template/header.php"; ?>
</head>

<body>
    <?php
    include '../../template/sidebar.php';
    include '../../template/topbar.php';
    ?>

    <div id="content-wrapper" class="d-flex flex-column mb-3">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <a href="<?= BASE_URL ?>/view/mobil/mobil.php"><button class="btn btn-danger">Kembali</button></a>
                    <hr>
                    <form action="<?= BASE_URL ?>/process/add/process_tambahmobil.php" method="post" enctype="multipart/form-data">
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