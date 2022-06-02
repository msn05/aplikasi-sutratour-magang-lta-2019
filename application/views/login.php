<?php $this->load->view('website/header');?>
<div class="container">
  <section class="section" >
    <div id="login-signup-page" class="bg-light shadow-md rounded mx-auto p-4">
      <ul class="nav nav-tabs" role="tablist">
        <li class="nav-item"> <a id="login-page-tab" class="nav-link text-4" data-toggle="tab" href="" role="tab" aria-controls="login" aria-selected="true">Login</a> </li>
      </ul>
      <?= $this->session->flashdata('message');?>
      <div class="tab-content pt-4">
        <div class="tab-pane fade show active" role="tabpanel" aria-labelledby="login-page-tab">
          <form action="<?=site_url('jamaah_login/login'); ?>" class="sign-box" method="post">
            <div class="form-group">
              <input type="text" class="form-control" id="email" name="email" placeholder="Email Anda">
              <?=form_error('email','<small  class="text-danger pl-2">','</small>')?>
            </div>
            <div class="form-group">
              <input type="password" class="form-control" id="password" name="password" placeholder="Password">
              <?=form_error('email','<small  class="text-danger pl-2">','</small>')?>
            </div>
            <button class="btn btn-primary btn-block" type="submit">Login</button>
          </form>
        </div>
      </div>
    </div>
  </section>
</div>


<?php $this->load->view('website/footer');?>
