<?php
include 'koneksi.php';

if(isset($_POST['tambah']))
{
//tangkap data dari form
$ambilnama  	= $_POST['Nama'];
$ambilemail 	= $_POST['Email'];
$ambiltelepon	= $_POST['Telepon'];
$ambilalamat 	= $_POST['Alamat'];
$ambiltgllahir	= $_POST['TanggalLahir'];
$ambilgender	= $_POST['Gender'];

//simpan data ke database
$query = mysqli_query($koneksi,"INSERT INTO pelanggan (Nama, Email, Telepon, Alamat, TanggalLahir, Gender, Points)			
							    VALUES('$ambilnama','$ambilemail', '$ambiltelepon','$ambilalamat', '$ambiltgllahir','$ambilgender', 0)");

header("location: page-customerlist.php");

}
?>