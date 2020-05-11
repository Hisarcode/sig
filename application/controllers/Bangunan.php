<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Bangunan extends CI_Controller
{

    public function index()
    {
        $this->load->model('Bangunan_m', 'bangunan');

        $data['bangunan'] = $this->bangunan->getBangunan();

        $data['title'] = "Daftar Bangunan";
        $this->load->view('templates/header', $data);
        $this->load->view('templates/topnavbar');
        $this->load->view('templates/sidenavbar');
        $this->load->view('bangunan', $data);
        $this->load->view('templates/footer');
    }

    public function detail($id)
    {
        $this->load->model('Bangunan_m', 'bg');
        $data['title'] = 'Detail Bangunan';
        $data['bangunan'] = $this->bg->getBangunanById($id);
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
        if ($this->load->model('Bangunan_m')->tambahDataBangunan($_POST) > 0) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location:' . BASEURL . '/bangunan');
            exit;
        } else {
            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location:' . BASEURL . '/bangunan');
            exit;
        }
    }

    public function hapus($id)
    {
        if ($this->load->model('Bangunan_m')->hapusDataBangunan($id) > 0) {
            Flasher::setFlash('berhasil', 'dihapus', 'success');
            header('Location:' . BASEURL . '/bangunan');
            exit;
        } else {
            Flasher::setFlash('gagal', 'dihapus', 'danger');
            header('Location:' . BASEURL . '/bangunan');
            exit;
        }
    }

    public function getubah()
    {
        echo json_encode($this->load->model('Bangunan_m')->getBangunanById($_POST['id']));
    }

    public function ubah()
    {
        if ($this->model('Mahasiswa_model')->ubahDataMahasiswa($_POST) > 0) {
            Flasher::setFlash('berhasil', 'diubah', 'success');
            header('Location:' . BASEURL . '/mahasiswa');
            exit;
        } else {
            Flasher::setFlash('gagal', 'diubah', 'danger');
            header('Location:' . BASEURL . '/mahasiswa');
            exit;
        }
    }
}
