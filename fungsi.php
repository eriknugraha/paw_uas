<?php
function bayar($no) {
	$query	= "SELECT sum(hargaxjml)as total 
				FROM tdetailbyr
				WHERE no_kwitansi=$no";
	$data	= mysql_fetch_array(mysql_query($queryl));
	$r		= mysql_num_rows(mysql_query($query));
	if ($r>0){
		$hasil		= $data['total'];
	}else{
		$hasil		= 0;
	}
	return $hasil;
}
?>