<!DOCTYPE html>
<html>
<head lang="en">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title><?=$title;?></title>

  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/backend/css/separate/pages/login.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/backend/css/lib/font-awesome/font-awesome.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/backend/css/lib/bootstrap/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/backend/css/main.css">
</head>
<body>
  <div class="page-center" >
    <div class="page-center-in" style=" background-image: linear-gradient(-90deg,#8A2BE2, #8B008B);">
      <div class="container-fluid">
        <form action="<?=site_url('users_login/login_karyawan'); ?>" class="sign-box" method="post">
          <div class="sign-avatar"> <img src="<?php echo base_url()?>assets/backend/img/avatar-sign.png" alt=""> </div>
          <header class="sign-title">Sign In</header>
          <div class="row">
            <div class="col-md-12">
              <?= $this->session->flashdata('message');?>
              <div class="form-group">
                <input type="text" name="email" id="email" class="form-control" placeholder="E-Mail"/>
                <?=form_error('email','<small  class="text-danger pl-2">','</small>')?>
              </div>
              <div class="form-group">
                <input type="password" name="password" id="password" class="form-control" placeholder="Password" />
                <?=form_error('password','<small  class="text-danger pl-2">','</small>')?>
              </div>
              <input type="submit" class="btn btn-rounded" value="Sign in">
            </form>
          </div>
        </div>
      </div>
      <!--.page-center--> 

      <script src="<?php echo base_url();?>assets/backend/js/lib/jquery/jquery.min.js"></script> 
      <script src="<?php echo base_url();?>assets/backend/js/lib/tether/tether.min.js"></script> 
      <script src="<?php echo base_url();?>assets/backend/js/lib/bootstrap/bootstrap.min.js"></script> 
      <script src="<?php echo base_url();?>assets/backend/js/plugins.js"></script> 
      <script src="<?php echo base_url();?>assets/backend/js/lib/match-height/jquery.matchHeight.min.js"></script> 
      <script>
        $(function() {
          $('.page-center').matchHeight({
            target: $('html')
          });

          $(window).resize(function(){
            setTimeout(function(){
              $('.page-center').matchHeight({ remove: true });
              $('.page-center').matchHeight({
                target: $('html')
              });
            },100);
          });
        });
      </script> 
      <script src="<?php echo base_url();?>assets/backend/js/app.js"></script>
    </body>
    </html>