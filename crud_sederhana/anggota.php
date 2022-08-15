<?php
include "koneksi.php";
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\writer\xlsx;

$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet -> getActiveSheet();

// Set column width
$spreadsheet->getActiveSheet()->getDefaultColumnDimension('B')->setWidth(10);
$spreadsheet->getActiveSheet()->getDefaultColumnDimension('C')->setWidth(15);
$spreadsheet->getActiveSheet()->getDefaultColumnDimension('D')->setWidth(20);
$spreadsheet->getActiveSheet()->getDefaultColumnDimension('E')->setWidth(20);
$spreadsheet->getActiveSheet()->getDefaultColumnDimension('F')->setWidth(20);

// Set header title
$sheet->setCellValue('A1', 'Laporan Data Anggota Perpustakaan');
$sheet->setCellValue('A2', 'No');
$sheet->setCellValue('B2', 'NIM');
$sheet->setCellValue('C2', 'Nama Mahasiswa');
$sheet->setCellValue('D2', 'Email');
$sheet->setCellValue('E2', 'Telp');
$sheet->setCellValue('F2', 'Tanggal Lahir');

$anggota = mysqli_query($koneksi, "SELECT * FROM mahasiswa");
$total = mysqli_num_rows($anggota);
$baris = 3;
$no = 1;

foreach ($anggota as $key => $value) {
    $sheet->setCellValue('A'.$baris, $no);
    $sheet->setCellValue('B'.$baris, $value['nim']);
    $sheet->setCellValue('C'.$baris, $value['nama']);
    $sheet->setCellValue('D'.$baris, $value['email']);
    $sheet->setCellValue('E'.$baris, $value['telp']);
    $sheet->setCellValue('F'.$baris, $value['tanggal_lahir']);

    $no++;
    $baris++;
}
$footer = $baris + 2;
$sheet->setCellValue('A'. $baris, 'Total anggota: '.$total);

$writer = new Xlsx($spreadsheet);
$writer->save('data-anggota.xlsx');

header('location:data-anggota.xlsx');
?>