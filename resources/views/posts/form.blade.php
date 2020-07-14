<input type="hidden" name="user_id" id="user_id" value="{{ $user->id }}">

<div class="form-group">
    <label for="title">Titulek příspěvku</label>
    <input id="title" type="text" name="title" value="{{ old('title') ?? $post->title }}" class="form-control">
    {{ $errors->first('title') }}
</div>

<div class="form-group">
    <label for="meta_title">Meta Titulek</label>
    <input id="meta_title" type="text" name="meta_title" value="{{ old('meta_title') ?? $post->meta_title }}" class="form-control">
    {{ $errors->first('meta_title') }}
</div>

<input type="hidden" name="visible" id="visible" value="1">

<div class="row">
    <div class="col">
        <div class="form-group">
            @if (count($tags) > 0)
                <label for="tags-multiple">Tagy</label>
                <select id="tags-multiple" class="tags-multiple form-control" name="tags[]" multiple="multiple">
                    @foreach ($tags as $tag)
                        <option value="{{ $tag->id }}">{{ $tag->title }}</option>  
                    @endforeach    
                </select>    
            @else
                Žádné tagy, vytvořte nějaké <a href="/tags/create">zde</a>.
            @endif
        </div>
    </div>
    <div class="col">
        <div class="form-group">
            @if (count($categories) > 0)
                <label for="categories-multiple">Kategorie</label>
                <select id="categories-multiple" class="categories-multiple form-control" name="categories[]" multiple="multiple">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->title }}</option>  
                    @endforeach
                </select>    
            @else
                Žádné kategorie, vytvořte nějaké <a href="/categories/create">zde</a>.
            @endif
        </div>
    </div>
</div>

<div class="form-group">
    <textarea id="content" name="content">
        {{ old('content') ?? $post->content }}
    </textarea>
    {{ $errors->first('content') }}
</div>

<div class="form-group d-flex flex-column">
    <label for="thumbnail">Thumbnail Obrázek</label>
    <input type="file" name="thumbnail" id="thumbnail">
    {{ $errors->first('image') }}
</div>

@csrf