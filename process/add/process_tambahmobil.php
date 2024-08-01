<?php

require_once('../../function/helper.php');
require_once('../../function/koneksi.php');



$platnomer = $_POST['plat_nomer'];
$merek = $_POST['merek'];
$tipe = $_POST['tipe_mobil'];
$warna = $_POST['warna'];
$BBM = $_POST['BBM'];
print_r($_POST);
print_r($_FILES);
$ekstensi_diperbolehkan    = array('png', 'jpg');
$filepath_info = pathinfo($_FILES['foto']['name']);
$namaFile = $filepath_info['filename'];
$x = explode('.', $namaFile);
// $ekstensi = strtolower(end($x));
$ekstensi = $filepath_info['extension'];
$ukuran    = $_FILES['foto']['size'];
$file_tmp = $_FILES['foto']['tmp_name'];
$dir = "../../img/mobil/";
if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
    if ($ukuran < 1044070) {
        // Iteration starting Value
        $i = 0;

        while (true) {
            // Filename additional text
            $additional_txt = ($i > 0) ? " ({$i})" : "";

            // Temporary new filename
            $tempname = $namaFile . $additional_txt . "." . $ekstensi;

            // Cheching Filename Duplicate
            if (is_file($dir . $tempname)) {
                // If has duplicate
                $i++;
            } else {
                // Renew Filename
                $namaFile = $tempname;
                // break the loop
                break;
            }
        }
        move_uploaded_file($file_tmp, '../../img/mobil/' . $namaFile);
        $query = mysqli_query($koneksi, "insert into mobil values('$platnomer','$merek','$tipe','$warna','$BBM','$namaFile',1)");
        if ($query) {
            // echo 'FILE BERHASIL DI UPLOAD';
            $_SESSION['status'] = 'FILE BERHASIL DI UPLOAD';
        } else {
            $_SESSION['status'] = 'GAGAL MENGUPLOAD GAMBAR';
        }
    } else {
        $_SESSION['status'] = 'UKURAN FILE TERLALU BESAR ATAU NAMA FILE SUDAH DIGUNAKAN';
    }
} else {
    $_SESSION['status'] = 'EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN';
}
print_r($_SESSION);
header("location:" . BASE_URL . "/view/mobil/mobil.php");
