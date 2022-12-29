@extends('admin.layouts.app_admin')

@section('content')

    <div class="container">

        @component('admin.components.breadcrumb')
            @slot('title')
                Список проектов
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

        <a href="{{route('admin.project.create')}}" class="btn btn-primary pull-right"><i class="fa fa-plus-square"></i>
            Добавить проект</a>
        <table class="table table-striped">
            <thead>
            <th>Название</th>
            <th>Публикация</th>
            <th class="text-right">Действие</th>
            </thead>
            <tbody>
            @forelse ($projects as $project)
                <tr>
                    <td>{{$project->title}}</td>
                    <td>{{$project->published}}</td>
                    <td class="text-right">
                        <form onsubmit="if(confirm('Удалить?')){ return true }else{ return false }" action="{{ route('admin.project.destroy',
                        $project) }}" method="post">
                            <input type="hidden" name="_method" value="DELETE">
                            {{ csrf_field() }}

                            <a class="btn btn-default" href="{{route('admin.project.edit', $project)}}">
                                <i class="fa fa-edit" aria-hidden="true"></i>
                            </a>
                            <button type="submit" class="btn">
                                <i class="fa fa-trash" aria-hidden="true"></i>
                            </button>
                        </form>

                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" class="text-center"><h2>Данные отсутствуют</h2></td>
                </tr>
            @endforelse
            </tbody>
            <tfoot>
            <tr>
                <td colspan="3">
                    <ul class="pagination pull-right">
                        {{ $projects->links() }}
                    </ul>
                </td>
            </tr>
            </tfoot>
        </table>
    </div>

@endsection
