<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengguna extends CI_Controller 
{
	private $m_pengguna;

	function __construct() 
    {
		parent::__construct();
		isnt_pengguna(function() 
		{
			redirect( base_url('auth/login') );
		});
		$this->load->model('M_Pengguna');
		$this->m_pengguna = $this->M_Pengguna;
		$this->load->helper('tgl_indo_helper');
		$this->load->helper('generatepage_helper');
	
		if( $this->session->userdata('user_type') == 'pengguna' ) 
		{
			$this->user_type = 'Pengguna';
		}
	}

	public function index() 
	{
		redirect( base_url('dashboard'));
	}

	//UNTUK PROFIL
	public function profil()
	{
		$data = generate_page('Profil Anda', 'Pengguna/profil','Pengguna');
		$data_content['title_page'] = 'Profil Anda';
		$data['content'] = $this->load->view('partial/Pengguna/V_ProfilPenggunaRead', $data_content, true);
		$this->load->view('V_Pengguna', $data);
	}

	//BATAS PROFIL


	//UNTUK KEBUTUHAN
	public function kebutuhan()
	{
		$data = generate_page('Kebutuhan Anda', 'Pengguna/kebutuhan','Pengguna');
		$data_content['title_page'] = 'Kebutuhan Anda';
		$data['content'] = $this->load->view('partial/Pengguna/V_KebutuhanPenggunaRead', $data_content, true);
		$this->load->view('V_Pengguna', $data);
	}

	public function KebutuhanPengguna_ajax() 
	{
		json_dump(function() 
		{
			$result=$this->m_pengguna->dkebutuhan_list_ajax( $this->m_pengguna->dkebutuhan_list_all() );
			return array('data' => $result);
		});
	}

	public function dkebutuhan_ajax($type) 
	{
		$this->c_type=$type;
		json_dump(function() 
		{
			$result=$this->m_pengguna->get_kebutuhan($this->c_type);
			return $result;
		});
	}

	public function add_kebutuhan()
	{
		if( $_SERVER['REQUEST_METHOD'] == 'POST') 
		{
			$id				= $this->security->xss_clean($this->input->post('id'));
			$id_kebutuhan	= $this->security->xss_clean( $this->input->post('id_kebutuhan'));
			$id_nkebutuhan	= $this->security->xss_clean($this->input->post('id_nkebutuhan'));
			$tgl_pengajuan = date('d/m/y');
			$tgl_mulai		= $this->security->xss_clean( $this->input->post('tgl_mulai'));
			$tgl_akhir		= $this->security->xss_clean( $this->input->post('tgl_akhir') );
			$status			= $this->security->xss_clean( $this->input->post('status') );

			//validasi
			// $this->form_validation->set_rules('id', 'id', 'required');// dilepas juga karena id akan ditarik langsung
			$this->form_validation->set_rules('id_kebutuhan', 'Jenis Kebutuhan', 'required');
			$this->form_validation->set_rules('id_nkebutuhan','nama kebutuhan', 'required');
			$this->form_validation->set_rules('id_nkebutuhan', 'Permintaan', 'required');
			// $this->form_validation->set_rules('tgl_pengajuan', 'Tanggal Pengajuan', 'required');// dilepas karena tidak perlu
			$this->form_validation->set_rules('tgl_mulai', 'Tanggal Mulai', 'required');
			$this->form_validation->set_rules('tgl_akhir', 'Tanggal Akhir', 'required');
			$this->form_validation->set_rules('status', 'Status', 'required');

			if(!$this->form_validation->run()) 
			{
				$this->session->set_flashdata('msg_alert', validation_errors());
				redirect( base_url('pengguna/kebutuhan/add_kebutuhan/') );
			}

			$this->m_pengguna->add_kebutuhan( $id, $id_kebutuhan,$id_nkebutuhan, $tgl_pengajuan, $tgl_mulai, $tgl_akhir, $status);
			redirect( base_url('pengguna/kebutuhan') );
		}

		$data = generate_page('Permintaan Kebutuhan', 'pengguna/kebutuhan/add_kebutuhan', $this->user_type);
		$data_content['title_page'] = 'Pengajuan Permintaan Kebutuhan';
		$data_content['get_kebutuhan'] = $this->m_pengguna->get_kebutuhan();
		$data_content['get_nkebutuhan'] = $this->m_pengguna->get_nkebutuhan();
		$data['content'] = $this->load->view('partial/Pengguna/V_KebutuhanPenggunaCreate', $data_content, true);
		$this->load->view('V_Pengguna', $data);
	}
	//BATAS KEBUTUHAN


	//UNTUK KELUHAN
	public function keluhan()
	{
		$data = generate_page('Keluhan Anda', 'Pengguna/keluhan','Pengguna');
		$data_content['title_page'] = 'Keluhan Anda';
		$data['content'] = $this->load->view('partial/Pengguna/V_KeluhanPenggunaRead', $data_content, true);
		$this->load->view('V_Pengguna', $data);
	}
	public function KeluhanPengguna_ajax() 
	{
		json_dump(function() 
		{
			$result=$this->m_pengguna->dkeluhan_list_ajax( $this->m_pengguna->dkeluhan_list_all() );
			return array('data' => $result);
		});
	}

	public function dkeluhan_ajax($type) 
	{
		$this->c_type=$type;
		json_dump(function() {
			$result=$this->m_datakeluhan->get_keluhan($this->c_type);
			return $result;
		});
	}

	public function add_keluhan() 
	{
		if( $_SERVER['REQUEST_METHOD'] == 'POST') 
		{
			$id= $this->security->xss_clean( $this->input->post('id') );
			$id_keluhan= $this->security->xss_clean( $this->input->post('id_keluhan') );
			$keluhan = $this->security->xss_clean( $this->input->post('keluhan'));
			$tgl_pengajuan = date('d/m/y');
			$status= $this->security->xss_clean( $this->input->post('status') );

			// $this->form_validation->set_rules('id', 'id', 'required');//tidak perlu karena akan langsung ditarik
			$this->form_validation->set_rules('id_keluhan', 'Jenis Keluhan', 'required');
			$this->form_validation->set_rules('keluhan', 'Keluhan', 'required');
			// $this->form_validation->set_rules('tgl_pengajuan', 'Tanggal Pengajuan', 'required';//tidak perlu karena otomatis oleh sistem
			$this->form_validation->set_rules('status', 'Status', 'required');

			if(!$this->form_validation->run()) 
			{
				$this->session->set_flashdata('msg_alert', validation_errors());
				redirect( base_url('pengguna/keluhan/add_keluhan/') );
			}

			$this->m_pengguna->add_keluhan( $id, $id_keluhan, $keluhan, $tgl_pengajuan, $status);
			redirect( base_url('pengguna/keluhan') );
		}

		$data = generate_page('Pengajuan Data Keluhan', 'pengguna/keluhan/add_keluhan', $this->user_type);
		$data_content['title_page'] = 'Pengajuan Keluhan';
		$data_content['get_keluhan'] = $this->m_pengguna->get_keluhan();
		$data['content'] = $this->load->view('partial/Pengguna/V_KeluhanPenggunaCreate', $data_content, true);
		$this->load->view('V_Pengguna', $data);
	}
	//BATAS KELUHAN
}