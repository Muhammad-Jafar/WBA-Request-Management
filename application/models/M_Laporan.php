<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class M_Laporan extends CI_Model {

    //DATA UMUM
    public function jabatan_list_all() {
		$q=$this->db->select('*')->get('tb_jabatan');
		return $q->result();
	}

	public function bidang_list_all() {
		$q=$this->db->select('*')->get('tb_bidang');
		return $q->result();
	}
    public function kebutuhan_list_all() {
		$q=$this->db->select('*')->get('tb_kebutuhan');//ini tabel awalnya
		return $q->result();
	}

	public function keluhan_list_all()
	{
		$q=$this->db->select('*')->get('tb_keluhan');
		return $q->result();
	}
    //BATAS DATA UMUM

    public function list_kebutuhan_all()
    {
        $q=$this->db->select(  'b.nama_bidang, 
                                bt.type,
                                p.nama, p.alamat, p.email, p.id,
                                db.id_dkebutuhan, db.id_kebutuhan, db.id_nkebutuhan, db.id_kebutuhan,
                                tgl_pengajuan, db.keluhan, db.status' )
        
        ->from('tb_dkebutuhan as db')
        ->join('tb_pengguna as p','p.id = db.id','LEFT')
        ->join('tb_bidang as b', 'b.id_bidang = p.id_bidang', 'LEFT')
        ->join('tb_keluhan as bt', 'bt.id_keluhan = db.id_keluhan', 'LEFT')
        ->where('status', 'approved')
        ->get();
        return $q->result();
    }

   	//TAMBAHAN BARU UNTUK SORTING DATA KEBUTUHAN
	public function dosentetap_list_all() 
	{
		$q=$this->db->select('*')	
		->from('tb_dkebutuhan as dk')
		->join('tb_kebutuhan as bt', 'bt.id_kebutuhan = dk.id_kebutuhan', 'LEFT')
		->join('tb_pengguna as pg', 'pg.id = dk.id', 'LEFT')
		->join('tb_nkebutuhan as bn', 'bn.id_nkebutuhan = dk.id_nkebutuhan', 'LEFT')
		->join('tb_dosentetap as dt', 'dt.id = pg.id', 'LEFT')
		->join('tb_bidang as b', 'b.id_bidang = pg.id_bidang', 'LEFT')
		// ->join('tb_jabatan as j', 'j.id_jabatan = pg.id_jabatan', 'LEFT')
		->where('nama_bidang','Dosen Tetap')
		->get();
		return $q->result();
	}

	public function dosensks_list_all() 
	{
		$q=$this->db->select('*')	
		->from('tb_dkebutuhan as dk')
		->join('tb_kebutuhan as bt', 'bt.id_kebutuhan = dk.id_kebutuhan', 'LEFT')
		->join('tb_pengguna as pg', 'pg.id = dk.id', 'LEFT')
		->join('tb_nkebutuhan as bn', 'bn.id_nkebutuhan = dk.id_nkebutuhan', 'LEFT')
		->join('tb_dosensks as ds', 'ds.id = pg.id', 'LEFT')
		->join('tb_bidang as b', 'b.id_bidang = pg.id_bidang', 'LEFT')
		// ->join('tb_jabatan as j', 'j.id_jabatan = pg.id_jabatan', 'LEFT')
		->where('nama_bidang','Dosen SKS')
		->get();
		return $q->result();
	}

	public function tedik_list_all() 
	{
		$q=$this->db->select('*')	
		->from('tb_dkebutuhan as dk')
		->join('tb_kebutuhan as bt', 'bt.id_kebutuhan = dk.id_kebutuhan', 'LEFT')
		->join('tb_pengguna as pg', 'pg.id = dk.id', 'LEFT')
		->join('tb_nkebutuhan as bn', 'bn.id_nkebutuhan = dk.id_nkebutuhan', 'LEFT')
		->join('tb_tedik as td', 'td.id = pg.id', 'LEFT')
		->join('tb_bidang as b', 'b.id_bidang = pg.id_bidang', 'LEFT')
		// ->join('tb_jabatan as j', 'j.id_jabatan = pg.id_jabatan', 'LEFT')
		->where('nama_bidang','Tenaga Pendidik')
		->get();
		return $q->result();
	}

	public function tepen_list_all() 
	{
		$q=$this->db->select('*')	
		->from('tb_dkebutuhan as dk')
		->join('tb_kebutuhan as bt', 'bt.id_kebutuhan = dk.id_kebutuhan', 'LEFT')
		->join('tb_pengguna as pg', 'pg.id = dk.id', 'LEFT')
		->join('tb_nkebutuhan as bn', 'bn.id_nkebutuhan = dk.id_nkebutuhan', 'LEFT')
		->join('tb_tepen as tp', 'tp.id = pg.id', 'LEFT')
		->join('tb_bidang as b', 'b.id_bidang = pg.id_bidang', 'LEFT')
		// ->join('tb_jabatan as j', 'j.id_jabatan = pg.id_jabatan', 'LEFT')
		->where('nama_bidang','Tenaga Penunjang')
		->get();
		return $q->result();
	}
	
	//ENDING SORTING DATA KEBUTUHAN


    //TAMBAHAN BARU UNTUK SORTING DATA KELUHAN
		public function k_dosentetap_list_all() 
	{
		$q=$this->db->select('*')	
		->from('tb_dkeluhan as d')
		->join('tb_keluhan as bk', 'bk.id_keluhan = d.id_keluhan', 'LEFT')
		->join('tb_pengguna as pg', 'pg.id = d.id', 'LEFT')
		->join('tb_dosentetap as dt', 'dt.id = pg.id', 'LEFT')
		->join('tb_bidang as b', 'b.id_bidang = pg.id_bidang', 'LEFT')
		// ->join('tb_jabatan as j', 'j.id_jabatan = pg.id_jabatan', 'LEFT')
		->where('nama_bidang','Dosen Tetap')
		->get();
		return $q->result();
	}

	public function k_dosensks_list_all() 
	{
		$q=$this->db->select('*')	
		->from('tb_dkeluhan as d')
		->join('tb_keluhan as bk', 'bk.id_keluhan = d.id_keluhan', 'LEFT')
		->join('tb_pengguna as pg', 'pg.id = d.id', 'LEFT')
		->join('tb_dosensks as ds', 'ds.id = pg.id', 'LEFT')
		->join('tb_bidang as b', 'b.id_bidang = pg.id_bidang', 'LEFT')
		// ->join('tb_jabatan as j', 'j.id_jabatan = pg.id_jabatan', 'LEFT')
		->where('nama_bidang','Dosen SKS')
		->get();
		return $q->result();
	}

	public function k_tedik_list_all() 
	{
		$q=$this->db->select('*')	
		->from('tb_dkeluhan as d')
		->join('tb_keluhan as bk', 'bk.id_keluhan = d.id_keluhan', 'LEFT')
		->join('tb_pengguna as pg', 'pg.id = d.id', 'LEFT')
		->join('tb_tedik as td', 'td.id = pg.id', 'LEFT')
		->join('tb_bidang as b', 'b.id_bidang = pg.id_bidang', 'LEFT')
		// ->join('tb_jabatan as j', 'j.id_jabatan = pg.id_jabatan', 'LEFT')
		->where('nama_bidang','Tenaga Pendidik')
		->get();
		return $q->result();
	}

	public function k_tepen_list_all() 
	{
		$q=$this->db->select('*')	
		->from('tb_dkeluhan as d')
		->join('tb_keluhan as bk', 'bk.id_keluhan = d.id_keluhan', 'LEFT')
		->join('tb_pengguna as pg', 'pg.id = d.id', 'LEFT')
		->join('tb_tepen as tp', 'tp.id = pg.id', 'LEFT')
		->join('tb_bidang as b', 'b.id_bidang = pg.id_bidang', 'LEFT')
		// ->join('tb_jabatan as j', 'j.id_jabatan = pg.id_jabatan', 'LEFT')
		->where('nama_bidang','Tenaga Penunjang')
		->get();
		return $q->result();
	}
}