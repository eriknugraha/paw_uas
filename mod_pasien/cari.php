<?php
session_start();
include ("../config/koneksi.php");
include ("../config/fungsi_indotgl.php");
$kodepasien=$_POST['q'];
$aksi="mod_pasien/aksi_pasien.php";
?>
<div class="hasil_cari">
<h5>Hasil Pencarian <b><?php echo $kodepasien; ?></b></h5>
<table class="table table-striped">
					<thead>
						<tr class="head1" style="center">
							<td><center>No</td>
							<td><center>ID member</td>
							
							<td><center>Nama Member</td>
							<td><center>TTL</td>
							<td><center>Jenis Kelamin</td>
							
							
							<td><center>No Telp</td>
							
							<td><center>Umur</td>
							 <td>View</td>
							<td></td>
						</tr></center>
					</thead>
					<tbody>
					<?php					
					$query=mysql_query("SELECT * FROM tmember where id_member LIKE '%".$kodepasien."%' And status='Member' or nama_member  LIKE '%".$kodepasien."%' And status='Member'");
					$no=1;
					$num=mysql_num_rows($query);
					if($num>=1){
					while($r=mysql_fetch_array($query)){
					?>					
						<tr>
							<td><center><?php echo $no; ?></td>
							<td><center><?php echo $r['id_member']; ?></td>
							
							<td><center><?php echo $r['nama_member']; ?></td>
							<td><center><?php echo $r['tempat_lahir']; ?>,<?php echo $r['tgl_lahir']; ?></td>
							
							<td><center><?php echo $r['sex']; ?></td>
							
							
							<td><center><?php echo $r['tlp']; ?></td>
							

                            <td><center><?php
                            
                         
                            $tgl=$r['tgl_lahir'];
                            $ambil_thn=substr($tgl,0,4);
                            $thn_sekarang=date('Y');
                            $umur=$thn_sekarang-$ambil_thn;
                            echo $umur." Tahun";
                            ?></td>
                            <td><a href="media.php?module=detailm&&kodepasien=<?php echo $r['id_member']; ?>"><i class="icon-zoom-in"></i></a></td>
                           
                            <td><center></td>
                            <?php 

                            if (($_SESSION['akses']=="3")||($_SESSION['akses']=="1"))
                            {
                            
                             ?><td><div class="btn-group">
								<a class="btn btn-primary" href="#"><i class="icon-wrench icon-white"></i> Actions</a>
								<a class="btn btn-primary dropdown-toggle" data-toggle="dropdown" href="#"><span class="caret"></span></a>
								<ul class="dropdown-menu">
									<li><a href="cetak_kartu.php?id_pasien=<?php echo $r['kodePasien']; ?>&&status=pasien" target="_blank"><i class="fa fa-credit-card"></i> Cetak Kartu</a></li>
									<li><a href="media.php?module=data_pasien&&act=edit&&kodepasien=<?php echo $r['id_member']; ?>"><i class="icon-pencil"></i> Edit</a></li>
									<li><a href="<?php echo "$aksi?module=hapus&&kodepasien=$r[kodePasien]";?>" onclick="return confirm('Apakah anda yakin, ingin menghapus data pasien <?php echo $r['nama_pasien']; ?>?')"><i class="icon-trash"></i> Delete</a></li>									
								</ul>
							</div></td>
						</tr>

						<?php 
						}

						?>
					
					<?php
					$no++;
					}
					}
					else{
					?>
						<tr>
							<td colspan="11"><div class="alert alert-error">Data tidak ditemukan</div></td>
						</tr>
						<?php
					}
					?>
					
					</tbody>
				</table>
</div>