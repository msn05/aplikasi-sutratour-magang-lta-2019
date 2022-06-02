
<div id="content">
  <section class="container">
    <div class="bg-light shadow-md rounded p-4">
      <?= $this->session->flashdata('message');?>
      <div class="row">
        <div class="col-lg-12">
          <div class="owl-carousel owl-theme slideshow single-slider">
            <?php foreach ($cs->result() as $key) {?>
              <div class="item"><a href="#"><img width="120px" height="450px" src="<?=base_url('uploads/galeri/').$key->filenya;?>" alt="banner 7" /></a></div>
            <?php }?>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
<footer id="footer">
  <section class="section bg-light shadow-md pt-4 pb-3">
    <div class="container">
      <div class="row">
        <div class="col-sm-6 col-md-4">
          <div class="featured-box text-center">
            <img class="featured-box-icon" src="<?=base_url('uploads/files/foto_default.png');?>"> 
            <h4>Perusahaan Terpercaya</h4>
            <p>Kami terdaftar dalam Kementrian Agama RI dan tercata sebagai jasa travel and tour yang mempunyai reputasi baik.</p>
          </div>
        </div>
        <div class="col-sm-6 col-md-4">
          <div class="featured-box text-center">
            <div class="featured-box-icon"> <i class="fa fa-archive"></i> </div>
            <h4>Keamanan Data</h4>
            <p>Data Anda aman 100% dan kami tidak berhak karena dalam agama mengatakan bahwa " dilarang mengambil hak yang bukan milik anda ".</p>
          </div>
        </div>
        <div class="col-sm-6 col-md-4">
          <div class="featured-box text-center">
            <div class="featured-box-icon"> <i class="fa fa-arrow-down"></i> </div>
            <h4>Mudah dan Sangat Mudah</h4>
            <p>Kami memberikan kemudahan pada anda kalau tidak percaya silakan daftar untuk merasakaannya <a href="<?=base_url().'daftar';?>">Disini..!</a>.</p>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
<?php $this->load->view('website/footer');?>