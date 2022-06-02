<?php $this->load->view('users/home');?> <!--Include menu-->
<?php $this->load->view('users/menu');?> <!--Include menu-->

<div class="row heading-bg">
 <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
  <h5 class="txt-dark">Data Jamaah</h5>
</div>
<!-- Breadcrumb -->
<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
  <ol class="breadcrumb">
   <li><a href="#">Page</a></li>
   <li><a href="index.html">Jamaah</a></li>
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
     <h6 class="panel-title txt-dark">Data Jamaah Saat Ini</h6>
   </div>
   <div class="clearfix"></div>
 </div>
 <div class="button-list mt-25">
  <a href="<?=base_url().'jamaah/tambah_jamaah';?>"><button class="icon-plus btn btn-success"> Tambah Jamaah Baru</button></a>
</div>
<hr>
<div class="clearfix"></div>
<div class="panel-wrapper collapse in">
  <div class="panel-body">
   <div class="table-wrap">
    <div class="table-responsive">
     <table id="dajam" class="table table-hover display  pb-30" >
      <thead>
       <tr>
        <th>Kode Pendaftaran</th>
        <th>Nama</th>
        <th>Nomor KTP</th>
        <th>Email</th>
        <th>Nomor Telephone</th>
        <th>Alamat</th>
        <th>Status Jamaah</th>
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
 var table = $("#dajam").dataTable({
  initComplete: function() {
   var api = this.api();
   $('#dajam_filter input')
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
 ajax: {"url": "<?php echo base_url().'index.php/jamaah/data_jamaah'?>", "type": "POST"},
 columns: [

 {"data": "id_daftar"},
 {"data": "nama_jamaah"},
 {"data": "no_ktp"},
 {"data": "email"},
 {"data": "no_telephone"},
 {"data": "alamat"},
 {"data": "status_keberangkatanJ"},
{"data": "id_daftar","render":function(data,type,row)
{
  return '<div class="btn btn-xs"><a class="fa fa-info btn  btn-group-sm btn-success" title="Verifikasi Dokumen" href="jamaah/lihat/'+data+'"></a> <a class="fa fa-warning btn  btn-group-sm btn-warning" title="Edit Data" href="jamaah/edit/'+data+'"></a> <a class="fa fa-trash-o btn  btn-group-sm btn-danger" title="Edit Data" href="jamaah/hapus/'+data+'"></a></div> ';

}}, 
],
order: [[1, 'asc']],
rowCallback: function(row, data, iDisplayIndex) {
 var info = this.fnPagingInfo();
 var page = info.iPage;
 var length = info.iLength;
 $('td:eq(0)', row).html();      }

});


});
</script>
