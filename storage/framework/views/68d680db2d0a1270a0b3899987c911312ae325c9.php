<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title>Logistik </title>

    <!-- Bootstrap -->
    <link href="<?php echo e(asset('style/admin/vendors/bootstrap/dist/css/bootstrap.min.css')); ?>" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?php echo e(asset('style/admin/vendors/font-awesome/css/font-awesome.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('style/admin/vendors/fontawesome/css/font-awesome.min.css')); ?>" rel="stylesheet">

    <!-- NProgress -->
    <link href="<?php echo e(asset('style/admin/vendors/nprogress/nprogress.css')); ?>" rel="stylesheet">
    <!-- bootstrap-daterangepicker -->
    <link href="<?php echo e(asset('style/admin/vendors/bootstrap-daterangepicker/daterangepicker.css')); ?>" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="<?php echo e(asset('style/admin/build/css/custom.min.css')); ?>" rel="stylesheet">

    <link href="<?php echo e(asset('style/admin/vendors/fontawesome5/css/fontawesome.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('style/admin/vendors/fontawesome5/css/brands.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('style/admin/vendors/fontawesome5/css/solid.min.css')); ?>" rel="stylesheet">

    <!-- Select2 -->
    <link href="<?php echo e(asset('style/admin/vendors/select2/dist/css/select2.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('style/admin/vendors/select2-4/dist/css/select2.min.css')); ?>" rel="stylesheet">

    <script src="<?php echo e(asset('style/admin/vendors/bootstrap-duallistbox/dist/bootstrap-duallistbox.min.css')); ?>"></script>
    <script src="<?php echo e(asset('style/admin/vendors/bootstrap-duallistbox/src/bootstrap-duallistbox.min.css')); ?>"></script>
    <!-- iCheck -->
    <link href="<?php echo e(asset('style/admin/vendors/iCheck/skins/flat/green.css')); ?>" rel="stylesheet">
    <!-- Switchery -->
    <link href="<?php echo e(asset('style/admin/vendors/switchery/dist/switchery.min.css')); ?>" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="<?php echo e(asset('style/admin/build/css/custom.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('style/admin/build/css/style2.css')); ?>" rel="stylesheet">

    <?php echo toastr_css(); ?>
    <link href="<?php echo e(asset('style/admin/vendors/summernote/dist/summernote.min.css')); ?>" rel="stylesheet">

</head>

<body class="nav-md">
<div class="container body">
    <div class="main_container">
        <div class="col-md-3 left_col">
            <div class="left_col scroll-view">

                <?php echo $__env->make('admin.layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php echo $__env->make('admin.layouts.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                <!-- /menu footer buttons -->
                <div class="sidebar-footer hidden-small">
                    <a data-toggle="tooltip" data-placement="top" title="Settings">
                        <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                    </a>
                    <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                        <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
                    </a>
                    <a data-toggle="tooltip" data-placement="top" title="Lock">
                        <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
                    </a>
                    <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
                        <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                    </a>
                </div>
                <!-- /menu footer buttons -->
            </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
            <div class="nav_menu">
                <nav>
                    <div class="nav toggle">
                        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                    </div>

                    <ul class="nav navbar-nav navbar-right">
                        <li class="">
                            <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                <img src="images/img.jpg" alt=""><?php echo e(auth()->user()->profile->full_name); ?>

                                <span class=" fa fa-angle-down"></span>
                            </a>
                            <ul class="dropdown-menu dropdown-usermenu pull-right">
                                <form action="/admin/logout" method="post">
                                    <?php echo csrf_field(); ?>
                                    <li>
                                       <button class="btn btn-danger" type="submit">Logout</button>
                                    </li>
                                </form>
                            </ul>
                        </li>

                        <li role="presentation" class="dropdown">
                            <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                                <i class="fa fa-envelope-o"></i>
                                <span class="badge bg-green">6</span>
                            </a>
                            <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                                <li>
                                    <a>
                                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a>
                                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a>
                                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a>
                                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                                    </a>
                                </li>
                                <li>
                                    <div class="text-center">
                                        <a>
                                            <strong>See All Alerts</strong>
                                            <i class="fa fa-angle-right"></i>
                                        </a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
        
        
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col main_content" role="main">
            <div class="">
                <div class="row">
                    <?php echo $__env->yieldContent('main_content'); ?>
                </div>
            </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
            <div class="pull-right">
                Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
            </div>
            <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
    </div>
</div>

<!-- jQuery -->
<script src="<?php echo e(asset('style/admin/vendors/jquery/dist/jquery.min.js')); ?>"></script>
<!-- Bootstrap -->
<script src="<?php echo e(asset('style/admin/vendors/bootstrap/dist/js/bootstrap.min.js')); ?>"></script>

<script src="<?php echo e(asset('style/admin/vendors/summernote/dist/summernote.min.js')); ?>"></script>
<!-- NProgress -->
<script src="<?php echo e(asset('style/admin/vendors/nprogress/nprogress.js')); ?>"></script>
<!-- Chart.js -->
<script src="<?php echo e(asset('style/admin/vendors/Chart.js/dist/Chart.min.js')); ?>"></script>
<!-- jQuery Sparklines -->
<script src="<?php echo e(asset('style/admin/vendors/jquery-sparkline/dist/jquery.sparkline.min.js')); ?>"></script>
<!-- Flot -->
<script src="<?php echo e(asset('style/admin/vendors/Flot/jquery.flot.js')); ?>"></script>
<script src="<?php echo e(asset('style/admin/vendors/Flot/jquery.flot.pie.js')); ?>"></script>
<script src="<?php echo e(asset('style/admin/vendors/Flot/jquery.flot.time.js')); ?>"></script>
<script src="<?php echo e(asset('style/admin/vendors/Flot/jquery.flot.stack.js')); ?>"></script>
<script src="<?php echo e(asset('style/admin/vendors/Flot/jquery.flot.resize.js')); ?>"></script>
<!-- Flot plugins -->
<script src="<?php echo e(asset('style/admin/vendors/flot.orderbars/js/jquery.flot.orderBars.js')); ?>"></script>
<script src="<?php echo e(asset('style/admin/vendors/flot-spline/js/jquery.flot.spline.min.js')); ?>"></script>
<script src="<?php echo e(asset('style/admin/vendors/flot.curvedlines/curvedLines.js')); ?>"></script>
<!-- DateJS -->
<script src="<?php echo e(asset('style/admin/vendors/DateJS/build/date.js')); ?>"></script>
<!-- bootstrap-daterangepicker -->
<script src="<?php echo e(asset('style/admin/vendors/moment/min/moment.min.js')); ?>"></script>
<script src="<?php echo e(asset('style/admin/vendors/bootstrap-daterangepicker/daterangepicker.js')); ?>"></script>

<!-- Custom Theme Scripts -->
<script src="<?php echo e(asset('style/admin/build/js/custom.min.js')); ?>"></script>

<!-- Jquery Validation -->
<script src="<?php echo e(asset('style/admin/vendors/jquery-validation/dist/jquery.validate.min.js')); ?>"></script>

<!-- Select2 -->
<script src="<?php echo e(asset('style/admin/vendors/select2/dist/js/select2.full.min.js')); ?>"></script>
<script src="<?php echo e(asset('style/admin/vendors/select2-4/dist/js/select2.full.min.js')); ?>"></script>
<script src="<?php echo e(asset('style/admin/vendors/select2-4/dist/js/select2.min.js')); ?>"></script>

<script src="<?php echo e(asset('style/admin/build/js/mustache.min.js')); ?>"></script>
<script src="<?php echo e(asset('style/admin/build/js/main.js')); ?>"></script>

<!-- bootstrap-datetimepicker -->
<script src="<?php echo e(asset('style/admin/vendors/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js')); ?>"></script>
<script src="<?php echo e(asset('style/admin/build/js/application.js')); ?>"></script>

<!-- Switchery -->
<script src="<?php echo e(asset('style/admin/vendors/switchery/dist/switchery.min.js')); ?>"></script>
<!-- FastClick -->
<script src="<?php echo e(asset('style/admin/vendors/fastclick/lib/fastclick.js')); ?>"></script>
<script src="<?php echo e(asset('style/admin/vendors/iCheck/icheck.min.js')); ?>"></script>

<!-- jquery.inputmask -->
<script src="<?php echo e(asset('style/admin/vendors/jquery.inputmask/dist/min/jquery.inputmask.bundle.min.js')); ?>"></script>
<!-- jQuery Knob -->
<script src="<?php echo e(asset('style/admin/vendors/bootstrap-duallistbox/dist/jquery.bootstrap-duallistbox.min.js')); ?>"></script>
<?php echo toastr_js(); ?>
<?php echo app('toastr')->render(); ?>
<script src="<?php echo e(asset('style/admin/vendors/jquery-loading-overlay/dist/loadingoverlay.min.js')); ?>"></script>
<script src="<?php echo e(asset('style/admin/build/js/custom.min.js')); ?>"></script>
</body>
</html>

<?php echo $__env->make('admin.home.mustache', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('admin.delivery.mustache', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/alriefqydasmito/Project/laravel/logistic/resources/views/admin/layouts/main.blade.php ENDPATH**/ ?>