<?php
include ("../config/koneksi.php");
include ("../config/fungsi_indotgl.php");
$kodeuser=$_POST['q'];
$aksi="mod_datauser/aksi_datauser.php";
?>
<div class="hasil_cari">
<h5>Hasil Pencarian <b><?php echo $kodeuser; ?></b></h5>
<table class="table table-striped">
					<thead>
						<tr class="head">
							<td>No</td><td>Kode User</td><td>Nama Lengkap</td><td>Jenis Kelamin</td><td>No Handphone</td><td>Tanggal Lahir</td><td>Level Akses</td><td>View</td><td>Password</td>
						</tr>
					</thead>
					<tbody>
					<?php					
					$query=mysql_query("SELECT * FROM user_man WHERE kodeUser LIKE '%".$kodeuser."%' OR nama LIKE '%".$kodeuser."%'");
					$no=1;
					$num=mysql_num_rows($query);
					if($num>=1){
					while($r=mysql_fetch_array($query)){
					?>					
						<tr>
						<td></td>
							<td><?php echo $no; ?></td>
							<td><?php echo $r['kodeUser']; ?></td>
							<td><?php echo $r['nama']; ?></td>
							<td><?php echo $r['sex']; ?></td>
							<td><?php echo $r['tlp']; ?></td>
							
							<td><?php echo tgl_indo($r['tgl_lahir']); ?></td>
							<td><?php echo $r['akses']; ?></td>
							<td><a href="media.php?module=detail&&kodeuser=<?php echo $r['kodeUser']; ?>"><i class="icon-zoom-in"></i></a></td>
							<td><a href="media.php?module=pass&&kodeuser=<?php echo $r['kodeUser']; ?>"><button type="submit" class="btn btn-success"></i>ubah<br>Password</button></a></td>
							<td><div class="btn-group">
								<a class="btn btn-info" href="#"><i class="icon-wrench icon-white"></i> Actions</a>
								<a class="btn btn-info dropdown-toggle" data-toggle="dropdown" href="#"><span class="caret"></span></a>
								<ul class="dropdown-menu">
									<li><a href="media.php?module=data_user&&act=edit&&kodeuser=<?php echo $r['kodeUser']; ?>"><i class="icon-pencil"></i> Edit</a></li>
									<li><a href="<?php echo "$aksi?module=hapus&&iduser=$r[id_user]";?>" onclick="return confirm('Apakah anda yakin, ingin menghapus data <?php echo $r['nama']; ?>?')"><i class="icon-trash"></i> Delete</a></li>									
								</ul>
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