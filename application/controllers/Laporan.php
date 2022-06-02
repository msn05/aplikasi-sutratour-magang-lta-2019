<?php
date_default_timezone_set('Asia/Jakarta');
class Laporan extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->library('datatables');
		$this->load->model(['users_model','jamaahm','jadwal_ke']);
		check_not_login();
	}

	function jamaah()
	{
		
		$data['web']=$this->users_model->website();
		$data['users'] = $this->users_model->dataLengkap($this->session->userdata('nomoridentitas'));

		$tgl_awal = $this->input->post('tgl_awal');
		$tgl_akhir = $this->input->post('tgl_akhir');

		$data['mk'] = $this->jamaahm->in($tgl_awal,$tgl_akhir);

		$this->load->view('users/cetak_laporan_jamaah', $data);
	}


	function keberangkatan($id_keberangkatan)
	{

		$data['web']         = $this->users_model->website();
		$data['mk']			 = $this->jadwal_ke->da($id_keberangkatan);
		$data['users']       = $this->users_model->dataLengkap($this->session->userdata('nomoridentitas'));
		
		$data['total'] 		 = $this->jadwal_ke->total($id_keberangkatan);
		$data['id_keberangkatan'] = $id_keberangkatan;
		$this->load->view('users/cetak_laporan_keberangkatan', $data);
	}

	function pembayaran($kode_pembayaran)
	{

		$data['web']         = $this->users_model->website();
		$data['mk']			 = $this->jadwal_ke->da($kode_pembayaran);
		$data['users']       = $this->users_model->dataLengkap($this->session->userdata('nomoridentitas'));

		
		$data['pembayaran'] = $kode_pembayaran;
		$this->load->view('users/cetak_laporan_pembayaran', $data);
	}

	function cetak_jamaah()
	{
		$data['web']=$this->users_model->website();
		
		$tgl_awal = $this->input->post('tgl_awal');
		$tgl_akhir = $this->input->post('tgl_akhir');

		$data['mk'] = $this->jamaahm->in($tgl_awal,$tgl_akhir);
		$this->load->library('pdf');
		$this->pdf->setPaper('A4', 'potrait');
		$this->pdf->filename = "laporan-data jamaah daftar.pdf";
		$this->pdf->load_view('users/cetak_jamaah', $data);
	}


	function cetak_keberangkatan($id_keberangkatan)
	{

		$data['web']=$this->users_model->website();
		$data['total'] 		 = $this->jadwal_ke->total($id_keberangkatan);
		$data['mk']			 		= $this->jadwal_ke->da($id_keberangkatan);
		$this->load->library('pdf');
		$this->pdf->setPaper('A4', 'potrait');
		$this->pdf->filename = "laporan-keberangkatan jamaah.pdf";
		$this->pdf->load_view('users/cetak_keberangkatan', $data);
	}
}	
