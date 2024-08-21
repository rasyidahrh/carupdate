<?php
require_once('../../function/helper.php');
require_once('../../function/koneksi.php');


$plat_nomer = $_POST['plat_nomer'];
$tgl_awal = $_POST['tgl_awal'];
$tgl_akhir = $_POST['tgl_akhir'];
$Jenis = $_POST['Jenis'];
$statuspem = $_POST['statuspem'];

$query = mysqli_query($koneksi, "insert into asuransi values('','$plat_nomer','$tgl_awal','$tgl_akhir','$Jenis','$statuspem')
    ");
    $_SESSION['status'] = 'Data Berhasil ditambahkan';

header("location:" . BASE_URL . "/view/asuransi/asuransi.php");
