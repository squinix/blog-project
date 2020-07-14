<div class="form-group">
    <select name="parent_id" id="active" class="form-control">
        <option value="">Select Category Parent Category (optional)</option>
        @foreach ($categories as $cat)
            <option value="{{ $cat->id }}" {{ $category->parent_id == $cat->id ? 'selected' : '' }}>{{ $cat->title }}</option>
        @endforeach
    </select>
</div>

<div class="form-group">
    <label for="title">Název Kategorie</label>
    <input id="title" type="text" name="title" value="{{ old('title') ?? $category->title }}" class="form-control">
    {{ $errors->first('title') }}
</div>

<div class="form-group">
    <label for="meta_title">Meta Kategorie</label>
    <input id="meta_title" type="text" name="meta_title" value="{{ old('meta_title') ?? $category->meta_title }}" class="form-control">
    {{ $errors->first('meta_title') }}
</div>

<div class="form-group">
    <label for="content">Popis Kategorie</label>
    <textarea id="content" name="content" class="form-control" rows="3">{{ old('content') ?? $category->content }}</textarea>
    {{ $errors->first('content') }}
</div>

@csrf