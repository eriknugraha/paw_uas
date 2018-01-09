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
$kodeuser=$_GET['kodeuser'];
$query=mysql_query("SELECT * FROM user_man WHERE kodeUser='$kodeuser'");
$r=mysql_fetch_array($query);
?>
    <section>
        <ul class="breadcrumb" style="margin-bottom: 5px;">
            <li><a href="media.php?module=data_user">Data User</a> <span class="divider"><b>&gt;</b></span></li>
            <li class="active">Detail User</li>
        </ul>
        
        <div class="row-fluid">
            <div class="span12 pull-left">
                <form method="post" enctype="multipart/form-data" action="<?php echo "$aksi?module=edit"; ?>">
                <fieldset>
                <div class="clearfix">
                                 <div class="pull-left alert alert-success no-margin">
                                 <button type="button" class="close" data-dismiss="alert">
                                 <i class="ace-icon fa fa-times"></i>
                                 </button>

                                 <i class="ace-icon fa fa-umbrella bigger-120 blue"></i>
                                      Silahkan detail user <b><?php echo $r['nama'];?></b>
                                         </div>
                <div class="clear"></div>
                <div class="span2 offset1">
                <br>
                          
                        <?php
                            
                            $foto=$r['photo'];
                            if(isset($foto)){
                                echo "<img src='photo_user/$foto' class='bulat' >";
                            }
                              else{
                           echo "<img src='foto_pasien/not_found.png'  class='bulat'>";
                            }
                            ?>
                            <img src="">
                            </div>
              
                <div class="span8">                         
                     
                            <div></div>
                        <div class='col-xs-12 col-sm-9'>
                        <div class='center'>
                                <div class="pull-center alert alert-success no-margin close ">
                                 
                                <h3> Profile User</h3></div>                       
                                 
                                

                                
                                    
                                         </div>
                        
                       
                        
                         <br />
                        
                        
                        </div>
                        
                        
                        <div class='space-12'></div>
                        <h4 class='widget-title smaller'>
                        <i class='ace-icon fa fa-check-square-o bigger-110'></i> 
                        Data User
                        </h4>     
                         <table bordercolor ="#DEB887" border="1" width="800px" height="300px">
                    <thead>
                        <tr >
                            <td width="100px" align="right" bgcolor="#DEB887  "><label class="control-label" for="inputPassword">&nbsp;Kode user </label></td>
                            <td>&nbsp;&nbsp;<?php echo $r['kodeUser'] ?></td>
                        </tr>
                          <tr >
                            <td width="100px" align="right" bgcolor="#DEB887  "><label class="control-label" for="inputPassword">&nbsp; Nama </label></td>
                            <td>&nbsp;&nbsp;<?php echo $r['nama'] ?></td>
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
                            <td width="100px" align="right" bgcolor="#DEB887  "><label class="control-label" for="inputPassword">&nbsp; Tgl Lahir </label></td>
                            <td>&nbsp;&nbsp;<?php echo $r['tgl_lahir'] ?></td>
                        </tr>
                          <tr >
                           <td width="100px" align="right" bgcolor="#DEB887  "><label class="control-label" for="inputPassword">&nbsp; Username </label></td>
                            <td>&nbsp;&nbsp;<?php echo $r['username'] ?></td>
                        </tr>
                          <tr >
                           <td width="100px" align="right" bgcolor="#DEB887  "><label class="control-label" for="inputPassword">&nbsp; Password </label></td>
                            <td>&nbsp;&nbsp;<?php echo $r['password'] ?></td>
                        </tr>
                        <tr >
                            <td width="100px" align="right" bgcolor="#DEB887  "><label class="control-label" for="inputPassword">&nbsp; Akses </label></td>
                            <td>&nbsp;&nbsp;<?php echo $r['akses'] ?></td>
                        </tr>
                       
                
                                </div>
                            </div>
                            </td>
                        </tr>
                    </thead></table>
        </div>
    </section>




    </body>
