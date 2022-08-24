<?php
include "koneksi.php";
require "vendor/autoload.php";

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

// Set column width
$spreadsheet->getActiveSheet()->getDefaultColumnDimension('B')->setWidth(10);
$spreadsheet->getActiveSheet()->getDefaultColumnDimension('C')->setWidth(5);
$spreadsheet->getActiveSheet()->getDefaultColumnDimension('D')->setWidth(10);
$spreadsheet->getActiveSheet()->getDefaultColumnDimension('E')->setWidth(5);
$spreadsheet->getActiveSheet()->getDefaultColumnDimension('F')->setWidth(10);
$spreadsheet->getActiveSheet()->getDefaultColumnDimension('G')->setWidth(30);

// Header title
$sheet->setCellValue('A1', 'Laporan Data Anggota Perpustakaan');
$sheet->setCellValue('A2', 'No');
$sheet->setCellValue('B2', 'Kode Anggota');
$sheet->setCellValue('C2', 'Nama Anggota');
$sheet->setCellValue('D2', 'Email');
$sheet->setCellValue('E2', 'Jenis Kelamin');
$sheet->setCellValue('F2', 'Telpon');
$sheet->setCellValue('G2', 'Alamat');

$anggota = mysqli_query($koneksi, "SELECT * FROM anggota");
$total = mysqli_num_rows($anggota);
$baris = 3;
$no = 1;

foreach ($anggota as $key => $value) {
    $sheet->setCellValue('A'.$baris, $no);
    $sheet->setCellValue('B'.$baris, $value['kode_anggota']);
    $sheet->setCellValue('C'.$baris, $value['nama']);
    $sheet->setCellValue('D'.$baris, $value['email']);
    $sheet->setCellValue('E'.$baris, $value['jenis_kelamin']);
    $sheet->setCellValue('F'.$baris, $value['telp']);
    $sheet->setCellValue('G'.$baris, $value['alamat']);

    $no++;
    $baris++;
}
$footer = $baris + 2;
$sheet->setCellValue('A'. $baris, 'Total Anggota: '. $total);

$writer = new Xlsx($spreadsheet);
$writer->save('data-anggota.xlsx');

header('location:data-anggota.xlsx');
?>