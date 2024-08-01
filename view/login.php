<?php
require_once("../function/helper.php");
require_once("../function/koneksi.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?= BASE_URL . '/css/style01.css' ?>">
    <link rel="stylesheet" href="<?= BASE_URL . '/css/sb-admin-2.min.css' ?>">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,500;0,700;0,900;1,400;1,500;1,700&display=swap" rel="stylesheet">
</head>

<body>
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
        <path fill="#344D67" fill-opacity="1" d="M0,192L60,192C120,192,240,192,360,208C480,224,600,256,720,261.3C840,267,960,245,1080,218.7C1200,192,1320,160,1380,144L1440,128L1440,0L1380,0C1320,0,1200,0,1080,0C960,0,840,0,720,0C600,0,480,0,360,0C240,0,120,0,60,0L0,0Z"></path>
    </svg>
    <?php
    if (isset($_SESSION['status'])) {
        echo '<div class="alert alert-danger alert-dismissible fade show" style="z-index: 1;position:absolute;transform: translate(-50%, -50%);  top: 10%;
        left: 50%;" role="alert">
              <span>' . $_SESSION['status'] . '</span>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>';
    }
    unset($_SESSION['status']);
    ?>
    <div class="content">
        <div class="card-login">
            <div class="card-main">
                <div class="card-header">
                    <img src="img/aps.jpg" alt="" width="50" height="50">
                    Angkasa Pura Support
                </div>
                <div class="card-body">
                    <form class="form-login" method="POST" action="<?= BASE_URL . '/process/process_login.php' ?>">
                        <label class="form-label">Nik</label>
                        <input type="Nik" name="Nik" class="form-input">
                        <label class="form-label">Password</label>
                        <input type="Password" name="Password" class="form-input">
                        <button type="submit" class="btn btn-login">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>