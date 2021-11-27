
    <div class="content-wrapper">
      <div class="row">
        
        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
          <div class="card card-statistics card-rounded">
            <div class="card-body">
              <div class="clearfix">
                <div class="float-left">
                  <i class="mdi mdi-account-star text-danger icon-lg"></i>
                </div>
                <div class="float-right">
                  <h4 class="font-weight-medium mb-2 text-right">Admin</h4>
                  <div class="fluid-container text-right">
                    <h7 class="text-right mb-4"><?=$total_admin;?> Orang</h7>
                  </div>
                </div>
              </div>
              <p class="text-muted mt-3 mb-0">
                <i class="mdi mdi-account-star mr-1" aria-hidden="true"></i> Jumlah pengelola
              </p>
            </div>
          </div>
        </div>

        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
          <div class="card card-statistics card-rounded">
            <div class="card-body">
              <div class="clearfix">
                <div class="float-left">
                  <i class="mdi mdi-checkbox-multiple-marked-outline text-success icon-lg"></i>
                </div>
                <div class="float-right">
                  <h4 class="font-weight-medium mb-2 text-right">Konfirmasi Kebutuhan</h4>
                  <div class="fluid-container text-right">
                    <h7 class="text-right mb-4"><?=$total_kebutuhanterkonfirmasi;?> Permintaan telah disetujui</h7>
                  </div>
                </div>
              </div>
              <p class="text-muted mt-3 mb-0">
                <i class="mdi mdi-checkbox-multiple-marked-outline mr-1" aria-hidden="true"></i> Tersisa <?=$sisa_kebutuhanterkonfirmasi;?> permintaan
              </p>
            </div>
          </div>
        </div>

        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
          <div class="card card-statistics card-rounded">
            <div class="card-body">
              <div class="clearfix">
                <div class="float-left">
                  <i class="mdi mdi-checkbox-multiple-marked-outline text-success icon-lg"></i>
                </div>
                <div class="float-right">
                  <h4 class="font-weight-medium mb-2 text-right">Konfirmasi Keluhan</h4>
                  <div class="fluid-container text-right">
                    <h7 class=" text-right mb-0"><?=$total_keluhanterkonfirmasi;?> keluhan telah diperhatikan</h7>
                  </div>
                </div>
              </div>
              <p class="text-muted mt-3 mb-0">
                <i class="mdi mdi-checkbox-multiple-marked-outline mr-1" aria-hidden="true"></i> Tersisa <?=$sisa_keluhanterkonfirmasi?> keluhan
              </p>
            </div>
          </div>
        </div>

        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
          <div class="card card-statistics card-rounded">
            <div class="card-body">
              <div class="clearfix">
                <div class="float-left">
                  <i class="mdi mdi-account-location text-info icon-lg"></i>
                </div>
                <div class="float-right">
                  <h4 class="font-weight-medium mb-2 text-right">Pengguna</h4>
                  <div class="fluid-container text-right">
                    <h7 class="text-right mb-0"><?=$total_pegawai;?> Orang</h7>
                  </div>
                </div>
              </div>
              <p class="text-muted mt-3 mb-0">
                <i class="mdi mdi-account-location mr-1" aria-hidden="true"></i> Jumlah pegawai
              </p>
            </div>
          </div>
        </div>
            
    </div>
  </div>