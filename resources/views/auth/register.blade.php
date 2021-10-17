<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/index.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

</head>

<body>

    <div class="page-container">
        <div class="second-half" style="background-image: url({{ asset('img/3.jpg') }}); background-size: cover;
    background-repeat: no-repeat;
    object-fit: contain;">
            <div></div>
        </div>
        <div class="first-half">
            <div class="logo-sec">
                <h1>Sound</h1>
                <div><i class="fas fa-music"></i></div>
            </div>
            <div class="form-to-enter">
                <h2>Register Now</h2>
                <form action="{{ route('register.post') }}" method="POST">
                    @csrf
                    <input type="text" name="name" id="" class="form-control" placeholder="Full Name">
                    @error('name')
                    <small>{{ $message }}</small>
                    @enderror
                    <input type="text" name="email" id="" class="form-control" placeholder="Email">
                    @error('email')
                    <small>{{ $message }}</small>
                    @enderror
                    @error('userAlreadyExist')
                    <small>{{ $message }}</small>
                    @enderror
                    <input type="password" name="password" id="" class="form-control" placeholder="Password">
                    @error('password')
                    <small>{{ $message }}</small>
                    @enderror
                    <input type="password" name="confirmpassword" id="" class="form-control" placeholder="Confirm Password">
                    @error('confirmpassword')
                    <small>{{ $message }}</small>
                    @enderror
                    @error('passwordNotMatch')
                    <small>{{ $message }}</small>
                    @enderror
                    <input type="text" name="phone" id="" class="form-control" placeholder="Phone Number">
                    @error('phone')
                    <small>{{ $message }}</small>
                    @enderror
                    <p><a href="{{ route('login') }}">Already have an Account ? Click here</a></p>
                    <button type="submit" class="form-control">Register</button>
                </form>
            </div>
        </div>

    </div>
</body>

</html>