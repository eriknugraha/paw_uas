<?php
$aksi="mod_tindakan/aksi_tindakan.php";
switch($_GET['act']){
	default:
	?>
	
<!-- ---------------------------------Paging--------------------------------- -->
	<?php
	$p      = new Paging;
    $batas  = 10;
    $posisi = $p->cariPosisi($batas);



?>

	<section>
	
		<ul class="breadcrumb" style="margin-bottom: 5px;">
			<li class="active">Pembayaran</li>			
		</ul>
		<div class="control-group pull-left">
			<button class="btn btn-info" type="button" onclick="window.location='media.php?module=tindakan'"><i class="icon-plus icon-white"></i> Tambah Layanan</button>
			<button class="btn btn-info" type="button" onclick="window.location='media.php?module=paket'"><i class="icon-plus icon-white"></i> Tambah Paket</button>
		</div>

		<div class="span12 pull-leftt"><br></div>
		<div class="span6 pull-left">		
			<div class="row-fluid">
			<div class="span10"  style="background:#f9f9f9;padding:10px;">
				<form method="post" enctype="multipart/form-data" action="<?php echo "$aksi?module=t"; ?>">
				
				<fieldset>
				<!-- <legend class="span9"></legend> -->
				<div class="clear"></div>
				<div class="span10">

				<table >
					<thead>
						
						<tr >
							<td><label class="control-label" for="inputPassword"> Paket &nbsp;&nbsp;</label></td>
							<td>
								 <div class="form-group">
		 					
                                    <div class="col-lg-9">
                                        <select name="t1" class="form-control" name="country">
                                            <?php
												include "config/koneksi.php";
												echo "<option>---- Pilih Paket ----</option>";
												$minta = "SELECT * FROM paket";
												$eksekusi = mysql_query($minta);
												while($hasil=mysql_fetch_array($eksekusi))
												{
												$id=$hasil['id_category'];
												echo " <option value=$hasil[id]>$hasil[paket] </option>";
												}
												?>
												</select></div></div>
							</div>
							</td>
						</tr>
					</thead></table>
				
						
							
							
							<hr>
							<div class="control-group">
								<div class="controls">								
								<button type="submit" class="btn btn-success"><i class="icon-ok-circle icon-white"></i>Proses</button>
								<button type="reset" class="btn btn-warning"><i class="icon-refresh icon-white"></i> Reset</button>
								</div>
							</div>
				</div>
				
							</fieldset>
						</form>	

				

			</div>
	
		



		</div>
		</div>


	
		<div class="span6 pull-right">
		<div class="row-fluid">
			<div class="span12">
			
	

<!-- hasil -->
<div id="hasill"></div>
				<div id="tabel_awall"></div>
			     </div>
		</div>
		</div>


 
							
						</div>   



	<?php
break;

case "edit":
$kode=$_GET['t1'];
$queryy=mysql_query("SELECT * FROM paket WHERE id='$kode'");
$re=mysql_fetch_array($queryy);
?>
<!-- ---------------------------------Kembalian--------------------------------- -->
 <script><!-- 

function startCalc(){
interval = setInterval("calc()",1);}
function calc(){

two = document.autoSumForm.a.value; 
three = document.autoSumForm.d.value; 
document.autoSumForm.jumlah.value = (three * 1) - (two * 1) ;}
function stopCalc(){
clearInterval(interval);}
</script>

<script type="text/javascript">


		 $(document).ready(function() {
		  <!-- event textbox keyup
		  $("#txtcari").keyup(function() {

		   var strcari = $("#txtcari").val();

		   if (strcari != "")
		   {
		   $("#tabel_awall").css("display", "none");

			$("#hasill").html("<img src='img/loader.gif'/>")
			$.ajax({
			 type:"post",
			 url:"mod_tindakan/cari.php?t1=<?php echo $kode ?>",
			 data:"q="+ strcari,

			 success: function(data){
			 $("#hasill").css("display", "block");
			  $("#hasill").html(data);
			  
			 }
			});
		   }
		   else{
		   $("#hasill").css("display", "none");
		   $("#tabel_awall").css("display", "block");
		   }
		  });
		
			});
	</script>
		
<section>
		<ul class="breadcrumb" style="margin-bottom: 5px;">
			<li class="active">Paket</li>			
		</ul>

		<div class="control-group pull-left">
			<button class="btn btn-info" type="button" onclick="window.location='media.php?module=tindakan'"><i class="icon-plus icon-white"></i> Tambah Layanan</button>
			<button class="btn btn-info" type="button" onclick="window.location='media.php?module=paket'"><i class="icon-plus icon-white"></i> Tambah Paket</button>
		</div>

		<div class="span12 pull-leftt"><br></div>
		<div class="span6 pull-left">		
			<div class="row-fluid">
			<div class="span10"  style="background:#f9f9f9;padding:10px;">
				<form method="post" enctype="multipart/form-data" action="<?php echo "$aksi?module=tambah"; ?>">
				<input type="hidden" class="span10" id="inputText" value="<?php echo $rus['kodeUser']; ?>" name="t7">
				<fieldset>
				<!-- <legend class="span9"></legend> -->
				<div class="clear"></div>
				<div class="span10">

				<table >
					<thead>
						
						<tr >
							<td><label class="control-label" for="inputPassword"> Paket &nbsp;&nbsp;</label></td>
							<td><input type="text" name="t5"  value="<?php echo $re['paket']; ?>" class="span11" readonly></td>
						</tr>
					</thead></table>
				</div>
				
							</fieldset>
						</form>	

				

		
			</div>
	
		<div class="row-fluid">
			<div class="span12">
			<div id="hasil"></div>
				<div id="tabel_awal">
				<br>
				<form method="post" enctype="multipart/form-data" action="<?php echo "$aksi?module=tambahl"; ?>">
				<fieldset>
				<h5 class="span12">Layanan yang di pilih :  </h5>
				
				<table class="table table-striped">
					<thead>
						<tr class="head3">
							<td>No</td><td>Nama Layanan</td><td>Harga</td><td></td><td></td>
						</tr>
					</thead>
					<tbody>
					<?php
					// include "fungsi.php";
					$kode = $_GET['t1'];
					$query=mysql_query("SELECT * FROM tdetailpaket where id_paket = '$kode'");
					$no=1;					
					while($r=mysql_fetch_array($query)){
					// $bayar=bayar($r[no_kwitansi]);
					?>					
						<tr>
								<td><?php echo $no; ?></td>
							
	                            <td><?php echo $r['nama_layanan'];?></td>
	                            <td>RP.&nbsp;<?php echo number_format($r['harga']);?></td>
                                
                              
                        
                            
                            <td><div class="btn-group">
								
									
									
									
									<td><a href="<?php echo "$aksi?module=hapuslayanan&&id=$r[id_layanan]&&t1=$kode";?>" class="btn btn-danger" ><i class="icon-trash"></i></a></td>
																		
								
							</div></td>
						</tr>
					
					<?php
					$no++;
					$gtotal = $gtotal+$r['harga'];
					}
					?>
					
	<tr>
		<td colspan='2' align='center'>Total</td>
		<td align='right'><b>RP.&nbsp;<?php echo number_format($gtotal); ?></b></td>
	
		</tr>
	
					</tbody>
				</table>
				</fieldset>
				</div>
			</div>
				</div><form name='autoSumForm' >
							</form>			
							


							

		</div>
		</div>




	
		<div class="span6 pull-right">
		<div class="row-fluid">
			<div class="span15">
			<div id="hasil"></div>
				<div id="tabel_awal">
				<form method="post" enctype="multipart/form-data" action="<?php echo "$aksi?module=tambahl"; ?>">
				<fieldset>
				<table class="table table-striped">
					<thead>
						<tr class="head3">
							<td>Pilih Layanan</td>
						</tr>
					</thead>
					<tbody>										
						<tr>
							<td>
							
								<input class="span10" name ="t3" type="text"  id="txtcari"  value="" ><i class="icon-search"></i>
							
							</td>
							
						
						</tr>
					
				
							
					</tbody>
				
				</table>
				</fieldset></form>
				</div>

<!-- hasil -->
<div id="hasill"></div>
				<div id="tabel_awall"></div>
			     </div>
		</div>
		</div>


 
							
						</div>   


	</section>
<?php
break; 


       
}?>