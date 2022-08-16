<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Painel Administrativo {{$configuracoes->nomedosite}}</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
       
        <!-- Font Awesome -->
        <link rel="stylesheet" href="{{url(asset('backend/assets/plugins/fontawesome-free/css/all.min.css'))}}">
        <!-- Ekko Lightbox -->
        <link rel="stylesheet" href="{{url(asset('backend/assets/plugins/ekko-lightbox/ekko-lightbox.css'))}}">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <!-- Tempusdominus Bbootstrap 4 -->
        <link rel="stylesheet" href="{{url(asset('backend/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css'))}}">
        <!-- iCheck -->
        <link rel="stylesheet" href="{{url(asset('backend/assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css'))}}">        
        <!-- JQVMap -->
        <link rel="stylesheet" href="{{url(asset('backend/assets/plugins/jqvmap/jqvmap.min.css'))}}">
        <!-- Toastr -->
        <link rel="stylesheet" href="{{url(asset('backend/assets/plugins/toastr/toastr.min.css'))}}">
        
        <!-- Theme style -->
        <link rel="stylesheet" href="{{url(mix('backend/assets/css/adminlte.min.css'))}}">
        <!-- overlayScrollbars -->
        <link rel="stylesheet" href="{{url(asset('backend/assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css'))}}">
        <!-- Daterange picker -->
        <link rel="stylesheet" href="{{url(asset('backend/assets/plugins/daterangepicker/daterangepicker.css'))}}">
        <!-- summernote -->
        <link rel="stylesheet" href="{{url(asset('backend/assets/plugins/summernote/summernote-bs4.css'))}}">
        <!--tags input-->
        <link rel="stylesheet" href="{{url(mix('backend/assets/plugins/jquery-tags-input/jquery.tagsinput.css'))}}" />
        <link href="{{url(asset('backend/assets/plugins/bootstrap-toggle/bootstrap-toggle.min.css'))}}" rel="stylesheet">
        <link rel="stylesheet" href="{{url(mix('backend/assets/css/styles.css'))}}">
        
        <!-- Google Font: Source Sans Pro -->
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
        
        @hasSection('css')
            @yield('css')
        @endif
        
        <link rel="icon" type="image/png" href="{{ url(asset('backend/assets/images/chave.png')) }}"/>
        
        <meta name="csrf-token" content="{{ csrf_token() }}">
    
    </head>
    <body class="sidebar-mini layout-fixed control-sidebar-slide-open text-sm">
        <div class="wrapper">

            <!-- Navbar -->
            <nav class="main-header navbar navbar-expand navbar-light">
                <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>      
    </ul>
                
                <!-- Right navbar links -->
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="{{route('web.home')}}" title="Ver Site" target="_blank"><i class="fas fa-desktop"></i></a>
                    </li>                    
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="{{ route('admin.logout') }}" title="Sair"><i class="fas fa-power-off"></i></a>
                    </li>
                </ul>
            </nav>
            <!-- /.navbar -->
            @php
                if(!empty(\Illuminate\Support\Facades\Auth::user()->avatar) &&
                \Illuminate\Support\Facades\File::exists(public_path() . '/storage/' . \Illuminate\Support\Facades\Auth::user()->avatar)){
                    $cover = \Illuminate\Support\Facades\Auth::user()->url_avatar;
                } else {
                    $cover = url(asset('backend/assets/images/image.jpg'));
                }
            @endphp
            <!-- Main Sidebar Container -->
            <aside class="main-sidebar elevation-4 sidebar-light-teal">
                <!-- Brand Logo -->
                <a href="#" class="brand-link text-center navbar-light">                    
                    <img width="{{env('LOGOMARCA_GERENCIADOR_WIDTH')}}" height="{{env('LOGOMARCA_GERENCIADOR_HEIGHT')}}" src="{{$configuracoes->getlogoadmin()}}" alt="{{$configuracoes->nomedosite}}" class="elevation-3">
                </a>

                <!-- Sidebar -->
                <div class="sidebar">
                    <!-- Sidebar user panel (optional) -->
                    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                        <div class="image">
                            <img src="{{$cover}}" class="img-circle elevation-2" alt="{{ \Illuminate\Support\Facades\Auth::user()->name }}">
                        </div>
                        <div class="info">
                            <a href="{{ route('admin.users.edit', ['user' => \Illuminate\Support\Facades\Auth::user()->id] )}}" class="d-block">{{ \Illuminate\Support\Facades\Auth::user()->name }}</a>
                        </div>
                    </div>

                    <!-- Sidebar Menu -->
                    <nav class="mt-2">
                        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                            <!-- Add icons to the links using the .nav-icon class
                                 with font-awesome or any other icon font library -->
                            <li class="nav-item">
                                <a href="{{ route('admin.home') }}" class="nav-link {{ isActive('admin.home') }}">
                                    <i class="nav-icon fas fa-tachometer-alt"></i>
                                    <p>Painel de Controle</p>
                                </a>
                            </li> 
                            {{-- Menu Clientes --}}
                            <li class="nav-item has-treeview {{ isActiveMenu('admin.users') }} {{ isActiveMenu('admin.empresas') }}">
                                <a href="{{ route('admin.users.index') }}" class="nav-link {{ isActive('admin.users') }} {{ isActive('admin.empresas') }}">
                                    <i class="nav-icon fas fa-users"></i>
                                    <p>
                                        Usuários
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ route('admin.users.index') }}" class="nav-link {{ isActive('admin.users.index') }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Clientes</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('admin.empresas.index') }}" class="nav-link {{ isActive('admin.empresas.index') }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Empresas</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('admin.users.team') }}" class="nav-link {{ isActive('admin.users.team') }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Time</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('admin.users.create') }}" class="nav-link {{ isActive('admin.users.create') }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Criar Novo</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>                           
                            
                            {{-- Menu Atuação --}}
                            <li class="nav-item has-treeview {{ isActiveMenu('admin.servicos') }}">
                                <a href="javascript:void(0)" class="nav-link {{ isActive('admin.servicos') }}">
                                    <i class="nav-icon fas fa-people-carry"></i>
                                    <p>
                                        Atuação
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ route('admin.servicos.index') }}" class="nav-link {{ isActive('admin.servicos.index') }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Ver Todos</p>
                                        </a>
                                    </li>  
                                    <li class="nav-item">
                                        <a href="{{ route('admin.servicos.create') }}" class="nav-link {{ isActive('admin.servicos.create') }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Cadastrar</p>
                                        </a>
                                    </li>                             
                                </ul>
                            </li>
                            {{-- Menu Slides --}}
                            <li class="nav-item has-treeview {{ isActiveMenu('admin.slides') }}">
                                <a href="javascript:void(0)" class="nav-link {{ isActive('admin.slides') }}">
                                    <i class="nav-icon fas fa-film"></i>
                                    <p>
                                        Slides
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ route('admin.slides.index') }}" class="nav-link {{ isActive('admin.slides.index') }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Ver Todos</p>
                                        </a>
                                    </li>  
                                    <li class="nav-item">
                                        <a href="{{ route('admin.slides.create') }}" class="nav-link {{ isActive('admin.slides.create') }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Cadastrar</p>
                                        </a>
                                    </li>                             
                                </ul>
                            </li>                            
                            @can('Listar Artigos')
                            <li class="nav-item has-treeview {{ isActiveMenu('admin.artigos') }} {{ isActiveMenu('admin.categorias') }}">
                                <a href="javascript:void(0)" class="nav-link {{ isActive('admin.artigos') }} {{ isActive('admin.categorias') }}">
                                    <i class="nav-icon fas fa-pen"></i>
                                    <p>
                                        Artigos
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ route('admin.artigos.index') }}" class="nav-link {{ isActive('admin.artigos.index') }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Ver Todos</p>
                                        </a>
                                    </li>  
                                    <li class="nav-item">
                                        <a href="{{ route('admin.artigos.create') }}" class="nav-link {{ isActive('admin.artigos.create') }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Criar Novo</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('admin.categorias.secao', [ 'tipo' => 'artigo' ]) }}" class="nav-link {{ isActive('admin.categorias.secao') }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Categorias</p>
                                        </a>
                                    </li>                                    
                                </ul>
                            </li>    
                            @endcan 
                                                   
                            <li class="nav-item has-treeview {{ isActiveMenu('admin.email') }}">
                                <a href="javascript:void(0)" class="nav-link {{ isActive('admin.email') }}">
                                    <i class="nav-icon fas fa-envelope"></i>
                                    <p>
                                        Email
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ route('admin.email.send', ['id' => Auth::user()->id, 'parametro' => 'null']) }}" class="nav-link {{ isActive('admin.email.send') }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Enviar Email</p>
                                        </a>
                                    </li>                            
                                </ul>
                            </li>
                            {{-- Configurações --}}
                            @can('Listar Permissões')
                            <li class="nav-item has-treeview {{ isActiveMenu('admin.permission') }} {{ isActiveMenu('admin.role') }}">
                                <a href="javascript:void(0)" class="nav-link {{ isActive('admin.permission') }} {{ isActive('admin.role') }}">
                                    <i class="nav-icon fas fa-lock"></i>
                                    <p>
                                        Segurança
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ route('admin.role.index') }}" class="nav-link {{ isActive('admin.role.index') }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Perfis</p>
                                        </a>
                                    </li>  
                                    <li class="nav-item">
                                        <a href="{{ route('admin.permission.index') }}" class="nav-link {{ isActive('admin.permission.index') }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Permissões</p>
                                        </a>
                                    </li>                                                                 
                                </ul>
                            </li> 
                            @endcan
                            {{-- Configurações --}}
                            @can('Editar Configurações')
                            <li class="nav-item">
                                <a href="{{ route('admin.configuracoes.edit', '1') }}" class="nav-link {{ isActive('admin.configuracoes.edit') }}">
                                    <i class="nav-icon fas fa-cog"></i>
                                    <p>Configurações</p>
                                </a>                                
                            </li>
                            @endcan
                        </ul>
                    </nav>
                    <!-- /.sidebar-menu -->
                </div>
                <!-- /.sidebar -->
            </aside>

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Main content -->
                @yield('content')
                <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->
            <footer class="main-footer">
                <strong>Copyright &copy; {{$configuracoes->ano_de_inicio}}-@php echo date('Y'); @endphp {{$configuracoes->nomedosite}}.</strong>
                Desenvolvido por {{env("DESENVOLVEDOR")}}.
                <div class="float-right d-none d-sm-inline-block">
                    <b>Versão do Sistema</b> {{env("VERSAO_SISTEMA")}}
                </div>
            </footer>

            <!-- Control Sidebar 
            <aside class="control-sidebar control-sidebar-dark">
                
            </aside>
            /.control-sidebar -->
        </div>
        <!-- ./wrapper -->

        <!-- jQuery -->
        <script src="{{url(asset('backend/assets/plugins/jquery/jquery.min.js'))}}"></script>        
        <!-- jQuery UI 1.11.4 -->
        <script src="{{url(asset('backend/assets/plugins/jquery-ui/jquery-ui.min.js'))}}"></script>
        <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
        <script>
            $.widget.bridge('uibutton', $.ui.button)
        </script>
        <!-- Bootstrap 4 -->
        <script src="{{url(asset('backend/assets/plugins/bootstrap/js/bootstrap.bundle.min.js'))}}"></script>
        <!-- ChartJS -->
        <script src="{{url(asset('backend/assets/plugins/chartjs/Chart.min.js'))}}"></script>
        <!-- DataTables -->
        <script src="{{url(mix('backend/assets/js/datatables-lib.js'))}}"></script>
        <!-- ChartJS -->   
        <script src="{{url(mix('backend/assets/js/datatables-lib.js'))}}"></script>
        <!-- Sparkline -->  
        <script src="{{url(asset('backend/assets/plugins/sparklines/sparkline.js'))}}"></script>
        <!-- JQVMap 
        <script src="{{url(asset('backend/assets/plugins/jqvmap/jquery.vmap.min.js'))}}"></script>
        <script src="{{url(asset('backend/assets/plugins/jqvmap/maps/jquery.vmap.usa.js'))}}"></script> 
        jQuery Knob Chart -->
        <script src="{{url(asset('backend/assets/plugins/jquery-knob/jquery.knob.min.js'))}}"></script>        
        <!-- daterangepicker -->
        <script src="{{url(asset('backend/assets/plugins/moment/moment.min.js'))}}"></script>
        <script src="{{url(asset('backend/assets/plugins/moment/moment-with-locales.js'))}}"></script>
        <script src="{{url(asset('backend/assets/plugins/daterangepicker/daterangepicker.js'))}}"></script>
        <!-- InputMask -->
        <script src="{{url(asset('backend/assets/plugins/inputmask/min/jquery.inputmask.bundle.min.js'))}}"></script>
        <!-- Tempusdominus Bootstrap 4 -->
        <script src="{{url(asset('backend/assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js'))}}"></script>
        <!-- Summernote -->
        <script src="{{url(asset('backend/assets/plugins/summernote/summernote-bs4.min.js'))}}"></script>
        <!-- include summernote-pt-BR -->
        <script src="{{url(asset('backend/assets/plugins/summernote/lang/summernote-pt-BR.js'))}}"></script>
        <!-- overlayScrollbars -->
        <script src="{{url(asset('backend/assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js'))}}"></script>
        <!-- Ekko Lightbox -->
        <script src="{{url(asset('backend/assets/plugins/ekko-lightbox/ekko-lightbox.min.js'))}}"></script>
        <!-- Toastr -->
        <script src="{{url(asset('backend/assets/plugins/toastr/toastr.min.js'))}}"></script>
        <!-- ChartJS -->
        <script src="{{url(asset('backend/assets/plugins/chartjs/Chart.min.js'))}}"></script>
        <!-- AdminLTE App -->
        <script src="{{url(asset('backend/assets/js/adminlte.min.js'))}}"></script>
        <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
        <script src="{{url(mix('backend/assets/js/dashboard.js'))}}"></script>
        <!--tags input-->
        <script src="{{url(mix('backend/assets/plugins/jquery-tags-input/jquery.tagsinput.js'))}}"></script>
        <script src="{{url(mix('backend/assets/js/jquery.mask.js'))}}"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="{{url(mix('backend/assets/js/demo.js'))}}"></script>
        <script src="{{url(mix('backend/assets/js/scripts.js'))}}"></script>
        <script src="{{url(asset('backend/assets/plugins/bootstrap-toggle/bootstrap-toggle.min.js'))}}"></script>
        
        
        @hasSection('js')
            @yield('js')
        @endif
    </body>
</html>