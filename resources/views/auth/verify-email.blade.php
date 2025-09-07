<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify Email</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="{{ asset('https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js') }}"></script>
    <script src="{{ asset('https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js') }}"></script>
    <link href={{ asset('css/login.css') }} rel="stylesheet">
</head>

<body>
    <div class="content">
        <div class="logo mb-3">
            <div class="col-md-12 text-center">
                <h1>A link has been sent to your email...Confirm it to
                activate your account</h1>
            </div>
        </div>

        <form class="mt-8" action="{{ route('verification.send') }}" method="POST">
            @csrf
            <div class="col-md-12 text-center">
            <button class="theme-btn-one" type="submit" href="">Resend verification
                email</button>
            </div>
        </form>
        @if (Session::has('message'))
            {{ Session::get('message') }}
        @endif
    </div>
</body>


</html>
