<!DOCTYPE html>
<html lang="en" dir="rtl">

<head>

    <meta charset="utf-8" />
    <title>مدرسة الريفي لتعليم قيادة السيارات</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('cms/assets/images/favicon.ico') }}">

    <!-- App css -->

    <link href="{{ asset('cms/assets/css/app-rtl.min.css') }}" rel="stylesheet" type="text/css" id="app-style" />
    <link rel="stylesheet" href="{{ asset('cms/build/toastr.min.css') }}">

    <!-- icons -->
    <link href="{{ asset('cms/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    {{-- google font --}}
    {{-- <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        *, input::placeholder {
            font-family: 'Cairo', sans-serif !important;
        }
        i, span {
            font-family: "Font Awesome 5 Free" !important;
        }
    </style> --}}
    @yield('styles')
    @stack('style')

</head>

<!-- body start -->

<body class="loading" data-layout-color="light" data-layout-mode="default" data-layout-size="fluid"
    data-topbar-color="light" data-leftbar-position="fixed" data-leftbar-color="light" data-leftbar-size='default'
    data-sidebar-user='true'>

    <!-- Begin page -->
    <div id="wrapper">

        <!-- Topbar Start -->
        <div class="navbar-custom">
            <ul class="list-unstyled topnav-menu float-end mb-0">

                <li class="d-none d-lg-block">
                    <form class="app-search">
                        <div class="app-search-box">
                            <div class="dropdown-menu dropdown-lg" id="search-dropdown">
                                <!-- item-->
                                <div class="dropdown-header noti-title">
                                    <h5 class="text-overflow mb-2">Found 22 results</h5>
                                </div>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <i class="fe-home me-1"></i>
                                    <span>Analytics Report</span>
                                </a>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <i class="fe-aperture me-1"></i>
                                    <span>How can I help you?</span>
                                </a>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <i class="fe-settings me-1"></i>
                                    <span>User profile settings</span>
                                </a>

                                <!-- item-->
                                <div class="dropdown-header noti-title">
                                    <h6 class="text-overflow mb-2 text-uppercase">Users</h6>
                                </div>

                                <div class="notification-list">
                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <div class="d-flex align-items-start">
                                            <img class="d-flex me-2 rounded-circle"
                                                src="{{ asset('cms/assets/images/users/user-2.jpg') }}"
                                                alt="Generic placeholder image" height="32">
                                            <div class="w-100">
                                                <h5 class="m-0 font-14">Erwin E. Brown</h5>
                                                <span class="font-12 mb-0">UI Designer</span>
                                            </div>
                                        </div>
                                    </a>

                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <div class="d-flex align-items-start">
                                            <img class="d-flex me-2 rounded-circle"
                                                src="{{ asset('cms/assets/images/users/user-5.jpg') }}"
                                                alt="Generic placeholder image" height="32">
                                            <div class="w-100">
                                                <h5 class="m-0 font-14">Jacob Deo</h5>
                                                <span class="font-12 mb-0">Developer</span>
                                            </div>
                                        </div>
                                    </a>
                                </div>

                            </div>
                        </div>
                    </form>
                </li>

                <li class="dropdown d-inline-block d-lg-none">
                    <a class="nav-link dropdown-toggle arrow-none waves-effect waves-light" data-bs-toggle="dropdown"
                        href="#" role="button" aria-haspopup="false" aria-expanded="false">
                        <i class="fe-search noti-icon"></i>
                    </a>
                    <div class="dropdown-menu dropdown-lg dropdown-menu-end p-0">
                        <form class="p-3">
                            <input type="text" class="form-control" placeholder="Search ..."
                                aria-label="Recipient's username">
                        </form>
                    </div>
                </li>
            </ul>

            <!-- LOGO -->
            <div class="logo-box">
                <a href="index.html" class="logo logo-light text-center">
                    <span class="logo-sm">
                        <img src="{{ asset('cms/assets/images/logo-sm.png') }}" alt="" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="{{ asset('cms/assets/images/logo-light.png') }}" alt="" height="16">
                    </span>
                </a>
                {{-- <a href="index.html" class="logo logo-dark text-center">
                    <span class="logo-sm">
                        <img src="{{ asset('cms/assets/images/logo-sm.png') }}" alt="" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="{{ asset('cms/assets/images/logo-dark.png') }}" alt="" height="16">
                    </span>
                </a> --}}
            </div>

            <ul class="list-unstyled topnav-menu topnav-menu-left mb-0">
                <li>
                    <button class="button-menu-mobile disable-btn waves-effect" id="sideBarBtn">
                        <i class="fe-menu"></i>
                    </button>
                </li>

                <li class="w-100 d-flex ">
                    <h4 class="page-title-main">مدرسة الريفي لتعليم السياقة النظرة وقيادة السيارات </h4>
                </li>

            </ul>

            <div class="clearfix"></div>

        </div>
        <!-- end Topbar -->

        <!-- ========== Left Sidebar Start ========== -->

        <!-- Left Sidebar End -->

        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->

        <div class="content-page">
            <div class="content">

                <!-- Start Content-->
                <div class="container-fluid">
                    @yield('content')

                </div> <!-- container-fluid -->

            </div> <!-- content -->

            <!-- Footer Start -->
            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6">
                            <script>
                                document.write(new Date().getFullYear())
                            </script> &copy; مدرسة الريفي لتعليم قيادة السيارات
                        </div>
                    </div>
                </div>
            </footer>
            <!-- end Footer -->

        </div>
        <!-- ============================================================== -->
        <!-- End Page content -->
        <!-- ============================================================== -->


    </div>
    <!-- END wrapper -->
    @include('cms._includes.sidebar')

    <!-- Right Sidebar -->

    <!-- /Right-bar -->

    <!-- Right bar overlay-->
    <div class="rightbar-overlay"></div>

    <!-- Vendor -->
    <script src="{{ asset('cms/assets/libs/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('cms/assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('cms/assets/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('cms/assets/libs/node-waves/waves.min.js') }}"></script>
    <script src="{{ asset('cms/assets/libs/waypoints/lib/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('cms/assets/libs/jquery.counterup/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('cms/assets/libs/feather-icons/feather.min.js') }}"></script>

    <!-- knob plugin -->
    <script src="{{ asset('cms/assets/libs/jquery-knob/jquery.knob.min.js') }}"></script>

    <!--Morris Chart-->
    <script src="{{ asset('cms/assets/libs/morris.js06/morris.min.js') }}"></script>
    <script src="{{ asset('cms/assets/libs/raphael/raphael.min.js') }}"></script>

    <!-- Dashboar init js-->
    <script src="{{ asset('cms/assets/js/pages/dashboard.init.js') }}"></script>

    <!-- App js-->
    <script src="{{ asset('cms/assets/js/app.min.js') }}"></script>
    {{-- sweet alert2 CDN --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    {{-- axios js CDN --}}
    <script src="https://cdn.jsdelivr.net/npm/axios@1.1.2/dist/axios.min.js"></script>
    <script src="{{ asset('cms/build/toastr.min.js') }}"></script>
    <script>
        let sideBarBtn = document.querySelector('#sideBarBtn');
        sideBarBtn.onclick = _ => {
            let leftSideMenu = document.querySelector('.left-side-menu');
            leftSideMenu.style.display = "block";
        }
    </script>
    <script>
        $(document).ready(function() {
            setInterval(() => {
                axios.get('/cms/getUnReadNotification')
                    .then(function(response) {
                        let notifications = response.data.notifications;
                        notifications.forEach(element => {
                            var notificationData = {
                                title: element.data.title,
                                body: element.data.body,
                            };

                            toastr.error(notificationData.body, notificationData.title, {
                                progressBar: true,
                                timeOut: 10000,
                                extendedTimeOut: 1000,
                                positionClass: "toast-top-left"
                            });
                        });
                    });
            }, 10800);
        });
    </script>

    <script>
        $(document).ready(function() {
            setInterval(() => {
                axios.get('/cms/getUnReadTrainerNotifications')
                    .then(function(response) {
                        let notifications = response.data.notifications;
                        notifications.forEach(element => {
                            var notificationData = {
                                title: element.data.title,
                                body: element.data.body,
                            };

                            toastr.error(notificationData.body, notificationData.title, {
                                progressBar: true,
                                timeOut: 10000,
                                extendedTimeOut: 1000,
                                positionClass: "toast-top-left"
                            });
                        });
                    });
            }, 300);
        });
    </script>





    @yield('scripts')
    @stack('script')

</body>

</html>
