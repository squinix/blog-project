@extends('layouts.app')

@section('title', 'Details for ' . $post->title)

@section('content')

    <div class="row m-5">
        <div class="col p-4 text-center text-uppercase" style="background: url('https://colorlib.com/preview/theme/sunzine/img/page-banner.jpg');">
            <div class="m-5 text-white">
                <h1 style="font-weight: 900;">
                    Detail článku
                </h1>
                <h6 style="font-weight: 100;">
                    <a href="/" class="text-white">{{ config('app.name', 'Laravel') }}</a>
                    /
                    <a href="/blog" class="text-white">Blog </a>
                    /
                    <span style="color: #0ECE91!important;">
                        {{ $post->title }}
                    </span>
                </h6>
            </div>
            
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <h6 class="text-uppercase" style="font-weight: 500;">
                    @foreach ($post->categories as $category)
                        <a href="{{ route('blog.index', ['tags' => request('tags'), 'sort' => request('sort'), 'categories' => $category->id]) }}" style="color: #0ECE91!important;">
                            {{ $category->title }}
                        </a>
                        @if ($loop->last)

                        @else
                            <span class="text-dark">
                                /
                            </span>    
                        @endif
                    @endforeach
                </h6>
                <h1 class="text-uppercase mt-4" style="font-weight: 900;">
                    {{ $post->title }}
                </h1>
                <h6 class="text-muted">
                    {{ $post->updated_at->format('d.m.Y H:i:s') }}
                </h6>

                <div class="row mt-5">
                    <div class="col">
                        @if (session()->has('message'))
                            <div class="alert alert-success" role="alert">
                                <strong>Děkujeme.</strong> Váš komentář byl úspěšně přidán.
                            </div>
                        @endif
                    </div>
                </div>

                <div class="row mt-5">
                    <div class="col">
                        <p class="text-justify">
                            {!! $post->content !!}
                        </p>
                    </div>
                </div>

                <div class="row mt-5">
                    <div class="col pb-5">
                        @foreach ($post->tags as $tag)
                            <a href="/blog?tags={{ $tag->id }}" class="pl-3 pr-3 pt-2 pb-2 text-uppercase" style="background-color: #F3F3F3!important;font-size: 13px;color: #707070;">
                                {{ $tag->title }}
                            </a>
                        @endforeach
                    </div>
                </div>

                {{-- <div class="row">
                    <div class="col">
                        <p>
                            Id: {{ $post->id }} <br>
                            Title: {{ $post->title }} <br>
                            Text:  <br>
                            Categories: @foreach ($post->categories as $category)
                                {{ $category->title }}
                            @endforeach <br>
                            Tags: 
                            Blog Post by {{ $post->user->name }}
                        </p>
                    </div>
                </div> --}}

                <div class="row mt-5">
                    <div class="col">
                        @if (count($post->postComments) > 0)
                            <h4 class="text-uppercase" style="font-weight: 600;">
                                Komentáře ({{ count($post->postComments) }})
                            </h4>
                        @else
                            <h4 class="text-uppercase" style="font-weight: 600;">
                                Zatím nebyli přidány žádné komentáře.
                            </h4>
                        @endif
                    </div>
                </div>

                <div class="row mt-5">
                    <div class="col">
                        @foreach ($post->postComments as $comment)
                            <div class="pb-4">
                                <h5 class="text-uppercase" style="font-weight: 800;">
                                    {{ $comment->title }}
                                </h5>
                                <p>
                                    <small class="text-muted">
                                        {{ $comment->email }}
                                    </small> <br>
                                    {{ $comment->content }}
                                </p>    
                            </div>
                        @endforeach
                    </div>
                </div>

                <hr class="hr">

                <div class="row mt-5">
                    <div class="col">
                        <h4 class="text-uppercase" style="font-weight: 600;">
                            Přidejte komentář
                        </h4>
                    </div>
                </div>

                <div class="row mt-2 mb-5">
                    <div class="col">
                        @if (Auth::user())
                            <form action="{{ route('comments.store', ['post' => $post]) }}" method="POST">
                                @include('blog.form')
                        
                                <div class="d-flex justify-content-end">
                                    <button type="submit" class="button">
                                        Přidat komentář
                                    </button>
                                </div>
                                
                            </form> 
                        @else
                            Pro přidání komentáře musíte být přihlášeni. <a href="/login">Přihlašte se</a>, pokud ještě nemáte účet <a href="/register">zde</a> se můžete registrovat.
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <h6 class="text-uppercase text-body" style="font-weight: 900;">
                    Kategorie
                </h6>
                <ul class="list-group list-group-flush" style="">
                    @if (count($categories) > 0)
                        @foreach ($categories as $category)
                            <li class="list-group-item" style="padding: 10px 0 10px 0;">
                                <a class="text-body text-uppercase" style="font-size: 14px;font-weight: 300;" href="{{ route('blog.index', ['tags' => request('tags'), 'sort' => request('sort'), 'categories' => $category->id]) }}">
                                    {{ $category->title }}
                                </a>    
                            </li>
                        @endforeach    
                    @else
                        <li class="list-group-item">
                            Žádné kategorie nebyly zatím přidány.
                        </li>
                    @endif
                </ul>
                
                <h6 class="text-uppercase text-body mt-5" style="font-weight: 900;">
                    Poslední příspěvky
                </h6>
                <div class="mt-4 pb-4">
                    @foreach ($posts as $post)
                        @if ($loop->index < 3)
                            <div class="row">
                                <div class="col-md-auto">
                                    <img src="/storage/{{ $post->thumbnail }}" alt="{{ $post->title }}" width="60px">
                                </div>
                                <div class="col-md-auto">
                                    <a href="blog/{{ $post->id }}" class="text-body text-uppercase" style="font-size: 14px;font-weight: 300;">
                                        {{ $post->title }}
                                    </a>
                                    <br>
                                    <small class="text-body" style="font-size: 8px;">
                                        {{ $post->updated_at->format('d.m.Y') }}
                                    </small>
                                </div>
                            </div>
                            @if ($loop->index < 2)
                                <hr>
                            @endif   
                        @endif
                    @endforeach
                </div>

                <h6 class="text-uppercase text-body mt-5" style="font-weight: 900;">
                    Tagy
                </h6>
                <div class="mt-4">
                    @foreach ($tags as $tag)
                        <button class="btn m-0 p-0 pb-3">
                            <a href="/blog?tags={{ $tag->id }}" class="pl-3 pr-3 pt-2 pb-2 text-uppercase" style="background-color: #F3F3F3!important;font-size: 13px;color: #707070;">
                                {{ $tag->title }}
                            </a>
                        </button>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    
@endsection