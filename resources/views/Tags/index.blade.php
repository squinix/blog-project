@extends('layouts.app')

@section('title', 'Tags')

@section('content')

<div class="row m-5">
    <div class="col p-4 text-center text-uppercase" style="background: url('https://colorlib.com/preview/theme/sunzine/img/page-banner.jpg');">
        <div class="m-5 text-white">
            <h1 style="font-weight: 900;">
                All Tags
            </h1>
            <h6 style="font-weight: 100;">
                <a href="/" class="text-white">{{ config('app.name', 'Laravel') }}</a>
                /
                <a href="/home" class="text-white">{{ Auth::user()->name }} </a>
                /
                <span style="color: #0ECE91!important;">
                    Tags
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
                    @can('viewAny', App\Tag::class)
                        <a href="{{ route('tags.create') }}" class="text-white">Přidat nový tag</a>
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
                    @foreach ($tags as $tag)
                        <tr>
                            <th scope="row">
                                {{ $tag->id }}
                            </th>
                            <td>
                                {{ $tag->title }}
                            </td>
                            <td>
                                {{ substr(strip_tags($tag->content), 0, 35) }}{{ strlen(strip_tags($tag->content)) > 35 ? "..." : "" }}   
                            </td>
                            <td>
                                {{ $tag->created_at }}
                            </td>
                            <td>
                                <div class="d-flex justify-content-end">
                                    <a href="{{ route('tags.show', ['tag' => $tag]) }}">
                                        <button class="btn btn-outline-info btn-sm mr-1">
                                            Show
                                        </button>    
                                    </a>
                                    <a href="{{ route('tags.edit', ['tag' => $tag]) }}">
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