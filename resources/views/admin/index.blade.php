<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Painel Administrativo Super Imóveis</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{url(asset('backend/assets/plugins/fontawesome-free/css/all.min.css'))}}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{url(asset('backend/assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css'))}}">
  <!-- Toastr -->
  <link rel="stylesheet" href="{{url(asset('backend/assets/plugins/toastr/toastr.min.css'))}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{url(asset('backend/assets/css/adminlte.min.css'))}}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <link rel="stylesheet" href="{{url(mix('backend/assets/css/styles.css'))}}">
  <link rel="icon" type="image/png" href="{{ url(asset('backend/assets/images/chave.png')) }}"/>
  <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body class="hold-transition login-page login-body">
    
    {{--<div class="ajax_response"></div>--}} 
    
<div class="login-box mt-5">
  <div class="login-logo mt-5">
    <img width="{{env('LOGOMARCA_GERENCIADOR_WIDTH')}}" height="{{env('LOGOMARCA_GERENCIADOR_HEIGHT')}}" src="{{$configuracoes->getlogoadmin()}}" alt="{{$configuracoes->nomedosite}}" class="elevation-3">
  </div>
    
   
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      
      <form action="{{ route('admin.login.do') }}" method="post" autocomplete="off" name="login">
        <div class="input-group mb-3">
            <input type="email" class="form-control" placeholder="Email" name="email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
            <input type="password" class="form-control" placeholder="Senha" name="password_check">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            {{--<div class="icheck-primary">
              <input type="checkbox" id="remember" name="remember">
              <label for="remember">
                Lembrar-me
              </label>
            </div>--}}
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Entrar</button>
            <?php //echo bcrypt('fazenda1964');?>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <p class="mb-1">
        <a class="open_recover" href="">Esqueci minha senha</a>
      </p> 

      <form action="" method="post" class="recover j_recoverpass" style="display: none;" autocomplete="off" name="recover">
        @csrf        
        <div class="input-group mb-3 mt-3 form_hide">
          <input type="email" class="form-control" placeholder="Email" name="email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="row form_hide">
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block recov">Recuperar Minha Senha</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="{{url(asset('backend/assets/plugins/jquery/jquery.min.js'))}}"></script> 
<!-- Bootstrap 4 -->
<script src="{{url(asset('backend/assets/plugins/bootstrap/js/bootstrap.bundle.min.js'))}}"></script>
<!-- Toastr -->
<script src="{{url(asset('backend/assets/plugins/toastr/toastr.min.js'))}}"></script>
<!-- AdminLTE App -->
<script src="{{url(asset('backend/assets/js/adminlte.min.js'))}}"></script>

<script src="{{url(mix('backend/assets/js/scripts.js'))}}"></script>
<script src="{{url(mix('backend/assets/js/login.js'))}}"></script>

<script>
  $(function () {

    // Seletor, Evento/efeitos, CallBack, Ação
    $('.j_recoverpass').submit(function (){
        var form = $(this);
        var dataString = $(form).serialize();

        $.ajax({
            url: "{{ route('admin.recover.do') }}",
            data: dataString,
            type: 'POST',
            dataType: 'JSON',
            beforeSend: function(){
                form.find(".recov").attr("disabled", true);
                form.find('.recov').html("Carregando...");
            },
            success: function(response){
                if(response.message) {
                    toastr.error(response.message);
                }
                if(response.success) {
                  toastr.success(response.success);
                  form.find('input[class!="noclear"]').val('');
                  $('.open_recover').fadeOut(500);
                  form.find('.form_hide').fadeOut(500);
                }
            },
            complete: function(){
                form.find(".recov").attr("disabled", false);
                form.find('.recov').html("Recuperar Minha Senha");                                
            }
        });

        return false;
    });

      $('.open_recover').on('click', function (event) {
          event.preventDefault();
          box = $(".recover");
          button = $(this);
          if (box.css("display") !== "none") {
              button.text("Esqueci minha senha");
          } else {
              button.text("↑ Ocultar");
          }
          box.slideToggle();
      });

  });
</script>

</body>
</html>