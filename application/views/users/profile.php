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
	 <?php foreach ($users as $row);?>
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
	 								<img class="inline-block mb-10" src="<?=base_url('uploads/foto/'). $row->foto;?>" alt="user"/>
	 								<div class="fileupload btn btn-default">
	 									<input class="upload" type="file">
	 								</div>
	 							</div>	
	 							<h5 class="block mt-10 mb-5 weight-500 capitalize-font txt-orange"><?=$row->nama;?></h5>
	 							<h6 class="block capitalize-font pb-20"><?=$row->nama_akses;?></h6>
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
	 							<li role="presentation" class=""><a  data-toggle="tab" id="settings_tab_8" role="tab" href="#settings_8" aria-expanded="false"><span>Pengaturan</span></a></li>
	 							<li role="presentation" class=""><a  data-toggle="tab" id="password_tab_8" role="tab" href="#password_8" aria-expanded="false"><span>Ubah Password</span></a></li>
	 						</ul>
	 						<div class="tab-content" id="myTabContent_8">
	 							<div  id="profile_8" class="tab-pane fade active in" role="tabpanel">
	 								<div class="col-md-12">
	 									<div class="pt-20">
	 										<div class="row">
	 											<div class="col-md-6">
	 												<div class="form-group">
	 													<label class="control-label mb-10">Nomor Identitas</label>
	 													<input type="text" id="nomoridentitas" class="form-control" value="<?=$row->nomoridentitas;?>" readonly="">
	 												</div>
	 											</div>
	 											<!--/span-->
	 											<div class="col-md-6">
	 												<div class="form-group">
	 													<label class="control-label mb-10">Email</label>
	 													<input type="text" id="email" class="form-control" value="<?=$row->email;?>" readonly="">
	 												</div>
	 											</div>	
	 											<div class="col-md-6">
	 												<div class="form-group">
	 													<label class="control-label mb-10">Login Terakhir</label>
	 													<input type="text" id="login_akun" class="form-control" value="<?=format_indo($row->login_akun);?>,  Sekitar Jam <?=waktu_lalu($row->login_akun);?>" readonly="">
	 												</div>
	 											</div>
	 											<!--/span-->
	 											<div class="col-md-6">
	 												<div class="form-group">
	 													<label class="control-label mb-10">Alamat</label>
	 													<textarea name="alamat" rows="5" cols="30" class="form-control" value=""readonly=""><?=$row->alamat; ?></textarea>
	 												</div>
	 											</div>
	 											<div class="col-md-6">
	 												<div class="form-group">
	 													<label class="control-label mb-10">Jabatan</label>
	 													<input type="text" id="login_akun" class="form-control" value="<?=$row->nama_jabatan;?>" readonly="">
	 												</div>
	 											</div>
	 											<div class="col-md-6">
	 												<div class="form-group">
	 													<label class="control-label mb-10">Nomor Telephone</label>
	 													<input type="text" id="login_akun" class="form-control" value="<?=$row->no_telp;?>" readonly="">
	 												</div>
	 											</div>
	 											<!--/span-->
	 										</div>
	 										
	 										<!--/span-->
	 									</div>
	 									<!-- /Row -->
	 								</div>
	 							</div>

	 							<div  id="settings_8" class="tab-pane fade" role="tabpanel">
	 								<!-- Row -->
	 								<div class="row">
	 									<div class="col-lg-12">
	 										<div class="">
	 											<div class="panel-wrapper collapse in">
	 												<div class="panel-body pa-0">
	 													<div class="col-sm-12 col-xs-12">
	 														<div class="form-wrap">
	 															<?=form_open_multipart('page/ganti');?>
	 															<div class="form-body overflow-hide">

	 																<div class="form-group">
	 																	<label class="control-label mb-10" for="exampleInputuname_01">Nama</label>
	 																	<div class="input-group">
	 																		<div class="input-group-addon"><i class="icon-user"></i></div>
	 																		<input type="hidden" name="nomoridentitas" id="nomoridentitas" value="<?=$row->nomoridentitas;?>">
	 																		<input type="text" class="form-control" name="nama" id="nama" value="<?=$row->nama;?>">
	 																	</div>
	 																</div>
	 																<div class="form-group">
	 																	<label class="control-label mb-10" for="exampleInputEmail_01">Email</label>
	 																	<div class="input-group">
	 																		<div class="input-group-addon"><i class="icon-envelope-open"></i></div>
	 																		<input type="email" class="form-control" id="email" name="email" value="<?=$row->email;?>">
	 																	</div>
	 																</div>
	 																<div class="form-group">
	 																	<label class="control-label mb-10" for="exampleInputContact_01">Alamat</label>
	 																	<div class="input-group">
	 																		<div class="input-group-addon"><i class="fa fa-map-marker"></i></div>
	 																		<textarea class="form-control" name="alamat" id="alamat" value=""><?=$row->alamat;?></textarea>
	 																	</div>
	 																</div>
	 																<!-- <div class="form-group">
	 																	<label class="control-label mb-10" for="exampleInputpwd_01">Password</label>
	 																	<div class="input-group">
	 																		<div class="input-group-addon"><i class="icon-lock"></i></div>
	 																		<input type="password" class="form-control" id="exampleInputpwd_01" placeholder="Enter pwd" value="password">
	 																	</div>
	 																</div> -->
	 																<div class="form-group">
	 																	<label class="control-label mb-10" for="exampleInputContact_01">Foto</label>
	 																	<div class="input-group">
	 																		<div class="input-group-addon"><i class="fa fa-file-photo-o"></i></div>
	 																		<input type="file" class="form-control" name="foto" id="foto" value="<?=$row->foto;?>">
	 																	</div>
	 																</div>
	 															</div>
	 															<div class="form-actions mt-10">			
	 																<button type="submit" class="btn btn-success mr-10 mb-30">Update</button>
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

	 						<div  id="password_8" class="tab-pane fade" role="tabpanel">
	 							<!-- Row -->
	 							<div class="row">
	 								<div class="col-lg-12">
	 									<div class="">
	 										<div class="panel-wrapper collapse in">
	 											<div class="panel-body pa-0">
	 												<div class="col-sm-12 col-xs-12">
	 													<div class="form-wrap">
	 														<form action="<?=base_url().'page/ganti_password';?>" method="post">
	 															<div class="form-horizontal">
	 																<div class="form-group">
	 																	<label for="exampleInputpwd_32" class="col-lg-2 control-label">Password Lama</label>
	 																	<div class="col-sm-5">
	 																		<div class="input-group">
	 																			<div class="input-group-addon"><i class="icon-lock"></i></div>
	 																			<input type="password" class="form-control" id="passwordLama" name="passwordLama" placeholder="Password Lama">
	 																		</div>
	 																	</div>
	 																</div>
	 																<div class="form-group">
	 																	<label for="exampleInputpwd_32" class="col-lg-2 control-label">Password Baru</label>
	 																	<div class="col-sm-5">
	 																		<div class="input-group">
	 																			<div class="input-group-addon"><i class="icon-lock"></i></div>
	 																			<input type="password" class="form-control" id="passwordBaru" name="passwordBaru" placeholder="Password Baru">
	 																		</div>
	 																	</div>
	 																</div>
	 																<div class="form-group">
	 																	<label for="exampleInputpwd_32" class="col-lg-2 control-label">Konfirmasi Password Baru</label>
	 																	<div class="col-sm-5">
	 																		<div class="input-group">
	 																			<div class="input-group-addon"><i class="icon-lock"></i></div>
	 																			<input type="password" class="form-control" id="Conpasswordbaru" name="Conpasswordbaru" placeholder="Password Lama">
	 																		</div>
	 																	</div>
	 																</div>
	 																<div class="form-group mb-2">
	 																	<div class="col-sm-offset-3 col-sm-9">
	 																		<button type="submit" class="btn btn-primary ">Update</button>
	 																	</div>
	 																<!-- <div class="form-actions mt-10">			
	 																	<button type="submit" class="btn btn-success mr-10 mb-30">Update</button>
	 																</div> -->				
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
	 <!-- /Row -->


	</div>
	<?php $this->load->view('users/footer');?> <!--Include menu-->
