    <?php $this->load->view('users/home');?> <!--Include menu-->
    <?php $this->load->view('users/menu');?> <!--Include menu-->

    <div class="row heading-bg">
    	<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
    		<h5 class="txt-dark">Data Transportasi Udara</h5>
    	</div>
    	<!-- Breadcrumb -->
    	<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
    		<ol class="breadcrumb">
    			<li><a href="#">Page</a></li>
    			<li><a href="index.html">Data Transportasi UdaraNya</a></li>
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
    					<h6 class="panel-title txt-dark">Data Transportasi Udara Perusahaan</h6>
    				</div>
    				<div class="clearfix"></div>
    			</div>
    			<div class="clearfix"></div>
    			<div class="panel-wrapper collapse in">
    				<div class="panel-body">
    					<div class="table-wrap">
    						<div class="table-responsive">
    							<table id="transU" class="table table-hover display  pb-30" >
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
            </div>
          </div>
        </div>	
      </div>
      <!-- tambah jabatan -->


      <form id="add-row-form" class="form-horizontal" action="<?=base_url().'page/tambahTransU';?>" method="post">
        <div class="col-md-5">
         <div class="panel panel-default card-view">
          <div class="panel-heading">
           <div class="pull-left">
            <h6 class="panel-title txt-dark">Tambah Transportasi Udara Baru</h6>
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
                <input type="hidden" class="" name="id_tu[]" id="exampleInputuname_4">
                <input type="text" class="form-control" name="nama_tunya[]" id="exampleInputuname_4" placeholder="Nama Nya">
                <div class="input-group-addon"><i class="icon-bus"></i></div>
              </div>
              <?=form_error('nama_tunya[]','<small  class="text-danger pl-2">','</small>')?>
            </div>            
          </div>
        </div>
        <div id="tambah-form-transu"></div>
        <div class="form-group mb-0">
          <div class="col-sm-offset-3 col-sm-9">
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
</form>


<form action="<?=base_url().'page/UpdateTransU';?>" method="post">
  <div id="ModalUpdate" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
   <div class="modal-dialog">
    <div class="modal-content">
     <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
      <h5 class="modal-title">Update Transportasinya</h5>
    </div>
    <div class="modal-body">
      <div class="form-group">
       <label class="control-label mb-10">ID Transportasi Nya</label>
       <input type="text" name="id_tu" id="id_tu" class="form-control" value="" readonly="">
     </div>
     <div class="form-group">
       <label for="message-text" class="control-label mb-10">Nama Nya</label>
       <input type="text" name="nama_tunya" id="nama_tunya" class="form-control" placeholder="Jabatan" required>
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
