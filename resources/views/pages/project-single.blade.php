@extends('index')

@section('title', $project->title)

@section('content')

    <!--================Banner Area =================-->
    <section class="banner_area">
        <div class="container">
            <div class="banner_inner_text">
                <h4>{{ $project->title }}</h4>
                <ul>
                    <li><a href="{{ url('/') }}">Главная</a></li>
                    <li><a href="{{ url('/projects') }}">Проекты</a></li>
                    <li class="active"><a
                            href="{{ url("/projects/" . $project->slug) }}">{{ $project->title }}</a>
                    </li>
                </ul>
            </div>
        </div>
    </section>
    <!--================End Banner Area =================-->

    <!--================Project Single Area =================-->
    <section class="project_single_area">
        <div class="container">
            <div class="project_single_inner">
                <div class="project_single_slider">
                    <div id="slider" class="flexslider">
                        <ul class="slides">
                            @foreach($project->gallery as $item)
                                <li><img width="75%" height="75%"
                                         src="{{ asset("img/projects/".$item->filename) }}" alt=""></li>

                            @endforeach
                        </ul>
                    </div>
                    <div id="carousel" class="flexslider">
                        <ul class="slides">
                            @foreach($project->gallery as $item)
                                <li><img width="150px" height="100px"
                                         src="{{ asset("img/projects/".$item->filename) }}" alt=""></li>
                            @endforeach
                        </ul>
                        <div class="custom-navigation">
                            <a href="#" class="flex-prev"><i class="fa fa-angle-left"></i></a>
                            <a href="#" class="flex-next"><i class="fa fa-angle-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="project_summery">
                            <h4 class="project_title">{{ $project->title }}</h4>
                            <p>{{ $project->description }}</p>
                            <ul>
                                <li><a href="#">Заказчик: <span>{{ $project->consumer }}</span> </a></li>
                                <li><a href="#">Категория: <span>{{ $project->category->title }}</span></a></li>
                                <li><a href="#">Ответственный: <span>{{ $project->responsible }}</span></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="project_discription">
                            <h4 class="project_title">Информация о проекте</h4>
                            <p>{{ $project->completed_work }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Project Single Area =================-->

    <!--================Our Latest Project Area =================-->
    <section class="our_latest_project">
        <div class="container">
            <h3 class="out_title">Наши последние проекты</h3>
            <div class="our_latest_slider owl-carousel">
                @foreach($last_projects as $project)
                    <div class="item">
                        <div class="project_item">
                            <img src="{{ asset("img/projects/".$project->image->filename) }}" alt="">
                            <div class="project_hover">
                                <div class="project_hover_inner">
                                    <div class="project_hover_content">
                                        <a href="{{ url("/projects/" . $project->slug) }}">
                                            <h4>{{ $project->title }}</h4></a>
                                        <p>{{ $project->comment }} </p>
                                        <a class="view_btn" href="{{ url("/projects/" . $project->slug) }}">
                                            View Project
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!--================End Our Latest Project Area =================-->

@endsection
