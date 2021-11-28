
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
              <div class="card-header" style="background-color: white;">
                <ul class="nav nav-pills card-header-pills">
                  <li class="nav-item">
                    <a class="nav-link active bg-danger" aria-current="true" href="<?=base_url("/data_master/pegawai/mahasiswa");?>">Mahasiswa</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link " href="<?=base_url("/data_master/pegawai/dosen");?>">Dosen</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link " href="<?=base_url("/data_master/pegawai/staff");?>">Staff</a>
                  </li>
                </ul>
              </div>
                <!-- <div class=" card-tools"> -->
                  <!-- <div class="btn-group" role="radio">
                      <button type="button" onclick="javascript:top.location.href='<?=base_url("/data_master/pegawai/mahasiswa");?>';" class="btn btn-danger mr-3 ">Mahasiswa</button>
                      <button type="button" onclick="javascript:top.location.href='<?=base_url("/data_master/pegawai/dosen");?>';" class="btn btn-danger mr-3 ">Dosen</button>
                      <button type="button" onclick="javascript:top.location.href='<?=base_url("/data_master/pegawai/staff");?>';" class="btn btn-danger ">Staff</button>
                      <button type="button" onclick="javascript:top.location.href='<?=base_url("/data_master/add_new/pegawai");?>';" class="btn btn-block btn-success btn-sm"><i class="mdi mdi-plus-circle-outline"></i> Tambah baru</button> -->
                  <!-- </div> -->
                <!-- </div> -->

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