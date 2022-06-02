<?php $this->load->view('users/home');?> <!--Include menu-->
<?php $this->load->view('users/menu');?> <!--Include menu-->

<div class="row heading-bg">
 <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
  <h5 class="txt-dark">Data Jabatan</h5>
</div>
<!-- Breadcrumb -->
<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
  <ol class="breadcrumb">
   <li><a href="#">Page</a></li>
   <li><a href="index.html">Data Jabatan</a></li>
 </ol>
</div>
<!-- /Breadcrumb -->
</div>
<?= $this->session->flashdata('message');?>
<div class="row">
 <div class="col-sm-7">
  <div class="panel panel-default card-view">
   <div class="panel-heading">
    <div class="pull-left">
     <h6 class="panel-title txt-dark">Data Jabatan Perusahaan</h6>
   </div>
   <div class="clearfix"></div>
 </div>
 <div class="clearfix"></div>
 <div class="panel-wrapper collapse in">
  <div class="panel-body">
   <div class="table-wrap">
    <div class="table-responsive">
     <table id="dt_2" class="table table-hover display  pb-30" >
      <thead>
       <tr>
        <th>Kode Jabatan</th>
        <th>Nama Jabatan</th>
        <?php if($this->session->userdata('akses')==='3'){?>
        <th>Action</th>
      <?php } ?>
      </tr>
    </thead>
    <tfoot>
    </tbody>
  </table>
</div>
</div>

<form id="add-row-form" action="<?=base_url().'page/hapusJabatan'?>" method="post">
  <div class="modal fade" id="ModalHapus" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
   <div class="modal-dialog">
    <div class="modal-content">
     <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <h4 class="modal-title" id="myModalLabel">Hapus Jabatan</h4>
    </div>
    <div class="modal-body">
      <input type="hidden" name="id_jabatan" class="form-control" placeholder="" required>
      <strong>Anda yakin mau menghapus jabatan ini ?</strong>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      <button type="submit" id="add-row" class="btn btn-success">Hapus</button>
    </div>
  </div>
</div>
</div>
</form>
</div>
</div>
</div>	
</div>
<!-- tambah jabatan -->

<?php if($this->session->userdata('akses')==='3') { ?>

  <form id="add-row-form" class="form-horizontal" action="<?=base_url().'page/tambahJabatan';?>" method="post">
   <div class="col-md-5">
    <div class="panel panel-default card-view">
     <div class="panel-heading">
      <div class="pull-left">
       <h6 class="panel-title txt-dark">Tambah Jabatan Baru</h6>
     </div>
     <div class="clearfix"></div>
   </div>
   <div class="panel-wrapper collapse in">
    <div class="panel-body">
     <div class="row">
      <div class="col-sm-12 col-xs-12">
       <div class="form-wrap">
        <div class="form-group">
         <label for="exampleInputuname_4" class="col-sm-3 control-label">Nama Jabatan</label>
         <div class="col-sm-9">
          <div class="input-group">
           <input type="hidden" class="" name="id_jabatan[]" id="exampleInputuname_4" placeholder="Nama Jabatannya">
           <input type="text" class="form-control" name="nama_jabatan[]" id="exampleInputuname_4" placeholder="Nama Jabatannya">
           <div class="input-group-addon"><i class="icon-user"></i></div>
         </div>
         <?=form_error('nama_jabatan[]','<small  class="text-danger pl-2">','</small>')?>
       </div>            
     </div>
   </div>
   <div id="tambah-form-jab"></div>
   <div class="form-group mb-0">
    <div class="col-sm-offset-3 col-sm-9">
     <button type="submit" class="btn btn-primary ">Simpan</button>
     <button type="button" id="btn-tambah" class="btn btn-primary">Tambah</button>
     <button type="button" id="btn-reset" class="btn btn-warning">Reset</button>
     <input type="hidden" id="jumlah-form" value="1">
   </div>
 </div>
</div>
</div>
</div>
</div>
</div>
</div>  
</div>
</form>
<?php } ?>

<form action="<?=base_url().'page/Updatejabatan';?>" method="post">
 <div id="ModalUpdate" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
  <div class="modal-dialog">
   <div class="modal-content">
    <div class="modal-header">
     <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
     <h5 class="modal-title">Update Jabatan</h5>
   </div>

   <div class="modal-body">
     <div class="form-group">
      <label class="control-label mb-10">ID Jabatan</label>
      <input type="text" name="id_jabatan" class="form-control" value="" readonly="">
    </div>

    <div class="form-group">
      <label for="message-text" class="control-label mb-10">Nama Jabatan</label>
      <input type="text" name="nama_jabatan" id="nama_jabatan" value="" class="form-control" required>
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

var table = $("#dt_2").dataTable({
 initComplete: function() {
  var api = this.api();
  $('#dt_2_filter input')
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
ajax: {"url": "<?php echo base_url().'index.php/page/get_djp_json'?>", "type": "POST"},
columns: [

{"data": "id_jabatan"},
{"data": "nama_jabatan"},
<?php if($this->session->userdata('akses')== '3'  ) { ?>
 {"data": "view"} 
<?php } ?>
],
order: [[1, 'asc']],
rowCallback: function(row, data, iDisplayIndex) {
  var info = this.fnPagingInfo();
  var page = info.iPage;
  var length = info.iLength;
  $('td:eq(0)', row).html();      }

});

$('#dt_2').on('click','.hapus',function(){
 var kode=$(this).data('kode');
 $('#ModalHapus').modal('show');
 $('[name="id_jabatan"]').val(kode);
});

$('#dt_2').on('click','.editJab',function(){
 var id_jabatan=$(this).data('id_jabatan');
 var nama_jabatan=$(this).data('nama_jabatan');
 $('#ModalUpdate').modal('show');
 $('[name="id_jabatan"]').val(id_jabatan);
 $('[name="nama_jabatan"]').val(nama_jabatan);
});

$("#btn-tambah").click(function(){ 
 var jumlah = parseInt($("#jumlah-form").val()); 
 var nextform = jumlah + 1;

 $("#tambah-form-jab").append(
  "<div class='form-group'>" +
  "<label class='col-sm-3 control-label'>Nama Jabatan</label>"+
  "<div class='col-sm-9'>"+
  "<div class='input-group'>"+
  "<input type='hidden' class='' name='id_jabatan[]'>"+
  "<input type='text' class='form-control' name='nama_jabatan[]' placeholder='Nama Jabatannya'>"+
  "  <?=form_error('nama_jabatan[]','<small  class="text-danger pl-2">','</small>')?>"+
  "<div class='input-group-addon'><i class='icon-user'></i></div>"+
  "</div>" +
  "</div>" +
  "</div>"
  );

 $("#jumlah-form").val(nextform); 
});

$("#btn-reset").click(function(){
 $("#tambah-form-jab").html("");
 $("#jumlah-form").val("1");
});

});
</script>
