<?php
class M_pakar extends CI_Model
{
    //mengambil data dari database
    function get($table)
    {
        $this->db->select('*'); //mengambil semua data
        $this->db->from($table); //dari table
        $query = $this->db->get(); //eksekusi query
        return $query; //mengembalikan nilai yang didapat
    }

    function get_detail_penyakit()
    {
        $this->db->select('tbl_penyakit.nama_penyakit,tbl_gejala.nama_gejala,tbl_detail_penyakit.*'); //mengambil semua data
        $this->db->from('tbl_detail_penyakit'); //dari table
        $this->db->join('tbl_penyakit', 'tbl_detail_penyakit.id_penyakit=tbl_penyakit.id_penyakit');
        $this->db->join('tbl_gejala', 'tbl_detail_penyakit.id_gejala=tbl_gejala.id_gejala');
        $query = $this->db->get(); //eksekusi query
        return $query; //mengembalikan nilai yang didapat
    }

    //menyimpan data kedalam database
    public function input($data, $table) //$data dan $table merupakan variable yang dikirim dari controller
    {
        $query = $this->db->insert($table, $data); //bagian ini merupakan query builder bawaan codeigniter
        return $query;
    }

    function update($where, $data, $table)
    {
        $this->db->where($where);
        $query = $this->db->update($table, $data);
        return $query;
    }

    function delete($where, $table)
    {
        $this->db->where($where);
        $hasil = $this->db->delete($table);
        return $hasil;
    }
}
