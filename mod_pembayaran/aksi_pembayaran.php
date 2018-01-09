<?php
include ("../config/koneksi.php");
include ("../config/fungsi.php");
include ("../config/fungsi_thumb.php");

	if($_GET['module']=='tambah'){
		$t1=$_POST['t1'];
		$t2=$_POST['t2'];
		$t3=$_POST['t3'];
		$t4=$_POST['t4'];
		$t5=$_POST['t5'];
	

		$query=mysql_query("INSERT INTO tbyr(no_kwitansi,tgl_bayar,id_member,nama_member,jns_bayar) VALUES ('$t1','$t2','$t3','$t4','$t5') ");
		header("location:../media.php?module=pembayaran&&act=edit&&kdo=$t1");	

	}
elseif($_GET['module']=='tambahl'){
		$t1=$_POST['t1'];
		$t2=$_POST['t2'];
		$t3=$_POST['t3'];
		$t4=$_POST['t4'];
		$t5=$_POST['t5'];
		$total=(($t4)*($t5));
		$query=mysql_query("INSERT INTO tdetailbyr(no_kwitansi,id_layanan,nama_layanan,harga_satuan,jml,hargaxjml) VALUES ('$t2','$t1','$t3','$t5','$t4','$total')");
		header("location:../media.php?module=pembayaran&&act=edit&&kdo=$t2");	
	}
	elseif($_GET['module']=='t'){
		$p=$_POST['paket'];
		$eksekusi = mysql_query("SELECT id_layanan, nama_layanan, harga FROM tdetailpaket WHERE id_paket='$p'");
		while($h=mysql_fetch_array($eksekusi))
		{
			$a=$h['id_layanan'];
			$b=$h['nama_layanan'];
			$c=$h['harga'];
			
		$t2=$_POST['t2'];
	
		$t5=1; 
	
	
		$query=mysql_query("INSERT INTO tdetailbyr(no_kwitansi,id_layanan,nama_layanan,harga_satuan,jml,hargaxjml) VALUES ('$t2','$a','$b','$c','$t5','$c')");
			}	$t2=$_POST['t2'];
		header("location:../media.php?module=pembayaran&&act=edit&&kdo=$t2");	
	}
	elseif($_GET['module']=='tambah2'){
		$t1=$_POST['t1'];
		$t2=$_POST['t2'];
		$t3=$_POST['t3'];
		$t4=$_POST['t4'];
		$t5=$_POST['t5'];
		$total=(($t4)*($t5));
		$query=mysql_query("INSERT INTO tdetailbyr(no_kwitansi,id_layanan,nama_layanan,harga_satuan,jml,hargaxjml) VALUES ('$t2','$t1','$t3','$t5','$t4','$total')");
		header("location:../media.php?module=pembayaran&&act=edit&&kdo=$t2");	
	}

	elseif($_GET['module']=='hapus'){
		$id=$_GET['id'];
		$idd=$_GET['idd'];
		$query=mysql_query("DELETE FROM tdetailbyr WHERE no_kwitansi='$idd' and id_layanan='$id'");
		header("location:../media.php?module=pembayaran&&act=edit&&kdo=$idd");		
	}

	elseif($_GET['module']=='edit'){
        
		$t1=$_POST['t1'];
		$t2=$_POST['t2'];
		$t3=$_POST['t3'];
		$t4=$_POST['t4'];
		$t5=$_POST['t5'];
		$total=(($t4)*($t5));
		
		
		$query=mysql_query("UPDATE tdetailbyr SET jml='$t4',hargaxjml='$total' WHERE no_kwitansi='$t2' and id_layanan='$t1'");
		header("location:../media.php?module=pembayaran&&act=edit&&kdo=$t2");	
		
		}
		?>