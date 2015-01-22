<?php 

/*?><?php
define('FPDF_FONTPATH','font/');
require('fpdf17/fpdf.php');

class PDF extends FPDF
{
	//Load data
	function LoadData($file)
	{
		//Read file lines
		$lines=file($file);
		$data=array();
		foreach($lines as $line)
			$data[]=explode(';',chop($line));
		return $data;
	}
	
	//Simple table
	function BasicTable($header,$data)
	{
		//Header
		foreach($header as $col)
			$this->Cell(40,7,$col,1);
		$this->Ln();
		//Data
		foreach($data as $row)
		{
			foreach($row as $col)
				$this->Cell(40,6,$col,1);
			$this->Ln();
		}
	}
}
?>
<?php */?>

<?php
//require "fpdf/fpdf.php";
	/*$laporan=new FPDF('P','mm','A4');
	$laporan->AddPage();
	$laporan->SetFont('arial','B',12);
	$laporan->Cell(280,10,'Pembuatan File PDF',1,1,'R');
	$laporan->Output();
	$laporan->AddPage();
	$laporan->Cell(280,10,'Pembuatan File PDF ke dua ',1,1,'R');
	*/
	require_once ("fpdf17/fpdf.php");
	include"koneks.php";
	/*$host = "localhost";
	$user = "root";
	$pass = "";
	$dbnm = "dbmahasiswa";
	*/ 
	//$conn = mysql_connect($host, $user, $pass);
	/*if ($conn) {
	$open = mysql_select_db($dbnm);
	if (!$open) {
	die ("Database tidak dapat dibuka karena ".mysql_error());
	}
	} else {
	die ("Server MySQL tidak terhubung karena ".mysql_error());
	}*/
	//akhir koneksi
	 
	#ambil data di tabel dan masukkan ke array
	$query = "SELECT * FROM tb_shiftkerja ORDER BY id_shiftkerja";
	$sql = mysql_query ($query);
	$data = array();
	while ($row = mysql_fetch_assoc($sql)) {
		array_push($data, $row);
	}
	 
	#setting judul laporan dan header tabel
	$judul = "LAPORAN DATA MAHASISWA";
	$header = array(
		array("label"=>"id", "length"=>10, "align"=>"L"),
		array("label"=>"nama_shiftkerja", "length"=>50, "align"=>"L"),
		array("label"=>"keterangan", "length"=>80, "align"=>"L")//,
		//array("label"=>"TGL LAHIR", "length"=>30, "align"=>"L")
	);
	 
	#sertakan library FPDF dan bentuk objek
	
	$pdf = new FPDF();
	$pdf->AddPage();
	 
	#tampilkan judul laporan
	$pdf->SetFont('Arial','B','16');
	$pdf->Cell(0,20, $judul, '0', 1, 'C');
	 
	#buat header tabel
	$pdf->SetFont('Arial','','10');
	$pdf->SetFillColor(255,0,0);
	$pdf->SetTextColor(255);
	$pdf->SetDrawColor(128,0,0);
	foreach ($header as $kolom) {
	$pdf->Cell($kolom['length'], 5, $kolom['label'], 1, '0', $kolom['align'], true);
	}
	$pdf->Ln();
	 
	#tampilkan data tabelnya
	$pdf->SetFillColor(224,235,255);
	$pdf->SetTextColor(0);
	$pdf->SetFont('');
	$fill=false;
	foreach ($data as $baris) {
	$i = 0;
	foreach ($baris as $cell) {
	$pdf->Cell($header[$i]['length'], 5, $cell, 1, '0', $kolom['align'], $fill);
	$i++;
	}
	$fill = !$fill;
	$pdf->Ln();
	}
	 
	#output file PDF
	$pdf->Output();
?>