<div id="content">
	<section class="container">
		<div class="row">
			<div class="col mb-2">
				<div class="row">
					<aside class="col-md-3">
						<div class="bg-light shadow-md rounded p-3">
							<h3 class="text-5">Filter</h3>
							<div class="accordion accordion-alternate style-2" id="toggleAlternate">
								<div class="card">
									<div class="card-header" id="stops">
										<h5 class="mb-0"> <a href="#" data-toggle="collapse" data-target="#togglestops" aria-expanded="true" aria-controls="togglestops">Nama Layanan</a> </h5>
									</div>
									<div id="togglestops" class="collapse show" aria-labelledby="stops">
										<div class="card-body">
											<?php foreach ($dp->result() as $key) { ?>
												<div class="custom-control custom-checkbox">
													<input type="checkbox" id="nonstop" name="stop" class="custom-control-input">
													<label class="custom-control-label" for="nonstop"><?=$key->nama_layanan;?></label>
												</div>
											<?php } ?>
										</div>
									</div>
								</div>
							</aside>
							<div class="col-md-9 mt-4 mt-md-0">
								<div class="bg-light shadow-md rounded py-4">
									<div class="mx-3 mb-3 text-center">
										<h2 class="text-6">Jadwal <small class="mx-2"> Keberangkatan </small>Layanan</h2>
									</div>
									<div class="text-1 bg-light-3 border border-right-0 border-left-0 py-2 px-3">
										<div class="row">
											<div class="col col-sm-2 text-center"><span class="d-none d-sm-block">Nama Layanan</span></div>
											<div class="col col-sm-3 text-center">Tanggal Keberangkatan</div>
											<div class="col-sm-2 text-center d-none d-sm-block">Jumlah Jamaah</div>
											<div class="col col-sm-3 text-center">Status Keberangkatan</div>
											<div class="col col-sm-1 text-right">Action</div>
										</div>
									</div>
									<div class="flight-list">
										<?php foreach ($dp->result() as $key ) { ?>
											<div class="flight-item">
												<div class="row align-items-center flex-row pt-4 pb-2 px-3">
													<div class="col col-sm-2 text-center d-lg-flex company-info"> <span class="align-middle"><img class="img-fluid" alt="" src="images/brands/flights/indigo.png"> </span> <span class="align-middle ml-lg-2"> <span class="d-block text-1 text-dark"><?=$key->nama_layanan;?></span> </span> </div>
													<?php foreach ($jdk->result() as $w ) { ?>
														<div class="col col-sm-2 text-center time-info"> <span class="text-4"><?=$w->bulan_keberangkatan;?></span> </div>
													<?php } ?>
												</div>

											</div>
										<?php } ?>
									</div>
								</div>
							</div>
						</section>
					</div>

					<?php $this->load->view('website/footer');?>
