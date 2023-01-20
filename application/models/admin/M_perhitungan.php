<?php
class M_perhitungan extends CI_Model
{
    //mengambil data dari database
    function get($table)
    {
        $this->db->select('*'); //mengambil semua data
        $this->db->from($table); //dari table
        $query = $this->db->get(); //eksekusi query
        return $query; //mengembalikan nilai yang didapat
    }

    function get_gejala_in($id)
    {
        $this->db->select('tbl_gejala.*'); //mengambil semua data
        $this->db->from('tbl_gejala'); //dari table
        $this->db->where_in('id_gejala', $id);
        $query = $this->db->get(); //eksekusi query
        return $query; //mengembalikan nilai yang didapat
    }

    function get_detail_alternatif($id)
    {
        $this->db->select('tbl_penyakit.*'); //mengambil semua data
        $this->db->from('tbl_detail_penyakit'); //dari table
        $this->db->join('tbl_penyakit', 'tbl_detail_penyakit.id_penyakit=tbl_penyakit.id_penyakit');
        $this->db->join('tbl_gejala', 'tbl_detail_penyakit.id_gejala=tbl_gejala.id_gejala');
        $this->db->where_in('tbl_detail_penyakit.id_gejala', $id);
        $this->db->group_by('tbl_detail_penyakit.id_penyakit');
        $this->db->order_by('tbl_detail_penyakit.id_penyakit', 'ASC');
        $query = $this->db->get(); //eksekusi query
        return $query; //mengembalikan nilai yang didapat
    }

    function get_detail($id)
    {
        $this->db->select('tbl_detail_penyakit.*,tbl_penyakit.id_penyakit,tbl_penyakit.nama_penyakit,tbl_gejala.kode_gejala,tbl_gejala.nama_gejala'); //mengambil semua data
        $this->db->from('tbl_detail_penyakit'); //dari table
        $this->db->join('tbl_penyakit', 'tbl_detail_penyakit.id_penyakit=tbl_penyakit.id_penyakit');
        $this->db->join('tbl_gejala', 'tbl_detail_penyakit.id_gejala=tbl_gejala.id_gejala');
        $this->db->where_in('tbl_detail_penyakit.id_gejala', $id);
        $this->db->order_by('tbl_detail_penyakit.id_penyakit', 'ASC');
        $query = $this->db->get(); //eksekusi query
        return $query; //mengembalikan nilai yang didapat
    }

    function get_penyakit($id)
    {
        $this->db->select('tbl_detail_penyakit.*,tbl_penyakit.id_penyakit,tbl_penyakit.nama_penyakit,tbl_gejala.nama_gejala'); //mengambil semua data
        $this->db->from('tbl_detail_penyakit'); //dari table
        $this->db->join('tbl_penyakit', 'tbl_detail_penyakit.id_penyakit=tbl_penyakit.id_penyakit');
        $this->db->join('tbl_gejala', 'tbl_detail_penyakit.id_gejala=tbl_gejala.id_gejala');
        $this->db->where('tbl_detail_penyakit.id_penyakit', $id);
        $query = $this->db->get(); //eksekusi query
        return $query; //mengembalikan nilai yang didapat
    }
}
