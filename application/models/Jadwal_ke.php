<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Jadwal_ke extends CI_Model
{
	function datanya()
	{

		$this->datatables->select('id_keberangkatan,tgl_keberangkatan,id_jamaah_vik,id_admin_input,nama,nomoridentitas,pemilihan_bulan_kbr');
		$this->datatables->select('keberangkatan_jamaah.*,COUNT(id_keberangkatan) AS jumlah');
		$this->datatables->from('keberangkatan_jamaah');
		$this->datatables->join('jamaah_daftar','id_daftar = id_jamaah_vik');
		$this->datatables->join('user','id_admin_input = nomoridentitas');
		$this->datatables->group_by('id_keberangkatan');
		return $this->datatables->generate();
	}
	function data_id($id_keberangkatan)
	{
		$this->db->select('id_keberangkatan,id_jamaah_vik,nama_jamaah,id_daftar');
		$this->datatables->from('keberangkatan_jamaah');
		$this->datatables->join('jamaah_daftar','id_daftar = id_jamaah_vik');
		// $this->datatables->or('id_keberangkatan',$id_keberangkatan);
		return $this->datatables->generate();
	}

	

	function caribulan()
	{
		$this->db->select('kode_jadwal_keberangkatan,bulan_keberangkatan');
		$this->db->from('jadwal_keberangkatan');
		$this->db->group_by('bulan_keberangkatan');
		$result = $this->db->get();



		return $result;
	}

	function kode_keber()
	{
		$this->db->select('id_keberangkatan');
		$this->db->group_by('id_keberangkatan');
		$this->db->from('keberangkatan_jamaah');
		$result = $this->db->get();
		return $result->result();
	}


	function ambil_jamaahnya($kode_jadwal_keberangkatan)
	{
		$this->db->select('id_daftar,pemilihan_bulan_kbr,nama_jamaah,id_jamaah_daftar,statusnya');
		$this->db->from('jamaah_daftar');
		$this->db->join('pembayaran_detail','id_daftar=id_jamaah_daftar');
		$this->db->where('pemilihan_bulan_kbr',$kode_jadwal_keberangkatan);
		// $this->db->where('sisa_pembayaran','0');
		$this->db->where('statusnya','1');
		$result = $this->db->get();
		return $result->result();
	}

	function am($id_keberangkatan)
	{
		$this->db->select('id_keberangkatan,tgl_keberangkatan,id_jamaah_vik,email,nama_jamaah,,no_ktp,no_telephone,id_daftar,nomoridentitas');
		$this->db->from('keberangkatan_jamaah');
		$this->db->join('user','nomoridentitas=id_jamaah_vik');
		$this->db->join('jamaah_daftar','id_daftar=id_jamaah_vik');
		$this->db->where('id_keberangkatan',$id_keberangkatan);
		$result = $this->db->get();
		return $result;
	}

	function hapusDio($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('keberangkatan_jamaah');
		return TRUE;
	}

	function deletenyO($id_keberangkatan)
	{
		$this->db->where('id_keberangkatan',$id_keberangkatan);
		$this->db->delete('keberangkatan_jamaah');
		return TRUE;
	}

	function kode()
	{

		$this->db->select('RIGHT(keberangkatan_jamaah.id_keberangkatan,2) as id_keberangkatan', FALSE);
		$this->db->order_by('id_keberangkatan','DESC');    
		$this->db->limit(1);    
		$query = $this->db->get('keberangkatan_jamaah');

		if($query->num_rows() <> 0){
      //cek kode jika telah tersedia
			$data = $query->row();      
			$kode = intval($data->id_keberangkatan) + 1; 

		}else{
			$kode = 1;  //cek jika kode belum terdapat pada table
		}
		$tgl=date('dmY'); 
		$batas = str_pad($kode, 3, "0", STR_PAD_LEFT);
		$kodetampil = "DKJ"."5".$tgl.$batas;  //format kode
		return $kodetampil;
	}


	function ambek()
	{

		$this->db->from('keberangkatan_jamaah');
		$this->db->join('jamaah_daftar','id_daftar=id_jamaah_vik');
		$query = $this->db->get();
		return $query->row();

	} 
	function ambek_idnyo($id_keberangkatan)
	{
		$this->db->select('id,id_keberangkatan,tgl_keberangkatan,id_jamaah_vik,email,nama_jamaah,,no_ktp,no_telephone,id_daftar,nomoridentitas');
		$this->db->from('keberangkatan_jamaah');
		$this->db->join('user','nomoridentitas=id_jamaah_vik');
		$this->db->join('jamaah_daftar','id_daftar=id_jamaah_vik');
		$this->db->where('id_keberangkatan',$id_keberangkatan);
		$result = $this->db->get();
		return $result->row();

	} 

	function da($id_keberangkatan)
	{
		$this->db->select('id_keberangkatan,tgl_keberangkatan,id_jamaah_vik,email,nama_jamaah,no_kk,no_ktp,no_telephone,id_daftar,nomoridentitas,id_jamaah_vik');
		$this->db->from('keberangkatan_jamaah');
		$this->db->join('user','nomoridentitas=id_jamaah_vik');
		$this->db->join('jamaah_daftar','id_daftar=id_jamaah_vik');
		$this->db->where('id_keberangkatan',$id_keberangkatan);
		$result = $this->db->get();
		return $result->result();

	} 

	function total($id_keberangkatan)
	{
		$this->db->select('keberangkatan_jamaah.*,COUNT(id_keberangkatan) as total');
		$this->db->from('keberangkatan_jamaah');
		$this->db->where('id_keberangkatan',$id_keberangkatan);
		$result = $this->db->get();
		return $result->row_array();

	} 

}