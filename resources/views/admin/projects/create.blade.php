@extends('admin.layouts.app_admin')

@section('content')

    <div class="container">

        @component('admin.components.breadcrumb')
            @slot('title')
                Создание проекта
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

        <form class="form-group" action="{{route('admin.project.store')}}" enctype="multipart/form-data" method="post">
            {{ csrf_field() }}

            {{-- Form include --}}
            @include('admin.projects.partials.form')

            <input type="hidden" name="created_by" value="{{ Auth::id() }}">
        </form>
    </div>

@endsection
