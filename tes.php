<?php

class tes extends PHPUnit_Framework_TestCase
{
        function testFile()
        {
                include("config/koneksi.php");
                $query=mysql_query("SELECT * FROM user_man ");
                $user = mysql_num_rows($query);
                $content1 = $user;
            
                $this->assertEquals(8, $content1);
        }
        function testnama()
        {
                include("config/koneksi.php");
                $query=mysql_query("SELECT * FROM user_man where id_user = 70 ");
                $user = mysql_fetch_array($query);
                $usernya = $user['nama'];
                $content2 = $usernya;
            
                $this->assertEquals('Erik Nugraha', $content2);
        }
        function testphoto()
        {
                include("config/koneksi.php");
                $query=mysql_query("SELECT * FROM tmember where alamat='Bekasi'");
                $user = mysql_fetch_array($query);
                $usernya = $user['photo'];
                $content3 = $usernya;
            
                $this->assertEquals('1.3.PNG', $content3);
        }
        function teststatus()
        {
                include("config/koneksi.php");
                $query=mysql_query("SELECT * FROM tmember where nama_member='Mila Karmila'");
                $user = mysql_fetch_array($query);
                $usernya = $user['status'];
                $content4 = $usernya;
            
                $this->assertEquals('non-member', $content4);
        }

}
?>