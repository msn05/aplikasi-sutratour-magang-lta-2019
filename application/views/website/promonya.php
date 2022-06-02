<div class="panel panel-headling">
  <div class="panel panel-default card-view">
    <div class="panel-body">
     <div class="table-wrap">
      <div class="table-responsive">
       <table id="dapat" class="table table-hover display  pb-30" >
        <thead>
         <tr>
          <th>#</th>
          <th>Kode Promo</th>
          <th>Nama Layanannya</th>
          <th>Nama Promonya</th>
          <th>Batas Promonya</th>
        </tr>
        <?php 
        $no =1 ; 
        foreach($dp as $row) {
      
          ?>
          <tr>
            <td><?php echo $no++?></td>
            <td><?=$row->kode_promo;?></td>
            <td><?=$row->nama_layanan;?></td>
            <td><?=$row->nama_promo?></td>
            <td><?=format_indo($row->batas_promo);?></td>

          </tr>
        <?php } ?>
      </thead>

    </table>
  </div>
</div>
</div>
</div>
</div>