<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_Master extends CI_Controller {

	private $m_datamaster;

	function __construct() {
		parent::__construct();
		isnt_admin(function() {
			redirect( base_url('auth/login') );
		});
		$this->load->model('M_DataMaster');
		$this->m_datamaster = $this->M_DataMaster;
	}

	public function index() {
		redirect( base_url('dashboard') );
	}

	public function admin() 
	{
		$data = generate_page('Data Admin / Pengelola', 'data_master/admin', 'Admin');
		$data_content['title_page'] = 'Data Admin / Pengelola';
		$data['content'] = $this->load->view('partial/DataMasterAdmin/V_Admin_DataMasterAdmin_Read', $data_content, true);
		$this->load->view('V_DataMaster_Admin', $data);
	}

	public function admin_ajax() 
	{
		json_dump(function() {
			$result= $this->m_datamaster->admin_list_all();
			$new_arr=array();$i=1;
			foreach ($result as $key => $value) {
				$value->no=$i;
				$new_arr[]=$value;
				$value->avatar = '<img src="' . uploads_url('avatar/'.$value->avatar) . '" alt="image" />';
				$i++;
			}
			return array('data' => $new_arr);
		});
	}

	public function jabatan() 
	{
		$data = generate_page('Data Jabatan di PSDM', 'data_master/jabatan', 'Admin');
		$data_content['title_page'] = 'Data Jabatan di PSDM';
		$data['content'] = $this->load->view('partial/DataMasterAdmin/V_Admin_DataMasterJabatan_Read', $data_content, true);
		$this->load->view('V_DataMaster_Admin', $data);
	}

	public function jabatan_ajax() {
		json_dump(function() {
			$result= $this->m_datamaster->jabatan_list_all();
			$new_arr=array();$i=1;
			foreach ($result as $key => $value) {
				$value->no=$i;
				$new_arr[]=$value;
				$i++;
			}
			return array('data' => $new_arr);
		});
	}

	public function bidang() 
	{
		$data = generate_page('Data Status Civitas', 'data_master/bidang', 'Admin');
		$data_content['title_page'] = 'Data Status Civitas';
		$data['content'] = $this->load->view('partial/DataMasterAdmin/V_Admin_DataMasterBidang_Read', $data_content, true);
		$this->load->view('V_DataMaster_Admin', $data);
	}

	public function bidang_ajax() {
		json_dump(function() {
			$result= $this->m_datamaster->bidang_list_all();
			$new_arr=array();$i=1;
			foreach ($result as $key => $value) {
				$value->no=$i;
				$new_arr[]=$value;
				$i++;
			}
			return array('data' => $new_arr);
		});
	}

	public function pegawai() 
	{
		$data = generate_page('Data Pengguna', 'data_master/pegawai', 'Admin');
		$data_content['title_page'] = 'Data Pengguna';
		$data['content'] = $this->load->view('partial/DataMasterAdmin/V_Admin_DataMasterPegawai_Read', $data_content, true);
		$this->load->view('V_DataMaster_Admin', $data);
	}

	public function pegawai_ajax() {
		json_dump(function() {
			$result= $this->m_datamaster->pegawai_list_all();
			$new_arr=array();$i=1;
			foreach ($result as $key => $value) {
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

	public function nama_izin() 
	{
		$data = generate_page('Data Daftar Kebutuhan', 'data_master/nama_izin', 'Admin');
		$data_content['title_page'] = 'Data Daftar Kebutuhan';
		$data['content'] = $this->load->view('partial/DataMasterAdmin/V_Admin_DataMasterIzin_Read', $data_content, true);
		$this->load->view('V_DataMaster_Admin', $data);
	}

	public function namaizin_ajax() 
	{
		json_dump(function() 
		{
			$result= $this->m_datamaster->namaizin_list_all();
			$new_arr=array();$i=1;
			foreach ($result as $key => $value) {
				$value->no=$i;
				$new_arr[]=$value;
				$value->type = '<label class="badge badge-default text-uppercase">'.$value->type.'</label>';
				$i++;
			}
			return array('data' => $new_arr);
		});
	}

	public function keluhan() 
	{
		$data = generate_page('Data Daftar Keluhan', 'data_master/keluhan', 'Admin');
		$data_content['title_page'] = 'Data Daftar Keluhan';
		$data['content'] = $this->load->view('partial/DataMasterAdmin/V_Admin_DataMasterKeluhan_Read', $data_content, true);
		$this->load->view('V_DataMaster_Admin', $data);
	}

	public function keluhan_ajax() {
		json_dump(function() {
			$result= $this->m_datamaster->keluhan_list_all();
			$new_arr=array();$i=1;
			foreach ($result as $key => $value) {
				$value->no=$i;
				$new_arr[]=$value;
				$value->type = '<label class="badge badge-default text-uppercase">'.$value->type.'</label>';
				$i++;
			}
			return array('data' => $new_arr);
		});
	}

	//FUNGSI MENGHAPUS DATA
	public function delete() 
	{
		if( empty($this->uri->segment('3'))) {
			redirect( base_url('/dashboard') );
		}

		if( empty($this->uri->segment('4'))) {
			redirect( base_url('/dashboard') );
		}
 
		$name=$this->uri->segment('3');
		$id=$this->uri->segment('4');

		switch ($name) {
			case 'admin':
				$this->m_datamaster->admin_delete($id);
				$this->session->set_flashdata('msg_alert', 'Akun admin berhasil dihapus');
				redirect( base_url('data_master/admin') );
				break;
			case 'jabatan':
				$this->m_datamaster->jabatan_delete($id);
				$this->session->set_flashdata('msg_alert', 'Data jabatan berhasil dihapus');
				redirect( base_url('data_master/jabatan') );
				break;
			case 'nilai':
				$this->m_datamaster->bidang_delete($id);
				$this->session->set_flashdata('msg_alert', 'Data Status Civitas berhasil dihapus');
				redirect( base_url('data_master/bidang') );
				break;
			case 'pegawai':
				$this->m_datamaster->pegawai_delete($id);
				$this->session->set_flashdata('msg_alert', 'Data pengguna berhasil dihapus');
				redirect( base_url('data_master/pegawai') );
				break;
			case 'nama_izin':
				$this->m_datamaster->namaizin_delete($id);
				$this->session->set_flashdata('msg_alert', 'Data nama izin berhasil dihapus');
				redirect( base_url('data_master/nama_izin') );
				break;
			case 'keluhan':
				$this->m_datamaster->keluhan_delete($id);
				$this->session->set_flashdata('msg_alert', 'Data keluhan berhasil dihapus');
				redirect( base_url('data_master/keluhan') );
				break;			
			default:
				redirect( base_url() );
				break;
		}

	}
	//FUNGSI MENGHAPUS DATA

	//FUNGSI MENGEDIT DATA
	public function edit() 
	{
		if( empty($this->uri->segment('3'))) {
			redirect( base_url() );
		}

		if( empty($this->uri->segment('4'))) {
			redirect( base_url() );
		}

		$name=$this->uri->segment('3');
		$id=$this->uri->segment('4');
		
		switch ($name) 
		{
			case 'jabatan':
				if( $_SERVER['REQUEST_METHOD'] == 'POST') 
				{
					$id= $this->security->xss_clean( $this->input->post('id_jabatan') );
					$nama_jabatan= $this->security->xss_clean( $this->input->post('nama_jabatan') );
					// validasi
					$this->form_validation->set_rules('id_jabatan', 'ID', 'required');
					$this->form_validation->set_rules('nama_jabatan', 'Nama Jabatan', 'required');

					if(!$this->form_validation->run()) {
						$this->session->set_flashdata('msg_alert', validation_errors());
						redirect( base_url('data_master/edit/' . $name . '/' . $id) );
					}
					// to-do
					$this->m_datamaster->jabatan_update(
						$id,$nama_jabatan
					);
					redirect( base_url('data_master/jabatan') );
				}
				$data = generate_page('Edit Data Master Jabatan', 'data_master/edit/' . $name . '/' . $id, 'Admin');

					$data_content['title_page'] = 'Edit Data Master Jabatan';
					$data_content['data_jabatan'] = $this->m_datamaster->get_data_jabatan($id);
				$data['content'] = $this->load->view('partial/DataMasterAdmin/V_Admin_DataMasterJabatan_Edit', $data_content, true);
				$this->load->view('V_DataMaster_Admin', $data);
				break;

			case 'bidang':
				if( $_SERVER['REQUEST_METHOD'] == 'POST') {
					$id= $this->security->xss_clean( $this->input->post('id_bidang') );
					$nama_bidang= $this->security->xss_clean( $this->input->post('nama_bidang') );
					// validasi
					$this->form_validation->set_rules('id_bidang', 'ID', 'required');
					$this->form_validation->set_rules('nama_bidang', 'Nama Bidang', 'required');

					if(!$this->form_validation->run()) {
						$this->session->set_flashdata('msg_alert', validation_errors());
						redirect( base_url('data_master/edit/' . $name . '/' . $id) );
					}
					// to-do
					$this->m_datamaster->bidang_update(
						$id,$nama_bidang
					);
					redirect( base_url('data_master/bidang') );
				}
				$data = generate_page('Edit Data Master Bidang', 'data_master/edit/' . $name . '/' . $id, 'Admin');

					$data_content['title_page'] = 'Edit Data Status Civitas';
					$data_content['data_bidang'] = $this->m_datamaster->get_data_bidang($id);
				$data['content'] = $this->load->view('partial/DataMasterAdmin/V_Admin_DataMasterBidang_Edit', $data_content, true);
				$this->load->view('V_DataMaster_Admin', $data);
				break;

			case 'nama_izin':
				if( $_SERVER['REQUEST_METHOD'] == 'POST') 
				{
					$id_kebutuhan= $this->security->xss_clean( $this->input->post('id_kebutuhan') );
					$type= $this->security->xss_clean( $this->input->post('type') );
					$nama_kebutuhan= $this->security->xss_clean( $this->input->post('nama_kebutuhan') );

					// validasi
					$this->form_validation->set_rules('id_kebutuhan', 'ID', 'required');
					$this->form_validation->set_rules('type', 'type', 'required');
					$this->form_validation->set_rules('nama_kebutuhan', 'nama_kebutuhan', 'required');

					if(!$this->form_validation->run()) {
						$this->session->set_flashdata('msg_alert', validation_errors());
						redirect( base_url('data_master/edit/' . $name . '/' . $id) );
					}
					// to-do
					$this->m_datamaster->namaizin_update(
						$id_kebutuhan,$type,$nama_kebutuhan
					);
					//redirect( base_url('data_master/nama_izin') );
				}
				$data = generate_page('Edit Data Master Nama Izin', 'data_master/edit/' . $name . '/' . $id, 'Admin');

					$data_content['title_page'] = 'Edit Data Daftar Kebutuhan';
					$data_content['data_namaizin'] = $this->m_datamaster->get_data_namaizin($id);
				$data['content'] = $this->load->view('partial/DataMasterAdmin/V_Admin_DataMasterIzin_Edit', $data_content, true);
				$this->load->view('V_DataMaster_Admin', $data);
				break;

			case 'keluhan':
				if( $_SERVER['REQUEST_METHOD'] == 'POST') 
				{
					$id_keluhan= $this->security->xss_clean( $this->input->post('id_keluhan') );
					$type= $this->security->xss_clean( $this->input->post('type') );
	
					// validasi
					$this->form_validation->set_rules('type', 'type', 'required');
	
					if(!$this->form_validation->run()) 
					{
						$this->session->set_flashdata('msg_alert', validation_errors());
						redirect( base_url('data_master/edit/' . $name . '/' . $id) );
					}
					// to-do
					$this->m_datamaster->keluhan_update( $id_keluhan,$type);
					redirect( base_url('data_master/keluhan') );
				}

				$data = generate_page('Edit Data Daftar Keluhan', 'data_master/edit/' . $name . '/' . $id, 'Admin');
				$data_content['title_page'] = 'Edit Data Daftar Keluhan';
				$data_content['data_keluhan'] = $this->m_datamaster->get_data_keluhan($id);
				$data['content'] = $this->load->view('partial/DataMasterAdmin/V_Admin_DataMasterKeluhan_Edit', $data_content, true);
				$this->load->view('V_DataMaster_Admin', $data);
				break;

			case 'admin':
				if( $_SERVER['REQUEST_METHOD'] == 'POST') 
				{
					$id_user= $this->security->xss_clean( $this->input->post('id_user') );
					$username= $this->security->xss_clean( $this->input->post('username') );
					$email= $this->security->xss_clean( $this->input->post('email') );
					$namalengkap= $this->security->xss_clean( $this->input->post('namalengkap') );
					$password= $this->security->xss_clean( $this->input->post('password') );
					$type= $this->security->xss_clean( $this->input->post('type') );
					$avatar = '';
					// avatar
					if ( $this->security->xss_clean( $_FILES["avatar"] ) && $_FILES['avatar']['name'] ) 
					{
						$config['upload_path']          = './uploads/avatar/';
						$config['allowed_types']        = 'jpg|jpeg|png';
						$config['max_size']             = 2000;
						$config['file_name']			= md5(time() . '_' . $_FILES["avatar"]['name']);
				 
						$this->load->library('upload', $config);
				 
						if ( !$this->upload->do_upload('avatar') && !empty($_FILES['avatar']['name'])) 
						{
							$this->session->set_flashdata('msg_alert', $this->upload->display_errors());
							redirect( base_url('data_master/edit/' . $name . '/' . $id) );
						} 
						else 
						{
							$avatar = $this->upload->data()['file_name'];
						}
					}

					// validasi
					$this->form_validation->set_rules('id_user', 'id_user', 'required');
					$this->form_validation->set_rules('username', 'Username', 'required');
					$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
					$this->form_validation->set_rules('namalengkap', 'Nama Lengkap', 'required');
					$this->form_validation->set_rules('password', 'Password', 'required');
					$this->form_validation->set_rules('type', 'Type', 'required');

					if(!$this->form_validation->run()) 
					{
						$this->session->set_flashdata('msg_alert', validation_errors());
						redirect( base_url('data_master/edit/' . $name . '/' . $id) );
					}
					$this->m_datamaster->admin_update( $id_user, $username, $email, $namalengkap, $password, $type, $avatar );
					redirect( base_url('data_master/' . $name) );
				}

				$data = generate_page('Edit Data Master Admin', 'data_master/edit/' . $name . '/' . $id, 'Admin');
				$data_content['title_page'] = 'Entry Data Master Admin';
				$data_content['data_admin'] = $this->m_datamaster->get_data_admin($id);
				$data['content'] = $this->load->view('partial/DataMasterAdmin/V_Admin_DataMasterAdmin_Edit', $data_content, true);
				$this->load->view('V_DataMaster_Admin', $data);
				break;

			case 'pegawai':
				if( $_SERVER['REQUEST_METHOD'] == 'POST') 
				{
					$nama= $this->security->xss_clean( $this->input->post('nama') );
					$nomor_induk= $this->security->xss_clean( $this->input->post('nomor_induk') );
					$tempat_lahir= $this->security->xss_clean( $this->input->post('tempat_lahir') );
					$tanggal_lahir= $this->security->xss_clean( $this->input->post('tanggal_lahir') );
					$jenis_kelamin= $this->security->xss_clean( $this->input->post('jenis_kelamin') );
					$id_jabatan= $this->security->xss_clean( $this->input->post('id_jabatan') );
					$id_bidang= $this->security->xss_clean( $this->input->post('id_bidang') );
					$alamat= $this->security->xss_clean( $this->input->post('alamat') );
					$no_handphone= $this->security->xss_clean( $this->input->post('no_handphone') );
					$email= $this->security->xss_clean( $this->input->post('email') );
					$password= $this->security->xss_clean( $this->input->post('password') );
					$id_user= $this->security->xss_clean( $this->input->post('id_user') );
					$tanggal_regis= $this->security->xss_clean( $this->input->post('tanggal_regis') );
					$avatar = '';

					// avatar
					if ( $this->security->xss_clean( $_FILES["avatar"] ) && $_FILES['avatar']['name'] ) 
					{
						$config['upload_path']          = './uploads/avatar/';
						$config['allowed_types']        = 'jpg|jpeg|png';
						$config['max_size']             = 2000;
						$config['file_name']			= md5(time() . '_' . $_FILES["avatar"]['name']);
				 
						$this->load->library('upload', $config);
				 
						if ( !$this->upload->do_upload('avatar') && !empty($_FILES['avatar']['name'])) {
							$this->session->set_flashdata('msg_alert', $this->upload->display_errors());
							redirect( base_url('data_master/edit/' . $name . '/' . $id) );
						} else {
							$avatar = $this->upload->data()['file_name'];
						}
					}
					// validasi
					$this->form_validation->set_rules('nama', 'Nama', 'required');
					$this->form_validation->set_rules('nomor_induk', 'Nomor Induk', 'required');
					$this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'required');
					$this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'required');
					$this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required');
					$this->form_validation->set_rules('id_jabatan', 'Nama Jabatan', 'required');
					$this->form_validation->set_rules('id_bidang', 'Status Civitas', 'required');
					$this->form_validation->set_rules('alamat', 'Alamat', 'required');
					$this->form_validation->set_rules('no_handphone', 'No Handphone', 'required');
					$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
					$this->form_validation->set_rules('password', 'Password', 'required');
					$this->form_validation->set_rules('id_user', 'ID User', 'required');
					$this->form_validation->set_rules('tanggal_regis', 'Tanggal Registrasi', 'required');
					
					if(!$this->form_validation->run()) {
						$this->session->set_flashdata('msg_alert', validation_errors());
						redirect( base_url('data_master/edit/' . $name . '/' .$id) );
					}
					// to-do
					$this->m_datamaster->pegawai_add_new(	$id,$nama,$nomor_induk,$tempat_lahir,$tanggal_lahir,$jenis_kelamin,
															$id_jabatan,$id_bidang,$alamat, $no_handphone,$email, 
															$password,$id_user,$tanggal_regis,$avatar);
					redirect( base_url('data_master/' . $name) );
				}

				$data = generate_page('Edit Data Pengguna', 'data_master/edit/pegawai', 'Admin');
				$data_content['list_bidang'] = $this->m_datamaster->get_list_bidang();
				$data_content['list_jabatan'] = $this->m_datamaster->get_list_jabatan();
				$data_content['title_page'] = 'Data Pengguna';
				$data['content'] = $this->load->view('partial/DataMasterAdmin/V_Admin_DataMasterPegawai_Edit', $data_content, true);
				$this->load->view('V_DataMaster_Admin', $data);
				break;
		}
	}

	//FUNGSI MENAMBAHKAN DATA BARU
	public function add_new() 
	{
		if( empty($this->uri->segment('3'))) {redirect( base_url() );}
		$name=$this->uri->segment('3');
			
		switch ($name) 
		{
			case 'jabatan':
				if( $_SERVER['REQUEST_METHOD'] == 'POST') 
				{
					$nama_jabatan= $this->security->xss_clean( $this->input->post('nama_jabatan') );
					$this->form_validation->set_rules('nama_jabatan', 'Nama Jabatan', 'required');
					if(!$this->form_validation->run()) 
					{
						$this->session->set_flashdata('msg_alert', validation_errors());
						redirect( base_url('data_master/add_new/' . $name) );
					}
					$this->m_datamaster->jabatan_add_new($nama_jabatan);
					redirect( base_url('data_master/' . $name) );
				}

				$data = generate_page('Entry Data Master Jabatan', 'data_master/add_new/jabatan', 'Admin');
				$data_content['title_page'] = 'Entry Data Master Jabatan';
				$data['content'] = $this->load->view('partial/DataMasterAdmin/V_Admin_DataMasterJabatan_Create', $data_content, true);
				$this->load->view('V_DataMaster_Admin', $data);
				break;

			case 'bidang':
				if( $_SERVER['REQUEST_METHOD'] == 'POST') 
				{
					$nama_bidang= $this->security->xss_clean( $this->input->post('nama_bidang') );
					$this->form_validation->set_rules('nama_bidang', 'Nama Bidang', 'required');
					if(!$this->form_validation->run()) 
					{
						$this->session->set_flashdata('msg_alert', validation_errors());
						redirect( base_url('data_master/add_new/' . $name) );
					}
					$this->m_datamaster->bidang_add_new($nama_bidang);
					redirect( base_url('data_master/' . $name) );
				}

				$data = generate_page('Entry Data Master Bidang', 'data_master/add_new/bidang', 'Admin');
				$data_content['title_page'] = 'Entry Data Master Bidang';
				$data['content'] = $this->load->view('partial/DataMasterAdmin/V_Admin_DataMasterBidang_Create', $data_content, true);
				$this->load->view('V_DataMaster_Admin', $data);
				break;

			case 'nama_izin':
				if( $_SERVER['REQUEST_METHOD'] == 'POST') 
				{
					$type= $this->security->xss_clean( $this->input->post('type') );
					$nama_kebutuhan= $this->security->xss_clean( $this->input->post('nama_kebutuhan') );
					$this->form_validation->set_rules('type', 'type', 'required');
					$this->form_validation->set_rules('nama_kebutuhan', 'nama_kebutuhan', 'required');
					if(!$this->form_validation->run()) 
					{
						$this->session->set_flashdata('msg_alert', validation_errors());
						redirect( base_url('data_master/add_new/' . $name) );
					}
					$this->m_datamaster->namaizin_add_new($type, $nama_kebutuhan);
					redirect( base_url('data_master/' . $name) );
				}

				$data = generate_page('Tambah Data Daftar Kebutuhan', 'data_master/add_new/nama_izin', 'Admin');
				$data_content['title_page'] = 'Tambah Data Daftar Kebutuhan';
				$data['content'] = $this->load->view('partial/DataMasterAdmin/V_Admin_DataMasterIzin_Create', $data_content, true);
				$this->load->view('V_DataMaster_Admin', $data);
				break;

			case 'keluhan':
				if( $_SERVER['REQUEST_METHOD'] == 'POST') 
				{
					$type= $this->security->xss_clean( $this->input->post('type') );
					$this->form_validation->set_rules('type', 'type', 'required');
					if(!$this->form_validation->run()) 
					{
						$this->session->set_flashdata('msg_alert', validation_errors());
						redirect( base_url('data_master/add_new/' . $name) );
					}
					$this->m_datamaster->keluhan_add_new($type);
					redirect( base_url('data_master/' . $name) );
				}
	
				$data = generate_page('Tambah Data Daftar Keluhan', 'data_master/add_new/keluhan', 'Admin');
				$data_content['title_page'] = 'Tambah Data Daftar Keluhan';
				$data['content'] = $this->load->view('partial/DataMasterAdmin/V_Admin_DataMasterKeluhan_Create', $data_content, true);
				$this->load->view('V_DataMaster_Admin', $data);
				break;

			case 'admin':
				if( $_SERVER['REQUEST_METHOD'] == 'POST') 
				{
					$username= $this->security->xss_clean( $this->input->post('username') );
					$email= $this->security->xss_clean( $this->input->post('email') );
					$namalengkap= $this->security->xss_clean( $this->input->post('namalengkap') );
					$password= $this->security->xss_clean( $this->input->post('password') );
					$type= $this->security->xss_clean( $this->input->post('type') );
					$avatar = '';
					// avatar
					if ( $this->security->xss_clean( $_FILES["avatar"] ) && $_FILES['avatar']['name'] ) {
						$config['upload_path']          = './uploads/avatar/';
						$config['allowed_types']        = 'jpg|jpeg|png';
						$config['max_size']             = 2000;
						$config['file_name']			= md5(time() . '_' . $_FILES["avatar"]['name']);
				 
						$this->load->library('upload', $config);
				 
						if ( !$this->upload->do_upload('avatar') && !empty($_FILES['avatar']['name'])) {
							$this->session->set_flashdata('msg_alert', $this->upload->display_errors());
							redirect( base_url('data_master/edit/' . $name . '/' . $id) );
						} else {
							$avatar = $this->upload->data()['file_name'];
						}
					}
					// validasi
					$this->form_validation->set_rules('username', 'Username', 'required');
					$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
					$this->form_validation->set_rules('namalengkap', 'Nama Lengkap', 'required');
					$this->form_validation->set_rules('password', 'Password', 'required');
					$this->form_validation->set_rules('type', 'Type', 'required');
					if(!$this->form_validation->run()) {
						$this->session->set_flashdata('msg_alert', validation_errors());
						redirect( base_url('data_master/add_new/' . $name) );
					}
					$this->m_datamaster->admin_add_new(
						$username, $email, $namalengkap, $password, $type, $avatar
					);
					redirect( base_url('data_master/' . $name) );
				}
				$data = generate_page('Entry Data Master Admin', 'data_master/add_new/admin', 'Admin');

					$data_content['title_page'] = 'Entry Data Master Admin';
				$data['content'] = $this->load->view('partial/DataMasterAdmin/V_Admin_DataMasterAdmin_Create', $data_content, true);
				$this->load->view('V_DataMaster_Admin', $data);
				break;

			case 'pegawai':
				if( $_SERVER['REQUEST_METHOD'] == 'POST') {
					$nama= $this->security->xss_clean( $this->input->post('nama') );
					$nomor_induk= $this->security->xss_clean( $this->input->post('nomor_induk') );
					$tempat_lahir= $this->security->xss_clean( $this->input->post('tempat_lahir') );
					$tanggal_lahir= $this->security->xss_clean( $this->input->post('tanggal_lahir') );
					$jenis_kelamin= $this->security->xss_clean( $this->input->post('jenis_kelamin') );
					$id_jabatan= $this->security->xss_clean( $this->input->post('id_jabatan') );
					$id_bidang= $this->security->xss_clean( $this->input->post('id_bidang') );
					$alamat= $this->security->xss_clean( $this->input->post('alamat') );
					$no_handphone= $this->security->xss_clean( $this->input->post('no_handphone') );
					$email= $this->security->xss_clean( $this->input->post('email') );
					$password= $this->security->xss_clean( $this->input->post('password') );
					$id_user= $this->security->xss_clean( $this->input->post('id_user') );
					$tanggal_regis= $this->security->xss_clean( $this->input->post('tanggal_regis') );
					$avatar = '';
					// avatar
					if ( $this->security->xss_clean( $_FILES["avatar"] ) && $_FILES['avatar']['name'] ) {
						$config['upload_path']          = './uploads/avatar/';
						$config['allowed_types']        = 'jpg|jpeg|png';
						$config['max_size']             = 2000;
						$config['file_name']			= md5(time() . '_' . $_FILES["avatar"]['name']);
				 
						$this->load->library('upload', $config);
				 
						if ( !$this->upload->do_upload('avatar') && !empty($_FILES['avatar']['name'])) {
							$this->session->set_flashdata('msg_alert', $this->upload->display_errors());
							redirect( base_url('data_master/edit/' . $name . '/' . $id) );
						} else {
							$avatar = $this->upload->data()['file_name'];
						}
					}
					// validasi
					$this->form_validation->set_rules('nama', 'Nama', 'required');
					$this->form_validation->set_rules('nomor_induk', 'Nomor Induk', 'required');
					$this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'required');
					$this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'required');
					$this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required');
					$this->form_validation->set_rules('id_jabatan', 'Jabatan', 'required');
					$this->form_validation->set_rules('id_bidang', 'Status Civitas', 'required');
					$this->form_validation->set_rules('alamat', 'Alamat', 'required');
					$this->form_validation->set_rules('no_handphone', 'No Handphone', 'required');
					$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
					$this->form_validation->set_rules('password', 'Password', 'required');
					$this->form_validation->set_rules('id_user', 'ID User', 'required');
					$this->form_validation->set_rules('tanggal_regis', 'Tanggal Pengangkatan', 'required');
					
					if(!$this->form_validation->run()) {
						$this->session->set_flashdata('msg_alert', validation_errors());
						redirect( base_url('data_master/add_new/' . $name) );
					}
					// to-do
					$this->m_datamaster->pegawai_add_new(
						$nama,$nomor_induk,$tempat_lahir,$tanggal_lahir,$jenis_kelamin,$id_jabatan,$id_bidang,$alamat, 
						$no_handphone,$email, $password,$id_user,$tanggal_regis,$avatar
						);
					redirect( base_url('data_master/' . $name) );
				}
				$data = generate_page('Tambah Data Pengguna', 'data_master/add_new/pegawai', 'Admin');
				$data_content['list_bidang'] = $this->m_datamaster->get_list_bidang();
				$data_content['list_jabatan'] = $this->m_datamaster->get_list_jabatan();
				$data_content['title_page'] = 'Data Pengguna';
				$data['content'] = $this->load->view('partial/DataMasterAdmin/V_Admin_DataMasterPegawai_Create', $data_content, true);
				$this->load->view('V_DataMaster_Admin', $data);
				break;
		}
	}
}

/* End of file Data_Master.php */
/* Location: ./application/controllers/Data_Master.php */