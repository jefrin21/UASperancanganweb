<?php
session_start();
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['add'])) {
        $id = $_POST['produkk'];
        $result = mysqli_query($koneksi, "SELECT * FROM produk WHERE ProdukID=$id");
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $krnginstok = mysqli_query($koneksi, "UPDATE produk set stok = stok - 1 where ProdukID = $id");
            if (isset($_SESSION['shop'][$id])) {
                $_SESSION['shop'][$id]['jumlah'] += 1;
            } else {
                $_SESSION['shop'][$id] = array(
                    'jumlah' => 1,
                    'name' => $row['NamaProduk'],
                    'price' => $row['HargaSatuan'],
                    'gambar' => $row['GambarProduk'],
                    'id'=> $row['ProdukID']
                   
                );
                    $ambilidproduk =$id;
                    $_SESSION['idprod']=$ambilidproduk;
            }
            header("location: app-ecommerce-product.php");
        }
    }
}

?>
