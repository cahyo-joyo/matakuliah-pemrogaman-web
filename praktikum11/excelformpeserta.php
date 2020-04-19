<?php
include('koneksi.php');
require 'vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
 
$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();
$sheet->setCellValue('A1', 'No');
$sheet->setCellValue('B1', 'Nama');
$sheet->setCellValue('C1', 'Jenis Kelamin');
$sheet->setCellValue('D1', 'NISN');
$sheet->setCellValue('E1', 'NIK');
$sheet->setCellValue('F1', 'Tempat Lahir');
$sheet->setCellValue('G1', 'Tanggal Lahir');
$sheet->setCellValue('H1', 'No Akta Lahir');
$sheet->setCellValue('I1', 'Agama');
$sheet->setCellValue('J1', 'Kewarganegaraan');
$sheet->setCellValue('K1', 'WNA');
$sheet->setCellValue('L1', 'Berkebutuhan Khusus');
$sheet->setCellValue('M1', 'Alamat Tinggal');
$sheet->setCellValue('N1', 'RT');
$sheet->setCellValue('O1', 'RW');
$sheet->setCellValue('P1', 'Dusun');
$sheet->setCellValue('Q1', 'Kelurahan');
$sheet->setCellValue('R1', 'Kecamatan');
$sheet->setCellValue('S1', 'Kode Pos');
$sheet->setCellValue('T1', 'Lintang');
$sheet->setCellValue('U1', 'Bujur');
$sheet->setCellValue('V1', 'Tempat Tinggal');
$sheet->setCellValue('W1', 'Moda Transportasi');
$sheet->setCellValue('X1', 'No KKS');
$sheet->setCellValue('Y1', 'Anak Ke');
$sheet->setCellValue('Z1', 'Penerima KPS');
$sheet->setCellValue('AA1', 'No KPS');
 
$query = mysqli_query($koneksi,"select * from formpeserta");
$i = 2;
$no = 1;
while($row = mysqli_fetch_array($query))
{
	$sheet->setCellValue('A'.$i, $no++);
	$sheet->setCellValue('B'.$i, $row['nama']);
	$sheet->setCellValue('C'.$i, $row['kelamin']);
	$sheet->setCellValue('D'.$i, $row['nisn']);
	$sheet->setCellValue('E'.$i, $row['nik']);
	$sheet->setCellValue('F'.$i, $row['tempatlhr']);
	$sheet->setCellValue('G'.$i, $row['tanggallhr']);
	$sheet->setCellValue('H'.$i, $row['akta']);
	$sheet->setCellValue('I'.$i, $row['agama']);
	$sheet->setCellValue('J'.$i, $row['kewarganegaraan']);
	$sheet->setCellValue('K'.$i, $row['wna']);
	$sheet->setCellValue('L'.$i, $row['berkebutuhan']);
	$sheet->setCellValue('M'.$i, $row['alamat']);
	$sheet->setCellValue('N'.$i, $row['rt']);
	$sheet->setCellValue('O'.$i, $row['rw']);
	$sheet->setCellValue('P'.$i, $row['dusun']);
	$sheet->setCellValue('Q'.$i, $row['kelurahan']);
	$sheet->setCellValue('R'.$i, $row['kecamatan']);
	$sheet->setCellValue('S'.$i, $row['kodepos']);
	$sheet->setCellValue('T'.$i, $row['lintang']);
	$sheet->setCellValue('U'.$i, $row['bujur']);
	$sheet->setCellValue('V'.$i, $row['tinggal']);
	$sheet->setCellValue('W'.$i, $row['transportasi']);
	$sheet->setCellValue('X'.$i, $row['kks']);
	$sheet->setCellValue('Y'.$i, $row['anak']);
	$sheet->setCellValue('Z'.$i, $row['kps']);
	$sheet->setCellValue('AA'.$i, $row['nokps']);	
	$i++;
}
 
$styleArray = [
			'borders' => [
				'allBorders' => [
					'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
				],
			],
		];
$i = $i - 1;
$sheet->getStyle('A1:AA'.$i)->applyFromArray($styleArray);
 
 
$writer = new Xlsx($spreadsheet);
$writer->save('Report Data Siswa.xlsx');
?>