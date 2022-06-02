<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Galerim extends CI_Model

{
	
	function posting($data)
	{
		$result = $this->db->insert('foto_aktivitas',$data);
		return $result;
	}

	function get_all()
	{
		$this->db->select('id,id_user,keterangan,filenya,tgl_post,nama,nomoridentitas,status_foto');
		$this->db->from('foto_aktivitas');
		$this->db->join('user','id_user=nomoridentitas');
		$this->db->order_by('status_foto','0');
		$this->db->order_by('tgl_post','DESC');
		$this->db->limit('6');
		$query = $this->db->get();
		return $query;
	}

	function ambek_data()
	{
		$this->db->where('status_foto',1);
		$query = $this->db->get('foto_aktivitas');
		return $query;
	}

	function amar($limit, $start)
	{
		$this->db->where('status','2');
		$query = $this->db->get('data_artikel', $limit, $start);
		return $query;
	}

	function delete($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('foto_aktivitas');
	}

	function posting_keweb($id,$data)
	{
		$this->db->where('id', $id);
		$this->db->update('foto_aktivitas',$data);
	}



	function jenis_kegiatannya($jenis_kegiatan)
	{
		$this->db->select('id,id_user,keterangan,filenya,tgl_post,nama,nomoridentitas,status_foto,jenis_kegiatan');
		$this->db->from('foto_aktivitas');
		$this->db->join('user','id_user=nomoridentitas');
		$this->db->order_by('tgl_post','DESC');
		$this->db->where('jenis_kegiatan',$jenis_kegiatan);
		$query = $this->db->get();
		return $query;
	}

	function galer()
	{
		$this->db->select('id,id_user,keterangan,filenya,tgl_post,nama,nomoridentitas,status_foto');
		$this->db->from('foto_aktivitas');
		$this->db->join('user','id_user=nomoridentitas');
		$this->db->where('status_foto','1');
		$result = $this->db->get();
		return $result;
	}

}
