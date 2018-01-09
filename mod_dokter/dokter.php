
<?php

$aksi="mod_dokter/aksi_dokter.php";
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
			 url:"mod_dokter/cari.php",
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
			<li class="active">Data Dokter</li>
			
		</ul>
		<?php if ($_SESSION['akses']=="3"){ ?>
		<div class="control-group pull-left">
			<button class="btn btn-success" type="button" onclick="window.location='media.php?module=dokter&&act=tambah'"><i class="icon-plus icon-white"></i> Tambah Dokter</button>
		</div><?php }?>
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
						<tr class="head2">
							
							<td>ID Dokter</td>
							<td>Nip</td>
							<td>Nama Dokter</td>
							<td>Tempat Lahir</td>
							<td>TGL_Lahir</td>
							<td>JK</td>
							
							<td>No Hp</td>
					        <td>View</td>
					        <?php if (($_SESSION['akses']=="3")||($_SESSION['akses']=="1"))
                            { ?>
					        <td>Password</td><?php }?>
								<td></td>
						</tr>
					</thead>
					<tbody>
					

					<?php
					
					$query=mysql_query("SELECT *from tdokter ORDER BY nama ASC LIMIT $posisi,$batas");
					
					$no=$posisi+1;					
					while($r=mysql_fetch_array($query)){
					?>					
						<tr>
							<td><?php echo $r['id_dokter']; ?></td>
							<td><?php echo $r['nip']; ?></td>
							<td><?php echo $r['nama']; ?></td>
							<td><?php echo $r['tempat_lahir']; ?></td>
							<td><?php echo tgl_indo($r['tgl_lahir']); ?></td>
							<td><?php echo $r['sex']; ?></td>
							<td><?php echo $r['tlp']; ?></td>
							
						
							<td><a href="media.php?module=detaild&&kodedk=<?php echo $r['id_dokter']; ?>"><i class="icon-zoom-in"></i></a></td>
						
								<?php if (($_SESSION['akses']=="3")||($_SESSION['akses']=="1")){ ?>
								<td><a href="media.php?module=pas&&id=<?php echo $r['id_dokter']; ?>"><button type="submit" class="btn btn-success"></i>ubah<br>Password</button></a></td>
							 <td><div class="btn-group">
								<a class="btn btn-success" href="#"><i class="icon-wrench icon-white"></i> Actions</a>
								<a class="btn btn-success dropdown-toggle" data-toggle="dropdown" href="#"><span class="caret"></span></a>
								<ul class="dropdown-menu">
									<li><a href="media.php?module=dokter&&act=edit&&kodedk=<?php echo $r['id_dokter']; ?>"><i class="icon-pencil"></i> Edit</a></li>
									<li><a href="<?php echo "$aksi?module=hapus&&kodedk=$r[id_dokter]";?>" onclick="return confirm('Apakah anda yakin, ingin menghapus data dokter <?php echo $r['nama']; ?>?')"><i class="icon-trash"></i> Delete</a></li>									
								</ul>
							</div></td><?php }?>
						</tr>
					
					<?php
					
					}
					?>
					<tr>
							<td colspan="7">
							<?php
							$jmldata=mysql_num_rows(mysql_query("SELECT * from tdokter"));
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
case "tambah":
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
$nounik="DK-".$acak1.$acak2;


function acakangkahuruff($panjang)
{
    $karakter= '0123456789';
    $string = '';
    for ($i = 0; $i < $panjang; $i++) {
  $pos = rand(0, strlen($karakter)-1);
  $string .= $karakter{$pos};
    }
    return $string;
}
$acak3=acakangkahuruff(3);
$nounikk="US-".$acak1.$acak3;
	?>
	<script type="text/javascript">
		 $(document).ready(function() {
		  <!-- event textbox keyup
		  $("#txtcarin").keyup(function() {
		   var strcari = $("#txtcarin").val();
		   if (strcari != "")
		   {
		   $("#tabel_awaln").css("display", "none");

			$("#hasiln").html("<img src='img/loader.gif'/>")
			$.ajax({
			 type:"post",
			  url:"mod_dokter/carin.php",
			 data:"q="+ strcari,
			 success: function(data){
			 $("#hasiln").css("display", "block");
			  $("#hasiln").html(data);
			  
			 }
			});
		   }
		   else{
		   $("#hasiln").css("display", "none");
		   $("#tabel_awaln").css("display", "block");
		   }
		  });
			});
	</script>
		<section>

		<ul class="breadcrumb" style="margin-bottom:5px;">
			<li><a href="media.php?module=dokter">Data Dokter</a> <span class="divider"><b>&gt;</b></span></li>
			<li class="active">Tambah Dokter</li>
		</ul>
		
		<div class="row-fluid">
			<div class="span12 pull-left">
				<form method="post" enctype="multipart/form-data" action="<?php echo "$aksi?module=tambah"; ?>">
				<input type="hidden" class="span10" id="inputText" value="<?php echo $nounikk; ?>" name="t7">
				<fieldset>
				<legend class="span7 offset1">Tambah Dokter</legend>
				<div class="clear"></div>
				<div class="span3 offset1">
							<div class="control-group">
								<label class="control-label" for="inputPassword">ID Dokter</label>
								<div class="controls">
								
								<input type="text" id="inputText"  class="span10" value="<?php echo $nounik; ?>" name="t1" readonly>
								</div>
							</div>
							<div class="control-group">
								<label class="control-label" for="inputPassword">NIP</label>
								<div class="controls">
								<input type="text" id="inputText" class="span10" name="t9" required> 
								</div>
							</div>
				
							<div class="control-group">
								<label class="control-label" for="inputPassword">Nama </label>
								<div class="controls">
								<input type="text" class="span10" id="inputText" name="t2" required>
								</div>
							</div>

							
							<div class="control-group">
								<label class="control-label" for="inputPassword">Jenis Kelamin</label>
								<label class="radio">
								<input type="radio" name="t4" id="optionsRadios1" value="L" required>
								Laki-Laki
								</label>
								<label class="radio">
								<input type="radio" name="t4" id="optionsRadios1" value="P" required>
								Perempuan
								</label>
							</div>
							
							
							<div class="control-group">
								<label class="control-label" for="inputPassword">Alamat</label>
								<div class="controls">
								<textarea row ="5"name="t5" class="span12" style="width: 952px; height: 122px;" required></textarea>
								</div>
							</div>
							
						
							<hr>
							<div class="control-group">
								<div class="controls">								
								<button type="submit" class="btn btn-success"><i class="icon-ok-circle icon-white"></i> Simpan</button>
								<button type="reset" class="btn btn-warning"><i class="icon-refresh icon-white"></i> Reset</button>
								</div>
							</div>
				</div>
				<div class="span3">	
				<tr>						
							<div class="control-group">
								<label class="control-label" for="inputPassword">Tempat Lahir</label>
								<div class="controls">
								<input type="text" id="inputText"  class="span10" name="t3" required>
								</div>
							</div>
							<div class="control-group">
								<label class="control-label" for="inputPassword">Tanggal Lahir</label>
								<div class="controls">
								<input type="date" id="tgl"  class="span10" name="t8" required>
								</div>
							</div>

							<div class="control-group">
								<label class="control-label" for="inputPassword">No Handphone</label>
								<div class="controls">
								<input type="number" id="inputText" class="span10" name="t6" required> 
								</div>
							</div>
								<div class="control-group">
								<label class="control-label" for="inputPassword">Photo</label>
								<div class="controls">
								<input type="file" name="fupload">
								</div>
							</div>
							
</div>
							<div class="span3">							
							<div class="span12" style="border:1px solid #fff;border-radius:5px;padding:10px;background:#54c7dc">
							<ul class="pop pull-right">
								<li><a href="#" class="btn" data-toggle="popover" data-placement="right" data-content="Username &amp; Password Tidak Boleh Kosong." title="Question"><i class="icon-question-sign"></i></a></li>
							</ul>
							<div class="control-group">
								<label class="control-label" for="inputPassword">Username</label>
								<div class="controls">
								<input type="text"  id="txtcarin" class="span12" name="t10" required>
								<div id="hasiln"><div id="tabel_awaln"></div>
								</div>
							</div>
			
							<div class="control-group">
								<label class="control-label" for="inputPassword">Password</label>
								<div class="controls">
								<input type="password" id="inputPassword" class="span12" name="t11" required>
								</div>
							</div>
							<div class="control-group">
								
								<div class="controls">
								<input type="hidden" id="inputPassword" class="span12" value="2" name="t12" required>
								</div>
							</div>

							</div>
							</div>



								
							</fieldset>
						</form>	
			</div>
		</div>
	</section>

	
	<?php
break;

case "edit":
$kodedk=$_GET['kodedk'];
$query=mysql_query("SELECT * FROM tdokter WHERE id_dokter='$kodedk'");
$r=mysql_fetch_array($query);
?>
	<section>
		<ul class="breadcrumb" style="margin-bottom: 5px;">
			<li><a href="media.php?module=dokter">Data Dokter</a> <span class="divider"><b>&gt;</b></span></li>
			<li class="active">Update Dokter</li>
		</ul>
		
		<div class="row-fluid">
			<div class="span12 pull-left">
				<form method="post" action="<?php echo "$aksi?module=edit"; ?>">
				<fieldset>
				<legend class="span7 offset1">Ubah Dokter</legend>
				<div class="clear"></div>
				<div class="span3 offset1">	
				<div class="control-group">
								<label class="control-label" for="inputPassword">ID Dokter</label>
								<div class="controls">
								
								<input type="text" id="inputText"  class="span10" value="<?php echo $r['id_dokter']; ?>" name="t1" readonly>
								</div>
							</div>
								<div class="control-group">
								<label class="control-label" for="inputPassword">NIP</label>
								<div class="controls">
								<input type="text" id="inputText" class="span10" value="<?php echo $r['nip']; ?>"name="t9" required> 
								</div>
							</div>
							<div class="control-group">
								<label class="control-label" for="inputPassword">Nama </label>
								<div class="controls">
								<input type="text" class="span12" id="inputText"  value="<?php echo $r['nama']; ?>" name="t2" required>
							
								</div>
							</div>
				
							
							
							<div class="control-group">
								<label class="control-label" for="inputPassword">Jenis Kelamin</label>
								<?php
								$jk=$r['sex'];
								if($jk=='L'){
								?>
								<label class="radio">
								<input type="radio" name="t4" id="optionsRadios1" value="L" checked>
								Laki-Laki
								</label>
								<label class="radio">
								<input type="radio" name="t4" id="optionsRadios1" value="P">
								Perempuan
								</label>
								<?php
								}
								else{
								?>
								<label class="radio">
								<input type="radio" name="t4" id="optionsRadios1" value="L">
								Laki-Laki
								</label>
								<label class="radio">
								<input type="radio" name="t4" id="optionsRadios1" value="P" checked>
								Perempuan
								</label>
								<?php
								}
								?>
							</div>
							
							
							<div class="control-group">
								<label class="control-label" for="inputPassword">Alamat</label>
								<div class="controls">
								<textarea row ="5"name="t5" class="span12"  style="width: 952px; height: 122px;" required><?php echo $r['alamat']; ?></textarea>
								</div>
							</div>
							
						
							<hr>
							<div class="control-group">
								<div class="controls">								
								<button type="submit" class="btn btn-success"><i class="icon-ok-circle icon-white"></i> Simpan</button>
								<button type="reset" class="btn btn-warning"><i class="icon-refresh icon-white"></i> Reset</button>
								</div>
							</div>
				</div>
				<div class="span3">	
				<tr>						
							<div class="control-group">
								<label class="control-label" for="inputPassword">Tempat Lahir</label>
								<div class="controls">
								<input type="text" id="inputText" value="<?php echo $r['tempat_lahir']; ?>" class="span10" name="t3" required>
								</div>
							</div>
							<div class="control-group">
								<label class="control-label" for="inputPassword">Tanggal Lahir</label>
								<div class="controls">
								<input type="date" id="tgl"  class="span10" value="<?php echo $r['tgl_lahir']; ?>"name="t8" required>
								</div>
							</div>

							
							 <?php
							
							$foto=$r['photo'];
							if(isset($foto)){
								echo "<img src='photo_user/$foto' style='width:100px;height:100px'>";
							}
							  else{
                    echo "<img src='foto_pasien/not_found.png' style='width:100px;height:100px'>";
							}
							?>
							<img src="">
							
							<div class="control-group">
								
								<div class="controls">
								<input type="file" name="fupload">
								</div>
							</div>
							
							
							
</div>
							<div class="span3">	
							<div class="control-group">
								<label class="control-label" for="inputPassword">No Handphone</label>
								<div class="controls">
								<input type="number" id="inputText" class="span10" value="<?php echo $r['tlp']; ?>"name="t6" required> 
								</div>
							</div>	

								<?php if ($_SESSION['akses']=="3"){?>				
							<div class="span12" style="border:1px solid #fff;border-radius:5px;padding:10px;background:#54c7dc">
							<ul class="pop pull-right">
								<li><a href="#" class="btn" data-toggle="popover" data-placement="right" data-content="Username &amp; Password Tidak Boleh Kosong." title="Question"><i class="icon-question-sign"></i></a></li>
							</ul>
							<div class="control-group">
								<label class="control-label" for="inputPassword">Username</label>
								<div class="controls">
								<input type="text" id="inputText" class="span12" value="<?php echo $r['username']; ?>" name="t10" required>
								</div>
							</div>
			
							
							<div class="control-group">
								
								<div class="controls">
								<input type="hidden" id="inputPassword" class="span12" value="2" name="t12" required>
								</div>
							</div>

							</div>
							</div><?php } ?>
							</fieldset>
						</form>	
			</div>
		</div>
	</section>
	
<?php
break;
}
?>

