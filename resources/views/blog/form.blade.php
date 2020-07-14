<input type="hidden" name="post_id" value="{{ $post->id }}">

<div class="form-group">
    <input type="text" name="title" value="{{ old('title') }}" class="form-control" placeholder="Předmět komentáře">
    {{ $errors->first('title') }}
</div>

{{-- <div class="form-group">
    <input type="text" name="email" value="{{ old('email') }}" class="form-control" placeholder="Váš e-mail">
    {{ $errors->first('email') }}
</div> --}}

<input type="hidden" name="email" value="{{ Auth::user()->email }}">

<input type="hidden" name="visible" value="1">

<div class="form-group">
    <textarea name="content" id="content" cols="30" rows="10" placeholder="Vaše zpráva" class="form-control"></textarea>
</div>

@csrf