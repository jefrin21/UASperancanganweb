<?php
include 'koneksi.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Produk</title>
</head>

<body>
    <?php 
    $produkID 	= $_GET['id'];
    $query 		= mysqli_query($koneksi, "SELECT * FROM produk WHERE ProdukID = '$produkID'");
    $data 		= mysqli_fetch_array($query);
    ?>
    <h1>Edit Produk</h1>
    <form action="process-edit-product.php" method="post">
        <input type="hidden" name="productID" value="<?php echo $data['ProdukID']; ?>">
        <label for="nama">Nama Produk:</label>
        <input type="text" id="nama" name="nama" value="<?php echo $data['NamaProduk']; ?>"><br><br>
        <label for="kategori">Kategori ID:</label>
        <input type="text" id="kategori" name="kategori" value="<?php echo $data['KategoriID']; ?>"><br><br>
        <label for="harga">Harga Satuan:</label>
        <input type="text" id="harga" name="harga" value="<?php echo $data['HargaSatuan']; ?>"><br><br>
        <label for="stok">Stok:</label>
        <input type="text" id="stok" name="stok" value="<?php echo $data['Stok']; ?>"><br><br>
        <label for="deskripsi">Deskripsi:</label>
        <input type="text" id="deskripsi" name="deskripsi" value="<?php echo $data['Deskripsi']; ?>"><br><br>
        <label for="gambar">Gambar Produk:</label>
        <input type="text" id="gambar" name="gambar" value="<?php echo $data['GambarProduk']; ?>"><br><br>
        <button class="theme-btn-1 btn btn-block" type="submit" name="simpan-perubahan">ENTER</button>
    </form>
</body>

</html>