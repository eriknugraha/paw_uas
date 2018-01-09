<?php
$aksi="mod_tindakan/aksi_tindakan.php";
switch($_GET['act']){
	default:
	?>
	
	<?php
	$p      = new Paging;
    $batas  = 10;
    $posisi = $p->cariPosisi($batas);
?>
	<section>
		<ul class="breadcrumb" style="margin-bottom: 5px;">
			<li class="active">Kategori Layanan</li>			
		</ul>

			<div class="control-group pull-left">
			<button class="btn btn-info" type="button" onclick="window.location='media.php?module=paket'"><i class="icon-plus icon-white"></i> Tambah Paket</button>
			<button class="btn btn-info" type="button" onclick="window.location='media.php?module=tp'"><i class="icon-plus icon-white"></i> Tambah Data Paket</button>
		</div>
		<div class="span12 pull-leftt"><br></div>
		<div class="span12 pull-leftt"></div>
		<div class="span6 pull-left">		
			<div class="row-fluid">
			<div class="span12"  style="background:#f9f9f9;padding:10px;">
				<form method="post" enctype="multipart/form-data" action="<?php echo "$aksi?module=tambah"; ?>">
				<input type="hidden" class="span10" id="inputText" value="<?php echo $rus['kodeUser']; ?>" name="t7">
				<fieldset>
				<legend class="span9">Tambah Kategori Layanan</legend>
				<div class="clear"></div>
				<div class="span8">
				
							<div class="control-group">
								<label class="control-label" for="inputPassword"> Nama Layanan</label>
								<div class="controls">
									<input type="text" name="t1" class="span11">
								</div>
							</div>
							
							<div class="control-group">
								<label class="control-label" for="inputPassword"> Harga</label>
								<div class="controls">
								<h2>RP.&nbsp;</h2>
									<input type="text" name="t2" class="span11"
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
				
							</fieldset>
						</form>	
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
							<td>No</td><td>Nama Layanan</td><td>Harga</td><td></td>
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
					</tbody>
				</table>
				</fieldset>
				</div>
			</div>
		</div>
		</div>		
	</section>
<?php
break;

case "edit":
$id_tindakan=$_GET['id_tindakan'];
$query=mysql_query("SELECT * FROM tlayanan WHERE id_layanan='$id_tindakan'");
$r=mysql_fetch_array($query);
?>
	<section>
		<ul class="breadcrumb" style="margin-bottom: 5px;">
			<li><a href="media.php?module=tindakan">Kategori Layanan</a> <span class="divider"><b>&gt;</b></span></li>
			<li class="active">Ubah Layanan</li>	
		</ul>
		<div class="control-group pull-left"></div>
		<div class="span6 pull-left">		
			<div class="row-fluid">
			<div class="span12" style="background:#f9f9f9;padding:10px;">
				<form method="post" enctype="multipart/form-data" action="<?php echo "$aksi?module=edit"; ?>">
				<legend class="span12">Ubah Kategori Layanan</legend>
				<div class="clear"></div>
				<div class="span8">
				
							<div class="control-group">
								<label class="control-label" for="inputPassword"> Nama Layanan</label>
								<div class="controls">
									<input type="text" name="t1" class="span11" value="<?php echo $r['nama_layanan']; ?>">
									<input type="hidden" name="id_layanan" class="span11" value="<?php echo $r['id_layanan']; ?>">
								</div>
							</div>
							
							<div class="control-group">
								<label class="control-label" for="inputPassword"> Harga</label>
								<div class="controls">
									<h2>RP.&nbsp;</h2>
									<input type="text" name="t2" class="span11" value="<?php echo $r['harga']; ?>">
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
				
							
						</form>	
			</div>
		</div>
		</div>
		<div class="span7 pull-right">
		<div class="row-fluid">
			<div class="span12">
			<div id="hasil"></div>
				<div id="tabel_awal">
				<fieldset>
				<legend class="span12">Kategori Layanan</legend>
				<table class="table table-striped">
					<thead>
						<tr class="head3">
							<td>No</td><td>Nama Layanan</td><td>Harga</td><td></td>
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
							<td><?php echo $r['nama_layanan']; ?></td>
							<td><?php echo $r['harga']; ?></td>
							<td><div class="btn-group">
								<a class="btn btn-danger" href="#"><i class="icon-wrench icon-white"></i> Actions</a>
								<a class="btn btn-danger dropdown-toggle" data-toggle="dropdown" href="#"><span class="caret"></span></a>
								<ul class="dropdown-menu">
									<li><a href="media.php?module=tindakan&&act=edit&&id_tindakan=<?php echo $r['id_layanan']; ?>"><i class="icon-pencil"></i> Edit</a></li>
									<li><a href="<?php echo "$aksi?module=hapus&&id_tindakan=$r[id_layanan]";?>" onclick="return confirm('Apakah anda yakin, ingin menghapus tarif dokter <?php echo $r['nama_dokter']; ?>?')"><i class="icon-trash"></i> Delete</a></li>									
								</ul>
							</div></td>
						</tr>
					
					<?php
					$no++;
					}
					?>					
					</tbody>
				</table>
				</fieldset>
				</div>
			</div>
		</div>
		</div>		
	</section>
	
<?php
break;
}
?>