<?php
date_default_timezone_set('Asia/Jakarta');
class Jamaah extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->library('datatables');
    $this->load->helper('tanggal_indo');
    $this->load->model(['users_model','data_atknya','jamaahm']);
    check_not_login();
  }


  function hapus($id_daftar)
  {
    $s = $this->db->get_where('pembayaran_detail',['id_jamaah_daftar'=>$id_daftar])->row();
    $data['web']    = $this->users_model->website();
    $this->jamaahm->hapus($id_daftar,$s);

    $this->session->set_flashdata('message','<div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Berhasil Dihapus.</div>');
    redirect('jamaah');
  }

  function detail_pembayaran_jamaah()
  {
    $data['web']    = $this->users_model->website();
    $data['users']  = $this->users_model->dataLengkap($this->session->userdata('nomoridentitas'));
    $this->load->view('users/detail_jamaahnya', $data); 
  }

  function print_bayar($idnya)
  {
    $row    = $this->jamaahm->pembayaran_print($idnya);
    $p = ['1' =>'Lunas','2' => 'Belum'];
    $data = array(
     'kode_pembayarannya' =>$row->kode_pembayarannya,
     'tgl_pembayaran' => $row->tgl_pembayaran,
     'jumlah_uangnya' => $row->jumlah_uangnya,
     'sisa' => $row->sisa,
     'p' => $p,
     'keterangan' => $row->keterangan,
     'status_pembayaran' => $row->status_pembayaran,
     'nama_jamaah' =>$row->nama_jamaah,
     'no_ktp' =>$row->no_ktp,
     'alamat' =>$row->alamat,
     'no_telephone' =>$row->no_telephone,
   );
    $data['web']    = $this->users_model->website();
    $this->load->library('pdf');
    $this->pdf->setPaper('A4', 'potrait');
    $this->pdf->filename = "laporan-data_jamaah.pdf";
    $this->pdf->load_view('users/print_bayar', $data);
  }

  function laporan()
  {
    $data['web']=$this->users_model->website();
    $data['users']    = $this->users_model->dataLengkap($this->session->userdata('nomoridentitas'));
    $data['data']   = $this->jamaahm->cari();
    $this->load->view('users/laporan_jamaah', $data);
  }

  function laporan_pembayaran()
  {
    $data['web']=$this->users_model->website();
    $data['users']    = $this->users_model->dataLengkap($this->session->userdata('nomoridentitas'));
    $data['a']   = $this->jamaahm->cariD();
    $this->load->view('users/laporan_pembayaran_jamaah', $data);
  }



  function index()
  {
    $data['web']    = $this->users_model->website();
    $data['users']  = $this->users_model->dataLengkap($this->session->userdata('nomoridentitas'));
    $this->load->view('users/jamaah_daftar', $data);
  }

  function ganti_password()
  {
    $this->form_validation->set_rules('passwordLama','Password Lama','required');
    $this->form_validation->set_rules('passwordBaru','Password Baru','required');
    $this->form_validation->set_rules('Conpasswordbaru','Konfirmasi Password Baru','required|matches[passwordBaru]');

    if ($this->form_validation->run() == FALSE) {
      $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Terjadi Kesalahan.</div>');
      redirect(site_url('dashboard'));
    }else
    {
     $passwordLama = $this->input->post('passwordLama');
     $passwordBaru = $this->input->post('passwordBaru');
     $nomoridentitas = $this->session->userdata('nomoridentitas');

     $resultPas = $this->users_model->passwordSama($nomoridentitas, $passwordLama);

     if(empty($resultPas))
     {
      $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Password tidak sama.</div>');
      redirect('dashboard');
    }
    else
    {
      $data = [
        'password'=>password_hash($passwordBaru, PASSWORD_DEFAULT)
      ];

      $result = $this->users_model->gantiPassword($nomoridentitas,$data);

      if($result > 0) { $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Berhasil.</div>'); 
      redirect('jamaah_login/logout');
    }
    else { $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Gagal.</div>'); }

    redirect('dashboard');
  }
}
}


function verifikasi_Dokumennya()
{
 $nomori             = $this->session->userdata('nomoridentitas');
 $id_dokumen_jamaah  = $this->input->post('id_dokumen_jamaah');


 $status_dokumen     = $this->input->post('status_dokumen');

 $data = [
   'status_dokumen'      => 2,
 ];

 $oke = $this->jamaahm->verif($data,$id_dokumen_jamaah);
 $this->session->set_flashdata('message','<div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Berhasil Diverifikasi Dokumennya.</div>');
 redirect(site_url('jamaah'));
}

function tambah_jamaah()
{

 $data['web']=$this->users_model->website();
 $data['users'] = $this->users_model->dataLengkap($this->session->userdata('nomoridentitas'));
 $data['dp'] = $this->jamaahm->dp_layanan();
 $data['kode_pembayaran']   = $this->jamaahm->kode_pembayaran(); 
 $data['kode_pendaftaran']   = $this->jamaahm->kode_pendaftaran(); 
 $this->load->view('users/tambah_jamaah', $data);	

}

function tambah_jamaahnya()
{
 if($this->session->userdata('sudah_login') !== TRUE){
   redirect('users_login/login_karyawan');
 }
 $this->form_validation->set_rules('id_daftar[]','id_daftar[]', 'required|trim|max_length[20]|is_unique[jamaah_daftar.id_daftar]',['required' => 'Wajib Diisi.','is_unique' => 'Kode Yang Sudah Terinput..!']);
 $this->form_validation->set_rules('no_passport[]','no_passport[]', 'required|trim|max_length[20]|is_unique[jamaah_daftar.no_passport]',['required' => 'Wajib Diisi.','is_unique' => 'Nomor Passport Sudah Terinput..!']);
 $this->form_validation->set_rules('nama_jamaah[]','nama_jamaah[]', 'required|trim|max_length[20]',['required' => 'Wajib Diisi...!']);
 $this->form_validation->set_rules('no_ktp[]','no_ktp[]', 'required|trim|max_length[20]|is_unique[jamaah_daftar.no_ktp]',['required' => 'Wajib Diisi.','is_unique' => 'Nomor KTP Sudah Terinput..!']);
 $this->form_validation->set_rules('no_kk[]','no_kk[]', 'required|trim|max_length[20]',['required' => 'Wajib Diisi.']);
 $this->form_validation->set_rules('email[]','email[]','required|trim|valid_emails|is_unique[user.email]',['required' => 'Wajib Diisi.',
  'is_unique' => 'Email Sudah Terdaftar']);
 $this->form_validation->set_rules('tgl_lahir[]','tgl_lahir[]', 'required|trim|max_length[20]',['required' => 'Wajib Diisi...!']);
 $this->form_validation->set_rules('jenis_kelamin[]','jenis_kelamin[]', 'required|trim|max_length[20]',['required' => 'Wajib Diisi...!']);
 $this->form_validation->set_rules('alamat[]','alamat[]', 'required|trim|max_length[30]',['required' => 'Wajib Diisi...!']);
 $this->form_validation->set_rules('pekerjaan[]','pekerjaan[]', 'required|trim|max_length[20]',['required' => 'Wajib Diisi...!']);
 $this->form_validation->set_rules('no_telephone[]','no_telephone[]', 'required|trim|max_length[20]',['required' => 'Wajib Diisi...!']);
 $this->form_validation->set_rules('pemilihan_bulan_kbr','pemilihan_bulan_kbr', 'required|trim|max_length[20]',['required' => 'Wajib Diisi...!']);
 $this->form_validation->set_rules('paket_yang_dipilih','paket_yang_dipilih', 'required|trim|max_length[20]',['required' => 'Wajib Diisi...!']);
 $this->form_validation->set_rules('total','total', 'required|trim|max_length[20]',['required' => 'Wajib Diisi...!']);


 $data['web']=$this->users_model->website();
 $data['users'] = $this->users_model->dataLengkap($this->session->userdata('nomoridentitas'));
 $data['dp'] = $this->jamaahm->dp_layanan();
 $data['kode_pembayaran']   = $this->jamaahm->kode_pembayaran(); 
 $data['kode_pendaftaran']   = $this->jamaahm->kode_pendaftaran(); 

 if($this->form_validation->run() == false){
  $this->load->view('users/tambah_jamaah',$data);

}else{
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
     'nama_mahram'          =>$nama_mahram,
     'tgl_dikeluarkannP'    =>$tgl_dikeluarkanP,
     'hubungan_mahram'      =>$hubungan_mahram[$index],
     'masa_berlakuP'        =>$masa_berlakuP,
     'tgl_daftar'           => date('Y-m-d'),
     'status_keberangkatanJ'=>'Belum Pernah Berangkat',
     'tempat_dikeluarkanP'    =>$tkp,));
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

$detail_pembayaran = array();
$index  = 0;
array_push($detail_pembayaran,array(
  'kode_pembayarannya' => $kode_pembayaran,
  'keterangan' => 'biaya awal layanan',
  'tgl_pembayaran' =>date('YmdHis'),

));
$index++;

$token     = base64_encode(openssl_random_pseudo_bytes(32)); 
$aktifkode = array();
$index     = 0;
array_push($aktifkode, array(
  'id'          => $index,
  'email'       => $email[$index],
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

$oke = $this->jamaahm->keterangan_daftar($daftar1);
$oke = $this->jamaahm->login($data_akun);
$oke = $this->jamaahm->aktif($aktifkode);
$oke = $this->jamaahm->dpnyo($detail_pembayaran);
$oke = $this->jamaahm->pembayaran($data_pembayaran);
$oke = $this->jamaahm->dokumen($dok);
$oke = $this->_sendEmail($token, 'aktivasi');
if ($oke == TRUE) {
  $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Berhasil Terdaftar! Silakan Aktivasi Email Anda.
    </div>');
  redirect('jamaah');
}else{
  $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Terjadi Kesalahan.</div>');
  redirect('jamaah');
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
   $this->email->message('<p>Selamat Datang di SUTRA TOUR HIDAYAH PALEMBANG' . '<p> Silakan klik link di bawah ini untuk melakukan aktivasi' . '<p><a href="'. base_url() . 'jamaah/aktivasi?email=' . $this->input->post('email') . '& token=' . urldecode($token) . '">Aktivasi</a>' );
 }

 if($this->email->send()){
   return true;
 }else{
  echo $this->email->print_debugger();
  die;
}

}

function data_jamaah()
{
 header('Content-Type: application/json');
 echo $this->jamaahm->data();
}

function lihat($id_daftar)
{
 $row    = $this->jamaahm->detail($id_daftar);
 $ad     =  ['1'=>'Aktif','0'=>'Belum Aktif'];
 $pdj    = ['0'=>'Belum Diketahui','1'=>'CICIL','2'=>'CASH'];
 $p      = ['2'=>'Belum Lunas','1'=>'Lunas','0'=>'Belum Diketahui'];
 $pk     = ['1'=>'PNS','2'=>'Swasta','3'=>'Wiraswasta'];
 $jk     = ['1'=>'Laki - Laki','2'=>'Perempuan'];
 $data = array(
   'id_daftar'       =>$row->id_daftar,
   'no_passport'     =>$row->no_passport,
   'nama_jamaah'     =>$row->nama_jamaah,
   'no_ktp'          =>$row->no_ktp,
   'no_kk'           =>$row->no_kk,
   'email'           =>$row->email,
   'tgl_lahir'       =>$row->tgl_lahir,
   'jenis_kelamin'   =>$row->jenis_kelamin,
   'alamat'          =>$row->alamat,
   'pekerjaan'       =>$row->pekerjaan,
   'tgl_daftar'      =>$row->tgl_daftar,
   'fotonya'         =>$row->fotonya,
   'foto_ktp'           =>$row->foto_ktp,
   'status_dokumen'     =>$row->status_dokumen,
   'paket_yang_dipilih' =>$row->paket_yang_dipilih,
   'foto_kk'         =>$row->foto_kk,
   'no_telephone'    =>$row->no_telephone,
   'aktiv_dak'       =>$row->aktiv_dak,
   'sisa_pembayaran'          =>$row->sisa_pembayaran,
   'pemilihan_bulan_kbr'      =>$row->pemilihan_bulan_kbr,
 // 'id_data_layanan'                          =>$row->id_data_layanan,
   'ad'                       =>$ad,
   'pdj'                      =>$pdj,
   'p'                        =>$p,
   'pk'                        =>$pk,
   'jk'                        =>$jk,
   'statusnya'                =>$row->statusnya,
   'jumlah_yang_dibayarkan'   =>$row->jumlah_yang_dibayarkan,
   'kode_pembayaran'          =>$row->kode_pembayaran,
   'status_pembayaran'        =>$row->status_pembayaran,

 );
 $data['b']           = $this->jamaahm->jadwalk($id_daftar); 
 $data['jadwal']      = $this->jamaahm->bulannyo($id_daftar); 
 $data['nl']          = $this->jamaahm->dp_layanan();
 $data['web']         = $this->users_model->website();
 $data['users']       = $this->users_model->dataLengkap($this->session->userdata('nomoridentitas'));

 $this->load->view('users/lihat_jamaah',$data);
}

function detailini()
{
 header('Content-Type: application/json');
 echo $this->jamaahm->pembayaran_ja();
}

function cetak($id_daftar)
{
 $row   = $this->jamaahm->detail($id_daftar);
 $ad    =  ['1'=>'Aktif','0'=>'Belum Aktif'];
 $s    =  ['2'=>'Verifikasi','1'=>'Belum Diverifikasi'];
 $pdj    = ['0'=>'Belum Diketahui','1'=>'CICIL','2'=>'CASH'];
 $p    = ['2'=>'Belum Lunas','1'=>'Lunas','0'=>'Belum Diketahui'];
 $pk     = ['1'=>'PNS','2'=>'Swasta','3'=>'Wiraswasta'];
 $jk     = ['1'=>'Laki - Laki','2'=>'Perempuan'];
 $data = array(
   'id_daftar'       =>$row->id_daftar,
   'no_passport'     =>$row->no_passport,
   'nama_jamaah'     =>$row->nama_jamaah,
   'no_ktp'          =>$row->no_ktp,
   'no_kk'           =>$row->no_kk,
   'email'           =>$row->email,
   'tgl_lahir'       =>$row->tgl_lahir,
   'jenis_kelamin'   =>$row->jenis_kelamin,
   'alamat'          =>$row->alamat,
   'pekerjaan'       =>$row->pekerjaan,
   'tgl_daftar'      =>$row->tgl_daftar,
   'fotonya'         =>$row->fotonya,
   'foto_ktp'           =>$row->foto_ktp,
   'status_dokumen'     =>$row->status_dokumen,
   'paket_yang_dipilih' =>$row->paket_yang_dipilih,
   'foto_kk'         =>$row->foto_kk,
   'no_telephone'    =>$row->no_telephone,
   'aktiv_dak'       =>$row->aktiv_dak,
   'sisa_pembayaran'          =>$row->sisa_pembayaran,
   'pemilihan_bulan_kbr'      =>$row->pemilihan_bulan_kbr,
 // 'id_data_layanan'                          =>$row->id_data_layanan,
   'ad'                       =>$ad,
   'jk'                       =>$jk,
   'pk'                       =>$pk,
   'pdj'                      =>$pdj,
   'p'                        =>$p,
   's'                        =>$s,
   'statusnya'                =>$row->statusnya,
   'jumlah_yang_dibayarkan'   =>$row->jumlah_yang_dibayarkan,
   'kode_pembayaran'          =>$row->kode_pembayaran,
   'status_pembayaran'        =>$row->status_pembayaran,

 );
 $data['b']     =  $this->jamaahm->jadwalk($id_daftar); 
 $data['nl']          = $this->jamaahm->dp_layanan();
 $data['web']         = $this->users_model->website();
 $data['users']       = $this->users_model->dataLengkap($this->session->userdata('nomoridentitas'));
 $data['jadwal']      = $this->jamaahm->bulannyo($id_daftar); 
 $this->load->library('pdf');
 $this->pdf->setPaper('A4', 'potrait');
 $this->pdf->filename = "laporan-data_jamaah.pdf";
 $this->pdf->load_view('users/CetakjamaahNya', $data);
}


function harga_layanan(){
  $id  =$this->input->post('id');
  $data  =$this->jamaahm->harganya($id);
  echo json_encode($data);
}

function bulan(){
  $id  =$this->input->post('id');
  $data  =$this->jamaahm->ambil_bulannya($id);
  echo json_encode($data);
}

private function set_upload_options()
{   
 $config = array();
 $config['upload_path'] = 'uploads/jamaah/';
 $config['allowed_types'] = 'jpeg|jpg|png';
 $config['max_size']      = '1024';
 $config['overwrite']     = FALSE;
 return $config;
}

function gantiFotoJamaah()
{
 $id_daftar      = $this->input->post('id_daftar');
 $status_dokumen = $this->input->post('status_dokumen');


 $this->load->library('upload');
 $this->upload->initialize($this->set_upload_options());

 $data = array();
 $uploadPath = 'uploads/jamaah/';
 $config['upload_path'] = $uploadPath;
 $config['allowed_types'] = 'jpg|jpeg|png';
 $config['max_size'] = '1024';
 $this->load->library('upload', $config);
 $this->upload->initialize($config);

 if($this->upload->do_upload('foto_kk')) {   
   $dataInfo = $this->upload->data();
   $data['foto_kk'] = $dataInfo['file_name'];
   $result1 = $this->jamaahm->verJam($data,$id_daftar);
 }

 if($this->upload->do_upload('foto_ktp')) {   
  $dataInfo = $this->upload->data();
  $data['foto_ktp'] = $dataInfo['file_name'];
  $result2 = $this->jamaahm->verJam($data,$id_daftar);
}

if($this->upload->do_upload('fotonya')) {   
  $dataInfo = $this->upload->data();
  $data['fotonya'] = $dataInfo['file_name'];
  $result3 = $this->jamaahm->verJam($data,$id_daftar);
}   

$data = [
  'status_dokumen' => htmlentities($this->input->post('status_dokumen')),
];

$result4 =$this->jamaahm->verJam($data,$id_daftar);
$this->session->set_flashdata('message','<div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Berhasil Diverifikasi Dokumennya.</div>');
redirect(site_url('jamaah'));


}


function edit($id_daftar)
{
 $row   = $this->jamaahm->detail($id_daftar);
 $ad    =  ['1'=>'Aktif','0'=>'Belum Aktif'];
 $pdj    = ['0'=>'Belum Diketahui','1'=>'CICIL','2'=>'CASH'];
 $p    = ['2'=>'Belum Lunas','1'=>'Lunas','0'=>'Belum Diketahui'];
 $data = array(
   'id_daftar'       =>$row->id_daftar,
   'no_passport'     =>$row->no_passport,
   'nama_jamaah'     =>$row->nama_jamaah,
   'no_ktp'          =>$row->no_ktp,
   'no_kk'           =>$row->no_kk,
   'email'           =>$row->email,
   'tgl_lahir'       =>$row->tgl_lahir,
   'jenis_kelamin'   =>$row->jenis_kelamin,
   'alamat'          =>$row->alamat,
   'pekerjaan'       =>$row->pekerjaan,
   'tgl_daftar'      =>$row->tgl_daftar,
   'fotonya'         =>$row->fotonya,
   'foto_ktp'           =>$row->foto_ktp,
   'status_dokumen'     =>$row->status_dokumen,
   'paket_yang_dipilih' =>$row->paket_yang_dipilih,
   'foto_kk'         =>$row->foto_kk,
   'no_telephone'    =>$row->no_telephone,
   'aktiv_dak'       =>$row->aktiv_dak,
   'sisa_pembayaran'          =>$row->sisa_pembayaran,
   'pemilihan_bulan_kbr'      =>$row->pemilihan_bulan_kbr,
 // 'id_data_layanan'                          =>$row->id_data_layanan,
   'ad'                       =>$ad,
   'pdj'                      =>$pdj,
   'p'                        =>$p,
   'statusnya'                =>$row->statusnya,
   'jumlah_yang_dibayarkan'   =>$row->jumlah_yang_dibayarkan,
   'kode_pembayaran'          =>$row->kode_pembayaran,
   'status_pembayaran'        =>$row->status_pembayaran,

 );
 $data['b']     =  $this->jamaahm->jadwalk($id_daftar); 
 $data['pembayaran']   = $this->jamaahm->pemb($row->id_daftar); 
 $data['jadwal']     =  $this->jamaahm->jadwal(); 
 $data['nl']          = $this->jamaahm->dp_layanan();
 $data['web']         = $this->users_model->website();
 $data['users']       = $this->users_model->dataLengkap($this->session->userdata('nomoridentitas'));

 $this->load->view('users/edit_jamaah',$data);
}


function bayarnah()
{
 if($this->session->userdata('sudah_login') !== TRUE){
   redirect('users_login/login_karyawan');
 }

 $id_daftar = $this->input->post('id_daftar');
 $kode_pembayaran = $this->input->post('kode_pembayaran');
 $jumlah_uangnya  = $this->input->post('jumlah_uangnya');
 $total = $this->input->post('total');
 $status_pembayaran = $this->input->post('status_pembayaran');
 $statusnya = $this->input->post('statusnya');
 $keterangan = $this->input->post('keterangan');
 $nomoridentitas = $this->session->userdata('nomoridentitas');  


 $data = [
  'tanggal_pembayaran' => date('YmdHis'),
  'id_usernya' => $nomoridentitas,
  'sisa_pembayaran' => $total,
  'total' => $jumlah_uangnya,
  'status_pembayaran' =>$status_pembayaran,
  'statusnya' => $statusnya,
];

$detailnyoommm = [
  'kode_pembayarannya' => htmlentities($this->input->post('kode_pembayaran')),

  'tgl_pembayaran' => date('YmdHis'),
  'jumlah_uangnya'  => $jumlah_uangnya,
  'sisa'  => $total,
  'keterangan' => htmlentities($this->input->post('keterangan')),
];


$sip = $this->jamaahm->pembayaran_jamaah($data,$id_daftar);
$sip = $this->jamaahm->pembayaran_detailnyo($detailnyoommm);


}


function filter()
{
  $start_date = $_GET['start_date'];
  $data = $this->db->get_where('jamaah_daftar',['tgl_daftar' => $start_date])->result();
  $no =1 ; 
  foreach($data as $row) : ?>
    <tr>
      <td><?php echo $no++?></td>
      <td><?=$row->id_daftar;?></td>
      <td><?php echo $row->tgl_daftar?></td>
      <td><?=$row->nama_jamaah?></td>
      <td><?php echo $row->no_telephone?></td>
    </tr>
  <?php endforeach ; ?> <?php
}

function ubahdata()
{
 if($this->session->userdata('sudah_login') !== TRUE){
   redirect('users_login/login_karyawan');
 }
 $id_daftar   = $this->input->post('id_daftar');
 $no_passport = $this->input->post('no_passport');
 $nama_jamaah = $this->input->post('nama_jamaah');
 $email       = $this->input->post('email');
 $no_ktp      = $this->input->post('no_ktp');
 $no_kk       = $this->input->post('no_kk');
 $alamat       = $this->input->post('alamat');
 $tgl_lahir       = $this->input->post('tgl_lahir');
 $no_telephone       = $this->input->post('no_telephone');
 $jenis_kelamin       = $this->input->post('jenis_kelamin');
 $pekerjaan                = $this->input->post('pekerjaan');
 $pemilihan_bulan_kbr      = $this->input->post('pemilihan_bulan_kbr');
 $paket_yang_dipilih       = $this->input->post('paket_yang_dipilih');
 $total                    = $this->input->post('total');

 $data = [
  'nama'           => htmlentities($this->input->post('nama_jamaah')),
  'email'          => htmlentities($this->input->post('email')),

];

$data_jamaahNya = [
  'no_passport' => htmlentities($this->input->post('no_passport')),
  'no_ktp' => htmlentities($this->input->post('no_ktp')),
  'no_kk' => htmlentities($this->input->post('no_kk')),
  'nama_jamaah' => htmlentities($this->input->post('nama_jamaah')),
  'alamat' => htmlentities($this->input->post('alamat')),
  'tgl_lahir' => htmlentities($this->input->post('tgl_lahir')),
  'no_telephone' => htmlentities($this->input->post('no_telephone')),
  'jenis_kelamin' => htmlentities($this->input->post('jenis_kelamin')),
  'pekerjaan' => htmlentities($this->input->post('pekerjaan')),
  'pemilihan_bulan_kbr' => $pemilihan_bulan_kbr,


];

$PembayaranNya = [
  'id_jamaah_daftar'   => $id_daftar,
  'jumlah_yang_dibayarkan'   => $total,
  'sisa_pembayaran'   => $total,
  'paket_yang_dipilih' => $paket_yang_dipilih,
];
$result1 = $this->jamaahm->data_jamaahEdit($data_jamaahNya,$id_daftar);
$result2 = $this->jamaahm->update($data,$id_daftar);
$result3 = $this->jamaahm->data_pembayaranEdit($PembayaranNya,$id_daftar);
$result4 = $this->_sendPerubahandata();

}

private function _sendPerubahandata()
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
 $this->email->subject('Ada Perubahan Data');

 $this->email->message('<p>Selamat Datang di SUTRA TOUR HIDAYAH PALEMBANG' . '<p> Silakan login untuk Mengecekk Data Akun Anda'.'<p>Terima Kasih' . '<p><a href="'. base_url() . 'website">Login</a>' );

 if($this->email->send()){
  return true;
}else{
  echo $this->email->print_debugger();
  die;
}

}



function reset()
{
 if($this->session->userdata('sudah_login') !== TRUE){
   redirect('users_login/login_karyawan');
 }
 $id_daftar   = $this->input->post('id_daftar');
 $email                    = $this->input->post('email');
 $password = 123456 ;

 $data = [
  'email'          => htmlentities($this->input->post('email')),
  'password'           =>  password_hash($password, PASSWORD_DEFAULT),

];

$result = $this->jamaahm->update($data,$id_daftar);
$result1 = $this->_sendResetPassowrd();

}

private function _sendResetPassowrd()
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
 $this->email->subject('Anda Menginginkan Reset Password');

 $this->email->message('<p>Selamat Datang di SUTRA TOUR HIDAYAH PALEMBANG' . '<p> Silakan login dengan password baru anda'.'<p>Password Baru anda : 123456' .'<p>Terima Kasih' . '<p><a href="'. base_url() . 'jamaah_login/login">Login</a>' );

 if($this->email->send()){
  return true;
}else{
  echo $this->email->print_debugger();
  die;
}

}


}