<?php
// koneksi database
require_once('../../function/helper.php');
require_once('../../function/koneksi.php');



$nama = $_POST['Nama_Peminjam'];
$nik = $_POST['id_nik'];
$uk = $_POST['devisi'];
$jb = $_POST['Jabatan'];
$tj = $_POST['Tujuan'];
$reserv_pilih = $_POST['status'];
$idmobil = $_POST['id'];
print_r($idmobil);
// print_r($idmobil);
$query3 = mysqli_query($koneksi, "SELECT * FROM mobil  WHERE plat_nomer='$idmobil'");
$data = mysqli_fetch_assoc($query3);
print_r($data);
$jumlah = $data['jumlah'] - 1;
$idmobil = $_POST['id'];
print_r($idmobil);
// print_r($idmobil);
// $query3 = mysqli_query($koneksi, "SELECT * FROM mobil  WHERE id='$idmobil'");
// $data = mysqli_fetch_assoc($query3);
// $jumlah = $data['jumlah'] - 1;
// print_r($jumlah);
$merek = $_POST['Merek'];
$tipe = $_POST['Tipe'];
$warna = $_POST['Warna'];
// $waktuIn = $_POST['WaktuIn'];
$waktuOut = $_POST['WaktuOut'];
$kmOut = $_POST['KmOut'];
// $fotoout = $_POST['fotoout'];
// $kmIn = $_POST['KmIn'];
// $fotoin = $_POST['fotoin'];
if ($reserv_pilih == "DALAM") {
    $status = "ACC";
} else {
    $status = "PENDING";
}

$ekstensi_diperbolehkan    = array('png', 'jpg');
$filepath_info = pathinfo($_FILES['fotoout']['name']);
$namaFile = $filepath_info['filename'];
$x = explode('.', $namaFile);
// $ekstensi = strtolower(end($x));
$ekstensi = $filepath_info['extension'];
$ukuran    = $_FILES['fotoout']['size'];
$file_tmp = $_FILES['fotoout']['tmp_name'];
$dir = "../../img/reserv/";
// print_r(!is_file($dir.$namaFile.$ekstensi));
// print_r($namaFile.".".$ekstensi);
if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
    if ($ukuran < 1044070) {
        // Iteration starting Value
        $i = 0;

        while (true) {
            // Filename additional text
            $additional_txt = ($i > 0) ? " ({$i})" : "";

            // Temporary new filename
            $tempname = $namaFile . $additional_txt . "-out." . $ekstensi;

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
        print_r($jumlah);

        print_r($jumlah);

        move_uploaded_file($file_tmp, '../../img/reserv/' . $namaFile);
        // $query = mysqli_query($koneksi,"INSERT INTO upload VALUES(NULL, '$nama')");
        $query = mysqli_query($koneksi, "insert into reserv values('','$nama','$nik','$uk','$jb','$tj','$reserv_pilih','$idmobil','$merek','$tipe','$warna','$waktuOut','','$kmOut','$namaFile','','','$status')");
        // $query2 = mysqli_fetch_array(mysqli_query($koneksi, "select * from mobil where plat_nomer=$idmobil"));
        $query2 = mysqli_query($koneksi, "update mobil set jumlah = $jumlah where plat_nomer='$idmobil'");
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


header("location:" . BASE_URL . "/view/reservasi/reservasi.php");
