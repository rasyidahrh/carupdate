<?php
include 'function/koneksi.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Edit Reservasi</title>

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
    echo $_SESSION['fk_role'];
    ?>
    <div id="wrapper">
        <?php
        include 'function/helper.php';
        $no = 1;
        $id_reserv = $_GET['id_reserv'];
        $data = mysqli_fetch_array(mysqli_query($koneksi, "
        select 
            id_reserv,
            Nama_Peminjam,
            Nik,
            Devisi,
            Jabatan,
            Tujuan,
            Pilih_Reserv,
            reserv.Plat_nomer as id_mobil,
            mobil.plat_nomer as Plat_nomer,
            reserv.Merek as Merek,
            mobil.Merek as Merek,
            mobil.Tipe_Mobil as Tipe_Mobil,
            mobil.Warna as Warna,
            WaktuOut,
            WaktuIn,
            KmOut,
            fotoout,
            KmIn,
            fotoin,
            status
        from 
            reserv 
        join 
            mobil on mobil.id=reserv.Plat_nomer 
        where id_reserv=$id_reserv"));
        if ($_SESSION['fk_role'] == 'user') {
            $_SESSION['disabled'] = "disabled";
            if (!empty($data['KmIn'])) {
                $_SESSION['disabled2'] = "disabled";
            } else {
                $_SESSION['disabled2'] = "";
            }
        } else {
            $_SESSION['disabled2'] = "";
            $_SESSION['disabled'] = "";
        }
        // print_r($data);
        ?>
        <div id="content-wrapper" class="d-flex flex-column mb-3">
            <div class="container-fluid">
                <h1 class="h3 mb-4 text-gray-800">Data Reservasi</h1>

                <hr>
                <form action="process/process_EditReserv.php" method="post" enctype="multipart/form-data">
                    <?php
                    if ($_SESSION['fk_role'] == 'admin') {
                        echo '
                            <div class="mb-3">
                                <label for="" class="form-label">Status</label>
                                <select name="statusPinjam" class="form-control" required>
                                <option value=' . $data['status'] . '>' . $data['status'] . '</option>
                                    <option value="ACC">ACC</option>
                                    <option value="PENDING">PENDING</option>
                                   
                                </select>
                            </div>';
                    }
                    ?>
                    <div class="mb-3">
                        <label for="" class="form-label">Nama Peminjam</label>
                        <!-- <input type="hidden" class="form-control" id="" aria-describedby=""  name="thisLink"> -->
                        <input type="hidden" class="form-control" id="" aria-describedby="" name="id_reserv" value="<?= $data['id_reserv']; ?>" required>
                        <input type="text" class="form-control" <?= $_SESSION['disabled'] ?> id="" aria-describedby="" name="Nama_Peminjam" value="<?= $data['Nama_Peminjam']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Nik</label>
                        <input type="text" class="form-control" disabled id="" aria-describedby="" name="Nik" value="<?= $data['Nik']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Unit Kerja</label>
                        <input type="text" class="form-control" <?= $_SESSION['disabled'] ?> id="" aria-describedby="" name="Devisi" value="<?= $data['Devisi']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Tujuan</label>
                        <input type="text" class="form-control" <?= $_SESSION['disabled'] ?> id="" aria-describedby="" name="Tujuan" value="<?= $data['Tujuan']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Reservasi yang dipilih</label>
                        <input type="text" class="form-control" <?= $_SESSION['disabled'] ?> id="" aria-describedby="" name="Pilih_Reserv" value="<?= $data['Pilih_Reserv']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">No Plat</label>
                        <!-- id_mobil_user digunakan untuk mengubah jumlah mobil untuk user -->
                        <input type="hidden" class="form-control" id="" aria-describedby="" value="<?= $data['id_mobil']; ?>" name="id_mobil_user" required>
                        <br>
                        <select name="Plat_nomer" id="" class="form-control" <?= $_SESSION['disabled'] ?> require>
                            <option value="<?= $data['id_mobil']; ?>"><?= $data['Plat_nomer']; ?></option>
                            <?php
                            $sql_mobil = mysqli_query($koneksi, "SELECT * FROM mobil WHERE jumlah!=0") or die(mysqli_error($koneksi));
                            while ($data_mobil = mysqli_fetch_array($sql_mobil)) {
                                if ($data['id_mobil'] != $data_mobil['id']) {
                                    echo '<option value="' . $data_mobil['id'] . '">' . $data_mobil['plat_nomer'] . '</option>';
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Merek</label>
                        <input type="hidden" class="form-control" id="" aria-describedby="" value="<?= $data['Merek']; ?>" required>
                        <br>
                        <select name="merek" id="" class="form-control" <?= $_SESSION['disabled'] ?> require>
                            <option value="<?= $data['id_mobil']; ?>"><?= $data['Merek']; ?></option>
                            <?php
                            $sql_mobil = mysqli_query($koneksi, "SELECT * FROM mobil WHERE jumlah!=0") or die(mysqli_error($koneksi));
                            while ($data_mobil = mysqli_fetch_array($sql_mobil)) {
                                if ($data['id_mobil'] != $data_mobil['id']) {
                                    echo '<option value="' . $data_mobil['id'] . '">' . $data_mobil['Merek'] . '</option>';
                                }
                            }
                            ?>
                        </select>

                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Tipe</label>
                        <input type="text" class="form-control" <?= $_SESSION['disabled'] ?> id="" aria-describedby="" name="Tipe_Mobil" value="<?= $data['Tipe_Mobil']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Warna</label>
                        <input type="text" class="form-control" <?= $_SESSION['disabled'] ?> id="" aria-describedby="" name="Warna" value="<?= $data['Warna']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Waktu keluar</label>
                        <input type="datetime-local" class="form-control" <?= $_SESSION['disabled'] ?> id="" aria-describedby="" name="WaktuOut" value="<?= $data['WaktuOut']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Foto Keluar</label>
                        <input type="file" class="form-control" <?= $_SESSION['disabled'] ?> id="" aria-describedby="" name="fotoout" value="<?= $data['fotoout']; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Km Keluar</label>
                        <input type="text" class="form-control" <?= $_SESSION['disabled'] ?> id="" aria-describedby="" name="KmOut" value="<?= $data['KmOut']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Waktu Masuk</label>
                        <input type="datetime-local" class="form-control" <?= $_SESSION['disabled2'] ?> id="" aria-describedby="" name="WaktuIn" value="<?= $data['WaktuIn']; ?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label">Km Masuk</label>
                        <input type="text" class="form-control" <?= $_SESSION['disabled2'] ?> id="" aria-describedby="" name="KmIn" value="<?= $data['KmIn']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Foto Masuk</label>
                        <input type="file" class="form-control" <?= $_SESSION['disabled2'] ?> id="" aria-describedby="" name="fotoin" value="<?= $data['fotoin']; ?>">
                    </div>
                    <!-- <input type="hidden" class="form-control" id="" aria-describedby="" name="id_reserv" value="<?= $data['id_reserv']; ?>" required> -->
                    <input type="submit" value="Simpan" class="btn btn-success">
                    <a href="<?= BASE_URL; ?>reservasi.php"><button class="btn btn-danger">Kembali</button></a>
                </form>
            </div>
        </div>
    </div>

    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="js/sb-admin-2.min.js"></script>
</body>

</html>