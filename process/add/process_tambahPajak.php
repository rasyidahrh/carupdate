<?php

require_once('../../function/helper.php');
require_once('../../function/koneksi.php');



$plat_nomer = $_POST['plat_nomer'];
$statuspemba = $_POST['statuspemba'];
// print_r($_POST);
mysqli_query($koneksi, "insert into pajak values('','$plat_nomer','$statuspemba')");
header("location:" . BASE_URL . "/view/pajak/pajak.php");
