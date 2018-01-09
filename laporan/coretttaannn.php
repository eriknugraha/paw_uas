<?php

if (isset($_GET['harian'])) {

include "../pdf/class.ezpdf.php"; //class ezpdf yg di panggil
$pdf = new Cezpdf();

//Set margin dan font
$pdf->ezSetCmMargins(3, 3, 3, 3);
$pdf->selectFont('../pdf/fonts/Courier.afm');

//Tampilkan gambar di dokumen PDF
$pdf->addJpegFromFile('sipi.jpg',31,778,90);



//Garis atas untuk header


// $bagianWhere = "";

// if (isset($_GET['jam']))
// {
//    $jam1 = $_GET['jam1'];
//    $jam2 = $_GET['jam2'];
//    if (empty($bagianWhere))
//    {
//         $bagianWhere .= "jam_kunjungan BETWEEN '$jam1' and '$jam2'";
//    }
//    else
//    {
//         $bagianWhere .= " AND jam_kunjungan BETWEEN '$jam1' and '$jam2'";
//    }
// }

// if (isset($_GET['umur']))
// {
//    $umur1 = $_GET['umur1'];
//    $umur2 = $_GET['umur2'];
//    if (empty($bagianWhere))
//    {
//         $bagianWhere .= "umur BETWEEN '$umur1' and '$umur2'";
//    }
//    else
//    {
//         $bagianWhere .= " AND umur BETWEEN '$umur1' and '$umur2'";
//    }
// }


// if (isset($_GET['sex']))
// {
//    $sex = $_GET['sex'];
//    if (empty($bagianWhere))
//    {
//         $bagianWhere .= "sex = '$sex'";
//    }
//    else
//    {
//         $bagianWhere .= " AND sex = '$sex'";
//    }
// }





	$pdf->line(31, 770, 565, 770);

//Garis bawah untuk footer
$pdf->line(31, 50, 565, 50);

//Teks kiri bawah
$pdf->addText(410,34,8,'Dicetak tgl:' . date( 'd-m-Y, H:i:s'));

// Baca input tanggal yang dikirimkan user

//echo "$mulai $selesai";exit;

//Menampilkan isi dari database
//Koneksi ke database dan tampilkan datanya

mysql_connect("localhost", "root", "");
mysql_select_db("bugar");



	//Teks di tengah atas untuk judul header

	$pdf->addText(175, 800, 16,'<b>Laporan Absensi Fitnes</b>');
	$pdf->addText(135, 780, 14,'<b> Balai Kesehatan Olahraga Masyarakat Bandung </b>');



	$tglhari = date_format(date_create($_GET['tglhari1']), 'Y-m-d');


			
			                
			$tampil ="select * from tfitness where tgl_kunjugan like $tglhari " ;
			
	 		  	
			//echo $tampil;exit;
			$sql = mysql_query($tampil);

			

			//Menghitung jumlah data pada database				
			$jml = mysql_num_rows($sql);
			//echo $jml;exit;
			if ($jml > 0){

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
		}
			else{

			echo "
			<script>
			alert('Tidak Ada Data');
			location.href = \"\";
			</script>
			";
		//	window.location=\"\";

		}
		
	}		

		

// 			}

// elseif(isset($_GET['bulanan'])) {
// 	$pdf->line(31, 770, 565, 770);

// //Garis bawah untuk footer
// $pdf->line(31, 50, 565, 50);

// //Teks kiri bawah
// $pdf->addText(410,34,8,'Dicetak tgl:' . date( 'd-m-Y, H:i:s'));

// // Baca input tanggal yang dikirimkan user

// //echo "$mulai $selesai";exit;

// //Menampilkan isi dari database
// //Koneksi ke database dan tampilkan datanya

// mysql_connect("localhost", "root", "");
// mysql_select_db("bugar");


// 	//Teks di tengah atas untuk judul header
// 	$pdf->addText(175, 800, 16,'<b>Laporan Absensi Fitnes</b>');
// 	$pdf->addText(135, 780, 14,'<b> Balai Kesehatan Olahraga Masyarakat Bandung </b>');

		
// 		$tgl1 = date_format(date_create($_GET['tgl1']), 'Y-m-d');
// 		$tgl2 = date_format(date_create($_GET['tgl2']), 'Y-m-d');
// 		// $jam1 = $_GET['jam1'];
// 		// $jam2 = $_GET['jam2'];
// 		// $umur1 = $_GET['umur1'];
// 		// $umur2 = $_GET['umur2'];
// 		// $sex = $_GET['sex'];



		                
// 		$tampil = "select * from tfitness where tgl_kunjugan BETWEEN '$tgl1' and '$tgl2' ORDER BY id DESC";
// 		//echo $tampil;exit;
// 		$sql = mysql_query($tampil);

// 		//Menghitung jumlah data pada database				
// 		$jml = mysql_num_rows($sql);
// 		//echo $jml;exit;
// 		if ($jml > 0){

// 		$i = 1;
// 		while($r = mysql_fetch_array($sql)) {

// 		//Format Menampilkan data di ezPdf
// 			$data[$i]=array('No'=>$i,
// 							       'Tanggal'=>"$r[tgl_kunjugan]",
// 							       'ID Member'=>"$r[id_member]",
// 								   'Nama Memberr'=>"$r[nama_member]",
// 								   'P/L'=>"$r[sex]",
// 								   'Umur'=>"$r[umur]"
// 						   );
// 			$i++;

// 		}

// 		//Tampilkan Dalam Bentuk Table
// 		$pdf->ezTable($data);

// 		$pdf->ezText("\nPeriode: $tgl1 s/d $tgl2");

// 		// Penomoran halaman
// 		$pdf->ezStartPageNumbers(564, 20, 8);
// 		$pdf->ezStream();
// 		}
// 		else{

// 			echo "
// 			<script>
// 			alert('Tidak Ada Data');
// 			location.href = \"\";
// 			</script>
// 			";
// 		//	window.location=\"\";

// 		}
		

		
		
// }

// else{

// 			echo "
// 			<script>
// 			alert('Tidak Ada Data');
// 			location.href = \"\";
// 			</script>
// 			";
// 		//	window.location=\"\";

// 		}
		



?>