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

    <title>DATA PEGAWAI</title>

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
                    <hr>
                    <a href="<?php BASE_URL ?>pegawai.php"><button class="btn btn-danger">Kembali</button></a>
                    <hr>
                    <form action="<?= BASE_URL ?>/process/add/process_tambahpegawai.php" method="post">
                        <div class="mb-3">
                            <label for="" class="form-label">Nik</label>
                            <input type="text" class="form-control" id="" aria-describedby="" name="id_nik" required>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="" aria-describedby="" name="Nama" required>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Password</label>
                            <input type="text" class="form-control" id="" aria-describedby="" name="Password" required>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Devisi</label>
                            <select name="devisi" id="devisi" class="form-control" required>
                                <option value="">--pilih--</option>
                                <?php
                                $sql_devisi = mysqli_query($koneksi, "SELECT * FROM devisi") or die(mysqli_error($koneksi));
                                while ($data_devisi = mysqli_fetch_array($sql_devisi)) {
                                    echo '<option value="' . $data_devisi['id_devisi'] . '">' . $data_devisi['devisi'] . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Role</label>
                            <select name="role" id="role" class="form-control" required>
                                <option value="">--Pilih--</option>
                                <?php
                                include 'function/koneksi.php';
                                $sql_role = mysqli_query($koneksi, "SELECT * FROM role") or die(mysqli_error($koneksi));
                                while ($data_role = mysqli_fetch_array($sql_role)) {
                                    echo '<option value="' . $data_role['id_role'] . '">' . $data_role['role'] . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Jabatan</label>
                            <select name="Jabatan" id="Jabatan" class="form-control" required>
                                <option value="">--pilih--</option>
                                <option value="Staff">Staff</option>
                                <option value="SPV">SPV</option>
                                <option value="Admin">Admin</option>
                            </select>
                        </div>
                        <input type="submit" value="Simpan" class="btn btn-success">
                    </form>
                </div>
                <?php include '../../template/footer.php'; ?>
            </div>
        </div>




</body>

</html>