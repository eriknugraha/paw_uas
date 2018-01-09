<?php
$aksi="mod_pasien/aksi_pasien.php";
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
			 url:"mod_pasien/cari.php",
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
		<?php if (($_SESSION['akses']=="3")||($_SESSION['akses']=="1")){ ?>
		<div class="control-group pull-left">
			<button class="btn btn-primary" type="button" onclick="window.location='media.php?module=data_pasien&&act=tambah_pasien'"><i class="icon-plus icon-white"></i> Tambah Member</button>
            
            
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
						<tr class="head1" style="center">
							<td><center>No</td>
							<td><center>ID member</td>
							
							<td><center>Nama Member</td>
							<td><center>TTL</td>
							<td><center>Jenis Kelamin</td>
							
							
							<td><center>No Telp</td>
							
							<td><center>Umur</td>
							 <td>View</td>
							<td></td><td></td>
						</tr></center>
					</thead>
					<tbody>
					<?php					
					$query=mysql_query("SELECT * FROM tmember where status ='member' ORDER BY nama_member ASC LIMIT $posisi,$batas");
					$no=$posisi+1;
					while($r=mysql_fetch_array($query)){
					?>					
						<tr >
							<td><center><?php echo $no; ?></td>
							<td><center><?php echo $r['id_member']; ?></td>
							
							<td><center><?php echo $r['nama_member']; ?></td>
							<td><center><?php echo $r['tempat_lahir']; ?>,<?php echo $r['tgl_lahir']; ?></td>
							
							<td><center><?php echo $r['sex']; ?></td>
							
							
							<td><center><?php echo $r['tlp']; ?></td>
							

                            <td><center><?php
                            
                         
                            $tgl=$r['tgl_lahir'];
                            $ambil_thn=substr($tgl,0,4);
                            $thn_sekarang=date('Y');
                            $umur=$thn_sekarang-$ambil_thn;
                            echo $umur." Tahun";
                            ?></td>
                            <td><a href="media.php?module=detailm&&kodepasien=<?php echo $r['id_member']; ?>"><i class="icon-zoom-in"></i></a></td>
                           
                            <td><center></td>
                            <?php if (($_SESSION['akses']=="3")||($_SESSION['akses']=="1")){ ?>
                            <td><div class="btn-group">
								<a class="btn btn-primary" href="#"><i class="icon-wrench icon-white"></i> Actions</a>
								<a class="btn btn-primary dropdown-toggle" data-toggle="dropdown" href="#"><span class="caret"></span></a>
								<ul class="dropdown-menu">
									<li><a data-toggle="modal" href="#<?php echo $r['id_member'] ?>" target="blank"><i class="fa fa-credit-card"></i> Cetak Kartu</a></li>
									<li><a href="media.php?module=data_pasien&&act=edit&&kodepasien=<?php echo $r['id_member']; ?>"><i class="icon-pencil"></i> Edit</a></li>
									<li><a href="<?php echo "$aksi?module=hapus&&kodepasien=$r[id_member]";?>" onclick="return confirm('Apakah anda yakin, ingin menghapus data pasien <?php echo $r['nama_pasien']; ?>?')"><i class="icon-trash"></i> Delete</a></li>									
								</ul>
							</div></td>
						</tr>
						<div id="<?php echo $r['id_member'] ?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
							
							<div class="modal-body">
								<h3>Cetak Kartu</h3>
								<a href="front.php?id=<?php echo $r['id_member']; ?>" style="padding:0px 25px;">
								    <img src="img/depan.png">
                                </a>
                                <a href="end.php?id=<?php echo $r['id_member']; ?>" style="padding:0px 25px;">
                                    <img src="img/belakang.png">
                                </a>
							</div>
							
						</div><?php } ?>
					
					<?php
					$no++;
					}
					?>
					<tr>
							<td colspan="6">
							<?php
							$jmldata=mysql_num_rows(mysql_query("SELECT * FROM tmember where status='member'"));
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
case "tambah_pasien":
?>

<?php

$today = date("Y");
$th_sekarang=substr($today,2,2);
 $query1 = "SELECT max(id_member) as maxID FROM tmember WHERE id_member LIKE '$th_sekarang%'";
    $hasil = mysql_query($query1);
    $data = mysql_fetch_array($hasil);
    $idMax = $data['maxID'];

    $NoUrut = (int) substr($idMax, 3, 6);
    $NoUrut++; //nomor urut +1
$nounik = $th_sekarang.sprintf('%06s', $NoUrut);

	?>


	<section>
		<ul class="breadcrumb" style="margin-bottom: 5px;">
			<li><a href="media.php?module=data_pasien">Data Member</a> <span class="divider"><b>&gt;</b></span></li>
			<li class="active">Tambah Member</li>
		</ul>
		
		<div class="row-fluid">
			<div class="span12 pull-left">
				<form method="post" enctype="multipart/form-data" action="<?php echo "$aksi?module=tambah_pasien"; ?>">
				<fieldset>
				<legend class="span7 offset1">Tambah Member</legend>
				<div class="clear"></div>
				<div class="span3 offset1">
							<div class="control-group">
								<label class="control-label" for="inputPassword">ID Member</label>
								<div class="controls">
								
								<input type="text" id="inputText"  class="span10" value="<?php echo $nounik; ?>" name="t1" readonly>
								</div>
							</div>
				
							<div class="control-group">
								<label class="control-label" for="inputPassword">Nama Member</label>
								<div class="controls">
								<input type="text" class="span10" id="inputText" name="t2" required>
								</div>
							</div>
							
							<div class="control-group">
								<label class="control-label" for="inputPassword">Jenis Kelamin</label>
								<label class="radio">
								<input type="radio" name="t3" id="optionsRadios1" value="L" required>
								Laki-Laki
								</label>
								<label class="radio">
								<input type="radio" name="t3" id="optionsRadios1" value="P" required>
								Perempuan
								</label>
							</div>
							
							
							<div class="control-group">
								<label class="control-label" for="inputPassword">Job</label>
								<div class="controls">
								<input type="text" id="inputText" class="span10" name="t7" required> 
								</div>
							</div>
							
							<div class="control-group">
								<label class="control-label" for="inputPassword">Alamat</label>
								<div class="controls">
								<textarea row ="5"name="t8" class="span12" style="width: 952px; height: 122px;" required></textarea>
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
								<label class="control-label" for="inputPassword">Tempat Lahir</label>
								<div class="controls">
								<input type="text" id="inputText" class="span10" name="t4" required> 
								</div>
							</div>
							<div class="control-group">
								<label class="control-label" for="inputPassword">Tanggal Lahir</label>
								<div class="controls">
								<input type="date" id="inputText"  class="span10" name="t5" required>
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
							<div class="control-group">
								<label class="control-label" for="inputPassword">Tanggal Daftar</label>
								<div class="controls">
								<input type="date" id="tgld"  class="span10" value="<?php echo date('Y-m-d'); ?>" name="t9" required>
								</div>
							</div>	
							<div class="control-group">
								<label class="control-label" for="inputPassword">Kunjungan pertama</label>
								<div class="controls">
								<input type="date" id="tglp"  class="span10" value="<?php echo date('Y-m-d'); ?>" name="t10" required>
								</div>
							</div>
							<div class="control-group">
								<label class="control-label" for="inputPassword">Last Register</label>
								<div class="controls">
								<?php $besok = date('Y-m-d', strtotime("+30 day", strtotime(date('Y-m-d')))); ?> 
								<input type="date" id="inputText"  class="span10" value="<?php echo $besok ?>" name="t11" required>
								</div>
							</div>		
								<div class="control-group">
								<label class="control-label" for="inputPassword">Status</label>
								<div class="controls">
								<input type="text" id="inputText"  class="span10" name="t12" value="Member" readonly>
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
$kodepasien=$_GET['kodepasien'];
$query=mysql_query("SELECT * FROM tmember WHERE id_member='$kodepasien'");
$r=mysql_fetch_array($query);
?>
	<section>
		<ul class="breadcrumb" style="margin-bottom: 5px;">
			<li><a href="media.php?module=data_pasien">Data Member</a> <span class="divider"><b>&gt;</b></span></li>
			<li class="active">Update Member</li>
		</ul>
		
		<div class="row-fluid">
			<div class="span12 pull-left">
				<form method="post" enctype="multipart/form-data" action="<?php echo "$aksi?module=edit"; ?>">
				<fieldset>
				<legend class="span7 offset1">Tambah Member</legend>
				<div class="clear"></div>
				<div class="span3 offset1">
							<div class="control-group">
								<label class="control-label" for="inputPassword">ID Member</label>
								<div class="controls">
								
								<input type="text" id="inputText"  class="span10" value="<?php echo $r['id_member']; ?>" name="t1" readonly>
								</div>
							</div>
				
							<div class="control-group">
								<label class="control-label" for="inputPassword">Nama Member</label>
								<div class="controls">
								<input type="text" class="span10" id="inputText" value="<?php echo $r['nama_member']; ?>" name="t2" required>
								</div>
							</div>
							
							<div class="control-group">
								<label class="control-label" for="inputPassword">Jenis Kelamin</label>
								<?php
								$jk=$r['sex'];
								if($jk=='L'){
								?>
									<label class="radio">
									<input type="radio" name="t3" id="optionsRadios1" value="L" checked>
									Laki-Laki
									</label>
									<label class="radio">
									<input type="radio" name="t3" id="optionsRadios1" value="P">
									Perempuan
									</label>
								<?php
								}
								else{
								?>
									<label class="radio">
									<input type="radio" name="t3" id="optionsRadios2" value="L" >
									Laki-Laki
									</label>
									<label class="radio">
									<input type="radio" name="t3" id="optionsRadios2" value="P" checked>
									Perempuan
									</label>
								
								<?php
								}
								?>
							</div>
							
							
							<div class="control-group">
								<label class="control-label" for="inputPassword">Job</label>
								<div class="controls">
								<input type="text" id="inputText" class="span10" value="<?php echo $r['pekerjaan']; ?>" name="t7" required> 
								</div>
							</div>
							<div class="control-group">
								<label class="control-label" for="inputPassword">Tempat Lahir</label>
								<div class="controls">
								<input type="date" id="inputText" value="<?php echo $r['tempat_lahir']; ?>" class="span10" name="t4" required>
								</div>
							</div>
							
							<div class="control-group">
								<label class="control-label" for="inputPassword">Alamat</label>
								<div class="controls">
								<textarea row ="5"name="t8" class="span12" style="width: 952px; height: 122px;" required><?php echo $r['alamat']; ?></textarea>
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
								<input type="date" id="tgl"class="span10" value="<?php echo $r['tgl_lahir']; ?>"name="t5" required>

								</div>
							</div>

							<div class="control-group">
								<label class="control-label" for="inputPassword">No Handphone</label>
								<div class="controls">
								<input type="number" id="inputText" class="span10" value="<?php echo $r['tlp']; ?>" name="t6" required> 
								</div>
							</div>

						
							<?php
							
							$foto=$r['photo'];
							if(isset($foto)){
								echo "<img src='foto_pasien/$foto' style='width:150px;height:150px'>";
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
							<div class="control-group">
								<label class="control-label" for="inputPassword">Tanggal Daftar</label>
								<div class="controls">
								<input type="date" id="tgld"  class="span10" value="<?php echo $r['tgl_daftar']; ?>" name="t9" required>
								</div>
							</div>	
							<div class="control-group">
								<label class="control-label" for="inputPassword">Kunjungan pertama</label>
								<div class="controls">
								<input type="date" id="tglp"  class="span10" value="<?php echo $r['kunjungan_1']; ?>"name="t10" required>
								</div>
							</div>
							<div class="control-group">
								<label class="control-label" for="inputPassword">Last Register</label>
								<div class="controls">
								<input type="date" id="inputText"  class="span10" value="<?php echo $r['last_registered']; ?>"name="t11" required>
								</div>
							</div>		
								<div class="control-group">
								<label class="control-label" for="inputPassword">Status</label>
								<div class="controls">
								<?php
								$s=$r['status'];
								if($s=='member'){
								?>
									<label class="radio">
									<input type="radio" name="t12" id="optionsRadios1" value="member" checked>
									Member
									</label>
									<label class="radio">
									<input type="radio" name="t12" id="optionsRadios1" value="non-member">
									Non-member
									</label>
								<?php
								}
								else{
								?>
									<label class="radio">
									<input type="radio" name="t12" id="optionsRadios2" value="member" >
									Member
									</label>
									<label class="radio">
									<input type="radio" name="t12" id="optionsRadios2" value="non-member" checked>
									Non-member
									</label>
								
								<?php
								}
								?>								</div>
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
