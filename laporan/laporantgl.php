

<form action="index.php?page=cari" method="post">
 <input type="text" name="carin" placeholder="Nama" size=50 />
    <input type="submit" name="cari "value="Cari" />
</form>


<td><a href="Laporanexceltgl.php"><img src="foto/print.jpg" width="41" height="30" /></a></td>

<?php
include "koneksi.php";
include "fungsi.php";


echo "<table  class='table' width='100%'>
		<tr>
			<th width='5%'>No</th>
			<th>id anggota</th>
			<th>Nama</th>
			<th>L/P</th>
			<th>simpanan</th>
			<th>Pengambilan</th>
			<th>Sisa</th>
		</tr>";
	$sql	= "SELECT a.id_anggota,a.nama,a.j_kel,
				(SELECT sum(besar_simpanan) FROM simpanan WHERE id_anggota=a.id_anggota) as total
				FROM anggota as a
				$where
				ORDER BY id_anggota";
	$query	= mysql_query($sql);
	$no=1;
	while($rows=mysql_fetch_array($query)){
		$simpanan= simpanan($rows[id_anggota]);
		$pengambilann = pengambilan($rows[id_anggota]);
		$pengambilan = $simpanan - $pengambilann;
		echo "<tr>
				<td align='center'>$no</td>
				<td align='center'>$rows[id_anggota]</td>
				<td>$rows[nama]</td>
				<td align='center'>$rows[j_kel]</td>
				<td align='right'>".number_format($simpanan)."</td>
				
				
				<td align='center'>".number_format($pengambilann)."</td>
				<td align='center'>".number_format($pengambilan)."</td>
			</tr>";
	$no++;
	
	$gtotal = $gtotal+$simpanan;
	}
echo "
	<tr>
		<td colspan='6' align='center'>Total</td>
		<td align='right'><b>".number_format($gtotal)."</b></td>
	</table>";
?>
