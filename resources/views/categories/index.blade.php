@extends('layouts.app')

@section('title', 'Categories')

@section('content')

    <div class="row m-5">
        <div class="col p-4 text-center text-uppercase" style="background: url('https://colorlib.com/preview/theme/sunzine/img/page-banner.jpg');">
            <div class="m-5 text-white">
                <h1 style="font-weight: 900;">
                    All Categories
                </h1>
                <h6 style="font-weight: 100;">
                    <a href="/" class="text-white">{{ config('app.name', 'Laravel') }}</a>
                    /
                    <a href="/home" class="text-white">{{ Auth::user()->name }} </a>
                    /
                    <span style="color: #0ECE91!important;">
                        Categories
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
                            <a href="{{ route('categories.create') }}" class="text-white">Přidat novou kategorii</a>
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
                        @foreach ($categories as $category)
                            <tr>
                                <th scope="row">
                                    {{ $category->id }}
                                </th>
                                <td>
                                    {{ $category->title }}
                                </td>
                                <td>
                                    {{ substr(strip_tags($category->content), 0, 35) }}{{ strlen(strip_tags($category->content)) > 35 ? "..." : "" }}   
                                </td>
                                <td>
                                    {{ $category->created_at }}
                                </td>
                                <td>
                                    <div class="d-flex justify-content-end">
                                        <a href="{{ route('categories.show', ['category' => $category]) }}">
                                            <button class="btn btn-outline-info btn-sm mr-1">
                                                Show
                                            </button>    
                                        </a>
                                        <a href="{{ route('categories.edit', ['category' => $category]) }}">
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