<?php $this->load->view('users/home');?> <!--Include menu-->
<?php $this->load->view('users/menu');?> <!--Include menu-->
<div class="row heading-bg">
	<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
		<h5 class="txt-dark">Data Users Website</h5>
	</div>
	<!-- Breadcrumb -->
	<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
		<ol class="breadcrumb">
			<li><a href="#">Page</a></li>
			<li><a href="index.html">Data Users</a></li>
		</ol>
	</div>
	<!-- /Breadcrumb -->
</div>

<div class="row">
	<div class="col-sm-10">
		<div class="panel panel-default card-view">
			<div class="panel-heading">
				<div class="pull-left">
					<h6 class="panel-title txt-dark">Tambah User Website</h6>
				</div>
				<div class="clearfix"></div>
			</div>
			<div class="panel-wrapper collapse in">
				<div class="panel-body">
					<form class="form-horizontal" action="<?=base_url().'page/simpanUser';?>" method="post">
						<!-- <button type="button" class="btn btn-success btn-rounded" id="btn-tambah-form">Tambah Data Form</button>
							<button type="button" class="btn btn-warning btn-rounded" id="btn-reset-form">Reset Form</button><br><br> -->
							<div class="form-wrap mt-40">
								<div class="row">
									<div class="col-sm-6">
										<div class="form-group">
											<label for="exampleInputuname_4" class="col-sm-3 control-label">Nomor Identitas</label>
											<div class="col-sm-9">
												<div class="input-group">
													<input type="text" class="form-control" name="nomoridentitas" id="nomoridentitas" placeholder="Masukkan Nomor Identitas">
													<div class="input-group-addon"><i class="icon-user"></i>
													</div>
												</div>
												<?=form_error('nomoridentitas','<small  class="text-danger pl-2">','</small>')?>
											</div>
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<label for="exampleInputuname_4" class="col-sm-3 control-label">Email*</label>
											<div class="col-sm-9">
												<div class="input-group">
													<input type="text" class="form-control" name="email" id="email" placeholder="Username">
													<div class="input-group-addon"><i class="icon-envelope-open"></i></div>
												</div>
												<?=form_error('email','<small  class="text-danger pl-2">','</small>')?>
											</div>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-sm-6">
										<div class="form-group">
											<label for="exampleInputuname_4" class="col-sm-3 control-label">Nama*</label>
											<div class="col-sm-9">
												<div class="input-group">
													<input type="text" class="form-control" name="nama" id="nama" placeholder="Masukkan Nama">
													<div class="input-group-addon"><i class="icon-user"></i></div>
												</div>
												<?=form_error('nama','<small  class="text-danger">','</small>')?>
											</div>
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<label for="exampleInputuname_4" class="col-sm-3 control-label">Akses*</label>
											<div class="col-sm-9">
												<select name="akses" id="akses" class="form-control">
													<option value="0" selected disabled>Pilih Akses</option>
													<option value="1"> Admin</option>
													<option value="2"> Marketing</option>
													<option value="3"> Pimpinan</option>
												</select>
												<?=form_error('akses','<small  class="text-danger">','</small>')?>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-6">
									<div class="form-group">
										<label for="exampleInputuname_4" class="col-sm-3 control-label">Alamat*</label>
										<div class="col-sm-9">
											<div class="input-group">
												<input type="text" class="form-control" name="alamat" id="alamat" placeholder="Masukkan Nama">
												<div class="input-group-addon"><i class="icon-user"></i></div>
											</div>
											<?=form_error('alamat','<small  class="text-danger">','</small>')?>
										</div>
									</div>
								</div>
								<div class="col-sm-6">
									<div class="form-group">
										<label for="exampleInputuname_4" class="col-sm-3 control-label">Nomor Telephone*</label>
										<div class="col-sm-9">
											<div class="input-group">
												<input type="text" class="form-control" name="no_telp" id="no_telp" placeholder="Masukkan Nama">
												<div class="input-group-addon"><i class="icon-user"></i></div>
											</div>
											<?=form_error('no_telp','<small  class="text-danger">','</small>')?>
										</div>
									</div>
								</div>
								<div class="col-sm-6">
									<div class="form-group">
										<label for="exampleInputuname_4" class="col-sm-3 control-label">Jabatan*</label>
										<div class="col-sm-9">
											<select name="jabatan_pegawai" id="jabatan_pegawai" class="form-control">
												<option value="0" selected disabled>Pilih Salah Satu</option>
												<?php foreach ($jabatan_pegawai->result() as $row) :?>
													<option value="<?php echo $row->id_jabatan;?>"><?=ucfirst($row->nama_jabatan);?></option>
												<?php endforeach;?>
											</select>
											<?=form_error('jabatan_pegawai','<small  class="text-danger pl-2">','</small>')?>
										</div>
									</div>
								</div>
							</div>
							<div class="form-group mb-0">
								<div class="col-sm-offset-5 col-sm-9 mt-40">
									<button type="submit" class="btn btn-primary ">Simpan</button>
								</div>
							</div>
						</div>
					</div>	
				</div>
			</form>
		</div>
	</div>
</div>
<?php $this->load->view('users/footer');?> <!--Include menu-->