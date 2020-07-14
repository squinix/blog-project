@extends('layouts.app')

@section('title', 'Details for ' . $tag->title)

@section('content')

    <div class="row m-5">
        <div class="col p-4 text-center text-uppercase" style="background: url('https://colorlib.com/preview/theme/sunzine/img/page-banner.jpg');">
            <div class="m-5 text-white">
                <h1 style="font-weight: 900;">
                    Post Detail
                </h1>
                <h6 style="font-weight: 100;">
                    <a href="/" class="text-white">{{ config('app.name', 'Laravel') }}</a>
                    /
                    <a href="/home" class="text-white">{{ Auth::user()->name }} </a>
                    /
                    <a href="/tags" class="text-white">Tags </a>
                    /
                    <span style="color: #0ECE91!important;">
                        {{ $tag->title }}
                    </span>
                </h6>
            </div>
            
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col">
                @if (session()->has('message'))
                    <div class="alert alert-success" role="alert">
                        <strong>Success</strong> {{ session()->get('message') }}
                    </div>
                @endif
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                <h1 class="text-uppercase" style="font-weight: 900;">
                    {{ $tag->title }}
                </h1>
                <p class="mt-3">
                    <small>
                        Meta Tag:
                    </small><br>
                    <strong>
                        {{ $tag->meta_title }}
                    </strong>
                </p>
                <p>
                    <small>
                        Popis Tag:
                    </small><br>
                    <strong>
                        {{ $tag->content }}
                    </strong>
                </p>
            </div>
            <div class="col-md-4 border">
                <p class="pl-3 pt-4">
                    <strong>
                        Vytvořeno dne
                    </strong>
                </p>
                <p class="pl-3">
                    <small>
                        {{ $tag->created_at }}
                    </small>
                </p>
                <p class="pl-3 pt-4">
                    <strong>
                        Naposledy editáno
                    </strong>
                </p>
                <p class="pl-3">
                    <small>
                        {{ $tag->updated_at }}
                    </small>
                </p>
                <hr class="hr">
                <div class="row">
                    <div class="col d-flex justify-content-end">
                        @can('viewAny', App\Tag::class)
                            <a href="{{ route('tags.edit', ['tag' => $tag]) }}">
                                <button class="btn btn-outline-info mb-3">
                                    Edit
                                </button>
                            </a>
                        @endcan
                    </div>
                    <div class="col d-flex justify-content-start">
                        @can('viewAny', App\Tag::class)
                            <form action="{{ route('tags.destroy', ['tag' => $tag]) }}" method="POST">    
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-outline-danger mb-3" type="submit">
                                    Delete
                                </button>
                            </form>
                        @endcan
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection