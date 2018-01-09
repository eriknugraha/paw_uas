 <link href="cs1/style.css" rel="stylesheet" media="screen">

 <section>

                 <ul class="thumbnails">
                        <li class="span3">
                        <div class="sm-st clearfix">
                        <span class="sm-st-icon st-red"><i class="fa fa-user"></i></span>
                                <div class="sm-st-info">
                                <?php $tampil=mysql_query("select * from tmember where status='member' order by id_member desc ");
                        $total=mysql_num_rows($tampil);
                    ?>
                                    <span><?php echo "$total"; ?></span>
                                    Member
                                </div></div>
                            
                        </li>
                        
                        
                        <li class="span3">
                        <div class="sm-st clearfix">
                            <span class="sm-st-icon st-blue"><i class="fa fa-refresh fa-spin fa-1x"></i></span>
                                <div class="sm-st-info">
                                <?php $tampil=mysql_query("select * from tmember where status ='non-member' order by id_member desc");
                        $total2=mysql_num_rows($tampil);
                    ?>
                                    <span><?php echo "$total2"; ?></span>
                                    Non-Member
                                </div></div>
                        </li>

                        <li class="span3">
                        <div class="sm-st clearfix">
                            <span class="sm-st-icon st-green"><i class="fa fa-refresh fa-spin fa-1x"></i></span>
                                <div class="sm-st-info">
                                <?php $tampil=mysql_query("select * from tdokter order by id_dokter desc");
                        $total3=mysql_num_rows($tampil);
                    ?>
                                    <span><?php echo "$total3"; ?></span>
                                    Dokter
                                </div></div>
                        </li>
                    </ul>
   </section>                 
                       