@extends('admin.layouts.app_admin')

@section('content')

    <div class="container">

        @component('admin.components.breadcrumb')
            @slot('title')
                Список пользователей
            @endslot
            @slot('parent')
                Главная
            @endslot
            @slot('active')
                Пользователи
            @endslot
            @slot('page')
                user
            @endslot
        @endcomponent

        <hr>

        <a href="{{route('admin.user.create')}}" class="btn btn-primary pull-right"><i class="fa fa-plus-square-o"></i>
            Создать пользователя</a>
        <table class="table table-striped">
            <thead>
            <th>Имя</th>
            <th>Email</th>
            <th class="text-right">Действие</th>
            </thead>
            <tbody>
            @forelse ($users as $user)
                <tr>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td class="text-right">
                        <form onsubmit="if(confirm('Удалить?')){ return true }else{ return false }" action="{{ route('admin.user.destroy',
                        $user) }}" method="post">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}

                            <a class="btn btn-default" href="{{route('admin.user.edit', $user)}}">
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
                        {{ $users->links() }}
                    </ul>
                </td>
            </tr>
            </tfoot>
        </table>
    </div>

@endsection
