  <div id="content" >
   <section class="section bg-light" >
    <div class="container ">
      <h2 class="text-6 font-weight-500 mb-0">Galeri Foto</h2>
      <p class="text-3">Aktivitas</p>

      <div class="row">
        <?php foreach ($data->result() as $key) : ?>
          <div class="col-md-3">
            <div class="card shadow-md border-0 mb-4">
              <a class="fancybox" href="<?=base_url('uploads/galeri/').$key->filenya;?>" data-fancybox="gallery"><img height="200px" src="<?=base_url('uploads/galeri/').$key->filenya;?>" class="card-img-top d-block" alt="..."></a>
            </div>
          </div>
        <?php endforeach;?> 
      </div>
    </div>
  </section>
</div>
<?php $this->load->view('website/footer');?>
