<?php $this->load->view('users/home');?> <!--Include menu-->
<?php $this->load->view('users/menu');?> <!--Include menu-->

<div class="row heading-bg">
 <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
  <h5 class="txt-dark">Laporan Keberangkatan Jamaah</h5>
</div>
<!-- Breadcrumb -->
<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
  <ol class="breadcrumb">
   <li><a href="#">Page</a></li>
   <li><a href="index.html">Laporan Keberangkatan Jamaah</a></li>
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
        <form  action="" id="formC">
         <div class="row">
          <div class="col-md-12">
           <div class="form-group">
            <label class="control-label mb-10">Kode Keberangkatan</label>
            <!-- <select class="form-control" id="start_date" name="start_date"> -->
              <select name="" id="start"  class="form-control">
               <option value="0">Pilih Kode Keberangkatan</option>
               <?php foreach ($katek as $key) { ?>
                <option value="<?=$key->id_keberangkatan;?>"><?=$key->id_keberangkatan;?></option>
               <?php } ?>
             </select>
           </div> 

           <hr>
         </div>
         <div class="col-md-3 offset-md-10">
          <button type="submit" id="add-row" class="btn btn-success">Cari</button>
        </div>
      </div>
    </form>
  </div>
</div>
</div>
</div>
</div>
<div id="res"></div>
</div>

</div>


</div>


<?php $this->load->view('users/footer');?> <!--Include menu-->

<script>
 $(document).ready(function() {
  $("#formC").submit(function(e){
   e.preventDefault();
   var id_keberangkatan = $("#start").val();
   var url = "<?=base_url('laporan/keberangkatan/')?>" + id_keberangkatan ;
   $('#res').load(url);

 });

});
</script>