<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Regis_Pengguna extends CI_Controller 
{
	private $m_regispengguna;

	function __construct() 
    {
		parent::__construct();
		$this->load->model('M_RegisPengguna');
		$this->m_regispengguna = $this->M_RegisPengguna;
	}

	public function index() 
	{
		$this->load->view('partial/RegisPengguna/V_Regis_Pengguna');
		// redirect( base_url('regis_pengguna') );
	}

	//FUNGSI TAMBAH DATA
	public function regismhs()
	{
		if( $_SERVER['REQUEST_METHOD'] == 'POST') 
		{
			$nama= $this->security->xss_clean( $this->input->post('nama') );
			$nim= $this->security->xss_clean( $this->input->post('nim') );
			$tempat_lahir= $this->security->xss_clean( $this->input->post('tempat_lahir') );
			$tanggal_lahir= $this->security->xss_clean( $this->input->post('tanggal_lahir') );
			$jenis_kelamin= $this->security->xss_clean( $this->input->post('jenis_kelamin') );
			$id_jabatan= $this->security->xss_clean( $this->input->post('id_jabatan') );
			$id_bidang= $this->security->xss_clean( $this->input->post('id_bidang') );
			$id_fakultas= $this->security->xss_clean( $this->input->post('id_fakultas'));
			$id_prodi= $this->security->xss_clean( $this->input->post('id_prodi'));
			$alamat= $this->security->xss_clean( $this->input->post('alamat') );
			$no_handphone= $this->security->xss_clean( $this->input->post('no_handphone') );
			$email= $this->security->xss_clean( $this->input->post('email') );
			$password= $this->security->xss_clean( $this->input->post('password') );
			$id_user= $this->security->xss_clean( $this->input->post('id_user') );
			$tanggal_regis = date('Y-m-d');
			// $tanggal_regis= $this->security->xss_clean( $this->input->post('tanggal_regis') );
			$avatar = '';

			// avatar
			if ( $this->security->xss_clean( $_FILES["avatar"] ) && $_FILES['avatar']['name'] ) 
			{
				$config['upload_path']          = './uploads/avatar/';
				$config['allowed_types']        = 'jpg|jpeg|png';
				$config['max_size']             = 2000;
				$config['file_name']			= md5(time() . '_' . $_FILES["avatar"]['name']);
		 
				$this->load->library('upload', $config);
		 
				if ( !$this->upload->do_upload('avatar') && !empty($_FILES['avatar']['name'])) 
				{
					$this->session->set_flashdata('msg_alert', $this->upload->display_errors());
					redirect( base_url('regis_pengguna') );
				} 
				else { $avatar = $this->upload->data()['file_name'];}
			}
			// validasi
			$this->form_validation->set_rules('nama', 'Nama', 'required');
			$this->form_validation->set_rules('nim', 'nim', 'required');
			$this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'required');
			$this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'required');
			$this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required');
			$this->form_validation->set_rules('id_jabatan', 'Jabatan', 'required');
			$this->form_validation->set_rules('id_bidang', 'Status Civitas', 'required');
			$this->form_validation->set_rules('id_fakultas', 'Fakultas', 'required');
			$this->form_validation->set_rules('id_prodi', 'Prodi', 'required');
			$this->form_validation->set_rules('alamat', 'Alamat', 'required');
			$this->form_validation->set_rules('no_handphone', 'No Handphone', 'required');
			$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|callback_check_email_exists');
			$this->form_validation->set_rules('password', 'Password', 'required');
			$this->form_validation->set_rules('password2', 'Confirm Password', 'matches[password]');
			$this->form_validation->set_rules('id_user', 'ID User', 'required|callback_check_username_exists');
			
			if(!$this->form_validation->run()) 
			{
				$this->session->set_flashdata('msg_alert', validation_errors());
				redirect( base_url('regis_pengguna/regismhs/') );
			}
			//langsung regis
			$this->m_regispengguna->add_mhs ( 	$nama,$nim,$tempat_lahir,$tanggal_lahir,$jenis_kelamin,
												$id_jabatan,$id_bidang, $id_fakultas, $id_prodi, $alamat, 
												$no_handphone,$email, $password, $id_user,$tanggal_regis,$avatar );
			redirect( base_url('regis_pengguna') );
		}
		$data = generate_page('Pendaftaran Pengguna', 'regis_pengguna/regismhs', 'Pengguna');
		$data_content['list_bidang'] = $this->m_regispengguna->bidang_list_all();
		$data_content['list_jabatan'] = $this->m_regispengguna->jabatan_list_all();
		$data_content['list_fakultas'] = $this->m_regispengguna->fakultas_list_all();
		$data_content['list_prodi'] = $this->m_regispengguna->prodi_list_all();
		$data['content'] = $this->load->view('partial/RegisPengguna/V_Regis_Mhs', $data_content, true);
		$this->load->view('partial/RegisPengguna/V_Regis_Mhs', $data);
	}

	public function regisdosen()
	{
		is_login(function() 
		{ 
			redirect( base_url('auth/login') ); 
		});

		if( $_SERVER['REQUEST_METHOD'] == 'POST') 
		{
			$nama= $this->security->xss_clean( $this->input->post('nama') );
			$nip= $this->security->xss_clean( $this->input->post('nip') );
			$tempat_lahir= $this->security->xss_clean( $this->input->post('tempat_lahir') );
			$tanggal_lahir= $this->security->xss_clean( $this->input->post('tanggal_lahir') );
			$jenis_kelamin= $this->security->xss_clean( $this->input->post('jenis_kelamin') );
			$id_jabatan= $this->security->xss_clean( $this->input->post('id_jabatan') );
			$id_bidang= $this->security->xss_clean( $this->input->post('id_bidang') );
			$alamat= $this->security->xss_clean( $this->input->post('alamat') );
			$no_handphone= $this->security->xss_clean( $this->input->post('no_handphone') );
			$email= $this->security->xss_clean( $this->input->post('email') );
			$password= $this->security->xss_clean( $this->input->post('password') );
			$id_user= $this->security->xss_clean( $this->input->post('id_user') );
			$tanggal_regis = date('Y-m-d');
			$avatar = '';

			// avatar
			if ( $this->security->xss_clean( $_FILES["avatar"] ) && $_FILES['avatar']['name'] ) 
			{
				$config['upload_path']          = './uploads/avatar/';
				$config['allowed_types']        = 'jpg|jpeg|png';
				$config['max_size']             = 2000;
				$config['file_name']			= md5(time() . '_' . $_FILES["avatar"]['name']);
		 
				$this->load->library('upload', $config);
		 
				if ( !$this->upload->do_upload('avatar') && !empty($_FILES['avatar']['name'])) 
				{
					$this->session->set_flashdata('msg_alert', $this->upload->display_errors());
					redirect( base_url('regis_pengguna') );
				} 
				else { $avatar = $this->upload->data()['file_name'];}
			}
			// validasi
			$this->form_validation->set_rules('nama', 'Nama', 'required');
			$this->form_validation->set_rules('nip', 'nip', 'required');
			$this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'required');
			$this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'required');
			$this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required');
			$this->form_validation->set_rules('id_jabatan', 'Jabatan', 'required');
			$this->form_validation->set_rules('id_bidang', 'Status Civitas', 'required');
			$this->form_validation->set_rules('alamat', 'Alamat', 'required');
			$this->form_validation->set_rules('no_handphone', 'No Handphone', 'required');
			$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|callback_check_email_exists');
			$this->form_validation->set_rules('password', 'Password', 'required');
			$this->form_validation->set_rules('password2', 'Confirm Password', 'matches[password]');
			$this->form_validation->set_rules('id_user', 'ID User', 'required|callback_check_username_exists');
			
			if(!$this->form_validation->run()) 
			{
				$this->session->set_flashdata('msg_alert', validation_errors());
				redirect( base_url('regis_pengguna/regisdosen/') );
			}
			//langsung regis
			$this->m_regispengguna->add_dosen (	$nama,$nip,$tempat_lahir,$tanggal_lahir,$jenis_kelamin,$id_jabatan,
												$id_bidang, $alamat, $no_handphone,$email, $password, $id_user,
												$tanggal_regis,$avatar );
			redirect( base_url('regis_pengguna') );
		}
		$data = generate_page('Pendaftaran Pengguna', 'regis_pengguna/regisdosen', 'Pengguna');
		$data_content['list_bidang'] = $this->m_regispengguna->bidang_list_all();
		$data_content['list_jabatan'] = $this->m_regispengguna->jabatan_list_all();
		$data['content'] = $this->load->view('partial/RegisPengguna/V_Regis_Dosen', $data_content, true);
		$this->load->view('partial/RegisPengguna/V_Regis_Dosen', $data);
	}

	public function regisstaff()
	{
		if( $_SERVER['REQUEST_METHOD'] == 'POST') 
		{
			$nama= $this->security->xss_clean( $this->input->post('nama') );
			$tempat_lahir= $this->security->xss_clean( $this->input->post('tempat_lahir') );
			$tanggal_lahir= $this->security->xss_clean( $this->input->post('tanggal_lahir') );
			$jenis_kelamin= $this->security->xss_clean( $this->input->post('jenis_kelamin') );
			$id_jabatan= $this->security->xss_clean( $this->input->post('id_jabatan') );
			$id_bidang= $this->security->xss_clean( $this->input->post('id_bidang') );
			$alamat= $this->security->xss_clean( $this->input->post('alamat') );
			$no_handphone= $this->security->xss_clean( $this->input->post('no_handphone') );
			$email= $this->security->xss_clean( $this->input->post('email') );
			$password= $this->security->xss_clean( $this->input->post('password') );
			$id_user= $this->security->xss_clean( $this->input->post('id_user') );
			$tanggal_regis = date('Y-m-d');
			$avatar = '';

			// avatar
			if ( $this->security->xss_clean( $_FILES["avatar"] ) && $_FILES['avatar']['name'] ) 
			{
				$config['upload_path']          = './uploads/avatar/';
				$config['allowed_types']        = 'jpg|jpeg|png';
				$config['max_size']             = 2000;
				$config['file_name']			= md5(time() . '_' . $_FILES["avatar"]['name']);
		 
				$this->load->library('upload', $config);
		 
				if ( !$this->upload->do_upload('avatar') && !empty($_FILES['avatar']['name'])) 
				{
					$this->session->set_flashdata('msg_alert', $this->upload->display_errors());
					redirect( base_url('regis_pengguna') );
				} 
				else { $avatar = $this->upload->data()['file_name'];}
			}
			// validasi
			$this->form_validation->set_rules('nama', 'Nama', 'required');
			$this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'required');
			$this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'required');
			$this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required');
			$this->form_validation->set_rules('id_jabatan', 'Jabatan', 'required');
			$this->form_validation->set_rules('id_bidang', 'Status Civitas', 'required');
			$this->form_validation->set_rules('alamat', 'Alamat', 'required');
			$this->form_validation->set_rules('no_handphone', 'No Handphone', 'required');
			$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|callback_check_email_exists');
			$this->form_validation->set_rules('password', 'Password', 'required');
			$this->form_validation->set_rules('password2', 'Confirm Password', 'matches[password]');
			$this->form_validation->set_rules('id_user', 'ID User', 'required|callback_check_username_exists');
			
			if(!$this->form_validation->run()) 
			{
				$this->session->set_flashdata('msg_alert', validation_errors());
				redirect( base_url('regis_pengguna/regisstaff/') );
			}
			//langsung regis
			$this->m_regispengguna->add_staff ( $nama, $tempat_lahir,$tanggal_lahir,$jenis_kelamin,
												$id_jabatan,$id_bidang, $alamat, $no_handphone,$email, 
												$password, $id_user,$tanggal_regis,$avatar );
			redirect( base_url('regis_pengguna') );
		}
		$data = generate_page('Pendaftaran Pengguna', 'regis_pengguna/regisstaff', 'Pengguna');
		$data_content['list_bidang'] = $this->m_regispengguna->bidang_list_all();
		$data_content['list_jabatan'] = $this->m_regispengguna->jabatan_list_all();
		$data['content'] = $this->load->view('partial/RegisPengguna/V_Regis_Staff', $data_content, true);
		$this->load->view('partial/RegisPengguna/V_Regis_Staff', $data);
	}
	//FUNGSI TAMBAH DATA

	//FUNGSI EDIT DATA

	//FUNGSI EDIT DATA

	// Check if email exists
	public function check_email_exists($email)
	{
		$this->form_validation->set_message('check_email_exists', 'Email Sudah digunakan. Silahkan gunakan email lain');
		if ($this->m_regispengguna->check_username_exists($email)) { return true; } else { return false; }
	}

	// Check if username exists
	public function check_username_exists($id_user)
	{
		$this->form_validation->set_message('check_username_exists', 'Username Sudah diambil. Silahkan gunakan username lain');
		if ($this->m_regispengguna->check_username_exists($id_user)) { return true; } else { return false; }
	}
}
