<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Auth extends CI_Model 
{
	//FUNGSI LOGIN WITH GOOGLE
	function Is_already_register($id)
	{
		$this->db->where('login_oauth_uid', $id);
		$query = $this->db->get('tb_pengguna');
		if($query->num_rows() > 0)
		{
		return true;
		}
		else
		{
		return false;
		}
	}

	function Update_user_data($data, $id)
	{
		$this->db->where('login_oauth_uid', $id);
		$this->db->update('tb_pengguna', $data);
	}

	function Insert_user_data($data)
	{
		$this->db->insert('tb_pengguna', $data);
	}

	//FUNGSI LOGIN BIASA
	private function loginSupervisor($email, $password) 
	{
		$q=$this->db->select('*')->where(array('email' => $email, 'password' => md5($password)))->get('tb_admin');
		return $q;
	}

	private function loginAdmin($email, $password) 
	{
		$q=$this->db->select('*')->where(array('email' => $email, 'password' => md5($password)))->get('tb_admin');
		return $q;
	}

	private function loginPengguna($email, $password) 
	{
		$q=$this->db->select('*')->where(array('email' => $email, 'password' => md5($password)))->get('tb_pengguna');
		return $q;
	}

	public function doLogin($email, $password) 
	{
		$cek_login_supervisor = $this->loginSupervisor($email, $password);
		$cek_login_admin = $this->loginAdmin($email, $password);
		$cek_login_pengguna = $this->loginPengguna($email, $password);
		
		if( $cek_login_supervisor->num_rows() ) 
		{
			$d = $cek_login_admin->row();
			$this->session->set_userdata('is_logged_in', 'login');
			$this->session->set_userdata('user_type', $d->type);
			$this->session->set_userdata('user_id', $d->id_user);
			$this->session->set_userdata('user_name', $d->namalengkap);
			$this->session->set_userdata('user_email', $d->email);
			$this->session->set_userdata('user_username', $d->username);
			$this->session->set_userdata('user_avatar', uploads_url('avatar/' . $d->avatar));
			
			redirect( base_url('dashboard') );
		}

		if( $cek_login_admin->num_rows() ) 
		{
			$d = $cek_login_admin->row();
			$this->session->set_userdata('is_logged_in', 'login');
			$this->session->set_userdata('user_type', $d->type);
			$this->session->set_userdata('user_id', $d->id_user);
			$this->session->set_userdata('user_name', $d->namalengkap);
			$this->session->set_userdata('user_email', $d->email);
			$this->session->set_userdata('user_username', $d->username);
			$this->session->set_userdata('user_avatar', uploads_url('avatar/' . $d->avatar));
			
			redirect( base_url('dashboard') );
		}

		else if ( $cek_login_pengguna->num_rows() ) 
		{
			$d = $cek_login_pengguna->row();
			$this->session->set_userdata('is_logged_in', 'login');
			$this->session->set_userdata('user_type', 'pengguna');
			$this->session->set_userdata('user_id', $d->id);
			$this->session->set_userdata('user_name', $d->nama);
			$this->session->set_userdata('tempat_lahir', $d->tempat_lahir);
			$this->session->set_userdata('tanggal_lahir', $d->tanggal_lahir);
			$this->session->set_userdata('jenis_kelamin', $d->jenis_kelamin);
			$this->session->set_userdata('alamat', $d->alamat);
			$this->session->set_userdata('no_handphone', $d->no_handphone);
			$this->session->set_userdata('user_email', $d->email);
			$this->session->set_userdata('nama_id', $d->id_user);
			$this->session->set_userdata('tanggal_regis', $d->tanggal_regis);
			$this->session->set_userdata('user_avatar', uploads_url('avatar/' . $d->avatar));
			
			//DARI TABEL JABATAN
			$ambil_jabatan=$this->db->select('*')->where('id_jabatan', $d->id_jabatan)->get('tb_jabatan');
			if( $ambil_jabatan->num_rows() ) 
			{
				$data_jabatan = $ambil_jabatan->row();
				$id_jabatan = $data_jabatan->id_jabatan;
				$nama_jabatan = $data_jabatan->nama_jabatan;
			} 
			else 
			{
				$id_jabatan = '0';
				$nama_jabatan = '-';
			}
			$this->session->set_userdata('user_id_jabatan', $id_jabatan);
			$this->session->set_userdata('user_nama_jabatan', $nama_jabatan);
			
			//DARI TABEL BIDANG
			$ambil_bidang=$this->db->select('*')->where('id_bidang', $d->id_bidang)->get('tb_bidang');
			if( $ambil_bidang->num_rows() ) 
			{
				$data_bidang = $ambil_bidang->row();
				$id_bidang = $data_bidang->id_bidang;
				$nama_bidang = $data_bidang->nama_bidang;
			} 
			else 
			{
				$id_bidang = '0';
				$nama_bidang = '-';
			}

			$this->session->set_userdata('user_id_bidang', $id_bidang);
			$this->session->set_userdata('user_nama_bidang', $nama_bidang);

			//DARI TABEL DOSEN TETAP
			$ambil_nip=$this->db->select('*')->where('id', $d->id)->get('tb_dosentetap');
			if( $ambil_nip->num_rows() ) 
			{
				$data_dosentetap = $ambil_nip->row();
				$id_dosentetap = $data_dosentetap->id_dosentetap;
				$nip = $data_dosentetap->nip;
			} 
			else 
			{
				$id_dosentetap = ' - ';
				$nip = '';
			}

			$this->session->set_userdata('id_dosentetap', $id_dosentetap);
			$this->session->set_userdata('nip', $nip);
		
			//DARI TABEL DOSEN SKS
			$ambil_nip=$this->db->select('*')->where('id', $d->id)->get('tb_dosensks');
			if( $ambil_nip->num_rows() ) 
			{
				$data_dosensks = $ambil_nip->row();
				$id_dosensks = $data_dosensks->id_dosensks;
				// $nama_prodi = $data_prodi->nama_prodi;
			} 
			else 
			{
				$id_prodi = ' - ';
				$nama_prodi = '-';
				
			}

			$this->session->set_userdata('id_dosensks', $id_dosensks);
			// $this->session->set_userdata('nama_prodi', $nama_prodi);

			//DARI TABEL TENAGA PENDIDIK
			$ambil_tepen=$this->db->select('*')->where('id', $d->id)->get('tb_tepen');
			if( $ambil_tepen->num_rows() ) 
			{
				$data_tepen = $ambil_tepen->row();
				$id_tepen = $data_tepen->id_tepen;
				$nik = $data_tepen->nik;
			} 
			else 
			{
				$id_tepen = '0';
				$nik = '';
			}

			$this->session->set_userdata('id_tepen', $id_tepen);
			$this->session->set_userdata('nik', $nik);

			//DARI TABEL TENAGA PENUNJANG
			$ambil_nip=$this->db->select('*')->where('id', $d->id)->get('tb_tedik');
			if( $ambil_nip->num_rows() ) 
			{
				$data_nip = $ambil_nip->row();
				$id_tedik = $data_nip->id_tedik;
				$nip = $data_nip->nip;
			} 
			else 
			{	
				$id_tedik = '0';
				$nip = '';
			}

			$this->session->set_userdata('id_tedik', $id_tedik);
			$this->session->set_userdata('nip_tedik', $nip);

			redirect( base_url('dashboard') );
		}

		else 
		{
			$this->session->set_flashdata('msg_alert', 'Email/password anda salah');
			redirect( base_url('auth/login') );
		}
	}

	public function doResetPassword($email) 
	{
		$cek_email=$this->db->select('*')->where('email', $email)->get('tb_pengguna');
		if( !$cek_email->num_rows() ) 
		{
			$this->session->set_flashdata('msg_alert', 'Email tidak terdaftar');
			redirect( base_url('auth/lost_password') );
		} 
		else 
		{
			$this->session->set_flashdata('msg_alert', 'Password berhasil dikirim ke email');
			redirect( base_url('auth/lost_password') );
		}
	}

}

/* End of file auth.php */
/* Location: ./application/models/M_Auth.php */