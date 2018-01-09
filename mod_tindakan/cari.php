
<?php
include ("../config/koneksi.php");
include ("../config/fungsi_indotgl.php");
$kodeuser=$_POST['q'];

$aksi="mod_tindakan/aksi_tindakan.php";

?>
<div class="hasil_cari">
<form method="post" enctype="multipart/form-data" action="<?php echo "$aksi?module=tambahlayanan"; ?>">
<h5>Hasil Pencarian <b><?php echo $kodeuser; ?></b></h5>
<table class="table table-striped">
					<thead>
						<tr class="head" >
							<td>   Nama Layanan</td><td>   Harga</td><td></td>
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
							<td></td>
							<input type="hidden" value="<?php  echo $_GET['t1']; ?>" name="t1" readonly> 
							<input type="hidden" value="<?php echo $r['id_layanan'];?>" name="t2"  readonly> 
                            <td><input type="text" value="<?php echo $r['nama_layanan'];?>" name="t3" class="span14" readonly></td>
                             <td>RP.&nbsp;<input type="text" value="<?php echo $r['harga'];?>" name="t4" class="span8" readonly><td><div class="btn-group">
                     
                            
								<button type="submit" <?php echo $r['id_layanan'];?> class="btn btn-success"><i class="icon-arrow-down icon-white"></i> Add </button>
								
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
				</table></form>
</div>






















