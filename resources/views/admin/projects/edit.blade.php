@extends('admin.layouts.app_admin')

@section('content')

    <div class="container">

        @component('admin.components.breadcrumb')
            @slot('title')
                Редактирование проекта
            @endslot
            @slot('parent')
                Главная
            @endslot
            @slot('active')
                Проекты
            @endslot
            @slot('page')
                project
            @endslot
        @endcomponent

        <hr/>

        <form class="form-group" action="{{route('admin.project.update', $project)}}" enctype="multipart/form-data"
              method="post">
            <input type="hidden" name="_method" value="put">
            {{ csrf_field() }}

            {{-- Form include --}}
            @include('admin.projects.partials.form')

            <input type="hidden" name="modified_by" value="{{Auth::id()}}">
        </form>
    </div>

@endsection
