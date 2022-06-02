 <?php $this->load->view('users/home');?> <!--Include menu-->
 <?php $this->load->view('users/menu');?> <!--Include menu-->

 <form id="add-row-form" class="form-horizontal" action="" method="post">
  <div class="col-sm-8">
    <div class="panel panel-default card-view">
      <div class="panel-heading">
       <div class="pull-left">
        <h6 class="panel-title txt-dark">Tambah Jadwal Keberangkatan Jamaah</h6>
      </div>
      <div class="clearfix"></div>
    </div>
    <div class="panel-wrapper collapse in">
      <div class="panel-body">
        <div class="row">
          <div class="col-sm-12 col-xs-12">
            <div class="form-wrap">
              <div class="form-group">
                <label for="exampleInputuname_4" class="col-md-4 control-label">Kode Keberangkatannya</label>
                <div class="col-sm-8">
                  <div class="input-group">
                    <input type="text" class="form-control" value="" name="id_keberangakatan" id="id_keberangakatan">
                    <div class="input-group-addon"><i class="fa fa-code"></i>
                    </div>
                  </div>
                  <?=form_error('id_keberangakatan','<small  class="text-danger pl-2">','</small>')?>
                </div>
              </div>
              <div class="form-group">
                <label for="exampleInputuname_4" class="col-sm-4 control-label">Tanggal Keberangkatan</label>
                <div class="col-sm-8">
                  <div class="input-group">
                    <input type="text" class="tanggal form-control"  name="tgl_keberangkatan" id="tgl_keberangkatan">
                    <div class="input-group-addon"><i class="fa fa-calender-o"></i>
                    </div>
                  </div>
                  <?=form_error('nama_layanan','<small  class="text-danger pl-2">','</small>')?>
                </div>
              </div>
              <div class="form-group">
                <label for="exampleInputuname_4" class="col-sm-4 control-label">Cari Bulan Keberangkatan</label>
                <div class="col-sm-6">
                  <div class="input-group">
                    <input type="month" class="form-control" name="bulan" id="bulan" autocomplete="off">
                    <div class="input-group-addon"><i class="icon-calender"></i>
                    </div>
                  </div>
                  <?=form_error('bulan','<small  class="text-danger pl-2">','</small>')?>
                </div>
                <button" id="cari" class="btn btn-xs btn-success"><i class="fa fa-search"></i> Cari</button">
              </div> 
              <!-- <form id="formnyo"> -->
                <div class="form-group">
                  <label for="exampleInputuname_4" class="col-sm-4 control-label">Cari Jamaahnyo</label>
                  <div class="col-sm-6">
                    <div class="input-group col-sm-12">
                     <select class="js-example-basic-multiple form-control" id="id_jamaah_vik" name="nama_layanan[]" multiple="multiple" >
                       <?php foreach ($jamaah->result() as $row) :?>
                         <option value="<?php echo $row->id_daftar;?>"><?php echo "Nomor KTPny : " . $row->no_ktp." / "."Namanya : " . $row->nama_jamaah;?></option>
                       <?php endforeach;?>
                     </select>
                   </div>
                 </div>
               </div>
               <!-- </form> -->
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


<script>

 
  $('.js-example-basic-multiple').select2();   


</script>