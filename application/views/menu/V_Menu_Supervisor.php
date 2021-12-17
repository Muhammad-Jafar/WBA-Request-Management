      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item nav-profile">
            <div class="nav-link">
              <div class="user-wrapper" style="margin-bottom: 0px;">
                <div class="profile-image">
                  <img class="img-xs rounded-circle" src="<?=$user_avatar;?>" alt="profile image">
                </div>
                <div class="text-wrapper">
                  <p class="profile-name"><?=$user_name;?></p>
                  <div>
                    <small class="designation text-muted">SUPERVISOR</small>
                  </div>
                </div>
              </div>
            </div>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="<?=base_url('dashboard');?>">
              <i class="menu-icon mdi mdi-home"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?=base_url('konfirmasi_izin');?>">
              <i class="menu-icon mdi mdi-file-document"></i>
              <span class="menu-title">Konfirmasi Kebutuhan</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?=base_url('konfirmasi_keluhan');?>">
              <i class="menu-icon mdi mdi-file-check"></i>
              <span class="menu-title">Konfirmasi Keluhan</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-dm" aria-expanded="false" aria-controls="ui-dm">
              <i class="menu-icon mdi mdi-database"></i>
              <span class="menu-title">Koleksi Data</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-dm">
              <ul class="nav flex-column sub-menu">
                <?=generate_navlink($path_page, 'laporan/kebutuhan', 'Laporan Kebutuhan');?>
                <?=generate_navlink($path_page, 'laporan/keluhan', 'Laporan Keluhan');?>  
              </ul>
            </div>
          </li>
      </ul>
    </nav>
<div class="main-panel">