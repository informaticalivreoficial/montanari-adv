@extends('admin.master.master')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Cadastrar Atuação</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Painel de Controle</a></li>
                    <li class="breadcrumb-item"><a href="{{route('admin.servicos.index')}}">Atuação</a></li>
                    <li class="breadcrumb-item active">Cadastrar Atuação</li>
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
             </div>            
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card card-teal card-outline card-outline-tabs">
                    <div class="card-header p-0 border-bottom-0">
                        <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="custom-tabs-four-home-tab" data-toggle="pill" href="#custom-tabs-conteudo" role="tab" aria-controls="custom-tabs-conteudo" aria-selected="true">Conteúdo</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="custom-tabs-four-messages-tab" data-toggle="pill" href="#custom-tabs-imagens" role="tab" aria-controls="custom-tabs-imagens" aria-selected="false">Imagens</a>
                            </li>
                        </ul>
                    </div>
                    
                    <div class="card-body">
                        <form action="{{ route('admin.servicos.store') }}" method="post" enctype="multipart/form-data">
                        @csrf                        
                        <input type="hidden" name="tipo" value="pagina"/>
                        <input type="hidden" name="categoria" value="28"/> 
                        <input type="hidden" name="cat_pai" value="27"/> 
                        <input type="hidden" name="autor" value="{{\Illuminate\Support\Facades\Auth::user()->id}}"/> 
                        <div class="tab-content" id="custom-tabs-four-tabContent">
                            <div class="tab-pane fade show active" id="custom-tabs-conteudo" role="tabpanel" aria-labelledby="custom-tabs-conteudo-tab">
                                                       
                                <div class="row">
                                    <div class="col-12 col-lg-5">
                                        <div class="form-group">
                                            <label class="labelforms"><b>Título:</b></label>
                                            <input class="form-control" name="titulo" placeholder="Título" value="{{old('titulo')}}">
                                        </div>
                                    </div>      
                                    <div class="col-12 col-lg-4">
                                        <div class="form-group">
                                            <label class="labelforms"><b>Categoria:</b></label>
                                            <input class="form-control" name="categoriatext" placeholder="Categoria" value="{{old('categoriatext')}}">
                                        </div>
                                    </div>                              
                                    <div class="col-12 col-lg-3"">
                                        <div class="form-group">
                                            <label class="labelforms"><b>Status:</b></label>
                                            <select name="status" class="form-control">
                                                <option value="1" {{ (old('status') == '1' ? 'selected' : '') }}>Publicado</option>
                                                <option value="0" {{ (old('status') == '0' ? 'selected' : '') }}>Rascunho</option>
                                            </select>
                                        </div>
                                    </div>                                    
                                </div>                                
                                <div class="row">
                                    <div class="col-12 mb-1"> 
                                        <div class="form-group">
                                            <label class="labelforms"><b>MetaTags:</b></label>
                                            <input id="tags_1" class="tags" rows="5" name="tags" value="{{old('tags')}}">
                                        </div>
                                    </div>
                                    <div class="col-12">   
                                        <label class="labelforms"><b>Conteúdo:</b></label>
                                        <textarea id="compose-textarea" name="content" cols="30" rows="10" placeholder="Escreva o conteúdo do artigo aqui">{{ old('content') }}</textarea>                                                      
                                    </div>
                                </div> 
                            </div> 
                            
                            <div class="tab-pane fade" id="custom-tabs-imagens" role="tabpanel" aria-labelledby="custom-tabs-imagens-tab">
                                <div class="row mb-4">
                                    <div class="col-sm-12">                                        
                                        <div class="form-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="exampleInputFile" name="files[]" multiple>
                                                <label class="custom-file-label" for="exampleInputFile">Escolher Imagens</label>
                                            </div>
                                        </div>                                        
                                        <div class="content_image"></div>
                                    </div>
                                </div>
                            </div>
                        </div> 
                        <div class="row text-right">
                            <div class="col-12 mb-4">
                                <button type="submit" class="btn btn-success btn-lg"><i class="nav-icon fas fa-check mr-2"></i> Cadastrar Agora</button>
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
            
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            
            //Date range picker
            $('#publish').datetimepicker({
                format: 'DD/MM/YYYY',
                locale: 'pt-br'
            });            
            
            $('input[name="files[]"]').change(function (files) {

                $('.content_image').text('');

                $.each(files.target.files, function (key, value) {
                    var reader = new FileReader();
                    reader.onload = function (value) {
                        $('.content_image').append(
                            '<div id="list" class="property_image_item">' +
                            '<div class="embed radius" style="background-image: url(' + value.target.result + '); background-size: cover; background-position: center center;"></div>' +
                            '<div class="property_image_actions">' +
                                '<a href="javascript:void(0)" class="btn btn-danger btn-xs image-remove1 px-2"><i class="nav-icon fas fa-times"></i> </a>' +
                            '</div>' +
                            '</div>');
                            
                        $('.image-remove1').click(function(){
                            $(this).closest('#list').remove()
                        });
                    };
                    reader.readAsDataURL(value);
                });
            });
            
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
                    height:200
                });
            });
        })
    </script>
@endsection