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
		$this->m_cp = $this->M_Pengguna;
	
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
			$result= $this->m_pengguna->dkebutuhan_list_all();
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
			$tgl_pengajuan	= $this->security->xss_clean($this->input->post('tgl_pengajuan'));
			$tgl_mulai		= $this->security->xss_clean( $this->input->post('tgl_mulai'));
			$tgl_akhir		= $this->security->xss_clean( $this->input->post('tgl_akhir') );
			$status			= $this->security->xss_clean( $this->input->post('status') );

			//validasi lagi
			$this->form_validation->set_rules('id', 'id', 'required');
			$this->form_validation->set_rules('id_kebutuhan', 'Jenis Kebutuhan', 'required');
			$this->form_validation->set_rules('id_nkebutuhan','nama kebutuhan', 'required');
			$this->form_validation->set_rules('id_nkebutuhan', 'Permintaan', 'required');
			$this->form_validation->set_rules('tgl_pengajuan', 'Tanggal Pengajuan', 'required');
			$this->form_validation->set_rules('tgl_mulai', 'Tanggal Mulai', 'required');
			$this->form_validation->set_rules('tgl_akhir', 'Tanggal Akhir', 'required');
			$this->form_validation->set_rules('status', 'Status', 'required');

			if(!$this->form_validation->run()) 
			{
				$this->session->set_flashdata('msg_alert', validation_errors());
				redirect( base_url('pengguna/add_kebutuhan/') );
			}

			$this->m_dataizin->add_new( $id_kebutuhan, $tgl_pengajuan, $tgl_mulai, $tgl_akhir, $status);
			redirect( base_url('pengguna/kebutuhan') );
		}

		$data = generate_page('Entry Data Kebutuhan', 'data_izin/add_new', $this->user_type);
		$data_content['title_page'] = 'Pengajuan Permintaan Kebutuhan';
		$data_content['bidang_list_all'] = $this->m_dataizin->bidang_list_all();
		$data_content['get_kebutuhan'] = $this->m_dataizin->get_kebutuhan();
		$data['content'] = $this->load->view('partial/DataIzinAdmin/V_Admin_DataIzin_Create', $data_content, true);
		$this->load->view('V_DataIzin_Admin', $data);
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
			$result= $this->m_pengguna->mhs_list_all();
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
	//BATAS KELUHAN
}