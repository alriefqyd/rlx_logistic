













<!-- Bootstrap -->
<link href="<?php echo e(asset('style/admin/vendors/bootstrap/dist/css/bootstrap.min.css')); ?>" rel="stylesheet">
<!-- Font Awesome -->
<link href="<?php echo e(asset('style/admin/vendors/font-awesome/css/font-awesome.min.css')); ?>" rel="stylesheet">
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

<!-- Custom Theme Style -->
<link href="<?php echo e(asset('style/admin/build/css/custom.min.css')); ?>" rel="stylesheet">
<link href="<?php echo e(asset('style/admin/build/css/style2.css')); ?>" rel="stylesheet">

<body class="login">
<div>
    <a class="hiddenanchor" id="signup"></a>
    <a class="hiddenanchor" id="signin"></a>

    <div class="login_wrapper">
        <div class="animate form login_form">
            <section class="login_content">
                <form action="/admin/authenticate" method="post">
                    <?php echo csrf_field(); ?>
                    <h1>Login Form</h1>
                    <div>
                        <input type="text" name="email" <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> class="form-control" placeholder="Username" required="" />
                    </div>
                    <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <div class="invalid-feedback">
                        <?php echo e($message); ?>

                    </div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    <div>
                        <input type="password" class="form-control" name="password" placeholder="Password" required="" />
                    </div>
                    <div>
                        <button class="btn btn-primary submit"> Log in</button>
                        <a class="reset_pass" href="#">Lost your password?</a>
                    </div>

                    <div class="clearfix"></div>

                    <div class="separator">
                        <p class="change_link">New to site?
                            <a href="#signup" class="to_register"> Create Account </a>
                        </p>

                        <div class="clearfix"></div>
                        <br />

                        <div>
                            
                        </div>
                    </div>
                </form>
            </section>
        </div>

        <div id="register" class="animate form registration_form">
            <section class="login_content">
                <form>
                    <h1>Create Account</h1>
                    <div>
                        <input type="text" class="form-control" placeholder="Username" required="" />
                    </div>
                    <div>
                        <input type="email" class="form-control" placeholder="Email" required="" />
                    </div>
                    <div>
                        <input type="password" class="form-control" placeholder="Password" required="" />
                    </div>
                    <div>
                        <a class="btn btn-default submit" href="index.html">Submit</a>
                    </div>

                    <div class="clearfix"></div>

                    <div class="separator">
                        <p class="change_link">Already a member ?
                            <a href="#signin" class="to_register"> Log in </a>
                        </p>

                        <div class="clearfix"></div>
                        <br />

                        <div>
                            <h1><i class="fa fa-paw"></i> Gentelella Alela!</h1>
                            <p>©2016 All Rights Reserved. Gentelella Alela! is a Bootstrap 3 template. Privacy and Terms</p>
                        </div>
                    </div>
                </form>
            </section>
        </div>
    </div>
</div>
</body>
<?php /**PATH /Users/alriefqydasmito/Project/laravel/logistic/resources/views/admin/login/login.blade.php ENDPATH**/ ?>