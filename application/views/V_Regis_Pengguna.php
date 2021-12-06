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
                <h4 class="d-flex justify-content-center font-weight-bold">Layanan PSDM</h4>
                <h5 class="d-flex justify-content-center">Registrasi Pengguna</h5>
                <h7 class="d-flex justify-content-center mt-4 mb-4">Siapakah anda :</h7>
                  <div class="btn-group d-flex justify-content-center" role="group">
                    <button class="btn btn-youtube mr-2 ml-2 font-weight-semibold" style="width: 150px; height: 40px;" type="button" onclick="javascript:top.location.href='<?=base_url("regis_pengguna/regismhs"); ?>';">Mahasiswa</button>
                    <button class="btn btn-youtube mr-2 ml-2 font-weight-semibold" style="width: 150px; height: 40px;" type="button" onclick="javascript:top.location.href='<?=base_url("regis_pengguna/regisdosen"); ?>';">Dosen</button>
                    <button class="btn btn-youtube mr-2 ml-2 font-weight-semibold" style="width: 150px; height: 40px;" type="button" onclick="javascript:top.location.href='<?=base_url("regis_pengguna/regisstaff"); ?>';">Staff</button>
                  </div>
                  <div class="btn btn-social-outline-reddit d-flex justify-content-center mt-4" type="button" onclick="javascript:top.location.href='<?=base_url("auth/login"); ?>';">Kembali ke login</div>
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