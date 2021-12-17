<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- <meta name="<?=$this->security->get_csrf_token_name();?>" content="<?=$this->security->get_csrf_hash();?>"> -->
  <meta name="description" content="Sistem Informasi Kepegawaian" />
  <meta name="author" content="Inisialku#9147" />
  <title>Registrasi - Sistem Informasi Kepegawaian</title>
  <link rel="stylesheet" href="<?=assets_url('vendors/iconfonts/mdi/css/materialdesignicons.min.css');?>">
  <link rel="stylesheet" href="<?=assets_url('vendors/iconfonts/puse-icons-feather/feather.css');?>">
  <link rel="stylesheet" href="<?=assets_url('vendors/css/vendor.bundle.base.css');?>">
  <link rel="stylesheet" href="<?=assets_url('vendors/css/vendor.bundle.addons.css');?>">
  <link rel="stylesheet" href="<?=assets_url('css/style.css', false);?>">
  <link rel="shortcut icon" href="<?=assets_url('images/favicon.png');?>" />
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper auth-page">
      <div class="content-wrapper d-flex align-items-center auth register-bg-1 theme-one">
        <div class="row w-100">
          <div class="col-lg-4 mx-auto">
            <div class="card card-rounded">
              <div class="card-body">
                <?php if($this->session->flashdata('msg_alert')) { ?>
                  <div class="alert alert-info">
                    <label style="font-size: 13px;"><?=$this->session->flashdata('msg_alert');?></label>
                  </div>
                <?php } ?>
                <h4 class="d-flex justify-content-center font-weight-semibold text-dark">Layanan PSDM</h4>
                <h5 class="d-flex justify-content-center text-dark">Registrasi Pengguna</h5>
                <h7 class="d-flex justify-content-center mt-4 mb-4 text-dark">Siapakah anda :</h7>
                  <div class="align-center">
                    <div class="btn-group d-flex justify-content-center m-2">
                      <button class="btn btn-youtube mr-2 ml-2 font-weight-semibold" style="width: 170px; height: 40px; border-radius:7px;" type="button" onclick="javascript:top.location.href='<?=base_url("regis_pengguna/regisdosentetap"); ?>';">Dosen Tetap</button>
                      <button class="btn btn-youtube mr-2 ml-2 font-weight-semibold" style="width: 170px; height: 40px; border-radius:7px;" type="button" onclick="javascript:top.location.href='<?=base_url("regis_pengguna/regisdosensks"); ?>';">Dosen SKS</button>
                    </div>
                    <div class="btn-group d-flex justify-content-center m-2">
                      <button class="btn btn-youtube mr-2 ml-2 font-weight-semibold" style="width: 170px; height: 40px; border-radius:7px;" type="button" onclick="javascript:top.location.href='<?=base_url("regis_pengguna/registedik"); ?>';">Tenaga Pendidik</button>
                      <button class="btn btn-youtube mr-2 ml-2 font-weight-semibold" style="width: 170px; height: 40px; border-radius:7px;" type="button" onclick="javascript:top.location.href='<?=base_url("regis_pengguna/registepen"); ?>';">Tenaga Penunjang</button>
                    </div>
                  </div>
                  <div class=" mr-auto ml-auto mt-4 d-flex justify-content-center align-center btn btn-social-outline-reddit col-md-9" type="button" onclick="javascript:top.location.href='<?=base_url("auth/login"); ?>';">Kembali ke login</div>
              </div>

              
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
    <script type="text/javascript" src="<?=assets_url('vendors/js/vendor.bundle.base.js');?>"></script>
    <script type="text/javascript" src="<?=assets_url('vendors/js/vendor.bundle.addons.js');?>"></script>
    <script type="text/javascript" src="<?=assets_url('js/off-canvas.js');?>"></script>
    <script type="text/javascript" src="<?=assets_url('js/misc.js');?>"></script>
    <script type="text/javascript">
      $.ajaxSetup({
        headers: { 'X-CSRF-TOKEN': $('meta[name="<?=$this->security->get_csrf_token_name();?>"]').attr('content') },
        xhrFields: {
          withCredentials: true
        },
        dataType: 'json',
        cache: false
      });
    </script>
</body>

</html>