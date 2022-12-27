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

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // import API
    include "./api/postServices.php";
    // check if file exists
    if($_FILES["image"]["error"] == 4){
        echo "
            <script> alert('Image Does Not Exist'); </script>
        ";
    }
    // continue if file exists
    else{
        $fileName = $_FILES["image"]["name"];
        $fileSize = $_FILES["image"]["size"];
        $tmpName = $_FILES["image"]["tmp_name"];
        $validImageExtension = ['jpg', 'jpeg', 'png'];
        $imageExtension = explode('.', $fileName);
        $imageExtension = strtolower(end($imageExtension));
        // check if file extension is supported
        if (!in_array($imageExtension, $validImageExtension)){
            echo "
                <script>
                    alert('Invalid Image Extension');
                </script>
            ";
        }
        // check if file size is more than 2MB
        else if($fileSize > 2000000){
            echo "
                <script>
                    alert('Image size should not be more than 2MB');
                </script>
            ";
        }
        // if all conditoins are met then post into databse
        else{
            date_default_timezone_set('Europe/London'); // Get the current datetime for London
            $date = date('Y-m-d H:i:s'); // Get the current date
            $var1 = $_POST["service_name"];
            $var2 = $_POST["service_cost"];
            // thie function "uniqid()" generates custom ID from the dateTimeSeconds
            $var3 = uniqid();
            $var3 .= '.' . $imageExtension;
            $var4 = $_POST["service_availability_status"];
            $var5 = $date;
            move_uploaded_file($tmpName, '../images/' . $var3);
            // if all check are without errors then insert data into database
            $_SESSION["post_response"] = $post_response = post_services($var1, $var2, $var3, $var4, $var5);
        }
    }


}

if(!empty($_SESSION["manage_services_add_success_messge"])){
    $post_success_message = $_SESSION["manage_services_add_success_messge"];
    $_SESSION["manage_services_add_success_messge"] = "";
}
if(!empty($_SESSION["post_error"])){
    $post_error = $_SESSION["post_error"];
    $_SESSION["post_error"] = "";
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
                <h1 class="m-0">Manage Meals</h1>
            </div><!-- /.col -->
            <div class="col-sm-2">
                <a href="#" class="btn btn-block bg-gradient-primary"><i class="fa fa-plus"></i> Add New</a>
            </div><!-- /.col -->
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
                        <h3 class="card-title">Add New Vegan Meal</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" autocomplete="off" enctype="multipart/form-data">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="service_name">Name</label>
                                <input type="text" class="form-control" name="service_name" id="service_name" placeholder="Enter vegan meal name" autofocus required>
                            </div>
                            <div class="form-group">
                                <label for="service_cost">Cost</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                        <i class="fas fa-pound-sign"></i>
                                        </span>
                                    </div>
                                <input type="number" name="service_cost" id="service_cost" class="form-control" required step=".01">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="image" class="form-label">Image upload supported file types: .jpg .jpeg .png (Recommended image size: 631 x 530)</label>
                                <input class="form-control" type="file" id="image" name="image" accept=".jpg, .jpeg, .png" required>
                            </div>
                            <!-- select -->
                            <div class="form-group">
                                <label>Availability status</label>
                                <select class="custom-select" name="service_availability_status" required>
                                    <option>Available</option>
                                    <option>Not available</option>
                                </select>
                            </div>
                        </div><!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Save</button>
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
