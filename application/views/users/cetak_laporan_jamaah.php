 <?php $this->load->view('users/home');?> <!--Include menu-->
 <?php $this->load->view('users/menu');?> <!--Include menu-->
 <div class="row heading-bg">
  <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
   <h5 class="txt-dark">Laporan Pendaftaran Jamaah</h5>
  </div>
  <!-- Breadcrumb -->
  <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
   <ol class="breadcrumb">
    <li><a href="#">Page</a></li>
    <li><a href="<?=base_url().'page/profile';?>">Data Laporan Pendaftarn Jamaah</a></li>
   </ol>
  </div>
  <!-- /Breadcrumb -->
 </div>
 <div class="right-sidebar-backdrop"></div>
 <div class="panel panel-default card-view">
  <div class="panel-body">
   <div class="table-wrap">
    <div class="table-responsive">
     <table id="" class="table table-hover display  pb-30" >
      <thead>
       <tr>
        <th>#</th>
        <th>Kode Pendaftaran</th>
        <th>Tanggal Daftar</th>
        <th>Nama</th>
        <th>Nomor Telephone</th>
        <th>Nama Layanan Yang Dipilih</th>
       </tr>
       <?php 
       $no =1 ; 
       foreach($mk as $row) : ?>
        <tr>
         <td><?php echo $no++?></td>
         <td><?=$row->id_daftar;?></td>
         <td><?php echo $row->tgl_daftar?></td>
         <td><?=$row->nama_jamaah?></td>
         <td><?php echo $row->no_telephone?></td>
         <td><?php echo $row->nama_layanan?></td>
        </tr>
       <?php endforeach ; ?>
      </thead>
     </table>

     <div class="modal-footer">
      <a href="<?=base_url('jamaah/laporan');?>" type="button" class="btn btn-primary">Kembali</button></a>
     </div>
    </div>
   </div>
  </div>
 </div>

  <?php $this->load->view('users/footer');?> <!--Include menu-->