<?php
include ("../config/koneksi.php");
$kode=$_POST['q'];

?>

 <div class="rm_info">

<table class="table table-striped">
					<thead>
						<tr class="head1" style="center">
							<td><center>No</td>

							<td><center>Tanggal Daftar</td>

							<td><center>ID member</td>
							
							<td><center>Nama Member</td>


							<td><center>Jenis Kelamin</td>

							<td><center>Umur</td>
							
							<td></td>
							<td><center>Aksi</td>

							<td></td>
						</tr></center>
					</thead>
					<tbody>


					<?php					
					$query=mysql_query("SELECT *, YEAR(CURDATE())-YEAR(tmember.tgl_lahir) AS umur FROM tmember  where id_member LIKE '%".$kode."%' OR nama_member LIKE '%".$kode."%'");
					$no=1;
					$num=mysql_num_rows($query);
					if($num>=1){
					while($r=mysql_fetch_array($query)){
					?>					
						<tr>
							<td><center><?php echo $no; ?></td>
							<td><center><?php echo $r['tgl_daftar']; ?></td>
					
							<td><center><?php echo $r['id_member']; ?></td>
							<td><center><?php echo $r['nama_member']; ?></td>

							<td><center><?php echo $r['sex']; ?></td>
							
							<td><center><?php echo $r['umur']." Tahun"; ?></td>


                            <td><center></td>

                            <td> <center>



                            		<button type="button" class="btn btn-success" onclick="window.location='media.php?module=rekam_medik&&status=klien&&kodem=<?php echo $r['id_member'] ?>'"><i class="icon-ok-circle icon-white"></i> Proses</button>



                            </td>
                           
                            
                            <td><center></td>
                            
                           

						</tr>


						<?php }?>
					
					<?php
					$no++;
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