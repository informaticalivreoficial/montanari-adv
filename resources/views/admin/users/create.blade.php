@extends('admin.master.master')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Cadastrar Cliente</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Painel de Controle</a></li>
                    <li class="breadcrumb-item"><a href="{{route('admin.users.index')}}">Clientes</a></li>
                    <li class="breadcrumb-item active">Cadastrar Cliente</li>
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
        <form action="{{ route('admin.users.store') }}" method="post" enctype="multipart/form-data" autocomplete="off">
        @csrf
        <div class="row">            
            <div class="col-12">
                <div class="card card-teal card-outline card-outline-tabs">
                    
                    <div class="card-header p-0 border-bottom-0">
                        <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="custom-tabs-four-home-tab" data-toggle="pill" href="#custom-tabs-four-home" role="tab" aria-controls="custom-tabs-four-home" aria-selected="true">Dados Cadastrais</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="custom-tabs-four-profile-tab" data-toggle="pill" href="#custom-tabs-four-profile" role="tab" aria-controls="custom-tabs-four-profile" aria-selected="false">Dados Complementares</a>
                            </li> 
                            <li class="nav-item">
                                <a class="nav-link" id="custom-tabs-four-redes-tab" data-toggle="pill" href="#custom-tabs-four-redes" role="tab" aria-controls="custom-tabs-four-redes" aria-selected="false">Redes Sociais</a>
                            </li> 
                            <li class="nav-item">
                                <a class="nav-link" id="custom-tabs-four-permissoes-tab" data-toggle="pill" href="#custom-tabs-four-permissoes" role="tab" aria-controls="custom-tabs-four-permissoes" aria-selected="false">Permissões</a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="tab-content" id="custom-tabs-four-tabContent">
                            <div class="tab-pane fade show active" id="custom-tabs-four-home" role="tabpanel" aria-labelledby="custom-tabs-four-home-tab">
                               
                                <div class="row">                                   
                                    <div class="col-12 col-md-6 col-lg-3"> 
                                        <div class="form-group">
                                            <div class="thumb_user_admin">
                                                <img id="preview" src="{{url(asset('backend/assets/images/image.jpg'))}}" alt="{{ old('name') }}" title="{{ old('name') }}"/>
                                                <input id="img-input" type="file" name="avatar">
                                            </div>                                                
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-9">
                                        <div class="row mb-2">
                                            <div class="col-12 col-md-6 col-lg-8 mb-2"> 
                                                <div class="form-group">
                                                    <label class="labelforms"><b>*Nome</b></label>
                                                    <input type="text" class="form-control" placeholder="Nome do Cliente" name="name" value="{{ old('name') }}">
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6 col-lg-4 mb-2"> 
                                                <div class="form-group">
                                                    <label class="labelforms"><b>*Data de Nascimento</b></label>
                                                    <div class="input-group date" id="nasc" data-target-input="nearest">
                                                        <input type="text" class="form-control datetimepicker-input" data-target="#nasc" name="nasc" value="{{ old('nasc') }}"/>
                                                        <div class="input-group-append" data-target="#nasc" data-toggle="datetimepicker">
                                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6 col-lg-4 mb-2"> 
                                                <div class="form-group">
                                                    <label class="labelforms"><b>*Genero</b></label>
                                                    <select class="form-control" name="genero">
                                                        <option value=""> Selecione </option>
                                                        <option value="masculino" {{(old('genero') == 'masculino' ? 'selected' : '')}}>Masculino</option>
                                                        <option value="feminino" {{(old('genero') == 'feminino' ? 'selected' : '')}}>Feminino</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6 col-lg-4 mb-2"> 
                                                <div class="form-group">
                                                    <label class="labelforms"><b>*Estado Civil</b></label>
                                                    <select class="form-control" name="estado_civil">
                                                        <option value=""> Selecione </option>
                                                        <optgroup label="Cônjuge Obrigatório">
                                                        <option value="casado" {{ (old('estado_civil') == 'casado' ? 'selected' : '') }}>Casado</option>
                                                        <option value="separado" {{ (old('estado_civil') == 'separado' ? 'selected' : '') }}>Separado</option>
                                                        </optgroup>
                                                        <optgroup label="Cônjuge não Obrigatório">
                                                        <option value="solteiro" {{ (old('estado_civil') == 'solteiro' ? 'selected' : '') }}>Solteiro</option>
                                                        <option value="divorciado" {{ (old('estado_civil') == 'divorciado' ? 'selected' : '') }}>Divorciado</option>
                                                        <option value="viuvo" {{ (old('estado_civil') == 'viuvo' ? 'selected' : '') }}>Viúvo(a)</option>
                                                        </optgroup>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6 col-lg-4 mb-2"> 
                                                <div class="form-group">
                                                    <label class="labelforms"><b>*CPF</b></label>
                                                    <input type="text" class="form-control cpfmask" placeholder="CPF do Cliente" name="cpf" value="{{ old('cpf') }}"/>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6 col-lg-4 mb-2"> 
                                                <div class="form-group">
                                                    <label class="labelforms"><b>*RG</b></label>
                                                    <input type="text" class="form-control rgmask" placeholder="RG do Cliente" name="rg" value="{{ old('rg') }}"/>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6 col-lg-4 mb-2"> 
                                                <div class="form-group">
                                                    <label class="labelforms"><b>Órgão Expedidor</b></label>
                                                    <input type="text" class="form-control" placeholder="Expedição" name="rg_expedicao" value="{{ old('rg_expedicao') }}">
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6 col-lg-4 mb-2"> 
                                                <div class="form-group">
                                                    <label class="labelforms"><b>*Naturalidade</b></label>
                                                    <input type="text" class="form-control" placeholder="Cidade de Nascimento" name="naturalidade" value="{{ old('naturalidade') }}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                                
                                <div id="accordion">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4>                          
                                                <a style="border:none;color: #555;" data-toggle="collapse" data-parent="#accordion" href="#collapseRenda">
                                                    <i class="nav-icon fas fa-plus mr-2"></i> Renda
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapseRenda" class="panel-collapse collapse show">
                                            <div class="card-body">
                                                <div class="row mb-2">
                                                    <div class="col-12 col-md-4 col-lg-4"> 
                                                        <div class="form-group">
                                                            <label class="labelforms"><b>Profissão:</b></label>
                                                            <input type="text" class="form-control" placeholder="Profissão do Cliente" name="profissao" value="{{old('profissao')}}">
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-4 col-lg-4"> 
                                                        <div class="form-group">
                                                            <label class="labelforms"><b>Renda:</b></label>
                                                            <input type="text" class="form-control mask-money" placeholder="Valores em Reais" name="renda" value="{{old('renda')}}">
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-4 col-lg-4"> 
                                                        <div class="form-group">
                                                            <label class="labelforms"><b>Empresa:</b></label>
                                                            <input type="text" class="form-control" placeholder="Contratante" name="profissao_empresa" value="{{old('profissao_empresa')}}">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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
                                                            <label class="labelforms"><b>Residencial:</b></label>
                                                            <input type="text" class="form-control telefonemask" placeholder="Número do Telefonce com DDD" name="telefone" value="{{old('telefone')}}">
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-6 col-lg-4"> 
                                                        <div class="form-group">
                                                            <label class="labelforms"><b>*Celular:</b></label>
                                                            <input type="text" class="form-control celularmask" placeholder="Número do Celuler com DDD" name="celular" value="{{old('celular')}}">
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-6 col-lg-4"> 
                                                        <div class="form-group">
                                                            <label class="labelforms"><b>WhatsApp:</b></label>
                                                            <input type="text" class="form-control whatsappmask" placeholder="Número do Celuler com DDD" name="whatsapp" value="{{old('whatsapp')}}">
                                                        </div>
                                                    </div>  
                                                    <div class="col-12 col-md-6 col-lg-4"> 
                                                        <div class="form-group">
                                                            <label class="labelforms"><b>E-mail Alternativo:</b></label>
                                                            <input type="text" class="form-control" placeholder="Email Alternativo" name="email1" value="{{old('email1')}}">
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-6 col-lg-4"> 
                                                        <div class="form-group">
                                                            <label class="labelforms"><b>Skype:</b></label>
                                                            <input type="text" class="form-control" placeholder="Usuário Skype" name="skype" value="{{old('skype')}}">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header">
                                            <h4>
                                                <a style="border:none;color: #555;" data-toggle="collapse" data-parent="#accordion" href="#collapseFour">
                                                    <i class="nav-icon fas fa-plus mr-2"></i> Acesso
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapseFour" class="panel-collapse collapse show">
                                            <div class="card-body">
                                                <div class="row mb-2">
                                                    <div class="col-6 col-md-6 col-lg-6"> 
                                                        <div class="form-group">
                                                            <label class="labelforms"><b>*E-mail:</b></label>
                                                            <input type="email" class="form-control" placeholder="Melhor e-mail" name="email" value="{{old('email')}}">
                                                        </div>
                                                    </div>
                                                    <div class="col-6 col-md-6 col-lg-6"> 
                                                        <div class="form-group">
                                                            <label class="labelforms"><b>*Senha:</b></label>
                                                            <div class="input-group">
                                                                <input type="password" class="form-control" id="senha" name="password" value="{{ old('password') }}"/>
                                                                <div class="input-group-append" id="olho">
                                                                    <div class="input-group-text"><i class="fa fa-eye"></i></div>
                                                                </div>
                                                            </div>
                                                        </div>                                                        
                                                    </div>                                                                                                       
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div> 
                            </div>
                            <div class="tab-pane fade" id="custom-tabs-four-profile" role="tabpanel" aria-labelledby="custom-tabs-four-profile-tab">
                                
                                <div id="accordion">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4>
                                                <a style="border:none;color: #555;" data-toggle="collapse" data-parent="#accordion" href="#collapseFive">
                                                    <i class="nav-icon fas fa-plus mr-2"></i> Cônjuge
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapseFive" class="panel-collapse collapse content_spouse show">
                                            <div class="card-body">
                                                <div class="row mb-2">
                                                    <div class="col-12 col-md-6 col-lg-3"> 
                                                        <div class="form-group">
                                                            <label class="labelforms"><b>Tipo de Comunhão:</b></label>
                                                            <select class="form-control" name="tipo_de_comunhao">
                                                                <option value="universal" {{ (old('tipo_de_comunhao') == 'universal' ? 'selected' : '') }}>Comunhão Universal de Bens</option>
                                                                <option value="parcial" {{ (old('tipo_de_comunhao') == 'parcial' ? 'selected' : '') }}>Comunhão Parcial de Bens</option>
                                                                <option value="total" {{ (old('tipo_de_comunhao') == 'total' ? 'selected' : '') }}>Separação Total de Bens</option>
                                                                <option value="final" {{ (old('type_of_communion') == 'final' ? 'selected' : '') }}>Participação Final de Aquestos</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-6 col-lg-4"> 
                                                        <div class="form-group">
                                                            <label class="labelforms"><b>*Nome</b></label>
                                                            <input type="text" class="form-control" placeholder="Nome do Cônjuge" name="nome_conjuje" value="{{ old('nome_conjuje') }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-6 col-lg-3"> 
                                                        <div class="form-group">
                                                            <label class="labelforms"><b>*Data de Nascimento</b></label>
                                                            <div class="input-group date" id="nasc-conjuje" data-target-input="nearest">
                                                                <input type="text" class="form-control datetimepicker-input" data-target="#nasc-conjuje" name="nasc_conjuje" value="{{ old('nasc_conjuje') }}"/>
                                                                <div class="input-group-append" data-target="#nasc-conjuje" data-toggle="datetimepicker">
                                                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-6 col-lg-2"> 
                                                        <div class="form-group">
                                                            <label class="labelforms"><b>*Genero</b></label>
                                                            <select class="form-control" name="genero_conjuje">
                                                                <option value="masculino" {{(old('genero_conjuje') == 'masculino' ? 'selected' : '')}}>Masculino</option>
                                                                <option value="feminino" {{(old('genero_conjuje') == 'feminino' ? 'selected' : '')}}>Feminino</option>
                                                            </select>
                                                        </div>
                                                    </div>                                                                                                      
                                                </div>
                                                <div class="row mb-4">
                                                    <div class="col-12 col-md-6 col-lg-3"> 
                                                        <div class="form-group">
                                                            <label class="labelforms"><b>*CPF</b></label>
                                                            <input type="text" class="form-control cpfmask" placeholder="CPF do Cônjuge" name="cpf_conjuje" value="{{ old('cpf_conjuje') }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-6 col-lg-3"> 
                                                        <div class="form-group">
                                                            <label class="labelforms"><b>*RG</b></label>
                                                            <input type="text" class="form-control rgmask" placeholder="RG do Cônjuge" name="rg_conjuje" value="{{ old('rg_conjuje') }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-6 col-lg-3"> 
                                                        <div class="form-group">
                                                            <label class="labelforms"><b>Órgão Expedidor</b></label>
                                                            <input type="text" class="form-control" placeholder="Expedição" name="rg_expedicao_conjuje" value="{{ old('rg_expedicao_conjuje') }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-6 col-lg-3"> 
                                                        <div class="form-group">
                                                            <label class="labelforms"><b>*Naturalidade</b></label>
                                                            <input type="text" class="form-control" placeholder="Cidade de Nascimento do Cônjuge" name="naturalidade_conjuje" value="{{ old('naturalidade_conjuje') }}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row mb-2">
                                                    <div class="col-12 col-md-4 col-lg-4"> 
                                                        <div class="form-group">
                                                            <label class="labelforms"><b>*Profissão:</b></label>
                                                            <input type="text" class="form-control" placeholder="Profissão do Cliente" name="profissao_conjuje" value="{{old('profissao_conjuje')}}">
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-4 col-lg-4"> 
                                                        <div class="form-group">
                                                            <label class="labelforms"><b>*Renda:</b></label>
                                                            <input type="text" class="form-control mask-money" placeholder="Valores em Reais" name="renda_conjuje" value="{{old('renda_conjuje')}}">
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-4 col-lg-4"> 
                                                        <div class="form-group">
                                                            <label class="labelforms"><b>*Empresa:</b></label>
                                                            <input type="text" class="form-control" placeholder="Contratante" name="profissao_empresa_conjuje" value="{{old('profissao_empresa_conjuje')}}">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="custom-tabs-four-redes" role="tabpanel" aria-labelledby="custom-tabs-four-redes-tab">
                                <div class="row mb-2 text-muted">
                                    <div class="col-sm-12 text-muted">
                                        <div class="form-group">
                                            <h5><b>Redes Sociais</b></h5>            
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="col-12 col-md-6 col-lg-4"> 
                                        <div class="form-group">
                                            <label class="labelforms"><b>Facebook:</b></label>
                                            <input type="text" class="form-control text-muted" placeholder="Facebook" name="facebook" value="{{old('facebook')}}">
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-4"> 
                                        <div class="form-group">
                                            <label class="labelforms"><b>Twitter:</b></label>
                                            <input type="text" class="form-control text-muted" placeholder="Twitter" name="twitter" value="{{old('twitter')}}">
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-4"> 
                                        <div class="form-group">
                                            <label class="labelforms"><b>Youtube:</b></label>
                                            <input type="text" class="form-control text-muted" placeholder="Youtube" name="youtube" value="{{old('youtube')}}">
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-4"> 
                                        <div class="form-group">
                                            <label class="labelforms"><b>Flickr:</b></label>
                                            <input type="text" class="form-control text-muted" placeholder="Flickr" name="fliccr" value="{{old('fliccr')}}">
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-4"> 
                                        <div class="form-group">
                                            <label class="labelforms"><b>Instagram:</b></label>
                                            <input type="text" class="form-control text-muted" placeholder="Instagram" name="instagram" value="{{old('instagram')}}">
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-4"> 
                                        <div class="form-group">
                                            <label class="labelforms"><b>Vimeo:</b></label>
                                            <input type="text" class="form-control text-muted" placeholder="Vimeo" name="vimeo" value="{{old('vimeo')}}">
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-4"> 
                                        <div class="form-group">
                                            <label class="labelforms"><b>Linkedin:</b></label>
                                            <input type="text" class="form-control text-muted" placeholder="Linkedin" name="linkedin" value="{{old('linkedin')}}">
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-4"> 
                                        <div class="form-group">
                                            <label class="labelforms"><b>Sound Cloud:</b></label>
                                            <input type="text" class="form-control text-muted" placeholder="Linkedin" name="soundclound" value="{{old('soundclound')}}">
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-4"> 
                                        <div class="form-group">
                                            <label class="labelforms"><b>SnapChat:</b></label>
                                            <input type="text" class="form-control text-muted" placeholder="SnapChat" name="snapchat" value="{{old('snapchat')}}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="custom-tabs-four-permissoes" role="tabpanel" aria-labelledby="custom-tabs-four-permissoes-tab">
                                <div class="row mb-2 text-muted">
                                    <div class="col-sm-12 bg-gray-light mb-3">                                        
                                        <!-- checkbox -->
                                        <div class="form-group p-3 mb-0">
                                            <span class="mr-3"><b>Acesso ao Sistema:</b></span>  
                                            <div class="form-check d-inline mx-2">
                                                <input id="editor" class="form-check-input" type="checkbox" name="editor" {{ (old('editor') == 'on' || old('editor') == true ? 'checked' : '') }}>
                                                <label for="editor" class="form-check-label">Editor</label>
                                            </div>
                                            <div class="form-check d-inline mx-2">
                                                <input id="admin" class="form-check-input" type="checkbox" name="admin" {{ (old('admin') == 'on' || old('admin') == true ? 'checked' : '') }}>
                                                <label for="admin" class="form-check-label">Administrativo</label>
                                            </div>
                                            <div class="form-check d-inline mx-2">
                                                <input id="client" class="form-check-input" type="checkbox"  name="client" {{ (old('client') == 'on' || old('client') == true ? 'checked' : '') }}>
                                                <label for="client" class="form-check-label">Cliente</label>
                                            </div>
                                            @if(\Illuminate\Support\Facades\Auth::user()->superadmin == 1)
                                            <div class="form-check d-inline mx-2">
                                                <input id="superadmin" class="form-check-input" type="checkbox"  name="superadmin" {{ (old('superadmin') == 'on' || old('superadmin') == true ? 'checked' : '') }}>
                                                <label for="superadmin" class="form-check-label">Super Administrador</label>
                                            </div>
                                            @endif
                                        </div>
                                    </div>                                        
                                </div>
                                @can('Listar Permissões')
                                <div class="row mb-2 text-muted">
                                    <div class="col-sm-12 text-muted">
                                        <div class="form-group">
                                            <h5><b>Permissões no Sistema</b></h5>            
                                        </div>
                                    </div>
                                    <div class="col-lg-3 mb-2">
                                    @foreach($roles as $role)                                        
                                        <div class="form-check mb-1">
                                            <input id="acl_{{ $role->id }}" class="form-check-input" type="checkbox"  name="acl_{{ $role->id }}" {{ ($role->can == 1 ? 'checked' : '') }}>
                                            <label for="acl_{{ $role->id }}" class="form-check-label">{{ $role->name }}</label>
                                        </div>                                        
                                    @endforeach
                                </div>
                                </div>
                                @endcan
                            </div>
                        </div>
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
                                
        <div class="row text-right">
            <div class="col-12 mb-4">
                <button type="submit" class="btn btn-success"><i class="nav-icon fas fa-check mr-2"></i> Cadastrar Agora</button>
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
        
        function readImage() {
            if (this.files && this.files[0]) {
                var file = new FileReader();
                file.onload = function(e) {
                    document.getElementById("preview").src = e.target.result;
                };       
                file.readAsDataURL(this.files[0]);
            }
        }
        document.getElementById("img-input").addEventListener("change", readImage, false);
        
        $('#state-dd').on('change', function () {
            var idState = this.value;
            //$("#city-dd").removeAttr('disabled');
            $("#city-dd").html('Carregando...');
            $.ajax({
                url: "{{route('admin.users.fetchCity')}}",
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
        // Visualizar senha no input
        var senha = $('#senha');
        var olho= $("#olho");
        olho.mousedown(function() {
            senha.attr("type", "text");
        });
        olho.mouseup(function() {
            senha.attr("type", "password");
        });
    });
</script>
@endsection