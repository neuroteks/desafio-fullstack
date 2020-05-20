<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Desafio</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="view/plugins//fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Toastr -->
  <link rel="stylesheet" href="view/plugins/toastr/toastr.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="view/plugins/adminlte/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition login-page">
  <div class="login-box">
    <div class="login-logo">
      Desafio <b>Neuroteks</b>
    </div>
    <!-- /.login-logo -->
    <div class="card">
      <div class="card-body login-card-body">
        <p class="login-box-msg">Crie sua conta preenchendo as informações abaixo.</p>

        <form action="user/register" method="post">
          <div class="input-group mb-3">
            <input type="text" name="name" class="form-control" placeholder="Nome">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="text" name="email" class="form-control" placeholder="Email">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="text" name="cpf" class="form-control" placeholder="CPF">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-fingerprint"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" name="password" class="form-control" placeholder="Senha">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" name="password_confirm" class="form-control" placeholder="Confirmar senha">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <button type="submit" class="btn btn-primary btn-block" onclick="return confirm('ctz?')">Registrar</button>
        </form>
        <hr>
        <p class="mb-1">
          <a href="login">Já possuo uma conta. Entrar</a>
        </p>
      </div>
      <!-- /.login-card-body -->
    </div>
  </div>
  <!-- /.login-box -->

  <!-- jQuery -->
  <script src="view/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="view/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- SweetAlert2 -->
  <script src="view/plugins/sweetalert2/sweetalert2.min.js"></script>
  <!-- Toastr -->
  <script src="view/plugins/toastr/toastr.min.js"></script>
  <!-- AdminLTE App -->
  <script src="view/plugins/adminlte/js/adminlte.min.js"></script>

  <?php
  if (isset($_SESSION['message'])) {
    echo '<script>toastr.' . $_SESSION['message'][0] . '("' . $_SESSION['message'][1] . '")</script>';
    unset($_SESSION['message']);
  }
  ?>
</body>

</html>