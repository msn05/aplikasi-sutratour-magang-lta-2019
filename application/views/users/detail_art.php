 <?php $this->load->view('users/home');?> <!--Include menu-->
 <?php $this->load->view('users/menu');?> <!--Include menu-->

 <div class="col-sm-12">
  <div class="panel panel-default card-view">
   <div class="panel-heading">
    <div class="pull-left">
     <h6 class="panel-title txt-dark">Detail Artikel Baru</h6>
    </div>
    <div class="clearfix"></div>
   </div>
   <div class="panel-wrapper collapse in">
    <div class="panel-body">
     <div class="row">
      <div class="col-sm-12 col-xs-12">
       <div class="form-wrap">
        <div class="form-group">
         <label for="exampleInputuname_4" class="col-md-1 control-label">Judul</label>
         <div class="col-sm-11">
          <input type="hidden" name="id_artikel" id="id_artikel">
          <input type="text" class="form-control" name="judul" id="judul" value="<?=$judul;?>" >
         </div>
        </div>
        <div class="form-group">
         <label for="exampleInputuname_4" class="col-sm-1 control-label">Isi Artikel</label>
         <div class="col-sm-11">
          <textarea id="editordata" name="isi" class="form-control" value="" readonly=""><?=$isi;?></textarea>
         </div>
        </div>
        <div class="form-group">
         <label for="exampleInputuname_4" class="col-sm-1 control-label">Gambar Lamanya</label>
         <div class="col-sm-11">
          <div class="profile-img-wrap">
           <img class="form-group" width="500px" height="150px" src="<?=base_url('uploads/artikel/'). $gambarnya;?>" alt="user"/>
          </div>
         </div>
        </div>
        <div class="form-group mb-0">
         <div class="col-sm-offset-5 col-sm-12">
          <a href="<?=base_url().'data_atk';?>"><button class="btn btn-primary ">Kembali</button></a>
         </div>
        </div>
       </div>
      </div>
     </div>
    </div>
   </div>
  </div>
 </div>
</div>

<?php $this->load->view('users/footer');?>