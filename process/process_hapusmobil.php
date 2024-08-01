<?php
require_once('../function/helper.php');
require_once('../function/koneksi.php');
$plat_nomer = $_GET['plat_nomer'];

$foto = mysqli_fetch_assoc(mysqli_query($koneksi, "select foto from mobil where plat_nomer='$plat_nomer'"));
if (!empty($foto['foto'])) {
    unlink("../img/mobil/" . $foto['foto']);
}
$query = mysqli_query($koneksi, "DELETE FROM mobil WHERE plat_nomer='$plat_nomer'");

header("location:" . BASE_URL . "mobil.php");
