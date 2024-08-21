<?php
require_once('../../function/helper.php');
require_once('../../function/koneksi.php');


$id_devisi = $_POST['id_devisi'];
$devisi = $_POST['devisi'];

$query = mysqli_query($koneksi, "insert into devisi values('$id_devisi','$devisi')
    ");
    $_SESSION['status'] = 'Data Berhasil ditambahkan';

header("location:" . BASE_URL . "/view/devisi/devisi.php");
