<?php
include "koneksi.php";
$id = $_GET['p'];
$hasil = mysql_query("select * from artikel where id_artikel='$id'");
$data=mysql_fetch_array($hasil);
$file = 'artikel/'.$data['photo_artikel'].'';
 if ($file =="artikel/"){
echo '

						<h3>'.$data['judul_artikel'].'</h3>
								<p>Posted by '.$data['penulis_artikel'].' <br>
								Pada Tanggal '.$data['tgl_artikel'].'</p> 
								<p>'.$data['isi_artikel'].'</p> 
									
				

 ';}
 else {
 echo '
					
						<img width="400" src="photo-artikel/'.$data['photo_artikel'].'" alt="" />
					
							<h3>'.$data['judul_artikel'].'</h3>
								<p>Posted by '.$data['penulis_artikel'].' <br> 
								Pada Tanggal '.$data['tgl_artikel'].'</p> 
								<p>'.$data['isi_artikel'].'</p> 
									
						  
						
					
 ';}
?>



