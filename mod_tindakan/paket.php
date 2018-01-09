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
			<li class="active">Kategori Paket</li>			
		</ul>

			<div class="control-group pull-left">
			<button class="btn btn-info" type="button" onclick="window.location='media.php?module=tindakan'"><i class="icon-plus icon-white"></i> Tambah Layanan</button>
			<button class="btn btn-info" type="button" onclick="window.location='media.php?module=tp'"><i class="icon-plus icon-white"></i> Tambah Data Paket</button>
		</div>
		<div class="span12 pull-leftt"><br></div>
		<div class="span12 pull-leftt"></div>
		<div class="span6 pull-left">		
			<div class="row-fluid">
			<div class="span12"  style="background:#f9f9f9;padding:10px;">
				<form method="post" enctype="multipart/form-data" action="<?php echo "$aksi?module=tambahpaket"; ?>">
				
				<fieldset>
				<legend class="span9">Tambah Paket</legend>
				<div class="clear"></div>
				<div class="span8">
				
							<div class="control-group">
								<label class="control-label" for="inputPassword"> Nama Paket</label>
								<div class="controls">
									<input type="text" name="t1" class="span11">
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
				<legend class="span12">Paket</legend>
				
				<table class="table table-striped">
					<thead>
						<tr class="head3">
							<td>No</td><td>Nama Paket</td><td></td>
						</tr>
					</thead>
					<tbody>
					<?php
					
					$query=mysql_query("SELECT * FROM paket");
					$no=1;					
					while($r=mysql_fetch_array($query)){
					?>					
						<tr>
							<td><?php echo $no; ?></td>
							<td><?php echo $r['paket'];?></td> 
                            <!-- $id_tindakan=$r['id_layanan'];
                            $tamp=mysql_query("SELECT * FROM tlayanan");
                            while($rt=mysql_fetch_array($tamp)){
                                
                                echo "-> ".$rt['nama_layanan']."<br>";
                                
                            } -->
                           
                          
                            </td>
                            
                            <td><div class="btn-group">
								<a class="btn btn-danger" href="#"><i class="icon-wrench icon-white"></i> Actions</a>
								<a class="btn btn-danger dropdown-toggle" data-toggle="dropdown" href="#"><span class="caret"></span></a>
								<ul class="dropdown-menu">
									<li><a href="media.php?module=paket&&act=edit&&id=<?php echo $r['id']; ?>"><i class="icon-pencil"></i> Edit</a></li>
									<li><a href="<?php echo "$aksi?module=hapuspaket&&id=$r[id]";?>" onclick="return confirm('Apakah anda yakin, ingin menghapus Paket<?php echo $r['paket']; ?>?')"><i class="icon-trash"></i> Delete</a></li>									
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
$id_paket=$_GET['id'];
$query=mysql_query("SELECT * FROM paket WHERE id='$id_paket'");
$r=mysql_fetch_array($query);
?>
	<section>
		<ul class="breadcrumb" style="margin-bottom: 5px;">
			<li><a href="media.php?module=tindakan">Paket</a> <span class="divider"><b>&gt;</b></span></li>
			<li class="active">Ubah Paket</li>	
		</ul>
		<div class="control-group pull-left"></div>
		<div class="span6 pull-left">		
			<div class="row-fluid">
			<div class="span12" style="background:#f9f9f9;padding:10px;">
				<form method="post" enctype="multipart/form-data" action="<?php echo "$aksi?module=editpaket"; ?>">
				<legend class="span12">Ubah Paket</legend>
				<div class="clear"></div>
				<div class="span8">
				
							<div class="control-group">
								<label class="control-label" for="inputPassword"> Nama Paket</label>
								<div class="controls">
									<input type="text" name="t1" class="span11" value="<?php echo $r['paket']; ?>">
									<input type="hidden" name="id" class="span11" value="<?php echo $r['id']; ?>">
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
		<div class="span6 pull-right">
		<div class="row-fluid">
			<div class="span12">
			<div id="hasil"></div>
				<div id="tabel_awal">
				<fieldset>
				<legend class="span12"> Paket</legend>
				<table class="table table-striped">
					<thead>
						<tr class="head3">
							<td>No</td><td>Nama Paket</td><td></td>
						</tr>
					</thead>
					<tbody>
					<?php
					
					$query=mysql_query("SELECT * FROM paket");
					$no=1;					
					while($r=mysql_fetch_array($query)){
					?>					
						<tr>
							<td><?php echo $no; ?></td>
							<td><?php echo $r['paket']; ?></td>
							
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