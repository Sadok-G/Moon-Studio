<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

    <title>Moon</title>

    <!-- Fav Icon -->
    <link rel="icon" href={{ asset('images/favicon.ico') }} type="image/x-icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,300;0,400;0,600;0,700;0,800;0,900;1,300;1,400;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
        <script src="{{ asset('https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js') }}"></script>
        <script src="{{ asset('https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js') }}"></script>

    <!-- Stylesheets -->
    <link href={{ asset('css/font-awesome-all.css') }} rel="stylesheet">
    <link href={{ asset('css/flaticon.css') }} rel="stylesheet">
    <link href={{ asset('css/owl.css') }} rel="stylesheet">
    <link href={{ asset('css/bootstrap.css') }} rel="stylesheet">
    <link href={{ asset('css/jquery.fancybox.min.css') }} rel="stylesheet">
    <link href={{ asset('css/animate.css') }} rel="stylesheet">
    <link href={{ asset('css/nice-select.css') }} rel="stylesheet">
    <link href={{ asset('css/color.css') }} rel="stylesheet">
    <link href={{ asset('css/style.css') }} rel="stylesheet">
    <link href={{ asset('css/responsive.css') }} rel="stylesheet">

</head>


<!-- page wrapper -->

<body>

    <div class="boxed_wrapper">


        <!-- preloader -->
        <div class="preloader"></div>
        <!-- preloader -->


    <header class="main-header">

    <div class="header-lower">
        <div class="auto-container">

            <div class="logo-box">
                <figure class="logo"><a href="#"><img src="#" alt="Logo"></a></figure>
            </div>

            <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container-fluid">

                <!-- Logo mobile / marque -->
                <a class="navbar-brand d-lg-none" href="#">MySite</a>

                <!-- Hamburger -->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent"
                        aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!-- Contenu du menu -->
                <div class="collapse navbar-collapse justify-content-end" id="navbarContent">
                    <div class="btn-box d-flex align-items-center gap-4 flex-lg-row flex-column">

                    <!-- Boutons -->
                    <a class="theme-btn-one" href="{{route('login')}}">Login</a>
                    <a class="theme-btn-one" href="{{route('register')}}">Sign up</a>
                    <a class="theme-btn-one" href="#"><i class="icon-1"></i> Submit Ads</a>

                    <!-- Admin dropdown -->
                    <div class="dropdown user-menu">
                        <a href="#" class="d-flex align-items-center text-decoration-none" id="adminMenu"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="../../../storage/app/public/img/admin_logo.png' )}}alt="Admin" class="user-avatar zoom-effect"/>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end text-small" aria-labelledby="adminMenu">
                        <li><h6 class="dropdown-header">Logged in as<br><strong>{{Auth::user()->name}}</strong></h6></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="{{route('users.show', Auth::id())}}"><i class="bi bi-person me-2"></i> My Profile</a></li>
                        <li><a class="dropdown-item" href=""><i class="bi bi-gear me-2"></i> My Ads</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item text-danger" href="{{route('logout')}}"><i class="bi bi-box-arrow-right me-2"></i> Log out</a></li>
                        </ul>
                    </div>

                </div>
                </div>

            </div>
            </nav>

        </div>
    </div>
    </header>

        <!-- main-header end -->
                <!-- banner-section -->
        <section class="banner-section centred">
            <video src={{ asset('images/background/ads.mp4')}} alt="Banner" autoplay class="banner-image" ></video>
            <div class="auto-container">
                <div class="row clearfix">
                    <div class="col-lg-10 col-md-12 col-sm-12 offset-lg-1 content-column">
                        <div class="content-box">
                            
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- banner-section end -->

         <!-- Ads section-->
        @yield('ad_section')

        <!-- main-footer -->
        <footer class="main-footer">
            <div class="footer-bottom">
                <div class="auto-container">
                    <div class="footer-inner clearfix">
                        <div class="copyright pull-left">
                            <p><a href="#">Moon Studio</a> &copy; 2025 All Right Reserved</p>
                        </div>
                        <ul class="footer-nav pull-right clearfix">
                            <li><a href="#">Terms of Service</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </footer>
        <!-- main-footer end -->



        <!--Scroll to top-->
        <!-- <button class="scroll-top scroll-to-target" data-target="html">
            <span class="far fa-long-arrow-up"></span>
        </button> -->
    </div>


    <!-- jequery plugins -->
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/owl.js') }}"></script>
    <script src="{{ asset('js/wow.js') }}"></script>
    <script src="{{ asset('js/validation.js') }}"></script>
    <script src="{{ asset('js/jquery.fancybox.js') }}"></script>
    <script src="{{ asset('js/appear.js') }}"></script>
    <script src="{{ asset('js/scrollbar.js') }}"></script>
    <script src="{{ asset('js/jquery.nice-select.min.js') }}"></script>

    <!-- main-js -->
    <script src="{{ asset('js/script.js') }}"></script>

</body><!-- End of .page_wrapper -->

</html>
