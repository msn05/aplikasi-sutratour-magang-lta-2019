<?php $this->load->view('users/home');?> <!--Include menu-->
<?php $this->load->view('users/menu');?> <!--Include menu-->

<div class="row heading-bg">
	<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
		<h5 class="txt-dark">Galeri</h5>
	</div>
	<!-- Breadcrumb -->
	<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
		<ol class="breadcrumb">
			<li><a href="index.html">Dashboard</a></li>
			<li class="active"><span>Galeri Foto</span></li>
		</ol>
	</div>
	<!-- /Breadcrumb -->
</div>
<!-- /Title -->
<!-- Row -->
<?= $this->session->flashdata('message');?>
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default card-view pa-0">
			<div class="panel-wrapper collapse in">
				<div class="panel-body pa-0">
					<div class="col-lg-3 col-md-4 file-directory pa-0">
						<div class="ibox-content">
							<div class="ibox float-e-margins">
								<div class="file-manager">
									<div class="mt-20 mb-20 ml-15 mr-15">
										<div class="fileupload btn btn-warning btn-anim btn-block" data-toggle="modal" data-target="#Upload"><i class="fa fa-upload"></i><span class="btn-text">Upload files</span>
										</div>
									</div>
									<hr>
									<form action="<?=base_url().'galeri/jenis_kegiatan';?>" method="POST">
										<div class="mt-20 mb-20 ml-15 mr-15">
											<select class="form-control" name="jenis_kegiatan" id="jenis_kegiatan" onchange="this.form.submit()">
												<option value="0" selected disabled="">Pilih Jenis Kegiatannya</option>
												<option value="1">Manasik</option>
												<option value="2">Tawaf</option>
											</select>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-9 col-md-8 file-sec pt-20">
						<div class="row">
							<table id="mytable" class="table table-bordered table-striped table-hover dt-responsive" cellspacing="0" width="100%">
								<div class="col-lg-12">
									<?php 
									$s=['1'=>'Posting','0'=>'Belum Di Posting'];
									foreach ($cs->result_array() as $i) :;
										$id=$i['id'];
										$keterangan=$i['keterangan'];
										$filenya = $i['filenya'];
										$tgl_post = $i['tgl_post'];
										$nama = $i['nama'];
										$s=$s;
										$status_foto = $i['status_foto'];
										?>

										<div class="col-lg-4 col-md-3 col-sm-6 col-xs-12  file-box" id="delete">
											<div class="file">
												<a href="#" class="preview">
													<div class="icon">
														<img width="120px" height="150px" src="<?=base_url('uploads/galeri/').$filenya;?>">
													</div>
													<div class="file-name">
														<?=limit_words($keterangan,3);?>
													</div>
													<div class="file-name"><?=$tgl_post;?></div>
													<div class="file-name"><?=$nama;?></div>
													<div class="file-name"><?=$s[$status_foto];?></div>
												</a>

											</div>
											<div class="mt-10">
												<a type="button" onclick="deletegaleri(<?php echo $i['id']?>)" class="btn btn-sm btn-danger fa fa-trash-o delete "></a>		<a type="button" onclick="postgaleri(<?php echo $i['id']?>)" class="btn btn-sm btn-primary fa fa-cloud-upload post " ></a>
											</div>
										</div>
									<?php endforeach;?>
								</div>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?=form_open_multipart('galeri/post');?>
<div class="modal fade" id="Upload" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Tambah Galeri Baru</h4>
			</div>
			<div class="modal-body">
				<div class="form-group">
					<label class="control-label mb-10">Keterangan nya</label>
					<textarea name="keterangan" id="keterangan" class="form-control"></textarea>
				</div> 
				<div class="form-group">
					<label class="control-label mb-10">Fotonya</label>
					<input type="file" name="filenya" class="form-control" id="filenya">
				</div>	
				<div class="form-group">
					<label class="control-label mb-10">Jenis Kegiatannya</label>
					<select name="jenis_kegiatan" id="jenis_kegiatan" class="form-control">
						<option value="0" selected disabled>Pilih Kegiatannnya</option>
						<option value="1">Manasik</option>
						<option value="2">Tawaf</option>
					</select>
				</div>
			</div>
			<div class="modal-footer">
				<button type="submit" id="add-row" class="btn btn-success">Simpan</button>
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>
</form>




<?php $this->load->view('users/footer');?> <!--Include menu-->

<script>
	
	function deletegaleri(id)
	{
		swal({
			title: 'Apakah Anda Yakin?',
			text: "Data Tidak Akan Dapat Dikembalikan!",
			type: 'warning',
			showCancelButton: true,
			// confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Ya, hapus!',
			closeOnConfirm : false
		},
		function(){
			$.ajax({
				url : "<?php echo base_url('galeri/hapus')?>",
				type : "post",
				data : {id:id},
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


	function postgaleri(id)
	{
		swal({
			title: 'Apakah Anda Memposting Foto Aktivitas Ini?',
			type: 'warning',
			showCancelButton: true,
			// confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Ya',
			closeOnConfirm : false
		},
		function(){
			$.ajax({
				url : "<?php echo base_url('galeri/postingke')?>",
				type : "post",
				data : {id:id},
				success : function(){
					swal('Data Berhasil Diposting','success');
					$("#delete").fadeTo("slow",0.5,function(){
						location.reload();
					});
				},
				error:function(){
					swal('Data gagal Diposting','error');
				}

			});
		});
	}

</script>