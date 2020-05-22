<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Desafio</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="view/plugins/fontawesome-free/css/all.min.css">
  <!-- Toastr -->
  <link rel="stylesheet" href="view/plugins/toastr/toastr.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="view/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="view/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="view/plugins/adminlte/css/adminlte.min.css">
  <!-- Style -->
  <link rel="stylesheet" href="view/css/style.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition layout-top-nav">
  <div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
      <div class="container">

        <span class="brand-text font-weight-light">Desafio <b>Neuroteks</b></span>

        <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse order-3" id="navbarCollapse">
          <!-- Left navbar links -->
          <ul class="navbar-nav">
            <li class="nav-item">
              <a href="." class="nav-link">Home</a>
            </li>
            <li class="nav-item">
              <a href="companies" class="nav-link">Empresa</a>
            </li>
            <li class="nav-item dropdown">
              <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">Sistema</a>
              <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
                <li><a href="clients" class="dropdown-item">Listar Clientes</a></li>
                <li><a href="users" class="dropdown-item">Gerenciar Usuários</a></li>
              </ul>
            </li>
          </ul>
        </div>

        <!-- Right navbar links -->
        <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
          <!-- Notifications Dropdown Menu -->
          <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
              <i class="fas fa-user"></i> Olá, <b><?= explode(" ", $_SESSION['client']->name)[0] ?></b>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
              <span class="dropdown-header"><?= $_SESSION['client']->name ?></span>
              <div class="dropdown-divider"></div>
              <a href="#" class="dropdown-item">
                <i class="fas fa-user-circle mr-2"></i> Minha conta
              </a>
              <a href="orders" class="dropdown-item">
                <i class="fas fa-handshake mr-2"></i>Histórico de pedidos
              </a>
              <div class="dropdown-divider"></div>
              <a href="login/logout" class="dropdown-item dropdown-footer">Sair</a>
            </div>
          </li>
        </ul>
      </div>
    </nav>
    <!-- /.navbar -->