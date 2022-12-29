@extends('admin.layouts.app_admin')

@section('content')

    <div class="container">

        @component('admin.components.breadcrumb')
            @slot('title')
                Создание услуги
            @endslot
            @slot('parent')
                Главная
            @endslot
            @slot('active')
                Услуги
            @endslot
            @slot('page')
                service
            @endslot
        @endcomponent

        <hr/>

        <form class="form-group" action="{{route('admin.service.store')}}" enctype="multipart/form-data" method="post">
            {{ csrf_field() }}

            {{-- Form include --}}
            @include('admin.services.partials.form')

            <input type="hidden" name="created_by" value="{{ Auth::id() }}">
        </form>
    </div>

@endsection
