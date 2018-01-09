<?php
session_start();
include ("../config/koneksi.php");
include ("../config/fungsi_indotgl.php");
$kodepasien=$_POST['q'];

$aksi="mod_dokter/aksi_dokter.php";
?>
<div class="hasil_cari">


				
					
					<?php 		
				$cek_username=mysql_num_rows(mysql_query("SELECT username FROM user_man WHERE username='$kodepasien'"));

		if ($cek_username > 0){
		  echo "Username sudah ada yang pakai. Ulangi lagi";
		}else {
			echo "Username bisa di pakai.";
			}?>
					
					
					</tbody>
			
</div>