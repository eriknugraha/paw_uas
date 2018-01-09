<?php
$aksi="mod_pembayaran/aksi_pembayaran.php";
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
		   $("#tabel_awall").css("display", "none");

			$("#hasill").html("<img src='img/loader.gif'/>")
			$.ajax({
			 type:"post",
			 url:"mod_pembayaran/cari.php",
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
    }

    ?>
		<ul class="breadcrumb" style="margin-bottom: 5px;">
			<li class="active">Pembayaran</li>			
		</ul>
		<div class="control-group pull-left"></div>
		<div class="span6 pull-left">		
			<div class="row-fluid">
			<div class="span12"  style="background:#f9f9f9;padding:10px;">
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
							<td><input type="text" name="t2" value="<?php echo date('Y-m-d'); ?>" class="span12"></td>
						</tr>
						<tr >
							<td><label class="control-label" for="inputPassword"> ID.klient &nbsp;&nbsp;</label></td>
							<td><input type="text" name="t3" id="txtcarii" value="<?php echo $id ?>" class="span11"><i class="icon-search"></td>
						</tr>
						<tr >
							<td><label class="control-label" for="inputPassword"> Nama Klient &nbsp;&nbsp;</label></td>
							<td><input type="text" name="t4" id="txtcarii" value="<?php echo $nama ?>" class="span11"><i class="icon-search"></td>
						</tr>
					</thead></table>
				
						
							
							
							<hr>
							<div class="control-group">
								<div class="controls">								
								<button type="submit" class="btn btn-success"><i class="icon-ok-circle icon-white"></i> Simpan</button>
								<button type="reset" class="btn btn-warning"><i class="icon-refresh icon-white"></i> Reset</button>
								</div>
							</div>
				</div>
				
							</fieldset>
						</form>	

				

			</div>
	
		<div class="row-fluid">
			<div class="span12">
			<div id="hasil"></div>
				<div id="tabel_awal">
				<br>
				<fieldset>
				<h5 class="span12">Layanan yang di pilih :  </h5>
				
				<table class="table table-striped">
					<thead>
						<tr class="head3">
							<td>No</td><td>Nama Layanan</td><td>Harga</td><td>Jumlah</td><td>Harga Total</td><td></td>
						</tr>
					</thead>
					<tbody>
					<?php
					
					$query=mysql_query("SELECT * FROM tlayanan");
					$no=1;					
					while($r=mysql_fetch_array($query)){
					?>					
						<tr>
							<td><?php echo $no; ?></td>
							<td><?php echo $r['nama_layanan'];?></td> 
                            <!-- $id_tindakan=$r['id_layanan'];
                            $tamp=mysql_query("SELECT * FROM tlayanan");
                            while($rt=mysql_fetch_array($tamp)){
                                
                                echo "-> ".$rt['nama_layanan']."<br>";
                                
                            } -->
                           
                            <td>RP.&nbsp;<?php echo $r['harga'];?>
                             <td>RP.&nbsp;<?php echo $r['harga'];?>
                              <td>RP.&nbsp;<?php echo $r['harga'];?>
                            </td>
                            
                            <td><div class="btn-group">
								<a class="btn btn-danger" href="#"><i class="icon-wrench icon-white"></i> Actions</a>
								<a class="btn btn-danger dropdown-toggle" data-toggle="dropdown" href="#"><span class="caret"></span></a>
								<ul class="dropdown-menu">
									<li><a href="media.php?module=tindakan&&act=edit&&id_tindakan=<?php echo $r['id_layanan']; ?>"><i class="icon-pencil"></i> Edit</a></li>
									<li><a href="<?php echo "$aksi?module=hapus&&id_tindakan=$r[id_layanan]";?>" onclick="return confirm('Apakah anda yakin, ingin menghapus layanan<?php echo $r['nama_layanan']; ?>?')"><i class="icon-trash"></i> Delete</a></li>									
								</ul>
							</div></td>
						</tr>
					
					<?php
					$no++;
					}
					?>
					
	<tr>
		<td colspan='4' align='center'>Total</td>
		<td align='right'><b>".number_format($gtotal)."</b></td>
		</tr>
	
					</tbody>
				</table>
				</fieldset>
				</div>
			</div>
		</div>



		</div>
		</div>


	
		<div class="span6 pull-right">
		<div class="row-fluid">
			<div class="span12">
			<div id="hasil"></div>
				<div id="tabel_awal">
				<fieldset>
				<legend class="span12">Layanan</legend>
				
				<table class="table table-striped">
					<thead>
						<tr class="head3">
							<td>Pilih Layanan</td><td>Jumlah</td><td>Harga</td><td>Add</td>
						</tr>
					</thead>
					<tbody>
					
					
										
						<tr>
							<td>
							
								<input class="span11" name ="t1" type="text" id="txtcari"  value="<?php echo $layan ?>" ><i class="icon-search"></i>
							
							</td>
							<td><input type="text" name="t1" class="span11" value="<?php echo $r['nama_layanan']; ?>"></td> 
                            <!-- $id_tindakan=$r['id_layanan'];
                            $tamp=mysql_query("SELECT * FROM tlayanan");
                            while($rt=mysql_fetch_array($tamp)){
                                
                                echo "-> ".$rt['nama_layanan']."<br>";
                                
                            } -->
                           
                            <td><input class="span11" name ="t2" type="text" value="<?php echo $harga ?>" >
                            </td>
                            
                            <td><div class="btn-group">
								
									<a href="media.php?module=tindakan&&act=edit&&id_tindakan=<?php echo $r['id_layanan']; ?>"><i class="icon-pencil"></i> Edit</a>
									
							
							</div></td>
						</tr>
					
				
							
					</tbody>
				
				</table>
				</fieldset>
				</div>

<!-- hasil -->
<div id="hasill"></div>
				<div id="tabel_awall"></div>
			     </div>
		</div>
		</div>


 
							
						</div>   


	</section>

<?php }?>