@extends('web.master.master')

@section('content')
<!-- :: Breadcrumb Header -->
<section class="breadcrumb-header" id="page" style="background-image: url({{url($configuracoes->gettopodosite())}})">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="banner">
                    <h1>Resultado da pesquisa por {{$search}}</h1>
                    <ul>
                        <li><a href="{{url('web.home')}}">Início</a></li>
                        <li><i class="fas fa-angle-right"></i></li>
                        <li>Resultado da pesquisa por {{$search}}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- :: Single Blog -->
<section class="single-bolg py-100-70">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="row">
                    <div class="col-md-12">
                        <div class="blog-item">                           
                            <div class="text-box">
                                <h5><a>Encontrados {{$ctotal }} resultados</a></h5> 
                                @if(!empty($servicos) && $servicos->count() > 0)
                                    @foreach($servicos as $servico)
                                        <p>
                                            <a style="color: #A6CE39;" href="{{route('web.servico', [ 'slug' => $servico->slug ])}}">Atuação - {{$servico->titulo}}</a><br>
                                            <span style="font-size: 0.865em">{{strip_tags($servico->getContentWebAttribute())}}</span>
                                        </p>  
                                    @endforeach
                                @endif 

                                @if(!empty($artigos) && $artigos->count() > 0)
                                    @foreach($artigos as $artigo)
                                        <p>
                                            <a style="color: #A6CE39;" href="{{route('web.blog.artigo', [ 'slug' => $artigo->slug ])}}">Artigo - {{$artigo->titulo}}</a><br>
                                            <span style="font-size: 0.865em">{{strip_tags($artigo->getContentWebAttribute())}}</span>
                                        </p>  
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>            
        </div>
    </div>
</section>

@endsection