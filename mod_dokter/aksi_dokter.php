<?php
include ("../config/koneksi.php");
include ("../config/fungsi_thumb.php");


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
		$t10=$_POST['t10'];
		$t11=md5($_POST['t11']);
		$t12=$_POST['t12'];
		$photo=$_FILES['fupload']['name'];
		uploaddok($photo);
		$cek_username=mysql_num_rows(mysql_query("SELECT username FROM user_man WHERE username='$t10'"));
		if ($cek_username > 0){
			 echo "<script>alert('Username sudah ada yang pakai. Ulangi lagi.'); window.location = '../media.php?module=dokter&&act=tambah'</script>";
	
		}

		else{
		$query=mysql_query("INSERT INTO tdokter(id_dokter,nama,tempat_lahir,tgl_lahir,sex,alamat,tlp,nip,kodeUser,username,password,akses,photo) VALUES
		 ('$t1','$t2','$t3','$t8','$t4','$t5','$t6','$t9','$t7','$t10','$t11','$t12','$photo')");
		header("location:../media.php?module=dokter");
	
	}
	}
	elseif($_GET['module']=='hapus'){
	$kodedk=$_GET['kodedk'];		
		$query=mysql_query("DELETE FROM tdokter WHERE id_dokter='$kodedk'");
		header("location:../media.php?module=dokter");		
	}
	elseif($_GET['module']=='edit'){
		$t1=$_POST['t1'];
		$t2=$_POST['t2'];
		$t3=$_POST['t3'];
		$t4=$_POST['t4'];
		$t5=$_POST['t5'];
		$t6=$_POST['t6'];
	
		$t8=$_POST['t8'];
		$t9=$_POST['t9'];
		$t10=$_POST['t10'];
		
		
		$foto=$_FILES['fupload']['name'];
		uploaddok($foto);
		if(empty($foto)){
		$query=mysql_query("UPDATE tdokter SET nama='$t2', tempat_lahir='$t3', tgl_lahir='$t8', sex='$t4',alamat='$t5',tlp='$t6',nip='$t9',username='$t10' WHERE id_dokter='$t1'");
		header("location:../media.php?module=dokter");
	}else{
		$query=mysql_query("UPDATE tdokter SET nama='$t2', tempat_lahir='$t3', tgl_lahir='$t8', sex='$t4',alamat='$t5',tlp='$t6',nip='$t9',photo='$foto',username='$t10' WHERE id_dokter='$t1'");
		header("location:../media.php?module=dokter");
	}
		
		}
		?>