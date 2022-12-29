<label for="">Статус</label>
<select class="form-control" name="published">
    @if (isset($service->id))
        <option value="0" @if ($service->published == 0) selected="" @endif>Не опубликовано</option>
        <option value="1" @if ($service->published == 1) selected="" @endif>Опубликовано</option>
    @else
        <option value="0">Не опубликовано</option>
        <option value="1">Опубликовано</option>
    @endif
</select>

<label for="">Заголовок</label>
<input type="text" class="form-control" name="title" placeholder="Заголовок" value="{{ $service->title ?? ''}}"
       required="">

<label for="">Slug (Уникальное значение)</label>
<input class="form-control" type="text" name="slug" placeholder="Автоматическая генерация"
       value="{{ $service->slug ?? ''}}" readonly="">

<label for="">Родительская категория</label>
<select class="form-control" name="category_id">
    @include('admin.services.partials.categories', ['categories' => $categories])
</select>

<label for="">Краткое описание</label>
<textarea class="form-control" id="description" name="description">{{$service->description ?? '' }}</textarea>

<label for="">Единица измерения</label>
<input type="text" class="form-control" name="unit" placeholder="м2, м3, погонный метр и т.д." value="{{ $service->unit ?? ''}}">

<label for="">Стоимость за единицу</label>
<input type="text" class="form-control" name="price" placeholder="в руб." value="{{ $service->price ?? ''}}">

<label class="btn btn-default btn-file">Изображение</label>
<input type="file" class="form-control" id="image" name="image" value="{{$service->image->filename ?? ''}}">

<hr/>

<label for="">Мета заголовок</label>
<input type="text" class="form-control" name="meta_title" placeholder="Мета заголовок"
       value="{{ $service->meta_title ?? ''}}">

<label for="">Мета описание</label>
<input type="text" class="form-control" name="meta_description" placeholder="Мета описание"
       value="{{ $service->meta_description ?? ''}}">

<label for="">Ключевые слова</label>
<input type="text" class="form-control" name="meta_keyword" placeholder="Ключевые слова, через запятую"
       value="{{ $service->meta_keyword ?? ''}}">

<hr/>

<button class="btn btn-primary" type="submit">
    <i class="fa fa-check-square-o" aria-hidden="true"></i>
    Сохранить
</button>
