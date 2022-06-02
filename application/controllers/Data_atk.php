<?php
date_default_timezone_set('Asia/Jakarta');
class Data_atk extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->library('datatables');
		$this->load->model(['users_model','data_atknya']);
		$this->load->library('upload');
		check_not_login();
	}

	function index()
	{
		$data['web']=$this->users_model->website();
		$data['users'] = $this->users_model->dataLengkap($this->session->userdata('nomoridentitas'));

		$this->load->view('users/Data_ak', $data);
	}

	function data_artik()
	{
		header('Content-Type: application/json');
		echo $this->data_atknya->data_artikelnya();
	}

	function tambahArtikelnya()
	{
		$data['web']=$this->users_model->website();
		$data['users'] = $this->users_model->dataLengkap($this->session->userdata('nomoridentitas'));
		$this->load->view('users/tambah_artikel',$data);
	}

	function detail($id_artikel)
	{
		
		$row = $this->data_atknya->detail($id_artikel);
		$data = array(
			'id_artikel' => $row->id_artikel,
			'judul'		 => $row->judul,
			'isi'		 => $row->isi,
			'gambarnya'	 => $row->gambarnya,
		);
		$data['web']		=$this->users_model->website();
		$data['users']  	= $this->users_model->dataLengkap($this->session->userdata('nomoridentitas'));
		$this->load->view('users/detail_art',$data);
	}

	function edit($id_artikel)
	{
		
		
		// $id_artikel = $this->input->post('id_artikel');
		
		$row = $this->data_atknya->detail($id_artikel);
		$data = array(
			'id_artikel' => $row->id_artikel,
			'judul'		 => $row->judul,
			'isi'		 => $row->isi,
			'gambarnya'	 => $row->gambarnya,
		);
		$data['web']		=$this->users_model->website();
		$data['users']  	= $this->users_model->dataLengkap($this->session->userdata('nomoridentitas'));
		$this->load->view('users/edit_art',$data);
	}

	function tambah_artikelnya()
	{
		$this->form_validation->set_rules('judul','judul', 'required|trim|is_unique[data_artikel.judul]',['required' => 'Wajib Diisi.','is_unique' => 'Judul nya sudah ada..!']);
		$this->form_validation->set_rules('isi','isi', 'required|trim');

		$data['web']=$this->users_model->website();
		$data['users'] = $this->users_model->dataLengkap($this->session->userdata('nomoridentitas'));

		if($this->form_validation->run() == false){
			$this->load->view('users/tambah_artikel',$data);
		}else{

			$gb        	= $this->data_atknya->data_artikelnyonah();
			$id_artikel	= $this->input->post('id_artikel');
			$judul      = $this->input->post('nama');
			$isi        = $this->input->post('email');
			$nomori 	= $this->session->userdata('nomoridentitas');
			$gambarnya  = $this->input->post('gambarnya');

			$data = [
				'judul'			=> $this->input->post('judul'),
				'isi'			=> $this->input->post('isi'),
				'tgl_postnya'	=> date('Y-m-d H:i:s'),
				'id_user'		=> $nomori,
				'status'		=> 1,
			];

			if($_FILES['gambarnya']['name'] !='') {
				$file_name = $_FILES['gambarnya']['name'];
				$file_name_rename = date('YmdHis');
				$explode = explode('.', $file_name);
				if(count($explode) >= 2) {
					$new_file = $file_name_rename.'.'.$explode[1];
					$config['upload_path'] = './uploads/artikel/';
					$config['allowed_types'] = 'jpg|jpeg|png';
					$config['file_name'] = $new_file;
					$config['max_size'] = '10240';
					$data['gambarnya'] = $new_file;
					$fieldname='gambarnya';
					$this->load->library('upload', $config);
					$this->upload->initialize($config);
					if($this->upload->do_upload($fieldname)) {
						foreach ($gb as $row);
						$fotoLama = $row->gambarnya;
						if($fotoLama != 'default.jpg'){
							unlink(FCPATH.'uploads/artikel/'.$row->foto);
						}
						$data_upload = $this->upload->data();
						$data["gambarnya"] = $new_file;

						$this->data_atknya->tambah($data);

						$this->session->set_flashdata('message','<div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Berhasil Ditambahkan.</div>');
						redirect(site_url('data_atk'));
					}else {
						$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Tidak Sesuai Format.</div>');
						redirect(site_url('data_atk'));
					}
				}else {
					$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Tidak Diisinkan.</div>');
					redirect(site_url('data_atk'));
				}
			}
		}
	}

	function update_art()

	{
		$gb        	= $this->data_atknya->detail($this->input->post('id_artikel'));
		$id_artikel	= $this->input->post('id_artikel');
		$judul		= $this->input->post('judul');
		$isi		= $this->input->post('isi');
		$nomori 	= $this->session->userdata('nomoridentitas');
		$gambarnya	= $this->input->post('gambarnya');


		$data = [
			'judul'			=> htmlentities($this->input->post('judul')),
			'isi'			=> $this->input->post('isi'),
			'tgl_postnya'	=> date('Y-m-d H:i:s'),
			'id_user'		=> $nomori,
		];

		if($_FILES['gambarnya']['name'] !='') {
			$file_name = $_FILES['gambarnya']['name'];
			$file_name_rename = date('YmdHis');
			$explode = explode('.', $file_name);
			if(count($explode) >= 2) {
				$new_file = $file_name_rename.'.'.$explode[1];
				$config['upload_path'] = './uploads/artikel/';
				$config['allowed_types'] = 'jpg|jpeg|png';
				$config['file_name'] = $new_file;
				$config['max_size'] = '10240';
				$data['gambarnya'] = $new_file;
				$fieldname='gambarnya';
				$this->load->library('upload', $config);
				$this->upload->initialize($config);
				if($this->upload->do_upload($fieldname)) {
					foreach ($gb as $row);
					$fotoLama = $row->gambarnya;

					if($fotoLama != 'default.jpg'){
						unlink(FCPATH.'uploads/artikel/'.$gb->gambarnya);
					}
					$data_upload = $this->upload->data();
					$data["gambarnya"] = $new_file;
					$result1 = $this->data_atknya->edit_art($id_artikel,$data);
					$this->session->set_flashdata('message','<div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Berhasil Ditambahkan.</div>');
					redirect(site_url('data_atk'));
				}
				else {
					$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Tidak Sesuai Format.</div>');
					redirect(site_url('data_atk'));
				}
			}else {
				$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Tidak Diisinkan.</div>');
				redirect(site_url('data_atk'));
			}
		}
		$this->session->set_flashdata('message','<div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Berhasil Ditambahkan.</div>');
		redirect(site_url('data_atk'));
	}		

	function hapusart()
	{
		$id_artikel		= $this->input->post('id_artikel');
		$this->data_atknya->hapus($id_artikel);
		$this->session->set_flashdata('message','<div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Berhasil Dihapus.</div>');
		redirect('data_atk');

	}

	function post()
	{
		$id_artikel		= $this->input->post('id_artikel');
		$data = [
			'status'	=> '2',
		];
		$this->data_atknya->posting($id_artikel,$data);
		$this->session->set_flashdata('message','<div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Berhasil Diposting.</div>');
		redirect('data_atk');

	}

}