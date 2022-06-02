<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Jamaahm extends CI_Model
{

  function harganya($id){
    $this->db->select('id,biaya');
    $this->db->from('data_layanan');
    $this->db->where('id',$id);
    $query = $this->db->get();
    return $query->result(); 
  }

  function cariId($id){
    $this->db->from('data_layanan');
    $this->db->join('transportasi_udara','id_tu=transportasi_udaranya');
    $this->db->join('transportasi_darat','id_td=transportasi_daratnya');
    $this->db->where('id',$id);
    $query = $this->db->get();
    return  $query->result();
  }

  function cariPromo($id_promo_layanan){
   $this->db->from('data_promo');
   $this->db->join('data_layanan', 'id_promo_layanan=id');
   $this->db->join('user', 'id_user=nomoridentitas');
   $this->db->where('id_promo_layanan',$id_promo_layanan);
   $query = $this->db->get();
   return  $query->result();
 }

 function in($tgl_awal,$tgl_akhir)
 {
  $this->db->from('jamaah_daftar');
  $this->db->join('pembayaran_detail','id_jamaah_daftar=id_daftar');
  $this->db->join('data_layanan','id=paket_yang_dipilih');
  $this->db->where('tgl_daftar >=', $tgl_awal);
  $this->db->where('tgl_daftar <=', $tgl_akhir);
  $w = $this->db->get();
  return $w->result();

}

function promo()
{
  $this->db->from('data_promo');
  $this->db->join('data_layanan', 'id_promo_layanan=id');
  $this->db->join('user', 'id_user=nomoridentitas');
  $this->db->where('status_promo','1');
  $this->db->group_by('id_promo_layanan');
  $result = $this->db->get();
  return $result->result();

}

function batas($limit, $start)
{
  $query = $this->db->get('data_layanan', $limit, $start);
  return $query;
}

function cari(){
  $this->db->group_by('tgl_daftar');
  return $this->db->get('jamaah_daftar')->result();
}

function cariD()
{

 $this->db->from('pembayaran_detail');
 $this->db->join('jamaah_daftar', 'id_daftar = id_jamaah_daftar');
 $this->db->join('pembayaran_paket_jamaah', 'pembayaran_paket_jamaah.kode_pembayarannya = pembayaran_detail.kode_pembayaran');
   // $this->db->where('kode_pembayaran');
 $this->db->group_by('kode_pembayaran');
 return $this->db->get()->result();
}


function bulannyo($id_daftar)
{
    // $this->db->select('id_daftar,pemilihan_bulan_kbr,kode_jadwal_keberangkatan,bulan_keberangkatan,id_jamaah_daftar,paket_yang_dipilih,id,nama_layanan');
  $this->db->from('jamaah_daftar');
  $this->db->join('jadwal_keberangkatan', 'kode_jadwal_keberangkatan=pemilihan_bulan_kbr');
  $this->db->join('pembayaran_detail', 'id_jamaah_daftar=id_daftar');
  $this->db->join('data_layanan', 'id=paket_yang_dipilih');
  $this->db->where('id_daftar',$id_daftar);
  $query = $this->db->get();
  $result = $query->result();        
  return $result;  
}



function jadwalk($id_daftar)
{
  $this->db->select('id_jamaah_vik,tgl_keberangkatan');
  $this->db->from('keberangkatan_jamaah');
  $this->db->join('jamaah_daftar', 'id_daftar=id_jamaah_vik');
  $this->db->where('id_jamaah_vik',$id_daftar);
  $query = $this->db->get();
  if($query->num_rows() <> 0){
      //cek kode jika telah tersedia
    $data = $query->row();      
    $kode = format_indo($data->tgl_keberangkatan); 
  }else{
    $kode = "Belum Terjadwalkan";
  }
  return $kode;  
}

function ke($id_daftar)
{
    // $this->db->select('id_keberangkatan,tgl_keberangkatan,keterangan');
  $this->db->from('keberangkatan_jamaah');
  $this->db->where('id_jamaah_vik',$id_daftar);
  $query = $this->db->get();
  $result = $query->result();        
  return $result;  
}

function ambil_bulannya($id){
  $this->db->select('id_data_layanan,kode_jadwal_keberangkatan,bulan_keberangkatan');
  $this->db->from('jadwal_keberangkatan');
  $this->db->where('id_data_layanan',$id);
  $query = $this->db->get();
  return $query->result();

}

  // function harga_layanannya($paket_yang_dipilih){
  //   $this->db->select('id,biaya');
  //   $this->db->from('data_layanan');
  //   $this->db->where('id',$paket_yang_dipilih);
  //   $query = $this->db->get();
  //   return $query->result();
  // }

function keterangan_daftar($daftar1)
{
  return $this->db->insert_batch('jamaah_daftar', $daftar1);
} 

function login($data_akun)
{
  return $this->db->insert_batch('user', $data_akun);
}

function aktif($aktifkode)
{
  return $this->db->insert_batch('aktivasi_jamaah', $aktifkode);
}

function dpnyo($detail_pembayaran)
{
  return $this->db->insert_batch('pembayaran_paket_jamaah', $detail_pembayaran);
}

function dokumen($dok)
{
  return $this->db->insert_batch('dokumen_jamaah', $dok);
}

function pembayaran($data_pembayaran)
{
  return $this->db->insert_batch('pembayaran_detail', $data_pembayaran);
}

function harus_bayar($detail_pembayaran)
{
  return $this->db->insert_batch('pembayaran_paket_jamaah', $detail_pembayaran);
}

function kode_pembayaran()
{
  $this->db->select('RIGHT(pembayaran_detail.kode_pembayaran,2) as kode_pembayaran', FALSE);
  $this->db->order_by('kode_pembayaran','DESC');    
  $this->db->limit(1);    
  $query = $this->db->get('pembayaran_detail');

  if($query->num_rows() <> 0){
      //cek kode jika telah tersedia
    $data = $query->row();      
    $kode = intval($data->kode_pembayaran) + 1; 

  }
  else{
      $kode = 1;  //cek jika kode belum terdapat pada table
    }
    $tgl=date('dmY'); 
    $batas = str_pad($kode, 3, "0", STR_PAD_LEFT);
    $kodetampil = "5".$tgl.$batas;  //format kode
    return $kodetampil;  
  }


  function kode_pendaftaran()
  {
    $this->db->select('RIGHT(user.nomoridentitas,2) as nomoridentitas', FALSE);
    $this->db->order_by('nomoridentitas','DESC');    
    $this->db->limit(1);    
    $query = $this->db->get('user');

    if($query->num_rows() <> 0){
      //cek kode jika telah tersedia
      $data = $query->row();      
      $kode = intval($data->nomoridentitas) + 1; 
      $n = 1;

    }
    else{
      $kode = 1;  //cek jika kode belum terdapat pada table
    }
    $n++;
    $tgl=date('dmY'); 
    $batas = str_pad($kode, 1, "0", STR_PAD_LEFT);
    $kodetampil =  $n.$tgl.$batas;  //format kode
    return $kodetampil;  
  }


  function ket_pembayaran($data,$kode_pembayaran)
  {
    $this->db->where('kode_pembayaran',$kode_pembayaran) ;  
    $this->db->update('pembayaran_paket_jamaah',$data);
    return TRUE;
  }


  function tambahbayar($datapemb)
  {
    $this->db->insert('pembayaran_detail',$datapem);
    return TRUE;
  }

  
  function data(){
    $this->datatables->select('id_daftar,nama_jamaah,no_ktp,no_telephone,alamat,status_keberangkatanJ,nomoridentitas,email');
    $this->datatables->from('jamaah_daftar');
    // $this->datatables->join('jamaah_daftar','id_daftar=id_jamaah_daftar');
    $this->datatables->join('user','id_daftar=nomoridentitas');
    return $this->datatables->generate();

  }


  function pembayaran_ja(){
    $this->datatables->select('kode_pembayaran,id_jamaah_daftar,nama_jamaah,kode_pembayaran,tgl_pembayaran,jumlah_uangnya,status_pembayaran,nama,total');
    $this->datatables->from('pembayaran_detail');
    $this->datatables->join('jamaah_daftar','id_jamaah_daftar=id_daftar');
    $this->datatables->join('user','nomoridentitas=id_usernya');
    $this->datatables->join('pembayaran_paket_jamaah','kode_pembayarannya=kode_pembayaran');
    // $this->datatables->group_by('kode_pembayaran','ASC');
    $this->datatables->group_by('tgl_pembayaran','DESC');
    return $this->datatables->generate();

  }

  function detail($id_daftar)
  {
    // $this->db->select('jamaah.*,user.&');
    $this->db->from('jamaah_daftar');
    $this->db->join('user', 'nomoridentitas = id_daftar');
    $this->db->join('dokumen_jamaah', 'id_dokumen_jamaah = id_daftar');
    $this->db->join('pembayaran_detail', 'id_jamaah_daftar = id_daftar');
    // $this->db->join('pembayaran_paket_jamaah', 'pembayaran_paket_jamaah.kode_pembayarannya = pembayaran_detail.kode_pembayaran');
    $this->db->where('id_daftar',$id_daftar);
    $query = $this->db->get();
    return $query->row();
  }



  function d($nomoridentitas)
  {
    $this->db->from('user');
    $this->db->join('jamaah_daftar', 'id_daftar = nomoridentitas');
    $this->db->join('dokumen_jamaah', 'id_dokumen_jamaah = id_daftar');
    $this->db->join('pembayaran_detail', 'id_jamaah_daftar = id_daftar');
    // $this->db->join('pembayaran_paket_jamaah', 'pembayaran_paket_jamaah.kode_pembayarannya = pembayaran_detail.kode_pembayaran');
    $this->db->where('nomoridentitas', $nomoridentitas);
    $query = $this->db->get();
    return $query->row();
  }

 //  function pembayarannya($nomoridentitas)
 //  {
 //   $this->db->from('pembayaran_detail');
 //   $this->db->join('jamaah_daftar', 'id_daftar = id_jamaah_daftar');
 //   $this->db->join('pembayaran_paket_jamaah', 'pembayaran_paket_jamaah.kode_pembayarannya = pembayaran_detail.kode_pembayaran');
 //   $this->db->where('id_jamaah_daftar', $nomoridentitas);
 //   $result = $this->db->get();
 //   return $result;
 // }

  function pemb($id_daftar)
  {
    $this->db->from('pembayaran_detail');
    $this->db->join('jamaah_daftar', 'id_daftar = id_jamaah_daftar');
    $this->db->join('pembayaran_paket_jamaah', 'pembayaran_paket_jamaah.kode_pembayarannya = pembayaran_detail.kode_pembayaran');
    $this->db->where('id_jamaah_daftar', $id_daftar);
    $result = $this->db->get();
    return $result;
  }

  function pembayaran_print($idnya)
  {
    $this->db->from('pembayaran_paket_jamaah');
    $this->db->join('pembayaran_detail', 'pembayaran_detail.kode_pembayaran = pembayaran_paket_jamaah.kode_pembayarannya');
    $this->db->join('jamaah_daftar', 'jamaah_daftar.id_daftar = pembayaran_detail.id_jamaah_daftar');
    $this->db->where('idnya', $idnya);
    $query = $this->db->get();
    return $query->row();
  }



  function verif($data,$id_dokumen_jamaah)
  {
    $this->db->select('id_dokumen_jamaah,status_dokumen');
    $this->db->where('id_dokumen_jamaah', $id_dokumen_jamaah);
    $result = $this->db->update('dokumen_jamaah',$data);
    return $result;
  }

  function update($data,$id_daftar)
  {
    // $this->db->select('id_dokumen_jamaah,status_dokumen');
    $this->db->where('nomoridentitas', $id_daftar);
    $this->db->update('user',$data);
    return TRUE;
  }

  function data_jamaahEdit($data_jamaahNya,$id_daftar)
  {
    // $this->db->select('id_dokumen_jamaah,status_dokumen');
    $this->db->where('id_daftar',$id_daftar);
    $this->db->update('jamaah_daftar',$data_jamaahNya);
    return TRUE;
  }


  function pembayaran_jamaah($data,$id_daftar)
  {
    $this->db->where('id_jamaah_daftar',$id_daftar);
    $this->db->update('pembayaran_detail',$data);
    return TRUE;
  }

  function pembayaran_detailnyo($detailnyoommm)
  {
   $this->db->insert('pembayaran_paket_jamaah',$detailnyoommm);
   return TRUE;
 }

 function dp_layanan(){
  $hsl=$this->db->get('data_layanan');
  return $hsl;
}

function jadwal(){
  $hsl=$this->db->get('jadwal_keberangkatan');
  return $hsl;
}

function jadwalL(){
  $result = $this->db->get_where('jadwal_keberangkatan',['id_data_layanan']);
  return $result;
}

function data_pembayaranEdit($PembayaranNya,$id_daftar)
{
 $this->db->where('id_jamaah_daftar', $id_daftar);
 $this->db->update('pembayaran_detail',$PembayaranNya);
 return TRUE;
}

function verJam($data,$id_daftar)
{
    // $this->db->select('id_dokumen_jamaah,status_dokumen');
  $this->db->where('id_dokumen_jamaah', $id_daftar);
  $this->db->update('dokumen_jamaah',$data);
  return TRUE;
}

function aktifkelah($email,$data)
{
  $this->db->where('email', $email);
  $this->db->update('user',$data);
  $this->db->delete('aktivasi_jamaah',$data);
  return TRUE;
}

function hapus($id_daftar)
{
  $this->db->where('id_daftar',$id_daftar);
  $this->db->delete('jamaah_daftar');
  $this->db->where('nomoridentitas',$id_daftar);
  $this->db->delete('user');
  $this->db->where('id_dokumen_jamaah',$id_daftar);
  $this->db->delete('dokumen_jamaah');
  $this->db->where('id_jamaah_daftar',$id_daftar);
  $this->db->delete('pembayaran_detail');
  $this->db->where('kode_pembayarannya',$kode_pembayaran);
  $this->db->delete('pembayaran_paket_jamaah');

}

}