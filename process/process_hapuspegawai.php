<?php
require_once('../function/helper.php');
require_once('../function/koneksi.php');

$id_nik = $_GET['id_nik'];


$query = mysqli_query($koneksi, "DELETE FROM pegawai WHERE id_nik='$id_nik'");
$query = mysqli_query($koneksi, "DELETE FROM user WHERE Nik='$id_nik'");

header("location:" . BASE_URL . "pegawai.php");
