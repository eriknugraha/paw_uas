<?php
session_start();
include ("../config/koneksi.php");
include ("../config/fungsi_indotgl.php");
$kodepasien=$_POST['q'];

$aksi="mod_dokter/aksi_dokter.php";
?>
<div class="hasil_cari">
<h5>Hasil Pencarian <b><?php echo $kodepasien; ?></b></h5>
<table class="table table-striped">
					<thead>
						<tr class="head2">
							
							<td>ID Dokter</td>
							<td>Nip</td>
							<td>Nama Dokter</td>
							<td>Tempat Lahir</td>
							<td>TGL_Lahir</td>
							<td>JK</td>
							
							<td>No Hp</td>
					        <td>View</td>
					        <?php if (($_SESSION['akses']=="3")||($_SESSION['akses']=="1"))
                            { ?>
							<td>Password</td><?php }?>
							<td></td>

						
						</tr>
					</thead>
					<tbody>



					<?php
					
					$query=mysql_query("SELECT * from tdokter WHERE nama LIKE '%".$kodepasien."%' OR id_dokter LIKE '%".$kodepasien."%'");
					

					$no=1;
					$num=mysql_num_rows($query);
					if($num >= 1){
					while($r=mysql_fetch_array($query)){
					?>	

						<tr>
							<td><?php echo $r['id_dokter']; ?></td>
							<td><?php echo $r['nip']; ?></td>
							<td><?php echo $r['nama']; ?></td>
							<td><?php echo $r['tempat_lahir']; ?></td>
							<td><?php echo tgl_indo($r['tgl_lahir']); ?></td>
							<td><?php echo $r['sex']; ?></td>
							<td><?php echo $r['tlp']; ?></td>
							
						
							<td><a href="media.php?module=detaild&&kodedk=<?php echo $r['id_dokter']; ?>"><i class="icon-zoom-in"></i></a></td>
						

                           <?php if (($_SESSION['akses']=="3")||($_SESSION['akses']=="1"))
                            { ?>
                            <td><a href="media.php?module=pas&&id=<?php echo $r['id_dokter']; ?>"><button type="submit" class="btn btn-success"></i>ubah<br>Password</button></a></td>
							 <td><div class="btn-group">
								<a class="btn btn-success" href="#"><i class="icon-wrench icon-white"></i> Actions</a>
								<a class="btn btn-success dropdown-toggle" data-toggle="dropdown" href="#"><span class="caret"></span></a>
								<ul class="dropdown-menu">
									<li><a href="media.php?module=dokter&&act=edit&&kodedk=<?php echo $r['id_dokter']; ?>"><i class="icon-pencil"></i> Edit</a></li>
									<li><a href="<?php echo "$aksi?module=hapus&&kodedk=$r[id_dokter]";?>" onclick="return confirm('Apakah anda yakin, ingin menghapus data dokter <?php echo $r['nama']; ?>?')"><i class="icon-trash"></i> Delete</a></li>									
								</ul>
							</div></td>
							

							
						</tr><?php }?>

					
					<?php
					$no++;
					}
					}
					else{
					?>
					<tr>
							<td colspan="8"><div class="alert alert-error">Data tidak ditemukan</div></td>
						</tr>
					<?php
					}
					?>
					
					
					</tbody>
				</table>
</div>