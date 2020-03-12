<?php 
   $username = "eam"; 
   $password = "pln123"; 
   $host = "192.168.10.5"; 
   $port = "1521"; 
   $db = "(DESCRIPTION=(ADDRESS = (PROTOCOL = TCP)(HOST = ".$host.")(PORT = ".$port."))(CONNECT_DATA=(SID=ofdb)))"; 
   $connect = oci_connect($username, $password, $db); 
   // if (!$connect) { 
   //    echo "Koneksi ke server database gagal dilakukan"; 
   // } 
   // else { 
   //    echo "Koneksi ke Database Oracle Berhasil"; 
   // } 
?>
