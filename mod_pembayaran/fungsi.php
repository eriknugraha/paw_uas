<?php
function bayar($no) {
	$sql	= "SELECT sum(hargaxjml) as total 
				FROM tdetailbyr
				WHERE no_kwitansi=$no";
	$data	= mysql_fetch_array(mysql_query($sql));
	$row		= mysql_num_rows(mysql_query($sql));
	if ($row>0){
		$hasil		= $data['total'];
	}else{
		$hasil		= 0;
	}
	return $hasil;
}
?>