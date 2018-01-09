<?php
include ("../config/koneksi.php");
include ("../config/fungsi_thumb.php");
	if($_GET['module']=='tambah_pasien'){
	
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
        $t11=$_POST['t11'];
        $t12=$_POST['t12'];

     
		
        $foto=$_FILES['fupload']['name'];
        fotoPasien($foto);
		
        $query=mysql_query("INSERT INTO tmember
        (id_member,tgl_daftar,nama_member,tempat_lahir,tgl_lahir,sex,pekerjaan,alamat,tlp,kunjungan_1,last_registered,status,photo) VALUES 
        ('$t1','$t9','$t2','$t4','$t5','$t3','$t7','$t8','$t6','$t10','$t11','$t12','$foto')");
		header("location:../media.php?module=data_pasien");	
        }
	
   
	elseif($_GET['module']=='hapus'){
		$kodepas=$_GET['kodepasien'];
		$query=mysql_query("DELETE FROM tmember WHERE id_member='$kodepas'");
		header("location:../media.php?module=data_pasien");		
	}
		elseif($_GET['module']=='edit'){
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
        $t11=$_POST['t11'];
        $t12=$_POST['t12'];
		$foto=$_FILES['fupload']['name'];
		fotoPasien($foto);
		
		if(empty($foto)){
		$query=mysql_query("UPDATE tmember SET tgl_daftar='$t9', nama_member='$t2', tempat_lahir='$t4', tgl_lahir='$t5', sex='$t3', pekerjaan='$t7', alamat='$t8', tlp='$t6',kunjungan_1='$t10',last_registered='$t11',status='$t12' WHERE id_member='$t1'");
		header("location:../media.php?module=data_pasien");
		}
		else{
		$query=mysql_query("UPDATE tmember SET tgl_daftar='$t9', nama_member='$t2', tempat_lahir='$t4', tgl_lahir='$t5', sex='$t3', pekerjaan='$t7', alamat='$t8', tlp='$t6',kunjungan_1='$t10',last_registered='$t11',status='$t12',photo='$foto' WHERE id_member='$t1'");
		header("location:../media.php?module=data_pasien");
		}
		}
		?>