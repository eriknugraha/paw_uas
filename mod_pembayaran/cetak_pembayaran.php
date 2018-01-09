<?php
    include ("../config/koneksi.php");
    include ("../config/fungsi_indotgl.php");
    $kode = $_GET['kdo'];
    ?>
<!doctype html>
<html>
    <head>
        <title>Racik Obat</title>
        <link rel="shortcut icon" href="../img/laporan.png">
        <link rel="stylesheet" type="text/css" href="../css/obtracik.css">
    </head>
    <body>
        <div class="page">
        <div class="kop">
            
            <h6>
            
            </h6>
        </div>
        
            <div class="batas"></div>
          
        
            
            
            <table class="table" style="margin-top:40px; width:100%; margin-left: 200px; ">
                 <tr>
                    <td style='width:20px;'>No.</td>    
                    <td style='width:150px;'>Nama Layanan</td>    
                    <td style='width:180px;'>Harga</td>    
                    <td style='width:100px;'>Jumlah</td>    
                    <td style='width:110px;'>Harga Total</td>    
                </tr>
                <?php
                $no=1;
               $queL=mysql_query("SELECT a.nama_member,b.no_kwitansi,c.nama_layanan,c.harga_satuan,c.jml,c.hargaxjml FROM (tmember a INNER JOIN tbyr b on a.id_member=b.id_member) INNER JOIN tdetailbyr c on b.no_kwitansi=c.no_kwitansi where c.no_kwitansi = '$kode'");
                while($rc=mysql_fetch_array($queL)){
                     $nama=$rc['nama_member'];
                    $no_kwitansi=$rc['no_kwitansi'];
                ?>
                        <tr>
                         <td><?php echo $no; ?></td>
                              <td><?php echo $rc['nama_layanan'];?></td>
                              <td>RP.&nbsp;<?php echo number_format($rc['harga_satuan']);?></td>
                                <td><?php echo $rc['jml'];?></td>
                                <td>RP.&nbsp;<?php echo number_format($rc['hargaxjml']);?></td>
                        
                            
                           
            </tr>
                <?php
                    $no++;
                     $gtotal = $gtotal+$rc['hargaxjml'];
                    }
                ?>
                <tr>
    <td colspan='4' align='center'>Total</td>
    <td align='center'><b>RP.&nbsp;<?php echo number_format($gtotal); ?></b></td>
  
    </tr>
                
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
        </div>
    </body>
</html>