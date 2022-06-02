	<?php
	date_default_timezone_set('Asia/Jakarta');
	class Daftar extends CI_Controller{
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
				);
				$data['web']    		   = $this->users_model->website();
				$data['dp']     		   = $this->jamaahm->dp_layanan();
				$data['kode_pembayaran']   = $this->jamaahm->kode_pembayaran(); 
				$data['kode_pendaftaran']   = $this->jamaahm->kode_pendaftaran(); 
				$this->load->view('website/header_log', $data); 
				$this->load->view('daftar', $data); 
			}else{
				$data['web']    		   = $this->users_model->website();
				$data['dp']     		   = $this->jamaahm->dp_layanan();
				$data['kode_pembayaran']   = $this->jamaahm->kode_pembayaran(); 
				$data['kode_pendaftaran']   = $this->jamaahm->kode_pendaftaran(); 
				$this->load->view('website/header', $data); 
				$this->load->view('daftar', $data); 
			}
		}

		function harga_layan(){
			$id  =$this->input->post('id');
			$data  =$this->jamaahm->harganya($id);
			echo json_encode($data);
		}

		function bulan(){
			$id  =$this->input->post('id');
			$data  =$this->jamaahm->ambil_bulannya($id);
			echo json_encode($data);
		}

		function insert()
		{
			$this->form_validation->set_rules('id_daftar[]','id_daftar[]', 'required|trim|max_length[20]|is_unique[jamaah_daftar.id_daftar]',['required' => 'Wajib Diisi.','is_unique' => 'Kode Yang Sudah Terinput..!']);
			$this->form_validation->set_rules('no_passport[]','no_passport[]', 'required|trim|max_length[20]|is_unique[jamaah_daftar.no_passport]',['required' => 'Wajib Diisi.','is_unique' => 'Nomor Passport Sudah Terinput..!']);
			$this->form_validation->set_rules('nama_jamaah[]','nama_jamaah[]', 'required|trim|max_length[20]',['required' => 'Wajib Diisi...!']);
			$this->form_validation->set_rules('no_ktp[]','no_ktp[]', 'required|trim|max_length[20]|is_unique[jamaah_daftar.no_ktp]',['required' => 'Wajib Diisi.','is_unique' => 'Nomor KTP Sudah Terinput..!']);
			$this->form_validation->set_rules('no_kk[]','no_kk[]', 'required|trim|max_length[20]',['required' => 'Wajib Diisi.']);
			$this->form_validation->set_rules('email','email','required|trim|valid_email|is_unique[user.email]',['required' => 'Wajib Diisi.','valid_email'=>'Email tidak Sesuai Format..!',
				'is_unique' => 'Email Sudah Terdaftar']);
			$this->form_validation->set_rules('tgl_lahir[]','tgl_lahir[]', 'required|trim|max_length[20]',['required' => 'Wajib Diisi...!']);
			$this->form_validation->set_rules('jenis_kelamin[]','jenis_kelamin[]', 'required|trim|max_length[20]',['required' => 'Wajib Diisi...!']);
			$this->form_validation->set_rules('alamat[]','alamat[]', 'required|trim|max_length[100]',['required' => 'Wajib Diisi...!']);
			$this->form_validation->set_rules('pekerjaan[]','pekerjaan[]', 'required|trim|max_length[20]',['required' => 'Wajib Diisi...!']);
			$this->form_validation->set_rules('no_telephone[]','no_telephone[]', 'required|trim|max_length[20]',['required' => 'Wajib Diisi...!']);
			$this->form_validation->set_rules('pemilihan_bulan_kbr[]','pemilihan_bulan_kbr[]', 'required|trim|max_length[20]',['required' => 'Wajib Diisi...!']);


			$data['web']=$this->users_model->website();
			$data['users'] = $this->users_model->dataLengkap($this->session->userdata('nomoridentitas'));
			$data['dp'] = $this->jamaahm->dp_layanan();
			$data['kode_pembayaran']   = $this->jamaahm->kode_pembayaran(); 
			$data['kode_pendaftaran']   = $this->jamaahm->kode_pendaftaran(); 


			if($this->form_validation->run() == false){
				$this->load->view('website/header',$data);
				$this->load->view('daftar',$data);

			}else
			{
				$tgl_dikeluarkanP      = $_POST['tgl_dikeluarkanP'];
				$nama_mahram           = $_POST['nama_mahram'];
				$masa_berlakuP         = $_POST['masa_berlakuP'];
				$hubungan_mahram       = $_POST['hubungan_mahram'];
				$id_daftar           = $_POST['id_daftar'];
				$no_passport         = $_POST['no_passport'];
				$nama_jamaah         = $_POST['nama_jamaah'];
				$no_ktp              = $_POST['no_ktp'];
				$no_kk               = $_POST['no_kk'];
				$email               = $_POST['email'];
				$tgl_lahir           = $_POST['tgl_lahir'];
				$jenis_kelamin       = $_POST['jenis_kelamin'];
				$alamat              = $_POST['alamat'];
				$pekerjaan           = $_POST['pekerjaan'];
				$no_telephone        = $_POST['no_telephone'];
				$pemilihan_bulan_kbr = $_POST['pemilihan_bulan_kbr'];
				$paket_yang_dipilih  = $_POST['paket_yang_dipilih'];
				$total               = $_POST['total'];
				$kode_pembayaran     = $_POST['kode_pembayaran'];
				$tkp                = $_POST['tkp'];
				$daftar1 = array();
				$index = 0;
				foreach ($id_daftar as $key)
				{
					array_push($daftar1, array(

						'id_daftar'            =>$key,
						'no_passport'          =>$no_passport[$index],
						'nama_jamaah'          =>$nama_jamaah[$index],
						'no_ktp'               =>$no_ktp[$index],
						'no_kk'                =>$no_kk[$index],
						'tgl_lahir'            =>$tgl_lahir[$index],
						'jenis_kelamin'        =>$jenis_kelamin[$index],
						'alamat'               =>$alamat[$index],
						'pekerjaan'            =>$pekerjaan[$index],
						'no_telephone'         =>$no_telephone[$index],
						'pemilihan_bulan_kbr'  =>$pemilihan_bulan_kbr,
						'tgl_daftar'           => date('Y-m-d'),
						'nama_mahram'          =>$nama_mahram,
						'tgl_dikeluarkannP'    =>$tgl_dikeluarkanP,
						'hubungan_mahram'      =>$hubungan_mahram[$index],
						'masa_berlakuP'        =>$masa_berlakuP,
						'tgl_daftar'           => date('Y-m-d'),
						'status_keberangkatanJ'=>'Belum Pernah Berangkat',
						'tempat_dikeluarkanP'=> $tkp,));

					$index++;
				}
				$password  = 123456;
				$data_akun = array();
				$index     = 0;
				foreach ($id_daftar as $key)
				{
					array_push($data_akun, array(

						'nomoridentitas'  =>$key,
						'email'      =>$email,
						'password'   => password_hash($password, PASSWORD_DEFAULT),
						'akses'      =>4,
						'nama'       =>$nama_jamaah[$index],
						'aktiv_dak'  =>0,));
					$index++;
				}

				$data_pembayaran = array();
				$index  = 0;
				foreach ($id_daftar as $key) {
					array_push($data_pembayaran,array(

						'paket_yang_dipilih'  => $paket_yang_dipilih,
					));
					$index++;
				}


				$data_pembayaran = array();
				$index  = 0;
				foreach ($id_daftar as $key) {
					array_push($data_pembayaran,array(
						'status_pembayaran'  => 0,
						'id_jamaah_daftar'  => $key,
						'paket_yang_dipilih'  => $paket_yang_dipilih,
						'jumlah_yang_dibayarkan'  => $total,
						'kode_pembayaran' =>$kode_pembayaran,
						'sisa_pembayaran' =>$total,
						'tanggal_pembayaran' =>date('YmdHis'),

					));
					$index++;
				}

				// $detail_pembayaran = array();
				// $index  = 0;
				// array_push($detail_pembayaran,array(
				// 	'kode_pembayarannya' => $kode_pembayaran,
				// 	'keterangan' => 'biaya awal ',
				// 	'jumlah_uangnya' => 0,
				// 	'tgl_pembayaran' =>date('YmdHis'),

				// ));
				// $index++;

				// kirim kode verifikasi

				$token     = base64_encode(openssl_random_pseudo_bytes(32)); 

				$aktifkode = array();
				$index     = 0;
				array_push($aktifkode, array(
					'id'          => $index,
					'email'       => $email,
					'token'       => $token,
					'batas_waktu' => time(),));
				$index++;

				$dok = array();
				$filesCount = count($_FILES['fotonya']['name']);
				$filesCount = count($_FILES['foto_kk']['name']);
				$filesCount = count($_FILES['foto_ktp']['name']);
				for($index =0; $index < $filesCount; $index++){
					$_FILES['file1']['name']     = $_FILES['fotonya']['name'][$index];
					$_FILES['file1']['type']     = $_FILES['fotonya']['type'][$index];
					$_FILES['file1']['tmp_name'] = $_FILES['fotonya']['tmp_name'][$index];
					$_FILES['file1']['error']     = $_FILES['fotonya']['error'][$index];
					$_FILES['file1']['size']     = $_FILES['fotonya']['size'][$index];

					$_FILES['file2']['name']     = $_FILES['foto_kk']['name'][$index];
					$_FILES['file2']['type']     = $_FILES['foto_kk']['type'][$index];
					$_FILES['file2']['tmp_name'] = $_FILES['foto_kk']['tmp_name'][$index];
					$_FILES['file2']['error']     = $_FILES['foto_kk']['error'][$index];
					$_FILES['file2']['size']     = $_FILES['foto_kk']['size'][$index];

					$_FILES['file']['name']     = $_FILES['foto_ktp']['name'][$index];
					$_FILES['file']['type']     = $_FILES['foto_ktp']['type'][$index];
					$_FILES['file']['tmp_name'] = $_FILES['foto_ktp']['tmp_name'][$index];
					$_FILES['file']['error']     = $_FILES['foto_ktp']['error'][$index];
					$_FILES['file']['size']     = $_FILES['foto_ktp']['size'][$index];

					$uploadPath = 'uploads/jamaah/';
					$config['upload_path'] = $uploadPath;
					$config['allowed_types'] = 'jpg|jpeg|png';
					$config['max_size'] = '1024';
					$config['file_name'] = $nama_jamaah[$index] .date('YmdHis');
					$this->load->library('upload', $config);
					$this->upload->initialize($config);

					foreach ($id_daftar as $key)
					{
						if($this->upload->do_upload('file1')){
							$data_upload = $this->upload->data();
							$dok[$index]['fotonya'] = $data_upload['file_name'];
						}
						if($this->upload->do_upload('file2')){
							$data_upload = $this->upload->data();
							$dok[$index]['foto_kk'] = $data_upload['file_name'];
						}
						if($this->upload->do_upload('file')){
							$data_upload = $this->upload->data();
							$dok[$index]['foto_ktp'] = $data_upload['file_name'];
						}
						$dok[$index]['status_dokumen'] = 1;
						$dok[$index]['id_dokumen_jamaah'] = $key;
					}
				}
				$oke = $this->_sendEmail($token, 'aktivasi');
				if ($oke) {
					$this->jamaahm->dokumen($dok);
					$this->jamaahm->keterangan_daftar($daftar1);
					$this->jamaahm->login($data_akun);
					$this->jamaahm->aktif($aktifkode);
					$this->jamaahm->pembayaran($data_pembayaran);	

					$this->session->set_flashdata('message','<div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Berhasil Terdaftar! Silakan Aktivasi Email Anda.
						</div>');
					redirect('welcome');
				}else{
					$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Terjadi Kesalahan.</div>');
					redirect('daftar');
				}
			}
		}

		private function _sendEmail($token, $type)
		{
			$config = [
				'protocol'    => 'smtp', 
				'smtp_host'   => 'ssl://smtp.googlemail.com',
				'smtp_user'   => 'm.satrion0501997@gmail.com',
				'smtp_pass'   => 'akamsi123',
				'smtp_port'   => 465,
				'mailtype'    => 'html',
				'charset'   => 'utf-8',
				'newline'   => "\r\n"

			];

			$this->load->library('email', $config);
			$this->email->initialize($config);
			$this->email->from('m.satrion05091997@gmail.com', 'SUTRA TOUR HIDAYAH');
			$this->email->to($this->input->post('email'));
			$this->email->subject('Aktivasi Akun Anda');

			if ($type == 'aktivasi') {
				$this->email->message('<p>Selamat Datang di SUTRA TOUR HIDAYAH PALEMBANG' . '<p> Silakan klik link di bawah ini untuk melakukan aktivasi' . '<p><a href="'. base_url() . 'daftar/aktivasi?email=' . $this->input->post('email') . '& token=' . urldecode($token) . '">Aktivasi</a>' );
			}

			if($this->email->send()){
				return true;
			}else{
				echo $this->email->print_debugger();
				die;
			}

		}

		function aktivasi ()
		{
			$email = $this->input->get('email');
			$token = $this->input->get('token');

			$user = $this->db->get_where('user', ['email' => $email])->row_array();

			if ($user){

				$aktivasi_jamaah = $this->db->get_where('aktivasi_jamaah',['token' => $token])->row_array();
				if ($aktivasi_jamaah) {

					if (time() - $aktivasi_jamaah['batas_waktu'] < (60 * 60 * 24)) {
						$this->db->set('aktiv_dak', 1);
						$this->db->where('email', $email);
						$this->db->update('user');
						$this->db->delete('aktivasi_jamaah', ['email' => $email]);

						$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">
							Anda Berhasil Aktivasi.
							</div>');
						redirect('welcome');

					}else{

						$this->db->delete('user', ['email' => $email]);
						$this->db->delete('aktivasi_jamaah', ['email' => $email]);
					}

				}else{
					$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">
						Kode Verifikasi Tidak Berlaku Lagi.!.
						</div>');
					redirect('welcome');  
				}

			}else{
				$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
					Kode Verifikasi Failed.!.
					</div>');
				redirect('welcome');  
			}
		}

	}



