<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="{{ asset('https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js') }}"></script>
    <script src="{{ asset('https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js') }}"></script>
    <link href={{ asset('css/login.css') }} rel="stylesheet">
    <title>Register</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-5 mx-auto">

                <div class="myform form">

                        <div class="logo mb-3">
                                <div class="col-md-12 text-center">
                                    <h1>Create Account</h1>
                                </div>
                        </div>

                        @if (session('success'))
                            <div class="alert alert-success rounded-3 border-0 shadow-sm mb-4" role="alert">
                                <strong class="fw-bold">Success!</strong>
                                <span class="d-block d-sm-inline">
                                    {{ session('success') }}
                                </span>
                            </div>
                        @endif

                        <form class="mt-8" action="{{ route('register.submit') }}" method="POST">
                            @csrf
                            <div class="form-group ">
                                <label for="name"
                                    name="name">Name</label>
                                <input id="name" type="text" class="form-control"
                                    name="name" placeholder="Enter your Username">
                                @error('name')
                                    <span class="text-danger fw-medium">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="email"
                                    name="name">Email</label>
                                <input id="email" type="text" class="form-control" name="email"
                                    placeholder="Enter your mail" class="form-control ">
                                @error('email')
                                    <span class="class="text-danger fw-medium"">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="phone_number"
                                    name="name">Phone Number</label>
                                <input id="phone_number" type="tel" class="form-control" name="phone_number"
                                    placeholder="Enter your phone number"
                                    >
                                @error('phone_number')
                                    <span class="text-danger fw-medium">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="password"
                                    for="email">Password</label>
                                <input class="form-control " id="password" type="password"
                                   name="password"
                                    placeholder="Enter your password" value="{{ old('password') }}" autocomplete="off">
                                @error('password')
                                    <span class="text-danger fw-medium">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="password_confirmation"
                                    for="email">Password
                                    Confirmation</label>
                                <input class="form-control  " id="password_confirmation"
                                    type="password" name="password_confirmation"
                                    placeholder="Confirm your password" autocomplete="off">
                            </div>

                            <div class="col-md-12 text-center t-2">
                                <button type="submit" class="theme-btn-one">Register</button>
                            </div>

                            <p class="p-3 mt-4 text-center text-gray-700 font-semibold">
                                <a href="{{ route('login') }}">Already have an acount !? <span class="text-blue-400">Login
                                        now</span></a>
                            </p>
                        </form>
                        @if (isset($message))
                            <p>{{ $message }}</p>
                        @endif

                </div>
            </div>
        </div>
    </div>
</body>

</html>
