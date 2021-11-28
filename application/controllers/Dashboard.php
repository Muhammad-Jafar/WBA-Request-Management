<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller 
{
	private $m_dashboard;

	function __construct() 
	{
		parent::__construct();
		$this->load->model('M_Dashboard');
		$this->m_dashboard = $this->M_Dashboard;

		isnt_login( function() 
		{
			redirect( base_url('auth/login') );
		} );
	}

	public function index() 
	{
		switch ( $this->session->userdata('user_type') ) 
		{
			case 'admin':
				$data = generate_page('Dashboard', 'dashboard', 'Admin');// untuk admin dan pengelola
				$data_content['total_admin'] = $this->m_dashboard->total_admin();
				$data_content['total_kebutuhanterkonfirmasi'] = $this->m_dashboard->total_kebutuhanterkonfirmasi();
				$data_content['sisa_kebutuhanterkonfirmasi'] = $this->m_dashboard->sisa_kebutuhanterkonfirmasi();
				$data_content['total_keluhanterkonfirmasi'] = $this->m_dashboard->total_keluhanterkonfirmasi();
				$data_content['sisa_keluhanterkonfirmasi'] = $this->m_dashboard->sisa_keluhanterkonfirmasi();
				$data_content['total_pegawai'] = $this->m_dashboard->total_pegawai();
				$data['content'] = $this->load->view('partial/Dashboard/Admin', $data_content, true);
				$this->load->view('V_Dashboard', $data);
			break;

			case 'supervisor':
				$data = generate_page('Dashboard', 'dashboard', 'Supervisor'); //ganti penanggungjawab
				$data_content['total_kebutuhan'] = $this->m_dashboard->total_kebutuhan();
				$data_content['total_keluhan'] = $this->m_dashboard->total_keluhan();
				$data_content['kebutuhan_terkonfirmasi'] = $this->m_dashboard->kebutuhan_terkonfirmasi();
				$data_content['keluhan_terkonfirmasi'] = $this->m_dashboard->keluhan_terkonfirmasi();
				$data['content'] = $this->load->view('partial/Dashboard/Supervisor', $data_content, true);
				$this->load->view('V_Dashboard', $data);
			break;

			case 'pengguna':
				$data = generate_page('Dashboard', 'dashboard', 'pengguna'); //untuk pengguna biasa seperti staff, dosen, mahasiswa
				$data_content['permintaan_kebutuhan'] = $this->m_dashboard->permintaan_kebutuhan();
				$data_content['permintaan_keluhan'] = $this->m_dashboard->permintaan_keluhan();
				$data_content['permintaan_kebutuhanterkonfirmasi'] = $this->m_dashboard->permintaan_kebutuhanterkonfirmasi();
				$data_content['permintaan_keluhanterkonfirmasi'] = $this->m_dashboard->permintaan_keluhanterkonfirmasi();
				$data['content'] = $this->load->view('partial/Dashboard/Pengguna', $data_content, true);
				$this->load->view('V_Dashboard', $data);
			break;
			
			default:
				# code...
			break;
		}
	}

}

/* End of file Dashboard.php */
/* Location: ./application/controllers/Dashboard.php */