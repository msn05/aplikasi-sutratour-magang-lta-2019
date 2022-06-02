<div class="panel panel-default card-view">
  <div class="panel-body">
   <div class="table-wrap">
    <div class="table-responsive">
     <table id="dapat" class="table table-hover display  pb-30" >
      <thead>
       <tr>
        <th>#</th>
        <th>Kode Keberangkatan</th>
        <th>Nama Jamaah</th>
        <th>Nomor KTP</th>
        <th>Nomor Telephone</th>
      </tr>
      <?php 
      $no =1 ; 
      foreach($mk as $row) { ?>
        <tr>
          <td><?php echo $no++?></td>
          <td><?=$row->id_keberangkatan;?></td>
          <td><?=$row->nama_jamaah?></td>
          <td><?=$row->no_ktp?></td>
          <td><?php echo $row->no_telephone?></td>
        </tr>
      <?php } ?>
    </thead>
  </table>
  <tr><p>Jamaah Diatas Berangkat pada Tanggal : <?=format_indo($row->tgl_keberangkatan);?></p></tr>
  <?php foreach ($total as $x );?>
  <tr><p>Jamaah yang berangkatn sebanyak <?=$x;?> orang</p></tr>
  <div class="modal-footer">
    <a href="<?=site_url('laporan/cetak_keberangkatan/'.$id_keberangkatan);?>" type="button" class="btn btn-default">Print</button></a>
  </div>
</div>
</div>
</div>
</div>