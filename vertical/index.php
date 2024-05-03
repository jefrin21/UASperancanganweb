<?php

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
        <!-- end -->
                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-title-box">
                            <h4 class="page-title mb-2"><i class="mdi mdi-monitor mr-2"></i>Dashboard</h4>  
                            <div class="">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="javascript:void(0);">Makan Terus</a></li>
                                    <li class="breadcrumb-item"><a href="javascript:void(0);">Dashboard</a></li>
                                    
                                </ol>
                            </div>                                      
                        </div>
                    </div>
                </div>
                <!-- end page title end breadcrumb -->
            </div>
        </div>
        
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
                            <div class="col-lg-4">
                                <div class="card">
                                    <div class="card-body mb-0">
                                        <div class="row">                                            
                                            <div class="col-8 align-self-center">
                                            <div class="">
                                                    <h4 class="mt-0 header-title">Total Profit</h4>
                                                    <h3 class="mt-0 font-weight-bold text-dark"><?php
                                                        $queryharga = mysqli_query($koneksi,"SELECT  SUM(TotalHarga) as profit from transaksi ");
                                                        $dataharga = mysqli_fetch_array($queryharga);
                                                        $querypengeluaran = mysqli_query($koneksi,"SELECT SUM(TotalPengeluaran) as harga from produksi ");
                                                        $datapengeluaran = mysqli_fetch_array($querypengeluaran);
                                                        $totalprofit = $dataharga['profit'] - $datapengeluaran['harga'];
                                                        echo "Rp" . number_format($totalprofit,2)
                                                    ?></h3> 

                                                </div>
                                            </div><!--end col-->
                                            <div class="col-4 align-self-center">
                                                <div class="icon-info text-right">
                                                    <i class="dripicons-cart bg-soft-warning"></i>
                                                </div>
                                            </div><!--end col-->
                                        </div><!--end row-->
                                    </div><!--end card-body-->
                                                                                                     
                                </div><!--end card-->
                            </div><!--end col-->

                            <div class="col-lg-4">
                                <div class="card">
                                    <div class="card-body mb-0">
                                        <div class="row">                                            
                                            <div class="col-8 align-self-center">
                                                <div class="">
                                                    <h4 class="mt-0 header-title">Total Harga Produksi</h4>
                                                    <h3 class="mt-0 font-weight-bold text-dark">Rp<?php
                                                        $query = mysqli_query($koneksi, "SELECT sum(TotalPengeluaran) as harga from produksi ");
                                                        $data = mysqli_fetch_array($query);
                                                        echo number_format($data['harga'],2);
                                                        ?></h3> 
                                                </div>
                                            </div><!--end col-->
                                            <div class="col-4 align-self-center">
                                                <div class="icon-info text-right">
                                                    <i class="dripicons-wallet bg-soft-success"></i>
                                                </div>
                                            </div><!--end col-->
                                        </div><!--end row-->
                                    </div><!--end card-body-->
                                                                  
                                </div><!--end card-->
                            </div><!--end col-->
                            <div class="col-lg-4">
                                <div class="card carousel-bg-img">
                                    <div class="card-body dash-info-carousel mb-0">
                                        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                                            <div class="carousel-inner">
                                                <div class="carousel-item active">
                                                    <div class="row">                                            
                                                        <div class="col-12 align-self-center">
                                                            <div class="text-center">
                                                                <h4 class="mt-0 header-title text-left">Total Karyawan</h4>
                                                                <div class="icon-info my-3">
                                                                    <i class="dripicons-jewel bg-soft-pink"></i>
                                                                </div>
                                                                <h2 class="mt-0 font-weight-bold text-dark">
                                                                    <?php 
                                                                   
                                                                    $query = mysqli_query($koneksi,"SELECT * FROM karyawan");                                                        
                                                                    echo mysqli_num_rows($query);
                                                               
                                                                    ?></h2> 
                                                            </div>
                                                        </div><!--end col-->                                                        
                                                    </div><!--end row-->                                                    
                                                </div><!--end carousel-item-->
                                                <div class="carousel-item">
                                                    <div class="row">                                            
                                                        <div class="col-12 align-self-center">
                                                            <div class="text-center">
                                                                <h4 class="mt-0 header-title text-left">Produk Terjual</h4>
                                                                <div class="icon-info my-3">
                                                                    <i class="dripicons-basket bg-soft-info"></i>
                                                                </div>
                                                                <h2 class="mt-0 font-weight-bold text-dark"><?php
                                                                $query = mysqli_query($koneksi,"SELECT sum(Jumlah) as totaljumlah FROM detailtransaksi");
                                                                $data = mysqli_fetch_array($query);
                                                                echo $data['totaljumlah'];
                                                                ?></h2> 
                                                            </div>
                                                        </div><!--end col-->                                                        
                                                    </div><!--end row-->                                                    
                                                </div><!--end carousel-item-->                                               
                                                <div class="carousel-item">
                                                    <div class="row">                                            
                                                        <div class="col-12 align-self-center">
                                                            <div class="text-center">
                                                                <h4 class="mt-0 header-title text-left">Total Produk</h4>
                                                                <div class="icon-info my-3">
                                                                    <i class="dripicons-store bg-soft-warning"></i>
                                                                </div>
                                                                <h2 class="mt-0 font-weight-bold text-dark">
                                                                    <?php
                                                                        $query = mysqli_query($koneksi, "SELECT COUNT(ProdukID) as totalproduk FROM produk");
                                                                        $data = mysqli_fetch_array($query);
                                                                        echo $data['totalproduk'];
                                                                    ?></h2> 
                                                            </div>
                                                        </div><!--end col-->                                                        
                                                    </div><!--end row-->                                                    
                                                </div><!--end carousel-item-->
                                                <div class="carousel-item">
                                                    <div class="row">                                            
                                                        <div class="col-12 align-self-center">
                                                            <div class="text-center">
                                                                <h4 class="mt-0 header-title text-left">Total User</h4>
                                                                <div class="icon-info my-3">
                                                                    <i class="dripicons-user-group bg-soft-success"></i>
                                                                </div>
                                                                <h2 class="mt-0 font-weight-bold text-dark">
                                                                    <?php 
                                                                   
                                                                        $query = mysqli_query($koneksi,"SELECT COUNT(pelangganID) AS TOTAL FROM pelanggan;");
                                
                                                                        $data = mysqli_fetch_array($query);

                                                                       echo $data["TOTAL"];
                                                            
                                                                    ?> </h2> 
                                                            </div>
                                                        </div><!--end col-->                                                        
                                                    </div><!--end row-->                                                    
                                                </div><!--end carousel-item-->
                                            </div>
                                            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                <span class="sr-only">Previous</span>
                                            </a>
                                            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                <span class="sr-only">Next</span>
                                            </a>
                                        </div>
                                    </div><!--end card-body-->                                                                                                        
                                </div><!--end card-->
                            </div><!--end col-->                            
                        </div><!--end row-->
<!-- ===================================================================================== top================================================ -->
                        <div class="row">                     
                            <div class="col-lg-4">
                                <div class="card overflow-hidden">
                                    <div class="card-body bg-gradient1">
                                        <div class="">
                                            <div class="card-icon">
                                                <i class="far fa-user"></i>
                                            </div>
                                            <h2 class="font-weight-bold text-white"><?php
                                            $hotproduk = mysqli_query($koneksi, "SELECT SUM(Jumlah) as totaljumlah FROM `detailtransaksi` GROUP BY ProdukID");
                                            $data =  mysqli_num_rows($hotproduk);
                                            echo $data;
                                            ?></h2>
                                            <p class="text-white mb-0 font-16">Produk Top</p>                                            
                                        </div>
                                    </div>
                                                                  
                                    <div id="carouselExampleIndicators" class="card-body dash-info-carousel" >   <!--carousel-->
                                                                         
                                        <div id="carousel_best_saler" class="carousel slide" data-ride="carousel">
                                            <ol class="carousel-indicators">
                                                <?php
                                                $result = mysqli_query($koneksi,"SELECT detailtransaksi.ProdukID, GambarProduk,NamaProduk, SUM(Jumlah) as totaljumlah,(SUM(Jumlah) * harga) as totalharga FROM detailtransaksi inner join produk on detailtransaksi.ProdukID = produk.ProdukID GROUP BY NamaProduk order BY totaljumlah DESC");
                                                 
                                                $indicator_index = 0;
                                                while ($row = mysqli_fetch_assoc($result)) {
                                                    $active_class = ($indicator_index == 0) ? 'active' : '';
                                                    echo '<li data-target="#carouselExampleIndicators" data-slide-to="' . $indicator_index . '" class="' . $active_class . '"></li>';
                                                    $indicator_index++;
                                                }
                                                ?>
                                            </ol>
                                            <div class="carousel-inner">
                                            <?php
                                            $item_index = 0;
                                            mysqli_data_seek($result,0);
                                            while ($data = mysqli_fetch_assoc($result))
                                            {?>  
                                                
                                                <div class="carousel-item <?php echo ($item_index == 0) ? 'active' : ''; ?>">
                                                <div class="text-center">
                                                    <img src="assets/images/products/<?php echo $data['GambarProduk'] ?>" alt="user" class="rounded-circle thumb-xl img-thumbnail mb-1">
                                                    <h5><?php echo $data['NamaProduk']?></h5>
                                                    <p class="mb-0 font-20 text-success">Rp<?php echo number_format($data["totalharga"],2)?> Terjual</p>
                                                    <div class="mt-2 align-item-center">
                                                        <h5 class=" font-20 d-inline-block mb-0 mr-3 align-self-center text-success"><?php echo $data['totaljumlah']?> Produk Terjual</h5>
                                                    </div>
                                                </div>
                                                </div>
                                                <?php 
                                                $item_index++; ?>                                              
                                                 
                                                <?php } ?>     
                                            </div>
                                            <a class="carousel-control-prev" href="#carousel_best_saler" role="button" data-slide="prev">
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            <span class="sr-only">Previous</span>
                                            </a>
                                            <a class="carousel-control-next" href="#carousel_best_saler" role="button" data-slide="next">
                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                            <span class="sr-only">Next</span>
                                            </a>
                                        </div>
                                    </div>
                                    <!--end card-body-->
                                    
                                </div><!--end card-->
                            </div><!--end col-->

                            <div class="col-lg-4">
                                <div class="card overflow-hidden">
                                    <div class="card-body bg-gradient3">
                                        <div class="">
                                            <div class="card-icon">
                                                <i class="far fa-smile"></i>
                                            </div>
                                            <h2 class="font-weight-bold text-white"><?php
                                            $produkterbaru = mysqli_query($koneksi, "SELECT * FROM produksi inner join produk on produksi.ProdukID = produk.ProdukID WHERE MONTH(TanggalProduksi) = MONTH(CURRENT_DATE) AND YEAR(TanggalProduksi) = YEAR(CURRENT_DATE)");
                                            $data = mysqli_num_rows($produkterbaru);
                                            echo $data;
                                            ?></h2>
                                            <p class="text-white mb-0 font-16">Produk Terbaru Bulan Ini</p>                                             
                                        </div>
                                    </div><!--end card-body-->
                                                          
                                    <div id="carouselExampleIndicators" class="card-body dash-info-carousel" ><!--carousel2-->
                                                                         
                                        <div id="carousel_best_saler2" class="carousel slide" data-ride="carousel">
                                            <ol class="carousel-indicators">
                                                <?php
                                                $result = mysqli_query($koneksi, "SELECT * FROM produksi inner join produk on produksi.ProdukID = produk.ProdukID WHERE MONTH(TanggalProduksi) = MONTH(CURRENT_DATE) AND YEAR(TanggalProduksi) = YEAR(CURRENT_DATE)");                                                 
                                                $indicator_index = 0;
                                                while ($row = mysqli_fetch_assoc($result)) {
                                                    $active_class = ($indicator_index == 0) ? 'active' : '';
                                                    echo '<li data-target="#carouselExampleIndicators" data-slide-to="' . $indicator_index . '" class="' . $active_class . '"></li>';
                                                    $indicator_index++;
                                                }
                                                ?>
                                            </ol>
                                            <div class="carousel-inner">
                                            <?php
                                            $item_index = 0;
                                            mysqli_data_seek($result,0);
                                            while ($data = mysqli_fetch_assoc($result))
                                            {?>  
                                                
                                                <div class="carousel-item <?php echo ($item_index == 0) ? 'active' : ''; ?>">
                                                <div class="text-center">
                                                    <img src="assets/images/products/<?php echo $data['GambarProduk'] ?>" alt="user" class="rounded-circle thumb-xl img-thumbnail mb-1">
                                                    <h5><?php echo $data['NamaProduk']?></h5>
                                                    <p class="mb-0 font-20 text-warning">Harga Rp<?php echo number_format($data["HargaProduksi"],2)?></p>
                                                    <div class="mt-2 align-item-center">
                                                        <p class="mb-1 text-muted"><?php echo $data['Deskripsi']?></p>
                                                    </div>
                                                </div>
                                                </div>
                                                <?php 
                                                $item_index++; ?>                                              
                                                 
                                                <?php } ?>     
                                            </div>
                                            <a class="carousel-control-prev" href="#carousel_best_saler2" role="button" data-slide="prev">
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            <span class="sr-only">Previous</span>
                                            </a>
                                            <a class="carousel-control-next" href="#carousel_best_saler2" role="button" data-slide="next">
                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                            <span class="sr-only">Next</span>
                                            </a>
                                        </div>
                                    </div>
                                    
                                </div><!--end card-->
                            </div><!--end col-->

                            <div class="col-lg-4">
                                <div class="card overflow-hidden">
                                    <div class="card-body bg-gradient2">
                                        <div class="">
                                            <div class="card-icon">
                                                <i class="fas fa-coins"></i>
                                            </div>
                                            <h2 class="font-weight-bold text-white">Rp<?php
                                                $queryharga = mysqli_query($koneksi, "select SUM(TotalHarga) as totalharga from transaksi ");
                                                $data = mysqli_fetch_array($queryharga);
                                                echo number_format($data['totalharga'],2)?></h2>
                                            <p class="text-white mb-0 font-16">Total Pembayaran</p>                                            
                                        </div>
                                    </div><!--end card-body-->
                                    <div class="card-body">
                                        <div class="">
                                            <h2>
                                                <?php
                                                    $querypembayaran = mysqli_query($koneksi,"SELECT COUNT(PembayaranID) as banyakbayar FROM transaksi WHERE PembayaranID = 2");
                                                    $data = mysqli_fetch_array($querypembayaran);
                                                    echo $data['banyakbayar'];
                                                    ?>
                                            </h2>    
                                            <h5 class="text-success">
                                                Lewat Cash <i class="mdi mdi-cash  text-success font-20"></i>
                                            </h5>
                                            <h2>
                                                <?php
                                                    $querypembayaran = mysqli_query($koneksi,"SELECT COUNT(PembayaranID) as banyakbayar FROM transaksi WHERE PembayaranID = 1");
                                                    $data = mysqli_fetch_array($querypembayaran);
                                                    echo $data['banyakbayar'];
                                                    ?>
                                            </h2>
                                            <h5 class="text-danger">
                                                Lewat Credit-Card <i class="mdi mdi-credit-card   text-danger font-20"></i>
                                            </h5>
                                        </div> 
                                    </div><!--end card-body-->
                                </div><!--end card-->
                            </div><!--end col-->
                        </div><!--end row-->
                    </div><!-- container -->
                 
              
        <!-- =================================== topp start============================================== -->
                        <!-- Page Content-->
                    <div class="page-content mt-2">
                        <div class="container-fluid"> 
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row">
                                                <ul class="col container-filter categories-filter mb-0" id="filter">
                                                    <li><a class="categories active" data-filter=".roti">ROTI</a></li>
                                                    <li><a class="categories" data-filter=".kue">KUE</a></li>
                                                    <li><a class="categories" data-filter=".cookies">COOKIES</a></li>
                                                </ul>
                                            </div><!-- End portfolio  -->
                                        </div><!--end card-body-->
                                    </div><!--end card-->
                                
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row container-grid nf-col-3 roti projects-wrapper">
                                                <?php 
                                                $querygaler =mysqli_query($koneksi,"SELECT GambarProduk,NamaProduk From produk Where KategoriID = 1 LIMIT 6");
                                                while($galery = mysqli_fetch_array($querygaler)){
                                                ?>
                                                 <div class="col-lg-4 col-md-6 p-0 nf-item roti spacing">
                                                    <div class="">
                                                        <a class="">
                                                            <img class="item-container" src="assets/images/products/<?php echo $galery['GambarProduk'];?>" height="300"  />
                                                            <div class="item-mask">
                                                                <div class="item-caption">
                                                                    <h5 class="text-light"><?php echo$galery['NamaProduk'];?> </h5>
                                                                    <p class="text-light">Photo</p>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </div><!--end item-box-->
                                                </div><!--end col-->
                                                 <?php } ?>

                                                <?php 
                                                $querygaler =mysqli_query($koneksi,"SELECT GambarProduk,NamaProduk From produk Where KategoriID = 2 LIMIT 6");
                                                while($galery = mysqli_fetch_array($querygaler)){
                                                ?>    
                                                <div class="col-lg-4 col-md-6 p-0 nf-item kue spacing">
                                                    <div >
                                                        <a >
                                                            <img class="item-container" src="assets/images/products/<?php echo $galery['GambarProduk'];?>"/>
                                                            <div class="item-mask">
                                                                <div class="item-caption">
                                                                    <h5 class="text-light"><?php echo$galery['NamaProduk'];?> </h5>
                                                                    <p class="text-light">Photo</p>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </div><!--end item-box-->
                                                </div><!--end col-->
                                                 <?php } ?>

                                                <?php 
                                                $querygaler =mysqli_query($koneksi,"SELECT GambarProduk,NamaProduk From produk Where KategoriID = 3 LIMIT 6");
                                                while($galery = mysqli_fetch_array($querygaler)){
                                                ?>    
                                                <div class="col-lg-4 col-md-6 p-0 nf-item cookies spacing">
                                                    <div class="">
                                                        <a>
                                                            <img class="item-container" src="assets/images/products/<?php echo $galery['GambarProduk'];?>" />
                                                            <div class="item-mask">
                                                                <div class="item-caption">
                                                                    <h5 class="text-light"><?php echo$galery['NamaProduk'];?></h5>
                                                                    <p class="text-light">Photo</p>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </div><!--end item-box-->
                                                </div><!--end col-->
                                                <?php } ?>
                                            </div><!--end row-->
                                        </div><!--end card-body-->
                                    </div><!--end card-->
                                </div><!--end col-->
                            </div><!--end row-->          
                        </div><!-- container -->
    <!-- =================================== end carousel =================================================== -->
                        

                    <?php
                    include 'footer.php';
                    ?>

        <!-- jQuery  -->
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/bootstrap.bundle.min.js"></script>
        <script src="assets/js/metisMenu.min.js"></script>
        <script src="assets/js/waves.min.js"></script>
        <script src="assets/js/jquery.slimscroll.min.js"></script>

        <script src="assets/plugins/jvectormap/jquery-jvectormap-2.0.2.min.js"></script>
        <script src="assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>

        <script src="assets/plugins/moment/moment.js"></script>
        <script src="assets/plugins/apexcharts/apexcharts.min.js"></script>
        <script src="https://apexcharts.com/samples/assets/irregular-data-series.js"></script>
        <script src="https://apexcharts.com/samples/assets/series1000.js"></script>
        <script src="https://apexcharts.com/samples/assets/ohlc.js"></script>
        <script src="assets/pages/jquery.dashboard.init.js"></script>

        <!-- App js -->
        <script src="assets/js/app.js"></script>

        <!-- jQuery  -->
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/bootstrap.bundle.min.js"></script>
        <script src="assets/js/metisMenu.min.js"></script>
        <script src="assets/js/waves.min.js"></script>
        <script src="assets/js/jquery.slimscroll.min.js"></script>

        <script src="assets/plugins/filter/isotope.pkgd.min.js"></script>
        <script src="assets/plugins/filter/masonry.pkgd.min.js"></script>
        <script src="assets/plugins/filter/jquery.magnific-popup.min.js"></script>

        <!-- App js -->
        <script src="assets/js/app.js"></script>
        <script>
             $(window).on('load', function() {
                // Filter 
                //PORTFOLIO FILTER 
                var $container = $('.projects-wrapper');
                var $filter = $('#filter');
                // Initialize isotope 
                $container.isotope({
                    filter: '.roti',
                    layoutMode: 'masonry',
                    animationOptions: {
                        duration: 750,
                        easing: 'linear'
                    }
                });
                // Filter items when filter link is clicked
                $filter.find('a').click(function() {
                    var selector = $(this).attr('data-filter');
                    $filter.find('a').removeClass('active');
                    $(this).addClass('active');
                    $container.isotope({
                        filter: selector,
                        animationOptions: {
                            animationDuration: 750,
                            easing: 'linear',
                            queue: false,
                        }
                    });
                    return false;
                });
                /*END*/
            });
            $('.mfp-image').magnificPopup({
                type: 'image',
                closeOnContentClick: true,
                mainClass: 'mfp-fade',
                gallery: {
                    enabled: true,
                    navigateByImgClick: true,
                    preload: [0, 1]
                        // Will preload 0 - before current, and 1 after the current image 
                }
            });
        </script>

    </body>
</html>