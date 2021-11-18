<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_KonfirmasiKeluhan extends CI_Model {


	// public function izin_list_all() {
	// 	$q=$this->db->select('p.nama, ic.id_izin, ic.id, ic.id_namaizin, ic.tempat, ic.tglawal, ic.tglakhir, ic.status, c.nama_izin, c.type')
	// 			->from('tb_izin as ic')
	// 			->join('tb_pegawai as p', 'p.id = ic.id', 'LEFT')
	// 			->join('tb_namaizin as c', 'c.id_namaizin = ic.id_namaizin', 'LEFT')
	// 			->where('status', 'waiting')
	// 			->get();
	// 	return $q->result();
	// }

	public function dkeluhan_list_all() 
	{
		$q=$this->db->select(  'b.nama_bidang, 
								bt.type,
								db.id_dkeluhan, db.keluhan, db.nama_lengkap, db.nim_nip,
								db.fak_prodi, db.tgl_pengajuan, db.status' )
								
				->from('tb_dkeluhan as db')
				->join('tb_bidang as b', 'b.id_bidang = db.id_bidang', 'LEFT')
				->join('tb_keluhan as bt', 'bt.id_keluhan = db.id_keluhan', 'LEFT')
				->where('status', 'waiting')
				->get();
		return $q->result();
	}

	public function konfirkeluhan_list_ajax($json) 
	{
		$new_arr=array();$i=1;
		foreach ($json as $key => $value) {
			$value->no=$i;
			switch ($value->status) {
				case 'waiting':
					$label = 'warning';
					break;
				case 'rejected':
					$label = 'danger';
					break;
				case 'approved':
					$label = 'success';
					break;
			};
			// $diff  = date_diff( date_create($value->tglawal), date_create($value->tglakhir) );
			// $value->lama_izin = $diff->format('%d hari');
			// $value->tglawal = date_format( date_create($value->tglawal), 'd/m/Y');
			// $value->tglakhir = date_format( date_create($value->tglakhir), 'd/m/Y');
			$value->status = '<label class="badge badge-'.$label.' text-uppercase">'.$value->status.'</label>';
			$new_arr[]=$value;
			$i++;
		}
		return $new_arr;
	}

	public function accept_izin($id_dkeluhan) {
		$d_t_d = array(
			'status' => 'approved'
		);
		$this->db->where('id_dkeluhan', $id_dkeluhan)->update('tb_dkeluhan', $d_t_d);
	}

	public function reject_izin($id_dkeluhan) {
		$d_t_d = array(
			'status' => 'rejected'
		);
		$this->db->where('id_dkeluhan', $id_dkeluhan)->update('tb_dkeluhan', $d_t_d);
	}

}

/* End of file M_KonfirmasiIzin.php */
/* Location: ./application/models/M_KonfirmasiIzin.php */