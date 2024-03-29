@extends('admin.layouts.app_admin')

@section('content')

    <div class="container">

        @component('admin.components.breadcrumb')
            @slot('title')
                Создание категории
            @endslot
            @slot('parent')
                Главная
            @endslot
            @slot('active')
                Категории
            @endslot
                @slot('page')
                    category
                @endslot
        @endcomponent

        <hr/>

        <form class="form-horizontal" action="{{route('admin.category.store')}}" enctype="multipart/form-data" method="post">
            {{ csrf_field() }}

            {{-- Form include --}}
            @include('admin.categories.partials.form')

        </form>
    </div>

@endsection
