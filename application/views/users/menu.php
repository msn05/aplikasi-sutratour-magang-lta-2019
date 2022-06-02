    <!-- Left Sidebar Menu -->
    <div class="fixed-sidebar-left">
      <ul class="nav navbar-nav side-nav nicescroll-bar" style="background-color: #990066">
        <li class="navigation-header">
          <span>Main</span> 
          <i class="zmdi zmdi-more"></i>
        </li>
        <li>
          <?php if($this->session->userdata('akses') ==1 || $this->session->userdata('akses') ==2 || $this->session->userdata('akses') ==3) { ?>
            <a href="<?=base_url().'page';?>" data-toggle="collapse" data-target="#dashboard_dr"><div class="pull-left"><i class="zmdi zmdi-landscape mr-20"></i><span class="right-nav-text">Dashboard</span></div><div class="clearfix"></div></a>
          </li>
        <?php }?>
        <?php if($this->session->userdata('akses') ==1) { ?>
          <li>
            <a class="active" href="javascript:void(0);" data-toggle="collapse" data-target="#pages_dr"><div class="pull-left"><i class="zmdi zmdi-menu mr-20"></i><span class="right-nav-text">Menu</span></div><div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div><div class="clearfix"></div></a>
            <ul id="pages_dr" class="collapse collapse-level-1 two-col-list">
              <li>
                <a href="javascript:void(0);" data-toggle="collapse" data-target="#auth_dr"><div class="pull-left"><i class="zmdi zmdi-menu mr-20"></i><span class="right-nav-text">Admin</span></div><div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div><div class="clearfix"></div></a>
                <ul id="auth_dr" class="collapse collapse-level-2">
                  <li><a href="<?=base_url().'page/transportasi_udaranya';?>">Data Transportasi Udara</a></li>
                  <li><a href="<?=base_url().'page/transportasi_daratnya';?>">Data Transportasi Darat</a></li>
                  <li><a href="<?=base_url().'page/data_layanan';?>">Data Layanan</a></li>

                  <li><a href="<?=base_url().'dataku_ota';?>">Data Jawal Keberangkatan Layanan</a></li>
                  <li><a href="<?=base_url().'page/data_Pro';?>">Data Promo</a></li>
                  <li><a href="<?=base_url().'data_atk';?>">Data Artikel</a></li>
                  <li><a href="<?=base_url().'page/data_userL';?>">Data User Login</a></li>
                  <li><a href="<?=base_url().'galeri';?>">Galery Foto</a></li>
                  <li><a href="<?=base_url().'page/website';?>">Tentang Perusahaan</a></li>
                </ul>
              <?php } ?>
            </li>

            <?php if($this->session->userdata('akses') ==1 || $this->session->userdata('akses') ==2) { ?>
             <li>
              <a href="javascript:void(0);" data-toggle="collapse" data-target="#invoice_dr"><div class="pull-left"><i class="zmdi zmdi-menu mr-20"></i><span class="right-nav-text">Marketing</span></div><div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div><div class="clearfix"></div></a>
              <ul id="invoice_dr" class="collapse collapse-level-2">
                <li><a href="<?=base_url().'page/data_pro';?>">Data Promo </a></li>
                <li><a href="<?=base_url().'data_atk';?>">Data Artikel </a></li>
              </ul>
            <?php } ?>
          </li> 
          <li>
            <?php if($this->session->userdata('akses') ==1 || $this->session->userdata('akses') ==3) { ?>
              <a href="javascript:void(0);" data-toggle="collapse" data-target="#dr"><div class="pull-left"><i class="zmdi zmdi-menu mr-20"></i><span class="right-nav-text">Pimpinan</span></div><div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div><div class="clearfix"></div></a>
              <ul id="dr" class="collapse collapse-level-2">
               <!-- <li><a href="<?=base_url().'page/djp';?>">Data Jabatan Pegawai</a></li> -->
               <li><a href="<?=base_url().'jamaah/laporan';?>">Data Laporan Jamaah Daftar </a></li>
               <li><a href="<?=base_url().'jadwal/laporan';?>">Data Laporan Keberangkatan Jamaah</a></li>
               <!-- <li><a href="<?=base_url().'jamaah/laporan_pembayaran';?>">Laporan Pembayaran Jamaah </a></li> -->
             </ul>
           </li> 
         <?php } ?>
         <?php if($this->session->userdata('akses') ==1){ ?>
           <li>
            <a href="javascript:void(0);" data-toggle="collapse" data-target="#br"><div class="pull-left"><i class="zmdi zmdi-menu mr-20"></i><span class="right-nav-text">Jamaah</span></div><div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div><div class="clearfix"></div></a>
            <ul id="br" class="collapse collapse-level-2">
             <li><a href="<?=base_url().'jamaah';?>">Data Jamaah </a></li>
             <li><a href="<?=base_url().'jadwal';?>">Data Keberangkatan Jamaah</a></li>
             <li><a href="<?=base_url().'jamaah/detail_pembayaran_jamaah';?>">Histori Pembayaran Jamaah </a></li>
             <!-- <li><a href="<?=base_url().'jamaah/histori_pendaftaran';?>">Histori Pendaftaran </a></li> -->
           </ul>
         <?php } ?>
       </li>
       <!-- <li> -->
<!--          <?php if($this->session->userdata('akses') ==1){ ?>
          <a href="javascript:void(0);" data-toggle="collapse" data-target="#histori"><div class="pull-left"><i class="zmdi zmdi-menu mr-20"></i><span class="right-nav-text">Histori</span></div><div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div><div class="clearfix"></div></a>
          <ul id="histori" class="collapse collapse-level-2">
           <li><a href="<?=base_url().'jadwal/h';?>">Histori Data Keberangkatan</a></li>
           <li><a href="<?=base_url().'page/Hdp';?>">Histori Data Promo</a></li>
         </ul>
       <?php } ?>
     </li> -->
   </ul>
 </li>
</ul>
</div>
<!-- Right Sidebar Backdrop -->
<div class="right-sidebar-backdrop"></div>
<!-- /Right Sidebar Backdrop -->

<!-- Main Content -->
<div class="page-wrapper">
  <div class="container-fluid">
