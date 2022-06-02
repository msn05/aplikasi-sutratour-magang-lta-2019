<?php

class Tentang extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->library('pagination');
    $this->load->helper('tanggal_indo');
    $this->load->model(['users_model','galerim','jamaahm','data_atknya']);
  }


  function jadwal_layanan_info()
  {
    $data['web']               = $this->users_model->website();
    $data['users']             = $this->users_model->dataLengkap($this->session->userdata('nomoridentitas'));

    $this->load->view('cek_layanan_dan_jadwal', $data); 
  }

  function index()
  {
    if ($this->session->userdata('nomoridentitas')==true) {
            # code...
      $row             = $this->jamaahm->d($this->session->userdata('nomoridentitas'));
      $data=array(
       'nama_jamaah' =>$row->nama_jamaah,
       'fotonya'	=>$row->fotonya,
       'fotonya'	=>$row->fotonya,
     );
      $data['web']	=$this->users_model->website();
      $this->load->view('website/header_log', $data);
      $this->load->view('website/tentang', $data);
    }else{
      $data['web']    =$this->users_model->website();
      $this->load->view('website/header', $data);
      $this->load->view('website/tentang', $data);

    }
  }



  function jenis(){
    $row             = $this->jamaahm->d($this->session->userdata('nomoridentitas'));
    $data=array(
     'nama_jamaah' =>$row->nama_jamaah,
     'fotonya'	=>$row->fotonya,
     'fotonya'	=>$row->fotonya,
   );
    $jenis_kegiatan =$this->input->post('jenis_kegiatan');
    $data['web']	=$this->users_model->website();
    $data['cs']		= $this->galerim->jenis_kegiatannya($jenis_kegiatan);
    $this->load->view('website/galeri_foto', $data);
  }

  function galeri()
  {
             if ($this->session->userdata('nomoridentitas')==true) {

          $row             = $this->jamaahm->d($this->session->userdata('nomoridentitas'));
          $j = ['1'=>'Manasik','2'=>'Tawaf'];
          $data=array(
           'nama_jamaah' =>$row->nama_jamaah,
           'j'=>$j,
           'fotonya'	=>$row->fotonya,
         );


          $jenis_kegiatan =$this->input->post('jenis_kegiatan');
          $data['cs']     = $this->galerim->jenis_kegiatannya($jenis_kegiatan);
          $data['data'] = $this->galerim->ambek_data();           
          $data['web']    =$this->users_model->website();


          $this->load->view('website/header_log', $data);
          $this->load->view('website/galeri_foto', $data);
        }else{
          $j = ['1'=>'Manasik','2'=>'Tawaf'];
          $data=array(
           'j'=>$j,
         );

          $jenis_kegiatan =$this->input->post('jenis_kegiatan');
          $data['cs']     = $this->galerim->jenis_kegiatannya($jenis_kegiatan);
          $data['data'] = $this->galerim->ambek_data();           
          $data['web']    =$this->users_model->website();


          $this->load->view('website/header', $data);
          $this->load->view('website/galeri_foto', $data);
        }
      }

      function artikel()
      {
        //konfigurasi pagination
        $config['base_url'] = site_url('tentang/artikel'); //site url
        $config['total_rows'] = $this->db->count_all('data_artikel'); //total row
        $config['per_page'] = 6;  //show record per halaman
        $config["uri_segment"] = 3;  // uri parameter
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = floor($choice);

        // Membuat Style pagination untuk BootStrap v4
        $config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';

        if ($this->session->userdata('nomoridentitas')== true) {

          $row             = $this->jamaahm->d($this->session->userdata('nomoridentitas'));
          $j = ['1'=>'Manasik','2'=>'Tawaf'];
          $data=array(
            'nama_jamaah' =>$row->nama_jamaah,
            'j'=>$j,
            'fotonya' =>$row->fotonya,
          );
          $this->pagination->initialize($config);
          $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

          $data['a'] = $this->galerim->amar($config["per_page"], $data['page']);           
          $data['pagination'] = $this->pagination->create_links();
          $data['web']	=$this->users_model->website();

          $this->load->view('website/header_log', $data);
          $this->load->view('website/artikel', $data);

        }else{

         $j = ['1'=>'Manasik','2'=>'Tawaf'];
         $data=array(
          'j' =>$j,
        );
         $this->pagination->initialize($config);
         $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
         $data['a'] = $this->galerim->amar($config["per_page"], $data['page']);           
         $data['pagination'] = $this->pagination->create_links();
         $data['web']    =$this->users_model->website();

         $this->load->view('website/header', $data);
         $this->load->view('website/artikel', $data);
       }
     }

     function baca($id_artikel)
     {
      if ($this->session->userdata('nomoridentitas')==true) {
        $row             = $this->jamaahm->d($this->session->userdata('nomoridentitas'));
        $data=array(
          'nama_jamaah' =>$row->nama_jamaah,
          'fotonya'   =>$row->fotonya,
          'fotonya'   =>$row->fotonya,
        );
        $data['da']  = $this->data_atknya->baca($id_artikel);
        $data['web']    =$this->users_model->website();
        $this->load->view('website/header_log',$data);
        $this->load->view('website/baca', $data);

      }else{
       $data['da']  = $this->data_atknya->baca($id_artikel);
       $data['web']    =$this->users_model->website();
       $this->load->view('website/header', $data);
       $this->load->view('website/baca', $data);

     }
   }



 }