@extends('web.master.master')

@section('content')

<!-- :: Breadcrumb Header -->
<section class="breadcrumb-header" id="page" style="background-image: url({{url($configuracoes->gettopodosite())}})">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="banner">
                    <h1>Política de Privacidade</h1>
                    <ul>
                        <li><a href="{{url('web.home')}}">Início</a></li>
                        <li><i class="fas fa-angle-right"></i></li>
                        <li>Política de Privacidade</li>
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
                                {!! $Configuracoes->politica_privacidade !!} 
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>            
        </div>
    </div>
</section>

@endsection