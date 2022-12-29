@extends('index')

@section('title', 'Наши проекты')

@section('content')

    <!--================Banner Area =================-->
    <section class="banner_area">
        <div class="container">
            <div class="banner_inner_text">
                <h4>Наши проекты</h4>
                <ul>
                    <li><a href="{{ url('/') }}">Главная</a></li>
                    <li class="active"><a href="{{ url('/about') }}">Проекты</a></li>
                </ul>
            </div>
        </div>
    </section>
    <!--================End Banner Area =================-->

    <!--================Get Quote Area =================-->
    <section class="get_quote_area yellow_get_quote">
        <div class="container">
            <div class="pull-left">
                <h4>Looking for a quality and affordable constructor for your next project?</h4>
            </div>
            <div class="pull-right">
                <a class="get_btn_black" href="#">GET A QUOTE</a>
            </div>
        </div>
    </section>
    <!--================End Get Quote Area =================-->

@endsection
