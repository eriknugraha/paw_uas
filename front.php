<!DOCTYPE html>
<html>
    <head>
    <style type="text/css">
        *{
        padding:0px;
        margin:0px;
    }
    body{
        font-family: tahoma;
    }
        @media screen{
    
    .card{
        width: 5cm;
        height: 7cm;
        background: #eee;
        text-align: center;
    }
    .foto{
        margin-top: 30px;
        width: 2cm;
        height: 2.2cm;
    }
    .logo{
        margin-top: 10px;
    }
    label{
        display: block;
    }
    .nama{
        font-size: 13px;
        margin: 5px 0px;
        font-weight: bold;
    }

    .unit{
        font-size: 11px;
        margin: 10px 0px;
    }        
        }
    
    @media print{
       
        button{
            display: none;
        }
        .card{
        width: 3.7cm;
        height: 7cm;
        background-color: #eee;
        text-align: center;
    }
    .foto{
        margin-top: 30px;
        width: 2cm;
        height: 2.2cm;
    }
    label{
        display: block;
    }
    .nama{
        font-size: 9px;
        margin: 5px 0px;
        font-weight: bold;
    }
    .unit{
        font-size: 9px;
        margin: 10px 0px;
    }     
    }
</style>
    </head>
    <body>
    
    

<?php
include("config/koneksi.php");

$kode=$_GET['id'];

    $query=mysql_query("SELECT * FROM tmember WHERE id_member='$kode'");
    $r=mysql_fetch_array($query);
?>
<div class="card">
    <label class="logo">BKOM BANDUNG</label>
    <img src="foto_pasien/<?php echo $r['photo']; ?>" class="foto">
    <label class="nama"><?php echo $r['nama_member'] ?></label>
    <label class="unit"><?php echo $r['status'] ?></label>
    <img alt="testing" src="barcode/barcode.php?text=<?php echo $kode; ?>&print=true" />
</div>


<button onclick="window.print()">Print</button>
        
        </body>
</html>