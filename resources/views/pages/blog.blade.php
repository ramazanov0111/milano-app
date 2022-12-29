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
                    <li class="active"><a href="{{ url('/blog') }}">Проекты</a></li>
                </ul>
            </div>
        </div>
    </section>
    <!--================End Banner Area =================-->

    <!--================Our Project2 Area =================-->
    <section class="our_project2_area project_grid_three">
        <div class="container">
            <div class="main_c_b_title">
                <h2>Our<br class="title_br">Projects</h2>
                <h6>Great & Awesome Works</h6>
            </div>
            <ul class="our_project_filter">
                <li class="active" data-filter="*"><a href="#">All</a></li>
                <li data-filter=".building"><a href="#">Buildings</a></li>
                <li data-filter=".interior"><a href="#">Interior</a></li>
                <li data-filter=".design"><a href="#">Design</a></li>
                <li data-filter=".isolation"><a href="#">Isolation</a></li>
                <li data-filter=".plumbing"><a href="#">Plumbing</a></li>
                <li data-filter=".tiling"><a href="#">Tiling</a></li>
            </ul>
            <div class="row our_project_details">
                <div class="col-md-4 col-sm-6 building isolation interior">
                    <div class="project_item">
                        <img src="img/project/project-grid-three/project-g-three-1.jpg" alt="">
                        <div class="project_hover">
                            <div class="project_hover_inner">
                                <div class="project_hover_content">
                                    <a href="#"><h4>Jahanara Vila</h4></a>
                                    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusan-tium
                                        doloremque laudantium</p>
                                    <a class="view_btn" href="#">View Project</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 building isolation tiling design">
                    <div class="project_item">
                        <img src="img/project/project-grid-three/project-g-three-2.jpg" alt="">
                        <div class="project_hover">
                            <div class="project_hover_inner">
                                <div class="project_hover_content">
                                    <a href="#"><h4>Jahanara Vila</h4></a>
                                    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusan-tium
                                        doloremque laudantium</p>
                                    <a class="view_btn" href="#">View Project</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 isolation tiling interior design plumbing">
                    <div class="project_item">
                        <img src="img/project/project-grid-three/project-g-three-3.jpg" alt="">
                        <div class="project_hover">
                            <div class="project_hover_inner">
                                <div class="project_hover_content">
                                    <a href="#"><h4>Jahanara Vila</h4></a>
                                    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusan-tium
                                        doloremque laudantium</p>
                                    <a class="view_btn" href="#">View Project</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 building isolation tiling plumbing">
                    <div class="project_item">
                        <img src="img/project/project-grid-three/project-g-three-4.jpg" alt="">
                        <div class="project_hover">
                            <div class="project_hover_inner">
                                <div class="project_hover_content">
                                    <a href="#"><h4>Jahanara Vila</h4></a>
                                    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusan-tium
                                        doloremque laudantium</p>
                                    <a class="view_btn" href="#">View Project</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 isolation tiling interior plumbing">
                    <div class="project_item">
                        <img src="img/project/project-grid-three/project-g-three-5.jpg" alt="">
                        <div class="project_hover">
                            <div class="project_hover_inner">
                                <div class="project_hover_content">
                                    <a href="#"><h4>Jahanara Vila</h4></a>
                                    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusan-tium
                                        doloremque laudantium</p>
                                    <a class="view_btn" href="#">View Project</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 building isolation tiling design plumbing">
                    <div class="project_item">
                        <img src="img/project/project-grid-three/project-g-three-6.jpg" alt="">
                        <div class="project_hover">
                            <div class="project_hover_inner">
                                <div class="project_hover_content">
                                    <a href="#"><h4>Jahanara Vila</h4></a>
                                    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusan-tium
                                        doloremque laudantium</p>
                                    <a class="view_btn" href="#">View Project</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 building isolation tiling plumbing">
                    <div class="project_item">
                        <img src="img/project/project-grid-three/project-g-three-7.jpg" alt="">
                        <div class="project_hover">
                            <div class="project_hover_inner">
                                <div class="project_hover_content">
                                    <a href="#"><h4>Jahanara Vila</h4></a>
                                    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusan-tium
                                        doloremque laudantium</p>
                                    <a class="view_btn" href="#">View Project</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 isolation tiling interior plumbing">
                    <div class="project_item">
                        <img src="img/project/project-grid-three/project-g-three-8.jpg" alt="">
                        <div class="project_hover">
                            <div class="project_hover_inner">
                                <div class="project_hover_content">
                                    <a href="#"><h4>Jahanara Vila</h4></a>
                                    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusan-tium
                                        doloremque laudantium</p>
                                    <a class="view_btn" href="#">View Project</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 building isolation tiling design plumbing">
                    <div class="project_item">
                        <img src="img/project/project-grid-three/project-g-three-9.jpg" alt="">
                        <div class="project_hover">
                            <div class="project_hover_inner">
                                <div class="project_hover_content">
                                    <a href="#"><h4>Jahanara Vila</h4></a>
                                    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusan-tium
                                        doloremque laudantium</p>
                                    <a class="view_btn" href="#">View Project</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Our Project2 Area =================-->

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
