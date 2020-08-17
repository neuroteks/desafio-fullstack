<?php require_once 'layout_head.php'; ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Usuários</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href=".">Home</a></li>
            <li class="breadcrumb-item active">Usuários</li>
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
            <a href="users/add" class="btn btn-success">Criar usuário</a>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="datatable" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Nome</th>
                  <th>Empresa</th>
                  <th>Acesso</th>
                  <th width="50px"></th>
                </tr>
              </thead>
              <tbody>
                <?php foreach($result as $user) : ?>
                <tr>
                  <td><?= $user->cname ?></td>
                  <td><?= $user->ename ?></td>
                  <td><?= $user->acesso ?></td>
                  <td>
                    <a href="user/delete?id=<?= $user->id ?>" class="btn btn-danger" onclick="return confirm('Certeza que deseja deletar?')">Deletar</a>
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