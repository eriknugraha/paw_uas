<?php
mysql_connect("localhost", "root", "");
mysql_select_db("bugar");

$bagianWhere = "";

if (isset($_GET['harian']))
{
  $tglhari =date_format(date_create($_GET['tglhari1']), 'Y-m-d');
  $jenis_pembayaran = $_GET['jenis_pembayaran'];
 
   if (empty($bagianWhere))
   {
        $bagianWhere .= "tbyr.`no_kwitansi`=tdetailbyr.`no_kwitansi` AND tbyr.`tgl_bayar`='$tglhari' GROUP BY id_layanan ";
   }
   else
   {
        $bagianWhere .= "AND tbyr.`no_kwitansi`=tdetailbyr.`no_kwitansi` AND tbyr.`tgl_bayar`='$tglhari' GROUP BY id_layanan";
   }
}

if (isset($_GET['bulanan']))
{
$tgl1 = date_format(date_create($_GET['tgl1']), 'Y-m-d');
$tgl2 = date_format(date_create($_GET['tgl2']), 'Y-m-d');
$jenis_pembayaran = $_GET['jenis_pembayaran'];
                
   if (empty($bagianWhere))
   {
        $bagianWhere .= "tbyr.`no_kwitansi`=tdetailbyr.`no_kwitansi` and tgl_bayar BETWEEN '$tgl1' and '$tgl2' GROUP BY id_layanan  ";
   }
   else
   {
        $bagianWhere .= "AND tbyr.`no_kwitansi`=tdetailbyr.`no_kwitansi` and tgl_bayar BETWEEN '$tgl1' and '$tgl2' GROUP BY id_layanan";
   }
}







// include "../conn.php";
include "../pdf/class.ezpdf.php"; //class ezpdf yg di panggil
$pdf = new Cezpdf();

//Set margin dan font
$pdf->ezSetCmMargins(3, 3, 3, 3);
$pdf->selectFont('../pdf/fonts/Courier.afm');

//Tampilkan gambar di dokumen PDF
$pdf->addJpegFromFile('sipi.jpg',31,778,90);

//Teks di tengah atas untuk judul header
$pdf->addText(175, 800, 16,'<b>Rekap Data Rekam Medik</b>');
$pdf->addText(135, 780, 14,'<b>Balai Kesehatan Olahraga Masyarakat Bandung</b>');

//Garis atas untuk header
$pdf->line(31, 770, 565, 770);

//Garis bawah untuk footer
$pdf->line(31, 50, 565, 50);

//Teks kiri bawah
$pdf->addText(410,34,8,'Dicetak tgl:' . date( 'd-m-Y, H:i:s'));

// Baca input tanggal yang dikirimkan user

//echo "$mulai $selesai";exit;

//Menampilkan isi dari database
//Koneksi ke database dan tampilkan datanya
                
$tampil = "SELECT *,COUNT(id_layanan) AS total FROM tbyr,tdetailbyr WHERE ".$bagianWhere;
//echo $tampil;exit;
$sql = mysql_query($tampil);

//Menghitung jumlah data pada database				

if ($sql === FALSE) {
    die(mysql_error());
}
//echo $jml;exit;


$i = 1;
$total=0;
while($r = mysql_fetch_array($sql)) {

//Format Menampilkan data di ezPdf
		$data[$i]=array('No'=>$i,
								       
							   		   
						       'Nama Layanan'=>"$r[nama_layanan]",
							 
                 'Jumlah Pengunjung'=>"$r[total]" 
							   

								   );
					$i++;


}

//Tampilkan Dalam Bentuk Table
$pdf->ezTable($data);


				
				

// Penomoran halaman
$pdf->ezStartPageNumbers(564, 20, 8);
$pdf->ezStream();










?>