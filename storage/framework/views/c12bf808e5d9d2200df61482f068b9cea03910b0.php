<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Restu Lintas Express</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="<?php echo e(asset('style/css/bootstrap-411.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('style/css/style2.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('style/css/resi.css')); ?>" rel="stylesheet">
</head>
<body class="print-resi" id="print-resi">
<link href="<?php echo e(asset('style/admin/vendors/font-awesome/css/font-awesome.min.css')); ?>" rel="stylesheet">
<div class="container">
    <div class="col-md-12">
        <div class="invoice">
            <!-- begin invoice-company -->
            <div class="invoice-company text-inverse f-w-600">
            <img src="<?php echo e(asset('img/logo.png')); ?>" style="width: 100px" class="pull-right">
            <span class="badge badge-service"><?php echo e($delivery->layanan->code); ?></span>
            <span class="label ml-2"><?php echo e(date('d-M-Y', strtotime($delivery->created_at))); ?></span>
            </div>
            <!-- end invoice-company -->
            <!-- begin invoice-header -->
            <div class="invoice-header">
                <div class="invoice-from">
                    <address class="m-t-5 m-b-5">
                        <?php echo e($delivery->stt); ?><br>
                        <?php echo $barcode; ?>

                        <?php echo e($delivery->cityDestination->getFullLocation()); ?>

                    </address>
                </div>
                <div class="invoice-date">
                    <br>
                    <div class="text-inverse m-t-5"><h6><?php echo e($delivery->cityOrigin->name); ?> - <?php echo e($delivery->cityDestination->name); ?></h6></div>
                </div>
            </div>
            <div class="invoice-content">
                <div class="sender mb-2">
                <p><b>Pengirim : </b></p>
                <p><?php echo e($delivery->senderName); ?> <br>
                    <?php echo e($delivery->phone_sending_by); ?> <br>
                    <?php echo e($delivery->addressSender); ?>

                </p>
                </div>

                <div class="receiver mb-2">
                <p><b>Penerima : </b></p>
                <p><?php echo e($delivery->recipientName); ?> <br>
                    <?php echo e($delivery->phone_recipient); ?> <br>
                    <?php echo e($delivery->addressRecipient); ?>

                </p>
                </div>

                <div class="mb-2">
                    <p><?php echo e($delivery->komoditas); ?><br>
                    PT RESTU LINTAS EXPRESS</p>
                </div>

            </div>
            <!-- end invoice-header -->
            <!-- begin invoice-content -->
            <div class="invoice-content">
                <!-- begin table-responsive -->
                <div class="table-responsive">
                    <table class="table table-invoice">
                        <thead>
                        <tr>
                            <th><?php echo e($delivery->harga); ?></th>

                            <th class="" width="20%"></th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>
                                <span class="text-inverse">Biaya : RP <?php echo e($delivery->harga); ?></span><br>
                                Asuransi : RP <?php echo e($delivery->biaya_asuransi); ?> <br>
                                Surcharge : - <br>
                                Packing : - <br>
                                PPN 1 % : <?php echo e($delivery->ppn); ?> <br>
                            </td>






                            <td>
                                <span class="text-inverse">
                                    <strong>1/1</strong><br>
                                    1/1 Kg <br>
                                    10/10/10 Cm
                                </span>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                    <hr>
                </div>
                <!-- end table-responsive -->
                <!-- begin invoice-price -->




















                <!-- end invoice-price -->
            </div>
            <!-- end invoice-content -->
            <!-- begin invoice-note -->

















            <!-- end invoice-footer -->
        </div>
    </div>
    <div class="col-md-12">
        <div class="invoice">
            <!-- begin invoice-company -->
            <div class="invoice-company text-inverse f-w-600">
                <img src="<?php echo e(asset('img/logo.png')); ?>" style="width: 100px" class="pull-right">
                <span class="badge badge-service"><?php echo e($delivery->layanan->code); ?></span>
                <span class="label ml-2"><?php echo e(date('d-M-Y', strtotime($delivery->created_at))); ?></span>
            </div>
            <!-- end invoice-company -->
            <!-- begin invoice-header -->
            <div class="invoice-header">
                <div class="invoice-from">
                    <address class="m-t-5 m-b-5">
                        <?php echo e($delivery->stt); ?><br>
                        <?php echo $barcode; ?>

                        <?php echo e($delivery->cityDestination->getFullLocation()); ?>

                    </address>
                </div>
                <div class="invoice-date">
                    <br>
                    <div class="text-inverse m-t-5"><h6><?php echo e($delivery->cityOrigin->name); ?> - <?php echo e($delivery->cityDestination->name); ?></h6></div>
                </div>
            </div>
            <div class="invoice-content">
                <div class="sender mb-2">
                    <p><b>Pengirim : </b></p>
                    <p><?php echo e($delivery->senderName); ?> <br>
                        <?php echo e($delivery->phone_sending_by); ?> <br>
                        <?php echo e($delivery->addressSender); ?>

                    </p>
                </div>

                <div class="receiver mb-2">
                    <p><b>Penerima : </b></p>
                    <p><?php echo e($delivery->recipientName); ?> <br>
                        <?php echo e($delivery->phone_recipient); ?> <br>
                        <?php echo e($delivery->addressRecipient); ?>

                    </p>
                </div>

                <div class="mb-2">
                    <p><?php echo e($delivery->komoditas); ?><br>
                        PT RESTU LINTAS EXPRESS</p>
                </div>

            </div>
            <!-- end invoice-header -->
            <!-- begin invoice-content -->
            <div class="invoice-content">
                <!-- begin table-responsive -->
                <div class="table-responsive">
                    <table class="table table-invoice">
                        <thead>
                        <tr>
                            <th><?php echo e($delivery->harga); ?></th>
                            
                            <th class="" width="20%"></th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>
                                <span class="text-inverse">Biaya : RP <?php echo e($delivery->harga); ?></span><br>
                                Asuransi : RP <?php echo e($delivery->biaya_asuransi); ?> <br>
                                Surcharge : - <br>
                                Packing : - <br>
                                PPN 1 % : <?php echo e($delivery->ppn); ?> <br>
                            </td>
                            
                            
                            
                            
                            
                            
                            <td>
                                <span class="text-inverse">
                                    <strong>1/1</strong><br>
                                    1/1 Kg <br>
                                    10/10/10 Cm
                                </span>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                    <hr>
                </div>
                <!-- end table-responsive -->
                <!-- begin invoice-price -->
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            <!-- end invoice-price -->
            </div>
            <!-- end invoice-content -->
            <!-- begin invoice-note -->
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        <!-- end invoice-footer -->
        </div>
    </div>
</div>


</body>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script>
    // setTimeout(function(){
        window.print()
    // },100);

</script>

</html>
<?php /**PATH /Users/alriefqydasmito/Project/laravel/logistic/resources/views/admin/delivery/resi.blade.php ENDPATH**/ ?>