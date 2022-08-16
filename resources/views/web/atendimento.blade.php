@extends('web.master.master')

@section('content')
<!-- :: Breadcrumb Header -->
<section class="breadcrumb-header" id="page" style="background-image: url({{url($configuracoes->gettopodosite())}})">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="banner">
                    <h1>Atendimento</h1>
                    <ul>
                        <li><a href="{{url('web.home')}}">Início</a></li>
                        <li><i class="fas fa-angle-right"></i></li>
                        <li>Atendimento</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- :: History -->
<section class="history">            
   
    <!-- :: Quote -->
    <div class="quote">
        <div class="container">
            <div class="box">
                <div class="row">
                    <div class="col-lg-5">
                        <p>
                            @if($configuracoes->telefone1) <i class="fas fa-phone"></i> <a class="link-contact" href="tel:{{$configuracoes->telefone1}}">{{$configuracoes->telefone1}}</a> @endif
                            @if($configuracoes->telefone2) <br><i class="fas fa-phone"></i> <a class="link-contact" href="tel:{{$configuracoes->telefone2}}">{{$configuracoes->telefone2}}</a> @endif
                            @if($configuracoes->telefone3) <br><i class="fas fa-phone"></i> <a class="link-contact" href="tel:{{$configuracoes->telefone3}}">{{$configuracoes->telefone3}}</a> @endif 
                        </p>
                        <p>
                            @if(!empty($Configuracoes->whatsapp))
                            <i style="font-size:1.7em;color:#6ebf58;" class="fab fa-whatsapp"></i> <a class="link-contact" style="border:none;" target="_blank" href="{{getNumZap($Configuracoes->whatsapp, 'Atendimento '.$configuracoes->nomedosite)}}">{{$Configuracoes->whatsapp}}</a>
                            @endif  
                        </p>
                        <p>
                            @if($configuracoes->email) <i class="fas fa-envelope"></i> <a class="link-contact" href="mailto:{{$configuracoes->email}}">{{$configuracoes->email}}</a> @endif
                            @if($configuracoes->email1) <br><i class="fas fa-envelope"></i> <a class="link-contact" href="mailto:{{$configuracoes->email1}}">{{$configuracoes->email1}}</a> @endif    
                        </p>
                        
                        <p><i class="fas fa-map-marker"></i> 
                            {{$configuracoes->rua}}    
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
                    <div class="col-lg-7">
                        <div class="quote-box">
                            <div class="sec-title">
                                <h3>Preencha o Formulário</h3>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                <form class="j_formsubmit" action="" method="post" autocomplete="off">
                                    @csrf
                                    <div id="js-contact-result"></div>                                    
                                    <!-- HONEYPOT -->
                                    <input type="hidden" class="noclear" name="bairro" value="" />
                                    <input type="text" class="noclear" style="display: none;" name="cidade" value="" />
                                    <div class="col-md-12 form_hide">
                                        <div class="quote-item">
                                            <input type="text" name="nome" placeholder="Nome">
                                        </div>
                                    </div>
                                    <div class="col-md-12 form_hide">
                                        <div class="quote-item">
                                            <input type="email" name="email" placeholder="Email">
                                        </div>
                                    </div>                                        
                                    <div class="col-md-12 form_hide">
                                        <div class="quote-item">
                                            <div class="quote-item">
                                                <textarea name="mensagem" placeholder="Digite sua mensagem aqui....."></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 form_hide">
                                        <div class="quote-item">
                                            <button type="submit" id="js-contact-btn" class="btn-1">Enviar Agora</button>
                                        </div>
                                    </div>
                                </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@section('js')
<script>
    $(function () {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

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
                    $('html, body').animate({scrollTop:$('#js-contact-result').offset().top-140}, 'slow');
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
                    form.find('#js-contact-btn').html("Enviar Agora");                                
                }

            });

            return false;
        });

    });
</script>
@endsection