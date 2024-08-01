<?php
require_once('../../function/helper.php');
require_once('../../function/koneksi.php');


$id = $_POST['id'];
$status = $_POST['status'];

$query = mysqli_query($koneksi, "update perbaikan set status='$status' where id='$id'");

header("location:" . BASE_URL . "perbaikan.php");
