<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller 
{

	private $m_laporan;

	function __construct() 
	{
		parent::__construct();
		$this->load->model('M_Laporan');
		$this->m_laporan = $this->M_Laporan;
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
		redirect( base_url('dashboard'));
	}

	public function kebutuhan()
	{
		$data = generate_page('Koleksi Data Kebutuhan', 'laporan/list_kebutuhan_all', $this->user_type);
		$data_content['title_page'] = 'Koleksi Data Kebutuhan';
		$data_content['dosentetap_list_all'] = $this->m_laporan->dosentetap_list_all();
		$data_content['dosensks_list_all'] = $this->m_laporan->dosensks_list_all();
		$data_content['tedik_list_all'] = $this->m_laporan->tedik_list_all();
		$data_content['tepen_list_all'] = $this->m_laporan->tepen_list_all();
		$data['content'] = $this->load->view('partial/Laporan/V_Laporan_Kebutuhan', $data_content, true);
		$this->load->view('V_Laporan', $data);
	}

	//EXPORT KEBUTUHAN KE EXCEL 
	// public function export_kebutuhan_excel()
	// {
	// 	$data = array('title' 		=> 'Koleksi Data Kebutuhan',
	// 								'Dosentetap'=> $this->m_laporan-> dosentetap_list_all(),
	// 								'Dosensks' 	=> $this->m_laporan-> dosensks_list_all(),
	// 								'Tedik' 		=> $this->m_laporan-> tedik_list_all(),
	// 								'Tepen' 		=> $this->m_laporan-> tepen_list_all()
	// 							 );

	// 	$this->load->view('partial/ExportLaporan/V_LaporanK_Excel', $data);
	// }
	public function export_kebutuhan_excel()
	{ 
		$data = array('title' 		=> 'Koleksi Data Kebutuhan',
									'Dosentetap'=> $this->m_laporan-> dosentetap_list_all(),
									'Dosensks' 	=> $this->m_laporan-> dosensks_list_all(),
									'Tedik' 		=> $this->m_laporan-> tedik_list_all(),
									'Tepen' 		=> $this->m_laporan-> tepen_list_all()
											);

		$this->load->view('partial/ExportLaporan/Export_K_Excel', $data);
	}


	public function kebutuhan_dosentetap_ajax() 
	{
		json_dump(function() 
		{

			$result= $this->m_laporan->dosentetap_list_all();
			$new_arr=array();$i=1;
			foreach ($result as $key => $value) 
			{
				$value->no=$i;
				$new_arr[]=$value;
				$value->tanggal_lahir = date_format( date_create($value->tanggal_lahir), 'd/m/Y');
				$value->avatar = '<img src="' . uploads_url('avatar/'.$value->avatar) . '" alt="image" />';
				$value->tanggal_regis = date_format( date_create($value->tanggal_regis), 'd/m/Y');
				$i++;
			}
			return array('data' => $new_arr);
		});
	}

	public function kebutuhan_dosensks_ajax() 
	{
		json_dump(function() 
		{

			$result= $this->m_laporan->dosensks_list_all();
			$new_arr=array();$i=1;
			foreach ($result as $key => $value) 
			{
				$value->no=$i;
				$new_arr[]=$value;
				$value->tanggal_lahir = date_format( date_create($value->tanggal_lahir), 'd/m/Y');
				$value->avatar = '<img src="' . uploads_url('avatar/'.$value->avatar) . '" alt="image" />';
				$value->tanggal_regis = date_format( date_create($value->tanggal_regis), 'd/m/Y');
				$i++;
			}
			return array('data' => $new_arr);
		});
	}

	public function kebutuhan_tenagapendidik_ajax() 
	{
		json_dump(function() 
		{

			$result= $this->m_laporan->tedik_list_all();
			$new_arr=array();$i=1;
			foreach ($result as $key => $value) 
			{
				$value->no=$i;
				$new_arr[]=$value;
				$value->tanggal_lahir = date_format( date_create($value->tanggal_lahir), 'd/m/Y');
				$value->avatar = '<img src="' . uploads_url('avatar/'.$value->avatar) . '" alt="image" />';
				$value->tanggal_regis = date_format( date_create($value->tanggal_regis), 'd/m/Y');
				$i++;
			}
			return array('data' => $new_arr);
		});
	}

	public function kebutuhan_tenagapenunjang_ajax() 
	{
		json_dump(function() 
		{

			$result= $this->m_laporan->tepen_list_all();
			$new_arr=array();$i=1;
			foreach ($result as $key => $value) 
			{
				$value->no=$i;
				$new_arr[]=$value;
				$value->tanggal_lahir = date_format( date_create($value->tanggal_lahir), 'd/m/Y');
				$value->avatar = '<img src="' . uploads_url('avatar/'.$value->avatar) . '" alt="image" />';
				$value->tanggal_regis = date_format( date_create($value->tanggal_regis), 'd/m/Y');
				$i++;
			}
			return array('data' => $new_arr);
		});
	}

	public function laporan_kebutuhan_ajax($type) 
	{
		$this->c_type=$type;
		json_dump(function() {
			$result=$this->m_laporan->get_kebutuhan($this->c_type);
			return $result;
		});
	}


	public function keluhan()
	{
		$data = generate_page('Koleksi Data Keluhan', 'laporan/list_keluhan_all', $this->user_type);
		$data_content['title_page'] = 'Koleksi Data Keluhan';
		$data_content['dosentetap_list_all'] = $this->m_laporan->k_dosentetap_list_all();
		$data_content['dosensks_list_all'] = $this->m_laporan->k_dosensks_list_all();
		$data_content['tedik_list_all'] = $this->m_laporan->k_tedik_list_all();
		$data_content['tepen_list_all'] = $this->m_laporan->k_tepen_list_all();
		$data['content'] = $this->load->view('partial/Laporan/V_Laporan_Keluhan', $data_content, true);
		$this->load->view('V_Laporan', $data);
	}

	// public function export_keluhan_excel()
	// { 
	// 	$data = array('title' 		=> 'Koleksi Data Keluhan',
	// 								'Dosentetap'=> $this->m_laporan-> k_dosentetap_list_all(),
	// 								'Dosensks' 	=> $this->m_laporan-> k_dosensks_list_all(),
	// 								'Tedik' 		=> $this->m_laporan-> k_tedik_list_all(),
	// 								'Tepen' 		=> $this->m_laporan-> k_tepen_list_all()
	// 										);

	// 	$this->load->view('partial/ExportLaporan/V_LaporanC_Excel', $data);
	// }

	public function export_keluhan_excel()
	{ 
		$data = array('title' 		=> 'Koleksi Data Keluhan',
									'Dosentetap'=> $this->m_laporan-> k_dosentetap_list_all(),
									'Dosensks' 	=> $this->m_laporan-> k_dosensks_list_all(),
									'Tedik' 		=> $this->m_laporan-> k_tedik_list_all(),
									'Tepen' 		=> $this->m_laporan-> k_tepen_list_all()
											);

		$this->load->view('partial/ExportLaporan/Export_C_Excel', $data);
	}
	
	public function keluhan_dosentetap_ajax() 
	{
		json_dump(function() 
		{

			$result= $this->m_laporan->k_dosentetap_list_all();
			$new_arr=array();$i=1;
			foreach ($result as $key => $value) 
			{
				$value->no=$i;
				$new_arr[]=$value;
				$value->tanggal_lahir = date_format( date_create($value->tanggal_lahir), 'd/m/Y');
				$value->avatar = '<img src="' . uploads_url('avatar/'.$value->avatar) . '" alt="image" />';
				$value->tanggal_regis = date_format( date_create($value->tanggal_regis), 'd/m/Y');
				$i++;
			}
			return array('data' => $new_arr);
		});
	}

	public function keluhan_dosensks_ajax() 
	{
		json_dump(function() 
		{

			$result= $this->m_laporan->k_dosensks_list_all();
			$new_arr=array();$i=1;
			foreach ($result as $key => $value) 
			{
				$value->no=$i;
				$new_arr[]=$value;
				$value->tanggal_lahir = date_format( date_create($value->tanggal_lahir), 'd/m/Y');
				$value->avatar = '<img src="' . uploads_url('avatar/'.$value->avatar) . '" alt="image" />';
				$value->tanggal_regis = date_format( date_create($value->tanggal_regis), 'd/m/Y');
				$i++;
			}
			return array('data' => $new_arr);
		});
	}

	public function keluhan_tedik_ajax() 
	{
		json_dump(function() 
		{

			$result= $this->m_laporan->k_tedik_list_all();
			$new_arr=array();$i=1;
			foreach ($result as $key => $value) 
			{
				$value->no=$i;
				$new_arr[]=$value;
				$value->tanggal_lahir = date_format( date_create($value->tanggal_lahir), 'd/m/Y');
				$value->avatar = '<img src="' . uploads_url('avatar/'.$value->avatar) . '" alt="image" />';
				$value->tanggal_regis = date_format( date_create($value->tanggal_regis), 'd/m/Y');
				$i++;
			}
			return array('data' => $new_arr);
		});
	}
	public function keluhan_tepen_ajax() 
	{
		json_dump(function() 
		{

			$result= $this->m_laporan->k_tepen_list_all();
			$new_arr=array();$i=1;
			foreach ($result as $key => $value) 
			{
				$value->no=$i;
				$new_arr[]=$value;
				$value->tanggal_lahir = date_format( date_create($value->tanggal_lahir), 'd/m/Y');
				$value->avatar = '<img src="' . uploads_url('avatar/'.$value->avatar) . '" alt="image" />';
				$value->tanggal_regis = date_format( date_create($value->tanggal_regis), 'd/m/Y');
				$i++;
			}
			return array('data' => $new_arr);
		});
	}

	public function laporan__keluhan_ajax($type) 
	{
		$this->c_type=$type;
		json_dump(function() {
			$result=$this->m_laporan->get_keluhan($this->c_type);
			return $result;
		});
	}
}

/* End of file Change_Password.php */
/* Location: ./application/controllers/Change_Password.php */