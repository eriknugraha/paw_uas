<style>
.input1 {
  height: 20px;
  font-size: 12px;
  padding-left: 5px;
  margin: 5px 0px 0px 5px;
  width: 97%;
  border: none;
  color: red;
}

*{
    padding: 0px;
    margin: 0px;
}
body{
  font-family:tahoma, 'sans-serif';
}
.kop{
    line-height: 20px;
}
.table{
  border-collapse:collapse;
}
.table .head td{
  background:#fff;  
  text-align:center;
  font-size:14px;
  font-weight:bold;
}
.table tr td{
  border:1px solid #eee;
  padding:5px;
  font-size:9px;
}
.tbl1{
    
}
.tbl2{
    margin-left: 350px;
}
.ttd{
    margin-left: 50px;
    margin-top: 10px;
}
.ttd .head td{
    
  text-align:center;
  font-size:14px;
  font-weight:bold;
}
.ttd tr td{
  padding:5px;
  font-size:9px;
}

</style>

<div class="col-md-12">
                    <body onload="window.print()" 

                    >
                    <center><h2><b> </h2></center>
                        <center><h4></h5></center>

                       <!--  <h4>BUKTI PENGEMBALIAN  <br> <b style='text-transform:uppercase;'></b></h2></center><hr/> -->
                        <div class="panel-body table-responsive">
                        <form action="+kembali.php" method="POST" enctype="multipart/form-data" class="form-horizontal" role="form">
                          <table class="table table-bordered">
                                <thead>


                                </thead>
                                <tbody>
                                 <?php session_start();

include "../config/koneksi.php";
include("../config/fungsi_indotgl.php");
$kode = $_GET['kdo'];
$sql_news = "SELECT a.nama_member,b.no_kwitansi,c.nama_layanan,c.harga_satuan,c.jml,c.hargaxjml
FROM (tmember a INNER JOIN tbyr b on a.id_member=b.id_member)
INNER JOIN tdetailbyr c on b.no_kwitansi=c.no_kwitansi where c.no_kwitansi = '$kode'" ;
$qry_news = mysql_query($sql_news)
or die ("Gagal query tampil");
while($data_newss=mysql_fetch_array($qry_news)){
$nama=$data_newss['nama_member'];
$no_kwitansi=$data_newss['no_kwitansi'];

?>


                                     <tr>
                                    <table width='100%'>

                                  </table>


                                
                                </tbody>
                              </table>

                        </div>
                    </div>
                </div>  <?php }?>

                              <div class="form-group">

                            
                            
                             <table width='100%'  size= '12px'style="font-size: 12px;
                             ">
          <thead>
            <tr class="head3" align="center" >
              <td>No</td><td>Nama Layanan</td><td>Harga</td><td>Jumlah</td><td>Harga Total</td>
            </tr>
          </thead>
          <tbody>
          <?php
          // include "fungsi.php";
          error_reporting(0);
          $query=mysql_query("SELECT a.nama_member,b.no_kwitansi,c.nama_layanan,c.harga_satuan,c.jml,c.hargaxjml
                            FROM (tmember a INNER JOIN tbyr b on a.id_member=b.id_member)
                            INNER JOIN tdetailbyr c on b.no_kwitansi=c.no_kwitansi where c.no_kwitansi = '$kode'");
          $no=1;          
          while($r=mysql_fetch_array($query)){
          // $bayar=bayar($r[no_kwitansi]);
          ?>          
            <tr align="center">
                <td><?php echo $no; ?></td>
                              <td><?php echo $r['nama_layanan'];?></td>
                              <td>RP.&nbsp;<?php echo number_format($r['harga_satuan']);?></td>
                                <td><?php echo $r['jml'];?></td>
                                <td>RP.&nbsp;<?php echo number_format($r['hargaxjml']);?></td>
                        
                            
                           
            </tr>
          
          <?php
          $no++;
          $gtotal = $gtotal+$r['hargaxjml'];
          }
          ?>
          
  <tr>
    <td colspan='4' align='center'>Total</td>
    <td align='center'><b>RP.&nbsp;<?php echo number_format($gtotal); ?></b></td>
  
    </tr>
  
          </tbody>
        </table>

         <table style="width:100%; margin-left: 200px;" >
                <tr>
                    <td><table class="table">
            <tr>
                <td>No.Kwitansi</td>
                <td>:</td>
                <td><?php echo $no_kwitansi ?></td>
            </tr>
            <tr>
                <td>Nama</td>
                <td>:</td>
                <td><?php echo $nama ?></td>
            </tr>
            
            
                    
        </table></td>
                    <td><table class="tbl2" style="font-size: 10px;" >
            <tr>
                <td>Bandung,</td>
                <td><?php echo tgl_indo(date('Y-m-d')) ?></td>
            </tr>
            <tr>
                <td>Penerima</td>
                
            </tr>

            <tr>
                <td>&nbsp;</td>
               
            </tr>
             <tr>
                <td>&nbsp;</td>
               
            </tr>
         
            <tr>
                <td><?php echo $_SESSION['nama']; ?></td>
               
            </tr>
                    
        </table></td>
                </tr>
            </table>