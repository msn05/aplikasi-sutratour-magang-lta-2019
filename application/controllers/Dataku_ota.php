<?php
date_default_timezone_set('Asia/Jakarta');
class Dataku_ota extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->library('datatables');
		$this->load->model('users_model');
		$this->load->model('dataku_otam');
		check_not_login();
	}

	function index()
	{
		$data['web']=$this->users_model->website();
		$data['users'] = $this->users_model->dataLengkap($this->session->userdata('nomoridentitas'));
		$data['dp'] = $this->dataku_otam->layanan();
		$data['kode'] = $this->dataku_otam->kode_jadwal_keberangkatannyo();

		$this->load->view('users/data_kuota', $data);

	}

	function dataku()
	{
		header('Content-Type: application/json');
		echo $this->dataku_otam->jadwal_keberangkatannyo();
	}

	function TambahKu()
	{
		
		$this->form_validation->set_rules('nama_layanan','nama_layanan', 'required|trim');
		// $this->form_validation->set_rules('bulan_keberangkatan','bulan_keberangkatan', 'required|trim|is_unique[jadwal_keberangkatan.bulan_keberangkatan]',['required' => 'Wajib Diisi.','is_unique' => 'Terdapat Kode Yang Sudah Terinput..!']);

		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Terjadi Kesalahan.</div>');
			redirect(site_url('dataku_ota'));
		}else{

			$nama_layanan 					= $this->input->post('nama_layanan');
			$tpk 							= date('Y-m-d H:i:s');
			$bulan_keberangkatan			= $this->input->post('bulan_keberangkatan');
			$nomoridentitas 				= $this->session->userdata('nomoridentitas');
			$berhasil = [
				'id_data_layanan'  				=> htmlspecialchars($this->input->post('nama_layanan')),
				'tgl_post'    					=> $tpk,
				'bulan_keberangkatan'           => htmlspecialchars($this->input->post('bulan_keberangkatan')),
				'id_user'  						=> $nomoridentitas,
			];

			$this->dataku_otam->simpan($berhasil,$kode_jadwal_keberangkatan);
			$this->session->set_flashdata('message','<div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Berhasil Ditambahkan.</div>');
			redirect('dataku_ota');
		}
	}


	// function HapusKu()
	// {
	// 	$kode_jadwal_keberangkatan=$this->input->post('kode_jadwal_keberangkatan');
	// 	$this->dataku_otam->hapusKu($kode_jadwal_keberangkatan);
	// 	$this->session->set_flashdata('message','<div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Berhasil Dihapus.</div>');
	// 	redirect('dataku_ota');
	// }

	function UpdateKuotanyo()
	{
		$kode_jadwal_keberangkatan 						= $this->input->post('kode_jadwal_keberangkatan');
		$nama_layanan 		= $this->input->post('nama_layanan');
		$tpk 											= date('Y-m-d H:i:s');
		$bulan_keberangkatan 											= $this->input->post('bulan_keberangkatan');
		$nomoridentitas = $this->session->userdata('nomoridentitas');
		$berhasil = [
			'id_data_layanan'=> htmlspecialchars($this->input->post('nama_layanan')),
			'tgl_post' => $tpk,
			'bulan_keberangkatan'            => htmlspecialchars($this->input->post('bulan_keberangkatan')),
			'id_user'  						=> $nomoridentitas,
		];

		$this->dataku_otam->Update($berhasil,$kode_jadwal_keberangkatan);
		$this->session->set_flashdata('message','<div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Berhasil Ditambahkan.</div>');
		redirect('dataku_ota');
	}


}


