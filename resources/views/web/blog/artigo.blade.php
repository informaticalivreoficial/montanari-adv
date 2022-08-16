@extends('web.master.master')

@section('css')
<link href="{{url(asset('frontend/assets/js/shadowbox/shadowbox.css'))}}" rel="stylesheet" type="text/css"/>
@endsection

@section('content')

<!-- :: Breadcrumb Header -->
<section class="breadcrumb-header" id="page" style="background-image: url({{$post->nocover()}})">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="banner">
                    <h1>{{$post->titulo}}</h1>
                    <ul>
                        <li><a href="{{url('web.home')}}">Início</a></li>
                        <li><i class="fas fa-angle-right"></i></li>
                        <li><a href="{{url('web.blog.artigos')}}">Blog</a></li>
                        <li><i class="fas fa-angle-right"></i></li>
                        <li>{{$post->titulo}}</li>
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
            <div class="col-lg-8">
                <div class="row">
                    <div class="col-md-12">
                        <div class="blog-item">
                            <div class="img-box">
                                <a class="open-post">
                                    <img class="img-fluid" src="{{$post->nocover()}}" alt="{{$post->cover()}}">
                                </a>
                                <ul>
                                    <li><a href="{{route('web.blog.categoria', ['slug' => $post->slug] )}}">{{$post->categoriaObject->titulo}}</a></li>
                                </ul>
                            </div>
                            <div class="text-box">
                                {!! $post->content !!}  

                                @if($post->images()->get()->count())
                                    <div class="row"> 
                                        @foreach($post->images()->get() as $image)
                                            <div class="col-3">
                                                <div class="mb-4">
                                                    <a href="{{ $image->getUrlImageAttribute() }}" title="{{ $post->titulo }}" rel="shadowbox[gallery]">
                                                        <img class="img-fluid" src="{{ $image->getUrlCroppedAttribute() }}" alt="{{ $image->getUrlCroppedAttribute() }}" title="{{ $post->titulo }}">
                                                    </a>
                                                </div>
                                            </div>                                                
                                        @endforeach
                                    </div>
                                @endif                                
                                <div class="share-post">
                                    <span>Compartilhar Artigo :</span>
                                    <div style="margin-right: 10px;" class="fb-share-button" data-href="{{url()->current()}}" data-layout="button_count" data-size="large"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u={{url()->current()}}&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Compartilhar</a></div>
                                    <a style="background-color: #6ebf58;color:#fff;border:none;padding:5px 10px;font-size:0.875em;margin-top:-12px;" class="btn btn-front" target="_blank" href="https://web.whatsapp.com/send?text={{url()->current()}}" data-action="share/whatsapp/share"><i class="fab fa-whatsapp"></i> Compartilhar</a>
                                </div>
                            </div>
                        </div>
                    </div>

                   
                    
                </div>
            </div>
            <div class="col-lg-4">
                <div class="widget">
                    <div class="widget-body">
                        <div class="search">
                            <form action="{{ route('web.pesquisa') }}" method="post" autocomplete="off">
                            <input type="search" name="search" placeholder="Pesquisar no site...">
                            <button type="submit" class="click"><i class="fas fa-search"></i></button>
                            </form>
                        </div>
                    </div>
                </div>                        
                <div class="widget">
                    <div class="widget-title">
                        <h3>Siga-nos</h3>
                    </div>
                    <div class="widget-body">
                        <div class="follow">
                            <ul class="icon">
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
                </div>
                <div class="widget">
                    <div class="widget-title">
                        <h3>categorias</h3>
                    </div>
                    <div class="categories">
                        <ul>
                            @if(!empty($categorias) && $categorias->count() > 0)
                                @foreach($categorias as $categoria)                                    
                                    @if($categoria->children)
                                        @foreach($categoria->children as $subcategoria)
                                            @if($subcategoria->countposts() >= 1)
                                                <li><a href="{{route('web.blog.categoria', ['slug' => $subcategoria->slug] )}}"><i class="fas fa-folder-open"></i> {{ $subcategoria->titulo }} <span><i class="fas fa-angle-right"></i></span></a></li>
                                            @endif                                            
                                        @endforeach
                                    @endif                                                                                                                             
                                @endforeach
                            @endif
                        </ul>
                    </div>
                </div>
                <div class="widget">
                    <div class="widget-title">
                        <h3>Veja Também :</h3>
                    </div>
                    <div class="news-box">
                        @if($postsMais->count())                            
                            @foreach($postsMais as $postsmais)
                            <div class="news-item">
                                <img src="{{$postsmais->cover()}}" alt="{{$postsmais->titulo}}" class="img-fluid">
                                <div class="item-content">
                                    <a class="title-blog" href="{{route('web.blog.artigo', ['slug' => $postsmais->slug] )}}">
                                        <h5>
                                            {{$postsmais->titulo}}
                                        </h5>
                                    </a>
                                </div>
                            </div>                            
                            @endforeach                            
                        @endif                         
                        
                    </div>
                </div>
                <div class="widget">
                    <div class="widget-title">
                        <h3>Tags</h3>
                    </div>
                    <div class="widget-body">
                        <div class="tags">
                            @if($postsTags->count())
                                <ul>
                                @foreach($postsTags as $posttags)                                
                                    <li>
                                        @php
                                            $array = explode(",", $posttags->tags);
                                            foreach($array as $tags){
                                                $tag = trim($tags);                                                       
                                                echo '<a href="'.route('web.blog.artigo', ['slug' => $posttags->slug]).'">'.$tag.'</a>';
                                            }
                                        @endphp                                                                         
                                    </li>                                                                                        
                                @endforeach
                                </ul>
                            @endif                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@section('js')
<script src="{{url(asset('frontend/assets/js/shadowbox/shadowbox.js'))}}"></script>
<script>
    Shadowbox.init();
</script>
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v11.0&appId=1787040554899561&autoLogAppEvents=1" nonce="1eBNUT9J"></script>
@endsection

