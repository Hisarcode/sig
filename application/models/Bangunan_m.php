<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Bangunan_m extends CI_Model
{
    private $_table = 'bangunan';
    public $bangunan_id;
    public $bangunan_nama;
    public $bangunan_lat;
    public $bangunan_long;
    public $npsn;
    public $bangunan_gambar;
    public $bangunan_alamat = "Alamat Tidak Diketahui";
    public $bangunan_kategori_id = "1";
    public $kecamatan_id = "1";
    public $status;
    public $jumlah_siswa =  0;
    public $jumlah_guru = 0;


    public function rules($unique)
    {
        $uniqueRules = "";
        if ($unique == 1) $uniqueRules = "|is_unique[bangunan.npsn]";
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
            ],
            [
                'field' => 'kategori_id',
                'label' => 'Kategori',
                'rules' => 'required'
            ],
            [
                'field' => 'alamat',
                'label' => 'Alamat Bangunan',
                'rules' => 'required'
            ],
            [
                'field' => 'npsn',
                'label' => 'NPSN',
                'rules' => 'required|numeric|max_length[8]' . $uniqueRules
            ],
            [
                'field' => 'status',
                'label' => 'Status Fasilitas Pendidikan',
                'rules' => 'required'
            ],
            [
                'field' => 'jumlah_siswa',
                'label' => 'Jumlah Siswa',
                'rules' => 'numeric|max_length[5]'
            ],
            [
                'field' => 'jumlah_guru',
                'label' => 'Jumlah Guru',
                'rules' => 'numeric|max_length[5]'
            ]
        ];
    }

    public function getJumlahBangunan()
    {
        return $this->db->count_all($this->_table);
    }


    public function getKategori()
    {
        return $this->db->get('bangunan_kategori')->result_array();
    }

    public function getKecamatan()
    {
        return $this->db->get('kecamatan')->result_array();
    }

    public function getBangunanList($limit, $start)
    {
        $this->db->select('*');
        $this->db->from($this->_table);
        $this->db->join('bangunan_kategori', 'kategori_id = bangunan_kategori_id');
        $this->db->limit($limit, $start);
        return $this->db->get()->result_array();
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
        $this->db->join('kecamatan', 'id = kecamatan_id');
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
        $this->npsn =  $post['npsn'];
        $this->bangunan_kategori_id =  $post['kategori_id'];
        $this->bangunan_alamat =  $post['alamat'];
        $this->kecamatan_id =  $post['kecamatan_id'];

        $this->bangunan_gambar = $this->_uploadImage();

        $this->status =  $post['status'];
        $this->jumlah_siswa =  $post['jumlah_siswa'];
        $this->jumlah_guru =  $post['jumlah_guru'];
        return $this->db->insert($this->_table, $this);
    }

    public function editDataBangunan()
    {
        $post = $this->input->post();

        $this->bangunan_id = $post["id"];
        $this->bangunan_nama =  $post['nama'];
        $this->bangunan_lat =  $post['lat'];
        $this->bangunan_long =  $post['long'];
        $this->npsn =  $post['npsn'];
        $this->bangunan_kategori_id =  $post['kategori_id'];
        $this->bangunan_alamat =  $post['alamat'];
        $this->kecamatan_id =  $post['kecamatan_id'];

        if (!empty($_FILES["gambar"]["name"])) {
            $this->bangunan_gambar = $this->_uploadImage();
        } else {
            $this->bangunan_gambar = $post["old_image"];
        }

        $this->status =  $post['status'];
        $this->jumlah_siswa =  $post['jumlah_siswa'];
        $this->jumlah_guru =  $post['jumlah_guru'];

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
    private function _hapusGambar($id)
    {
        $bangunan = $this->getBangunanById($id);
        if ($bangunan['bangunan_gambar'] != "default.jpg") {
            $filename = explode(".", $bangunan['bangunan_gambar'])[0];
            return array_map('unlink', glob(FCPATH . "upload/bangunan/$filename.*"));
        }
    }

    public function hapusDataBangunan($id)
    {
        // $data = ['bangunan_id' =>  $id];
        // $this->db->delete('bangunan', $data);
        // return $this->db->rowCount();
        $this->_hapusGambar($id);
        return $this->db->delete($this->_table, array("bangunan_id" => $id));
    }
}
