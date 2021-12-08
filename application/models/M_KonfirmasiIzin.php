<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_KonfirmasiIzin extends CI_Model {

	public function dkebutuhan_list_all() 
	{
		$q=$this->db->select(  'b.nama_bidang, 
								bt.type, 
								nk.nama_kebutuhan,
								p.nama, p.alamat, p.email,
								db.id_dkebutuhan, db.tgl_pengajuan, db.tgl_mulai, db.tgl_akhir, db.status' )
							
					->from('tb_dkebutuhan as db')
					->join('tb_pengguna as p', 'p.id = db.id', 'LEFT')
					->join('tb_bidang as b', 'b.id_bidang = p.id_bidang', 'LEFT')
					->join('tb_kebutuhan as bt', 'bt.id_kebutuhan = db.id_kebutuhan', 'LEFT')
					->join('tb_nkebutuhan as nk','nk.id_nkebutuhan = db.id_nkebutuhan', 'LEFT')
					->get();
		return $q->result();
	}


	public function dkebutuhan_list_ajax($json) {
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
			$diff  = date_diff( date_create($value->tgl_mulai), date_create($value->tgl_akhir) );
			$value->lama_izin = $diff->format('%d hari');
			$value->tgl_mulai = date_format( date_create($value->tgl_mulai), 'd/m/Y');
			$value->tgl_akhir = date_format( date_create($value->tgl_akhir), 'd/m/Y');
			$value->status = '<label class="badge badge-'.$label.' text-uppercase">'.$value->status.'</label>';
			$new_arr[]=$value;
			$i++;
		}
		return $new_arr;
	}

	public function accept_izin($id_dkebutuhan) {
		$d_t_d = array(
			'status' => 'approved'
		);
		$this->db->where('id_dkebutuhan', $id_dkebutuhan)->update('tb_dkebutuhan', $d_t_d);
	}

	public function reject_izin($id_dkebutuhan) {
		$d_t_d = array(
			'status' => 'rejected'
		);
		$this->db->where('id_dkebutuhan', $id_dkebutuhan)->update('tb_dkebutuhan', $d_t_d);
	}

}

/* End of file M_KonfirmasiIzin.php */
/* Location: ./application/models/M_KonfirmasiIzin.php */