</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="view/plugins/jquery/jquery.min.js"></script>
<script src="view/plugins/jquery/jquery.mask.min.js"></script>
<!-- Bootstrap 4 -->
<script src="view/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables -->
<script src="view/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="view/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="view/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="view/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<!-- SweetAlert2 -->
<script src="view/plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- Toastr -->
<script src="view/plugins/toastr/toastr.min.js"></script>
<!-- AdminLTE App -->
<script src="view/plugins/adminlte/js/adminlte.min.js"></script>

<?php
if (isset($_SESSION['message'])) {
    echo '<script>toastr.' . $_SESSION['message'][0] . '("' . $_SESSION['message'][1] . '")</script>';
    unset($_SESSION['message']);
}
?>

</body>

</html>