<?php
include 'function/koneksi.php';
$page = isset($_GET['page']) ? ($_GET['page']) : false;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>DATA perbaikan</title>


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
    $d = mysqli_fetch_array(mysqli_query($koneksi, "select * from perbaikan where id=$id"));

    ?>
    <div id="content-wrapper" class="d-flex flex-column mb-3">
        <div class="container-fluid">
            <hr>
            <a href="perbaikan.php"><button class="btn btn-danger">Kembali</button></a>
            <hr>
            <form action="process/process_editPerbaikan.php" method="post">
                <div class="mb-3">
                    <label for="" class="form-label">Nama Pelapor</label>
                    <input type="hidden" name="id" value="<?= $d['id'] ?>">
                    <input type="text" class="form-control" id="" aria-describedby="" disabled value="<?= $d['nama_pelapor'] ?>">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Nik</label>
                    <input type="text" class="form-control" id="" aria-describedby="" disabled value="<?= $d['Nik'] ?>">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Devisi</label>
                    <input type="text" class="form-control" id="" aria-describedby="" disabled value="<?= $d['Devisi'] ?>">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Plat Nomer</label> <input type="text" class="form-control" id="" aria-describedby="" disabled value="<?= $d['plat_nomer'] ?>">
                    <input type="text" class="form-control" id="" aria-describedby="" disabled value="<?= $d['plat_nomer'] ?>">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Tanggal pengajuan</label>
                    <input type="datetime-local" class="form-control" id="" aria-describedby="" disabled value="<?= $d['tgl'] ?>">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">deskripsi</label>
                    <br>
                    <textarea class="form-control" name="" id="" disabled><?= $d['deskripsi'] ?></textarea>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Status</label>
                    <select name="status" id="" class="form-control" required>
                        <option value="">--pilih--</option>
                        <option value="pending">pending</option>
                        <option value="sudah diperbaiki">sudah diperbaiki</option>
                    </select>
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