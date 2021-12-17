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
<div class="content-wrapper">
      <div class="row d-flex justify-content-center">
          <div class="card card-rounded">
            <div class="card-body">
              <h3 class="card-title d-flex justify-content-center mb-5">Registrasi Pengguna Layanan PSDM</h3>
              <?php if($this->session->flashdata('msg_alert')) { ?>

              <div class="alert alert-info">
                <label style="font-size: 13px;" class="control-label d-flex justify-content-center"><?=$this->session->flashdata('msg_alert');?></label>
              </div>
              <?php } ?>
              <?=form_open_multipart('regis_pengguna/regisdosensks', array('method'=>'post'));?>
              <!-- <input type="hidden" name="id" class="form-control" value=""> -->

              <div class="row">
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Nama Lengkap</label>
                      <div class="col-sm-9">
                        <input type="text" name="nama" class="form-control" />
                      </div>
                    </div>
                  </div>
                  <!-- <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">NIDN / NIP</label>
                      <div class="col-sm-9">
                        <input type="number" name="nip" class="form-control" />
                      </div>
                    </div>
                  </div> -->
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Tempat Lahir</label>
                      <div class="col-sm-9">
                        <input type="text" name="tempat_lahir" class="form-control" />
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Tanggal Lahir</label>
                      <div class="col-sm-9">
                        <input type="date" name="tanggal_lahir" class="form-control" placeholder="dd/mm/yyyy" />
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Alamat</label>
                      <div class="col-sm-9">
                        <input type="text" name="alamat" class="form-control" />
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Foto Profil</label>
                      <div class="col-sm-9">
                          <input type="file" name="avatar" class="form-control" style="background-color: transparent;">
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Jenis Kelamin</label>
                      <div class="col-sm-9">
                        <select name="jenis_kelamin" class="form-control">
                          <option disabled selected>-- Pilih --</option>
                          <option value="Laki-laki">Laki-laki</option>
                          <option value="Perempuan">Perempuan</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  
                  <input type="hidden" name="id_jabatan" value="8" class="form-control">
                  <input type="hidden" name="id_bidang" value="2" class="form-control">

                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Email Anda</label>
                      <div class="col-sm-9">
                        <input type="email" name="email" class="form-control" placeholder="email" />
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">No. Handphone (WA)</label>
                      <div class="col-sm-9">
                        <input type="number" name="no_handphone" class="form-control" />
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Username</label>
                      <div class="col-sm-9">
                        <input type="text" name="id_user" class="form-control" />
                      </div>
                    </div>
                  </div>
                    <div class="col-md-6">
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Password</label>
                        <div class="col-sm-9">
                          <input type="password" name="password" class="form-control" placeholder="*******" />
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label"> Konfirmasi Password</label>
                        <div class="col-sm-9">
                          <input type="password" name="password2" class="form-control" placeholder="*******" />
                        </div>
                      </div>
                    </div>
              </div>

                  <div class="row d-flex justify-content-around">
                    <div class="col-md-6">
                      <div class="form-group row d-flex justify-content-center">
                        <button type="submit" class="btn btn-success mr-2">Registrasi</button>
                        <button class="btn btn-light" type="reset">Reset</button>
                      </div>
                    </div>
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