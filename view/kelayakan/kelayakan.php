<?php
require_once('function/helper.php');

include 'function/koneksi.php';

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

    <title>APS RESERVASI </title>

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
    //bikin alert
    // $_SESSION['status'] = "berhasil";
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
    $topbar = "template/topbar.php";
    $sidebar = "template/sidebar.php";
    if (file_exists($sidebar) && file_exists($topbar)) {
        include 'template/sidebar.php';
        include 'template/topbar.php';
    } else {
        echo "404";
    }
    ?>

    <!-- <select name="filter" id="">
        <option value=""></option>
    </select> -->
    <div id="content-wrapper" class="d-flex flex-column">
        <div class="container-fluid">
            <h1 class="h3 mb-4 text-gray-800">Data Kelayakan</h1>
            <div class="card">
                <!-- <form action="print/reservasiByDate.php" method="post">
                    <label for="">Jenis Reservasi</label>
                    <select name="reservasi" class="form-control col-sm-2" id="">
                        <option value="semua">dalam dan luar</option>
                        <option value="Dalam">dalam</option>
                        <option value="Luar">luar</option>
                    </select>

                    <div class="row">
                        <div class="col-md-3">
                            <label class="col-sm-3 control-label" for="">Dari</label>
                        </div>
                        <div class="col-md-3">
                            <label class="col control-label" for="">Sampai</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <input type="date" value="<?= date('Y-m-d') ?>" name="tgl1" class="form-control col">
                        </div>
                        <div class="col-md-3">
                            <input type="date" value="<?= date('Y-m-d') ?>" name="tgl2" class="form-control col">
                        </div>
                    </div>
                    <input type="submit" value="print">
                </form> -->
                <div class="card-body">
                    <hr>
                    <a href="addKelayakan.php"><button class="btn btn-success">Lapor Kelayakan</button></a>
                    <hr>
                    <div class="table-container">
                        <table id="myTable" class="table table-hover">
                            <thead>
                                <tr>
                                    <th width="150px">AKSI</th>
                                    <th>No</th>
                                    <th>Plat_Nomer</th>
                                    <th>Merek</th>
                                    <th>Tipe</th>
                                    <th>Konsumsi BBM perMinggu</th>
                                    <th>Perbaikan perMinggu</th>
                                    <th>Deskripsi</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                $data = mysqli_query($koneksi, "
                                select 
                                    kelayakan.id,
                                    mobil.plat_nomer,
                                    kelayakan.tipe_mobil,
                                    kelayakan.merek,
                                    kelayakan.BBM,
                                    perbaikan,
                                    deskripsi,
                                    status
                                    from
                                    kelayakan
                                    join mobil on mobil.id=kelayakan.plat_nomer");
                                while ($d = mysqli_fetch_array($data)) {

                                ?>
                                    <tr>
                                        <td>
                                            <a href="updateKelayakan.php?id=<?php echo $d["id"] ?>"><button class="btn btn-success"><i class="fas fa-fw fa-pen"></i></button></a>
                                            <?php
                                            if ($_SESSION['fk_role'] == 'admin') {
                                                echo '
                                        <a href="process/process_hapusKelayakan.php?id=' . $d["id"] . '" data-id="' . $d["id"] . '" data-toggle="modal" data-target="#exampleModal" class="btn btn-danger"><i class="fas fa-fw fa-trash"></i></a> </td>';
                                            } else {
                                                echo '';
                                            }
                                            ?>
                                        </td>
                                        <td><?= $no++; ?></td>
                                        <td><?= $d['plat_nomer']; ?></td>
                                        <td><?= $d['merek']; ?></td>
                                        <td><?= $d['tipe_mobil']; ?></td>
                                        <td><?= $d['BBM']; ?></td>
                                        <td><?= $d['perbaikan']; ?></td>
                                        <td><?= $d['deskripsi']; ?></td>
                                        <td><?= $d['status']; ?></td>
                                    </tr>
                                <?php
                                };
                                ?>
                            </tbody>
                        </table>
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        ...
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary">Save changes</button>
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
                    var idreserv = button.data('id'); // Ambil ID pegawai dari atribut data-id
                    var modal = $(this);
                    modal.find('.modal-body').html('Apakah Anda yakin ingin menghapus data kelayakan dengan ID ' + idreserv + '?');
                    // Atur tindakan penghapusan ke URL yang benar
                    modal.find('.btn-primary').attr('data-id', idreserv);
                });

                $('#exampleModal .btn-primary').click(function() {
                    var id = $(this).data('id');
                    // Lakukan tindakan penghapusan sesuai dengan URL yang benar
                    window.location.href = 'process/process_hapusKelayakan.php?id=' + id;
                });
            });
        </script>
        <center><a href="updateReserv.php;"></a></center>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
        <script src="js/sb-admin-2.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.print.min.js"></script>
        <script>
            $(document).ready(function() {
                $('#myTable').DataTable({

                });
            });
        </script>
</body>

</html>
<style>
    .table-container {
        max-height: 800px;
        /* Adjust the maximum height as needed */
        overflow-y: auto;
    }
</style>