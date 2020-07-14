<input type="hidden" name="post_id" value="{{ $comment->post->id }}">

<div class="form-group">
    <label for="comment-title">Titulek</label>
    <input id="comment-title" type="text" name="title" value="{{ old('title') ?? $comment->title }}" class="form-control">
    {{ $errors->first('title') }}
</div>

<div class="form-group">
    <label for="comment-email">E-mail</label>
    <input id="comment-email" type="text" name="email" value="{{ old('email') ?? $comment->email }}" class="form-control">
    {{ $errors->first('email') }}
</div>

<input type="hidden" name="visible" value="1">

<div class="form-group">
    <label for="categories-multiple">Text komentáře</label>
    <textarea name="content" id="content" cols="30" rows="10" class="form-control">{{ old('content') ?? $comment->content }}</textarea>
</div>

@csrf