<?php
date_default_timezone_set('Asia/Jakarta');
class Page extends CI_Controller{
 function __construct(){
  parent::__construct();
  $this->load->library('form_validation');
  $this->load->library('datatables');
  $this->load->model('users_model');
  check_not_login();
}

function errors()
{
  $this->load->view('505');
}

function data_layanan()
{
  $data['TU']                = $this->users_model->TU();
  $data['TD']                = $this->users_model->TD();

  $data['kode_layanannya']   = $this->users_model->kode_layanan(); 
  $data['web']               = $this->users_model->website();
  $data['users']             = $this->users_model->admin($this->session->userdata('nomoridentitas'));

  $this->load->view('users/data_layanan',$data);

} 


function TambahLb()
{
  $this->form_validation->set_rules('kode_layana','kode_layana','required|trim|is_unique[data_layanan.kode_layana]',['required' => 'Wajib Diisi.',
   'is_unique' => 'kode Layanan Sudah Terdaftar']);
  $this->form_validation->set_rules('nama_layanan','nama_layanan','required|trim|is_unique[data_layanan.nama_layanan]',['required' => 'Wajib Diisi.',
   'is_unique' => 'Layanan Sudah Terdaftar']);
  $this->form_validation->set_rules('berlaku_dari','berlaku_dari','required|trim',['required' => 'Wajib Diisi.',]); 
  $this->form_validation->set_rules('tu','tu','required|trim',['required' => 'Wajib Diisi.',]);
  $this->form_validation->set_rules('td','td','required|trim',['required' => 'Wajib Diisi.',]);
  $this->form_validation->set_rules('tempat_menginapnya','tempat_menginapnya','required|trim',['required' => 'Wajib Diisi.',]);
  $this->form_validation->set_rules('lama_perjalanan','lama_perjalanan','required|trim',['required' => 'Wajib Diisi.',]);
  $this->form_validation->set_rules('biaya','biaya','required|trim',['required' => 'Wajib Diisi.',]);

  if($this->form_validation->run() == false) 
  {
   $data['kode_layanannya']   = $this->users_model->kode_layanan();
   $data['web']               = $this->users_model->website();
   $data['users']             = $this->users_model->admin($this->session->userdata('nomoridentitas'));
   $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Terjadi Kesalahan.</div>');
   redirect(site_url('page/data_layanan'));

 }else{
   $id = $this->input->post('id');
   $kode_layana = $this->input->post('kode_layana');
   $nama_layanan = $this->input->post('nama_layanan');
   $tu = $this->input->post('transportasi_udaranya');
   $td = $this->input->post('transportasi_daratnya');
   $tempat_menginapnya = $this->input->post('tempat_menginapnya');
   $lama_perjalanan = $this->input->post('lama_perjalanan');
   $biaya = $this->input->post('biaya');
   $berhasil = [
    'kode_layana'     => htmlspecialchars($this->users_model->kode_layanan('kode_layana')),
    'nama_layanan'    => htmlspecialchars($this->input->post('nama_layanan')),
    'berlaku_dari'    => htmlspecialchars($this->input->post('berlaku_dari')),
    'transportasi_udaranya'              => htmlspecialchars($this->input->post('tu')),
    'transportasi_daratnya'              => htmlspecialchars($this->input->post('td')),
    'tempat_menginapnya'  => htmlspecialchars($this->input->post('tempat_menginapnya')),
    'lama_perjalanan'  => htmlspecialchars($this->input->post('lama_perjalanan')),
    'biaya'           => htmlspecialchars($this->input->post('biaya'))
  ];

  $Sukses = $this->users_model->SimpanLayanan($id,$berhasil);
    // var_dump($Sukses);die();
  if($Sukses == FALSE) {
    $this->session->set_flashdata('message','<div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</b>Gagal Menambahkan Layanan Baru.</div>');
    redirect('page/data_layanan');
  }else{
    $this->session->set_flashdata('message','<div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Berhasil Ditambahkan Layanan Baru.</div>');
    redirect('page/data_layanan');
  }
}
}

function index()
{
  // $ulk = ('akses'==='1'&&'akses'==='2'&&'akses'==='3');
  $data['total']   = $this->users_model->total();
  $data['totalpromo']   = $this->users_model->totalpromo();
  $data['totalUlk']   = $this->users_model->totalUlk();
  $data['web']=$this->users_model->website();
  $data['users'] = $this->users_model->dataLengkap($this->session->userdata('nomoridentitas'));
  if($this->session->userdata('akses')==='1' ){
   $this->load->view('users/dashboard_admin', $data);
 }elseif($this->session->userdata('akses')==='2'){
   $this->load->view('users/dashboard_marketing',$data);
 }elseif($this->session->userdata('akses')==='3'){
   $this->load->view('users/dashboard_pimpinan',$data);
 }else{
   redirect('users_login/login_karyawan');
 }
}

function tambahUserL()
{
  $data['web']   =$this->users_model->website();
  $data['users'] = $this->users_model->admin($this->session->userdata('nomoridentitas'));
  $data['jabatan_pegawai']=$this->users_model->get_jabatan();
  $data['akses']=$this->users_model->get_akses();
  $this->load->view('users/tambah_user',$data);
}

function tambahJabatan()
{
  if($this->session->userdata('sudah_login') !== TRUE){
   redirect('users_login/login_karyawan');
 }
 $this->form_validation->set_rules('nama_jabatan[]','nama_jabatan[]', 'required|trim|max_length[20]|is_unique[jabatan_pegawai.nama_jabatan]',['required' => 'Wajib Diisi.','is_unique' => 'Terdapat Jabatan Yang Sudah Terinput..!']);
 $data['web']=$this->users_model->website();
 $data['users'] = $this->users_model->admin($this->session->userdata('nomoridentitas'));
 $data['jabatan_pegawai']=$this->users_model->get_jabatan();
 $data['akses']=$this->users_model->get_akses();

 if($this->form_validation->run() == false){
   redirect('page/djp');
 }else{
   $id_jabatan    = $_POST['id_jabatan'];
   $nama_jabatan  = $_POST['nama_jabatan'];
   $data = array();
   $index = 0;
   foreach ($id_jabatan as $key)
   {
    array_push($data, array(
     'id_jabatan' =>$key,
     'nama_jabatan'=>$nama_jabatan[$index],));
    $index++;
  }

  // $result = $this->users_model->cek_jabatan($data);
  $result = $this->users_model->tambah($data);
  if ($result==TRUE){
    $this->session->set_flashdata('message','<div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Berhasil Ditambahkan Jabatan Baru.</div>');
    redirect('page/djp');
  }else{
    $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Gagal Ditambahkan Jabatan Baru.</div>');
    redirect('page/djp');
  }
}
}

function tambahTransD()
{
  if($this->session->userdata('sudah_login') !== TRUE){
   redirect('users_login/login_karyawan');
 }
 $this->form_validation->set_rules('nama_tdnya[]','nama_tdnya[]', 'required|trim|max_length[20]|is_unique[transportasi_darat.nama_tdnya]',['required' => 'Wajib Diisi.','is_unique' => 'Transportnya Yang Sudah Terinput..!']);
 $data['web']=$this->users_model->website();
 $data['users'] = $this->users_model->admin($this->session->userdata('nomoridentitas'));

 if($this->form_validation->run() == false){
   redirect('page/transportasi_daratnya');
 }else{
   $id_td    = $_POST['id_td'];
   $nama_tdnya  = $_POST['nama_tdnya'];
   $data = array();
   $index = 0;
   foreach ($id_td as $key)
   {
    array_push($data, array(
     'id_td' =>$key,
     'nama_tdnya'=>$nama_tdnya[$index],));
    $index++;
  }

  $this->users_model->tambahTransD($data);
  $this->session->set_flashdata('message','<div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Berhasil Ditambahkan Transportasi DaratNya Baru.</div>');
  redirect('page/transportasi_daratnya');
}
}


function tambahTransU()
{
  if($this->session->userdata('sudah_login') !== TRUE){
   redirect('users_login/login_karyawan');
 }
 $this->form_validation->set_rules('nama_tunya[]','nama_tunya[]', 'required|trim|max_length[20]|is_unique[transportasi_udara.nama_tunya]',['required' => 'Wajib Diisi.','is_unique' => 'Transportnya Yang Sudah Terinput..!']);
 $data['web']=$this->users_model->website();
 $data['users'] = $this->users_model->admin($this->session->userdata('nomoridentitas'));

 if($this->form_validation->run() == false){
   redirect('page/transportasi_udaranya');
 }else{
   $id_tu    = $_POST['id_tu'];
   $nama_tunya  = $_POST['nama_tunya'];
   $data = array();
   $index = 0;
   foreach ($id_tu as $key)
   {
    array_push($data, array(
     'id_tu' =>$key,
     'nama_tunya'=>$nama_tunya[$index],));
    $index++;
  }

  $result = $this->users_model->tambahTransU($data);
  $this->session->set_flashdata('message','<div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Berhasil Ditambahkan Transportasi Udara Baru.</div>');
  redirect('page/transportasi_udaranya');
}
}

function tambahTM()
{
  if($this->session->userdata('sudah_login') !== TRUE){
   redirect('users_login/login_karyawan');
 }
 $this->form_validation->set_rules('nama_tmnya[]','nama_tmnya[]', 'required|trim|max_length[20]|is_unique[tempat_menginap.nama_tmnya]',['required' => 'Wajib Diisi.','is_unique' => 'tempat menginap  Sudah Terinput..!']);
 $data['web']=$this->users_model->website();
 $data['users'] = $this->users_model->admin($this->session->userdata('nomoridentitas'));

 if($this->form_validation->run() == false){
   redirect('page/TM');
 }else{
   $id_tm    = $_POST['id_tm'];
   $nama_tmnya  = $_POST['nama_tmnya'];
   $data = array();
   $index = 0;
   foreach ($id_tm as $key)
   {
    array_push($data, array(
     'id_tm' =>$key,
     'nama_tmnya'=>$nama_tmnya[$index],));
    $index++;
  }

  // $result = $this->users_model->cek_jabatan($data);
  $this->users_model->tambahTM($data);
  $this->session->set_flashdata('message','<div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Berhasil Ditambahkan Baru.</div>');
  redirect('page/TM');
}
}

function tambahPro()
{
  if($this->session->userdata('sudah_login') !== TRUE){
   redirect('users_login/login_karyawan');
 }
 $this->form_validation->set_rules('kode_promo','kode_promo', 'required|trim|max_length[20]|is_unique[data_promo.kode_promo]',['required' => 'Wajib Diisi.','is_unique' => 'Terdapat Kode Yang Sudah Terinput..!']);
 $this->form_validation->set_rules('nama_promo','nama_promo', 'required|trim|max_length[20]|is_unique[data_promo.nama_promo]',['required' => 'Wajib Diisi.','is_unique' => 'Terdapat Nama Yang Sudah Terinput..!']);
 $this->form_validation->set_rules('batas_promo','batas_promo', 'required|trim|max_length[20]',['required' => 'Wajib Diisi...!']);

 $data['web']=$this->users_model->website();
 $data['users'] = $this->users_model->admin($this->session->userdata('nomoridentitas'));
 $data['promo']=$this->users_model->get_promo();
 $data['dp'] = $this->users_model->dp_layanan();

 if($this->form_validation->run() == false){
   $this->load->view('users/tambah_pro',$data);
    // redirect('page/data_Pro');

 }else{
   $id_promo    = $this->input->post('id_promo');
   $nama_promo  = $this->input->post('nama_promo');
   $kode_promo       = $this->input->post('kode_promo');
   $tgl_post_promo   = date('Y-m-d');
   $batas_promo      = $this->input->post('batas_promo');
   $nama_layanan      = $this->input->post('nama_layanan');
   $status_promo     = $this->input->post('status_promo');
   $session       = $this->session->userdata('nomoridentitas');
   $data=[
    'id_promo'    =>$id_promo,
    'nama_promo'    =>$nama_promo,
    'kode_promo'    =>$kode_promo,
    'tgl_post_promo'=>$tgl_post_promo,
    'batas_promo'   =>$batas_promo,
    'status_promo'  => '1',
    'id_user'       =>$session,
    'id_promo_layanan'   =>$nama_layanan,
  ];


  // $result = $this->users_model->cek_jabatan($data);
  $result = $this->users_model->tambahPro($data);
  if ($result){
    $this->session->set_flashdata('message','<div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Berhasil Ditambahkan Promo Baru.</div>');
    redirect('page/data_pro');
  }else{
    $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Gagal Ditambahkan Jabatan Baru.</div>');
    redirect('page/data_pro');
  }

}
}

function simpanUser()
{
  $this->form_validation->set_rules('nomoridentitas','nomoridentitas', 'required|trim|max_length[15]|is_unique[user.nomoridentitas]',['required' => 'Wajib Diisi.',
   'is_unique' => 'Nomor Passport Sudah Terdaftar!']);
  $this->form_validation->set_rules('email','email','required|trim|valid_emails|is_unique[user.email]',['required' => 'Wajib Diisi.',
   'is_unique' => 'Email Sudah Terdaftar']);
  $this->form_validation->set_rules('nama','Nama','required|trim',['required' => 'Wajib Diisi.',]);
  $this->form_validation->set_rules('akses','akses','required|trim',['required' => 'Wajib Diisi.']);
  $this->form_validation->set_rules('alamat','alamat','required|trim',['required' => 'Wajib Diisi.']);
  $this->form_validation->set_rules('no_telp','Hp','required|trim|max_length[15]|numeric[daftar.no_telephone]',['required' => 'Wajib Diisi.',
   'numeric' => 'Harus Berupa Angka..!']);
  $this->form_validation->set_rules('jabatan_pegawai','jabatan_pegawai','required|trim',['required' => 'Wajib Diisi.']);
  $data['web']=$this->users_model->website();
  $data['users'] = $this->users_model->admin($this->session->userdata('nomoridentitas'));
  $data['jabatan_pegawai']=$this->users_model->get_jabatan();
  $data['akses']=$this->users_model->get_akses();

  if($this->form_validation->run() == false){
   $this->load->view('users/tambah_user',$data);
 }else{
   $password  = 123456; 
   $daftar = [
    'nomoridentitas'      => htmlspecialchars($this->input->post('nomoridentitas')),
    'email'               => htmlspecialchars($this->input->post('email')),
    'nama'                => htmlspecialchars($this->input->post('nama')),
    'akses'               => htmlspecialchars($this->input->post('akses')),
    'password'            => password_hash($password, PASSWORD_DEFAULT),
    'aktiv_dak'           => 1
  ];

  $this->db->insert('user', $daftar);
  $pegawai = [
    'id_pegawai' => htmlspecialchars($this->input->post('nomoridentitas')),
    'alamat'     => htmlspecialchars($this->input->post('alamat')),
    'foto'       => 'default.jpg',
    'jabatan'    => htmlspecialchars($this->input->post('jabatan_pegawai')),
    'no_telp'    => htmlspecialchars($this->input->post('no_telp')),
  ];

  $this->db->insert('pegawai',$pegawai);
  $this->session->set_flashdata('message','<div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Berhasil Terdaftar!.
    </div>');
  redirect('page/data_userL');

}
}

function djp()
{
  $data['web']=$this->users_model->website();
  $data['users'] = $this->users_model->admin($this->session->userdata('nomoridentitas'));
  if($this->session->userdata('akses')==='1' ){
   $this->load->view('users/data_jabatanP',$data);
 }elseif($this->session->userdata('akses')==='2'){
   redirect('page/errors');
 }elseif($this->session->userdata('akses')==='3'){
   $this->load->view('users/data_jabatanP',$data);
 }else{
   redirect('page/errors');
 }
}




function data_userL()
{
  $data['web']=$this->users_model->website();
  $data['users']          = $this->users_model->admin($this->session->userdata('nomoridentitas'));
  $data['jabatan_pegawai']=$this->users_model->get_jabatan();
  $data['akses']          =$this->users_model->get_akses();
  $data['pegawai']        =$this->users_model->get_all_pegawai();
  $this->load->view('users/data_user',$data);
}

function transportasi_daratnya()
{
  $data['web']          =$this->users_model->website();
  $data['users']        = $this->users_model->admin($this->session->userdata('nomoridentitas'));
  $data['Transportnya'] =$this->users_model->get_all_transportasiD();
  $this->load->view('users/transportasi_darat',$data);
}

function transportasi_udaranya()
{
  $data['web']          =$this->users_model->website();
  $data['users']        = $this->users_model->admin($this->session->userdata('nomoridentitas'));
  $data['Transportnya'] =$this->users_model->get_all_transportasiU();
  $this->load->view('users/transportasi_udara',$data);
}

function TM()
{
  $data['web']          =$this->users_model->website();
  $data['users']        = $this->users_model->admin($this->session->userdata('nomoridentitas'));
  $data['TM'] =$this->users_model->get_all_TM();
  $this->load->view('users/tempat_menginap',$data);
}

function data_Pro()
{
  if($this->session->userdata('sudah_login') !== TRUE){
   redirect('users_login/login_karyawan');
 }
 $data['web']=$this->users_model->website();
 $data['users']          = $this->users_model->admin($this->session->userdata('nomoridentitas'));
 $data['dp'] = $this->users_model->dp_layanan();
 $this->load->view('users/data_promo',$data);
}

  function get_guest_json() { //data data produk by JSON object
   header('Content-Type: application/json');
   echo $this->users_model->get_all_pegawai();
 }  

  function data_kuotanyo() { //data data produk by JSON object
   header('Content-Type: application/json');
   echo $this->users_model->get_all_pegawai();
 }  


  function get_promo_json() { //data data produk by JSON object
   header('Content-Type: application/json');
   echo $this->users_model->get_all_promo();
 }

  function get_layanan_json() { //data data produk by JSON object
   header('Content-Type: application/json');
   echo $this->users_model->get_all_layanan();
 }

  function get_hdp_json() { //data data produk by JSON object
   header('Content-Type: application/json');
   echo $this->users_model->get_all_hdp();
 }

  function get_djp_json() { //data data produk by JSON object
   header('Content-Type: application/json');
   echo $this->users_model->get_all_jabatan();
 }  

  function get_transd_json() { //data data produk by JSON object
   header('Content-Type: application/json');
   echo $this->users_model->get_all_transportasiD();
 }

  function get_TM() { //data data produk by JSON object
   header('Content-Type: application/json');
   echo $this->users_model->get_all_TM();
 }

  function get_transu_json() { //data data produk by JSON object
   header('Content-Type: application/json');
   echo $this->users_model->get_all_transportasiU();
 }

  function hapusUser(){ //function hapus data
   $kode=$this->input->post('id_pegawai');
   $this->users_model->hapusUserl($kode);
   $this->session->set_flashdata('message','<div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Berhasil Dihapus.</div>');
   redirect('page/data_userL');
 }

  function hapusJabatan(){ //function hapus data
   $id_jabatan=$this->input->post('id_jabatan');
   $this->users_model->hapusJabatan($id_jabatan);
   $this->session->set_flashdata('message','<div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Berhasil Dihapus.</div>');
   redirect('page/djp');
 }

 function editJab()
 {
   $id_jabatan = $this->input->post('id_jabatan');
   $data['web']=$this->users_model->website();
   $data['users'] = $this->users_model->marketing($this->session->userdata('nomoridentitas'));
   $data['Jabatan'] = $this->users_model->jabatan_pegawai($id_jabatan);

   $this->load->view('users/edit_Jabatan',$data); 
 }

  function hapusLay(){ //function hapus data
   $kode=$this->input->post('id');
   $this->users_model->hapusLay($kode);
   $this->session->set_flashdata('message','<div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Berhasil Dihapus.</div>');
   redirect('page/data_layanan');
 }

 function marketing()
 {
   $data['web']=$this->users_model->website();
   $data['users'] = $this->users_model->marketing($this->session->userdata('nomoridentitas'));
   $data['title'] = 'SUTRA TOUR HIDAYAH PALEMBANG';
   $data['footer'] = '@ 2019 PalComTech LTA SUTRA TOUR HIDAYAH PALEMBANG';
   if($this->session->userdata('akses')==='2'){
    $this->load->view('users/dashboard_marketing',$data);
  }else{
    redirect('errors');
  }
}

function profile(){
 $data['web']=$this->users_model->website();
 $data['tanggal_indo'] = $this->load->helper('tanggal_indo');
 $data['users']    = $this->users_model->dataLengkap($this->session->userdata('nomoridentitas'));

 $this->load->view('users/profile', $data);
}

function ganti()
{
 $this->form_validation->set_rules('nama','Nama', 'required|trim');
 $this->form_validation->set_rules('email','Email', 'required|trim');
 $this->form_validation->set_rules('alamat','Alamat', 'required|trim');

 $data['web']=$this->users_model->website();
 $data['title'] = 'SUTRA TOUR HIDAYAH PALEMBANG';
 $data['footer'] = '@ 2019 PalComTech LTA SUTRA TOUR HIDAYAH PALEMBANG';

 if($this->form_validation->run() == false){
      // $result = $this->users_model->update($data,$nomoridentitas);
  $nomoridentitas = $this->session->userdata('nomoridentitas',$data);
  redirect('page/profile');
}else{
  $pegawai        = $this->users_model->dataLengkap($this->input->post('nomoridentitas'));
  $nomoridentitas = htmlentities($this->input->post('nomoridentitas'));
  $nama           = htmlentities($this->input->post('nama'));
  $email          = htmlentities($this->input->post('email'));
  $password         = htmlentities($this->input->post('password'));
  $alamat         = htmlentities($this->input->post('alamat'));
  $foto           = $this->input->post('foto');

  $dataPengguna = array('nomoridentitas'=>$nomoridentitas,'nama'=>$nama,'email'=>$email);
  $dataLengkapPengguna = array('id_pegawai'=>$nomoridentitas,'alamat'=>$alamat);
  $result1 = $this->users_model->editAdmin($dataPengguna , $nomoridentitas );

  if($_FILES['foto']['name'] !='') {
   $file_name = $_FILES['foto']['name'];
   $file_name_rename = $this->input->post('nomoridentitas').date('YmdHis');
   $explode = explode('.', $file_name);
   if(count($explode) >= 2) {
    $new_file = $file_name_rename.'.'.$explode[1];
    $config['upload_path'] = './uploads/foto/';
    $config['allowed_types'] = 'jpg|jpeg|png';
    $config['file_name'] = $new_file;
    $config['max_size'] = '10240';
    $data['foto'] = $new_file;
    $fieldname='foto';
    $this->load->library('upload', $config);
    $this->upload->initialize($config);
    if($this->upload->do_upload($fieldname)) {
     foreach ($pegawai as $row);
     $fotoLama = $row->foto;
     if($fotoLama != 'default.jpg'){
      unlink(FCPATH.'uploads/foto/'.$row->foto);
    }
    $data_upload = $this->upload->data();
    $dataLengkapPengguna["foto"] = $new_file;

    $result1 = $this->users_model->editAdmin($dataPengguna , $nomoridentitas );
    $result2 = $this->users_model->editDataadmin($dataLengkapPengguna , $nomoridentitas );
    $this->session->set_flashdata('message','<div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Berhasil Update.</div>');
    redirect(site_url('page/profile'));
  }else {
   $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Tidak Sesuai Format.</div>');
   redirect(site_url('page/profile'));
 }
}else {
  $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Tidak Diisinkan.</div>');
  redirect(site_url('page/profile'));
}
}
$this->session->set_flashdata('message','<div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Berhasil Update.</div>');
redirect(site_url('page/profile'));
}
}

function update_data_perusahaan()
{
 $web        = $this->users_model->website($this->input->post('id'));
 $id  = $this->input->post('id');
 $nomorregistrasi = $this->input->post('nomorregistrasi');
 $nama_perusahaan = $this->input->post('nama_perusahaan');
 $footer          = $this->input->post('footer');
 $alamat          = $this->input->post('alamat');
 $kontak          = $this->input->post('kontak');
 $visi_misi       = $this->input->post('visi_misi');

 $data=array(
  'nomorregistrasi'     => $nomorregistrasi,
  'nama_perusahaan'     => $nama_perusahaan,
  'footer'              => $footer,
  'alamat'              => $alamat,
  'kontak'              => $kontak,
  'visi_misi'           => $visi_misi
);

 $foto            = $_FILES['foto']['name'];
 if ($foto) {
  if(isset($_FILES['foto'])){
   $file_name = $_FILES['foto']['name'];
   $file_name_rename = $this->input->post('nomorregistrasi').date('YmdHis');
   $explode = explode('.', $file_name);
   if(count($explode) >= 2) {
    $new_file = $file_name_rename.'.'.$explode[1];
    $config['upload_path'] = './assets/logo/';
    $config['allowed_types'] = 'jpg|jpeg|png';
    $config['file_name'] = $new_file;
    $config['max_size'] = '10240';
    $data['foto'] = $new_file;
    $fieldname='foto';
    $this->load->library('upload', $config);
    $this->upload->initialize($config);
    if($this->upload->do_upload($fieldname)) {
     foreach ($web as $row);
     $fotoLama = $row->foto;
     if($fotoLama != 'b.png'){
      unlink(FCPATH.'assets/logo/'.$row->foto);
    }
    $data_upload = $this->upload->data();
    $data["foto"] = $new_file;

    $result = $this->users_model->UpdatePerusahaan($data,$id);
    $this->session->set_flashdata('message','<div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Berhasil.</div>');
    redirect(site_url('page/website'));
  }else {
   $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Tidak Sesuai Format.</div>');
   redirect(site_url('page/website'));
 }
}else {
  $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Tidak Diisinkan.</div>');
  redirect(site_url('page/website'));
}
}
}

$result = $this->users_model->UpdatePerusahaan($data,$id);
$this->session->set_flashdata('message','<div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Berhasil.</div>');
redirect(site_url('page/website'));
}

function Updatejabatan()
{
 $this->form_validation->set_rules('nama_jabatan','nama jabatan', 'required|trim|max_length[20]');

 if ($this->form_validation->run() == FALSE) {
  $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Terjadi Kesalahan.</div>');
  redirect(site_url('page/djp'));
}else{

  $id_jabatan   = $this->input->post('id_jabatan');
  $nama_jabatan = $this->input->post('nama_jabatan');
  $data=array(
   'nama_jabatan'     => htmlentities($this->input->post('nama_jabatan')));

  $result = $this->users_model->Update($data,$id_jabatan);

  if ($result == TRUE) {
   $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Gagal.</div>');
   redirect(site_url('page/djp'));
 }else{
   $this->session->set_flashdata('message','<div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Berhasil.</div>');
   redirect(site_url('page/djp'));
 }
}
}

function UpdateTransD()
{
 $this->form_validation->set_rules('nama_tdnya','nama_tdnya', 'required|trim|max_length[20]');

 if ($this->form_validation->run() == FALSE) {
  $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Terjadi Kesalahan.</div>');
  redirect(site_url('page/transportasi_daratnya'));
}else{

  $id_td   = $this->input->post('id_td');
  $nama_tdnya = $this->input->post('nama_tdnya');
  $data=array(
   'nama_tdnya'     => htmlentities($this->input->post('nama_tdnya')));

  $this->users_model->UpdateTransD($data,$id_td);

  $this->session->set_flashdata('message','<div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Berhasil.</div>');
  redirect(site_url('page/transportasi_daratnya'));
}
}

function UpdateTransU()
{
 $this->form_validation->set_rules('nama_tunya','nama_tunya', 'required|trim|max_length[20]');

 if ($this->form_validation->run() == FALSE) {
  $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Terjadi Kesalahan.</div>');
  redirect(site_url('page/transportasi_udaranya'));
}else{

  $id_tu   = $this->input->post('id_tu');
  $nama_tunya = $this->input->post('nama_tunya');
  $data=array(
   'nama_tunya'     => htmlentities($this->input->post('nama_tunya')));

  $result = $this->users_model->UpdateTransU($data,$id_tu);

  $this->session->set_flashdata('message','<div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Berhasil.</div>');
  redirect(site_url('page/transportasi_udaranya'));
}
}

function UpdateTM()
{
 $this->form_validation->set_rules('nama_tmnya','nama_tmnya', 'required|trim|max_length[20]');

 if ($this->form_validation->run() == FALSE) {
  $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Terjadi Kesalahan.</div>');
  redirect(site_url('page/TM'));
}else{

  $id_tm   = $this->input->post('id_tm');
  $nama_tmnya = $this->input->post('nama_tmnya');
  $data=array(
   'nama_tmnya'     => htmlentities($this->input->post('nama_tmnya')));

  $result = $this->users_model->UpdateTM($data,$id_tm);

  $this->session->set_flashdata('message','<div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Berhasil.</div>');
  redirect(site_url('page/TM'));
}
}

function UpdateLay()
{
 $kode             = $this->input->post('id');
 $kode_layana    = $this->input->post('kode_layana');
 $nama_layanan   = $this->input->post('nama_layanan');
 $berlaku_dari   = $this->input->post('berlaku_dari');
 $nama_tunya   = $this->input->post('transportasi_udaranya');
 $nama_tdnya   = $this->input->post('transportasi_daratnya');
 $tempat_menginapnya   = $this->input->post('tempat_menginapnya');
 $lama_perjalanan   = $this->input->post('lama_perjalanan');
 $biaya   = $this->input->post('biaya');
 $data=array(
  'nama_layanan'     => htmlentities($this->input->post('nama_layanan')),
  'berlaku_dari'     => htmlentities($this->input->post('berlaku_dari')),
  'transportasi_udaranya'     => htmlentities($this->input->post('nama_tunya')),
  'transportasi_daratnya'     => htmlentities($this->input->post('nama_tunya')),
  'tempat_menginapnya'     => htmlentities($this->input->post('tempat_menginapnya')),
  'lama_perjalanan'     => htmlentities($this->input->post('lama_perjalanan')),
  'biaya'     => htmlentities($this->input->post('biaya'))
);

 $result = $this->users_model->UpdateLay($data,$kode);

 if ($result == TRUE) {
  $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Gagal.</div>');
  redirect(site_url('page/data_layanan'));
}else{
  $this->session->set_flashdata('message','<div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Berhasil.</div>');
  redirect(site_url('page/data_layanan'));
}
}  


function Hdp()
{
 $data['web']=$this->users_model->website();
 $data['users'] = $this->users_model->dataLengkap($this->session->userdata('nomoridentitas'));

 $this->load->view('users/hdp',$data);
}

function fasilitas_layanan()
{
 $data['web']=$this->users_model->website();
 $data['users'] = $this->users_model->dataLengkap($this->session->userdata('nomoridentitas'));

 $this->load->view('users/fasilitas_layanan',$data);
}


function UpdatePro()
{

 $session       = $this->session->userdata('nomoridentitas');
 $id_user       =$this->input->post('id_user');
 $id_promo      = $this->input->post('id_promo');
 $kode_promo    = $this->input->post('kode_promo');
 $batas_promo   = $this->input->post('batas_promo');
 $status_promo  = $this->input->post('status_promo');
 $data=array(
  'batas_promo'   => htmlentities($this->input->post('batas_promo')),
  'status_promo'   => htmlentities($this->input->post('status_promo')),
  'id_user'   => $session
);

 $result = $this->users_model->UpdatePro($data,$id_promo);

 if ($result == TRUE) {
  $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Gagal.</div>');
  redirect(site_url('page/data_Pro'));
}else{
  $keterangan = 'Users Mengubah Data Promo';
  $data = array(
   'id_user_nyo'   => $session,
   'id_data_promo' => $id_promo,
   'tgl_update'    => date('Y-m-d H:i:s'),
   'keterangan'    => $keterangan

 );      
  $this->db->insert('histori_data_promo',$data);

  $this->session->set_flashdata('message','<div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Berhasil.</div>');
  redirect(site_url('page/data_Pro'));
}
}

function website()
{
 $data['users']          = $this->users_model->admin($this->session->userdata('nomoridentitas'));
 $data['web']=$this->users_model->Website();
 $data['akses']          =$this->users_model->get_akses();
 $data['pegawai']        =$this->users_model->get_all_pegawai();
 $data['title']          = 'SUTRA TOUR HIDAYAH PALEMBANG';
 $data['footer']         = '@ 2019 PalComTech LTA SUTRA TOUR HIDAYAH PALEMBANG';
 $this->load->view('users/tentangP',$data);
}

function Updatepassword()
{
 $this->form_validation->set_rules('password','password','required|trim',['required' => 'Wajib Diisi Dengan Password Baru.']);

 if ($this->form_validation->run() == FALSE){
  $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Gagal.</div>');
  redirect(site_url('page/data_userL'));

}else{
  $id_jabatan = $this->input->post('id_pegawai');
  $password   = $this->input->post('password');
  $data = array(
   'password' => password_hash($password, PASSWORD_DEFAULT));
  $update = $this->users_model->Updatepass($data,$id_jabatan);

  $this->session->set_flashdata('message','<div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Berhasil.</div>');
  redirect(site_url('users_login/logout'));
}
}

function ganti_password()
{
 $this->form_validation->set_rules('passwordLama','Password Lama','required');
 $this->form_validation->set_rules('passwordBaru','Password Baru','required');
 $this->form_validation->set_rules('Conpasswordbaru','Konfirmasi Password Baru','required|matches[passwordBaru]');

 if ($this->form_validation->run() == FALSE) {
  $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Terjadi Kesalahan.</div>');
  redirect(site_url('page/profile'));
}else
{
  $passwordLama = $this->input->post('passwordLama');
  $passwordBaru = $this->input->post('passwordBaru');
  $nomoridentitas = $this->session->userdata('nomoridentitas');

  $resultPas = $this->users_model->passwordSama($nomoridentitas, $passwordLama);

  if(empty($resultPas))
  {
   $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Password tidak sama.</div>');
   redirect('page/profile');
 }
 else
 {
   $data = [
    'password'=>password_hash($passwordBaru, PASSWORD_DEFAULT)
  ];

  $result = $this->users_model->gantiPassword($nomoridentitas,$data);

  if($result > 0) { $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Berhasil.</div>'); 
  redirect('users_login/logout');
}
else { $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Gagal.</div>'); }

redirect('page/profile');
}
}
}


}


