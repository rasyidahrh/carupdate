<?php
require_once('../function/helper.php');
require_once('../function/koneksi.php');
// include "config.php";
require('../fpdf/fpdf.php'); // Include the FPDF library

class PDF extends FPDF
{
    // Header
    function Header()
    {
        // Jarak antara logo dan teks
        $this->Ln(10); // Sesuaikan jarak yang diinginkan
        // Kop surat
        $this->SetFont('Arial', 'B', 15);
        $this->Cell(0, 7, 'PT. ANGKASA PURA SUPPORT', 0, 1, 'C');
        $this->Cell(0, 7, 'CABANG  BANJARMASIN', 0, 1, 'C');


        // Ganti font ke normal
        $this->SetFont('Arial', '', 9);

        // Tambahkan alamat PT
        $this->Cell(0, 5, 'Kantor Cabang: Jl. Kasturi 1 No.73, Landasan Ulin Utara, Kec. Liang Anggang, Kota Banjar Baru, Kalimantan Selatan 70724', 0, 1, 'C');
        $this->Ln(3); // Spasi


        // Garis bawah ganda
        $this->SetLineWidth(0.4); // Mengatur ketebalan garis menjadi 2
        $this->Cell(0, 5, '', 'T'); // Baris pertama
        $this->Ln(0); // Spasi antara garis bawah
        $this->Cell(0, 0, '', 'T'); // Baris kedua
        $this->SetLineWidth(0.2); // Mengembalikan ketebalan garis ke 0.2 setelah garis ganda



        // Logo
        $this->Image('logo2.jpg', 8, 13, 40);
        $this->Ln(4); // Spasi



        $this->SetFont('Arial', 'B', 12);
        $this->Cell(0, 10, 'DATA KELAYAKAN MOBIL OPERASIONAL', 0, 1, 'C');

        // Tanggal
        $this->SetFont('Arial', '', 10);

        $this->Cell(0, 5, '', 0, 1, 'l');
        $this->Cell(0, 5, 'Laporan Ini Berisikan Data Mobil Operasional Berdasarkan Kelayakan Pakai Kendaraannya Pada Kantor Administrasi Angkasa Pura Support', 0, 1, 'C');
        $this->Ln(4); // Spasi
    }

    // Footer
    function Footer()
    {
        // ...

        // Ttd
        // $this->SetY(-90);
        // $this->SetFont('Arial', 'B', 10);
        // $this->Cell(100, 4, 'Banjarmasin, ' . date('d F Y'), 0, 1, 'C');
        // $this->Cell(100, 4, 'PT. Aplikanusa Lintasarta', 0, 1, 'C'); // Mengubah tinggi menjadi 0
        // $this->Cell(100, 4, 'Jabatan', 0, 1, 'C'); // Mengubah tinggi menjadi 0
        // $this->Ln(10); // Mengubah spasi 

        // // Nama dan Jabatan
        // $this->SetY(-60);
        // $this->SetFont('Arial', 'U', 10);
        // $this->Cell(100, 4, 'Suharitomo', 0, 1, 'C');

        // // Tanggal Timestamp
        // $this->SetFont('Arial', '', 8);
        // $this->Cell(100, 4, 'Tanggal: ' . date('d F Y H:i:s'), 0, 1, 'C'); // Menampilkan tanggal timestamp

        // Halaman
        // $this->SetY(-15);
        // $this->SetFont('Arial', 'I', 8);
        // $this->Cell(0, 10, 'Halaman ' . $this->PageNo(), 0, 0, 'C');

    }
}

// Create PDF instance
$pdf = new PDF('L', 'mm', array(300, 350));
$pdf->AddPage();

// Add content to the PDF
$pdf->SetFont('Arial', '', 10);

// Add table headers
$pdf->Cell(10, 10, 'No', 1);
$pdf->Cell(35, 10, 'Plat nomer', 1);
$pdf->Cell(40, 10, 'Merek', 1);
$pdf->Cell(25, 10, 'Tipe Mobil', 1);
$pdf->Cell(20, 10, 'BBM', 1);
$pdf->Cell(20, 10, 'Perbaikan', 1);
$pdf->Cell(160, 10, 'Deskripsi', 1);

$pdf->Cell(25, 10, 'Status', 1);

$pdf->Ln();

// Fetch data and add rows to the PDF
// include 'config.php';
// print_r($_POST);
if ($_POST['status'] == "semua") {
    if ($_POST['tipe'] == "semua" && $_POST['merek'] == "semua") {
        $sql = "select 
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
        join mobil on mobil.id=kelayakan.plat_nomer";
    } else if ($_POST['tipe'] != "semua" && $_POST['merek'] == "semua") {
        $sql = "select 
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
        join mobil on mobil.id=kelayakan.plat_nomer where kelayakan.tipe_mobil='$_POST[tipe]'";
    } else if ($_POST['tipe'] != "semua" && $_POST['merek'] != "semua") {
        $sql = "select 
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
        join mobil on mobil.id=kelayakan.plat_nomer where kelayakan.tipe_mobil='$_POST[tipe]' and kelayakan.merek='$_POST[merek]'";
    } else if ($_POST['tipe'] == "semua" && $_POST['merek'] != "semua") {
        $sql = "select 
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
        join mobil on mobil.id=kelayakan.plat_nomer where kelayakan.merek='$_POST[merek]'";
    }
} else if ($_POST['status'] == "layak") {
    if ($_POST['tipe'] == "semua" && $_POST['merek'] == "semua") {
        $sql = "select 
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
        join mobil on mobil.id=kelayakan.plat_nomer where status='layak'";
    } else if ($_POST['tipe'] != "semua" && $_POST['merek'] == "semua") {
        $sql = "select 
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
        join mobil on mobil.id=kelayakan.plat_nomer where status='layak' and kelayakan.tipe_mobil='$_POST[tipe]'";
    } else if ($_POST['tipe'] != "semua" && $_POST['merek'] != "semua") {
        $sql = "select 
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
        join mobil on mobil.id=kelayakan.plat_nomer where status='layak' and kelayakan.tipe_mobil='$_POST[tipe]' and kelayakan.merek='$_POST[merek]'";
    } else if ($_POST['tipe'] == "semua" && $_POST['merek'] != "semua") {
        $sql = "select 
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
        join mobil on mobil.id=kelayakan.plat_nomer where status='layak' and kelayakan.merek='$_POST[merek]'";
    }
} else {
    if ($_POST['tipe'] == "semua" && $_POST['merek'] == "semua") {
        $sql = "select 
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
        join mobil on mobil.id=kelayakan.plat_nomer where status='pergantian'";
    } else if ($_POST['tipe'] != "semua" && $_POST['merek'] == "semua") {
        $sql = "select 
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
        join mobil on mobil.id=kelayakan.plat_nomer where status='pergantian' and kelayakan.tipe_mobil='$_POST[tipe]'";
    } else if ($_POST['tipe'] != "semua" && $_POST['merek'] != "semua") {
        $sql = "select 
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
        join mobil on mobil.id=kelayakan.plat_nomer where status='pergantian' and kelayakan.tipe_mobil='$_POST[tipe]' and kelayakan.merek='$_POST[merek]'";
    } else if ($_POST['tipe'] == "semua" && $_POST['merek'] != "semua") {
        $sql = "select 
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
        join mobil on mobil.id=kelayakan.plat_nomer where status='pergantian' and keyalakan.merek='$_POST[merek]'";
    }
}
// $sql = "select * from mobil where jumlah=1 and merek='$_POST[merek]'";
$result = $koneksi->query($sql);

if ($result->num_rows > 0) {

    $no = 1;
    while ($row = $result->fetch_assoc()) {
        $pdf->Cell(10, 10, $no++, 1);
        $pdf->Cell(35, 10, $row['plat_nomer'], 1);
        $pdf->Cell(40, 10, $row['merek'], 1);
        $pdf->Cell(25, 10, $row['tipe_mobil'], 1);
        $pdf->Cell(20, 10, $row['BBM'], 1);
        $pdf->Cell(20, 10, $row['perbaikan'], 1);
        $pdf->Cell(160, 10, $row['deskripsi'], 1);
        $pdf->Cell(25, 10, $row['status'], 1);
        $pdf->Ln();
    }
} else {
    $pdf->Cell(245, 10, 'Tidak ada data.', 1, 0, 'C');
}
$pdf->SetY(-60);
$pdf->Cell(0, 5, 'Tanggal        : ' . date('d F Y'), 0, 1, 'L');
$pdf->Cell(0, 5, 'Dicetak oleh : ' . $_SESSION['nama'], 0, 1, 'L');
$pdf->SetY(-60);
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(550, 4, 'Banjarmasin, ' . date('d F Y'), 0, 1, 'C');
$pdf->Cell(550, 4, 'PT. ANGKASA PURA SUPPORT', 0, 1, 'C'); // Mengubah tinggi menjadi 0
$pdf->Cell(550, 4, 'BRANCH MANAJER', 0, 1, 'C'); // Mengubah tinggi menjadi 0
$pdf->Ln(3); // Mengubah spasi 

// Nama dan Jabatan
$pdf->SetY(-30);
$pdf->SetFont('Arial', 'U', 10);
$pdf->Cell(550, 4, 'ALEXANDER DENALOVA', 0, 1, 'C');

// Tanggal Timestamp
$pdf->SetFont('Arial', '', 8);
$pdf->Cell(550, 4, 'Tanggal: ' . date('d F Y H:i:s'), 0, 1, 'C'); // Menampilkan tanggal timestamp


// Output the PDF
$pdf->Output();
