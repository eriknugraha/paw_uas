<?php
$aksi="mod_rm/aksi_rm.php";
switch($_GET['act']){
	default:
	?>
	<script type="text/javascript">
		 $(document).ready(function() {
		  <!-- event textbox keyup
		  $("#txtkdpasien").keyup(function() {
		   var strcari = $("#txtkdpasien").val();
		   if (strcari != "")
		   {
			$("#hasil").html("<img src='img/loader.gif'/>")
			$.ajax({
			 type:"post",
			 url:"mod_rm/cari_pasien.php",
			 data:"q="+ strcari,
			 success: function(data){
			 $("#hasil").css("display", "block");
			  $("#hasil").html(data);			  
			 }
			});
		   }
		   else{
		   $("#hasil").css("display", "block");
		   }
		  });
	
		   $("#txtdos").click(function() {
		   var strdok = $("#txtdok").val();
		   if (strdok != "")
		   {
			$("#tampil").html("<img src='img/loader.gif'/>")
			$.ajax({
			 type:"post",
			 url:"mod_rm/caridok.php",
			 data:"q="+ strdok,
			 success: function(data){
			 $("#tampil").css("display", "block");
			  $("#tampil").html(data);			  

			 }
			});
		   }
		   else{
		   $("#tampil").css("display", "block");
		   }
		  });
		  
		  
		  
		  
		
		  $("#txtobat").click(function() {
		   var strobat = $("#txtobat").val();
		   if (strobat != "")
		   {
			$("#hasils").html("<img src='img/loader.gif'/>")
			$.ajax({
			 type:"post",
			 url:"mod_rm/input_obat.php",
			 data:"q="+ strobat,
			 success: function(data){
			 $("#hasils").css("display", "block");
			$("#inpt").css("display", "block");
			  $("#hasils").html(data);			  
			 }
			});
		   }
		   else{
		   $("#hasils").css("display", "block");
		   
		   
		   }
		  });
             
             $("#tindakan").click(function() {
		   var strtindakan = $("#tindakan").val();
		   if (strtindakan != "")
		   {
			$("#hasil_tindakan").html("<img src='img/loader.gif'/>")
			$.ajax({
			 type:"post",
			 url:"mod_rm/tindakan.php",
			 data:"q="+ strtindakan,
			 success: function(data){
			 $("#hasil_tindakan").css("display", "block");
			  $("#hasil_tindakan").html(data);			  
			 }
			});
		   }
		   else{
		   $("#hasil_tindakan").css("display", "block");
		   
		   
		   }
		  });
		 
			});



	</script>

	<section>
		

		<div class="row-fluid">
			<div class="span2 pull-left">
				<div class="span12" style="background:#fff;">
				
				<?php
				$kode=$_GET['kodem'];
                $status=$_GET['status'];
				if($kode!='' AND $status=='klien'){
				$qupas=mysql_query("SELECT * FROM tmember  where id_member='$kode'");
				$r=mysql_fetch_array($qupas);
				?>


<!-- / ################################# KOLOM SAMPING UNTUK ID kLIEN DOKTER ###########################################-->	

					<div class="control-group">				
								<div class="rm_text">
									<div class="controls">
									<input type="text" class="span12" id="txtkdpasien" value="<?php echo $rpas['id_member']."" ?>" disabled>
									</div>
								</div>
						</div>

						<div class="control-group">
								<label class="control-label" for="inputText">Tanggal Pemeriksaan</label>
								<div class="controls">
								<input type="text" class="span12" id="inputText" value="<?php echo date('Y-m-d'); ?>" disabled>
								</div>
							</div>
							
				<div class="control-group">
							<label class="control-label" for="inputText">Nama Dokter</label>
							<div class="controls">
							<input type="text" class="span12" id="inputText"  value="<?php echo $_SESSION['username']; ?>" disabled>
								</div>
							</div>

							<hr>


					<div class="control-group">
								<label class="control-label" for="inputText">ID Klien</label>
								<div class="controls">
								<input type="text" class="span12" id="inputText" value="<?php echo $r['id_member']; ?>" disabled>
								</div>
						</div>
					
					<div class="control-group">
								<label class="control-label" for="inputText">Nama</label>
								<div class="controls">
								<input type="text" class="span12" id="inputText" value="<?php echo $r['nama_member']; ?>" disabled>
								</div>
						</div>
                            

                    <div class="control-group">
								<label class="control-label" for="inputText">Umur</label>
								<div class="controls">
								<?php
								$tgl_lahir=$r['tgl_lahir'];
								 $ambil_thn=substr($tgl_lahir,0,4);
                            	$thn_sekarang=date('Y');
                            	$umur=$thn_sekarang-$ambil_thn;
                           		?>
								<input type="text" class="span12" id="inputText" value="<?php echo $umur." Tahun"; ?>" disabled>
								</div>
						</div>
						
					<div class="control-group">
								<label class="control-label" for="inputText">Jenis Kelamin</label>
								<div class="controls">
								<input type="text" class="span12" id="inputText"  value="<?php echo $r['sex']; ?>" disabled>
								</div>
						</div>



					<div class="control-group">
								<label class="control-label" for="Text">Kesimpulan</label>
								<div class="controls">
								<textarea type="text" class="span12" id="inputText"  style="margin-top: 0px; margin-bottom: 10px; height: 168px;"></textarea>







								</div>
						</div>


							
													
				<?php
					}
						else{
				?>
					<div class="control-group">						
								<div class="rm_text">
									<div class="controls">
									<input type="text" class="span12" id="txtkdpasien" placeholder="Masukkan Kode Pasien">
									</div>
								</div>
						</div>
				<?php
					}
				?>
				
				</div>
			
				</div>
			
			<div class="span10 thumb pull-right">
				<?php
				if(isset($kode)){
				$querm=mysql_query("SELECT * FROM tmedis");
				$num=mysql_num_rows($querm);
				$jmlh=$num+1;
				$waktu=date('dmy');
				$nounik="RM-".$waktu.$jmlh;
				?>
			


		<!-- /MENU TAB REKAM MEDIS -->	

				<div class="tabbable" style="margin-bottom: 18px;">
					<ul class="nav nav-tabs">
						<li class="active"><a href="#tab1" data-toggle="tab"><span class="fa fa-medkit"></span> Pemeriksaan Fisik</a></li>
						<li><a href="#racikObt" data-toggle="tab"><span class="fa fa-refresh"></span> Komposisi Lemak & Kebugaran Otot</a></li>
						<li><a href="#jantung" data-toggle="tab"><span class="fa fa-refresh"></span> Jantung-Paru & Kepadatan Tulang</a></li>
                        <li><a href="media.php?module=rekam_medik&&status=<?php echo $status; ?>&&kodepasien=<?php echo $kode; ?>"><span class="fa fa-refresh"></span> Reload</a></li>
                        
                        <li><a href="media.php?module=rekam_medik"><span class="fa fa-close"></span> Exit</a></li>
					</ul>
			

			<!-- /#################################################################################tabbable 1-->	
			


				<div class="tab-content" style="padding-bottom: 9px; border-bottom: 1px solid #ddd;">
					<?php
						$bukadiag=$_GET['diagnosa'];
						$koderm=$_GET['koderm'];
						if($bukadiag=='on'){
					?>
						<div class="tab-pane active" id="tab3">
						<div class="control-group">
						
					<?php
						$qkel=mysql_query("SELECT * FROM tmedis WHERE no_rm='$koderm'");
						$rkel=mysql_fetch_array($qkel);
					?>


						<form method="post" action="<?php echo $aksi."?module=ubah_diag" ?>">
						<input type="hidden" name="t1" value="<?php echo $rkel['no_rm'] ?>">
						<input type="hidden" name="kode" value="<?php echo $kode; ?>">
						
						<div class="control-group">
									<label class="control-label" for="inputEmail">Keluhan</label>
									<div class="controls">
                                    <input type="hidden" name="status" value="<?php echo $status; ?>">
									<textarea class="span8" name="t4" disabled><?php echo $rkel['keluhan'];?></textarea>
									</div>
						</div>


						<div class="control-group">
									<label class="control-label" for="inputEmail">Diagnosa</label>
									<div class="controls">
									<textarea class="span8" name="t2"></textarea>
									</div>
						</div>
                        

                        <div class="control-group">
									<label class="control-label" for="inputEmail">Nama Penyakit</label>
									<div class="controls">
									<select name="penyakit">
										<option>Pilih Penyakit</option>
										<?php
										$qtind=mysql_query("SELECT * FROM penyakit");
										while($rtind=mysql_fetch_array($qtind)){
										?>
										<option value="<?php echo $rtind['id_penyakit']; ?>"><?php echo $rtind['nama_penyakit']; ?></option>
										<?php
										}
										?>
									</select>
									</div>
							</div>
						<div class="control-group">
									<label class="control-label" for="inputEmail">Tindakan</label>
									<div class="controls">
									<select name="t3" id="tindakan">
										<option>Pilih Tindakan</option>
										<?php
										$qtind=mysql_query("SELECT * FROM tindakan");
										while($rtind=mysql_fetch_array($qtind)){
										?>
										<option value="<?php echo $rtind['id_tindakan']; ?>"><?php echo $rtind['nm_tindakan']; ?></option>
										<?php
										}
										?>
									</select>
									</div>
							</div>

                        <div id="hasil_tindakan"></div>
									<div class="controls">								
									<button class="btn btn-danger" data-toggle="tab"   onclick="window.location='media.php?module=rekam_medik&&status=<?php echo $status; ?>&&kodepasien=<?php echo $kode; ?>'"><i class="icon-arrow-left icon-white"></i> Back</button>
									<button type="submit" class="btn btn-success"><i class="icon-ok-circle icon-white"></i> Simpan</button>
									</div>
									</form>
								</div>
						
							</div>
						
							<?php
							}
	                    
							else{
							$inobat=$_GET['input_obat'];
							if($inobat=='on'){
							?>
							<button type="button" data-toggle="tab" class="btn btn-danger"  onclick="window.location='media.php?module=rekam_medik&&status=<?php echo $status; ?>&&kodepasien=<?php echo $kode; ?>'"><i class="icon-arrow-left icon-white"></i> Back</button>
							<hr>
						
						<div class="tab-pane active" id="tab4">
							<div class="span2">
								<?php
								$query4=mysql_query("SELECT * FROM rekammedik, dokter WHERE rekammedik.nomorRm='$koderm' AND dokter.kodeDokter=rekammedik.kodedokter ORDER BY rekammedik.id_rm DESC");
								$r=mysql_fetch_array($query4);
								?>					
					
								<div class="control-group">
									<label class="control-label" for="inputEmail">Keluhan</label>
										<div class="controls">
										<textarea class="span12" disabled><?php echo $r['keluhan']; ?></textarea>
										</div>
									</div>
	
								<div class="control-group">
									<label class="control-label" for="inputEmail">Diagnosa</label>
										<div class="controls">
											<textarea class="span12" disabled><?php echo $r['diagnosa']; ?></textarea>
										</div>
								</div>
	
								<div class="control-group">
									<label class="control-label" for="inputEmail">Tindakan</label>
										<div class="controls">
											<textarea class="span12" disabled><?php echo $r['tindakan']; ?></textarea>
										</div>
								</div>

								<div class="control-group">
									<label class="control-label" for="inputEmail">Nama Dokter</label>
										<div class="controls">
											<input type="text" class="span12" value="<?php echo $r['nama_dokter']; ?>" disabled>
										</div>
								</div>
							</div>
						</div>
						

						<div class="span10 pull-right" id="inpt">
						<div class="control-group pull-left">
							<label class="control-label" for="inputEmail">Pilih Obat</label>									
							<div class="controls pull-left">
							<select name="t3" id="txtobat">
							<option> Nama Obat</option>
							<?php
								$qtind=mysql_query("SELECT * FROM obat ORDER BY nama_obat ASC");
								while($rtind=mysql_fetch_array($qtind)){								
							?>
							<option value="<?php echo $rtind['id_obat']; ?>"><?php echo $rtind['nama_obat']; ?></option>				
							<?php
								}
							?>
							</select>				
							</div>
							</div>		
								<form method="post" action="mod_rm/aksi_inputob.php?module=tambah">
							<input type="hidden" class="span3" value="<?php echo $koderm; ?>" name="t1">	
							<input type="hidden" class="span10" value="<?php echo $rus['kodeUser']; ?>" name="t7">
							<div id="hasils" class="pull-left span8"></div>			
							</form>
						</div>
									

					<div class="span10">
					<table class="table table-bordered table-striped">
						<thead>
						<tr>
							<th>#</th>
							<th align="center">Nomor RM</th>
							<th align="center">Nama Obat</th>
							<th align="center">Bentuk Obat</th>
							
							<th align="center">Ambil</th>
							
							<th align="center"></th>
						</tr>
						</thead>
						<tbody>
						<?php
						$qobt=mysql_query("SELECT * FROM tmp_obat, obat WHERE tmp_obat.kdrm='$koderm' AND obat.id_obat=tmp_obat.kdobat ORDER BY tmp_obat.id_temp DESC");
						$no=1;
						while($robt=mysql_fetch_array($qobt)){
						
						?>
						<tr bgcolor="#fff">
							<td><?php echo $no; ?></td>
							<td><?php echo $robt['kdrm']; ?></td>
							<td><?php echo $robt['nama_obat']; ?></td>
							<td><?php echo $robt['bentuk']; ?></td>

							
							<td><?php echo $robt['ambil']; ?></td>
							
							<td><button class="btn btn-danger" onclick="window.location='mod_rm/aksi_inputob.php?module=delete&&idtemp=<?php echo $robt['id_temp']; ?>&&ambil=<?php echo $robt['ambil'] ?>&&idobat=<?php echo $robt['kdobat']; ?>'"><i class="icon-trash icon-white"></i></button></td>
						</tr>
						<?php
						$no++;
						}
						?>
						<tr>
							<td colspan="4"></td>
							<td colspan="2">Total Obat<b> 							
							<?php 
							$jmlh=mysql_num_rows($qobt);
							echo $jmlh;
							?>
							</b></td>
						</tr>
						</tbody>
					</table>
					</div>
						<?php
						}
						else{
						?>

<!-- /######################################################################################################tabbable 1-->		





<!-- /########################################################TAMBAH PEMERIKSAAN FISIK ########################-->	

<div class="tab-pane active" id="tab1">

					
						<div class="control-group">
							<div class="controls">								
								<button class="btn btn-info" data-toggle="tab" href="#tab2"><i class="icon-chevron-right icon-white"></i> Data Pemeriksaan Fisik</button>
								<hr>
							</div>
						</div>
<h3>Tambah Pemeriksaan Fisik</h3>
						<hr>
<form method="post" action="<?php echo $aksi."?module=tambah " ?>">

<div class="span3 offset1">
							
								<div class="control-group">
									<label class="control-label" for="inputEmail">Nomor Rekam Medik</label>
									<div class="controls">
									<input type="text" class="span8" value="<?php echo $nounik ?>" disabled>
									<input type="hidden" class="span8" value="<?php echo $nounik ?>" name="t1">
									<input type="hidden" class="span8" value="<?php echo $kode ?>" name="t2">
									<input type="hidden" class="span8" value="<?php echo $rus['kodeUser'] ?>" name="t8">
									</div>
								</div>


								<div class="control-group">
									<div class="controls">
                                          <td><input type="checkbox" name="fsk" value="Y">  Pemeriksaan Fisik </td><br>
                                    </div>

								</div>


								<div class="control-group">
									<div class="controls">
                                          <td><input type="checkbox" name="ppe" value="Y">  Pemeriksaan PPE </td><br>
                                    </div>

								</div>

								<div class="control-group">
									<div class="controls">
                                          <td><input type="checkbox" name="rice" value="Y">  Penanganan RICE </td><br>
                                    </div>

								</div>


								<div class="control-group">
									<div class="controls">
                                          <td><input type="checkbox" name="konsul_gizi" value="Y">  Konsultasi Gizi </td><br>
                                    </div>

								</div>

								<div class="control-group">
									<div class="controls">
                                          <td><input type="checkbox" name="konsul_umum" value="Y"> Konsultasi Umum </td><br>
                                    </div>

								</div>
							
								

								<div class="control-group">
									<div class="controls">
                                          <td><input type="checkbox" name="ekg" value="Y">  Pemeriksaan EKG</td><br>
                                          <br>
                                           <form action="" method="post">   
											 <select name="krt_ekg">  
											 <option value="">Kriteria EKG</option>  
											 <option value="dalam batas normal">Dalam Batas Normal</option>  
											 <option value="kelainan">Kelainan</option>  
											  
											 </select> 
											 </form>
                                    </div>

								</div>
								


								<div class="control-group">

									<label class="control-label" for="inputPassword">Berat Badan</label>

									  		<input type="text" id="inputText" name="bb" class="span4">&nbsp;kg
								   	 </div>


								<div class="control-group">

									<label class="control-label" for="inputPassword">Tinggi Badan</label>

									  		<input type="text" id="inputText" name="tb" class="span4">&nbsp;cm
								   	 </div>

</div>

<div class="span3 offset1">

								<div class="control-group">

									<label class="control-label" for="inputPassword">Indeks Masa Tubuh</label>

									  		<input type="text" id="inputText" name="imt" class="span4">
									  		<form action="aksi_rm.php" method="post">   
											 <select name="krt_imt">  
											 <option value="">Kriteria Indeks masa Tubuh</option> 
											 <option value="Obesitas">Obesitas</option>  
											 <option value="Overweight">Overweight</option>  
											 <option value="Normal">Normal</option>  
											 <option value="Kurus">Kurus</option>  
											 <option value="Kurus Sekali">Kurus Sekali</option>  
											  
											 </select> 
											 </form>


								</div>


								<div class="control-group">

									<label class="control-label" for="inputPassword">Lingkar Tubuh</label>

									  		<input type="text" id="inputText" name="lingktbh" class="span4">&nbsp;cm
									  		<form action="aksi_rm.php" method="post">   
											 <select name="krt_lingktbh">  
											 <option value="">Kriteria Lingkar Tubuh</option>  
											 <option value="normal">Normal</option>  
											 <option value="beresiko penyakit">Beresiko Penyakit</option>  
											  
											 </select> 
											 </form>
								</div>


								<div class="control-group">

									<label class="control-label" for="inputPassword">Denyut Nadi</label>

								</div> 
									<!-- /KRITERIA-->


								<div class="control-group">

									  		<input type="text" id="inputText" name="nadi" class="span4">
									  		<form action="" method="post">   
											 <select name="krt_nadi">  
											 <option value="">Kriteria Denyut Nadi</option> 
											 <option value="Baik Sekali">Baik Sekali</option>  
											 <option value="Baik">Baik</option>  
											 <option value="Normal">Cukup</option>  
											 <option value="Kurang">Kurang</option>  
											 <option value="Kurang Sekali">Kurang Sekali</option>  
											  
											 </select> 
											 </form>

								</div>


								<div class="control-group">
									<label class="control-label" for="inputPassword">Tekanan Darah</label>

									  		<input type="text" id="inputText" name="tek_drh" class="span4">
									  		<form action="aksi_rm.php" method="post">   
											 <select name="krt_tekdrh">  
											 <option value="">Kriteria Tekanan Darah</option> 
											 <option value="Hypotensi">Hypotensi</option>  
											 <option value="Normal">Normal</option>  
											 <option value="Prehypertensi">Prehypertensi</option>  
											 <option value="Hyepertensi">Hyepertensi</option>  
											  
											 </select> 
											 </form>
								</div>

													
								<!--<div class="control-group">
									<div class="controls">							
									
									<button class="btn btn-danger" data-toggle="tab" href="#tab1"><i class="icon-arrow-left icon-white"></i> Back</button>
									
									<button type="submit" class="btn btn-success"><i class="icon-ok-circle icon-white"></i> Simpan
									</button>
									
									</div>
								</div> -->

</div>
							<div class="span4">								
								<div id="tampil"></div>
								
</form>



					
					</div>	
					</form>
					</div>
                
       <!--#####################################################################################################################-->
					
					
					<?php
					}
					}

                    $qrm=mysql_query("SELECT * FROM tmedis, dokter, pasien_tanggungan, pasien WHERE pasien_tanggungan.kodepasien=pasien.kodePasien AND pasien.kodePasien='$kode' AND rekammedik.kodepasien=pasien_tanggungan.kode_tang AND dokter.kodeDokter=rekammedik.kodedokter ORDER BY rekammedik.id_rm DESC");
                    ?>
			
				

						<div class="tab-pane" id="tab6">
						<button type="button" data-toggle="tab" class="btn btn-danger"  onclick="window.location='media.php?module=rekam_medik&&status=<?php echo $status; ?>&&kodepasien=<?php echo $kode; ?>'"><i class="icon-chevron-left icon-white"></i> Back</button>
						<hr>
						<form method="post" action="<?php echo $aksi."?module=tambah_tang" ?>">
							<div class="span6">
								<div class="control-group">
									<label class="control-label" for="inputEmail">Pilih Tanggungan :</label>
									<div class="controls">
										<select name="t2">
											<option selected disabled>Pilih Tanggungan :</option>
											<?php
												$quetang=mysql_query("SELECT * FROM pasien_tanggungan WHERE kodepasien='$kode'");
												while($rtang=mysql_fetch_array($quetang)){
											?>
												<option value="<?php echo $rtang['kode_tang']; ?>"><?php echo $rtang['nama_tang']; ?></option>
											<?php
											}
											?>									
										</select>
									</div>
								</div>
								
								<div class="control-group">
									<label class="control-label" for="inputEmail">Nomor Rekam Medik</label>
									<div class="controls">
									<input type="text" class="span8" value="<?php echo $nounik ?>" disabled>
									<input type="hidden" class="span8" value="<?php echo $nounik ?>" name="t1">
									
									<input type="hidden" class="span8" value="<?php echo $rus['kodeUser'] ?>" name="t8">
									</div>
								</div>
								<div class="control-group">
									<label class="control-label" for="inputEmail">Masukkan Keluhan :</label>
									<div class="controls">
									<textarea class="span8" name="t4"></textarea>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label" for="inputEmail">Dokter Yang Menangani</label>
									<div class="controls">
									<select name="" id="txtdok" class="span8">
										<option disabled selected>Pilih Dokter</option>
										<?php
										$querdok=mysql_query("SELECT * FROM dokter");
										while($rdok=mysql_fetch_array($querdok)){
										?>
										<option value="<?php echo $rdok['kodeDokter']; ?>"><?php echo $rdok['nama_dokter']; ?></option>
										<?php
										}
										?>
									</select>
									</div>																
								</div>																
								<div class="control-group">
									<div class="controls">								
									<button class="btn btn-danger" data-toggle="tab" href="#tab1"><i class="icon-arrow-left icon-white"></i> Back</button>
									<button type="submit" class="btn btn-success"><i class="icon-ok-circle icon-white"></i> Simpan</button>
									</div>
								</div>
							</div>							
							<div class="span4">								
								<div id="tampil"></div>
								
							</div>	
						</form>							
						</div>		
						


<!-- /################################# TAMBAH KOMPOSISI LEMAK DAN KEBUGARAN OTOT ###################################-->	

	
					<div class="tab-pane" id="racikObt">


                        <button class="btn btn-info" data-toggle="tab" href="#addRacik"><i class="icon-chevron-right icon-white"></i>  Data Komposisi Lemak & Kebugaran Otot</button>
                        <hr>

					<h3>Tambah Komposisi Lemak dan Kebugaran Otot</h3>
					<hr>
<form method="post" action="<?php echo $aksi."?module=tambah" ?>">

<div class="span3 offset1">
                    <input type="hidden" id="inputText" name="kode" value="<?php echo $kode; ?>" class="span4">
                    <input type="hidden" id="inputText" name="status" value="<?php echo $status ?>" class="span4">


                  
                    <div class="control-group">
						<label class="control-label" for="inputPassword">Skinfold Caliper</label>
						<div class="controls">
						  <input type="text" id="inputText" name="t4" class="span4">
					   </div>
				    </div>

                    <div class="control-group">
						<label class="control-label" for="inputPassword">Fat Analyzer</label>
						<div class="controls">
						   <input type="text" id="inputText" name="t4" class="span4">
					   </div>
				    </div>


				    <hr>
                    <div class="control-group">
						<label class="control-label" for="inputPassword">Kekuatan Otot Kanan</label>
						<div class="controls">
						   <input type="text" id="inputText" name="t4" class="span4">
					   </div>
				    </div>

                    <div class="control-group">
						<label class="control-label" for="inputPassword">Kekuatan Otot Kiri</label>
						<div class="controls">
						   <input type="text" id="inputText" name="t4" class="span4">
					   </div>
				    </div>
                    <div class="control-group">
						<label class="control-label" for="inputPassword">Kekuatan Otot Leg</label>
						<div class="controls">
						  
						   <input type="text" id="inputText" name="t4" class="span4">
					   </div>
				    </div>
                    <div class="control-group">
						<label class="control-label" for="inputPassword">Kekuatan Otot Back</label>
						<div class="controls">
						   <input type="text" id="inputText" name="t4" class="span4">
					   </div>
				    </div>

				     <div class="control-group">
						<label class="control-label" for="inputPassword">Flexibilitas</label>
						<div class="controls">
						   <input type="text" id="inputText" name="t4" class="span4">
					   </div>
				    </div>

                    <div class="control-group">
						<label class="control-label" for="inputPassword">Daya Ledak Otot</label>
						<div class="controls">
						   <input type="text" id="inputText" name="t4" class="span4">
					   </div>
				    </div>
</div>
<div class="span3" offset>                    
                    <div class="control-group">
                    <div class="controls">
				    <form action="" method="post">  
				    <label> &nbsp;</label>

											 <select name="krt_skinfold">  
											 <option value="">Kriteria Skinfold</option>  
											 <option value="baik sekali">Baik Sekali</option>  
											 <option value="baik">Baik</option>
											 <option value="Normal">Normal</option>
											 <option value="Lebih">Lebih</option>
											 <option value="Lebih Sekali">Lebih Sekali</option>    
											 </select> 
					</form>
					</div>
					</div>


					<div class="control-group">
                    <div class="controls">
				    <form action="" method="post">  

				    <br>

											 <select name="krt_fat">  
											 <option value="">Kriteria Fat Analyzer</option>  
											 <option value="baik sekali">Baik Sekali</option>  
											 <option value="baik">Baik</option>
											 <option value="Normal">Normal</option>
											 <option value="Lebih">Lebih</option>
											 <option value="Lebih Sekali">Lebih Sekali</option>  											  
											 </select> 
					</form>
					</div>
					</div>

				
					
					<div class="control-group">
                    <div class="controls">
				    <form action="" method="post">  
				    <br>
				    <br>
				    <br>
				    <br>
				    <br>

											 <select name="krt_fat">  
											 <option value="">Kriteria Otot Tangan</option>  
											 <option value="baik sekali">Baik Sekali</option>  
											 <option value="baik">Baik</option>
											 <option value="Cukup">Cukup</option>
											 <option value="Kurang">Kurang</option>
											 <option value="Kurang Sekali">Kurang Sekali</option>  											  
											 </select> 
					</form>
					</div>
					</div>


					<div class="control-group">
                    <div class="controls">
				    <form action="" method="post">  
				    <label> &nbsp;</label>

											 <select name="krt_ka_ki">  
											 <option value="">Kriteria Otot Leg</option>  
											 <option value="baik sekali">Baik Sekali</option>  
											 <option value="baik">Baik</option>
											 <option value="Cukup">Cukup</option>
											 <option value="Kurang">Kurang</option>
											 <option value="Kurang Sekali">Kurang Sekali</option>    
											 </select> 
					</form>
					</div>
					</div>

					<div class="control-group">
                    <div class="controls">
				    <form action="" method="post">  
				    <br>

											 <select name="krt_ot_back">  
											 <option value="">Kriteria Otot Back</option>  
											 <option value="baik sekali">Baik Sekali</option>  
											 <option value="baik">Baik</option>
											 <option value="Cukup">Cukup</option>
											 <option value="Kurang">Kurang</option>
											 <option value="Kurang Sekali">Kurang Sekali</option>    
											 </select> 
					</form>
					</div>
					</div>

					<div class="control-group">
                    <div class="controls">
				    <form action="" method="post">  
				    <br>
			
											 <select name="krt_flex">  
											 <option value="">Kriteria Flexibilitas</option>  
											 <option value="baik sekali">Baik Sekali</option>  
											 <option value="baik">Baik</option>
											 <option value="Cukup">Cukup</option>
											 <option value="Kurang">Kurang</option>
											 <option value="Kurang Sekali">Kurang Sekali</option>    
											 </select> 
					</form>
					</div>
					</div>

					<div class="control-group">
                    <div class="controls">
				    <form action="" method="post">  
				    <br>
											 <select name="krt_daya_ldk">  
											 <option value="">Kriteria Daya Ledak</option>  
											 <option value="baik sekali">Baik Sekali</option>  
											 <option value="baik">Baik</option>
											 <option value="Cukup">Cukup</option>
											 <option value="Kurang">Kurang</option>
											 <option value="Kurang Sekali">Kurang Sekali</option>    
											 </select> 
					</form>
					</div>
					</div>

            
                    <hr>
                      <!--  <button class="btn btn-danger" data-toggle="tab" href="#tab1"><i class="icon-arrow-left icon-white"></i> Back</button>
						<button type="submit" class="btn btn-success"><i class="icon-ok-circle icon-white"></i> Simpan</button>-->
                    
</div>

							<div class="span4">								
								<div id="tampil"></div>
								
							</div>	
</form>




				</div>




<!-- /#############################################TAMBAH TABEL JANTUNG PARU DAN KEPADATAN TULANG############################### -->	

				<div class="tab-pane" id="jantung">
				    <div class="control-group">


                        <button class="btn btn-info" data-toggle="tab" href="#addjantung"><i class="icon-chevron-right icon-white"></i> Data Tes Jantung, Paru dan Kepadatan Tulang</button>
                        <hr>


                        
                     <h3>Tambah Tes Jantung dan Kepadatan Tulang Satuan VO2max</h3>
                     <hr>
 <form method="post" action="<?php echo $aksi."?module=tambah" ?>">

 <div class="span3 offset1">
                    <input type="hidden" id="inputText" name="kode" value="<?php echo $kode; ?>" class="span4">
                    <input type="hidden" id="inputText" name="status" value="<?php echo $status ?>" class="span4">
                        
                  
                    <div class="control-group">
						<label class="control-label" for="inputPassword">Tes Bangku</label>
						<div class="controls">
						  <input type="text" id="inputText" name="t4" class="span4">
					   </div>
				    </div>

                    <div class="control-group">
						<label class="control-label" for="inputPassword">Tes Sepeda</label>
						<div class="controls">
						  <input type="text" id="inputText" name="t4" class="span4">
					   </div>
				    </div>


                    <div class="control-group">
						<label class="control-label" for="inputPassword">Tes Treadmill</label>
						<div class="controls">
						  <input type="text" id="inputText" name="t4" class="span4">
					   </div>
				    </div>

                    <div class="control-group">
                    <br>
						<label class="control-label" for="inputPassword">Tes Rockport</label>
						<div class="controls">
						  <input type="text" id="inputText" name="t4" class="span4">
					   </div>
				    </div>

                    <div class="control-group">
						<label class="control-label" for="inputPassword">Tes Spirometri</label>
						<div class="controls">
						  
						  <input type="text" id="inputText" name="t5" class="span4">
					   </div>
				    </div>
                    <div class="control-group">
						<label class="control-label" for="inputPassword">Tes Densitometri</label>
						<div class="controls">
						  <input type="text" id="inputText" name="t6" class="span4">
					   </div>
				    </div>

                        
                        <hr>
                        <button class="btn btn-danger" data-toggle="tab" href="#tab1"><i class="icon-arrow-left icon-white"></i> Back</button>
						<button type="submit" class="btn btn-success"><i class="icon-ok-circle icon-white"></i> Simpan</button>
                    
</div>


<div class="span3" offset>                    
                    <div class="control-group">
                    <div class="controls">
				    <form action="" method="post">  
				    <label> &nbsp;</label>

											 <select name="krt_bangku">  
											 <option value="">Kriteria Tes Bangku</option>  
											 <option value="baik sekali">Baik Sekali</option>  
											 <option value="baik">Baik</option>
											 <option value="Normal">Normal</option>
											 <option value="Lebih">Lebih</option>
											 <option value="Lebih Sekali">Lebih Sekali</option>    
											 </select> 
					</form>
					</div>
					</div>


					<div class="control-group">
                    <div class="controls">
				    <form action="" method="post">  

				    <br>

											 <select name="krt_sepeda">  
											 <option value="">Kriteria Tes Sepeda</option>  
											 <option value="baik sekali">Baik Sekali</option>  
											 <option value="baik">Baik</option>
											 <option value="Normal">Normal</option>
											 <option value="Lebih">Lebih</option>
											 <option value="Lebih Sekali">Lebih Sekali</option>  											  
											 </select> 
					</form>
					</div>
					</div>

				
					
					<div class="control-group">
                    <div class="controls">
				    <form action="" method="post">  
				    <br>


											 <select name="krt_treadmill">  
											 <option value="">Kriteria Tes Treadmill</option>  
											 <option value="baik sekali">Baik Sekali</option>  
											 <option value="baik">Baik</option>
											 <option value="Cukup">Cukup</option>
											 <option value="Kurang">Kurang</option>
											 <option value="Kurang Sekali">Kurang Sekali</option>  											  
											 </select> 
					</form>
					</div>
					</div>


					<div class="control-group">
                    <div class="controls">
				    <form action="" method="post">  
				    <br>

											 <select name="krt_rockport">  
											 <option value="">Kriteria Tes Rockport</option>  
											 <option value="baik sekali">Baik Sekali</option>  
											 <option value="baik">Baik</option>
											 <option value="Cukup">Cukup</option>
											 <option value="Kurang">Kurang</option>
											 <option value="Kurang Sekali">Kurang Sekali</option>    
											 </select> 
					</form>
					</div>
					</div>

					<div class="control-group">
                    <div class="controls">
				    <form action="" method="post">  
				    <br>

											 <select name="krt_spiro">  
											 <option value="">Kriteria Tes Spirometri</option>  
											 <option value="baik sekali">Normal</option>  
											 <option value="baik">Kelainan Obstruktif</option>
											 <option value="Cukup">Kelainan Restriktif</option>
											 <option value="Kurang">Kelainan Kombinasi</option>
											  
											 </select> 
					</form>
					</div>
					</div>

					<div class="control-group">
                    <div class="controls">
				    <form action="" method="post">  
				    <br>
			
											 <select name="krt_densito">  
											 <option value="">Kriteria Tes Densitometri</option>  
											 <option value="baik sekali">Normal</option>  
											 <option value="baik">Osteopenia</option>
											 <option value="Cukup">Osteoporosis</option>
											  
											 </select> 
					</form>
					</div>
					</div>

		

            
                    <hr>
                   
                    
</div>

							<div class="span4">								
								<div id="tampil"></div>
								
							</div>	
</form>


                    </div>



				</div>





				<!-- /############################TABEL DATA KOMPOSISI LEMAT DAN KEBUGARAN OTOT ###########################-->	


<div class="tab-pane" id="addRacik">
                 

<div class="control-group">
                        

                        <table class="table table-bordered table-striped">
						<h4 align="center">Data Komposisi Lemak dan Kebugaran Otot</h4>
						<hr>
						<thead>
						<tr>
							<th>#</th>
							<th align="center">Tanggal</th>
                            <th align="center">Skinfold Caliper</th>
							<th align="center">Fat Analyzer</th>
							<th align="center">Kekuatan Otot Kanan</th>
							<th align="center">Kekuatan Otot Kiri</th>
							<th align="center">Kekuatan Otot Leg</th>
							<th align="center">Kekuatan Otot Back</th>
							<th align="center">Flexibilitas</th>
							<th align="center">Daya Ledak Otot</th>
							
                          
						</tr>
						</thead>
						<tbody>
                    <?php
                    	$a=$_GET['kodem'];
						$query=mysql_query("SELECT * FROM tmedis where id_member= '$a' ORDER BY tmedis.Tgl_RM DESC");
                        $no=1;
                        while($r=mysql_fetch_array($query)){
                    ?>
                        <tr>
                            <td><?php echo $no; ?></td>    
                            <td><?php echo tgl_indo($r['Tgl_RM']); ?></td>  
                            <td><?php echo $r['skinfold']; ?></td>
							<td><?php echo $r['fat']; ?></td>
							<td><?php echo $r['ot_kanan']; ?></td>
							<td><?php echo $r['ot_kiri']; ?></td>
							<td><?php echo $r['ot_leg']; ?></td>
							<td><?php echo $r['ot_back']; ?></td>
							<td><?php echo $r['flex']; ?></td>
							<td><?php echo $r['daya_ldk']; ?></td>
							
                            
                            

                        </tr>
                    <?php
                            $no++;
                        }
                    ?>

                    <button class="btn btn-danger" data-toggle="tab" href="#tab1"><i class="icon-arrow-left icon-white"></i> Back</button><br><br>
                        </tbody>
                        </table>
                    </div>




</div> 



<!-- /####################################### DATA JANTUNG - PARU DAN KEPADATAN TULANG ####################################-->	


<div class="tab-pane" id="addjantung">
				<table class="table table-bordered table-striped">
                        <h4 align="center">Data Jantung-Paru dan Kepadatan Tulang Satuan VO2max </h4>
                        <hr>
						<thead>
						
							<th>#</th>
							<th align="center">Tanggal</th>
                            <th align="center">Tes Bangku</th>
							<th align="center">Tes Sepeda</th>
							<th align="center">Tes Treadmill</th>
							<th align="center">Tes Rockport</th>
							<th align="center">Tes Spirometri</th>
							<th align="center">Tes Densitometri</th>
							
                          
						</tr>
						</thead>
						<tbody>
                    <?php
                    	$a=$_GET['kodem'];
						$query=mysql_query("SELECT * FROM tmedis where id_member= '$a' ORDER BY tmedis.Tgl_RM DESC");
                        $no=1;
                        while($rj=mysql_fetch_array($query)){
                    ?>
                        <tr>
                            <td><?php echo $no; ?></td>        
                            <td><?php echo tgl_indo($rj['Tgl_RM']); ?></td>  
                            <td><?php echo $rj['bangku']; ?></td>
							<td><?php echo $rj['sepeda']; ?></td>
							<td><?php echo $rj['treadmill']; ?></td>
							<td><?php echo $rj['rockport']; ?></td>
							<td><?php echo $rj['spiro']; ?></td>
							<td><?php echo $rj['densito']; ?></td>
							
                            

                        </tr>
                    <?php
                            $no++;
                        }
                    ?>

                    <button class="btn btn-danger" data-toggle="tab" href="#tab1"><i class="icon-arrow-left icon-white"></i> Back</button><br><br>

                        </tbody>
                        </table>



                    



</div> 






<!-- /######################################################TABEL DATA PEMERIKSAAN FISIK######################################-->	

                
<div class="tab-pane" id="tab2">
							
						
						<table class="table table-bordered table-striped">
						<h4 align="center">Data Pemeriksaan Fisik</h4>
						<thead>
						<tr>
							<th>#</th>
							<th align="center">Tanggal</th>
							<th align="center">Pemeriksaan Fisik</th>
							<th align="center">Pemeriksaan PPE</th>
							<th align="center">Pemeriksaan RICE</th>
							<th align="center">Konsultasi Gizi</th>
							<th align="center">Konsultasi Umum</th>
							<th align="center">Pemeriksaan EKG</th>
							<th align="center">Berat Badan</th>
							<th align="center">Tinggi Badan</th>
							<th align="center">Indeks Massa Tubuh</th>
							<th align="center">Lingkar Tubuh</th>	
							<th align="center">Denyut Nadi</th>
							<th align="center">Tekanan Darah</th>

						</tr>
						</thead>
						

						<tbody>
						<?php
						$a=$_GET['kodem'];
						$qrm=mysql_query("SELECT * FROM tmedis where id_member= '$a' ORDER BY tmedis.Tgl_RM DESC");
						$no=1;
						while($rrm=mysql_fetch_array($qrm)){
						
						?>
						<tr>
							<td><?php echo $no; ?></td>
							<td><?php echo tgl_indo($rrm['Tgl_RM']); ?></td>
							<td><?php echo $rrm['fsk']; ?></td>
							<td><?php echo $rrm['ppe']; ?></td>
							<td><?php echo $rrm['rice']; ?></td>
							<td><?php echo $rrm['konsul_gizi']; ?></td>
							<td><?php echo $rrm['konsul_umum']; ?></td>
							<td><?php echo $rrm['ekg']; ?></td>
							<td><?php echo $rrm['bb']; ?></td>
							<td><?php echo $rrm['tb']; ?></td>
							<td><?php echo $rrm['imt']; ?></td>
							<td><?php echo $rrm['lingktbh']; ?></td>
							<td><?php echo $rrm['nadi']; ?></td>
							<td><?php echo $rrm['tek_drh']; ?></td>
							

						</tr>
						<?php
						$no++;
						}
						?>


						<button class="btn btn-danger" data-toggle="tab" href="#tab1"><i class="icon-arrow-left icon-white"></i> Back</button><br><br>
						
						</tbody>
					</table>






						
</div>	

						


						</div>					
					
						
					  </div>
					</div> <!-- /tabbable -->	
					<?php
					}
					else{
					?>
                
							<div id="hasil"></div>	
                <?php
					}
					?>
			</div>

		</div>

	</section>
<?php
break;
}
?>