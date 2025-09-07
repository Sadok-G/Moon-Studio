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

                    <nav class="navbar navbar-expand-lg navbar-light">
                        <div class="container-fluid">
                            <div class="logo-box">
                                <figure class="logo"><a href="{{ route('home') }}"><img
                                            src="{{ asset('images/moon-logo.png') }}" alt="Logo"
                                            style="width: 70px; height: 70px "></a></figure>
                            </div>

                            <!-- Logo mobile / marque -->
                            <a class="navbar-brand d-lg-none" href="#">Moon Studio</a>

                            <!-- Hamburger -->
                            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                                data-bs-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false"
                                aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>

                            <!-- Contenu du menu -->
                            <div class="collapse navbar-collapse justify-content-end" id="navbarContent">
                                <div class="btn-box d-flex align-items-center gap-4 flex-lg-row flex-column">

                                    <!-- Boutons -->
                                    @guest
                                        <a class="theme-btn-one" href="{{ route('login') }}">Login</a>
                                        <a class="theme-btn-one" href="{{ route('register') }}">Sign up</a>
                                    @endguest
                                    @auth
                                        <a class="theme-btn-one" href="{{ route('ads.add') }}"><i class="icon-1"></i>
                                            Create Ads</a>
                                    @endauth

                                    <!-- User dropdown -->
                                    @auth
                                        <div class="dropdown user-menu">
                                            <a href="#" class="d-flex align-items-center text-decoration-none"
                                                id="adminMenu" data-bs-toggle="dropdown" aria-expanded="false">
                                                <img src="{{ asset('images/admin_logo.png') }}" alt="Admin"
                                                    class="user-avatar zoom-effect" />
                                            </a>
                                            <ul class="dropdown-menu dropdown-menu-end text-small"
                                                aria-labelledby="adminMenu">
                                                <li>
                                                    <h6 class="dropdown-header">Logged in
                                                        as<br><strong>{{ Auth::user()->name }}</strong></h6>
                                                </li>
                                                <li>
                                                    <hr class="dropdown-divider">
                                                </li>
                                                <li><a class="dropdown-item"
                                                        href="{{ route('users.show', Auth::id()) }}"><i
                                                            class="bi bi-person me-2"></i> My Profile</a></li>
                                                <li><a class="dropdown-item" href=""><i class="bi bi-gear me-2"></i>
                                                        My Ads</a></li>
                                                <li>
                                                    <hr class="dropdown-divider">
                                                </li>
                                                <li>
                                                    <form action="{{ route('logout') }}" method="POST">
                                                        @csrf
                                                        <button class="dropdown-item text-danger"><i
                                                                class="bi bi-box-arrow-right me-2"></i> Log out</button>
                                                    </form>
                                                </li>

                                            </ul>
                                        </div>
                                    @endauth

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
            <video alt="Banner" autoplay muted class="banner-image" loop>
                <source src={{ asset('images/background/ads.mp4') }} type="video/mp4">
            </video>
            <div class="auto-container">
                <div class="row clearfix">
                    <div class="col-lg-10 col-md-12 col-sm-12 offset-lg-1 content-column">
                        <div class="content-box">
                            <h1>Buy, Sell, Rent & Exchange <br />in one Click</h1>
                            <!-- Bouton filtre pour mobile -->
                            <div class="d-lg-none mb-3">
                                <button class="btn filter-btn w-100" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#mobileFilterForm" aria-expanded="false"
                                    aria-controls="mobileFilterForm">
                                    Filter
                                </button>
                            </div>

                            <!-- Formulaire -->
                            <div class="collapse d-lg-block" id="mobileFilterForm">
                                <div class="form-inner">
                                    <form action="{{ route('home') }}" method="GET">
                                        @csrf
                                        <div class="input-inner clearfix d-flex flex-wrap gap-3 align-items-end">

                                            <!-- Search Keyword -->
                                            <div class="form-group flex-grow-1">
                                                <i class="icon-2"></i>
                                                <input type="search" name="name" placeholder="Search Keyword..."
                                                    value="{{ request('name') }}">
                                            </div>

                                            <!-- Location -->
                                            <div class="form-group">
                                                <i class="icon-3"></i>
                                                <select name="location" class="wide">
                                                    <option value="">Select Location</option>
                                                    @foreach ($allAds as $ad)
                                                        <option value="{{ $ad->location }}">
                                                            {{ $ad->location }}
                                                        </option>
                                                    @endforeach

                                                </select>
                                            </div>

                                            <!-- Category -->
                                            <div class="form-group">
                                                <i class="icon-4"></i>
                                                <select name="category" class="wide">
                                                    <option value="">Select Category</option>
                                                    @foreach ($allAds as $ad)
                                                        <option value="{{ $ad->category_id }}">
                                                            {{ $ad->category->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>


                                            <!-- Price Range -->
                                            {{-- <div class="form-group price-range-group">
                                                <label for="priceRange">Price Range:</label>
                                                <input type="range" id="priceRange" name="price" min="0"
                                                    max="1000" step="10" value="">
                                                <span id="priceValue">${{ request('price') }}</span>
                                            </div> --}}

                                            <!-- Search Button -->
                                            <div class="btn-box">
                                                <button type="submit"><i class="icon-2"></i> Search</button>
                                            </div>
                                        </div>
                                    </form>

                                    <script>
                                        const priceRange = document.getElementById('priceRange');
                                        const priceValue = document.getElementById('priceValue');

                                        priceRange.addEventListener('input', function() {
                                            priceValue.textContent = '$' + priceRange.value;
                                        });
                                    </script>
                                </div>
                            </div>


                            <!-- Script pour mettre à jour la valeur du range -->
                            <script>
                                const priceRange = document.getElementById('priceRange');
                                const priceValue = document.getElementById('priceValue');

                                priceRange.addEventListener('input', function() {
                                    priceValue.textContent = '$' + this.value;
                                });
                            </script>

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
