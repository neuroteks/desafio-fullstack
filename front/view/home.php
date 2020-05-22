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
        <?php foreach ($products as $product) : ?>
          <div class="card col-4">
            <div class="card-header">
              <h4 class="product-name"><?= $product->produto ?></h4>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <div class="row">
                <div class="col-6">
                  <img src="<?= API_PATH . 'products_img/supercoffee.jpg' ?>" width="100%">
                </div>
                <div class="col-6">
                  <h4>R$ <?= $product->price ?></h4>
                  <p><?= substr($product->description, 0, 60) ?>
                    <?php if (strlen($product->description) > 60) echo '...' ?></p>
                  <a href="product?id=<?= $product->id ?>" class="btn btn-primary">Ver produto</a>
                </div>
              </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
              <label>Vendido por:</label> <?= $product->empresa ?>
            </div>
          </div>
          <!-- /.card -->

        <?php endforeach; ?>
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php require_once 'layout_foot.php'; ?>