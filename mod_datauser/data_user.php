<?php
$aksi="mod_datauser/aksi_datauser.php";
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
			 url:"mod_datauser/cari.php",
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
			<li class="active">Data User</li>
			
		</ul>
		<div class="control-group pull-left">
			<button class="btn btn-info" type="button" onclick="window.location='media.php?module=data_user&&act=tambah'"><i class="icon-plus icon-white"></i> Tambah User</button>
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
						<tr class="head">
							<td>No</td><td>Kode User</td><td>Nama Lengkap</td><td>Jenis Kelamin</td><td>No Handphone</td><td>Tanggal Lahir</td><td>Level Akses</td><td>View</td><td>Password</td><td></td>
						</tr>
					</thead>
					<tbody>
					<?php
					
					$query=mysql_query("SELECT * FROM user_man ORDER BY nama ASC LIMIT $posisi,$batas");
					$no=$posisi+1;					
					while($r=mysql_fetch_array($query)){
					?>					
						<tr>
						<td></td>
							<td><?php echo $no; ?></td>
							<td><?php echo $r['kodeUser']; ?></td>
							<td><?php echo $r['nama']; ?></td>
							<td><?php echo $r['sex']; ?></td>
							<td><?php echo $r['tlp']; ?></td>
							
							<td><?php echo tgl_indo($r['tgl_lahir']); ?></td>
							<td><?php echo $r['akses']; ?></td>
							<td><a href="media.php?module=detail&&kodeuser=<?php echo $r['kodeUser']; ?>"><i class="icon-zoom-in"></i></a></td>
							<td><a href="media.php?module=pass&&kodeuser=<?php echo $r['kodeUser']; ?>"><button type="submit" class="btn btn-success"></i>ubah<br>Password</button></a></td>
							<td><div class="btn-group">
								<a class="btn btn-info" href="#"><i class="icon-wrench icon-white"></i> Actions</a>
								<a class="btn btn-info dropdown-toggle" data-toggle="dropdown" href="#"><span class="caret"></span></a>
								<ul class="dropdown-menu">
									<li><a href="media.php?module=data_user&&act=edit&&kodeuser=<?php echo $r['kodeUser']; ?>"><i class="icon-pencil"></i> Edit</a></li>
									<li><a href="<?php echo "$aksi?module=hapus&&iduser=$r[id_user]";?>" onclick="return confirm('Apakah anda yakin, ingin menghapus data <?php echo $r['nama']; ?>?')"><i class="icon-trash"></i> Delete</a></li>									
								</ul>
							</div></td>
						</tr>
					
					<?php
					$no++;
					}
					?>
					<tr>
							<td colspan="7">
							<?php
							$jmldata=mysql_num_rows(mysql_query("SELECT * FROM user_man"));
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
$nounik="US-".$acak1.$acak2;
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
			 url:"mod_datauser/carin.php",
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
		<ul class="breadcrumb" style="margin-bottom: 5px;">
			<li><a href="media.php?module=data_user">Data User</a> <span class="divider"><b>&gt;</b></span></li>
			<li class="active">Tambah User</li>
		</ul>
		
		<div class="row-fluid">
			<div class="span12 pull-left">
				<form method="post" enctype="multipart/form-data" action="<?php echo "$aksi?module=tambah"; ?>">
				<fieldset>
				<legend class="span7 offset1">Tambah User</legend>
				<div class="clear"></div>
				<div class="span3 offset1">
				<div class="control-group">
								<label class="control-label" for="inputPassword">Kode User</label>
								<div class="controls">
								<input type="text" id="inputText"  class="span6" value="<?php echo $nounik; ?>" disabled>
								<input type="hidden" id="inputText"  class="span6" value="<?php echo $nounik; ?>" name="t1">
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
								<label class="control-label" for="inputPassword">No Handphone</label>
								<div class="controls">
								<input type="number" id="inputText" name="t6" required> 
								</div>
							</div>
							
							<div class="control-group">
								<label class="control-label" for="inputPassword">Alamat</label>
								<div class="controls">
								<textarea name="t5" style="width: 606px; height: 127px;" required></textarea>
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
							
									<div class="control-group">
								<label class="control-label" for="inputPassword">Nama </label>
								<div class="controls">
								<input type="text" class="span10" id="inputText" name="t2" required>
								</div>
							</div>
								<div class="control-group">
								<label class="control-label" for="inputPassword">Tanggal Lahir</label>
								<div class="controls">
								<input type="date" id="tgl"  class="span10" name="t7" required>
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

		 <div class="form-group">
		 					
                                    <label class="col-lg-3 control-label">Level</label>
                                    <div class="col-lg-9">
                                        <select name="akses" class="form-control" name="country">
                                            <?php
												include "config/koneksi.php";
												echo "<option>---- Pilih akses ----</option>";
												$minta = "SELECT * FROM level";
												$eksekusi = mysql_query($minta);
												while($hasil=mysql_fetch_array($eksekusi))
												{
												$id=$hasil['id_category'];
												echo " <option value=$hasil[id_level]>$hasil[keterangan] </option>";
												}
												?>
												</select></div></div>
							<hr>
							<div class="span12" style="border:1px solid #fff;border-radius:5px;padding:10px;background:#54c7dc">
							<ul class="pop pull-right">
								<li><a href="#" class="btn" data-toggle="popover" data-placement="right" data-content="Username &amp; Password Tidak Boleh Kosong." title="Question"><i class="icon-question-sign"></i></a></li>
							</ul>
							<div class="control-group">
								<label class="control-label" for="inputPassword">Username</label>
								<div class="controls">
								<input type="text" id="txtcarin" class="span10" name="t8" required>
								</div>
								<div id="hasiln"><div id="tabel_awaln"></div>
							</div>
			
							<div class="control-group">
								<label class="control-label" for="inputPassword">Password</label>
								<div class="controls">
								<input type="password"  class="span10" name="t9" required>
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
$kodeuser=$_GET['kodeuser'];
$query=mysql_query("SELECT * FROM user_man WHERE kodeUser='$kodeuser'");
$r=mysql_fetch_array($query);
?>
	<section>
		<ul class="breadcrumb" style="margin-bottom: 5px;">
			<li><a href="media.php?module=data_user">Data User</a> <span class="divider"><b>&gt;</b></span></li>
			<li class="active">Update User</li>
		</ul>
		
		<div class="row-fluid">
			<div class="span12 pull-left">
				<form method="post" enctype="multipart/form-data" action="<?php echo "$aksi?module=edit"; ?>">
				<fieldset>
				<legend class="span7 offset1">Update User</legend>
				<div class="clear"></div>
				<div class="span3 offset1">
				
							<div class="control-group">
								<label class="control-label" for="inputPassword">Nama </label>
								<div class="controls">
								<input type="text" class="span10" id="inputText" name="t2" value="<?php echo $r['nama']; ?>">
								<input type="hidden" id="inputText" class="span12" name="t1" value="<?php echo $r['kodeUser']; ?>">
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
									<input type="radio" name="t4" id="optionsRadios2" value="L" >
									Laki-Laki
									</label>
									<label class="radio">
									<input type="radio" name="t4" id="optionsRadios2" value="P" checked>
									Perempuan
									</label>
								
								<?php
								}
								?>
							</div>
							
							<label>&nbsp;</label>
							<div class="control-group">
								<label class="control-label" for="inputPassword">No Handphone</label>
								<div class="controls">
								<input type="number" id="inputText" name="t6" value="<?php echo $r['tlp']; ?>">
								</div>
							</div>
							
							<div class="control-group">
								<label class="control-label" for="inputPassword">Alamat</label>
								<div class="controls">
								<textarea name="t5" style="width: 606px; height: 127px;" ><?php echo $r['alamat']; ?></textarea>
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
							
							<div class="control-group">
								<label class="control-label" for="inputPassword">Tanggal Lahir</label>
								<div class="controls">
								<input type="date" id="tgl"  class="span10" name="t7"  value="<?php echo $r['tgl_lahir']; ?>">
								</div></div>
							<?php
							
							$foto=$r['photo'];
							if(isset($foto)){
								echo "<img src='photo_user/$foto' style='width:150px;height:150px'>";
							}
							  else{
                    echo "<img src='foto_pasien/not_found.png' style='width:150px;height:150px'>";
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
				<?php if ($_SESSION['akses']=="3"){?>
						<div class="control-group">
								<label class="control-label" for="inputPassword">Level</label>
								<?php
								$akses=$r['akses'];
								if($akses=='3'){
								?>
									<label class="radio">
									<input type="radio" name="t4" id="optionsRadios1" value="3" checked>
									Admin
									</label>
									<label class="radio">
									<input type="radio" name="t4" id="optionsRadios1" value="2">
									Dokter
									</label>
									<label class="radio">
									<input type="radio" name="t4" id="optionsRadios1" value="4">
									Absensi
									</label>
									<label class="radio">
									<input type="radio" name="t4" id="optionsRadios1" value="1">
									Kasir
									</label>
								<?php
								}
								elseif($akses=='2'){
								?>
									<label class="radio">
									<input type="radio" name="t4" id="optionsRadios1" value="3" >
									Admin
									</label>
									<label class="radio">
									<input type="radio" name="t4" id="optionsRadios1" value="2" checked>
									Dokter
									</label>
									<label class="radio">
									<input type="radio" name="t4" id="optionsRadios1" value="4">
									Absensi
									</label>
									<label class="radio">
									<input type="radio" name="t4" id="optionsRadios1" value="1">
									Kasir
									</label>
								<?php
								}
									elseif($akses=='1'){
								?>
									<label class="radio">
									<input type="radio" name="t4" id="optionsRadios1" value="3" >
									Admin
									</label>
									<label class="radio">
									<input type="radio" name="t4" id="optionsRadios1" value="2">
									Kasir
									</label>
									<label class="radio">
									<input type="radio" name="t4" id="optionsRadios1" value="4">
									Absensi
									</label>
									<label class="radio">
									<input type="radio" name="t4" id="optionsRadios1" value="1" checked>
									Kasir
									</label>
								<?php
								}
								else{
								?>
									<label class="radio">
									<input type="radio" name="t4" id="optionsRadios1" value="3" >
									Admin
									</label>
									<label class="radio">
									<input type="radio" name="t4" id="optionsRadios1" value="2"> 
									Kasir
									</label>
									<label class="radio">
									<input type="radio" name="t4" id="optionsRadios1" value="4" checked>
									Absensi
									</label>
									<label class="radio">
									<input type="radio" name="t4" id="optionsRadios1" value="1">
									Kasir
									</label>
								
								<?php
								}
								?>
							</div>
							<hr><?php }?>


							<?php if ($_SESSION['akses']=="3"){?>
							<div class="span12" style="border:1px solid #fff;border-radius:5px;padding:10px;background:#54c7dc">
							<ul class="pop pull-right">
								<li><a href="#" class="btn" data-toggle="popover" data-placement="right" data-content="Username &amp;  Tidak Boleh Kosong." title="Question"><i class="icon-question-sign"></i></a></li>
							</ul>
							<div class="control-group">
								<label class="control-label" for="inputPassword">Username</label>
								<div class="controls">
								<input type="text" id="inputText" class="span12" name="t8"  value="<?php echo $r['username']; ?>">
								</div>
							</div>
			
							
							</div>
							<?php } ?>

				</div>
							</fieldset>
						</form>	
			</div>
		</div>
	</section>
	
<?php
break;
}
?>