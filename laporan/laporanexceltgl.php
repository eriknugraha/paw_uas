<?php 
header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=laporan_rm");
mysql_connect("localhost", "root", "");
mysql_select_db("bugar");
?>

     <?php

$kode=$_POST['z'];

$sqll = "SELECT * FROM tmember,tmedis WHERE tmember.id_member= tmedis.id_member AND tmedis.id_member ='$kode'";  
	$q	= mysql_query($sqll);
	 $datax= mysql_fetch_array($q);

	echo "<table width='100%'>
		<tr>
			
							<td> id_member</td>
							<td> $datax[id_member]</td>
						</tr>
						<tr >
							<td> Nama</td>
							<td>$datax[nama_member]</td>
						</tr>
							<tr >
							<td> </td>
							<td></td>
						</tr>
							<tr >
							<td> </td>
							<td></td>
						</tr>
					
						
			
			</tr> 
			</table>";

echo "<table border='1' width='100%'>
		<tr>
			<th width='5%'>No</th>
			<th>Tanggal</th>
			<th>ppe</th>
			<th>fsk</th>
			<th>ekg</th>
			<th>konsul_gizi</th>
			<th>Rice</th>
			<th>konsul_umum</th>
			<th>bb</th>
			<th>tb</th>
			<th>imt</th>
			<th>lingktbh</th>
			<th>nadi</th>
			<th>tek_drh</th>
			<th>skinfold</th>
			<th>fat</th>
			<th>ot_kanan</th>
			<th>ot_kiri</th>
			<th>ot_leg</th>
			<th>ot_back</th>
			<th>flex</th>
			<th>daya_ldk</th>
			<th>bangku</th>
			<th>sepeda</th>
			<th>treadmill</th>
			<th>rockport</th>
			<th>densito</th>
			<th>spiro</th>
			<th>nadi_istirahat</th>
			<th>pemeriksa</th>
		


		</tr>";



$kode=$_POST['z'];
$tgl1 = date_format(date_create($_POST['tgl1']), 'Y-m-d');
$tgl2 = date_format(date_create($_POST['tgl2']), 'Y-m-d');
$sql = "SELECT * FROM tmedis WHERE  Tgl_RM BETWEEN '$tgl1' AND '$tgl2' AND id_member ='$kode'";  
	$query	= mysql_query($sql);
	$no=1;
	while($rows=mysql_fetch_array($query)){

		echo "<tr>
				<td align='center'>$no</td>
				<td align='center'>$rows[Tgl_RM]</td>
				<td>$rows[ppe]</td>
				<td align='center'>$rows[fsk]</td>
				<td align='center'>$rows[ekg]</td>
				<td align='center'>$rows[konsul_gizi]</td>
				<td align='center'>$rows[rice]</td>
				<td align='center'>$rows[konsul_gizi]</td>
				<td align='center'>$rows[bb]</td>
				<td align='center'>$rows[tb]</td>
				<td align='center'>$rows[imt]</td>
				<td align='center'>$rows[lingktbh]</td>
				<td align='center'>$rows[nadi]</td>
				<td align='center'>$rows[tek_drh]</td>
				<td align='center'>$rows[skinfold]</td>
				<td align='center'>$rows[fat]</td>
				<td align='center'>$rows[ot_kanan]</td>
				<td align='center'>$rows[ot_kiri]</td>
				<td align='center'>$rows[ot_leg]</td>
				<td align='center'>$rows[ot_back]</td>
				<td align='center'>$rows[flex]</td>
				<td align='center'>$rows[daya_ldk]</td>
				<td align='center'>$rows[bangku]</td>
				<td align='center'>$rows[sepeda]</td>
				<td align='center'>$rows[treadmill]</td>
				<td align='center'>$rows[rockport]</td>
				<td align='center'>$rows[densito]</td>
				<td align='center'>$rows[spiro]</td>
				<td align='center'>$rows[nadi_istirahat]</td>
				<td align='center'>$rows[pemeriksa]</td>
				

			</tr>";
	$no++;
	
	
	}
echo "
	<tr>
		
	</table>";
?>


				  