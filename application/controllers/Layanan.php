<?php
date_default_timezone_set('Asia/Jakarta');
class Layanan extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->library('datatables');
		$this->load->helper('tanggal_indo');
		$this->load->model(['users_model','jamaahm']);


	}

	function index()
	{
		
		if ($this->session->userdata('nomoridentitas')==true) {
			$row             = $this->jamaahm->d($this->session->userdata('nomoridentitas'));	
			$data=array(
				'nama_jamaah' =>$row->nama_jamaah,
				'fotonya'	=>$row->fotonya,
				'fotonya'	=>$row->fotonya,
			);
			$data['web']    		   = $this->users_model->website();
			$data['dp']     		   = $this->jamaahm->dp_layanan();
			$data['users']       = $this->users_model->dataLengkap($this->session->userdata('nomoridentitas'));
			$this->load->view('website/header_log', $data); 
			$this->load->view('cek_layanan_dan_jadwal', $data); 

		}else{
			$data['web']    		   = $this->users_model->website();
			$data['dp']     		   = $this->jamaahm->dp_layanan();
			$this->load->view('website/header', $data); 
			$this->load->view('cek_layanan_dan_jadwal', $data); 
		}
	}


	function promo()
	{
		
		if ($this->session->userdata('nomoridentitas')==true) {
			$row             = $this->jamaahm->d($this->session->userdata('nomoridentitas'));	
			$data=array(
				'nama_jamaah' =>$row->nama_jamaah,
				'fotonya'	=>$row->fotonya,
				'fotonya'	=>$row->fotonya,
			);
			$data['web']    		   = $this->users_model->website();
			$data['dp']     		   = $this->jamaahm->promo();
			$data['users']       = $this->users_model->dataLengkap($this->session->userdata('nomoridentitas'));
			$this->load->view('website/header_log', $data); 
			$this->load->view('promo', $data); 

		}else{
			$data['web']    		   = $this->users_model->website();
			$data['dp']     		   = $this->jamaahm->promo();
			$this->load->view('website/header', $data); 
			$this->load->view('promo', $data); 
		}
	}

	function cari($id)
	{
		$data['web']    		   = $this->users_model->website();
		$data['dp']     		   = $this->jamaahm->cariId($id);
		
		$data['id'] = $id;
		$this->load->view('website/layanannya', $data);
	}

	function cari_promo($id_promo_layanan)
	{
		$data['web']    		   = $this->users_model->website();
		$data['dp']     		   = $this->jamaahm->cariPromo($id_promo_layanan);
		
		$data['id_promo_layanan'] = $id_promo_layanan;
		$this->load->view('website/promonya', $data);
	}


}