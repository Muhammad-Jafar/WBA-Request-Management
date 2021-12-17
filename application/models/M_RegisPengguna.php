<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_RegisPengguna extends CI_Model 
{

	// public function simpan($data)
	// {
	// 	return $this->db->insert('tb_pengguna', $data);
	// }

	//Menampilkan list data yang relate
	public function jabatan_list_all()
	{
		$q = $this->db->select('*')->get('tb_jabatan');
		return $q->result();
	}

	public function bidang_list_all()
	{
		$q = $this->db->select('*')->get('tb_bidang');
		return $q->result();
	}

	public function fakultas_list_all()
	{
		$q = $this->db->select('*')->get('tb_fakultas');
		return $q->result();
	}

	public function prodi_list_all()
	{
		$q = $this->db->select('*')->get('tb_prodi');
		return $q->result();
	}
	//Menampilkan list data yang relate

	// Check username exists
	public function check_username_exists($id_user)
	{
		$query = $this->db->get_where('tb_pengguna', array('id_user' => $id_user));
		if(empty($query->row_array()))
		{ return true; } 
		else { return false; }
   }

   // Check email exists
   public function check_email_exists($email)
   {
	   $query = $this->db->get_where('tb_pengguna', array('email' => $email));
	   if (empty ($query->row_array()))
	   {return true;}
	   else {return false;}
   }

   //FUNSI TAMBAH DATA
   public function add_dosentetap( $nama,$nip,$tempat_lahir,$tanggal_lahir,
	 																 $jenis_kelamin, $id_jabatan,$id_bidang, $alamat, 
																	 $no_handphone,$email, $password, $id_user,$tanggal_regis,$avatar=0 )
   {
		//jalankan query
		$pengguna = array ( 'nama'					=> $nama,
												'tempat_lahir'	=> $tempat_lahir,
												'tanggal_lahir'	=> $tanggal_lahir,
												'jenis_kelamin'	=> $jenis_kelamin,
												'id_jabatan'		=> $id_jabatan,
												'id_bidang'			=> $id_bidang,
												'alamat'				=> $alamat,
												'no_handphone'	=> $no_handphone,
												'email'					=> $email,
												'password'			=> md5($password), 
												'id_user'				=> $id_user,
												'tanggal_regis'	=> $tanggal_regis,
												'avatar'				=> $avatar );

		if( empty($avatar) ) { $pengguna['avatar'] = 'avatar.png'; }

		//NARIK ID DARI TABEL A KE TABEL B
		$this->db->insert('tb_pengguna', $pengguna);
		$dosentetap_id = $this->db->insert_id();

		$dosentetap = array ('id' => $dosentetap_id, 'nip' => $nip );
		$this->db->insert('tb_dosentetap', $dosentetap);

		$this->session->set_flashdata('msg_alert', 'Pendaftaran anda berhasil dilakukan');
   }

	  public function add_dosensks( $nama,$tempat_lahir,$tanggal_lahir,
	 																$jenis_kelamin, $id_jabatan,$id_bidang, $alamat, 
																	$no_handphone,$email, $password, $id_user,$tanggal_regis,$avatar=0 )
   	{
		//jalankan query
		$pengguna = array ( 'nama'					=> $nama,
												'tempat_lahir'	=> $tempat_lahir,
												'tanggal_lahir'	=> $tanggal_lahir,
												'jenis_kelamin'	=> $jenis_kelamin,
												'id_jabatan'		=> $id_jabatan,
												'id_bidang'			=> $id_bidang,
												'alamat'				=> $alamat,
												'no_handphone'	=> $no_handphone,
												'email'					=> $email,
												'password'			=> md5($password), 
												'id_user'				=> $id_user,
												'tanggal_regis'	=> $tanggal_regis,
												'avatar'				=> $avatar );

		if( empty($avatar) ) { $pengguna['avatar'] = 'avatar.png'; }

		//NARIK ID DARI TABEL A KE TABEL B
		$this->db->insert('tb_pengguna', $pengguna);

		$dosensks_id = $this->db->insert_id();
		$dosensks = array (	'id' 	=> $dosensks_id, 
													// 'nip' => $nip 
												);
		$this->db->insert('tb_dosensks', $dosensks);

		$this->session->set_flashdata('msg_alert', 'Pendaftaran anda berhasil dilakukan');
   }

   public function add_tedik( $nama,$nip,$tempat_lahir,$tanggal_lahir,$jenis_kelamin,
															$id_jabatan,$id_bidang, $alamat, $no_handphone,$email, 
															$password, $id_user,$tanggal_regis,$avatar=0 )
   {
		$pengguna = array ( 'nama'					=> $nama,
												'tempat_lahir'	=> $tempat_lahir,
												'tanggal_lahir'	=> $tanggal_lahir,
												'jenis_kelamin'	=> $jenis_kelamin,
												'id_jabatan'		=> $id_jabatan,
												'id_bidang'			=> $id_bidang,
												'alamat'				=> $alamat,
												'no_handphone'	=> $no_handphone,
												'email'					=> $email,
												'password'			=> md5($password),
												'id_user'				=> $id_user,
												'tanggal_regis'	=> $tanggal_regis,
												'avatar'				=> $avatar );

		if( empty($avatar) ) { $dosen['avatar'] = 'avatar.png'; }

		//NARIK ID DARI TABEL A KE TABEL B
		$this->db->insert('tb_pengguna', $pengguna);

		$tedik_id = $this->db->insert_id();
		$tedik = array (	'id' 	=> $tedik_id, 
													'nip' => $nip 
												);
		$this->db->insert('tb_tedik', $tedik);

		$this->session->set_flashdata('msg_alert', 'Pendaftaran anda berhasil dilakukan');
   }

   public function add_tepen( $nama,$nik, $tempat_lahir,$tanggal_lahir,$jenis_kelamin,
															$id_jabatan,$id_bidang, $alamat, $no_handphone,$email, 
															$password, $id_user,$tanggal_regis,$avatar=0 )
   {
		$pengguna = array ( 'nama'					=> $nama,
												'tempat_lahir'	=> $tempat_lahir,
												'tanggal_lahir'	=> $tanggal_lahir,
												'jenis_kelamin'	=> $jenis_kelamin,
												'id_jabatan'		=> $id_jabatan,
												'id_bidang'			=> $id_bidang,
												'alamat'				=> $alamat,
												'no_handphone'	=> $no_handphone,
												'email'					=> $email,
												'password'			=> md5($password),
												'id_user'				=> $id_user,
												'tanggal_regis'	=> $tanggal_regis,
												'avatar'				=> $avatar );

		if( empty($avatar) ) { $dosen['avatar'] = 'avatar.png'; }

		//NARIK ID DARI TABEL A KE TABEL B
		$this->db->insert('tb_pengguna', $pengguna);

		$tepen_id = $this->db->insert_id();
		$tepen = array (	'id' 	=> $tepen_id, 
											'nik' => $nik 
									 );
		$this->db->insert('tb_tepen', $tepen);

		$this->session->set_flashdata('msg_alert', 'Pendaftaran anda berhasil dilakukan');
   }
   //FUNSI TAMBAH DATA
}