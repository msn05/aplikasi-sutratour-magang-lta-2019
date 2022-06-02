 <?php $this->load->view('users/home');?> <!--Include menu-->
 <?php $this->load->view('users/menu');?> <!--Include menu-->

 <?=form_open_multipart('data_atk/tambah_artikelnya');?>
 <div class="col-sm-12">
  <div class="panel panel-default card-view">
    <div class="panel-heading">
     <div class="pull-left">
      <h6 class="panel-title txt-dark">Tambah Artikel Baru</h6>
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
                <input type="text" class="form-control" name="judul" id="judul" value="<?=set_value('judul')?>" >
                <?=form_error('judul','<small  class="text-danger pl-2">','</small>')?>
              </div>
            </div>
            <div class="form-group">
              <label for="exampleInputuname_4" class="col-sm-1 control-label">Isi Artikel</label>
              <div class="col-sm-11">
                <textarea  name="isi" class="form-control summernote" required></textarea>
              </div>
            </div>
            <div class="form-group">
              <label for="exampleInputuname_4" class="col-sm-1 control-label">Foto</label>
              <div class="col-sm-11">
                <input type="file" class="form-group" name="gambarnya" id="gambarnya" autocomplete="off">
              </div>
            </div> 
            <div class="form-group mb-0">
              <div class="col-sm-offset-5 col-sm-12">
                <button type="submit" class="btn btn-primary ">Simpan</button>
                <a href="<?=base_url().'data_atk';?>"><button class="btn btn-info ">Kembali</button></a>
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
