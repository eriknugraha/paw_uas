<center><h2>Index Artikel</h2></center>

<?php
include "koneksi.php";
$has = mysql_query("select * from artikel order by tgl_artikel desc");
$num = mysql_num_rows($has);

if($num<1){
	echo'<center>Tidak Ada Artikel</center>';
}else{
while($data=mysql_fetch_array($has)){
	$art = substr($data['isi_artikel'],0,100);
	 echo '
					<h2>'.$data['judul_artikel'].'</h2>
					<img width="330" height="280" src="photo-artikel/'.$data['photo_artikel'].'">
					<h4>Di publikasikan pada '.$data['tgl_artikel'].'</h4>
					<h4>Oleh '.$data['penulis_artikel'].'</h4>
					<p>'.$art.'..</p>
				    <a href="single.php?p='.$data['id_artikel'].'">Read More</a>
					<br><br>
		
		 ';}
}
?>