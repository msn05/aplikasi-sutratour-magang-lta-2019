<?php
date_default_timezone_set('Asia/Jakarta');
class Data_atk extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->library('datatables');
		$this->load->model('users_model');
		$this->load->model('data_atknya');
		check_not_login();
	}

	function index()
	{

		$this->load->view('login');
	}


	function aktivasi ()
	{

		$nomoridentitas = $this->input->get('nomoridentitas');
		$email = $this->input->get('email');
		$token = $this->input->get('token');

		$user = $this->db->get_where('user', ['email' => $email])->row_array();

		if ($user){

			$aktivasi_jamaah = $this->db->get_where('aktivasi_jamaah',['token' => $token])->row_array();

			if ($aktivasi_jamaah) {

				if (time() - $aktivasi_jamaah['batas_waktu'] < (60 * 60 * 24)) {
          //ganti statusnyo dan ngapos tokennyo
					$this->db->set('aktif_dak', 1);
					$this->db->where('email', $email);
					$this->db->update('user');

					$this->db->delete('aktivasi_jamaah', ['email' => $email]);

					$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">
						Anda Berhasil Aktivasi.
						</div>');
					redirect('login');

				}else{

					$this->db->delete('user', ['nomoridentitas' => $nomoridentitas]);
					$this->db->delete('daftar', ['id_daftar' => $nomoridentitas]);
					$this->db->delete('aktivasi_jamaah', ['email' => $email]);
				}

			}else{
				$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">
					Gagal Aktivasi.!.
					</div>');
				redirect('login');  
			}

		}else{

			$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">
				Gagal Aktivasi.!.
				</div>');
			redirect('login');

		}

	}
}