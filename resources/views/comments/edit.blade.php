@extends('layouts.app')

@section('title', 'Comment')

@section('content')

    <div class="row m-5">
        <div class="col p-4 text-center text-uppercase" style="background: url('https://colorlib.com/preview/theme/sunzine/img/page-banner.jpg');">
            <div class="m-5 text-white">
                <h1 style="font-weight: 900;">
                    Comment Edit
                </h1>
                <h6 style="font-weight: 100;">
                    <a href="/" class="text-white">{{ config('app.name', 'Laravel') }}</a>
                    /
                    <a href="/home" class="text-white">{{ Auth::user()->name }} </a>
                    /
                    <a href="/posts" class="text-white">Posts </a>
                    /
                    <a href="/posts/{{ $comment->post->id }}" class="text-white">{{ $comment->post->title }} </a>
                    /
                    <span style="color: #0ECE91!important;">
                        {{ $comment->title }}
                    </span>
                </h6>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col">
                <h1 class="text-uppercase" style="font-weight: 900;">
                    Comment {{ $comment->title }} For {{ $comment->post->title }}
                </h1>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col">
                <form action=" {{ route('comments.update', ['comment' => $comment]) }}" method="POST">
                    @method('PATCH')
                    @include('comments.form')

                    <div class="d-flex justify-content-end">
                        <button type="submit" class="button">
                            Uložit Komentář
                        </button>
                    </div>
                </form>            
            </div>
        </div>
    </div>

@endsection