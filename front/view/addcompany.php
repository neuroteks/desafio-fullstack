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
            <li class="breadcrumb-item"><a href="..">Home</a></li>
            <li class="breadcrumb-item"><a href="../companies">Empresas</a></li>
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
            <a href="../companies" class="btn btn-secondary">Voltar</a>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form method="post" action="../company/register">
            <div class="card-body">
              <div class="form-group">
                <label for="name">Nome da empresa</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Nome da empresa" required maxlength="100">
              </div>
              <div class="form-group">
                <label for="cnpj">CNPJ</label>
                <input type="text" class="form-control cnpj" id="cnpj" name="cnpj" placeholder="00.000.000/0000-00" required>
              </div>
              <button type="submit" class="btn btn-primary" onclick="return validation()">Cadastrar</button>
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
<script>
  $('.cnpj').mask('00.000.000/0000-00', {
    reverse: true
  });

  function validation() {
    if ($('#cnpj')[0].value.length < 17) {
      toastr.error("CNPJ inválido!");
      return false;
    }
    return true;
  }
</script>