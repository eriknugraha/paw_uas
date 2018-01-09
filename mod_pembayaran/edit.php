<?php
$aksi="mod_pembayaran/aksi_pembayaran.php";
switch($_GET['act']){
	default:
	?>

	<?php
break;

case "edit":
$kode=$_GET['kdo'];
$queryy=mysql_query("SELECT * FROM tbyr WHERE no_kwitansi='$kode'");
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
			 url:"mod_pembayaran/cari.php?kdo=<?php echo $kode ?>",
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
		
	 

		<ul class="breadcrumb" style="margin-bottom: 5px;">
			<li class="active">Pembayaran</li>			
		</ul>
		<div class="control-group pull-left"></div>
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
							<td><label class="control-label" for="inputPassword"> No .Kwitansi &nbsp;&nbsp;</label></td>
							<td><input type="text" name="t1" value="<?php echo $re['no_kwitansi']; ?>" class="span12" readonly></td>
						</tr>
						<tr >
							<td><label class="control-label" for="inputPassword"> Tgl Transaksi &nbsp;&nbsp;</label></td>
							<td><input type="text" name="t2" value="<?php echo $re['tgl_bayar']; ?>" class="span12" readonly></td>
						</tr>
						<tr >
							<td><label class="control-label" for="inputPassword"> ID.klient &nbsp;&nbsp;</label></td>
							<td><input type="text" name="t3" id="txtcarii" value="<?php echo $re['id_member']; ?>" class="span11" readonly><i class="icon-search"></td>
						</tr>
						<tr >
							<td><label class="control-label" for="inputPassword"> Nama Klient &nbsp;&nbsp;</label></td>
							<td><input type="text" name="t4" id="txtcarii" value="<?php echo $re['nama_member']; ?>" class="span11" readonly><i class="icon-search"></td>
						</tr>
						<tr >
							<td><label class="control-label" for="inputPassword"> Jns Pembayaran &nbsp;&nbsp;</label></td>
							<td><input type="text" name="t5"  value="<?php echo $re['jns_bayar']; ?>" class="span11" readonly></td>
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
							<td>No</td><td>Nama Layanan</td><td>Harga</td><td>Jumlah</td><td>Harga Total</td><td></td><td></td><td></td>
						</tr>
					</thead>
					<tbody>
					<?php
					// include "fungsi.php";
					$kode = $_GET['kdo'];
					$query=mysql_query("SELECT * FROM tdetailbyr where no_kwitansi = '$kode'");
					$no=1;					
					while($r=mysql_fetch_array($query)){
					// $bayar=bayar($r[no_kwitansi]);
					?>					
						<tr>
								<td><?php echo $no; ?></td>
	                            <td><?php echo $r['nama_layanan'];?></td>
	                            <td>RP.&nbsp;<?php echo number_format($r['harga_satuan']);?></td>
                                <td><?php echo $r['jml'];?></td>
                                <td>RP.&nbsp;<?php echo number_format($r['hargaxjml']);?></td>
                        
                            
                            <td><div class="btn-group">
								
									
									<td><a href="<?php echo "$aksi?module=hapus&&id=$r[id_layanan]&&idd=$kode";?>" class="btn btn-success" ><i class="icon-pencil"></i></a></td>
									
									<td><a href="<?php echo "$aksi?module=hapus&&id=$r[id_layanan]&&idd=$kode";?>" class="btn btn-danger" ><i class="icon-trash"></i></a></td>
																		
								
							</div></td>
						</tr>
					
					<?php
					$no++;
					$gtotal = $gtotal+$r['hargaxjml'];
					}
					?>
					
	<tr>
		<td colspan='4' align='center'>Total</td>
		<td align='right'><b>RP.&nbsp;<?php echo number_format($gtotal); ?></b></td>
	
		</tr>
	
					</tbody>
				</table>
				</fieldset>
				</div>
			</div>
				</div><form name='autoSumForm' >
							</form>			
							<form name='autoSumForm' >
							<table class="table table-striped">

							<tr>
						<td><label class="control-label"  for="inputPassword">Bayar &nbsp;&nbsp;</label></td>
						<td><input type='text' name="d" placeholder='Jumlah Bayar' style="text-align:right;"  class="span12"  onFocus="startCalc();" onBlur="stopCalc();"  /></td>
						<td><input type='hidden' name='a' value="<?php echo $gtotal ?>" style="text-align:right;"  class="span3"   onFocus="startCalc();" onBlur="stopCalc();" /></td>					
						<td><input readonly type=text value='0' name="jumlah" placeholder='Kembalian' onchange='<?php echo number_format(this.form.thirdBox);?>' readonly> </td>
						</tr> 
						</table>
						</form>


							<center>
							<div class="control-group">
								<div class="controls">
								<a href="mod_pembayaran/cetak.php?kdo=<?php echo $kode ?>","blank"><button type="submit" class="btn btn-success" ><i class="icon-ok-circle icon-white"></i>Print</button></a>								
								<a href="media.php?module=pembayaran"><button type="submit" class="btn btn-success"><i class="icon-ok-circle icon-white"></i>Selesai</button></a>
								
								</div>
							</div></center>

		</div>
		</div>




	
		<div class="span6 pull-right">
		<div class="row-fluid">
			<div class="span12">
			<div id="hasil"></div>
				<div id="tabel_awal">
				<form method="post" enctype="multipart/form-data" action="<?php echo "$aksi?module=edit"; ?>">
				<fieldset>
				<legend class="span12">Layanan</legend>
				
				<table class="table table-striped">
					<thead>
						<tr class="head3">
							<td>Pilih Layanan</td><td>Jumlah</td><td>Harga</td><td>Add</td>
						</tr>
					</thead>
					<tbody>
					<?php
							$kode=$_GET['kdo'];
							$id=$_GET['id'];
							$quera=mysql_query("SELECT * FROM tdetailbyr WHERE no_kwitansi='$kode' and id_layanan='$id'");
							$ra=mysql_fetch_array($quera);
							?>
										
						<tr>
						<input class="hidden" name ="t1" type="text"   value="<?php echo $id ?>">
						<input type="hidden" name="t2" value="<?php echo $kode ?>" class="span12" >
							<td>
							
								<input class="span10" name ="t3" type="text" kdo="<?php $kdo = $_GET['kdo']; ?>" id="txtcari"  value="<?php echo $ra['nama_layanan'] ;?>" readonly><i class="icon-search"></i>
							
							</td>
							
							<td><input type="number" value="<?php echo $ra['jml'];?>" name="t4" class="span8" ></td> 
                            <!-- $id_tindakan=$r['id_layanan'];
                            $tamp=mysql_query("SELECT * FROM tlayanan");
                            while($rt=mysql_fetch_array($tamp)){
                                
                                echo "-> ".$rt['nama_layanan']."<br>";
                                
                            } -->
                           
                            <td><input class="span11" name ="t5" type="text" value="<?php echo $ra['harga_satuan']; ?>" readonly >
                            </td>
                            
                            <td><div class="btn-group">
								
									<button type="submit" class="btn btn-success"><i class="icon-ok-circle icon-white"></i>Add</button>
									
							
							</div></td>
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