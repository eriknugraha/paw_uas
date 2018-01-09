<?php
	
	session_start();
	include("config/koneksi.php");


	$user=mysql_real_escape_string($_POST['username']);
	$pass=mysql_real_escape_string(md5($_POST['password']));
	$query=mysql_query("SELECT * FROM user_man WHERE username='$user' AND password='$pass'");
	$num=mysql_num_rows($query);
	$r=mysql_fetch_array($query);
	
	if($num >= 1){
		$_SESSION['iduser']=$r['id_user'];
		$_SESSION['username']=$r['username'];
		$_SESSION['nama']=$r['nama'];
		$_SESSION['akses']=$r['akses'];
		header("location:media.php?module=home");
	}else{
		echo "
		<script type='text/javascript'>
		alert('Username & Password Anda Salah!');
		history.back(self);
		</script>
		";
	}
?>