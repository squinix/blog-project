@extends('layouts.app')

@section('content')

<div class="row m-5">
    <div class="col p-4 text-center text-uppercase" style="background: url('https://colorlib.com/preview/theme/sunzine/img/page-banner.jpg');">
        <div class="m-5 text-white">
            <h1 style="font-weight: 900;">
                Přihlásit se
            </h1>
            <h6 style="font-weight: 100;">
                <a href="/" class="text-white">{{ config('app.name', 'Laravel') }}</a>
                /
                <span style="color: #0ECE91!important;">
                    Přihlásit se
                </span>
            </h6>
        </div>
        
    </div>
</div>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="form-group">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Uživatelský e-mail">

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Heslo">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                        <label class="form-check-label" for="remember">
                            Pamatuj si mě
                        </label>
                    </div>
                </div>

                <div class="form-group mb-0">
                    <button type="submit" class="button">
                        Přihlásit se
                    </button>

                    @if (Route::has('password.request'))
                        <a class="btn btn-link text-dark" href="{{ route('password.request') }}">
                            Zapomněli jste heslo?
                        </a>
                    @endif
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
