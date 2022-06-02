<?php $this->load->view('users/home');?> <!--Include menu-->
<?php $this->load->view('users/menu');?> <!--Include menu-->

<div class="row heading-bg">
 <div class="col-lg-4 col-md-5 col-sm-5 col-xs-12">
  <h5 class="txt-dark">Data Keberangkatan Jamaah Perusahaan</h5>
</div>
<!-- Breadcrumb -->
<div class="col-lg-8 col-sm-7 col-md-7 col-xs-12">
  <ol class="breadcrumb">
   <li><a href="#">Page</a></li>
   <li><a href="index.html">Data Keberangkatan</a></li>
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

  <button class="btn btn-success" data-toggle="modal" data-target="#TambahJB"><i class="fa fa-plus"></i> Tambah Jadwal Keberangkatan</button>     </div>
  <hr>
  <div class="clearfix"></div>
  <div class="panel-wrapper collapse in">
   <div class="panel-body">
    <div class="table-wrap">
     <div class="table-responsive">
      <table id="jkeb" class="table table-hover display  pb-30" >
       <thead>
        <tr>
         <th>Kode Keberangkatan</th>
         <th>Tanggal Keberangkatan</th>
         <th>Jumlah Jamaahnya</th>
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


<form id="add-row-form" action="<?php echo base_url().'jadwal/TambahJB'?>" method="post">
 <div class="modal fade" id="TambahJB" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
   <div class="modal-content">
    <div class="modal-header">
     <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
     <h4 class="modal-title" id="myModalLabel">Tambah Jadwal Keberangkatan Baru</h4>
   </div>
   <div class="modal-body">
     <div class="row">
      <div class="col-md-12 form-group">
       <label class="control-label mb-10">Kode Keberangkatan</label>
       <input type="text" name="id_keberangkatan" id="id_keberangkatan" value="<?=$kodenya;?>" value="" class="form-control">
     </div> 
   </div>
   <div class="row">
    <div class="col-md-12 form-group">
     <label class="tanggal control-label mb-10">Tanggal Keberangkatan</label>
     <input type="text" name="tgl_keberangkatan" id="tgl_keberangkatan" class="tanggal form-control" autocomplete="off">
   </div> 
 </div>
 <div class="row">
  <div class="col-md-12 form-group">
    <label class="control-label mb-10">Bulan Keberangkatan Yang Dipilih</label>
    <select class=" form-control" id="bulan_keberangkatan" name="bulan_keberangkatan" autocomplate="off">
      <option value="0">Pilih Bulannya</option>
      <?php foreach ($bulan->result() as $row) :?>
       <option value="<?=$row->kode_jadwal_keberangkatan;?>"><?=$row->bulan_keberangkatan;?></option>
     <?php endforeach;?>
   </select>
 </div> 
</div>
<div class="row">
  <div class="col-md-12 form-group">
   <label class="control-label mb-10">Nama Jamaah</label>
   <select class="namanya form-control" id="id_daftar" name="id_daftar[]" multiple/>
 </select>
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
</div>
</form>






</div>


<?php $this->load->view('users/footer');?> <!--Include menu-->



<script>
  $(document).ready(function(){
    $('#bulan_keberangkatan').change(function(){
      var kode_jadwal_keberangkatan=$(this).val();
      $.ajax({
        url : "<?php echo base_url();?>jadwal/cari_jamaahnya",
        method : "POST",
        data : {kode_jadwal_keberangkatan: kode_jadwal_keberangkatan},
        async : false,
        dataType : 'json',
        success: function(data){
          var html = '';
          for(i=0; i<data.length; i++){
            html += '<option value='+data[i].id_daftar+' class=>'+data[i].nama_jamaah+'</option>';
          }
          $(".namanya").select2({
          });
          $('.namanya').html(html);

        }
      });
    });


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

   var table = $("#jkeb").dataTable({
    initComplete: function() {
     var api = this.api();
     $('#jkeb_filter input')
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
   ajax: {"url": "<?php echo base_url().'index.php/jadwal/data'?>", "type": "POST"},
   columns: [

   {"data": "id_keberangkatan"},
   {"data": "tgl_keberangkatan"},
   {"data": "jumlah"},
   {"data": "nama"},
   {"data": "id_keberangkatan","render":function(data,type,row)
   {
     return '<div class="btn btn-xs btn-group-sm"><a class="fa fa-edit btn btn-group-sm btn-success" title="Lihat dan Ubah datanya" href="jadwal/lihat/'+data+'"></a>  <a class="fa fa-trash-o btn btn-group-sm btn-danger" title="Hapus Data Semuanya" href="jadwal/delete/'+data+'"></a></div> ';

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