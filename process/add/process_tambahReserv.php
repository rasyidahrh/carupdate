<?php
// koneksi database
require_once('../../function/helper.php');
require_once('../../function/koneksi.php');


$nik = $_POST['id_nik'];
$tj = $_POST['Tujuan'];
$reserv_pilih = $_POST['status'];
$platnomer = $_POST['plat_nomer'];

$query3 = mysqli_query($koneksi, "SELECT * FROM mobil  WHERE plat_nomer='$plat_nomer'");
$data = mysqli_fetch_assoc($query3);
print_r($data);
$jumlah = $data['jumlah'] - 1;
$waktuOut = $_POST['WaktuOut'];
$kmOut = $_POST['KmOut'];

if ($reserv_pilih == "DALAM") {
    $status = "ACC";
} else {
    $status = "PENDING";
}

$ekstensi_diperbolehkan    = array('png', 'jpg');
$filepath_info = pathinfo($_FILES['fotoout']['name']);
$namaFile = $filepath_info['filename'];
$x = explode('.', $namaFile);

$ekstensi = $filepath_info['extension'];
$ukuran    = $_FILES['fotoout']['size'];
$file_tmp = $_FILES['fotoout']['tmp_name'];
$dir = "../../img/reserv/";

if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
    if ($ukuran < 1044070) {

        $i = 0;

        while (true) {

            $additional_txt = ($i > 0) ? " ({$i})" : "";


            $tempname = $namaFile . $additional_txt . "-out." . $ekstensi;


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

        move_uploaded_file($file_tmp, '../../img/reserv/' . $namaFile);
        // $query = mysqli_query($koneksi,"INSERT INTO upload VALUES(NULL, '$nama')");
        $query = mysqli_query($koneksi, "insert into reserv values('','$nik','$tj','$reserv_pilih','$platnomer','$waktuOut','','$kmOut','$namaFile','','','$status')");
        // $query2 = mysqli_fetch_array(mysqli_query($koneksi, "select * from mobil where plat_nomer=$idmobil"));
        $query2 = mysqli_query($koneksi, "update mobil set jumlah = $jumlah where plat_nomer='$platnomer'");
        if ($query) {
            // echo 'FILE BERHASIL DI UPLOAD';
            $_SESSION['status'] = 'FILE BERHASIL DI UPLOAD';
        } else {
            $_SESSION['status'] = 'GAGAL MENGUPLOAD GAMBAR';
            // echo 'GAGAL MENGUPLOAD GAMBAR';
        }
    } else {
        $_SESSION['status'] = 'UKURAN FILE TERLALU BESAR ATAU NAMA FILE SUDAH DIGUNAKAN';
        // echo 'UKURAN FILE TERLALU BESAR ATAU NAMA FILE SUDAH DIGUNAKAN';
    }
} else {
    $_SESSION['status'] = 'EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN';
    // echo 'EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN';
}

$_SESSION['status'] = 'Data Berhasil ditambahkan';
header("location:" . BASE_URL . "/view/reservasi/reservasi.php");
