<?php

$kode=$_POST['q'];
$query=mysql_query("SELECT * FROM user_man,tdokter WHERE user_man.id_user=tdokter.id_user AND user_man.kodeUser LIKE '%".$kode."%' OR user_man.username LIKE '%".$kode."%'");
$r=mysql_fetch_array($query);
$num=mysql_num_rows($query);
if($num>=1){
    $status="dokter";
    ?>
    <div class="rm_info">
                            
        <div style="background:url('photo_user/<?php
                if($r['photo']!=''){
                    echo $r['photo'];
                }
                else{
                    echo "not_found.png";
                }
                ?>') #fff center;background-size:cover;" class="fotoPasien"></div>
                            <div class="control-group">
                                <label class="control-label" for="inputText">NIP</label>
								<div class="controls">
								<input type="text" class="span12" id="inputText" value="<?php echo $r['nip']; ?>" disabled>
								</div>
							</div>
                            <div class="control-group">
								<label class="control-label" for="inputText">Kode Pasien</label>
								<div class="controls">
								<input type="text" class="span12" id="inputText" value="<?php echo $r['kodePasien']; ?>" disabled>
								</div>
							</div>
							<div class="control-group">
								<label class="control-label" for="inputText">Nama Pasien</label>
								<div class="controls">
								<input type="text" class="span12" id="inputText" value="<?php echo $r['nama_pegawai']; ?>" disabled>
								</div>
							</div>
                            <div class="control-group">
								<label class="control-label" for="inputText">Unit Jabatan</label>
								<div class="controls">
								<textarea class="span12" disabled><?php echo $r['unit']; ?></textarea>
								</div>
							</div>
							<div class="control-group">
								<label class="control-label" for="inputText">Jenis Kelamin</label>
								<div class="controls">
								<input type="text" class="span12" id="inputText"  value="<?php echo $r['jk']; ?>" disabled>
								</div>
							</div>
							
							<div class="control-group">
								<label class="control-label" for="inputText">Alamat</label>
								<div class="controls">
								<textarea class="span12" disabled><?php echo $r['alamat']; ?></textarea>
								</div>
							</div>
							
							<div class="control-group">
								<div class="controls">								
								<button type="button" class="btn btn-success" onclick="window.location='media.php?module=rekam_medik&&status=pasien&&kodepasien=<?php echo $r['kodePasien'] ?>'"><i class="icon-ok-circle icon-white"></i> Proses</button>
								</div>
							</div>
							</div>
    <?php
}  ?>