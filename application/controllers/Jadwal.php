<?php
date_default_timezone_set('Asia/Jakarta');
class Jadwal extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->library('datatables');
		$this->load->model(['users_model','jamaahm','jadwal_ke']);
		check_not_login();
	}

	function delete($id_keberangkatan)
	{

		$this->jadwal_ke->deletenyO($id_keberangkatan);
		$this->index();
		
	}

	function lihat($id_keberangkatan)
	{

		$row			 		= $this->jadwal_ke->ambek_idnyo($id_keberangkatan);
		$data = array(
			'nama_jamaah' 		=>$row->nama_jamaah,
			'no_ktp'			=>$row->no_ktp,
			'no_telephone'		=>$row->no_telephone,
			'email'				=>$row->email,
			'id' 	=> $row->id,
			'id_keberangkatan' 	=> $row->id_keberangkatan,
			'id_jamaah_vik' 	=> $row->id_jamaah_vik,
			'tgl_keberangkatan' 	=> $row->tgl_keberangkatan,
		);
		$data['web']         = $this->users_model->website();
		$data['k']			 		= $this->jadwal_ke->am($id_keberangkatan);
		$data['bulan'] = $this->jadwal_ke->caribulan();
		$data['users']       = $this->users_model->dataLengkap($this->session->userdata('nomoridentitas'));

		$this->load->view('users/liatnah',$data);
	}


	function index()
	{

		$row = $this->jadwal_ke->ambek();
		
		$data['web']=$this->users_model->website();
		$data['users'] = $this->users_model->dataLengkap($this->session->userdata('nomoridentitas'));
		$data['bulan'] = $this->jadwal_ke->caribulan();
		$data['kodenya'] = $this->jadwal_ke->kode();

		$this->load->view('users/jadwalnya', $data);
	}

	function h()
	{

		$row = $this->jadwal_ke->ambek();
		$data = array(
			'id_keberangkatan' => $row->id_keberangkatan,
			'tgl_keberangkatan' => $row->tgl_keberangkatan,
		);
		$data['web']=$this->users_model->website();
		$data['users'] = $this->users_model->dataLengkap($this->session->userdata('nomoridentitas'));
		$data['bulan'] = $this->jadwal_ke->caribulan();
		$data['kodenya'] = $this->jadwal_ke->kode();

		$this->load->view('users/hdk', $data);
	}

	function hapuslah($id)
	{
		$id=$this->input->post('id');
		$this->jadwal_ke->hapusDio($id);
	}


	function TambahJB()
	{
		$this->form_validation->set_rules('id_daftar[]','id_daftar[]', 'required|trim|max_length[20]|is_unique[keberangkatan_jamaah.id_jamaah_vik]',['required' => 'Wajib Diisi.','is_unique' => 'Kode Yang Sudah Terinput..!']);
		$this->form_validation->set_rules('tgl_keberangkatan','tgl_keberangkatan', 'required|trim|max_length[20]|is_unique[keberangkatan_jamaah.tgl_keberangkatan]',['required' => 'Wajib Diisi.','is_unique' => 'Tagngal Sudah Terinput..!']);

		$data['web']=$this->users_model->website();
		$data['users'] = $this->users_model->dataLengkap($this->session->userdata('nomoridentitas'));
		$data['dp'] = $this->jamaahm->dp_layanan();
		$data['kode_pembayaran']   = $this->jamaahm->kode_pembayaran(); 


		if($this->form_validation->run() == false){
			$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Jamaah Tersebut Telah Dijadwalkan Berangkat!</div>');
			redirect('jadwal',$data);

		}else{
			$nomoridentitas 		= $this->session->userdata('nomoridentitas');
			$id_keberangkatan 		= $this->input->post('id_keberangkatan');
			$id_daftar 				= $this->input->post('id_daftar');
			$tgl_keberangkatan 		= $this->input->post('tgl_keberangkatan');
			$status_keberangkatanJ = 'Sudah Pernah Terjadwalkan Berangkat' ;
			
			foreach($id_daftar as $k => $v){
				$dataK[$k]['id_keberangkatan']=$id_keberangkatan;
				$dataK[$k]['id_admin_input']=$nomoridentitas;
				$dataK[$k]['id_jamaah_vik']=$v;
				$dataK[$k]['tgl_keberangkatan']=$tgl_keberangkatan;
				$dataK[$k]['keterangan']='Sudah Lengkap Dan Siap Berangkat';
				$UpdateJ[$k]['id_daftar']=$v;
				$UpdateJ[$k]['status_keberangkatanJ'] = $status_keberangkatanJ	;
			}
			if (
				$this->db->insert_batch('keberangkatan_jamaah', $dataK) &&
				$this->db->update_batch('jamaah_daftar',$UpdateJ,'id_daftar')){

				$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Berhasil Ditambahkan!</div>');
				redirect('jadwal');

			}else{
				$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Terjadi Kesalahan!</div>');
				redirect('jadwal');	
			}
		}
	}

	function TambahBaru()
	{
		$this->form_validation->set_rules('nama_jamaah[]','nama_jamaah[]', 'required|trim|max_length[20]|is_unique[keberangkatan_jamaah.id_jamaah_vik]',['required' => 'Wajib Diisi.','is_unique' => 'Kode Yang Sudah Terinput..!']);


		$data['web']=$this->users_model->website();
		$data['users'] = $this->users_model->dataLengkap($this->session->userdata('nomoridentitas'));
		$data['dp'] = $this->jamaahm->dp_layanan();
		$data['kode_pembayaran']   = $this->jamaahm->kode_pembayaran(); 


		if($this->form_validation->run() == false){
			$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Jamaah Tersebut Telah Dijadwalkan Berangkat!</div>');
		// $this->load->view('users/jadwalnya',$data);
			redirect('jadwal',$data);

		}else{
			$nomoridentitas 		= $this->session->userdata('nomoridentitas');
			$id_keberangkatan 		= $this->input->post('id_keberangkatan');
			$id_daftar 				= $this->input->post('nama_jamaah');
			$tgl_keberangkatan		= $this->input->post('tgl_keberangkatan');
			$status_keberangkatanJ = 'Sudah Pernah Terjadwalkan Berangkat' ;
			
			foreach($id_daftar as $k => $v){
				$dataK[$k]['id_keberangkatan']=$id_keberangkatan;
				$dataK[$k]['id_admin_input']=$nomoridentitas;
				$dataK[$k]['id_jamaah_vik']=$v;
				$dataK[$k]['tgl_keberangkatan']=$tgl_keberangkatan;
				$dataK[$k]['keterangan']='Sudah Lengkap Dan Siap Berangkat';
				$UpdateJ[$k]['id_daftar']=$v;
				$UpdateJ[$k]['status_keberangkatanJ'] = $status_keberangkatanJ	;
			}
			// echo json_encode($dataK);
			// echo json_encode($UpdateJ);
			if (
				$this->db->insert_batch('keberangkatan_jamaah', $dataK) &&
				$this->db->update_batch('jamaah_daftar',$UpdateJ,'id_daftar')){

				$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Berhasil Ditambahkan!</div>');
				redirect('jadwal');

			}else{
				$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Terjadi Kesalahan!</div>');
				redirect('jadwal');	
			}
		}

	}
	function laporan()
	{
		$data['web']=$this->users_model->website();
		$data['users'] = $this->users_model->dataLengkap($this->session->userdata('nomoridentitas'));
		$data['katek'] = $this->jadwal_ke->kode_keber();

		$this->load->view('users/laporan_keberangkatan', $data);
	}

	function data()
	{

		header('Content-Type: application/json');
		echo $this->jadwal_ke->datanya();
	}

	function data_keberangkatan_id()
	{
		header('Content-Type: application/json');
		$id_keberangkatan = $this->input->post('id_keberangkatan');

		// var_dump($id_keberangkatan);die();
		echo $this->jadwal_ke->data_id($id_keberangkatan);
	}

	function cari_jamaahnya()
	{
		$kode_jadwal_keberangkatan  =$this->input->post('kode_jadwal_keberangkatan');
		$data  =$this->jadwal_ke->ambil_jamaahnya($kode_jadwal_keberangkatan);
		echo json_encode($data);
	}


}
