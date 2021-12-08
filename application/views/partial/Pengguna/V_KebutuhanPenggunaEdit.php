<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KebutuhanPengguna extends CI_Controller 
{
	private $m_profilpengguna;

	function __construct() 
    {
		parent::__construct();
		$this->load->model('M_Laporan');
		$this->m_cp = $this->M_Laporan;
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
		$this->load->view('partial/DashboardPengguna/ProfilPengguna');
	}

}