<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 3 | 404 Page not found</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= APP_PATH ?>/view/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= APP_PATH ?>/view/plugins/adminlte/css/adminlte.min.css">
  <!-- Style -->
  <link rel="stylesheet" href="<?= APP_PATH ?>/view/css/style.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<?php 
echo '<pre>';
var_dump($_SESSION['client']);
echo '</pre>';
?>
<body class="layout-top-nav">
  <div class="wrapper">

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <div class="container">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <div class="container-fluid">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active">404 Error Page</li>
            </ol>
          </div><!-- /.container-fluid -->
        </section>
        <!-- Main content -->
        <section class="content page-error">
          <div class="error-page">
            <h2 class="headline text-warning"> 404</h2>
            <div class="error-content">
              <h3><i class="fas fa-exclamation-triangle text-warning"></i> Oops! Pagina não encontrada.</h3>
              <p>
                Não foi possível encontrar a que você está procurando.
                <a href="<?= APP_PATH ?>">Retornar ao nosso site</a>
              </p>
            </div>
            <!-- /.error-content -->
          </div>
          <!-- /.error-page -->
        </section>
        <!-- /.content -->
      </div>
    </div>
    <!-- /.content-wrapper -->
  </div>
  <!-- ./wrapper -->
</body>

</html>