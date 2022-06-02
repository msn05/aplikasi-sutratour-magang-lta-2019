<?php $this->load->view('users/home');?> <!--Include menu-->
<?php $this->load->view('users/menu');?> <!--Include menu-->

<div class="row heading-bg">
 <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
  <h5 class="txt-dark">Laporan Jamaah</h5>
</div>
<!-- Breadcrumb -->
<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
  <ol class="breadcrumb">
   <li><a href="#">Page</a></li>
   <li><a href="index.html">Laporan Jamaah Daftar Perusahaan</a></li>
 </ol>
</div>
<!-- /Breadcrumb -->
</div>
<?= $this->session->flashdata('message');?>


<div class="row">
 <div class="col-md-12">
  <div class="row">
   <div class="col-md-4">
    <div class="panel panel-default card-view">
     <div class="panel-wrapper collapse in">
      <div class="panel-body">
       <div class="form-wrap mt-10">
        <form action="<?=base_url().'laporan/jamaah';?>" method="post">
         <div class="row">
          <div class="col-md-12">
           <div class="form-group">
            <label class="control-label mb-10">Tanggal Awal</label>
            <input class="form-control tanggal" type="date" name="tgl_awal" id="tgl_awal">
          </div> 
          <div class="form-group">
            <label class="control-label mb-10">Tanggal Akhir</label>
            <input class="form-control tanggal" type="date" name="tgl_akhir" id="tgl_akhir">
          </div> 
        </div class="modal-footer">
        <div class="col-md-12 offset-md-10">
          <button type="submit" class="btn btn-success">Cari</button>
          <a href="javascipt:void();" type="button" class="btn btn-default" onclick="cetak()" title="Cetak Data">Print</button></a>
        </div>
      </div>
    </form>
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

  function cetak() {
    var tgl_awal   = $('#tgl_awal').val();
    var tgl_akhir   = $('#tgl_akhir').val();
    $.ajax({
      url : "<?php echo base_url().'laporan/cetak_jamaah';?>",
      type : "post",
      data : {
        tgl_awal:tgl_awal,tgl_akhir:tgl_akhir
      },

    });
  }

</script>