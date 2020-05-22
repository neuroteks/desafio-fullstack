<?php require_once 'layout_head.php'; ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Nova empresa</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href=".">Home</a></li>
            <li class="breadcrumb-item"><a href="companies">Empresas</a></li>
            <li class="breadcrumb-item active">Nova empresa</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <div class="content">
    <div class="container">
      <div class="row">
        <!-- general form elements -->
        <div class="card col-12">
          <div class="card-header">
            <a href="companies" class="btn btn-secondary">Voltar</a>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form>
            <div class="card-body">
              <div class="form-group">
                <label for="exampleInputEmail1">Nome da empresa</label>
                <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Nome da empresa">
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">CNPJ</label>
                <input type="text" class="form-control" id="exampleInputPassword1" placeholder="00.000.000/0000-00">
              </div>
              <button type="submit" class="btn btn-primary">Cadastrar</button>
            </div>
            <!-- /.card-body -->
          </form>
        </div>
        <!-- /.card -->
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php require_once 'layout_foot.php'; ?>