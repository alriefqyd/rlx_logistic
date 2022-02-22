
{{--@if(session()->has('success'))--}}
{{--    <div class="alert alert-success alert-dismissable fade show" role="alert">--}}
{{--        {{ session('success') }}--}}
{{--        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>--}}
{{--    </div>--}}
{{--@endif--}}

{{--@if(session()->has('loginError'))--}}
{{--    <div class="alert alert-danger alert-dismissable fade show" role="alert">--}}
{{--        {{ session('loginError') }}--}}
{{--        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>--}}
{{--    </div>--}}
{{--@endif--}}
<!-- Bootstrap -->
<link href="{{asset('style/admin/vendors/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
<!-- Font Awesome -->
<link href="{{asset('style/admin/vendors/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
<!-- NProgress -->
<link href="{{asset('style/admin/vendors/nprogress/nprogress.css')}}" rel="stylesheet">
<!-- bootstrap-daterangepicker -->
<link href="{{asset('style/admin/vendors/bootstrap-daterangepicker/daterangepicker.css')}}" rel="stylesheet">

<!-- Custom Theme Style -->
<link href="{{asset('style/admin/build/css/custom.min.css')}}" rel="stylesheet">

<link href="{{asset('style/admin/vendors/fontawesome5/css/fontawesome.min.css')}}" rel="stylesheet">
<link href="{{asset('style/admin/vendors/fontawesome5/css/brands.min.css')}}" rel="stylesheet">
<link href="{{asset('style/admin/vendors/fontawesome5/css/solid.min.css')}}" rel="stylesheet">

<!-- Select2 -->
<link href="{{asset('style/admin/vendors/select2/dist/css/select2.min.css')}}" rel="stylesheet">
<link href="{{asset('style/admin/vendors/select2-4/dist/css/select2.min.css')}}" rel="stylesheet">

<!-- Custom Theme Style -->
<link href="{{asset('style/admin/build/css/custom.min.css')}}" rel="stylesheet">
<link href="{{asset('style/admin/build/css/style2.css')}}" rel="stylesheet">

<body class="login">
<div>
    <a class="hiddenanchor" id="signup"></a>
    <a class="hiddenanchor" id="signin"></a>

    <div class="login_wrapper">
        <div class="animate form login_form">
            <section class="login_content">
                <form action="/admin/authenticate" method="post">
                    @csrf
                    <h1>Login Form</h1>
                    <div>
                        <input type="text" name="email" @error('email') is-invalid @enderror class="form-control" placeholder="Username" required="" />
                    </div>
                    @error('email')
                    <div class="invalid-feedback">
                        {{ $message  }}
                    </div>
                    @enderror
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
                            {{--<h1><i class="fa fa-paw"></i> Gentelella Alela!</h1>
                            <p>©2016 All Rights Reserved. Gentelella Alela! is a Bootstrap 3 template. Privacy and Terms</p>--}}
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
