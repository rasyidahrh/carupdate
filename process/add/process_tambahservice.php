<?php
require_once('../../function/helper.php');
require_once('../../function/koneksi.php');

$plat_nomer = $_POST['plat_nomer'];
$jenis_service = $_POST['jenis_service'];

$query = mysqli_query($koneksi, "insert into service values('','$plat_nomer','$jenis_service')
    ");
$_SESSION['status'] = 'Data Berhasil ditambahkan';

header("location:" . BASE_URL . "/view/service/service.php");
