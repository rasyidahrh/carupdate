<?php
require_once('../function/helper.php');
require_once('../function/koneksi.php');
// include "config.php";
require('../fpdf/fpdf.php'); // Include the FPDF library
//biki9n if kalau datanya sekian akan men set ttd ke halaman s4lqanjutnya sesuai banyaknya data
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
        $this->Cell(0, 7, 'CABANG BANJARMASIN', 0, 1, 'C');


        // Ganti font ke normal
        $this->SetFont('Arial', '', 9);

        // Tambahkan alamat PT
        $this->Cell(0, 5, 'Kantor Cabang: Jl. Pramuka No.40C Kota Banjarmasin Kalimantan Selatan', 0, 1, 'C');
        $this->Ln(10); // Spasi


        // Garis bawah ganda
        $this->SetLineWidth(0.2); // Mengatur ketebalan garis menjadi 2
        $this->Cell(0, 5, '', 'T'); // Baris pertama
        $this->Ln(1); // Spasi antara garis bawah
        $this->Cell(0, 5, '', 'T'); // Baris kedua
        $this->SetLineWidth(0.2); // Mengembalikan ketebalan garis ke 0.2 setelah garis ganda



        // Logo
        $this->Image('logo2.jpg', 8, 13, 40);
        $this->Ln(4); // Spasi



        $this->SetFont('Arial', 'B', 12);
        $this->Cell(0, 10, 'Laporan Data Pegawai', 0, 1, 'C');

        // Tanggal
        $this->SetFont('Arial', '', 10);

        $this->Cell(0, 5, '', 0, 1, 'l');
        $this->Cell(0, 5, 'Laporan Ini Berisikan Data pegawai Pada Kantor Administrasi Angkasa Pura Support', 0, 1, 'C');
        $this->Ln(4); // Spasi
    }


    // Footer
    function Footer()
    {

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

        $this->SetY(-15);
        $this->SetFont('Arial', 'I', 8);
        $this->Cell(0, 10, 'Halaman ' . $this->PageNo(), 0, 0, 'C');
    }
}

// Create PDF instance
$pdf = new PDF('P', 'mm', 'A4');
$pdf->AddPage();

// Add content to the PDF
$pdf->SetFont('Arial', '', 10);

// Add table headers
$pdf->Cell(10, 10, 'No', 1);
$pdf->Cell(20, 10, 'nik', 1);
$pdf->Cell(35, 10, 'nama', 1);
$pdf->Cell(60, 10, 'devisi', 1);
$pdf->Cell(20, 10, 'jabatan', 1);
$pdf->Cell(30, 10, 'role', 1);
// $pdf->Cell(18, 10, 'password', 1);
$pdf->Ln();

// Fetch data and add rows to the PDF
// include 'config.php';
// print_r($_POST);
if ($_POST['devisi'] == "semua" && $_POST['Jabatan'] == "semua" && $_POST['role'] == "semua") {
    $sql = "select * from pegawai join user on id_nik=Nik";
} else if ($_POST['devisi'] != "semua" && $_POST['Jabatan'] == "semua" && $_POST['role'] == "semua") {
    $sql = "select * from pegawai join user on id_nik=Nik where fk_devisi='$_POST[devisi]'";
} else if ($_POST['devisi'] != "semua" && $_POST['Jabatan'] != "semua" && $_POST['role'] == "semua") {
    $sql = "select * from pegawai join user on id_nik=Nik where fk_devisi='$_POST[devisi]' and Jabatan='$_POST[Jabatan]'";
} else if ($_POST['devisi'] != "semua" && $_POST['Jabatan'] != "semua" && $_POST['role'] != "semua") {
    $sql = "select * from pegawai join user on id_nik=Nik where fk_devisi='$_POST[devisi]' and Jabatan='$_POST[Jabatan]' and fk_role='$_POST[role]'";
} else if ($_POST['devisi'] == "semua" && $_POST['Jabatan'] == "semua" && $_POST['role'] != "semua") {
    $sql = "select * from pegawai join user on id_nik=Nik where fk_role='$_POST[role]'";
} else if ($_POST['devisi'] == "semua" && $_POST['Jabatan'] != "semua" && $_POST['role'] == "semua") {
    $sql = "select * from pegawai join user on id_nik=Nik where Jabatan='$_POST[Jabatan]'";
} else if ($_POST['devisi'] == "semua" && $_POST['Jabatan'] != "semua" && $_POST['role'] != "semua") {
    $sql = "select * from pegawai join user on id_nik=Nik where Jabatan='$_POST[Jabatan]' and fk_role='$_POST[role]'";
} else if ($_POST['devisi'] != "semua" && $_POST['Jabatan'] == "semua" && $_POST['role'] != "semua") {
    $sql = "select * from pegawai join user on id_nik=Nik where fk_devisi='$_POST[devisi]' and fk_role='$_POST[role]'";
}
// $sql = "select * from pegawai join user on id_nik=Nik where Jabatan='$_POST[Jabatan]'";

// TTT
// FTT
// FFT
// FFF
// TTF
// TFT
// TFF
// FTF
$result = $koneksi->query($sql);

if ($result->num_rows > 0) {

    $no = 1;
    while ($row = $result->fetch_assoc()) {
        $pdf->Cell(10, 10, $no++, 1);
        $pdf->Cell(20, 10, $row['id_nik'], 1);
        $pdf->Cell(35, 10, $row['Nama'], 1);
        $pdf->Cell(60, 10, $row['fk_devisi'], 1);
        $pdf->Cell(20, 10, $row['Jabatan'], 1);
        $pdf->Cell(30, 10, $row['fk_role'], 1);
        // $pdf->Cell(18, 10, '-', 1);
        $pdf->Ln();
    }
} else {
    $pdf->Cell(175, 10, 'Tidak ada data.', 1, 0, 'C');
}
$pdf->SetY(-40);
$pdf->Cell(0, 5, 'Tanggal        : ' . date('d F Y'), 0, 1, 'L');
$pdf->Cell(0, 5, 'Dicetak oleh : ' . $_SESSION['nama'], 0, 1, 'L');
$pdf->SetY(-80);
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(320, 4, 'Banjarmasin, ' . date('d F Y'), 0, 1, 'C');
$pdf->Cell(320, 4, 'PT. ANGKASA PURA SUPPORT', 0, 1, 'C'); // Mengubah tinggi menjadi 0
$pdf->Cell(320, 4, 'BRANCH MANAJER', 0, 1, 'C'); // Mengubah tinggi menjadi 0
$pdf->Ln(10); // Mengubah spasi 

// Nama dan Jabatan
$pdf->SetY(-30);
$pdf->SetFont('Arial', 'U', 10);
$pdf->Cell(320, 4, 'ALEXANDER DENALOVA', 0, 1, 'C');

// Tanggal Timestamp
$pdf->SetFont('Arial', '', 8);
$pdf->Cell(320, 4, 'Tanggal: ' . date('d F Y H:i:s'), 0, 1, 'C'); // Menampilkan tanggal timestamp


// Output the PDF
$pdf->Output();
