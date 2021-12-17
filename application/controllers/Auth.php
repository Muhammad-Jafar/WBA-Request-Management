<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	private $m_auth;

	function __construct() {
		parent::__construct();
		$this->load->model('M_Auth');
		$this->m_auth = $this->M_Auth;
	}

	public function index() {
		is_login(function() {
			redirect( base_url('dashboard') );
		});
		isnt_login(function() {
			redirect( base_url('auth/login') );
		});
	}

	public function logingoogle() 
	{
		//TAMBAHAN LOGIN WITH GOOGLE
		include_once APPPATH . "libraries/vendor/autoload.php";
		
		//buat permintaan client untuk akses data dari google API
		$google_client = new Google_Client();
		$google_client->setClientId('628818189431-v14kq9lcpo3ro0nbanjn7nn9kmu7cg88.apps.googleusercontent.com'); //Define your ClientID
		$google_client->setClientSecret('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'); //Define your Client Secret Key
		$google_client->setRedirectUri('http://localhost/simpsdm/auth/login'); //Define your Redirect Uri
		$google_client->addScope('email');
		$google_client->addScope('profile');

		//validasi token
		if(isset($_GET["code"]))
		{
			$token = $google_client->fetchAccessTokenWithAuthCode($_GET["code"]);
			if(!isset($token["error"]))
			{
					$google_client->setAccessToken($token['access_token']);
					$this->session->set_userdata('access_token', $token['access_token']);

					//kirim permintaan tadi
					$google_service = new Google_Service_Oauth2($google_client);
					$data = $google_service->userinfo->get();
					$current_datetime = date('Y-m-d H:i:s');

					if($this->google_login_model->Is_already_register($data['id']))
    			{
						//update data
						$user_data = array(
																'first_name' => $data['nama_depan'],
																'last_name'  => $data['nama_belakang'],
																'email_address' => $data['email'],
																'gender' => $data['jenis_kelamin'],
																'profile_picture'=> $data['avatar'],
																'updated_at' => $current_datetime
																);

     				$this->m_auth->Update_user_data($user_data, $data['id']);
					}
					else
					{
					//insert data
					$user_data = array(
														'login_oauth_uid' => $data['id'],
														'first_name'  => $data['nama_depan'],
														'last_name'   => $data['nama_belakang'],
														'email_address'  => $data['email'],
														'gender' => $data['jenis_kelamin'],
														'profile_picture' => $data['avatar'],
														'created_at'  => $current_datetime
														);

					$this->google_login_model->Insert_user_data($user_data);
    			}
					$this->session->set_userdata('user_data', $user_data);
			}
			$login_button = '';
			if(!$this->session->userdata('access_token'))
			{
				$login_button = '<a href="'.$google_client->createAuthUrl().'"><img src="'.base_url('').'" /></a>';
				$data['login_button'] = $login_button;
				$this->load->view('auth/login', $data);
			}
			else
			{
			$this->load->view('auth/login', $data);
			}
		}
	}

	public function login() 
	{
		is_login(function() 
		{ 
			redirect( base_url('dashboard') ); 
		});

		//LOGIN BIASA KE DATABASE LANGSUNG
		if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) 
		{
			$email= $this->security->xss_clean( $this->input->post('email') );
			$password= $this->security->xss_clean( $this->input->post('password') );

			// validasi
			$this->form_validation->set_rules('email', 'E-mail', 'trim|required|valid_email');
			$this->form_validation->set_rules('password', 'Password', 'trim|required');

			if(!$this->form_validation->run()) 
			{
				$this->session->set_flashdata('msg_alert', 'Masukkan email dan password');
				redirect( base_url('auth/login') );
			}

			// lakukan login
			$this->m_auth->doLogin($email, $password);
		} else {
			$this->load->view('V_Auth');
		}
	}

	public function lost_password() 
	{
		is_login(function() 
		{
			redirect( base_url('dashboard') );
		});

		if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) 
		{
			$email= $this->security->xss_clean( $this->input->post('email') );

			// validasi
			$this->form_validation->set_rules('email', 'E-mail', 'trim|required|valid_email');

			if(!$this->form_validation->run()) 
			{
				$this->session->set_flashdata('msg_alert', 'Masukkan email anda');
				redirect( base_url('auth/lost_password') );
			}

			// lakukan reset password
			$this->m_auth->doResetPassword($email, $password);
		}

		else 
		{
			$this->load->view('V_LostPassword');
		}
	}

	public function logout() 
	{
		isnt_login(function() 
		{
			redirect( base_url('auth/login') );
		});
		
		$this->session->sess_destroy();
		redirect( base_url() );
	}

}

/* End of file auth.php */
/* Location: ./application/controllers/Auth.php */