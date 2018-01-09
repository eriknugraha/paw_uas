<body style="background:url(img/a.png)">
<style type="text/css">

.bulat{

border-radius:100em;

border-top:2px solid #cf2031;
border-right:2px solid #0f7dc8;
border-bottom:2px solid #2eb31a;
border-left:2px solid #eab823;
width:200px;
height:200px;
}
</style>

<?php
$kodeuser=$_GET['kodepasien'];
$no_kwitansi=$_GET['no_kwitansi'];
$query=mysql_query("SELECT * FROM tmember,tbyr,tdetailbyr WHERE tdetailbyr.`no_kwitansi`='$no_kwitansi' GROUP BY tdetailbyr.`no_kwitansi`");
$r=mysql_fetch_array($query);
?>
    <section>
        <ul class="breadcrumb" style="margin-bottom: 5px;">
            <li><a href="media.php?module=dokter">Data Clien</a> <span class="divider"><b>&gt;</b></span></li>
            <li class="active">Detail Pembayaran</li>
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
                                      Silahkan Detail Pembayaran Clien <b><?php echo $r['nama_member'];?></b>
                                         </div>
                <div class="clear"></div>
      

              
                <div class="span8">                         
                     
                            <div></div>
                        <div class='col-xs-12 col-sm-9'>
                     <!--    <div class='center'>
                                <div class="pull-center alert alert-success no-margin close ">
                                 
                                <h3> Detail Pembayaran Clien</h3></div>                       
                                 
                                

                                
                                    
                                         </div> -->
                        
                       
                        
                         <br />
                        
                        
                        </div>
                        
<div class="span5 offset1">

                        <div class='space-12'></div>
                        <h4 class='widget-title smaller'>
                        <i class='ace-icon fa fa-check-square-o bigger-110'></i> 
                        Data Pembayaran
                        </h4>     
                         <table bordercolor ="#DEB887" border="1" width="300px" height="100px">
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
                            <td width="100px" align="right" bgcolor="#DEB887  "><label class="control-label" for="inputPassword">&nbsp; No Kwitansi </label></td>
                            <td>&nbsp;&nbsp;<?php echo $r['no_kwitansi'] ?></td>
                        </tr>
                        <tr >
                            <td width="100px" align="right" bgcolor="#DEB887  "><label class="control-label" for="inputPassword">&nbsp; Tanggal Bayar </label></td>
                            <td>&nbsp;&nbsp;<?php echo $r['tgl_bayar'] ?></td>
                        </tr>
                        
                          <tr >
                            <td width="50px" align="right" bgcolor="#DEB887"><label class="control-label" for="inputPassword">&nbsp; Jenis Bayar </label></td>
                            <td>&nbsp;&nbsp;<?php echo $r['jns_bayar'] ?></td>
                        </tr>
                          
                        </table>

</div>



                      <br>

                      <br>
<div class="span5">

                      <table bordercolor ="#DEB887" border="1" width="500px" height="50px">

                      <tr>
                        
                        <td width="100px" align="center" bgcolor="#DEB887">No</td>
                        <td width="300px" align="center" bgcolor="#DEB887" >ID Layanan</td>
                        <td width="300px" align="center" bgcolor="#DEB887" >Nama Layanan</td>
                        <td width="300px" align="center" bgcolor="#DEB887">Harga Satuan</td>
                        <td width="300px" align="center" bgcolor="#DEB887">Jumlah</td>
                        <td width="300px" align="center" bgcolor="#DEB887">Subtotal</td>
                        
                      </tr>

                      <?php
                      $queryy=mysql_query("SELECT * FROM tdetailbyr WHERE tdetailbyr.`no_kwitansi`='$no_kwitansi'  ");

                     
                      $i = 1;
                      $no=1;

                      while($ra = mysql_fetch_array($queryy)) {

                        ?>

                      <tr>
                         <td><center><?php echo $no; ?></td>
                         <td><center><?php echo $ra['id_layanan']; ?></td>
                         <td><center><?php echo $ra['nama_layanan']; ?></td>                
                         <td><center><?php echo number_format($ra['harga_satuan'], 0, ',', '.'); ?></td>
                         <td><center><?php echo $ra['jml']; ?></td>
                         <td><center><?php echo number_format($ra['hargaxjml'], 0, ',', '.'); ?></td>                        
                      </tr>
                         <?php
                         $no++;
                     }

                     ?>


                      <?php
                      $queryy=mysql_query("SELECT SUM(tdetailbyr.`hargaxjml`) AS 'total' FROM tdetailbyr WHERE tdetailbyr.`no_kwitansi`='$no_kwitansi'  ");

                      $total=0;


                      $i = 1;
                      while($rt = mysql_fetch_array($queryy)) {

                        ?>


                       </table>
                       <br>
                       <table bordercolor ="#DEB887" border="1">
                      <tr>
                        
                        <td width="200px" align="center"  bgcolor="#DEB887">Total</td>
                        <td width="300px" align="center"><?php echo number_format($rt['total'], 0, ',', '.'); ?></td>


                        
                      </tr>
                    <?php
                     }

                     ?>

                       </table>

  </div>           


                                </div>
                            </div>
                            </td>
                        </tr>
                    </thead>
        </div>
    </section>




 </body>
