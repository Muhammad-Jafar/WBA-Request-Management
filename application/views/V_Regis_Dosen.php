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
      <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
          <div class="card card-rounded">
            <div class="card-body">
              <h4 class="card-title">Registrasi Pengguna Layanan PSDM</h4>
              <?php if($this->session->flashdata('msg_alert')) { ?>

              <div class="alert alert-info">
                <label style="font-size: 13px;"><?=$this->session->flashdata('msg_alert');?></label>
              </div>
              <?php } ?>
              <?=form_open_multipart('regis_pengguna/regismhs', array('method'=>'post'));?>
              
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Nama Lengkap</label>
                      <div class="col-sm-9">
                        <input type="text" name="nama" class="form-control" />
                      </div>
                    </div>
                  </div>
                 
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">NIP / NIDN</label>
                      <div class="col-sm-9">
                        <input type="number" name="nip" class="form-control" />
                      </div>
                    </div>
                  </div>
                </div>

                <div class="row">
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
                </div>

                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Alamat</label>
                      <div class="col-sm-9">
                        <input type="text" name="alamat" class="form-control" />
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Avatar</label>
                      <div class="col-sm-9">
                          <input type="file" name="avatar">
                      </div>
                    </div>
                  </div>
                 
                </div>

                <div class="row">
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
                  <input type="hidden" name="id_jabatan" class="form-control" value="8">
                </div>

                <div class="row">
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
                </div>

                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Status Civitas</label>
                      <div class="col-sm-9">
                        <select name="id_bidang" class="form-control">
                          <option disabled selected>-- Pilih --</option>
                          <?php
                            foreach($list_bidang as $lb) {
                          ?>
                          <option value="<?=$lb->id_bidang;?>"><?=$lb->nama_bidang;?></option>
                          <?php
                            }
                          ?>
                        </select>
                      </div>
                    </div>
                  </div>
                  <input type="hidden" name="tanggal_regis" value="<?php echo date("d-m-Y"); ?>">
                  <!-- <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Tanggal Registrasi</label>
                      <div class="col-sm-9">
                        <input type="date" name="tanggal_regis" class="form-control" placeholder="dd/mm/yyyy" />
                      </div>
                    </div>
                  </div> -->
                </div>

                <div class="row">
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
                </div>

                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group row">
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