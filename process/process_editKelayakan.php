<?php
require_once('../function/helper.php');
require_once('../function/koneksi.php');


$id = $_POST['id'];
// $platnomer = $_POST['plat_nomer'];
// $merek = $_POST['merek'];
// $tipe = $_POST['tipe_mobil'];
$konsumsi_bbm = $_POST['konsumsi_bbm'];
$perbaikan = $_POST['perbaikan'];
$deskripsi = $_POST['deskripsi'];
$status = $_POST['status'];


$query = mysqli_query($koneksi, "update kelayakan set BBM='$konsumsi_bbm',perbaikan='$perbaikan',deskripsi='$deskripsi',status='$status'  where id='$id'");
// print_r($_POST);
header("location:" . BASE_URL . "kelayakan.php");
