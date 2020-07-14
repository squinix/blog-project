<div class="form-group">
    <label for="title">Tag Name</label>
    <input id="title" type="text" name="title" value="{{ old('title') ?? $tag->title }}" class="form-control">
    {{ $errors->first('title') }}
</div>

<div class="form-group">
    <label for="meta_title">Tag Meta Title</label>
    <input id="meta_title" type="text" name="meta_title" value="{{ old('meta_title') ?? $tag->meta_title }}" class="form-control">
    {{ $errors->first('meta_title') }}
</div>

<div class="form-group">
    <label for="content">Tag Content</label>
    <textarea id="content" name="content" class="form-control" rows="3">{{ old('content') ?? $tag->content }}</textarea>
    {{ $errors->first('content') }}
</div>

@csrf