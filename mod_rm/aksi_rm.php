<?php
include ("../config/koneksi.php");
	if($_GET['module']=='tambah'){
		$tgl=date('Y-m-d');
		$id_member=$_POST['t2'];
			
		$ppe=$_POST['ppe'];
		$fsk=$_POST['fsk'];
		$ekg=$_POST['ekg'];
		$krt_ekg=$_POST['krt_ekg'];
		$konsul_gizi=$_POST['konsul_gizi'];
		$rice=$_POST['rice'];
		$konsul_umum=$_POST['konsul_umum'];
		$bb=$_POST['bb'];
		$tb=$_POST['tb'];
		$imt=$_POST['imt'];
		$krt_imt=$_POST['krt_imt'];
		$lingktbh=$_POST['lingktbh'];
		$krt_lingktbh=$_POST['krt_lingktbh'];
		$nadi=$_POST['nadi'];
		$krt_nadi=$_POST['krt_nadi'];
		$tek_drh=$_POST['tek_drh'];
		$krt_tekdrh=$_POST['krt_tekdrh'];
		$skinfold=$_POST['skinfold'];
		$krt_skinfold=$_POST['krt_skinfold'];
		$fat=$_POST['fat'];
		$krt_fat=$_POST['krt_fat'];
		$ot_kanan=$_POST['ot_kanan'];
		$ot_kiri=$_POST['ot_kiri'];
		$krt_ka_ki=$_POST['krt_ka_ki'];
		$ot_leg=$_POST['ot_leg'];
		$krt_ot_leg=$_POST['krt_ot_leg'];
		$ot_back=$_POST['ot_back'];
		$krt_ot_back=$_POST['krt_ot_back'];
		$flex=$_POST['flex'];
		$krt_flex=$_POST['krt_flex'];
		$daya_ldk=$_POST['daya_ldk'];
		$krt_daya_ldk=$_POST['krt_daya_ldk'];
		$bangku=$_POST['bangku'];
		$krt_bangku=$_POST['krt_bangku'];
		$sepeda=$_POST['sepeda'];
		$krt_sepeda=$_POST['krt_sepeda'];
		$treadmill=$_POST['treadmill'];
		$krt_treadmill=$_POST['krt_treadmill'];
		$rockport=$_POST['rockport'];
		$krt_rockport=$_POST['krt_rockport'];
		$densito=$_POST['densito'];
		$krt_densito=$_POST['krt_densito'];
		$spiro=$_POST['spiro'];
		$krt_spiro=$_POST['krt_spiro'];
		$nadi_istirahat=$_POST['nadi_istirahat'];
		$k_nadi_istirahat=$_POST['k_nadi_istirahat'];
		$kesimpulan=$_POST['kesimpulan'];
		$pemeriksa=$_POST['pemeriksa'];;
		$kode=$_POST['t1'];
		$status=$_POST['status'];


		$query=mysql_query("INSERT INTO tmedis (Tgl_RM,id_member,ppe,fsk,ekg,krt_ekg,konsul_gizi,rice,konsul_umum,bb,tb,imt,krt_imt,lingktbh,krt_lingktbh,nadi,krt_nadi,tek_drh,krt_tekdrh,skinfold,krt_skinfold,fat,krt_fat,ot_kanan,ot_kiri,krt_ka_ki,ot_leg,krt_ot_leg,ot_back,krt_ot_back,flex,krt_flex,daya_ldk,krt_daya_ldk,bangku,krt_bangku,sepeda,krt_sepeda, treadmill,krt_treadmill,rockport,krt_rockport,densito,krt_densito,spiro,krt_spiro,nadi_istirahat,k_nadi_istirahat,kesimpulan,pemeriksa,kode)

			                            VALUES ('$tgl','$id_member','$ppe','$fsk','$ekg','$krt_ekg','$konsul_gizi','$rice','$konsul_umum', '$bb', '$tb', '$imt', '$krt_imt', '$lingktbh', '$krt_lingktbh', '$nadi', '$krt_nadi', '$tek_drh', '$krt_tekdrh', '$skinfold', '$krt_skinfold', '$fat', '$krt_fat', '$ot_kanan', '$ot_kiri', '$krt_ka_ki', '$ot_leg', '$krt_ot_leg', '$ot_back', '$krt_ot_back', '$flex', '$krt_flex', '$daya_ldk', '$krt_daya_ldk', '$bangku', '$krt_bangku', '$sepeda', '$krt_sepeda', '$treadmill', '$krt_treadmill', '$rockport', '$krt_rockport', '$densito', '$krt_densito', '$spiro', '$krt_spiro','$nadi_istirahat','$k_nadi_istirahat', '$kesimpulan', '$pemeriksa','$kode ')");


		header("location:../media.php?module=rekam_medik&&status=$status&&kodem=$id_member&&a=$kode");

	}


	elseif($_GET['module']=='hapus'){
		$kode=$_GET['kode'];		
		$query=mysql_query("DELETE FROM tmedis WHERE kode='$kode'");
		header("location:../media.php?module=detailmedik");		
	}




	elseif($_GET['module']=='edit'){
		$tgl=date('Y-m-d');
		$id_member=$_POST['t2'];
			
		$ppe=$_POST['ppe'];
		$fsk=$_POST['fsk'];
		$ekg=$_POST['ekg'];
		$krt_ekg=$_POST['krt_ekg'];
		$konsul_gizi=$_POST['konsul_gizi'];
		$rice=$_POST['rice'];
		$konsul_umum=$_POST['konsul_umum'];
		$bb=$_POST['bb'];
		$tb=$_POST['tb'];
		$imt=$_POST['imt'];
		$krt_imt=$_POST['krt_imt'];
		$lingktbh=$_POST['lingktbh'];
		$krt_lingktbh=$_POST['krt_lingktbh'];
		$nadi=$_POST['nadi'];
		$krt_nadi=$_POST['krt_nadi'];
		$tek_drh=$_POST['tek_drh'];
		$krt_tekdrh=$_POST['krt_tekdrh'];
		$skinfold=$_POST['skinfold'];
		$krt_skinfold=$_POST['krt_skinfold'];
		$fat=$_POST['fat'];
		$krt_fat=$_POST['krt_fat'];
		$ot_kanan=$_POST['ot_kanan'];
		$ot_kiri=$_POST['ot_kiri'];
		$krt_ka_ki=$_POST['krt_ka_ki'];
		$ot_leg=$_POST['ot_leg'];
		$krt_ot_leg=$_POST['krt_ot_leg'];
		$ot_back=$_POST['ot_back'];
		$krt_ot_back=$_POST['krt_ot_back'];
		$flex=$_POST['flex'];
		$krt_flex=$_POST['krt_flex'];
		$daya_ldk=$_POST['daya_ldk'];
		$krt_daya_ldk=$_POST['krt_daya_ldk'];
		$bangku=$_POST['bangku'];
		$krt_bangku=$_POST['krt_bangku'];
		$sepeda=$_POST['sepeda'];
		$krt_sepeda=$_POST['krt_sepeda'];
		$treadmill=$_POST['treadmill'];
		$krt_treadmill=$_POST['krt_treadmill'];
		$rockport=$_POST['rockport'];
		$krt_rockport=$_POST['krt_rockport'];
		$densito=$_POST['densito'];
		$krt_densito=$_POST['krt_densito'];
		$spiro=$_POST['spiro'];
		$krt_spiro=$_POST['krt_spiro'];
		$nadi_istirahat=$_POST['nadi_istirahat'];
		$k_nadi_istirahat=$_POST['k_nadi_istirahat'];
		$kesimpulan=$_POST['kesimpulan'];
		$pemeriksa=$_POST['pemeriksa'];;
		$kode=$_POST['t1'];
		$status=$_POST['status'];
		
		
		$query=mysql_query("UPDATE tmedis SET 


			ppe='$tppe',fsk='$fsk',ekg='$ekg',krt_ekg='$krt_ekg', konsul_gizi='$konsul_gizi',rice='$rice',konsul_umum='$konsul_umum',bb='$bb', tb='$tb', imt='$imt', krt_imt='$krt_imt', lingktbh='$lingktbh', krt_lingktbh='$krt_lingktbh', nadi='$nadi', krt_nadi='$krt_nadi', tek_drh='$tek_drh', krt_tekdrh='$krt_tekdrh', skinfold='$skinfold', krt_skinfold='$krt_skinfold', fat='$fat', krt_fat='$krt_fat', ot_kanan='$ot_kanan', ot_kiri='$ot_kiri', krt_ka_ki='$krt_ka_ki', ot_leg='$ot_leg', krt_ot_leg='$krt_ot_leg', ot_back='$ot_back', krt_ot_back='$krt_ot_back', flex='$flex', krt_flex='$krt_flex', daya_ldk='$daya_ldk', krt_daya_ldk='$krt_daya_ldk', bangku='$bangku', krt_bangku='$krt_bangku', sepeda='$sepeda', krt_sepeda='$krt_sepeda', treadmill='$treadmill', krt_treadmill='$krt_treadmill', rockport='$rockport', krt_rockport='$krt_rockport', densito='$densito', krt_densito='$krt_densito', spiro='$spiro', krt_spiro='$krt_spiro',nadi_istirahat='$nadi_istirahat',k_nadi_istirahat='$k_nadi_istirahat', kesimpulan='$kesimpulan', pemeriksa='$pemeriksa'


			WHERE kode='$kode'
			");

		header("location:../media.php?module=detailmedik");
		



		}




		?>