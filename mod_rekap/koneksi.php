<?php
$server ="localhost";
$username ="root";
$password ="";
$database ="bugar";
mysql_connect("$server","$username","$password")or die("Gagalx");
mysql_select_db("$database")or die("Database tidak ditemukan");
?>
