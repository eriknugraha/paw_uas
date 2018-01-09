<?php
include ("../config/koneksi.php");
include ("../config/fungsi_indotgl.php");
$kode=$_POST['q'];
$aksi="mod_rm/aksi_rm.php";
?>
<div class="hasil_cari">
<h5>Hasil Pencarian <b><?php echo $kode; ?></b></h5>
<table class="table table-striped">
					<thead>
						<tr class="head1">

			<td><center>No</td>
              <td><center>Tanggal Rekam Mdeik</td>
              <td><center>No Rekam Medik</td>

              <td><center>ID member</td>
              
              <td><center>Nama Member</td>


              <td><center>Pemeriksa</td>
              

              <td></td>
              <td><center>View</td>

              <td></td>




				</tr></center>

					</thead>

				<tbody>
					
					<?php					
					$query=mysql_query("SELECT * FROM tmember,tmedis WHERE tmedis.`kode`='$kode' AND tmember.`id_member`=tmedis.`id_member`");
					$no=1;

					$num=mysql_num_rows($query);
if($num>=1){

					while($r=mysql_fetch_array($query)){
					?>					
						<tr>


			<td><center><?php echo $no; ?></td>
              <td><center><?php echo $r['Tgl_RM']; ?></td>
              <td><center><?php echo $r['kode']; ?></td>
              <td><center><?php echo $r['id_member']; ?></td>
              <td><center><?php echo $r['nama_member']; ?></td>
              <td><center><?php echo $r['pemeriksa']; ?></td>
              

                            <td><center></td>

                            <td> <center><a href="media.php?module=detailp&&kd=<?php echo $r['id_member']; ?>&&tgl=<?php echo $r['Tgl_RM']; ?>&&a=<?php echo $r['kode']; ?>"><i class="icon-zoom-in"></i></a></td>
                           
                            
                            <td><div class="btn-group">
                            <a class="btn btn-info" href="#"><i class="icon-wrench icon-white"></i> Actions</a>
                            <a class="btn btn-info dropdown-toggle" data-toggle="dropdown" href="#"><span class="caret"></span></a>
                            <ul class="dropdown-menu">
                            <li><a href="media.php?module=editrm&&status=klien&&kodem=<?php echo "$r[id_member]"?>&&id=<?php echo "$r[kode]"?>" ><i class="icon-pencil"></i> Edit</a></li>
                            <li><a href="<?php echo "$aksi?module=hapus&&kode=$r[kode]";?>" onclick=return confirm('Apakah anda yakin, ingin menghapus data <?php echo $r['kode']; ?>?')"><i class="icon-trash"></i> Delete</a></li>                  
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
							<td colspan="11"><div class="alert alert-error">Data tidak ditemukan</div></td>
						</tr>
						<?php
					}
					?>
					
					</tbody>
				</table>
</div>