<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="utf-8" />
    <title>Log In | Adminto - Responsive Admin Dashboard Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('cms/assets/images/favicon.ico') }}">

    <!-- App css -->

    <link href="{{ asset('cms/assets/css/app.min.css') }}" rel="stylesheet" type="text/css" id="app-style" />

    <!-- icons -->
    <link href="{{ asset('cms/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{ asset('cms/build/toastr.min.css') }}">
    <style>
        .form-check .form-check-input {
            float: none;
            margin-left: 0;
        }
        body.authentication-bg {
            background-size:cover !important;
            background-repeat: no-repeat;
            background-image: url({{ asset('cms/bgLogin.jpg') }});
        }
    </style>
</head>

<body class="loading authentication-bg authentication-bg-pattern">

    <div class="account-pages my-5">
        <div class="container">

            <div class="row justify-content-center">
                <div class="col-11 col-md-8 col-lg-6 col-xl-4">
                    <div class="text-center">
                        <a href="index.html">
                            <img src="{{ asset('cms/logo.jpg') }}" alt="" height="22"
                                class="mx-auto">
                        </a>
                        <p class="text-black mt-2 mb-4">مدرسة الريفي لتعليم السياقة النظرة وقيادة السيارات
                        </p>

                    </div>
                    <div class="card bg-success text-dark">
                        <div class="card-body p-4">

                            <div class="text-center mb-4">
                                <h4 class="text-white mt-0">تسجيل الدخول</h4>
                            </div>

                            <form>
                                <div class="mb-3">
                                    <label for="emailaddress" class="form-label">الايميل</label>
                                    <input class="form-control" type="email" id="email" required=""
                                        placeholder="الايميل">
                                </div>

                                <div class="mb-3">
                                    <label for="password" class="form-label">كلمة المرور</label>
                                    <input class="form-control" type="password" required="" id="password"
                                        placeholder="كلمة المرور ">
                                </div>

                                <div class="mb-3">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input ms-1" id="remember" checked>
                                        <label class="form-check-label" for="checkbox-signin">تذكرني</label>
                                    </div>
                                </div>

                                <div class="mb-3 d-grid text-center">
                                    <button class="btn btn-danger" onclick="login()" type="button"> تسجل دخول
                                    </button>
                                </div>
                            </form>

                        </div> <!-- end card-body -->
                    </div>
                    <!-- end card -->

                </div> <!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </div>
    <!-- end page -->

    <!-- Vendor -->
    <script src="{{ asset('cms/assets/libs/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('cms/assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('cms/assets/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('cms/assets/libs/node-waves/waves.min.js') }}"></script>
    <script src="{{ asset('cms/assets/libs/waypoints/lib/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('cms/assets/libs/jquery.counterup/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('cms/assets/libs/feather-icons/feather.min.js') }}"></script>

    <!-- App js -->
    <script src="{{ asset('cms/assets/js/app.min.js') }}"></script>
    {{-- axios js CDN --}}
    <script src="https://cdn.jsdelivr.net/npm/axios@1.1.2/dist/axios.min.js"></script>
    <script src="{{ asset('cms/build/toastr.min.js') }}"></script>

    <script>
        function login() {
            axios.post('/cms/user/login', {
                    email: document.getElementById('email').value,
                    password: document.getElementById('password').value,
                    remember: document.getElementById('remember').checked,
                })
                .then(function(response) {
                    toastr.success("تم تسجيل الدخول بنجاح");
                    window.location.href = '/cms/home'
                })
                .catch(function(error) {
                    toastr.error("هناك خطأ في كلمة المرور أو اسم المستخدم");
                    
                })
        }
    </script>

</body>

</html>
