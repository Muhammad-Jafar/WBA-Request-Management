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
	public function Kebutuhan_mhs_list_all() 
	{
		$q=$this->db->select( '*' )
        ->from('tb_dkebutuhan as db')
        ->join('tb_kebutuhan as bt', 'bt.id_kebutuhan = db.id_kebutuhan')
        ->join('tb_nkebutuhan as n', 'n.id_nkebutuhan = db.id_nkebutuhan')
        ->join('tb_pengguna as pg', 'pg.id = db.id')
		->join('tb_mhsiswa as mhs', 'mhs.id = db.id', 'LEFT')
		->join('tb_bidang as b', 'b.id_bidang = pg.id_bidang', 'LEFT')
		->join('tb_fakultas as fak', 'fak.id_fakultas = mhs.id_fakultas', 'LEFT')
		->join('tb_prodi as prod', 'prod.id_prodi = mhs.id_prodi', 'LEFT')
		->where('nama_bidang','Mahasiswa')
		->get();
		return $q->result();
	}

	public function kebutuhan_dosen_list_all() 
	{
        $q=$this->db->select( '*' )
        ->from('tb_dkebutuhan as db')
        ->join('tb_kebutuhan as bt', 'bt.id_kebutuhan = db.id_kebutuhan')
        ->join('tb_nkebutuhan as n', 'n.id_nkebutuhan = db.id_nkebutuhan')
        ->join('tb_pengguna as pg', 'pg.id = db.id')
		->join('tb_dosen as do', 'do.id = pg.id', 'LEFT')
		->join('tb_bidang as b', 'b.id_bidang = pg.id_bidang', 'LEFT')
		->where('nama_bidang','Dosen')
		->get();
		return $q->result();
	}

	public function kebutuhan_staff_list_all() 
	{
        $q=$this->db->select( '*' )
        ->from('tb_dkebutuhan as db')
        ->join('tb_kebutuhan as bt', 'bt.id_kebutuhan = db.id_kebutuhan')
        ->join('tb_nkebutuhan as n', 'n.id_nkebutuhan = db.id_nkebutuhan')
        ->join('tb_pengguna as pg', 'pg.id = db.id')
		->join('tb_bidang as b', 'b.id_bidang = pg.id_bidang', 'LEFT')
		->where('nama_bidang','Staff')
		->get();
		return $q->result();
	}


    //TAMBAHAN BARU UNTUK SORTING DATA KELUHAN
	public function keluhan_mhs_list_all() 
	{
		$q=$this->db->select('*')	
		->from('tb_dkeluhan as db')
        ->join('tb_keluhan as bt', 'bt.id_keluhan = db.id_keluhan')
        ->join('tb_pengguna as pg', 'pg.id = db.id')
		->join('tb_mhsiswa as mhs', 'mhs.id = pg.id', 'LEFT')
		->join('tb_bidang as b', 'b.id_bidang = pg.id_bidang', 'LEFT')
		->join('tb_fakultas as fak', 'fak.id_fakultas = mhs.id_fakultas', 'LEFT')
		->join('tb_prodi as prod', 'prod.id_prodi = mhs.id_prodi', 'LEFT')
		->where('nama_bidang','Mahasiswa')
		->get();
		return $q->result();
	}

	public function keluhan_dosen_list_all() 
	{
		$q=$this->db->select('*')	
		->from('tb_dkeluhan as db')
        ->join('tb_keluhan as bt', 'bt.id_keluhan = db.id_keluhan')
        ->join('tb_pengguna as pg', 'pg.id = db.id')
		->join('tb_dosen as do', 'do.id = pg.id', 'LEFT')
		->join('tb_bidang as b', 'b.id_bidang = pg.id_bidang', 'LEFT')
		->where('nama_bidang','Dosen')
		->get();
		return $q->result();
	}

	public function keluhan_staff_list_all() 
	{
		$q=$this->db->select('*')
        ->from('tb_dkeluhan as db')
        ->join('tb_keluhan as bt', 'bt.id_keluhan = db.id_keluhan')	
        ->join('tb_pengguna as pg', 'pg.id = db.id')
		->join('tb_staff as stf', 'stf.id = pg.id', 'LEFT')
		->join('tb_bidang as b', 'b.id_bidang = pg.id_bidang', 'LEFT')
		->join('tb_jabatan as j', 'j.id_jabatan = pg.id_jabatan', 'LEFT')
		->where('nama_bidang','Staff UTS')
		->get();
		return $q->result();
	}
}