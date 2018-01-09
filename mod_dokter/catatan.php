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
	?>
		<section>
		<ul class="breadcrumb" style="margin-bottom:5px;">
			<li><a href="media.php?module=dokter">Data Dokter</a> <span class="divider"><b>&gt;</b></span></li>
			<li class="active">Tambah Dokter</li>
		</ul>
		
		<div class="row-fluid">
			<div class="span12 pull-left">
				<form method="post" enctype="multipart/form-data" action="<?php echo "$aksi?module=tambah"; ?>">
				<input type="hidden" class="span10" id="inputText" value="<?php echo $rus['id_user']; ?>" name="t7">
				<fieldset>
				<legend class="span7 offset1">Tambah Dokter</legend>
				<div class="clear"></div>
				<div class="span3 offset1">
				
							<div class="control-group">
								<label class="control-label" for="inputPassword">Nama Dokter</label>
								<div class="controls">
								<input type="text" class="span11" id="inputText" name="t2">
								</div>
							</div>
							
							<div class="control-group">
								<label class="control-label" for="inputPassword">Jenis Kelamin</label>
								<label class="radio">
								<input type="radio" name="t4" id="optionsRadios1" value="L">
								Laki-Laki
								</label>
								<label class="radio">
								<input type="radio" name="t4" id="optionsRadios1" value="P">
								Perempuan
								</label>
							</div>
							<div class="control-group">
								<label class="control-label" for="inputPassword">No Handphone</label>
								<div class="controls">
								<input type="text" id="inputText" name="t6">
								</div>
							</div>

							<div class="control-group">
								<label class="control-label" for="inputPassword">Tgl_Lahir</label>
								<div class="controls">
								
								<input type="text" id="inputText"  class="span11" name="t8">
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
								<label class="control-label" for="inputPassword">Kode Dokter</label>
								<div class="controls">
								<input type="text" id="inputText"  class="span6" value="<?php echo $nounik; ?>" disabled>
								<input type="hidden" id="inputText"  class="span6" value="<?php echo $nounik; ?>" name="t1">
								</div>
							</div>

							<div class="control-group">
								<label class="control-label" for="inputPassword">Nip</label>
								<div class="controls">
								
								<input type="text" id="inputText"  class="span11" name="t9">
								</div>
							</div>
							
							<div class="control-group">
								<label class="control-label" for="inputPassword">Tempat Lahir</label>
								<div class="controls">
								
								<input type="text" id="inputText"  class="span11" name="t3">
								</div>
							</div>

								
							
							<div class="control-group">
								<label class="control-label" for="inputPassword">Alamat</label>
								<div class="controls">
								<textarea name="t5"></textarea>
								</div>
							</div>
							
				</div>
				<div class="span3">							
						

							<div class="control-group">
								<label class="control-label" for="inputPassword">username</label>
								<div class="controls">
								
								<input type="text" id="inputText"  class="span11" name="t10">
								</div>
							</div>
							
							<div class="control-group">
								<label class="control-label" for="inputPassword">Password</label>
								<div class="controls">
								
								<input type="text" id="inputText"  class="span11" name="t11">
								</div>
							</div>
							<div class="control-group">
								<label class="control-label" for="inputPassword">Photo</label>
								<div class="controls">
								
								<input type="text" id="inputText"  class="span11" name="t12">
								</div>
							</div>

							
				</div>
							</fieldset>
						</form>	
			</div>
		</div>
	</section>
	








<!-- 	pencarian dokter  -->

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


