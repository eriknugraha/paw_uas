
<html>
<head>

</head>

<body>  <section>



        <div class="control-group pull-left"></div>
        <div class="span6 pull-left">       
        <div class="row-fluid">
        <div class="span10"  style="background:#f9f9f9;padding:10px;">
                       
<div id="container" style="min-width: 310px; height: 400px; max-width: 400px; margin: 0 5"></div>
</div></div></div></div>

<div class="span6 pull-right">
        <div class="row-fluid">
            <div class="span12">

<table border='1' width='310px'>

                    <thead>
                  <br><br>
                         
                        <tr align="center">
                            <td><label class="control-label" for="inputPassword"> Bulan &nbsp;&nbsp;</label></td>
                            <td><label class="control-label" for="inputPassword"> Laki- Laki &nbsp;&nbsp;</label></td>
                        </tr>
                        <tr align="center">
                        <?php $sat=date('Y-m-1');$satt=date('Y-m-31'); 
                        $satu=mysql_query("SELECT count(id) AS qty ,tgl_kunjugan FROM tfitness where tgl_kunjugan BETWEEN '$sat' and '$satt' and umur BETWEEN 0 and 10 GROUP BY umur");
                            while($sa=mysql_fetch_array($satu)){?>
                            <td><label class="control-label" for="inputPassword"> 1 - 10 Tahun &nbsp;&nbsp;</label></td>
                            <td><label class="control-label" for="inputPassword"><?php echo "$sa[qty]" ;?>&nbsp;&nbsp;</label></td><?php }?>
                        </tr>
                        <tr align="center" >                           
                        <?php $dua=mysql_query("SELECT count(id) AS qty FROM tfitness where tgl_kunjugan ='$sat' and umur BETWEEN 11 and 30 GROUP BY umur");
                            while($du=mysql_fetch_array($dua)){?>
                            <td><label class="control-label" for="inputPassword"> 11 - 30 Tahun &nbsp;&nbsp;</label></td>
                            <td><label class="control-label" for="inputPassword"><?php echo "$du[qty]" ;?>&nbsp;&nbsp;</label></td><?php }?>
                        </tr>
                        <tr align="center" >
                        <?php $tiga=mysql_query("SELECT count(id) AS qty FROM tfitness where tgl_kunjugan ='$sat' and umur BETWEEN 31 and 50 GROUP BY umur");
                            while($ti=mysql_fetch_array($tiga)){?>
                            <td><label class="control-label" for="inputPassword"> 31 - 50 Tahun &nbsp;&nbsp;</label></td>
                            <td><label class="control-label" for="inputPassword"><?php echo "$ti[qty]" ;?>&nbsp;&nbsp;</label></td><?php }?>
                        </tr>
                        <tr align="center" >
                        <?php $empat=mysql_query("SELECT count(id) AS qty FROM tfitness where tgl_kunjugan ='$sat' and umur BETWEEN 51 and 200 GROUP BY umur");
                            while($em=mysql_fetch_array($empat)){?>
                            <td><label class="control-label" for="inputPassword"> > 50 Tahun &nbsp;&nbsp;</label></td>
                            <td><label class="control-label" for="inputPassword"><?php echo "$em[qty]" ;?>&nbsp;&nbsp;</label></td><?php }?>
                        </tr>
                    </thead></table></div></div></div>



    </section>
</body>
</html>