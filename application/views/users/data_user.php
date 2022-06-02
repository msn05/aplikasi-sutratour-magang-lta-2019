    <?php $this->load->view('users/home');?> <!--Include menu-->
    <?php $this->load->view('users/menu');?> <!--Include menu-->

    <div class="row heading-bg">
    	<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
    		<h5 class="txt-dark">Data Users Website</h5>
    	</div>
    	<!-- Breadcrumb -->
    	<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
    		<ol class="breadcrumb">
    			<li><a href="#">Page</a></li>
    			<li><a href="index.html">Data Users</a></li>
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
    					<h6 class="panel-title txt-dark">Data Users Login</h6>
    				</div>
    				<div class="clearfix"></div>
    			</div>
    			<div class="button-list mt-25">
    				<a href="<?=base_url().'page/tambahUserL';?>"><button class="icon-plus btn btn-success"> Tambah Users Baru</button></a>
    			</div>
          <hr>
          <div class="clearfix"></div>
          <div class="panel-wrapper collapse in">
            <div class="panel-body">
             <div class="table-wrap">
              <div class="table-responsive">
               <table id="dt_1" class="table table-hover display  pb-30" >
                <thead>
                 <tr>
         
                  <th>Nomor Identitas</th>
                  <th>Foto</th>
                  <th>Nama</th>
                  <th>Email</th>
                  <th>Nama Jabatan</th>
                  <th>Nomor Telephone</th>
                  <th>Login Terakhir</th>
                  <th>Akses</th>
                  <th>Hapus</th>
                  <th>Reset Password</th>
                </tr>
              </thead>
              <tfoot>
              </tbody>
            </table>
          </div>
        </div>

        <form id="add-row-form" action="<?php echo base_url().'page/hapusUser'?>" method="post">
          <div class="modal fade" id="ModalHapus" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
           <div class="modal-dialog">
            <div class="modal-content">
             <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="myModalLabel">Hapus Users</h4>
            </div>
            <div class="modal-body">
              <input type="hidden" name="id_pegawai" class="form-control" placeholder="Nomor Identitas" required>
              <strong>Anda yakin mau menghapus user ini ?</strong>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" id="add-row" class="btn btn-success">Hapus</button>
            </div>
          </div>
        </div>
      </div>
    </form>

    <form action="<?=base_url().'page/Updatepassword';?>" method="post">
      <div id="ModalUpdate" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
       <div class="modal-dialog">
        <div class="modal-content">
         <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          <h5 class="modal-title">Reset Password</h5>
        </div>
        <div class="modal-body">
          <div class="form-group">
           <label class="control-label mb-10">Nomor Identitas</label>
           <input type="text" name="id_pegawai" class="form-control" value="" readonly="">
         </div>
         <div class="form-group">
           <label for="message-text" class="control-label mb-10">Password Baru</label>
           <input type="password" name="password" id="password" class="form-control">
           <?=form_error('password','<small  class="text-danger pl-2">','</small>')?>
         </div>
       </div>
       <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" id="add-row" class="btn btn-success">Update</button>
      </div>
    </div>
  </div>
</div>
</form>



</div>
</div>
</div>	
</div>
</div>
<?php $this->load->view('users/footer');?> <!--Include menu-->
