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
    <?php
    // include 'function/koneksi.php';
    $no = 1;
    $id_nik = $_GET['id_nik'];
    $data = mysqli_fetch_array(mysqli_query($koneksi, "select * from pegawai join user on id_nik=Nik where id_nik=$id_nik"));
    //print_r($data)
    ?>
    <div id="content-wrapper" class="d-flex flex-column mb-3">
        <div class="container-fluid">
            <hr>
            <a href="pegawai.php"><button class="btn btn-danger">Kembali</button></a>
            <hr>
            <form action="process/process_editpegawai.php" method="post">
                <div class="mb-3">
                    <label for="" class="form-label">Nik</label>
                    <!-- <input type="hidden" class="form-control" id="" aria-describedby=""  name="thisLink"> -->
                    <input type="hidden" class="form-control" id="" aria-describedby="" name="id_nik" value="<?= $data['id_nik']; ?>" required>
                    <input type="text" class="form-control" id="" aria-describedby="" name="id_nik" value="<?= $data['id_nik']; ?>" required disabled>

                    <label for="" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="" aria-describedby="" name="Nama" value="<?= $data['Nama']; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Password</label>
                    <input type="text" class="form-control" id="" aria-describedby="" name="Password" value="<?= $data['Password']; ?>">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Devisi</label>
                    <select name="devisi" id="devisi" class="form-control" required>
                        <option value="">--pilih--</option>
                        <?php
                        include 'function/koneksi.php';
                        $sql_devisi = mysqli_query($koneksi, "SELECT * FROM devisi") or die(mysqli_error($koneksi));
                        // var_dump($data_devisi);
                        while ($data_devisi = mysqli_fetch_array($sql_devisi)) {
                            echo '<option value="' . $data_devisi['id_devisi'] . '">' . $data_devisi['devisi'] . '</option>';
                        }
                        ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Jabatan</label>
                    <select name="Jabatan" id="Jabatan" class="form-control" require>
                        <option value="">--pilih--</option>
                        <option value="Staff">Staff</option>
                        <option value="SPV">SPV</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">ROLE</label>
                    <select name="role" id="role" class="form-control" require>
                        <option value="">--pilih--</option>
                        <?php
                        $sql_role = mysqli_query($koneksi, "SELECT * FROM role") or die(mysqli_error($koneksi));
                        while ($data_role = mysqli_fetch_array($sql_role)) {
                            echo '<option value="' . $data_role['id_role'] . '">' . $data_role['role'] . '</option>';
                        }
                        ?>
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