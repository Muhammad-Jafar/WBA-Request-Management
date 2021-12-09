
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

              <?=form_open('pengguna/add_keluhan', array('method'=>'post'));?>
              <input type="hidden" name="id" class="form-control" value="<?=$user_id;?>">
            
                <!-- <div class="row"> -->
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Jenis Keluhan</label>
                      <div class="col-sm-9">
                        <select name="id_keluhan" class="form-control">
                          <option disabled selected>-- Pilih Jenis Kebutuhan --</option>
                          <?php foreach($get_keluhan as $bid) : ?>
                              <option value="<?=$bid->id_keluhan;?>"><?=$bid->type;?></option>
                            <?php endforeach; ?>
                        </select>
                      </div>
                    </div>
                  </div>
				  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Keluhan</label>
                      <div class="col-sm-9">
                        <input type="text" name="keluhan" class="form-control" />
                      </div>
                    </div>
                  </div>
                <!-- </div> -->
                <input type="hidden" name="status" class="form-control" value="waiting">

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