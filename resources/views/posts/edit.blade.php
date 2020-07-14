@extends('layouts.app')

@section('title', 'Posts')

@section('stylesheets')
    <link href="{{ asset('css/select2.min.css') }}" rel="stylesheet">
@endsection

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
        <div class="row mt-5">
            <div class="col">
                <h1 class="text-uppercase" style="font-weight: 900;">
                    Edit {{ $post->title }}
                </h1>
            </div>
        </div>
        <div class="row mt-3 mb-5">
            <div class="col">
                <form action=" {{ route('posts.update', ['post' => $post]) }}" method="POST" enctype="multipart/form-data">
                    @method('PATCH')
                    @include('posts.form')

                    <div class="d-flex justify-content-end">
                        <button type="submit" class="button">
                            Uložit Příspěvek
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script src="{{ asset('js/select2.min.js') }}"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('.tags-multiple').select2();
            $('.tags-multiple').select2().val({!! json_encode($post->tags()->pluck('tags.id')->toArray()) !!}).trigger('change');
            $('.categories-multiple').select2();
            $('.categories-multiple').select2().val({!! json_encode($post->categories()->pluck('categories.id')->toArray()) !!}).trigger('change');
        });
    </script>

    <script src="https://cdn.tiny.cloud/1/50sgcje7uvzt5h29u59s00hcjuef1ajr29ms2s5xgtpg25d6/tinymce/5/tinymce.min.js" referrerpolicy="origin"/></script>
    <script>
        tinymce.init({
            selector: '#content',
            plugins: "image media"
        });
    </script>
@endsection