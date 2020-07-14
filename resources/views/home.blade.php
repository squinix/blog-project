@extends('layouts.app')

@section('content')

<div class="row m-5">
    <div class="col p-4 text-center text-uppercase" style="background: url('https://colorlib.com/preview/theme/sunzine/img/page-banner.jpg');">
        <div class="m-5 text-white">
            <h1 style="font-weight: 900;">
                Blog Post
            </h1>
            <h6 style="font-weight: 100;">
                <a href="/" class="text-white">{{ config('app.name', 'Laravel') }}</a>
                /
                <span style="color: #0ECE91!important;">
                    {{ Auth::user()->name }}
                </span>
            </h6>
        </div>
        
    </div>
</div>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1 class="text-uppercase text-center pt-5" style="font-weight: 900;">
                Upcoming Content
            </h1>
        </div>
    </div>
</div>
@endsection
