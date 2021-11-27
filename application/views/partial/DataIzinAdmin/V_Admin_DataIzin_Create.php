
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

              <?=form_open('data_izin/add_new/', array('method'=>'post'));?>
              
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Jenis Kebutuhan</label>
                      <div class="col-sm-9">
                        <select name="id_kebutuhan" class="form-control">
                          <option disabled selected>-- Pilih Jenis Kebutuhan --</option>
                          <?php foreach($kebutuhan as $bid) : ?>
                              <option value="<?=$bid->id_kebutuhan;?>"><?=$bid->type;?></option>
                            <?php endforeach; ?>
                        </select>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Jenis Permintaan</label>
                      <div class="col-sm-9">
                        <select name="id_butuhan" class="form-control">
                          <option disabled selected>-- Pilih Jenis Permintaan --</option>
                          <?php foreach($kebutuhan as $bid) : ?>
                              <option value="<?=$bid->id_kebutuhan;?>"> <?=$bid->nama_kebutuhan;?> </option>
                            <?php endforeach; ?>
                        </select>
                      </div>
                    </div>
                  </div>
                </div>
                
                <div class="row">
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
                </div>

                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">NIM / NIP</label>
                      <div class="col-sm-9">
                        <input type="text" name="nim_nip" class="form-control"/>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">WhatsApp</label>
                      <div class="col-sm-9">
                        <input type="text" name="nowa" class="form-control"/>
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
                      <label class="col-sm-3 col-form-label">Fakultas / Program Studi</label>
                      <div class="col-sm-9">
                        <select name="fak_prodi" class="form-control">
                          <option disabled selected>-- Pilih Fakultas /Prodi --</option>
                          <?php $fak = array( array( 'id'=>'Bioteknologi / Bioteknologi','nama'=>'Bioteknologi / Bioteknologi'),
                                              array( 'id'=>'Psikologi / Psikologi','nama'=>'Psikologi / Psikologi'),
                                              array( 'id'=>'Ilmu Komunikasi / Ilmu Komunikasi','nama'=>'Ilmu Komunikasi / Ilmu Komunikasi'),
                                              array( 'id'=>'Teknik Lingkungan dan Mineral / Metalurgi', 'nama'=>'Teknik Lingkungan dan Mineral / Metalurgi'),
                                              array( 'id'=>'Teknik Lingkungan dan Mineral / Teknik Sipil', 'nama'=>'Teknik Lingkungan dan Mineral / Teknik Sipil'),
                                              array( 'id'=>'Teknik Lingkungan dan Mineral / Teknik Lingkungan', 'nama'=>'Teknik Lingkungan dan Mineral / Teknik Lingkungan'),
                                              array( 'id'=>'Teknik Lingkungan dan Mineral / Teknologi Industri Pertanian', 'nama'=>'Teknik Lingkungan dan Mineral / Teknologi Industri Pertanian'),
                                              array( 'id'=>'Teknik Lingkungan dan Mineral / Teknologi Hasil Pertanian', 'nama'=>'Teknik Lingkungan dan Mineral / Teknologi Hasil Pertanian'),
                                              array( 'id'=>'Rekayasa Sistem / Teknik Informatika', 'nama'=>'Rekayasa Sistem / Teknik Informatika'),
                                              array( 'id'=>'Rekayasa Sistem / Teknik Elektro', 'nama'=>'Rekayasa Sistem / Teknik Elektro'),
                                              array( 'id'=>'Rekayasa Sistem / Teknik Mesin', 'nama'=>'Rekayasa Sistem / Teknik Mesin')
                                             );
                            foreach($fak as $fak) : ?>
                            <option value="<?=$fak['id'];?>"> <?=$fak['nama'];?></option>
                          <?php endforeach; ?>
                        </select>
                      </div>
                    </div>
                  </div>
                </div>
            
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Waktu Pengajuan</label>
                      <div class="col-sm-9">
                        <input type="date" name="tgl_pengajuan" class="form-control" />
                      </div>
                    </div>
                  </div>
                </div>
                
                <div class="row">
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
                </div>
                
                <div class="row">
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
                  </div>
                </div>

                <!-- <div class="row"> -->
                  <div class="col-md-6">
                    <div class="form-group row">
                      <button type="submit" class="btn btn-success mr-2">Submit</button>
                      <button class="btn btn-light" type="reset">Reset</button>
                    </div>
                  </div>
                <!-- </div> -->
              <?=form_close();?>
            </div>
          </div>
         </div>
        </div>