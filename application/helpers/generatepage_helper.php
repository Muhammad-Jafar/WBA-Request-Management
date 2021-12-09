<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if( !function_exists('generate_page') ) 
{

	function generate_navlink($path_page, $var_path_page, $page_name) 
	{
		$html = '<li class="nav-item {status}">';
		$html.= "\n";
		$html.= '<a class="nav-link" href="' . base_url($var_path_page) .'">'.$page_name.'</a>';
		$html.= '</li>';
		return ( ($path_page==$var_path_page) ? str_replace('{status}', 'active', $html) : str_replace('{status}', '', $html) );
	}

}

if( !function_exists('generate_page') ) 
{
	
	function generate_page($title_page, $path_page, $user_type) 
	{
		$ci =& get_instance();
		$data = array();

		$data_header['title_page'] = $title_page;
		$data['header'] = $ci->load->view('default/V_Header', $data_header, true);
		$data_navbar['user_name'] = $ci->session->userdata('user_name');
		$data_navbar['user_avatar'] = $ci->session->userdata('user_avatar');
		$data['navbar'] = $ci->load->view('default/V_Navbar', $data_navbar, true);

		$data_menu['path_page'] = $path_page;
		$data_menu['user_name'] = $ci->session->userdata('user_name');
		$data_menu['user_id'] = $ci->session->userdata('user_id');
		$data_menu['nama_id'] = $ci->session->userdata('nama_id');
		$data_menu['tempat_lahir'] = $ci->session->userdata('tempat_lahir');
		$data_menu['tanggal_lahir'] = $ci->session->userdata('tanggal_lahir');
		$data_menu['jenis_kelamin'] = $ci->session->userdata('jenis_kelamin');
		$data_menu['alamat'] = $ci->session->userdata('alamat');
		$data_menu['no_handphone'] = $ci->session->userdata('no_handphone');
		$data_menu['tanggal_regis'] = $ci->session->userdata('tanggal_regis');
		$data_menu['email'] = $ci->session->userdata('user_email');
		$data_menu['user_avatar'] = $ci->session->userdata('user_avatar');
		$data_menu['jabatan'] = $ci->session->userdata('user_nama_jabatan');
		$data_menu['bidang'] = $ci->session->userdata('user_nama_bidang');
		$data_menu['nim'] = $ci->session->userdata('nim');
		$data_menu['prodi'] = $ci->session->userdata('nama_prodi');
		$data_menu['fakultas'] = $ci->session->userdata('nama_fakultas');
		$data_menu['nip'] = $ci->session->userdata('nip');
		$data_menu['np'] = $ci->session->userdata('np');
		$data['menu'] = $ci->load->view('menu/V_Menu_' . $user_type, $data_menu, true);

		$data['footer'] = $ci->load->view('default/V_Footer', '', true);
		$data['javascript'] = $ci->load->view('default/V_JavaScript', '', true);

		return $data;
	}

}