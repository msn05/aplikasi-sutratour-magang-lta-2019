
<div id="content">
 <div class="container">
  <div class="bg-light shadow-md rounded p-4">
    <?= $this->session->flashdata('message');?>
    
    <div class="row">
      <div class="col-md-3">
       <ul class="nav nav-tabs flex-column" id="myTab" role="tablist">
        <li class="nav-item"> <a class="nav-link active" id="first-tab" data-toggle="tab" href="#firstTab" role="tab" aria-controls="firstTab" aria-selected="true">Data Pribadi</a> </li>
        <li class="nav-item"> <a class="nav-link" id="second-tab" data-toggle="tab" href="#secondTab" role="tab" aria-controls="secondTab" aria-selected="false">Ubah Data Pribadi</a> </li>
        <li class="nav-item"> <a class="nav-link" id="third-tab" data-toggle="tab" href="#thirdTab" role="tab" aria-controls="thirdTab" aria-selected="false">Pembayaran</a></li>
        <li class="nav-item"> <a class="nav-link" id="five-tab" data-toggle="tab" href="#fiveTab" role="tab" aria-controls="fiveTab" aria-selected="false">Keberangkatan</a> </li>
        <li class="nav-item"> <a class="nav-link" id="fourth-tab" data-toggle="tab" href="#fourthTab" role="tab" aria-controls="fourthTab" aria-selected="false">Ganti Password</a> </li>
      </ul>
    </div>
    <div class="col-md-9">
      <div class="tab-content my-3" id="myTabContentVertical">
        <div class="tab-pane fade show active" id="firstTab" role="tabpanel" aria-labelledby="first-tab">
         <div class="row">
          <div class="col-lg-12">
           <h4 class="mb-4">Informasi Data Pribadi</h4>
           <form id="personalInformation" method="post">
            <div class="form-row">
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
         <div class="col-lg-4 mt-2 mt-lg-0 ">
          <div class="card bg-light-3 p-1">
           <p class="mb-1">Foto Anda</p>
           <hr>
           <img src="<?=base_url('uploads/jamaah/').$fotonya;?>" witdh="20px" height="100px">
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
   <input type="text"  readonly="" id="tgl_lahir" class="tanggal form-control" name="tgl_lahir" value="<?=$tgl_lahir;?>" >
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
   <?php foreach ($jadwaln as $row) ;?>
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
   <input type="text" class="total form-control" name="total" id="total" value="<?= rupiah($jumlah_yang_dibayarkan);?>" readonly="">
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
</form>

</div>
<div class="col-lg-4 mt-2 mt-lg-0 ">
 <div class="card bg-light-3 p-1">
  <p class="mb-1">Foto KTP Anda</p>
  <hr>
  <img src="<?=base_url('uploads/jamaah/').$foto_ktp;?>" witdh="20px" height="100px">
</div>
</div>
<div class="col-lg-4 mt-2 mt-lg-0 ">
 <div class="card bg-light-3 p-1">
  <p class="mb-1">Foto KK Anda</p>
  <hr>
  <img src="<?=base_url('uploads/jamaah/').$foto_kk;?>" witdh="20px" height="100px">
</div>
</div>
<div class="col-md-4">
 <div class="form-group">
  <label class="control-label mb-10">Status Dokumen Anda</label>
  <input type="text" class="form-control" value="<?=$pd[$status_dokumen];?>"  readonly="">
</div>
</div>
</div>

</div>
<div class="tab-pane fade" id="secondTab" role="tabpanel" aria-labelledby="second-tab">
 <div class="row">
  <div class="col-lg-12">
   <h4 class="mb-4">Ubah Data Pribadi</h4>
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
</div>
</div>
</div>
</div>
<div class="tab-pane fade" id="thirdTab" role="tabpanel" aria-labelledby="third-tab">
 <h4 class="mb-4">Pembayaran Anda</h4>
 <h6 class="mb-4">Biaya Awal nya Sebesar <?=$jumlah_yang_dibayarkan;?></h6>
 <div class="table-responsive-lg">
  <table class="table table-hover border">
   <tbody>
    <tr>
     <th class="text-center align-middle">Tanggal </th>
     <th class="text-center align-middle">Jumlah Pembayaran</th>
     <th class="text-center align-middle">Sisa Pembayaran</th>
     <th class="text-center align-middle">Keterangan Pembayaran</th>
     <th class="align-middle"> Action</th>
   </tr>
   <?php foreach ($pembayaran->result() as $row ) { ?>
     <tr>
      <td class="text-center align-middle"><?=$row->tgl_pembayaran;?></td>
      <td class="text-center align-middle"><?=rupiah($row->jumlah_uangnya);?></td>
      <td class="text-center align-middle"><?=rupiah($row->sisa);?></td>
      <td class="text-center align-middle"><?=$row->keterangan;?></td>
      <td class="text-center align-middle">
       <a href="<?=base_url().'jamaah/print_bayar/'.$row->idnya;?>" class="btn btn-sm btn-outline-secondary shadow-none ml-1" type="button"  data-original-title="Cetak Pembayaran"><i class="fa fa-print"></i></a></div></td>
     </td>
   </tr>
 <?php } ?>
</tr>
</tbody>
</table>
</div>
</div>
<div class="tab-pane fade" id="fourthTab" role="tabpanel" aria-labelledby="fourth-tab">
  <div class="row">
   <div class="col-lg-8">
    <h4 class="mb-4">Ganti Password</h4>
    <form action="<?=base_url().'jamaah/ganti_password';?>" method="post">
     <div class="form-group">
      <label for="exampleInputpwd_32" class="col-lg-12 control-label">Password Lama</label>
      <div class="col-sm-8">
       <div class="input-group">
        <div class="input-group-addon"><i class="icon-lock"></i></div>
        <input type="password" class="form-control" id="passwordLama" name="passwordLama" placeholder="Password Lama">
      </div>
    </div>
  </div>
  <div class="form-group">
    <label for="exampleInputpwd_32" class="col-lg-12 control-label">Password Baru</label>
    <div class="col-sm-8">
     <div class="input-group">
      <div class="input-group-addon"><i class="icon-lock"></i></div>
      <input type="password" class="form-control" id="passwordBaru" name="passwordBaru" placeholder="Password Baru">
    </div>
  </div>
</div>
<div class="form-group">
  <label for="exampleInputpwd_32" class="col-lg-12 control-label">Konfirmasi Password Baru</label>
  <div class="col-sm-8">
   <div class="input-group">
    <div class="input-group-addon"><i class="icon-lock"></i></div>
    <input type="password" class="form-control" id="Conpasswordbaru" name="Conpasswordbaru" placeholder="Password Lama">
  </div>
</div>
</div>
<button class="btn btn-primary" type="submit">Update Password</button>
</form>
</div>

</div>
</div>
<div class="tab-pane fade" id="fiveTab" role="tabpanel" aria-labelledby="five-tab">
  <h4 class="mb-4">Jadwal Keberangkatan Anda</h4>
  <?php foreach ($jadwaln as $row) ;?>
  <h6 class="mb-4">Nama Layanan yang dipilih  :  <span class="badge badge-success py-1 px-2 font-weight-normal text-1"><?=$row->nama_layanan;?></span>
  </h6>
  <div class="table-responsive-lg">
   <table class="table table-hover border">
    <tbody>
     <tr>
      <th class="text-center align-middle">Nama Layanan </th>
      <th class="text-center align-middle">Tanggal </th>
      <th class="align-middle"> Keterangan</th>
    </tr>
    <tr>
      <?php foreach ($namo as $key) { ?>
        <td class="text-center align-middle"><?=$key->id_keberangkatan;?></td>
        <td class="text-center align-middle"><?=format_indo($key->tgl_keberangkatan);?></td>
        <td class="text-left align-middle"><?=$key->keterangan;?></td>
      <?php } ?>
    </tr>
  </tr>
</tbody>
</table>
</div>
</div>

</div>
</div>
</div>
</div><!-- Content end -->

<?php $this->load->view('website/footer');?>
<script>

 function hitung() {
  var sisa_pembayaran = $(".sisa_pembayaran").val();
  var jumlah_uangnya = $(".jumlah_uangnya").val();
    total = sisa_pembayaran - jumlah_uangnya; //a kali b
    $(".total").val(total);
  }

  $(document).ready(function(){

    $('#jenis_kelamin').val('<?=$jenis_kelamin;?>');
    $('#pekerjaan').val('<?=$pekerjaan;?>');
    $('#paket_yang_dipilih').val('<?=$paket_yang_dipilih;?>');
    $('#pemilihan_bulan_kbr').val('<?=$pemilihan_bulan_kbr;?>');
    $('#status_dokumen').val('<?=$status_dokumen;?>');
    $('#status_pembayaran').val('<?=$status_pembayaran;?>');
    $('#statusnya').val('<?=$statusnya;?>');
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
       $("#secondTab").fadeTo("slow",0.5,function(){
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
