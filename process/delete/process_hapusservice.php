<?php
require_once('../../function/helper.php');
require_once('../../function/koneksi.php');

$id = $_GET['id'];


$query = mysqli_query($koneksi, "DELETE FROM service WHERE id='$id'");

header("location:" . BASE_URL . "/view/service/service.php");
