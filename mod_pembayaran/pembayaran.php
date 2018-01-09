<?php
$aksi="mod_pembayaran/aksi_pembayaran.php";
switch($_GET['act']){
	default:
	?>
	<!-- ---------------------------------Pencarian--------------------------------- -->
	<script type="text/javascript">
		 $(document).ready(function() {
		  <!-- event textbox keyup
		 
		   $("#txtcarii").keyup(function() {
		   var strcari = $("#txtcarii").val();
		   if (strcari != "")
		   {
		   $("#tabel_awall").css("display", "none");

			$("#hasill").html("<img src='img/loader.gif'/>")
			$.ajax({
			 type:"post",
			 url:"mod_pembayaran/cari_user.php",
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
<!-- ---------------------------------Paging--------------------------------- -->
	<?php
	$p      = new Paging;
    $batas  = 10;
    $posisi = $p->cariPosisi($batas);


$time_stamp = date("sdy");
$acak1=$time_stamp;
function acakangkahuruf($panjang)
{
    $karakter= '0123456789';
    $string = '';
    for ($i = 0; $i < $panjang; $i++) {
  $pos = rand(0, strlen($karakter)-1);
  $string .= $karakter{$pos};
    }
    return $string;
}
$acak2=acakangkahuruf(3);
$nounik="KW-".$acak1.$acak2;
?>

	<section>
	<?php
    //set default kosong

      $id='';
    $nama='';
     
     if($_GET['kdd']){
            $id_user = $_GET['kdd'];
                        
     
            $sql= "select id_member,nama_member from tmember where id_member ='$id_user'";
            $hasil = mysql_query($sql) or die(mysql_error());
        $count = mysql_num_rows($hasil);
        $datax= mysql_fetch_array($hasil);
     
        if($count > 0){
            $id = $datax['id_member'];
            $nama = $datax['nama_member'];
        }else{
            echo "<script> alert('data tidak ada'); </script>";
        }
    }
    ?>
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
							<td><input type="text" name="t1" value="<?php echo $nounik ?>" class="span12"></td>
						</tr>
						<tr >
							<td><label class="control-label" for="inputPassword"> Tgl Transaksi &nbsp;&nbsp;</label></td>
							<td><input type="text" name="t2" id="tgl" value="<?php echo date('Y-m-d'); ?>" class="span12"></td>
						</tr>
						<tr >
							<td><label class="control-label" for="inputPassword"> ID.klient &nbsp;&nbsp;</label></td>
							<td><input type="text" name="t3" id="txtcarii" value="<?php echo $id ?>" class="span11" required><i class="icon-search"></td>
						</tr>
						<tr >
							<td><label class="control-label" for="inputPassword"> Nama Klient &nbsp;&nbsp;</label></td>
							<td><input type="text" name="t4" id="txtcarii" value="<?php echo $nama ?>" class="span11"><i class="icon-search"></td>
						</tr>
						<tr >
							<td><label class="control-label" for="inputPassword"> Jns Pembayaran &nbsp;&nbsp;</label></td>
							<td>
								<div class="control-group">
								
								<div class="controls">
                                <select class="span11" id="inputText" name="t5" required>
                                    <option selected disabled>- Jenis Pembayaran -</option>    
                                     
                                    <option value="baru">Baru</option>    
                                    <option value="perpanjang">Perpanjang</option> 
                                    <option value="kunjungan">Kunjungan</option>
                                    <option value="pemeriksaan">Pemeriksaan</option>
                                    <option value="konsultasi">Konsultasi</option>  
                                    <option value="lainnya">Lainnya</option>        
                                    
                                </select>
				
								</div>
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
		
	<?php

	 $layan='';
    $harga='';
     
     if($_GET['kd']){
            $id_layanan = $_GET['kd'];
                        
     
            $sql= "select nama_layanan,harga,id_layanan from tlayanan where id_layanan ='$id_layanan'";
            $hasil = mysql_query($sql) or die(mysql_error());
        $count = mysql_num_rows($hasil);
        $datax= mysql_fetch_array($hasil);
     
        if($count > 0){
            $id_layanan = $datax['id_layanan'];
            $layan = $datax['nama_layanan'];
            $harga = $datax['harga'];
        }else{
            echo "<script> alert('data tidak ada'); </script>";
        }
    } ?>

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
								
									
									<td><a href="<?php echo "media.php?module=edit&&act=edit&&id=$r[id_layanan]&&kdo=$kode";?>" class="btn btn-success" ><i class="icon-pencil"></i></a></td>
									
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
								<td><button class="btn btn-success" onclick="window.location='mod_pembayaran/cetak.php?kdo=<?php echo $kode ?>'" target="blank"><i class="fa fa-print"></i></button>
								<!-- <a href="mod_pembayaran/cetak.php?kdo=<?php echo $kode ?>","blank"><button type="submit" class="btn btn-success" ><i class="icon-ok-circle icon-white"></i>Print</button></a> -->								
								<a href="media.php?module=pembayaran"><button type="submit" class="btn btn-success"><i class="icon-ok-circle icon-white"></i>Selesai</button></a>
								
								</div>
							</div></center>

		</div>
		</div>




	
		<div class="span6 pull-right">
		<div class="row-fluid">
			<div class="span12">
			<div id="hasil"></div>
			<legend class="span12">Layanan</legend>
			<tr >
				<form method="post" enctype="multipart/form-data" action="<?php echo "$aksi?module=t"; ?>">
							<table>
							<td>
								 <div class="form-group">
		 					
                                    <div class="col-lg-9">
                                    	<input type="hidden" name="t2" value="<?php echo $kode ?>" class="span12" >
                                        <select name="paket" class="form-control" name="country">
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
							
							</td>
						
							<td>&nbsp;</td><td>&nbsp;</td>
							<td><div class="btn-group">
								
									<button type="submit" class="btn btn-success"><i class="icon-ok-circle icon-white"></i>Go</button>
															
							</div></td>
						</tr></table></form>
				<div id="tabel_awal">
				<form method="post" enctype="multipart/form-data" action="<?php echo "$aksi?module=tambahl"; ?>">
				<fieldset>
				
				
				<table class="table table-striped">
					<thead>
						<tr class="head3">
							<td>Pilih Layanan</td><td>Jumlah</td><td>Harga</td><td>Add</td>
						</tr>
					</thead>
					<tbody>
					
					
										
						<tr>
						<input class="hidden" name ="t1" type="text"   value="<?php echo $id_layanan ?>">
						<input type="hidden" name="t2" value="<?php echo $kode ?>" class="span12" >
							<td>
							
								<input class="span10" name ="t3" type="text" kdo="<?php $kdo = $_GET['kdo']; ?>" id="txtcari"  value="<?php echo $layan ?>" ><i class="icon-search"></i>
							
							</td>
							
							<td><input type="number" value="1" name="t4" class="span8" ></td> 
                            <!-- $id_tindakan=$r['id_layanan'];
                            $tamp=mysql_query("SELECT * FROM tlayanan");
                            while($rt=mysql_fetch_array($tamp)){
                                
                                echo "-> ".$rt['nama_layanan']."<br>";
                                
                            } -->
                           
                            <td><input class="span11" name ="t5" type="text" value="<?php echo $harga ?>" required   >
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