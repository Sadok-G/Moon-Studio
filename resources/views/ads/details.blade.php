<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modify Ads</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet" />
    <link rel="stylesheet" href={{ asset('css/ad_details.css') }} />
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


<body>
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
                                        <ul class="dropdown-menu dropdown-menu-end text-small" aria-labelledby="adminMenu">
                                            <li>
                                                <h6 class="dropdown-header">Logged in
                                                    as<br><strong>{{ Auth::user()->name }}</strong></h6>
                                            </li>
                                            <li>
                                                <hr class="dropdown-divider">
                                            </li>
                                            <li><a class="dropdown-item" href="{{ route('users.show', Auth::id()) }}"><i
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


    <main>
        <!-- Page Title -->
        <section class="page-title-2" style="background-image: url(#);">
            <div class="row auto-container">
                <div class="content-box">
                    <h1>{{ $ad->title }}</h1>
                    <span class="category"><i class="fas fa-tags"></i>{{ $ad->category->name }}</span>
                    <span class="category"><i class="fas fa-tags"></i>By <strong>{{ $ad->user->name }}</strong></span>
                </div>
                <div class="info-box clearfix d-lg-flex d-none">
                    <div class="left-column pull-left clearfix">
                        <h4><i class="icon-18"></i></h4>
                        <span class="sell">For sell</span>
                        <h5><span>Start From:</span>{{ $ad->ads_price }}</h5>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Page Title -->
        <!-- browse-add-details -->
        <section class="browse-add-details bg-color-2">

            <div class="auto-container">

                <div class="row clearfix">


                    <div class="content-two single-box">

                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 content-side">
                        <div class="add-details-content">
                            <div class=" col-5 d-lg-flex d-none content-one single-box">
                                <div>
                                    <img src="{{ asset($ad->ads_image) }}" alt="ads-image">
                                </div>
                            </div>
                            <div class="content-four single-box">
                                <div class="text">
                                    <h3>Details</h3>
                                </div>
                                <ul class="info-box clearfix">
                                    <li><span>Caterory :</span> {{ $ad->category_id }}</li>
                                    <li><span>Location :</span> {{ $ad->location }}</li>
                                </ul>
                            </div>
                            <div class="content-one single-box">
                                <div class="text">
                                    <h3>Ad Description</h3>
                                    <p>{{ $ad->ads_description }}</p>
                                </div>
                            </div>

                        </div>

                        <div class="content-four single-box d-flex justify-content-end">
                            <a href="{{ route('ads.edit', $ad->id) }}"
                                class="btn btn-outline-secondary zoom-effect me-2">Modify</a>
                            <form action="{{ route('ads.destroy', $ad->id) }}" method="POST">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-outline-danger zoom-effect me-2">Delete</button>
                            </form>
                        </div>


                    </div>

                </div>
            </div>
        </section>
        <!-- browse-add-details end -->

    </main>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
