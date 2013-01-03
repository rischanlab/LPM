<?php
//deklarasi FPDF
//deklarasi FPDF
class PDF extends FPDF {
	function Header() {
		
		$this->Image('./uploads/uin_mini.png',1,1.1);
		$this->SetFont('Arial','b',15);
		$this->Cell(0,1,'KEMENTRIAN AGAMA',0,0,'C');
		$this->Ln(0.5);
		$this->Cell(0,1,'UNIVERSITAS ISLAM NEGERI UIN SUNAN KALIJAGA',0,0,'C');
		$this->Ln(0.5);
		$this->Cell(0,1,'LEMBAGA PENGABDIAN KEPADA MASYARAKAT',0,0,'C');
		$this->Image('./uploads/uin_mini.png',18,1);
		$this->Ln(1.7);
		$this->SetFont('Arial','b',20);
		$this->Cell(0,1,'SERTIFIKAT',0,0,'C');

	}

}
	$pdf=new PDF('P','cm','A4');
	$pdf->Open();
	$pdf->AliasNbPages();
	$pdf->AddPage();
	//setting margin kertas
	$pdf->SetMargins(1.5,1,1.5); 
	$pdf->SetFont('Arial','B',12);
	 
	//membuat kop tabel
	$x=$pdf->GetY(); 
	$pdf->SetY($x+1);
		$pdf->SetFont('Arial','',10);
		$pdf->Cell(0,1,'Nomor	: ' .$mahasiswa->PERIODE,0,0,'C');
		$pdf->SetFont('Arial','b',12);
	
		$pdf->Ln(1);
		$pdf->SetFont('Arial','b',10);
		//$pdf->Cell(0,1,'TANDA TERIMA',0,0,'C');
		$pdf->Ln(1);
		
		$pdf->SetFont('Arial','',10);
		$pdf->Cell(0,1,'Lembaga Pengabdian kepada Masyarakat UIN Sunan Kalijaga Yogyakarta memberikan sertifikat kepada:',0,0,'L');
	
		//$pdf->Cell(0,1,'INDEX KINERJA DOSEN SEMESTER '.$mahasiswa->NO.);
		$pdf->Ln(1);
		
		
		$pdf->Cell(9,1,'Nama ',0,0,'L');
		$pdf->Ln(0);
		$pdf->Cell(8,1,':',0,0,'R');
		$pdf->Cell(23,1,$mahasiswa->NAMA,0,0,'L');
		$pdf->Ln(0.6);
		
		
		$pdf->Cell(0,1,'Tempat, dan Tanggal Lahir ',0,0,'L');
		$pdf->Ln(0);
		$pdf->Cell(8,1,':',0,0,'R');
		$pdf->Cell(23,1,'Temanggung, 14 Januari 1991',0,0,'L');
		$pdf->Ln(0.6);
		
		
		$pdf->Cell(0,1,'Nomor Induk Mahasiswa ',0,0,'L');
		$pdf->Ln(0);
		$pdf->Cell(8,1,':',0,0,'R');
		$pdf->Cell(23,1,$mahasiswa->NIM,0,0,'L');
		$pdf->Ln(0.6);
		
		
		$pdf->Cell(0,1,'Fakultas',0,0,'L');
		$pdf->Ln(0);
		$pdf->Cell(8,1,':',0,0,'R');
		$pdf->Cell(23,1,'RW '.$mahasiswa->FAK,0,0,'L');
		$pdf->Ln(0.6);
		
		
		$pdf->Ln(1);
		
		$pdf->SetFont('Arial','',10);
		$pdf->Cell(0,1,'Yang Telah melaksanakan Kuliah Kerja Nyata (KKN) Integrasi-Interkoneksi Tematik Posdaya Berbasis Masjid',0,0,'L');
	
		//$pdf->Cell(0,1,'INDEX KINERJA DOSEN SEMESTER '.$mahasiswa->NO.);
		$pdf->Ln(1);
		
		$tanggal = date("d/m/Y");
		
		
		
		$pdf->Cell(0,1,'Yogyakarta, '.$tanggal,0,0,'R');
		$pdf->Ln(0.6);
		$pdf->Cell(0,1,'Bidang Sekretariat/Petugas',0,0,'R');
		$pdf->Ln(0.9);
		$pdf->Ln(0.9);
		$pdf->Cell(0,1,'-----------------------------------',0,0,'R');
		$pdf->Ln(0.6);
		
		
		
								

		$pdf->SetFont('Arial','i',9);
		$pdf->Cell(0,1,'Tanda terima ini berfungsi juga :',0,0,'L');
		$pdf->Ln(0.6);
		$pdf->SetFont('Arial','i',9);
		$pdf->Cell(0,1,'1.	Tanda peserta Pembekalan KKN.',0,0,'L');
		$pdf->Ln(0.6);
		$pdf->SetFont('Arial','i',9);
		$pdf->Cell(0,1,'2.	Untuk pengambilan Buku Pedoman KKN.',0,0,'L');
		$pdf->Ln(0.6);
		
		$pdf->SetFont('Arial','i',9);
		$pdf->Cell(0,1,'Print Tanda Bukti ini kemudian di serahkan ke LPM untuk pengambilan Buku Pedoman KKN',0,0,'L');
		$pdf->Ln(0.6);

						
		




$pdf->Output('Bukti Pendaftaran KKN','I'); 

