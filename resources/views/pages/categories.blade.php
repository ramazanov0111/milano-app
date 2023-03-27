@extends('index')

@section('title', 'Наши услуги')

@section('content')

    <!--================Banner Area =================-->
    <section class="banner_area">
        <div class="container">
            <div class="banner_inner_text">
                <h4>{{ $headCategory->title }}</h4>
                <ul>
                    <li><a href="{{ url('/') }}">Главная</a></li>
                    <li><a href="">Услуги</a></li>
                    <li class="active">
                        <a href="{{ url('/categories/'. $headCategory->slug) }}">
                            {{ $headCategory->title }}
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </section>
    <!--================End Banner Area =================-->

    <!--================Our Service2 Area =================-->
    <section class="our_service_area2">
        <div class="container">
            <div class="main_c_b_title">
                <h2>Наши<br class="title_br">Услуги</h2>
            </div>
            <div class="row service2_inner">

                @foreach($categories as $category)
                    <div class="col-md-4 col-sm-6">
                        <div class="service2_item">
                            <div class="service2_item_inner">
                                <div class="service2_item_inner_content">
                                    <div class="service_icon">
                                        <img width="80px" height="80px"
                                             src="{{ $category->image ? asset("img/services/".$category->image->filename) : ''}}" alt="">
                                        <img width="80px" height="80px"
                                             src="{{ $category->image ? asset("img/projects/".$category->image->filename) : '' }}" alt="">
                                    </div>
                                    <h4>{{ $category->title }}</h4>
                                    <a class="view_btn" href="{{ url("/services/" . $category->slug) }}">Посмотреть услуги</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>
    <!--================End Our Service2 Area =================-->

@endsection
