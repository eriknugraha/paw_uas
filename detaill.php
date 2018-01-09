<?php
$aksi="mod_pasien/aksi_rm.php";
switch($_GET['act']){
  default:
  ?>
  <script type="text/javascript">
     $(document).ready(function() {
      <!-- event textbox keyup
      $("#txtcari").keyup(function() {
       var strcari = $("#txtcari").val();
       if (strcari != "")
       {
       $("#tabel_awal").css("display", "none");

      $("#hasil").html("<img src='img/loader.gif'/>")
      $.ajax({
       type:"post",
       url:"mod_pasien/cari.php",
       data:"q="+ strcari,
       success: function(data){
       $("#hasil").css("display", "block");
        $("#hasil").html(data);
        
       }
      });
       }
       else{
       $("#hasil").css("display", "none");
       $("#tabel_awal").css("display", "block");
       }
      });
      });
  </script>
  <?php
  $p      = new Paging;
    $batas  = 10;
    $posisi = $p->cariPosisi($batas);
?>
  <section>
    <ul class="breadcrumb" style="margin-bottom: 5px;">
      <li class="active">Data Rekam Medik</li>
      
    </ul>
    <div class="control-group pull-left">
      <button class="btn btn-primary" type="button" onclick="window.location='media.php?module=rekam_medik'"><i class="icon-plus icon-white"></i> Tambah Data Rekam Medik</button>
            
            
    </div>
    <form class="form-search pull-right">
              <div class="input-prepend">
                <span class="add-on"><i class="icon-search"></i></span>
                <input class="span3" id="txtcari" type="text" placeholder="Search">
              </div>

    </form>
    <hr>
    <div class="row-fluid">
      <div class="span12 pull-left">
      <div id="hasil"></div>
        <div id="tabel_awal">
        <table class="table table-striped">
          <thead>
            <tr class="head1" style="center">
              <td><center>No</td>
              <td><center>Tanggal Rekam Mdeik</td>
              <td><center>No Rekam Medik</td>

              <td><center>ID member</td>
              
              <td><center>Nama Member</td>


              <td><center>Pemeriksa</td>
              

              <td></td>
              <td><center>View</td>

              <td></td>

            </tr></center>
          </thead>
          <tbody>
          <?php         
          $query=mysql_query("SELECT *, YEAR(CURDATE())-YEAR(tmember.tgl_lahir) AS umur FROM tmember, tmedis WHERE tmember.`id_member`=tmedis.`id_member` ");
          $no=$posisi+1;

          // $queryy=mysql_query("insert into tmedis(umur) values ('$umur')");

          while($r=mysql_fetch_array($query)){
          ?>          
            <tr >
              <td><center><?php echo $no; ?></td>
              <td><center><?php echo $r['Tgl_RM']; ?></td>
              <td><center><?php echo $r['no_rm']; ?></td>
              <td><center><?php echo $r['id_member']; ?></td>
              <td><center><?php echo $r['nama_member']; ?></td>
              <td><center><?php echo $r['pemeriksa']; ?></td>
              

                            <td><center></td>

                            <td> <center><a href="media.php?module=detailrm&&no_rm=<?php echo $r['no_rm']; ?>"><i class="icon-zoom-in"></i></a></td>
                           
                            
                            <td><center></td>
                            
            </tr>





          <div id="<?php echo $r['no_kwitansi'] ?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              
              <!--<div class="modal-body">
                <h3>Cetak Kartu</h3>
                <a href="front.php?id_pasien=<?php echo $r['id_member']; ?>&&status=member" style="padding:0px 25px;">
              <!---     <img src="img/depan.png">
                                </a>
                                <a href="end.php?id_pasien=<?php echo $r['id_member']; ?>&&status=member" style="padding:0px 25px;">
                                <!--    <img src="img/belakang.png"> 
                                </a>
              </div>-->

              
            </div>
          <?php
          $no++;
          }
          ?>
          <tr>
              <td colspan="8">
              <?php
              $jmldata=mysql_num_rows(mysql_query("SELECT * FROM tmember, tmedis WHERE tmember.`id_member`=tmedis.`id_member` "));
              $jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
              $linkHalaman = $p->navHalaman($_GET['halaman'], $jmlhalaman); 
              echo "$linkHalaman";
              ?><td>Jumlah Record <?php echo $jmldata; ?></td>
            </tr>
          </tbody>
        </table>
        </div>
      </div>
    </div>
  </section>
<?php
break;
case "tambah":
?>



// <?php
// function acakangkahuruf($panjang)##################################################################################################
// {
//  $karakter= '0123456789';
//     $string = '';
//     for ($i = 0; $i < $panjang; $i++) {
//   $pos = rand(0, strlen($karakter)-1);
//   $string .= $karakter{$pos};
//     }
//     return $string;
// }
// function acakangkahuruf1($panjang1)
// {
//  $karakter1= 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
//     $string = '';
//     for ($i = 0; $i < $panjang1; $i++) {
//   $pos1 = rand(0, strlen($karakter1)-1);
//   $string .= $karakter1{$pos1};
//     }
//     return $string;
// }
// $acak1=acakangkahuruf1(3);
// $acak2=acakangkahuruf(4);
// $nounik=$acak1."-".$acak2;
//  ?>


  

  
<?php
break;
}
?>
