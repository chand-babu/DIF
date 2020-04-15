<?php
    $filename = explode("/",$_SERVER['REQUEST_URI']);
    $matchMenu = $filename[count($filename) - 1];
    function active($tagname) {
        global $matchMenu;
        echo $tagname == $matchMenu ? 'active':'';
    }
?>
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="dashboard.php" class="brand-link">
      <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">DIF</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">DIF Administrator</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="dashboard.php" class="nav-link <?php active('dashboard.php'); ?>">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="banner.php" class="nav-link <?php active('banner.php'); ?>">
              <i class="nav-icon fas fa-image"></i>
              <p>Banner</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="category.php" class="nav-link <?php active('category.php'); ?>">
              <i class="nav-icon fas fa-list-alt"></i>
              <p>Category</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="gallery.php" class="nav-link <?php active('gallery.php'); ?>">
              <i class="nav-icon fas fa-images"></i>
              <p>Gallery</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="blog.php" class="nav-link <?php active('blog.php'); ?>">
              <i class="nav-icon fas fa-blog"></i>
              <p>Blog</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="subscribe.php" class="nav-link <?php active('subscribe.php'); ?>">
              <i class="nav-icon fas fa-play-circle"></i>
              <p>Subscribe</p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>