@extends('admin.master.master')

@section('content')

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1><i class="fas fa-search mr-2"></i> Atuação</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Painel de Controle</a></li>
                    <li class="breadcrumb-item active">Atuação</li>
                </ol>
            </div>
        </div>
    </div>
</section>

<!-- Main content -->
<section class="content">

    <div class="card">
        <div class="card-header text-right">
            <a href="{{route('admin.servicos.create')}}" class="btn btn-default"><i class="fas fa-plus mr-2"></i> Cadastrar Novo</a>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div class="row">
                <div class="col-12">                
                    @if(session()->exists('message'))
                        @message(['color' => session()->get('color')])
                            {{ session()->get('message') }}
                        @endmessage
                    @endif
                </div>            
            </div>
            @if(!empty($posts) && $posts->count() > 0)
                <table id="example1" class="table table-bordered table-striped projects">
                    <thead>
                        <tr>
                            <th>Capa</th>
                            <th>Título</th>
                            <th>Categoria</th>
                            <th class="text-center">Views</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody> 
                        @foreach($posts as $post)                        
                        <tr style="{{ ($post->status == '1' ? '' : 'background: #fffed8 !important;')  }}">                            
                            <td class="text-center">
                                <a href="{{ $post->nocover() }}" data-title="{{$post->titulo}}" data-gallery="property-gallery" data-toggle="lightbox">
                                    <img width="60" alt="{{$post->titulo}}" src="{{$post->cover()}}">
                                </a>
                            </td>
                            <td>{{$post->titulo}}</td>
                            <td>{{$post->categoriatext}}</td>
                            <td class="text-center">{{$post->views}}</td>
                            <td>
                                <input type="checkbox" data-onstyle="success" data-offstyle="warning" data-size="mini" class="toggle-class" data-id="{{ $post->id }}" data-toggle="toggle" data-style="slow" data-on="<i class='fas fa-check'></i>" data-off="<i style='color:#fff !important;' class='fas fa-exclamation-triangle'></i>" {{ $post->status == true ? 'checked' : ''}}>
                                <a href="{{ route('admin.servicos.edit', [ 'servico' => $post->id ]) }}" class="btn btn-xs btn-default"><i class="fas fa-pen"></i></a>
                                <a target="_blank" href="{{route('web.servico',['slug' => $post->slug])}}" class="btn btn-xs btn-info text-white"><i class="fas fa-search"></i></a>
                                <button type="button" class="btn btn-xs btn-danger text-white j_modal_btn" data-id="{{$post->id}}" data-toggle="modal" data-target="#modal-default"><i class="fas fa-trash"></i></button>
                            </td>
                        </tr>                            
                        @endforeach
                    </tbody>                
                </table>
            @else
                <div class="row mb-4">
                    <div class="col-12">                                                        
                        <div class="alert alert-info p-3">
                            Não foram encontrados registros!
                        </div>                                                        
                    </div>
                </div>
            @endif
        </div>
        <div class="card-footer paginacao">  
            {{ $posts->links() }}
        </div>
    </div>
    <!-- /.card -->   
<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="frm" action="" method="post">            
            @csrf
            @method('DELETE')
            <input id="id_servico" name="servico_id" type="hidden" value=""/>
                <div class="modal-header">
                    <h4 class="modal-title">Remover Atuação!</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <span class="j_param_data"></span>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Sair</button>
                    <button type="submit" class="btn btn-primary">Excluir Agora</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
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
            
            //FUNÇÃO PARA EXCLUIR
            $('.j_modal_btn').click(function() {
                var servico_id = $(this).data('id');
                
                $.ajax({
                    type: 'GET',
                    dataType: 'JSON',
                    url: "{{ route('admin.servicos.delete') }}",
                    data: {
                       'id': servico_id
                    },
                    success:function(data) {
                        if(data.error){
                            $('.j_param_data').html(data.error);
                            $('#id_servico').val(data.id);
                            $('#frm').prop('action','{{ route('admin.servicos.deleteon') }}');
                        }else{
                            $('#frm').prop('action','{{ route('admin.servicos.deleteon') }}');
                        }
                    }
                });
            });
           
            $(document).on('click', '[data-toggle="lightbox"]', function(event) {
              event.preventDefault();
              $(this).ekkoLightbox({
                alwaysShowClose: true
              });
            }); 
            
            $('#toggle-two').bootstrapToggle({
                on: 'Enabled',
                off: 'Disabled'
            });
            
            $('.toggle-class').on('change', function() {
                var status = $(this).prop('checked') == true ? 1 : 0;
                var servico_id = $(this).data('id');
                $.ajax({
                    type: 'GET',
                    dataType: 'JSON',
                    url: '{{ route('admin.servicos.servicoSetStatus') }}',
                    data: {
                        'status': status,
                        'id': servico_id
                    },
                    success:function(data) {
                        
                    }
                });
            });
            
        });
    </script>
@endsection