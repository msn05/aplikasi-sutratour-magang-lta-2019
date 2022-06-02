<?php $this->load->view('users/home');?> <!--Include menu-->
<?php $this->load->view('users/menu');?> <!--Include menu-->

<div class="row heading-bg">
 <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
  <h5 class="txt-dark">Histori Perubahan Data Promo</h5>
</div>
<!-- Breadcrumb -->
<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
  <ol class="breadcrumb">
   <li><a href="#">Page</a></li>
   <li><a href="index.html">Histori Data Promo</a></li>
 </ol>
</div>
<!-- /Breadcrumb -->
</div>
<div class="row">
  <div class="col-sm-7">
    <div class="panel panel-default card-view">
      <div class="panel-heading">
        <div class="pull-left">
         <h6 class="panel-title txt-dark">Histori Data Promo </h6>
       </div>
       <div class="clearfix"></div>
     </div>
     <div class="clearfix"></div>
     <div class="panel-wrapper collapse in">
      <div class="panel-body">
        <div class="table-wrap">
          <div class="table-responsive">
            <table id="hdp" class="table table-hover display  pb-30" >
              <thead>
                <tr>
                  <th>Kode Promo</th>
                  <th>Nama Users</th>
                  <th>Tanggal Update</th>
                  <th>Keterangan</th>
                </tr>
              </thead>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>	
</div>

<?php $this->load->view('users/footer');?> <!--Include menu-->
