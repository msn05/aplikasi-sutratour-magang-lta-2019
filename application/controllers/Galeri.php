<?php
date_default_timezone_set('Asia/Jakarta');
class Galeri extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->library('datatables');
		$this->load->model('users_model');
		$this->load->helper('tanggal_indo');
		$this->load->model('data_atknya');
		$this->load->model('galerim');
		check_not_login();
	}

	function index()
	{
		$data['web']	=$this->users_model->website();
		$data['users'] 	= $this->users_model->dataLengkap($this->session->userdata('nomoridentitas'));
		$data['cs']		= $this->galerim->get_all();
		$this->load->view('users/galeri', $data);

	}

	function post()
	{
		$nomori 		= $this->session->userdata('nomoridentitas');
		$id				= $this->input->post('id');
		$jenis_kegiatan	= $this->input->post('jenis_kegiatan');
		$fiilenya		= $this->input->post('filenya');

		$data = [
			'keterangan'			=> htmlentities($this->input->post('keterangan')),
			'jenis_kegiatan'		=> htmlentities($this->input->post('jenis_kegiatan')),
			'tgl_post'				=> date('Y-m-d H:i:s'),
			'id_user'				=> $nomori,
			'status_foto'			=> 0,
		];

		if(isset($_FILES['filenya'])){
			$file_name = $_FILES['filenya']['name'];
			$file_name_rename = date('YmdHis');
			$explode = explode('.', $file_name);
			if(count($explode) >= 2) {
				$new_file = $file_name_rename.'.'.$explode[1];
				$config['upload_path'] = './uploads/galeri/';
				$config['allowed_types'] = 'jpg|jpeg|png';
				$config['file_name'] = $new_file;
				$config['max_size'] = '10240';
				$data['filenya'] = $new_file;
				$fieldname='filenya';
				$this->load->library('upload', $config);
				$this->upload->initialize($config);
				if($this->upload->do_upload($fieldname)) {
					unlink(FCPATH.'uploads/galeri/');
				}
				$data_upload = $this->upload->data();
				$data["filenya"] = $new_file;

				$this->galerim->posting($data);
				$this->session->set_flashdata('message','<div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Berhasil Ditambahkan.</div>');
				redirect(site_url('galeri'));
			}else {
				$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Tidak Sesuai Format.</div>');
				redirect(site_url('galeri'));
			}
		}else {
			$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Tidak Diisinkan.</div>');
			redirect(site_url('galeri'));
		}
	}

	function hapus($id)
	{
		$id 				= $this->input->post('id');
		$gambarLama 		= $this->db->get_where('foto_aktivitas',['id' => $id])->row();
		// var_dump($gambarLama);die();
		$DeleteGambar		= $this->galerim->delete($id);
		if($DeleteGambar){
			unlink("uploads/galeri".$gambarLama->filenya);
		}
	}

	function jenis_kegiatan()
	{
		$data['web']	=$this->users_model->website();
		$data['users'] 	= $this->users_model->dataLengkap($this->session->userdata('nomoridentitas'));
		$jenis_kegiatan =$this->input->post('jenis_kegiatan');
		$data['cs']		= $this->galerim->jenis_kegiatannya($jenis_kegiatan);
		$this->load->view('users/galeri', $data);
	}

	function postingke($id)
	{
		$id = $this->input->post('id');
		$data = array(
			'tgl_post' => date('Y-m-d H:i:s'),
			'status_foto' => 1,
		);
		$this->galerim->posting_keweb($id,$data);
	}


}
