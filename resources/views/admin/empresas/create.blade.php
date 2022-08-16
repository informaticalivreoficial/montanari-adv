@extends('admin.master.master')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Nova Empresa</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Painel de Controle</a></li>
                    <li class="breadcrumb-item"><a href="{{route('admin.empresas.index')}}">Empresas</a></li>
                    <li class="breadcrumb-item active">Nova Empresa</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
               @if($errors->all())
                    @foreach($errors->all() as $error)
                        @message(['color' => 'danger'])
                        {{ $error }}
                        @endmessage
                    @endforeach
                @endif 
            </div>            
        </div>
        <form action="{{ route('admin.empresas.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">            
            <div class="col-12">
                <div class="card card-primary">                    
                    
                    <div class="card-body">

                                <div class="row mb-4">
                                    <div class="col-12 col-md-6 col-lg-4"> 
                                        <div class="form-group">
                                            <label class="labelforms"><b>*Responsável Legal:</b></label>
                                            <select class="form-control" name="user">
                                                <option value="" selected>Selecione um responsável legal</option> 
                                                @foreach($users as $user)                                                    
                                                    <option value="{{ $user->id }}" {{ (old('user') == $user->id ? 'selected' : '') }}>{{ $user->name }} ({{ $user->cpf }})</option>                                                   
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-4"> 
                                        <div class="form-group">
                                            <label class="labelforms"><b>*Razão Social:</b></label>
                                            <input type="text" class="form-control" placeholder="Razão Social" name="social_name" value="{{ old('social_name') }}">
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-4"> 
                                        <div class="form-group">
                                            <label class="labelforms"><b>Nome Fantasia:</b></label>
                                            <input type="text" class="form-control" placeholder="Nome Fantasia" name="alias_name" value="{{ old('alias_name') }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <div class="col-12 col-md-6 col-lg-4"> 
                                        <div class="form-group">
                                            <label class="labelforms"><b>CNPJ:</b></label>
                                            <input type="text" class="form-control cnpjmask" placeholder="CNPJ da Empresa" name="document_company" value="{{ old('document_company') }}"/>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-4"> 
                                        <div class="form-group">
                                            <label class="labelforms"><b>Inscrição Estadual:</b></label>
                                            <input type="text" class="form-control" placeholder="Número da Inscrição" name="document_company_secondary" value="{{ old('document_company_secondary') }}"/>
                                        </div>
                                    </div>
                                </div>
                                
                                <div id="accordion">
                                    <!-- we are adding the .class so bootstrap.js collapse plugin detects it -->
                                    <div class="card">
                                        <div class="card-header">
                                            <h4>
                                                <a style="border:none;color: #555;" data-toggle="collapse" data-parent="#accordion" href="#collapseEndereco">
                                                    <i class="nav-icon fas fa-plus mr-2"></i> Endereço
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapseEndereco" class="panel-collapse collapse show">
                                            <div class="card-body">
                                                <div class="row mb-2">
                                                    <div class="col-12 col-md-4 col-lg-4"> 
                                                        <div class="form-group">
                                                            <label class="labelforms"><b>*Estado:</b></label>
                                                            <select id="state-dd" class="form-control" name="uf">
                                                                @if(!empty($estados))
                                                                    <option value="">Selecione o Estado</option>
                                                                    @foreach($estados as $estado)
                                                                    <option value="{{$estado->estado_id}}" {{ (old('uf') == $estado->estado_id ? 'selected' : '') }}>{{$estado->estado_nome}}</option>
                                                                    @endforeach                                                                        
                                                                @endif
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-4 col-lg-4"> 
                                                        <div class="form-group">
                                                            <label class="labelforms"><b>*Cidade:</b></label>
                                                            <select id="city-dd" class="form-control" name="cidade">
                                                                @if(!empty($cidades)))
                                                                    <option value="">Selecione o Estado</option>
                                                                    @foreach($cidades as $cidade)
                                                                        <option value="{{$cidade->cidade_id}}" 
                                                                                {{ (old('cidade') == $cidade->cidade_id ? 'selected' : '') }}>{{$cidade->cidade_nome}}</option>                                                                   
                                                                    @endforeach                                                                        
                                                                @endif
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-4 col-lg-4"> 
                                                        <div class="form-group">
                                                            <label class="labelforms"><b>*Bairro:</b></label>
                                                            <input type="text" class="form-control" placeholder="Bairro" name="bairro" value="{{old('bairro')}}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row mb-2">
                                                    <div class="col-12 col-md-6 col-lg-5"> 
                                                        <div class="form-group">
                                                            <label class="labelforms"><b>*Endereço:</b></label>
                                                            <input type="text" class="form-control" placeholder="Endereço Completo" name="rua" value="{{old('rua')}}">
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-6 col-lg-2"> 
                                                        <div class="form-group">
                                                            <label class="labelforms"><b>*Número:</b></label>
                                                            <input type="text" class="form-control" placeholder="Número do Endereço" name="num" value="{{old('num')}}">
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-6 col-lg-3"> 
                                                        <div class="form-group">
                                                            <label class="labelforms"><b>Complemento:</b></label>
                                                            <input type="text" class="form-control" placeholder="Completo (Opcional)" name="complemento" value="{{old('complemento')}}">
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-6 col-lg-2"> 
                                                        <div class="form-group">
                                                            <label class="labelforms"><b>*CEP:</b></label>
                                                            <input type="text" class="form-control mask-zipcode" placeholder="Digite o CEP" name="cep" value="{{old('cep')}}">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header">
                                            <h4>
                                                <a style="border:none;color: #555;" data-toggle="collapse" data-parent="#accordion" href="#collapseContato">
                                                    <i class="nav-icon fas fa-plus mr-2"></i> Contato
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapseContato" class="panel-collapse collapse show">
                                            <div class="card-body">
                                                <div class="row mb-2">
                                                    <div class="col-12 col-md-6 col-lg-4"> 
                                                        <div class="form-group">
                                                            <label class="labelforms"><b>Email:</b></label>
                                                            <input type="text" class="form-control" placeholder="Email" name="email" value="{{old('email')}}">
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-6 col-lg-3"> 
                                                        <div class="form-group">
                                                            <label class="labelforms"><b>Telefone Fixo:</b></label>
                                                            <input type="text" class="form-control telefonemask" placeholder="Número do Telefonce com DDD" name="telefone" value="{{old('telefone')}}">
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-6 col-lg-3"> 
                                                        <div class="form-group">
                                                            <label class="labelforms"><b>*Celular:</b></label>
                                                            <input type="text" class="form-control celularmask" placeholder="Número do Celuler com DDD" name="celular" value="{{old('celular')}}">
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-6 col-lg-2"> 
                                                        <div class="form-group">
                                                            <label class="labelforms"><b>WhatsApp:</b></label>
                                                            <input type="text" class="form-control whatsappmask" placeholder="Número do Celuler com DDD" name="whatsapp" value="{{old('whatsapp')}}">
                                                        </div>
                                                    </div>                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div> 
                        
                                <div class="row text-right">
                                    <div class="col-12 mb-4 mt-4">
                                        <button type="submit" class="btn btn-success"><i class="nav-icon fas fa-check mr-2"></i> Cadastrar Agora</button>
                                    </div>
                                </div> 
                         
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
                               
        </form>

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

        $('#state-dd').on('change', function () {
            var idState = this.value;
            //$("#city-dd").removeAttr('disabled');
            $("#city-dd").html('Carregando...');
            $.ajax({
                url: "{{route('admin.empresas.fetchCity')}}",
                type: "POST",
                data: {
                    estado_id: idState,
                    _token: '{{csrf_token()}}'
                },
                dataType: 'json',
                success: function (res) {
                    $('#city-dd').html('<option value="">Selecione a cidade</option>');
                    $.each(res.cidades, function (key, value) {
                        $("#city-dd").append('<option value="' + value
                            .cidade_id + '">' + value.cidade_nome + '</option>');
                    });
                }
            });
        });

    });
</script>
@endsection