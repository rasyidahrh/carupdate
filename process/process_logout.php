<?php
require_once('../function/helper.php');
require_once('../function/koneksi.php');


unset($_SESSION['id']);
unset($_SESSION['fk_role']);
unset($_SESSION['Nik']);
unset($_SESSION['nama']);

header("location: " . BASE_URL);
