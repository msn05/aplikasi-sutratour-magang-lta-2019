<?php $this->load->view('users/home');?> <!--Include menu-->
<?php $this->load->view('users/menu');?> <!--Include menu-->

<div class="row heading-bg">
 <div class="col-lg-4 col-md-5 col-sm-5 col-xs-12">
  <h5 class="txt-dark">Data Jadwal Keberangkatan Layanan</h5>
</div>
<!-- Breadcrumb -->
<div class="col-lg-8 col-sm-7 col-md-7 col-xs-12">
  <ol class="breadcrumb">
   <li><a href="#">Page</a></li>
   <li><a href="index.html">Data Jadwal Keberangkatan Layanan</a></li>
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
     <h6 class="panel-title txt-dark">Data Keberangkatan Saat Ini</h6>
   </div>
   <div class="clearfix"></div>
 </div>
 <div class="button-list mt-25">

  <button class="btn btn-success" data-toggle="modal" data-target="#TambahLb"><i class="fa fa-plus"></i> Tambah </button>     </div>
  <hr>
  <div class="clearfix"></div>
  <div class="panel-wrapper collapse in">
   <div class="panel-body">
    <div class="table-wrap">
     <div class="table-responsive">
      <table id="data_kuota" class="table table-hover display  pb-30" >
       <thead>
        <tr>
         <th>Kode Jadwal Keberangkatan</th>
         <th>Nama Layanan</th>
         <th>Tanggal Post</th>
         <th>Bulan Keberangkatan</th>
         <th>Nama Users</th>
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
<form id="add-row-form" action="<?php echo base_url().'dataku_ota/UpdateKuotanyo'?>" method="post">
 <div class="modal fade" id="UpdateKuo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
   <div class="modal-content">
    <div class="modal-header">
     <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
     <h4 class="modal-title" id="myModalLabel">Ubah Jadwal Kerangkatan</h4>
   </div>
   <div class="modal-body">
     
     <div class="form-group">
       <label class="control-label mb-10">Nama Layanan</label>
       <input type="hidden" name="kode_jadwal_keberangkatan" id="kode_jadwal_keberangkatan" readonly="">
       <select id="nama_layanan" name="nama_layanan" class="form-control">
        <option value="0" selected disabled>Pilih Layanannya</option>
        <?php foreach ($dp->result() as $row) :?>
         <option value="<?php echo $row->id;?>"><?php echo $row->nama_layanan;?></option>
       <?php endforeach ;?>
     </select>
   </div> 
   <div class="form-group">
     <label class="control-label mb-10">Bulan Keberangkatan</label>
     <input type="month" name="bulan_keberangkatan" id="bulan_keberangkatan"  class="form-control">
   </div>
   <div class="modal-footer">
     <button type="submit" id="add-row" class="btn btn-success">Simpan</button>
     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
   </div>
 </div>
</div>
</div>
</div>
</div>
</form>

<form id="add-row-form" action="<?php echo base_url().'dataku_ota/TambahKu'?>" method="post">
 <div class="modal fade" id="TambahLb" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
   <div class="modal-content">
    <div class="modal-header">
     <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
     <h4 class="modal-title" id="myModalLabel">Tambah Jadwal Keberangkatan Baru</h4>
   </div>
   <div class="modal-body">
  
   <div class="form-group">
     <label class="control-label mb-10">Nama Layanan</label>
     <select id="nama_layanan" name="nama_layanan" class="form-control">
      <option value="0" selected disabled>Pilih Layanannya</option>
      <?php foreach ($dp->result() as $row) :?>
       <option value="<?php echo $row->id;?>"><?php echo $row->nama_layanan;?></option>
     <?php endforeach ;?>
   </select>
 </div> 
 <div class="form-group">
   <label class="control-label mb-10">Bulan Keberangkatan</label>
   <input type="month" name="bulan_keberangkatan" id="bulan_keberangkatan" class="form-control">
 </div> 
 <div class="modal-footer">
  <button type="submit" id="add-row" class="btn btn-success">Simpan</button>
  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
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

var table = $("#data_kuota").dataTable({
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
ajax: {"url": "<?php echo base_url().'index.php/dataku_ota/dataku'?>", "type": "POST"},
columns: [

{"data": "kode_jadwal_keberangkatan"},
{"data": "nama_layanan"},
{"data": "tgl_post"},
{"data": "bulan_keberangkatan"},
{"data": "nama"},
{"data": "view"} 
],
order: [[1, 'asc']],
rowCallback: function(row, data, iDisplayIndex) {
  var info = this.fnPagingInfo();
  var page = info.iPage;
  var length = info.iLength;
  $('td:eq(0)', row).html();      }

});

$('#data_kuota').on('click','.EditKu',function(){
 var kode_jadwal_keberangkatan=$(this).data('kode_jadwal_keberangkatan');
 var nama_layanan=$(this).data('nama_layanan');
 var bulan_keberangkatan=$(this).data('bulan_keberangkatan');
 $('#UpdateKuo').modal('show');
 $('[name="kode_jadwal_keberangkatan"]').val(kode_jadwal_keberangkatan);
 $('[name="nama_layanan"]').val(nama_layanan);
 $('[name="bulan_keberangkatan"]').val(bulan_keberangkatan);
});

$('#data_kuota').on('click','.HapusKu',function(){
 var kode_jadwal_keberangkatan=$(this).data('kode_jadwal_keberangkatan');
 $('#ModalHapus').modal('show');
 $('[name="kode_jadwal_keberangkatan"]').val(kode_jadwal_keberangkatan);
});


});

</script>