@foreach ($categories as $category)

    <option value="{{$category->id ?? ""}}"

            @isset($post->id)
                @foreach ($post->categories as $category_post)
                    @if ($category->id == $category_post->id)
                        selected="selected"
            @endif
            @endforeach
            @endisset
    >
        {!! $delimiter ?? "" !!}{{$category->title ?? ""}}
    </option>

    @if (count($category->children) > 0)

        @include('admin.projects.partials.categories', [
          'categories' => $category->children,
          'delimiter'  => ' - ' . $delimiter
        ])

    @endif
@endforeach
