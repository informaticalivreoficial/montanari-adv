@extends('web.master.master')

@section('content')
<!-- :: Breadcrumb Header -->
<section class="breadcrumb-header" id="page" style="background-image: url({{url($configuracoes->gettopodosite())}})">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="banner">
                    <h1>Blog</h1>
                    <ul>
                        <li><a href="{{url('web.home')}}">Início</a></li>
                        <li><i class="fas fa-angle-right"></i></li>
                        <li>Blog</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

@if($posts->count())
<!-- :: Blog -->
<section class="bolg py-100">
    <div class="container">                
        <div class="row">
            @foreach($posts as $artigo)
            <div class="col-md-6 col-lg-4">
                <div class="blog-item">
                    <div class="img-box">
                        <a href="{{route('web.blog.artigo',['slug' => $artigo->slug])}}" class="open-post">
                            <img class="img-fluid" src="{{$artigo->sitecover()}}" alt="{{$artigo->sitecover()}}">
                        </a>
                        <ul>
                            <li><a>{{$artigo->categoriaObject->titulo}}</a></li>
                        </ul>
                    </div>
                    <div class="text-box">
                        <a href="{{route('web.blog.artigo',['slug' => $artigo->slug])}}" class="title-blog">
                            <h5>{{$artigo->titulo}}</h5>
                        </a>
                        <p>{!! $artigo->getContentWebSiteAttribute() !!}</p>
                        <a href="{{route('web.blog.artigo',['slug' => $artigo->slug])}}" class="link">Leia +</a>
                    </div>
                </div>
            </div>
            @endforeach                               
            
            <div class="col-md-12">
                <div class="pagination-area">
                    @if($posts->hasPages())                         
                        {{ $posts->links() }}                         
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
@endif

@endsection