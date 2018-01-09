<?php ob_start();
include "koneksi.php";
if($_POST){
	$judulartikel      = $_POST['judul_artikel'];
	$isiartikel 	    = $_POST['isi_artikel'];
	$penulisartikel 	= $_POST['penulis_artikel'];
	$photoartikel 		= $_FILES['images']['name'];
	
	if(!empty($_FILES['images']['tmp_name'])){
		move_uploaded_file($_FILES['images']['tmp_name'], 'photo-artikel/'.$_FILES['images']['name']);

		mysql_query("insert into artikel(judul_artikel, isi_artikel, penulis_artikel, photo_artikel)
		values('$judulartikel', '$isiartikel', '$penulisartikel', '$photoartikel')"); 
		
	} else {
		mysql_query("insert into artikel(judul_artikel, isi_artikel, penulis_artikel)
		values('$judulartikel', '$isiartikel' ,'$penulisartikel')");
		
	}
	header('location:artikel.php');
	exit;
}

?>

