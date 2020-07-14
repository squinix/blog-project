@extends('layouts.app')

@section('title', 'Posts')

@section('content')

    <div class="row m-5">
        <div class="col p-4 text-center text-uppercase" style="background: url('https://colorlib.com/preview/theme/sunzine/img/page-banner.jpg');">
            <div class="m-5 text-white">
                <h1 style="font-weight: 900;">
                    All Posts
                </h1>
                <h6 style="font-weight: 100;">
                    <a href="/" class="text-white">{{ config('app.name', 'Laravel') }}</a>
                    /
                    <a href="/home" class="text-white">{{ Auth::user()->name }} </a>
                    /
                    <span style="color: #0ECE91!important;">
                        Posts
                    </span>
                </h6>
            </div>
            
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col">
                <div class="d-flex justify-content-end">
                    <button class="button mb-5">
                        @can('viewAny', App\Post::class)
                            <a href="{{ route('posts.create') }}" class="text-white">Add New Post</a>
                        @endcan
                    </button> 
                </div>
                
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Title</th>
                            <th scope="col">Body</th>
                            <th scope="col">Created At</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($posts as $post)
                            <tr>
                                <th scope="row">
                                    {{ $post->id }}
                                </th>
                                <td>
                                    {{ $post->title }}
                                </td>
                                <td>
                                    {{ substr(strip_tags($post->content), 0, 35) }}{{ strlen(strip_tags($post->content)) > 35 ? "..." : "" }}   
                                </td>
                                <td>
                                    {{ $post->created_at }}
                                </td>
                                <td>
                                    <div class="d-flex justify-content-end">
                                        <a href="{{ route('posts.show', ['post' => $post]) }}">
                                            <button class="btn btn-outline-info btn-sm mr-1">
                                                Show
                                            </button>    
                                        </a>
                                        <a href="{{ route('posts.edit', ['post' => $post]) }}">
                                            <button class="btn btn-outline-success btn-sm">
                                                Edit
                                            </button>    
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection