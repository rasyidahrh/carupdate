<?php

require_once('../function/helper.php');
require_once('../function/koneksi.php');



$platnomer = $_POST['plat_nomer'];
$merek = $_POST['merek'];
$tipe = $_POST['tipe_mobil'];
$BBM = $_POST['konsumsi_bbm'];
$perbaikan = $_POST['perbaikan'];
$deskripsi = $_POST['deskripsi'];
$status = $_POST['status'];


$query = mysqli_query($koneksi, "insert into kelayakan values('','$platnomer','$tipe','$merek','$BBM','$perbaikan','$deskripsi','$status')
    ");

header("location:" . BASE_URL . "kelayakan.php");
