<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Auth extends CI_Model 
{
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
				$nama_jabatan = 'Unknown';
			}
			$this->session->set_userdata('user_id_jabatan', $id_jabatan);
			$this->session->set_userdata('user_nama_jabatan', $nama_jabatan);
			
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
				$nama_bidang = 'Unknown';
			}

			$this->session->set_userdata('user_id_bidang', $id_bidang);
			$this->session->set_userdata('user_nama_bidang', $nama_bidang);

			//Tabel Mahasiswa
			$ambil_nim=$this->db->select('*')->where('id', $d->id)->get('tb_mhsiswa');
			if( $ambil_nim->num_rows() ) 
			{
				$data_mhsiswa = $ambil_nim->row();
				$id_mhs = $data_mhsiswa->id_mhs;
				$nim = $data_mhsiswa->nim;
				$id_prodi = $data_mhsiswa->id_prodi;
				$id_fakultas = $data_mhsiswa->id_fakultas;
			} 
			else 
			{
				$id_mhs = '0';
				$nim = 'Unknown';
				$id_prodi = 'Unknown';
				$id_fakultas = 'Unknown';
			}

			$this->session->set_userdata('id_mhs', $id_mhs);
			$this->session->set_userdata('nim', $nim);
			$this->session->set_userdata('id_prodi', $id_prodi);
			$this->session->set_userdata('id_fakultas', $id_fakultas);

			$ambil_prodi=$this->db->select('*')->where('id_prodi', $data_mhsiswa->id_prodi)->get('tb_prodi');
			if( $ambil_prodi->num_rows() ) 
			{
				$data_prodi = $ambil_prodi->row();
				$id_prodi = $data_prodi->id_prodi;
				$nama_prodi = $data_prodi->nama_prodi;
			} 
			else 
			{
				$id_prodi = '0';
				$nama_prodi = 'Unknown';
				
			}

			$this->session->set_userdata('id_prodi', $id_prodi);
			$this->session->set_userdata('nama_prodi', $nama_prodi);

			$ambil_fakultas=$this->db->select('*')->where('id_fakultas', $data_prodi->id_fakultas)->get('tb_fakultas');
			if( $ambil_fakultas->num_rows() ) 
			{
				$data_fakultas = $ambil_fakultas->row();
				$id_fakultas = $data_fakultas->id_fakultas;
				$nama_fakultas = $data_fakultas->nama_fakultas;
			} 
			else 
			{
				$id_fakultas = '0';
				$nama_fakultas = 'Unknown';
			}

			$this->session->set_userdata('id_fakultas', $id_fakultas);
			$this->session->set_userdata('nama_fakultas', $nama_fakultas);
			//batas Mahasiswa

			//tabel Dosen
			$ambil_nip=$this->db->select('*')->where('id', $d->id)->get('tb_dosen');
			if( $ambil_nip->num_rows() ) 
			{
				$data_nip = $ambil_nip->row();
				$id_dosen = $data_nip->id_dosen;
				$nip = $data_nip->nip;
			} 
			else 
			{	
				$id_dosen = '0';
				$nip = 'Unknown';
			}

			$this->session->set_userdata('id_dosen', $id_dosen);
			$this->session->set_userdata('nip', $nip);
			//batas dosen

			//tabel staff
			$ambil_np=$this->db->select('*')->where('id', $d->id)->get('tb_staff');
			if( $ambil_np->num_rows() ) 
			{
				$data_np = $ambil_np->row();
				$id_staff = $data_np->id_staff;
				$np = $data_np->np;
			} 
			else 
			{	
				$id_staff = '0';
				$np = 'Unknown';
			}

			$this->session->set_userdata('id_staff', $id_staff);
			$this->session->set_userdata('np', $np);
			//batas staff

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
		$cek_email=$this->db->select('*')->where('email', $email)->get('tb_admin');
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