 <?php $this->load->view('users/home');?> <!--Include menu-->
 <?php $this->load->view('users/menu');?> <!--Include menu-->

 <form id="add-row-form" class="form-horizontal" action="<?=base_url().'page/tambahLayanan';?>" method="post">
  <div class="col-sm-12">
    <div class="panel panel-default card-view">
      <div class="panel-heading">
       <div class="pull-left">
        <h6 class="panel-title txt-dark">Tambah Layanan Baru</h6>
      </div>
      <div class="clearfix"></div>
    </div>
    <div class="panel-wrapper collapse in">
      <div class="panel-body">
        <div class="row">
          <div class="col-sm-12 col-xs-12">
            <div class="form-wrap">
              <div class="form-group">
                <label for="exampleInputuname_4" class="col-md-2 control-label">Kode Layanan</label>
                <div class="col-sm-10">
                  <div class="input-group">
                    <input type="text" class="form-control" value="" name="kode_layana" id="kode_layana">
                    <div class="input-group-addon"><i class="fa fa-code"></i>
                    </div>
                  </div>
                  <?=form_error('kode_layana','<small  class="text-danger pl-2">','</small>')?>
                </div>
              </div>
              <div class="form-group">
                <label for="exampleInputuname_4" class="col-sm-2 control-label">Nama Layanan</label>
                <div class="col-sm-10">
                  <div class="input-group">
                    <input type="text" class="form-control"  name="nama_layanan" id="nama_layanan">
                    <div class="input-group-addon"><i class="fa fa-magic"></i>
                    </div>
                  </div>
                  <?=form_error('nama_layanan','<small  class="text-danger pl-2">','</small>')?>
                </div>
              </div>
              <div class="form-group">
                <label for="exampleInputuname_4" class="col-sm-2 control-label">Berlaku Dari</label>
                <div class="col-sm-10">
                  <div class="input-group">
                    <input type="text" class="tanggal form-control" name="berlaku_dari" id="berlaku_dari" autocomplete="off">
                    <div class="input-group-addon"><i class="icon-calender"></i>
                    </div>
                  </div>
                  <?=form_error('berlaku_dari','<small  class="text-danger pl-2">','</small>')?>
                </div>
              </div> 
              <div class="form-group">
                <label for="exampleInputuname_4" class="col-sm-2 control-label">Transportasi</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="transportasi" id="transportasi">
                </div>
                <?=form_error('transportasi','<small  class="text-danger pl-2">','</small>')?>
              </div>
              <div class="form-group">
                <label for="exampleInputuname_4" class="col-sm-2 control-label">Tempat Menginap</label>
                <div class="col-sm-10">
                  <div class="input-group">
                    <textarea class="summernote form-control" name="tempat_menginap" id="tempat_menginap"> </textarea>
                    <div class="input-group-addon"><i class="fa fa-home"></i>
                    </div>
                  </div>
                  <?=form_error('tempat_menginap','<small  class="text-danger pl-2">','</small>')?>
                </div>
              </div>
              <div class="form-group">
                <label for="exampleInputuname_4" class="col-sm-2 control-label">Lama Perjalanan</label>
                <div class="col-sm-10">
                  <div class="input-group">
                    <input type="text" class="form-control"  name="lama_perjalanan" id="lama_perjalanan">
                    <div class="input-group-addon"><i class="fa fa-magic"></i>
                    </div>
                  </div>
                  <?=form_error('lama_perjalanan','<small  class="text-danger pl-2">','</small>')?>
                </div>
              </div>
              <div class="form-group">
                <label for="exampleInputuname_4" class="col-sm-2 control-label">Biaya</label>
                <div class="col-sm-10">
                  <div class="input-group">
                    <input type="text" class="form-control"  name="biaya" id="biaya">
                    <div class="input-group-addon"><i class="fa fa-magic"></i>
                    </div>
                  </div>
                  <?=form_error('biaya','<small  class="text-danger pl-2">','</small>')?>
                </div>
              </div>
              <div class="form-group mb-0">
                <div class="col-sm-offset-3 col-sm-12">
                  <button type="submit" class="btn btn-primary ">Simpan</button>
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
</form>

<?php $this->load->view('users/footer');?> <!--Include menu-->