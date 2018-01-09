<?php
$aksi="mod_absensi/aksi_absensi.php";
switch($_GET['act']){
	default:
	?>

	<?php
	$p      = new Paging;
    $batas  = 5;
    $posisi = $p->cariPosisi($batas);
?>
	<section>
		<ul class="breadcrumb" style="margin-bottom: 5px;">
			<li class="active">Data Absensi Menber</li>
			
		</ul>





	<?php
    //set default kosong
    $id_member = '';
    $nama_member = '';
    $tgl_lahir='';
    $sex='';
    $tgl_daftar='';
    $photo='';
    $status='';
    $z='';
     
     if($_POST){
            $id_member = $_POST['idd'];
            $sql= "select id_member,nama_member,tgl_lahir,sex,tgl_daftar,photo,status from tmember where id_member ='$id_member'";
            $hasil = mysql_query($sql) or die(mysql_error());
        $count = mysql_num_rows($hasil);
        $datax= mysql_fetch_array($hasil);
     
        if($count > 0){
            $id_member = $datax['id_member'];
            $nama_member = $datax['nama_member'];
            $tgl_lahir = $datax['tgl_lahir'];
            $sex = $datax['sex'];
            $tgl_daftar = $datax['tgl_daftar'];
            $photo = $datax['photo'];
            $status= $datax['status'];
            // $tgl_bayar=$datax['tgl_bayar'];
            $ambil_thn=substr($tgl_lahir,0,4);
                            $thn_sekarang=date('Y');
                            $umur=$thn_sekarang-$ambil_thn;
                            $h=$umur;
              $z=$h;


				 									

        }else{
            echo "<script> alert('data tidak di temukan atau silahkan cek pembayaran terlebih dahulu '); </script>";
        }
    }
    ?>
		<section>
	<form class="form-search pull-right" method="POST" action="" >
							<div class="input-prepend">
								<span class="add-on"><i class="icon-search"></i></span>
								<input class="span3" name ="idd" type="text" placeholder="Search">
							</div>
		</form>
		<div class="row-fluid">
			<div class="span12 pull-left">
				<form method="post" enctype="multipart/form-data" action="<?php echo "$aksi?module=tambah"; ?>">
				<input type="hidden" id="inputText" name="t12" value="<?php echo $rus['kodeUser']; ?>"  class="span11">
				<fieldset>
			
				<div class="clear"></div>
				<div class="span3 offset1">
								<div class="control-group">
								<label class="control-label" for="inputPassword">Tanggal</label>
								<div class="controls">
								<input type="date" id="inputText"  class="span10" value="<?php echo date('Y-m-d'); ?>" name="t1" required>
								</div>
							</div>
							<div class="control-group">
								<label class="control-label" for="inputPassword">ID Member</label>
								<div class="controls">
								
								<input type="text" id="inputText"  class="span10" value="<?php echo $id_member ?>" name="t2" readonly>
								</div>
							</div>
				
							<div class="control-group">
								<label class="control-label" for="inputPassword">Nama Member</label>
								<div class="controls">
								<input type="text" class="span10" id="inputText" value="<?php echo $nama_member ?>" name="t3" required>
								</div>
							</div>
							
							<div class="control-group">
								<label class="control-label" for="inputPassword">Jenis Kelamin</label>
								<div class="controls">
								<input type="text" class="span10" id="inputText" value="<?php echo $sex ?>"name="t4" required>
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
								<input type="date" id="inputText"  class="span9" value="<?php echo $tgl_lahir ?>" required>
								<?php 
								$t_lahir=substr($tgl_lahir,8,10);   
								$t_sekarang=date('d');
								$b_sekarang=date('m');
								$b_lahir=substr($tgl_lahir,5,2);

								if(($t_lahir==$t_sekarang)&&($b_sekarang==$b_lahir)){?>
                               
                       	              <button type="button"  disabled >
                        	          <span class="icon-gift"></span>
                        				</button>
                       
                                          <?php } ?> 
								</div>
							</div>
							<?php 

$id_member = $_POST['idd'];
// $sqll= "select a.id_member,a.nama_member,a.tgl_lahir,a.sex,a.tgl_daftar,a.photo,a.status, b.tgl_bayar from tmember a INNER JOIN tbyr b on a.id_member = b.id_member where a.id_member ='$id_member' and b.jns_bayar='perpanjang' ORDER BY jns_bayar ";
$sqll= "select a.tgl_bayar , b.nama_layanan from tbyr a INNER JOIN tdetailbyr b on a.no_kwitansi = b.no_kwitansi where b.nama_layanan='fitness_member' ORDER BY nama_layanan ";

$hasill = mysql_query($sqll) or die(mysql_error());
$dataxx= mysql_fetch_array($hasill);
$tgl_bayar=$dataxx['tgl_bayar'];

$besok = date('Y-m-d', strtotime("+30 day", strtotime(date($tgl_bayar))));
$th_bayar=substr($besok,0,4);
$th_sekarang=substr($date,0,4);

$bln_bayar=substr($besok,5,2);
$bln_sekarang=substr($date,5,2);

$tgl_pinjam2=substr($besok,8,10);
$tgl_sekarang=substr($date,8,10);
 

?>
							<?php if(($_POST) && ($status=='member')) {?>
							<div class="control-group">
								<label class="control-label" for="inputPassword">Pembayaran akhir &nbsp;    Tgl Harus Bayar</label>
								
								<div class="controls">
								<?php if($thn_sekarang>$th_bayar) {
                                   	echo "<input type='date'  class='span4 btn-danger' value=".$tgl_bayar ." readonly>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";  
                                   	echo "<input type='date'  class='span4 btn-danger' value=". $besok ." readonly>"; }
									  	elseif($thn_sekarang<$th_bayar){
													echo "<input type='date'  class='span4' value=".$tgl_bayar." readonly>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";  
													echo "<input type='date'  class='span4' value=".$besok ." readonly>"; }
									    elseif($bln_sekarang < $bln_bayar){
													echo "<input type='date'  class='span4' value=".$tgl_bayar." readonly>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";  
													echo "<input type='date'  class='span4' value=".$besok ." readonly>"; }
									 
										elseif(($thn_sekarang=$th_bayar)&& ($bln_sekarang=$bln_bayar)){
											if($tgl_sekarang > $tgl_pinjam2){
											   echo "<input type='date'  class='span4 btn-danger' value=".$tgl_bayar." readonly>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"; 
											   echo "<input type='date'  class='span4 btn-danger' value=".$besok." readonly>";}
										     else {
											   echo "<input type='date'  class='span4' value=".$tgl_bayar." readonly>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"; 
											   echo "<input type='date'  class='span4' value=".$besok." readonly>";}
										}
										
										else{
											echo "<input type='date'  class='span4 btn-danger' value=".$tgl_bayar." readonly>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"; 
											echo "<input type='date'  class='span4 btn-danger' value=".$besok." readonly>";;
											}
												 ?>		
								</div>
							</div>	<?php } ?>
											
								<div class="control-group">
									
							<img src="">
								

								<?php
							if($photo!=''){
                             echo "<img src='foto_pasien/$photo' style='width:185px;height:160px'>";
               				 }
               				 else{
                   			echo "<img src='foto_pasien/not_found.png' style='width:185px;height:160px'>";
							}
								
							
							?>
								
							</div>
							
</div>
							<div class="span3">							
							<div class="control-group">
								<label class="control-label" for="inputPassword">Tanggal Daftar</label>
								<div class="controls">
								<input type="date" id="inputText"  class="span10" value="<?php echo $tgl_daftar ?>"  required>
								</div>
							</div>
							
							<div class="control-group">
								<label class="control-label" for="inputPassword">Umur</label>
								<div class="controls">
								<input type="text" id="inputText" value="<?php  echo $z." Tahun"; ?>" class="span10" name="t5" required> 
								</div>
							</div>
							<div class="control-group">
								<label class="control-label" for="inputPassword">Jam Datang</label>
								<div class="controls">
								<?php 
								$u=date('H');
								$timee= $u + 5;?>
								<input type="text" id="inputText" class="span10" value="<?php echo $timee.':'.date('i')?>" name="t6" required> 
								</div>
							</div>	
							
								<div class="control-group">
								<label class="control-label" for="inputPassword">Status</label>
								<div class="controls">
								<input type="text" id="inputText"  class="span10" name="t7" value="<?php echo $status ?>" readonly>
								<input type="hidden" id="inputText"  class="span10" name="t8" value="<?php echo date('D'); ?>" readonly>
								<input type="hidden" id="inputText"  class="span10" name="t9" value="<?php echo getBulan(date('m')); ?>" readonly>
								</div>
							</div>	
							 <div class="form-group">
		 					
                                    <label class="col-lg-3 control-label">Tujuan</label>
                                    <div class="col-lg-12">
                                        <select name="tujuan" class="form-control" required>
                                            <?php
												include "config/koneksi.php";
												echo "<option>---- Pilih Tujuan ----</option>";
												$minta = "SELECT * FROM kunjungan";
												$eksekusi = mysql_query($minta);
												while($hasil=mysql_fetch_array($eksekusi))
												{
												$id=$hasil['id_category'];
												echo " <option value=$hasil[nama_kunjungan]>$hasil[nama_kunjungan] </option>";
												}
												?>
												</select></div></div>

		</div>
		
							</fieldset>
						</form>	
			</div>
		</div>
	</section>

	<?php 	
		if($_POST){?>
		<hr>

		<h4>History Kunjungan&nbsp; <?php echo getBulan(date('m'));?></h4>
		<div class="row-fluid">
			<div class="span12 pull-left">
			<div id="hasil"></div>
				<div id="tabel_awal">
				<table class="table table-striped">
					<thead>
						<tr class="head1">
							<tr class="head1" style="center">
							<td><center>No</td>
							<td><center>ID member</td>
							<td><center>Tanggal Kunjungan</td>
							<td><center>Nama Member</td>
							<td><center></td>
							<td><center>sex</td>
							<td><center>Umur</td>
							<td><center>Jam Kunjung</td>
							
							<td></td><td></td><td></td>
						</tr></center>
						
					</thead>
					<tbody>

					<?php	
					$id_member = $_POST['idd'];
					
					// $tgl_awal = date_format(date_create($_GET['tgl_awal']), 'Y-m-d');
					$tgl1=date('Y-m-01');
					$tgl2=date('Y-m-30');
					$query=mysql_query("SELECT * FROM tfitness  where id_member ='$id_member' and tgl_kunjugan BETWEEN '$tgl1' and '$tgl2' ORDER BY tfitness.tgl_kunjugan DESC LIMIT $posisi,$batas");
					$no=$posisi+1;
					while($r=mysql_fetch_array($query)){
					?>					
						<tr >
							<td><center><?php echo $no; ?></td>
							<td><center><?php echo $r['id_member']; ?></td>
							<td><center><?php echo $r['tgl_kunjugan']; ?></td>
							<td><center><?php echo $r['nama_member']; ?></td>
							<td><center></td>
							<td><center><?php echo $r['sex']; ?></td>
							
							<td><center><?php echo $r['umur']; ?>&nbsp;Tahun</td>
							<td><center><?php echo $r['jam_kunjungan']; ?></td>
							
                           
                            <td><center></td><td><center></td><td><div class="btn-group">
								<a class="btn btn-primary" href="#"><i class="icon-wrench icon-white"></i> Actions</a>
								<a class="btn btn-primary dropdown-toggle" data-toggle="dropdown" href="#"><span class="caret"></span></a>
								<ul class="dropdown-menu">
									
									
									<li><a href="<?php echo "$aksi?module=hapus&&kodeabsen=$r[id]";?>" onclick="return confirm('Apakah anda yakin, ingin menghapus data <?php echo $r['nama_member']; ?> jam kunjungan <?php echo $r['jam_kunjungan']; ?> ?')"><i class="icon-trash"></i> Delete</a></li>									
								</ul>
							</div></td>
						</tr>
					
					<?php
					$no++;
					}
					?>
					<tr>
							<td colspan="9">
							<?php
							$id_member = $_POST['idd'];
							$jmldata=mysql_num_rows(mysql_query("SELECT * FROM tfitness  where id_member ='$id_member'"));
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
	</section><?php }?>

<?php
break;
case "tambah":
?>


  
	<?php
break;

case "edit":
?>
	
<?php
break;
}
?>