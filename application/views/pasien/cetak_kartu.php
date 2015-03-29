<?php
/* setting zona waktu */
date_default_timezone_set('Asia/Jakarta');

/* konstruktor halaman pdf sbb :   
   P  = Orientasinya "Potrait"
   cm = ukuran halaman dalam satuan centimeter
   A4 = Format Halaman
    
   jika ingin mensetting sendiri format halamannya, gunakan array(width, height) 
   contoh : $this->fpdf->FPDF("P","cm", array(20, 20)); 
*/

$pdf =new FPDI();
$pdf->addPage('L');

//$pagecount = $pdf->setSourceFile('C:\xampp\htdocs\mppl\system\libraries\kartupasien.pdf');
$pagecount = $pdf->setSourceFile('fpdf\templates\kartupasien.pdf');

$tplIdx = $pdf->importPage(1);
$pdf->SetAutoPageBreak(true,0); 
$pdf->useTemplate($tplIdx); 
$pdf->setMargins(0,0,20);
$pdf->SetFont('Arial','',16);
 $pdf->SetXY(90, 57);
 $pdf->Cell(8  , 1, $pasien["id_pasien"]  , 0, 'LR', 'L');
$pdf->SetXY(90, 68); 
$pdf->Cell(8  , 1, $pasien["nama_pasien"]  , 0, 'LR', 'L');
$pdf->SetXY(90, 78); 
if($pasien["jk_pasien"]=='L')
$jenkel='Laki-laki';
else
$jenkel='Perempuan';
$pdf->Cell(8  , 1, $jenkel  , 0, 'LR', 'L');
$pdf->SetXY(90, 89);
$pdf->Cell(1, 1, $pasien["alamat_pasien"]  , 0, 'LR', 'L');
$pdf->SetXY(90, 100);
$pdf->Cell(8  , 1, $pasien["telp_pasien"]  , 0, 'LR', 'L');
$pdf->Output('kartupasien.pdf', 'I');

?>