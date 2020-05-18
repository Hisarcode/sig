<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Bangunan_m extends CI_Model
{
    private $_table = 'bangunan';
    public $bangunan_id;
    public $bangunan_nama;
    public $bangunan_lat;
    public $bangunan_long;
    public $bangunan_gambar;
    public $bangunan_alamat = "Alamat Tidak Diketahui";
    public $bangunan_kategori_id = "1";
    public $kecamatan_id = "1";

    public function rules()
    {
        return [
            [
                'field' => 'nama',
                'label' => 'Nama Bangunan',
                'rules' => 'required'
            ],

            [
                'field' => 'lat',
                'label' => 'Latitude Bangunan',
                'rules' => 'required'
            ],

            [
                'field' => 'long',
                'label' => 'Longitude Bangunan',
                'rules' => 'required'
            ]
        ];
    }
    public function getBangunan()
    {
        $this->db->select('*');
        $this->db->from($this->_table);
        $this->db->join('bangunan_kategori', 'kategori_id = bangunan_kategori_id');
        return $this->db->get()->result_array();
    }

    public function getBangunanById($id)
    {
        $this->db->select('*');
        $this->db->from($this->_table);
        $this->db->join('bangunan_kategori', 'kategori_id = bangunan_kategori_id');
        $this->db->where('bangunan_id', $id);
        // return $this->db->get('bangunan', ['bangunan_id' => $id])->row_array();
        return $this->db->get()->row_array();
    }

    public function tambahDataBangunan()
    {
        $post = $this->input->post();
        $this->bangunan_nama =  $post['nama'];
        $this->bangunan_lat =  $post['lat'];
        $this->bangunan_long =  $post['long'];
        $this->bangunan_gambar = $this->_uploadImage();

        return $this->db->insert($this->_table, $this);
    }

    public function editDataBangunan()
    {
        $post = $this->input->post();

        $this->bangunan_id = $post["id"];
        $this->bangunan_nama =  $post['nama'];
        $this->bangunan_lat =  $post['lat'];
        $this->bangunan_long =  $post['long'];
        if (!empty($_FILES["gambar"]["name"])) {
            $this->bangunan_gambar = $this->_uploadImage();
        } else {
            $this->bangunan_gambar = $post["old_image"];
        }
        return $this->db->update($this->_table, $this, array('bangunan_id' => $post["id"]));
    }

    private function _uploadImage()
    {
        $config['upload_path'] = './upload/bangunan/';
        $config['allowed_types'] = 'jpeg|jpg|png';
        $config['file_name'] = $this->bangunan_id;
        $config['overwrite'] = true;
        $config['max_size'] = 3072;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('gambar')) {

            return $this->upload->data('file_name');
        }

        return "default.jpg";
    }

    public function hapusDataBangunan($id)
    {
        // $data = ['bangunan_id' =>  $id];
        // $this->db->delete('bangunan', $data);
        // return $this->db->rowCount();
        return $this->db->delete($this->_table, array("bangunan_id" => $id));
    }
}
