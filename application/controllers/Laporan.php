<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller 
{

	private $m_laporan;

	function __construct() 
	{
		parent::__construct();
		$this->load->model('M_Laporan');
		$this->m_cp = $this->M_Laporan;
		isnt_login(function() {
			redirect( base_url('dashboard') );
		});

		if( $this->session->userdata('user_type') == 'supervisor' ) 
		{
			$this->user_type = 'Supervisor';
		}
	}

	public function index() 
	{
		redirect(base_url('dashboard'));
	}

	public function lihat_laporan()
	{
		
	}

}

/* End of file Change_Password.php */
/* Location: ./application/controllers/Change_Password.php */