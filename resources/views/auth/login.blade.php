<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="{{ asset('https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js') }}"></script>
    <script src="{{ asset('https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js') }}"></script>
    <link href={{ asset('css/login.css') }} rel="stylesheet">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-5 mx-auto">
                <div class="myform form ">
                    {{-- Debut La div pour le logo login --}}
                        <div class="logo mb-3">
                            <div class="col-md-12 text-center">
                                <h1>Login</h1>
                            </div>
                        </div>
                    {{-- Fin de la div pour le logo login --}}

                    @if ($errors->any())
                        <div class="bg-red-100 border border-red-300 text-red-700 px-3 py-4 rounded-md relative" role="alert">
                            <strong class="foont-bold">Erreur!</strong>
                            <span class="block sm:inline">
                                {{ $errors->first() }}
                            </span>
                        </div>
                    @endif

                    <form class="mt-8" action="{{ route('login.submit') }}" method="POST">
                        @csrf
                        <div class="form-group ">
                            <label for="email" name="name">Email</label>
                            <input id="email" type="text"
                                class="form-control" name="email"
                                aria-describedby="emailHelp"
                                placeholder="Enter your mail">
                            @error('email')
                                <span class="text-red-300 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password" for="email">Password</label>
                            <input id="password-field" type="password"
                                class="form-control " name="password"
                                placeholder="Enter your password" value="{{ old('password') }}">
                                <span class="fa fa-eye " id="togglePassword"  ></span>
                            @error('password')
                                <span class="text-red-300 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-md-12 text-center">
                            <button type="submit" class=" theme-btn-one">Log in</button>
                        </div>

                        <div class="d-flex">
                            <p >
                                <a  class="col-xs-12" href="{{ route('register') }}">Don't have account? <span class="">Register here
                                </span></a>
                            </p>
                        </div>
                    </form>
                </div>

                @if (isset($message))
                    <p>{{ $message }}</p>
                @endif

        </div>
        </div>
    </div>
</body>

</html>
