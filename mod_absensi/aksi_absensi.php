<?php
include ("../config/koneksi.php");
	if($_GET['module']=='tambah'){
		$t1=$_POST['t1'];
		$t2=$_POST['t2'];
		$t3=$_POST['t3'];
		$t4=$_POST['t4'];
		$t5=$_POST['t5'];
		$t6=$_POST['t6'];
		$t7=$_POST['t7'];
		$t8=$_POST['t8'];
		$t9=$_POST['t9'];
		$t10=$_POST['tujuan'];

	
		$query=mysql_query("INSERT INTO tfitness (tgl_kunjugan, id_member, nama_member, sex, umur, jam_kunjungan, status,hari,bln,tujuan)
			VALUES ('$t1','$t2','$t3','$t4','$t5','$t6','$t7','$t8','$t9','$t10')");
		header("location:../media.php?module=absen");
	
	}
	elseif($_GET['module']=='hapus'){		
		$id_tindakan=$_GET['kodeabsen'];
		$query=mysql_query("DELETE FROM tfitness WHERE id='$id_tindakan'");
		header("location:../media.php?module=absen");		
	}
	
?>