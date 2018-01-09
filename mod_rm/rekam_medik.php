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
	
		
	
		 
			});



	</script>
	 <?php
  $p      = new Paging;
    $batas  = 10;
    $posisi = $p->cariPosisi($batas);
?>

	<section>
		

		<div class="row-fluid">
			<div class="span2 pull-left">
				<div class="span12" style="background:#fff;">
				<form method="post" action="<?php echo $aksi."?module=tambah " ?>">
				
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
								<input type="text" class="span12" name ="tgl" id="inputText" value="<?php echo date('Y-m-d'); ?>" disabled>
								</div>
							</div>
							
				

							<hr>


					<div class="control-group">
								<label class="control-label" for="inputText">ID Klien</label>
								<div class="controls">
								<input type="text" class="span12" name ="id_member" id="inputText" value="<?php echo $r['id_member']; ?>" disabled>
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
								<input type="text" class="span12" name="umur" id="inputText" value="<?php echo $umur." Tahun"; ?>" disabled>
								</div>
						</div>
						
					<div class="control-group">
								<label class="control-label" for="inputText">Jenis Kelamin</label>
								<div class="controls">
								<input type="text" class="span12" name="sex" id="inputText"  value="<?php echo $r['sex']; ?>" disabled>
								</div>
						</div>




							
													
				<?php
					}
						else{
				?>
					<div class="control-group">						
								<div class="rm_text">
									<div class="controls">
									<input type="text" class="span12" id="txtkdpasien" placeholder="Kode/Nama Member">
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
						
							<?php  {{ ?> 
							
	           			
							
							
						
							
									

					

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
                                          <td><input type="checkbox" name="fsk" value="Y":"N">  Pemeriksaan Fisik </td><br>
                                    </div>

								</div>


								<div class="control-group">
									<div class="controls">
                                          <td><input type="checkbox" name="ppe" value="Y":"N">  Pemeriksaan PPE </td><br>
                                    </div>

								</div>

								<div class="control-group">
									<div class="controls">
                                          <td><input type="checkbox" name="rice" value="Y":"N">  Penanganan RICE </td><br>
                                    </div>

								</div>


								<div class="control-group">
									<div class="controls">
                                          <td><input type="checkbox" name="konsul_gizi" value="Y":"N">  Konsultasi Gizi </td><br>
                                    </div>

								</div>

								<div class="control-group">
									<div class="controls">
                                          <td><input type="checkbox" name="konsul_umum" value="Y":"N"> Konsultasi Umum </td><br>
                                    </div>

								</div>
							
								

								<div class="control-group">
									<div class="controls">
                                          <td><input type="checkbox" name="ekg" value="Y":"N">  Pemeriksaan EKG</td><br>
                                          <br>
                                         
											 <select name="krt_ekg">  
											 <option value="">Kriteria EKG</option>  
											 <option value="dalam batas normal">Dalam Batas Normal</option>  
											 <option value="kelainan">Kelainan</option>  
											  
											 </select> 
											
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
									  	 
											 <select name="krt_imt">  
											 <option value="">Kriteria Indeks masa Tubuh</option> 
											 <option value="Obesitas">Obesitas</option>  
											 <option value="Overweight">Overweight</option>  
											 <option value="Normal">Normal</option>  
											 <option value="Kurus">Kurus</option>  
											 <option value="Kurus Sekali">Kurus Sekali</option>  
											  
											 </select> 
										


								</div>


								<div class="control-group">

									<label class="control-label" for="inputPassword">Lingkar Tubuh</label>

									  		<input type="text" id="inputText" name="lingktbh" class="span4">&nbsp;cm
									  		
											 <select name="krt_lingktbh">  
											 <option value="">Kriteria Lingkar Tubuh</option>  
											 <option value="normal">Normal</option>  
											 <option value="beresiko penyakit">Beresiko Penyakit</option>  
											  
											 </select> 
											
								</div>


								<div class="control-group">

									<label class="control-label" for="inputPassword">Denyut Nadi</label>

								</div> 
									<!-- /KRITERIA-->


								<div class="control-group">

									  		<input type="text" id="inputText" name="nadi" class="span4">
									  	 
											 <select name="krt_nadi">  
											 <option value="">Kriteria Denyut Nadi</option> 
											 <option value="Baik Sekali">Baik Sekali</option>  
											 <option value="Baik">Baik</option>  
											 <option value="Normal">Cukup</option>  
											 <option value="Kurang">Kurang</option>  
											 <option value="Kurang Sekali">Kurang Sekali</option>  
											  
											 </select> 
										

								</div>


								<div class="control-group">
									<label class="control-label" for="inputPassword">Tekanan Darah</label>

									  		<input type="text" id="inputText" name="tek_drh" class="span4">
									  		
											 <select name="krt_tekdrh">  
											 <option value="">Kriteria Tekanan Darah</option> 
											 <option value="Hypotensi">Hypotensi</option>  
											 <option value="Normal">Normal</option>  
											 <option value="Prehypertensi">Prehypertensi</option>  
											 <option value="Hyepertensi">Hyepertensi</option>  
											  
											 </select> 
										
								</div>

													
							

</div>
<div class="span3">
<div class="control-group">
									<label class="control-label" for="inputPassword">Nadi Istirahat</label>

									  		<input type="text" id="inputText" name="nadi_istirahat" class="span4">
									  		
											 <select name="k_nadi_istirahat"> 
											 <option value="">Kriteria Nadi Istirahat</option>  
											  <option value="Baik Sekali">Baik Sekali</option>  
											 <option value="Baik">Baik</option>  
											 <option value="Normal">Cukup</option>  
											 <option value="Kurang">Kurang</option>  
											 <option value="Kurang Sekali">Kurang Sekali</option> 											  
											 </select> 
										
								</div>
</div>
							<div class="span4">								
								<div id="tampil"></div>
								
<!-- </form>
 -->


					
					</div>	
				


					</div>
                
       <!--#####################################################################################################################-->
					
					
					<?php
					}
					}

                
                    ?>
			
				

								
						


<!-- /################################# TAMBAH KOMPOSISI LEMAK DAN KEBUGARAN OTOT ###################################-->	

	
					<div class="tab-pane" id="racikObt">


                        <button class="btn btn-info" data-toggle="tab" href="#addRacik"><i class="icon-chevron-right icon-white"></i>  Data Komposisi Lemak & Kebugaran Otot</button>
                        <hr>

					<h3>Tambah Komposisi Lemak dan Kebugaran Otot</h3>
					<hr>

<div class="span3 offset1">
                    <input type="hidden" id="inputText" name="kode" value="<?php echo $kode; ?>" class="span4">
                    <input type="hidden" id="inputText" name="status" value="<?php echo $status ?>" class="span4">


                  
                    <div class="control-group">
						<label class="control-label" for="inputPassword">Skinfold Caliper</label>
						<div class="controls">
						  <input type="text" id="inputText" name="skinfold" class="span4">
					   </div>
				    </div>

                    <div class="control-group">
						<label class="control-label" for="inputPassword">Fat Analyzer</label>
						<div class="controls">
						   <input type="text" id="inputText" name="fat" class="span4">
					   </div>
				    </div>


				    <hr>
                    <div class="control-group">
						<label class="control-label" for="inputPassword">Kekuatan Otot Kanan</label>
						<div class="controls">
						   <input type="text" id="inputText" name="ot_kanan" class="span4">
					   </div>
				    </div>

                    <div class="control-group">
						<label class="control-label" for="inputPassword">Kekuatan Otot Kiri</label>
						<div class="controls">
						   <input type="text" id="inputText" name="ot_kiri" class="span4">
					   </div>
				    </div>
                    <div class="control-group">
						<label class="control-label" for="inputPassword">Kekuatan Otot Leg</label>
						<div class="controls">
						  
						   <input type="text" id="inputText" name="ot_leg" class="span4">
					   </div>
				    </div>
                    <div class="control-group">
						<label class="control-label" for="inputPassword">Kekuatan Otot Back</label>
						<div class="controls">
						   <input type="text" id="inputText" name="ot_back" class="span4">
					   </div>
				    </div>

				     <div class="control-group">
						<label class="control-label" for="inputPassword">Flexibilitas</label>
						<div class="controls">
						   <input type="text" id="inputText" name="flex" class="span4">
					   </div>
				    </div>

                    <div class="control-group">
						<label class="control-label" for="inputPassword">Daya Ledak Otot</label>
						<div class="controls">
						   <input type="text" id="inputText" name="daya_ldk" class="span4">
					   </div>
				    </div>
</div>
<div class="span3" offset>                    
                    <div class="control-group">
                    <div class="controls">
				     
				    <label> &nbsp;</label>

											 <select name="krt_skinfold">  
											 <option value="">Kriteria Skinfold</option>  
											 <option value="baik sekali">Baik Sekali</option>  
											 <option value="baik">Baik</option>
											 <option value="Normal">Normal</option>
											 <option value="Lebih">Lebih</option>
											 <option value="Lebih Sekali">Lebih Sekali</option>    
											 </select> 
					
					</div>
					</div>


					<div class="control-group">
                    <div class="controls">
				   
				    <br>

											 <select name="krt_fat">  
											 <option value="">Kriteria Fat Analyzer</option>  
											 <option value="baik sekali">Baik Sekali</option>  
											 <option value="baik">Baik</option>
											 <option value="Normal">Normal</option>
											 <option value="Lebih">Lebih</option>
											 <option value="Lebih Sekali">Lebih Sekali</option>  											  
											 </select> 
					
					</div>
					</div>

				
					
					<div class="control-group">
                    <div class="controls">
				     
				   <br>
				    <br>
				    <br>
				    <br>
				    <br>

											 <select name="krt_ka_ki">  
											 <option value="">Kriteria Otot Tangan</option>  
											 <option value="baik sekali">Baik Sekali</option>  
											 <option value="baik">Baik</option>
											 <option value="Cukup">Cukup</option>
											 <option value="Kurang">Kurang</option>
											 <option value="Kurang Sekali">Kurang Sekali</option>  											  
											 </select> 
					
					</div>
					</div>


					<div class="control-group">
                    <div class="controls">
				
				    <label> &nbsp;</label>

											 <select name="krt_ot_leg">  
											 <option value="">Kriteria Otot Leg</option>  
											 <option value="baik sekali">Baik Sekali</option>  
											 <option value="baik">Baik</option>
											 <option value="Cukup">Cukup</option>
											 <option value="Kurang">Kurang</option>
											 <option value="Kurang Sekali">Kurang Sekali</option>    
											 </select> 
				
					</div>
					</div>

					<div class="control-group">
                    <div class="controls">
				   
				    <br>

											 <select name="krt_ot_back">  
											 <option value="">Kriteria Otot Back</option>  
											 <option value="baik sekali">Baik Sekali</option>  
											 <option value="baik">Baik</option>
											 <option value="Cukup">Cukup</option>
											 <option value="Kurang">Kurang</option>
											 <option value="Kurang Sekali">Kurang Sekali</option>    
											 </select> 
					
					</div>
					</div>

					<div class="control-group">
                    <div class="controls">
				  
				    <br>
			
											 <select name="krt_flex">  
											 <option value="">Kriteria Flexibilitas</option>  
											 <option value="baik sekali">Baik Sekali</option>  
											 <option value="baik">Baik</option>
											 <option value="Cukup">Cukup</option>
											 <option value="Kurang">Kurang</option>
											 <option value="Kurang Sekali">Kurang Sekali</option>    
											 </select> 
					
					</div>
					</div>

					<div class="control-group">
                    <div class="controls">
				 
				    <br>
											 <select name="krt_daya_ldk">  
											 <option value="">Kriteria Daya Ledak</option>  
											 <option value="baik sekali">Baik Sekali</option>  
											 <option value="baik">Baik</option>
											 <option value="Cukup">Cukup</option>
											 <option value="Kurang">Kurang</option>
											 <option value="Kurang Sekali">Kurang Sekali</option>    
											 </select> 
				
					</div>
					</div>

            
                   <!--  <hr>
                        <button class="btn btn-danger" data-toggle="tab" href="#tab1"><i class="icon-arrow-left icon-white"></i> Back</button>
						<button type="submit" class="btn btn-success"><i class="icon-ok-circle icon-white"></i> Simpan</button> -->
                    
</div>

							<div class="span4">								
								<div id="tampil"></div>
								
							</div>	
<!-- </form> -->




				</div>




<!-- /#############################################TAMBAH TABEL JANTUNG PARU DAN KEPADATAN TULANG############################### -->	

				<div class="tab-pane" id="jantung">
				    <div class="control-group">


                        <button class="btn btn-info" data-toggle="tab" href="#addjantung"><i class="icon-chevron-right icon-white"></i> Data Tes Jantung, Paru dan Kepadatan Tulang</button>
                        <hr>


                        
                     <h3>Tambah Tes Jantung dan Kepadatan Tulang Satuan VO2max</h3>
                     <hr>


 <div class="span3 offset1">
                    <input type="hidden" id="inputText" name="kode" value="<?php echo $kode; ?>" class="span4">
                    <input type="hidden" id="inputText" name="status" value="<?php echo $status ?>" class="span4">
                        
                  
                    <div class="control-group">
						<label class="control-label" for="inputPassword">Tes Bangku</label>
						<div class="controls">
						  <input type="text" id="inputText" name="bangku" class="span4">
					   </div>
				    </div>

                    <div class="control-group">
						<label class="control-label" for="inputPassword">Tes Sepeda</label>
						<div class="controls">
						  <input type="text" id="inputText" name="sepeda" class="span4">
					   </div>
				    </div>


                    <div class="control-group">
						<label class="control-label" for="inputPassword">Tes Treadmill</label>
						<div class="controls">
						  <input type="text" id="inputText" name="treadmill" class="span4">
					   </div>
				    </div>

                    <div class="control-group">
                    <br>
						<label class="control-label" for="inputPassword">Tes Rockport</label>
						<div class="controls">
						  <input type="text" id="inputText" name="rockport" class="span4">
					   </div>
				    </div>

                    <div class="control-group">
						<label class="control-label" for="inputPassword">Tes Spirometri</label>
						<div class="controls">
						  
						  <input type="text" id="inputText" name="spiro" class="span4">
					   </div>
				    </div>
                    <div class="control-group">
						<label class="control-label" for="inputPassword">Tes Densitometri</label>
						<div class="controls">
						  <input type="text" id="inputText" name="densito" class="span4">
					   </div>
				    </div>

                        
                        <hr>
                        <button class="btn btn-danger" data-toggle="tab" href="#tab1"><i class="icon-arrow-left icon-white"></i> Back</button>
						<button type="submit" class="btn btn-success"><i class="icon-ok-circle icon-white"></i> Simpan</button>
                    
</div>


<div class="span3" offset>                    
                    <div class="control-group">
                    <div class="controls">
				   
				    <label> &nbsp;</label>

											 <select name="krt_bangku">  
											 <option value="">Kriteria Tes Bangku</option>  
											 <option value="baik sekali">Baik Sekali</option>  
											 <option value="baik">Baik</option>
											 <option value="Normal">Normal</option>
											 <option value="Lebih">Lebih</option>
											 <option value="Lebih Sekali">Lebih Sekali</option>    
											 </select> 
				
					</div>
					</div>


					<div class="control-group">
                    <div class="controls">
				  

				    <br>

											 <select name="krt_sepeda">  
											 <option value="">Kriteria Tes Sepeda</option>  
											 <option value="baik sekali">Baik Sekali</option>  
											 <option value="baik">Baik</option>
											 <option value="Normal">Normal</option>
											 <option value="Lebih">Lebih</option>
											 <option value="Lebih Sekali">Lebih Sekali</option>  											  
											 </select> 
				
					</div>
					</div>

				
					
					<div class="control-group">
                    <div class="controls">
				 
				    <br>


											 <select name="krt_treadmill">  
											 <option value="">Kriteria Tes Treadmill</option>  
											 <option value="baik sekali">Baik Sekali</option>  
											 <option value="baik">Baik</option>
											 <option value="Cukup">Cukup</option>
											 <option value="Kurang">Kurang</option>
											 <option value="Kurang Sekali">Kurang Sekali</option>  											  
											 </select> 
			
					</div>
					</div>


					<div class="control-group">
                    <div class="controls">
				 
				    <br>

											 <select name="krt_rockport">  
											 <option value="">Kriteria Tes Rockport</option>  
											 <option value="baik sekali">Baik Sekali</option>  
											 <option value="baik">Baik</option>
											 <option value="Cukup">Cukup</option>
											 <option value="Kurang">Kurang</option>
											 <option value="Kurang Sekali">Kurang Sekali</option>    
											 </select> 
				
					</div>
					</div>

					<div class="control-group">
                    <div class="controls">
				
				    <br>

											 <select name="krt_spiro">  
											 <option value="">Kriteria Tes Spirometri</option>  
											 <option value="baik sekali">Normal</option>  
											 <option value="baik">Kelainan Obstruktif</option>
											 <option value="Cukup">Kelainan Restriktif</option>
											 <option value="Kurang">Kelainan Kombinasi</option>
											  
											 </select> 
		
					</div>
					</div>

					<div class="control-group">
                    <div class="controls">
			
				    <br>
			
											 <select name="krt_densito">  
											 <option value="">Kriteria Tes Densitometri</option>  
											 <option value="baik sekali">Normal</option>  
											 <option value="baik">Osteopenia</option>
											 <option value="Cukup">Osteoporosis</option>
											  
											 </select> 
				
					</div>
					</div>

		

            
                    <hr>
                   
                    
</div>
<div class="span4">
<br><br><br>
								<?php if ($_SESSION['akses']=="2"){?>
								<div class="control-group">		
								<label class="control-label" for="Text">Pemeriksa</label>
								<div class="controls">
	                 <input type="text" class="span10" id="inputText" name="pemeriksa" value="<?php echo $_SESSION['nama']; ?>" readonly> 
	                 </div></div>
	                             <?php }?>
	                         <?php if ($_SESSION['akses']!="2") {?>

								<div class="form-group">
                                    <label class="col-lg-3 control-label">Pemeriksa</label>
                                    <div class="col-lg-9">
                                        <select class="form-control" name="pemeriksa">
                                            <?php
												include "config/koneksi.php";
												echo "<option>---- Pilih Dokter ----</option>";
												$minta = "SELECT * FROM tdokter";
												$eksekusi = mysql_query($minta);
												while($hasil=mysql_fetch_array($eksekusi))
												{
												$id=$hasil['id_category'];
												echo " <option value=$hasil[nama]>$hasil[nama] </option>";
												}
												?>
												</select></div></div>	 
	                        <?php }?>
					<div class="control-group">
								<label class="control-label" for="Text">Kesimpulan</label>
								<div class="controls">
								<textarea type="text" name="kesimpulan" class="span12" id="inputText"  style="margin-top: 0px; margin-bottom: 10px; height: 168px;"></textarea>







								</div>
						</div>
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
							<th align="center">View</th>
							<th></th>
						</tr>
						</thead>
						<tbody>
                    <?php
                    	$a=$_GET['kodem'];
						$query=mysql_query("SELECT * FROM tmedis where id_member='$a' ORDER BY tmedis.Tgl_RM DESC");
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
							<td><a href="media.php?module=detailp&&kd=<?php echo $r['id_member']; ?>&&tgl=<?php echo $r['Tgl_RM']; ?>&&a=<?php echo $r['kode']; ?>"><i class="icon-zoom-in"></i></a></td>
							<td>
							<a href="media.php?module=editrm&&status=klien&&kodem=<?php echo "$r[id_member]"?>&&id=<?php echo "$r[kode]"?>" ><i class="icon-pencil"></i></a>
                            <a href="<?php echo "$aksi?module=hapus&&kode=$r[kode]";?>" onclick=return confirm('Apakah anda yakin, ingin menghapus data <?php echo $r['kode']; ?>?')><i class="icon-trash"></i></a></td>
                            
                            

                        </tr>
                    <?php
                            $no++;
                        }
                    ?>
                    <tr>
              <td colspan="10">
              <?php
              $jmldata=mysql_num_rows(mysql_query("SELECT * FROM tmember, tmedis WHERE tmember.`id_member`=tmedis.`id_member` "));
              $jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
              $linkHalaman = $p->navHalaman($_GET['halaman'], $jmlhalaman); 
              echo "$linkHalaman";
              ?><td>Jumlah Record <?php echo $jmldata; ?></td>
            </tr>

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
							<th align="center">View</th>
							<th></th>
                          
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
							<td><a href="media.php?module=detailp&&kd=<?php echo $rj['id_member']; ?>&&tgl=<?php echo $rj['Tgl_RM']; ?>&&a=<?php echo $rj['kode']; ?>"><i class="icon-zoom-in"></i></a></td>
							<td>
							 <a href="media.php?module=editrm&&status=klien&&kodem=<?php echo "$rj[id_member]"?>&&id=<?php echo "$rj[kode]"?>" ><i class="icon-pencil"></i></a>
                            <a href="<?php echo "$aksi?module=hapus&&kode=$rj[kode]";?>" onclick=return confirm('Apakah anda yakin, ingin menghapus data <?php echo $rj['kode']; ?>?')><i class="icon-trash"></i></a></td>
                            

                        </tr>
                    <?php
                            $no++;
                        }
                    ?>
                    <tr>
              <td colspan="8">
              <?php
              $jmldata=mysql_num_rows(mysql_query("SELECT * FROM tmember, tmedis WHERE tmember.`id_member`=tmedis.`id_member` "));
              $jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
              $linkHalaman = $p->navHalaman($_GET['halaman'], $jmlhalaman); 
              echo "$linkHalaman";
              ?><td>Jumlah Record <?php echo $jmldata; ?></td>
            </tr>

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
							<th align="center">P.Fisik</th>
							<th align="center">P.PPE</th>
							<th align="center">P.RICE</th>
							<th align="center">K.Gizi</th>
							<th align="center">K.Umum</th>
							<th align="center">P.EKG</th>
							<th align="center">Berat Badan</th>
							<th align="center">Tinggi Badan</th>
							<th align="center">Indeks Massa Tubuh</th>
							<th align="center">Lingkar Tubuh</th>	
							<th align="center">Denyut Nadi</th>
							<th align="center">Tekanan Darah</th>
							<th align="center">View</th>
							<th ></th>
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
							<td><a href="media.php?module=detailp&&kd=<?php echo $rrm['id_member']; ?>&&tgl=<?php echo $rrm['Tgl_RM']; ?>&&a=<?php echo $rrm['kode']; ?>"><i class="icon-zoom-in"></i></a></td>
							<td>
							 <a href="media.php?module=editrm&&status=klien&&kodem=<?php echo "$rrm[id_member]"?>&&id=<?php echo "$rrm[kode]"?>" ><i class="icon-pencil"></i></a>
                            <a href="<?php echo "$aksi?module=hapus&&kode=$rrm[kode]";?>" onclick=return confirm('Apakah anda yakin, ingin menghapus data <?php echo $rrm['kode']; ?>?')><i class="icon-trash"></i></a></td>
						</tr>
						<?php
						$no++;
						}
						?>
						<tr>
              <td colspan="13">
              <?php
              $jmldata=mysql_num_rows(mysql_query("SELECT * FROM tmember, tmedis WHERE tmember.`id_member`=tmedis.`id_member` "));
              $jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
              $linkHalaman = $p->navHalaman($_GET['halaman'], $jmlhalaman); 
              echo "$linkHalaman";
              ?><td>Jumlah Record <?php echo $jmldata; ?></td>
            </tr>


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