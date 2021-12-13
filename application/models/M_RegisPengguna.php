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
   public function add_mhs( $nama,$nim,$tempat_lahir,$tanggal_lahir,$jenis_kelamin,
							$id_jabatan,$id_bidang, $id_fakultas, $id_prodi, $alamat, 
							$no_handphone,$email, $password, $id_user,$tanggal_regis,$avatar=0 )
   {
		// $this->db->trans_start();

		//jalankan query
		$pengguna = array ( 'nama'			=> $nama,
							'tempat_lahir'	=> $tempat_lahir,
							'tanggal_lahir'	=> $tanggal_lahir,
							'jenis_kelamin'	=> $jenis_kelamin,
							'id_jabatan'	=> $id_jabatan,
							'id_bidang'		=> $id_bidang,
							'alamat'		=> $alamat,
							'no_handphone'	=> $no_handphone,
							'email'			=> $email,
							'password'		=> md5($password), 
							'id_user'		=> $id_user,
							'tanggal_regis'	=> $tanggal_regis,
							'avatar'		=> $avatar );

		// $mhs_id = $this->db->insert_id()

		
		if( empty($avatar) ) { $pengguna['avatar'] = 'avatar.png'; }
		// return $mhs_id;
		$this->db->insert('tb_pengguna', $pengguna);
		$mhs_id = $this->db->insert_id();
		$mhs 	  = array ( 
			'id' 			=> $mhs_id,
							'nim'			=> $nim, 
							'id_prodi' 		=> $id_prodi, 
							'id_fakultas' 	=> $id_fakultas );
		
							$this->db->insert('tb_mhsiswa', $mhs);

		// var_dump($mhs_id); die;
		
		// $this->db->trans_complete();

		$this->session->set_flashdata('msg_alert', 'Pendaftaran sebagai Mahasiswa berhasil dilakukan');


		// if($this->db->trans_status() == FALSE)
		// {
		// 	echo 'rollback';
		// }
		// else { echo 'success'; }
   }

   public function add_dosen( $nama,$nip,$tempat_lahir,$tanggal_lahir,$jenis_kelamin,
							$id_jabatan,$id_bidang, $alamat, $no_handphone,$email, 
							$password, $id_user,$tanggal_regis,$avatar=0 )
   {
		$pengguna = array ( 'nama'			=> $nama,
							'tempat_lahir'	=> $tempat_lahir,
							'tanggal_lahir'	=> $tanggal_lahir,
							'jenis_kelamin'	=> $jenis_kelamin,
							'id_jabatan'	=> $id_jabatan,
							'id_bidang'		=> $id_bidang,
							'alamat'		=> $alamat,
							'no_handphone'	=> $no_handphone,
							'email'			=> $email,
							'password'		=> md5($password),
							'id_user'		=> $id_user,
							'tanggal_regis'	=> $tanggal_regis,
							'avatar'		=> $avatar );
		
		$dosen_id = $this->db->insert_id();
		return $dosen_id;
		$dosen = array( 'nip' => $nip);
		
		if( empty($avatar) ) { $dosen['avatar'] = 'avatar.png'; }

		$this->db->insert('tb_pengguna', $pengguna);
		$this->db->insert('tb_dosen', $dosen);
		$this->session->set_flashdata('msg_alert', 'Pendaftaran sebagai dosen berhasil dilakukan');
   }

   public function add_staff( $nama,$tempat_lahir,$tanggal_lahir,$jenis_kelamin,
							  $id_jabatan,$id_bidang, $alamat, $no_handphone,$email, 
							  $password, $id_user,$tanggal_regis,$avatar=0 )
	{
		$pengguna = array ( 'nama'			=> $nama,
							'tempat_lahir'	=> $tempat_lahir,
							'tanggal_lahir'=> $tanggal_lahir,
							'jenis_kelamin'=> $jenis_kelamin,
							'id_jabatan'	=> $id_jabatan,
							'id_bidang'	=> $id_bidang,
							'alamat'		=> $alamat,
							'no_handphone'	=> $no_handphone,
							'email'		=> $email,
							'password'		=> md5($password),
							'id_user'		=> $id_user,
							'tanggal_regis'=> $tanggal_regis,
							'avatar'		=> $avatar );

		$staff_id = $this->db->insert_id();
		return $staff_id;
		// $staff_id['id'] = $staff_id;
		// $staff = array( 'np' => $np);

		if( empty($avatar) ) { $pengguna['avatar'] = 'avatar.png'; }

		$this->db->insert('tb_pengguna', $pengguna);
		$this->session->set_flashdata('msg_alert', 'Pendaftaran sebagai staff berhasil dilakukan');
	}
   //FUNSI TAMBAH DATA
}