	<?php
	date_default_timezone_set('Asia/Jakarta');
	class Dashboard extends CI_Controller{
		function __construct(){
			parent::__construct();
			$this->load->library('form_validation');
			$this->load->library('datatables');
			$this->load->helper('tanggal_indo');
			$this->load->model(['users_model','jamaahm']);

			belom();
		}

		function index()
		{
			$row      = $this->jamaahm->d($this->session->userdata('nomoridentitas'));
			$ad     =  ['1'=>'Aktif','0'=>'Belum Aktif'];
			$pdj    = ['0'=>'Belum Diketahui','1'=>'CICIL','2'=>'CASH'];
			$pd      = ['1'=>'Verifikasi','2'=>'Belum Diverifikasi'];
			$p      = ['2'=>'Belum Lunas','1'=>'Lunas','0'=>'Belum Diketahui'];
			$pk     = ['1'=>'PNS','2'=>'Swasta','3'=>'Wiraswasta'];
			$jk     = ['1'=>'Laki - Laki','2'=>'Perempuan'];
			$data = array(
				'id_daftar'       =>$row->id_daftar,
				'email'       =>$row->email,
				'no_passport'     =>$row->no_passport,
				'nama_jamaah'     =>$row->nama_jamaah,
				'no_ktp'          =>$row->no_ktp,
				'no_kk'          	 =>$row->no_kk,
				'email'           	=>$row->email,
				'tgl_lahir'      	 =>$row->tgl_lahir,
				'jenis_kelamin'   	=>$row->jenis_kelamin,
				'alamat'          	=>$row->alamat,
				'pekerjaan'       	=>$row->pekerjaan,
				'tgl_daftar'      	=>$row->tgl_daftar,
				'fotonya'         	=>$row->fotonya,
				'foto_ktp'           =>$row->foto_ktp,
				'status_dokumen'     =>$row->status_dokumen,
				'paket_yang_dipilih' =>$row->paket_yang_dipilih,
				'foto_kk'           	=>$row->foto_kk,
				'no_telephone'   		  	=>$row->no_telephone,
				'aktiv_dak'       			=>$row->aktiv_dak,
				'pemilihan_bulan_kbr'      =>$row->pemilihan_bulan_kbr,
				'ad'                       =>$ad,
				'pdj'                      =>$pdj,
				'pd'                        =>$pd,
				'p'                        =>$p,
				'pk'                        =>$pk,
				'jk'                        =>$jk,
				'statusnya'                =>$row->statusnya,
				'tg'   						=>$row->jumlah_yang_dibayarkan,
				// 'jumalah_uangnya'   		=>$row->jumlah_uangnya,
				'jumlah_yang_dibayarkan'   =>$row->jumlah_yang_dibayarkan,
				'kode_pembayaran'          =>$row->kode_pembayaran,
				'status_pembayaran'        =>$row->status_pembayaran,
				'status_dokumen'        =>$row->status_dokumen,

			);

			$data['namo']   	= $this->jamaahm->ke($row->id_daftar); 
			$data['pembayaran'] = $this->jamaahm->pemb($row->id_daftar); 
			$data['jadwaln']   	= $this->jamaahm->bulannyo($row->id_daftar); 
			$data['jadwal']   	= $this->jamaahm->jadwal(); 
			$data['nl']         = $this->jamaahm->dp_layanan();
			$data['web']		= $this->users_model->website();
		
			$this->load->view('website/header_log',$data);
			$this->load->view('dashboard',$data);
		}



	}