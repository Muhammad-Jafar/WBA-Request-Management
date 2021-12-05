<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="<?=$this->security->get_csrf_token_name();?>" content="<?=$this->security->get_csrf_hash();?>">
  <meta name="description" content="Sistem Informasi Kepegawaian" />
  <meta name="author" content="Inisialku#9147" />
  <title>Login - Sistem Informasi Kepegawaian</title>
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
            <div class="auto-form-wrapper" style="box-shadow: 6px solid #000;">
              <?=form_open('auth/login', array('method'=>'post'));?>
                <p class="text-center">
                  <img src="<?=assets_url('logo.png', false);?>" width="135">
                </p>
                <h4 class="d-flex justify-content-center mt-4 mb-3 font-weight-bold" style="color:#000;">LAYANAN PSDM</h4>
                <?php if($this->session->flashdata('msg_alert')) : ?>

                <div class="alert alert-info">
                  <label style="font-size: 13px;"><?=$this->session->flashdata('msg_alert');?></label>
                </div>
                <?php endif; ?>
                <div class="form-group">
                  <label class="label">Email</label>
                  <input type="text" name="email" class="form-control" placeholder="Email">
                </div>
                <div class="form-group">
                  <label class="label">Password</label>
                  <input type="password" name="password" class="form-control" placeholder="*********">
                </div>
                <div class="form-group d-flex justify-content-between">
                  <div class="form-check form-check-flat mt-0">
                    <label class="form-check-label">
                      <input type="checkbox" name="remember" class="form-check-input" checked> Tetap masuk
                    </label>
                  </div>
                  <a href="<?=base_url('auth/lost_password');?>" class="text-small forgot-password text-black">Lupa password</a>
                </div>

                <div class="form-group d-flex justify-content-around">
                  <button class="btn btn-danger" style="width: 160px; height: 40px;">Masuk</button>
                  <div>
                    <large class="designation text-muted mr-4 ml-4">--- OR ---</large>
                  </div>
                  <button class="btn btn-outline-danger" style="width: 160px; height: 40px;" type="button" onclick="javascript:top.location.href='<?=base_url("regis_pengguna"); ?>';" >Registrasi</button>
                </div>
              <?=form_close();?>
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