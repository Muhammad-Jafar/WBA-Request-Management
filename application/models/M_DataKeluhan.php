<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_DataKeluhan extends CI_Model {

	public function get_dkeluhan($id_dkeluhan) 
	{
		$q=$this->db->select(  'b.nama_bidang, 
								bt.type,
								db.id_dkeluhan, db.nama_lengkap, db.alamat,db.nim_nip, db.nowa, 
								db.fak_prodi, db.tgl_pengajuan, db.keluhan, db.status' )

				->from ('tb_dkeluhan as db')
				->join ('tb_bidang as b', 'b.id_bidang = db.id_bidang', 'LEFT')
				->join ('tb_keluhan as bt', 'bt.id_keluhan = db.id_keluhan', 'LEFT')
				->where( 'db.id_dkeluhan', $id_dkeluhan )
				->limit(1)->get();

		if( $q->num_rows() < 1 ) {
			redirect( base_url('/data_keluhan') );
		}
		return $q->row();
	}

	public function get_keluhan() 
	{
		$q=$this->db->select('*')->get('tb_keluhan');
		return $q->result();
	}

	public function pegawai_list_all() {
		$q=$this->db->select('*')->get('tb_pegawai');
		return $q->result();
	}

	public function bidang_list_all()
	{
		$q=$this->db->select('*')->get('tb_bidang');
		return $q->result();
	}

	// YANG BARU
	public function dkeluhan_list_all() 
	{
		$q=$this->db->select(  'b.nama_bidang, 
								bt.type,
								db.id_dkeluhan, db.nama_lengkap, db.alamat, db.nowa, db.nim_nip,
								db.fak_prodi, db.tgl_pengajuan, db.keluhan, db.status' )
								
				->from('tb_dkeluhan as db')
				->join('tb_bidang as b', 'b.id_bidang = db.id_bidang', 'LEFT')
				->join('tb_keluhan as bt', 'bt.id_keluhan = db.id_keluhan', 'LEFT')
				->get();
		return $q->result();
	}

	// YANG BARU
	public function dkeluhan_list_ajax($json)
	{
		$new_arr=array();$i=1;
		foreach ($json as $key => $value) 
		{
			$value->no=$i;
			switch ($value->status) 
			{
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

			$value->status = '<label class="badge badge-'.$label.' text-uppercase">'.$value->status.'</label>';
			$new_arr[]=$value;
			$i++;
		}
		return $new_arr;
	}

	public function add_new( $nama_lengkap, $alamat, $nowa, $id_keluhan, $keluhan, 
							 $nim_nip, $id_bidang, $fak_prodi, $tgl_pengajuan, $status ) 
	{
		$d_t_d = array(
			'nama_lengkap' 	=> $nama_lengkap,
			'alamat' 		=> $alamat,
			'nim_nip'		=> $nim_nip,
			'nowa' 			=> $nowa,
			'id_keluhan'	=> $id_keluhan,
			'keluhan'		=> $keluhan,
			'id_bidang'		=> $id_bidang,
			'fak_prodi' 	=> $fak_prodi,
			'tgl_pengajuan' => $tgl_pengajuan,
			'status' 		=> $status
		);
		$this->db->insert('tb_dkeluhan', $d_t_d);
		$this->session->set_flashdata('msg_alert', 'Pengajuan Permintaan Keluhan berhasil ditambahkan');
	}

	public function update(	$id_dkeluhan,$id_keluhan, $nama_lengkap, $alamat, $nowa, $keluhan, 
							$nim_nip, $id_bidang, $fak_prodi, $tgl_pengajuan, $status  ) 
	{
		$d_t_d = array(
			'nama_lengkap' 	=> $nama_lengkap,
			'alamat' 		=> $alamat,
			'nim_nip'		=> $nim_nip,
			'nowa' 			=> $nowa,
			'id_keluhan'	=> $id_keluhan,
			'keluhan'		=> $keluhan,
			'id_bidang'		=> $id_bidang,
			'fak_prodi' 	=> $fak_prodi,
			'tgl_pengajuan' => $tgl_pengajuan,
			'status' 		=> $status
		);
		$this->db->where( 'id_dkeluhan', $id_dkeluhan )->update('tb_dkeluhan', $d_t_d);
		$this->session->set_flashdata('msg_alert', 'Data Pengajuan Keluhan berhasil diubah');
	}

	public function delete($id_dkeluhan) { $this->db->delete('tb_dkeluhan', array('id_dkeluhan' => $id_dkeluhan)); }

}

/* End of file M_DataKeluhan.php */
/* Location: ./application/models/M_DataKeluhan.php */