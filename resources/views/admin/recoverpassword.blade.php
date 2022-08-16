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
      <p class="login-box-msg">Redefina sua senha agora.</p>

      <form action="{{route('admin.resetpass.do')}}" method="post" name="resetpass">
        <div class="input-group mb-3">
          <input type="hidden" name="remember_token" value="{{$remember_token}}"/>
          <input type="password" class="form-control" placeholder="Senha" name="password_check">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Confirmar Senha" name="password_check1">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block">Redefinir Senha</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <p class="mt-3 mb-1">
        <a href="{{route('admin.login')}}">Login</a>
      </p>
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

<script>
  $(function () {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('form[name="resetpass"]').submit(function (event) {
        event.preventDefault();

        const form = $(this);
        const action = form.attr('action');
        const password = form.find('input[name="password_check"]').val();
        const password1 = form.find('input[name="password_check1"]').val();
        const remember_token = form.find('input[name="remember_token"]').val();

        $.post(action, {password: password, password1: password1, remember_token: remember_token}, function (response) {

            if(response.message) {
                toastr.error(response.message);
            }

            if(response.redirect) {
                toastr.success('Senha redefinida com sucesso!');
                window.location.href = response.redirect;
            }
        }, 'json');

    });

  });
</script>

</body>
</html>