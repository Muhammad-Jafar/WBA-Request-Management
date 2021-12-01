<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Regis_Pengguna extends CI_Controller 
{
	private $m_regispengguna;

	function __construct() 
    {
		parent::__construct();
		$this->load->model('M_RegisPengguna');
		$this->m_cp = $this->M_RegisPengguna;
		isnt_login(function() {
			redirect( base_url('dashboard') );
		});

		if( $this->session->userdata('user_type') == 'pengguna' ) 
		{
			$this->user_type = 'Pengguna';
		}
	}

	public function index() 
	{
		
	}

}