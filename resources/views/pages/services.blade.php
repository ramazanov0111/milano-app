@extends('index')

@section('title', 'Наши услуги')

@section('content')

    <!--================Banner Area =================-->
    <section class="banner_area">
        <div class="container">
            <div class="banner_inner_text">
                <h4>Наши услуги</h4>
                <ul>
                    <li><a href="{{ url('/') }}">Главная</a></li>
                    <li class="active"><a href="{{ url('/services') }}">Услуги</a></li>
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

                @foreach($services as $service)
                    <div class="col-md-4 col-sm-6">
                        <div class="service2_item">
                            <div class="service2_item_inner">
                                <div class="service2_item_inner_content">
                                    <div class="service_icon">
                                        <img width="80px" height="80px" src="{{ asset("img/services/".$service->image->filename) }}" alt="">
                                        <img width="80px" height="80px" src="{{ asset("img/projects/".$service->image->filename) }}" alt="">
                                    </div>
                                    <h4>{{ $service->title }}</h4>
                                    <p>{{ $service->description }}</p>
                                    <a class="view_btn" href="{{ url("/services/" . $service->slug) }}">Посмотреть детали</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

                <div class="col-md-4 col-sm-6">
                    <div class="service2_item">
                        <div class="service2_item_inner">
                            <div class="service2_item_inner_content">
                                <div class="service_icon">
                                    <img src="img/icon/s2-icon-1.png" alt="">
                                    <img src="img/icon/s2-icon-hover-1.png" alt="">
                                </div>
                                <h4>NEW-CONSTRUCTION</h4>
                                <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium
                                    dolorem-que
                                    laudantium totam rem aperiam.</p>
                                <a class="view_btn" href="#">Read Details</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="service2_item">
                        <div class="service2_item_inner">
                            <div class="service2_item_inner_content">
                                <div class="service_icon">
                                    <img src="img/icon/s2-icon-2.png" alt="">
                                    <img src="img/icon/s2-icon-hover-2.png" alt="">
                                </div>
                                <h4>LOCATION</h4>
                                <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium
                                    dolorem-que
                                    laudantium totam rem aperiam.</p>
                                <a class="view_btn" href="#">Read Details</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="service2_item">
                        <div class="service2_item_inner">
                            <div class="service2_item_inner_content">
                                <div class="service_icon">
                                    <img src="img/icon/s2-icon-3.png" alt="">
                                    <img src="img/icon/s2-icon-hover-3.png" alt="">
                                </div>
                                <h4>REMODEL & REIMAGE</h4>
                                <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium
                                    dolorem-que
                                    laudantium totam rem aperiam.</p>
                                <a class="view_btn" href="#">Read Details</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="service2_item">
                        <div class="service2_item_inner">
                            <div class="service2_item_inner_content">
                                <div class="service_icon">
                                    <img src="img/icon/s2-icon-4.png" alt="">
                                    <img src="img/icon/s2-icon-hover-4.png" alt="">
                                </div>
                                <h4>Pre-CONSTRUCTION</h4>
                                <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium
                                    dolorem-que
                                    laudantium totam rem aperiam.</p>
                                <a class="view_btn" href="#">Read Details</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="service2_item">
                        <div class="service2_item_inner">
                            <div class="service2_item_inner_content">
                                <div class="service_icon">
                                    <img src="img/icon/s2-icon-5.png" alt="">
                                    <img src="img/icon/s2-icon-hover-5.png" alt="">
                                </div>
                                <h4>civil & architecture</h4>
                                <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium
                                    dolorem-que
                                    laudantium totam rem aperiam.</p>
                                <a class="view_btn" href="#">Read Details</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="service2_item">
                        <div class="service2_item_inner">
                            <div class="service2_item_inner_content">
                                <div class="service_icon">
                                    <img src="img/icon/s2-icon-6.png" alt="">
                                    <img src="img/icon/s2-icon-hover-6.png" alt="">
                                </div>
                                <h4>engineering</h4>
                                <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium
                                    dolorem-que
                                    laudantium totam rem aperiam.</p>
                                <a class="view_btn" href="#">Read Details</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Our Service2 Area =================-->

@endsection
