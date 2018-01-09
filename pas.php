    <?php
    include ("config/koneksi.php");
    $id=$_GET['id'];
    if($_POST){
    	
    	$pass = $_POST['pass'];
    	$pass2 = $_POST['pass2'];
    	if(!empty($pass) && !empty($pass2)){
            $past = md5($_POST['pass']);
    		if($pass == $pass2){
    		
            $sql =mysql_query("UPDATE tdokter SET password='$past' WHERE id_dokter='$id'");?>
                                <div class="pull-left alert alert-success no-margin">
                                 <data-dismiss="alert">
                                 <i class="ace-icon fa fa-times"></i>
                                 

                                 <i class="ace-icon fa fa-umbrella bigger-120 blue"></i>
                                 
                                     selamat password berhasil di ubah pada <?php echo tgl_indo(date('Y-m-d'));?> </b>
                                         </div><br>
                                         <?php 
           
    		}else{
                ?>
                 <div class="pull-left alert alert-success no-margin">
                                 <data-dismiss="alert">
                                 <i class="ace-icon fa fa-times"></i>
                                 

                                 <i class="ace-icon fa fa-umbrella bigger-120 blue"></i>
                                 
                                     Mohon maaf Password dan confirm password harus sama </b>
                                         </div><br><?php 
    	
    		}
    	}
    	
    }

    ?>
    <div class="span4">
    </div>

    <div class="spa3">
    <form action="" method="post">
 
    <div class="span4" style="border:1px solid #fff;border-radius:5px;padding:10px;background:#54c7dc">
                            <ul class="pop pull-right">
                                <li><a href="#" class="btn" data-toggle="popover" data-placement="right" data-content="Username &amp; Password Tidak Boleh Kosong." title="Question"><i class="icon-question-sign"></i></a></li>
                            </ul>
                            <div class="control-group">
                                <label class="control-label" for="inputPassword">Password Baru</label>
                                <div class="controls">
                                <input type="password" id="inputText" class="span4" name="pass">
                                </div>
                            </div>
            
                            <div class="control-group">
                                <label class="control-label" for="inputPassword">Konfirmasi Password</label>
                                <div class="controls">
                                <input type="password" id="inputPassword" class="span4" name="pass2">
                                </div>
                                    <input type="submit" value="Update"/>
                            </div>
                            </div>

    </form></div>
