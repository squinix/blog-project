@extends('layouts.app')

@section('content')

<div class="row m-5">
    <div class="col p-4 text-center text-uppercase" style="background: url('https://colorlib.com/preview/theme/sunzine/img/page-banner.jpg');">
        <div class="m-5 text-white">
            <h1 style="font-weight: 900;">
                Registrovat se
            </h1>
            <h6 style="font-weight: 100;">
                <a href="/" class="text-white">{{ config('app.name', 'Laravel') }}</a>
                /
                <span style="color: #0ECE91!important;">
                    Registrovat se
                </span>
            </h6>
        </div>
        
    </div>
</div>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="form-group">
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Uživatelské jméno">

                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Váš e-mail">

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Heslo">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Zopakujte heslo">
                </div>

                <div class="form-group mb-0 d-flex justify-content-end">
                    <button type="submit" class="button">
                        Registrovat se
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
