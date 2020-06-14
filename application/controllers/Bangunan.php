<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Bangunan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Bangunan_m', 'bangunan');
        $this->load->library('form_validation');
        $this->load->library('pagination');
    }

    public function index()
    {
        // Konfigurasi Pagination
        $config['base_url'] = base_url('bangunan/index');
        $config['total_rows'] = $this->bangunan->getJumlahBangunan();
        $config['per_page'] = 20;
        $config["uri_segment"] = 3;
        $choice = $config['total_rows'] / $config['per_page'];
        $config["num_links"] = 3;

        $config["first_link"] = "First";
        $config["last_link"] = "Last";
        $config["next_link"] = "Next";
        $config["prev_link"] = "Prev";

        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';

        $this->pagination->initialize($config);
        $data['loop'] = $this->uri->segment(3);
        $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

        $data['bangunan'] = $this->bangunan->getBangunanList($config["per_page"], $data['page']);

        $data['pagination'] = $this->pagination->create_links();

        // var_dump($data['bangunan']);
        // exit;
        $data['title'] = "Daftar Bangunan";

        //untuk modal

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topnavbar', $data);
        $this->load->view('templates/sidenavbar', $data);
        $this->load->view('bangunan', $data);
        $this->load->view('templates/footer', $data);
    }

    public function detail($idBangunan)
    {
        $data['title'] = 'Detail Bangunan';
        $data['bangunan'] = $this->bangunan->getBangunanById($idBangunan);
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
        $data['title'] = 'Tambah Bangunan';
        $data['kategori'] = $this->bangunan->getKategori();
        $data['kecamatan'] = $this->bangunan->getKecamatan();
        $bangunan = $this->bangunan;
        $validation = $this->form_validation;
        $validation->set_rules($bangunan->rules(1));

        if ($validation->run()) {
            $bangunan->tambahDataBangunan();
            $this->session->set_flashdata('category_success', 'Data Berhasil Ditambahkan');
            redirect('bangunan');
        }
        $this->load->view('templates/header', $data);
        $this->load->view('templates/topnavbar');
        $this->load->view('templates/sidenavbar');
        $this->load->view('bangunan_form/tambah');
        $this->load->view('templates/footer');
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
        $validation->set_rules($bangunan->rules(0));
        $data['kategori'] = $this->bangunan->getKategori();
        $data['kecamatan'] = $this->bangunan->getKecamatan();
        if ($validation->run()) {
            $bangunan->editDataBangunan();
            $this->session->set_flashdata('category_success', 'Data Berhasil Diubah');
            redirect('bangunan');
        }
        $data["title"] = "Edit Data";
        $data["bangunan"] = $bangunan->getBangunanById($id);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topnavbar');
        $this->load->view('templates/sidenavbar');
        $this->load->view('bangunan_form/ubah');
        $this->load->view('templates/footer');
    }
}
