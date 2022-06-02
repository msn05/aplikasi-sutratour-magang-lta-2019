<?php $this->load->view('users/home');?> <!--Include menu-->
<?php $this->load->view('users/menu');?> <!--Include menu-->
<div class="row heading-bg">
	<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
		<h5 class="txt-dark">Data Promo Website</h5>
	</div>
	<!-- Breadcrumb -->
	<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
		<ol class="breadcrumb">
			<li><a href="#">Page</a></li>
			<li><a href="index.html">Data Promo</a></li>
		</ol>
	</div>
	<!-- /Breadcrumb -->
</div>

<div class="row">
	<div class="col-sm-10">
		<div class="panel panel-default card-view">
			<div class="panel-heading">
				<div class="pull-left">
					<h6 class="panel-title txt-dark">Tambah Promo Baru</h6>
				</div>
				<div class="clearfix"></div>
			</div>
			<div class="panel-wrapper collapse in">
				<div class="panel-body">
					<form class="form-horizontal" action="<?=base_url().'page/tambahPro';?>" method="post">
						<div class="form-wrap mt-40">
							<div class="row">
								<div class="col-sm-6">
									<div class="form-group">
										<label for="exampleInputuname_4" class="col-sm-3 control-label">Kode Promo</label>
										<div class="col-sm-9">
											<div class="input-group">
												<input type="hidden" class="" name="id_promo" id="id_promo" placeholder="Nama Jabatannya">
												<input type="text" class="form-control" name="kode_promo" id="kode_promo" placeholder="Masukkan Kode Promonya">
												<div class="input-group-addon"><i class="fa fa-code"></i>
												</div>
											</div>
											<?=form_error('kode_promo','<small  class="text-danger pl-2">','</small>')?>
										</div>
									</div>
								</div>
								<div class="col-sm-6">
									<div class="form-group">
										<label for="exampleInputuname_4" class="col-sm-3 control-label">Nama Promo*</label>
										<div class="col-sm-9">
											<div class="input-group">
												<input type="text" class="form-control" name="nama_promo" id="nama_promo" placeholder="Nama Promonya">
												<div class="input-group-addon"><i class="icon-promo"></i></div>
											</div>
											<?=form_error('nama_promo','<small  class="text-danger pl-2">','</small>')?>
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-6">
									<div class="form-group">
										<label for="exampleInputuname_4" class="col-sm-3 control-label">Batas Promo</label>
										<div class="col-sm-9">
											<div class="input-group">
												<input type="text" class="tanggal form-control" name="batas_promo" id="batas_promo" placeholder="Format Tahun-bulan-hari" autocomplete="off">
												<div class="input-group-addon"><i class="icon-calender"></i></div>
											</div>
											<?=form_error('batas_promo','<small  class="text-danger">','</small>')?>
										</div>
									</div>
								</div>
								<div class="col-sm-6">
									<div class="form-group">
										<label class="col-sm-3 control-label">Nama Layanan</label>
										<div class="col-sm-9">
											<div class="input-group">
												<select class="form-control" id="nama_layanan" name="nama_layanan">
													<option class="form-control" value="0" selected disabled>Pilih Layanan</option>
													<?php foreach ($dp->result() as $row) :?>
														<option class="form-control" value="<?php echo $row->id;?>"><?php echo $row->nama_layanan;?></option>
													<?php endforeach ;?>
												</select>
											</div>
											<?=form_error('nama_layanan','<small  class="text-danger">','</small>')?>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="modal-footer">
							<div class="col-sm-6">
								<button type="submit" class="btn btn-primary ">Simpan</button>
								<input type="hidden" id="jumlah-form" value="1">
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