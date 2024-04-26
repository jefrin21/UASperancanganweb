<?php
include 'koneksi.php';

// Check if ProdukID is provided in the URL
if (isset($_GET['id'])) {
    $produkID = $_GET['id'];
$query = mysqli_query($koneksi, "DELETE FROM produk WHERE ProdukID = $produkID");
    // Check if the delete action is confirmed
    if (isset($_GET['confirm']) && $_GET['confirm'] === 'yes') {
        // Delete data from produk table based on ProdukID
        

        if ($query) {
            echo "Produk berhasil dihapus.";
        } else {
            echo "Gagal menghapus produk.";
        }
    } else {
        // Display confirmation dialog using JavaScript
        echo "<script>
                
                $query;
                
               
              </script>";
              header("location: app-product-list.php");
    
    }
}

?>
