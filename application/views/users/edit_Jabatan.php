<!--     <?php $this->load->view('users/home');?> <!--Include menu-->
    <?php $this->load->view('users/menu');?> <!--Include menu-->

    <form id="add-row-form" class="form-horizontal" action="<?=base_url().'page/UpdateJabatan';?>" method="post">
      <div class="col-md-5">
       <div class="panel panel-default card-view">
        <div class="panel-heading">
         <div class="pull-left">
          <h6 class="panel-title txt-dark">Tambah Jabatan Baru</h6>
        </div>
        <div class="clearfix"></div>
      </div>
      <div class="panel-wrapper collapse in">
       <div class="panel-body">
        <div class="row">
         <div class="col-sm-12 col-xs-12">
          <div class="form-wrap">
           <div class="form-group">
            <?php foreach ($Jabatan as $row);?>
            <label for="exampleInputuname_4" class="col-sm-3 control-label">Nama Jabatan</label>
            <div class="col-sm-9">
             <div class="input-group">
              <input type="hidden" class="" name="id_jabatan" id="id_jabatan" value="<?=$row->id_jabatan;?>" placeholder="Nama Jabatannya">
              <input type="text" class="form-control" name="nama_jabatan"  value="<?=$row->nama_jabatan;?>" id="nama_jabatan" placeholder="Nama Jabatannya">
              <div class="input-group-addon"><i class="icon-user"></i></div>
            </div>
            <?=form_error('nama_jabatan','<small  class="text-danger pl-2">','</small>')?>
          </div>            
        </div>
      </div>
      <div class="form-group mb-0">
        <div class="col-sm-offset-3 col-sm-9">
         <button type="submit" class="btn btn-primary ">Simpan</button>
         <button type="button" id="btn-reset" class="btn btn-warning">Reset</button>
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

  <?php $this->load->view('users/footer');?> <!--Include menu--> -->