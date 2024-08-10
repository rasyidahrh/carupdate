<?php
include '../../function/koneksi.php';
include '../../function/helper.php';
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

    $no = 1;
    $id = $_GET['id'];
    $data = mysqli_fetch_array(mysqli_query($koneksi, "select * from mobil where plat_nomer='$id'"));

    ?>
    <div id="content-wrapper" class="d-flex flex-column mb-3">
        <div class="container-fluid">
            <hr>
            <a href="mobil.php"><button class="btn btn-danger">Kembali</button></a>
            <hr>
            <form action="<?= BASE_URL ?>/process/update/process_editmobil.php" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="" class="form-label">No</label>
                    <!-- id mobil yg digunakan untuk update data -->
                    <input type="hidden" class="form-control" id="" aria-describedby="" name="id" value="<?= $data['plat_nomer']; ?>" required>
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
        <?php include '../../template/footer.php'; ?>
    </div>
    </div>




</body>

</html>