<header class="main_header_area transparent_menu">
    <div class="header_top_area">
        <div class="container">
            <div class="pull-left">
                <a href="#"><i class="fa fa-phone"></i>+7 (988) 446 77 70</a>
                <a href="#"><i class="fa fa-map-marker"></i>Москва, Московская обл.</a>
                <a href="#"><i class="mdi mdi-clock"></i>08:00 - 18:00</a>
            </div>
            <div class="pull-right">
                <ul class="header_social">
                    <li><a href="#"><i class="fa fa-telegram"></i></a></li>
                    <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                    <li><a href="#"><i class="fa fa-whatsapp"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="main_menu_area">
        <div class="container">
            <nav class="navbar navbar-default">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                            data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#"><img src="img/logo-white.png" alt=""><img src="img/logo.png"
                                                                                               alt=""></a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="{{ url('/') }}">Главная</a></li>
                        <li><a href="{{ url('/projects') }}">Проекты</a></li>
{{--                        <li><a href="{{ url('/services') }}">Услуги</a></li>--}}
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown"
                               role="button" aria-expanded="false">Услуги</a>
                            <ul class="dropdown-menu" role="menu" id="categories">
{{--                                @foreach($categories as $category)--}}
{{--                                <li>--}}
{{--                                    <a style="color: #343a40;" class="nav-link"--}}
{{--                                       href="{{ url('/services/'.$category->slug) }}">--}}
{{--                                        {{ $category->title }}--}}
{{--                                    </a>--}}
{{--                                </li>--}}
{{--                                @endforeach--}}
                            </ul>
                        </li>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </nav>
        </div>
    </div>
</header>

<script>
    const ul = document.getElementById('categories');
    const url = window.location.origin + '/categories';

    function createNode(element) {
        return document.createElement(element);
    }

    function append(parent, el) {
        return parent.appendChild(el);
    }

    fetch(url)
        .then(response => response.json())
        .then(function(data) {
            return data.map(function(category) {
                let li = createNode('li');
                let a = createNode('a');
                a.innerHTML = `${category.title}`;
                a.href = window.location.origin + '/categories/' + `${category.slug}`;
                a.className = 'nav-link';
                a.style = "color: #343a40;"
                li.className = '';
                append(li, a);
                append(ul, li);
            })
        })
</script>
