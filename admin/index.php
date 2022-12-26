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

include "./api/getUsers.php";
$users = get_users();

include "./api/getServices.php";
$services = get_services();

include "./api/getReport.php";
$report = get_report();

// check if the value returned is boolean and eqauls "true"
if(is_bool($services) === true){
  $services_check = null;
}else{
  $services_check = $services[0]['service_id'];
}
// check if the value returned is boolean and eqauls "true"
if(is_bool($report) === true){
  $report_check = null;
}else{
  $report_check = $report[0]['booking_id'];
}


// check if services is empty else make it display 0
if(!empty($services_check)){
  $count_services = count($services);
}else{
  $count_services = 0;
}
// check if report is empty else make it display 0
if(!empty($report_check)){
  $count_report = count($report);
}else{
  $count_report = 0;
}

$count_users = count($users);
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
        <div class="row mb-2" >
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
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
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-4">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?php echo $count_services;?></h3>

                <p>Vegan Meals</p>
              </div>
              <div class="icon">
              <i class="fas fa-pepper-hot"></i>
              </div>
              <a href="./manage_services.php" class="small-box-footer">Manage <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <?php
            if($_SESSION["role"] == "Owner"){
              echo '
                <div class="col-4">
                  <!-- small box -->
                  <div class="small-box bg-success">
                    <div class="inner">
                      <h3><?php echo $count_report;?></h3>
      
                      <p>Report</p>
                    </div>
                    <div class="icon">
                      <i class="ion ion-stats-bars"></i>
                    </div>
                    <a href="./daily_report.php" class="small-box-footer">View Report <i class="fas fa-arrow-circle-right"></i></a>
                  </div>
                </div>
              ';
            }
          ?>
          <!-- ./col -->
          <div class="col-4">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?php echo $count_users;?></h3>

                <p>Registered Users</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="./manage_users.php" class="small-box-footer">Manage <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
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
</body>
</html>
