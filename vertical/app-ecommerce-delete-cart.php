<?php
session_start();
include 'koneksi.php';
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete'])) {
    $id_produk = $_POST['id']; 

   
    if (!empty($_SESSION['shop'])) {
        foreach ($_SESSION['shop'] as $key => $product) {
            if ($key == $id_produk) {
                unset($_SESSION['shop'][$key]); 
                
            }
        }
        $balikinstok = mysqli_query($koneksi, "UPDATE produk set stok = stok + $product[jumlah] where ProdukID = $id_produk");
    }
}

header("location: app-ecommerce-cart.php");

?>
