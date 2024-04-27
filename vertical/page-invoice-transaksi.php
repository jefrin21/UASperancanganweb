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
                <div class="float-right align-item-center mt-2">
                 <a href="page-transaksi.php"><button class="btn btn-info px-4 align-self-center report-btn">Kembali</button></a>   
                </div>
                <h4 class="page-title mb-2"><i class="mdi mdi-receipt mr-2"></i>Invoice</h4>
                <div class="">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Makan Terus</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Pages</a></li>
                        <li class="breadcrumb-item active">Invoice</li>
                    </ol>
                </div>
            </div>
            <!--end page title box-->
        </div>
        <!--end col-->
    </div>
    <!--end row-->
    <!-- end page title end breadcrumb -->
    </div>
    <!--end page-wrapper-img-inner-->
    </div>
    <!--end page-wrapper-img-->

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
                                <div class="card-body invoice-head">
                                    <div class="row">
                                        <div class="col-md-4 align-self-center">
                                            <img src="assets/images/logo-sm.png" alt="logo-small" class="logo-sm mr-2" height="38">
                                            <img src="assets/images/logo-dark.png" alt="logo-large" class="logo-lg" height="18">
                                        </div>
                                        <div class="col-md-8">

                                            <ul class="list-inline mb-0 contact-detail float-right">
                                                <li class="list-inline-item">
                                                    <div class="pl-3">
                                                        <i class="mdi mdi-web"></i>
                                                        <p class="text-muted mb-0">www.MakanTerus.com</p>
                                                        <p class="text-muted mb-0">www.MakanTerus.com</p>
                                                    </div>
                                                </li>
                                                <li class="list-inline-item">
                                                    <div class="pl-3">
                                                        <i class="mdi mdi-phone"></i>
                                                        <p class="text-muted mb-0">+123 123456789</p>
                                                        <p class="text-muted mb-0">+123 123456789</p>
                                                    </div>
                                                </li>
                                                <li class="list-inline-item">
                                                    <div class="pl-3">
                                                        <i class="mdi mdi-map-marker"></i>
                                                        <p class="text-muted mb-0">Karawaci,</p>
                                                        <p class="text-muted mb-0">Tangerang, Indonesia 2024.</p>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!--end card-body-->
                                <div class="card-body">
                                    <div class="row">
                                        <?php
                                        $ambil_transaksiID = $_GET['idTransaksi'];
                                        $mmm2 = mysqli_query($koneksi, "SELECT * FROM pelanggan JOIN transaksi ON transaksi.PelangganID = pelanggan.PelangganID JOIN pembayaran ON transaksi.PembayaranID = pembayaran.PembayaranID WHERE transaksi.TransaksiID = $ambil_transaksiID;");
                                        while ($ffff2 = mysqli_fetch_array($mmm2)) {
                                        ?>
                                            <div class="col-md-3">
                                                <div class="">
                                                    <h6 class="mb-0"><b>Order Date :</b>
                                                        <?php echo $ffff2['TanggalTransaksi']; ?></h6>
                                                    <h6><b>Order ID :</b> <?php echo $ffff2['TransaksiID']; ?></h6>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="float-left">
                                                    <address class="font-13">
                                                        <strong class="font-14">Billed To :</strong><br>
                                                        <?php echo $ffff2['Nama']; ?><br>
                                                        <?php echo $ffff2['Alamat']; ?><br>
                                                        <?php echo $ffff2['Email']; ?><br>
                                                        <abbr title="Phone">P:</abbr> <?php echo $ffff2['Telepon']; ?>
                                                    </address>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                            </div>
                                            <div class="col-md-3">
                                                <div class="text-center bg-light p-3 mb-3">
                                                    <h5 class="bg-primary mt-0 p-2 text-white d-sm-inline-block">Payment
                                                        Methods</h5>
                                                    <h6 class="font-13"><?php echo $ffff2['JenisPembayaran']; ?></h6>
                                                </div>
                                            </div>
                                        <?php } ?>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="table-responsive">
                                                <table class="table table-bordered mb-0">
                                                    <thead>
                                                        <tr>
                                                            <th>Quantity</th>
                                                            <th>Item</th>
                                                            <th>Description</th>
                                                            <th>Unit Cost</th>
                                                            <th>Total</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $ambil_transaksiID = $_GET['idTransaksi'];
                                                        $mmm = mysqli_query($koneksi, "SELECT * FROM transaksi JOIN detailtransaksi ON transaksi.TransaksiID = detailtransaksi.TransaksiID 
                                                        JOIN produk ON detailtransaksi.ProdukID = produk.ProdukID WHERE transaksi.TransaksiID = $ambil_transaksiID;");
                                                        while ($ffff = mysqli_fetch_array($mmm)) {
                                                        ?>
                                                            <tr>
                                                                <th><?php echo $ffff['Jumlah']; ?></th>
                                                                <td><?php echo $ffff['NamaProduk']; ?></td>
                                                                <td><?php echo $ffff['Deskripsi']; ?></td>
                                                                <td><?php echo $ffff['HargaSatuan']; ?></td>
                                                                <td><?php echo $ffff['Jumlah'] * $ffff['HargaSatuan']; ?>
                                                                </td>
                                                            </tr>
                                                        <?php } ?>

                                                        <?php
                                                        $ambil_transaksiID = $_GET['idTransaksi'];
                                                        $mmm1 = mysqli_query($koneksi, "SELECT * FROM transaksi JOIN detailtransaksi ON transaksi.TransaksiID = detailtransaksi.TransaksiID 
                                                        JOIN produk ON detailtransaksi.ProdukID = produk.ProdukID WHERE transaksi.TransaksiID = $ambil_transaksiID GROUP BY transaksi.TransaksiID;");
                                                        while ($ffff1 = mysqli_fetch_array($mmm1)) {
                                                        ?>
                                                            <tr>
                                                                <td colspan="3" class="border-0"></td>
                                                                <td class="border-0 font-14"><b>Sub Total</b></td>
                                                                <td class="border-0 font-14">
                                                                    <b><?php echo $ffff1['SubtotalHarga']; ?></b>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th colspan="3" class="border-0"></th>
                                                                <td class="border-0 font-14"><b>Total Potongan</b></td>
                                                                <td class="border-0 font-14">
                                                                    <b><?php echo $ffff1['RedeemPoint']; ?></b>
                                                                </td>
                                                            </tr>
                                                            <tr class="bg-dark text-white">
                                                                <th colspan="3" class="border-0"></th>
                                                                <td class="border-0 font-14"><b>Total</b></td>
                                                                <td class="border-0 font-14">
                                                                    <b><?php echo $ffff1['TotalHarga']; ?></b>
                                                                </td>
                                                            </tr>
                                                        <?php } ?>

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row justify-content-center">
                                        <div class="col-lg-6">
                                            <h5 class="mt-4">Terms And Condition :</h5>
                                            <ul class="pl-3">
                                                <li><small>All accounts are to be paid within 7 days from receipt of
                                                        invoice. </small></li>
                                                <li><small>To be paid by cheque or credit card or direct payment
                                                        online.</small></li>
                                                <li><small> If account is not paid within 7 days the credits details
                                                        supplied as confirmation<br> of work undertaken will be charged
                                                        the agreed quoted fee noted above.</small></li>
                                            </ul>
                                        </div>
                                        <div class="col-lg-6 align-self-end">
                                            <div class="w-25 float-right">
                                                <small>Account Manager</small>
                                                <img src="assets/images/signature.png" alt="" class="" height="48">
                                                <p class="border-top">Signature</p>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row d-flex justify-content-center">
                                        <div class="col-lg-12 col-xl-4 ml-auto align-self-center">
                                            <div class="text-center text-muted"><small>Thank you very much for doing
                                                    business with us. Thanks !</small></div>
                                        </div>
                                        <div class="col-lg-12 col-xl-4">
                                            <div class="float-right d-print-none">
                                                <a href="javascript:window.print()" class="btn btn-info text-light"><i class="fa fa-print"></i></a>
                                                <a href="#" class="btn btn-primary text-light">Submit</a>
                                                <a href="#" class="btn btn-danger text-light">Cancel</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--end card-->
                        </div>
                        <!--end col-->
                    </div>
                    <!--end row-->
                </div><!-- container -->

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
</script>


</body>

</html>