<section>
 <div class="span12">
 <ul class="thumbnails">
 <li class="span3">
    <div id="" style="min-width: 310px; height: 400px; max-width: 400px; margin: 0 5"></div>
    </li>
    <li class="span1"></li>
 <li class="span3">
     <div id="containerpl" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 5"></div>
 </li>
   <li class="span1"></li>
 <li class="span3">
     <div id="" style="min-width: 310px; height: 400px; max-width: 400px; margin: 0 5"></div>
 </li>
    </ul>
</div>
</section>
    

   
   <?php
$aksi="mod_rekap/aksi_rekap.php";
switch($_GET['act']){
    default:
    ?>
    
    <?php
    $p      = new Paging;
    $batas  = 10;
    $posisi = $p->cariPosisi($batas);
?>
    <section>
      

       
        <div class="span12 pull-leftt"><br></div>
        <div class="span12 pull-leftt"></div>
        <div class="span6 pull-left">       
            <div class="row-fluid">
            <div class="span12"  style="background:#f9f9f9;padding:10px;">
                <form method="post" enctype="multipart/form-data" action="<?php echo "$aksi?module=tambah"; ?>">
              
                <fieldset>
                <legend class="span9">Tambah Kunjungan</legend>
                <div class="clear"></div>
                <div class="span8">
                
                            <div class="control-group">
                                <label class="control-label" for="inputPassword"> Nama Kunjungan</label>
                                <div class="controls">
                                    <input type="text" name="t1" class="span11">
                                </div>
                            </div>
                            
                           
                            <hr>
                            <div class="control-group">
                                <div class="controls">                              
                                <button type="submit" class="btn btn-success"><i class="icon-ok-circle icon-white"></i> Simpan</button>
                                <button type="reset" class="btn btn-warning"><i class="icon-refresh icon-white"></i> Reset</button>
                                </div>
                            </div>
                </div>
                
                            </fieldset>
                        </form> 
            </div>
        </div>
        </div>
        <div class="span6 pull-right">
        <div class="row-fluid">
            <div class="span12">
            <div id="hasil"></div>
                <div id="tabel_awal">
                <fieldset>
                <legend class="span12">Kunjungan</legend>
                
                <table class="table table-striped">
                    <thead>
                        <tr class="head3">
                            <td>No</td><td>Nama Kunjungan</td><td></td>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    
                    $query=mysql_query("SELECT * FROM Kunjungan");
                    $no=1;                  
                    while($r=mysql_fetch_array($query)){
                    ?>                  
                        <tr>
                            <td><?php echo $no; ?></td>
                            <td><?php echo $r['nama_kunjungan'];?></td> 
                            <!-- $id_tindakan=$r['id_layanan'];
                            $tamp=mysql_query("SELECT * FROM tlayanan");
                            while($rt=mysql_fetch_array($tamp)){
                                
                                echo "-> ".$rt['nama_layanan']."<br>";
                                
                            } -->
                           
                            
                            </td>
                            
                            <td><div class="btn-group">
                                <a class="btn btn-danger" href="#"><i class="icon-wrench icon-white"></i> Actions</a>
                                <a class="btn btn-danger dropdown-toggle" data-toggle="dropdown" href="#"><span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="media.php?module=rekap&&act=edit&&id=<?php echo $r['id']; ?>"><i class="icon-pencil"></i> Edit</a></li>
                                    <li><a href="<?php echo "$aksi?module=hapus&&id=$r[id]";?>" onclick="return confirm('Apakah anda yakin, ingin menghapus kunjungan<?php echo $r['nama_kunjungan']; ?>?')"><i class="icon-trash"></i> Delete</a></li>                                    
                                </ul>
                            </div></td>
                        </tr>
                    
                    <?php
                    $no++;
                    }
                    ?>                  
                    </tbody>
                </table>
                </fieldset>
                </div>
            </div>
        </div>
        </div>      
    </section>
<?php
break;

case "edit":

$id_tindakan=$_GET['id'];
$query=mysql_query("SELECT * FROM kunjungan WHERE id='$id_tindakan'");
$r=mysql_fetch_array($query);
?>

    
    <section>
       
        <div class="control-group pull-left"></div>
        <div class="span6 pull-left">       
            <div class="row-fluid">
            <div class="span12" style="background:#f9f9f9;padding:10 px;">
                <form method="post" enctype="multipart/form-data" action="<?php echo "$aksi?module=edit"; ?>">
                <legend class="span12">Ubah Kategori Layanan</legend>
                <div class="clear"></div>
                <div class="span8">
                
                            <div class="control-group">
                                <label class="control-label" for="inputPassword"> Nama Kunjungan</label>
                                <div class="controls">
                                    <input type="text" name="t2" class="span11" value="<?php echo $r['nama_kunjungan']; ?>">
                                    <input type="hidden" name="t1" class="span11" value="<?php echo $r['id']; ?>">
                                </div>
                            </div>
                            
                            
                            <hr>
                            <div class="control-group">
                                <div class="controls">                              
                                <button type="submit" class="btn btn-success"><i class="icon-ok-circle icon-white"></i> Simpan</button>
                                <button type="reset" class="btn btn-warning"><i class="icon-refresh icon-white"></i> Reset</button>
                                </div>
                            </div>
                </div>
                
                            
                        </form> 
            </div>
        </div>
        </div>
        <div class="span7 pull-right">
        <div class="row-fluid">
            <div class="span12">
            <div id="hasil"></div>
                <div id="tabel_awal">
                <fieldset>
                <legend class="span12">Kunjungan</legend>
                <table class="table table-striped">
                    <thead>
                        <tr class="head3">
                            <td>No</td><td>Nama Kunjungan</td><td></td>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    
                    $query=mysql_query("SELECT * FROM Kunjungan");
                    $no=1;                  
                    while($r=mysql_fetch_array($query)){
                    ?>                  
                        <tr>
                            <td><?php echo $no; ?></td>
                            <td><?php echo $r['nama_kunjungan']; ?></td>
                           
                            <td><div class="btn-group">
                                <a class="btn btn-danger" href="#"><i class="icon-wrench icon-white"></i> Actions</a>
                                <a class="btn btn-danger dropdown-toggle" data-toggle="dropdown" href="#"><span class="caret"></span></a>
                               <ul class="dropdown-menu">
                                    <li><a href="media.php?module=rekap&&act=edit&&id=<?php echo $r['id']; ?>"><i class="icon-pencil"></i> Edit</a></li>
                                    <li><a href="<?php echo "$aksi?module=hapus&&id=$r[id]";?>" onclick="return confirm('Apakah anda yakin, ingin menghapus kunjungan<?php echo $r['nama_kunjungan']; ?>?')"><i class="icon-trash"></i> Delete</a></li>                                    
                                </ul>
                            </div></td>
                        </tr>
                    
                    <?php
                    $no++;
                    }
                    ?>                  
                    </tbody>
                </table>
                </fieldset>
                </div>
            </div>
        </div>
        </div>      
    </section>
    
<?php
break;
}
?>
        

        
            
           