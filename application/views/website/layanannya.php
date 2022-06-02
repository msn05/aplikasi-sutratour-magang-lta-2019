<div class="panel panel-headling">
  <div class="panel panel-default card-view">
    <div class="panel-body">
     <div class="table-wrap">
      <div class="table-responsive">
       <table id="dapat" class="table table-hover display  pb-30" >
        <thead>
         <tr>
          <th>#</th>
          <th>Kode Layanan</th>
          <th>Nama Layanan</th>
          <th>Harga</th>
          <th>Action</th>
        </tr>

        <?php 
        $no =1 ; 
        foreach($dp as $row) : ?>
          <tr>
            <td><?php echo $no++?></td>
            <td><?=$row->kode_layana;?></td>
            <td><?=$row->nama_layanan?></td>
            <td><?=rupiah($row->biaya);?></td>
            <td>
              <a href="#" class="btn btn-sm btn-outline-primary shadow-none" data-toggle="modal" data-target="#modal-info<?=$row->kode_layana;?>"><i class="fas fa-ellipsis-h d-none d-sm-block d-lg-none" data-toggle="tooltip" title="Informasi Layanan"></i> <span class="d-block d-sm-none d-lg-block">Info Lengkap</span></a>
            </td>
          </tr>
        <?php endforeach; ?>
      </thead>

    </table>
  </div>
</div>
</div>
</div>
</div>
<?php foreach($dp as $row) : ?>
  <form action="<?=base_url().'page/Updatejabatan';?>" method="post">
   <div id="modal-info<?=$row->kode_layana;?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
     <div class="modal-content">
      <div class="modal-header">
       <h5 class="modal-title">Informasi Layanan</h5>
     </div>
     <div class="modal-body">
      <div class="row">
        <div class="col-sm-5">
         <div class="form-group">
          <label class="control-label mb-10">Kode Layanan</label>
          <input type="text" value="<?=$row->kode_layana;?>"class="form-control" readonly="">
        </div>
      </div>
      <div class="col-sm-7">
       <div class="form-group">
        <label class="control-label mb-10">Lama Perjalanan</label>
        <input type="text" value="<?=$row->lama_perjalanan;?>"class="form-control" readonly="">
      </div>
    </div>
    <div class="col-sm-8">
      <div class="form-group">
        <label for="message-text" class="control-label mb-10">Nama Layanannya</label>
        <input type="text" name="nama_jabatan" id="nama_jabatan" value="<?=$row->nama_layanan;?>" class="form-control" readonly />
      </div>
    </div>
    <div class="col-sm-4">
      <div class="form-group">
        <label for="message-text" class="control-label mb-10">Harga Layanan</label>
        <input type="text" name="nama_jabatan" id="nama_jabatan" value="<?=$row->biaya;?>" class="form-control" readonly />
      </div>
    </div>
    <div class="col-sm-6">
      <div class="form-group">
        <label for="message-text" class="control-label mb-10">Transportasi Udaranya</label>
        <input type="text" name="nama_jabatan" id="nama_jabatan" value="<?=$row->nama_tunya;?>" class="form-control" readonly />
      </div>
    </div>
    <div class="col-sm-6">
      <div class="form-group">
        <label for="message-text" class="control-label mb-10">Transportasi Daratnya</label>
        <input type="text" name="nama_jabatan" id="nama_jabatan" value="<?=$row->nama_tdnya;?>" class="form-control" readonly />
      </div>
    </div>
    <div class="col-sm-12">
      <div class="form-group">
        <label for="message-text" class="control-label mb-10">Tempat Menginapnya</label>
        <input type="text" name="nama_jabatan" id="nama_jabatan" value="<?=$row->tempat_menginapnya;?>" class="form-control" readonly />
      </div>
    </div>
  </div>
</div>
</div>
</div>
</div>
</form>
<?php endforeach; ?>
