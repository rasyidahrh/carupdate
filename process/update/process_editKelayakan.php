<?php
require_once('../../function/helper.php');
require_once('../../function/koneksi.php');


$id = $_POST['id'];
$perbaikan = $_POST['perbaikan'];
$deskripsi = $_POST['deskripsi'];
$status = $_POST['status'];


$query = mysqli_query($koneksi, "update kelayakan set kerusakan='$perbaikan',deskripsi='$deskripsi',status='$status'  where id='$id'");
// print_r($_POST);
$_SESSION['status'] = 'Data Berhasil Diupdate';
header("location:" . BASE_URL . "/view/kelayakan/kelayakan.php");
