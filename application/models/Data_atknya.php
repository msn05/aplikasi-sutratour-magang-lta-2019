<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Data_atknya extends CI_Model
{
	function data_artikelnya()
	{
		$this->datatables->select('id_artikel,judul,isi,gambarnya,tgl_postnya,id_user,nama,status,nomoridentitas');
		$this->datatables->from('data_artikel');
		$this->datatables->join('user','id_user = nomoridentitas');
		// $this->datatables->add_column('view','<a href="<?=base_url().data_atk/editA/" data-id_artikel="$1" class="fa fa-edit" ></a> <a href="data_atk/DetailAk" class="fa fa-info " data-id_artikel="$1"></a> <a href="javascript:void(0);" class="HapusAKfa fa fa-trash-o " data-id_artikel="$1" data-judul="$2"></a>','id_artikel,judul,isi,gambarnya,tgl_postnya,id_user,status,nama,nomoridentitas');
		return $this->datatables->generate();
	}

	function data_artikelnyonah()
	{
		$this->db->select('id_artikel,gambarnya');
		$this->db->from('data_artikel');
		// $this->db->where('akses','1');
		$query = $this->db->get();
		$result = $query->result();        
		return $result;
	}

	function tambah($data)
	{
		$this->db->insert('data_artikel',$data);
		return TRUE;
	}


	function baca($id_artikel)
	{
		// $this->db->select('id_artikel,judul,isi,gambarnya');
		$this->db->from('data_artikel');
		$this->db->join('user','nomoridentitas=id_user');
		$this->db->join('pegawai','id_pegawai=nomoridentitas');
		$this->db->join('jabatan_pegawai','id_jabatan=jabatan');
		$this->db->where('id_artikel',$id_artikel);
		$query = $this->db->get();
		$result = $query->result();
		return $result;	
	}


	function detail($id_artikel)
	{
		$this->db->select('id_artikel,judul,isi,gambarnya');
		$this->db->from('data_artikel');
		$this->db->where('id_artikel',$id_artikel);
		$query = $this->db->get();
		$result = $query->row();
		return $result;
	}

	function edit_art($id_artikel,$data)
	{
		$this->db->where('id_artikel',$id_artikel);
		$this->db->update('data_artikel', $data);
		return TRUE;
	}

	function hapus($id_artikel)
	{
		$this->db->where('id_artikel',$id_artikel);
		$result = $this->db->delete('data_artikel');
		return $result;
	}

	function posting($id_artikel,$data)
	{
		$this->db->where('id_artikel',$id_artikel);
		$result = $this->db->update('data_artikel',$data);
		return $result;
	}

}