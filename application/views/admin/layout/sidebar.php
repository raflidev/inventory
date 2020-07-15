<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="<?= base_url('vendor') ?>/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
        style="opacity: .8">
      <span class="brand-text font-weight-light">INDANG</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?= base_url('vendor') ?>/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?= strtoupper($this->session->nama_user); ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->

      <?php
      //  $menu = array(['menu' =>  'Dashboard', 'icon' => '<i class="nav-icon fas fa-tachometer-alt"></i>'],['menu' =>  'Barang', 'icon' => '<i class="nav-icon fas fa-tachometer-alt"></i>'],['menu' =>  'Barang Masuk', 'icon' => '<i class="nav-icon fas fa-tachometer-alt"></i>']);
      ?>
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
              with font-awesome or any other icon font library -->   
              
              <!-- AMBIL TABLE MENU -->                      
              <?php               
              $id_user = $this->session->id_user;
              $this->db->join('aksesmenu','aksesmenu.id_menu = menu.id_menu');
              $this->db->where('id_user', $id_user);
              $menu = $this->db->get('menu')->result_array();
              foreach ($menu as $m) :  ?>
                
                <li class="nav-header"><?= $m['nama_menu'] ?></li>

                <?php
                $menuid = $m['id_menu'];
                $this->db->where('submenu.id_menu',"$menuid");
                $submenu = $this->db->get('submenu')->result_array();
                foreach ($submenu as $sm) :  ?>
                
                <li class="nav-item has-treeview menu-open">
                  <a href="<?= base_url($sm['url']) ?>" class="nav-link <?= ($judul == $sm['nama_submenu']) ? 'active' : '' ?>">                    
                  <?= $sm['icon'] ?>
                    <p>                
                  <?= $sm['nama_submenu'] ?>
                    </p>
                  </a>                              
                </li>     
                <?php endforeach ?>
                <?php endforeach ?>
                  <li class="nav-header"></li>
                <li class="nav-item has-treeview menu-open">
                  <a href="<?= base_url('admin/logout') ?>" class="nav-link">                    
                  <i class="nav-icon fas fa-sign-out-alt"></i>
                    <p>                
                    Logout
                    </p>
                  </a>                              
                </li>    
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
