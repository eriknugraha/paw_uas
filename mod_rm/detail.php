<body style="background:url(img/a.png)">
<style type="text/css">

.bulat{

border-radius:100em;

border-top:2px solid #cf2031;
border-right:2px solid #0f7dc8;
border-bottom:2px solid #2eb31a;
border-left:2px solid #eab823;
width:180px;
height:180px;
}
</style>
<?php
$kodeuser=$_GET['kd'];
$a=$_GET['a'];
$query=mysql_query("SELECT a.id_member,a.nama_member,a.tempat_lahir,a.tlp,a.tgl_lahir,a.sex,a.pekerjaan,a.alamat,a.photo,b.kode,b.pemeriksa
FROM tmember a INNER JOIN tmedis b on a.id_member = b.id_member where b.id_member='$kodeuser' and b.kode='$a' ");
$r=mysql_fetch_array($query);
?>
    <section>
        <ul class="breadcrumb" style="margin-bottom: 5px;">
            <li><a href="media.php?module=dokter">Data Clien</a> <span class="divider"><b>&gt;</b></span></li>
            <li class="active">Detail Clien</li>
        </ul>
        
        <div class="row-fluid">
            <div class="span12 pull-left">
               
                <fieldset>
                <div class="clearfix">
                                 <div class="pull-left alert alert-success no-margin">
                                 <button type="button" class="close" data-dismiss="alert">
                                 <i class="ace-icon fa fa-times"></i>
                                 </button>

                                 <i class="ace-icon fa fa-umbrella bigger-120 blue"></i>
                                      Silahkan detail Clien <b><?php echo $r['nama_member'];?></b>
                                         </div>
                <div class="clear"></div>
                <div class="span2 offset1">
                <br>
                          
                        <?php
                            
                            $foto=$r['photo'];
                            if(isset($foto)){
                                echo "<img src='foto_pasien/$foto' class='bulat' >";
                            }
                              else{
                            echo "<img src='foto_pasien/not_found.png' class='bulat'>";
                            }
                            ?>
                            <img src="">
                            </div>
              
                <div class="span8">                         
                     
                            <div></div>
                        <div class='col-xs-12 col-sm-9'>
                        <div class='center'>
                                <div class="pull-center alert alert-success no-margin close ">
                                 
                                <h3><?php echo $r['pemeriksa'];?> </h3></div>                          
                                 
                                

                                
                                    
                                         </div>
                        
                       
                        
                         <br />
                        
                        
                        </div>
                        
                        
                        <div class='space-12'></div>
                        <h4 class='widget-title smaller'>
                        <i class='ace-icon fa fa-check-square-o bigger-110'></i> 
                        Data Clien
                        </h4>     
                         <table bordercolor ="#DEB887" border="1" width="800px" height="300px">
                    <thead>
                        <tr >
                            <td width="100px" align="right" bgcolor="#DEB887  "><label class="control-label" for="inputPassword">&nbsp;ID  </label></td>
                            <td>&nbsp;&nbsp;<?php echo $r['id_member'] ?></td>
                        </tr>
                       
                          <tr >
                            <td width="100px" align="right" bgcolor="#DEB887  "><label class="control-label" for="inputPassword">&nbsp; Nama </label></td>
                            <td>&nbsp;&nbsp;<?php echo $r['nama_member'] ?></td>
                        </tr>
                          <tr >
                            <td width="100px" align="right" bgcolor="#DEB887  "><label class="control-label" for="inputPassword">&nbsp; Jenis Kelamin </label></td>
                            <td>&nbsp;&nbsp;<?php echo ($r['sex'] =="L" ? "Laki-laki" : "Perempuan") ?></td>
                        </tr>
                          <tr >
                           <td width="100px" align="right" bgcolor="#DEB887  "><label class="control-label" for="inputPassword">&nbsp; alamat </label></td>
                            <td>&nbsp;&nbsp;<i class='fa fa-map-marker light-orange bigger-110'></i>&nbsp;&nbsp;<?php echo $r['alamat'] ?></td>
                        </tr>
                          <tr >
                            <td width="100px" align="right" bgcolor="#DEB887  "><label class="control-label" for="inputPassword">&nbsp; No.tlp </label></td>
                            <td>&nbsp;&nbsp;<?php echo $r['tlp'] ?></td>
                        </tr>
                         <tr >
                            <td width="100px" align="right" bgcolor="#DEB887  "><label class="control-label" for="inputPassword">&nbsp; Pekerjaan </label></td>
                            <td>&nbsp;&nbsp;<?php echo $r['pekerjaan'] ?></td>
                        </tr>
                        <tr >
                            <td width="100px" align="right" bgcolor="#DEB887  "><label class="control-label" for="inputPassword">&nbsp; Tempat Lahir </label></td>
                            <td>&nbsp;&nbsp;<?php echo $r['tempat_lahir'] ?></td>
                        </tr>
                        
                          <tr >
                            <td width="100px" align="right" bgcolor="#DEB887  "><label class="control-label" for="inputPassword">&nbsp; Tgl Lahir </label></td>
                            <td>&nbsp;&nbsp;<?php echo $r['tgl_lahir'] ?></td>
                        </tr>
                        
                       
                       
                
                                </div>
                            </div>  
                            </td>
                        </tr>
                    </thead> </div></table>
                       </section>
   
<section>
     <div class='widget-header widget-header-small'>
     <br>
                      <h4 class='widget-title smaller'>
                      <i class='ace-icon fa fa-check-square-o bigger-110'></i> 
                      Pemeriksaan fisik
                        </h4>
                      </div>
                        <div class='widget-body'>
                        <div class='widget-main'>
                      
            
            <span class='badge badge-warning badge-right'></span></a>
                        <table id='sample-table-2' class='table table-striped table-bordered table-hover'><tr>
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
              <th align="center">Nadi istirahat</th>
                        </tr>
                        
                      <?php
            $a=$_GET['kd'];
             $b=$_GET['a'];
            $qrm=mysql_query("SELECT * FROM tmedis where id_member= '$a' and kode='$b' ORDER BY tmedis.Tgl_RM DESC");
            if ($qrm == 0) {
                            echo "<tr><td colspan='7'>-- Tidak Ada Data --</td></tr>";
                        } else {
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
              <td><?php echo $rrm['nadi_istirahat']; ?></td>
              

            </tr>
            <?php
            $no++;
            }
          }
            ?>
                        
                           
                        </table>
                        </div>
                        </div>  


                   <div class='widget-header widget-header-small'>
     <br>
                      <h4 class='widget-title smaller'>
                      <i class='ace-icon fa fa-check-square-o bigger-110'></i> 
                      Pemeriksaan Komposisi Lemak dan Kebugaran Otot
                        </h4>
                      </div>
                        <div class='widget-body'>
                        <div class='widget-main'>
                      
            
            <span class='badge badge-warning badge-right'></span></a>
                        <table id='sample-table-2' class='table table-striped table-bordered table-hover'><tr>
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
                        
                      <?php
            $a=$_GET['kd'];
             $b=$_GET['a'];
            $q=mysql_query("SELECT * FROM tmedis where id_member='$a' and kode='$b' ORDER BY tmedis.Tgl_RM DESC");
            if ($q == 0) {
                            echo "<tr><td colspan='7'>-- Tidak Ada Data --</td></tr>";
                        } else {
            $no=1;
            while($rr=mysql_fetch_array($q)){
            
            ?>
            <tr>
              <td><?php echo $no; ?></td>    
              <td><?php echo tgl_indo($rr['Tgl_RM']); ?></td>  
              <td><?php echo $rr['skinfold']; ?></td>
              <td><?php echo $rr['fat']; ?></td>
              <td><?php echo $rr['ot_kanan']; ?></td>
              <td><?php echo $rr['ot_kiri']; ?></td>
              <td><?php echo $rr['ot_leg']; ?></td>
              <td><?php echo $rr['ot_back']; ?></td>
              <td><?php echo $rr['flex']; ?></td>
              <td><?php echo $rr['daya_ldk']; ?></td>
              

            </tr>
            <?php
            $no++;
            }
          }
            ?>
                        
                           
                        </table>
                        </div>
                        </div>  

            <div class='widget-header widget-header-small'>
     <br>
                      <h4 class='widget-title smaller'>
                      <i class='ace-icon fa fa-check-square-o bigger-110'></i> 
                      Pemeriksaan Jantung dan Kepadatan Tulang Satuan VO2max
                        </h4>
                      </div>
                        <div class='widget-body'>
                        <div class='widget-main'>
                      
            
            <span class='badge badge-warning badge-right'></span></a>
                        <table id='sample-table-2' class='table table-striped table-bordered table-hover'><tr>
                       
                       <th>#</th>
              <th align="center">Tanggal</th>
              <th align="center">Tes Bangku</th>
              <th align="center">Tes Sepeda</th>
              <th align="center">Tes Treadmill</th>
              <th align="center">Tes Rockport</th>
              <th align="center">Tes Spirometri</th>
              <th align="center">Tes Densitometri</th>
                        </tr>
                        
                      <?php
            $a=$_GET['kd'];
             $b=$_GET['a'];
            $qq=mysql_query("SELECT * FROM tmedis where id_member= '$a'and kode='$b' ORDER BY tmedis.Tgl_RM DESC");
            if ($qq == 0) {
                            echo "<tr><td colspan='7'>-- Tidak Ada Data --</td></tr>";
                        } else {
            $no=1;
            while($rj=mysql_fetch_array($qq)){
            
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
          }
            ?>
                        
                           
                        </table>
                        </div>
                        </div>  
 
 
</section>



 </body>
