@extends('web.master.master')

@section('css')
<link href="{{url(asset('frontend/assets/js/shadowbox/shadowbox.css'))}}" rel="stylesheet" type="text/css"/>
@endsection

@section('content')
<!-- :: Breadcrumb Header -->
<section class="breadcrumb-header" id="page" style="background-image: url({{url($configuracoes->gettopodosite())}})">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="banner">
                    <h1>Diligências</h1>
                    <ul>
                        <li><a href="index.php">Início</a></li>
                        <li><i class="fas fa-angle-right"></i></li>
                        <li>Diligências</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- :: Single Practice Areas -->
<section class="single-practice-areas py-100-70">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                {{--<div class="single-practice-areas-head">
                    <h4>{{$servico->titulo}}</h4>
                </div>
                <ul class="single-practice-areas-list">
                    <li><a href="atuacao.php">Direito Militar <i class="fas fa-angle-right"></i></a></li>
                    <li><a href="atuacao.php">Direito Previdenciário <i class="fas fa-angle-right"></i></a></li>
                    <li class="active"><a href="atuacao.php">Diligências <i class="fas fa-angle-right"></i></a></li>
                </ul>--}}
                <div class="call-back">
                    <i class="flaticon-call"></i>
                    <h5>Atendimento</h5>                    
                    @if($configuracoes->telefone1) <p><a href="tel:{{$configuracoes->telefone1}}">{{$configuracoes->telefone1}}</a></p> @endif
                    @if($configuracoes->telefone2) <p><a class="link-contact" href="tel:{{$configuracoes->telefone2}}">{{$configuracoes->telefone2}}</a></p> @endif
                    @if($configuracoes->telefone3) <p><a href="tel:{{$configuracoes->telefone3}}">{{$configuracoes->telefone3}}</a></p> @endif                    
                    
                </div>
            </div>
            <div class="col-lg-8">
                <div class="single-practice-areas-box">
                    <h3>{{$servico->titulo}}</h3>
                    {!!$servico->content!!}
                </div>
                @if($servico->images()->get()->count())
                    <div class="row"> 
                        @foreach($servico->images()->get() as $image)
                            <div class="col-3">
                                <div class="mb-4">
                                    <a href="{{ $image->getUrlImageAttribute() }}" title="{{ $servico->titulo }}" rel="shadowbox[gallery]">
                                        <img class="img-fluid" src="{{ $image->getUrlCroppedAttribute() }}" alt="{{ $image->getUrlCroppedAttribute() }}" title="{{ $servico->titulo }}">
                                    </a>
                                </div>
                            </div>                                                
                        @endforeach
                    </div>
                @endif
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