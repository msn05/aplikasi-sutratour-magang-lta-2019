<?php
date_default_timezone_set('Asia/Jakarta');
class Error extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->library('datatables');
		$this->load->model('users_model');
		$this->session->unset_userdata('nomoridentitas');

	}

	function index()
	{
		$data['web']    		   = $this->users_model->website();
		$this->load->view('errors/error', $data); 

	}
}