<?php
require_once('../../function/helper.php');
require_once('../../function/koneksi.php');


$id = $_POST['id'];
$status = $_POST['status'];

$query = mysqli_query($koneksi, "update kerusakan set status='$status' where id='$id'");

$_SESSION['status'] = 'update berhasil tapi foto/file kosogn';
header("location:" . BASE_URL . "/view/perbaikan/perbaikan.php");
