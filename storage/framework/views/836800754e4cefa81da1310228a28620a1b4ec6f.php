<?php $__env->startSection('main'); ?>
<!-- Carousel Start -->
<div class="container-fluid p-0 pb-5">
    <div class="owl-carousel header-carousel position-relative mb-5">
        <div class="owl-carousel-item position-relative">
            <img class="img-fluid" src="<?php echo e(asset('style/img/carousel-2.jpg')); ?>" alt="">
            <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center" style="background: rgba(6, 3, 21, .5);">
                <div class="container">
                    <div class="row justify-content-start">
                        <div class="col-10 col-lg-8">
                            <h5 class="text-white text-uppercase mb-3 animated slideInDown">LOGISTICS SOLUTION</h5>
                            <h1 class="display-3 text-white animated slideInDown mb-4">#1 Place For Your <span class="text-primary">Logistic</span> Solution</h1>
                            <!-- <p class="fs-5 fw-medium text-white mb-4 pb-2">Vero elitr justo clita lorem. Ipsum dolor at sed stet sit diam no. Kasd rebum ipsum et diam justo clita et kasd rebum sea elitr.</p>
                            <a href="" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">Read More</a>
                            <a href="" class="btn btn-secondary py-md-3 px-md-5 animated slideInRight">Free Quote</a> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Carousel End -->

<!-- Desktop Card -->
<div class="card-track-container-desktop container mt-5 mb-3" style="width: 50%;">
    <div class="row">
        <div class="col-md-12 card-overlap-home">
            <div class="card p-3 mb-3" style="box-shadow: 0 4px 25px rgb(0 0 0 / 10%);">
                <div class="row">
                    <h6>Lacak Pengiriman</h6>
                    <!-- <div class="col-2 col-sm-1">
                        <i class="fa fa-shipping-fast fa-3x text-primary mb-2"></i>
                    </div> -->
                    <div class="col-10 col-sm-10">
                        <input type="text" class="form-control border-2" placeholder="No Resi" style="height: 45px; border-radius: 10px;">
                    </div>
                    <div class="col-2 col-sm-2 mb-3">
                        <button class="btn btn-primary w-30 py-2" type="submit" style="height: 45px; border-radius: 10px;"><i class="track-icon fa fa-shipping-fast fa-1x text-primary mb-2"></i> Lacak</button>
                    </div>
                    <hr>
                </div>
                <div class="row">
                    <h6>Cek Harga Pengiriman</h6>
                    <div class="col-5 col-sm-5 text-center">
                        <select class="select2 select-location js-select-origin form-control border-2" name="origin" style="height: 45px; border-radius: 10px;">
                            <option>Pilih Lokasi</option>
                        </select>
                    </div>
                    <div class="col-5 col-sm-5 text-center">
                        <select class="select2 js-select-destination form-control border-2 js-select-destination" name="destination" style="height: 45px; border-radius: 10px;">
                            <option>Pilih Lokasi</option>
                        </select>
                    </div>
                    <div class="col-2 col-sm-2 text-center">
                        <button class="btn btn-primary w-30 py-2" type="submit" style="height: 45px; border-radius: 10px;"></i> Cek Harga</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Mobile Card -->
<div class="card-track-container-mobile container mt-5 mb-3">
    <div class="row">
        <div class="col-md-12 card-overlap-home">
            <div class="card p-3 mb-3" style="box-shadow: 0 4px 25px rgb(0 0 0 / 10%);">
                <div class="row">
                    <h6>Lacak Pengiriman</h6>
                    <!-- <div class="col-2 col-sm-1">
                        <i class="fa fa-shipping-fast fa-3x text-primary mb-2"></i>
                    </div> -->
                    <div class="col-9 col-sm-9 card-overlap-form">
                        <input type="text" class="form-control border-2" placeholder="No Resi" style="height: 45px; border-radius: 10px;">
                    </div>
                    <div class="col-2 col-sm-2 card-overlap-button">
                        <button class="btn btn-primary w-30 py-2" type="submit" style="height: 45px; border-radius: 10px;"><i class="track-icon fa fa-search-dollar fa-1x text-primary mb-2"></i></button>
                    </div>
                </div>
                <div class="row">
                    <h6>Lacak Pengiriman</h6>
                    <!-- <div class="col-2 col-sm-1">
                        <i class="fa fa-shipping-fast fa-3x text-primary mb-2"></i>
                    </div> -->
                    <div class="col-5 col-sm-12 mb-2 card-overlap-form">
                        <select class="select2 form-control border-2" name="origin" style="height: 45px; border-radius: 10px;"></select>
                    </div>
                    <div class="col-5 col-sm-12 mb-2 card-overlap-form">
                        <select class="select2 form-control border-2" name="destination" style="height: 45px; border-radius: 10px;"></select>
                    </div>
                    <div class="col-2 col-sm-12 card-overlap-button">
                        <button class="btn btn-primary w-30 py-2" type="submit" style="height: 45px; border-radius: 10px;"><i class="track-icon fa fa-search-dollar fa-1x text-primary mb-2"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Service Start -->
<div class="container-xxl">
    <div class="container py-5">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <!-- <h6 class="text-secondary text-uppercase">Our Services</h6> -->
            <h1 class="mb-5">Layanan Kami</h1>
        </div>
        <div class="row g-3">
            <div class="col-md-4 col-lg-4 wow fadeInUp" data-wow-delay="0.3s">
                <div class="service-item p-4">
                    <div class="overflow-hidden mb-4 text-center">
                        <i class="fa fa-clock text-primary fa-3x flex-shrink-0"></i>
                    </div>
                    <h4 class="mb-3 text-center">ONE DAY SERVICE</h4>
                    <p>Layanan pengiriman besok sampai dengan jaminan uang kembali.</p>

                </div>
            </div>
            <div class="col-md-4 col-lg-4 wow fadeInUp" data-wow-delay="0.3s">
                <div class="service-item p-4">
                    <div class="overflow-hidden mb-4 text-center">
                        <i class="far fa-file-alt text-primary fa-3x flex-shrink-0"></i>
                    </div>
                    <h4 class="mb-3 text-center">DOCUMENT SERVICE</h4>
                    <p>Layanan pengiriman dokumen dengan harga khusus. </p>

                </div>
            </div>
            <div class="col-md-4 col-lg-4 wow fadeInUp" data-wow-delay="0.3s">
                <div class="service-item p-4">
                    <div class="overflow-hidden mb-4 text-center">
                        <i class="fas fa-truck text-primary fa-3x flex-shrink-0"></i>
                    </div>
                    <h4 class="mb-3 text-center">REGULER SERVICE</h4>
                    <p>Layanan pengiriman paket ke seluruh Indonesia.</p>

                </div>
            </div>
            <!-- <div class="col-md-3 col-lg-3 wow fadeInUp" data-wow-delay="0.3s">
                <div class="service-item p-4">
                    <div class="overflow-hidden mb-4 text-center">
                        <i class="fas fa-boxes text-primary fa-3x flex-shrink-0"></i>
                    </div>
                    <h4 class="mb-3">Air Freight</h4>
                    <p>Stet stet justo dolor sed duo. Ut clita sea sit ipsum diam lorem diam.</p>
                </div>
            </div> -->

        </div>
    </div>
</div>
<!-- Service End -->

<!-- Service Start -->
<div class="container-xxl">
    <div class="container py-5">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h1 class="mb-5">Kenapa Memilih Kami</h1>
        </div>
        <div class="row g-4">
            <div class="col-md-4 col-lg-4 wow fadeInUp" data-wow-delay="0.3s">
                <div class="service-item whyus-item p-4">

                    <h4 class="mb-3">Menjangkau Ke Seluruh Indonesia</h4>
                    <p>Pengiriman ke mana saja di seluruh Indonesia.</p>

                </div>
            </div>
            <div class="col-md-4 col-lg-4 wow fadeInUp" data-wow-delay="0.3s">
                <div class="service-item whyus-item p-4">

                    <h4 class="mb-3">Gratis</h4>
                    <p>Penjemputan Paket dan Barang</p>

                </div>
            </div>
            <div class="col-md-4 col-lg-4 wow fadeInUp" data-wow-delay="0.3s">
                <div class="service-item whyus-item p-4">

                    <h4 class="mb-3">Beragam Moda Transportasi</h4>
                    <p>Melayani Pengiman Melalui
                        Darat dan Udara.</p>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- Service End -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/alriefqydasmito/Project/laravel/logistic/resources/views/home/home.blade.php ENDPATH**/ ?>