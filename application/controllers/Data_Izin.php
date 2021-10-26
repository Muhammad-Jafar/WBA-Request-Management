<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_Izin extends CI_Controller {

	private $m_dataizin;

	function __construct() {
		parent::__construct();
		isnt_adminbaak(function() {
			redirect( base_url('auth/login') );
		});
		$this->load->model('M_DataIzin');
		$this->m_dataizin = $this->M_DataIzin;
		if( $this->session->userdata('user_type') == 'admin' ) {
			$this->user_type = 'Admin';
		} else if( $this->session->userdata('user_type') == 'baak' ) {
			$this->user_type = 'BAAK';
		}
	}

	public function index() 
	{
		$data = generate_page('Permintaan Kebutuhan', 'data_izin', $this->user_type);
		$data_content['title_page'] = 'Permintaan Kebutuhan';
		$data['content'] = $this->load->view('partial/DataIzinAdmin/V_Admin_DataIzin_Read', $data_content, true);
		$this->load->view('V_DataIzin_Admin', $data);
	}

	public function list_ajax() 
	{
		json_dump(function() {
			$result=$this->m_dataizin->dkebutuhan_list_ajax( $this->m_dataizin->dkebutuhan_list_all() );
			return array('data' => $result);
		});
	}

	public function dkebutuhan_ajax($type) {
		$this->c_type=$type;
		json_dump(function() {
			$result=$this->m_dataizin->get_kebutuhan($this->c_type);
			return $result;
		});
	}

	public function add_new() 
	{
		if( $_SERVER['REQUEST_METHOD'] == 'POST') 
		{
			$id_kebutuhan= $this->security->xss_clean( $this->input->post('type') );
			$nama_kebutuhan= $this->security->xss_clean($this->input->post('nama_kebutuhan'));
			$nama_lengkap= $this->security->xss_clean( $this->input->post('nama_lengkap') );
			$alamat= $this->security->xss_clean( $this->input->post('alamat') );
			$nowa= $this->security->xss_clean( $this->input->post('nowa') );
			$nim= $this->security->xss_clean( $this->input->post('nim'));
			$nip_nidn= $this->security->xss_clean( $this->input->post('nip_nidn'));
			$id_bidang= $this->security->xss_clean($this->input->post('id_bidang'));
			$prodi= $this->security->xss_clean($this->input->post('prodi'));
			$fakultas= $this->security->xss_clean($this->input->post('fakultas'));
			$tgl_pengajuan= $this->security->xss_clean($this->input->post('tgl_pengajuan'));
			$tgl_mulai= $this->security->xss_clean( $this->input->post('tgl_mulai'));
			$tgl_akhir= $this->security->xss_clean( $this->input->post('tgl_akhir') );
			$status= $this->security->xss_clean( $this->input->post('status') );

			$this->form_validation->set_rules('type', 'Jenis Kebutuhan', 'required');
			$this->form_validation->set_rules('nama_kebutuhan', 'Permintaan', 'required');
			$this->form_validation->set_rules('nama_lengkap','Nama Lengkap','required');
			$this->form_validation->set_rules('alamat', 'Alamat', 'required');
			$this->form_validation->set_rules('nowa', 'WhatsApp', 'required');
			$this->form_validation->set_rules('nim', 'NIM', 'required');
			$this->form_validation->set_rules('nip_nidn', 'NIP / NIDN', 'required');
			$this->form_validation->set_rules('id_bidang','Status', 'required');
			$this->form_validation->set_rules('prodi', 'Program Studi', 'required');
			$this->form_validation->set_rules('fakultas', 'Fakultas', 'required');
			$this->form_validation->set_rules('tgl_pengajuan', 'Tanggal Pengajuan', 'required');
			$this->form_validation->set_rules('tgl_mulai', 'Tanggal Mulai', 'required');
			$this->form_validation->set_rules('tgl_akhir', 'Tanggal Akhir', 'required');
			$this->form_validation->set_rules('status', 'Status', 'required');

			if(!$this->form_validation->run()) 
			{
				$this->session->set_flashdata('msg_alert', validation_errors());
				redirect( base_url('data_izin/add_new/') );
			}

			$this->m_dataizin->add_new( $id_kebutuhan, $nama_kebutuhan, $nama_lengkap, $alamat, $nowa, $nim, $nip_nidn,
										$id_bidang, $prodi, $fakultas, $tgl_pengajuan, $tgl_mulai, $tgl_akhir, $status);
			redirect( base_url('data_izin') );
		}

		$data = generate_page('Entry Data Kebutuhan', 'data_izin/add_new', $this->user_type);
		$data_content['title_page'] = 'Pengajuan Permintaan Kebutuhan';
		$data_content['bidang_list_all'] = $this->m_dataizin->bidang_list_all();
		$data['content'] = $this->load->view('partial/DataIzinAdmin/V_Admin_DataIzin_Create', $data_content, true);
		$this->load->view('V_DataIzin_Admin', $data);
	}

	public function edit($id) 
	{
		if( $_SERVER['REQUEST_METHOD'] == 'POST') 
		{
			$id_izin= $this->security->xss_clean( $this->input->post('id_izin') );
			$id_namaizin= $this->security->xss_clean( $this->input->post('id_namaizin') );
			$id_pgn= $this->security->xss_clean( $this->input->post('id') );
			$tglawal= $this->security->xss_clean( $this->input->post('tglawal') );
			$tempat= $this->security->xss_clean( $this->input->post('tempat') );
			$tglakhir= $this->security->xss_clean( $this->input->post('tglakhir') );
			$status= $this->security->xss_clean( $this->input->post('status') );
			
			$this->form_validation->set_rules('id_izin', 'ID Izin', 'required');
			$this->form_validation->set_rules('id_namaizin', 'Nama Izin', 'required');
			$this->form_validation->set_rules('id_pgn', 'Nama Pegawai', 'id');
			$this->form_validation->set_rules('tglawal', 'Tanggal Awal', 'required');
			$this->form_validation->set_rules('tempat', 'Tempat', 'required');
			$this->form_validation->set_rules('tglakhir', 'Tanggal Akhir', 'required');
			$this->form_validation->set_rules('status', 'Status', 'required');

			if(!$this->form_validation->run()) 
			{
				$this->session->set_flashdata('msg_alert', validation_errors());
				redirect( base_url('data_izin/edit/' . '/' . $id) );
			}
			$this->m_dataizin->update( $id_izin,$id_namaizin,$id_pgn,$tglawal,$tglakhir,$tempat,$status );
			redirect( base_url('data_izin') );
		}

		$data = generate_page('Edit Data Kebutuhan', 'data_izin/edit/' . $id, $this->user_type);
		$data_content['title_page'] = 'Edit Data Kebutuhan';
		$data_content['data_izin'] = $this->m_dataizin->get_data_izin($id);
		$data_content['namaizin_list'] = $this->m_dataizin->get_namaizin( $data_content['data_izin']->type );
		$data_content['pegawai_list_all'] = $this->m_dataizin->pegawai_list_all();
		$data['content'] = $this->load->view('partial/DataIzinAdmin/V_Admin_DataIzin_Edit', $data_content, true);
		$this->load->view('V_DataIzin_Admin', $data);
	}

	public function delete($id_dkebutuhan) 
	{
		$this->m_dataizin->delete($id_dkebutuhan);
		$this->session->set_flashdata('msg_alert', 'Data pengajuan kebutuhan berhasil dihapus');
		redirect( base_url('data_izin') );
	}

}

/* End of file Data_Izin.php */
/* Location: ./application/controllers/Data_Izin.php */