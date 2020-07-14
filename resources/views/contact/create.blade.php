@extends('layouts.app')

@section('content')

    <div class="row mt-5 mb-5">
        <div class="col">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d96708.15276897172!2d-74.0392706090889!3d40.75917035962224!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c2588f046ee661%3A0xa0b3281fcecc08c!2sManhattan%2C%20New%20York%2C%20Spojen%C3%A9%20st%C3%A1ty%20americk%C3%A9!5e0!3m2!1scs!2scz!4v1593680173412!5m2!1scs!2scz" 
                    width="100%" 
                    height="450" 
                    frameborder="0" 
                    style="border:0;" 
                    allowfullscreen="" 
                    aria-hidden="false" 
                    tabindex="0">
            </iframe>
        </div>
    </div>

    <div class="container">
        <div class="row mb-5">
            <div class="col">
                <h4 class="text-uppercase" style="font-weight: 600;">
                    {{ config('app.name', 'Laravel') }}
                </h4>
                <div class="row mt-5">
                    <div class="col">
                        <h5 class="text-uppercase" style="font-weight: 400;">
                            Adresa
                        </h5>
                        <p class="text-muted">
                            01 Pascale Springs Apt. 339, NY City United State
                        </p> 
                    </div> 
                </div>
                <div class="row mt-5">
                    <div class="col-md-6">
                        <h5 class="text-uppercase" style="font-weight: 400;">
                            Telefon
                        </h5>
                        <p class="text-muted">
                            +123 4567 8910
                        </p> 
                    </div>
                    <div class="col-md-6">
                        <h5 class="text-uppercase" style="font-weight: 400;">
                            E-mail
                        </h5>
                        <p class="text-muted">
                            example@example.com
                        </p> 
                    </div>
                </div>
                <div class="row mt-5">
                    <div class="col">
                        <h5 class="text-uppercase" style="font-weight: 400;">
                            Pracovní hodiny
                        </h5>
                        <p class="text-muted">
                            08:00 - 16:00
                        </p> 
                    </div> 
                </div>
            </div>
            <div class="col">
                <h4 class="text-uppercase" style="font-weight: 600;">
                    Kontaktní formulář
                </h4>
                <form action="{{ route('contact.store') }}" method="POST">
                    <div class="form-group">
                        <input type="text" name="name" value="{{ old('name') }}" class="form-control" placeholder="Vaše jméno">
                        {{ $errors->first('name') }}
                    </div>
                    
                    <div class="form-group">
                        <input type="text" name="email" value="{{ old('email') }}" class="form-control" placeholder="Váš e-mail">
                        {{ $errors->first('email') }}
                    </div>

                    <div class="form-group">
                        <textarea name="message" id="message" cols="30" rows="10" class="form-control" placeholder="Vaše zpráva">{{ old('message') }}</textarea>
                        {{ $errors->first('email') }}
                    </div>

                    @csrf

                    <div class="d-flex justify-content-end">
                        <button type="submit" class="button">
                            Odeslat zprávu
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection