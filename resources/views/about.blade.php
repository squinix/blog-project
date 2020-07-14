@extends('layouts.app')

@section('content')

    <div class="row m-5">
        <div class="col p-4 text-center text-uppercase" style="background: url('https://colorlib.com/preview/theme/sunzine/img/page-banner.jpg');">
            <div class="m-5 text-white">
                <h1 style="font-weight: 900;">
                    O nás
                </h1>
                <h6 style="font-weight: 100;">
                    <a href="/" class="text-white">{{ config('app.name', 'Laravel') }}</a>
                    /
                    <span style="color: #0ECE91!important;">
                        O nás
                    </span>
                </h6>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row mt-5">
            <div class="col">
                <h1 class="text-center text-uppercase section_title pb-5" style="font-weight: 900;">
                    HELLO WORLD! WE ARE PHOTOGRAPHERS WE ALWAYS MAKE A DIFFERENCE IN EACH OF OUR PHOTOS
                </h1>
            </div>
        </div>
        <div class="row m-5">
            <div class="col">
                <p class="text-center" style="width: 80%;margin: 0 auto;">
                    Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitaedicta sunt explicabo. Nemo enunde omnis iste natus error sit voluptatem accusantium doloremque laudantium totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et.
                </p>
            </div>
        </div>
        <div class="row mb-5">
            <div class="col-md-6">
                <img src="https://www.generationsforpeace.org/wp-content/uploads/2018/03/empty.jpg" alt="empty" width="100%">
            </div>
            <div class="col-md-6">
                <img src="https://www.generationsforpeace.org/wp-content/uploads/2018/03/empty.jpg" alt="empty" width="100%">
            </div>
        </div>
    </div>

@endsection