<div id="content">
 <div class="container">
  <div class="bg-light shadow-md rounded p-4">
   <div class="row">
    <div class="col-md-3">
     <ul class="nav nav-tabs flex-column" id="myTab" role="tablist">
      <li class="nav-item"> <a class="nav-link active" id="first-tab" data-toggle="tab" href="#firstTab" role="tab" aria-controls="firstTab" aria-selected="true">Daftar Layanan</a> </li>
      <!-- <li class="nav-item"> <a class="nav-link" id="second-tab" data-toggle="tab" href="#secondTab" role="tab" aria-controls="secondTab" aria-selected="false">Daftar Jadwal Keberangkatan</a> </li> -->
    </ul>
  </div>
  <?= $this->session->flashdata('message');?>
  <div class="col-md-9">
   <div class="tab-content my-3" id="myTabContentVertical">
    <div class="tab-pane fade show active" id="firstTab" role="tabpanel" aria-labelledby="first-tab">
     <div class="row">
      <div class="col-lg-12">
       <h4 class="mb-4">Layanan</h4>
       <form  action="" id="formC">
         <div class="row">
          <div class="col-md-4">
           <div class="form-group">
            <label class="control-label mb-10">Pilih Layanannya</label>
            <!-- <select class="form-control" id="start_date" name="start_date"> -->
              <select name="" id="start"  class="form-control">
               <option value="0">--Disini--</option>
               <?php foreach ($dp->result() as $key) { ?>
                <option value="<?=$key->id;?>"><?=$key->nama_layanan;?></option>
              <?php } ?>
            </select>
          </div> 

          <hr>
          <div class="col-md-3 ">
            <button type="submit" id="add-row" class="btn btn-success">Cari</button>
          </div>
        </div>
      </div>
    </form>
    <hr>
    <div id="res"></div>
  </div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div><!-- Content end -->

<?php $this->load->view('website/footer');?>


<script>

 $(document).ready(function() {
  $("#formC").submit(function(e){
   e.preventDefault();
   var id = $("#start").val();
   var url = "<?=base_url('layanan/cari/')?>" + id ;
   $('#res').load(url);

 });

});
</script>