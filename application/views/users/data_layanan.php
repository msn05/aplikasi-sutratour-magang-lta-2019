<?php $this->load->view('users/home');?> <!--Include menu-->
<?php $this->load->view('users/menu');?> <!--Include menu-->

<div class="row heading-bg">
 <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
  <h5 class="txt-dark">Data Layanan Perusahaan</h5>
</div>
<!-- Breadcrumb -->
<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
  <ol class="breadcrumb">
   <li><a href="#">Page</a></li>
   <li><a href="index.html">Data Layanan</a></li>
 </ol>
</div>
<!-- /Breadcrumb -->
</div>
<?= $this->session->flashdata('message');?>
<div class="row">
 <div class="col-sm-12">
  <div class="panel panel-default card-view">
   <div class="panel-heading">
    <div class="pull-left">
     <h6 class="panel-title txt-dark">Data Layanan Saat Ini</h6>
   </div>
   <div class="clearfix"></div>
 </div>
 <?php if($this->session->userdata('akses')==='1') { ?>
   <div class="button-list mt-25">
    <button class="btn btn-success" data-toggle="modal" data-target="#TambahLb"><i class="fa fa-plus"></i> Tambah Layanan Baru</button>
  </div>
<?php } ?>
<hr>
<div class="clearfix"></div>
<div class="panel-wrapper collapse in">
  <div class="panel-body">
   <div class="table-wrap">
    <div class="table-responsive">
     <table id="layanan" class="table table-hover display  pb-30" >
      <thead>
       <tr>
        <th>Kode Layanan</th>
        <th>Nama Layanan</th>
        <th>Berlaku Dari</th>
        <th>Lama Perjalanan</th>
        <th>Biaya</th>
        <th>Action</th>
      </tr>
    </thead>
  </table>
</div>
</div>
</div>
</div>
</div>	
</div>
<!-- tambah jabatan -->


<form id="add-row-form" action="<?php echo base_url().'page/hapusLay'?>" method="post">
  <div class="modal fade" id="ModalHapus" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
   <div class="modal-dialog">
    <div class="modal-content">
     <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <h4 class="modal-title" id="myModalLabel">Hapus Data Layanan</h4>
    </div>
    <div class="modal-body">
      <input type="hidden" name="id" class="form-control"  required>
      <strong>Anda yakin mau menghapus layanan ini ?</strong>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      <button type="submit" id="add-row" class="btn btn-success">Hapus</button>
    </div>
  </div>
</div>
</div>
</form>

<form id="add-row-form" action="<?php echo base_url().'page/TambahLb'?>" method="post">
  <div class="modal fade" id="TambahLb" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
   <div class="modal-dialog">
    <div class="modal-content">
     <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <h4 class="modal-title" id="myModalLabel">Tambah Layanan Baru</h4>
    </div>
    <div class="modal-body">
      <div class="modal-body">
       <div class="form-group">
        <label class="control-label mb-10">Kode Layanan</label>
        <input type="text" name="kode_layana" id="kode_layana" value="<?=$kode_layanannya;?>" class="form-control">
      </div> 
      <div class="form-group">
        <label class="control-label mb-10">Nama Layanan</label>
        <input type="text" name="nama_layanan" id="nama_layanan" class="form-control">
      </div> 
      <div class="form-group">
        <label class="control-label mb-10">Berlaku Sejak</label>
        <input type="text" name="berlaku_dari" id="berlaku_dari" class="tanggal form-control" autocomplete="off">

      </div>
      <div class="form-group">
        <label class="control-label mb-10">Transportasi Udaranya</label>
        <select id="tu" name="tu" class="form-control">
         <option value="0" selected disabled>Pilih Transportasinya</option>
         <?php foreach ($TU->result() as $row) :?>
          <option value="<?php echo $row->id_tu;?>"><?php echo $row->nama_tunya;?></option>
        <?php endforeach ;?>
      </select>
    </div> 
    <div class="form-group">
      <label class="control-label mb-10">Transportasi Daratnya</label>
      <select id="td" name="td" class="form-control">
       <option value="0" selected disabled>Pilih Transportasinya</option>
       <?php foreach ($TD->result() as $row) :?>
        <option value="<?php echo $row->id_td;?>"><?php echo $row->nama_tdnya;?></option>
      <?php endforeach ;?>
    </select>
  </div>
  <div class="form-group">
    <label class="control-label mb-10">Tempat Menginap</label>
    <input cols="20" class="form-control" name="tempat_menginapnya" id="tempat_menginapnya">
  </div>
  <div class="form-group">
    <label class="control-label mb-10">Lama Perjalanan</label>
    <input type="text" name="lama_perjalanan" id="lama_perjalanan" class="form-control">
  </div> 

  <div class="form-group">
    <label class="control-label mb-10">Biaya Layanan</label>
    <input type="number" name="biaya" id="biaya" class="form-control">
  </div> 
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


</div>
<form id="add-row-form" action="#" method="post">
 <div class="modal fade" id="ModalDetail" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
   <div class="modal-content">
    <div class="modal-header">
     <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
     <h4 class="modal-title" id="myModalLabel">Detail Data Layanan</h4>
   </div>
   <div class="modal-body">
     <div class="modal-body">
      <div class="form-group">
       <label class="control-label mb-10">Kode Layanan</label>
       <input type="hidden" name="id" id="id">
       <input type="text" name="kode_layana" id="kode_layana" class="form-control"  readonly="">
     </div>
     <div class="form-group">
       <label for="message-text" class="control-label mb-10">Nama Layanan</label>
       <input type="text" name="nama_layanan" id="nama_layanan" class="form-control" readonly="">
     </div>
     <div class="form-group">
       <label for="message-text" class="control-label mb-10">Berlaku Dari</label>
       <input type="text" class="tanggal form-control" name="berlaku_dari" id="berlaku_dari" autocomplete="off" readonly="">
     </div>

     <div class="form-group">
       <label class="control-label mb-10">Transportasi Udaranya</label>
       <select class="form-control" id="nama_tunya" name="nama_tunya">
        <?php foreach ($TU->result() as $row) :?>
         <option value="<?php echo $row->id_tu;?>"><?php echo $row->nama_tunya;?></option>
       <?php endforeach ;?>
     </select>
   </div>
   <div class="form-group">
     <label class="control-label mb-10">Transportasi Daratnya</label>
     <select class="form-control" id="nama_tdnya" name="nama_tdnya">
      <?php foreach ($TD->result() as $row) :?>
       <option value="<?php echo $row->id_td;?>"><?php echo $row->nama_tdnya;?></option>
     <?php endforeach ;?>
   </select>
 </div>
 <div class="form-group">
   <label class="control-label mb-10">Tempat Menginap</label>
   <input type="text" name="tempat_menginapnya" id="tempat_menginapnya" class="form-control" readonly="">
 </div>
 <div class="form-group">
   <label class="control-label mb-10">Lama Perjalanan</label>
   <input type="text" name="lama_perjalanan" id="lama_perjalanan" class="form-control" readonly="">
 </div> 

 <div class="form-group">
   <label class="control-label mb-10">Biaya Layanan</label>
   <input type="text" name="biaya" id="biaya" class="form-control" readonly="">
 </div> 
</div>
</div>
</div>
</div>
</div>
</form>

<form id="add-row-form" action="<?=base_url().'page/UpdateLay';?>" method="post">
 <div class="modal fade" id="ModalUpdate" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
   <div class="modal-content">
    <div class="modal-header">
     <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
     <h4 class="modal-title" id="myModalLabel">Ubah Data Layanan</h4>
   </div>
   <div class="modal-body">
     <div class="modal-body">
      <div class="form-group">
       <label class="control-label mb-10">Kode Layanan</label>
       <input type="hidden" name="id" id="id">
       <input type="text" name="kode_layana" id="kode_layana" class="form-control"  readonly="">
     </div>
     <div class="form-group">
       <label for="message-text" class="control-label mb-10">Nama Layanan</label>
       <input type="text" name="nama_layanan" id="nama_layanan" class="form-control" >
     </div>
     <div class="form-group">
       <label for="message-text" class="control-label mb-10">Berlaku Dari</label>
       <input type="text" class="tanggal form-control" name="berlaku_dari" id="berlaku_dari" autocomplete="off" >
     </div>
     <div class="form-group">
       <label class="control-label mb-10">Transportasi Udaranya</label>
       <select class="form-control" id="nama_tunya" name="nama_tunya">
        <?php foreach ($TU->result() as $row) :?>
         <option value="<?php echo $row->id_tu;?>"><?php echo $row->nama_tunya;?></option>
       <?php endforeach ;?>
     </select>
   </div>
   <div class="form-group">
     <label class="control-label mb-10">Transportasi Daratnya</label>
     <select class="form-control" id="nama_tdnya" name="nama_tdnya">
      <?php foreach ($TD->result() as $row) :?>
       <option value="<?php echo $row->id_td;?>"><?php echo $row->nama_tdnya;?></option>
     <?php endforeach ;?>
   </select>
 </div>
 <div class="form-group">
   <label class="control-label mb-10">Tempat Menginap</label>
   <input type="text" name="tempat_menginapnya" id="tempat_menginapnya" class="form-control">
 </div>
 <div class="form-group">
   <label class="control-label mb-10">Lama Perjalanan</label>
   <input type="text" name="lama_perjalanan" id="lama_perjalanan" class="form-control" >
 </div> 

 <div class="form-group">
   <label class="control-label mb-10">Biaya Layanan</label>
   <input type="text" name="biaya" id="biaya" class="form-control">
 </div> 
 <div class="modal-footer">
   <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
   <button type="submit" id="add-row" class="btn btn-success">Update</button>
 </div>
</div>
</div>
</div>
</div>
</div>
</form>
<?php $this->load->view('users/footer');?> <!--Include menu-->

<script>
 $(document).ready(function(){
  $.fn.dataTableExt.oApi.fnPagingInfo = function(oSettings)
  {
   return {
    "iStart": oSettings._iDisplayStart,
    "iEnd": oSettings.fnDisplayEnd(),
    "iLength": oSettings._iDisplayLength,
    "iTotal": oSettings.fnRecordsTotal(),
    "iFilteredTotal": oSettings.fnRecordsDisplay(),
    "iPage": Math.ceil(oSettings._iDisplayStart / oSettings._iDisplayLength),
    "iTotalPages": Math.ceil(oSettings.fnRecordsDisplay() / oSettings._iDisplayLength)
  };
};

var table = $("#layanan").dataTable({
 initComplete: function() {
  var api = this.api();
  $('#layanan_filter input')
  .off('.DT')
  .on('input.DT', function() {
   api.search(this.value).draw();
 });
},
oLanguage: {
  sProcessing: "loading..."
},
processing: true,
serverSide: true,
ajax: {"url": "<?php echo base_url().'index.php/page/get_layanan_json'?>", "type": "POST"},
columns: [
{"data": "kode_layana"},
{"data": "nama_layanan"},
{"data": "berlaku_dari"},
{"data": "lama_perjalanan"},
{"data": "biaya","render": $.fn.dataTable.render.number( ',', '.', 2, 'Rp ' )},
{"data": "view"}
],
order: [[1, 'asc']],
rowCallback: function(row, data, iDisplayIndex) {
  var info = this.fnPagingInfo();
  var page = info.iPage;
  var length = info.iLength;
  $('td:eq(0)', row).html();
}
});

$('#layanan').on('click','.DetailLay',function(){
 var kode=$(this).data('kode');
 var kode_layana=$(this).data('kode_layana');
 var nama_layanan=$(this).data('nama_layanan');
 var berlaku_dari=$(this).data('berlaku_dari');
 var nama_tunya=$(this).data('nama_tunya');
 var nama_tdnya=$(this).data('nama_tdnya');
 var tempat_menginapnya=$(this).data('tempat_menginapnya');
 var lama_perjalanan=$(this).data('lama_perjalanan');
 var biaya=$(this).data('biaya');
 $('#ModalDetail').modal('show');
 $('[name="id"]').val(kode);
 $('[name="kode_layana"]').val(kode_layana);
 $('[name="nama_layanan"]').val(nama_layanan);
 $('[name="berlaku_dari"]').val(berlaku_dari);
 $('[name="nama_tunya"]').val(nama_tunya);
 $('[name="nama_tdnya"]').val(nama_tdnya);
 $('[name="tempat_menginapnya"]').val(tempat_menginapnya);
 $('[name="lama_perjalanan"]').val(lama_perjalanan);
 $('[name="biaya"]').val(biaya);
});

$('#layanan').on('click','.EditLay',function(){
 var kode=$(this).data('kode');
 var kode_layana=$(this).data('kode_layana');
 var nama_layanan=$(this).data('nama_layanan');
 var berlaku_dari=$(this).data('berlaku_dari');
 var nama_tunya=$(this).data('nama_tunya');
 var nama_tdnya=$(this).data('nama_tdnya');
 var tempat_menginapnya=$(this).data('tempat_menginapnya');
 var lama_perjalanan=$(this).data('lama_perjalanan');
 var biaya=$(this).data('biaya');
 $('#ModalUpdate').modal('show');
 $('[name="id"]').val(kode);
 $('[name="kode_layana"]').val(kode_layana);
 $('[name="nama_layanan"]').val(nama_layanan);
 $('[name="berlaku_dari"]').val(berlaku_dari);
 $('[name="nama_tunya"]').val(nama_tunya);
 $('[name="nama_tdnya"]').val(nama_tdnya);
 $('[name="tempat_menginapnya"]').val(tempat_menginapnya);
 $('[name="lama_perjalanan"]').val(lama_perjalanan);
 $('[name="biaya"]').val(biaya);
});

$('#layanan').on('click','.HapusLay',function(){
 var kode=$(this).data('kode');
 $('#ModalHapus').modal('show');
 $('[name="id"]').val(kode);
});  

});
</script>