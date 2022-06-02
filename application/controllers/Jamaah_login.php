<?php

class Jamaah_login extends CI_Controller{

	function __construct()
	{
    parent::__construct();
    $this->load->library('form_validation');
    $this->load->model('users_model');
    

  }

  function index()
  {
    $data['web']=$this->users_model->website();
    $this->load->view('login', $data);
  }




  function login()
  {
    lah();
    $this->form_validation->set_rules('email','email','required|trim|valid_email',['required' => 'Wajib Diisi.','valid_email'=>'Tidak Sesuai Formatnya..']);
    $this->form_validation->set_rules('password','Password','required|trim',['required' => 'Wajib Diisi.']);

    if ($this->form_validation->run() ==false)
    {
     lah();
     $data['web']=$this->users_model->website();
     $this->load->view('login', $data);

   }else{

     $email        = htmlspecialchars($this->input->post('email'));
     $password     = htmlspecialchars($this->input->post('password'));

     $user = $this->db->get_where('user', ['email' => $email])->row_array();

     if ($user) {


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
        if ($user['akses'] == 4) {
          redirect('dashboard');

        }else{
          redirect('page');
        }

      }else{

       $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Password dan Username Salah.</div>');
       redirect('jamaah_login');

     }

   }else{
    $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Akun Belum Aktiv.</div>');
    redirect('jamaah_login');

  }
}else{
 $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Email Tidak Terdaftar.</div>');
 redirect('jamaah_login');
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
 header('location: '.base_url().'jamaah_login');
}

}
