<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1.0, shrink-to-fit=no">
  <link href="images/favicon.png" rel="icon" />
  <?php foreach($web as $k);?>
  <title><?=$k->nama_perusahaan;?></title>
  <meta name="description" content="Quickai - Recharge & Bill Payment, Booking HTML5 Template">
  <meta name="author" content="harnishdesign.net">

<!-- Web Fonts
  ============================================= -->
  <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900' type='text/css'>

<!-- Stylesheet
  ============================================= -->

  <link rel="icon" href="<?=base_url().'assets/logo/perusahaan.ico';?>" type="image/x-icon">
  <link href="<?=base_url().'assets/html/vendors/bower_components/datatables/media/css/jquery.dataTables.min.css';?>" rel="stylesheet" type="text/css"/>
  <link rel="stylesheet" type="text/css" href="<?=base_url().'assets/depan/html/vendor/bootstrap/css/bootstrap.min.css';?>" />
  <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
  <link rel="stylesheet" href="<?=base_url().'assets/html/vendors/bower_components/summernote/dist/summernote.css';?>" />
  <link rel="stylesheet" type="text/css" href="<?=base_url().'assets/depan/html/vendor/owl.carousel/assets/owl.carousel.min.css';?>" />
  <link rel="stylesheet" type="text/css" href="<?=base_url().'assets/depan/html/vendor/owl.carousel/assets/owl.theme.default.min.css';?>" />
  <link rel="stylesheet" type="text/css" href="<?=base_url().'assets/depan/html/css/stylesheet.css';?>" />
  <link href="<?=base_url().'assets/html/vendors/bower_components/sweetalert/dist/sweetalert.css" rel="stylesheet';?>" type="text/css">

</head>
<body>
  <!-- Preloader -->
  <div id="preloader"><div data-loader="dual-ring"></div></div><!-- Preloader End -->

<!-- Document Wrapper   
  ============================================= -->
  <div id="main-wrapper">

  <!-- Header
    ============================================= -->
    <header id="header">
      <div class="container">
        <div class="header-row">
          <div class="header-column justify-content-start"> 

            <div class="logo">
             <a href="index.html" title="Quickai - HTML Template"><img src="<?=base_url().'assets/logo/logo.png';?>" alt="Quickai" width="127" height="29" /></a>
           </div><!-- Logo end -->

         </div>

         <div class="header-column justify-content-end">

          <nav class="primary-menu navbar navbar-expand-lg">
            <div id="header-nav" class="collapse navbar-collapse">
              <ul class="navbar-nav">
               <li class="dropdown"> <a class="dropdown-toggle" href="<?=base_url().'welcome';?>">Home</a>
               </li>
               <li class="dropdown"> <a class="dropdown-toggle" href="#">Cek Layanan</a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="<?=base_url().'layanan';?>">Cek Layanan</a></li>
                  <li><a class="dropdown-item" href="<?=base_url().'layanan/promo';?>">Promo</a></li>
                </ul>
              </li>
              <li class="dropdown dropdown-mega"> <a class="dropdown-toggle" href="<?=base_url().'tentang/galeri';?>">Galeri</a></li>
              <li class="dropdown"> <a class="dropdown-toggle" href="<?=base_url().'daftar';?>">Registrasi</a></li>
              <li class="dropdown"> <a class="dropdown-toggle" href="<?=base_url().'tentang/artikel';?>">Artikel</a></li>
              <li class="dropdown"> <a class="dropdown-toggle" href="<?=base_url().'welcome/panduan';?>">Panduan</a></li>
              <li class="dropdown"> <a class="dropdown-toggle" href="<?=base_url().'tentang';?>">Tentang Perusahaan</a></li>
              <?php if ($this->session->userdata('sudah_login') == true)  { ?>
               <li class=" dropdown active login-signup ml-lg-2"><a class="dropdown-toggle"  href="<?=base_url().'dashboard';?>"><?=$nama_jamaah;?><img src="<?=base_url('uploads/jamaah/').$fotonya;?>" class="d-none d-lg-inline-block" width="50" height="20"></i></a>
                <ul class="dropdown-menu">
                 <li><a class="dropdown-item" href="<?=base_url().'jamaah_login/logout';?>">Logout</a></li>
               </ul>
             </li>
           <?php }else{ ?>
             <li class="login-signup ml-lg-2"><a class="pl-lg-4 pr-0"  href="<?=base_url().'jamaah_login';?>" title="Login / Sign up">Login<span class="d-none d-lg-inline-block"><i class="fa fa-unlock"></i></span></a></li>
           <?php }?>
         </ul>
       </div>

     </nav><!-- Primary Navigation end --> 
   </div>

   <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#header-nav"> <span></span> <span></span> <span></span> </button>
 </div>
</div>
</header><!-- Header end -->
<br>

