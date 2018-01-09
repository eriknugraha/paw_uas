<?php
$aksi="mod_dataobat/aksi_dataobat.php";
switch($_GET['act']){
	default:
	?>
	<script type="text/javascript">
		 $(document).ready(function() {
		  <!-- event textbox keyup
		  $("#txtcari").keyup(function() {
		   var strcari = $("#txtcari").val();
		   if (strcari != "")
		   {
		   $("#tabel_awal").css("display", "none");

			$("#hasil").html("<img src='img/loader.gif'/>")
			$.ajax({
			 type:"post",
			 url:"mod_dataobat/cari.php",
			 data:"q="+ strcari,
			 success: function(data){
			 $("#hasil").css("display", "block");
			  $("#hasil").html(data);
			  
			 }
			});
		   }
		   else{
		   $("#hasil").css("display", "none");
		   $("#tabel_awal").css("display", "block");
		   }
		  });
			});
	</script>
	<?php
	$p      = new Paging;
    $batas  = 10;
    $posisi = $p->cariPosisi($batas);
?>
	<section>
		<ul class="breadcrumb" style="margin-bottom: 5px;">
			<li class="active">Data Member</li>
			
		</ul>
		<div class="control-group pull-left">
			<button class="btn btn-primary" type="button" onclick="window.location='media.php?module=pembayaran&&act=tambah'"><i class="icon-plus icon-white"></i> Tambah Pembayaran</button>
            
            
		</div>
		<form class="form-search pull-right">
							<div class="input-prepend">
								<span class="add-on"><i class="icon-search"></i></span>
								<input class="span3" id="txtcari" type="text" placeholder="Search">
							</div>

		</form>
		<hr>
		<div class="row-fluid">
			<div class="span12 pull-left">
			<div id="hasil"></div>
				<div id="tabel_awal">
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
					$query=mysql_query("SELECT *, SUM(tdetailbyr.`hargaxjml`) AS 'total' FROM tbyr, tdetailbyr WHERE tbyr.`no_kwitansi`=tdetailbyr.`no_kwitansi` GROUP BY tdetailbyr.`no_kwitansi` ");
					$no=$posisi+1;
					$total=0;

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
							
					

							
						</div>

					<?php
					$no++;
					}
					?>
					<tr>
							<td colspan="8">
							<?php
							$jmldata=mysql_num_rows(mysql_query("SELECT * FROM tbyr,tdetailbyr where tbyr.`no_kwitansi`=tdetailbyr.`no_kwitansi` "));
							$jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
							$linkHalaman = $p->navHalaman($_GET['halaman'], $jmlhalaman); 
							echo "$linkHalaman";
							?><td>Jumlah Record <?php echo $jmldata; ?></td>
						</tr>
					</tbody>
				</table>
				</div>
			</div>
		</div>
	</section>
<?php
break;

  
}
?>
