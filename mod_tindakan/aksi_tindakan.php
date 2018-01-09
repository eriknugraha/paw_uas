<?php
include ("../config/koneksi.php");
	if($_GET['module']=='tambah'){
		$t1=$_POST['t1'];
		$t2=$_POST['t2'];
		$query=mysql_query("INSERT INTO tlayanan (nama_layanan, harga) VALUES ('$t1','$t2')");
		header("location:../media.php?module=tindakan");
	
	}
	elseif($_GET['module']=='hapus'){		
		$id_tindakan=$_GET['id_tindakan'];
		$query=mysql_query("DELETE FROM tlayanan WHERE id_layanan='$id_tindakan'");
		header("location:../media.php?module=tindakan");		
	}
	elseif($_GET['module']=='edit'){
		// $id_tindakan=$_POST['id_tindakan'];
		$t1=$_POST['t1'];
		$t2=$_POST['t2'];
		$id_tindakan=$_POST['id_layanan'];
		$query=mysql_query("UPDATE tlayanan SET nama_layanan='$t1', harga='$t2' WHERE id_layanan='$id_tindakan'");
		header("location:../media.php?module=tindakan");	
		}

	elseif($_GET['module']=='tambahpaket'){
		$t1=$_POST['t1'];
	
		$query=mysql_query("INSERT INTO paket (paket) VALUES ('$t1')");
		header("location:../media.php?module=paket");
	
	}
	elseif($_GET['module']=='editpaket'){
		$id=$_POST['id'];
		$t1=$_POST['t1'];

		$query=mysql_query("UPDATE paket SET paket='$t1' WHERE id='$id'");
		header("location:../media.php?module=paket");	
		}
		elseif($_GET['module']=='hapuspaket'){		
		$id=$_GET['id'];
		$query=mysql_query("DELETE FROM paket WHERE id='$id'");
		header("location:../media.php?module=paket");		
	}

	elseif($_GET['module']=='tambahlayanan'){
		$t1=$_POST['t1'];
		$t2=$_POST['t2'];
		$t3=$_POST['t3'];
		$t4=$_POST['t4'];

		$query=mysql_query("INSERT INTO tdetailpaket(id_paket, id_layanan,nama_layanan,harga) VALUES ('$t1','$t2','$t3','$t4')");
		header("location:../media.php?module=tp&&act=edit&&t1=$t1");
	}
		elseif($_GET['module']=='hapuslayanan'){
		$t1=$_GET['t1'];
		$t2=$_GET['id'];


		$query=mysql_query("DELETE FROM tdetailpaket WHERE id_layanan='$t2' and id_paket='$t1'");
		header("location:../media.php?module=tp&&act=edit&&t1=$t1");
	}
	elseif($_GET['module']=='t'){
		$t1=$_POST['t1'];
		header("location:../media.php?module=tp&&act=edit&&t1=$t1");
	}
?>