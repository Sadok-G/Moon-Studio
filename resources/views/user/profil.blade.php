<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modify Ads</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet" />
    <link rel="stylesheet" href={{ asset('css/user_details.css') }} />
    <!-- Fav Icon -->
    <link rel="icon" href="{{ asset('images/moon-logo.png') }}" type="image/x-icon">

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


    <div class="boxed_wrapper">





        <header class="main-header">

            <div class="header-lower">
                <div class="auto-container">

                    <div class="logo-box">
                        <figure><a href="{{route('home')}}"><img src="{{ asset('images/moon-logo.png') }}"
                                    alt="Logo" style="width: 70px; height: 70px "></a></figure>
                    </div>

                    <nav class="navbar navbar-expand-lg navbar-light">
                        <div class="container-fluid">

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

                                    <a class="theme-btn-one" href="#"><i class="icon-1"></i> Submit Ads</a>

                                    <!-- Admin dropdown -->
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
                                            <li><a class="dropdown-item text-danger" href="{{ route('logout') }}"><i
                                                        class="bi bi-box-arrow-right me-2"></i> Log out</a></li>

                                            <form action="{{ route('logout') }}" method="POST">
                                                <button class="dropdown-item text-danger" href=""><i
                                                        class="bi bi-box-arrow-right me-2"></i> Log out</button>
                                            </form>
                                        </ul>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </nav>

                </div>
            </div>
        </header>
        <main>

            <!-- Page Title -->
            <section class="page-title-2" style="background-color: url(#);">
                <div class="row">
                    <h4 class="d-lg-none d-flex"><strong>{{ $user->name }} </strong></h4>
                    <div class="col-3 d-lg-flex d-none auto-container-user ">

                        <div class="info-box clearfix ">
                            <div class="left-column pull-left clearfix">
                                <h4>{{ $user->name }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- End Page Title -->
            <!-- browse-user-details -->
            <section class="browse-add-details bg-color-2">

                <div class="auto-container">

                    <div class="row clearfix">
                        <div class="col-lg-12 col-md-12 col-sm-12 content-side">
                            <div class="add-details-content">
                                <div class=" col-5 content-one single-box">
                                    <div class="w-50 h-50">
                                        <img class="img-fluid rounded-2" src="{{ asset($user->profile_image) }}"
                                            alt="user-image">
                                    </div>
                                </div>
                                <div class="content-four single-box">
                                    <div class="text">
                                        <h3>Details</h3>
                                    </div>
                                    <ul class="info-box clearfix d-flex justify-content-between">
                                        <li class="col-12 col-lg-6"><span>Email : </span> {{ $user->email }}</li>
                                        <li class="col-12 col-lg-6"><span>Phone Number :</span>
                                            {{ $user->phone_number }}
                                        </li>
                                    </ul>

                                </div>

                                <div class="content-four single-box d-flex justify-content-end">
                                    <a href="{{ route('users.edit', Auth::id()) }}"
                                        class="btn btn-outline-secondary zoom-effect me-2">Modify</a>
                                    <form action="{{ route('users.destroy', Auth::id()) }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button type="submit"
                                            class="btn btn-outline-danger zoom-effect me-2">Delete</button>
                                    </form>
                                </div>


                            </div>

                        </div>
                    </div>

                </div>
    </div>
    </section>
    <!-- browse-user-details end -->

    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
