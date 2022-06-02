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
	 							<li role="presentation" class=""><a  data-toggle="tab" id="dokumen_tab_8" role="tab" href="#dokumen" aria-expanded="false"><span>Dokumen Asli</span></a></li>
	 							<li role="presentation" class=""><a  data-toggle="tab" id="password_tab_8" role="tab" href="#layanan" aria-expanded="false"><span>Pembayarannya</span></a></li>
	 							<li role="presentation" class=""><a  data-toggle="tab" id="d_tab_8" role="tab" href="#d" aria-expanded="false"><span>Histori Pembayaran</span></a></li>

	 							<li role="presentation" class=""><a  data-toggle="tab" id="rp_tab_8" role="tab" href="#rp" aria-expanded="false"><span>Reset Password</span></a></li>
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
	 													<input type="text" id="nama_jamaah" name="nama_jamaah" class="form-control" value="<?=$nama_jamaah;?>" >
	 												</div>
	 											</div>
	 											<div class="col-md-4">
	 												<div class="form-group">
	 													<label class="control-label mb-10">Nomor Passport</label>
	 													<input type="text" id="no_passport" name="no_passport" class="form-control" value="<?=$no_passport;?>" >
	 												</div>
	 											</div>	
	 											<div class="col-md-4">
	 												<div class="form-group">
	 													<label class="control-label mb-10">Email</label>
	 													<input type="text" id="email" name="email" class="form-control" value="<?=$email;?>" >
	 												</div>
	 											</div>	
	 											<div class="col-md-4">
	 												<div class="form-group">
	 													<label class="control-label mb-10">No Kartu Tanda Penduduk</label>
	 													<input type="text" id="no_ktp" name="no_ktp" class="form-control" value="<?=$no_ktp?>" >
	 												</div>
	 											</div>
	 											<div class="col-md-4">
	 												<div class="form-group">
	 													<label class="control-label mb-10">No Kartu Keluarga</label>
	 													<input type="text" id="no_kk" name="no_kk" class="form-control" value="<?=$no_ktp?>" >
	 												</div>
	 											</div>
	 											<!--/span-->
	 											<div class="col-md-4">
	 												<div class="form-group">
	 													<label class="control-label mb-10">Alamat</label>
	 													<textarea name="alamat" id="alamat" rows="5" cols="30" class="form-control" value=""><?=$alamat; ?></textarea>
	 												</div>
	 											</div>
	 											<div class="col-md-4">
	 												<div class="form-group">
	 													<label class="control-label mb-10">Tanggal Lahir</label>
	 													<input type="text" id="tgl_lahir" class="tanggal form-control" name="tgl_lahir" value="<?=$tgl_lahir?>" >
	 												</div>
	 											</div>
	 											<div class="col-md-4">
	 												<div class="form-group">
	 													<label class="control-label mb-10">Nomor Telephone</label>
	 													<input type="text" name="no_telephone" id="no_telephone" class="form-control" value="<?=$no_telephone;?>" >
	 												</div>
	 											</div>
	 											<div class="col-md-4">
	 												<div class="form-group">
	 													<label class="control-label mb-10">Jenis Kelamin</label>
	 													<select class="form-control" name="jenis_kelamin" id="jenis_kelamin">
	 														<option value="0" disabled="">Pilih Jenis Kelamin</option>
	 														<option value="1">Laki - Laki</option>
	 														<option value="2">Perempuan</option>
	 													</select>
	 												</div>
	 											</div>
	 											<div class="col-md-4">
	 												<div class="form-group">
	 													<label class="control-label mb-10">Pekerjaan</label>
	 													<select class="form-control" name="pekerjaan" id="pekerjaan">
	 														<option value="0" disabled="">Pilih Jenis Pekerjaan</option>
	 														<option value="1">PNS</option>
	 														<option value="2">Swasta</option>
	 														<option value="3">Wiraswasta</option>
	 													</select>
	 												</div>
	 											</div>
	 											<div class="col-md-4">
	 												<div class="form-group">
	 													<label class="control-label mb-10">Layanan</label>
	 													<select class="form-control" name="paket_yang_dipilih" id="paket_yang_dipilih">
	 														<option value="0" disabled="">Pilih Jenis Layanan</option>
	 														<?php foreach ($nl->result() as $row) :?>
	 															<option value="<?php echo $row->id;?>"<?=$row->id ==  $paket_yang_dipilih ? 'selected' : null;?>><?php echo $row->nama_layanan;?></option>
	 														<?php endforeach ;?>
	 													</select>
	 												</div>
	 											</div>
	 											<div class="col-md-4">
	 												<div class="form-group">
	 													<label class="control-label mb-10">Pemilihan bulan Keberangkatan</label>
	 													<select class="pemilihan_bulan_kbr form-control" name="pemilihan_bulan_kbr" id="pemilihan_bulan_kbr">
	 														<option value="0" disabled="">Pilih Jenis Layanan</option>
	 														<?php foreach ($jadwal->result() as $row) :?>
	 															<option value="<?php echo $row->kode_jadwal_keberangkatan;?>"<?=$row->kode_jadwal_keberangkatan ==  $pemilihan_bulan_kbr ? 'selected' : null;?>><?php echo $row->bulan_keberangkatan;?></option>
	 														<?php endforeach ;?>
	 													</select>
	 												</div>
	 											</div>
	 											
	 											<div class="col-md-4">
	 												<div class="form-group">
	 													<label class="control-label mb-10">Harga</label>
	 													<input type="text" class="total form-control" name="total" id="total" value="<?=$jumlah_yang_dibayarkan;?>"  readonly="">
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
	 											
	 										</div>
	 										<div class="modal-footer">
	 											<button type="submit" class="btn btn-primary" onclick="edit(<?=$id_daftar;?>)">Simpan</button>
	 											<a type="button" class="btn btn-success" href="<?=base_url().'jamaah';?>" title="kembali ke halaman data jamaah" >Kembali</a>
	 											<!-- <a type="button" class="btn btn-success" target="_blank" href="<?=base_url().'jamaah/print';?>" title="cetak data jamaah" >Print</a> -->
	 										</div>
	 									</div>
	 								</div>
	 							</div>
	 							<div  id="dokumen" class="tab-pane fade" role="tabpanel">
	 								<?=form_open_multipart('jamaah/gantiFotoJamaah');?>
	 								<div class="col-md-12">
	 									<div class="pt-20">
	 										<div class="row">
	 											<div class="col-sm-3">
	 												<div class="form-group">
	 													<label  class="control-label mb-10">Foto KK Jamaah Asli </label>
	 													<input type="hidden" name="id_daftar" id="id_daftar" value="<?=$id_daftar;?>">
	 													<img src="<?=base_url().'uploads/jamaah/'.$foto_kk;?>" class="img-rounded" alt="Cinque Terre" width="200" height="180">
	 													<!-- <div class="fileupload btn btn-default"> -->
	 														<input class="upload" type="file" name="foto_kk" id="foto_kk">
	 													</div> 
	 												</div>
	 												<div class="col-sm-3">
	 													<div class="form-group">
	 														<label  class="control-label mb-10">Foto KTP Jamaah Asli </label>
	 														<img src="<?=base_url().'uploads/jamaah/'.$foto_ktp;?>" class="img-rounded" alt="Cinque Terre" width="200" height="180">
	 														<!-- <div class="fileupload btn btn-default"> -->
	 															<input class="upload " type="file" name="foto_ktp" id="foto_ktp">
	 														</div> 
	 													</div>
	 													<div class="col-sm-3">
	 														<div class="form-group">
	 															<label  class="control-label mb-10">Foto Jamaah Asli </label>
	 															<img src="<?=base_url().'uploads/jamaah/'.$fotonya;?>" class="img-rounded" alt="Cinque Terre" width="200" height="180">
	 															<!-- <div class="fileupload btn btn-default"> -->
	 																<input class="upload " type="file" name="fotonya" id="fotonya">
	 															</div> 
	 														</div>
	 														<div class="col-md-3">
	 															<div class="form-group">
	 																<label class="control-label mb-10">Status Dokumen</label>
	 																<select class="form-control" name="status_dokumen" id="status_dokumen">
	 																	<option value="0">Pilih Statusnya</option>
	 																	<option value="2">Verifikasi</option>
	 																	<option value="1">Jangan Dulu</option>
	 																</select>
	 															</div>
	 														</div>
	 													</div>
	 													<div class="modal-footer">
	 														<button type="submit" class="btn btn-primary">Simpan</button>
	 													</div>
	 												</div>
	 											</div>
	 										</form>
	 									</div>

	 									<div  id="layanan" class="tab-pane fade" role="tabpanel">
	 										<div class="col-md-12">
	 											<div class="pt-20">
	 												<div class="row">
	 													<div class="col-md-4">
	 														<div class="form-group">
	 															<label class="control-label mb-10">Kode Pembayaran</label>
	 															<input type="text" class="form-control" name="kode_pembayaran" id="kode_pembayaran" value="<?=$kode_pembayaran;?>"  readonly="">
	 														</div>
	 													</div>
	 													<div class="col-md-4">
	 														<div class="form-group">
	 															<label class="control-label mb-10">Status Pembayaran</label>
	 															<select class="form-control" name="status_pembayaran" id="status_pembayaran">
	 																<option value="" selected disabled>Pilih Jenis Pembayaran</option>
	 																<option value="0">Belum Diketahui</option>
	 																<option value="1">CICIL</option>
	 																<option value="2">CASH</option>
	 															</select>	 														
	 														</div>
	 													</div>

	 													<div class="col-md-4">
	 														<div class="form-group">
	 															<label class="control-label mb-10">Harga Layanan</label>
	 															<input type="text" class="form-control" name="jumlah_yang_dibayarkan" id="jumlah_yang_dibayarkan" value="<?=$jumlah_yang_dibayarkan;?>"  readonly="">
	 														</div>
	 													</div>
	 													<div class="col-md-4">
	 														<div class="form-group">
	 															<label class="control-label mb-10">Jumlah Yang Harus Dibayarkan</label>
	 															<input type="text" class="sisa_pembayaran form-control" name="sisa_pembayaran" onkeyup="hitung();" id="sisa_pembayaran" value="<?=$sisa_pembayaran;?>" readonly="">
	 														</div>
	 													</div>
	 													<div class="col-md-4">
	 														<div class="form-group">
	 															<label class="control-label mb-10">Jumlah Uangnya</label>
	 															<input type="text" class="jumlah_uangnya form-control" name="jumlah_uangnya" onkeyup="hitung();" id="jumlah_uangnya"  value=""  placeholder="Masukkan Jumlah Uangnya">
	 														</div>
	 													</div>
	 													<div class="col-md-4">
	 														<div class="form-group">
	 															<label class="control-label mb-10">Total Pembayaran</label>
	 															<input type="text" class="total form-control" name="total" id="total"  value=""readonly="">
	 														</div>
	 													</div>
	 													<div class="col-md-4">
	 														<div class="form-group">
	 															<label class="control-label mb-10">Status</label>
	 															<select class="form-control" name="statusnya" id="statusnya">
	 																<option value="" selected disabled>Pilih</option>
	 																<option value="0">Belum Diketahui</option>
	 																<option value="1">Lunas</option>
	 																<option value="2">Belum</option>
	 															</select>	 														
	 														</div>
	 													</div>
	 													<div class="col-md-12">
	 														<div class="form-group">
	 															<label class="control-label mb-10">Keterangan</label>
	 															<textarea class="form-control" name="keterangan" id="keterangan"></textarea>
	 														</div>
	 													</div>
	 												</div>
	 											</div>
	 											<?php if ($statusnya != '1'){ ?>
	 												<div class="modal-footer">
	 													<button type="submit" class="btn btn-primary" onclick="bayarkah(<?=$id_daftar;?>)">Bayar</button>
	 												</div>
	 											<?php }else{ ?>
	 												<div class="modal-footer">
	 													<label class="btn btn-success" >Sudah Lunas Dio nyo</label>
	 												</div>
	 											<?php } ?>  
	 										</div>
	 									</div>

	 									<div  id="d" class="tab-pane fade" role="tabpanel">

	 										<div class="col-md-12">
	 											<div class="pt-20">
	 												<div class="row">
	 													<div class="col-sm-12">
	 														<div class="panel panel-default ">
	 															<div class="panel-wrapper collapse in">
	 																<div class="panel-body">
	 																	<div class="table-wrap">
	 																		<div class="table-responsive">
	 																			<table id="" class="table  display table-hover mb-30">
	 																				<thead>
	 																					<tr>
	 																						<th>#</th>
	 																						<th>Tanggal Pembayaran</th>
	 																						<th>Jumlah Pembayaran</th>
	 																						<th>Sisa Pembayaran</th>
	 																						<th>Keterangan Pembayaran</th>
	 																						<th>Action</th>
	 																					</tr>
	 																				</thead>

	 																				<tbody>
	 																					<?php foreach ($pembayaran->result() as $row ) { ?>
	 																						<tr>
	 																							<td class="text-center align-middle">#</td>
	 																							<td class="text-center align-middle"><?=$row->tgl_pembayaran;?></td>
	 																							<td class="text-center align-middle"><?=rupiah($row->jumlah_uangnya);?></td>
	 																							<td class="text-center align-middle"><?=rupiah($row->sisa);?></td>
	 																							<td class="text-center align-middle"><?=$row->keterangan;?></td>
	 																							<td class="text-center align-middle">
	 																								<a href="<?=base_url().'jamaah/print_bayar/'.$row->idnya;?>" class="btn btn-sm btn-success" type="button"  data-original-title="Cetak Pembayaran"><i class="fa fa-print"></i></a></td>
	 																							</tr>
	 																						<?php } ?>

	 																					</tbody>
	 																				</table>
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

	 										<div  id="rp" class="tab-pane fade" role="tabpanel">
	 											<div class="col-md-12">
	 												<div class="pt-20">
	 													<div class="row">
	 														<div class="col-md-4">
	 															<div class="form-group">
	 																<label class="control-label mb-10">Email Jamaah</label>
	 																<input type="text" id="email" name="email" class="form-control" value="<?=$email;?>" readonly />
	 															</div>
	 														</div>
	 														<div class="col-md-4">
	 															<div class="form-group">
	 																<label class="control-label mb-10">Nama Jamaah</label>
	 																<input type="text" id="nama" name="nama" class="form-control" value="<?=$nama_jamaah;?>" readonly />
	 															</div>
	 														</div>
	 														<div class="col-md-4">
	 															<div class="form-group">
	 																<label class="control-label mb-10">Nomor KTP</label>
	 																<input type="text" id="no_ktp" name="no_ktp" class="form-control" value="<?=$no_ktp;?>" readonly />
	 															</div>
	 														</div>
	 													</div>
	 													<div class="modal-footer">
	 														<button type="submit" class="btn btn-primary" onclick="reset(<?=$id_daftar;?>)">Reset Password</button>
	 														<a type="button" class="btn btn-success" href="<?=base_url().'jamaah';?>" title="kembali ke halaman data jamaah" >Kembali</a>
	 														<!-- <a type="button" class="btn btn-success" target="_blank" href="<?=base_url().'jamaah/print';?>" title="cetak data jamaah" >Print</a> -->
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

	 				function hitung() {
	 					var sisa_pembayaran = $(".sisa_pembayaran").val();
	 					var jumlah_uangnya = $(".jumlah_uangnya").val();
    total = sisa_pembayaran - jumlah_uangnya; //a kali b
    $(".total").val(total);
   }

   $(document).ready(function(){


   	$('#paket_yang_dipilih').change(function(){
   		var id=$(this).val();
   		$.ajax({
   			url : "<?php echo base_url();?>index.php/jamaah/harga_layanan",
   			method : "POST",
   			data : {id: id},
   			async : false,
   			dataType : 'json',
   			success: function(data){
   				var html = '';
   				for(i=0; i<data.length; i++){
   					html += data[i].biaya;
   				}
   				$('.total').val(html);

   			}
   		});
   	});


   });

   $('#paket_yang_dipilih').change(function(){
   	var id=$(this).val();
   	$.ajax({
   		url : "<?php echo base_url();?>jamaah/bulan",
   		method : "POST",
   		data : {id: id},
   		async : false,
   		dataType : 'json',
   		success: function(data){
   			var html = '';
   			var i;
   			for(i=0; i<data.length; i++){
   				html += '<option value='+data[i].kode_jadwal_keberangkatan+' class=>'+data[i].bulan_keberangkatan+'</option>';
   			}
   			$('.pemilihan_bulan_kbr').html(html);

   		}
   	});
   });



   $('#jenis_kelamin').val('<?=$jenis_kelamin;?>');
   $('#pekerjaan').val('<?=$pekerjaan;?>');
   $('#paket_yang_dipilih').val('<?=$paket_yang_dipilih;?>');
   $('#pemilihan_bulan_kbr').val('<?=$pemilihan_bulan_kbr;?>');
   $('#status_dokumen').val('<?=$status_dokumen;?>');
   $('#status_pembayaran').val('<?=$status_pembayaran;?>');
   $('#statusnya').val('<?=$statusnya;?>');



   function edit(id_daftar)
   {
   	swal({
   		title: 'Apakah Yakin Ingin Merubah Datanya?',
   		type: 'warning',
   		showCancelButton: true,
   		cancelButtonColor: '#d33',
   		confirmButtonText: 'Ya',
   		closeOnConfirm : false
   	},
   	function(){
   		var no_passport   = $('#no_passport').val();
   		var nama_jamaah   = $('#nama_jamaah').val();
   		var email   = $('#email').val();
   		var no_ktp   = $('#no_ktp').val();
   		var no_kk   = $('#no_kk').val();
   		var alamat   = $('#alamat').val();
   		var tgl_lahir   = $('#tgl_lahir').val();
   		var no_telephone   = $('#no_telephone').val();
   		var jenis_kelamin   = $('#jenis_kelamin').val();
   		var pekerjaan   = $('#pekerjaan').val();
   		var pemilihan_bulan_kbr   = $('#pemilihan_bulan_kbr').val();
   		var paket_yang_dipilih   = $('#paket_yang_dipilih').val();
   		var total   = $('#total').val();
   		$.ajax({
   			url : "<?php echo base_url().'jamaah/ubahdata';?>",
   			type : "post",
   			data : {
   				id_daftar:id_daftar,nama_jamaah:nama_jamaah,email:email,no_ktp:no_ktp,no_kk:no_kk,no_passport:no_passport,alamat:alamat,tgl_lahir:tgl_lahir,no_telephone:no_telephone,jenis_kelamin:jenis_kelamin,pekerjaan:pekerjaan,pemilihan_bulan_kbr:pemilihan_bulan_kbr,paket_yang_dipilih:paket_yang_dipilih,total:total
   			},
   			success : function(){
   				swal('Data Berhasil Diubah','success');
   				$("#oke").fadeTo("slow",0.5,function(){
   					location.reload();
   				});
   			},
   			error:function(){
   				swal('Data gagal diubah','error');
   			}

   		});
   	});
   }

   function reset(id_daftar)
   {
   	swal({
   		title: 'Apakah Yakin Ingin Mereset Passwordnya..?',
   		type: 'warning',
   		showCancelButton: true,
   		cancelButtonColor: '#d33',
   		confirmButtonText: 'Ya',
   		closeOnConfirm : false
   	},
   	function(){
   		var email   = $('#email').val();
   		var password   = $('#password').val();
   		$.ajax({
   			url : "<?php echo base_url().'jamaah/reset';?>",
   			type : "post",
   			data : {
   				id_daftar:id_daftar,email:email,password:password
   			},
   			success : function(){
   				swal('Data Berhasil Diubah','success');
   				$("#oke").fadeTo("slow",0.5,function(){
   					location.reload();
   				});
   			},
   			error:function(){
   				swal('Data gagal diubah','error');
   			}

   		});
   	});
   }


   function bayarkah(id_daftar)
   {
   	swal({
   		title: 'Apakah Sudah Di Cek Uangnya?',
   		type: 'warning',
   		showCancelButton: true,
   		cancelButtonColor: '#d33',
   		confirmButtonText: 'Ya',
   		closeOnConfirm : false
   	},
   	function(){
   		var kode_pembayaran   = $('#kode_pembayaran').val();
   		var status_pembayaran   = $('#status_pembayaran').val();
   		var jumlah_uangnya   = $('#jumlah_uangnya').val();
   		var total   = $('#total').val();
   		var keterangan   = $('#keterangan').val();
   		var statusnya   = $('#statusnya').val();
   		$.ajax({
   			url : "<?php echo base_url().'jamaah/bayarnah';?>",
   			type : "post",
   			data : {
   				id_daftar:id_daftar,kode_pembayaran:kode_pembayaran,jumlah_uangnya:jumlah_uangnya,total:total,keterangan:keterangan,status_pembayaran:status_pembayaran,statusnya:statusnya},
   				success : function(){
   					swal('Data Berhasil Disimpan','success');
   					$("#oke").fadeTo("slow",0.5,function(){
   						location.reload();
   					});
   				},
   				error:function(){
   					swal('Gagal Melakukan Pembayaran','error');
   				}

   			});
   	});
   }


  </script>

