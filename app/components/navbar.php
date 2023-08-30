 <!-- Navbar -->
  <nav class="main-header navbar navbar-expand-lg bg-light navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-align-left"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <div class="" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-lg-0">
        <li class="nav-item dropdown">
          <a class="nav-link" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
             <?php echo $_SESSION['username'];?>&nbsp<i class="fas fa-caret-down"></i>
          </a>
          <ul class="dropdown-menu dropdown-menu-end position-absolute" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" id="nav-log-out" href="../logout.php"><i class="fas fa-sign-out-alt"></i> keluar</a></li>
          </ul>
        </li>
      </ul>
    </div>
    </ul>
  </nav>
  <!-- /.navbar -->