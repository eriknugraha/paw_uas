
<?php
include ("../config/koneksi.php");
include ("../config/fungsi_indotgl.php");
$kodeuser=$_POST['q'];
$kdo=


     


$aksi="mod_pembayaran/aksi_pembayaran.php";

?>
<div class="hasil_cari">
<h5>Hasil Pencarian <b><?php echo $kodeuser; ?></b></h5>
<table class="table table-striped">
					<thead>
						<tr class="head">
							<td>ID</td><td>Nama Layanan</td><td>Harga</td><td></td>
						</tr>
					</thead>
					<tbody>
					<?php	
							
					$query=mysql_query("SELECT * FROM tlayanan WHERE nama_layanan LIKE '%".$kodeuser."%' OR id_layanan LIKE '%".$kodeuser."%'");
					$no=1;
					$num=mysql_num_rows($query);
					if($num>=1){
					while($r=mysql_fetch_array($query)){
					?>					
						<tr>
							<td></td><td><?php echo $r['id_layanan'];?></td> 
                            <td><?php echo $r['nama_layanan'];?>
                             <td>RP.&nbsp;<?php echo $r['harga'];?><td><div class="btn-group">
                     
                             <a href="media.php?module=pembayaran&&act=edit&&kdo=<?php echo $_GET['kdo'];?>&&kd=<?php echo  $r['id_layanan']; ?>">
								<button type="submit" <?php echo $r['id_layanan'];?> class="btn btn-success"><i class="icon-arrow-down icon-white"></i> Add </button>
								</a>
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






















