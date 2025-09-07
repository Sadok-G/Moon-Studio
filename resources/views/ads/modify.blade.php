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
                                    <a href="{{route('home')}}"><img src="{{ asset('images/moon-logo.png') }}" alt="Moon Studio Logo" width="55"
                                            height="auto"></a>

                                </li>
                            </ul>

                            <ul class="list-unstyled topnav-menu mb-0 d-flex align-items-center">
                                <li class="d-none d-lg-block me-3">
                                    <h5 class="mb-0">{{ Auth::user()->name }}</h5>
                                </li>

                                <li class="d-none d-lg-block">
                                    <a class="add-ads btn btn-sm d-lg-inline-flex d-none zoom-effect"
                                        href="{{ route('ads.create') }}"><i class="bi bi-plus-lg me-1"></i> Submit
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

    <main class="container py-4">
        <form class="row g-4" action="{{ route('ads.update', $ad->id) }}" method="post" enctype="multipart/form-data"
            novalidate>
            @csrf
            @method('PUT')
            <div class="col-12 col-lg-8">
                <div class="card-lite p-3 p-md-4 rounded-2">
                    <div class="row g-3">
                        <div class="col-12">
                            <label class="form-label req" for="name">Title </label>
                            <input type="text" id="name" name="name" value="{{ old('title', $ad->title) }}"
                                class="form-control field-form zoom-effect active" placeholder="Your Ads" required />
                            <div class="form-text">Name display on your ads</div>
                        </div>

                        <div class="col-12 col-md-6">
                            <label class="form-label req" for="category">Category</label>
                            <select id="category_id" name="category_id" class="form-select field-form zoom-effect"
                                required>
                                <option value="" disabled>-- Select a category --</option>
                                <option value="{{ old('category_id') }}" selected disabled>Choose...</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-12 col-md-6">
                            <label class="form-label req" for="price">Price (XOF)</label>
                            <div class="input-group ">
                                <span class="input-group-text"> XOF</span>
                                <input type="number" min="0" step="1000" id="price" name="price"
                                    value="{{ old('ads_price', $ad->ads_price) }}"
                                    class="form-control field-form zoom-effect" placeholder="420000" required />
                            </div>
                        </div>

                        <div class="col-12 col-md-6">
                            <label class="form-label req" for="location">Location </label>
                            <input type="text" id="location" name="location"
                                value="{{ old('location', $ad->location ?? '') }}"
                                class="form-control field-form zoom-effect" placeholder="Cotonou" required />

                        </div>

                        <div class="col-12 col-md-6">
                            <label class="form-label req" for="name">By </label>
                            <input type="text" id="name" value="{{ $ad->user->name ?? '—' }}"
                                name="name" class="form-control field-form zoom-effect" placeholder="Jean-jacques"
                                required disabled />

                        </div>

                        <div class="col-12">
                            <label class="form-label" for="description">Description</label>
                            <textarea id="description" name="description" rows="10" class="form-control field-form zoom-effect"
                                placeholder="Short ads description, key points, compatibilities…">{{ old('ads_description', $ad->ads_description) }}</textarea>
                        </div>

                        <div class="col-6 d-flex justify-content-start gap-2">
                            <button type="submit" class="btn btn-success zoom-effect">
                                <i class="bi bi-check2-circle me-2"></i>Modify Ads
                            </button>
                            <a href="#" class="btn btn-outline-danger">Cancel</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-lg-4">
                <div class="card-lite p-3 p-md-4 mb-4 rounded-2">
                    <h6 class="mb-3">Pictures</h6>
                    <div class="mb-3 text-center">
                        @if ($ad->ads_image)
                            <img class="thumb border rounded-2 bg-white" src="{{ asset($ad->ads_image) }}"
                                alt="Current image" style="max-width:100%; aspect-ratio:1/1; object-fit:cover;" />
                        @else
                            <div class="thumb d-flex align-items-center justify-content-center text-secondary border rounded-2 bg-white"
                                style="aspect-ratio:1/1">
                                <div>
                                    <i class="bi bi-image fs-3 d-block mb-2"></i>
                                    <small>Preview</small>
                                </div>
                            </div>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label class="form-label req" for="image">Main Picture</label>
                        <input type="file" id="ads_image" name="ads_image"
                            class="form-control field-form zoom-effect" accept="image/*" required />
                        <div class="form-text">
                            PNG ou JPG. Ideally 1200×1200, &lt; 2 Mo.
                        </div>
                        @error('ads_image')
                            <div class="text-danger small">{{ $message }}</div>
                        @enderror
                    </div>
                </div>


            </div>
        </form>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
