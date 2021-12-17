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
	public function regisdosentetap()
	{
		if( $_SERVER['REQUEST_METHOD'] == 'POST') 
		{
			// var_dump($this->input->post()); die;
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
				redirect( base_url('regis_pengguna/regisdosentetap/') );
			}
			//langsung regis
			$this->m_regispengguna->add_dosentetap( $nama,$nip,$tempat_lahir,$tanggal_lahir,$jenis_kelamin,
																							$id_jabatan,$id_bidang, $alamat, $no_handphone,$email, 
																							$password, $id_user,$tanggal_regis,$avatar );
			redirect( base_url('regis_pengguna') );
		}
		$data = generate_page('Pendaftaran Pengguna', 'regis_pengguna/regisdosentetap', 'Pengguna');
		$data_content['list_bidang'] = $this->m_regispengguna->bidang_list_all();
		$data_content['list_jabatan'] = $this->m_regispengguna->jabatan_list_all();
		$data['content'] = $this->load->view('partial/RegisPengguna/V_Regis_DosenTetap', $data_content, true);
		$this->load->view('partial/RegisPengguna/V_Regis_DosenTetap', $data);
	}

	public function regisdosensks()
	{
		if( $_SERVER['REQUEST_METHOD'] == 'POST') 
		{
			$nama= $this->security->xss_clean( $this->input->post('nama') );
			// $nip= $this->security->xss_clean( $this->input->post('nip') );
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
			// $this->form_validation->set_rules('nip', 'nip', 'required');
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
				redirect( base_url('regis_pengguna/regisdosensks/') );
			}
			//langsung regis
			$this->m_regispengguna->add_dosensks( $nama,$tempat_lahir,$tanggal_lahir,$jenis_kelamin,
																						$id_jabatan,$id_bidang, $alamat, $no_handphone,$email, 
																						$password, $id_user,$tanggal_regis,$avatar );
			redirect( base_url('regis_pengguna') );
		}
		$data = generate_page('Pendaftaran Pengguna', 'regis_pengguna/regisdosensks', 'Pengguna');
		$data_content['list_bidang'] = $this->m_regispengguna->bidang_list_all();
		$data_content['list_jabatan'] = $this->m_regispengguna->jabatan_list_all();
		$data['content'] = $this->load->view('partial/RegisPengguna/V_Regis_DosenSKS', $data_content, true);
		$this->load->view('partial/RegisPengguna/V_Regis_DosenSKS', $data);
	}

	public function registedik()
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
				redirect( base_url('regis_pengguna/registedik/') );
			}
			//langsung regis
			$this->m_regispengguna->add_tedik (	$nama, $nip, $tempat_lahir, $tanggal_lahir, $jenis_kelamin,
																					$id_jabatan, $id_bidang, $alamat, $no_handphone,$email, 
																					$password, $id_user, $tanggal_regis,$avatar );
			redirect( base_url('regis_pengguna') );
		}
		$data = generate_page('Pendaftaran Pengguna', 'regis_pengguna/registedik', 'Pengguna');
		$data_content['list_bidang'] = $this->m_regispengguna->bidang_list_all();
		$data_content['list_jabatan'] = $this->m_regispengguna->jabatan_list_all();
		$data['content'] = $this->load->view('partial/RegisPengguna/V_Regis_Tedik', $data_content, true);
		$this->load->view('partial/RegisPengguna/V_Regis_Tedik', $data);
	}

	public function registepen()
	{
		is_login(function() 
		{ 
			redirect( base_url('auth/login') ); 
		});

		if( $_SERVER['REQUEST_METHOD'] == 'POST') 
		{
			$nama= $this->security->xss_clean( $this->input->post('nama') );
			$nik= $this->security->xss_clean( $this->input->post('nik') );
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
			$this->form_validation->set_rules('nik', 'nik', 'required');
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
				redirect( base_url('regis_pengguna/registepen/') );
			}
			//langsung regis
			$this->m_regispengguna->add_tepen (	$nama, $nik, $tempat_lahir, $tanggal_lahir, $jenis_kelamin,
																					$id_jabatan, $id_bidang, $alamat, $no_handphone,$email, 
																					$password, $id_user, $tanggal_regis,$avatar );
			redirect( base_url('regis_pengguna') );
		}
		$data = generate_page('Pendaftaran Pengguna', 'regis_pengguna/registepen', 'Pengguna');
		$data_content['list_bidang'] = $this->m_regispengguna->bidang_list_all();
		$data_content['list_jabatan'] = $this->m_regispengguna->jabatan_list_all();
		$data['content'] = $this->load->view('partial/RegisPengguna/V_Regis_Tepen', $data_content, true);
		$this->load->view('partial/RegisPengguna/V_Regis_Tepen', $data);
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
