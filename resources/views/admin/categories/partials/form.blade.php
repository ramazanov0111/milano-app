<label for="">Статус</label>
<select class="form-control" name="published">
    @if (isset($category->id))
        <option value="0" @if ($category->published === 0) selected="" @endif>Не опубликовано</option>
        <option value="1" @if ($category->published === 1) selected="" @endif>Опубликовано</option>
    @else
        <option value="0">Не опубликовано</option>
        <option value="1">Опубликовано</option>
    @endif
</select>

<label for="">Наименование</label>
<input type="text" class="form-control" name="title" placeholder="Заголовок категории"
       value="{{ $category->title ?? ''}}" required="">

<label for="">Slug</label>
<input class="form-control" type="text" name="slug" placeholder="Автоматическая генерация"
       value="{{ $category->slug ?? ''}}" readonly="">

<label class="btn btn-default btn-file">Изображение</label>
<input type="file" class="form-control" id="preview" name="preview" value="{{$category->preview->filename ?? ''}}">

<label for="">Родительская категория</label>
<select class="form-control" name="parent_id">
    <option value="0">-- без родительской категории --</option>
    @include('admin.categories.partials.categories', ['categories' => $categories])
</select>

<button class="btn btn-primary" type="submit">
    <i class="fa fa-check-square-o" aria-hidden="true"></i>
    Сохранить
</button>
