@extends('index')

@section('title', 'Наши проекты')

@section('content')

    <!--================Banner Area =================-->
    <section class="banner_area">
        <div class="container">
            <div class="banner_inner_text">
                <h4>Наши услуги</h4>
                <ul>
                    <li><a href="{{ url('/') }}">Главная</a></li>
                    <li><a href="{{ url('/categories') }}">Услуги</a></li>
                    <li>
                        <a href="{{ url('/categories/'. $headCategory->slug) }}">
                            {{ $headCategory->title }}
                        </a>
                    </li>
                    <li class="active">
                        <a href="{{ url("/services/" . $service->slug) }}">{{ $service->title }}</a>
                    </li>
                </ul>
            </div>
        </div>
    </section>
    <!--================End Banner Area =================-->

    <!--================Others Service Area =================-->
    <section class="other_service_area">
        <div class="container">
            <h4 class="project_title">Наши другие услуги</h4>
            <div class="service2_inner other_service_slider owl-carousel">
                <div class="item">
                    <div class="service2_item">
                        <div class="service2_item_inner">
                            <div class="service2_item_inner_content">
                                <div class="service_icon">
                                    <img src="img/icon/s2-icon-1.png" alt="">
                                    <img src="img/icon/s2-icon-hover-1.png" alt="">
                                </div>
                                <h4>NEW-CONSTRUCTION</h4>
                                <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium
                                    dolorem-que laudantium totam rem aperiam.</p>
                                <a class="view_btn" href="#">Read Details</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="service2_item">
                        <div class="service2_item_inner">
                            <div class="service2_item_inner_content">
                                <div class="service_icon">
                                    <img src="img/icon/s2-icon-2.png" alt="">
                                    <img src="img/icon/s2-icon-hover-2.png" alt="">
                                </div>
                                <h4>LOCATION</h4>
                                <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium
                                    dolorem-que laudantium totam rem aperiam.</p>
                                <a class="view_btn" href="#">Read Details</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="service2_item">
                        <div class="service2_item_inner">
                            <div class="service2_item_inner_content">
                                <div class="service_icon">
                                    <img src="img/icon/s2-icon-3.png" alt="">
                                    <img src="img/icon/s2-icon-hover-3.png" alt="">
                                </div>
                                <h4>REMODEL & REIMAGE</h4>
                                <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium
                                    dolorem-que laudantium totam rem aperiam.</p>
                                <a class="view_btn" href="#">Read Details</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Others Service Area =================-->

    <!--================Service Single Area =================-->
    <section class="service_single_area">
        <div class="container">
            <div class="service_single_inner">
                <div class="project_single_slider">
                    {{--                    <div id="slider" class="flexslider">--}}
                    {{--                        <ul class="slides">--}}
                    {{--                            @foreach($service->gallery as $item)--}}
                    {{--                                <li><img width="75%" height="75%"--}}
                    {{--                                         src="{{ asset("img/services/".$item->filename) }}" alt=""></li>--}}
                    {{--                            @endforeach--}}
                    {{--                        </ul>--}}
                    {{--                    </div>--}}
                    {{--                    <div id="carousel" class="flexslider">--}}
                    {{--                        <ul class="slides">--}}
                    {{--                            @foreach($service->gallery as $item)--}}
                    {{--                                <li><img width="150px" height="100px"--}}
                    {{--                                         src="{{ asset("img/services/".$item->filename) }}" alt=""></li>--}}
                    {{--                            @endforeach--}}
                    {{--                        </ul>--}}
                    {{--                        <div class="custom-navigation">--}}
                    {{--                            <a href="#" class="flex-prev"><i class="fa fa-angle-left"></i></a>--}}
                    {{--                            <a href="#" class="flex-next"><i class="fa fa-angle-right"></i></a>--}}
                    {{--                        </div>--}}
                    {{--                    </div>--}}
                </div>
                <div class="row s_text_inner">
                    <div class="col-md-6">
                        <div class="left_service_desc">
                            <h4 class="project_title">{{ $service->title }}</h4>
                            <p>{{ $service->description }}</p>
                            <ul>
                                <li><a href="#"><i class="fa fa-home" aria-hidden="true"></i>We are responsible</a></li>
                                <li><a href="#"><i class="fa fa-wrench" aria-hidden="true"></i>We take everything under
                                        control</a></li>
                                <li><a href="#"><i class="fa fa-lightbulb-o" aria-hidden="true"></i>Presented in 26
                                        countries</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="our_skill_inner">
                            <h4 class="project_title">{{ $service->title }}</h4>
                            <div class="single_skill">
                                <h3>Repairing</h3>
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="90" aria-valuemin="0"
                                         aria-valuemax="100">
                                        <div class="progress_parcent"><span class="counter">90</span>%</div>
                                    </div>
                                </div>
                            </div>
                            <div class="single_skill">
                                <h3>Painting</h3>
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="80" aria-valuemin="0"
                                         aria-valuemax="100">
                                        <div class="progress_parcent"><span class="counter">80</span>%</div>
                                    </div>
                                </div>
                            </div>
                            <div class="single_skill">
                                <h3>Gardening</h3>
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="70" aria-valuemin="0"
                                         aria-valuemax="100">
                                        <div class="progress_parcent"><span class="counter">70</span>%</div>
                                    </div>
                                </div>
                            </div>
                            <div class="single_skill">
                                <h3>Repairing</h3>
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="80" aria-valuemin="0"
                                         aria-valuemax="100">
                                        <div class="progress_parcent"><span class="counter">80</span>%</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="service_brochure">
                            <h4 class="project_title">Service Description</h4>
                            <p>Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos
                                himenaeos. Sed semper, lacus sed feugiat dictum. Sed ut perspiciatis unde omnis iste
                                natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque
                                ipsa quae ab illo inventore.</p>
                            <a href="#"><i class="fa fa-file-pdf-o" aria-hidden="true"></i>Download PDF</a>
                            <a href="#"><i class="fa fa-file-pdf-o" aria-hidden="true"></i>Download DOC</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Service Single Area =================-->

    <!--================Our Latest Project Area =================-->
    <section class="our_latest_project">
        <div class="container">
            <h3 class="out_title">Our Latest projects</h3>
            <div class="our_latest_slider owl-carousel">
                <div class="item">
                    <div class="project_item">
                        <img src="img/project/project-2/project-1.jpg" alt="">
                        <div class="project_hover">
                            <div class="project_hover_inner">
                                <div class="project_hover_content">
                                    <a href="#"><h4>Jahanara Vila</h4></a>
                                    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium </p>
                                    <a class="view_btn" href="#">View Project</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="project_item">
                        <img src="img/project/project-2/project-2.jpg" alt="">
                        <div class="project_hover">
                            <div class="project_hover_inner">
                                <div class="project_hover_content">
                                    <a href="#"><h4>Jahanara Vila</h4></a>
                                    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium </p>
                                    <a class="view_btn" href="#">View Project</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="project_item">
                        <img src="img/project/project-2/project-3.jpg" alt="">
                        <div class="project_hover">
                            <div class="project_hover_inner">
                                <div class="project_hover_content">
                                    <a href="#"><h4>Jahanara Vila</h4></a>
                                    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium </p>
                                    <a class="view_btn" href="#">View Project</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Our Latest Project Area =================-->

    <!--================Get Quote Area =================-->
    <section class="get_quote_area project_contact">
        <div class="container">
            <div class="pull-left">
                <h3>Save Your Money </h3>
                <h4>Call us today or Contact us to get started your project.. </h4>
            </div>
            <div class="pull-right">
                <a class="get_btn_black" href="#">Contact Us</a>
            </div>
        </div>
    </section>
    <!--================End Get Quote Area =================-->

@endsection
