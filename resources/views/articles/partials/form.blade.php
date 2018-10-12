<div class="form-group">
    <label for="title">Название статьи</label>
    <input type="text" id="title" class="form-control" placeholder="Введите название статьи" name="title" value="@isset($article) {{ $article->title }} @endisset">
</div>
<div class="form-group">
    <label for="body">Содержание статьи</label>
    <textarea type="text" id="body" class="form-control" placeholder="Введите содежание статьи" rows="10" name="body">@isset($article) {{ $article->body }} @endisset</textarea>
</div>
<div class="form-group">
    <label for="tags">Категории данной статьи</label>
    <select type="text" name="tags[]" id="tags" class="form-control" multiple="multiple">
        @foreach($tags as $tag)
            <option value="{{ $tag }}" @isset($selected_tags) @if(is_integer(array_search($tag, $selected_tags))) selected  @endif @endisset> {{ $tag }}</option>
        @endforeach
</select>
</div>

<div class="form-group">
    <div class="input-group mb-3">
        <label class="custom-file-label" for="images">Загрузить фотографии</label>
        <input type="file" class="custom-file-input" name="images[]" id="images" multiple="multiple">
    </div>
</div>

<div class="form-group">
    <input type="submit" class="form-control btn-primary btn" value="{{ $submitButtonText }}">
</div>
