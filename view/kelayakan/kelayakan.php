<?php
include '../../function/koneksi.php';
include '../../function/helper.php';

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
    <?php include "../../template/header.php"; ?>
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
    include '../../template/sidebar.php';
    include '../../template/topbar.php';
    ?>

    <div id="content-wrapper" class="d-flex flex-column">
        <div class="container-fluid">
            <h1 class="h3 mb-4 text-gray-800">Data Kelayakan</h1>
            <div class="card">
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
                                    tipe_mobil,
                                    merek,
                                    BBM,
                                    kerusakan,
                                    deskripsi,
                                    status
                                    from
                                    kelayakan
                                    join mobil on mobil.plat_nomer=kelayakan.plat_nomer                                     ");
                                while ($d = mysqli_fetch_array($data)) {

                                ?>
                                    <tr>
                                        <td>
                                            <a href="updateKelayakan.php?id=<?php echo $d["id"] ?>"><button class="btn btn-success"><i class="fas fa-fw fa-pen"></i></button></a>
                                            <?php
                                            if ($_SESSION['fk_role'] == 'admin') {
                                                echo '<a data-id="' . $d["id"] . '" data-toggle="modal" data-target="#exampleModal" class="btn btn-danger"><i class="fas fa-fw fa-trash"></i></a> </td>';
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
                                        <td><?= $d['kerusakan']; ?></td>
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
                    window.location.href = '<?= BASE_URL ?>/process/delete/process_hapusKelayakan.php?id=' + id;
                });
            });
        </script>
        <?php include '../../template/footer.php'; ?>
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