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
                            <h4 class="page-title mb-2"><i class="mdi mdi-account mr-2"></i>Edit Product</h4>  
                            <div class="">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="javascript:void(0);">Frogetor</a></li>
                                    <li class="breadcrumb-item"><a href="javascript:void(0);">Pages</a></li>
                                    <li class="breadcrumb-item active">Customer Data</li>
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
                                    <div class="card-body border-bottom">
                                        <div class="fro_profile">
                                            <div class="row">
                                                <div class="col-lg-4 mb-3 mb-lg-0">
                                                    <div class="fro_profile-main">
                                                        <div class="fro_profile_user-detail">
                                                            <h5 class="fro_user-name">Product List</h5>
                                                            <p class="mb-0 fro_user-name-post">of Makan Terus</p>
                                                        </div>
                                                    </div>
                                                </div><!--end col-->

                                            </div><!--end row-->
                                        </div><!--end f_profile-->                                                                                
                                    </div><!--end card-body-->

                          
                                </div><!--end card-->
                            </div><!--end col-->
                        </div><!--end row-->

                                <div class="card">
                                    <div class="card-body">

                                        <div class="row mx-2 my-4">
                                            <h4 class="mt-0 header-title">Edit Product List</h4>   
                                            <button class="btn-success px-4 rounded-lg col-auto ml-auto" name="return" onclick="window.location.href='app-product-list.php'"><i class="fas fa-arrow-left"></i>&nbsp;&nbsp; Kembali</button>
                                        </div>

                                        <?php 
                                            $productID 	= $_GET['id'];
                                            $query 		= mysqli_query($koneksi, "SELECT * FROM produk inner join kategoriproduk on produk.KategoriID=kategoriproduk.KategoriID WHERE ProdukID = '$productID'");
                                            $data 		= mysqli_fetch_array($query);
                                            $idkat = $data['KategoriID'];
                                        ?>
                                        <form  action="process-edit-product.php" method="post">
                                            <table class="table border">
                                            <input type="hidden" name="productID" value="<?php echo $data['ProdukID']; ?>">
                                                <tr>
                                                    <td>Nama Product</td>
                                                    <td>:</td>
                                                    <td>
                                                        <input class="form-control form-control-lg" type="text" name="nama" required 
                                                        value="<?php echo $data['NamaProduk'];?>" >
                                                    </td> 				
                                                </tr>
                                                
                                                <tr>
                                                    <td>Kategori Nama</td>
                                                    <td>:</td>
                                                    <td> 
                                                         <select class="form-control form-control-lg py-1" name="kategori">
                                                       
                                                        <?php
                                                        $querykat = mysqli_query($koneksi,"SELECT * FROM kategoriproduk ");
                                                        while($kat= mysqli_fetch_array($querykat)){
                                                        ?>
                                                            <option value="<?php echo $kat['KategoriID'];?>"> 
                                                                <?php echo $kat['NamaKategori'];?>
                                                            </option>

                                                            
                                                        <?php
                                                        }
                                                        ?>
                                                        </select>
                                                        
                                                    </td> 				
                                                </tr>	
                                                
                                                <tr>
                                                    <td>Harga Satuan</td>
                                                    <td>:</td>
                                                    <td><input class="form-control form-control-lg" type="text" name="harga"  required 
                                                        value="<?php echo $data['HargaSatuan'];?>">
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>Stock</td>
                                                    <td>:</td>
                                                    <td><input class="form-control form-control-lg" type="text" name="stok"  required 
                                                        value="<?php echo $data['Stok'];?>">
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>Deskripsi</td>
                                                    <td>:</td>
                                                    <td><input class="form-control form-control-lg" type="text" name="deskripsi"  required 
                                                        value="<?php echo $data['Deskripsi'];?>">
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>Gambar Produk</td>
                                                    <td>:</td>
                                                    <td>
                                                        
                                                    <?php echo $data['GambarProduk'];?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td>
                                                        <input class="btn-success px-4 py-2 rounded-lg" type="submit" name="simpan" value="SIMPAN PERUBAHAN" >
                                                    </td>
                                                </tr>

                                                
                                            </table>
                                        </form>
                                    </div><!--end card-body-->
                                </div><!--end card-->
                            </div><!--end col-->

                            <?php
                                include 'footer.php';
                            ?>
                        </div><!--end row-->
                    </div><!-- container -->

                    

        <!-- jQuery  -->
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/bootstrap.bundle.min.js"></script>
        <script src="assets/js/metisMenu.min.js"></script>
        <script src="assets/js/waves.min.js"></script>
        <script src="assets/js/jquery.slimscroll.min.js"></script>

        <script src="assets/plugins/moment/moment.js"></script>
        <script src="assets/plugins/apexcharts/apexcharts.min.js"></script>
        <script src="https://apexcharts.com/samples/assets/irregular-data-series.js"></script>
        <script src="https://apexcharts.com/samples/assets/series1000.js"></script>
        <script src="https://apexcharts.com/samples/assets/ohlc.js"></script>
        <script src="assets/plugins/dropify/js/dropify.min.js"></script>
        <script src="assets/plugins/ticker/jquery.jConveyorTicker.min.js"></script>
        <script src="assets/plugins/peity-chart/jquery.peity.min.js"></script>
        <script src="assets/plugins/chartjs/chart.min.js"></script>
        <script src="assets/pages/jquery.profile.init.js"></script>

        <!-- App js -->
        <script src="assets/js/app.js"></script>

    </body>
</html>