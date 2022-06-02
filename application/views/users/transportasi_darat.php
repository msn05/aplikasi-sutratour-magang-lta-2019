    <?php $this->load->view('users/home');?> <!--Include menu-->
    <?php $this->load->view('users/menu');?> <!--Include menu-->

    <div class="row heading-bg">
    	<div class="col-lg-5 col-md-4 col-sm-4 col-xs-12">
    		<h5 class="txt-dark">Data Transportasi Darat Layanan</h5>
    	</div>
    	<!-- Breadcrumb -->
    	<div class="col-lg-7 col-sm-8 col-md-8 col-xs-12">
    		<ol class="breadcrumb">
    			<li><a href="#">Page</a></li>
    			<li><a href="index.html">Data Transportasi DaratNya</a></li>
    		</ol>
    	</div>
    	<!-- /Breadcrumb -->
    </div>
    <?= $this->session->flashdata('message');?>
    <div class="row">
    	<div class="col-sm-7">
    		<div class="panel panel-default card-view">
    			<div class="panel-heading">
    				<div class="pull-left">
    					<h6 class="panel-title txt-dark">Data Transportasi Darat Perusahaan</h6>
    				</div>
    				<div class="clearfix"></div>
    			</div>
    			<div class="clearfix"></div>
    			<div class="panel-wrapper collapse in">
    				<div class="panel-body">
    					<div class="table-wrap">
    						<div class="table-responsive">
    							<table id="transD" class="table table-hover display  pb-30" >
    								<thead>
    									<tr>
                        <th>ID</th>
                        <th>Nama Nya</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tfoot>
                    </tbody>
                  </table>
                </div>
              </div>

              <form id="add-row-form" action="<?=base_url().'page/hapusTransD'?>" method="post">
                <div class="modal fade" id="ModalHapus" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                 <div class="modal-dialog">
                  <div class="modal-content">
                   <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Hapus Transportasi Nya</h4>
                  </div>
                  <div class="modal-body">
                    <input type="hidden" name="id_td" class="form-control" placeholder="" required>
                    <strong>Anda yakin mau menghapus jabatan ini ?</strong>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" id="add-row" class="btn btn-success">Hapus</button>
                  </div>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>	
  </div>
  <!-- tambah jabatan -->


  <form id="add-row-form" class="form-horizontal" action="<?=base_url().'page/tambahTransD';?>" method="post">
    <div class="col-md-5">
     <div class="panel panel-default card-view">
      <div class="panel-heading">
       <div class="pull-left">
        <h6 class="panel-title txt-dark">Tambah Transportasi Darat Baru</h6>
      </div>
      <div class="clearfix"></div>
    </div>
    <div class="panel-wrapper collapse in">
     <div class="panel-body">
      <div class="row">
       <div class="col-sm-12 col-xs-12">
        <div class="form-wrap">
         <div class="form-group">
          <label for="exampleInputuname_4" class="col-sm-3 control-label">Nama Transportasi Nya</label>
          <div class="col-sm-9">
           <div class="input-group">
            <input type="hidden" class="" name="id_td[]" id="exampleInputuname_4">
            <input type="text" class="form-control" name="nama_tdnya[]" id="exampleInputuname_4" placeholder="Nama Nya">
            <div class="input-group-addon"><i class="fa fa-bus"></i></div>
          </div>
          <?=form_error('nama_tdnya[]','<small  class="text-danger pl-2">','</small>')?>
        </div>            
      </div>
    </div>
    <div id="tambah-form-transd"></div>
    <div class="form-group mb-0">
      <div class="modal-footer">
        <div class="col-sm-12">
         <button type="submit" class="btn btn-primary ">Simpan</button>
         <button type="button" id="btn-tambah" class="btn btn-primary">Tambah</button>
         <button type="button" id="btn-reset" class="btn btn-warning">Reset</button>
         <input type="hidden" id="jumlah-form" value="1">
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


<form action="<?=base_url().'page/UpdateTransD';?>" method="post">
  <div id="ModalUpdate" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
   <div class="modal-dialog">
    <div class="modal-content">
     <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
      <h5 class="modal-title">Update Transportasinya</h5>
    </div>
    <div class="modal-body">
      <div class="form-group">
       <label class="control-label mb-10">ID Transportasinya</label>
       <input type="text" name="id_td" id="id_td" class="form-control" value="" readonly="">
     </div>
     <div class="form-group">
       <label for="message-text" class="control-label mb-10">Nama Nya</label>
       <input type="text" name="nama_tdnya" id="nama_tdnya" class="form-control" placeholder="Jabatan" required>
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

<?php $this->load->view('users/footer');?> <!--Include menu-->
