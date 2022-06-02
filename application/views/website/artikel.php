<div id="content">
 <section class="container">
  <div class="row">
    <div class="col-lg-12 mt-4 mt-lg-0">
      <div class="hotels-list">
       <div class="hotels-item bg-light shadow-md rounded p-3">
        <?php foreach ($a->result_array() as $key) :
            $id_artikel=$key['id_artikel'];
            $judul=$key['judul'];
            $isi = $key['isi'];
            $tgl_postnya=$key['tgl_postnya'];
         ?>
          <a href="<?=base_url().'tentang/baca/'.$id_artikel;?>">
           <div class="row">
            <div class="col-12 col-sm-3 text-center">
             <p class="mb-0 line-height-1"><?=$judul;?></p>
             <small><em><?=format_indo($tgl_postnya);?></em></small> 
           </div>
           <div class="col-12 col-sm-9 text-center text-sm-left">
            <?=limit_text($isi,100);?>
          </div>
        </div>
      </a>
      <hr>
    <?php endforeach; ?>
    <div class="row">
      <div class="col-md-4">
       <?php echo $pagination; ?>
     </div>
   </div>
 </div>
</div>
</div>
</div>
</section>
</div>
<?php $this->load->view('website/footer');?>
