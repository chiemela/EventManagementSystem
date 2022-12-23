<?php
// start session
session_start();
// Include config file
require_once "../config.php";

if(!empty($_SESSION["role"])){
    if($_SESSION["role"] == "Admin"){
        $first_name = $_SESSION["first_name"];
    }
}else{
    // Redirect user to welcome page
    $URL_redirect = "../index.php";
    header("location: ".$URL_redirect);
}

if(!empty($_GET["email"])){
    $email_id = $_GET["email"];
    $i = 0;
    include "./api/getUsers.php";
    $users = get_user_where($email_id);
    $first_name = $users[$i]['first_name'];
    $last_name = $users[$i]['last_name'];
    $phone = $users[$i]['phone'];
    $address = $users[$i]['address'];
    $location = $users[$i]['location'];
    $delete_url = "manage_users_delete_process.php?email_id=$email_id";
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
                <h1 class="m-0">Manage Users | Delete</h1>
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
                        <h3 class="card-title">Delete User Completely</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="./manage_services_update_process.php?id=<?php echo $id;?>" method="post" autocomplete="off" enctype="multipart/form-data">
                        <div class="card-body">
                            <div class="form-group">
                                <label>First Name</label>
                                <p><?php echo $first_name;?></p>
                            </div>
                            <div class="form-group">
                                <label>Last Name</label>
                                <p><?php echo $last_name;?></p>
                            </div>
                            <div class="form-group">
                                <label>Phone</label>
                                <p><?php echo $phone;?></p>
                            </div>
                            <div class="form-group">
                                <label>Address</label>
                                <p><?php echo $address;?></p>
                            </div>
                            <div class="form-group">
                                <label>Location</label>
                                <p><?php echo $location;?></p>
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
