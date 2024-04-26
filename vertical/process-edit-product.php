<?php
include 'koneksi.php';
if (isset($_POST['simpan'])) {
    $productID = $_POST['productID'];
    $nama = $_POST['nama'];
    $kategori = $_POST['kategori'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];
    $deskripsi = $_POST['deskripsi'];
    

    // Lakukan update data produk ke dalam database
    $query = mysqli_query($koneksi, "UPDATE produk SET 
        NamaProduk = '$nama', 
        KategoriID = '$kategori', 
        HargaSatuan = '$harga', 
        Stok = '$stok', 
        Deskripsi = '$deskripsi'
        WHERE ProdukID = '$productID'");

    if ($query) {
        echo "Produk berhasil diupdate.";
        header("location:app-product-list.php");
    } else {
        echo "Gagal mengupdate produk.";
    }
} else {
    echo "Data tidak lengkap.";
}
?>