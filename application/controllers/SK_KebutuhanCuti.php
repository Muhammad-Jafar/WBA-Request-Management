<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SK_KebutuhanCuti extends CI_Controller {
	
	private $m_ai;

	function __construct() {
		parent::__construct();
		$this->load->model('M_DataIzin');
		$this->m_dataizin = $this->M_DataIzin;
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
		$data['data'] = $this->m_dataizin->get_data_dkebutuhan($id);
		$data['tanggal'] = tgl_indo(date('Y-m-d'));

		$data['nama_kebutuhan'] = $data['data']->nama_kebutuhan;
		$data['type'] = $data['data']->type;

		switch ($data['type']) 
		{
			case 'Cuti':
					$data['type_id'] = 'Cuti';
				break;
			case 'Pembuatan Surat':
					$data['type_id'] = 'Pembuatan Surat';
				break;
		}

		if( $_SERVER['REQUEST_METHOD'] == 'GET') 
		{
			if( isset($_GET['dl']) ) 
			{
				$data['dl'] = true;
				header("Content-type: application/vnd.ms-word");
				header("Content-Disposition: attachment; filename= Surat Ijin Cuti [{$data['type_id']}] {$data['id']}.doc");
			}
		}

		// $data['tempat_lahir'] = strtoupper($data['data']->tempat_lahir);
		// $data['tanggal_lahir'] = date_format( date_create($data['data']->tanggal_lahir), 'd M Y');
		$data['alamat'] = $data['data']->alamat;
		$data['nama'] = explode(' ', $data['data']->nama)[0];
		$diff  = date_diff( date_create($data['data']->tgl_mulai), date_create($data['data']->tgl_akhir) );
		$data['selama'] = $diff->format('%d hari');
		$data['tgl_mulai'] = date_format( date_create($data['data']->tgl_mulai), 'd M Y');
		$data['tgl_akhir'] = date_format( date_create($data['data']->tgl_akhir), 'd M Y');
		$this->load->view('SK_Kebutuhan_Cuti', $data);
	}
}

/* End of file SK_Keluhan.php */
/* Location: ./application/controllers/SK_Keluhan.php */