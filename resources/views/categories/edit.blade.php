@extends('layouts.app')

@section('title', 'Categories')

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
                    <a href="/categories" class="text-white">Categories </a>
                    /
                    <span style="color: #0ECE91!important;">
                        {{ $category->title }}
                    </span>
                </h6>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col">
                <h1 class="text-uppercase" style="font-weight: 900;">
                    Edit {{ $category->title }} Category
                </h1>
            </div>
        </div>
        <div class="row mt-3 mb-5">
            <div class="col">
                <form action=" {{ route('categories.update', ['category' => $category]) }}" method="POST">
                    @method('PATCH')
                    @include('categories.form')

                    <div class="d-flex justify-content-end">
                        <button type="submit" class="button">
                            Save Category
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection