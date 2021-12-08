<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_DataMaster extends CI_Model {

	//Menampilkan List semua Data per pilihan menu
	public function admin_list_all() {
		$q=$this->db->select('*')->get('tb_admin');
		return $q->result();
	}

	public function jabatan_list_all() {
		$q=$this->db->select('*')->get('tb_jabatan');
		return $q->result();
	}

	public function bidang_list_all() {
		$q=$this->db->select('*')->get('tb_bidang');
		return $q->result();
	}

	public function pegawai_list_all() 
	{
		$q=$this->db->select('*')
				->from('tb_pengguna as p')
				->join('tb_bidang as b', 'b.id_bidang = p.id_bidang', 'LEFT')
				->join('tb_jabatan as j', 'j.id_jabatan = p.id_jabatan', 'LEFT')
				->get();
		return $q->result();
	}

	//TAMBAHAN BARU UNTUK SORTING DATA PENGGUNA
	public function mhs_list_all() 
	{
		$q=$this->db->select('*')	
		->from('tb_pengguna as pg')
		->join('tb_mhsiswa as mhs', 'mhs.id = pg.id', 'LEFT')
		->join('tb_bidang as b', 'b.id_bidang = pg.id_bidang', 'LEFT')
		->join('tb_jabatan as j', 'j.id_jabatan = pg.id_jabatan', 'LEFT')
		->join('tb_fakultas as fak', 'fak.id_fakultas = mhs.id_fakultas', 'LEFT')
		->join('tb_prodi as prod', 'prod.id_prodi = mhs.id_prodi', 'LEFT')
		->where('nama_bidang','Mahasiswa')
		->get();
		return $q->result();
	}

	public function dosen_list_all() 
	{
		$q=$this->db->select('*')	
		->from('tb_pengguna as pg')
		->join('tb_dosen as do', 'do.id = pg.id', 'LEFT')
		->join('tb_bidang as b', 'b.id_bidang = pg.id_bidang', 'LEFT')
		->join('tb_jabatan as j', 'j.id_jabatan = pg.id_jabatan', 'LEFT')
		->where('nama_bidang','Dosen')
		->get();
		return $q->result();
	}

	public function staff_list_all() 
	{
		$q=$this->db->select('*')	
		->from('tb_pengguna as pg')
		->join('tb_staff as stf', 'stf.id = pg.id', 'LEFT')
		->join('tb_bidang as b', 'b.id_bidang = pg.id_bidang', 'LEFT')
		->join('tb_jabatan as j', 'j.id_jabatan = pg.id_jabatan', 'LEFT')
		->where('nama_bidang','Staff UTS')
		->get();
		return $q->result();
	}
	//ENDING SORTING DATA PENGGUNA

	public function namaizin_list_all() {
		$q=$this->db->select('*')
		->from('tb_kebutuhan as k')
		->join('tb_nkebutuhan as nk', 'k.id_kebutuhan = nk.id_kebutuhan', 'LEFT')
		->get();
		return $q->result();
	}

	public function get_data_namaizin($id) 
	{ 
		$q=$this->db->select('*')
		->from('tb_kebutuhan as k')
		->join('tb_nkebutuhan as nk', ' k.id_kebutuhan = nk.id_kebutuhan') 
		->where('id_nkebutuhan', $id)->limit(1)->get();

		if( $q->num_rows() < 1 ) 
		{
			redirect( base_url('/data_master/nama_izin') );
		}
		return $q->row();
	}

	public function kebutuhan_list_all() {
		$q=$this->db->select('*')->get('tb_kebutuhan');//ini tabel awalnya
		return $q->result();
	}

	public function keluhan_list_all()
	{
		$q=$this->db->select('*')->get('tb_keluhan');
		return $q->result();
	}

	public function get_data_jabatan($id) {
		$q=$this->db->select('*')->from('tb_jabatan')->where('id_jabatan', $id)->limit(1)->get();
		if( $q->num_rows() < 1 ) {
			redirect( base_url('/data_master/jabatan') );
		}
		return $q->row();
	}

	public function get_data_bidang($id) {
		$q=$this->db->select('*')->from('tb_bidang')->where('id_bidang', $id)->limit(1)->get();
		if( $q->num_rows() < 1 ) {
			redirect( base_url('/data_master/bidang') );
		}
		return $q->row();
	}

	public function get_list_bidang()
	{
		$q=$this->db->select('*')-> get('tb_bidang');
		return $q->result();
	}

	public function get_list_jabatan()
	{
		$q=$this->db->select('*')->get('tb_jabatan');
		return $q->result();
	}
	
	public function get_data_keluhan($id)
	{
		$q=$this->db->select('*')->from('tb_keluhan')->where('id_keluhan', $id)->limit(1)->get();
		if($q->num_rows() < 1) 
		{
			redirect( base_url('/data_master/keluhan'));
		}
		return $q->row();
	}

	public function get_data_admin($id) {
		$q=$this->db->select('*')->from('tb_admin')->where('id_user', $id)->limit(1)->get();
		if( $q->num_rows() < 1 ) {
			redirect( base_url('/data_master/admin') );
		}
		return $q->row();
	}

	public function get_data_pegawai($id) {
		$q=$this->db->select('*')
				->from('tb_pengguna as p')
				->join('tb_bidang as b', 'b.id_bidang = p.id_bidang', 'LEFT')
				->join('tb_jabatan as j', 'j.id_jabatan = p.id_jabatan', 'LEFT')
				->where('id', $id)
				->limit(1)
				->get();
		if( $q->num_rows() < 1 ) {
			redirect( base_url('/data_master/pegawai') );
		}
		return $q->row();
	}
	//GET SEMUA DATA

	//FUNGSI APDET DATA
	public function jabatan_update($id,$nama_jabatan) {
		$d_t_d = array(
			'nama_jabatan' => $nama_jabatan
		);
		$this->db->where('id_jabatan', $id)->update('tb_jabatan', $d_t_d);
		$this->session->set_flashdata('msg_alert', 'Data jabatan berhasil diubah');
	}

	public function bidang_update($id,$nama_bidang) {
		$d_t_d = array(
			'nama_bidang' => $nama_bidang
		);
		$this->db->where('id_bidang', $id)->update('tb_bidang', $d_t_d);
		$this->session->set_flashdata('msg_alert', 'Data bidang berhasil diubah');
	}

	public function namaizin_update($id_kebutuhan, $id_nkebutuhan, $nama_kebutuhan) 
	{
		$namakebutuhan = array( 'id_kebutuhan'  => $id_kebutuhan,
								'id_nkebutuhan' => $id_nkebutuhan,
								'nama_kebutuhan'=> $nama_kebutuhan );

		$this->db->where('id_nkebutuhan', $id_nkebutuhan)->update('tb_nkebutuhan', $namakebutuhan);
		$this->session->set_flashdata('msg_alert', 'Data kebutuhan baru berhasil dubah');
	}

	public function keluhan_update($id_keluhan,$type) {
		$d_t_d = array(
			'type' => $type
		);
		$this->db->where('id_keluhan', $id_keluhan)->update('tb_keluhan', $d_t_d);
		$this->session->set_flashdata('msg_alert', 'Data Daftar Keluhan berhasil diubah');
	}

	public function admin_update($id_user,$username, $email, $namalengkap, $password, $type, $avatar) {
		$d_t_d = array(
			'id_user' => $id_user,
			'username' => $username,
			'email' => $email,
			'namalengkap' => $namalengkap,
			'type' => $type
		);
		if( !empty($password) ) {
			$d_t_d['password'] = md5($password);
		}
		if( !empty($avatar) ) {
			$d_t_d['avatar'] = $avatar;
		}
		$this->db->where('id_user', $id_user)->update('tb_admin', $d_t_d);
		$this->session->set_flashdata('msg_alert', 'Data admin berhasil diubah');
	}

	public function pegawai_update( 	$id, $nama,$nomor_induk,$tempat_lahir,$tanggal_lahir,$jenis_kelamin,
										$id_jabatan,$id_bidang,$alamat,$no_handphone,$email,
										$password,$id_user,$tanggal_regis,$avatar) 
	{
		$d_t_d = array(
			'nama' => $nama,
			'nomor_induk' => $nomor_induk,
			'tempat_lahir' => $tempat_lahir,
			'tanggal_lahir' => $tanggal_lahir,
			'jenis_kelamin' => $jenis_kelamin,
			'id_jabatan' => $id_jabatan,
			'id_bidang' => $id_bidang,
			'alamat' => $alamat,
			'no_handphone' => $no_handphone,
			'email' => $email,
			'id_user' => $id_user,
			'tanggal_regis' => $tanggal_regis
		);
		if( !empty($password) ) {
			$d_t_d['password'] = md5($password);
		}
		if( !empty($avatar) ) {
			$d_t_d['avatar'] = $avatar;
		}
		$this->db->where('id', $id)->update('tb_pengguna', $d_t_d);
		$this->session->set_flashdata('msg_alert', 'Data Pengguna berhasil diubah');
	}
	//FUNGSI APDET DATA

	//FUNGSI HAPUS DATA
	public function admin_delete($id) {
		$this->db->delete('tb_admin', array('id_user' => $id));
	}

	public function jabatan_delete($id) {
		$this->db->delete('tb_jabatan', array('id_jabatan' => $id));
	}

	public function bidang_delete($id) {
		$this->db->delete('tb_bidang', array('id_bidang' => $id));
	}

	public function pegawai_delete($id) {
		$this->db->delete('tb_pengguna', array('id' => $id));
	}

	public function namaizin_delete($id) {
		$this->db->delete('tb_nkebutuhan', array('id_nkebutuhan' => $id));
	}

	public function keluhan_delete($id) {
		$this->db->delete('tb_keluhan', array('id_keluhan' => $id));
	}
	//FUNGSI HAPUS DATA

	//FUNGSI TAMBAH DATA BARU
	public function admin_add_new( $username, $email, $namalengkap, $password, $type, $avatar=0 ) 
	{
		$d_t_d = array(
						'username' => $username,
						'email' => $email,
						'namalengkap' => $namalengkap,
						'password' => md5($password),
						'type' => $type,
						'avatar' => $avatar
					);
		if( empty($avatar) ) {
			$d_t_d['avatar'] = 'avatar.png';
		}
		$this->db->insert('tb_admin', $d_t_d);
		$this->session->set_flashdata('msg_alert', 'Admin baru berhasil ditambahkan');
	}

	public function jabatan_add_new( $nama_jabatan) 
	{
		$d_t_d = array(
			'nama_jabatan' => $nama_jabatan
		);
		$this->db->insert('tb_jabatan', $d_t_d);
		$this->session->set_flashdata('msg_alert', 'Jabatan baru berhasil ditambahkan');
	}

	public function bidang_add_new($nama_bidang) 
	{
		$d_t_d = array(
			'nama_bidang' => $nama_bidang
		);
		$this->db->insert('tb_bidang', $d_t_d);
		$this->session->set_flashdata('msg_alert', 'Bidang baru berhasil ditambahkan');
	}

	public function namaizin_add_new( $id_kebutuhan,$nama_kebutuhan) 
	{
		$namakebutuhan = array( 'id_kebutuhan'   => $id_kebutuhan,
								'nama_kebutuhan' => $nama_kebutuhan);

		$this->db->insert('tb_nkebutuhan',$namakebutuhan);
		$this->session->set_flashdata('msg_alert', 'Data kebutuhan baru berhasil ditambahkan');
	}

	public function keluhan_add_new( $type) 
	{
		$d_t_d = array(
			'type' => $type
		);
		$this->db->insert('tb_keluhan', $d_t_d);
		$this->session->set_flashdata('msg_alert', 'Data keluhan baru berhasil ditambahkan');
	}

	public function pegawai_add_new( 	$nama,$nomor_induk,$tempat_lahir,$tanggal_lahir,$jenis_kelamin,
										$id_jabatan,$id_bidang,$alamat,$no_handphone,$email,
										$password,$id_user,$tanggal_regis,$avatar=0) 
	{
		$d_t_d = array(
			'nama' => $nama,
			'nomor_induk' => $nomor_induk,
			'tempat_lahir' => $tempat_lahir,
			'tanggal_lahir' => $tanggal_lahir,
			'jenis_kelamin' => $jenis_kelamin,
			'id_jabatan' => $id_jabatan,
			'id_bidang' => $id_bidang,
			'alamat' => $alamat,
			'no_handphone' => $no_handphone,
			'email' => $email,
			'password' => md5($password),
			'id_user' => $id_user,
			'tanggal_regis' => $tanggal_regis,
			'avatar' => $avatar
		);
		if( empty($avatar) ) {
			$d_t_d['avatar'] = 'avatar.png';
		}
		$this->db->insert('tb_pengguna', $d_t_d);
		$this->session->set_flashdata('msg_alert', 'Pengguna baru berhasil ditambahkan');
	}
	//FUNGSI TAMBAH DATA BARU

}

/* End of file M_DataMaster.php */
/* Location: ./application/models/M_DataMaster.php */