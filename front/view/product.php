<?php require_once 'layout_head.php'; ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Clientes</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href=".">Home</a></li>
            <li class="breadcrumb-item active">Clientes</li>
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
        <div class="card col-12">
          <!-- /.card-header -->
          <div class="card-body">
            <div class="row">
              <div class="col-6">
                <img src="<?= API_PATH . 'products_img/supercoffee.jpg' ?>" width="100%">
              </div>
              <div class="col-6">
                <h4><?= $product->produto ?></h4>
                <p><?= $product->description ?></p>
                <h4>R$ <?= $product->price ?></h4>
                <form method="post" action="product/buy">
                  <label for="amount" class="product-label">Quantidade</label>
                  <input type="number" name="amount" id="amount" class="form-control product-amount" value="1" min="1">
                  <input type="hidden" name="price" value="<?= $product->price ?>">
                  <input type="hidden" name="id" value="<?= $product->id ?>">
                  <input type="submit" class="btn btn-success product-buttom" onclick="return confirm('Deseja comprar esse produto?')" value="Comprar">
                </form>
              </div>
            </div>
          </div>
          <!-- /.card-body -->
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