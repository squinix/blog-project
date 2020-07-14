@extends('layouts.app')

@section('title', 'Webové stránky s těmi nejlepšími blogy')

@section('content')

    <div class="row m-5">
        <div class="col text-center text-uppercase">
            <h1 class="m-5 p-5 text-black" style="font-weight: 900;">
                Law but reasonably motionless principles she. Has six worse downs far blush rooms above stood.
            </h1>
        </div>
    </div>

    <div class="text-center">
        <show-blog></show-blog>
    </div>

    <div class="d-flex justify-content-center">
        <a href="blog" class="p-5">
            <button type="button" class="button mt-5">
                Přejít na Blog
            </button>    
        </a>
    </div>
@endsection