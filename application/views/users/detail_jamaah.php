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
	 <div class="row">
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
	 								<img class="inline-block mb-10" src="<?=base_url().'uploads/jamaah/'.$foto_ktp;?>" alt="user"/>
	 								<div class="fileupload btn btn-default">
	 								</div>
	 							</div>	
	 							<h5 class="block mt-10 mb-5 weight-500 capitalize-font txt-orange"><?=$nama_jamaah;?></h5>
	 							<label class="mt-20">Mendaftarkan Diri Pada</label>
	 							<h6 class="block capitalize-font pb-20"><?=format_indo($tgl_daftar);?><?=waktu_lalu($tgl_daftar);?></h6>
	 						</div>	
	 						<div class="social-info">
	 							<div id="myModal" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	 								<!-- /.modal-dialog -->
	 							</div>
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
	 							<li class="active" role="presentation"><a  data-toggle="tab" id="profile_tab_8" role="tab" href="#profile_8" aria-expanded="false"><span>Info</span></a></li>
	 							<li role="presentation" class=""><a  data-toggle="tab" id="dokumen_tab_8" role="tab" href="#dokumen" aria-expanded="false"><span>Dokumen Asli</span></a></li>
	 							<li role="presentation" class=""><a  data-toggle="tab" id="password_tab_8" role="tab" href="#password_8" aria-expanded="false"><span>Ubah Password</span></a></li>
	 						</ul>
	 						<div class="tab-content" id="myTabContent_8">
	 							<div  id="profile_8" class="tab-pane fade active in" role="tabpanel">
	 								<div class="col-md-12">
	 									<div class="pt-20">
	 										<div class="row">
	 											<div class="col-md-4">
	 												<div class="form-group">
	 													<label class="control-label mb-10">Email</label>
	 													<input type="text" id="email" class="form-control" value="<?=$email;?>" readonly="">
	 												</div>
	 											</div>	
	 											<div class="col-md-4">
	 												<div class="form-group">
	 													<label class="control-label mb-10">No Kartu Tanda Penduduk</label>
	 													<input type="text" id="no_ktp" class="form-control" value="<?=$no_ktp?>" readonly="">
	 												</div>
	 											</div>
	 											<div class="col-md-4">
	 												<div class="form-group">
	 													<label class="control-label mb-10">No Kartu Keluarga</label>
	 													<input type="text" id="no_kk" class="form-control" value="<?=$no_ktp?>" readonly="">
	 												</div>
	 											</div>
	 											<!--/span-->
	 											<div class="col-md-4">
	 												<div class="form-group">
	 													<label class="control-label mb-10">Alamat</label>
	 													<textarea name="alamat" rows="5" cols="30" class="form-control" value=""readonly=""><?=$alamat; ?></textarea>
	 												</div>
	 											</div>
	 											<div class="col-md-4">
	 												<div class="form-group">
	 													<label class="control-label mb-10">Tanggal Lahir</label>
	 													<input type="text" id="tgl_lahir" class="form-control" value="<?=format_indo($tgl_lahir)?>" readonly="">
	 												</div>
	 											</div>
	 											<div class="col-md-4">
	 												<div class="form-group">
	 													<label class="control-label mb-10">Nomor Telephone</label>
	 													<input type="text" id="login_akun" class="form-control" value="<?=$no_telephone;?>" readonly="">
	 												</div>
	 											</div>
	 											<div class="col-md-4">
	 												<div class="form-group">
	 													<label class="control-label mb-10">Jenis Kelamin</label>
	 													<input type="text" id="jenis_kelamin" class="form-control" value="<?=$array[$jenis_kelamin];?>" readonly="">
	 												</div>
	 											</div>
	 											<div class="col-md-4">
	 												<div class="form-group">
	 													<label class="control-label mb-10">Pekerjaan</label>
	 													<input type="text" id="pekerjaan" class="form-control" value="<?=$pk[$pekerjaan];?>" readonly="">
	 												</div>
	 											</div>
	 											<div class="col-md-4">
	 												<div class="form-group">
	 													<label class="control-label mb-10">Pemilihan bulan Keberangkatan</label>
	 													<input type="text" id="pekerjaan" class="form-control" value="<?=$pbk;?>" readonly="">
	 												</div>
	 											</div>
	 										</div>
	 									</div>
	 								</div>
	 							</div>

	 							<div  id="dokumen" class="tab-pane fade" role="tabpanel">
	 								<div class="row">
	 									<div class="col-lg-12">
	 										<div class="">
	 											<div class="panel-wrapper collapse in">
	 												<div class="panel-body pa-0">
	 													<div class="col-sm-12 col-xs-12">
	 														<div class="form-wrap">
	 															<form action="#" id="gantifotojamaah" method="post">
	 																<div class="col-md-12">
	 																	<div class="pt-20">
	 																		<div class="row">
	 																			<div class="col-sm-6">
	 																				<div class="form-group">
	 																					<label  class="control-label mb-10">Foto Kartu Keluarga Jamaah Asli </label>
	 																					<img src="<?=base_url().'uploads/jamaah/'.$foto_kk;?>" class="img-rounded" alt="Cinque Terre" width="304" height="236">
	 																					<!-- <div class="fileupload btn btn-default"> -->
	 																						<label class="control-label mb-5">Ganti Foto Disini..!</label>
	 																						<input class="upload" type="file" name="foto_kk" id="foto_kk">
	 																					</div> 
	 																				</div>
	 																				<div class="col-sm-6">
	 																					<div class="form-group">
	 																						<label  class="control-label mb-10">Foto Kartu Tanda Penduduk Jamaah Asli </label>
	 																						<img src="<?=base_url().'uploads/jamaah/'.$foto_ktp;?>" class="img-rounded" alt="Cinque Terre" width="304" height="236">
	 																						<!-- <div class="fileupload btn btn-default"> -->
	 																							<label class="control-label mb-5">Ganti Foto Disini..!</label>
	 																							<input class="upload " type="file" name="foto_kk" id="foto_kk">
	 																						</div> 
	 																					</div>
	 																				</div>
	 																				<div class="modal-footer form-group col text-center">
	 																					<a type="button" onclick="ubah(<?=$id_daftar;?>)" title="Ubah Foto" class="btn btn-sm btn-primary fa fa-cloud-upload"></a>
	 																				</div>
	 																			</div>
	 																		</div>
	 																	</form>
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
	 						</div>
	 					</div>
	 				</div>
	 			</div>
	 		</div>
	 	</div>

	 	<?php $this->load->view('users/footer');?> <!--Include menu-->

	 	<script>

	 		function ubah(id_daftar)
	 		{
	 			swal({
	 				title: 'Apakah Anda Yakin?',
	 				text: "Data Mengubah Foto Dokumen Asli Jamaah!",
	 				type: 'warning',
	 				showCancelButton: true,
	 				cancelButtonColor: '#d33',
	 				confirmButtonText: 'Ya, Ubah!',
	 				closeOnConfirm : false
	 			},
	 			function(){
	 				$.ajax({
	 					url : "<?php echo base_url('jamaah/ubah_dokumen')?>",
	 					type : "post",
	 					data : {id_daftar:id_daftar},
	 					success : function(){
	 						swal('Data Berhasil Dihapus','success');
	 						$("#delete").fadeTo("slow",0.5,function(){
	 							$(this).remove();
	 						})
	 					},
	 					error:function(){
	 						swal('Data gagal dihapus','error');
	 					}

	 				});
	 			});
	 		}


	 	</script>

