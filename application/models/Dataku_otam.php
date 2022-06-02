<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Dataku_otam extends CI_Model
{
	function layanan()
	{
		$x = $this->db->get('data_layanan');
		return $x;
	}


	function kode_jadwal_keberangkatannyo()
	{
		$this->db->select('RIGHT(jadwal_keberangkatan.kode_jadwal_keberangkatan,2) as kode_jadwal_keberangkatan', FALSE);
		$this->db->order_by('kode_jadwal_keberangkatan','DESC');    
		$this->db->limit(1);    
		$query = $this->db->get('jadwal_keberangkatan');

		if($query->num_rows() <> 0){
      //cek kode jika telah tersedia
			$data = $query->row();      
			$kode = intval($data->kode_jadwal_keberangkatan) + 1; 

		}
		else{
      $kode = 1;  //cek jika kode belum terdapat pada table
  }
  $tgl=date('dmY'); 
  $batas = str_pad($kode, 3, "0", STR_PAD_LEFT);
    $kodetampil = "JKJ"."5".$tgl.$batas;  //format kode
    return $kodetampil;  
}

function jadwal_keberangkatannyo()
{
	$this->datatables->select('kode_jadwal_keberangkatan,id_data_layanan,id,tgl_post,bulan_keberangkatan,nama,id_user,nomoridentitas,nama_layanan');
	$this->datatables->from('jadwal_keberangkatan');
	$this->datatables->join('user', 'id_user=nomoridentitas');
	$this->datatables->join('data_layanan', 'id_data_layanan=id');
	$this->datatables->add_column('view','<a href="javascript:void(0);" class="EditKu fa fa-edit " data-kode_jadwal_keberangkatan="$1" data-nama_layanan="$2"  data-bulan_keberangkatan="$3"></a>','kode_jadwal_keberangkatan,id_data_layanan,bulan_keberangkatan,nama,id,id_data_layanan,nomoridentitas');
	return $this->datatables->generate();
}

function simpan($berhasil,$kode_jadwal_keberangkatan)
{
	$this->db->where('kode_jadwal_keberangkatan', $kode_jadwal_keberangkatan);
	$result = $this->db->insert('jadwal_keberangkatan',$berhasil);
	return $result;
}

function Update($berhasil,$kode_jadwal_keberangkatan)
{
	$this->db->where('kode_jadwal_keberangkatan', $kode_jadwal_keberangkatan);
	$result = $this->db->update('jadwal_keberangkatan',$berhasil);
	return $result;
}

function hapusKu($kode_jadwal_keberangkatan)
{
	$this->db->where('kode_jadwal_keberangkatan',$kode_jadwal_keberangkatan);
	$result = $this->db->delete('jadwal_keberangkatan');
	return $result;
}

}