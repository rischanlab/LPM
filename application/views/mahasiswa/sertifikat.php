<?php
//deklarasi FPDF
//deklarasi FPDF
class PDF extends FPDF {
	function Header() {
		
		$this->Image('./uploads/uin_mini.png',1,1.1);
		$this->SetFont('Arial','',15);
		$this->Cell(0,1,'KEMENTRIAN AGAMA',0,0,'C');
		$this->Ln(0.5);
		$this->Cell(0,1,'UNIVERSITAS ISLAM NEGERI UIN SUNAN KALIJAGA',0,0,'C');
		$this->Ln(0.5);
		$this->SetFont('Arial','b',15);
		$this->Cell(0,1,'LEMBAGA PENGABDIAN KEPADA MASYARAKAT',0,0,'C');
		$this->Image('./uploads/uin_mini.png',18,1);
		$this->Ln(1.7);
		$this->Image('./uploads/bismillah.png',8,3);
		$this->Ln(1);
		$this->SetFont('Arial','b',30);
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
	
		$foto=$mahasiswa->PATH_FOTO;
		$pdf->Image('./uploads/foto/'.$foto,2,22,3,4);
		
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
		$pdf->Cell(23,1,$mahasiswa->TTL,0,0,'L');
		$pdf->Ln(0.6);
		
		
		$pdf->Cell(0,1,'Nomor Induk Mahasiswa ',0,0,'L');
		$pdf->Ln(0);
		$pdf->Cell(8,1,':',0,0,'R');
		$pdf->Cell(23,1,$mahasiswa->NIM,0,0,'L');
		$pdf->Ln(0.6);
		
		
		$pdf->Cell(0,1,'Fakultas',0,0,'L');
		$pdf->Ln(0);
		$pdf->Cell(8,1,':',0,0,'R');
		$pdf->Cell(23,1,$mahasiswa->FAK,0,0,'L');
		$pdf->Ln(0.6);
		
		
		$pdf->Ln(1);
		
		$pdf->SetFont('Arial','',10);
		$pdf->Cell(0,1,'Yang Telah melaksanakan Kuliah Kerja Nyata (KKN) Integrasi-Interkoneksi',0,0,'L');
		$pdf->Ln(0.5);
		$pdf->Cell(0,1,'Yang Bertemakan '.$mahasiswa->TEMA_KKN.  ', Periode '.$mahasiswa->PERIODE.', Tahun Akademik '.$mahasiswa->TA.', Angkatan ke- '.$mahasiswa->ANGKATAN.', di:',0,0,'L');
		
		$pdf->Ln(1);
		
		
		$pdf->Cell(9,1,'Lokasi ',0,0,'L');
		$pdf->Ln(0);
		$pdf->Cell(8,1,':',0,0,'R');
		$pdf->Cell(23,1,$mahasiswa->DESA.' '.$mahasiswa->RW,0,0,'L');
		$pdf->Ln(0.6);
		
		
		$pdf->Cell(0,1,'Kecamatan ',0,0,'L');
		$pdf->Ln(0);
		$pdf->Cell(8,1,':',0,0,'R');
		$pdf->Cell(23,1,$mahasiswa->NM_KEC,0,0,'L');
		$pdf->Ln(0.6);
		
		
		$pdf->Cell(0,1,'Kabupaten ',0,0,'L');
		$pdf->Ln(0);
		$pdf->Cell(8,1,':',0,0,'R');
		$pdf->Cell(23,1,$mahasiswa->NM_KAB,0,0,'L');
		$pdf->Ln(0.6);
		
		
		$pdf->Cell(0,1,'Propinsi',0,0,'L');
		$pdf->Ln(0);
		$pdf->Cell(8,1,':',0,0,'R');
		$pdf->Cell(23,1,$mahasiswa->NM_PROP,0,0,'L');
		$pdf->Ln(0.6);
		
		$pdf->Ln(1);
		
		$nilai		=$mahasiswa->NILAI;
		if(($nilai>=85) &&($nilai<=100)){
			$nilai_huruf="A";
			$status_lulus="LULUS";
		}else if(($nilai>=70) && ($nilai<84)){
			$nilai_huruf="B";
			$status_lulus="LULUS";
		}else if(($nilai>=60) && ($nilai<69)){
			$nilai_huruf="C";
			$status_lulus="LULUS";
		}else if(($nilai>=50) && ($nilai<59)){
			$nilai_huruf="D";
			$status_lulus="TIDAK LULUS";
		}else {
			$nilai_huruf="E";
			$status_lulus="TIDAK LULUS";
		}
		
		$pdf->SetFont('Arial','',10);
		$pdf->Cell(0,1,'dari tanggal '.$mahasiswa->TANGGAL_MULAI.' s/d. '.$mahasiswa->TANGGAL_SELESAI.' dan dinyatakan '.$status_lulus.' dengan nilai '.$mahasiswa->NILAI.' ('.$nilai_huruf.'). ',0,0,'L');
		$pdf->Ln(0.5);
		$pdf->Cell(0,1,'Sertifikat ini diberikan sebagai bukti yang bersangkutan telah melaksanakan Kuliah Kerja Nyata (KKN) ',0,0,'L');
		$pdf->Ln(0.5);
		$pdf->Cell(0,1,'dengan status intrakurikuler dan sebagai syarat untuk dapat mengikuti ujian Munaqosyah Skripsi',0,0,'L');
		
		$pdf->Ln(1);
		
		
		
		//'.$mahasiswa->TEMA_KKN.'Periode'.$mahasiswa->PERIODE.'Tahun Akademik'.$mahasiswa->TA.'Angkatan ke- '.$mahasiswa->ANGKATAN
	
		//$pdf->Cell(0,1,'INDEX KINERJA DOSEN SEMESTER '.$mahasiswa->NO.);
		$pdf->Ln(1);
		
		$tanggal = date("d/m/Y");
		
		
		//$pdf->Image('./uploads/uin_mini.png',1,1.1);
		$pdf->Cell(0,4,'Yogyakarta, '.$tanggal,0,0,'R');
		$pdf->Ln(0.6);
		$pdf->Cell(0,4,'Ketua, ',0,0,'R');
		$pdf->Ln(0.9);
		$pdf->Ln(0.9);
		$pdf->Cell(0,5,'-----------------------------------',0,0,'R');
		$pdf->Ln(0.6);
		

$pdf->Output('Sertifikat KKN','I'); 

