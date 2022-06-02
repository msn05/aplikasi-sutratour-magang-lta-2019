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
  <link href="<?=base_url().'assets/html/full-width-light/dist/css/select2.min.css" rel="stylesheet';?>" type="text/css">
  <link href="<?=base_url().'assets/html/full-width-light/dist/css/style.css';?>" rel="stylesheet" type="text/css">


  <link href="<?=base_url().'assets/html/vendors/bower_components/sweetalert/dist/sweetalert.css" rel="stylesheet';?>" type="text/css">

  <style>
    .datepicker{z-index:1151;}
  </style>
  
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
            <a href="<?=base_url().'page';?>">
              <img width="30px" class="user-auth-img img-circl" src="<?=base_url('assets/logo/'). $row->foto;?>" alt="user_auth"/>
              <span class="brand-text">SUTRA TOUR</span>
            </a>
          </div>
        </div>  
        <a id="toggle_nav_btn" class="toggle-left-nav-btn inline-block ml-20 pull-left" href="javascript:void(0);"><i class="zmdi zmdi-menu"></i></a>
        <a id="toggle_mobile_nav" class="mobile-only-view" href="javascript:void(0);"><i class="zmdi zmdi-more"></i></a>
      </div>
      <div id="mobile_only_nav" class="mobile-only-nav pull-right">
        <ul class="nav navbar-right top-nav pull-right">
          <li class="dropdown auth-drp">
            <?php foreach ($users as $data);?> 
            <a href="#" class="dropdown-toggle pr-0" data-toggle="dropdown">Selamat datang,  <?=$data->nama;?> <img src="<?=base_url('uploads/foto/') . $data->foto;?>" alt="user_auth" class="user-auth-img img-circle"/><span class="user-online-status"></span></a>
            <ul class="dropdown-menu user-auth-dropdown" data-dropdown-in="flipInX" data-dropdown-out="flipOutX">
              <li>
                <a href="<?=site_url().'page/profile';?>"><i class="zmdi zmdi-account"></i><span>Profile</span></a>
              </li>
              <li class="divider"></li>
              <li>
                <a href="<?=base_url().'users_login/logout';?>"><i class="zmdi zmdi-power"></i><span>Log Out</span></a>
              </li>
            </ul>
          </li>
        </ul>
      </div>  
    </nav>


