<?php
mysql_connect("localhost", "root", "");
mysql_select_db("bugar");

$bagianWhere = "";

if (isset($_POST['harian']))
{
  $tglhari =date_format(date_create($_POST['tglhari1']), 'Y-m-d');
   if (empty($bagianWhere))
   {
        $bagianWhere .= "tgl_kunjugan like '$tglhari'";
   }
   else
   {
        $bagianWhere .= " AND tgl_kunjugan like '$tglhari'";
   }
}

if (isset($_POST['bulanan']))
{
$tgl1 = date_format(date_create($_POST['tgl1']), 'Y-m-d');
$tgl2 = date_format(date_create($_POST['tgl2']), 'Y-m-d');
                
   if (empty($bagianWhere))
   {
        $bagianWhere .= "tgl_kunjugan BETWEEN '$tgl1' and '$tgl2'";
   }
   else
   {
        $bagianWhere .= " AND tgl_kunjugan BETWEEN '$tgl1' and '$tgl2'";
   }
}

if (isset($_POST['jam']))
{
   $jam1 = $_POST['jam1'];
   $jam2 = $_POST['jam2'];
   if (empty($bagianWhere))
   {
        $bagianWhere .= "jam_kunjungan BETWEEN '$jam1' and '$jam2'";
   }
   else
   {
        $bagianWhere .= " AND jam_kunjungan BETWEEN '$jam1' and '$jam2'";
   }
}

if (isset($_POST['umur']))
{
   $umur1 = $_POST['umur1'];
   $umur2 = $_POST['umur2'];
   if (empty($bagianWhere))
   {
        $bagianWhere .= "umur BETWEEN '$umur1' and '$umur2'";
   }
   else
   {
        $bagianWhere .= " AND umur BETWEEN '$umur1' and '$umur2'";
   }
}


if (isset($_POST['sex']))
{
   $sex = $_POST['sex'];
   if (empty($bagianWhere))
   {
        $bagianWhere .= "sex = '$sex'";
   }
   else
   {
        $bagianWhere .= " AND sex = '$sex'";
   }
}

if (isset($_POST['status']))
{
   $status = $_POST['status'];
   if (empty($bagianWhere))
   {
        $bagianWhere .= "status = '$status'";
   }
   else
   {
        $bagianWhere .= " AND status = '$status'";
   }
}
// -------------------------------------------------------------Harian----------------------------------------------------------

// include "../conn.php";
include "../pdf/class.ezpdf.php"; //class ezpdf yg di panggil
$pdf = new Cezpdf();

//Set margin dan font
$pdf->ezSetCmMargins(3, 3, 3, 3);
$pdf->selectFont('../pdf/fonts/Courier.afm');

//Tampilkan gambar di dokumen PDF
$pdf->addJpegFromFile('sipi.jpg',31,778,90);

//Teks di tengah atas untuk judul header
$pdf->addText(175, 800, 16,'<b>LAPORAN KUNJUNGAN</b>');
$pdf->addText(135, 780, 14,'<b></b>');

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
                
$tampil = "SELECT * FROM tfitness WHERE ".$bagianWhere;
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
			       'Tanggal'=>"$r[tgl_kunjugan]",
						       'ID Member'=>"$r[id_member]",
							   'Nama Memberr'=>"$r[nama_member]",
							   'P/L'=>"$r[sex]",
							   'Umur'=>"$r[umur]",
							   'Jam Kunjungan'=>"$r[jam_kunjungan]"
				  
				   );
	$i++;

}

//Tampilkan Dalam Bentuk Table
$pdf->ezTable($data);

$pdf->ezText("\nPeriode: $tglhari");

// Penomoran halaman
$pdf->ezStartPageNumbers(564, 20, 8);
$pdf->ezStream();










?>