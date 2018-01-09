<?php
include ("../config/koneksi.php");
include ("../config/fungsi_indotgl.php");
$kodeuser=$_POST['q'];
$aksi="mod_pembyaran/aksi_pembayaran.php";
?>
<div class="hasil_cari">
<h5>Hasil Pencarian <b><?php echo $kodeuser; ?></b></h5>
<table class="table table-striped">
					<thead>
						<tr class="head">
							<td>ID</td><td>Nama</td><td>tgl lahir</td><td>alamat</td><td></td>
						</tr>
					</thead>
					<tbody>
					<?php					
					$query=mysql_query("SELECT id_member,nama_member,tgl_lahir,alamat FROM tmember WHERE nama_member LIKE '%".$kodeuser."%' OR id_member LIKE '%".$kodeuser."%'");
					$no=1;
					$num=mysql_num_rows($query);
					if($num>=1){
					while($r=mysql_fetch_array($query)){
					?>					
						<tr>
							<td></td><td><?php echo $r['id_member'];?></td>
							<td><?php echo $r['nama_member'];?></td> 
							<td><?php echo $r['tgl_lahir'];?>
							<td><?php echo $r['alamat'];?>
                           
                            <td><div class="btn-group">
								<a class="btn btn-info" href="media.php?module=pembayaran&&kdd=<?php echo $r['id_member'];?>"><i class="icon-wrench icon-white"></i>Pilih</a>
								
							</div></td>
						</tr>
					
					<?php
					$no++;
					}
					}
					else{
						?>
						<tr>
							<td colspan="9"><div class="alert alert-error">Data tidak ditemukan</div></td>
						</tr>
						<?php
					}
					?>
					</tbody>
				</table>
</div>






















