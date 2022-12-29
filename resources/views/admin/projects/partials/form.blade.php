<label for="">Статус</label>
<select class="form-control" name="published">
    @if (isset($project->id))
        <h5>{{ $project->published }}</h5>
        {{--        <option value="0" {{ ($project->published === 0) ? "selected" : "" }}>Не опубликовано</option>--}}
        {{--        <option value="1" {{ ($project->published === 1) ? "selected" : "" }}>Опубликовано</option>--}}

        <option value="0"
                @if($project->published === 0) selected @endif>
            Не опубликовано
        </option>
        <option value="1"
                @if($project->published === 1) selected @endif>
            Опубликовано
        </option>
    @else
        <option value="0">Не опубликовано</option>
        <option value="1">Опубликовано</option>
    @endif
</select>

<hr/>

<label for="title">Название</label>
<input type="text" class="form-control" name="title" placeholder="Название" value="{{ $project->title ?? ''}}"
       required="">

<hr/>

<label for="slug">Slug (Уникальное значение)</label>
<input class="form-control" type="text" name="slug" placeholder="Автоматическая генерация"
       value="{{ $project->slug ?? ''}}" readonly="">

<hr/>

<label for="">Родительская категория</label>
<select class="form-control" name="category_id">
    @include('admin.projects.partials.categories', ['categories' => $categories])
</select>

<hr/>

<label for="responsible">Ответственный</label>
<input type="text" class="form-control" name="responsible" placeholder="ФИО сотрудника"
       value="{{ $project->responsible ?? ''}}">

<hr/>

<label for="consumer">Заказчик</label>
<input type="text" class="form-control" name="consumer" placeholder="ФИО или Адрес"
       value="{{ $project->consumer ?? ''}}">

<hr/>

<label for="description">Краткое описание</label>
<textarea class="form-control" id="description" name="description">{{$project->description ?? '' }}</textarea>

<hr/>

<label for="">Выполненные работы</label>
<textarea class="form-control" id="completed_work"
          name="completed_work">{{$project->completed_work ?? '' }}</textarea>

<hr/>

<label for="image">Изображение</label>
<input type="file" class="form-control" id="image" name="image" value="{{ $project->image->filename ?? ''}}">

<div id="img-container">
    @if(isset($project->image))
        <label>Текущее</label>
        <img width="300px" height="250px" class="img-thumbnail"
             src="{{ asset("img/projects/".$project->image->filename) }}" alt="">
    @endif
</div>

<hr/>

<label for="gallery">Галерея</label>
<input type="file" class="form-control" name="gallery[]" id="gallery" multiple/>

<div class="img_list">
    @if(isset($project->gallery))
        <div class="content_wrapper">
            <div class="row text-center">
                @foreach($project->gallery as $galleryItem)
                    <div class="item col-3">
                        <button class="btn btn-default del_button" id="{{ $galleryItem->id }}" type="button">
                            <i class="fa fa-remove" aria-hidden="true"></i>
                        </button>
                        <img width="200px" height="150px" class="img-thumbnail"
                             src="{{ asset("img/projects/".$galleryItem->filename) }}" alt="{{$galleryItem->filename}}">
                    </div>
                @endforeach
            </div>
        </div>
        @push('scripts')
            <script type="text/javascript">

                $(document).ready(function () {

                    $('.del_button').click(function () {

                        var imageId = $(this).attr('id');
                        var projectId = {{ $project->id }};
                        let parentDiv = $(this).closest('div.item');

                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });
                        $.ajax({
                            type: 'DELETE',
                            url: "../../projects/" + projectId + "/media/" + imageId,
                            data: {},
                            success: function (result) {
                                alert('Файл удален!');
                                // $(this).remove();
                                $(parentDiv).remove();
                            }

                        });

                    });
                });

            </script>
        @endpush
    @endif
</div>

<hr/>

<label for="">Мета Заголовок</label>
<input type="text" class="form-control" name="meta_title" placeholder="Заголовок"
       value="{{ $project->meta_title ?? ''}}">
<label for="">Мета Описание</label>
<input type="text" class="form-control" name="meta_description" placeholder="Описание"
       value="{{ $project->meta_description ?? ''}}">
<label for="">Мета Ключевые слова</label>
<input type="text" class="form-control" name="meta_keywords" placeholder="Теги"
       value="{{ $project->meta_keywords ?? ''}}">

<hr/>

<button class="btn btn-primary" type="submit">
    <i class="fa fa-check-square-o" aria-hidden="true"></i>
    Сохранить
</button>


