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
                    <!-- <small class="designation text-muted"><?=$jabatan;?></small><br> -->
                    <small class="designation text-muted"><?=$bidang;?></small>
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
            <a class="nav-link" href="<?=base_url('pengguna/profil');?>">
              <i class="menu-icon mdi mdi-account"></i>
              <span class="menu-title">Profil</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?=base_url('pengguna/kebutuhan');?>">
              <i class="menu-icon mdi mdi-file-document"></i>
              <span class="menu-title">Permintaan Kebutuhan</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?=base_url('pengguna/keluhan');?>">
              <i class="menu-icon mdi mdi-file-check"></i>
              <span class="menu-title">Permintaan Keluhan</span>
            </a>
          </li>
        </ul>
      </nav>
<div class="main-panel">