<?php
mysql_connect("localhost", "root", "");
mysql_select_db("bugar");


// -------------------------------------------------------------Harian----------------------------------------------------------

// include "../conn.php";
include "../pdf/class.ezpdf1a.php"; //class ezpdf yg di panggil
$pdf = new Cezpdf();

//Set margin dan font
$pdf->ezSetCmMargins(3, 3, 3, 3);
$pdf->selectFont('../pdf/fonts/Courier.afm');

//Tampilkan gambar di dokumen PDF
$pdf->addJpegFromFile('sipi.jpg',31,778,90);

//Teks di tengah atas untuk judul header
// $pdf->addText(175, 800, 16,'<b>RENTAL NOVEL</b>');
// $pdf->addText(135, 780, 14,'<b>PT CODING Jl. Tebet Raya 11C-D Jakarta 12810</b>');

//Garis atas untuk header
// $pdf->line(31, 770, 565, 770);

// //Garis bawah untuk footer
// $pdf->line(31, 50, 565, 50);

//Teks kiri bawah
$pdf->addText(1000,34,20,'Dicetak tgl:' . date( 'd-m-Y, H:i:s'));
// 
// Baca input tanggal yang dikirimkan user

//echo "$mulai $selesai";exit;

//Menampilkan isi dari database
//Koneksi ke database dan tampilkan datanya
$kode=$_POST['z'];
$tgl1 = date_format(date_create($_POST['tgl1']), 'Y-m-d');
$tgl2 = date_format(date_create($_POST['tgl2']), 'Y-m-d');
$tampil = "SELECT * FROM tmedis WHERE  Tgl_RM BETWEEN '$tgl1' AND '$tgl2' AND id_member ='$kode'";             

//echo $tampil;exit;
$sql = mysql_query($tampil);

//Menghitung jumlah data pada database				

if ($sql === FALSE) {
    die(mysql_error());
}
//echo $jml;exit;


$i = 1;
while($r = mysql_fetch_array($sql)) {

//Format Menampilkan data di ezPdf
	$data[$i]=array('No'=>$i,
			       'Tanggal'=>"$r[Tgl_RM]",
						     'ppe'=>"$r[ppe]",
							   'fsk'=>"$r[fsk]",
							   'ekg'=>"$r[ekg]",
							   'konsul_gizi'=>"$r[konsul_gizi]",
							   'Rice'=>"$r[rice]",
                 'konsul_umum'=>"$r[konsul_umum]",
                 'bb'=>"$r[bb]",
                 'tb'=>"$r[tb]",
                 'imt'=>"$r[imt]",
                 'lingktbh'=>"$r[lingktbh]",
                 'nadi'=>"$r[nadi]",
                 'tek_drh'=>"$r[tek_drh]",
                 'skinfold'=>"$r[skinfold]",
                 'fat'=>"$r[fat]",
                 'ot_kanan'=>"$r[ot_kanan]",
                 'ot_kiri'=>"$r[ot_kiri]",
                 'ot_leg'=>"$r[ot_leg]",
                 'ot_back'=>"$r[ot_back]",
                 'flex'=>"$r[flex]",
                 'daya_ldk'=>"$r[daya_ldk]",
                 'bangku'=>"$r[bangku]",
                 'sepeda'=>"$r[sepeda]",
                 'treadmill'=>"$r[treadmill]",
                 'rockport'=>"$r[rockport]",
                 'densito'=>"$r[densito]",
                 'spiro'=>"$r[spiro]",
                 'nadi_istirahat'=>"$r[nadi_istirahat]",
                 'pemeriksa'=>"$r[pemeriksa]"
              
				  
				   );
	$i++;

}

//Tampilkan Dalam Bentuk Table
$pdf->ezTable($data);
// $pdf->ezText("\nPeriode: $tgl1 s/d $tgl2");

// // Penomoran halaman
// $pdf->ezStartPageNumbers(564, 20, 8);
$pdf->ezStream();










?>