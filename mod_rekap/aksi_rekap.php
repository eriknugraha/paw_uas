<?php
include ("../config/koneksi.php");
include ("../config/fungsi_thumb.php");
	if($_GET['module']=='tambah'){
	
        $t1=$_POST['t1'];
      
        $query=mysql_query("INSERT INTO kunjungan
        (id,nama_kunjungan) VALUES 
        ('','$t1')");
		header("location:../media.php?module=rekap");	
        }
	
   
	elseif($_GET['module']=='hapus'){
		$kodepas=$_GET['id'];
		$query=mysql_query("DELETE FROM kunjungan WHERE id='$kodepas'");
		header("location:../media.php?module=rekap");		
	}
		elseif($_GET['module']=='edit'){
	     $t1=$_POST['t1'];
             $t2=$_POST['t2'];
       
		$query=mysql_query("UPDATE kunjungan SET nama_kunjungan='$t2' WHERE id='$t1'");
		header("location:../media.php?module=rekap");
		}
		
		?>