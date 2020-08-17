<?php require_once 'layout_head.php'; ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Novo usuário</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="..">Home</a></li>
            <li class="breadcrumb-item"><a href="../users">Usuários</a></li>
            <li class="breadcrumb-item active">Novo usuário</li>
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
            <a href="../users" class="btn btn-secondary">Voltar</a>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form method="post" action="<?= APP_PATH ?>user/register">
            <div class="card-body">
              <div class="form-group">
                <label for="client">Clientes</label>
                <select class="form-control" id="client" name="client" required>
                  <option value="">- Selecione -</option>
                  <?php foreach ($clients as $client) : ?>
                    <option value="<?= $client->id ?>"><?= $client->name ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
              <div class="form-group">
                <label for="access">Acesso</label>
                <select class="form-control" id="access" name="access" onchange="companyHide(this)" required>
                  <option value="">- Selecione -</option>
                  <option value="2">Suporte do site</option>
                  <option value="3">Administrador do site</option>
                  <option value="1">Administrador de empresa</option>
                </select>
              </div>
              <div class="form-group" id="company-form">
                <label for="company">Empresa</label>
                <select class="form-control" id="company" name="company" required>
                  <option value="">- Selecione -</option>
                  <?php foreach ($companies as $company) : ?>
                    <option value="<?= $company->id ?>"><?= $company->name ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
              <button type="submit" class="btn btn-success">Cadastrar</button>
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
  $('#company-form').hide();
  $('#company').prop('required', false);

  function companyHide(element) {
    if (element.value == 1) {
      $('#company-form').show();
      $('#company').prop('required', true);
    } else {
      $('#company-form').hide();
      $('#company').prop('required', false);
      $('#company').val('');
    }
  }
</script>