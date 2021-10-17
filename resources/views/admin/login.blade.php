<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

</head>

<body>
    <section class="ftco-section">
        <div class="container">
            <!-- <div class="row justify-content-center">
                <div class="col-md-6 text-center mb-5">
                    <h2 class="heading-section">Login</h2>
                </div>
            </div> -->
            <div class="row justify-content-center main-body-login">
                <div class="col-md-6 col-lg-5">
                    <div class="login-wrap p-4 p-md-5">
                        <div class="icon d-flex align-items-center justify-content-center">
                            <span class="fa fa-user-o"></span>
                        </div>
                        <h3 class="text-center mb-4">Login</h3>
                        <form action="{{ route('admin.auth') }}" class="login-form" method="POST">
                            @csrf
                            <div class="form-group">
                                <input type="text" name="email" class="form-control rounded-left" placeholder="email" required>
                            </div>
                            @error('email')
                            <small>{{ $message }}</small>
                            @enderror
                            <div class="form-group d-flex">
                                <input type="password" name="password" class="form-control rounded-left" placeholder="Password" required>
                            </div>
                            @error('passwordNotMatch')
                            <small>{{ $message }}</small>
                            @enderror
                            @error('err')
                            <small>{{ $message }}</small>
                            @enderror

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary rounded submit p-3 px-5 form-control">Login</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>