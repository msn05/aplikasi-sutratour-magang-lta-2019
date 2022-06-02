<div id="content">
  <div class="container">
    <div class="bg-light shadow-md rounded p-4">
     <div class="row">
      <div class="col-lg-12 mb-6 mb-lg-0">
        <?php foreach ($da as $r );?>
        <h2 class="text-6"><?=$r->judul;?></h2>
        <div class="owl-carousel owl-theme slideshow single-slider">
          <div class="item"><a href="#"><img height="300"   src="<?=base_url().'uploads/artikel/'.$r->gambarnya;?>" alt="banner"/></a></div>
        </div>
        <?=$r->isi;?>
        <hr>
        <div class="row">
          <div class="col-sm-6 col-md-3">
            <div class="team"> <img class="img-fluid rounded" alt="" src="<?=base_url('uploads/foto/').$r->foto;?>">
              <h2 class="text-6">Penulis</h2>
              <h3><?=$r->nama;?></h3>
              <p class="text-muted"><?=$r->nama_jabatan;?></p>
              <p class="text-muted"><?=$r->tgl_postnya;?></p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>

</div><!-- Content end -->
<?php $this->load->view('website/footer');?>

