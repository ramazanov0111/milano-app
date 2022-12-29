@extends('admin.layouts.app_admin')

@section('content')

    <div class="container">

        @component('admin.components.breadcrumb')
            @slot('title')
                Редактирование услуги
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

        <form class="form-group" action="{{route('admin.service.update', $service)}}" enctype="multipart/form-data"
              method="post">
            <input type="hidden" name="_method" value="put">
            {{ csrf_field() }}

            {{-- Form include --}}
            @include('admin.services.partials.form')

            <input type="hidden" name="modified_by" value="{{Auth::id()}}">
        </form>
    </div>

@endsection
