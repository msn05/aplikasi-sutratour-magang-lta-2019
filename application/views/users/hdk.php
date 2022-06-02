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
     <h6 class="panel-title txt-dark">Histori Keberangkatan</h6>
   </div>
   <div class="clearfix"></div>
 </div>
 <div class="button-list mt-25">

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