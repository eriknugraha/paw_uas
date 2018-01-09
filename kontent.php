<style type="text/css">

.bulat{

border-radius:100em;

border-top:2px solid #cf2031;
border-right:2px solid #0f7dc8;
border-bottom:2px solid #2eb31a;
border-left:2px solid #eab823;
width:150px;
height:150px;
}
</style>
<?php
	if($_GET['module']=='home'){
		?>
		<body style="background:url(img/a.png)">
		<section>
		<div class="row-fluid">
			<div class="span4 pull-left">
				<div class="info_akses span12">
				<!-- <img src="img/logo.png" class="logo span12"> -->

				   <?php
                            
                            $foto=$rus['photo'];
                            if(isset($foto)){
                                echo "<img src='photo_user/$foto' class='bulat pull-left' >";
                            }
                              else{
                            echo "<img src='foto_pasien/not_found.png' class='bulat pull-left'>";
                            }
                            ?>
                            <img src="">
				
					<div class="span6 pull-left">
					<h4><i class="icon-info-sign icon-white"></i> Info Akses</h4>
					<div class="isi_akses">
					<span>Kode User</span>
						<span class="form"><?php echo $rus['kodeUser']; ?></span>
					
					<span>Nama Lengkap</span>
						<span class="form"><?php echo $rus['nama']; ?></span>
					
					<hr>
					<span><a data-toggle="modal" href="#myModal" class="btn btn-info btn-small">Ganti Photo</a>	</span>
						
					</div>
					</div>
				</div>
				<!-- Modal -->
						<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
							<div class="modal-header">
							  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							  <h3 id="myModalLabel">Ganti Photo</h3>
							</div>
							<div class="modal-body">
								<p>
								<?php 
						  $foto=$rus['photo'];
                            if(isset($foto)){
                                echo "<img src='photo_user/$foto' class='bulat pull-left' >";
                            }
                              else{
                            echo "<img src='foto_pasien/not_found.png' class='bulat pull-left'>";
                            }
                            ?>
                            <img src="">
								<form method="post" action="upload_foto.php" enctype="multipart/form-data">
								<input type="hidden" name="kodeuser" value="<?php echo $rus['kodeUser']; ?>">
								<input type="file" name="fupload">
								</p>
							  
							</div>
							<div class="modal-footer">
							  <button class="btn" data-dismiss="modal">Close</button>
							  <button type="submit" class="btn btn-primary">Save changes</button>
							  </form>
							</div>
						</div>
						<!-- End Modal -->
				</div>
			<div class="span8 thumb pull-right">
			<?php
		include ("pemberitahuan.php");
	    ?>
				<div class="alert alert-info"><button type="button" class="close" data-dismiss="alert">&times;</button>Selamat datang <strong><?php echo $rus['first_name']; ?></strong> <?php echo date('D m Y'); ?>.</div>							
					<ul class="thumbnails">
					<?php if (($_SESSION['akses']=="3")||($_SESSION['akses']=="4")){ ?>
						<li class="span3">
							<a data-toggle="modal" href="media.php?module=absen" class="thumbnail">
								<img src="img/kunjungan.png" alt="">
                                
							</a>
						</li> <?php } ?>
						
						<?php if (($_SESSION['akses']=="3")||($_SESSION['akses']=="1")||($_SESSION['akses']=="2")){ ?>
						<li class="span3">
							<a href="media.php?module=rekam_medik" class="thumbnail">
								<img src="img/rm.png" alt="">
							</a>
						</li><?php } ?>
					
					
					<!-- ---------------------------------------------------------------------------------------------------------------------- -->
					<?php if (($_SESSION['akses']=="3")||($_SESSION['akses']=="1")){ ?>
					<li class="span3">
							<a href="media.php?module=pembayaran" class="thumbnail">
								<img src="img/bayar.png" alt="">
							</a>
						</li><?php }?>
					
					</ul>

					<!-- ---------------------------------------------------------------------------------------------------------------------- -->
					<?php if (($_SESSION['akses']=="3")||($_SESSION['akses']=="1")||($_SESSION['akses']=="4")){ ?>
					<h5>REKAP DATA</h5>
                <ul class="thumbnails">
						<li class="span3">
							<a data-toggle="modal" href="#lapfitnes" class="thumbnail">
								<img src="img/rekapfitness.png" alt="">
							</a>
						</li><?php }?>

						<?php if (($_SESSION['akses']=="3")||($_SESSION['akses']=="1")||($_SESSION['akses']=="1")){ ?>
                        <li class="span3">
							<a data-toggle="modal" href="#lapKonsep" class="thumbnail">
								<img src="img/rekapbayar.png" alt="">
							</a>
						</li><?php }?>

						<?php if (($_SESSION['akses']=="3")||($_SESSION['akses']=="2")||($_SESSION['akses']=="1")){ ?>
                        <li class="span3">
							<a data-toggle="modal" href="#laprm" class="thumbnail">
								<img src="img/rekaprm.png" alt="">
							</a>
						</li><?php }?>

						<?php if (($_SESSION['akses']=="3")||($_SESSION['akses']=="2")||($_SESSION['akses']=="1")){ ?>
                        <li class="span3">
							<a data-toggle="modal" href="#lapkunjung" class="thumbnail">
								<img src="img/rekapkunjungan.png" alt="">
							</a>
						</li><?php }?>


                   <!--  <li class="span3">
							<a data-toggle="modal" href="#lapPeriksa" class="thumbnail">
								<img src="img/lap_6.png" alt="">
							</a>
						</li>
                        
                    <li class="span3">
							<a data-toggle="modal" href="#lapObat" class="thumbnail">
								<img src="img/lap_4.png" alt="">
							</a>
						</li> -->
                    
                </ul>
               <!--  <ul class="thumbnails">
						
                    <li class="span3">
							<a data-toggle="modal" href="#lapRm" class="thumbnail">
								<img src="img/lap_5.png" alt="">
							</a>
						</li>
                </ul> -->
                
                <!--<ul class="thumbnails">
						<li class="span3">
							<a data-toggle="modal" href="#lapPasien" class="thumbnail">
								<img src="img/lap_pasien.png" alt="">
							</a>
						</li>
<li class="span3">
							<a data-toggle="modal" href="#lapRawatinap" class="thumbnail">
								<img src="img/lap_3.png" alt="">
							</a>
						</li>
                        <li class="span3">
							<a data-toggle="modal" href="#lapRm" class="thumbnail">
								<img src="img/lap_rekam.png" alt="">
							</a>
						</li>
						<li class="span3">
							<a data-toggle="modal" href="#lapDokter" class="thumbnail">
								<img src="img/lap_dokter.png" alt="">
							</a>
						</li>
						<li class="span3">
							<a href="laporan/f_dataobat.php" target="_blank" class="thumbnail">
								<img src="img/lap_obat.png" alt="">
							</a>
						</li>
					
						
						
					</ul>
                    -->
				
				
					<!-- tombol untuk memicu modal -->
						
				    <div id="lapfitnes" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				    				<script type="text/javascript">
    										function run(){
    										var cb = document.getElementById("cb");
    										if(document.getElementById("cekbox").checked == true){
    											cb.disabled = true;
    										}else{
    											cb.disabled = false;}} </script>
   					
							<div class="modal-body">
								<h3>Laporan Absensi Fitnes</h3>

							

								<form method="post" action="laporan/cetak.php" target="blank">

		
								<table width="500px">


							  <input type="checkbox" name="harian" value="" id="cekbox" onclick="run();">  Harian &nbsp; <input type="date" id="tgl" name ="tglhari1" value="" >
								<br> 


								<input type="checkbox" id="cb" name="bulanan" value="">  Bulanan <input type="date" id="tgld" name="tgl1" value=""> - <input type="date" id="tglp" name="tgl2" value=""><p>
								</p>

				

								
								<hr>
								
								   <tr><td><input type="checkbox" name="jam"> Waktu</td>
								   <td><input type="text" style="width: 70px;" name="jam1" id="jam1">&nbsp;s/d&nbsp;<input type="text" style="width: 70px;" name="jam2" id="jam2"></td></tr>

								   <tr><td><input type="checkbox" name="umur"> Umur</td>
								   <td><input type="text" style="width: 70px;" name="umur1">&nbsp;s/d&nbsp;<input type="text" style="width: 70px;" name="umur2"></td></tr>
								   
								   <tr><td><input type="checkbox" name="sex"> Jenis Kelamin</td>
								   <td><input type="radio" name="sex" value="L"> Laki-Laki</td><td><input type="radio" name="sex" value="P"> Perempuan</td></tr> 
								   <tr>&nbsp;</tr>
								   <tr><td><input type="checkbox" name="status">  Status</td>
								   <td><input type="radio" name="status" value="member"> Member</td>
								   <td><input type="radio" name="status" value="non-member"> Non-member</td></tr> 
									
								</table>
								<br>


									<button type="submit" name="pilih" value='pilih' class="btn">Cetak</button>
								</form>
							</div>
							
						</div>   


<!--############################################# tombol untuk memicu modal######################################### -->


                
                       <div id="lapKonsep" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
											<script type="text/javascript">
    										function runn(){
    										var c = document.getElementById("c");
    										if(document.getElementById("cekboxx").checked == true){
    											c.disabled = true;
    										}else{
    											c.disabled = false;}} </script>
							<div class="modal-body">
								<h3>Laporan Pembayaran</h3>
								<form method="get" action="laporan/cetak_pembayaran.php">

								<input type="checkbox"  name="harian" value="" id="cekboxx" onclick="runn();">  Harian &nbsp; <input type="date"  name ="tglhari1" value="" >
								<br> 


								<input type="checkbox"  id="c" name="bulanan" value=""> Bulanan <input type="date" id="tgl" name="tgl1"> - <input type="date" id="tglp" name="tgl2"><p>
								</p>


								Jenis Pembayaran</td><br>
                                          <br>
                                         
											 <select name="jenis_pembayaran">  
											
											 <option value="baru">Baru</option>  
											 <option value="perpanjangan">Perpanjangan</option>
											 <option value="kunjungan">Kunjungan</option>  
											 <option value="pemeriksaan">Pemeriksaan</option>
											 <option value="konsultasi">Konsultasi</option>
											 <option value="lainnya">Lainnya</option>

											  
											 </select>


									<button type="submit" class="btn">Cetak</button>
								</form>
							</div>
							
						</div> 
                


                   <div id="laprm" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
											<script type="text/javascript">
    										function runnn(){
    										var a = document.getElementById("a");
    										if(document.getElementById("cekboxx").checked == true){
    											a.disabled = true;
    										}else{
    											a.disabled = false;}} </script>
							<div class="modal-body">
								<h3>Rekap Data Rekam Medik</h3>
								<form method="get" action="laporan/cetak_rm.php">

								<input type="checkbox"  name="harian" value="" id="cekboxx" onclick="runn();">  Harian &nbsp; <input type="date"  name ="tglhari1" value="" >
								<br> 


								<input type="checkbox"  id="c" name="bulanan" value=""> Bulanan <input type="date" id="tgl" name="tgl1"> - <input type="date" id="tglp" name="tgl2"><p>
								</p>


								

									<button type="submit" class="btn">Cetak</button>
								</form>
							</div>
							
						</div> 


						 <div id="lapkunjung" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
											<script type="text/javascript">
    										function runnn(){
    										var a = document.getElementById("a");
    										if(document.getElementById("cekboxx").checked == true){
    											a.disabled = true;
    										}else{
    											a.disabled = false;}} </script>
							<div class="modal-body">
								<h3>Rekap Kunjungan Fisik</h3>
								<form method="get" action="laporan/cetak_kunjungan.php">

								<input type="checkbox"  name="harian" value="" id="cekboxx" onclick="runn();">  Harian &nbsp; <input type="date"  name ="tglhari1" value="" >
								<br> 


								<input type="checkbox"  id="c" name="bulanan" value=""> Bulanan <input type="date" id="tgl" name="tgl1"> - <input type="date" id="tglp" name="tgl2"><p>
								</p>


								

									<button type="submit" class="btn">Cetak</button>
								</form>
							</div>
							
						</div> 

                
                
               <!-- <div id="lapPoli" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
							
							<div class="modal-body">
								<h3>Laporan Kunjungan di Poliklinik</h3>
								<form method="get" action="laporan/f_poli.php">
									<input type="date" name="tgl1"> - <input type="date" name="tgl2"><p>
                                    <div class="control-group">
								<label class="control-label" for="inputPassword">Jr Manajer Personalia &amp Kesejahteraan
</label>
								<div class="controls">
								<input type="text" class="span10" id="inputText" name="manajer">
								</div>
							</div>
									<button type="submit" class="btn">Cetak</button>
								</form>
							</div>
							
						</div>  
                
                -->
                    <div id="lapRawatinap" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
							
							<div class="modal-body">
								<h3>Laporan Rawat Inap</h3>
								<form method="get" action="laporan/f_rawatinap.php">
									<input type="date" name="tgl1"> - <input type="date" name="tgl2"><p>
                                    <div class="control-group">
								<label class="control-label" for="inputPassword">Jr Manajer Personalia &amp Kesejahteraan
</label>
								<div class="controls">
								<input type="text" class="span10" id="inputText" name="manajer">
								</div>
							</div>
									<button type="submit" class="btn">Cetak</button>
								</form>
							</div>
							
						</div>  
                
                <div id="lapObat" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
							
							<div class="modal-body">
								<h3>Laporan Obat</h3>
								<form method="get" action="laporan/f_obat.php">
									<input type="date" name="tgl1"> - <input type="date" name="tgl2"><p>
                                 
									<button type="submit" class="btn">Cetak</button>
								</form>
							</div>
							
						</div>  
                
                
						<!-- Modal -->
						<div id="lapDokter" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
							
							<div class="modal-body">
								<a href="laporan/f_datadok.php" target="_blank">LAORAN DATA DOKTER</a><p>
								<a href="laporan/f_jaddok.php" target="_blank">LAORAN JADWAL DOKTER</a>
							</div>
							
						</div>   
                        
						 
						
						<!-- Modal -->
						<div id="lapPasien" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
							
							<div class="modal-body">
								<h3>Periode</h3>
								<form method="get" action="laporan/f_datapas.php">
									<input type="date" name="tgl1"> - <input type="date" name="tgl2"><p>
									<button type="submit" class="btn">Cetak</button>
								</form>
							</div>
							
						</div>   
                
                <div id="lapRm" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
							
							<div class="modal-body">
								<h3>Periode Kunjungan Pasien</h3>
								<form method="get" action="laporan/f_rekammedik.php">
									<input type="date" name="tgl1"> - <input type="date" name="tgl2">
									<button type="submit" class="btn">Cetak</button>
								</form>
							</div>
							
						</div>   
                
               
						
			</div>
		</div>

	</section></body>
		<?php
	}

	elseif($_GET['module']=='data_user'){
		  include("mod_datauser/data_user.php");
        }
        

	elseif($_GET['module']=='detail'){
        
		  include("mod_datauser/detail.php");
        }
       
	elseif($_GET['module']=='detaild'){
        
		  include("mod_dokter/detail.php");
        }
       
	elseif($_GET['module']=='detailm'){
       
		  include("mod_pasien/detail.php");
        }
       
		elseif($_GET['module']=='detailbayar'){
       
		  include("mod_dataobat/detail.php");
        }
       
	elseif($_GET['module']=='rekap'){
       
		  include("mod_rekap/rekap.php");
        }
       
	elseif($_GET['module']=='detailp'){
        
		  include("mod_rm/detail.php");
        }
      
	elseif($_GET['module']=='edit'){
       
		  include("mod_pembayaran/edit.php");
        }
   
	elseif($_GET['module']=='tindakan'){
   
		  include("mod_tindakan/tindakan.php");
        }
      
	elseif($_GET['module']=='data_pasien'){
        
		  include("mod_pasien/pasien.php");
        }
      
	elseif($_GET['module']=='pembayaran'){
       
		  include("mod_pembayaran/pembayaran.php");
        }
       
	elseif($_GET['module']=='absen'){
        
		  include("mod_absensi/absen.php");
        }
       
	elseif($_GET['module']=='dokter'){
		
        
		  include("mod_dokter/dokter.php");
       
	}
	
	elseif($_GET['module']=='rekam_medik'){
		
       
		  include("mod_rm/rekam_medik.php");
        }
     
	
	elseif($_GET['module']=='editrm'){
		
       
		  include("mod_rm/editrm.php");
        }
       
	elseif($_GET['module']=='tanggungan'){
       
		  include("mod_tanggungan/tanggungan.php");
        }
       
    elseif($_GET['module']=='detailmedik'){
		
       
		  include("mod_rm/detaill.php");
        }
       
	elseif($_GET['module']=='data_obat'){
        
		  include("mod_dataobat/dataobat.php");
        }
       
elseif($_GET['module']=='profil'){
       
		  include("mod_datauser/data_user.php");
        }
elseif($_GET['module']=='pass'){
       
		  include("pass.php");
        }
elseif($_GET['module']=='pass'){
       
		  include("pass.php");
        }

elseif($_GET['module']=='paket'){
       
		  include("mod_tindakan/paket.php");
        }

  elseif($_GET['module']=='tp'){
       
		  include("mod_tindakan/kelompok_paket.php");
        }

 elseif($_GET['module']=='set'){
       
		  include("mod_setting/setting.php");
        }
    elseif($_GET['module']=='pas'){
       
		  include("pas.php");
        }
       
    

?>