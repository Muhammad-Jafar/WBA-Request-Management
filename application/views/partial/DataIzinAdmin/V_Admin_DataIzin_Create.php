
<div class="content-wrapper">
  <div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body grid-margin">

          <h4 class="card-title"><?=$title_page;?></h4>
            <?php if($this->session->flashdata('msg_alert')) : ?>
              <div class="alert alert-info">
                <label style="font-size: 13px;"><?=$this->session->flashdata('msg_alert');?></label>
              </div>
            <?php endif; ?>

              <?=form_open('data_izin/add_new/', array('method'=>'post'));?>
                <class="row">
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Jenis Kebutuhan</label>
                      <div class="col-sm-9">
                        <select name="id_kebutuhan" class="form-control">
                          <option disabled selected>-- Pilih Jenis Kebutuhan --</option>
                            <?php foreach($get_kebutuhan as $ty) : ?>
                              <option value="<?=$ty->id_kebutuhan;?>"> <?=$ty->type;?> </option>
                            <?php endforeach; ?>
                        </select>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Permintaan</label>
                      <div class="col-sm-9">
                        <select name="id_kebutuhan" class="form-control">
                          <option disabled selected>-- Pilih Permintaan --</option>
                          <?php foreach ($get_kebutuhan as $ty) : ?>
                            <option value="<?=$ty->id_kebutuhan;?>"> <?=$ty->nama_kebutuhan;?> </option>
                          <?php endforeach; ?>
                        </select>
                      </div>
                    </div>
                  </div> -->
                <!-- </div>
                
                <!-- <div class="row"> -->
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Nama Lengkap</label>
                      <div class="col-sm-9">
                        <input type="text" name="nama_lengkap" class="form-control" />
                      </div>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Alamat</label>
                      <div class="col-sm-9">
                        <input type="text" name="alamat" class="form-control"/>
                      </div>
                    </div>
                  </div>
                <!-- </div> -->

                <!-- <div class="row"> -->
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">WhatsApp</label>
                      <div class="col-sm-9">
                        <input type="text" name="nowa" class="form-control"/>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">NIM / NIP</label>
                      <div class="col-sm-9">
                        <input type="text" name="nim_nip" class="form-control"/>
                      </div>
                    </div>
                  </div>
                <!-- </div> -->
                  
                <!-- <div class="row"> -->
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Status</label>
                      <div class="col-sm-9">
                        <select name="id_bidang" class="form-control">
                          <option disabled selected>-- Pilih Status Anda --</option>
                            <?php foreach($bidang_list_all as $bid) : ?>
                              <option value="<?=$bid->id_bidang;?>"><?=$bid->nama_bidang;?></option>
                            <?php endforeach; ?>
                        </select>
                      </div>
                    </div>
                  </div>
                  
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Fakultas / Prodi</label>
                      <div class="col-sm-9">
                        <!-- <input type="text" name="fakultas" class="form-control" /> -->
                        <select name="fakultas" class="form-control">
                          <option disabled selected>-- Pilih Fakultas --</option>
                          <?php $fak = array( array( 'id'=>'Bioteknologi','nama'=>'Bioteknologi'),
                                                array( 'id'=>'Psikologi','nama'=>'Psikologi'),
                                                array( 'id'=>'Ilmu Komunikasi','nama'=>'Ilmu Komunikasi'),
                                                array( 'id'=>'Teknik Metalurgi', 'nama'=>'Teknik Metalurgi'),
                                                array( 'id'=>'Teknologi Ilmu Pertanian', 'nama'=>'Teknologi Ilmu Pertanian'),
                                                array( 'id'=>'Teknologi Hasil Pertanian', 'nama'=>'Teknologi Hasil Pertanian'),
                                                array( 'id'=>'Teknik Mesin', 'nama'=>'Teknik Mesin'),
                                                array( 'id'=>'Teknik Informatika', 'nama'=>'Teknik Informatika'),
                                                array( 'id'=>'Teknik Elektro', 'nama'=>'Teknik Elektro')
                                             );
                            foreach($fak as $fak) : ?>
                            <option value="<?=$fak['id'];?>"> <?=$fak['nama'];?></option>
                          <?php endforeach; ?>
                        </select>
                      </div>
                    </div>
                  </div>
                <!-- </div> -->

                <!-- <div class="row"> -->
                <!-- <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Prodi</label>
                      <div class="col-sm-9">
                        <!-- <input type="text" name="prodi" class="form-control" /> -->
                        <select name="prodi" class="form-control">
                          <option disabled selected>-- Pilih Program Studi --</option>
                          <?php $prodi = array( array( 'id'=>'FB','nama'=>'Bioteknologi'),
                                                array( 'id'=>'FPs','nama'=>'Psikologi'),
                                                array( 'id'=>'FIK','nama'=>'Ilmu Komunikasi'),
                                                array( 'id'=>'FTLM', 'nama'=>'Teknik Metalurgi'),
                                                array( 'id'=>'FTLM', 'nama'=>'Teknologi Ilmu Pertanian'),
                                                array( 'id'=>'FTLM', 'nama'=>'Teknologi Hasil Pertanian'),
                                                array( 'id'=>'FRS', 'nama'=>'Teknik Mesin'),
                                                array( 'id'=>'FRS', 'nama'=>'Teknik Informatika'),
                                                array( 'id'=>'FRS', 'nama'=>'Teknik Elektro')
                                             );
                            foreach($prodi as $prod) : ?>
                            <option value="<?=$prod['id'];?>"> <?=$prod['nama'];?></option>
                          <?php endforeach; ?>
                        </select>
                      </div>
                    </div>
                  </div> -->

                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Waktu Pengajuan</label>
                      <div class="col-sm-9">
                        <input type="date" name="tgl_pengajuan" class="form-control" />
                      </div>
                    </div>
                  </div>
                <!-- </div> -->
                
                <!-- <div class="row"> -->
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Tanggal Mulai</label>
                      <div class="col-sm-9">
                        <input type="date" name="tgl_mulai" class="form-control" />
                      </div>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Tanggal Akhir</label>
                      <div class="col-sm-9">
                        <input type="date" name="tgl_akhir" class="form-control" />
                      </div>
                    </div>
                  </div>
                <!-- </div> -->
                
                <!-- <div class="row"> -->
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Status</label>
                      <div class="col-sm-9">
                        <select name="status" class="form-control">
                          <option disabled selected>-- Pilih --</option>
                          <option value="waiting">Waiting</option>
                          <option value="approved">Approved</option>
                          <option value="rejected">Rejected</option>
                        </select>
                      </div>
                    </div>
                  <!-- </div> -->

                  <!-- <div class="col-md-6"> -->
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