@extends('web.master.master')

@section('content')

@if(!empty($servicos) && $servicos->count() > 0)
<!-- :: Breadcrumb Header -->
<section class="breadcrumb-header" id="page" style="background-image: url({{url($configuracoes->gettopodosite())}})">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="banner">
                    <h1>Áreas de Atuação</h1>
                    <ul>
                        <li><a href="{{url('web.home')}}">Início</a></li>
                        <li><i class="fas fa-angle-right"></i></li>
                        <li>Áreas de Atuação</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- :: Practice Area -->
<section class="practice-area py-100-70">
    <div class="container">                
        <div class="row">
            @foreach($servicos as $servico)
            <div class="col-md-6 col-lg-4">
                <div class="practice-area-item">                            
                    <h4>{{$servico->titulo}}</h4>
                    <p class="pt-4">{!!$servico->getContentWebAttribute()!!}</p>
                    <a class="link-contact" href="{{route('web.servico', ['slug' => $servico->slug])}}">Leia Mais</a>                            
                </div>
            </div>
            @endforeach 
            
            <div class="col-md-12">
                <div class="pagination-area">
                    @if($servicos->hasPages())                         
                        {{ $servicos->links() }}                         
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
@endif

@endsection