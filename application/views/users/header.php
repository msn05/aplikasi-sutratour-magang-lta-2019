<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
  <?php foreach ($web as $row);?>
  <title><?=$row->nama_perusahaan;?></title>
  <meta name="description" content="Snoopy is a Dashboard & Admin Site Responsive Template by hencework." />
  <meta name="keywords" content="admin, admin dashboard, admin template, cms, crm, Snoopy Admin, Snoopyadmin, premium admin templates, responsive admin, sass, panel, software, ui, visualization, web app, application" />
  <meta name="author" content="hencework"/>

  <!-- Favicon -->
  <!-- <link rel="shortcut icon" href="favicon.ico"> -->
  <link rel="icon" href="<?=base_url().'assets/logo/perusahaan.ico';?>" type="image/x-icon">
  <link href="<?=base_url().'assets/html/vendors/bower_components/datatables/media/css/jquery.dataTables.min.css';?>" rel="stylesheet" type="text/css"/>
  <link rel="stylesheet" href="<?=base_url().'assets/html/vendors/bower_components/summernote/dist/summernote.css';?>" />
  <link rel="stylesheet" href="<?=base_url().'assets/html/vendors/bower_components/datepicker/datepicker.css';?>" />
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
  <link href="<?=base_url().'assets/html/full-width-light/dist/css/select2.min.css" rel="stylesheet';?>" type="text/css">
  <link href="<?=base_url().'assets/html/full-width-light/dist/css/style.css';?>" rel="stylesheet" type="text/css">
  <link href="<?=base_url().'assets/html/vendors/bower_components/sweetalert/dist/sweetalert.css" rel="stylesheet';?>" type="text/css">
</head>

<body>

  <div class="preloader-it">
    <div class="la-anim-1"></div>
  </div>
  <!--/Preloader-->
  <div class="wrapper  theme-1-active pimary-color-blue">

    <!-- Top Menu Items -->
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="mobile-only-brand pull-left">
        <div class="nav-header pull-left">
          <div class="logo-wrap">
            <a href="<?=base_url().'welcome';?>">
              <img width="30px" class="user-auth-img img-circl" src="<?=base_url('assets/logo/'). $row->foto;?>" alt="user_auth"/>
              <span class="brand-text">SUTRA TOUR</span>
            </a>
          </div>
        </div>  
        
      </div>



