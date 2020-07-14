@extends('layouts.app')

@section('title', 'Details for ' . $post->title)

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
                    <a href="/posts" class="text-white">Posts </a>
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
                    {{ $post->title }}
                </h1>
                <img src="{{ asset('storage/' . $post->thumbnail) }}" alt="" class="img-thumbnail">
                <p>
                    {!! $post->content !!}
                </p>

                <table class="table table-hover mt-5">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Title</th>
                            <th scope="col">Email</th>
                            <th scope="col">Comment</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($post->postComments as $comment)
                            <tr>
                                <th scope="row">
                                    {{ $comment->id }}
                                </th>
                                <td>
                                    {{ $comment->title }}
                                </td>
                                <td>
                                    {{ $comment->email }}
                                </td>
                                <td>
                                    {{ $comment->content }}
                                </td>
                                <td>
                                    <div class="d-flex justify-content-end">
                                        <a href="{{ route('comments.edit', ['comment' => $comment]) }}" class="btn btn-outline-success btn-sm mr-1">
                                            EDIT
                                        </a>
                                        <form action="{{ route('comments.destroy', ['comment' => $comment]) }}" method="POST">    
                                            @method('DELETE')
                                            @csrf
                                            <button id="post_delete" class="btn btn-outline-danger btn-sm" type="submit">
                                                Delete Post
                                            </button>
                                        </form>  
                                    </div>
                                </td>
                            </tr>
                        @endforeach        
                    </tbody>
                </table>

            </div>
            <div class="col-md-4 border">
                <p class="pl-3 pt-4">
                    <strong>
                        Vytvořil
                    </strong>
                </p>
                <p class="pl-3">
                    <small>
                        {{ $post->user->name }}
                    </small>
                </p>
                <p class="pl-3 pt-4">
                    <strong>
                        Kategorie
                    </strong>
                </p>
                <p class="pl-3">
                    <small>
                        @foreach ($post->categories as $category)
                            {{ $category->title }}
                        @endforeach
                    </small>
                </p>
                <p class="pl-3 pt-4">
                    <strong>
                        Tagy
                    </strong>
                </p>
                <p class="pl-3">
                    <small>
                        @foreach ($post->tags as $tag)
                            {{ $tag->title }}
                        @endforeach
                    </small>
                </p>
                <p class="pl-3 pt-4">
                    <strong>
                        Vytvořeno dne
                    </strong>
                </p>
                <p class="pl-3">
                    <small>
                        {{ $post->created_at }}
                    </small>
                </p>
                <p class="pl-3 pt-4">
                    <strong>
                        Naposledy editáno
                    </strong>
                </p>
                <p class="pl-3">
                    <small>
                        {{ $post->updated_at }}
                    </small>
                </p>
                <hr class="hr">
                <div class="row">
                    <div class="col d-flex justify-content-end">
                        @can('update', $post)
                            <a href="{{ route('posts.edit', ['post' => $post]) }}">
                                <button class="btn btn-outline-info mb-3">
                                    Edit
                                </button>
                            </a>
                        @elsecan('viewAny', App\Post::class)
                            <p>
                                Abyste mohli editovat příspěvek, musí být vytvořen Vámi.
                            </p>
                        @endcan
                    </div>
                    <div class="col d-flex justify-content-start">
                        @can('update', $post)
                            <form action="{{ route('posts.destroy', ['post' => $post]) }}" method="POST">    
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-outline-danger mb-3" type="submit">
                                    Delete
                                </button>
                            </form>
                        @elsecan('viewAny', App\Post::class)
                            <p>
                                Abyste mohli příspěvek odstranit, musí být vytvořen Vámi.
                            </p>
                        @endcan
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script>
        $('#post_delete').click(function(e){
            e.preventDefault() // Don't post the form, unless confirmed
            if (confirm('Are you sure?')) {
                // Post the form
                $(e.target).closest('form').submit() // Post the surrounding form
            }
        });
    </script>
@endsection