<?php
$con=mysqli_connect("localhost","root","","yo_perpus");

if (!$con) {
  die('Could not connect: ' . mysql_error());
}


// Data for Sugar
$query = mysqli_query($con,"SELECT count(id_buku) as peminjam FROM yo_peminjaman  group by id_buku");
$rows = array();
$rows['name'] = 'peminjam';
while($tmp= mysqli_fetch_array($query)) {
    $rows['data'][] = $tmp['peminjam'];
}

// Data for Rice
/*$query = mysqli_query($con,"SELECT count(id_anggota) as anggota FROM yo_anggota  group by id_anggota");
$rows1 = array();
$rows1['name'] = 'anggota';
while($tmp = mysqli_fetch_array($query)) {
    $rows1['data'][] = $tmp['anggota'];
}
 
// Data for Wheat Flour
$query = mysqli_query($con,"SELECT wheat_flour FROM comodity");
$rows2 = array();
$rows2['name'] = 'Wheat Flour';
while($tmp = mysqli_fetch_array($query)) {
    $rows2['data'][] = $tmp['wheat_flour'];
} */

$result = array();
array_push($result,$rows);
//array_push($result,$rows1);
//array_push($result,$rows2); */

print json_encode($result, JSON_NUMERIC_CHECK);

mysqli_close($con);
?> 
