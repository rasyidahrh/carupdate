<?php
require_once('../../function/helper.php');

include '../../function/koneksi.php';

$page = isset($_GET['page']) ? ($_GET['page']) : false;
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


    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
</head>

<body>
    <?php
    if (isset($_SESSION['status'])) {
        echo '<div class="alert alert-primary alert-dismissible fade show" style="z-index: 1;position:absolute;transform: translate(-50%, -50%);  top: 10%;
        left: 50%;" role="alert">
              <span>' . $_SESSION['status'] . '</span>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>';
    }
    unset($_SESSION['status']);

    include '../../template/sidebar.php';
    include '../../template/topbar.php';
    ?>

    <div id="content-wrapper" class="d-flex flex-column">
        <div class="container-fluid">
            <h1 class="h3 mb-4 text-gray-800">Data Perbaikan</h1>
            <div class="card">
                <div class="card-body">
                    <a href="addperbaikan.php"><button class="btn btn-success">Lapor perbaikan</button></a>
                    <hr>
                    <div class="table-container">
                        <table id="myTable" class="display compact" style="width:100%">
                            <thead>
                                <tr>
                                    <?php
                                    if ($_SESSION['fk_role'] == 'admin') {
                                        echo '<th>Action</th>';
                                    } else {
                                        echo '';
                                    }
                                    ?>
                                    <th>No</th>
                                    <th>Nama Pelapor</th>
                                    <th>Nik</th>
                                    <th>Devisi</th>
                                    <th>Plat Nomer</th>
                                    <th>Tujuan Terakhir</th>
                                    <th>Deskripsi</th>
                                    <th>Status</th>
                                    <th>Tanggal</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                $data = mysqli_query($koneksi, "select * from kerusakan");
                                while ($d = mysqli_fetch_array($data)) {
                                ?>
                                    <tr>
                                        <?php
                                        if ($_SESSION['fk_role'] == 'admin') {
                                            echo ' <td>
                                                <a href="updateperbaikan.php?plat_nomer=' . $d["plat_nomer"] . '"><button class="btn btn-success"><i class="fas fa-fw fa-pen"></i></button></a>
                                                <a href="" data-plat_nomer="' . $d["plat_nomer"] . '" data-toggle="modal" data-target="#exampleModal" <button class="btn btn-danger"> <i class="fas fa-fw fa-trash"></i></a>
                                            </td>';
                                        } else {
                                            echo '';
                                        }
                                        ?>
                                        <td><?= $no++; ?></td>
                                        <td><?= $d['nama_pelapor']; ?></td>
                                        <td><?= $d['Nik']; ?></td>
                                        <td><?= $d['Devisi']; ?></td>
                                        <td><?= $d['plat_nomer']; ?></td>
                                        <td><?= $d['tujuan_terakhir']; ?></td>
                                        <td><?= $d['deskripsi']; ?></td>
                                        <td><?= $d['status']; ?></td>
                                        <td><?= $d['tgl']; ?></td>
                                    </tr>
                                <?php
                                };
                                ?>
                            </tbody>

                        </table>
                        <!-- modals -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Hapus Data Perbaikan</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                        <button type="button" class="btn btn-danger">Hapus</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            $(document).ready(function() {
                // Tangani tombol "Hapus" yang diklik di dalam modal
                $('#exampleModal').on('show.bs.modal', function(event) {
                    var button = $(event.relatedTarget); // Tombol yang memicu modal
                    var id = button.data('id'); // Ambil ID pegawai dari atribut data-id
                    var modal = $(this);
                    modal.find('.modal-body').html('Apakah Anda yakin ingin menghapus data perbaikan dengan ID MOBIL ' + id + '?');
                    // Atur tindakan penghapusan ke URL yang benar
                    modal.find('.btn-danger').attr('data-id', id);
                });

                $('#exampleModal .btn-danger').click(function() {
                    var id = $(this).data('id');
                    // Lakukan tindakan penghapusan sesuai dengan URL yang benar
                    window.location.href = 'process/process_hapusPerbaikan.php?id_perbaikan=' + id;
                });
            });
        </script>


        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
        <script src="js/sb-admin-2.min.js"></script>
        <script>
            $(document).ready(function() {
                $('#myTable').DataTable();
            });
        </script>
</body>

</html>
<style>
    .table-container {
        max-height: 700px;
        /* Adjust the maximum height as needed */
        overflow-y: auto;
    }
</style>