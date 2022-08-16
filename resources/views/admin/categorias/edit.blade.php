@extends('admin.master.master')

@section('content')

@php
//Variáveis
if($categoria->id_pai != null){
    $h1 = 'Editar Sub Categoria';
}else{
    $h1 = 'Editar Categoria';
}
@endphp
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-xs-5 col-md-4 col-sm-12 col-lg-4">
                <h1>{{$h1}}</h1>
            </div>
            <div class="col-xs-7 col-md-8 col-sm-12 col-lg-8">
                <ol class="breadcrumb float-lg-right float-md-right">
                    <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Painel de Controle</a></li>
                    @if($categoria->tipo == 'artigo')
                    <li class="breadcrumb-item"><a href="{{route('admin.artigos.index')}}">Artigos</a></li>
                    <li class="breadcrumb-item"><a href="{{route('admin.categorias.secao', ['tipo' => $categoria->tipo])}}">Categorias</a></li>
                    @elseif($categoria->tipo == 'noticia')
                    <li class="breadcrumb-item"><a href="">Notícias</a></li>
                    @else
                    <li class="breadcrumb-item"><a href="">Páginas</a></li>
                    @endif
                    <li class="breadcrumb-item active">{{$h1}}</li>
                </ol>
            </div>
        </div>
    </div>
</section>

<!-- Main content -->
<section class="content text-muted">
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

                @if(session()->exists('message'))
                    @message(['color' => session()->get('color')])
                    {{ session()->get('message') }}
                    @endmessage
                @endif
            </div>            
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card card-teal card-outline">
                    <div class="card-body">
                        <form action="{{ route('admin.categorias.update', [ 'categoria' => $categoria->id ]) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="row mb-4">
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="labelforms"><b>Título da Categoria:</b></label>
                                    <input class="form-control" name="titulo" placeholder="Título da Categoria" value="{{old('titulo') ?? $categoria->titulo}}">
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <label class="labelforms"><b>Exibir no site?</b></label>
                                    <select class="form-control" name="status">
                                        <option value="1" {{(old('status') == '1' ? 'selected' : ($categoria->status == '1' ? 'selected' : ''))}}>Sim</option>
                                        <option value="0" {{(old('status') == '0' ? 'selected' : ($categoria->status == '0' ? 'selected' : ''))}}>Não</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <label class="labelforms">&nbsp;</label>
                                    <button type="submit" style="width: 100%;" class="btn btn-success"><i class="nav-icon fas fa-check mr-2"></i> Atualizar Agora</button>
                                </div>
                            </div>
                            <div class="col-12 mb-1"> 
                                <div class="form-group">
                                    <label class="labelforms"><b>MetaTags</b></label>
                                    <input id="tags_1" class="tags" rows="5" name="tags" value="{{old('tags') ?? $categoria->tags}}">
                                </div>
                            </div>
                            <div class="col-12">   
                                <label class="labelforms"><b>Descrição da Categoria:</b></label>
                                <textarea id="compose-textarea" name="content" cols="30" rows="10" placeholder="Escreva a descrição da categoria aqui">{{ old('content') ?? $categoria->content }}</textarea>                                                      
                            </div>
                        </div> 
                        </form>
                    </div>                
                </div>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

@endsection

@section('js')
    <script>
        $(function () { 
            
            //tag input
            function onAddTag(tag) {
                alert("Adicionar uma Tag: " + tag);
            }
            function onRemoveTag(tag) {
                alert("Remover Tag: " + tag);
            }
            function onChangeTag(input,tag) {
                alert("Changed a tag: " + tag);
            }
            $(function() {
                $('#tags_1').tagsInput({
                    width:'auto',
                    height:150
                });
                $('#tags_2').tagsInput({
                    width: '250',
                    onChange: function(elem, elem_tags)
                    {
                        var languages = ['php','ruby','javascript'];
                        $('.tag', elem_tags).each(function()
                        {
                            if($(this).text().search(new RegExp('\\b(' + languages.join('|') + ')\\b')) >= 0)
                                $(this).css('background-color', 'yellow');
                        });
                    }
                });
            });
            
        });
    </script>
@endsection