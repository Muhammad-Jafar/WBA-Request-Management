      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav nav-pills">
          
          <li class="nav-item nav-profile">
            <div class="nav-link">
              <div class="user-wrapper" style="margin-bottom: 0px;">
                <div class="profile-image">
                  <img src="<?=$user_avatar;?>" alt="profile image">
                </div>
                <div class="text-wrapper">
                  <p class="profile-name"><?=$user_name;?></p>
                  <div>
                    <small class="designation text-muted">PENGELOLA</small>
                  </div>
                </div>
              </div>
            </div>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="<?=base_url('dashboard');?>">
              <i class="menu-icon mdi mdi-television"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-dm" aria-expanded="false" aria-controls="ui-dm">
              <i class="menu-icon mdi mdi-treasure-chest"></i>
              <span class="menu-title">Manajemen Data</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-dm">
              <ul class="nav flex-column sub-menu">
                <?=generate_navlink($path_page, 'data_master/admin', 'Data Admin');?>
                <?=generate_navlink($path_page, 'data_master/jabatan', 'Data Jabatan di PSDM');?>  
                <?=generate_navlink($path_page, 'data_master/bidang', 'Data Status Civitas');?>
                <?=generate_navlink($path_page, 'data_master/pegawai', 'Data Pengguna');?>
                <?=generate_navlink($path_page, 'data_master/nama_izin', 'Data Kebutuhan');?>
                <?=generate_navlink($path_page, 'data_master/keluhan', 'Data Keluhan');?>
              </ul>
            </div>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="<?=base_url('data_izin');?>">
              <i class="menu-icon mdi mdi-treasure-chest"></i>
              <span class="menu-title">Permintaan Kebutuhan</span>
            </a>
          </li>
          
          <!-- <li class="nav-item">
            <a class="nav-link" href="<?=base_url('konfirmasi_izin');?>">
              <i class="menu-icon mdi mdi-checkbox-multiple-marked-outline"></i>
              <span class="menu-title">Konfirmasi Kebutuhan</span>
            </a>
          </li> -->
          
          <li class="nav-item">
            <a class="nav-link" href="<?=base_url('data_keluhan');?>">
              <i class="menu-icon mdi mdi-treasure-chest"></i>
              <span class="menu-title">Permintaan Keluhan</span>
            </a>
          </li>

          <!-- <li class="nav-item">
            <a class="nav-link" href="<?=base_url('konfirmasi_keluhan');?>">
              <i class="menu-icon mdi mdi-checkbox-multiple-marked-outline"></i>
              <span class="menu-title">Konfirmasi Keluhan</span>
            </a>
          </li> -->
          
        </ul>
      </nav>
<div class="main-panel">