<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Users_model extends CI_Model
{

	function Admin($nomoridentitas){
		$this->db->select('user.nama, user.email, user.password, user.nomoridentitas, user.login_akun, pegawai.id_pegawai, pegawai.alamat, pegawai.no_telp, pegawai.foto,user.akses, jabatan_pegawai.id_jabatan, jabatan_pegawai.nama_jabatan, akses.nama_akses');
		$this->db->from('user');
		$this->db->join('akses','akses = id_akses');
		$this->db->join('pegawai', 'pegawai.id_pegawai = user.nomoridentitas','inner');
		$this->db->join('jabatan_pegawai','jabatan_pegawai.id_jabatan = pegawai.jabatan','inner');
		$this->db->where('nomoridentitas', $nomoridentitas);
		// $this->db->where('akses','1');
		$query = $this->db->get();
		$result = $query->result();        
		return $result;
	}

	function total()
	{
		$this->db->select('jamaah_daftar.*,COUNT(id_daftar) as total');
		$this->db->from('jamaah_daftar');
		$query = $this->db->get();
		return $query->row_array();
	}

	function totalUlk()
	{
		$this->db->select('user.*,COUNT(nomoridentitas) as totalUlk,akses');
		$this->db->from('user');
		// $this->db->where('akses','2');
		$query = $this->db->get();
		if($query->num_rows() < 4){
			$data = $query->row();     
		}

		return $data;
	}

	function totalpromo()
	{
		$this->db->select('data_promo.*,COUNT(id_promo) as totalpromo, status_promo');
		$this->db->from('data_promo');
		$this->db->where('status_promo','1');
		$query = $this->db->get();
		return $query->row_array();
	}
	
	function dp_layanan(){
		$hsl=$this->db->get('data_layanan');
		return $hsl;
	}
	function SimpanLayanan($id,$berhasil){
		$this->db->where('id', $id);
		$result = $this->db->insert('data_layanan',$berhasil);
		return $result;
	}

	function kode_layanan()
	{
		$this->db->select('RIGHT(data_layanan.kode_layana,2) as kode_layana', FALSE);
		$this->db->order_by('kode_layana','DESC');    
		$this->db->limit(1);    
		$query = $this->db->get('data_layanan');

		if($query->num_rows() <> 0){
			//cek kode jika telah tersedia
			$data = $query->row();      
			$kode = intval($data->kode_layana) + 1; 

		}
		else{
			$kode = 1;  //cek jika kode belum terdapat pada table
		}
		$tgl=date('dmY'); 
		$batas = str_pad($kode, 3, "0", STR_PAD_LEFT);
		$kodetampil = "BR"."5".$tgl.$batas;  //format kode
		return $kodetampil;  
	}


	// tambah banyak data
	function website(){
		$this->db->select('id,nama_perusahaan,nomorregistrasi,footer,alamat,kontak,visi_misi,foto');
		$this->db->from('website');
		// $this->db->where('nomorregistrasi','1');
		$query = $this->db->get();
		$result = $query->result();        
		return $result;
	}

	function Layanan(){
		$id = $this->input->post('id');
		$this->db->select('kode_layana,nama_layanan,berlaku_dari,transportasi,tempat_menginap,lama_perjalanan,biaya');
		// $this->db->from('data_layanan');
		$query = $this->db->get('data_layanan');
		$result = $query->result();        
		return $result;
	}

	function tambah($data)
	{
		return $this->db->insert_batch('jabatan_pegawai', $data);
	}


	function tambahTransD($data)
	{
		return $this->db->insert_batch('transportasi_darat', $data);
	}

	function tambahTransU($data)
	{
		return $this->db->insert_batch('transportasi_udara', $data);
	}



	function tambahTM($data)
	{
		return $this->db->insert_batch('tempat_menginap', $data);
	}

	function tambahPro($data)
	{
		$this->db->insert('data_promo',$data);
		return TRUE;
	}

	function dataLengkap($nomoridentitas){
		$this->db->select('user.nama, user.email, user.password, user.nomoridentitas, user.login_akun, pegawai.id_pegawai, pegawai.alamat, pegawai.no_telp, pegawai.foto,user.akses, jabatan_pegawai.id_jabatan, jabatan_pegawai.nama_jabatan, akses.nama_akses');
		$this->db->from('user');
		$this->db->join('akses','akses = id_akses');
		$this->db->join('pegawai', 'pegawai.id_pegawai = user.nomoridentitas','inner');
		$this->db->join('jabatan_pegawai','jabatan_pegawai.id_jabatan = pegawai.jabatan','inner');
		$this->db->where('nomoridentitas', $nomoridentitas);
		$query = $this->db->get();
		$result = $query->result();        
		return $result;
	}

	function Marketing($nomoridentitas){
		$this->db->select('user.nama, user.email, user.password, user.nomoridentitas, user.login_akun, pegawai.id_pegawai, pegawai.alamat, pegawai.no_telp, pegawai.foto,user.akses, jabatan_pegawai.id_jabatan, jabatan_pegawai.nama_jabatan, akses.nama_akses');
		$this->db->from('user');
		$this->db->join('akses','akses = id_akses');
		$this->db->join('pegawai', 'pegawai.id_pegawai = user.nomoridentitas','inner');
		$this->db->join('jabatan_pegawai','jabatan_pegawai.id_jabatan = pegawai.jabatan','inner');
		$this->db->where('nomoridentitas', $nomoridentitas);
		$this->db->where('akses','2');
		$query = $this->db->get();
		$result = $query->result();        
		return $result;
	}

	function jabatanID()
	{
		$this->db->select('id_jabatan,nama_jabatan');
		$this->db->from('jabatan_pegawai');
		$this->db->where('id_jabatan');
		$query = $this->db->get();
		return TRUE;
	}

	function Layananan()
	{
		$this->db->select('id,kode_layana');
		$this->db->from('data_layanan');
		$this->db->where('id');
		$query = $this->db->get();
		return TRUE;
	}

	function get_jabatan(){
		$hsl=$this->db->get('jabatan_pegawai');
		return $hsl;
	}


	function get_promo(){
		$hsl=$this->db->get('data_promo');
		return $hsl;
	}

	function get_akses(){
		$hsl=$this->db->get('akses');
		return $hsl;
	}

	function get_all_pegawai() {
		$this->datatables->select('id_pegawai,foto,nama,nomoridentitas,email,login_akun,id_jabatan,nama_jabatan,no_telp,id_akses,nama_akses');
		$this->datatables->from('pegawai');
		$this->datatables->join('jabatan_pegawai', 'jabatan=id_jabatan');
		$this->datatables->join('user', 'id_pegawai=nomoridentitas');
		$this->datatables->join('akses', 'id_akses=akses');
		$this->datatables->add_column('view','<a href="javascript:void(0);" class="hapus fa fa-trash-o btn btn-danger" data-kode="$1" data-akses="$2"></a>','id_pegawai,nomoridentitas,email,login_akun,foto,id_jabatan,nama_jabatan,no_telp');
		$this->datatables->add_column('reset','<a href="javascript:void(0);" class="reset fa fa-warning btn btn-warning" data-id_pegawai="$1" data-password="$2"></a>','id_pegawai,nomoridentitas,email,akses,login_akun,foto,id_jabatan,nama_jabatan,no_telp');
		return $this->datatables->generate();
	}

	function get_all_jabatan() {
		$this->datatables->select('id_jabatan,nama_jabatan');
		$this->datatables->from('jabatan_pegawai');
		$this->datatables->add_column('view','<a href="javascript:void(0);" class="editJab fa fa-edit" data-id_jabatan="$1" data-nama_jabatan="$2"></a>  <a href="javascript:void(0);" class="hapus fa fa-trash-o" data-kode="$1"></a>','id_jabatan,nama_jabatan');
		return $this->datatables->generate();
	}

	function get_all_promo() {
		$this->datatables->select('id_promo,nama_promo,kode_promo,tgl_post_promo,status_promo,batas_promo,id_user,nama,id_promo_layanan,id,nama_layanan');
		$this->datatables->from('data_promo');
		$this->datatables->join('user', 'id_user=nomoridentitas');
		$this->datatables->join('data_layanan', 'id_promo_layanan=id');
		$this->datatables->add_column('view','<a href="javascript:void(0);" class="editPro fa fa-edit" data-kode="$1" data-kode_promo="$2" data-batas_promo="$3"  data-nama_layanan="$4" data-status_promo="$5"></a>','id_promo,kode_promo,batas_promo,nama_layanan,status_promo,tgl_post_promo,batas_promo,nama,id_promo_layanan,id_user,id');
		return $this->datatables->generate();
	}

	function get_all_hdp() {
		$this->datatables->select('id_hdp,id_data_promo,tgl_update,id_promo,kode_promo,id_user,nama,keterangan');
		$this->datatables->from('histori_data_promo');
		$this->datatables->join('data_promo', 'id_data_promo=id_promo');
		$this->datatables->join('user', 'id_user_nyo=nomoridentitas');
		// $this->datatables->add_column('id_hdp,kode_promo,tgl_update,nama,keterangan');
		return $this->datatables->generate();
	}

	function get_all_layanan() {
		$this->datatables->select('id,kode_layana,nama_layanan,berlaku_dari,transportasi_udaranya,transportasi_daratnya,tempat_menginapnya,lama_perjalanan,biaya,id_tu,id_td,nama_tdnya,nama_tunya');
		$this->datatables->from('data_layanan');
		$this->datatables->join('transportasi_darat', 'transportasi_daratnya=id_td');
		$this->datatables->join('transportasi_udara', 'transportasi_udaranya=id_tu');
		$this->datatables->add_column('view','<a href="javascript:void(0);" class="DetailLay fa fa-info" data-kode="$1" data-kode_layana="$2" data-nama_layanan="$3" data-berlaku_dari="$4" data-nama_tunya="$5" data-nama_tdnya="$6" data-tempat_menginapnya="$7" data-lama_perjalanan="$8" data-biaya="$9"></a>  <a href="javascript:void(0);" class="EditLay fa fa-edit" data-kode="$1" data-kode_layana="$2" data-nama_layanan="$3" data-berlaku_dari="$4" data-nama_tunya="$5" data-nama_tdnya="$6" data-tempat_menginapnya="$7" data-lama_perjalanan="$8" data-biaya="$9"></a> <a href="javascript:void(0);" class="HapusLay fa fa-trash-o" data-kode="$1"></a>','id,kode_layana,nama_layanan,berlaku_dari,transportasi_udaranya,transportasi_daratnya,tempat_menginapnya,lama_perjalanan,biaya,id_tu,nama_tunya,id_td,nama_tdnya');
		return $this->datatables->generate();
	}

	function get_all_transportasiD() {
		$this->datatables->select('id_td,nama_tdnya');
		$this->datatables->from('transportasi_darat');
		$this->datatables->add_column('view','<a href="javascript:void(0);" class="editTransD fa fa-edit" data-id_td="$1"  data-nama_tdnya="$2"></a> </a>','id_td,nama_tdnya');
		return $this->datatables->generate();
	}

	function get_all_transportasiU() {
		$this->datatables->select('id_tu,nama_tunya');
		$this->datatables->from('transportasi_udara');
		$this->datatables->add_column('view','<a href="javascript:void(0);" class="editTransU fa fa-edit" data-id_tu="$1" data-nama_tunya="$2"></a> </a>','id_tu,nama_tunya');
		return $this->datatables->generate();
	}

	function get_all_TM() {
		$this->datatables->select('id_tm,nama_tmnya');
		$this->datatables->from('tempat_menginap');
		$this->datatables->add_column('view','<a href="javascript:void(0);" class="editTM fa fa-edit" data-id_tm="$1" data-nama_tmnya="$2"></a> </a>','id_tm,nama_tmnya');
		return $this->datatables->generate();
	}

	function hapusUserl($kode)
	{
		$this->db->where('id_pegawai',$kode);
		$result = $this->db->delete('pegawai');
		$this->db->where('nomoridentitas',$kode);
		$result= $this->db->delete('user');
		return $result;
	}

	function hapusJabatan($kode)
	{
		$this->db->where('id_jabatan',$kode);
		$result = $this->db->delete('jabatan_pegawai');
		return $result;
	}	

	function TU()
	{
		$x = $this->db->get('transportasi_udara');
		return $x;
	}

	function TD()
	{
		$x = $this->db->get('transportasi_darat');
		return $x;
	}

	

	function hapusLay($kode)
	{
		$this->db->where('id',$kode);
		$result = $this->db->delete('data_layanan');
		return $result;
	}

	function passwordSama($nomoridentitas, $passwordLama)
	{
		$this->db->select('nomoridentitas, password');
		$this->db->where('nomoridentitas', $nomoridentitas);        
		$query = $this->db->get('user');

		$user = $query->result();
		if(!empty($user)){

			if(password_verify($passwordLama,$user[0]->password)){
				return $user;
			} else {
				return array();
			}
		} else {
			return array();
		}

	}

	function gantiPassword($nomoridentitas,$data)
	{
		$this->db->where('nomoridentitas', $nomoridentitas);
		$this->db->update('user',$data);
		return TRUE;	
	}

	function editDataadmin($dataLengkapPengguna, $nomoridentitas)
	{
		$this->db->where('id_pegawai', $nomoridentitas);
		$this->db->update('pegawai', $dataLengkapPengguna);
		return TRUE;
	}

	function Update($daftar,$id_jabatan)
	{
		$this->db->where('id_jabatan',$id_jabatan);
		$return = $this->db->update('jabatan_pegawai',$daftar);
		return $result;
	}

	function UpdateTransD($data,$id_td)
	{
		$this->db->where('id_td',$id_td);
		$return = $this->db->update('transportasi_darat',$data);
		return $result;
	}

	function UpdateTransU($data,$id_tu)
	{
		$this->db->where('id_tu',$id_tu);
		$return = $this->db->update('transportasi_udara',$data);
		return $result;
	}

	function UpdateTM($data,$id_tm)
	{
		$this->db->where('id_tm',$id_tm);
		$return = $this->db->update('tempat_menginap',$data);
		return $result;
	}

	function Updatepass($data,$id_jabatan)
	{
		$this->db->where('nomoridentitas',$id_jabatan);
		$return = $this->db->update('user',$data);
		return $result;
	}

	function UpdateLay($data,$kode)
	{
		$this->db->where('id', $kode);
		$return = $this->db->update('data_layanan', $data);
		return $result;
	}

	function UpdatePro($data,$id_promo)
	{
		$this->db->where('id_promo', $id_promo);
		$return = $this->db->update('data_promo', $data);
		return $result;
	}

	function UpdatePerusahaan($data,$id)
	{
		$this->db->where('id',$id);
		$return = $this->db->update('website', $data);
		return $result;
	}

	function editAdmin($dataPengguna, $nomoridentitas)
	{
		$this->db->where('nomoridentitas', $nomoridentitas);
		$this->db->update('user', $dataPengguna);
		return TRUE;
	}


}