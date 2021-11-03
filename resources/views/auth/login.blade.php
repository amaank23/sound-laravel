@extends('layouts.app')

@section('content')

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
        <div class="form-to-enter" style="height: 80%;">
            <h2>Login Now</h2>
            <form action="{{ route('login.post') }}" method="post">
                @csrf
                <input type="text" name="email" class="form-control" placeholder="Email">
                @error('email')
                <small>{{ $message }}</small>
                @enderror
                @error('notRegistered')
                <small>{{ $message }}</small>
                @enderror
                <input type="password" name="password" class="form-control" placeholder="Password">
                @error('password')
                <small>{{ $message }}</small>
                @enderror
                <p><a href="{{ route('register') }}">Don't have a Account ? Click here to Register</a></p>
                <button class="form-control">Login</button>
            </form>
        </div>
    </div>

</div>
@endsection












































































<!-- <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Login') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Login') }}
                                    </button>

                                    @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                    @endif
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div> -->