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

    <title>Tambah data perbaikan</title>

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
            <h1 class="h3 mb-4 text-gray-800">Data Kelayakan</h1>
            <div class="card">
                <div class="card-body">
                    <hr>
                    <a href="<?php BASE_URL ?>kelayakan.php"><button class="btn btn-danger">Kembali</button></a>
                    <hr>
                    <form action="process/process_tambahkelayakan.php" method="post">
                        <div class="mb-3">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Plat Nomer</label>
                            <select name="plat_nomer" id="plat nomer" class="form-control" require>
                                <option value="">--pilih--</option>
                                <?phP
                                $sql_mobil = mysqli_query($koneksi, "SELECT * FROM mobil") or die(mysqli_error($koneksi));
                                while ($data_mobil = mysqli_fetch_array($sql_mobil)) {
                                    echo '<option value="' . $data_mobil['id'] . '">' . $data_mobil['plat_nomer'] . '</option>
                                     ';
                                }
                                ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Merek</label>
                            <select name="merek" id="merek" class="form-control col" require>
                                <option value="">--Pilih--</option>
                                <?php
                                $sql_mobil = mysqli_query($koneksi, "SELECT distinct merek  FROM mobil") or die(mysqli_error($koneksi));
                                while ($data = mysqli_fetch_array($sql_mobil)) {
                                    echo "<option value='" . $data['merek'] . "'>" . $data['merek'] . "</option>";
                                }
                                ?>
                            </select>
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
                            <label for="" class="form-label">konsumsi bbm dalam 1 minggu</label>
                            <input type="text" class="form-control" id="" aria-describedby="" name="konsumsi_bbm" required>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">perbaikan dalam 1 minggu</label>
                            <input type="text" class="form-control" id="" aria-describedby="" name="perbaikan" required>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">deskripsi</label>
                            <textarea class="form-control" name="deskripsi" id="" cols="30" rows="5"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Status</label>
                            <select name="status" id="" class="form-control" required>
                                <option value="">--pilih--</option>
                                <option value="layak">layak</option>
                                <option value="pergantian">pergantian</option>
                            </select>
                        </div>
                </div>
            </div>
            <input type="submit" value="Ajukan" class="btn btn-success">
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