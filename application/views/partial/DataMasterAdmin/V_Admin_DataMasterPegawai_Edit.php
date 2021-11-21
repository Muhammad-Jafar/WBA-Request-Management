
    <div class="content-wrapper">
      <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title"><?=$title_page;?></h4>
              <?php if($this->session->flashdata('msg_alert')) { ?>

              <div class="alert alert-info">
                <label style="font-size: 13px;"><?=$this->session->flashdata('msg_alert');?></label>
              </div>
              <?php } ?>
              <?=form_open_multipart('data_master/edit/pegawai/' . $data_pegawai->id , array('method'=>'post'));?>
                <input type="hidden" name="id" value="<?=$data_pegawai->id;?>">

                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Nama Lengkap</label>
                      <div class="col-sm-9">
                        <input type="text" value="<?=$data_pegawai->nama;?>" name="nama" class="form-control" />
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Nomor Induk</label>
                      <div class="col-sm-9">
                        <input type="number" value="<?=$data_pegawai->nip;?>" name="nomor_induk" class="form-control" />
                      </div>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Tempat Lahir</label>
                      <div class="col-sm-9">
                        <input type="text" value="<?=$data_pegawai->tempat_lahir;?>" name="tempat_lahir" class="form-control" />
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Tanggal Lahir</label>
                      <div class="col-sm-9">
                        <input type="date" value="<?=$data_pegawai->tanggal_lahir;?>" name="tanggal_lahir" class="form-control" placeholder="dd/mm/yyyy" />
                      </div>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Alamat Rumah</label>
                      <div class="col-sm-9">
                        <textarea name="alamat" class="form-control" rows="3"/><?=$data_pegawai->alamat;?></textarea>
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
                          <option value="Laki-laki" <?=( ($data_pegawai->jenis_kelamin=='Laki-laki') ? 'selected' : '');?>>Laki-laki</option>
                          <option value="Perempuan" <?=( ($data_pegawai->jenis_kelamin=='Perempuan') ? 'selected' : '');?>>Perempuan</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Nama Jabatan</label>
                      <div class="col-sm-9">
                        <select name="id_jabatan" class="form-control">
                          <option disabled selected>-- Pilih --</option>
                          <?php
                            foreach($list_jabatan as $lj) {
                          ?>
                          <option value="<?=$lj->id_jabatan;?>" <?=( ($data_pegawai->id_jabatan==$lj->id_jabatan) ? 'selected' : '');?>><?=$lj->nama_jabatan;?></option>
                          <?php
                            }
                          ?>
                        </select>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Email Anda</label>
                      <div class="col-sm-9">
                        <input type="email" value="<?=$data_pegawai->email;?>" name="email" class="form-control" />
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">No. Handphone</label>
                      <div class="col-sm-9">
                        <input type="number" value="<?=$data_pegawai->no_handphone;?>" name="no_handphone" class="form-control" />
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
                          <option value="<?=$lb->id_bidang;?>" <?=( ($data_pegawai->id_bidang==$lb->id_bidang) ? 'selected' : '');?>><?=$lb->nama_bidang;?></option>
                          <?php
                            }
                          ?>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Tanggal Registrasi</label>
                      <div class="col-sm-9">
                        <input type="date" value="<?=$data_pegawai->tanggal_regis;?>" name="tanggal_regis" class="form-control" placeholder="dd/mm/yyyy" />
                      </div>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Username</label>
                      <div class="col-sm-9">
                        <input type="text" value="<?=$data_pegawai->id_user;?>" name="id_user" class="form-control" />
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Password</label>
                      <div class="col-sm-9">
                        <input type="password" placeholder="********" name="password" class="form-control" />
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group row">
                      <button type="submit" class="btn btn-success mr-2">Submit</button>
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