<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Dashboard extends CI_Model {

	//UNTUK ADMIN
	public function total_admin() //ADA
	{
		$q=$this->db->query('SELECT COUNT(*) FROM tb_admin');
		return $q->row_array()['COUNT(*)'];
	}

	// public function total_dataizin() // ADA
	// {
	// 	$q=$this->db->query("SELECT ( SELECT COUNT(*) FROM tb_izin ) AS TOTAL");
	// 	return $q->row_array()['TOTAL'];
	// }

	public function total_kebutuhanterkonfirmasi() //ADA
	{
		$q=$this->db->query("SELECT ( SELECT COUNT(*) FROM tb_dkebutuhan WHERE status!='approved' ) AS TOTAL");
		return $q->row_array()['TOTAL'];
	}
	public function sisa_kebutuhanterkonfirmasi() //ADA
	{
		$q=$this->db->query("SELECT ( SELECT COUNT(*) FROM tb_dkebutuhan WHERE status!='waiting' ) AS TOTAL");
		return $q->row_array()['TOTAL'];
	}

	public function total_keluhanterkonfirmasi() //ADA
	{
		$q=$this->db->query("SELECT ( SELECT COUNT(*) FROM tb_dkeluhan WHERE status!='approved' ) AS TOTAL");
		return $q->row_array()['TOTAL'];
	}
	public function sisa_keluhanterkonfirmasi() //ADA
	{
		$q=$this->db->query("SELECT ( SELECT COUNT(*) FROM tb_dkeluhan WHERE status!='waiting' ) AS TOTAL");
		return $q->row_array()['TOTAL'];
	}
	public function total_pegawai() //ADA
	{
		$q=$this->db->query('SELECT COUNT(*) FROM tb_pengguna');
		return $q->row_array()['COUNT(*)'];
	}
	//BAYAS ADMIN
	
	//UNTUK SUPERVISOR
	public function total_kebutuhan() //ADA
	{
		$q=$this->db->query("SELECT (SELECT COUNT(*) FROM tb_dkebutuhan) AS TOTAL");
		return $q->row_array()['TOTAL'];
	}
	public function total_keluhan()//ADA
	{
		$q=$this->db->query("SELECT (SELECT COUNT(*) FROM tb_dkeluhan) AS TOTAL");
		return $q->row_array()['TOTAL'];
	}
	public function kebutuhan_terkonfirmasi()
	{
		$q=$this->db->query("SELECT ( SELECT COUNT(*) FROM tb_dkebutuhan WHERE status!='waiting' ) AS TOTAL");
		return $q->row_array()['TOTAL'];
	}
	public function keluhan_terkonfirmasi() //ADA
	{
		$q=$this->db->query("SELECT ( SELECT COUNT(*) FROM tb_dkeluhan WHERE status!='waiting' ) AS TOTAL");
		return $q->row_array()['TOTAL'];
	}
	//BATAS SUPERVISOR

	//UNTUK PENGGUNA
	public function permintaan_kebutuhan()
	{
		$q=$this->db->query("SELECT COUNT(*) FROM tb_dkebutuhan AS i LEFT JOIN tb_kebutuhan AS ni ON i.id_kebutuhan=ni.id_kebutuhan WHERE i.status='waiting' AND i.id='{$this->session->userdata('user_id')}'");
		return $q->row_array()['COUNT(*)'];
	}
	public function permintaan_keluhan()
	{
		$q=$this->db->query("SELECT COUNT(*) FROM tb_dkeluhan AS i LEFT JOIN tb_keluhan AS ni ON i.id_keluhan=ni.id_keluhan WHERE i.status='waiting' AND i.id='{$this->session->userdata('user_id')}'");
		return $q->row_array()['COUNT(*)'];
	}
	public function permintaan_kebutuhanterkonfirmasi()
	{
		$q=$this->db->query("SELECT COUNT(*) FROM tb_dkebutuhan AS i LEFT JOIN tb_kebutuhan AS ni ON i.id_kebutuhan=ni.id_kebutuhan WHERE i.status='approved' AND i.id='{$this->session->userdata('user_id')}'");
		return $q->row_array()['COUNT(*)'];
	}
	public function permintaan_keluhanterkonfirmasi()
	{
		$q=$this->db->query("SELECT COUNT(*) FROM tb_dkeluhan AS i LEFT JOIN tb_keluhan AS ni ON i.id_keluhan=ni.id_keluhan WHERE i.status='approved' AND i.id='{$this->session->userdata('user_id')}'");
		return $q->row_array()['COUNT(*)'];
	}
	//BATAS PENGGUNA


	//Lain lain
	// public function pegawai_total_izincuti() {
	// 	$q=$this->db->query("SELECT COUNT(*) FROM tb_izin AS i LEFT JOIN tb_namaizin AS ni ON i.id_namaizin=ni.id_namaizin WHERE ni.type='cuti' AND i.id='{$this->session->userdata('user_id')}'");
	// 	return $q->row_array()['COUNT(*)'];
	// }

	// public function pegawai_total_izinsekolah() {
	// 	$q=$this->db->query("SELECT COUNT(*) FROM tb_izin AS i LEFT JOIN tb_namaizin AS ni ON i.id_namaizin=ni.id_namaizin WHERE ni.type='sekolah' AND i.id='{$this->session->userdata('user_id')}'");
	// 	return $q->row_array()['COUNT(*)'];
	// }

	// public function pegawai_total_izinseminar() {
	// 	$q=$this->db->query("SELECT COUNT(*) FROM tb_izin AS i LEFT JOIN tb_namaizin AS ni ON i.id_namaizin=ni.id_namaizin WHERE ni.type='seminar' AND i.id='{$this->session->userdata('user_id')}'");
	// 	return $q->row_array()['COUNT(*)'];
	// }

	// public function pegawai_izin_terkonfirmasi() {
	// 	$q=$this->db->query("SELECT ( SELECT COUNT(*) FROM tb_izin AS i LEFT JOIN tb_namaizin AS ni ON i.id_namaizin=ni.id_namaizin WHERE status!='waiting' AND i.id='{$this->session->userdata('user_id')}' ) AS TOTAL");
	// 	return $q->row_array()['TOTAL'];
	// }

	// public function baak_total_izincuti() {
	// 	$q=$this->db->query("SELECT COUNT(*) FROM tb_izin AS i LEFT JOIN tb_namaizin AS ni ON i.id_namaizin=ni.id_namaizin WHERE ni.type='cuti'");
	// 	return $q->row_array()['COUNT(*)'];
	// }

	// public function baak_total_izinsekolah() {
	// 	$q=$this->db->query("SELECT COUNT(*) FROM tb_izin AS i LEFT JOIN tb_namaizin AS ni ON i.id_namaizin=ni.id_namaizin WHERE ni.type='sekolah'");
	// 	return $q->row_array()['COUNT(*)'];
	// }

	// public function baak_total_izinseminar() {
	// 	$q=$this->db->query("SELECT COUNT(*) FROM tb_izin AS i LEFT JOIN tb_namaizin AS ni ON i.id_namaizin=ni.id_namaizin WHERE ni.type='seminar'");
	// 	return $q->row_array()['COUNT(*)'];
	// }

	// public function baak_izin_terkonfirmasi() {
	// 	$q=$this->db->query("SELECT ( SELECT COUNT(*) FROM tb_izin AS i LEFT JOIN tb_namaizin AS ni ON i.id_namaizin=ni.id_namaizin WHERE status!='waiting' ) AS TOTAL");
	// 	return $q->row_array()['TOTAL'];
	// }
}

/* End of file M_Dashboard.php */
/* Location: ./application/models/M_Dashboard.php */