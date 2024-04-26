<?php
session_start();
include 'koneksi.php';

if(isset($_POST['invoice'])){
    $userkar = $_SESSION['userID'];
    if(isset($_SESSION['custid']) && $_SESSION['custid']){
            $userkar = $_SESSION['userID'];
            $idcust = $_SESSION['custid'];
            $subtotall = $_SESSION['totalprice'];
            $totall= $_SESSION['totalbuy'];
            $getpoint = $_SESSION['getpoint'];
            $redempoint = $_SESSION['redpoint'];
            $jumstok = $_SESSION['jumstok'];
            $idprod = $_SESSION['idprod'];
            $methodPembayaran = 1;


            $query = mysqli_query($koneksi,"INSERT INTO transaksi (TanggalTransaksi,WaktuTransaksi,KaryawanID,PelangganID,SubtotalHarga,TotalHarga,GetPoint,RedeemPoint,PembayaranID)
                        VALUES (CURRENT_DATE,CURRENT_TIME,'$userkar','$idcust','$subtotall','$totall','$getpoint','$redempoint',$methodPembayaran)");
            
          
            $updatepieces =mysqli_query($koneksi,"UPDATE produk SET stok=stok -'$jumstok' where ProdukID ='$idprod'");
            
            $updatepoint = mysqli_query($koneksi,"UPDATE pelanggan SET Nama = Nama, Email = Email,Telepon=Telepon,Alamat=Alamat,TanggalLahir=TanggalLahir,Gender=Gender,Points=Points+'$getpoint' where PelangganID ='$idcust'");

            header("location: app-ecommerce-invoice.php");
            unset($_SESSION['custid']);
            unset($_SESSION['totalprice']);
            unset($_SESSION['totalbuy']);
            unset($_SESSION['getbuy']);
            unset($_SESSION['getpoint']);
            unset($_SESSION['redpoint']);
            unset($_SESSION['shop']);
            unset($_SESSION['jumstok']);
            unset($_SESSION['idprod']);

    }else{
        echo "<script>alert('Silahkan isi  data customer terlebih dahulu');</script>";
        echo "<script>window.location.href='app-ecommerce-checkout.php';</script>";
        exit(); 
    }

}

if(isset($_POST['creditbut'])){
    $userkar = $_SESSION['userID'];
    if(isset($_SESSION['custid']) && $_SESSION['custid']){
            $userkar = $_SESSION['userID'];
            $idcust = $_SESSION['custid'];
            $subtotall = $_SESSION['totalprice'];
            $totall= $_SESSION['totalbuy'];
            $getpoint = $_SESSION['getpoint'];
            $redempoint = $_SESSION['redpoint'];
            $jumstok = $_SESSION['jumstok'];
            $idprod = $_SESSION['idprod'];
            $methodPembayaran = 2;


            $query = mysqli_query($koneksi,"INSERT INTO transaksi (TanggalTransaksi,WaktuTransaksi,KaryawanID,PelangganID,SubtotalHarga,TotalHarga,GetPoint,RedeemPoint,PembayaranID)
                        VALUES (CURRENT_DATE,CURRENT_TIME,'$userkar','$idcust','$subtotall','$totall','$getpoint','$redempoint',$methodPembayaran)");
            
          
            $updatepieces =mysqli_query($koneksi,"UPDATE produk SET stok=stok -'$jumstok' where ProdukID ='$idprod'");
            
            $updatepoint = mysqli_query($koneksi,"UPDATE pelanggan SET Nama = Nama, Email = Email,Telepon=Telepon,Alamat=Alamat,TanggalLahir=TanggalLahir,Gender=Gender,Points=Points+'$getpoint' where PelangganID ='$idcust'");

            header("location: app-ecommerce-invoice.php");
            unset($_SESSION['custid']);
            unset($_SESSION['totalprice']);
            unset($_SESSION['totalbuy']);
            unset($_SESSION['getbuy']);
            unset($_SESSION['getpoint']);
            unset($_SESSION['redpoint']);
            unset($_SESSION['shop']);
            unset($_SESSION['jumstok']);
            unset($_SESSION['idprod']);

    }else{
        echo "<script>alert('Silahkan isi  data customer terlebih dahulu');</script>";
        echo "<script>window.location.href='app-ecommerce-checkout.php';</script>";
        exit(); 
    }

}

?>  