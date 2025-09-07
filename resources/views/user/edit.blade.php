<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modify Ads</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet" />
    <link rel="stylesheet" href={{ asset('css/create_ads.css') }} />
</head>

<body>

    <div class="flex-grow-1">
        <div class="page-wrap flex-grow-1 d-flex flex-column">
            <header class="flex-grow-1">
                <div class="topbar-custom">
                    <div class="container-fluid">
                        <div class="d-flex justify-content-between">
                            <ul class="list-unstyled topnav-menu mb-0 d-flex align-items-center">
                                <li class="moon-logo-space">
                                    <a href="{{ route('home') }}"><img src="{{ asset('images/moon-logo.png') }}"
                                            alt="Moon Studio Logo" width="55" height="auto"></a>

                                </li>
                            </ul>

                            <ul class="list-unstyled topnav-menu mb-0 d-flex align-items-center">
                                <li class="d-none d-lg-block me-3">
                                    <h5 class="mb-0">{{ Auth::user()->name }}</h5>
                                </li>

                                <li class="d-none d-lg-block">
                                    <a class="add-ads btn btn-sm d-lg-inline-flex d-none zoom-effect"
                                        href="{{ route('ads.add') }}"><i class="bi bi-plus-lg me-1"></i> Submit
                                        Ads</a>
                                </li>

                                <li class="d-none d-sm-flex">
                                    <button type="button" class="btn nav-link" data-toggle="fullscreen">
                                        <i data-feather="maximize" class="align-middle fullscreen noti-icon"></i>
                                    </button>
                                </li>

                                <li class="dropdown notification-list topbar-dropdown">
                                    <a class="nav-link nav-user me-0" data-bs-toggle="dropdown" href="#"
                                        role="button" aria-haspopup="false" aria-expanded="false">
                                        <img src="{{ asset(Auth::user()->profile_image ?? 'images/ads_image/no-pic.jpeg') }}"
                                            alt="user-image" width="40" height="40"
                                            class="rounded-circle me-2 zoom-effect">
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-end text-small" aria-labelledby="adminMenu">
                                        <li>
                                            <h6 class="dropdown-header">
                                                Log in as<br /><strong>Admin</strong>
                                            </h6>
                                        </li>
                                        <li>
                                            <hr class="dropdown-divider" />
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="#">
                                                <i class="bi bi-person me-2"></i> My Ads
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="#">
                                                <i class="bi bi-gear me-2"></i> My Profile
                                            </a>
                                        </li>
                                        <li>
                                            <hr class="dropdown-divider" />
                                        </li>
                                        <li>
                                            <a class="dropdown-item text-danger" href="#">
                                                <i class="bi bi-box-arrow-right me-2"></i> Log out
                                            </a>
                                        </li>
                                    </ul>
                                </li>

                            </ul>
                        </div>

                    </div>

                    <section class="back-bar">
                        <div class="container py-3">
                            <div class="d-flex align-items-center gap-3">
                                <a href="{{ url()->previous() }}" class="btn btn-outline-secondary btn-sm"><i
                                        class="bi bi-arrow-left"></i> Back</a>
                                <h1 class="h5 mb-0">Modify Ads</h1>
                                <div class="ms-auto">
                                    <a href="#" class="btn btn-outline-secondary btn-sm">My ads</a>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>


            </header>
        </div>
    </div>



    <div class="max-w-lg mx-auto p-6 bg-white rounded-lg shadow-sm">

        @if (session('success'))
            <div class="bg-green-100 border border-green-300 text-green-700 px-3 py-4 rounded-md relative"
                role="alert">
                <strong class="foont-bold">Success!</strong>
                <span class="block sm:inline">
                    {{ session('success') }}
                </span>
            </div>
        @endif

        <main class="container py-4">

            <form class="mt-8 row g-4" action="{{ route('users.update', Auth::id()) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="col-12 col-lg-8">
                    <div class="card-lite p-3 p-md-4 rounded-2">
                        <div class="row g-3">
                            <div class="col-12">
                                <label for="name" class="block mb-2 font-bold text-gray-700"
                                    name="name">Name</label>
                                <input id="name" type="text"
                                    class="w-full border-1 border-gray-300 outline-none rounded-lg shadow-sm p-3"
                                    name="name" placeholder="Enter your Username" value="{{ $user->name}}">
                                @error('name')
                                    <span class="text-danger small">{{ $message }}</span>
                                @enderror


                            </div>
                            <div class="col-12 col-md-6">
                                <label for="email" class="block mb-2 font-bold text-gray-700"
                                    name="name">Email</label>
                                <input id="email" type="text"
                                    class="w-full border-1 border-gray-300 outline-none rounded-lg shadow-sm p-3"
                                    name="email" placeholder="Enter your mail" value="{{ $user->email}}">
                                @error('email')
                                    <span class="text-danger small">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-12 col-md-6">
                                <label for="phone_number" class="block mb-2 font-bold text-gray-700"
                                    name="name">Phone
                                    Number</label>
                                <input id="phone_number" type="tel"
                                    class="w-full border-1 border-gray-300 outline-none rounded-lg shadow-sm p-3"
                                    name="phone_number" placeholder="Enter your phone number"
                                    value="{{ $user->phone_number }}">
                                @error('phone_number')
                                    <span class="text-danger small">{{ $message }}</span>
                                @enderror
                            </div>



                        </div>


                    </div>

                    <div class="col-6 d-flex justify-content-start gap-2  mt-3">
                        <button type="submit" class="btn btn-success zoom-effect">
                            <i class="bi bi-check2-circle me-2"></i>Modify Ads
                        </button>
                        <a href="#" class="btn btn-outline-danger">Cancel</a>
                    </div>

                </div>


    </div>


    </form>


    @if (isset($message))
        <p>{{ $message }}</p>
    @endif
    </div>
    </main>

</body>

</html>
