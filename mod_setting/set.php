<?php
include ("../config/koneksi.php");
include ("../config/fungsi_thumb.php");

		if($_GET['module']=='edit'){
	  
		$foto=$_FILES['fupload']['name'];
		login($foto);
		
	
		$query=mysql_query("UPDATE setting SET foto='$foto'");
		header("location:../media.php?module=set");
		}
		

		
		?>