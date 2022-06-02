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
     <h6 class="panel-title txt-dark">Data Promo Saat Ini</h6>
   </div>
   <div class="clearfix"></div>
 </div>
 <div class="button-list mt-25">
  <?php if($this->session->userdata('akses')==='1') { ?>
    <a href="<?=base_url().'page/tambahpro';?>"><button class="icon-plus btn btn-success"> Tambah Promo Baru</button></a>
  <?php } ?>
</div>
<hr>
<div class="clearfix"></div>
<div class="panel-wrapper collapse in">
  <div class="panel-body">
   <div class="table-wrap">
    <div class="table-responsive">
     <table id="data_promo" class="table table-hover display  pb-30" >
      <thead>
       <tr>
        <th>Kode Promo</th>
        <th>Nama Promo</th>
        <th>Tanggal Post</th>
        <th>Batas Promo</th>
        <th>Nama</th>
        <th>Nama Layanan</th>
        <th>Status</th>
        <?php if($this->session->userdata('akses')==='1') { ?>

          <th>Action</th>
        <?php }?>
      </tr>
    </thead>
  </table>
</div>
</div>
</div>
</div>
</div>	
</div>

<form id="add-row-form" action="<?php echo base_url().'page/UpdatePro'?>" method="post">
  <div class="modal fade" id="ModalUpdate" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
   <div class="modal-dialog">
    <div class="modal-content">
     <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <h4 class="modal-title" id="myModalLabel">Ubah Data Promo</h4>
    </div>
    <div class="modal-body">
      <div class="modal-body">
       <div class="form-group">
        <label class="control-label mb-10">Kode Promo</label>
        <input type="hidden" name="id_promo" id="id_promo">
        <input type="text" name="kode_promo" id="kode_promo" class="form-control" readonly="">
      </div> 
      <div class="form-group">
        <label class="control-label mb-10">Batas Promo</label>
        <input type="text" name="batas_promo" id="batas_promo" class="tanggal form-control">
      </div>
      <div class="form-group">
        <label class="control-label mb-10">Transportasi Daratnya</label>
        <select class="form-control" id="nama_tdnya" name="nama_tdnya">
         <?php foreach ($dp->result() as $row) :?>
          <option value="<?php echo $row->id;?>"><?php echo $row->nama_layanan;?></option>
        <?php endforeach ;?>
      </select>
    </div>
    <div class="form-group">
      <label for="message-text" class="control-label mb-10">Status Promo</label>
      <select class="form-control required" id="status_promo" name="status_promo">
       <option value="0" selected disabled >Pilih Status</option>
       <option value="1">Tersedia</option>
       <option value="2">Habis</option>
     </select>
     <?=form_error('status_promo','<small  class="text-danger pl-2">','</small>')?>
   </div> 

 </div>
</div>
<div class="modal-footer">
  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
  <button type="submit" id="add-row" class="btn btn-success">Update</button>
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

 var table = $("#data_promo").dataTable({
  initComplete: function() {
   var api = this.api();
   $('#data_kuota_filter input')
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
 ajax: {"url": "<?php echo base_url().'index.php/page/get_promo_json'?>", "type": "POST"},
 columns: [

 {"data": "kode_promo"},
 {"data": "nama_promo"},
 {"data": "tgl_post_promo"},
 {"data": "batas_promo"},
 {"data": "nama"},
 {"data": "nama_layanan"},
 {"data": "status_promo",
 "render": function (data, type, row )
 {  
   return row.status_promo == 1 ? 'Tersedia' : 'Habis';
 }},
 <?php if($this->session->userdata('akses')==='1') { ?>

   {"data":"view",
   "render":function(data,type,row){
     return row.status_promo == 2 ? "" : row.view;
   }}
 <?php } ?>
 ],
 order: [[1, 'asc']],
 rowCallback: function(row, data, iDisplayIndex) {
   var info = this.fnPagingInfo();
   var page = info.iPage;
   var length = info.iLength;
   $('td:eq(0)', row).html();
 }

});

 $('#data_promo').on('click','.editPro',function(){
  var kode=$(this).data('kode');
  var kode_promo  =$(this).data('kode_promo');
  var batas_promo =$(this).data('batas_promo');
  var nama_layanan    =$(this).data('nama_layanan');
  var status_promo=$(this).data('status_promo');
  $('#ModalUpdate').modal('show');
  $('[name="id_promo"]').val(kode);
  $('[name="kode_promo"]').val(kode_promo);
  $('[name="batas_promo"]').val(batas_promo);
  $('[name="nama_layanan"]').val(nama_layanan);
  $('[name="status_promo"]').val(status_promo);
});

});
</script>

