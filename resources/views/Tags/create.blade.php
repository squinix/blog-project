@extends('layouts.app')

@section('title', 'Tags')

@section('content')

<div class="row m-5">
    <div class="col p-4 text-center text-uppercase" style="background: url('https://colorlib.com/preview/theme/sunzine/img/page-banner.jpg');">
        <div class="m-5 text-white">
            <h1 style="font-weight: 900;">
                Post Edit
            </h1>
            <h6 style="font-weight: 100;">
                <a href="/" class="text-white">{{ config('app.name', 'Laravel') }}</a>
                /
                <a href="/home" class="text-white">{{ Auth::user()->name }} </a>
                /
                <a href="/tags" class="text-white">Tags </a>
                /
                <span style="color: #0ECE91!important;">
                    tag Create
                </span>
            </h6>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col">
            <h1 class="text-uppercase" style="font-weight: 900;">
                Tag Create
            </h1>
        </div>
    </div>
    <div class="row">  
        <div class="col">
            <form action="{{ route('tags.store') }}" method="POST">
                @include('tags.form')

                <div class="d-flex justify-content-end">
                    <button type="submit" class="button">
                        Přidat Tag
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection