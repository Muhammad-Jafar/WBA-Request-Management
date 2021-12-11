<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SK_Keluhan extends CI_Controller {
	
	private $m_ai;

	function __construct() {
		parent::__construct();
		$this->load->model('M_DataKeluhan');
		$this->m_datakeluhan = $this->M_DataKeluhan;
		$this->load->helper('tgl_indo');
	}

	public function index()
	{
		isnt_login(function() {
			redirect( base_url('auth/login') );
		});
		redirect( base_url('dashboard') );
	}

	public function print()
	{
		if( empty($this->uri->segment('3'))) 
		{
			redirect( base_url('/dashboard') );
		}

		$id=$this->uri->segment('3');
		$data['dl'] = false;
		$data['id'] = $id;
		$data['user_name'] = $this->session->userdata('user_name');
		$data['data'] = $this->m_datakeluhan->get_dkeluhan($id);
		$data['tanggal'] = tgl_indo(date('Y-m-d'));


		// $data['nama_kebutuhan'] = $data['data']->nama_keluhan;
		$data['type'] = $data['data']->type;

		switch ($data['type']) 
		{
			case 'Administrasi':
					$data['type_id'] = 'Administrasi';
				break;
			case 'Hubungan Kerja':
					$data['type_id'] = 'Hubungan Kerja';
				break;
			case 'Penggajian':
					$data['type_id'] = 'Penggajian';
				break;
			case 'Lainnya':
					$data['type_id'] = 'Lainnya';
				break;
		}
		if( $_SERVER['REQUEST_METHOD'] == 'GET') 
		{
			if( isset($_GET['dl']) ) 
			{
				$data['dl'] = true;
				header("Content-type: application/vnd.ms-word");
				header("Content-Disposition: attachment; filename= Surat Keluhan [{$data['type_id']}] {$data['id']}.doc");
			}
		}
		$this->load->view('SK_Keluhan', $data);
	}
}

/* End of file SK_Keluhan.php */
/* Location: ./application/controllers/SK_Keluhan.php */