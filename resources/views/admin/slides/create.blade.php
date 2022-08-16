@extends('admin.master.master')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Cadastrar Slide</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Painel de Controle</a></li>
                    <li class="breadcrumb-item"><a href="{{route('admin.slides.index')}}">Slides</a></li>
                    <li class="breadcrumb-item active">Cadastrar Slide</li>
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
        <form action="{{ route('admin.slides.store') }}" method="post" enctype="multipart/form-data" autocomplete="off">
        @csrf
        <div class="row">            
            <div class="col-12">
                <div class="card card-teal card-outline card-outline-tabs">                    
                    
                    <div class="card-body">
                        <div class="tab-content" id="custom-tabs-four-tabContent">
                            <div class="tab-pane fade show active" id="custom-tabs-four-home" role="tabpanel" aria-labelledby="custom-tabs-four-home-tab">
                               <div class="row mb-4">
                                    <div class="col-12 col-sm-8 col-md-6 col-lg-6">   
                                        <div class="form-group">
                                            <label class="labelforms"><b>*Título</b></label>
                                            <input type="text" class="form-control" name="titulo" value="{{old('titulo')}}">
                                        </div>                                                    
                                    </div>
                                    <div class="col-12 col-sm-4 col-md-3 col-lg-3">
                                        <div class="form-group">
                                            <label class="labelforms"><b>Status:</b></label>
                                            <select name="status" class="form-control">
                                                <option value="1" {{ (old('status') == '1' ? 'selected' : '') }}>Publicado</option>
                                                <option value="0" {{ (old('status') == '0' ? 'selected' : '') }}>Rascunho</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-4 col-md-3 col-lg-3"> 
                                        <div class="form-group">
                                            <label class="labelforms"><b>Expira</b></label>
                                            <div class="input-group date" id="expira" data-target-input="nearest">
                                                <input type="text" class="form-control datetimepicker-input" data-target="#expira" name="expira" value="{{ old('expira') }}"/>
                                                <div class="input-group-append" data-target="#expira" data-toggle="datetimepicker">
                                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-8 col-md-3 col-lg-3">   
                                        <div class="form-group">
                                            <label class="labelforms"><b>Categoria</b></label>
                                            <input type="text" class="form-control" name="categoria" value="{{old('categoria')}}">
                                        </div>                                                    
                                    </div>
                                    <div class="col-12 col-sm-6 col-md-6 col-lg-6">   
                                        <div class="form-group">
                                            <label class="labelforms"><b>Url</b> <small class="text-info">(Ex: http://www.dominio.com)</small></label>
                                            <input type="text" class="form-control" name="link" value="{{old('link')}}">
                                        </div>                                                    
                                    </div>
                                    <div class="col-12 col-sm-6 col-md-3 col-lg-3">
                                        <div class="form-group">
                                            <label class="labelforms"><b>Destino:</b></label>
                                            <select name="target" class="form-control">
                                                <option value="1" {{ (old('target') == '1' ? 'selected' : '') }}>Nova Janela</option>
                                                <option value="0" {{ (old('target') == '0' ? 'selected' : '') }}>Mesma Janela</option>
                                            </select>
                                        </div>
                                    </div>                                                               
                                </div>
                                <div class="row">  
                                    <div class="col-12 mb-1"> 
                                        <div class="form-group">
                                            <label class="labelforms"><b>Imagem: </b>(1920X1100) pixels</label>
                                            <div class="thumb_user_admin">                                                    
                                                <img id="preview1" src="{{url(asset('backend/assets/images/image.jpg'))}}" alt="{{ old('titulo') }}" title="{{ old('titulo') }}"/>
                                                <input id="img-input" type="file" name="imagem">
                                            </div>
                                        </div>
                                    </div>                                  
                                    <div class="col-12">   
                                        <label class="labelforms"><b>Descrição:</b></label>
                                        <textarea id="compose-textarea" name="content" cols="30" rows="10" placeholder="Escreva o conteúdo do projeto aqui">{{ old('content') }}</textarea>                                                      
                                    </div>
                                </div>                               
                                
                            </div> 
                            
                        </div>
                        <div class="row text-right">
                            <div class="col-12 mb-4">
                                <button type="submit" class="btn btn-lg btn-success"><i class="nav-icon fas fa-check mr-2"></i> Cadastrar Agora</button>
                            </div>
                        </div>  
                                                
                        </form>

                    </div>
                    <!-- /.card -->
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

        $('#expira').datetimepicker({
            format: 'DD/MM/YYYY',
            locale: 'pt-br'
        });
        
        function readImagem() {
            if (this.files && this.files[0]) {
                var file = new FileReader();
                file.onload = function(e) {
                    document.getElementById("preview1").src = e.target.result;
                };       
                file.readAsDataURL(this.files[0]);
            }
        }
        document.getElementById("img-input").addEventListener("change", readImagem, false);      
       
        
    });
</script>
@endsection