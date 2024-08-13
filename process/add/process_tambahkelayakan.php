<?php

require_once('../../function/helper.php');
require_once('../../function/koneksi.php');



$platnomer = $_POST['plat_nomer'];
$perbaikan = $_POST['perbaikan'];
$deskripsi = $_POST['deskripsi'];
$status = $_POST['status'];


$query = mysqli_query($koneksi, "insert into kelayakan values('','$platnomer','$perbaikan','$deskripsi','$status')");

header("location:" . BASE_URL . "/view/kelayakan/kelayakan.php");
