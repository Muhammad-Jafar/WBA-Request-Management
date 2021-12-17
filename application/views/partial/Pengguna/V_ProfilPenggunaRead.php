<div class="content-wrapper">
	<div class="row d-flex justify-content-center">
		<div class="col-sm-12 grid-margin stretch-card">
			<!-- Profile Image -->
			<div class="card card-rounded">
          		<div class="card-body container-fluid">
					<div class="row">
						<div class="card-content col-sm-4">
							<!-- <h4 class="card-title d-flex justify-content-center " style="font-size: 18px;"><?=$title_page;?></h4> -->
							<div class="container-md">
								<div class="box-body box-profile text-center">
									<img class="img-xs rounded-circle" src="<?=$user_avatar;?>" alt="profile image" style="width:90px; height:90px">
									<p class="text-dark font-weight-bold text-center mt-2" style="font-size:18px; border-bottom: 2px solid #ccc; margin:auto; width:40%;">
										<?=$user_name; ?>
									</p>
									<h6 class="profile-username text-center font-weight-semibold text-dark">Pengguna</h6>

									<ul class="list-group list-group-unbordered">
										<li class="list-group-item" style="text-align:center">
											<b>ID User</b><br><a><?=$nama_id;?></a>
										</li>
										<li class="list-group-item" style="text-align:center">
											<b>Tanggal Registrasi</b><br><a><?=$tanggal_regis;?></a>
										</li>
										<li class="list-group-item" style="text-align:center">
											<b>Status Civitas</b><br><a><?=$bidang;?></a>
										</li>
										<li class="list-group-item" style="text-align:center">
											<div class="btn-group">
											<!-- <button type="button" class="btn btn-facebook m-1">Edit Data</button>
											<button type="button" class="btn btn-facebook m-1">Ubah Sandi</button> -->
											</div>
										</li>
									</ul>
								</div>
							</div>
						</div>
						<div class="card-content col-md-8 p-3" style="border: 1px solid #ccc;">
							<h4 class="card-title d-flex justify-content-center " style="font-size: 15px;">Data Lengkap Anda</h4>

							<div class="table-responsive">
								<table class="table table-hover">
									<tbody>
										<tr>
											<th scope="row">Nama Lengkap</th>
											<td><?= $user_name; ?></td>
										</tr>
										<tr>
											<th scope="row">Nomor Induk</th>
											<td> <?= $nik; ?> 
													 <?= $nip; ?> 
													 <?= $nip_tedik; ?> 
										  </td>
										</tr>
										<tr>
											<th scope="row">Tempat Lahir</th>
											<td> <?= $tempat_lahir; ?></td>
										</tr>
										<tr>
											<th scope="row">Tanggal Lahir</th>
											<td>  <?= $tanggal_lahir; ?></td>
										</tr>
										<tr>
											<th scope="row">Jenis Kelamin</th>
											<td>  <?= $jenis_kelamin ?> </td>
										</tr>
										<tr>
											<th scope="row">Alamat</th>
											<td>  <?= $alamat; ?></td>
										</tr>
										<tr>
											<th scope="row">Kontak</th>
											<td> <?= $no_handphone; ?> </td>
										</tr>
										<tr>
											<th scope="row">Email</th>
											<td>  <?= $email; ?> </td>
										</tr>
										<tr>
											<th scope="row">Status Civitas</th>
											<td> <?= $bidang; ?> </td>
										</tr>
										<!-- <tr>
											<th scope="row"> <button type="submit" class="btn btn-success mr-2">Submit</button>
															<button class="btn btn-light" type="reset">Reset</button>
											</th>
										</tr> -->
									</tbody>
								</table>
							</div>
							
								<div class="row">
									<div class="form-group row">
									
								</div>
							<!-- </div> -->
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>