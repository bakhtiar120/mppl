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

$this->fpdf->FPDF("P","cm","A4");

// kita set marginnya dimulai dari kiri, atas, kanan. jika tidak diset, defaultnya 1 cm
$this->fpdf->SetMargins(1,1,1);


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
$this->fpdf->SetFont('Times','B',12);
$this->fpdf->Cell(19,1,'NOTA PEMBAYARAN',0,0,'C');
$this->fpdf->Ln();
$total1 = 0;
/* setting header table */
$this->fpdf->SetFont('Times','',12);
$this->fpdf->Cell(3 , 0.7, 'ID Transaksi' , 0, 0, 'L');
$this->fpdf->Cell(1 , 0.7, ':' , 0, 0, 'C');
$this->fpdf->Cell(3 , 0.7, $records["id_transaksi"] , 0, 0, 'L');
$this->fpdf->Ln();
$this->fpdf->Cell(3 , 0.7, 'Nama Pasien' , 0, 0, 'L');
$this->fpdf->Cell(1 , 0.7, ':' , 0, 0, 'C');
$this->fpdf->Cell(4, 0.7, $records["nama_pasien"] , 0, 0, 'L');
$this->fpdf->Ln();
$this->fpdf->Cell(3 , 0.7, 'Nama Dokter' , 0, 0, 'L');
$this->fpdf->Cell(1 , 0.7, ':' , 0, 0, 'C');
$this->fpdf->Cell(4, 0.7, $records["nama_dokter"] , 0, 0, 'L');
$this->fpdf->Ln();
$this->fpdf->Cell(3 , 0.7, 'Layanan' , 0, 0, 'L');
$this->fpdf->Cell(1 , 0.7, ':' , 0, 0, 'C');
foreach ($records["layanan"] as $layanan) {
$this->fpdf->Cell(6 , 0.7, $layanan["nama_layanan"], 0, 0, 'L');
$this->fpdf->Cell(4 , 0.7, $layanan["tarif_layanan"], 0, 0, 'L');
$this->fpdf->Ln();
$this->fpdf->Cell(3 , 0.7, '', 0, 0, 'L');
$this->fpdf->Cell(1 , 0.7, '', 0, 0, 'L');
$total1+=$layanan["tarif_layanan"];
}
$this->fpdf->SetFont('Times','B',12);
$this->fpdf->Cell(6 , 0.7, 'Total Pembayaran', 0, 'L', 'L');
$this->fpdf->Cell(4 , 0.7, $total1, 0, 'L', 'L');
/* setting posisi footer 3 cm dari bawah */
$this->fpdf->SetY(-3);

/* setting font untuk footer */
$this->fpdf->SetFont('Times','',10);

/* setting cell untuk waktu pencetakan */
$this->fpdf->Cell(9.5, 0.5, 'Printed on : '.date('d/m/Y H:i').' | Created by : Gus Hanafi',0,'LR','L');

/* setting cell untuk page number */
$this->fpdf->Cell(9.5, 0.5, 'Page '.$this->fpdf->PageNo().'/{nb}',0,0,'R');

/* generate pdf jika semua konstruktor, data yang akan ditampilkan, dll sudah selesai */
$this->fpdf->Output("data_pasien.pdf","I");
?>