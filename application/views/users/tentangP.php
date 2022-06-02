	 <?php $this->load->view('users/home');?> <!--Include menu-->
	 <?php $this->load->view('users/menu');?> <!--Include menu-->
	 <!-- Right Sidebar Menu -->
	 
	 <div class="row heading-bg">
	 	<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
	 		<h5 class="txt-dark">Tentang Perusahaan</h5>
	 	</div>
	 	<!-- Breadcrumb -->
	 	<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
	 		<ol class="breadcrumb">
	 			<li><a href="#">Page</a></li>
	 			<li><a href="<?=base_url().'page/profile';?>">Tentang Perusahaan</a></li>
	 		</ol>
	 	</div>
	 	<!-- /Breadcrumb -->
	 </div>
	 <div class="right-sidebar-backdrop"></div>
	 <!-- /Right Sidebar Backdrop -->
	 <?php foreach ($web as $row);?>
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
	 								<img width="30px" class="user-auth-img img-circl" src="<?=base_url('assets/logo/'). $row->foto;?>"/>
	 							</div>	
	 							<h5 class="block mt-10 mb-5 weight-500 capitalize-font txt-orange">LOGO PERUSAHAAN</h5>
	 							<!-- <button type="file" class="btn btn-success mr-10 mb-30">Update</button> -->
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
	 							<li role="presentation" class=""><a  data-toggle="tab" id="password_tab_8" role="tab" href="#password_8" aria-expanded="false"><span>Ubah Logo</span></a></li>
	 						</ul>
	 						<div class="tab-content" id="myTabContent_8">
	 							<div  id="profile_8" class="tab-pane fade active in" role="tabpanel">
	 								<div class="col-md-12">
	 									<div class="pt-20">
	 										<div class="row">
	 											<div class="col-md-6">
	 												<div class="form-group">
	 													<label class="control-label mb-10">Nama Perusahaan</label>
	 													<input type="text" id="nama_perusahaan" name="nama_perusahaan" class="form-control" value="<?php tampil($row->nama_perusahaan);?>" readonly="">
	 												</div>
	 											</div>
	 											<!--/span-->
	 											<div class="col-md-6">
	 												<div class="form-group">
	 													<label class="control-label mb-10">Nomor Registrasi</label>
	 													<input type="text" id="email" class="form-control" value="<?php tampil($row->nomorregistrasi);?>" readonly="">
	 												</div>
	 											</div>	
	 											<!--/span-->
	 											<div class="col-md-12">
	 												<div class="form-group">
	 													<label class="control-label mb-10">Alamat</label>
	 													<textarea id="editordata" name="editordata" class="form-control" rows="12" cols="1"><?php tampil($row->alamat);?></textarea>

	 												</div>
	 											</div>
	 											<div class="col-md-12">
	 												<div class="form-group">
	 													<label class="control-label mb-10">Visi dan Misi Perusahaan</label>
	 													<textarea class="editordata form-control" rows="12" cols="1"><?php tampil($row->visi_misi);?></textarea>

	 												</div>
	 											</div>
	 											<div class="col-md-6">
	 												<div class="form-group">
	 													<label class="control-label mb-10">Contact</label>
	 													<input type="text" id="kontak" class="form-control" value="<?php tampil($row->kontak);?>" readonly="">
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
	 															<?=form_open_multipart('page/update_data_perusahaan');?>
	 															<div class="form-body overflow-hide">
	 																<div class="form-group">
	 																	<label class="control-label mb-10" for="exampleInputuname_01">Nomor Registrasi Perusahaan</label>
	 																	<div class="input-group">
	 																		<div class="input-group-addon"><i class="icon-user"></i></div>
	 																		<input type="hidden" class="form-control" name="id" id="id" value="<?php tampil($row->id);?>"><input type="text" class="form-control" name="nomorregistrasi" id="nomorregistrasi" value="<?php tampil($row->nomorregistrasi);?>">
	 																	</div>
	 																</div>
	 																
	 																<div class="form-group">
	 																	<label class="control-label mb-10" for="exampleInputuname_01">Nama Perusahaan</label>
	 																	<div class="input-group">
	 																		<div class="input-group-addon"><i class="icon-user"></i></div>

	 																		<input type="text" class="form-control" name="nama_perusahaan" id="nama_perusahaan" value="<?php tampil($row->nama_perusahaan);?>">
	 																	</div>
	 																</div>
	 																<div class="form-group">
	 																	<label class="control-label mb-10" for="exampleInputContact_01">Alamat</label>
	 																	<div class="input-group">
	 																		<textarea class="summernote form-control" name="alamat" id="alamat"><?php tampil($row->alamat);?> </textarea>
	 																	</div>
	 																</div>
	 																<div class="form-group">
	 																	<label class="control-label mb-10" for="exampleInputContact_01">Visi dan Misi</label>
	 																	<div class="input-group">
	 																		<textarea class="summernote form-control" name="visi_misi" id="visi_misi"><?php tampil($row->visi_misi);?> </textarea>
	 																	</div>
	 																</div>
	 																
	 																<div class="form-group">
	 																	<label class="control-label mb-10" for="exampleInputEmail_01">Footer</label>
	 																	<div class="input-group">
	 																		<div class="input-group-addon"><i class="icon-envelope-open"></i></div>
	 																		<input type="text" class="form-control" id="footer" name="footer" value="<?php tampil($row->footer);?>" >
	 																	</div>
	 																</div>
	 																<div class="col-md-6">
	 																	<div class="form-group">
	 																		<label class="control-label mb-10">Contact</label>
	 																		<input type="text" name="kontak" id="kontak" class="form-control" value="<?php tampil($row->kontak);?>" readonly="">
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

	 							<div  id="password_8" class="tab-pane fade" role="tabpanel">
	 								<!-- Row -->
	 								<div class="row">
	 									<div class="col-lg-12">
	 										<div class="">
	 											<div class="panel-wrapper collapse in">
	 												<div class="panel-body pa-0">
	 													<div class="col-sm-12 col-xs-12">
	 														<div class="form-wrap">
	 															<?=form_open_multipart('page/update_data_perusahaan');?>
	 															<div class="form-body overflow-hide">
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
