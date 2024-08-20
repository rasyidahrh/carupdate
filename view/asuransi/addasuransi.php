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

    <title>DATA asuransi</title>

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
                    <a href="<?= BASE_URL ?>/view/asuransi/asuransi.php"><button class="btn btn-danger">Kembali</button></a>
                    <hr>
                    <form action="<?= BASE_URL ?>/process/add/process_tambahasuransi.php" method="post">
                        <div class="mb-3">
                            <label for="" class="form-label">Plat Nomer</label>
                            <select name="plat_nomer" id="plat nomer" class="form-control" require>
                                <option value="">--Pilih--</option>
                                <?phP
                                $sql_mobil = mysqli_query($koneksi, "SELECT * FROM mobil") or die(mysqli_error($koneksi));
                                while ($data_mobil = mysqli_fetch_array($sql_mobil)) {
                                    echo '<option value="' . $data_mobil['plat_nomer'] . '">' . $data_mobil['plat_nomer'] . '</option>
                                     ';
                                }
                                ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Tanggal Awal</label>
                            <input type="date" class="form-control" id="" aria-describedby="" name="tgl_awal" required>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Tanggal Akhir</label>
                            <input type="date" class="form-control" id="" aria-describedby="" name="tgl_akhir" required>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Jenis Asuransi</label>
                            <div class="mb-3">
                                <select name="Jenis" class="form-control" required>
                                    <option value="">--pilih--</option>
                                    <option value="Luar">Luar</option>
                                    <option value="Dalam">Keseluruhan</option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Status Pembayaran</label>
                            <input type="text" class="form-control" id="" aria-describedby="" name="statuspem" required>
                        </div>
                </div>
            </div>
            <input type="submit" value="Simpan" class="btn btn-success">
            </form>
        </div>
        <?php include "../../template/footer.php"; ?>
    </div>
    </div>




</body>

</html>