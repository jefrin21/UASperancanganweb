<?php
$user 		= "root";
$server 	= "localhost";
$password 	= "";
$db			= "kawai";
$koneksi 	= mysqli_connect($server, $user, $password, $db);

if($koneksi == false)
{
	echo "Tidak Terkoneksi";
}
?>