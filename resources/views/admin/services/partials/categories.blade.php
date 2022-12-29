@foreach ($categories as $category)

    <option value="{{$category->id ?? ""}}"

            @isset($project->id)
                    @if ($project->category->id === $category->id)
                        selected="selected"
            @endif
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
