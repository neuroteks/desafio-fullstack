<?php require_once 'layout_head.php'; ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Novo produto</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="..">Home</a></li>
            <li class="breadcrumb-item"><a href="../products?id=<?= filter_input(INPUT_GET, 'id') ?>">Produtos</a></li>
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
            <a href="../products?id=<?= filter_input(INPUT_GET, 'id') ?>" class="btn btn-secondary">Voltar</a>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form method="post" action="<?= APP_PATH ?>product/register?id=<?= filter_input(INPUT_GET, 'id') ?>">
            <div class="card-body">
              <div class="form-group">
                <label for="name">Nome do produto</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Nome do produto" required>
              </div>
              <div class="form-group">
                <label for="description">Descrição</label>
                <input type="text" class="form-control" id="description" name="description" placeholder="Descrição breve" required>
              </div>
              <div class="form-group">
                <label for="price">Preço (R$)</label>
                <input type="text" class="form-control money" id="price" name="price" placeholder="R$ 00,00" required>
              </div>
              <div class="form-group">
                <label for="amount">Quantidade</label>
                <input type="number" class="form-control" id="amount" name="amount" placeholder="0" required>
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
  $('.money').mask('#.##0,00', {reverse: true});
</script>