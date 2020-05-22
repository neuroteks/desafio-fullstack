<?php require_once 'layout_head.php'; ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Produtos</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item active">Home</li>
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
        <div class="card col-4">
          <div class="card-header">
            <h4 class="product-name">Super Café</h4>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div class="row">
              <div class="col-6">
                <img src="<?= API_PATH . 'products_img/supercoffee.jpg' ?>" width="100%">
              </div>
              <div class="col-6">
                <h4>R$ 10,00</h4>
                <p><?= substr("Lorem, ipsum dolor sit amet consectetur adipisicing elit. Omnis quo voluptatibus dignissimos tenetur alias sint nemo velit enim asperiores odio quidem, sit nulla neque quisquam ratione, explicabo quas distinctio laboriosam!", 0, 60) ?>
                  <?php if (strlen("Lorem, ipsum dolor sit amet consectetur adipisicing elit. Omnis quo v") > 60) echo '...' ?></p>
                <a href="product" class="btn btn-primary">Ver produto</a>
              </div>
            </div>
          </div>
          <!-- /.card-body -->
          <div class="card-footer">
            <label>Vendido por:</label> Empresa 01
          </div>
        </div>
        <!-- /.card -->
        <div class="card col-4">
          <div class="card-header">
            <h4 class="product-name">Caneca Café Programador</h4>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div class="row">
              <div class="col-6">
                <img src="<?= API_PATH . 'products_img/canecacafe.jpg' ?>" width="100%">
              </div>
              <div class="col-6">
                <h4>R$ 10,00</h4>
                <p><?= substr("Lorem, ipsum dolor sit amet consectetur adipisicing elit. Omnis quo voluptatibus dignissimos tenetur alias sint nemo velit enim asperiores odio quidem, sit nulla neque quisquam ratione, explicabo quas distinctio laboriosam!", 0, 60) ?>
                  <?php if (strlen("Lorem, ipsum dolor sit amet consectetur adipisicing elit. Omnis quo v") > 60) echo '...' ?></p>
                <a href="" class="btn btn-primary">Ver produto</a>
              </div>
            </div>
          </div>
          <!-- /.card-body -->
          <div class="card-footer">
            <label>Vendido por:</label> Empresa 01
          </div>
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