<?php
// start session
session_start();
// Include config file
require_once "../config.php";

if(!empty($_SESSION["role"])){
    $first_name = $_SESSION["first_name"];
}else{
    // Redirect user to welcome page
    $URL_redirect = "../index.php";
    header("location: ".$URL_redirect);
}

if(!empty($_GET["id"])){
    $id = $_GET["id"];
    $i = 0;
    include "./api/getServices.php";
    $services = get_services_where($id);
    $service_name = $services[$i]['service_name'];
    $service_cost = $services[$i]['service_cost'];
    $image = $services[$i]['image'];
    $service_availability_status = $services[$i]['service_availability_status'];
    $service_last_updated_datetime = $services[$i]['service_last_updated_datetime'];
    $creation_date = $services[$i]['creation_date'];
    $delete_url = "manage_services_delete_process.php?id=$id";
}

?>

<?php
    include "./header.php";
?>
<?php
    include "./sidebar.php";
?>
  

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-10">
                <h1 class="m-0">Manage Meals | Delete</h1>
            </div><!-- /.col -->
            <div class="col-sm-2"></div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Delete Vegan Meal</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="./manage_services_update_process.php?id=<?php echo $id;?>" method="post" autocomplete="off" enctype="multipart/form-data">
                        <div class="card-body">
                            <div class="form-group">
                                <label>Name of dish</label>
                                <p><?php echo $service_name;?></p>
                            </div>
                            <div class="form-group">
                                <label>Cost</label>
                                <p>£<?php echo $service_cost;?></p>
                            </div>
                            <div class="form-group">
                                <label>Dish Image</label>
                                <br>
                                <img src="../images/<?php echo $image;?>" width="200px;">
                            </div>
                            <div class="form-group">
                                <label>Status</label>
                                <p><?php echo $service_availability_status;?></p>
                            </div>
                            <div class="form-group">
                                <label>Last Update</label>
                                <p><?php echo $service_last_updated_datetime;?></p>
                            </div>
                            <div class="form-group">
                                <label>Created Date</label>
                                <p><?php echo $creation_date;?></p>
                            </div>
                        </div><!-- /.card-body -->
                        <div class="card-footer">
                            <a href="<?php echo $delete_url;?>" class="btn btn-danger"><i class="fa fa-trash"></i> Delete</a>
                        </div>
                    </form>
                </div><!-- /.card -->
            </div><!-- /.container-fluid -->
        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->
    <footer class="main-footer">
    <strong>Copyright &copy; 2022 <a href="https://eliamtechnologies.com/event-management-system">Better Than At Home</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
        
    </div>
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes 
<script src="dist/js/demo.js"></script>
-->
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>

<!-- DataTables  & Plugins -->
<script src="./plugins/datatables/jquery.dataTables.min.js"></script>
<script src="./plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="./plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="./plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="./plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="./plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="./plugins/jszip/jszip.min.js"></script>
<script src="./plugins/pdfmake/pdfmake.min.js"></script>
<script src="./plugins/pdfmake/vfs_fonts.js"></script>
<script src="./plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="./plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="./plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src="./dist/js/adminlte.min.js"></script>
<!-- Page specific script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
</body>
</html>
