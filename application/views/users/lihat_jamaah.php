	 <?php $this->load->view('users/home');?> <!--Include menu-->
	 <?php $this->load->view('users/menu');?> <!--Include menu-->
	 <!-- Right Sidebar Menu -->
	 
	 <div class="row heading-bg">
	 	<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
	 		<h5 class="txt-dark">Profile</h5>
	 	</div>
	 	<!-- Breadcrumb -->
	 	<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
	 		<ol class="breadcrumb">
	 			<li><a href="#">Page</a></li>
	 			<li><a href="<?=base_url().'page/profile';?>">Profile</a></li>
	 		</ol>
	 	</div>
	 	<!-- /Breadcrumb -->
	 </div>
	 <div class="right-sidebar-backdrop"></div>
	 <!-- /Right Sidebar Backdrop -->
	 <!-- Row -->
	 <?= $this->session->flashdata('message');?>
	 <div class="row" id="oke">
	 	<div class="col-lg-3 col-xs-12">
	 		<div class="panel panel-default card-view  pa-0">
	 			<div class="panel-wrapper collapse in">
	 				<div class="panel-body  pa-0">
	 					<div class="profile-box">
	 						<div class="profile-cover-pic">
	 							<div class="profile-image-overlay" style="background-color: #d966ff"></div>
	 						</div>
	 						<div class="profile-info text-center">
	 							<div class="profile-img-wrap">
	 								<img class="inline-block mb-10" src="<?=base_url().'uploads/jamaah/'.$fotonya;?>" alt="user"/>
	 							</div>	
	 							<h5 class="block mt-10 mb-5 weight-500 capitalize-font txt-orange"><?=$nama_jamaah;?></h5>
	 							<label class="mt-20">Mendaftarkan Diri Pada</label>
	 							<h6 class="block capitalize-font pb-20"><?=format_indo($tgl_daftar);?><?=waktu_lalu($tgl_daftar);?></h6>
	 						</div>	
	 						<div class="text-center social-info">
	 							<span >Status Akunnya : </span><label class="btn btn-xs btn-rounded label-danger" value=""><?=$ad[$aktiv_dak];?></label>
	 						</div>
	 					</div>
	 				</div>
	 			</div>
	 		</div>
	 	</div>
	 	<div class="col-lg-9 col-xs-12">
	 		<div class="panel panel-default card-view pa-0">
	 			<div class="panel-wrapper collapse in">
	 				<div  class="panel-body pb-0">
	 					<div  class="tab-struct custom-tab-1">
	 						<ul role="tablist" class="nav nav-tabs nav-tabs-responsive" id="myTabs_8">
	 							<li class="active" role="presentation"><a  data-toggle="tab" id="profile_tab_8" role="tab" href="#profile_8" aria-expanded="false"><span>Keterangan</span></a></li>
	 						</ul>
	 						<div class="tab-content" id="myTabContent_8">
	 							<div  id="profile_8" class="tab-pane fade active in" role="tabpanel">
	 								<div class="col-md-12">
	 									<div class="pt-20">
	 										<div class="row">
	 											<div class="col-md-4">
	 												<div class="form-group">
	 													<label class="control-label mb-10">Nama Jamaah</label>
	 													<input type="hidden" id="id_daftar" name="id_daftar">
	 													<input type="text" readonly="" id="nama_jamaah" name="nama_jamaah" class="form-control" value="<?=$nama_jamaah;?>" >
	 												</div>
	 											</div>
	 											<div class="col-md-4">
	 												<div class="form-group">
	 													<label class="control-label mb-10">Nomor Passport</label>
	 													<input type="text" id="no_passport" readonly="" name="no_passport" class="form-control" value="<?=$no_passport;?>" >
	 												</div>
	 											</div>	
	 											<div class="col-md-4">
	 												<div class="form-group">
	 													<label class="control-label mb-10">Email</label>
	 													<input type="text" id="email" name="email" readonly="" class="form-control" value="<?=$email;?>" >
	 												</div>
	 											</div>	
	 											<div class="col-md-4">
	 												<div class="form-group">
	 													<label class="control-label mb-10">No Kartu Tanda Penduduk</label>
	 													<input type="text" id="no_ktp" name="no_ktp" readonly="" class="form-control" value="<?=$no_ktp?>" >
	 												</div>
	 											</div>
	 											<div class="col-md-4">
	 												<div class="form-group">
	 													<label class="control-label mb-10">No Kartu Keluarga</label>
	 													<input type="text" id="no_kk" name="no_kk" class="form-control" readonly="" value="<?=$no_ktp?>" >
	 												</div>
	 											</div>
	 											<!--/span-->
	 											<div class="col-md-4">
	 												<div class="form-group">
	 													<label class="control-label mb-10">Alamat</label>
	 													<textarea name="alamat"readonly="" id="alamat" rows="5" cols="30" class="form-control" value=""><?=$alamat; ?></textarea>
	 												</div>
	 											</div>
	 											<div class="col-md-4">
	 												<div class="form-group">
	 													<label class="control-label mb-10">Tanggal Lahir</label>
	 													<input type="text"  readonly="" id="tgl_lahir" class="tanggal form-control" name="tgl_lahir" value="<?=format_indo($tgl_lahir);?>" >
	 												</div>
	 											</div>
	 											<div class="col-md-4">
	 												<div class="form-group">
	 													<label class="control-label mb-10">Nomor Telephone</label>
	 													<input type="text" name="no_telephone" id="no_telephone" class="form-control" value="<?=$no_telephone;?>" readonly="" >
	 												</div>
	 											</div>
	 											<div class="col-md-4">
	 												<div class="form-group">
	 													<label class="control-label mb-10">Jenis Kelamin</label>
	 													<input type="text" class="form-control" value="<?=$jk[$jenis_kelamin];?>" readonly="">
	 												</div>
	 											</div>
	 											<div class="col-md-4">
	 												<div class="form-group">
	 													<label class="control-label mb-10">Pekerjaan</label>
	 													<input readonly="" type="text" value="<?=$pk[$pekerjaan];?>" class="form-control">
	 												</div>
	 											</div>
	 											<div class="col-md-4">
	 												<div class="form-group">
	 													<?php foreach ($jadwal as $row) ;?>
	 													<label class="control-label mb-10">Layanan</label>
	 													<input type="text" readonly="" value="<?php echo $row->nama_layanan;?>" class="form-control">
	 												</div>
	 											</div>
	 											<div class="col-md-4">
	 												<div class="form-group">
	 													<label class="control-label mb-10">Pemilihan bulan Keberangkatan</label>
	 													<input type="text" readonly="" value="<?php echo format_indo($row->bulan_keberangkatan);?>" class="form-control">
	 												</div>
	 											</div>
	 											
	 											<div class="col-md-4">
	 												<div class="form-group">
	 													<label class="control-label mb-10">Harga</label>
	 													<input type="text" class="total form-control" name="total" id="total" value="<?= rupiah($jumlah_yang_dibayarkan);?>"  readonly="">
	 												</div>
	 											</div>
	 											<div class="col-md-4">
	 												<div class="form-group">
	 													<label class="control-label mb-10">Status Pembayaran</label>
	 													<input type="text" class="form-control" value="<?=$pdj[$status_pembayaran];?>"  readonly="">
	 												</div>
	 											</div>
	 											<div class="col-md-4">
	 												<div class="form-group">
	 													<label class="control-label mb-10">Status</label>
	 													<input type="text" class="form-control" value="<?=$p[$statusnya];?>"  readonly="">
	 												</div>
	 											</div>
	 											<div class="col-md-4">
	 												<div class="form-group">
	 													<label class="control-label mb-10">Tanggal Keberangkatan</label>
	 													<input type="text" class="form-control" name="tgl_keberangkatan" id="tgl_keberangkatan" value="<?=$b;?>"  readonly="">
	 												</div>
	 											</div>
	 										</div>
	 										<div class="modal-footer">
	 											<!-- <button type="submit" class="btn btn-primary" onclick="edit(<?=$id_daftar;?>)">Simpan</button> -->
	 											<a type="button" class="btn btn-success" href="<?=base_url().'jamaah';?>" title="kembali ke halaman data jamaah" >Kembali</a>
	 											<a type="button" class="btn btn-primary" href="<?=base_url().'jamaah/cetak/'.$row->id_daftar;?>" title="cetak data jamaah" >Print</a>
	 										</div>
	 									</div>
	 								</div>
	 							</div>

	 						</div>
	 					</div>
	 				</div>
	 			</div>
	 		</div>
	 	</div>

	 	<?php $this->load->view('users/footer');?> <!--Include menu-->

	 	<script>

	 		$('#jenis_kelamin').val('<?=$jenis_kelamin;?>');
	 		$('#pekerjaan').val('<?=$pekerjaan;?>');
	 		$('#paket_yang_dipilih').val('<?=$paket_yang_dipilih;?>');
	 		$('#pemilihan_bulan_kbr').val('<?=$pemilihan_bulan_kbr;?>');
	 		$('#status_dokumen').val('<?=$status_dokumen;?>');
	 		$('#status_pembayaran').val('<?=$status_pembayaran;?>');
	 		$('#statusnya').val('<?=$statusnya;?>');



	 	</script>

