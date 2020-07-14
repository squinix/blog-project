@extends('layouts.app')

@section('title', 'Blog')

@section('stylesheets')
    <link href="{{ asset('css/select2.min.css') }}" rel="stylesheet">
@endsection

@section('content')

    <div class="row m-5">
        <div class="col text-center text-uppercase" style="background: url('https://colorlib.com/preview/theme/sunzine/img/page-banner.jpg');">
            <h1 class="m-5 p-5 text-white" style="font-weight: 900;">
                Blog
            </h1>
        </div>
    </div>
    
    <div class="container">
        <div class="mb-5 border">
            <div class="row">
                <div class="col">
                    <nav class="navbar-expand-md navbar-light bg-white pl-4 pb-2" style="padding-top: 0!important;">
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <!-- Left Side Of Navbar -->
                            <ul class="navbar-nav mr-auto">
                                <li class="nav-item">
                                    <span id="show_categories" class="nav-link filter_categories">Kategorie {{ (request()->has('categories')) ? '(1)' : '' }}</span>
                                </li>
                                <li class="nav-item">
                                    <span id="show_tags" class="nav-link">Tagy {{ (request()->has('tags')) ? '(1)' : '' }}</span>
                                </li>
                                <li class="nav-item">
                                    <span id="show_sort" class="nav-link">Seřadit podle {{ (request()->has('sort')) ? '(1)' : '' }}</span>
                                </li>
                            </ul>

                            <!-- Right Side Of Navbar -->
                            <ul class="navbar-nav ml-auto d-flex align-items-center">
                                <li class="nav-item">
                                    <span id="show_filter" class="nav-link">Filtry</span>
                                </li>
                                <li class="nav-item">
                                    <span id="show_filter" class="nav-link">/</span>
                                </li>
                                <li class="nav-item">
                                    <a href="/blog">
                                        <span id="show_filter" class="nav-link">Zrušit filtry</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
            <div class="row filters" id="filter_categories" style="display: none;">
                <div class="col mr-4 pb-3 ml-4">
                    <hr class="hr">
                    @if (count($categories) > 0)
                        @foreach ($categories as $category)
                            <a class="pr-3 nav-item text-uppercase {{ (request('categories') == $category->id) ? 'active_filter' : '' }}" style="font-size: 12px;font-weight: 600;color: #B7B7B7;" href="{{ route('blog.index', ['tags' => request('tags'), 'sort' => request('sort'), 'categories' => $category->id]) }}">
                                {{ $category->title }}
                            </a>
                        @endforeach    
                    @else
                        Žádné kategorie nebyly zatím přidány.
                    @endif
                </div>
            </div>
            <div class="row filters" id="filter_tags" style="display: none;">
                <div class="col mr-4 pb-3 ml-4">
                    <hr class="hr">
                    @if (count($tags) > 0)
                        @foreach ($tags as $tag)
                            <a class="pr-3 nav-item text-uppercase {{ (request('tags') == $tag->id) ? 'active_filter' : '' }}" style="font-size: 12px;font-weight: 600;color: #B7B7B7;" href="{{ route('blog.index', ['categories' => request('categories'), 'sort' => request('sort'), 'tags' => $tag->id]) }}">
                                {{ $tag->title }}
                            </a>
                        @endforeach    
                    @else
                        Žádné tagy nebyly zatím přidány.
                    @endif
                </div>
            </div>
            <div class="row filters" id="filter_sort" style="display: none;">
                <div class="col mr-4 pb-3 ml-4">
                    <hr class="hr">
                    <a class="pr-3 nav-item text-uppercase {{ (request('sort') == 'desc') ? 'active_filter' : '' }}" style="font-size: 12px;font-weight: 600;color: #B7B7B7;" href="{{ route('blog.index', ['categories' => request('categories'), 'tags' => request('tags'), 'sort' => 'desc']) }}">
                        Nejnovější
                    </a>
                    <a class="pr-3 nav-item text-uppercase {{ (request('sort') == 'asc') ? 'active_filter' : '' }}" style="font-size: 12px;font-weight: 600;color: #B7B7B7;" href="{{ route('blog.index', ['categories' => request('categories'), 'tags' => request('tags'), 'sort' => 'asc']) }}">
                        Nejstarší
                    </a>
                </div>
            </div>
        </div>
            
        @foreach ($posts as $post)
            <div class="row m-3">
                <div class="col-4">
                    <img src="/storage/{{ $post->thumbnail }}" alt="{{ $post->title }}" width="275px">
                </div>
                <div class="col-8">
                    <p>
                        <small style="font-size: 13px;font-weight: 500;">
                            @foreach ($post->categories as $key => $cat)
                                <a href="?categories={{ $cat->id }}">
                                    <span style="color: #0ECE91;">
                                        {{ $cat->title }}
                                    </span>
                                </a>
                                @if ($loop->last)
                                    
                                @else
                                    <span class="text-dark">
                                        /
                                    </span>    
                                @endif
                            @endforeach
                        </small>
                    </p>
                    <a href="{{ route('blog.show', ['post' => $post]) }}">
                        <h2 class="text-uppercase text-dark" style="font-weight: 900;">
                            {{ $post->title }}
                        </h2>
                    </a> 
                    <p>
                        <small class="text-muted">
                            {{ $post->updated_at->format('d.m.Y H:i:s') }}
                        </small>
                    </p>
                    <p>
                        {!! substr(strip_tags($post->content), 0, 150) !!}{{ strlen(strip_tags($post->content)) > 150 ? "..." : "" }}    
                    </p>
                </div>
            </div>
            <hr class="hr m-4">
        @endforeach
        <div class="row m-4">
            <div class="col d-flex justify-content-center">
                {{ $posts->links() }}
            </div>
        </div>
    </div>
    
@endsection

@section('scripts')
    <script src="{{ asset('js/select2.min.js') }}"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('.tags_filter').select2();
            $('.categories_filter').select2();

            $('#show_categories').click(function() {
                $('#filter_categories').show('slow');
                $('#filter_tags').hide('slow');
                $('#filter_sort').hide('slow');
            });
            $('#show_tags').click(function() {
                $('#filter_categories').hide('slow');
                $('#filter_tags').show('slow');
                $('#filter_sort').hide('slow');
            });  
            $('#show_sort').click(function() {
                $('#filter_categories').hide('slow');
                $('#filter_tags').hide('slow');
                $('#filter_sort').show('slow');
            });
            $('#show_filter').click(function() {
                $('.filters').hide('slow');
            });  
        });
    </script>
@endsection