@extends('admin.master.master')

@section('content')


<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Painel de Controle</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Início</a></li>
                    <li class="breadcrumb-item active">Painel de Controle</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<section class="content">
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-12 col-xs-12 col-sm-6 col-md-6 col-lg-6">
                <div class="card card-danger">                
                    <div class="card-body">
                      <canvas id="donutChartprojetos" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-12 col-xs-12 col-sm-6 col-md-6 col-lg-6">
                <div class="row">
                    <div class="col-md-6 col-xs-6">
                        <div class="info-box">
                            <span class="info-box-icon bg-teal"><a href="{{route('admin.artigos.index')}}" title="Artigos"><i class="fa far fa-pen"></i></a></span>        
                            <div class="info-box-content">
                                <span class="info-box-text"><b>Artigos</b></span>
                                <span class="info-box-text">Publicados: {{ $postsPostson }}</span>
                                <span class="info-box-text">Rascunhos: {{ $postsPostsoff }}</span>
                                <span class="info-box-text">Total: {{ $postsTotal }}</span>
                            </div>
                        </div>
                    </div>
                    {{--<div class="col-md-6">
                        <div class="info-box">
                            <span class="info-box-icon bg-teal"><a href="{{route('admin.projetos.index')}}" title="Projetos"><i class="fa far fa-briefcase"></i></a></span>        
                            <div class="info-box-content">
                                <span class="info-box-text"><b>Projetos</b></span>
                                <span class="info-box-text">Disponíveis: {{ $projetosAvailable }}</span>
                                <span class="info-box-text">Inativos: {{ $projetosUnavailable }}</span>
                                <span class="info-box-text">Total: {{ $projetosTotal }}</span>
                            </div>
                        </div>
                    </div>--}}
                    <div class="col-md-6">
                        <div class="info-box">
                            <span class="info-box-icon bg-teal"><a href="{{route('admin.users.index')}}" title="Clientes"><i class="fa far fa-users"></i></a></span>        
                            <div class="info-box-content">
                                <span class="info-box-text"><b>Usuários</b></span>
                                <span class="info-box-text">Clientes: {{ $cliente }}</span>
                                <span class="info-box-text">Time: {{ $time }}</span>
                            </div>
                        </div>
                  </div>
                  <div class="col-md-6">
                      <div class="info-box">
                        <span class="info-box-icon bg-teal"><a href="{{route('admin.empresas.index')}}" title="Empresas"><i class="fa far fa-city"></i></a></span>
                        <div class="info-box-content">
                            <span class="info-box-text"><b>Empresas</b></span>
                            <span class="info-box-text">Publicadas: {{$empresasAvailable}}</span>
                            <span class="info-box-text">Rascunhos: {{$empresasUnavailable}}</span>
                            <span class="info-box-text">Total: {{$empresasTotal}}</span>
                        </div>
                      </div>
                  </div>
                  <div class="col-md-6">
                      <div class="info-box">
                        <span class="info-box-icon bg-info"><i class="ion ion-person-add"></i></span>
                        <div class="info-box-content">
                          <span class="info-box-text">Visitas/Hoje</span>
                          <span class="info-box-number">{{$visitasHoje->count()}}</span>
                        </div>
                      </div>                      
                  </div>
                  <div class="col-md-6">
                    <div class="info-box">
                      <span class="info-box-icon bg-info"><i class="ion ion-person-add"></i></span>  
                      <div class="info-box-content">
                        <span class="info-box-text">Total/Últimos 6 meses</span>
                        <span class="info-box-number">                   
                          @php                      
                            $json_file = json_encode($analyticsData->totalsForAllResults);
                            $json_str = json_decode($json_file, true);
                            echo $json_str['ga:sessions'] + $json_str['ga:visitors'];
                          @endphp
                        </span>
                      </div>
                    </div>
                </div>
                </div>
            </div>
            
        </div>
        <!-- /.row -->

        
        <div class="row">
          <section class="col-lg-6 connectedSortable">
                <!-- BAR CHART -->
                <div class="card card-teal">
                    <div class="card-header">
                      <h3 class="card-title">Visitas/Últimos 6 meses</h3>

                      <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                      </div>
                    </div>
                    <div class="card-body">
                      <div class="chart">
                        <canvas id="barChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                      </div>
                    </div>
                    <!-- /.card-body -->
                </div>
              <!-- /.card -->
          </section>
          <section class="col-lg-6 connectedSortable">
            <!-- DONUT CHART -->
            <div class="card card-teal">
              <div class="card-header">
                <h3 class="card-title">Dispositivos/Últimos 6 meses</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                </div>
              </div>
              <div class="card-body">
                <canvas id="donutChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </section>
        </div><!-- /.row -->


        <!-- Main row -->
        <div class="row">
          
            {{--<!-- Left col -->
            <section class="col-lg-6 connectedSortable"> 
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Últimos Projetos Cadastrados</h3>      
                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                      <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                      <i class="fas fa-times"></i>
                    </button>
                  </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                  <ul class="products-list product-list-in-card pl-2 pr-2">
                    @if($projetosLast->count())
                        @foreach($projetosLast as $projetolast)
                        <li class="item">
                            <div class="product-img">
                                <a href="{{url($projetolast->nocover())}}" data-title="{{$projetolast->titulo}}" data-toggle="lightbox"> 
                                    <img src="{{url($projetolast->cover())}}" alt="{{$projetolast->titulo}}" class="img-size-50">
                                </a>
                            </div>
                            <div class="product-info">                                                              
                              <span class="product-description">
                                {{$projetolast->titulo}}
                              </span>
                            </div>
                        </li>
                        @endforeach
                    @endif                        
                  </ul>
                </div>
                <!-- /.card-body -->
                <div class="card-footer text-center">
                  <a href="{{route('admin.projetos.index')}}" class="uppercase">Ver Todos</a>
                </div>
                <!-- /.card-footer -->
              </div>
            </section>
            <!-- /.Left col -->--}}

            <!-- right col (We are only adding the ID to make the widgets sortable)-->
            <section class="col-lg-6 connectedSortable">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Últimos Artigos Cadastrados</h3>      
                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                      <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                      <i class="fas fa-times"></i>
                    </button>
                  </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                  <ul class="products-list product-list-in-card pl-2 pr-2">
                    @if($artigosLast->count())
                        @foreach($artigosLast as $artigolast)
                        <li class="item">
                            <div class="product-img">
                                <a href="{{url($artigolast->nocover())}}" data-title="{{$artigolast->titulo}}" data-toggle="lightbox"> 
                                    <img src="{{url($artigolast->cover())}}" alt="{{$artigolast->titulo}}" class="img-size-50">
                                </a>
                            </div>
                            <div class="product-info">
                                <a href="{{route('admin.artigos.edit', ['artigo' => $artigolast->id] )}}" class="product-title">
                                  {{$artigolast->categoriaObject->titulo}}                                   
                                </a>                               
                              <span class="product-description">
                                {{$artigolast->titulo}}
                              </span>
                            </div>
                        </li>
                        @endforeach
                    @endif                        
                  </ul>
                </div>
                <!-- /.card-body -->
                <div class="card-footer text-center">
                  <a href="{{route('admin.artigos.index')}}" class="uppercase">Ver Todos</a>
                </div>
                <!-- /.card-footer -->
              </div>
            </section>
            
            <!-- right col -->            
            <section class="col-12 connectedSortable">
            {{--    @if($projetosTop->count())
                <div class="card">
                    <div class="card-header">
                      <h3 class="card-title">Projetos mais visitados</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-0">
                      <table class="table table-sm">
                        <thead>
                          <tr>
                            <th class="text-center">Foto</th>
                            <th>Título</th>
                            <th></th>
                            <th class="text-center">Visitas</th>
                          </tr>
                        </thead>
                        <tbody>                            
                            @foreach($projetosTop as $projetotop)
                            @php
                                //REALIZA PORCENTAGEM DE VISITAS POR NAVEGADOR!
                                $percent = substr(( $projetotop['views'] / $projetostotalviews ) * 100, 0, 5);
                                $percenttag = str_replace(",", ".", $percent);
                            @endphp
                            <tr>
                                <td class="text-center">
                                    <a href="{{url($projetotop->nocover())}}" data-title="{{$projetotop->titulo}}" data-toggle="lightbox"> 
                                        <img src="{{url($projetotop->cover())}}" alt="{{$projetotop->titulo}}" class="img-size-50">
                                    </a>
                                </td>
                                <td>{{$projetotop->titulo}}</td>
                                <td style="width:10%;">
                                  <div class="progress progress-md progress-striped active">
                                    <div class="progress-bar bg-primary" style="width: {{$percenttag}}%"></div>
                                  </div>
                                </td>
                                <td class="text-center">
                                  <span class="badge bg-primary">{{$projetotop->views}}</span>
                                  <a data-toggle="tooltip" data-placement="top" title="Editar Imóvel" href="{{route('admin.projetos.edit', ['projeto' => $projetotop->id])}}" class="btn btn-xs btn-default ml-2"><i class="fas fa-pen"></i></a>
                                </td>
                            </tr>
                            @endforeach                            
                        </tbody>
                      </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                @endif
                --}}
                @if($artigosTop->count())
                <div class="card">
                    <div class="card-header">
                      <h3 class="card-title">Artigos mais visitados</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-0">
                      <table class="table table-sm">
                        <thead>
                          <tr>
                            <th class="text-center">Foto</th>
                            <th>Título</th>
                            <th></th>
                            <th class="text-center">Visitas</th>
                          </tr>
                        </thead>
                        <tbody>                            
                            @foreach($artigosTop as $artigotop)
                            @php
                                //REALIZA PORCENTAGEM DE VISITAS POR NAVEGADOR!
                                $percent = substr(( $artigotop['views'] / $artigostotalviews ) * 100, 0, 5);
                                $percenttag = str_replace(",", ".", $percent);
                            @endphp
                            <tr>
                                <td class="text-center">
                                    <a href="{{url($artigotop->nocover())}}" data-title="{{$artigotop->titulo}}" data-toggle="lightbox"> 
                                        <img src="{{url($artigotop->cover())}}" alt="{{$artigotop->titulo}}" class="img-size-50">
                                    </a>
                                </td>
                                <td>{{$artigotop->titulo}}</td>
                                <td style="width:10%;">
                                  <div class="progress progress-md progress-striped active">
                                    <div class="progress-bar bg-primary" style="width: {{$percenttag}}%"></div>
                                  </div>
                                </td>
                                <td class="text-center">
                                  <span class="badge bg-primary">{{$artigotop->views}}</span>
                                  <a data-toggle="tooltip" data-placement="top" title="Editar Imóvel" href="{{route('admin.artigos.edit', ['artigo' => $artigotop->id])}}" class="btn btn-xs btn-default ml-2"><i class="fas fa-pen"></i></a>
                                </td>
                            </tr>
                            @endforeach                            
                        </tbody>
                      </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                @endif
            </section>
        </div>
        <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
</section>

@endsection

@section('js')
<script>     
    $(function () { 

        $(document).on('click', '[data-toggle="lightbox"]', function(event) {
            event.preventDefault();
            $(this).ekkoLightbox({
            alwaysShowClose: true
            });
        });

        var areaChartData = {
        labels  : [
          @foreach($analyticsData->rows as $dataMonth)                
              'Mês/{{substr($dataMonth[0], -2)}}',                                 
          @endforeach
          ],
        datasets: [
            {
            label               : 'Visitas Únicas',
            backgroundColor     : 'rgba(60,141,188,0.9)',
            borderColor         : 'rgba(60,141,188,0.8)',
            pointRadius          : false,
            pointColor          : '#3b8bba',
            pointStrokeColor    : 'rgba(60,141,188,1)',
            pointHighlightFill  : '#fff',
            pointHighlightStroke: 'rgba(60,141,188,1)',
            data                : [
                                  @foreach($analyticsData->rows as $dataMonth)                
                                      '{{$dataMonth[2]}}',                                 
                                  @endforeach
                                  ]
            },
            {
            label               : 'Visitas',
            backgroundColor     : 'rgba(210, 214, 222, 1)',
            borderColor         : 'rgba(210, 214, 222, 1)',
            pointRadius         : false,
            pointColor          : 'rgba(210, 214, 222, 1)',
            pointStrokeColor    : '#c1c7d1',
            pointHighlightFill  : '#fff',
            pointHighlightStroke: 'rgba(220,220,220,1)',
            data                : [
                                  @foreach($analyticsData->rows as $dataMonth)                
                                      '{{$dataMonth[1]}}',                                 
                                  @endforeach
                                  ]
            },
        ]
        }

        
        //-------------
        //- BAR CHART -
        //-------------
        var barChartCanvas = $('#barChart').get(0).getContext('2d');
        var barChartData = jQuery.extend(true, {}, areaChartData);
        var temp0 = areaChartData.datasets[0]
        var temp1 = areaChartData.datasets[1]
        barChartData.datasets[0] = temp1
        barChartData.datasets[1] = temp0

        var barChartOptions = {
        responsive              : true,
        maintainAspectRatio     : false,
        datasetFill             : false
        }

        var barChart = new Chart(barChartCanvas, {
        type: 'bar', 
        data: barChartData,
        options: barChartOptions
        });

        function dynamicColors() {
        var r = Math.floor(Math.random() * 255);
        var g = Math.floor(Math.random() * 255);
        var b = Math.floor(Math.random() * 255);
        return "rgba(" + r + "," + g + "," + b + ", 0.5)";
    }
        
    
    // var donutChartCanvasProjetos = $('#donutChartprojetos').get(0).getContext('2d');
    // var donutDataprojetos        = {
    //       labels: [ 
    //         'Projetos Inativos', 
    //         'Projetos Disponíveis',             
    //       ],
    //       datasets: [
    //         {
    //           data: [{{-- $projetosUnavailable --}},{{-- $projetosAvailable --}}],
    //             backgroundColor : ['#d2d6de', '#00a65a'],
    //         }
    //       ]
    //     }
    //     var donutOptions     = {
    //       maintainAspectRatio : false,
    //       responsive : true,
    //     }

    //     var donutChart = new Chart(donutChartCanvasProjetos, {
    //       type: 'doughnut',
    //       data: donutDataprojetos,
    //       options: donutOptions      
    //     });


        //-------------
        //- DONUT CHART -
        //-------------
        // Get context with jQuery - using jQuery's .get() method.
        var donutChartCanvas = $('#donutChart').get(0).getContext('2d');
        var donutData        = {
          labels: [
              @if(!empty($top_browser))
                @foreach($top_browser as $browser)
                  '{{$browser['browser']}}',
                @endforeach
              @else
                'Chrome', 
                'IE',
                'FireFox', 
                'Safari', 
                'Opera', 
                'Navigator',
              @endif               
          ],
          datasets: [
            {
              data: [
                @if(!empty($top_browser))
                  @foreach($top_browser as $key => $browser)
                    {{$browser['sessions']}},
                  @endforeach
                @else
                  700,500,400,600,300,100
                @endif                
                ],
              backgroundColor : [
                @foreach($top_browser as $key => $browser)
                  dynamicColors(),
                @endforeach
                ],
            }
          ]
        }
        var donutOptions     = {
          maintainAspectRatio : false,
          responsive : true,
        }

        //Create pie or douhnut chart
        // You can switch between pie and douhnut using the method below.
        var donutChart = new Chart(donutChartCanvas, {
          type: 'doughnut',
          data: donutData,
          options: donutOptions      
        });
        
        
       
       
    });
</script>
@endsection