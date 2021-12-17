
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
                  <button type="button" onclick="javascript:top.location.href='<?=base_url("/laporan/");?>';" class="btn btn-primary btn-sm"><i class="mdi mdi-printer icon-sm"></i> Cetak Laporan</button>
                  <button type="button" onclick="javascript:top.location.href='<?=base_url("/laporan/export_kebutuhan_excel");?>';" class="btn btn-success btn-sm"><i class="mdi mdi-file-excel icon-sm"></i> Ekspor ke Excel</button>
                </div>
                <div class="card-header" style=" background-color:transparent;" >
                <ul class="nav">
                  <li class="nav-item">
                    <a class="nav-link" active href="<?=base_url("/laporan/kebutuhan/dosentetap");?>"> <b>Dosen Tetap</b></a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="<?=base_url("/laporan/kebutuhan/dosensks");?>"> <b>Dosen SKS</b></a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="<?=base_url("/laporan/kebutuhan/tedik");?>"> <b>Tenaga Pendidik</b></a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="<?=base_url("/laporan/kebutuhan/tepen");?>"> <b>Tenaga Penunjang</b></a>
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