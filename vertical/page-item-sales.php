<?php
session_start();
include 'koneksi.php';
?>

<!DOCTYPE html>
<html lang="en">

<?php
include 'header.php';
?>

    <body>

        <!-- Top Bar Start -->
        <?php
        include 'navbar.php';
        ?>
                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-title-box">
                            <h4 class="page-title mb-2"><i class="mdi mdi-google-pages mr-2"></i>Sales Report</h4>  
                            <div class="">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="javascript:void(0);">Makan Terus</a></li>
                                    <li class="breadcrumb-item active">Item Sales</li>
                                </ol>
                            </div>                                      
                        </div><!--end page title box-->
                    </div><!--end col-->
                </div><!--end row-->
                <!-- end page title end breadcrumb -->
            </div><!--end page-wrapper-img-inner-->
        </div><!--end page-wrapper-img-->
        
        <div class="page-wrapper">
            <div class="page-wrapper-inner">

                <!-- Left Sidenav -->
                <?php
                include 'menu.php';
                ?>
                <!-- end left-sidenav-->    
                
                    <!-- Page Content-->
                    <div class="page-content" >
                         <div class="container-fluid"> 
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="card">
                                        <div class="card-body new-user order-list">
                                            <h4 class="col-lg-12 ">Item Sales</h4>
                                            <div class="table-responsive">
                                                <table class="table table-hover mb-0">
                                                    <thead class="thead-light">
                                                        <tr>
                                                            <th >Produk</th>
                                                            <th >Nama Produk</th>
                                                            <th >SISA STOK</th>
                                                            <th >Jumlah Pembelian</th>
                                                            <th >Amount ($)</th>
                                                        </tr><!--end tr-->
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $myitemsales = mysqli_query($koneksi,"SELECT GambarProduk,NamaProduk,Jumlah,Stok,Harga,SUM(Jumlah) as jumlah,SUM(Harga) as harga from detailtransaksi inner join produk on detailtransaksi.ProdukID=produk.ProdukID inner join transaksi on detailtransaksi.TransaksiID=transaksi.TransaksiID GROUP BY NamaProduk");
                                                        while($mysales = mysqli_fetch_array($myitemsales)){
                                                        ?>
                                                        <tr>
                                                            <td>
                                                                <img class="" src="assets/images/products/<?php
                                                                echo $mysales['GambarProduk'];?>" alt="user"> </td>
                                                            <td>
                                                                <?php echo $mysales['NamaProduk'];?>
                                                            </td>
                                                            <td>   
                                                                <?php echo $mysales['Stok'];?>

                                                            </td>
                                                            <td>
                                                                <?php echo $mysales['jumlah'];?>
                                                                
                                                            </td>
                                                            <td>
                                                                <?php echo $mysales['harga'];?>
                                                            </td>
                                                        </tr><!--end tr-->
                                                        <?php }?>
                                                    </tbody>
                                                </table> <!--end table-->                                               
                                            </div><!--end /div-->
                                        </div><!--end card-body-->
                                    </div><!--end card-->
                                </div><!--end col-->
                            </div><!--end row-->
                        </div>
                    </div>

        <?php
        include 'footer.php';
        ?>

        <!-- jQuery  -->
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/bootstrap.bundle.min.js"></script>
        <script src="assets/js/metisMenu.min.js"></script>
        <script src="assets/js/waves.min.js"></script>
        <script src="assets/js/jquery.slimscroll.min.js"></script>

        <!-- App js -->
        <script src="assets/js/app.js"></script>

    </body>
</html>