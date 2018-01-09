<?php
include ("../config/koneksi.php");
include ("../config/fungsi_thumb.php");

	if($_GET['module']=='tambah'){
		$t1=$_POST['t1'];
		$t2=$_POST['t2'];
	
		$t4=$_POST['t4'];
		$t5=$_POST['t5'];
		$t6=$_POST['t6'];
		$t7=$_POST['t7'];
		$t8=$_POST['t8'];
		$t9=md5($_POST['t9']);
		$akses=$_POST['akses'];
		$photo=$_FILES['fupload']['name'];
		uploadFoto($photo);
		$cek_username=mysql_num_rows(mysql_query("SELECT username FROM user_man WHERE username='$t8'"));

		if ($cek_username > 0){
			 echo "<script>alert('Username sudah ada yang pakai. Ulangi lagi.'); window.location = '../media.php?module=data_user&&act=tambah'</script>";
	
		}

		else{
		$query=mysql_query("INSERT INTO user_man (kodeUser, nama, sex, alamat, tlp, tgl_lahir, username, password,akses, photo) VALUES ('$t1','$t2','$t4','$t5','$t6','$t7','$t8','$t9','$akses','$photo')");
		header("location:../media.php?module=data_user");
	}
	}
	
	elseif($_GET['module']=='hapus'){
		$iduser=$_GET['iduser'];		
		$query=mysql_query("DELETE FROM user_man WHERE id_user='$iduser'");
		header("location:../media.php?module=data_user");		
	}
	elseif($_GET['module']=='edit'){
		$t1=$_POST['t1'];
		$t2=$_POST['t2'];
	
		$t4=$_POST['t4'];
		$t5=$_POST['t5'];
		$t6=$_POST['t6'];
		$t7=$_POST['t7'];
		$t8=$_POST['t8'];
		
		$photo=$_FILES['fupload']['name'];
		uploadFoto($photo);
		
		if(empty($photo)){
		$query=mysql_query("UPDATE user_man SET nama='$t2',  sex='$t4', alamat='$t5', tlp='$t6', tgl_lahir='$t7', username='$t8' WHERE kodeUser='$t1'");
		header("location:../media.php?module=data_user");
		}
		else{
		$query=mysql_query("UPDATE user_man SET nama='$t2', sex='$t4', alamat='$t5', tlp='$t6', tgl_lahir='$t7', username='$t8', photo='$photo' WHERE kodeUser='$t1'");
		header("location:../media.php?module=data_user");
		}
		}
		?>