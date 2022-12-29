@extends('admin.layouts.app_admin')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                <div class="jumbotron">
                    <p class="lead"><span class="btn btn-lg">Проектов {{ $count_projects }}</span></p>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="jumbotron">
                    <p class="lead"><span class="btn btn-lg">Посетителей 0</span></p>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="jumbotron">
                    <p class="lead"><span class="btn btn-lg">Сегодня 0</span></p>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-4">
                <a href="{{route('admin.category.create')}}" class="badge-dark btn btn-block btn-default">Добавить категорию</a>
                @foreach($categories as $category)
                    <a href="{{route('admin.category.edit', $category)}}" class="badge badge-light list-group-item">
                        <h4 class="list-group-item-heading">{{ $category->title }}</h4>
                        <p class="list-group-item-text">
                            Кол-во проектов: {{ $category->projects()->count() }}
                        </p>
                        <p class="list-group-item-text">
                            Кол-во услуг: {{ $category->services()->count() }}
                        </p>
                    </a>
                @endforeach
            </div>
            <div class="col-sm-4">
                <a href="{{route('admin.project.create')}}" class="badge-dark btn btn-block btn-default">Добавить проект</a>
                @foreach($projects as $project)
                    <a href="{{route('admin.project.edit', $project)}}" class="badge badge-light list-group-item">
                        <h4 class="list-group-item-heading">{{ $project->title }}</h4>
                        <p class="list-group-item-text">
                            Категория: {{ $project->category->title }}
                        </p>
                    </a>
                @endforeach
            </div>
            <div class="col-sm-4">
                <a href="{{route('admin.service.create')}}" class="badge-dark btn btn-block btn-default">Добавить услугу</a>
                @foreach($services as $service)
                    <a href="{{route('admin.service.edit', $service)}}" class="badge badge-light list-group-item">
                        <h4 class="list-group-item-heading">{{ $service->title }}</h4>
                        <p class="list-group-item-text">
                            Категория: {{ $service->category->title }}
                        </p>
                    </a>
                @endforeach
            </div>
        </div>
    </div>

@endsection
