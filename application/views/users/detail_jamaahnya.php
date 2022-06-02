<?php $this->load->view('users/home');?> <!--Include menu-->
<?php $this->load->view('users/menu');?> <!--Include menu-->

<div class="row heading-bg">
 <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
  <h5 class="txt-dark">Histori Seluruh Pembayaran Jamaah</h5>
</div>
<!-- Breadcrumb -->
<div class="col-lg-8 col-sm-8 col-md-8 col-xs-12">
  <ol class="breadcrumb">
   <li><a href="#">Page</a></li>
   <li><a href="index.html">Histori Seluruh Pembayaran Jamaah</a></li>
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
     <h6 class="panel-title txt-dark">Detail Pembayaran Layanan </h6>
   </div>
   <div class="clearfix"></div>
 </div>
 <div class="clearfix"></div>
 <div class="panel-wrapper collapse in">
  <div class="panel-body">
   <div class="table-wrap">
    <div class="table-responsive">
     <table id="detail" class="table table-hover display  pb-30" >
      <thead>
       <tr>
        <th>Kode Pembayaran</th>
        <th>Nama Jamaah</th>
        <th>Tgl Pembayaran</th>
        <th>Status Pembayaran</th>
        <th>Status</th>
        <th>Jumlah Yang Telah Dibayarkan</th>
        <th>Nama User</th>
      </tr>
    </thead>
  </table>
</div>
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

var table = $("#detail").dataTable({
 initComplete: function() {
  var api = this.api();
  $('#detail_filter input')
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
ajax: {"url": "<?php echo base_url().'index.php/jamaah/detailini'?>", "type": "POST"},
columns: [

{"data": "kode_pembayaran"},
{"data": "nama_jamaah"},
{"data": "tgl_pembayaran"},
{"data": "status_pembayaran", "render": function (data, type, row )
{  
  return row.status_pembayaran == 1 ? 'CICIL' : 'CASH';
}},
{"data": "statusnyo", "render": function (data, type, row )
{  
  return row.statusnyo == 1 ? 'Lunas' : 'Belum Lunas';
}},
{"data": "jumlah_uangnya","render": $.fn.dataTable.render.number( ',', '.', 2, 'Rp ' ),
"render": function (data, type, row )
{  
  return row.jumlah_uangnya;
}
},
{"data": "nama"},
   // {"data": "view"} 

   ],
   order: [[1, 'asc']],
   rowCallback: function(row, data, iDisplayIndex) {
    var info = this.fnPagingInfo();
    var page = info.iPage;
    var length = info.iLength;
    $('td:eq(0)', row).html();      }

  });

$('#datable_2').on('click','.hapus',function(){
 var kode=$(this).data('kode');
 $('#ModalHapus').modal('show');
 $('[name="id_jabatan"]').val(kode);
});

$('#datable_2').on('click','.editJab',function(){
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
