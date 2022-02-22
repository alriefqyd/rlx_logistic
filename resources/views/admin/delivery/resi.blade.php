<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Restu Lintas Express</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{asset('style/css/bootstrap-411.css')}}" rel="stylesheet">
    <link href="{{asset('style/css/style2.css')}}" rel="stylesheet">
    <link href="{{asset('style/css/resi.css')}}" rel="stylesheet">
</head>
<body class="print-resi" id="print-resi">
<link href="{{asset('style/admin/vendors/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
<div class="container">
    <div class="col-md-12">
        <div class="invoice">
            <!-- begin invoice-company -->
            <div class="invoice-company text-inverse f-w-600">
            <img src="{{asset('img/logo.png')}}" style="width: 100px" class="pull-right">
            <span class="badge badge-service">{{$delivery->layanan->code}}</span>
            <span class="label ml-2">{{date('d-M-Y', strtotime($delivery->created_at))}}</span>
            </div>
            <!-- end invoice-company -->
            <!-- begin invoice-header -->
            <div class="invoice-header">
                <div class="invoice-from">
                    <address class="m-t-5 m-b-5">
                        {{$delivery->stt}}<br>
                        {!! $barcode !!}
                        {{$delivery->cityDestination->getFullLocation()}}
                    </address>
                </div>
                <div class="invoice-date">
                    <br>
                    <div class="text-inverse m-t-5"><h6>{{$delivery->cityOrigin->name}} - {{$delivery->cityDestination->name}}</h6></div>
                </div>
            </div>
            <div class="invoice-content">
                <div class="sender mb-2">
                <p><b>Pengirim : </b></p>
                <p>{{$delivery->senderName}} <br>
                    {{$delivery->phone_sending_by}} <br>
                    {{$delivery->addressSender}}
                </p>
                </div>

                <div class="receiver mb-2">
                <p><b>Penerima : </b></p>
                <p>{{$delivery->recipientName}} <br>
                    {{$delivery->phone_recipient}} <br>
                    {{$delivery->addressRecipient}}
                </p>
                </div>

                <div class="mb-2">
                    <p>{{$delivery->komoditas}}<br>
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
                            <th>{{$delivery->harga}}</th>
{{--                            <th class="" width="30%">RATE</th>--}}
                            <th class="" width="20%"></th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>
                                <span class="text-inverse">Biaya : RP {{$delivery->harga}}</span><br>
                                Asuransi : RP {{$delivery->biaya_asuransi}} <br>
                                Surcharge : - <br>
                                Packing : - <br>
                                PPN 1 % : {{$delivery->ppn}} <br>
                            </td>
{{--                            <td width="30%">--}}
{{--                                <span class="text-inverse">BM : -</span><br>--}}
{{--                                <span class="text-inverse">PPN : 100000</span><br>--}}
{{--                                <span class="text-inverse">PPH : 100000</span><br>--}}
{{--                                <span class="text-inverse">Biaya Lain - Lain : 100000</span><br>--}}
{{--                            </td>--}}
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
{{--                <div class="invoice-price">--}}
{{--                    <div class="invoice-price-left">--}}
{{--                        <div class="invoice-price-row">--}}
{{--                            <div class="sub-price">--}}
{{--                                <small>SUBTOTAL</small>--}}
{{--                                <span class="text-inverse">$4,500.00</span>--}}
{{--                            </div>--}}
{{--                            <div class="sub-price">--}}
{{--                                <i class="fa fa-plus text-muted"></i>--}}
{{--                            </div>--}}
{{--                            <div class="sub-price">--}}
{{--                                <small>PAYPAL FEE (5.4%)</small>--}}
{{--                                <span class="text-inverse">$108.00</span>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="invoice-price-right">--}}
{{--                        <small>TOTAL</small> <span class="f-w-600">$4508.00</span>--}}
{{--                    </div>--}}
{{--                </div>--}}
                <!-- end invoice-price -->
            </div>
            <!-- end invoice-content -->
            <!-- begin invoice-note -->
{{--            <div class="invoice-note">--}}
{{--                * Make all cheques payable to [Your Company Name]<br>--}}
{{--                * Payment is due within 30 days<br>--}}
{{--                * If you have any questions concerning this invoice, contact  [Name, Phone Number, Email]--}}
{{--            </div>--}}
{{--            <!-- end invoice-note -->--}}
{{--            <!-- begin invoice-footer -->--}}
{{--            <div class="invoice-footer">--}}
{{--                <p class="text-center m-b-5 f-w-600">--}}
{{--                    THANK YOU FOR YOUR BUSINESS--}}
{{--                </p>--}}
{{--                <p class="text-center">--}}
{{--                    <span class="m-r-10"><i class="fa fa-fw fa-lg fa-globe"></i> matiasgallipoli.com</span>--}}
{{--                    <span class="m-r-10"><i class="fa fa-fw fa-lg fa-phone-volume"></i> T:016-18192302</span>--}}
{{--                    <span class="m-r-10"><i class="fa fa-fw fa-lg fa-envelope"></i> rtiemps@gmail.com</span>--}}
{{--                </p>--}}
{{--            </div>--}}
            <!-- end invoice-footer -->
        </div>
    </div>
    <div class="col-md-12">
        <div class="invoice">
            <!-- begin invoice-company -->
            <div class="invoice-company text-inverse f-w-600">
                <img src="{{asset('img/logo.png')}}" style="width: 100px" class="pull-right">
                <span class="badge badge-service">{{$delivery->layanan->code}}</span>
                <span class="label ml-2">{{date('d-M-Y', strtotime($delivery->created_at))}}</span>
            </div>
            <!-- end invoice-company -->
            <!-- begin invoice-header -->
            <div class="invoice-header">
                <div class="invoice-from">
                    <address class="m-t-5 m-b-5">
                        {{$delivery->stt}}<br>
                        {!! $barcode !!}
                        {{$delivery->cityDestination->getFullLocation()}}
                    </address>
                </div>
                <div class="invoice-date">
                    <br>
                    <div class="text-inverse m-t-5"><h6>{{$delivery->cityOrigin->name}} - {{$delivery->cityDestination->name}}</h6></div>
                </div>
            </div>
            <div class="invoice-content">
                <div class="sender mb-2">
                    <p><b>Pengirim : </b></p>
                    <p>{{$delivery->senderName}} <br>
                        {{$delivery->phone_sending_by}} <br>
                        {{$delivery->addressSender}}
                    </p>
                </div>

                <div class="receiver mb-2">
                    <p><b>Penerima : </b></p>
                    <p>{{$delivery->recipientName}} <br>
                        {{$delivery->phone_recipient}} <br>
                        {{$delivery->addressRecipient}}
                    </p>
                </div>

                <div class="mb-2">
                    <p>{{$delivery->komoditas}}<br>
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
                            <th>{{$delivery->harga}}</th>
                            {{--                            <th class="" width="30%">RATE</th>--}}
                            <th class="" width="20%"></th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>
                                <span class="text-inverse">Biaya : RP {{$delivery->harga}}</span><br>
                                Asuransi : RP {{$delivery->biaya_asuransi}} <br>
                                Surcharge : - <br>
                                Packing : - <br>
                                PPN 1 % : {{$delivery->ppn}} <br>
                            </td>
                            {{--                            <td width="30%">--}}
                            {{--                                <span class="text-inverse">BM : -</span><br>--}}
                            {{--                                <span class="text-inverse">PPN : 100000</span><br>--}}
                            {{--                                <span class="text-inverse">PPH : 100000</span><br>--}}
                            {{--                                <span class="text-inverse">Biaya Lain - Lain : 100000</span><br>--}}
                            {{--                            </td>--}}
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
            {{--                <div class="invoice-price">--}}
            {{--                    <div class="invoice-price-left">--}}
            {{--                        <div class="invoice-price-row">--}}
            {{--                            <div class="sub-price">--}}
            {{--                                <small>SUBTOTAL</small>--}}
            {{--                                <span class="text-inverse">$4,500.00</span>--}}
            {{--                            </div>--}}
            {{--                            <div class="sub-price">--}}
            {{--                                <i class="fa fa-plus text-muted"></i>--}}
            {{--                            </div>--}}
            {{--                            <div class="sub-price">--}}
            {{--                                <small>PAYPAL FEE (5.4%)</small>--}}
            {{--                                <span class="text-inverse">$108.00</span>--}}
            {{--                            </div>--}}
            {{--                        </div>--}}
            {{--                    </div>--}}
            {{--                    <div class="invoice-price-right">--}}
            {{--                        <small>TOTAL</small> <span class="f-w-600">$4508.00</span>--}}
            {{--                    </div>--}}
            {{--                </div>--}}
            <!-- end invoice-price -->
            </div>
            <!-- end invoice-content -->
            <!-- begin invoice-note -->
        {{--            <div class="invoice-note">--}}
        {{--                * Make all cheques payable to [Your Company Name]<br>--}}
        {{--                * Payment is due within 30 days<br>--}}
        {{--                * If you have any questions concerning this invoice, contact  [Name, Phone Number, Email]--}}
        {{--            </div>--}}
        {{--            <!-- end invoice-note -->--}}
        {{--            <!-- begin invoice-footer -->--}}
        {{--            <div class="invoice-footer">--}}
        {{--                <p class="text-center m-b-5 f-w-600">--}}
        {{--                    THANK YOU FOR YOUR BUSINESS--}}
        {{--                </p>--}}
        {{--                <p class="text-center">--}}
        {{--                    <span class="m-r-10"><i class="fa fa-fw fa-lg fa-globe"></i> matiasgallipoli.com</span>--}}
        {{--                    <span class="m-r-10"><i class="fa fa-fw fa-lg fa-phone-volume"></i> T:016-18192302</span>--}}
        {{--                    <span class="m-r-10"><i class="fa fa-fw fa-lg fa-envelope"></i> rtiemps@gmail.com</span>--}}
        {{--                </p>--}}
        {{--            </div>--}}
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
