<?php require_once 'layout_head.php'; ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Empresas</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href=".">Home</a></li>
            <li class="breadcrumb-item active">Empresas</li>
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
          <div class="card-header">
            <a href="products/add?id=<?= $id ?>" class="btn btn-success">Novo produto</a>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="datatable" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Nome do produto</th>
                  <th>Descrição</th>
                  <th>Preço(R$)</th>
                  <th>Qtd.</th>
                  <th width="50px"></th>
                </tr>
              </thead>
              <tbody>
              <?php foreach($result as $product) : ?>
                <tr>
                  <td><?php echo $product->name; ?></td>
                  <td><?php echo $product->description; ?></td>
                  <td><?php echo $product->price; ?></td>
                  <td><?php echo $product->amount; ?></td>
                  <td>
                    <a href="products/delete?id=<?= $product->id ?>" class="btn btn-danger" onclick="return confirm('Deseja realmente deletar esse produto?')">Deletar</a>
                  </td>
                </tr> 
                <?php endforeach; ?>
              </tbody>
            </table>
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

<!-- Page Script -->
<script>
  $(function() {
    $("#datatable").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
  });
</script>