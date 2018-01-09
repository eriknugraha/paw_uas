<?php
$aksi="mod_setting/set.php";
$query=mysql_query("SELECT * FROM setting ");
$r=mysql_fetch_array($query);?>
 <div class="span5">
    </div>

    						<div class="span3">
							<form method="post" enctype="multipart/form-data" action="<?php echo "$aksi?module=edit"; ?>">
							<?php
							$foto=$r['foto'];
							if(isset($foto)){
								echo "<img src='foto_login/$foto' style='width:500px;height:300px'>";
							}
							  else{
                            echo "<img src='foto_pasien/not_found.png' style='width:500px;height:300px'>";
							}
							?>
							<img src="">
							
							<div class="control-group">
								
								<div class="controls">
								<input type="file" name="fupload">
								</div>
							</div>
							<br><br><br><center>
							<button type="submit" class="btn btn-success"><i class="icon-ok-circle icon-white"></i> Simpan</button>
							</form></div>
							
							