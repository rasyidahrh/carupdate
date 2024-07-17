<?php
include 'function/koneksi.php';
$page = isset($_GET['page']) ? ($_GET['page']) : false;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>DATA MOBIL</title>


    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
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
    <?php
    $no = 1;
    $id = $_GET['id'];
    $data = mysqli_fetch_array(mysqli_query($koneksi, "select * from mobil where id=$id"));

    ?>
    <div id="content-wrapper" class="d-flex flex-column mb-3">
        <div class="container-fluid">
            <hr>
            <a href="mobil.php"><button class="btn btn-danger">Kembali</button></a>
            <hr>
            <form action="process/process_editmobil.php" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="" class="form-label">No</label>
                    <!-- id mobil yg digunakan untuk update data -->
                    <input type="hidden" class="form-control" id="" aria-describedby="" name="id" value="<?= $data['id']; ?>" required>
                    <input type="text" class="form-control" id="" aria-describedby="" name="plat_nomer" value="<?= $data['plat_nomer']; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Merek</label>
                    <input type="text" class="form-control" id="" aria-describedby="" name="merek" value="<?= $data['merek']; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Tipe Mobil</label>
                    <input type="text" class="form-control" id="" aria-describedby="" name="tipe_mobil" value="<?= $data['tipe_mobil']; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Warna</label>
                    <input type="text" class="form-control" id="" aria-describedby="" name="warna" value="<?= $data['warna']; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Konsumsi BBM Perminggu</label>
                    <input type="text" class="form-control" id="" aria-describedby="" name="BBM" value="<?= $data['BBM']; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">foto</label>
                    <input type="file" class="form-control" id="" aria-describedby="" name="foto">
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