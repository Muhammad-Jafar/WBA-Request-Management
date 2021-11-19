
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Konfirmasi_Keluhan extends CI_Controller {

	private $m_ki;
	private $user_type;

	function __construct() {
		parent::__construct();
		isnt_adminbaak(function() {
			redirect( base_url('auth/login') );
		});
		$this->load->model('M_KonfirmasiKeluhan');
		$this->m_ki = $this->M_KonfirmasiKeluhan;
		if( $this->session->userdata('user_type') == 'admin' ) {
			$this->user_type = 'Admin';
		} else if( $this->session->userdata('user_type') == 'baak' ){
			$this->user_type = 'BAAK';
		}
	}

	public function keluhanlist_ajax() {
		json_dump(function() {
			$result=$this->m_ki->konfirkeluhan_list_ajax( $this->m_ki->dkeluhan_list_all() );
			return array('data' => $result);
		});
	}

	public function index() {
		$data = generate_page('Konfirmasi Keluhan', 'konfirmasi_keluhan', $this->user_type);
		$data_content['title_page'] = 'Konfirmasi Keluhan';
		$data['content'] = $this->load->view('partial/KonfirmasiKeluhanAdmin/V_KonfirmasiKeluhanAdmin', $data_content, true);
		$this->load->view('V_KonfirmasiKeluhan_Admin', $data);
	}

	public function accept($id_dkeluhan) {
		$this->m_ki->accept_izin($id_dkeluhan);
		$this->session->set_flashdata('msg_alert', 'Pengajuan keluhan berhasil disetujui');
		redirect( base_url('konfirmasi_keluhan') );
	}

	public function reject($id_izin) {
		$this->m_ki->reject_izin($id_izin);
		$this->session->set_flashdata('msg_alert', 'Pengajuan keluhan berhasil ditolak');
		redirect( base_url('konfirmasi_keluhan') );
	}

}

/* End of file Konfirmasi_Izin.php */
/* Location: ./application/controllers/Konfirmasi_Izin.php */