    <?php $this->load->view('users/home');?> <!--Include menu-->
    <?php $this->load->view('users/menu');?> <!--Include menu-->

    <div class="row heading-bg">
    	<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
    		<h5 class="txt-dark">Dashboard</h5>
    	</div>
    	<!-- Breadcrumb -->
    	<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
    		<ol class="breadcrumb">
    			<li><a href="<?=base_url().'page';?>">Dashboard</a></li>
    		</ol>
    	</div>
    	<!-- /Breadcrumb -->
    </div>
    <?php foreach ($users as $key) ;?>
    <div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Anda Telah Login sebagai <?=$key->nama_akses;?>.</div>
    <div class="row">
    	<a href="<?=base_url().'jadwal';?>">
    		<div class="col-lg-4 col-md-3 col-sm-3 col-xs-12">
    			<div class="panel panel-default card-view panel-refresh panel-info">
    				<div class="refresh-container">
    					<div class="la-anim-1"></div>
    				</div>
    				<div class="panel-heading">
    					<h6 class="txt-dark" align="center">Keberangkatan</h6>
    					<div class="clearfix"></div>
    				</div>
    				<div class="panel-wrapper collapse in">
    					<div class="panel-body">
    						<div class="panel-heading" align="
    						center">
    						<i class="fa fa-plane fa-3x"></i>
    					</div>
    				</div>	
    			</div>
    		</div>
    	</div>
    </a>
    <a href="<?=base_url().'dataku_ota';?>">
    	<div class="col-lg-4 col-md-3 col-sm-3 col-xs-12">
    		<div class="panel panel-default card-view panel-refresh panel-primary">
    			<div class="refresh-container">
    				<div class="la-anim-1"></div>
    			</div>
    			<div class="panel-heading">
    				<h6 class="txt-dark" align="center"> Jadwal Keberangkatan</h6>
    				<div class="clearfix"></div>
    			</div>
    			<div class="panel-wrapper collapse in">
    				<div class="panel-body">
    					<div class="panel-heading" align="
    					center">
    					<i class="fa fa-calendar-o fa-3x"></i>
    				</div>
    			</div>	
    		</div>
    	</div>
    </div>
</a>
<div class="col-lg-4 col-md-3 col-sm-3 col-xs-12">
	<div class="panel panel-default card-view panel-refresh panel-warning">
		<div class="refresh-container">
			<div class="la-anim-1"></div>
		</div>
		<div class="panel-heading">
			<a href="<?=base_url().'page/data_Pro';?>">
				<h6 class="txt-dark" align="center"> Promo</h6>
				<div class="clearfix"></div>
			</div>
			<div class="panel-wrapper collapse in">
				<div class="panel-body">
					<div class="panel-heading" align="
					center">
					<i class="fa fa-percent fa-3x"> <?php foreach ($totalpromo as $key);?><?=$key;?></i></a>
				</div>
			</div>	
		</div>
	</div>
</div>
<a href="<?=base_url().'jamaah';?>">
	<div class="col-lg-4 col-md-3 col-sm-3 col-xs-12">
		<div class="panel panel-default card-view panel-refresh">
			<div class="refresh-container">
				<div class="la-anim-1"></div>
			</div>
			<div class="panel-heading">
				<h6 class="txt-dark" align="center"> Jamaah</h6>
				<div class="clearfix"></div>
			</div>
			<div class="panel-wrapper collapse in">
				<div class="panel-body">
					<div class="panel-heading" align="
					center">
					
					<i class="fa fa-users fa-3x"> <?php foreach ($total as $jamaah);?><?=$jamaah;?></i>
				</div>
			</div>	
		</div>
	</div>
</div>
</a>
<div class="col-lg-4 col-md-3 col-sm-3 col-xs-12">
	<div class="panel panel-default card-view panel-refresh panel-danger">
		<div class="refresh-container">
			<div class="la-anim-1"></div>
		</div>
		<div class="panel-heading">
			<a href="<?=base_url().'page/data_userL';?>"><h6 class="txt-dark" align="center"> Users Login</h6>
			<div class="clearfix"></div>
		</div>
		<div class="panel-wrapper collapse in">
			<div class="panel-body">
				<div class="panel-heading" align="
				center">
			<i class="fa fa-user fa-3x"> <?php foreach ($totalUlk as $ulk);?><?=$ulk;?></i></a>
			</div>
		</div>	
	</div>
</div>
</div>	
<a href="<?=base_url().'laporan';?>">
	<div class="col-lg-4 col-md-3 col-sm-3 col-xs-12">
		<div class="panel panel-default card-view panel-refresh panel-success">
			<div class="refresh-container">
				<div class="la-anim-1"></div>
			</div>
			<div class="panel-heading">
				<h6 class="txt-dark" align="center"> Laporan</h6>
				<div class="clearfix"></div>
			</div>
			<div class="panel-wrapper collapse in">
				<div class="panel-body">
					<div class="panel-heading" align="
					center">
					<i class="fa fa-file-archive-o fa-3x"></i>
				</div>
			</div>	
		</div>
	</div>
</div>
</a>

</div>	

<?php $this->load->view('users/footer');?> <!--Include menu-->

