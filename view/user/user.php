<?php
require_once('../../function/helper.php');
include '../../function/koneksi.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>APS RESERVASI</title>

    <?php include "../../template/header.php"; ?>

</head>

<body>
    <?php
    include '../../template/sidebar.php';
    include '../../template/topbar.php';
    ?>
    <div id="content-wrapper" class="d-flex flex-column">
        <div class="container-fluid">
            <h1 class="h3 mb-4 text-gray-800">Data User</h1>
            <div class="card">
                <div class="card-body">
                    <hr>
                    <!-- <a href="<?php BASE_URL ?>adduser.php"><button class="btn btn-success">TAMBAH USER</button></a> -->
                    <hr>
                    <div class="">
                        <table id="myTable" class="table table-hover">
                            <thead>
                                <tr>
                                    <th>NO</th>
                                    <th>Role</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                $data = mysqli_query($koneksi, "select * from user");
                                while ($d = mysqli_fetch_array($data)) {
                                ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $d['fk_role']; ?></td>
                                        <?php
                                        if ($_SESSION['fk_role'] == 'admin') {
                                            echo ' <td>
                                         <a href="process/process_hapusUser.php?id=' . $d["id"] . '"><button class="btn btn-danger">Hapus</button></a>
                                         <a href="updateUser.php?id=' . $d["id"] . '"><button class="btn btn-success">Edit</button></a>
                                     </td>';
                                        } else {
                                            echo '';
                                        }
                                        ?>
                                    </tr>
                                <?php
                                };
                                ?>

                        </table>
                        </tbody>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>


    <?php include '../../template/footer.php'; ?>
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>

</body>

</html>