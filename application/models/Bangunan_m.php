<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Bangunan_m extends CI_Model
{
    private $_table = 'bangunan';
    public $bangunan_id;
    public $bangunan_nama;
    public $bangunan_lat;
    public $bangunan_long;
    public $bangunan_gambar = "default.jpg";
    public $bangunan_alamat;
    public $bangunan_kategori_id;
    public $kecamatan_id;

    public function rules(){
        return[
            ['field' => 'bangunan_nama',
            'label' => 'Nama Bangunan',
            'rules' => 'required'],

            ['field' => 'bangunan_lat',
            'label' => 'Latitude Bangunan',
            'rules' => 'required'],
            
            ['field' => 'bangunan_long',
            'label' => 'Longitude Bangunan',
            'rules' => 'required']
        ];
    }
    public function getBangunan()
    {
        $this->db->select('*');
        $this->db->from('bangunan');
        $this->db->join('bangunan_kategori', 'kategori_id = bangunan_kategori_id');
        return $this->db->get()->result_array();
    }

    public function getBangunanById($id)
    {
        $this->db->select('*');
        $this->db->from('bangunan');
        $this->db->join('bangunan_kategori', 'kategori_id = bangunan_kategori_id');
        $this->db->where('bangunan_id', $id);
        // return $this->db->get('bangunan', ['bangunan_id' => $id])->row_array();
        return $this->db->get()->row_array();
    }

    public function tambahDataBangunan($data)
    {
        $data = [
            'bangunan_nama' =>  $this->input->post('nama'),
            'bangunan_id' =>  $this->input->post('id'),
            'bangunan_lat' =>  $this->input->post('lat'),
            'bangunan_long' =>  $this->input->post('long'),
            'bangunan_gambar' => $this->_uploadImage();
        ];

        $this->db->insert('bangunan', $data);
        return $this->db->rowCount();
    }

    private function _uploadImage($bangunan_id)
    {
        $config['upload_path'] = './upload/bangunan/';
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['file_name'] = $bangunan_id;
        $config['overwrite'] = true;
        $config['maxsize'] = 1024;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('image')) {
            return $this->upload->data("file_name");
        }

        return "default.jpg";
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
