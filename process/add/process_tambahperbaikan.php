<?php

require_once('../../function/helper.php');
require_once('../../function/koneksi.php');


$nama_pelapor = $_POST['nama_pelapor'];
$Nik = $_POST['id_nik'];
$Devisi = $_POST['devisi'];
$tujuan_terakhir = $_POST['tujuan_terakhir'];
$id_mobil = $_POST['id_mobil'];
$tgl = $_POST['tgl'];
$deskripsi = $_POST['deskripsi'];
$status = $_POST['status'];

// $data = mysqli_query($koneksi, "select plat_nomer from mobil where id='$id_mobil'");
// $plat_nomer = mysqli_fetch_all($data)[0][0];
// print_r(mysqli_fetch_array($data)[0][0]);
$query2 = mysqli_query($koneksi, "insert into kerusakan values('','$id_mobil','$nama_pelapor','$Nik','$Devisi','$tujuan_terakhir','$tgl','$deskripsi','$status')");

header("location:" . BASE_URL . "/view/perbaikan/perbaikan.php");
