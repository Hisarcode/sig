<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Infographic_m extends CI_Model
{

    private $_table = 'bangunan';

    public function getJumlahBangunan()
    {
        return $this->db->count_all($this->_table);
    }

    public function getTotalSekolahByKategori($kategori)
    {
        $this->db->select('*');
        $this->db->from($this->_table);
        $this->db->where('bangunan_kategori_id', $kategori);
        return $this->db->count_all_results();;
    }

    public function getTotalSekolahByKecamatan($kecamatan)
    {
        $this->db->select('*');
        $this->db->from($this->_table);
        $this->db->where('kecamatan_id', $kecamatan);
        return $this->db->count_all_results();;
    }

    public function getTotalSekolahByKecamatanKategori($kecamatan, $kategori)
    {
        $this->db->select('*');
        $this->db->from($this->_table);
        $this->db->where('kecamatan_id', $kecamatan);
        $this->db->where('bangunan_kategori_id', $kategori);
        return $this->db->count_all_results();;
    }
}
