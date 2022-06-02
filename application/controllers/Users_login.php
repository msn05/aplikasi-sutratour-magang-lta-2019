<?php

class Users_login extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('users_model');
 }


 function login_karyawan()
 {
  $this->form_validation->set_rules('email','email','required|trim|valid_email',['required' => 'Wajib Diisi.','valid_email'=>'Tidak Sesuai Formatnya..']);
  $this->form_validation->set_rules('password','Password','required|trim',['required' => 'Wajib Diisi.']);

  if ($this->form_validation->run() ==false)
  {
   check_already_login();
   $data['title'] = 'SUTRA TOUR HIDAYAH';
   $data['footer'] = 'Created By Dimas & Satrio PalComTech 2019';
   $this->load->view('users/login', $data);

 }else{

   $email        = htmlspecialchars($this->input->post('email'));
   $password     = htmlspecialchars($this->input->post('password'));

   $user = $this->db->get_where('user', ['email' => $email])->row_array();

   if ($user['aktiv_dak'] == 1) {

    if (password_verify($password, $user['password'])) {

     $data = [
      'nomoridentitas'  => $user['nomoridentitas'],
      'email'           => $user['email'],
      'akses'           => $user['akses'],
      'sudah_login'     => (bool)true

    ];

    $this->session->set_userdata($data);

    $jam =[

      'login_akun' => date('Y-m-d H:i:s')
    ];

    $this->db->update('user',$jam);
    redirect('page');

  }else{

   $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Password dan Username Salah.</div>');
   redirect('users_login/login_karyawan');

 }

}else{
  $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Akun Belum Aktiv.</div>');
  redirect('users_login/login_karyawan');

}

}
}
public function logout()
{
  $this->session->unset_userdata('email');
  $this->session->unset_userdata('akses');
  $this->session->unset_userdata('nomoridentitas');

  $jam =[

   'login_akun' => date('Y-m-d H:i:s')
 ];



 $this->db->update('user',$jam);

 $this->session->set_flashdata('message','<div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
   Anda Berhasil Keluar.
   </div>');
 header('location: '.base_url().'users_login/login_karyawan');
}

}
