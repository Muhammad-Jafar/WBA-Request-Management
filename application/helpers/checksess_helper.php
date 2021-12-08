<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if( !function_exists('isnt_admin') ) 
{
	function isnt_admin($callback) 
	{
		$ci =& get_instance();
		if ( $ci->session->userdata('user_type') !== 'admin') 
		{
			$callback();
		}
	}
}

if( !function_exists('isnt_supervisor') ) 
{	
	function isnt_supervisor($callback)  
	{
		$ci =& get_instance();
		if ( $ci->session->userdata('user_type') !== 'admin' && $ci->session->userdata('user_type') !== 'supervisor') 
		{
			$callback();
		}
	}
}

if( !function_exists('isnt_pengguna') ) 
{	
	function isnt_pengguna($callback) 
	{
		$ci =& get_instance();
		if ( $ci->session->userdata('user_type') !== 'pengguna') 
		{
			$callback();
		}
	}

}