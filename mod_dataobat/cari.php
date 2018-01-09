<?php
include ("../config/koneksi.php");

$no_kwitansi=$_POST['q'];
$aksi="mod_dataobat/dataobat.php";
?>
<div class="hasil_cari">
<h5>Hasil Pencarian <b><?php echo $no_kwitansi; ?></b></h5>

		<table class="table table-striped">
					<thead>
						<tr class="head1" style="center">
							<td><center>No</td>
							<td><center>Tanggal Bayar</td>
							
							<td><center>No Kwitansi</td>

							<td><center>ID member</td>
							
							<td><center>Nama Member</td>

							<td><center>Jenis Bayar</td>

							<td><center>Total</td>
							

							<td></td>
							<td><center>View</td>
							<td></td>
							<td></td>

						</tr></center>
					</thead>
	
					<tbody>


					<?php					
					$query=mysql_query("SELECT *,SUM(tdetailbyr.`hargaxjml`) AS 'total' FROM tbyr, tdetailbyr WHERE tbyr.`no_kwitansi` LIKE '%".$no_kwitansi."%' AND tbyr.`no_kwitansi`=tdetailbyr.`no_kwitansi` GROUP BY tbyr.`no_kwitansi`");

					$no=1;
					$total=0;
					$num=mysql_num_rows($query);

if($num>=1){
					while($r=mysql_fetch_array($query)){
					?>					
						<tr >
							<td><center><?php echo $no; ?></td>
							<td><center><?php echo $r['tgl_bayar']; ?></td>
							<td><center><?php echo $r['no_kwitansi']; ?></td>
							<td><center><?php echo $r['id_member']; ?></td>
							<td><center><?php echo $r['nama_member']; ?></td>
							
							<td><center><?php echo $r['jns_bayar']; ?></td>
							<td><center><?php echo number_format($r['total'], 0, ',', '.'); ?></td>
							

                            <td><center></td>

                            <td> <center><a href="media.php?module=detailbayar&&no_kwitansi=<?php echo $r['no_kwitansi']; ?>"><i class="icon-zoom-in"></i></a></td>
                           <td><a href="<?php echo "$aksi?module=hapus&&id=$r[no_kwitansi]";?>" class="btn btn-danger" ><i class="icon-trash"></i></a></td>
                            
                            <td><center></td>
                            
						</tr>





					<div id="<?php echo $r['no_kwitansi'] ?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
							
							<!--<div class="modal-body">
								<h3>Cetak Kartu</h3>
								<a href="front.php?id_pasien=<?php echo $r['id_member']; ?>&&status=member" style="padding:0px 25px;">
							<!---	    <img src="img/depan.png">
                                </a>
                                <a href="end.php?id_pasien=<?php echo $r['id_member']; ?>&&status=member" style="padding:0px 25px;">
                                <!--    <img src="img/belakang.png"> 
                                </a>
							</div>-->

							
						</div>

					
					</tbody>
				
					
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