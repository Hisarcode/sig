<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Bangunan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Bangunan_m', 'bangunan');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['bangunan'] = $this->bangunan->getBangunan();
        // var_dump($data['bangunan']);
        // exit;
        $data['title'] = "Daftar Bangunan";
        $this->load->view('templates/header', $data);
        $this->load->view('templates/topnavbar', $data);
        $this->load->view('templates/sidenavbar', $data);
        $this->load->view('bangunan', $data);
        $this->load->view('templates/footer', $data);
    }

    public function detail($idBangunan)
    {
        $this->load->model('Bangunan_m', 'bg');
        $data['title'] = 'Detail Bangunan';
        $data['bangunan'] = $this->bg->getBangunanById($idBangunan);
        // var_dump($data['bangunan']);
        // exit;

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topnavbar');
        $this->load->view('templates/sidenavbar');
        $this->load->view('detail', $data);
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        $bangunan = $this->bangunan;
        $validation = $this->form_validation;
        $validation->set_rules($bangunan->rules());

        if ($validation->run()) {
            $bangunan->tambahDataBangunan();
            $this->session->set_flashdata('category_success', 'Data Berhasil Ditambahkan');
            redirect('bangunan');
        } else {
            $this->session->set_flashdata('category_error', 'Data Gagal Ditambahkan');
            redirect('bangunan');
        }
    }

    public function hapus($id = null)
    {
        if (!isset($id)) show_404();
        if ($this->bangunan->hapusDataBangunan($id) > 0) {
            $this->session->set_flashdata('category_success', 'Data Berhasil Dihapus');
            redirect('bangunan');
        } else {
            $this->session->set_flashdata('category_error', 'Data Gagal Dihapus');
            redirect('bangunan');
        }
    }

    public function getubah()
    {
        echo json_encode($this->bangunan->getBangunanById($_POST['id']));
    }

    public function ubah($id)
    {
        if (!isset($id)) redirect('bangunan');
        $bangunan = $this->bangunan;
        $validation = $this->form_validation;
        $validation->set_rules($bangunan->rules());

        if ($validation->run()) {
            $bangunan->editDataBangunan();
            $this->session->set_flashdata('category_success', 'Data Berhasil Diubah');
            redirect('bangunan');
        } else {
            $this->session->set_flashdata('category_error', 'Data Gagal Diubah');
            redirect('bangunan');
        }

        $data["bangunan"] = $bangunan->getBangunanById($id);
    }
}
