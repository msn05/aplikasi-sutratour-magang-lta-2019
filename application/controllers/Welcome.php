<?php

class Welcome extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model(['users_model','galerim','jamaahm']);
	}

	function index()
	{
		if ($this->session->userdata('nomoridentitas')==true) {
			$row             = $this->jamaahm->d($this->session->userdata('nomoridentitas'));
			$data=array(
				'nama_jamaah' =>$row->nama_jamaah,
				'fotonya'	=>$row->fotonya,
			);
			$data['cs']		= $this->galerim->galer();
			$data['web'		]=$this->users_model->website();
			$this->load->view('website/header_log', $data);
			$this->load->view('index', $data);
		}else{

			$data['cs']		= $this->galerim->galer();
			$data['web']=$this->users_model->website();

			$this->load->view('website/header', $data);
			$this->load->view('index', $data);
		}
	}

	
	function panduan()
	{
		if ($this->session->userdata('nomoridentitas')==true) {
			$row             = $this->jamaahm->d($this->session->userdata('nomoridentitas'));
			$data=array(
				'nama_jamaah' =>$row->nama_jamaah,
				'fotonya'	=>$row->fotonya,
			);
			$row             = $this->jamaahm->d($this->session->userdata('nomoridentitas'));
			$data=array(
				'nama_jamaah' =>$row->nama_jamaah,
				'fotonya'	=>$row->fotonya,
			);
			$data['cs']		= $this->galerim->galer();
			$data['web'		]=$this->users_model->website();
			$this->load->view('website/header_log', $data);
			$this->load->view('panduan', $data);
		}else{
			$data['cs']		= $this->galerim->galer();
			$data['web'		]=$this->users_model->website();
			$this->load->view('website/header', $data);
			$this->load->view('panduan', $data);
		}
	}


}