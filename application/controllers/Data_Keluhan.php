<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_Keluhan extends CI_Controller {

	private $m_datakeluhan;

	function __construct() 
	{
		parent::__construct();
		isnt_adminbaak(function() {
			redirect( base_url('auth/login') );
		});
		$this->load->model('M_DataKeluhan');
		$this->m_datakeluhan = $this->M_DataKeluhan;
		if( $this->session->userdata('user_type') == 'admin' ) {
			$this->user_type = 'Admin';
		} else if( $this->session->userdata('user_type') == 'baak' ) {
			$this->user_type = 'BAAK';
		}
	}

	public function index() 
	{
		$data = generate_page('Data Keluhan', 'data_keluhan', $this->user_type);
		$data_content['title_page'] = 'Permintaan Keluhan';
		$data['content'] = $this->load->view('partial/DataKeluhanAdmin/V_Admin_DataKeluhan_Read', $data_content, true);
		$this->load->view('V_DataKeluhan_Admin', $data);
	}

	public function list_ajax() 
	{
		json_dump(function() {
			$result=$this->m_datakeluhan->dkeluhan_list_ajax( $this->m_datakeluhan->dkeluhan_list_all() );
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

	public function add_new() 
	{
		if( $_SERVER['REQUEST_METHOD'] == 'POST') 
		{
			$nama_lengkap= $this->security->xss_clean( $this->input->post('nama_lengkap') );
			$alamat= $this->security->xss_clean( $this->input->post('alamat') );
			$nowa= $this->security->xss_clean( $this->input->post('nowa') );
			$id_keluhan= $this->security->xss_clean( $this->input->post('type') );
			$keluhan = $this->security->xss_clean( $this->input->post('keluhan'));
			$nim_nip= $this->security->xss_clean( $this->input->post('nim_nip'));
			$id_bidang= $this->security->xss_clean($this->input->post('id_bidang'));
			$fak_prodi= $this->security->xss_clean($this->input->post('fak_prodi'));
			$tgl_pengajuan= $this->security->xss_clean($this->input->post('tgl_pengajuan'));
			$status= $this->security->xss_clean( $this->input->post('status') );

			$this->form_validation->set_rules('nama_lengkap','Nama Lengkap','required');
			$this->form_validation->set_rules('alamat', 'Alamat', 'required');
			$this->form_validation->set_rules('nowa', 'WhatsApp', 'required');
			$this->form_validation->set_rules('type', 'Jenis Keluhan', 'required');
			$this->form_validation->set_rules('keluhan', 'Keluhan', 'required');
			$this->form_validation->set_rules('nim_nip', 'NIM / NIP', 'required');
			$this->form_validation->set_rules('id_bidang','Status', 'required');
			$this->form_validation->set_rules('fak_prodi', 'Fakultas / Program Studi', 'required');
			$this->form_validation->set_rules('tgl_pengajuan', 'Tanggal Pengajuan', 'required');
			$this->form_validation->set_rules('status', 'Status', 'required');

			if(!$this->form_validation->run()) 
			{
				$this->session->set_flashdata('msg_alert', validation_errors());
				redirect( base_url('data_keluhan/add_new/') );
			}

			$this->m_datakeluhan->add_new(  $nama_lengkap, $alamat, $nowa, $id_keluhan, $keluhan, $nim_nip,
											$id_bidang, $fak_prodi, $tgl_pengajuan, $status);
			redirect( base_url('data_keluhan') );
		}

		$data = generate_page('Entry Data Keluhan', 'data_keluhan/add_new', $this->user_type);
		$data_content['title_page'] = 'Pengajuan Keluhan';
		$data_content['bidang_list_all'] = $this->m_datakeluhan->bidang_list_all();
		$data_content['get_keluhan'] = $this->m_datakeluhan->get_keluhan();
		$data['content'] = $this->load->view('partial/DataKeluhanAdmin/V_Admin_DataKeluhan_Create', $data_content, true);
		$this->load->view('V_DataKeluhan_Admin', $data);
	}

	public function edit($id_dkeluhan) 
	{
		if( $_SERVER['REQUEST_METHOD'] == 'POST') 
		{
			$nama_lengkap= $this->security->xss_clean( $this->input->post('nama_lengkap') );
			$alamat= $this->security->xss_clean( $this->input->post('alamat') );
			$nim_nip= $this->security->xss_clean( $this->input->post('nim_nip'));
			$nowa= $this->security->xss_clean( $this->input->post('nowa') );
			$id_keluhan= $this->security->xss_clean( $this->input->post('type') );
			$keluhan = $this->security->xss_clean( $this->input->post('keluhan'));
			$id_bidang= $this->security->xss_clean($this->input->post('id_bidang'));
			$fak_prodi= $this->security->xss_clean($this->input->post('fak_prodi'));    
			$tgl_pengajuan= $this->security->xss_clean($this->input->post('tgl_pengajuan'));
			$status= $this->security->xss_clean( $this->input->post('status') );

			$this->form_validation->set_rules('nama_lengkap','Nama Lengkap','required');
			$this->form_validation->set_rules('alamat', 'Alamat', 'required');
			$this->form_validation->set_rules('nim_nip', 'NIM / NIP', 'required');
			$this->form_validation->set_rules('nowa', 'WhatsApp', 'required');
			$this->form_validation->set_rules('type', 'Jenis Keluhan', 'required');
			$this->form_validation->set_rules('keluhan', 'Keluhan', 'required');
			$this->form_validation->set_rules('id_bidang','Status', 'required');
			$this->form_validation->set_rules('fak_prodi', 'Fakultas / Program Studi', 'required');
			$this->form_validation->set_rules('tgl_pengajuan', 'Tanggal Pengajuan', 'required');
			$this->form_validation->set_rules('status', 'Status', 'required');

			if(!$this->form_validation->run()) 
			{
				$this->session->set_flashdata('msg_alert', validation_errors());
				redirect( base_url('data_keluhan/edit/'.$id_dkeluhan) );
			}
			$this->m_datakeluhan->add_new(  $id_dkeluhan, $nama_lengkap, $alamat,$nim_nip, $nowa, $id_keluhan, 
											$keluhan, $id_bidang, $fak_prodi, $tgl_pengajuan, $status );
			redirect( base_url('data_keluhan') );
		}

		$data = generate_page('Edit Data Keluhan', 'data_keluhan/edit/'.$id_dkeluhan, $this->user_type);
		$data_content['title_page'] = 'Edit Data Keluhan';
		$data_content['get_dkeluhan'] =  $this->m_datakeluhan->get_dkeluhan($data_content['data_keluhan']);
		$data_content['namaizin_list'] = $this->m_dataizin->get_namaizin   ( $data_content['data_izin']->type );
		$data['content'] = $this->load->view('partial/DataKeluhanAdmin/V_Admin_DataKeluhan_Edit', $data_content, true);
		$this->load->view('V_DataKeluhan_Admin', $data);
	}

	public function delete($id_dkeluhan) 
	{
		$this->m_datakeluhan->delete($id_dkeluhan);
		$this->session->set_flashdata('msg_alert', 'Data  berhasil dihapus');
		redirect( base_url('data_keluhan') );
	}

}

/* End of file Data_Izin.php */
/* Location: ./application/controllers/Data_Izin.php */