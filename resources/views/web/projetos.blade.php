@extends('web.master.master')

@section('content')

@if(!empty($projetos) && $projetos->count() > 0)
<!-- ==================== Start Slider ==================== -->
<header class="work-header valign" style="padding-top:150px;">
    <div class="container">
        <div class="section-head text-center mb-5">
            <div class="row justify-content-center">
                <div class="col-lg-7 col-md-9 col-sm-11">
                    <h4 class="playfont">Confira aqui nossos Projetos</h4>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- ==================== End Slider ==================== -->

<!-- ==================== Start works ==================== -->
<section class="portfolio section-padding pt-5">
    <div class="container">
        <div class="row">

            <!-- gallery -->
            <div class="gallery twsty inf-lit full-width">
                @foreach($projetos as $projeto)
                <!-- gallery item -->
                <div class="items three-column mt-50">
                    <div class="item-img bg-img" data-background="{{$projeto->cover()}}">
                        <a href="{{route('web.projeto', ['slug' => $projeto->slug])}}">
                            <div class="item-img-overlay"></div>
                        </a>
                    </div>
                    <div class="info mt-10">
                        <h5>{{$projeto->titulo}}</h5>
                        <span>{{$projeto->categoria}}</span>
                    </div>
                </div>
                @endforeach
            </div>

            {{ $projetos->links() }}
            
        </div>
        
    </div>
</section>
<!-- ==================== End works ==================== -->
@endif

@endsection