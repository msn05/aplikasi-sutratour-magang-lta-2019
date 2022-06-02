<div id="content">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <div class="bg-light shadow-md rounded h-100 p-3">
          <iframe class="h-100 w-100" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1992.1025122561641!2d104.78856161242875!3d-3.0396317089096274!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e3b9c50331cb50d%3A0x2e447542f4c9bd87!2sJl.+Opi+Raya%2C+Sungai+Kedukan%2C+Kec.+Rambutan%2C+Kabupaten+Banyu+Asin%2C+Sumatera+Selatan+30967!5e0!3m2!1sen!2sid!4v1563729069368!5m2!1sen!2sid" allowfullscreen></iframe>
        </div>
      </div>
      <div class="col-md-6">
        <div class="bg-light shadow-md rounded p-4">
          <h2 class="text-6">Tentang Perusahaan</h2>
          <hr>
          <div class="featured-box style-1">
            <?php foreach ($web as $key) ;?>
            <div class="featured-box-icon text-primary"> <i class="fas fa-map-marker-alt"></i></div>
            <h3><?=$key->nama_perusahaan;?></h3>
          </div>
          <div class="featured-box style-1">
            <div class="featured-box-icon text-primary"> <i class="fas fa-phone"></i> </div>
            <h3>Nomor Registrasi</h3>
            <p><?=$key->nomorregistrasi;?></p>
          </div>
          <div class="featured-box style-1">
            <div class="featured-box-icon text-primary"> <i class="fas fa-phone"></i> </div>
            <h3>Alamat</h3>
            <p><?=$key->alamat;?></p>
          </div>
          <div class="featured-box style-1">
            <div class="featured-box-icon text-primary"> <i class="fas fa-envelope"></i> </div>
            <h3>Telephone</h3>
            <p><?=$key->kontak;?></p>
          </div>
          <div class="featured-box style-1">
            <div class="featured-box-icon text-primary"> <i class="fas fa-envelope"></i> </div>
            <h3>Visi dan Misi</h3>
            <p><?=$key->visi_misi;?></p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div><!-- Content end -->
<?php $this->load->view('website/footer');?>
