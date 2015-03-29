<?php
/* setting zona waktu */
date_default_timezone_set('Asia/Jakarta');

/* konstruktor halaman pdf sbb :
P = Orientasinya "Potrait"
cm = ukuran halaman dalam satuan centimeter
A4 = Format Halaman

jika ingin mensetting sendiri format halamannya, gunakan array(width, height)
contoh : $this->fpdf->FPDF("P","cm", array(20, 20));
*/

$this->fpdf->FPDF("P","cm",array(21,15));

// kita set marginnya dimulai dari kiri, atas, kanan. jika tidak diset, defaultnya 1 cm
$this->fpdf->SetMargins(1,1,1);
$this->fpdf->SetAutoPageBreak(true , 1);

/* AliasNbPages() merupakan fungsi untuk menampilkan total halaman
di footer, nanti kita akan membuat page number dengan format : number page / total page
*/
$this->fpdf->AliasNbPages();

// AddPage merupakan fungsi untuk membuat halaman baru
$this->fpdf->AddPage();

// Setting Font : String Family, String Style, Font size
$this->fpdf->SetFont('Times','B',12);

/* Kita akan membuat header dari halaman pdf yang kita buat
-------------- Header Halaman dimulai dari baris ini -----------------------------
*/
$this->fpdf->Cell(19,0.7,'Kwitansi',0,0,'C');

// fungsi Ln untuk membuat baris baru
$this->fpdf->Ln();
$this->fpdf->Cell(19,0.7,'Klinik Selamat Sejahtera',0,0,'C');

$this->fpdf->Ln();
/* Setting ulang Font : String Family, String Style, Font size
kenapa disetting ulang ???
jika tidak disetting ulang, ukuran font akan mengikuti settingan sebelumnya.
tetapi karena kita menginginkan settingan untuk penulisan alamatnya berbeda,
maka kita harus mensetting ulang Font nya.
jika diatas settingannya : helvetica, 'B', '12'
khusus untuk penulisan alamat, kita setting : helvetica, '', 10
yang artinya string stylenya normal / tidak Bold dan ukurannya 10
*/
$this->fpdf->SetFont('helvetica','',10);
$this->fpdf->Cell(19,0.5,'Jl. Lingkar Kadugede No. 02 Kuningan - Jawa Barat 45561 Telp : 0233-875847 Fax : 0232-875123',0,0,'C');

$this->fpdf->Ln();
$this->fpdf->Cell(19,0.5,'homepage : www.siklik.co.id email : info@siklik.co.id',0,0,'C');

/* Fungsi Line untuk membuat garis */
$this->fpdf->Line(1,3.5,20,3.5);
$this->fpdf->Line(1,3.55,20,3.55);

/* -------------- Header Halaman selesai ------------------------------------------------*/

$this->fpdf->Ln(1);
$this->fpdf->SetFont('Times','',10);
$this->fpdf->Cell(19,0.1,$records['tanggal_transaksi'],0,0,'R');
$this->fpdf->Ln(0.1);
$this->fpdf->SetFont('Times','B',12);
$this->fpdf->Cell(19,1,'NOTA PEMBAYARAN',0,0,'C');
$this->fpdf->Ln();
$this->fpdf->SetFont('Times','',9);
$this->fpdf->Cell(9.7,0.1,'Transaksi no : ',0,0,'R');
$this->fpdf->Cell(9,0.1,$records['id_transaksi'],0,0,'L');
$this->fpdf->Ln(0.5);
$total1 = 0;
/* setting header table */
$this->fpdf->SetFont('Times','B',14);
$this->fpdf->Cell(2 , 0.7, 'No'           , 1, 'LTR', 'C');
$this->fpdf->Cell(4 , 0.7, 'ID Layanan'           , 1, 'TR', 'C');
$this->fpdf->Cell(8 , 0.7, 'Nama Layanan' , 1, 'TR', 'C');
$this->fpdf->Cell(5 , 0.7, 'Harga' , 1, 'TR', 'C');
$this->fpdf->SetFont('Times','',13);
$no = 1;
$this->fpdf->Ln();
foreach ($records["layanan"] as $layanan) {
  $this->fpdf->Cell(2 , 0.7, $no, 1, 'LTR', 'C');
  $this->fpdf->Cell(4 , 0.7, $layanan["id_layanan"], 1, 'TR', 'C');
  $this->fpdf->Cell(8 , 0.7, $layanan["nama_layanan"], 1, 'TR', 'C');
  $this->fpdf->Cell(5 , 0.7, 'Rp '.number_format($layanan["tarif_layanan"],'0',',','.').',00', 1, 'R', 'C');
  $this->fpdf->Ln();
  $total1+=$layanan["tarif_layanan"];
  $no++;
}
$this->fpdf->SetFont('Times','B',13);
$this->fpdf->Cell(14 , 0.7, 'Total Pembayaran', 1, 'LTR', 'C');
$this->fpdf->Cell(5 , 0.7, 'Rp '.number_format($total1,'0',',','.').',00', 1, 'T', 'C');
$this->fpdf->Ln();
$this->fpdf->Ln(1.5);

/* setting posisi footer 3 cm dari bawah */
$this->fpdf->SetXY(-7,-2.5);
$this->fpdf->SetFont('Times','',10);
$this->fpdf->Cell(4 , 0.1, 'Dokter yang melayani  : '.' '.$records["nama_dokter"], 0, 0, 'L');
$this->fpdf->Ln();
$this->fpdf->SetXY(-7,-2);
$this->fpdf->Cell(7 , 0.1, 'Pasien yang dilayani    : '.' '.$records["nama_pasien"], 0, 0, 'L');
$this->fpdf->Ln();
$this->fpdf->SetY(-1.5);

/* setting font untuk footer */
$this->fpdf->SetFont('Times','',10);

/* setting cell untuk waktu pencetakan */
$this->fpdf->Cell(9.5, 0.1, 'Printed on : '.date('d/m/Y H:i').' | Created by : Gus Hanafi',0,'LR','L');

/* setting cell untuk page number */
//$this->fpdf->Cell(9.5, 0.5, 'Page '.$this->fpdf->PageNo().'/{nb}',0,0,'R');

/* generate pdf jika semua konstruktor, data yang akan ditampilkan, dll sudah selesai */
$this->fpdf->Output("data_pasien.pdf","I");
?>