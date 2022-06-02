 <?php $this->load->view('users/home');?> <!--Include menu-->
 <?php $this->load->view('users/menu');?> <!--Include menu-->

 <?=form_open_multipart('data_atk/update_art');?>
 <div class="col-sm-12">
  <div class="panel panel-default card-view">
   <div class="panel-heading">
    <div class="pull-left">
     <h6 class="panel-title txt-dark">Halaman Ubah Artikel </h6>
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
        <input type="hidden" name="id_artikel" id="id_artikel" value="<?=$id_artikel;?>">
        <input type="text" class="form-control" name="judul" id="judul" value="<?=$judul;?>" >
      </div>
    </div>
    <div class="form-group">
     <label for="exampleInputuname_4" class="col-sm-1 control-label">Isi Artikel</label>
     <div class="col-sm-11">
      <textarea class="form-control summernote" name="isi" ><?=$isi;?> </textarea>
    </div>
  </div>
  <div class="form-group">
   <label for="exampleInputuname_4" class="col-sm-1 control-label">Gambar Lamanya</label>
   <div class="col-sm-11">
    <div class="profile-img-wrap">
     <img class="form-group" width="500px" height="150px" src="<?=base_url('./uploads/artikel/'). $gambarnya;?>" alt="user"/>
   </div>
 </div>
</div>
<div class="form-group">
 <label for="exampleInputuname_4" class="col-sm-1 control-label">Ganti Gambar</label>
 <div class="col-sm-11">
  <input type="file"  name="gambarnya" id="gambarnya" value="<?=$gambarnya;?>" >
</div>
</div>
<div class="form-group mb-20">
 <div class="col-sm-offset-5 col-sm-12">
  <button type="submit" class="btn btn-primary">Simpan</button>
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

<?php $this->load->view('users/footer');?> <!--Include menu-->