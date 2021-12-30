
<div class="content-wrapper">
  <div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
      <div class="card card-rounded">
        <div class="card-body grid-margin">

          <h4 class="card-title"><?=$title_page;?></h4>
            <?php if($this->session->flashdata('msg_alert')) : ?>
              <div class="alert alert-info">
                <label style="font-size: 13px;"><?=$this->session->flashdata('msg_alert');?></label>
              </div>
            <?php endif; ?>

              <?=form_open('pengguna/edit_kebutuhan/' .  $data_kebutuhan->id_dkebutuhan, array('method'=>'post'));?>
							<input type="hidden" name="id_dkebutuhan" class="form-control" value="<?=$data_kebutuhan->id_dkebutuhan;?>">

                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Jenis Kebutuhan</label>
                      <div class="col-sm-9">
                        <select name="id_kebutuhan" class="form-control">
                          <option disabled selected>-- Pilih Jenis Kebutuhan --</option>
                          <?php foreach($get_kebutuhan as $bid) : ?>
                              <option value="<?=$bid->id_kebutuhan;?>" > <?=$bid->type;?> </option>
                              <!-- <option value="<?=$bid->id_kebutuhan;?>" <?=( ($bid->id_kebutuhan == $data_kebutuhan->id_kebutuhan) ? 'selected' : '');?> > <?=$data_kebutuhan->type;?> </option> -->
                            <?php endforeach; ?>
                        </select>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Jenis Permintaan</label>
                      <div class="col-sm-9">
                        <select name="id_nkebutuhan" class="form-control">
                          <option disabled selected>-- Pilih Jenis Permintaan --</option>
                          <?php foreach($get_nkebutuhan as $bid) : ?>
                              <option value="<?=$bid->id_nkebutuhan;?>" > <?=$bid->nama_kebutuhan;?> </option>
                              <!-- <option value="<?=$bid->id_nkebutuhan;?>" <?=( ($bid->id_nkebutuhan == $data_kebutuhan->id_nkebutuhan) ? 'selected' : '');?> > <?=$data_kebutuhan->nama_kebutuhan;?> </option> -->
                              <?php endforeach; ?>
                        </select>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Tanggal Mulai</label>
                      <div class="col-sm-9">
                        <input type="date" name="tgl_mulai" class="form-control" value="<?=$data_kebutuhan->tgl_mulai;?>" />
                      </div>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Tanggal Akhir</label>
                      <div class="col-sm-9">
                        <input type="date" name="tgl_akhir" class="form-control"  value="<?=$data_kebutuhan->tgl_akhir;?>" />
                      </div>
                    </div>
                  </div>
                </div>
                <!-- <input type="hidden" name="status" class="form-control" value="waiting"> -->
                <div class="row">
                  <div class="col-lg-6">
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