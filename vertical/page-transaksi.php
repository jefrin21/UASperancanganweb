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
                            <h4 class="page-title mb-2"><i class="mdi mdi-format-list-checkbox mr-2"></i>Product List</h4>  
                            <div class="">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="javascript:void(0);">Makan Terus</a></li>
                                    <li class="breadcrumb-item"><a href="javascript:void(0);">App</a></li>
                                    <li class="breadcrumb-item active">History Transaksi</li>
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
                <div class="page-content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between">
                                            <div>
                                            <h4 class="mt-0 header-title">Transaction History</h4>
                                            </div>
                                        </div>
                                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                            <thead>
                                            <tr>
                                                <th>Tanggal Transaksi</th>
                                                <th>Waktu Transaksi</th>
                                                <th>Nama Pelanggan</th>
                                                <th>Sub Total</th>
                                                <th>Potongan</th>
                                                <th>Point Didapatkan</th>
                                                <th>Total </th>
                                                <th>Metode Pembayaran</th>
                                                <th>INVOICE</th>
                                            </tr>
                                            </thead>
        
        
                                            <tbody>
                                            <?php
                                             $query = mysqli_query($koneksi,"SELECT * FROM transaksi INNER JOIN pelanggan ON transaksi.PelangganID=pelanggan.PelangganID INNER JOIN pembayaran ON transaksi.PembayaranID=pembayaran.PembayaranID");
                                             while ($data = mysqli_fetch_array($query)){
                                                
                                            ?>
                                            <tr>
                                                <td>
                                                    <?php
                                                    echo $data['TanggalTransaksi'];
                                                    ?>
                                                    
                                                </td>
                                                <td>
                                                    <?php
                                                    echo $data['WaktuTransaksi'];
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php
                                                    echo $data['Nama'];
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php
                                                    echo 'Rp.';
                                                    echo  $data['SubtotalHarga'];
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php
                                                    echo 'Rp.';
                                                    echo $data['RedeemPoint'];
                                                    ?>
                                                </span>
                                                </td>
                                                 <td>
                                                    <?php
                                                    echo $data['GetPoint'];
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php
                                                    echo 'Rp.';
                                                    echo $data['TotalHarga'];
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php
                                                    echo $data['JenisPembayaran'];
                                                    ?>
                                                </td>
                                                <td class="text-center">
                                                    <a href="page-invoice-transaksi.php?idTransaksi=<?php echo $data['TransaksiID'];?>" class="btn btn-info text-light"><i class="fa fa-print"></i></a>
                                                </td>
                                             
                                            </tr>
                                            <?php
                                             }
                                             ?>
                                            
                                            </tbody>
                                        </table>
        
                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->        
                    </div><!-- container -->

                    <footer class="footer text-center text-sm-left">
                        &copy; 2019 Frogetor <span class="text-muted d-none d-sm-inline-block float-right">Crafted with <i class="mdi mdi-heart text-danger"></i> by Mannatthemes</span>
                    </footer>
                </div>
                <!-- end page content -->
            </div>
            <!--end page-wrapper-inner -->
        </div>
        <!-- end page-wrapper -->

        <!-- jQuery  -->
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/bootstrap.bundle.min.js"></script>
        <script src="assets/js/metisMenu.min.js"></script>
        <script src="assets/js/waves.min.js"></script>
        <script src="assets/js/jquery.slimscroll.min.js"></script>

        <!-- Required datatable js -->
        <script src="assets/plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="assets/plugins/datatables/dataTables.bootstrap4.min.js"></script>

        <!-- App js -->
        <script src="assets/js/app.js"></script>
        <script>
            $('#datatable').DataTable();
        </script>

    </body>
</html>