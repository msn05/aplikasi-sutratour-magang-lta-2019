<?php $this->load->view('users/home');?> <!--Include menu-->
<?php $this->load->view('users/menu');?> <!--Include menu-->

<div class="row heading-bg">
	<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
		<h5 class="txt-dark">Laporan Pembayaran Jamaah</h5>
	</div>
	<!-- Breadcrumb -->
	<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
		<ol class="breadcrumb">
			<li><a href="#">Page</a></li>
			<li><a href="index.html">Laporan Pembayaran Jamaah</a></li>
		</ol>
	</div>
	<!-- /Breadcrumb -->
</div>
<?= $this->session->flashdata('message');?>


<div class="row">
	<div class="col-md-12">
		<div class="row">
			<div class="col-md-4">
				<div class="panel panel-default card-view">
					<div class="panel-wrapper collapse in">
						<div class="panel-body">
							<div class="form-wrap mt-40">
								<form  action="" id="formC">
									<div class="row">
										<div class="col-md-12">
											<div class="form-group">
												<label class="control-label mb-10">Tanggal</label>
												<!-- <select class="form-control" id="start_date" name="start_date"> -->
													<select name="" id="start[]"  class="form-control">
														<option value="0">Pilih Kode Pembayaran</option>
														<?php foreach ($a as $key) { ?>
															<option value="<?=$key->kode_pembayaran;?>"><?=$key->nama_jamaah;?></option>
														<?php } ?>
													</select>
												</div> 

												<hr>
											</div>
											<div class="col-md-3 offset-md-10">
												<button type="submit" id="add-row" class="btn btn-success">Cari</button>
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div id="res"></div>
			</div>

		</div>


	</div>


	<?php $this->load->view('users/footer');?> <!--Include menu-->

	<script>
		$(document).ready(function() {
			$("#formC").submit(function(e){
				e.preventDefault();
				var kode_pembayaran = $("#start[]").val();
				var url = "<?=base_url('laporan/pembayaran/')?>" + kode_pembayaran ;
				$('#res').load(url);

			});

		});
	</script>