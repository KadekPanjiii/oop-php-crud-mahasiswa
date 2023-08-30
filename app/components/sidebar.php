<?php
    $url = $_SERVER['REQUEST_URI'];

?>

<!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4" id="sidebar">
      <!-- Brand Logo -->
    <div class="sidebar-header">
        <h3><span class='text-white fw-bold'>Vo</span> LTE</h3>
        <strong><span class='text-white'>S</span>N</strong>
    </div>

      <!-- Sidebar -->
      <div class="sidebar">


          <!-- Sidebar Menu -->
          <nav class="mt-2">
              <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                  data-accordion="false">
                  <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
                  <li class="nav-item">
                      <a href="index.php" class="nav-link <?= strpos($url, 'index.php') ? 'active' : '' ?>">
                          <i class="nav-icon fas fa-home"></i>
                          <p>
                              Dashboard
                          </p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="mahasiswa.php" class="nav-link <?= strpos($url, 'mahasiswa.php') ? 'active' : '' ?>">
                          <i class="nav-icon fas fa-users"></i>
                          <p>
                              Mahasiswa
                          </p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="jurmtk.php" class="nav-link <?= strpos($url, 'jurmtk.php') ? 'active' : '' ?>">
                          <i class="nav-icon fas fa-book"></i>
                          <p>
                              Jurusan & Matkul
                          </p>
                      </a>
                  </li>
                <li class="nav-item">
                      <a href="pengumuman.php" class="nav-link <?= strpos($url, 'pengumuman.php') ? 'active' : '' ?>">
                          <i class="nav-icon fas fa-bullhorn"></i>
                          <p>
                              Pengumuman
                          </p>
                      </a>
                  </li>

          </nav>
          <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
  </aside>