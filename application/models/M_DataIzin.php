<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_DataIzin extends CI_Model {

	public function get_data_dkebutuhan($id_dkebutuhan) 
	{
		$q=$this->db->select(  'b.nama_bidang, 
								bt.type, bt.nama_kebutuhan, 
								db.id_dkebutuhan, db.nama_lengkap, db.alamat, db.nowa, db.nim_nip, 
								db.fak_prodi, db.tgl_pengajuan, db.tgl_mulai, db.tgl_akhir, db.status' )

				->from ('tb_dkebutuhan as db')
				->join ('tb_bidang as b', 'b.id_bidang = db.id_bidang', 'LEFT')
				->join ('tb_kebutuhan as bt', 'bt.id_kebutuhan = db.id_kebutuhan', 'LEFT')
				->where( 'db.id_dkebutuhan', $id_dkebutuhan )
				->limit(1)->get();

		if( $q->num_rows() < 1 ) {
			redirect( base_url('/data_izin') );
		}
		return $q->row();
	}

	public function get_kebutuhan() 
	{
		$q=$this->db->select('*')->get('tb_kebutuhan');
		return $q->result();
	}

	public function bidang_list_all()
	{
		$q=$this->db->select('*')->get('tb_bidang');
		return $q->result();
	}

	// YANG BARU
	public function dkebutuhan_list_all() 
	{
		$q=$this->db->select(  'b.nama_bidang, 
								bt.type, bt.nama_kebutuhan, 
								db.id_dkebutuhan, db.nama_lengkap, db.alamat, db.nowa, db.nim_nip, db.fak_prodi,
								db.id_bidang, db.tgl_pengajuan, db.tgl_mulai, db.tgl_akhir, db.status' )
								
				->from('tb_dkebutuhan as db')
				->join('tb_bidang as b', 'b.id_bidang = db.id_bidang', 'LEFT')
				->join('tb_kebutuhan as bt', 'bt.id_kebutuhan = db.id_kebutuhan', 'LEFT')
				->get();
		return $q->result();
	}

	// YANG BARU
	public function dkebutuhan_list_ajax($json) 
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
			$diff  = date_diff( date_create($value->tgl_mulai), date_create($value->tgl_akhir) );
			$value->lama_izin = $diff->format('%d hari');
			$value->tgl_pengajuan = date_format ( date_create($value->tgl_pengajuan), 'd M Y');
			$value->tgl_mulai = date_format( date_create($value->tgl_mulai), 'd M Y');
			$value->tgl_akhir = date_format( date_create($value->tgl_akhir), 'd M Y');
			$value->status = '<label class="badge badge-'.$label.' text-uppercase">'.$value->status.'</label>';
			$new_arr[]=$value;
			$i++;
		}
		return $new_arr;
	}

	public function add_new( $id_kebutuhan, $id_bidang, $nama_lengkap, $alamat, $nowa, $nim_nip,
	                         $prodi_fakultas, $tgl_pengajuan, $tgl_mulai , $tgl_akhir, $status ) 

	{
		$d_t_d = array(
			'id_kebutuhan'	=> $id_kebutuhan,      
			// 'nama_kebutuhan'=> $nama_kebutuhan,
			'nama_lengkap' 	=> $nama_lengkap,
			'alamat' 		=> $alamat,
			'nowa' 			=> $nowa,
			'nim_nip' 		=> $nim_nip,
			'id_bidang'		=> $id_bidang,
			'prodi_fakultas'=> $prodi_fakultas,
			'tgl_pengajuan' => $tgl_pengajuan,
			'tgl_mulai' 	=> $tgl_mulai,
			'tgl_akhir' 	=> $tgl_akhir,
			'status' 		=> $status
		);
		$this->db->insert('tb_dkebutuhan', $d_t_d);
		$this->session->set_flashdata('msg_alert', 'Pengajuan Permintaan Kebutuhan berhasil ditambahkan');
	}

	public function update(	$id_dkebutuhan, $id_kebutuhan,$id_bidang,$nama_lengkap, $alamat,$nowa,
							$nim_nip, $prodi_fakultas, $tgl_pengajuan, $tgl_mulai , $tgl_akhir, $status ) 
	{
		$d_t_d = array(
			'id_kebutuhan' 	=> $id_kebutuhan,
			'nama_lengkap' 	=> $nama_lengkap,
			'alamat' 		=> $alamat,
			'nowa' 			=> $nowa,
			'nim_nip' 		=> $nim_nip,
			'id_bidang'		=> $id_bidang,
			'prodi_fakultas'=> $prodi_fakultas,
			'tgl_pengajuan' => $tgl_pengajuan,
			'tgl_mulai' 	=> $tgl_mulai,
			'tgl_akhir' 	=> $tgl_akhir,
			'status' 		=> $status
		);
		$this->db->where( 'id_dkebutuhan', $id_dkebutuhan )->update('tb_dkebutuhan', $d_t_d);
		$this->session->set_flashdata('msg_alert', 'Data Pengajuan Permintaan berhasil diubah');
	}

	public function delete($id_dkebutuhan) 
	{
		$this->db->delete('tb_dkebutuhan', array('id_dkebutuhan' => $id_dkebutuhan));
	}

}

/* End of file M_DataIzin.php */
/* Location: ./application/models/M_DataIzin.php */