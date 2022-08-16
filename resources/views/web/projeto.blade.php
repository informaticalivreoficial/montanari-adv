@extends('web.master.master')

@section('css')
<link href="{{url(asset('frontend/assets/js/shadowbox/shadowbox.css'))}}" rel="stylesheet" type="text/css"/>
@endsection

@section('content')

@if(!empty($projeto))
<!-- ==================== Start Header ==================== -->
<header class="pages-header bg-img valign parallaxie" data-background="{{url($projeto->nocover())}}" data-overlay-dark="5">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="cont text-center">
                    <h1>{{$projeto->titulo}}</h1>
                    <div class="path">
                        <a href="{{url('web.home')}}">Início</a><span>/</span><a href="{{url('web.projetos')}}">Projetos</a><span>/</span><a class="active">{{$projeto->titulo}}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- ==================== End Header ==================== -->

<!-- ==================== Start Intro ==================== -->
<section class="intro-section section-padding" style="padding: 80px 0;">
    <div class="container">
        <div class="row">                
            <div class="col-12 mb-30">
                <div class="text">
                    <h4>{{$projeto->titulo}}</h4>
                    <p>
                        <div style="margin: 10px 0px;" class="fb-share-button" data-href="{{url()->current()}}" data-layout="button_count" data-size="large"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u={{url()->current()}}&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Compartilhar</a></div>
                        <a style="background-color: #6ebf58;color:#fff;border:none;padding:3px 10px;margin-top:-6px;font-size:0.875em;" class="btn btn-front" target="_blank" href="https://web.whatsapp.com/send?text={{url()->current()}}" data-action="share/whatsapp/share"><i class="fab fa-whatsapp"></i> Compartilhar</a>
                    </p>
                    {!!$projeto->content!!}
                </div>
            </div>
            
        </div>
    </div>
</section>
<!-- ==================== End Intro ==================== -->
@if($projeto->images()->get()->count())
    <!-- ==================== Start projdtal ==================== -->
    <section class="projdtal">
        <div class="justified-gallery">
            @foreach($projeto->images()->get() as $image)
                <a href="{{ $image->getUrlImageAttribute() }}" rel="shadowbox[gallery]">
                    <img alt="{{ $projeto->titulo }}" src="{{ $image->getUrlCroppedSiteAttribute() }}" />
                </a>
            @endforeach                        
        </div>
    </section>
    <!-- ==================== End projdtal ==================== -->    
@endif

@if($projeto->video1 || $projeto->video2)
<!-- ==================== Start Video-wrapper ==================== -->
<section>
    <div class="container-fluid">
        <div class="video-wrapper section-padding bg-img parallaxie valign"
            data-background="{{url($projeto->nocover())}}" data-overlay-dark="4">
            <div class="full-width text-center">
                <a class="vid" href="{{$projeto->video1}}">
                    <div class="vid-butn">
                        <span class="icon">
                            <i class="fas fa-play"></i>
                        </span>
                    </div>
                </a>
            </div>
        </div>
    </div>
</section>
<!-- ==================== End Video-wrapper ==================== -->
@endif

@endif 

@if(!empty($projetonext) && $projetonext->count() > 0)
<!-- ==================== Start call-to-action ==================== -->
<section class="call-action nogif next">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="content text-center">
                    <a href="{{route('web.projeto',['slug' => $projetonext->slug])}}">
                        <h6 class="wow" data-splitting>Próximo Projeto</h6>
                        <h2 class="wow" data-splitting><b> {{$projetonext->titulo}} </b></h2>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="nxt-img bg-img" data-background="{{url($projetonext->cover())}}"></div>
</section>
<!-- ==================== End call-to-action ==================== -->
@endif

@endsection

@section('js')
<script src="{{url(asset('frontend/assets/js/shadowbox/shadowbox.js'))}}"></script>
<script>
    Shadowbox.init();
</script>
<script>
    $(function () {      

        $("a.vid").YouTubePopUp();

        // Seletor, Evento/efeitos, CallBack, Ação
        $('.j_formsubmit').submit(function (){
            var form = $(this);
            var dataString = $(form).serialize();

            $.ajax({
                url: "{{ route('web.sendEmail') }}",
                data: dataString,
                type: 'GET',
                dataType: 'JSON',
                beforeSend: function(){
                    form.find("#js-contact-btn").attr("disabled", true);
                    form.find('#js-contact-btn').html("Carregando...");                
                    form.find('.alert').fadeOut(500, function(){
                        $(this).remove();
                    });
                },
                success: function(resposta){
                    $('html, body').animate({scrollTop:$('#js-contact-result').offset().top-40}, 'slow');
                    if(resposta.error){
                        form.find('#js-contact-result').html('<div class="alert alert-danger error-msg">'+ resposta.error +'</div>');
                        form.find('.error-msg').fadeIn();                    
                    }else{
                        form.find('#js-contact-result').html('<div class="alert alert-success error-msg">'+ resposta.sucess +'</div>');
                        form.find('.error-msg').fadeIn();                    
                        form.find('input[class!="noclear"]').val('');
                        form.find('textarea[class!="noclear"]').val('');
                        form.find('.form_hide').fadeOut(500);
                    }
                },
                complete: function(resposta){
                    form.find("#js-contact-btn").attr("disabled", false);
                    form.find('#js-contact-btn').html("Enviar");                                
                }

            });

            return false;
        });

        $(document).on('click', '[data-toggle="lightbox"]', function(event) {
            event.preventDefault();
            $(this).ekkoLightbox({
            alwaysShowClose: true
            });
        });

    });

</script>
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v11.0&appId=1787040554899561&autoLogAppEvents=1" nonce="1eBNUT9J"></script>

@endsection