<?php
require_once('../function/helper.php');
require_once('../function/koneksi.php');
$id = $_GET['id'];

$foto = mysqli_fetch_assoc(mysqli_query($koneksi, "select foto from mobil where id='$id'"));
if (!empty($foto['foto'])) {
    unlink("../img/mobil/" . $foto['foto']);
}
$query = mysqli_query($koneksi, "DELETE FROM mobil WHERE id='$id'");

header("location:" . BASE_URL . "mobil.php");
