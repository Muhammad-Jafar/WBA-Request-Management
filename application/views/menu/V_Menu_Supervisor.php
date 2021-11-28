      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item nav-profile">
            <div class="nav-link">
              <div class="user-wrapper" style="margin-bottom: 0px;">
                <div class="profile-image">
                  <img src="<?=$user_avatar;?>" alt="profile image">
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
              <i class="menu-icon mdi mdi-television"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?=base_url('konfirmasi_izin');?>">
              <i class="menu-icon mdi mdi-checkbox-multiple-marked-outline"></i>
              <span class="menu-title">Konfirmasi Kebutuhan</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?=base_url('konfirmasi_keluhan');?>">
              <i class="menu-icon mdi mdi-checkbox-multiple-marked-outline"></i>
              <span class="menu-title">Konfirmasi Keluhan</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?=base_url('laporan');?>">
              <i class="menu-icon mdi mdi-checkbox-multiple-marked-outline"></i>
              <span class="menu-title">Koleksi Data</span>
            </a>
        </li>
      </ul>
    </nav>
<div class="main-panel">