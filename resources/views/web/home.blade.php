@extends('web.master.master')

@section('css')
<style>
    .banner p{
        color:#fff;
    }
</style>
@endsection

@section('content')

@if(!empty($slides) && $slides->count())
<!-- ==================== Start Slider ==================== -->
<header class="header" id="page">
    <div class="header-owl owl-carousel owl-theme">
        @foreach($slides as $slide)
        <div class="sec-hero display-table" style="background-image: url({{$slide->getimagem()}})">
            <div class="table-cell">
                <div class="overlay"></div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="banner">
                                <h1 class="handline">{{$slide->titulo}}</h1>
                                {!!$slide->content!!}
                                <a class="btn-1 btn-2 move-section" href="{{url($slide->link ?? '#')}}">Leia Mais</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach 
    </div>
</header>
<!-- ==================== End Slider ==================== -->
@endif


<!-- ==================== Start about ==================== -->
<!-- :: About -->
<section class="about py-100" id="about-us">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="img-box">
                    <div class="about-img">
                        <img class="img-fluid" src="{{url('frontend/assets/images/about/01_about.jpg')}}" alt="{{url('frontend/assets/images/about/01_about.jpg')}}">
                    </div>                            
                </div>
            </div>
            <div class="col-lg-8">
                <div class="text-box">
                    <div class="sec-title">
                        <h2>Escritório</h2>
                        <p>Nosso escritório possui sede no município de Itapeva, e 
                            atua também nas cidades de Itararé, Itaberá, Buri, Capão Bonito, 
                            Apiaí e Ribeirão Branco, bem como possui correspondente na cidade 
                            de Ubatuba-SP.<br>
                            Atuamos também em todas as cidades que possuem 
                            foros digitais (peticionamento eletrônico), inclusive na Capital SP.  
                            Seguindo os conceitos de eficiência e ética, o escritório conta 
                            com uma equipe qualificada, apostando sempre na qualidade dos 
                            serviços prestados.<br>
                            Nossa equipe tem como objetivo a prestação de um serviço 
                            célere e personalizado, visando atender os interesses dos clientes, 
                            solucionando o conflito, atuando também com orientação e prevenção 
                            de problemas futuros.Tudo na vida tem solução. Quando enfrentamos 
                            um problema, por mais grave que possa parecer, sempre haverá um 
                            caminho que levará ao revertimento da situação. Nessas horas, mesmo 
                            com toda a preocupação e desespero que lhes assolar, não deixe 
                            de tomar as providencias necessárias. Não desista de seus direitos. 
                            Vamos, juntos, encontrar uma solução!
                        
                        </p>
                    </div>                
                </div>
            </div>
        </div>
    </div>
</section>



<!-- :: Practice Area -->
<section class="practice-area py-100-70">
    <div class="container">   
    <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="sec-title text-center">
                    <h3>Áreas de Atuação</h3>
                </div>
            </div>
        </div>             
        <div class="row">
            <div class="col-md-6 col-lg-4">
                <div class="practice-area-item">                            
                    <h4>Direito Militar</h4>
                    <p class="pt-4">Orientação e defesa do Policial Militar nos procedimentos 
                        administrativos e processos judiciais referentes ao RDPM e 
                        patrocínio de ações contra o Estado em favor do PM 
                        Efetivo e Temporário... </p>
                    <a class="link-contact" href="atuacao.php">Leia Mais</a>                            
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="practice-area-item">                            
                    <h4>Direito Previdenciário</h4>
                    <p class="pt-4">Atuamos assessorando e orientando desde a contagem do tempo de 
                        contribuição, simulação do valor da aposentadoria, análise de 
                        vínculos empregatícios e recolhimentos...</p>
                    <a class="link-contact" href="atuacao.php">Leia Mais</a>                            
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="practice-area-item">                            
                    <h4>Diligências</h4>
                    <p class="pt-4">Facilitamos essa prática aos nossos colegas advogados que precisam de um advogado 
                        correspondente em Itapeva (SP) e região. Por meio do serviço de diligência, atuamos...</p>
                    <a class="link-contact" href="atuacao.php">Leia Mais</a>                            
                </div>
            </div>
        </div>
    </div>
</section> 

@if(!empty($artigos) && $artigos->count())
<!-- ==================== Start Blog ==================== -->
<!-- :: Blog -->
<section class="bolg py-100-70">
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="sec-title text-center">
                    <h3>Blog</h3>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach($artigos as $artigo)
            <div class="col-md-6 col-lg-4">
                <div class="blog-item">
                    <div class="img-box">
                        <a href="{{route('web.blog.artigo', ['slug' => $artigo->slug])}}" class="open-post">
                            <img class="img-fluid" src="{{url($artigo->cover())}}" alt="{{url($artigo->cover())}}">
                        </a>
                        <ul>
                            <li><a href="{{route('web.blog.categoria', ['slug' => $artigo->slug] )}}">{{$artigo->categoriaObject->titulo}}</a></li>
                        </ul>
                    </div>
                    <div class="text-box">
                        <a href="{{route('web.blog.artigo', ['slug' => $artigo->slug])}}" class="title-blog">
                            <h5>{{$artigo->titulo}}</h5>
                        </a>
                        <p>{!! $artigo->getContentWebAttribute() !!}</p>
                        <a href="{{route('web.blog.artigo', ['slug' => $artigo->slug])}}" class="link">Leia +</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!-- ==================== End Blog ==================== -->
@endif

@endsection

@section('js')
<script>
    $(function () {    

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });  

    });    
</script>
@endsection