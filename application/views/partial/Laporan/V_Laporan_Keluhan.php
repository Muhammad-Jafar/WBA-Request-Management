
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
                <div class="d-flex justify-content-around grid-column " style="width: 320px; margin-left: auto;">
                  <button type="button" onclick="javascript:top.location.href='<?=base_url("/laporan/cetak_kebutuhan");?>';" class="btn btn-primary btn-sm"><i class="mdi mdi-plus-circle-outline"></i> Cetak Laporan</button>
                  <button type="button" onclick="javascript:top.location.href='<?=base_url("/laporan/cetak_kebutuhan");?>';" class="btn btn-success btn-sm"><i class="mdi mdi-plus-circle-outline"></i> Ekspor ke Excel</button>
                </div>
              <div class="card-header" style="width:25%; background-color:transparent;">
                <ul class="nav">
                  <li class="nav-item">
                    <a class="nav-link" active href="<?=base_url("/laporan/keluhan/mahasiswa");?>"> <b>Mahasiswa</b> </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="<?=base_url("/laporan/keluhan/dosen");?>"> <b>Dosen</b> </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="<?=base_url("/laporan/keluhan/staff");?>"> <b>Staff</b> </a>
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