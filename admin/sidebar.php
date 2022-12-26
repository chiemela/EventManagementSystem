<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="index.php" class="brand-link">
    <img src="../images/logo2.png" alt="Admin Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">Admin</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
              with font-awesome or any other icon font library -->
        
        <li class="nav-header">SECURE AREA</li>
        <li class="nav-item">
          <a href="index.php" class="nav-link active">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard
            </p>
          </a>
        <li class="nav-item">
          <a href="manage_users.php" class="nav-link">
            <i class="nav-icon far fa-user"></i>
            <p>
              Manage Users
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="manage_services.php" class="nav-link">
            <i class="nav-icon fa fa-cog"></i>
            <p>
              Manage Meals
            </p>
          </a>
        </li>
        <?php
          if($_SESSION["role"] == "Owner"){
            echo '
              <li class="nav-item">
                <a href="daily_report.php" class="nav-link">
                  <i class="nav-icon fas fa-file"></i>
                  <p>
                    Daily Report
                    <!-- <span class="badge badge-info right">2</span> -->
                  </p>
                </a>
              </li>
            ';
          }
        ?>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>