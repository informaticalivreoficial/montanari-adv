<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
        <meta name="language" content="{{ str_replace('_', '-', app()->getLocale()) }}" />
        
        <meta name="author" content="Renato Montanari"/>
        <meta name="copyright" content="{{$configuracoes->ano_de_inicio}} {{$configuracoes->nomedosite}}">
        <meta name="description" content="{{$configuracoes->descricao}}" />    
        <meta name="url" content="{{$configuracoes->dominio}}" />
        <meta name="title" content="{{$configuracoes->nomedosite}}" />
        <meta name="keywords" content="{{$configuracoes->metatags}}" />
        
        {!! $head ?? '' !!}

        <!-- :: Bootstrap CSS -->
        <link rel="stylesheet" href="{{url(mix('frontend/assets/css/bootstrap.min.css'))}}">

        <!-- :: Favicon -->
        <link rel="shortcut icon" href="{{$configuracoes->getfaveicon()}}"/>
        <link rel="apple-touch-icon" href="{{$configuracoes->getfaveicon()}}"/>
        <link rel="apple-touch-icon" sizes="72x72" href="{{$configuracoes->getfaveicon()}}"/>
        <link rel="apple-touch-icon" sizes="114x114" href="{{$configuracoes->getfaveicon()}}"/>


        <!-- :: Google Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&family=Poppins:wght@400;500;600;700&display=swap">

        <!-- :: Fontawesome -->
        <link rel="stylesheet" href="{{url(asset('frontend/assets/fonts/fontawesome/css/all.min.css'))}}">

        <!-- :: Flaticon -->
        <link rel="stylesheet" href="{{url(asset('frontend/assets/fonts/flaticon/css/flaticon.css'))}}">

        <!-- :: OWL Carousel --> 
        <!-- :: Nice Select CSS -->
        <!-- :: Lity -->
        <!-- :: Animate CSS -->
        <link rel="stylesheet" href="{{url(mix('frontend/assets/css/lib.css'))}}">

        <!-- :: Style CSS -->
        <link rel="stylesheet" href="{{url(mix('frontend/assets/css/style.css'))}}">

        <!-- :: Style Responsive CSS -->
        <link rel="stylesheet" href="{{url(mix('frontend/assets/css/responsive.css'))}}">
        <link rel="stylesheet" href="{{url(mix('frontend/assets/css/renato.css'))}}">

        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

        @hasSection('css')
            @yield('css')
        @endif
        
        <meta name="csrf-token" content="{{ csrf_token() }}">
    </head>
    <body>

        <header class="navs">
            <div class="nav-top">
                <div class="container">
                    <div class="nav-top-box d-flex align-items-center justify-content-between">
                        <ul class="info">
                            @if(!empty($configuracoes->email))
                                <li>{{$configuracoes->email}}</li>
                            @endif
                            @if(!empty($configuracoes->whatsapp))
                                <li><i style="font-size:1.2em;color:#6ebf58;" class="fab fa-whatsapp"></i> <a href="{{getNumZap($Configuracoes->whatsapp, 'Atendimento '.$configuracoes->nomedosite)}}">{{$configuracoes->whatsapp}}</a></li>
                            @endif  
                        </ul>
                        <ul class="icon-follow">
                            @if(!empty($configuracoes->facebook))
                                <li><a class="icon" target="_blank" href="{{$configuracoes->facebook}}" title="Facebook"><i class="fab fa-facebook-f"></i></a></li>
                            @endif
                            @if(!empty($configuracoes->twitter))
                                <li><a class="icon" target="_blank" href="{{$configuracoes->twitter}}" title="Twitter"><i class="fab fa-twitter"></i></a></li>
                            @endif
                            @if(!empty($configuracoes->instagram))
                                <li><a class="icon" target="_blank" href="{{$configuracoes->instagram}}" title="Instagram"><i class="fab fa-instagram"></i></a></li>
                            @endif                                
                            @if(!empty($configuracoes->youtube))
                                <li><a class="icon" target="_blank" href="{{$configuracoes->youtube}}" title="Youtube"><i class="fab fa-youtube"></i></a></li>
                            @endif                  
                            <li><a class="icon open-search-box" href="#"><i class="fas fa-search"></i></a></li>
                            <li><a class="icon open-menu" href="#"><i class="fas fa-th"></i></a></li>
                            <li><a class="btn-1 btn-2" href="{{route('web.atendimento')}}">Consulta</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- :: Navbar -->
            <nav class="nav-bar">
                <div class="container">
                    <div class="box-content d-flex align-items-center justify-content-between">
                        <div class="logo">
                            <a href="{{route('web.home')}}" class="logo-nav">
                                <img class="img-fluid one" src="{{url(asset('frontend/assets/images/logo/01_logo.png'))}}" alt="{{url(asset('frontend/assets/images/logo/01_logo.png'))}}">
                                <img class="img-fluid two" src="{{$configuracoes->getlogomarca()}}" alt="{{$configuracoes->getlogomarca()}}">
                            </a>
                            <a href="#open-nav-bar-menu" class="open-nav-bar">
                                <span></span>
                                <span></span>
                                <span></span>
                            </a>
                        </div>
                        <div class="nav-bar-link" id="open-nav-bar-menu">
                            <ul class="level-1">
                                <li><a href="{{route('web.home')}}#about-us">Escritório</a></li> 
                                <li><a href="{{route('web.servicos')}}">Áreas de Atuação</a></li>
                                <li><a href="{{route('web.blog.artigos')}}">Blog</a></li>
                                <li><a href="{{route('web.atendimento')}}">Atendimento</a></li>
                            </ul>
                        </div>
                        <div class="info-nav">
                            <i class="flaticon-call"></i>
                            <div class="contact-nav">
                                <p>
                                    @if($configuracoes->telefone1) <a href="tel:{{$configuracoes->telefone1}}">{{$configuracoes->telefone1}}</a> @endif
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
        </header>

        <!-- :: Search Box -->
        <div class="search-box">
            <form action="{{ route('web.pesquisa') }}" method="post" autocomplete="off">
                @csrf
                <div id="js-search-result"></div>
                <input type="search" name="search" placeholder="Pesquisar"/>
                <button type="submit"><i class="fas fa-search"></i></button>
            </form>
            <i class="fas fa-times close-search"></i>
        </div>

        <!-- :: Menu Box -->
        <div class="menu-box">
            <div class="inner-menu">
                <div class="website-info">
                    <a href="{{route('web.home')}}" class="logo"><img class="img-fluid" src="{{$configuracoes->getlogomarca()}}" alt="{{$configuracoes->nomedosite}}"></a>                    
                </div>
                <div class="contact-info">
                    <h4>Atendimento</h4>
                    <div class="contact-box">
                        <i class="flaticon-call"></i>
                        <div class="box">
                            <p>
                                @if($configuracoes->telefone1) <a style="color:#23406C;" href="tel:{{$configuracoes->telefone1}}">{{$configuracoes->telefone1}}</a> @endif
                                @if($configuracoes->telefone2) <br><a style="color:#23406C;" href="tel:{{$configuracoes->telefone2}}">{{$configuracoes->telefone2}}</a> @endif
                                @if($configuracoes->telefone3) <br><a style="color:#23406C;" href="tel:{{$configuracoes->telefone3}}">{{$configuracoes->telefone3}}</a> @endif
                            </p>
                        </div>
                    </div>
                    <div class="contact-box">
                        <i class="flaticon-email"></i>
                        <div class="box">
                            <p>
                                @if($configuracoes->email) <a style="color:#23406C;" href="mailto:{{$configuracoes->email}}">{{$configuracoes->email}}</a> @endif
                                @if($configuracoes->email1) <br><a style="color:#23406C;" href="mailto:{{$configuracoes->email1}}">{{$configuracoes->email1}}</a> @endif    
                            </p>
                        </div>
                    </div>
                    <div class="contact-box">
                        <i class="flaticon-location"></i>
                        <div class="box">
                            <p>{{$configuracoes->rua}}    
                                @if(!empty($configuracoes->num) && !empty($configuracoes->rua))
                                , {{$configuracoes->num}}
                                @endif
                                @if(!empty($configuracoes->bairro) && !empty($configuracoes->rua))
                                - {{$configuracoes->bairro}}
                                @endif
                                @if(!empty($configuracoes->cidade))
                                @php
                                    echo getCidadeNome($configuracoes->cidade, 'cidades').' - Brasil';
                                @endphp
                                @endif</p>
                        </div>
                    </div>
                </div>
                <div class="follow-us">
                    <h4>Siga nos</h4>
                    <ul class="icon-follow">
                        @if(!empty($configuracoes->facebook))
                            <li><a target="_blank" href="{{$configuracoes->facebook}}" title="Facebook"><i class="fab fa-facebook-f"></i></a></li>
                        @endif
                        @if(!empty($configuracoes->twitter))
                            <li><a target="_blank" href="{{$configuracoes->twitter}}" title="Twitter"><i class="fab fa-twitter"></i></a></li>
                        @endif
                        @if(!empty($configuracoes->instagram))
                            <li><a target="_blank" href="{{$configuracoes->instagram}}" title="Instagram"><i class="fab fa-instagram"></i></a></li>
                        @endif                                
                        @if(!empty($configuracoes->youtube))
                            <li><a target="_blank" href="{{$configuracoes->youtube}}" title="Youtube"><i class="fab fa-youtube"></i></a></li>
                        @endif
                    </ul>
                </div>
                <div class="exit-menu-box">
                    <i class="fas fa-times"></i>
                </div>
            </div>
        </div>

        @yield('content')

        <!-- :: Footer -->
        <footer class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-5">
                        <div class="logo">
                            <img class="img-fluid" src="{{url('frontend/assets/images/logo/01_logo.png')}}" alt="{{$Configuracoes->nomedosite}}">
                            <p>{{$configuracoes->descricao}}</p>
                            <ul>
                                @if(!empty($configuracoes->facebook))
                                    <li><a target="_blank" href="{{$configuracoes->facebook}}" title="Facebook"><i class="fab fa-facebook-f"></i></a></li>
                                @endif
                                @if(!empty($configuracoes->twitter))
                                    <li><a target="_blank" href="{{$configuracoes->twitter}}" title="Twitter"><i class="fab fa-twitter"></i></a></li>
                                @endif
                                @if(!empty($configuracoes->linkedin))
                                    <li><a target="_blank" href="{{$configuracoes->linkedin}}" title="Linkedin"><i class="fab fa-linkedin"></i></a></li>
                                @endif
                                @if(!empty($configuracoes->instagram))
                                    <li><a target="_blank" href="{{$configuracoes->instagram}}" title="Instagram"><i class="fab fa-instagram"></i></a></li>
                                @endif                                
                                @if(!empty($configuracoes->fliccr))
                                    <li><a target="_blank" href="{{$configuracoes->fliccr}}" title="Flickr"><i class="fab fa-flickr"></i></a></li>
                                @endif                                
                                @if(!empty($configuracoes->youtube))
                                    <li><a target="_blank" href="{{$configuracoes->youtube}}" title="Youtube"><i class="fab fa-youtube"></i></a></li>
                                @endif
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-3">
                        <div class="footer-title">
                            <h4>Institucional</h4>
                        </div>
                        <ul class="links">
                            <li><a href="index.php">Início</a></li>
                            <li><a href="{{route('web.home')}}#about-us" title="Escritório">Escritório</a></li>
                            <li><a href="{{route('web.servicos')}}">Áreas de Atuação</a></li>
                            <li><a href="{{route('web.blog.artigos')}}"  title="Blog">Blog</a></li>
                            <li><a href="{{route('web.atendimento')}}"  title="Atendimento">Atendimento</a></li>
                        </ul>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-4">
                        <div class="footer-title">
                            <h4>Cliente</h4>
                        </div>
                        <ul class="links">
                            <li><a href="#">Acessar Minha Conta</a></li>
                            <li><a href="#">2ª Via De Boletos</a></li>
                            <li><a href="#">Materiais para Downloads</a></li>
                        </ul>
                    </div>            
                </div>
            </div>
            <div class="copyright" style="padding-bottom: 0;">
                <div class="container">
                    <p>© {{$configuracoes->ano_de_inicio}} {{$configuracoes->nomedosite}} - Todos os direitos reservados</p>
                    <ul>
                        <li><a href="{{route('web.politica-de-privacidade')}}">Política de Privacidade</a></li>
                    </ul>
                </div>
            </div>
            <div class="copyright" style="color:#fff;margin-top: 0; padding: 0;">
                <div class="container">
                    <p class="p-2">Feito com <i style="color:red;" class="fa fa-heart"></i> por <a style="color:#fff;" target="_blank" href="https://informaticalivre.com">Informática Livre</a></p>
               </div>
            </div>
        </footer>

        <!-- :: Button Dark Mode -->
        <div class="dark-mode-decision">
            <i class="fas fa-moon"></i>
        </div>

        <!-- :: Scroll UP -->
        <div class="scroll-up">
            <a href="#page" class="move-section">
                <i class="fas fa-long-arrow-alt-up"></i>
            </a>
        </div>

        <!-- :: jQuery JS -->
        <script src="{{url(mix('frontend/assets/js/jquery-3.5.1.min.js'))}}"></script>

        <!-- :: Popper JS -->
        <script src="{{url(mix('frontend/assets/js/popper.min.js'))}}"></script>

        <!-- :: BootStrap JS -->
        <script src="{{url(mix('frontend/assets/js/bootstrap.min.js'))}}"></script>

        <!-- :: OWL Carousel -->
        <!-- :: Nice Select -->       
        <!-- :: Waypoints -->
        <!-- :: CounterUp -->
        <!-- :: Lity -->
        <script src="{{url(mix('frontend/assets/js/lib.js'))}}"></script>
        
        <!-- :: Main JS -->
        <script src="{{url(mix('frontend/assets/js/main.js'))}}"></script> 

        @hasSection('js')
            @yield('js')
        @endif

        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=G-G390M0E6LG"></script>
        <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-G390M0E6LG');
        </script>
        
    </body>
</html>
