<?php
// start session
session_start();
// Include config file
require_once "../config.php";

if($_SESSION["role"] == "Admin"){
    $first_name = $_SESSION["first_name"];
    $email = $_SESSION["email"];
}

include "./api/getUsers.php";
$users = get_users();
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
          <div class="col-sm-6">
            <h1 class="m-0">Manage Users</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">View and Manage All Users</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>S/N</th>
                  <th>User ID</th>
                  <th>First Name</th>
                  <th>Last Name</th>
                  <th>Phone</th>
                  <th>Email</th>
                  <th>Address</th>
                  <th>Location</th>
                  <th>Modified Date</th>
                  <th>Reg Date</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  if ($users !== true) {
                    $i = 0;
                    $serial_number = 1;
                    while ($i < count($users)) {
                      $item_email = $users[$i]['email'];
                      $users_email_url = "manage_users_update.php?email=$item_email";
                      $delete_url = "manage_users_delete.php?email=$item_email";
                      echo '
                        <tr>
                          <td>'.$serial_number.'</td>
                          <td>'.$users[$i]['id'].'</td>
                          <td>'.$users[$i]['first_name'].'</td>
                          <td>'.$users[$i]['last_name'].'</td>
                          <td>'.$users[$i]['phone'].'</td>
                          <td>'.$users[$i]['email'].'</td>
                          <td>'.$users[$i]['address'].'</td>
                          <td>'.$users[$i]['location'].'</td>
                          <td>';
                            if($users[$i]['last_updated_datetime'] == null){
                              echo 'Not yet modified';
                            }else{
                              echo $users[$i]['last_updated_datetime'];
                            }
                            echo '
                          </td>
                          <td>'.$users[$i]['creation_date'].'</td>
                          <td><a href="'.$users_email_url.'" title="Edit meal"><i class="fa fa-edit"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="'.$delete_url.'" title="Delete user" style="color:red;"><i class="fa fa-trash"></i></a></td>
                        </tr>
                      ';
                      $i++;
                      $serial_number++;
                    }
                  }
                ?>
              </tbody>
              <tfoot>
                <tr>
                  <th>S/N</th>
                  <th>User ID</th>
                  <th>First Name</th>
                  <th>Last Name</th>
                  <th>Phone</th>
                  <th>Email</th>
                  <th>Address</th>
                  <th>Location</th>
                  <th>Modified Date</th>
                  <th>Reg Date</th>
                  <th>Actions</th>
                </tr>
              </tfoot>
            </table>
          </div><!-- /.card-body -->
        </div><!-- /.card -->
      </div><!-- /.container-fluid -->
    </section><!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
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
