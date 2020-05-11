<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Bangunan_m extends CI_Model
{
    public function getBangunan()
    {
        return $this->db->get('bangunan')->result_array();
    }

    public function getBangunanById($id)
    {
        return $this->db->get('bangunan', ['bangunan_id' => $id])->row_array();
    }

    public function tambahDataBangunan($data)
    {
        $data = [
            'bangunan_nama' =>  $this->input->post('nama'),
            'bangunan_id' =>  $this->input->post('id'),
            'bangunan_lat' =>  $this->input->post('lat'),
            'bangunan_long' =>  $this->input->post('long'),
        ];

        $this->db->insert('bangunan', $data);
        return $this->db->rowCount();
    }

    public function hapusDataBangunan($id)
    {
        $data = ['bangunan_id' =>  $id];
        $this->db->delete('bangunan', $data);
        return $this->db->rowCount();
    }

    // public function ubahDataMahasiswa($data)
    // {
    //     $query = "UPDATE " . $this->table . " SET
    //                 nama = :nama,
    //                 nim = :nim,
    //                 email = :email,
    //                 jurusan = :jurusan
    //                 WHERE id = :id";
    //     $this->db->query($query);
    //     $this->db->bind('nama', $data['nama']);
    //     $this->db->bind('nim', $data['nim']);
    //     $this->db->bind('email', $data['email']);
    //     $this->db->bind('jurusan', $data['jurusan']);
    //     $this->db->bind('id', $data['id']);

    //     $this->db->execute();

    //     return $
}
