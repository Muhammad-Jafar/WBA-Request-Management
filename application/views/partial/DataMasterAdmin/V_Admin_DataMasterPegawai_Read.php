
  <div class="content-wrapper">
    <div class="row">
      <div class="col-lg-12 grid-margin stretch-card">
        <div class="card card-rounded">
          <div class="card-body">
            <h4 class="card-title"><?=$title_page;?></h4>
            <?php if($this->session->flashdata('msg_alert')) { ?>

            <div class="alert alert-info">
              <label style="font-size: 13px;"><?=$this->session->flashdata('msg_alert');?></label>
            </div>
            <?php } ?>

            <div class="card-tools">
              <div class="card-header" style="width:45%; background-color:transparent;" >
                <ul class="nav">
                  <li class="nav-item">
                    <a class="nav-link" active href="<?=base_url("/data_master/pegawai/dosentetap");?>">Dosen Tetap</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="<?=base_url("/data_master/pegawai/dosensks");?>">Dosen SKS</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="<?=base_url("/data_master/pegawai/tedik");?>">Tenaga Pendidik</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="<?=base_url("/data_master/pegawai/tepen");?>">Tenaga Penunjang</a>
                  </li>
                </ul>
              </div>
                <div class="table-responsive">
                  <p>
                    <table class="data table table-striped" cellspacing="0" width="100%"></table>
                  </p>
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>