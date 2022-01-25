
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
              <?=form_open('data_master/edit/nama_izin/' . $data_namaizin->id_nkebutuhan, array('method'=>'post'));?>
                <input type="hidden" name="id_nkebutuhan" value="<?=$data_namaizin->id_nkebutuhan;?>">

                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Jenis Surat</label>
                      <div class="col-sm-9">
                        <select name="id_kebutuhan" class="form-control">
                          <option disabled selected>-- Pilih Jenis Surat --</option>
                          <?php foreach($get_kebutuhan as $ke) : ?>
                            <option value="<?=$ke->id_kebutuhan;?>"> <?=$ke->type;?></option>
                          <?php endforeach; ?>
                        </select>
                      </div>
                    </div>
                  </div>
                </div> 
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Nama Surat</label>
                      <div class="col-sm-9">
                        <input type="text" value="<?=$data_namaizin->nama_kebutuhan;?>" name="nama_kebutuhan" class="form-control" />
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